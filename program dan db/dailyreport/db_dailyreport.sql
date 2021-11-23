/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.37-MariaDB : Database - db_dailyreport
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_dailyreport` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_dailyreport`;

/*Table structure for table `daily` */

DROP TABLE IF EXISTS `daily`;

CREATE TABLE `daily` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_kegiatan` date NOT NULL,
  `kegiatan` text NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `durasi` time NOT NULL,
  `output` text NOT NULL,
  `status` int(1) NOT NULL,
  `verifikator` varchar(128) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `daily` */

insert  into `daily`(`id`,`tgl_kegiatan`,`kegiatan`,`waktu_mulai`,`waktu_selesai`,`durasi`,`output`,`status`,`verifikator`,`id_user`) values (1,'2021-08-12','Mencatat data customer mengirim barang','02:01:09','03:02:10','01:00:00','menghasilkan data customer telah mengirim barang',1,'Muhamad Eman Sulaeman',2),(3,'2021-08-10','Mencatat data customer mengirim barang -barang','01:16:00','02:16:00','03:20:00','menghasilkan data customer telah mengirim barang',3,'Muhamad Eman Sulaeman',3),(4,'2021-08-20','Mencatat data customer mengirim barang -barang','00:34:00','04:32:00','04:32:00','menghasilkan data customer telah mengirim barang',2,'Muahamad Eman Sulaeman',3),(6,'2021-08-12','Mencatat data customer mengirim barang -barang','01:18:00','03:16:00','01:21:00','menghasilkan data customer telah mengirim barang',1,'-',3),(10,'2021-08-12','Mencatat data customer mengirim barang -barang','01:29:00','01:32:00','01:32:00','menghasilkan data customer telah mengirim barang',2,'Muhamad Eman Sulaeman',2),(11,'2021-09-14','Mencatat data customer mengirim barang -barang','17:00:00','19:02:00','19:58:00','menghasilkan data customer telah mengirim barang',2,'Muhamad Eman',3),(12,'2021-08-12','Mencatat data customer mengirim barang -barang','22:26:00','20:29:00','01:26:00','menghasilkan data customer telah mengirim barang',3,'Muhamad Eman Sulaeman',2);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(17) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `jenis_kelamin` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`nik`,`nama`,`tgl_lahir`,`email`,`password`,`jenis_kelamin`,`image`,`role_id`,`status`) values (2,'3209383006980001','Muhamad Eman Sulaeman','1998-06-30','muhamad.eman8@gmail.com','$2y$10$1/Jg98S.DAsylULSpZrWSO1R.fAi2nZUlKinSZtXxo6DIOsHDaqQa','Laki-Laki','default.png',2,1),(3,'3209383006980002','Salsa Bila','2021-08-01','pegawai@gmail.com','$2y$10$qEO.LZFIy36UPH42SGYMMOuU7.AxpudPMVBqfANGeSDOzipk8fWuC','Laki-Laki','default.png',1,1);

/*Table structure for table `user_akses_menu` */

DROP TABLE IF EXISTS `user_akses_menu`;

CREATE TABLE `user_akses_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  KEY `menu_id` (`menu_id`),
  CONSTRAINT `user_akses_menu_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`),
  CONSTRAINT `user_akses_menu_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `user_akses_menu` */

insert  into `user_akses_menu`(`id`,`role_id`,`menu_id`) values (1,1,1),(2,2,2);

/*Table structure for table `user_menu` */

DROP TABLE IF EXISTS `user_menu`;

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `user_menu` */

insert  into `user_menu`(`id`,`menu`,`status`) values (1,'Pegawai',1),(2,'Manager',1);

/*Table structure for table `user_role` */

DROP TABLE IF EXISTS `user_role`;

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `user_role` */

insert  into `user_role`(`id`,`role`) values (1,'Pegawai'),(2,'Manager');

/*Table structure for table `user_submenu` */

DROP TABLE IF EXISTS `user_submenu`;

CREATE TABLE `user_submenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_id` (`menu_id`),
  CONSTRAINT `user_submenu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `user_submenu` */

insert  into `user_submenu`(`id`,`menu_id`,`title`,`url`,`icon`,`status`) values (3,1,'Daily Report','pegawai/dailyreport','fas fa-fw far fa-newspaper',1),(4,2,'Daily Report','manager/daily','fas fa-fw far fa-newspaper',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
