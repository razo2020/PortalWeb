-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: portalweb
-- ------------------------------------------------------
-- Server version	5.7.21-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresa` (
  `RUC` varchar(11) NOT NULL,
  `razon_Social` varchar(45) NOT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `telefono1` varchar(15) DEFAULT NULL,
  `telefono2` varchar(15) DEFAULT NULL,
  `rubro` varchar(45) DEFAULT NULL,
  `tipo` char(1) NOT NULL DEFAULT '1',
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`RUC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES ('11458834003','Partida comunal SAC','Piura - Perú',NULL,NULL,NULL,'2','1'),('20110564821','Globatnet SAC',NULL,NULL,NULL,NULL,'1','1'),('20123475431','Malvinas SAC','cajamarca peru','44782345',NULL,'Ferreteria','2','1'),('20123475432','CaColao SAC',NULL,NULL,NULL,NULL,'1','1'),('20453628201','Editorial Perú 21 E.I.R.L.',NULL,NULL,NULL,NULL,'1','1'),('20458834001','System Server Peru','Perú Trujillo','920345987','044564321',NULL,'1','1'),('20458834002','Casa Navegación SAC','Trujillo-peru',NULL,NULL,NULL,'1','1'),('20547865421','los portales SAC',NULL,NULL,NULL,NULL,'1','1'),('20786754323','cacao pirincho sac.',NULL,NULL,NULL,NULL,'1','1'),('88888888888','Ejemplo1',NULL,NULL,NULL,NULL,'1','1');
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-02  8:31:26
