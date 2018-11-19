<?php

namespace app\modules\api\controllers;

use app\modules\api\models\LoginForm;
use app\modules\api\models\SignupForm;
use Yii;
use yii\db\Exception;
use yii\rest\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\ServerErrorHttpException;


/**
 * Default controller for the `restApi` module
 */
class SiteController extends Controller
{

    /**
     * @return \app\models\User|LoginForm|null
     */
    public function actionLogin()
    {
        $model = new LoginForm();
        $model->load(\Yii::$app->request->bodyParams, '');
        if ($user = $model->auth()) {
            return $user;
        } else {
            return $model;
        }
    }

    /**
     * @return bool is user logged out successfully
     * @throws ServerErrorHttpException
     */
    public function actionLogout()
    {
        $user = Yii::$app->user->identity;
        $user->generateAuthKey();
        if ($user->save()) {
            return true;
        } else {
            throw new ServerErrorHttpException("Something wrong! Call support to find help.");
        }
    }

    public function actionLoginTest()
    {
        return "Authorisation was successful! User: " . Yii::$app->user->identity->username;
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        $model->load(Yii::$app->request->bodyParams, '');
        if ($user = $model->signup()) {
            return $user;
        } else {
            return $model;
        }
    }

    protected function verbs()
    {
        return [
            'login' => ['post'],
        ];
    }
}
