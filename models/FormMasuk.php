<?php
/**
 * Copyright (c) 2016 affandeZone.
 * cat-2016.
 * e : affandes@gmail.com
 * FormMasuk.php 3/9/16 10:52 AM
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
    public $kodeRegistrasi;
    public $kodeValidasi;


    /**
     * Objek identitas peserta
     * @var bool | IdentitasPeserta
     */
    private $_peserta = false;


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
            [['kodeRegistrasi', 'kodeValidasi'], 'required'],
            // kataSandi divalidasi oleh validasiKode()
            ['kodeValidasi', 'validasi'],
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
            $peserta = $this->getPeserta();

            if (!$peserta) {
                $this->addError('o', 'Kode Registrasi atau Kode Validasi tidak cocok');
            }
        }
    }

    /**
     * Ambil objek pengguna
     * @return IdentitasPeserta|false Identitas pengguna
     */
    public function getPeserta()
    {
        if ($this->_peserta == false) {
            $this->_peserta = IdentitasPeserta::findByUsname($this->kodeRegistrasi, $this->kodeValidasi);
        }

        return $this->_peserta;
    }

    /**
     * Login
     * @return bool
     */
    public function logIn()
    {
        if ($this->validate()) {

            // Generate Session Id
            $this->getPeserta()->generateSessionId();

            // Create session logs ke database
            $sessionLog = new LogPeserta();
            $sessionLog->logInTime = date('Y-m-d H:i:s');
            $sessionLog->sessionId = $this->getPeserta()->getAuthKey();
            $sessionLog->expiredDate = date('Y-m-d H:i:s', strtotime('+' . self::SESSION_EXPIRED . 'seconds'));
            $sessionLog->idPeserta = $this->getPeserta()->getId();
            $sessionLog->remoteAddress = Yii::$app->request->userIP;
            $sessionLog->info = Yii::$app->request->userAgent;
            $sessionLog->save();

            // Return
            return Yii::$app->user->login($this->getPeserta(), self::SESSION_EXPIRED);

        } else {
            return false;
        }
    }

}