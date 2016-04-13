<?php
/**
 * Sistem-TA.
 * Copyright (c) 2016 affandeZone.
 * e : affandes@gmail.com
 * PageMainIndexAsset.php 3/10/16 11:55 AM
 */

namespace app\assets;


use yii\web\AssetBundle;

class PageMainIndexAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'web/customs/css/main-index.css',
    ];
    public $js = [
    ];
    public $depends = [
        'app\assets\AppAsset',
    ];
}