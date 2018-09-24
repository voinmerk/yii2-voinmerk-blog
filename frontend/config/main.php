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
    'sourceLanguage' => 'ru',
    'language' => 'ru-RU',
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
        'i18n' => [
            'translations' => [
                'frontend*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@messages',
                    'fileMap' => [
                        'frontend'       => 'frontend.php',
                        'frontend/error' => 'error.php',
                    ],
                ],
                'common*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@messages',
                    'fileMap' => [
                        'common'       => 'common.php',
                        'common/error' => 'error.php',
                    ],
                ],
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                // Site controller
                '' => 'site/index',
                'about' => 'site/about',
                'contact' => 'site/contact',
                'my-resume' => 'site/resume',

                // Auth controller
                'login' => 'auth/login',
                'logout' => 'auth/logout',
                'signup' => 'auth/signup',
                'forgot-password' => 'auth/request-password-reset',
                'recovery-password/<token:\+w>' => 'auth/reset-password',

                // Resume controller
                'resume/<id:[\w_-]+>' => 'resume/view',
                'resume' => 'resume/index',

                // Portfolio controller
                'portfolio/<id:[\w_-]+>' => 'portfolio/view',
                'portfolio' => 'portfolio/index',

                // Account controller
                'account' => 'account/index',
            ],
        ],
    ],
    'params' => $params,
];
