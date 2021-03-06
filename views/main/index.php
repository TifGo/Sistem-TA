<?php
/**
 * Sistem-TA.
 * Copyright (c) 2016 affandeZone.
 * e : affandes@gmail.com
 * index.php 3/10/16 9:49 AM
 */

use yii\helpers\Url;
use app\assets\PageMainIndexAsset;

PageMainIndexAsset::register($this);

$this->title = 'Masuk';
?>

<div class="row">

    <div class="col s12 m8 l6">
        <div class="card">
            <div class="card-content black-text">

                <div class="card-title"><i class="material-icons mdi-action-autorenew prefix"></i> Masuk</div>
                <p class="orange-text"><i class="mdi-alert-error"></i> <?= ((isset($model)) ? $model->getFirstError('o') : '') ?></p>
                <form action="<?= Url::to(['main/masuk']); ?>" method="post">
                    <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>">

                    <div class="input-field">
                        <i class="material-icons mdi-action-verified-user prefix"></i>
                        <input class="validate" type="text" id="signin-reg" name="SignIn[usname]">
                        <label for="signin-reg" data-error=" Oppss" data-success=" Ok">Username</label>
                    </div>

                    <div class="input-field">
                        <i class="material-icons mdi-action-lock prefix"></i>
                        <input class="validate" type="text" id="signin-val" name="SignIn[psword]">
                        <label for="signin-val" data-error=" Oppss" data-success=" Ok">Password</label>
                    </div>

                    <div class="input-field">
                        <button class="btn" type="submit" name="signin-submit" value="submitted">Masuk</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>
