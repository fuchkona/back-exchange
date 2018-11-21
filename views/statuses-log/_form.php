<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StatusesLog */
/* @var $form yii\widgets\ActiveForm */
/* @var $tasks app\models\Task[]|array */
/* @var $statuses app\models\Statuses[]|array */
?>

<div class="statuses-log-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'task_id')->widget(\yii\jui\AutoComplete::classname(), [
        'clientOptions' => [
            'source' => $tasks,
        ],
        'options'=>[
            'class'=>'form-control'
        ]
    ]) ?>

    <?= $form->field($model, 'status_id')->dropDownList($statuses) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
