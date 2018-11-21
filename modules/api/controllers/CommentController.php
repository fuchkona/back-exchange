<?php
/**
 * Created by PhpStorm.
 * User: igroc
 * Date: 21.11.2018
 * Time: 18:22
 */

namespace app\modules\api\controllers;


use app\modules\api\models\Comment;
use app\modules\api\models\Task;
use Yii;
use yii\base\InvalidConfigException;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;

class CommentController extends ActiveController
{

    public $modelClass = 'app\modules\api\models\Comment';

    public function actions(){
        $actions = parent::actions();
        unset($actions['delete']);
        unset($actions['index']);
        return $actions;
    }

    public function actionIndex($task_id)
    {
            $query = Comment::find()->byTask($task_id);

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

}