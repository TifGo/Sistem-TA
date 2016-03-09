<?php
/**
 * Copyright (c) 2016 affandeZone.
 * cat-2016.
 * e : affandes@gmail.com
 * index-dashboard.php 3/9/16 10:41 AM
 */

use yii\helpers\Url;
use app\assets\AppAsset;

AppAsset::register($this);

$this->title = 'Assalammu\'alaikum';
?>
<div class="">
    <h1>Signed In</h1>
    <p>Hai, apa kabarmu <?= Yii::$app->user->identity->getNama(); ?>?</p>
    <a href="<?= Url::to(['main/keluar']) ?>"><i class="mdi-action-autorenew"></i> Keluar</a>
</div>
