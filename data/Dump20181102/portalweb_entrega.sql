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
-- Table structure for table `entrega`
--

DROP TABLE IF EXISTS `entrega`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entrega` (
  `idEntrega` int(11) NOT NULL AUTO_INCREMENT,
  `Detalle_Pedido_Pedido_idPedido` varchar(16) NOT NULL,
  `Detalle_Pedido_idPosicion` int(11) NOT NULL,
  `Detalle_Guia_Guia_idGuia` varchar(11) NOT NULL,
  `Detalle_Guia_idPosicion` int(11) NOT NULL,
  `Comprobante_idComprobante` varchar(11) DEFAULT NULL,
  `precioEntrega` double DEFAULT NULL,
  `Devolucion_idDevolucion` int(11) DEFAULT NULL,
  `precioDevolucion` double DEFAULT NULL,
  PRIMARY KEY (`idEntrega`),
  UNIQUE KEY `idPedido_idGuia_UNIQUE` (`Detalle_Pedido_Pedido_idPedido`,`Detalle_Pedido_idPosicion`,`Detalle_Guia_Guia_idGuia`,`Detalle_Guia_idPosicion`),
  KEY `fk_Detalle_Pedido_has_Detalle_Guia_Detalle_Guia1_idx` (`Detalle_Guia_Guia_idGuia`,`Detalle_Guia_idPosicion`),
  KEY `fk_Detalle_Pedido_has_Detalle_Guia_Detalle_Pedido1_idx` (`Detalle_Pedido_Pedido_idPedido`,`Detalle_Pedido_idPosicion`),
  KEY `fk_Detalle_Pedido_has_Detalle_Guia_Comprobante1_idx` (`Comprobante_idComprobante`),
  KEY `fk_Entregas_Devoluciones1_idx` (`Devolucion_idDevolucion`),
  CONSTRAINT `fk_Detalle_Pedido_has_Detalle_Guia_Comprobante1` FOREIGN KEY (`Comprobante_idComprobante`) REFERENCES `comprobante` (`idComprobante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Detalle_Pedido_has_Detalle_Guia_Detalle_Guia1` FOREIGN KEY (`Detalle_Guia_Guia_idGuia`, `Detalle_Guia_idPosicion`) REFERENCES `detalle_guia` (`Guia_idGuia`, `idPosicion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Detalle_Pedido_has_Detalle_Guia_Detalle_Pedido1` FOREIGN KEY (`Detalle_Pedido_Pedido_idPedido`, `Detalle_Pedido_idPosicion`) REFERENCES `detalle_pedido` (`Pedido_idPedido`, `idPosicion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Entregas_Devoluciones1` FOREIGN KEY (`Devolucion_idDevolucion`) REFERENCES `devolucion` (`idDevolucion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entrega`
--

LOCK TABLES `entrega` WRITE;
/*!40000 ALTER TABLE `entrega` DISABLE KEYS */;
/*!40000 ALTER TABLE `entrega` ENABLE KEYS */;
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
