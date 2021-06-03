<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'admin/assets/css/loader.css',
        'admin/assets/js/loader.js',
        '/https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap',
        'admin/bootstrap/css/bootstrap.min.css',
        'admin/assets/css/plugins.css',
        'admin/plugins/apex/apexcharts.css',
        'admin/assets/css/dashboard/dash_1.css',

    ];
    public $js = [
        'admin/assets/js/libs/jquery-3.1.1.min.js',
        'admin/bootstrap/js/popper.min.js',
        'admin/bootstrap/js/bootstrap.min.js',
        'admin/plugins/perfect-scrollbar/perfect-scrollbar.min.js',
        'admin/assets/js/app.js',

        'admin/assets/js/custom.js',
        'admin/plugins/apex/apexcharts.min.js',
        'admin/assets/js/dashboard/dash_1.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
