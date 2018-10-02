<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-voinmerk-admin',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'sourceLanguage' => 'ru',
    'language' => 'ru-RU',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-admin',
            'baseUrl' => '/admin',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-admin', 'httpOnly' => true],
            'loginUrl' => ['auth/login'],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'voinmerk-admin',
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
                'backend*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@messages',
                    'fileMap' => [
                        'backend'       => 'backend.php',
                        'backend/error' => 'error.php',
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
                '' => 'site/index',
            ],
        ],
        'assetManager' => [
            'bundles' => [
                'dmstr\web\AdminLteAsset' => [
                    'skin' => 'skin-yellow',
                ],
            ],
        ],
        'controllerMap' => [
            'elfinder' => [
                'class' => 'mihaildev\elfinder\Controller',
                'access' => ['@'], //глобальный доступ к фаил менеджеру @ - для авторизорованных , ? - для гостей , чтоб открыть всем ['@', '?']
                'disabledCommands' => ['netmount'], //отключение ненужных команд https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#commands
                'roots' => [
                    [
                        'baseUrl'=>'@web',
                        'basePath'=>'@webroot',
                        'path' => 'files/global',
                        'name' => 'Global'
                    ],
                    [
                        'class' => 'mihaildev\elfinder\volume\UserPath',
                        'path'  => 'files/user_{id}',
                        'name'  => 'My Documents'
                    ],
                    [
                        'path' => 'files/some',
                        'name' => ['category' => 'my','message' => 'Some Name'] //перевод Yii::t($category, $message)
                    ],
                    [
                        'path'   => 'files/some',
                        'name'   => ['category' => 'my','message' => 'Some Name'], // Yii::t($category, $message)
                        'access' => ['read' => '*', 'write' => 'UserFilesAccess'] // * - для всех, иначе проверка доступа в даааном примере все могут видет а редактировать могут пользователи только с правами UserFilesAccess
                    ]
                ],
                'watermark' => [
                    'source'         => __DIR__ . '/logo.png', // Path to Water mark image
                    'marginRight'    => 5,          // Margin right pixel
                    'marginBottom'   => 5,          // Margin bottom pixel
                    'quality'        => 95,         // JPEG image save quality
                    'transparency'   => 70,         // Water mark image transparency ( other than PNG )
                    'targetType'     => IMG_GIF|IMG_JPG|IMG_PNG|IMG_WBMP, // Target image formats ( bit-field )
                    'targetMinPixel' => 200         // Target image minimum pixel size
                ]
            ]
        ],
    ],
    'params' => $params,
];
