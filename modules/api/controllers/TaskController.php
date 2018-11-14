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


}