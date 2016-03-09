<?php
/**
 * Sistem-TA.
 * Copyright (c) 2016 affandeZone.
 * e : affandes@gmail.com
 * LogPengguna.php 3/9/16 11:41 PM
 */

namespace app\models;


use yii\db\ActiveRecord;

class LogPengguna extends ActiveRecord
{
    /**
     * Nama Tabel untuk menyimpan log session peserta.
     * @return string
     */
    public static function tableName()
    {
        return 'tabel_log';
    }

    public function getPengguna()
    {
        return $this->hasOne(IdentitasPengguna::className(), ['id' => 'idPengguna']);
    }

}