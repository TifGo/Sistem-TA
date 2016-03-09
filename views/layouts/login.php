<?php
/**
 * Copyright (c) 2016 affandeZone.
 * cat-2016.
 * e : affandes@gmail.com
 * login.php 3/9/16 10:50 AM
 */

use yii\helpers\Url;
use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?> - CAT UIN SUSKA Riau</title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

    <div class="wrap halaman-login">

        <!-- Navbar -->
        <nav class="">
            <div class="nav-wrapper">
                <a class="brand-logo center" href="<?= Url::to(['main/index']); ?>"><i class="material-icons mdi-action-input"></i></a>
            </div>
        </nav>

        <!-- Konten -->
        <div class="container">
            <?= $content ?>
        </div>

        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; <?= Yii::$app->name ?> <?= date('Y') ?></p>
                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>

    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
