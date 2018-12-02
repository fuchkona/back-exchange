<?php
/**
 * Created by PhpStorm.
 * User: igroc
 * Date: 13.11.2018
 * Time: 19:45
 */

namespace app\modules\api\controllers;


use app\modules\api\models\Task;
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