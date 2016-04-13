<?php
/**
 * ICoSTechS.
 * Copyright (c) 2016 affandeZone.
 * e : affandes@gmail.com
 * ErrorController.php 1/24/16 11:32 PM
 */

/**
 * Created by PhpStorm.
 * User: affandeZone
 * Date: 1/24/2016
 * Time: 23:32
 */

namespace app\controllers;


use yii\web\Controller;

class ErrorController extends Controller
{
    public function actionIndex()
    {
        return $this->render('404');
    }

    public function actionError404()
    {
        return $this->render('404');
    }

    public function actionError403()
    {
        return $this->render('403');
    }
}