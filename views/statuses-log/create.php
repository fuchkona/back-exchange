<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StatusesLog */

$this->title = 'Create Statuses Log';
$this->params['breadcrumbs'][] = ['label' => 'Statuses Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statuses-log-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
