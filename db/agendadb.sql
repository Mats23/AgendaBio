/*
SQLyog Community v12.5.0 (32 bit)
MySQL - 5.7.20-log : Database - agendabio
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`agendabio` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `agendabio`;

/*Table structure for table `agendamento` */

DROP TABLE IF EXISTS `agendamento`;

CREATE TABLE `agendamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_paciente` int(11) NOT NULL,
  `data` date NOT NULL,
  `atendido` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_paciente` (`id_paciente`),
  CONSTRAINT `agendamento_ibfk_2` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

/*Data for the table `agendamento` */

insert  into `agendamento`(`id`,`id_paciente`,`data`,`atendido`) values 
(50,38,'2018-02-22',1),
(51,36,'2018-01-18',1),
(53,46,'2018-02-09',1);

/*Table structure for table `contato` */

DROP TABLE IF EXISTS `contato`;

CREATE TABLE `contato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_paciente` int(11) DEFAULT NULL,
  `tipo` varchar(40) DEFAULT NULL,
  `numero` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contato_ibfk_1` (`id_paciente`),
  CONSTRAINT `contato_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;

/*Data for the table `contato` */

insert  into `contato`(`id`,`id_paciente`,`tipo`,`numero`) values 
(62,36,'celular','71993760967'),
(63,36,'celular2','7193760967'),
(64,36,'comercial','77777777777'),
(65,36,'residencial','71330089473'),
(70,38,'celular','77777777777'),
(71,38,'celular2','88888888888');

/*Table structure for table `endereco` */

DROP TABLE IF EXISTS `endereco`;

CREATE TABLE `endereco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_paciente` int(11) DEFAULT NULL,
  `rua` varchar(40) DEFAULT NULL,
  `bairro` varchar(40) DEFAULT NULL,
  `cidade` varchar(40) DEFAULT NULL,
  `numero_residencia` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_paciente` (`id_paciente`),
  CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

/*Data for the table `endereco` */

insert  into `endereco`(`id`,`id_paciente`,`rua`,`bairro`,`cidade`,`numero_residencia`) values 
(11,36,'Travessa Daiane Matos','Periperi','Salvador','3'),
(13,38,'Travessa Daiane Matos','Periperi','Salvador','10'),
(17,NULL,'Travessa Daiane Matos','Periperi','Salvador','3'),
(18,43,'Travessa Daiane Matos','Periperi','Salvador','3'),
(19,44,'Travessa Daiane Matos','Periperi','Salvador','3'),
(20,45,'Travessa Daiane Matos','Periperi','Salvador','3'),
(21,46,'dez','vinte','Salvador','20');

/*Table structure for table `observacao` */

DROP TABLE IF EXISTS `observacao`;

CREATE TABLE `observacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_agendamento` int(11) DEFAULT NULL,
  `informacao` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_agendamento` (`id_agendamento`),
  CONSTRAINT `observacao_ibfk_1` FOREIGN KEY (`id_agendamento`) REFERENCES `agendamento` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

/*Data for the table `observacao` */

insert  into `observacao`(`id`,`id_agendamento`,`informacao`) values 
(25,50,'yyyyyyyyyyyyyy'),
(26,51,'mais um'),
(30,53,'ppp');

/*Table structure for table `paciente` */

DROP TABLE IF EXISTS `paciente`;

CREATE TABLE `paciente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mp` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `idade` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `numero_contato` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

/*Data for the table `paciente` */

insert  into `paciente`(`id`,`mp`,`nome`,`idade`,`email`,`numero_contato`) values 
(36,640001,'Mateus Vinicius Mota',25,'mateus@gmail.com','71993760967 / 7133089473'),
(38,130001,'Jose',30,'jose@gmail.com',''),
(43,830001,'Mateus Vinicius',5,'aa@a','(71) 993760967/ (71)993760967 '),
(44,820001,'Mateus Vinicius',5,'aa@a','(71) 993760967 / (71) 93760967 / (77) 777777777/(71) 33089473'),
(45,930001,'Mateus Vinicius',5,'aa@a','(71) 993760967/(71) 93760967/(77) 777777777/(71) 33089473'),
(46,730001,'Andre',80,'aa@abbbbb','(71) 993760967/(33) 333333333/(88) 888888888/555) 555555555');

/*Table structure for table `tipo_usuario` */

DROP TABLE IF EXISTS `tipo_usuario`;

CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nivel` int(11) NOT NULL,
  `cargo` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `tipo_usuario` */

insert  into `tipo_usuario`(`id`,`nivel`,`cargo`) values 
(1,1,'telefonista'),
(2,2,'medico'),
(3,3,'administrador');

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tipo` (`id_tipo`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

/*Data for the table `usuario` */

insert  into `usuario`(`id`,`nome`,`id_tipo`,`email`,`senha`) values 
(1,'Mateus',3,'mateussvinicius22@gmail.com','21232f297a57a5a743894a0e4a801fc3'),
(10,'Julia',1,'ju.silva@gmail.com','e10adc3949ba59abbe56e057f20f883e');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
