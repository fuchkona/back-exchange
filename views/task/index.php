<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Task', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'description:ntext',
            [
                'attribute' => 'owner',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::a($model->owner['full_name'], ['user/view', 'id' => $model->owner_id], ['target' => '_blank']);
                },
            ],
            [
                'attribute' => 'worker',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::a($model->worker['full_name'], ['user/view', 'id' => $model->worker_id], ['target' => '_blank']);
                },
            ],
            //'contract_time:datetime',
            'deadline:datetime',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
