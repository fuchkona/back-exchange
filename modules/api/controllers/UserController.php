<?php
/**
 * Created by PhpStorm.
 * User: Илья
 * Date: 25.11.2018
 * Time: 14:47
 */


namespace app\modules\api\controllers;

use yii;
use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;
use app\modules\api\models\User;



/**
 * Class UserController for REST API
 * @package app\modules\api\controllers
 */

class UserController extends ActiveController
{
    /**
     * @var string $modelClass
     */
    public $modelClass = 'app\modules\api\models\User';


    /**
     * @return ActiveDataProvider
     */
    public function actionProfile() {

        $query = User::find()->byUser(Yii::$app->user->identity);

        return new ActiveDataProvider([
            'query' => $query,
        ]);
    }

}