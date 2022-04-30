<?php

use yii\web\JqueryAsset;
use app\components\SEOUrl;

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'defaultRoute' => 'home/index',
    'language' => 'ru',
    'name' => 'Grocery Store a Ecommerce Online Shopping',
    'layout' => 'grocery',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
	'modules' => [
		'admin' => [
			'class' => 'app\modules\admin\Module',
			'layout' => 'admin',
			'defaultRoute' => 'main/index',
		],
	],
    'components' => [
		'formatter' => [
			'datetimeFormat' => 'php:d M Y H:i:s', # F -> full month name
		],
	    'assetManager' => [
		    'bundles' => [
			    JqueryAsset::class => [
				    'sourcePath' => null,   // не опубликовывать комплект
				    'js' => [
					    'js/jquery-1.11.1.min.js',
				    ]
			    ],
		    ],
	    ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'ALgag-v1841oUVVB-0g1vMxfSdQuLKFs',
            'baseUrl' => '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
	        'loginUrl' => ['admin/auth/login'],
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
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
	            'category/<id:\d+>/page/<page:\d+>' => 'category/view',
	            'category/<id:\d+>' => 'category/view',
	            'product/<id:\d+>' => 'product/view',
	            'search' => 'category/search',
//	            [
//		            'pattern'=>'<url:\w+>',
//		            'route' => 'post/view',
//		            'suffix' => '.html',
//	            ],
//
//	            'category/<url:\w+>' => 'category/view', //рубрики
//	            'tag/<url:\w+>' => 'tag/view', //метки
//
	            ['class' => SEOUrl::class],
	            '' => 'home/index',
	            'categories' => 'category/view',
	            '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
            ],

        ],
    ],
	'controllerMap' => [
		'elfinder' => [
			'class' => 'mihaildev\elfinder\PathController',
			'access' => ['@'],
			'root' => [
				'path' => 'upload/files',
				'name' => 'Files'
			],
//			'watermark' => [
//				'source'         => __DIR__.'/logo.png', // Path to Water mark image
//				'marginRight'    => 5,          // Margin right pixel
//				'marginBottom'   => 5,          // Margin bottom pixel
//				'quality'        => 95,         // JPEG image save quality
//				'transparency'   => 70,         // Water mark image transparency ( other than PNG )
//				'targetType'     => IMG_GIF|IMG_JPG|IMG_PNG|IMG_WBMP, // Target image formats ( bit-field )
//				'targetMinPixel' => 200         // Target image minimum pixel size
//			]
		]
	],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
