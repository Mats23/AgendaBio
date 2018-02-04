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
(1,'Mateus',3,'mateussvinicius22@gmail.com','202cb962ac59075b964b07152d234b70');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
