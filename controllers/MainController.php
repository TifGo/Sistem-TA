<?php
/**
 * Copyright (c) 2016 affandeZone.
 * cat-2016.
 * e : affandes@gmail.com
 * MainController.php 1/24/16 11:38 PM
 */

namespace app\controllers;

use app\models\FormMasuk;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

class MainController extends Controller
{
    /**
     * Layout awal
     * @var string
     */
    public $layout = 'main';

    /*public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }*/

    public function actionIndex()
    {
        // Cek otentikasi
        if(Yii::$app->user->isGuest) {
            $this->layout = 'login';
            return $this->render('index');
        } else {
            return $this->render('index-dashboard');
        }
    }


    /**
     * Fungsi Masuk (Sign In) ke CAT sebagai Peserta
     *
     */
    public function actionMasuk()
    {
        // Cek apakah sudah login
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        // Cek POST
        if (Yii::$app->request->isPost) {

            // Cek Post yg dikirimkan
            if (Yii::$app->request->post('signin-submit') == 'submitted') {

                // Buat Form Login Model
                $model = new FormMasuk();

                // Load data ke model
                $model->attributes = Yii::$app->request->post('SignIn');

                // Login
                if ($model->logIn()) {

                    // Login berhasil
                    return $this->goHome();

                } else {
                    $this->layout = 'login';
                    // Login Gagal, back
                    return $this->render('index', [
                        'model' => $model,
                    ]);

                }

            } else {

                return $this->goBack();

            }

        } else {

            return $this->goBack();

        }

    }


    /** Fungsi Keluar (log out) dari Sistem
     * @return \yii\web\Response
     */
    public function actionKeluar()
    {
        // Cek apakah sudah login?
        if (!Yii::$app->user->isGuest) {

            // Logout
            Yii::$app->user->logout(true);

        }

        // Go home
        return $this->goHome();
    }

}
