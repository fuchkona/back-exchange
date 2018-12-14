<?php

$params = require __DIR__ . '/params.php';
$defaults = require __DIR__ . '/defaults.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'language'=>'ru',
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 't0ADrH51gIpd8sqHOVLYl_TGvJtSJtxj',
            'baseUrl' => '',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
                //'multipart/form-data' => 'yii\web\MultipartFormDataParser'
            ]
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'statusesLogService' => [
            'class' => app\services\StatusesLogService::class,
        ],
        'fileService' => [
            'class' => app\services\FileService::class,
        ],
        'requestService' => [
            'class' => app\services\RequestService::class,
        ],
        'commentService' => [
            'class' => app\services\CommentService::class,
        ],
        'taskService' => [
            'class' => app\services\TaskService::class,
            'on create_task' => function (\app\services\events\CreateTaskEvent $event) {
                Yii::$app->statusesLogService->createStatusesLog($event->task->id, $event->status_id);
            },
            'on accept_task_request' => function (\app\services\events\AcceptTaskRequestEvent $event) {
                Yii::$app->statusesLogService->createStatusesLog($event->task->id, $event->status_id);
            },
            'on confirm_task_execution' => function (\app\services\events\ConfirmTaskExecutionEvent $event) {
                Yii::$app->statusesLogService->createStatusesLog($event->task->id, $event->status_id);
            },
            'on deny_task_execution' => function (\app\services\events\DenyTaskExecutionEvent $event) {
                Yii::$app->statusesLogService->createStatusesLog($event->task->id, $event->status_id);
            },
            'on sent_task_for_review' => function (\app\services\events\SentTaskForReviewEvent $event) {
                Yii::$app->statusesLogService->createStatusesLog($event->task->id, $event->status_id);
            },
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['info'],
                    'categories' => ['test'],
                    'logFile' => 'app/runtime/logs/test.log',
                    'logVars' => ['_GET', '_POST', '!_POST.LoginForm', '_FILES', '_COOKIE', '_SESSION', '_SERVER']
                ],
            ],
        ],
        'db' => $defaults['components']['db'],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => ['api/user', 'api/task', 'api/site', 'api/comment', 'api/request', 'api/file']
                ],
                'api' => 'site/api'
            ],
        ],
    ],
    'modules' => [
        'api' => [
            'class' => 'app\modules\api\Module',
        ],
    ],
    'params' => $params,
];


if (false) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

$config['bootstrap'][] = 'gii';
$config['modules']['gii'] = [
    'class' => 'yii\gii\Module',
    // uncomment the following to add your IP if you are not connecting from localhost.
    'allowedIPs' => ['*', '::1'],
];

return $config;
