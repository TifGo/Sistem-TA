<?php
/**
 * Sistem-TA.
 * Copyright (c) 2016 affandeZone.
 * e : affandes@gmail.com
 * MahasiswaController.php 4/7/16 1:27 AM
 */

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

class MahasiswaController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionProfilSaya()
    {
        return $this->render('profil');
    }

    public function actionProfilDosen()
    {
        return $this->render('profil-dosen');
    }

    public function actionSurat()
    {
        return $this->render('surat');
    }

    public function actionProgresTugasAkhir()
    {
        return $this->render('progres-tugas-akhir');
    }
}
