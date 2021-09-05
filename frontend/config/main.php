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
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute' => 'site/index',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl'=> '/alukun',
        ],
        'lib' => [
            'class' => 'app\components\Lib',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => false,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
            'enableSession' => true,
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'pixltech-frontend',
            'class' => 'yii\web\DbSession',
            'sessionTable' => 'pt_session_front',
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
            'enableStrictParsing' => false,
            'rules' => [
                '' => 'site/index',
                'privacy'=>'site/privacy',
                'product/<any:(.*)>/<id:(.*)>' => 'shop/productdetail',
                'checkout/<any:(.*)>' => 'site/checkout',
                'process/<any:(.*)>' => 'site/process',
                'shop/track'=>'shop/track',
                'shop/<any:(.*)>/<id:(.*)>' => 'shop/index',
                'mailsent'=>'shop/mailsent',
                'dconfig/type/<id:(.*)>' => 'dconfig/type',
                'dconfig/colour/<id:(.*)>' => 'dconfig/colour',
                'dconfig/accessories/<id:(.*)>' => 'dconfig/accessories',
                'dconfig' => 'dconfig/index',
                'search'=>'shop/search',
                'promo' => 'site/promo',
                // 'popups/login' => 'popups/login',
                // 'popups/<id:\d+>' => 'popups/view',
                // 'popups/<action:\w+>' => 'popups/<action>',
                '<action:(.*)>' => 'site/<action>',

                ''=>'site/index',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],
    ],
    'params' => $params,

];
