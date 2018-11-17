<?php

namespace app\modules\api\controllers;

use app\modules\api\models\LoginForm;
use app\modules\api\models\SignupForm;
use Yii;
use yii\rest\Controller;
use yii\web\Response;


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

    public function actionLoginTest() {
        return "Authorisation was successful! User: " . Yii::$app->user->identity->username;
    }

    public function actionSignup() {
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
