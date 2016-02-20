<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'web/vendor/materialize/css/materialize.css',
    ];
    public $js = [
        'web/vendor/jquery/jquery-1.11.1.js',
        'web/vendor/materialize/js/materialize.js',
    ];
    public $depends = [
    ];
}
