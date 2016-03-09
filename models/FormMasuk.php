<?php
/**
 * Sistem-TA.
 * Copyright (c) 2016 affandeZone.
 * e : affandes@gmail.com
 * FormMasuk.php 3/9/16 11:40 PM
 */

namespace app\models;

use Yii;
use yii\base\Model;

class FormMasuk extends Model
{

    /**
     * Variabel pada form
     * @var kodeRegistrasi Kode Registrasi Peserta.
     * @var kodeValidasi Kode Validasi Peserta.
     */
    public $usname;
    public $psword;


    /**
     * Objek identitas peserta
     * @var bool | IdentitasPeserta
     */
    private $_pengguna = false;


    /**
     * Lama masa expired untuk session (detik)
     * @var SESSION_EXPIRED
     */
    const SESSION_EXPIRED = 3600;


    /**
     * Rules
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // namaPengguna dan kataSandi harus
            [['usname', 'psword'], 'required'],
            // kataSandi divalidasi oleh validasiKode()
            ['psword', 'validasi'],
        ];
    }

    /**
     * Validasi Kode.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validasi($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $pengguna = $this->getPengguna();

            if (!$pengguna) {
                $this->addError('o', 'Username atau Password tidak cocok');
            }
        }
    }

    /**
     * Ambil objek pengguna
     * @return IdentitasPeserta|false Identitas pengguna
     */
    public function getPengguna()
    {
        if ($this->_pengguna == false) {
            $this->_pengguna = IdentitasPengguna::findByUsname($this->usname, $this->psword);
        }

        return $this->_pengguna;
    }

    /**
     * Login
     * @return bool
     */
    public function logIn()
    {
        if ($this->validate()) {

            // Generate Session Id
            $this->getPengguna()->generateSessionId();

            // Create session logs ke database
            $sessionLog = new LogPengguna();
            $sessionLog->logInTime = date('Y-m-d H:i:s');
            $sessionLog->sessionId = $this->getPengguna()->getAuthKey();
            $sessionLog->expiredDate = date('Y-m-d H:i:s', strtotime('+' . self::SESSION_EXPIRED . 'seconds'));
            $sessionLog->idPengguna = $this->getPengguna()->getId();
            $sessionLog->remoteAddress = Yii::$app->request->userIP;
            $sessionLog->info = Yii::$app->request->userAgent;
            $sessionLog->save();

            // Return
            return Yii::$app->user->login($this->getPengguna(), self::SESSION_EXPIRED);

        } else {
            return false;
        }
    }

}