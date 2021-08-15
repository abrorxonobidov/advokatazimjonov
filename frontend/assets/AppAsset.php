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
        'css/my.css?v=4',
    ];
    public $js = [
        'js/jquery.min.js',
        'js/bootstrap.min.js',
        'js/carousel.js',
        'js/animate.js',
        'js/custom.js',
    ];
    public $depends = [];
}
