<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Task */
/* @var $fileDataProvider app\models\File */
/* @var $commentDataProvider app\models\Comment */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description:ntext',
            [
                'attribute' => 'owner',
                'format' => 'raw',
                'value' => Html::a($model->owner['full_name'],
                    ['user/view', 'id' => $model->owner_id],
                    ['target' => '_blank']),
            ],
            [
                'attribute' => 'worker',
                'format' => 'raw',
                'value' => Html::a($model->worker['full_name'],
                    ['user/view', 'id' => $model->worker_id],
                    ['target' => '_blank']),
            ],
            [
                'attribute' => 'contract_time',
                'value' => floor($model->contract_time / 60) . ' ч. ' . $model->contract_time % 60 . ' мин.'
            ],
            'deadline:datetime',
            [
                'attribute' => 'files',
                'format' => 'raw',
                'value' => GridView::widget([
                    'dataProvider' => $fileDataProvider,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'attribute' => 'display_name',
                            'label' => 'Name',
                            'format' => 'raw',
                            'value' => function(\app\models\File $model) {
                                return Html::a($model->display_name,
                                    ['file/load-file', 'id' => $model->id],
                                    ['target' => '_blank', 'title' => 'Click to view file']);
                            },
                        ],
                        [
                            'attribute' => 'user_id',
                            'label' => 'Author',
                            'format' => 'raw',
                            'value' => function(\app\models\File $model) {
                                return Html::a($model->user['full_name'],
                                    ['user/view', 'id' => $model->user_id],
                                    ['target' => '_blank', 'title' => 'Click to view user information']);
                            },
                        ],
//                        [
//                            'class' => 'yii\grid\ActionColumn',
//                            'controller' => 'file',
//                        ],
                    ],
                ])
            ],
            [
                'attribute' => 'comments',
                'format' => 'raw',
                'value' => GridView::widget([
                    'dataProvider' => $commentDataProvider,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'attribute' => 'author_id',
                            'label' => 'Author',
                            'format' => 'raw',
                            'value' => function(\app\models\Comment $model) {
                                return Html::a($model->author['full_name'],
                                    ['user/view', 'id' => $model->author_id],
                                    ['target' => '_blank', 'title' => 'Click to view user information']);
                            },
                        ],
                        [
                            'attribute' => 'created_at',
                            'format' => 'datetime',
                            'contentOptions' => ['style' => 'max-width:150px']
                        ],
                        [
                            'attribute' => 'text',
                            'value' => function(\app\models\Comment $model) {
                                return $model->text;
                            },
                            'contentOptions' => ['style' => 'max-width:500px']
                        ],
//                        [
//                            'class' => 'yii\grid\ActionColumn',
//                            'controller' => 'comment',
//                        ],
                    ],
                ])
            ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
