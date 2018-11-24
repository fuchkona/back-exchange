<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\File */
/* @var $tasks app\models\Task[]|array */
/* @var $users app\models\User[]|array */

$this->title = 'Create File';
$this->params['breadcrumbs'][] = ['label' => 'Files', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="file-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'tasks' => $tasks,
        'users' => $users,
    ]) ?>

</div>
