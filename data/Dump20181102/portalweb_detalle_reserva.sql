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
-- Table structure for table `detalle_reserva`
--

DROP TABLE IF EXISTS `detalle_reserva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_reserva` (
  `Reserva_idReserva` varchar(16) NOT NULL,
  `Res_Alm_Mat_pos` int(11) NOT NULL,
  `Ubicacion_idUbicacion` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `estado` char(2) NOT NULL,
  PRIMARY KEY (`Reserva_idReserva`,`Res_Alm_Mat_pos`),
  KEY `fk_Reserva_has_Almacen_has_Material_Reserva1_idx` (`Reserva_idReserva`),
  KEY `fk_Detalle_Reserva_Ubicacion1_idx` (`Ubicacion_idUbicacion`),
  CONSTRAINT `fk_Detalle_Reserva_Ubicacion1` FOREIGN KEY (`Ubicacion_idUbicacion`) REFERENCES `ubicacion` (`idUbicacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Reserva_has_Almacen_has_Material_Reserva1` FOREIGN KEY (`Reserva_idReserva`) REFERENCES `reserva` (`idReserva`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_reserva`
--

LOCK TABLES `detalle_reserva` WRITE;
/*!40000 ALTER TABLE `detalle_reserva` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_reserva` ENABLE KEYS */;
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
