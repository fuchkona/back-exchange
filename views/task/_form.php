<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $users app\models\User[]|array */
/* @var $model app\models\Task */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'owner_id')->widget(\yii\jui\AutoComplete::classname(), [
        'clientOptions' => [
            'source' => $users,
        ],
        'options' => [
            'class' => 'form-control'
        ]
    ]) ?>


    <?= $form->field($model, 'worker_id')->widget(\yii\jui\AutoComplete::classname(), [
        'clientOptions' => [
            'source' => $users,
        ],
        'options' => [
            'class' => 'form-control'
        ]
    ]) ?>

    <?= $form->field($model, 'contract_time')->textInput() ?>

    <?= $form->field($model, 'deadline')->widget(\yii\jui\DatePicker::class, [
        'options' => ['class' => 'form-control'],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
