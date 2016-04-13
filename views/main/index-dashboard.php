<?php
/**
 * Sistem-TA.
 * Copyright (c) 2016 affandeZone.
 * e : affandes@gmail.com
 * index-dashboard.php 3/9/16 11:44 PM
 */

use yii\helpers\Url;
use app\assets\AppAsset;

AppAsset::register($this);

$this->title = 'Assalammu\'alaikum';
?>
<div class="">
    <h1>Signed In as <strong><?= Yii::$app->user->identity->getTipeAkun(); ?></strong></h1>
    <p>Hai, apa kabarmu <?= Yii::$app->user->identity->getNama(); ?>?</p>
    <a href="<?= Url::to(['main/keluar']) ?>"><i class="mdi-action-autorenew"></i> Keluar</a>
</div>
