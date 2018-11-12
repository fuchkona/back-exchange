<?php
/**
 * Created by PhpStorm.
 * User: nikita
 * Date: 08.11.18
 * Time: 23:04
 */

/* @var $model \app\models\SignupForm */

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode('Time exchange') ?></title>
    <?php $this->head() ?>
</head>
<body style="background-color: #25728c; height: 0">
<?php $this->beginBody() ?>
<div class="login__container">
<div class="site-signup">
    <h1><?= Html::encode('Time exchange регистрация') ?></h1>
    <p>Пожалуйста введите следующие поля чтобы зарегистрироваться</p>
    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'full_name') ?>
            <?= $form->field($model, 'email') ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <div class="form-group">
                <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>