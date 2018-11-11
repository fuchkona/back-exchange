<?php
/**
 * Created by PhpStorm.
 * User: nikita
 * Date: 12.11.18
 * Time: 0:17
 */

namespace app\controllers\base;

use app\models\User;
use app\services\UserService;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;

class BaseController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rules, $action) {
                            $allowedRoles = [User::ROLE_MODERATOR, User::ROLE_ADMIN];
                            return UserService::checkUserRoles(Yii::$app->user->identity, $allowedRoles);

                        }
                    ],
                ],
                'denyCallback' => function(){
                    throw new ForbiddenHttpException('Доступ закрыт, пожалуйста авторизуйтесь под учеткой админа или модератора');
                }
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

}