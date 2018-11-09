<?php

namespace app\modules\api\controllers;

use yii\rest\ActiveController;


/**
 * Default controller for the `restApi` module
 */
class DefaultController extends ActiveController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
