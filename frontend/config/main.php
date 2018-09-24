<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-voinmerk-public',
    'name' => 'voinmerk.ru',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-public',
            'baseUrl' => '',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-public', 'httpOnly' => true],
            'loginUrl' => ['auth/login'],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'voinmerk-public',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                // Site controller
                '' => 'site/index',
                'about' => 'site/about',
                'contact' => 'site/contact',
                'resume' => 'site/resume',

                // Auth controller
                'login' => 'auth/login',
                'logout' => 'auth/logout',
                'signup' => 'auth/signup',
                'forgot-password' => 'auth/request-password-reset',
                'recovery-password/<token:\+w>' => 'auth/reset-password',
            ],
        ],
    ],
    'params' => $params,
];
