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
use yii\web\ServerErrorHttpException;
use app\modules\api\models\PasswordChangeForm;


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
     * @return array
     */
    public function actions()
    {
        $actions = parent::actions();
        unset($actions['update']);

        return $actions;
    }

    /**
     * @return ActiveDataProvider
     */
    public function actionProfile() {

        $query = User::find()->byUser(Yii::$app->user->identity);

        return new ActiveDataProvider([
            'query' => $query,
        ]);
    }

    /**
     * @return User|null
     * @throws ServerErrorHttpException
     * @throws yii\base\InvalidConfigException
     */
    public function actionUpdateProfile() {

        $model = User::findOne(Yii::$app->user->identity);
        $model->setScenario(User::SCENARIO_USER_UPDATE);

        $model->load(Yii::$app->getRequest()->getBodyParams(), '');
        if ($model->save() === false && !$model->hasErrors()) {
            throw new ServerErrorHttpException('Failed to update the object for unknown reason.');
        }

        return $model;
    }

    /**
     * @return PasswordChangeForm|array
     * @throws ServerErrorHttpException
     * @throws yii\base\InvalidConfigException
     */
    public function actionChangePass() {
        $user = User::findOne(Yii::$app->user->identity);
        $model = new PasswordChangeForm($user);

        $model->load(Yii::$app->getRequest()->getBodyParams(), '');

        if(!$model->changePassword() && !$model->hasErrors()) {
            throw new ServerErrorHttpException('Failed to update the object for unknown reason.');
        }

        return $model;
    }
}