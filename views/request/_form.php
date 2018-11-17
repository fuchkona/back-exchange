<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Request */
/* @var $tasks \app\models\Task[]|array */
/* @var $users app\models\User[]|array */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="request-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'task_id')->widget(\yii\jui\AutoComplete::classname(), [
        'clientOptions' => [
            'source' => $tasks,
        ],
        'options'=>[
            'class'=>'form-control'
        ]
    ]) ?>

    <?= $form->field($model, 'requester_id')->widget(\yii\jui\AutoComplete::classname(), [
        'clientOptions' => [
            'source' => $users,
        ],
        'options'=>[
            'class'=>'form-control'
        ]
    ]) ?>

    <?= $form->field($model, 'need_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
