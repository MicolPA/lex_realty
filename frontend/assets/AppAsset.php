<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css?v=22',
        'css/bootstrap.css',
        'css/all.min.css',
    ];
    public $js = [
        'js/jquery-2.2.4.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js',
        'js/bootstrap.min.js',
        'js/main.js?v=6',
        'js/all.min.js',
        'js/sweetalert.min.js',

    ];
    public $depends = [
        // 'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];
}
