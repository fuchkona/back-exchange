<?php
/**
 * Created by PhpStorm.
 * User: igroc
 * Date: 24.11.2018
 * Time: 21:07
 */

namespace app\modules\api\controllers;


use app\modules\api\models\Request;
use app\services\RequestService;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\rest\ActiveController;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;

class RequestController extends ActiveController
{

    public $modelClass = 'app\modules\api\models\Request';

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
                            $request = Request::findOne(['id' => Yii::$app->request->get('request_id')]);

                            if (isset($request)){
                                return RequestService::canDelete($currentUser, $request);
                            }
                            else{
                                throw new NotFoundHttpException('Request is not found');
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

    protected function verbs()
    {
        $verbs = parent::verbs();
        $verbs['by-task'] = ['GET', 'HEAD'];
        return $verbs;
    }

    public function actionByTask($task_id)
    {
        $query = Request::find()->byTask($task_id);

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

    public function actionDelete($request_id)
    {
        try {
            Request::findOne($request_id)->delete();
        } catch (\Throwable $e) {
            throw new NotFoundHttpException('Comment is not found');
        }
        return ['The comment is removed'];
    }
}