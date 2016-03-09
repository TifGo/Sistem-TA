<?php
/**
 * Copyright (c) 2016 affandeZone.
 * cat-2016.
 * e : affandes@gmail.com
 * LogPeserta.php 3/9/16 10:15 AM
 */

namespace app\models;


use yii\db\ActiveRecord;

class LogPeserta extends ActiveRecord
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