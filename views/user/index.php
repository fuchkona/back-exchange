<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'username',
            'full_name',
            'email:email',
            'time',
            [
                'attribute' => 'status',
                'value' => function(\app\models\User $model){
                    return \app\models\User::STATUS_LIST[$model->status];
                },
                'filter' => \app\models\User::STATUS_LIST
            ],
            [
                'attribute' => 'role',
                'value' => function(\app\models\User $model){
                    return \app\models\User::ROLE_LIST[$model->role];
                },
                'filter' => \app\models\User::ROLE_LIST
            ],
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            //'created_at',
            //'updated_at',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
