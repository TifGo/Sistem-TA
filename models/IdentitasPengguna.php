<?php
/**
 * Copyright (c) 2016 affandeZone.
 * cat-2016.
 * e : affandes@gmail.com
 * IdentitasPengguna.php 3/9/16 9:48 AM
 */

namespace app\models;

use Yii;
use yii\helpers\Html;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class IdentitasPeserta extends ActiveRecord implements IdentityInterface
{
    /**
     * Menyimpan session id untuk diperiksa ke tabel log peserta
     * @var string sessionId
     */
    public $sessionId;


    /**
     * @return string nama tabel di db yang menyimpan data peserta
     */
    public static function tableName()
    {
        return 'data_pengguna';
    }


    /**
     * Cari data peserta berdasarkan id
     *
     * @param string|integer $id id di database
     * @return IdentityInterface|null Objek identitas yang dicari
     */
    public static function findIdentity($id)
    {
        return static::findOne([
            'id' => $id,
            'isDeleted' => '0',
        ]);

    }


    /**
     * Cari data peserta berdasarkan kodeRegistrasi
     *
     * @param $usname
     * @param $psword
     * @return null|IdentityInterface Objek identitas yang dicari
     * @internal param int|string $username
     */
    public static function findByUsname($usname, $psword)
    {
        // Select data
        $user = static::findOne([
            'usname' => Html::encode($usname),
            'isDeleted' => '0',
        ]);

        // Cek hasil seleksi
        if ($user == false) {
            return false;
        } else {

            // Ambil password hash
            $hash = $user->psword;

            // Cek password
            //if (Yii::$app->security->validatePassword(Html::encode($kodeValidasi), $hash)) {
            if(Html::encode($psword) == $hash) {
                return $user;
            } else {
                return false;
            }

        }

    }


    /**
     * Cari identitas pengguna berdasarkan token/sessionId
     *
     * @param string $token token yang dicari
     * @return IdentityInterface|null Objek identitas yang dicari
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return LogPengguna::findOne([
            'sessionId' => $token,
            /*'expired > :expired', [
                ':expired' => date('Y-m-d H:i:s'),
            ],*/
        ])->getPengguna();

    }


    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->attributes['id'];
    }


    /**
     * @return mixed. Nama
     */
    public function getNama()
    {
        return $this->attributes['nama'];
    }


    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->sessionId;
    }


    /**
     * @param string $authKey
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === Html::encode($authKey);
    }

    /**
     * Generate session id
     */
    public function generateSessionId()
    {
        $this->sessionId = Yii::$app->security->generateRandomString();
    }

    private function defaultFoto()
    {
        return '@web/images/user1_128.png';
    }

    public function getFoto()
    {
        // Cek string
        if (!isset($this->foto) || $this->foto == '') {
            return $this->defaultFoto();
        } elseif (is_null(parse_url($this->foto, PHP_URL_SCHEME))) {
            return '@web/images/peserta/' . $this->foto;
        } else {
            return $this->foto;
        }
    }

}