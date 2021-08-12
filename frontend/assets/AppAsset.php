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
        'css/bootstrap.min.css',
        'css/font-awesome.min.css',
        'css/carousel.css',
        'css/animate.css',
        'css/style.css?v=3',
//        'css/media.css?v=2',
    ];
    public $js = [
//        'js/jquery-ui.js',
        'js/jquery.min.js',
        'js/bootstrap.min.js',
        'js/carousel.js',
        'js/animate.js',
        'js/custom.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
//        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
