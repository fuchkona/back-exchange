<?php

namespace app\modules\api\controllers;

use app\modules\api\models\LoginForm;
use yii\rest\Controller;
use yii\web\Response;


/**
 * Default controller for the `restApi` module
 */
class SiteController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {

        \Yii::$app->response->format = Response::FORMAT_HTML;
        return $this->render('index');
    }

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

    protected function verbs()
    {
        return [
            'login' => ['post'],
        ];
    }
}
