<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StatusesLog */
/* @var $tasks app\models\Task[]|array */
/* @var $statuses app\models\Statuses[]|array */

$this->title = 'Update Statuses Log: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Statuses Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="statuses-log-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'tasks' => $tasks,
        'statuses' => $statuses,
    ]) ?>

</div>
