<?php
/**
 * ICoSTechS.
 * Copyright (c) 2016 affandeZone.
 * e : affandes@gmail.com
 * index-pro.php 1/24/16 11:13 PM
 */

/**
 * Created by PhpStorm.
 * User: affandeZone
 * Date: 1/24/2016
 * Time: 23:13
 */


// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', false);
defined('YII_ENV') or define('YII_ENV', 'pro');

require(__DIR__ . '/vendor/autoload.php');
require(__DIR__ . '/vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/config/web.php');

(new yii\web\Application($config))->run();
