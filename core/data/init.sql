/*
SQLyog Enterprise - MySQL GUI v8.14 
MySQL - 5.5.27 : Database - campus
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`campus` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;

USE `campus`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `a_login` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `a_password` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `super_admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`id`,`a_login`,`a_password`,`name`,`super_admin`) values (1,'admin','e6c10ba2c8c5ec1961035486ba3781b5cf75ed02','Admin',1),(2,'manager1','e1cb4428c46408cd3ffb9ba810cc7c833f6c9621','manager1',0);

/*Table structure for table `admin_activity_log` */

DROP TABLE IF EXISTS `admin_activity_log`;

CREATE TABLE `admin_activity_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `ip` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '127.0.0.1',
  `admin_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'unknown',
  `entity` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `additional` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `admin_activity_log` */

insert  into `admin_activity_log`(`id`,`date`,`ip`,`admin_name`,`action`,`entity`,`message`,`additional`) values (1,'2014-01-11 22:58:47','127.0.0.1','Admin (admin)','login',NULL,'Admin (admin) logged in',NULL),(2,'2014-01-14 23:32:48','127.0.0.1','Admin (admin)','login',NULL,'Admin (admin) logged in',NULL),(3,'2014-01-14 23:33:25','127.0.0.1','Admin (admin)','create','admin','Admin (admin) added new admin manager1 (#)','Attributes:  \"super_admin\" = \"0\", \"a_login\" = \"manager1\", \"name\" = \"manager1\", \"a_password\" = \"7647c210c9d978747cf2e2e12470fc275e5b1ddd\", \"id\" = \"2\",'),(4,'2014-01-14 23:33:32','127.0.0.1','Admin (admin)','logout',NULL,'Admin (admin) logged out',NULL),(5,'2014-01-14 23:33:58','127.0.0.1','Admin (admin)','login',NULL,'Admin (admin) logged in',NULL),(6,'2014-01-14 23:35:06','127.0.0.1','Admin (admin)','login',NULL,'Admin (admin) logged in',NULL),(7,'2014-01-14 23:35:22','127.0.0.1','Admin (admin)','update','admin','Admin (admin) updated admin manager1 (#)','Changed attributes \"a_password\" from \"7647c210c9d978747cf2e2e12470fc275e5b1ddd\" to \"e1cb4428c46408cd3ffb9ba810cc7c833f6c9621\",'),(8,'2014-01-14 23:35:28','127.0.0.1','Admin (admin)','logout',NULL,'Admin (admin) logged out',NULL),(9,'2014-01-14 23:35:34','127.0.0.1','manager1 (manager1)','login',NULL,'manager1 (manager1) logged in',NULL),(10,'2014-01-14 23:36:25','127.0.0.1','manager1 (manager1)','logout',NULL,'manager1 (manager1) logged out',NULL),(11,'2014-01-14 23:36:34','127.0.0.1','Admin (admin)','login',NULL,'Admin (admin) logged in',NULL);

/*Table structure for table `file` */

DROP TABLE IF EXISTS `file`;

CREATE TABLE `file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `material_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_file` FOREIGN KEY (`id`) REFERENCES `material` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `file` */

/*Table structure for table `kind` */

DROP TABLE IF EXISTS `kind`;

CREATE TABLE `kind` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `desc` text COLLATE utf8_bin,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `kind` */

insert  into `kind`(`id`,`title`,`desc`) values (1,'лекція',NULL);

/*Table structure for table `material` */

DROP TABLE IF EXISTS `material`;

CREATE TABLE `material` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `desc` text COLLATE utf8_bin,
  `author_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `subj_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `kind_id` int(11) DEFAULT NULL,
  `term` decimal(1,0) DEFAULT NULL COMMENT 'семестр 1-12',
  `year` year(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_material` (`teacher_id`),
  KEY `FK_sub` (`subj_id`),
  KEY `FK_kind` (`kind_id`),
  KEY `FK_type` (`type_id`),
  CONSTRAINT `FK_kind` FOREIGN KEY (`kind_id`) REFERENCES `kind` (`id`),
  CONSTRAINT `FK_material` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`),
  CONSTRAINT `FK_sub` FOREIGN KEY (`subj_id`) REFERENCES `subject` (`id`),
  CONSTRAINT `FK_type` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `material` */

insert  into `material`(`id`,`title`,`desc`,`author_id`,`teacher_id`,`subj_id`,`type_id`,`kind_id`,`term`,`year`,`created`,`updated`,`status`) values (1,'Шпора',NULL,NULL,1,1,1,1,'9',NULL,NULL,NULL,0);

/*Table structure for table `subject` */

DROP TABLE IF EXISTS `subject`;

CREATE TABLE `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` int(11) DEFAULT NULL,
  `desc` text COLLATE utf8_bin,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `subject` */

insert  into `subject`(`id`,`title`,`desc`) values (1,0,NULL),(2,0,NULL),(3,0,NULL),(4,0,NULL);

/*Table structure for table `tbl_migration` */

DROP TABLE IF EXISTS `tbl_migration`;

CREATE TABLE `tbl_migration` (
  `version` varchar(255) COLLATE utf8_bin NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `tbl_migration` */

insert  into `tbl_migration`(`version`,`apply_time`) values ('m000000_000000_base',1389474750),('m120410_144815_addFirstAdmin',1389474753);

/*Table structure for table `teacher` */

DROP TABLE IF EXISTS `teacher`;

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `desc` text COLLATE utf8_bin,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `teacher` */

insert  into `teacher`(`id`,`name`,`desc`) values (1,'Smirnov',NULL),(2,'Учитель2',NULL),(3,'Учитель3',NULL),(4,'Учитель4',NULL),(5,'Учитель5',NULL);

/*Table structure for table `type` */

DROP TABLE IF EXISTS `type`;

CREATE TABLE `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `desc` text COLLATE utf8_bin,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `type` */

insert  into `type`(`id`,`title`,`desc`) values (1,'тип1',NULL),(2,'тип2',NULL),(3,'тип3',NULL),(4,'тип4',NULL),(5,'тип5',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
