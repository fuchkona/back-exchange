<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Task */

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
                'value' => Html::a($model->owner['full_name'], ['user/view', 'id' => $model->owner_id], ['target' => '_blank']),
            ],
            [
                'attribute' => 'worker',
                'format' => 'raw',
                'value' => Html::a($model->worker['full_name'], ['user/view', 'id' => $model->worker_id], ['target' => '_blank']),
            ],
            [
                'attribute' => 'contract_time',
                'value' => floor($model->contract_time / 60) . ' ч. ' . $model->contract_time % 60 . ' мин.'
            ],
            'deadline:datetime',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
