<?php
/**
 * Created by PhpStorm.
 * User: igroc
 * Date: 13.11.2018
 * Time: 19:45
 */

namespace app\modules\api\controllers;


use app\modules\api\models\Request;
use app\modules\api\models\Task;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;
use Yii;
use yii\data\ActiveDataProvider;

class TaskController extends ActiveController
{

    public $modelClass = 'app\modules\api\models\Task';

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['delete']);
        return $actions;
    }

    /**
     * @return array
     */
    protected function verbs()
    {
        $verbs = parent::verbs();
        $verbs['by-worker'] = ['GET', 'HEAD'];
        $verbs['accept-request'] = ['POST'];
        return $verbs;
    }

    /**
     * @param $worker_id
     * @return ActiveDataProvider
     */
    public function actionByWorker($worker_id)
    {
        $query = Task::find()->byWorker($worker_id);

        $requestParams = Yii::$app->getRequest()->getQueryParams();

        return new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'params' => $requestParams,
            ],
            'sort' => [
                'params' => $requestParams,
            ],
        ]);
    }

    /**
     * @param $request_id
     * @return bool
     * @throws NotFoundHttpException
     * @throws \yii\db\Exception
     */
    public function actionAcceptRequest($request_id)
    {
        $request = Request::findOne($request_id);
        if (!$request) {
            throw new NotFoundHttpException("Запрос не найден!");
        }
        $task = $request->task;
        $user = Yii::$app->user->identity;
        if ($task->owner_id != $user->id) {
            throw new AccessDeniedException("Вы не являетесь владельцем данной задачи!");
        }
        if ($task->currentStatus->id != Yii::$app->params['newTaskStatusId']) {
            throw new AccessDeniedException("Задача должна быть в статусе новой!");
        }
        if ($user->time < $request->need_time) {
            throw new AccessDeniedException("У вас недостаточно времени!");
        }
        $transaction = Yii::$app->db->beginTransaction();
        try {
            $user->time -= $request->need_time;
            $user->save();

            $task->worker_id = $request->requester_id;
            $task->contract_time = $request->need_time;
            $task->save();

            $transaction->commit();
        } catch (\Exception $e) {
            $transaction->rollBack();
            return false;
        } catch (\Throwable $e) {
            $transaction->rollBack();
            return false;
        }
        Yii::$app->taskService->acceptTaskRequest($task, $request);
        return true;
    }

    /**
     * @param $task_id
     * @return array
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($task_id)
    {
        $task = Task::findOne($task_id);
        if (!$task) {
            throw new NotFoundHttpException("Task is not found.");
        }
        $task->delete();
        return [
            'id' => $task_id,
        ];
    }
}