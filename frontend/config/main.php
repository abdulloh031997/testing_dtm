<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' =>'uz',
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'gridview' =>  [
             'class' => '\kartik\grid\Module'
         ]
        ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        // 'assetManager' => [
        //     'bundles' => [
        //         'yii\bootstrap4\BootstrapAsset' => [
        //             'css' => [],
        //         ],
        //         'yii\bootstrap4\BootstrapPluginAsset' => [
        //             'js' => [],
        //             'css' => [],
        //         ],
        //         'yii\bootstrap\BootstrapAsset' => [
        //             'css' => [],
        //         ],
        //         'yii\bootstrap\BootstrapPluginAsset' => [
        //             'js' => [],
        //         ],
        //         'yii\web\JqueryAsset' => [
        //             'js' => YII_ENV_DEV ? [] : ['jquery.min.js'],
        //         ],
        //         'kartik\bs4dropdown\DropdownAsset' => [
        //             'js' => [],
        //             'css' => [],
        //         ],
        //     ]
        // ],
        'assetManager' => [
            'appendTimestamp' => true,
            'bundles' => [
                'yii\web\YiiAsset' => [
                    'js'=>[]
                ],
                'yii\widgets\ActiveFormAsset' => [
                    'js'=>[]
                ],
                'yii\web\JqueryAsset' => [
                    'js'=>[]
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js'=>[]
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [],
                ],
            ],
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
                '/' =>'/site/index/'
            ],
        ],
    ],
    'params' => $params,
];
