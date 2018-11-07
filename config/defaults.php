<?php
$defaults = [
    'basePath' => dirname(__DIR__),
    'timeZone' => 'UTC',

    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=eu-cdbr-west-02.cleardb.net;dbname=heroku_db2b52e0ef2b38b',
            'username' => 'b890543191508e',
            'password' => '27467812',
            'charset' => 'utf8',
            'tablePrefix' => '',
            'enableSchemaCache' => true,
            'enableQueryCache' => true,
        ],
    ],
];

// настройки локальной машины
$path_local = __DIR__ . '/defaults.local.php';
if(file_exists($path_local)) {
    $defaults = \yii\helpers\ArrayHelper::merge($defaults, require $path_local);
}

return $defaults;