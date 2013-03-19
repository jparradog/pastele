/*
SQLyog Enterprise - MySQL GUI v7.13 
MySQL - 5.0.45-community-nt : Database - panaderia
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`panaderia` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `panaderia`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `idadmin` bigint(10) NOT NULL auto_increment,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY  (`idadmin`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

LOCK TABLES `admin` WRITE;

insert  into `admin`(`idadmin`,`usuario`,`clave`,`tipo`) values (1,'admin','admin','administrador'),(2,'empleado','empleado','usuario');

UNLOCK TABLES;

/*Table structure for table `albaran` */

DROP TABLE IF EXISTS `albaran`;

CREATE TABLE `albaran` (
  `idalbaran` bigint(10) NOT NULL auto_increment,
  `idcliente` bigint(10) NOT NULL,
  `fecha` date NOT NULL,
  `total` float NOT NULL,
  `anulada` int(11) default NULL,
  `numeroalb` bigint(20) NOT NULL,
  PRIMARY KEY  (`idalbaran`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `albaran` */

LOCK TABLES `albaran` WRITE;

insert  into `albaran`(`idalbaran`,`idcliente`,`fecha`,`total`,`anulada`,`numeroalb`) values (1,1,'2012-10-25',21.02,0,1),(2,3,'2012-10-25',53.62,0,2),(3,1,'2012-10-25',59.15,0,3);

UNLOCK TABLES;

/*Table structure for table `cliente` */

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `idcliente` bigint(10) NOT NULL auto_increment,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) default NULL,
  `cuit` varchar(50) NOT NULL default '',
  `dni` varchar(50) NOT NULL,
  `email` varchar(100) default NULL,
  `iddomicilio` bigint(10) NOT NULL,
  `2apellido` varchar(50) default NULL,
  PRIMARY KEY  (`idcliente`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `cliente` */

LOCK TABLES `cliente` WRITE;

insert  into `cliente`(`idcliente`,`nombre`,`apellido`,`cuit`,`dni`,`email`,`iddomicilio`,`2apellido`) values (1,'JuanÂ Roman','Riquelme','20-21369259-9','21569258','juanrom10@gmail.com',1,'Almada'),(2,'Gabriel','Gaudio','21-29369258-9','29369258','ggaudio@hotmail.com',2,'Romero'),(3,'Lauro','Morales','20-37987654-7','37987654','sebmorales@hotmail.com',3,'Gomez'),(4,'Enrique','Ruiz','20-31654321-1','31654321','pituenrique@gmail.com',6,'Blanco'),(6,'Renzo','Ontivero','218752139','1231296','renn.carp@gmail.com',10,'Samsung');

UNLOCK TABLES;

/*Table structure for table `domicilio` */

DROP TABLE IF EXISTS `domicilio`;

CREATE TABLE `domicilio` (
  `iddomicilio` bigint(10) NOT NULL auto_increment,
  `calle` varchar(100) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `localidad` varchar(100) NOT NULL,
  PRIMARY KEY  (`iddomicilio`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `domicilio` */

LOCK TABLES `domicilio` WRITE;

insert  into `domicilio`(`iddomicilio`,`calle`,`numero`,`localidad`) values (1,'GuiÃ±azu','111','Guaymallen'),(2,'Holmes','241','Guaymallen'),(3,'LosÂ fresnos','102','Palmira'),(5,'Azabache','189','Guaymallen'),(6,'San&nbsp;MartÃ­n','21','Maipu'),(7,'PitufoCalle','21','Pitulandia'),(8,'Cabildo','287','Guaymallen'),(9,'RioÂ Pilcomayo','2016','Guaymallen'),(10,'RioÂ Pilcomayo','2016','Maipu'),(11,'asd','123','asd');

UNLOCK TABLES;

/*Table structure for table `factura` */

DROP TABLE IF EXISTS `factura`;

CREATE TABLE `factura` (
  `idfactura` bigint(10) NOT NULL auto_increment,
  `idcliente` bigint(10) NOT NULL,
  `fecha` date NOT NULL,
  `total` float NOT NULL,
  `numerofactura` bigint(20) default NULL,
  `anulada` bigint(2) NOT NULL,
  `totaliva` float default NULL,
  `totalneto` float default NULL,
  PRIMARY KEY  (`idfactura`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `factura` */

LOCK TABLES `factura` WRITE;

insert  into `factura`(`idfactura`,`idcliente`,`fecha`,`total`,`numerofactura`,`anulada`,`totaliva`,`totalneto`) values (1,6,'2012-10-25',19.64,1,1,1.78,17.86),(2,1,'2012-10-25',219.95,2,0,20,199.95),(3,6,'2012-10-25',17.21,3,0,1.56,15.65),(4,1,'2012-10-25',41.82,4,0,3.8,38.02),(5,0,'0000-00-00',0,0,0,0,0),(6,2,'2012-10-25',14.08,1,0,1.27,12.81),(7,3,'2012-10-25',1.54,2,1,0.14,1.4),(8,6,'2012-10-25',20.88,3,0,1.9,18.98),(9,3,'2012-10-25',46.1,5,0,4.19,41.91),(10,0,'0000-00-00',0,0,0,0,0),(11,6,'2012-10-25',48.77,3,0,4.43,44.34),(12,4,'2012-10-25',29.49,4,0,2.68,26.81);

UNLOCK TABLES;

/*Table structure for table `facturasimple` */

DROP TABLE IF EXISTS `facturasimple`;

CREATE TABLE `facturasimple` (
  `idfacturasimple` bigint(20) NOT NULL auto_increment,
  `numerofacturasimple` bigint(20) NOT NULL,
  `idcliente` bigint(20) NOT NULL,
  `fecha` date NOT NULL,
  `totalneto` float NOT NULL,
  `totaliva` float NOT NULL,
  `total` float NOT NULL,
  `anulada` int(11) NOT NULL,
  PRIMARY KEY  (`idfacturasimple`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `facturasimple` */

LOCK TABLES `facturasimple` WRITE;

insert  into `facturasimple`(`idfacturasimple`,`numerofacturasimple`,`idcliente`,`fecha`,`totalneto`,`totaliva`,`total`,`anulada`) values (8,1,1,'2012-10-23',70.88,7.88,78.75,0),(9,2,1,'2012-10-23',30.79,3.42,34.21,1),(10,3,6,'2012-10-23',19.76,2.2,21.96,0),(11,4,6,'2012-10-23',29.2,4.43,33.63,1),(12,5,2,'2012-10-23',1150.8,61.2,1212,0),(13,6,1,'2012-10-23',50.51,5.61,56.12,0),(14,7,1,'2012-10-25',27.9,3.1,31,0),(15,4,3,'2012-10-25',15.48,1.72,17.2,0),(16,6,6,'2012-10-25',33.45,2.16,35.6,0),(17,0,0,'0000-00-00',0,0,0,0),(18,1,6,'2012-10-25',38.58,4.29,42.87,0),(19,2,3,'2012-10-25',101.74,26.23,127.97,0),(20,5,4,'2012-10-25',29.45,1.55,31,0);

UNLOCK TABLES;

/*Table structure for table `gastos_varios` */

DROP TABLE IF EXISTS `gastos_varios`;

CREATE TABLE `gastos_varios` (
  `idgastos` bigint(10) NOT NULL auto_increment,
  `descripcion` varchar(100) NOT NULL,
  `precio` float NOT NULL,
  `fecha` date NOT NULL,
  `iva` float NOT NULL,
  PRIMARY KEY  (`idgastos`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `gastos_varios` */

LOCK TABLES `gastos_varios` WRITE;

insert  into `gastos_varios`(`idgastos`,`descripcion`,`precio`,`fecha`,`iva`) values (1,'Sal',10,'2012-10-23',1.21),(2,'Huevos',10,'2012-10-23',1.1),(3,'MÃ³vil',119,'2012-10-23',19),(4,'Sal',10,'2012-01-01',1.21),(5,'Sal',15,'2012-01-15',2.2),(6,'Huevos',30,'2012-02-01',4.5),(7,'Sal',10,'2012-02-15',1.21),(8,'MÃ³vil',119,'2012-03-01',21),(9,'Nextel',100,'2012-03-15',10),(10,'Movil',119,'2012-11-01',10),(11,'Nextel',100,'2012-11-15',10),(12,'Huevos',30,'2012-12-01',10),(13,'Fijo',300,'2012-12-15',30),(14,'Movil',100,'2012-07-13',21),(15,'Luz',515.75,'2012-01-01',92.84),(16,'Luz',515.75,'2012-02-01',92.84),(17,'Luz',515.75,'2012-03-01',92.84),(18,'Luz',515.75,'2012-04-01',92.84),(19,'Luz',515.75,'2012-06-01',9),(20,'Luz',515.75,'2012-07-01',92.84),(21,'Luz',515.75,'2012-08-01',92.84),(22,'Luz',515.72,'2012-09-23',92.84);

UNLOCK TABLES;

/*Table structure for table `impuesto` */

DROP TABLE IF EXISTS `impuesto`;

CREATE TABLE `impuesto` (
  `idiva` int(11) NOT NULL auto_increment,
  `iva` float default NULL,
  PRIMARY KEY  (`idiva`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `impuesto` */

LOCK TABLES `impuesto` WRITE;

insert  into `impuesto`(`idiva`,`iva`) values (1,10),(2,4),(3,8),(4,21),(5,66),(6,5);

UNLOCK TABLES;

/*Table structure for table `listaprecio` */

DROP TABLE IF EXISTS `listaprecio`;

CREATE TABLE `listaprecio` (
  `idprecio` bigint(10) NOT NULL auto_increment,
  `idcliente` bigint(10) NOT NULL,
  `idproducto` bigint(10) NOT NULL,
  `precio` float NOT NULL,
  PRIMARY KEY  (`idprecio`)
) ENGINE=MyISAM AUTO_INCREMENT=491 DEFAULT CHARSET=latin1;

/*Data for the table `listaprecio` */

LOCK TABLES `listaprecio` WRITE;

insert  into `listaprecio`(`idprecio`,`idcliente`,`idproducto`,`precio`) values (1,1,1,12),(2,1,2,0.26),(3,1,3,0.18),(4,1,4,0.61),(5,1,5,0.35),(6,1,6,1.2),(7,1,7,0.61),(8,1,8,0.61),(9,1,9,0.61),(10,1,10,0.61),(11,1,11,0.35),(12,1,12,0.63),(13,1,13,0.61),(14,1,14,0.83),(15,1,15,0.72),(16,1,16,0.94),(17,1,17,1),(18,1,18,0.61),(19,1,19,0.61),(20,1,20,0.8),(21,1,21,0.66),(22,1,22,0.66),(23,1,23,0.94),(24,1,24,0.94),(25,1,25,0.94),(26,1,26,0.94),(27,1,27,0.94),(28,1,28,0.94),(29,1,29,0.94),(30,1,30,0.94),(31,1,31,0.94),(32,1,32,0.94),(33,1,33,0.94),(34,1,34,0.94),(35,1,35,0.94),(36,1,36,0.94),(37,1,37,0.94),(38,1,38,1.05),(39,1,39,1.05),(40,1,40,0.84),(41,1,41,0.61),(42,1,42,1.2),(43,1,43,0.7),(44,1,44,0.7),(45,1,45,0.7),(46,1,46,0.95),(47,1,47,1.25),(48,1,48,1.25),(49,1,49,0.85),(50,1,50,1.47),(51,1,51,1.25),(52,1,52,1.25),(53,1,53,0.75),(54,1,54,0.7),(55,1,55,0.95),(56,1,56,0.9),(57,1,57,0.95),(58,1,58,0.7),(59,1,59,0.7),(60,1,60,1.25),(61,1,61,0.74),(62,1,62,0.58),(63,1,63,0.7),(64,1,64,9.5),(65,1,65,10.15),(66,1,66,11),(67,1,67,8.1),(68,1,68,11),(69,1,69,9.05),(70,1,70,6.56),(71,1,71,7.72),(72,1,72,2.45),(73,1,73,7),(74,1,74,7.2),(75,1,75,7.98),(76,1,76,8.4),(77,1,77,1),(78,1,78,6.56),(79,1,79,9.98),(80,1,80,0.61),(81,1,81,0.58),(82,1,82,5.1),(83,1,83,13),(84,1,84,16.9),(85,1,85,13.9),(86,1,86,18.4),(87,1,87,9.9),(88,1,88,12.3),(89,1,89,10.6),(90,1,90,13.4),(91,1,91,6),(92,1,92,5),(93,1,93,6.2),(94,1,94,0.2),(95,1,95,1.2),(96,1,96,0.45),(97,2,1,0.5),(98,2,2,0.26),(99,2,3,0.18),(100,2,4,0.61),(101,2,5,0.35),(102,2,6,1.2),(103,2,7,0.61),(104,2,8,0.61),(105,2,9,0.61),(106,2,10,0.61),(107,2,11,0.35),(108,2,12,0.63),(109,2,13,0.61),(110,2,14,0.83),(111,2,15,0.72),(112,2,16,0.94),(113,2,17,1),(114,2,18,0.61),(115,2,19,0.61),(116,2,20,0.8),(117,2,21,0.66),(118,2,22,0.66),(119,2,23,0.94),(120,2,24,0.94),(121,2,25,0.94),(122,2,26,0.94),(123,2,27,0.94),(124,2,28,0.94),(125,2,29,0.94),(126,2,30,0.94),(127,2,31,0.94),(128,2,32,0.94),(129,2,33,0.94),(130,2,34,0.94),(131,2,35,0.94),(132,2,36,0.94),(133,2,37,0.94),(134,2,38,1.05),(135,2,39,1.05),(136,2,40,0.84),(137,2,41,0.61),(138,2,42,1.2),(139,2,43,0.7),(140,2,44,0.7),(141,2,45,0.7),(142,2,46,0.95),(143,2,47,1.25),(144,2,48,1.25),(145,2,49,0.85),(146,2,50,1.47),(147,2,51,1.25),(148,2,52,1.25),(149,2,53,0.75),(150,2,54,0.7),(151,2,55,0.95),(152,2,56,0.9),(153,2,57,0.95),(154,2,58,0.7),(155,2,59,0.7),(156,2,60,1.25),(157,2,61,0.74),(158,2,62,0.58),(159,2,63,0.7),(160,2,64,9.5),(161,2,65,10.15),(162,2,66,11),(163,2,67,8.1),(164,2,68,11),(165,2,69,9.05),(166,2,70,6.56),(167,2,71,7.72),(168,2,72,2.45),(169,2,73,7),(170,2,74,7.2),(171,2,75,7.98),(172,2,76,8.4),(173,2,77,1),(174,2,78,6.56),(175,2,79,9.98),(176,2,80,0.61),(177,2,81,0.58),(178,2,82,5.1),(179,2,83,13),(180,2,84,16.9),(181,2,85,13.9),(182,2,86,18.4),(183,2,87,9.9),(184,2,88,12.3),(185,2,89,10.6),(186,2,90,13.4),(187,2,91,6),(188,2,92,5),(189,2,93,6.2),(190,2,94,0.2),(191,2,95,1.2),(192,2,96,0.45),(193,1,97,4),(194,2,97,4),(195,3,1,0.5),(196,3,2,0.26),(197,3,3,0.18),(198,3,4,0.61),(199,3,5,0.35),(200,3,6,1.2),(201,3,7,0.61),(202,3,8,0.61),(203,3,9,0.61),(204,3,10,0.61),(205,3,11,0.35),(206,3,12,0.63),(207,3,13,0.61),(208,3,14,0.83),(209,3,15,0.72),(210,3,16,0.94),(211,3,17,1),(212,3,18,0.61),(213,3,19,0.61),(214,3,20,0.8),(215,3,21,0.66),(216,3,22,0.66),(217,3,23,0.94),(218,3,24,0.94),(219,3,25,0.94),(220,3,26,0.94),(221,3,27,0.94),(222,3,28,0.94),(223,3,29,0.94),(224,3,30,0.94),(225,3,31,0.94),(226,3,32,0.94),(227,3,33,0.94),(228,3,34,0.94),(229,3,35,0.94),(230,3,36,0.94),(231,3,37,0.94),(232,3,38,1.05),(233,3,39,1.05),(234,3,40,0.84),(235,3,41,0.61),(236,3,42,1.2),(237,3,43,0.7),(238,3,44,0.7),(239,3,45,0.7),(240,3,46,0.95),(241,3,47,1.25),(242,3,48,1.25),(243,3,49,0.85),(244,3,50,1.47),(245,3,51,1.25),(246,3,52,1.25),(247,3,53,0.75),(248,3,54,0.7),(249,3,55,0.95),(250,3,56,0.9),(251,3,57,0.95),(252,3,58,0.7),(253,3,59,0.7),(254,3,60,1.25),(255,3,61,0.74),(256,3,62,0.58),(257,3,63,0.7),(258,3,64,9.5),(259,3,65,10.15),(260,3,66,11),(261,3,67,8.1),(262,3,68,11),(263,3,69,9.05),(264,3,70,6.56),(265,3,71,7.72),(266,3,72,2.45),(267,3,73,7),(268,3,74,7.2),(269,3,75,7.98),(270,3,76,8.4),(271,3,77,1),(272,3,78,6.56),(273,3,79,9.98),(274,3,80,0.61),(275,3,81,0.58),(276,3,82,5.1),(277,3,83,13),(278,3,84,16.9),(279,3,85,13.9),(280,3,86,18.4),(281,3,87,9.9),(282,3,88,12.3),(283,3,89,10.6),(284,3,90,13.4),(285,3,91,6),(286,3,92,5),(287,3,93,6.2),(288,3,94,0.2),(289,3,95,1.2),(290,3,96,0.45),(291,3,97,4),(292,1,98,2),(293,2,98,3),(294,3,98,2),(295,6,1,2),(296,6,2,0.26),(297,6,3,0.18),(298,6,4,0.61),(299,6,5,0.35),(300,6,6,1.2),(301,6,7,0.61),(302,6,8,0.61),(303,6,9,0.61),(304,6,10,0.61),(305,6,11,0.35),(306,6,12,0.63),(307,6,13,0.61),(308,6,14,0.83),(309,6,15,0.72),(310,6,16,0.94),(311,6,17,1),(312,6,18,0.61),(313,6,19,0.61),(314,6,20,0.8),(315,6,21,0.66),(316,6,22,0.66),(317,6,23,0.94),(318,6,24,0.94),(319,6,25,0.94),(320,6,26,0.94),(321,6,27,0.94),(322,6,28,0.94),(323,6,29,0.94),(324,6,30,0.94),(325,6,31,0.94),(326,6,32,0.94),(327,6,33,0.94),(328,6,34,0.94),(329,6,35,0.94),(330,6,36,0.94),(331,6,37,0.94),(332,6,38,1.05),(333,6,39,1.05),(334,6,40,0.84),(335,6,41,0.61),(336,6,42,1.2),(337,6,43,0.7),(338,6,44,0.7),(339,6,45,0.7),(340,6,46,0.95),(341,6,47,1.25),(342,6,48,1.25),(343,6,49,0.85),(344,6,50,1.47),(345,6,51,1.25),(346,6,52,1.25),(347,6,53,0.75),(348,6,54,0.7),(349,6,55,0.95),(350,6,56,0.9),(351,6,57,0.95),(352,6,58,0.7),(353,6,59,0.7),(354,6,60,1.25),(355,6,61,0.74),(356,6,62,0.58),(357,6,63,0.7),(358,6,64,9.5),(359,6,65,10.15),(360,6,66,11),(361,6,67,8.1),(362,6,68,11),(363,6,69,9.05),(364,6,70,6.56),(365,6,71,7.72),(366,6,72,2.45),(367,6,73,7),(368,6,74,7.2),(369,6,75,7.98),(370,6,76,8.4),(371,6,77,1),(372,6,78,6.56),(373,6,79,9.98),(374,6,80,0.61),(375,6,81,0.58),(376,6,82,5.1),(377,6,83,13),(378,6,84,16.9),(379,6,85,13.9),(380,6,86,18.4),(381,6,87,9.9),(382,6,88,12.3),(383,6,89,10.6),(384,6,90,13.4),(385,6,91,6),(386,6,92,5),(387,6,93,6.2),(388,6,94,0.2),(389,6,95,1.2),(390,6,96,0.45),(391,6,97,4),(392,6,98,4),(393,4,1,1.23),(394,4,2,0.26),(395,4,3,1.18),(396,4,4,0.61),(397,4,5,0.35),(398,4,6,1.2),(399,4,7,0.61),(400,4,8,0.61),(401,4,9,0.61),(402,4,10,2.3),(403,4,11,0.35),(404,4,12,1.63),(405,4,13,0.61),(406,4,14,1.83),(407,4,15,0.72),(408,4,16,0.94),(409,4,17,3.12),(410,4,18,0.61),(411,4,19,0.61),(412,4,20,0.8),(413,4,21,0.66),(414,4,22,0.66),(415,4,23,0.94),(416,4,24,0.94),(417,4,25,0.94),(418,4,26,0.94),(419,4,27,0.94),(420,4,28,0.94),(421,4,29,0.94),(422,4,30,0.94),(423,4,31,0.94),(424,4,32,0.94),(425,4,33,0.94),(426,4,34,0.94),(427,4,35,0.94),(428,4,36,0.94),(429,4,37,0.94),(430,4,38,1.05),(431,4,39,1.05),(432,4,40,0.84),(433,4,41,0.61),(434,4,42,1.2),(435,4,43,0.7),(436,4,44,0.7),(437,4,45,0.7),(438,4,46,0.95),(439,4,47,1.25),(440,4,48,1.25),(441,4,49,0.85),(442,4,50,1.47),(443,4,51,1.25),(444,4,52,1.25),(445,4,53,0.75),(446,4,54,0.7),(447,4,55,0.95),(448,4,56,0.9),(449,4,57,0.95),(450,4,58,0.7),(451,4,59,0.7),(452,4,60,1.25),(453,4,61,0.74),(454,4,62,0.58),(455,4,63,0.7),(456,4,64,9.5),(457,4,65,10.15),(458,4,66,11),(459,4,67,8.1),(460,4,68,11),(461,4,69,9.05),(462,4,70,6.56),(463,4,71,7.72),(464,4,72,2.45),(465,4,73,7),(466,4,74,7.2),(467,4,75,7.98),(468,4,76,8.4),(469,4,77,1),(470,4,78,6.56),(471,4,79,9.98),(472,4,80,0.61),(473,4,81,0.58),(474,4,82,5.1),(475,4,83,13),(476,4,84,16.9),(477,4,85,13.9),(478,4,86,18.4),(479,4,87,9.9),(480,4,88,12.3),(481,4,89,10.6),(482,4,90,13.4),(483,4,91,6),(484,4,92,5),(485,4,93,6.2),(486,4,94,0.2),(487,4,95,1.2),(488,4,96,0.45),(489,4,97,4),(490,4,98,2);

UNLOCK TABLES;

/*Table structure for table `mes` */

DROP TABLE IF EXISTS `mes`;

CREATE TABLE `mes` (
  `idmes` bigint(10) NOT NULL auto_increment,
  `nombremes` varchar(15) default NULL,
  `idtrimestre` bigint(20) default NULL,
  PRIMARY KEY  (`idmes`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `mes` */

LOCK TABLES `mes` WRITE;

insert  into `mes`(`idmes`,`nombremes`,`idtrimestre`) values (1,'Enero',1),(2,'Febrero',1),(3,'Marzo',1),(4,'Abril',2),(5,'Mayo',2),(6,'Junio',2),(7,'Julio',3),(8,'Agosto',3),(9,'Setiembre',3),(10,'Octubre',4),(11,'Noviembre',4),(12,'Diciembre',4);

UNLOCK TABLES;

/*Table structure for table `numfact` */

DROP TABLE IF EXISTS `numfact`;

CREATE TABLE `numfact` (
  `idnumfact` int(11) NOT NULL auto_increment,
  `num` bigint(20) NOT NULL,
  PRIMARY KEY  (`idnumfact`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `numfact` */

LOCK TABLES `numfact` WRITE;

insert  into `numfact`(`idnumfact`,`num`) values (1,5);

UNLOCK TABLES;

/*Table structure for table `producto` */

DROP TABLE IF EXISTS `producto`;

CREATE TABLE `producto` (
  `idproducto` bigint(10) NOT NULL auto_increment,
  `iva` float NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precioref` float NOT NULL,
  PRIMARY KEY  (`idproducto`)
) ENGINE=MyISAM AUTO_INCREMENT=99 DEFAULT CHARSET=latin1;

/*Data for the table `producto` */

LOCK TABLES `producto` WRITE;

insert  into `producto`(`idproducto`,`iva`,`descripcion`,`precioref`) values (1,1,'PAN-BARRA/UD',1.2),(2,1,'B.TOSTADA',0.26),(3,1,'B-TAPA',0.18),(4,1,'BOLLO&nbsp;MANZANA',0.61),(5,1,'ROSQUILLAS&nbsp;DULCE',0.35),(6,1,'BOLSA&nbsp;ROSQUILLA',1.2),(7,1,'CHINOS',0.61),(8,1,'CROASANT-CHOCO',0.61),(9,1,'CROASANT-SIN',0.61),(10,1,'CHINOS',2.3),(11,1,'CROASANTÂ PEQUEÃ‘O',0.35),(12,1,'BOLLO-MERENGUE',0.63),(13,1,'BOLLERIA',0.61),(14,1,'NAPOLITANA&nbsp;Y&nbsp;CARACOLAS',0.83),(15,1,'ENSAIMADA',0.72),(16,1,'HOJALDRES',0.94),(17,1,'SUSO&nbsp;CREMA',1),(18,1,'SUSO&nbsp;CHOCO',0.61),(19,1,'PALMERA&nbsp;CREMA',0.61),(20,1,'PALMERA&nbsp;CHOCO',0.8),(21,1,'DONUTS&nbsp;CHOCO ',0.66),(22,1,'DONUTSÂ AZÃšCAR',0.66),(23,1,'BALLONESA',0.94),(24,1,'BALLONESA&nbsp;CHOCO',0.94),(25,1,'CAÃ‘ASÂ CREMA',0.94),(26,1,'CAÃ‘ASÂ CABELLO',0.94),(27,1,'CAÃ‘ASÂ CHOCO',0.94),(28,1,'PANALES&nbsp;CREMA',0.94),(29,1,'PANAL&nbsp;BEICON',0.94),(30,1,'PASTELES&nbsp;MANZANA',0.94),(31,1,'TRENZAS&nbsp;DE&nbsp;NUECES',0.94),(32,1,'TRENZAS&nbsp;DE&nbsp;CHOCO',0.94),(33,1,'TORTAS&nbsp;HOJALDRE',0.94),(34,1,'PAÃ‘UELOÂ CABELLO',0.94),(35,1,'PAÃ‘UELOÂ CREMA',0.94),(36,1,'PAÃ‘UELOÂ ATÃšN',0.94),(37,1,'PAÃ‘UELOÂ VERDURA',0.94),(38,1,'PIZZAS',1.05),(39,1,'PANINIS',1.05),(40,1,'ALFAJORES',0.84),(41,1,'PAN&nbsp;GRIEGO',0.61),(42,1,'PASTEL&nbsp;DE&nbsp;CHOCO&nbsp;Y&nbsp;NARANJA',1.2),(43,1,'MADRILEÃ‘OS',0.7),(44,1,'PIONONOS',0.7),(45,1,'PASTEL&nbsp;CREMA',0.7),(46,1,'PASTEL&nbsp;NATA',0.95),(47,1,'PASTEL&nbsp;TRUFA',1.25),(48,1,'PASTEL&nbsp;SELVA&nbsp;NEGRA',1.25),(49,1,'PASTEL&nbsp;MOkA',0.85),(50,1,'PASTEL&nbsp;CATALANA',1.47),(51,1,'PASTEL&nbsp;DE&nbsp;MOUSE ',1.25),(52,1,'PASTEL&nbsp;DE&nbsp;FRESA&nbsp;Y&nbsp;CHOCO',1.25),(53,1,'BOLAS&nbsp;DE&nbsp;TRUFA',0.75),(54,1,'PETISUT&nbsp;CREMA',0.7),(55,1,'PETISUT&nbsp;NATA',0.95),(56,1,'TOCINO',0.9),(57,1,'CALATRAVA',0.95),(58,1,'GLASEADO',0.7),(59,1,'MILHOJAS',0.7),(60,1,'MILHOJAS&nbsp;NATA',1.25),(61,1,'MEDIAS&nbsp;LUNAS',0.74),(62,1,'MEDIASÂ LUNASÂ PEQUEÃ‘AS',0.58),(63,1,'ANAÂ MARÃ“A',0.7),(64,1,'KILOÂ PASTLESÂ PEQUEÃ‘OS',9.5),(65,1,'KILO&nbsp;TARTA&nbsp;NATA&nbsp;CHOCO',10.15),(66,1,'KILO&nbsp;TARTA&nbsp;TRUFA',11),(67,1,'TARTA&nbsp;DE&nbsp;MERENGUE',8.1),(68,1,'JUEGOS',11),(69,1,'KILO&nbsp;TARTA&nbsp;MANZANA ',9.05),(70,1,'KILO&nbsp;BIZCOCHO',6.56),(71,1,'KILO&nbsp;BIZOCHO&nbsp;MANZANA',7.72),(72,1,'PLANCHA&nbsp;BIZCOCHO',2.45),(73,1,'KILO&nbsp;LECHE&nbsp;FRITA',7),(74,1,'KILO&nbsp;ROSCOS&nbsp;FRITOS',7.2),(75,1,'KILOÂ PESTIÃ‘OS',7.98),(76,1,'KILOÂ BUÃ‘UELOS',8.4),(77,1,'TORRIJAS',1),(78,1,'KILO&nbsp;SECOS',6.56),(79,1,'KILO&nbsp;SALADITOS&nbsp;Y&nbsp;EMPANADILLA',9.98),(80,1,'EMPANADILLAS',0.61),(81,1,'COCADAS-SULATANAS',0.58),(82,1,'KILO&nbsp;MAGDALENAS',5.1),(83,1,'ROSCÃNÂ GRANDEÂ SIN',13),(84,1,'ROSCÃNÂ GRANDEÂ NATA',16.9),(85,1,'ROSCÃNÂ GRANDEÂ CREMA',13.9),(86,1,'ROSCÃNÂ GRANDEÂ DEÂ TRUFA',18.4),(87,1,'ROSCÃNÂ PEQUEÃ‘OÂ SIN',9.9),(88,1,'ROSCÃNÂ PEQUEÃ‘OÂ NATA',12.3),(89,1,'ROSCÃNÂ PEQUEÃ‘OÂ DEÂ CREMA',10.6),(90,1,'ROSCÃNÂ PEQUEÃ‘OÂ TRUFA',13.4),(91,1,'KGMANTECADOS&nbsp;C/ALMENDRAS',6),(92,1,'KG&nbsp;MANTECADOS&nbsp;SIN',5),(93,1,'KILO&nbsp;MORITOS',6.2),(94,1,'MEDIAS&nbsp;NOCHES',0.2),(95,1,'TORTA&nbsp;ACEITE',1.2),(96,5,'Prueba',0.45),(97,4,'Prueba&nbsp;2',4),(98,1,'Pasteles',2);

UNLOCK TABLES;

/*Table structure for table `proveedor` */

DROP TABLE IF EXISTS `proveedor`;

CREATE TABLE `proveedor` (
  `idproveedor` bigint(10) NOT NULL auto_increment,
  `nombre` varchar(50) NOT NULL,
  `iddomicilio` bigint(10) NOT NULL,
  `provincia` varchar(50) default NULL,
  PRIMARY KEY  (`idproveedor`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `proveedor` */

LOCK TABLES `proveedor` WRITE;

insert  into `proveedor`(`idproveedor`,`nombre`,`iddomicilio`,`provincia`) values (1,'Molino&nbsp;CaÃ±uelas',5,'Mendoza'),(2,'La&nbsp;Providencia',8,'Mendoza'),(3,'Confipan',9,'Mendoza'),(4,'Dimol',11,'asd');

UNLOCK TABLES;

/*Table structure for table `renglon_albaran` */

DROP TABLE IF EXISTS `renglon_albaran`;

CREATE TABLE `renglon_albaran` (
  `idrenglon` bigint(10) NOT NULL auto_increment,
  `idproducto` bigint(10) NOT NULL,
  `punitario` float NOT NULL,
  `cantidad` int(10) NOT NULL,
  `total` float NOT NULL,
  `idalbaran` bigint(10) NOT NULL,
  PRIMARY KEY  (`idrenglon`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `renglon_albaran` */

LOCK TABLES `renglon_albaran` WRITE;

insert  into `renglon_albaran`(`idrenglon`,`idproducto`,`punitario`,`cantidad`,`total`,`idalbaran`) values (1,11,0.35,32,11.2,1),(2,8,0.61,12,7.32,1),(3,60,1.25,2,2.5,1),(4,7,0.61,12,7.32,2),(5,49,0.85,31,26.35,2),(6,55,0.95,21,19.95,2),(7,9,0.61,31,18.91,3),(8,14,0.83,11,9.13,3),(9,13,0.61,51,31.11,3);

UNLOCK TABLES;

/*Table structure for table `renglon_compras` */

DROP TABLE IF EXISTS `renglon_compras`;

CREATE TABLE `renglon_compras` (
  `idrengloncompras` bigint(10) NOT NULL auto_increment,
  `idmes` bigint(10) NOT NULL,
  `fecha` date default NULL,
  `valor` float default NULL,
  `iva` float default NULL,
  `idproveedor` bigint(10) default NULL,
  PRIMARY KEY  (`idrengloncompras`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `renglon_compras` */

LOCK TABLES `renglon_compras` WRITE;

insert  into `renglon_compras`(`idrengloncompras`,`idmes`,`fecha`,`valor`,`iva`,`idproveedor`) values (1,2,'2012-02-01',201,22,3),(2,1,'2012-01-15',200,42,1),(3,2,'2012-02-01',100,21,1),(4,2,'2012-02-15',200,42,1),(5,2,'2012-02-01',201,22,3),(6,3,'2012-03-15',200,42,1),(7,4,'2012-04-01',100,21,1),(8,4,'2012-04-15',200,42,1),(9,5,'2012-05-01',100,21,1),(10,5,'2012-05-15',200,42,1),(11,6,'2012-06-01',100,2.2,3),(12,6,'2012-06-13',200,42,1),(13,1,'2012-01-01',100,12,1),(14,4,'2011-04-01',100,10,3);

UNLOCK TABLES;

/*Table structure for table `renglon_factura` */

DROP TABLE IF EXISTS `renglon_factura`;

CREATE TABLE `renglon_factura` (
  `idrenglon` bigint(20) NOT NULL auto_increment,
  `idproducto` bigint(20) NOT NULL,
  `punitario` float NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` float NOT NULL,
  `neto` float NOT NULL,
  `idfactura` bigint(20) NOT NULL,
  `valoriva` float NOT NULL,
  `iva` float NOT NULL,
  PRIMARY KEY  (`idrenglon`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

/*Data for the table `renglon_factura` */

LOCK TABLES `renglon_factura` WRITE;

insert  into `renglon_factura`(`idrenglon`,`idproducto`,`punitario`,`cantidad`,`total`,`neto`,`idfactura`,`valoriva`,`iva`) values (1,8,0.61,3,2.01,1.83,1,0.18,10),(2,1,2,1,2.2,2,1,0.2,10),(3,19,0.61,23,15.43,14.03,1,1.4,10),(4,51,1.25,123,169.13,153.75,2,15.38,10),(5,11,0.35,132,50.82,46.2,2,4.62,10),(6,5,0.35,4,1.54,1.4,3,0.14,10),(7,4,0.61,21,14.09,12.81,3,1.28,10),(8,15,0.72,2,1.58,1.44,3,0.14,10),(9,8,0.61,4,2.68,2.44,4,0.24,10),(10,3,0.18,131,25.94,23.58,4,2.36,10),(11,1,12,1,13.2,12,4,1.2,10),(12,4,0.61,4,2.68,2.44,6,0.24,10),(13,10,0.61,12,8.05,7.32,6,0.73,10),(14,18,0.61,5,3.35,3.05,6,0.3,10),(15,5,0.35,4,1.54,1.4,7,0.14,10),(16,8,0.61,12,8.05,7.32,8,0.73,10),(17,82,5.1,1,5.61,5.1,8,0.51,10),(18,78,6.56,1,7.22,6.56,8,0.66,10),(19,6,1.2,12,15.84,14.4,9,1.44,10),(20,48,1.25,2,2.75,2.5,9,0.25,10),(21,19,0.61,41,27.51,25.01,9,2.5,10),(22,6,1.2,12,15.84,14.4,11,1.44,10),(23,11,0.35,31,11.93,10.85,11,1.08,10),(24,14,0.83,23,21,19.09,11,1.91,10),(25,8,0.61,4,2.68,2.44,12,0.24,10),(26,6,1.2,12,15.84,14.4,12,1.44,10),(27,18,0.61,1,0.67,0.61,12,0.06,10),(28,17,3.12,3,10.3,9.36,12,0.94,10);

UNLOCK TABLES;

/*Table structure for table `renglon_facturasimple` */

DROP TABLE IF EXISTS `renglon_facturasimple`;

CREATE TABLE `renglon_facturasimple` (
  `idrenglon` bigint(20) NOT NULL auto_increment,
  `producto` varchar(200) NOT NULL default '',
  `iva` float NOT NULL,
  `neto` float NOT NULL,
  `valoriva` float NOT NULL,
  `total` float NOT NULL,
  `idfacturasimple` bigint(20) NOT NULL,
  PRIMARY KEY  (`idrenglon`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

/*Data for the table `renglon_facturasimple` */

LOCK TABLES `renglon_facturasimple` WRITE;

insert  into `renglon_facturasimple`(`idrenglon`,`producto`,`iva`,`neto`,`valoriva`,`total`,`idfacturasimple`) values (7,'Pan',10,2.88,0.32,3.2,8),(8,'Tortitas',10,11.03,1.23,12.25,8),(9,'Charly Garcia de queso',10,56.97,6.33,63.3,8),(10,'Salchicas de manteca',10,4.47,0.5,4.97,9),(11,'Frostmourne de dulce de leche',10,3.71,0.41,4.12,9),(12,'Pan',10,22.61,2.51,25.12,9),(13,'Kilo de pan',10,11.12,1.24,12.36,10),(14,'Tortita Manteca',10,8.64,0.96,9.6,10),(15,'Coca',10,5.69,0.63,6.32,11),(16,'Pan',21,7.73,2.05,9.78,11),(17,'Palmeritas',10,4.71,0.52,5.23,11),(18,'Coco loco',10,11.07,1.23,12.3,11),(19,'Samsung Galaxy',5,1140,60,1200,12),(20,'Papas',10,10.8,1.2,12,12),(21,'PNaa',10,2.81,0.31,3.12,13),(22,'daasd',10,2.7,0.3,3,13),(23,'qweqwe',10,1.8,0.2,2,13),(24,'asf',10,0.9,0.1,1,13),(25,'savxsd',10,1.8,0.2,2,13),(26,'dsg',10,2.7,0.3,3,13),(27,'gherth',10,3.6,0.4,4,13),(28,'trhwwrt',10,2.7,0.3,3,13),(29,'tw5yrey',10,3.6,0.4,4,13),(30,'wqrqadasd',10,2.7,0.3,3,13),(31,'sadsad',10,3.6,0.4,4,13),(32,'asd',10,3.6,0.4,4,13),(33,'sadd',10,3.6,0.4,4,13),(34,'sadda',10,3.6,0.4,4,13),(35,'asdasd',10,3.6,0.4,4,13),(36,'sadasd',10,3.6,0.4,4,13),(37,'asd',10,3.6,0.4,4,13),(38,'Pachamama',10,27.9,3.1,31,14),(39,'Chichas',10,10.8,1.2,12,15),(40,'Manteca',10,4.68,0.52,5.2,15),(41,'Oso de dulce de lech',4,22.42,0.93,23.35,16),(42,'Pan',10,11.03,1.23,12.25,16),(43,'Las chichas!',10,38.58,4.29,42.87,18),(44,'Pan',8,4.57,0.4,4.97,19),(45,'Osi',21,97.17,25.83,123,19),(46,'Wolwerine de manteca',5,29.45,1.55,31,20);

UNLOCK TABLES;

/*Table structure for table `telefono_cliente` */

DROP TABLE IF EXISTS `telefono_cliente`;

CREATE TABLE `telefono_cliente` (
  `idtelefono` bigint(10) NOT NULL auto_increment,
  `numerotelcliente` varchar(50) NOT NULL default '',
  `idcliente` bigint(10) NOT NULL,
  `movil` varchar(50) default '',
  PRIMARY KEY  (`idtelefono`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `telefono_cliente` */

LOCK TABLES `telefono_cliente` WRITE;

insert  into `telefono_cliente`(`idtelefono`,`numerotelcliente`,`idcliente`,`movil`) values (1,'4179322',1,'1547979973'),(2,'415900',2,'15312123'),(3,'433333',3,'15988887'),(4,'463200',4,'15021471'),(5,'463200',5,'15021471'),(6,'1234',6,'123455');

UNLOCK TABLES;

/*Table structure for table `telefono_proveedor` */

DROP TABLE IF EXISTS `telefono_proveedor`;

CREATE TABLE `telefono_proveedor` (
  `idtelefono` bigint(10) NOT NULL auto_increment,
  `numerotelprov` varchar(50) NOT NULL default '',
  `idproveedor` bigint(10) NOT NULL,
  `movil` varchar(50) default NULL,
  PRIMARY KEY  (`idtelefono`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `telefono_proveedor` */

LOCK TABLES `telefono_proveedor` WRITE;

insert  into `telefono_proveedor`(`idtelefono`,`numerotelprov`,`idproveedor`,`movil`) values (1,'479303',1,'1540115'),(2,'123',2,'1324'),(3,'4218233',3,'141234512'),(4,'123',4,'123');

UNLOCK TABLES;

/*Table structure for table `trimestre` */

DROP TABLE IF EXISTS `trimestre`;

CREATE TABLE `trimestre` (
  `idtrimestre` bigint(10) NOT NULL auto_increment,
  `nombretrimestre` varchar(15) default NULL,
  PRIMARY KEY  (`idtrimestre`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `trimestre` */

LOCK TABLES `trimestre` WRITE;

insert  into `trimestre`(`idtrimestre`,`nombretrimestre`) values (1,'1Âº Trimestre'),(2,'2Âº Trimestre'),(3,'3Âº Trimestre'),(4,'4Âº Trimestre');

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
