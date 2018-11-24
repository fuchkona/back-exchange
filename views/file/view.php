<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\File */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Files', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="file-view">

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
            [
                'attribute' => 'task',
                'format' => 'raw',
                'value' => Html::a($model->task['title'], ['task/view', 'id' => $model->task_id], ['target' => '_blank'])
            ],
            [
                'attribute' => 'user',
                'format' => 'raw',
                'value' => Html::a($model->user['full_name'], ['user/view', 'id' => $model->user_id], ['target' => '_blank'])
            ],
            [
                'attribute' => 'display_name',
                'format' => 'raw',
                'value' => Html::a($model->display_name, ['file/load-file', 'id' => $model->id], ['target' => '_blank'])
            ],
            'description:ntext',
        ],
    ]) ?>

</div>
