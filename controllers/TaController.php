<?php
/**
 * Sistem-TA.
 * Copyright (c) 2016 affandeZone.
 * e : affandes@gmail.com
 * TaController.php 3/3/16 9:20 AM
 */

/**
 * Created by PhpStorm.
 * User: affandeZone
 * Date: 3/3/2016
 * Time: 09:20
 */

namespace app\controllers;


use yii\web\Controller;

class TaController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionPengajuan()
    {
        $status = 'proposal';

        switch($status) {
            case 'judul' :
                return $this->render('pengajuan-proposal'); break;
            case 'proposal' :
                return $this->render('pengajuan-hasil'); break;
            case 'hasil' :
                return $this->render('pengajuan-sidang'); break;
            case 'sidang' :
                return $this->render('pengajuan-skl'); break;
        }

    }
}