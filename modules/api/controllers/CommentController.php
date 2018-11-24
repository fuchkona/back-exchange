<?php
/**
 * Created by PhpStorm.
 * User: igroc
 * Date: 21.11.2018
 * Time: 18:22
 */

namespace app\modules\api\controllers;



use app\modules\api\models\Comment;
use app\services\CommentService;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\rest\ActiveController;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;

class CommentController extends ActiveController
{

    public $modelClass = 'app\modules\api\models\Comment';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['delete'],
                        'roles' => ['@'],
                        'matchCallback' => function ($rules, $action) {
                            $currentUser = Yii::$app->user->identity;
                            $comment = Comment::findOne(['id' => Yii::$app->request->get('comment_id')]);

                            if (isset($comment)){
                                return CommentService::canDelete($currentUser, $comment);
                            }
                        },
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'actions' => ['by-task', 'create', 'update']
                    ],
                ],
                'denyCallback' => function () {
                    throw new ForbiddenHttpException('You a not have permissions for this action');
                }
            ],
        ];
    }

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['delete']);

        return $actions;
    }

    public function actionByTask($task_id)
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

    public function actionDelete($comment_id)
    {
        try {
            Comment::findOne($comment_id)->delete();
        } catch (\Throwable $e) {
            throw new NotFoundHttpException('Comment is not found');
        }
        return ['The comment is removed'];
    }

}