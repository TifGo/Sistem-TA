<?php
/* @var $this yii\web\View */

use app\assets\AppAsset;

AppAsset::register($this);

$this->title = 'Assalammu\'alaikum';
?>
<div class="">
    <h1>Assalammu'alaikum</h1>
    <p>Hai, apa kabarmu?</p>
    <div class="input-field">
        <input placeholder="Placeholder" id="first_name" type="text" class="validate">
        <label for="first_name">First Name</label>
    </div>
</div>
