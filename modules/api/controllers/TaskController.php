<?php
/**
 * Created by PhpStorm.
 * User: igroc
 * Date: 13.11.2018
 * Time: 19:45
 */

namespace app\modules\api\controllers;


use app\models\Task;
use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;

class TaskController extends ActiveController
{

    public $modelClass = 'app\modules\api\models\Task';


    public function actions(){
        $actions = parent::actions();
        unset($actions['delete']);
        return $actions;
    }

    public function actionDelete($task_id)
    {
        try {
            Task::findOne($task_id)->delete();
        } catch (\Throwable $e) {
            throw new NotFoundHttpException('Task is not found');
        }
        return ['result' => 'success'];
    }
}