/*
SQLyog Ultimate v8.82 
MySQL - 5.5.5-10.1.9-MariaDB : Database - ta
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `data_pengguna` */

DROP TABLE IF EXISTS `data_pengguna`;

CREATE TABLE `data_pengguna` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usname` varchar(50) NOT NULL,
  `psword` varchar(64) NOT NULL,
  `nomorInduk` varchar(30) DEFAULT NULL COMMENT 'NIP or NIK or NIM or else',
  `tipeNomorInduk` enum('NIK','NIP','NIM','Tidak Ada') NOT NULL,
  `nama` varchar(50) NOT NULL COMMENT 'Nama',
  `email` varchar(50) NOT NULL,
  `tipeAkun` enum('Root','Dosen','Pegawai','Mahasiswa') NOT NULL,
  `validasiAkun` enum('Belum Aktif','Aktif','Blok') NOT NULL,
  `createDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifyDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createBy` int(10) unsigned NOT NULL COMMENT 'id akun yang buat',
  `modifyBy` int(10) unsigned NOT NULL COMMENT 'id akun yang ubah',
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `usname` (`usname`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `data_pengguna` */

insert  into `data_pengguna`(`id`,`usname`,`psword`,`nomorInduk`,`tipeNomorInduk`,`nama`,`email`,`tipeAkun`,`validasiAkun`,`createDate`,`modifyDate`,`createBy`,`modifyBy`,`isDeleted`) values (1,'root','aaaa','001','NIK','Muhammad Affandes','affandes@gmail.com','Root','Aktif','2014-03-13 11:05:00','2016-03-09 23:09:07',1,1,0),(2,'koord','ssss','002','NIK','Muhammad Affandes, M.T','affandes@gmail.com','Dosen','Aktif','2014-03-13 11:42:00','2016-03-09 23:08:47',1,1,0),(3,'azmi','dddd','003','NIK','Azmi','azmi@yahoo.com','Pegawai','Aktif','2014-03-13 11:44:00','2014-03-13 11:44:00',1,1,0),(4,'ayukomang','ffff','004','NIK','Ayu Komang','ayukomang@yahoo.com','Mahasiswa','Aktif','2014-03-13 11:45:00','2016-03-09 23:08:49',1,1,0);

/*Table structure for table `tabel_log` */

DROP TABLE IF EXISTS `tabel_log`;

CREATE TABLE `tabel_log` (
  `logInTime` datetime NOT NULL,
  `sessionId` varchar(32) DEFAULT NULL,
  `expiredDate` datetime NOT NULL,
  `idPengguna` int(10) unsigned DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tipeAkun` enum('Root','Dosen','Pegawai','Mahasiswa') NOT NULL,
  `remoteAddress` varchar(32) NOT NULL,
  `info` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tabel_log` */

insert  into `tabel_log`(`logInTime`,`sessionId`,`expiredDate`,`idPengguna`,`nama`,`tipeAkun`,`remoteAddress`,`info`) values ('2016-03-09 17:41:09','bU6rBpdESnA3FFLLTk452ZC1k0Z9PSgP','2016-03-09 18:41:09',1,NULL,'Root','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:43.0) Gecko/20100101 Firefox/43.0'),('2016-03-09 17:45:07','MUmjmpobtnNXcOz2ipCXXjoqMuNAHLSz','2016-03-09 18:45:07',1,NULL,'Root','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:43.0) Gecko/20100101 Firefox/43.0'),('2016-03-10 03:43:29','XOu7BI3kk02ZgsJSrn0dz2CZ2GEx6Jz8','2016-03-10 04:43:29',1,NULL,'Root','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:43.0) Gecko/20100101 Firefox/43.0'),('2016-03-10 03:44:05','p9EUcDrCSP8cNqmDd0w-tEtDO0fFDOVB','2016-03-10 04:44:05',2,NULL,'Root','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:43.0) Gecko/20100101 Firefox/43.0'),('2016-03-10 03:46:57','vSGAeDlz9Apc5aUnNHrzjTyK__vDCLJq','2016-03-10 04:46:57',4,NULL,'Root','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:43.0) Gecko/20100101 Firefox/43.0'),('2016-03-10 03:47:32','8T7ReLFo4YaRkkeriaWgtOxgf6nVlHgd','2016-03-10 04:47:32',3,NULL,'Root','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:43.0) Gecko/20100101 Firefox/43.0');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
