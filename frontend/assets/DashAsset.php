<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class DashAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '..\files\bower_components\bootstrap\css\bootstrap.min.css',
        '..\files\assets\icon\feather\css\feather.css',
        '..\files\assets\css\style.css',
        '..\files\assets\icon\icofont\css\icofont.css',
        '..\files\assets\css\jquery.mCustomScrollbar.css',

    ];
    public $js = [
        '..\files\bower_components\jquery\js\jquery.min.js',
        '..\files\bower_components\jquery-ui\js\jquery-ui.min.js',
        '..\files\bower_components\popper.js\js\popper.min.js',
        '..\files\bower_components\bootstrap\js\bootstrap.min.js',
        '..\files\assets\js\pcoded.min.js',
        '..\files\assets\js\vartical-layout.min.js',
        '..\files\assets\js\script.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];
}
