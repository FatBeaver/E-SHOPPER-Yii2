<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'ru_RU',
    'modules' => [
        'yii2images' => [
            'class' => 'rico\yii2images\Module',
            'imagesStorePath' => '/image/store', //path to origin images
            'imagesCachePath' => '/images/cache', //path to resized copies
            'graphicsLibrary' => 'GD', //but really its better to use 'Imagick' 
            'placeHolderPath' => '/images/products/no-image.png',
            'imageCompressionQuality' => 100, // Optional. Default value is 85.
        ],
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
            'cachePath' => '@common/runtime/cache'
        ],
    ],
    'controllerMap' => [
        'elfinder' => [
            'class' => 'mihaildev\elfinder\PathController',
            'access' => ['@'],
            'root' => [
                'baseUrl'=>'/frontend/web/images',
                'basePath'=>'@frontend/web/images',
                //'path' => '@frontend/web/images',
                'name' => 'Images'
            ],
        ]
    ],
];
