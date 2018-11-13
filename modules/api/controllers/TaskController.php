<?php
/**
 * Created by PhpStorm.
 * User: igroc
 * Date: 13.11.2018
 * Time: 19:45
 */

namespace app\modules\api\controllers;


use app\models\Task;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;

class TaskController extends ActiveController
{

    public $modelClass = 'app\modules\api\models\Task';


    public function actions(){
        $actions = parent::actions();
        unset($actions['index']);
        return $actions;
    }

    public function actionIndex(){
        $activeData = new ActiveDataProvider([
            'query' => Task::find(),
            'pagination' => [
                'defaultPageSize' => 5,
            ],
        ]);
        return $activeData;
    }

}