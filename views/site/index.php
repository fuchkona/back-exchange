<?php

/* @var $this yii\web\View */

$this->title = 'Time Exchange';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Привествую <?= Yii::$app->user->identity->username ?></h1>

        <p class="lead">Вы в админкe Time Exchange</p>

    </div>

    <div class="row">
        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 form-group">
            <?= \yii\helpers\Html::a(
                '<span class="glyphicon glyphicon-console"></span> API',
                ['/api'],
                ['class' => 'btn btn-block btn-default btn-lg btn-warning']
            ) ?>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 form-group">
            <?= \yii\helpers\Html::a(
                '<span class="glyphicon glyphicon-user"></span> Users',
                ['/user'],
                ['class' => 'btn btn-block btn-default btn-lg btn-primary']
            ) ?>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 form-group">
            <?= \yii\helpers\Html::a(
                '<span class="glyphicon glyphicon-file"></span> Tasks',
                ['/task'],
                ['class' => 'btn btn-block btn-default btn-lg btn-primary']
            ) ?>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 form-group">
            <?= \yii\helpers\Html::a(
                '<span class="glyphicon glyphicon-comment"></span> Comment',
                ['/comment'],
                ['class' => 'btn btn-block btn-default btn-lg btn-info']
            ) ?>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 form-group">
            <?= \yii\helpers\Html::a(
                '<span class="glyphicon glyphicon-picture"></span> File',
                ['/file'],
                ['class' => 'btn btn-block btn-default btn-lg btn-info']
            ) ?>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 form-group">
            <?= \yii\helpers\Html::a(
                '<span class="glyphicon glyphicon-eye-open"></span> Portfolio',
                ['/portfolio'],
                ['class' => 'btn btn-block btn-default btn-lg btn-info']
            ) ?>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 form-group">
            <?= \yii\helpers\Html::a(
                '<span class="glyphicon glyphicon-ok"></span> Requests',
                ['/request'],
                ['class' => 'btn btn-block btn-default btn-lg btn-info']
            ) ?>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 form-group">
            <?= \yii\helpers\Html::a(
                '<span class="glyphicon glyphicon-check"></span> Statuses',
                ['/statuses'],
                ['class' => 'btn btn-block btn-default btn-lg btn-info']
            ) ?>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 form-group">
            <?= \yii\helpers\Html::a(
                '<span class="glyphicon glyphicon-stats"></span> Statuses log',
                ['/statuses-log'],
                ['class' => 'btn btn-block btn-default btn-lg btn-info']
            ) ?>
        </div>
    </div>

</div>
