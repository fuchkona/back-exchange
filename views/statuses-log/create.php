<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StatusesLog */
/* @var $tasks app\models\Task[]|array */
/* @var $statuses app\models\Statuses[]|array */

$this->title = 'Create Statuses Log';
$this->params['breadcrumbs'][] = ['label' => 'Statuses Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statuses-log-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'tasks' => $tasks,
        'statuses' => $statuses,
    ]) ?>

</div>
