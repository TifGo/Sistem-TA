<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = 'Error 404';
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        Ooppss... disini tidak ada apa-apa.
    </p>
    <p>
        Jika anda tersesat, silahkan <a href="<?= Url::to(['main/index']); ?>">kembali</a>
    </p>

</div>
