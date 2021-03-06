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
-- Table structure for table `detalle_peticion_oferta`
--

DROP TABLE IF EXISTS `detalle_peticion_oferta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_peticion_oferta` (
  `peticion_oferta_idpeticion_oferta` varchar(16) NOT NULL,
  `idposicion` int(11) NOT NULL,
  `detalle_solped_solped_idsolped` varchar(16) NOT NULL,
  `detalle_solped_idposicion` int(11) NOT NULL,
  `oferta` double DEFAULT NULL,
  `comentario` varchar(45) DEFAULT NULL,
  `estado` char(2) NOT NULL,
  PRIMARY KEY (`peticion_oferta_idpeticion_oferta`,`idposicion`),
  KEY `fk_peticion_oferta_has_solped_has_Material_peticion_oferta1_idx` (`peticion_oferta_idpeticion_oferta`),
  KEY `fk_Detalle_peticion_oferta_detalle_solped1_idx` (`detalle_solped_solped_idsolped`,`detalle_solped_idposicion`),
  CONSTRAINT `fk_Detalle_peticion_oferta_detalle_solped1` FOREIGN KEY (`detalle_solped_solped_idsolped`, `detalle_solped_idposicion`) REFERENCES `detalle_solped` (`solped_idsolped`, `idposicion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_peticion_oferta_has_solped_has_Material_peticion_oferta1` FOREIGN KEY (`peticion_oferta_idpeticion_oferta`) REFERENCES `peticion_oferta` (`idpeticion_oferta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_peticion_oferta`
--

LOCK TABLES `detalle_peticion_oferta` WRITE;
/*!40000 ALTER TABLE `detalle_peticion_oferta` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_peticion_oferta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-02  8:31:28
