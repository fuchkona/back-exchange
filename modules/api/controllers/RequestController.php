<?php
/**
 * Created by PhpStorm.
 * User: igroc
 * Date: 24.11.2018
 * Time: 21:07
 */

namespace app\modules\api\controllers;


use app\modules\api\models\Request;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\rest\ActiveController;
use yii\web\ConflictHttpException;
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
                                return Yii::$app->requestService->canDelete($currentUser, $request);
                            }
                            else{
                                throw new NotFoundHttpException('Request is not found');
                            }
                        },
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create'],
                        'roles' => ['@'],
                        'matchCallback' => function ($rules, $action) {
                            $currentUser = Yii::$app->user->identity;
                            $requester_id = Yii::$app->request->getBodyParam('requester_id');
                            $task_id = Yii::$app->request->getBodyParam('task_id');
                            if ($currentUser->getId() == $requester_id) {
                                return Yii::$app->requestService->canCreate($task_id, $requester_id);
                            } else {
                                throw new ConflictHttpException("Вы можете делать запрос только от своего имени!");
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

    /**
     * @param $request_id
     * @return array
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($request_id)
    {
        $request = Request::findOne($request_id);
        if (!$request) {
            throw new NotFoundHttpException("Request is not found.");
        }
        $request->delete();
        return [
            'id' => $request_id,
        ];
    }
}