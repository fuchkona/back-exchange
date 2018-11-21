<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\File */
/* @var $tasks app\models\Task[]|array */
/* @var $users app\models\User[]|array */

$this->title = 'Update File: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Files', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="file-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'tasks' => $tasks,
        'users' => $users,

    ]) ?>

</div>
