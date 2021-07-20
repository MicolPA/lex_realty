<?php

namespace frontend\assets;

use yii\web\AssetBundle;
use Yii;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css?v=25',
        'css/bootstrap.css',
        'css/all.min.css',
    ];
    public $js = [
        'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js',
        'js/bootstrap.min.js',
        'js/main.js?v=8',
        'js/all.min.js',
        'js/sweetalert.min.js',

    ];
    public $depends = [
        // 'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];

    function __construct(){
        if (!isset(Yii::$app->request->get()['stars'])) {

            array_unshift($this->js, 'js/jquery-2.2.4.min.js');
        
        }
    }
}
