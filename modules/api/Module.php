<?php

namespace app\modules\api;

use yii\filters\auth\HttpBearerAuth;

/**
 * restApi module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\api\controllers';
    public $defaultRoute = 'site/index';


    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::className(),
            'except' => [
                'site/index',
                'site/login',
            ],
        ];
        return $behaviors;
    }

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        \Yii::$app->user->enableSession = false;
        // custom initialization code goes here
    }
}
