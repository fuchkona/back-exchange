<?php
/**
 * Created by PhpStorm.
 * User: igroc
 * Date: 13.11.2018
 * Time: 19:45
 */

namespace app\modules\api\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use app\models\User;
use app\modules\api\models\Request;
use app\modules\api\models\Task;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;


class TaskController extends ActiveController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['update', 'delete', 'accept-request', 'confirm-execution'],
                        'roles' => ['@'],
                        'matchCallback' => function ($rules, $action) {
                            $currentUser = Yii::$app->user->identity;
                            $task = Task::findOne(['id' => Yii::$app->request->get('task_id')]);

                            if (isset($task)){
                                return Yii::$app->taskService->areYouOwner($currentUser, $task);
                            }
                            else{
                                throw new NotFoundHttpException('Task is not found');
                            }
                        },
                    ],
                    [
                        'allow' => true,
                        'actions' => ['send-for-review'],
                        'roles' => ['@'],
                        'matchCallback' => function ($rules, $action) {
                            $currentUser = Yii::$app->user->identity;
                            $task = Task::findOne(['id' => Yii::$app->request->get('task_id')]);

                            if (isset($task)){
                                return Yii::$app->taskService->areYouWorker($currentUser, $task);
                            }
                            else{
                                throw new NotFoundHttpException('Task is not found');
                            }
                        },
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'actions' => ['by-worker', 'create']
                    ],
                ],
                'denyCallback' => function () {
                    throw new ForbiddenHttpException('You a not have permissions for this action');
                }
            ],
        ];
    }

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
        $verbs['confirm-execution'] = ['POST'];
        $verbs['send-for-review'] = ['POST'];
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
     * @param $task_id
     * @return bool
     * @throws NotFoundHttpException
     * @throws \yii\db\Exception
     */
    public function actionAcceptRequest($task_id, $request_id)
    {
        $request = Request::findOne($request_id);
        if (!$request) {
            throw new NotFoundHttpException("Запрос не найден!");
        }
        $task = Task::findOne($task_id);
        $user = Yii::$app->user->identity;

        if (!Yii::$app->taskService->haveCurrentStatus($task, Yii::$app->params['newTaskStatusId'])) {
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
     * @return bool
     * @throws \yii\db\Exception
     */
    public function actionConfirmExecution ($task_id)
    {
        $task = Task::findOne($task_id);
        $worker = $task->worker;

        if (!Yii::$app->taskService->haveCurrentStatus($task, Yii::$app->params['taskSentForReviewByTheWorkerStatusId'])) {
            throw new AccessDeniedException('Задача должна иметь статус: "Отправлена исполнителем на проверку"!');
        }

        $transaction = Yii::$app->db->beginTransaction();
        try {
            $worker->time += $task->contract_time;
            $worker->save();

            $task->contract_time = null;
            $task->save();

            $transaction->commit();
        } catch (\Exception $e) {
            $transaction->rollBack();
            return false;
        } catch (\Throwable $e) {
            $transaction->rollBack();
            return false;
        }
        Yii::$app->taskService->confirmTaskExecution($task);
        return true;
    }

    /**
     * @param $task_id
     * @return bool
     */
    public function actionSendForReview ($task_id)
    {
        $task = Task::findOne($task_id);

        if (!Yii::$app->taskService->haveCurrentStatus($task, Yii::$app->params['taskAtWorkStatusId'])) {
            throw new AccessDeniedException('Задача должна иметь статус: "В работе"!');
        }

        Yii::$app->taskService->sendTaskForReview($task);
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

        if (!Yii::$app->taskService->haveCurrentStatus($task, Yii::$app->params['newTaskStatusId'])) {
            throw new AccessDeniedException("Задача должна быть в статусе новой!");
        }
        $task->delete();
        return [
            'id' => $task_id,
        ];
    }
}