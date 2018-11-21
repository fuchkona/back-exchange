<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\FileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Files';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="file-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create File', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'task',
                'format' => 'raw',
                'value' => function(\app\models\File $model) {
                    return Html::a($model->task['title'], ['task/view', 'id' => $model->task_id], ['target' => '_blank']);
                },
            ],
            [
                'attribute' => 'user',
                'format' => 'raw',
                'value' => function(\app\models\File $model) {
                    return Html::a($model->user['full_name'], ['user/view', 'id' => $model->user_id], ['target' => '_blank']);
                },
            ],
            [
                'attribute' => 'display_name',
                'format' => 'raw',
                'value' => function(\app\models\File $model) {
                    return Html::a($model->display_name, ['file/load-file', 'id' => $model->id], ['target' => '_blank']);
                },
            ],
            //'description:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
