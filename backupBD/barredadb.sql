-- MariaDB dump 10.19  Distrib 10.4.25-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: barredadb
-- ------------------------------------------------------
-- Server version	10.4.25-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `articulos`
--

DROP TABLE IF EXISTS `articulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articulos` (
  `art_id` int(20) NOT NULL AUTO_INCREMENT,
  `art_cod` varchar(20) NOT NULL,
  `art_nom` varchar(30) NOT NULL,
  `art_desc` varchar(255) NOT NULL,
  `art_precio` int(20) NOT NULL,
  `art_stock` int(20) NOT NULL,
  `art_costo` int(20) NOT NULL,
  `art_vendible` varchar(1) NOT NULL DEFAULT 'S',
  `art_deshabilitado` varchar(1) DEFAULT NULL,
  `art_categoria` int(20) NOT NULL,
  `art_materiales` varchar(50) NOT NULL,
  `art_notas` text NOT NULL,
  `art_imagen` text NOT NULL DEFAULT './../images/default.png',
  PRIMARY KEY (`art_id`),
  UNIQUE KEY `art_cod` (`art_cod`),
  UNIQUE KEY `art_cod_2` (`art_cod`),
  UNIQUE KEY `art_cod_3` (`art_cod`),
  KEY `art_categoria` (`art_categoria`),
  CONSTRAINT `articulos_ibfk_1` FOREIGN KEY (`art_categoria`) REFERENCES `categorias` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articulos`
--

LOCK TABLES `articulos` WRITE;
/*!40000 ALTER TABLE `articulos` DISABLE KEYS */;
INSERT INTO `articulos` VALUES (2,'SC2','Silla Comunidad','',1200,0,600,'','',1,'','','./../images/default.png'),(3,'SRP3','Silla rústica pino','',1400,0,500,'','',1,'','','./../images/default.png'),(4,'MV4','Matera Vivi','',500,4,150,'','',2,'','','./../images/default.png'),(5,'SSC5','Soporte simple celular','Una ranura',150,4,30,'S',NULL,13,'','','./../images/default.png'),(6,'SI6','Soporte incienso','',150,6,30,'S',NULL,13,'','','./../images/default.png'),(7,'CM15','Caja Multiuso','15x15cm, altura 7cm',200,0,80,'','',10,'','','./../images/default.png'),(9,'SCC9','Soporte clásico celular','Dos ranuras',150,0,30,'S',NULL,13,'','','./../images/default.png'),(10,'LA10','Llavero Aruera','Llavero Aruera con colgadores simples (pitones)',300,0,120,'S',NULL,7,'','','./../images/default.png'),(11,'PA11','Perchero Aruera','Perchero Aruera con colgadores fuertes, soporta prendas de ropa',500,0,300,'','',4,'','','./../images/default.png'),(12,'LJ12','Llavero Jane','Forma de casa de pajaritos, 3 colgadores, techo en colores varios.',200,3,80,'S',NULL,7,'','','./../images/default.png'),(13,'PPM13','Perchero de pie ','4 colgadores dobles, 1.60 de altura',1200,0,300,'','',4,'','','./../images/default.png'),(23,'CSG','Cuenco grande (E.robusta)','Cuenco de 50 cm de largo con dos perforaciones',1500,0,200,'','',14,'Madera','','./../images/default.png'),(24,'CSM','Cuenco mediano','Cuenco mediano',800,1,100,'S',NULL,14,'Madera','','./../images/default.png'),(25,'CSC','Cuenco chico','Cuenco chico',500,5,100,'S',NULL,14,'Madera','','./../images/percherodepie.png'),(26,'PC50','Pino 50CM colores','Pino cerrado 50cm, colores varios: verde, rojo y azul',500,0,50,'','',15,'Madera','Angulos a 17 grados','./../images/ejemploFactura.jpeg'),(27,'PC70','Pino 70CM colores','Pino cerrado 70cm, colores varios: verde, rojo y azul',700,0,80,'','',15,'Madera','Angulos a 17 grados','./../images/400-4009752_arbol-de-navidad-de-madera-hd-png-download.png'),(28,'PC100','Pino 100CM colores','Pino cerrado 100cm, colores varios: verde, rojo y azul',1000,0,100,'','',15,'Madera','Angulos a 17 grados','./../images/percheropared.png'),(29,'PC120','Pino 120CM colores','Pino cerrado 120cm, colores varios: verde, rojo y azul',1200,12,120,'','',15,'Madera','Angulos a 17 grados','./../images/soportecelular.jpg');
/*!40000 ALTER TABLE `articulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `cat_id` int(20) NOT NULL AUTO_INCREMENT,
  `cat_nom` varchar(25) NOT NULL,
  `cat_obs` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Sillas','---'),(2,'Materas','---'),(3,'Mesas','---'),(4,'Percheros','---'),(7,'Llaveros','---'),(8,'Estanterias','---'),(10,'Cajas',NULL),(11,'Descuentos',NULL),(12,'Marcos',NULL),(13,'Otros accesorios',NULL),(14,'Tablas y Cuencos','tablas de picar y de asado, cuencos para servir'),(15,'Pinos Navidad','Tamaños varios');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_factura`
--

DROP TABLE IF EXISTS `detalle_factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_factura` (
  `dfact_renglon` int(11) NOT NULL,
  `fact_id` int(11) NOT NULL,
  `art_id` int(11) NOT NULL,
  `dfact_cantidad` int(11) NOT NULL,
  `dfact_precio` int(11) NOT NULL,
  KEY `fact_id` (`fact_id`,`art_id`),
  KEY `art_id` (`art_id`),
  CONSTRAINT `detalle_factura_ibfk_3` FOREIGN KEY (`fact_id`) REFERENCES `factura` (`fact_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_factura`
--

LOCK TABLES `detalle_factura` WRITE;
/*!40000 ALTER TABLE `detalle_factura` DISABLE KEYS */;
INSERT INTO `detalle_factura` VALUES (1,88,2,1,1200),(2,88,23,2,3000),(1,89,3,2,2800),(1,90,29,2,2400),(2,90,6,20,3000),(1,91,26,2,1000),(1,92,5,1,150),(2,92,10,1,300),(3,92,11,2,1000);
/*!40000 ALTER TABLE `detalle_factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `factura`
--

DROP TABLE IF EXISTS `factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `factura` (
  `fact_id` int(11) NOT NULL AUTO_INCREMENT,
  `fact_fecha` date NOT NULL,
  PRIMARY KEY (`fact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `factura`
--

LOCK TABLES `factura` WRITE;
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
INSERT INTO `factura` VALUES (88,'2022-12-12'),(89,'2022-12-12'),(90,'2022-12-13'),(91,'2022-12-14'),(92,'2022-12-14');
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gastos`
--

DROP TABLE IF EXISTS `gastos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gastos` (
  `gas_id` int(20) NOT NULL AUTO_INCREMENT,
  `gas_fecha` date NOT NULL,
  `gas_proveedor` varchar(50) NOT NULL,
  `gas_concepto` varchar(50) DEFAULT NULL,
  `gas_cantidad` int(20) NOT NULL,
  `gas_total` int(20) NOT NULL,
  PRIMARY KEY (`gas_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gastos`
--

LOCK TABLES `gastos` WRITE;
/*!40000 ALTER TABLE `gastos` DISABLE KEYS */;
/*!40000 ALTER TABLE `gastos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `usu_id` int(11) NOT NULL AUTO_INCREMENT,
  `usu_nombre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `usu_contraseña` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `usu_rol` int(11) NOT NULL,
  PRIMARY KEY (`usu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'id19677335_admin','admin',1),(2,'seba','seba',1),(3,'emilia','emilia',1),(4,'gaston','gaston',1),(5,'jero','jero',2),(6,'juanpablo','juanpablo',1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-13 19:35:18
