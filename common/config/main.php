<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'PayPalRestApi'=>[
            'class'=>'bitcko\paypalrestapi\PayPalRestApi',
            'redirectUrl'=>'/site/make-payment', // Redirect Url after payment
        ]
    ],
];


