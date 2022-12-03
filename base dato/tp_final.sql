/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.21-MariaDB : Database - tp_final
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tp_final` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `tp_final`;

/*Table structure for table `applications` */

DROP TABLE IF EXISTS `applications`;

CREATE TABLE `applications` (
  `studentId` int(11) NOT NULL,
  `id_JobOfert` int(11) NOT NULL,
  PRIMARY KEY (`studentId`,`id_JobOfert`),
  KEY `fk_id_JobOfert` (`id_JobOfert`),
  CONSTRAINT `fk_id_JobOfert` FOREIGN KEY (`id_JobOfert`) REFERENCES `job_ofert` (`id_JobOfert`),
  CONSTRAINT `fk_id_student` FOREIGN KEY (`studentId`) REFERENCES `student` (`studentId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `applications` */

insert  into `applications`(`studentId`,`id_JobOfert`) values 
(0,24),
(0,27),
(2,10),
(2,19),
(2,24),
(2,25),
(2,46),
(2,48),
(3,13);

/*Table structure for table `career` */

DROP TABLE IF EXISTS `career`;

CREATE TABLE `career` (
  `careerId` int(11) NOT NULL,
  `DESCRIPTION` varchar(100) NOT NULL,
  `activo` tinyint(1) DEFAULT NULL CHECK (`activo` in (1,0)),
  PRIMARY KEY (`careerId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `career` */

insert  into `career`(`careerId`,`DESCRIPTION`,`activo`) values 
(1,'Naval engineering',1),
(2,'Fishing engineering',0),
(3,'University technician in programming',1),
(4,'University technician in computer systems',1),
(5,'University technician in textile production',1),
(6,'University technician in administration',1),
(7,'Bachelor in environmental management',0),
(8,'University technician in environmental procedures and technologies',1);

/*Table structure for table `company` */

DROP TABLE IF EXISTS `company`;

CREATE TABLE `company` (
  `id_company` int(11) NOT NULL AUTO_INCREMENT,
  `CompanyName` varchar(50) NOT NULL,
  `BusinessName` varchar(50) NOT NULL,
  `CompanyAdress` varchar(100) NOT NULL,
  `cuil` float NOT NULL,
  `telephone` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `web` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_company`),
  UNIQUE KEY `unq_cuil` (`cuil`),
  UNIQUE KEY `unq_name` (`CompanyName`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `company` */

insert  into `company`(`id_company`,`CompanyName`,`BusinessName`,`CompanyAdress`,`cuil`,`telephone`,`email`,`web`,`password`) values 
(1,'acer','acer','Deán Funes 3350',4444440,4695038,'acer@outlook.com','acer.com.ar','123'),
(3,'laz','laz','Deán Funes 3350',1123,444,'lazgameplay@outlook.com','laz.com','123'),
(4,'donsatur','donsatur','Deán Funes 3358',4444440,41591561,'donsatur@outlook.com','donsatur.com','123'),
(5,'chuker','chuker','Deán Funes 33515',88962,27788,'admin@gmail.com','chuker.com','123');

/*Table structure for table `job` */

DROP TABLE IF EXISTS `job`;

CREATE TABLE `job` (
  `jobPositionId` int(11) NOT NULL,
  `careerId` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`jobPositionId`),
  KEY `fk_careerId` (`careerId`),
  CONSTRAINT `fk_careerId` FOREIGN KEY (`careerId`) REFERENCES `career` (`careerId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `job` */

insert  into `job`(`jobPositionId`,`careerId`,`description`) values 
(1,1,'Jr naval engineer'),
(2,1,'Ssr naval engineer'),
(3,1,'Sr naval engineer'),
(4,2,'Jr fisheries engineer'),
(5,2,'Ssr fisheries engineer'),
(6,2,'Sr fisheries engineer'),
(7,3,'Java Jr developer'),
(8,3,'PHP Jr developer'),
(9,3,'Ssr developer'),
(10,4,'Full Stack developer'),
(11,4,'Sr developer'),
(12,4,'Project manager'),
(13,4,'Scrum Master'),
(14,5,'Jr textile operator'),
(15,5,'Textile production assistant manager'),
(16,5,'Textile design assistant'),
(17,5,'Textile production supervisor'),
(18,6,'Head of administration'),
(19,6,'Management analyst'),
(20,6,'Administration intern'),
(21,7,'Environmental management specialist'),
(22,7,'Environmental management coordinator'),
(23,8,'Received technician');

/*Table structure for table `job_ofert` */

DROP TABLE IF EXISTS `job_ofert`;

CREATE TABLE `job_ofert` (
  `id_JobOfert` int(11) NOT NULL AUTO_INCREMENT,
  `id_company` int(11) NOT NULL,
  `jobPositionId` int(11) NOT NULL,
  `cargaHoraria` int(11) NOT NULL,
  `activo` tinyint(1) DEFAULT NULL CHECK (`activo` in (1,0)),
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `puesto` varchar(100) NOT NULL,
  `imagen` blob DEFAULT NULL,
  PRIMARY KEY (`id_JobOfert`),
  KEY `fk_id_compan` (`id_company`),
  KEY `fk_id_jobPosition` (`jobPositionId`),
  CONSTRAINT `fk_id_compan` FOREIGN KEY (`id_company`) REFERENCES `company` (`id_company`),
  CONSTRAINT `fk_id_jobPosition` FOREIGN KEY (`jobPositionId`) REFERENCES `job` (`jobPositionId`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4;

/*Data for the table `job_ofert` */

insert  into `job_ofert`(`id_JobOfert`,`id_company`,`jobPositionId`,`cargaHoraria`,`activo`,`titulo`,`descripcion`,`puesto`,`imagen`) values 
(4,3,2,10,1,'ingeniero naval de acer','hola funciona','Ssr naval engineer',NULL),
(8,1,23,15,1,'sub gerente','full time','Received technician',NULL),
(9,3,23,10,1,'ingeniero nav','medio tiempo ','Received technician',NULL),
(10,3,23,46,1,'tecnico','full time','Received technician',NULL),
(11,3,23,46,1,'tecnico 2','full time','Received technician',NULL),
(12,3,23,46,1,'tecnico 3','full time','Received technician',NULL),
(13,3,23,46,1,'tecnico 3','full time','Received technician',NULL),
(14,3,23,15,1,'hola','fsfafafaf','Received technician',NULL),
(15,3,23,15,1,'hola','fsfafafaf','Received technician',NULL),
(16,3,23,15,1,'hola','fsfafafaf','Received technician',NULL),
(18,1,11,36,1,'desarrollador  para acer','full time','Sr developer',NULL),
(19,1,11,36,1,'desarrollador  para acer','full time','Sr developer',NULL),
(20,1,11,36,1,'desarrollador  para acer','full time','Sr developer',NULL),
(21,1,11,36,1,'desarrollador  para acer','full time','Sr developer',NULL),
(23,3,2,30,1,'prueba3','prueba3prueba3','Ssr naval engineer','joboffer1.jpg'),
(24,3,6,20,1,'prueba4','prueba4prueba4','Sr fisheries engineer','joboffer3.jpg'),
(25,1,1,46,0,'ingeniero 5.0','full time','Jr naval engineer',''),
(26,3,2,30,1,'prueba3','prueba3prueba3','Ssr naval engineer','joboffer1.jpg'),
(27,3,6,20,1,'prueba4','prueba4prueba4','Sr fisheries engineer','joboffer3.jpg'),
(28,1,15,46,0,'subgerente textil acer','full time','Textile production assistant manager','joboffer1.jpg'),
(29,4,20,46,0,'administrativo beca','full time','Administration intern','universidad-Der.jpg'),
(30,4,13,46,0,'master don suatur','full time','Scrum Master','universidad-Der.jpg'),
(31,4,9,46,0,'desarrollador don satur','full time','Ssr developer','universidad-Der.jpg'),
(32,4,14,46,0,'operador don satur ','hola funciona','Jr textile operator','universidad-Der.jpg'),
(33,3,15,46,0,'subgerente laz','hola funciona','Textile production assistant manager','universidad-Der.jpg'),
(34,1,18,46,0,'jefe acer','full time','Head of administration','universidad-Der.jpg'),
(35,4,16,46,0,'asistente de don satur ','hola funciona','Textile design assistant','universidad-Der.jpg'),
(36,4,19,46,0,'analista donsatur','full time','Management analyst','universidad-Der.jpg'),
(37,3,21,46,0,'gestion ambiental laz','hola funciona','Environmental management specialist','universidad-Der.jpg'),
(38,1,22,46,0,'coordinador acer','hola funciona','Environmental management coordinator','universidad-Der.jpg'),
(39,3,23,46,0,'tecnico recibido laz','awdadawd','Received technician','universidad-Der.jpg'),
(40,1,13,46,0,'master acer','awdawdaw','Scrum Master','universidad-Der.jpg'),
(41,1,1,46,0,'ddadadawd','awdadawdawd','Jr naval engineer','joboffer3.jpg'),
(42,1,1,15,0,'rfawrfa','afafaw','Jr naval engineer','universidad-Der.jpg'),
(43,1,1,46,0,'ddddd','qwqwqwqw','Jr naval engineer','universidad-Der.jpg'),
(44,1,1,46,0,'fawfawfawf','fafawfawfaf','Jr naval engineer',''),
(45,1,1,46,0,'rawfawf','fawfafawf','Jr naval engineer','universidad-Der.jpg'),
(46,1,1,46,0,'awfawfawfafawf','awfafafaf','Jr naval engineer','joboffer1.jpg'),
(48,1,5,46,0,'pesquero acer','full time','Ssr fisheries engineer','joboffer3.jpg'),
(49,1,23,46,0,'tecnico 6.0','full time','Received technician','joboffer1.jpg'),
(50,1,1,46,0,'naval acer 2.0','hola funciona','Jr naval engineer','joboffer2.jpg');

/*Table structure for table `student` */

DROP TABLE IF EXISTS `student`;

CREATE TABLE `student` (
  `studentId` int(11) NOT NULL,
  `careerId` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `dni` varchar(50) NOT NULL,
  `fileNumber` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `birthDate` date DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phoneNumber` varchar(50) NOT NULL,
  `activo` tinyint(1) DEFAULT NULL CHECK (`activo` in (1,0)),
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`studentId`),
  UNIQUE KEY `unq_dni` (`dni`),
  UNIQUE KEY `unq_email` (`email`),
  UNIQUE KEY `unq_fileNumber` (`fileNumber`),
  KEY `fk_career` (`careerId`),
  CONSTRAINT `fk_career` FOREIGN KEY (`careerId`) REFERENCES `career` (`careerId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `student` */

insert  into `student`(`studentId`,`careerId`,`firstName`,`lastName`,`dni`,`fileNumber`,`gender`,`birthDate`,`email`,`phoneNumber`,`activo`,`password`) values 
(0,2,'pepe','perez','151818','1125185','Agender','0000-00-00','nahuelarielz1234@outlook.com','5998419',1,'123'),
(2,5,'Wyatan','Lorant','63-025-8112','01-777-6891','Non-binary','2021-02-23','wlorant1@sbwire.com','171-448-9062',1,'123'),
(3,2,'Alanson','Seemmonds','06-684-0100','89-621-0940','Agender','2021-07-03','aseemmonds2@upenn.edu','961-404-8720',1,'123'),
(5,2,'jun','alonzo','5615961','5261561','agender','2021-11-18','arielz1234@outlook.com','56156',1,'123');

/*Table structure for table `useadmin` */

DROP TABLE IF EXISTS `useadmin`;

CREATE TABLE `useadmin` (
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `useadmin` */

insert  into `useadmin`(`email`,`password`) values 
('admin@gmail.com','123');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

/*
CREATE TABLE files( id_file int AUTO_INCREMENT not null,
                  nameFile VARCHAR(50) NOT NULL,
                  idStudent INT NOT NULL, 
                  constraint id_file PRIMARY KEY(id_file),
                  CONSTRAINT fk_idStudent FOREIGN KEY (idStudent) REFERENCES student(studentId));*/
     CREATE TABLE `files` (
  `idFiles` int AUTO_INCREMENT not null,
  `nameFiles` varchar(200) NOT NULL,
  `ruta` varchar(200) NOT NULL,
  `tipo` varchar(200) NOT NULL,
  `size` int(50) NOT NULL,
  constraint idFiles PRIMARY KEY(idFiles)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
