CREATE DATABASE  IF NOT EXISTS `dbsisemo` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dbsisemo`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: dbsisemo
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.30-MariaDB

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
-- Table structure for table `correlativos`
--

DROP TABLE IF EXISTS `correlativos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `correlativos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cor_cite` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cor_valor` int(10) unsigned NOT NULL,
  `cor_gestion` int(10) unsigned NOT NULL,
  `cor_depto` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cor_descripcion` text COLLATE utf8mb4_unicode_ci,
  `cor_estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `correlativos_cor_cite_unique` (`cor_cite`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `correlativos`
--

LOCK TABLES `correlativos` WRITE;
/*!40000 ALTER TABLE `correlativos` DISABLE KEYS */;
INSERT INTO `correlativos` VALUES (1,'CUS',6,2018,'GENERAL','Correlativo General',1,'2018-02-18 04:00:00','2018-03-08 20:26:08');
/*!40000 ALTER TABLE `correlativos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documentos`
--

DROP TABLE IF EXISTS `documentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documentos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pre_sigechr` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pre_depto` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pre_municipio` text COLLATE utf8mb4_unicode_ci,
  `pre_programa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identidad` int(10) unsigned NOT NULL,
  `pre_nota` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pre_nota_nombre` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pre_nota_check` tinyint(1) NOT NULL DEFAULT '0',
  `pre_ficha` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pre_ficha_nombre` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pre_ficha_check` tinyint(1) NOT NULL DEFAULT '0',
  `pre_legal` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pre_legal_nombre` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pre_legal_check` tinyint(1) NOT NULL DEFAULT '0',
  `pre_estado` enum('ACEPTADO','PENDIENTE','RECHAZADO') COLLATE utf8mb4_unicode_ci NOT NULL,
  `pre_obs` text COLLATE utf8mb4_unicode_ci,
  `idregistra` int(10) unsigned NOT NULL,
  `idactualiza` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `documentos_cus_unique` (`cus`),
  UNIQUE KEY `documentos_pre_sigechr_unique` (`pre_sigechr`),
  KEY `documentos_identidad_foreign` (`identidad`),
  KEY `documentos_idregistra_foreign` (`idregistra`),
  KEY `documentos_idactualiza_foreign` (`idactualiza`),
  CONSTRAINT `documentos_idactualiza_foreign` FOREIGN KEY (`idactualiza`) REFERENCES `users` (`id`),
  CONSTRAINT `documentos_identidad_foreign` FOREIGN KEY (`identidad`) REFERENCES `entidades` (`id`),
  CONSTRAINT `documentos_idregistra_foreign` FOREIGN KEY (`idregistra`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documentos`
--

LOCK TABLES `documentos` WRITE;
/*!40000 ALTER TABLE `documentos` DISABLE KEYS */;
INSERT INTO `documentos` VALUES (6,'CUS0001-2018','123-2018','Pando','Ninguno,','PNFR,',1,'archivo/previous/nota/2018223-173315.PDF','A.PDF',1,'archivo/previous/ficha/2018223-173315.PDF','B.PDF',1,'archivo/previous/legal/2018223-173315.PDF','C.PDF',1,'ACEPTADO','ninguna',3,3,'2018-02-23 21:33:15','2018-02-23 21:33:15'),(7,'CUS0002-2018','456-2018','Cochabamba','Sacaba,','PNFR,',1,'archivo/previous/nota/2018227-12015.PDF','A.PDF',1,'archivo/previous/ficha/2018227-12015.PDF','B.PDF',1,'archivo/previous/legal/2018227-12015.PDF','C.PDF',1,'ACEPTADO','Presento toda la documentacion referente al proyecto',3,2,'2018-02-23 21:57:40','2018-02-27 16:00:16'),(8,'CUS0003-2018','768-2018','Tarija','Ninguno,','PGIB,',2,NULL,NULL,0,NULL,NULL,0,NULL,NULL,0,'RECHAZADO','se recha<a por no haber cumplido con la documentacion',3,3,'2018-02-23 22:27:21','2018-02-23 22:27:21'),(9,'CUS0004-2018','15165-15245','La Paz','Murillo,','PNFR,',1,'archivo/previous/nota/201831-15389.PDF','A.PDF',1,'archivo/previous/ficha/201831-15389.PDF','B.PDF',1,'archivo/previous/legal/201831-15389.PDF','C.PDF',1,'ACEPTADO','sin observaciones, se presento la documentacion en el tiempo establecido',1,1,'2018-03-01 19:38:10','2018-03-01 19:38:10'),(10,'CUS0005-2018','1545-4512','Cochabamba','Sacaba,','PNFR,',2,'archivo/previous/nota/201838-16267.pdf','INTERNOS FONABOSQUE.pdf',1,'archivo/previous/ficha/201838-16267.pdf','INTERNOS FONABOSQUE.pdf',1,'archivo/previous/legal/201838-16267.pdf','INTERNOS FONABOSQUE.pdf',1,'ACEPTADO','sin observaciones, porque se presento la documentacion requerida en el tiempo estipulado',3,3,'2018-03-08 20:26:08','2018-03-08 20:26:08');
/*!40000 ALTER TABLE `documentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elegibles`
--

DROP TABLE IF EXISTS `elegibles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elegibles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `iddocumento` int(10) unsigned NOT NULL,
  `ele_finanza` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ele_finanza_nombre` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ele_finanza_check` tinyint(1) NOT NULL DEFAULT '0',
  `ele_obsfinanza` text COLLATE utf8mb4_unicode_ci,
  `ele_finregistra` datetime DEFAULT NULL,
  `ele_finactualiza` datetime DEFAULT NULL,
  `idfinanciero_registra` int(10) unsigned NOT NULL,
  `idfinanciero_actualiza` int(10) unsigned NOT NULL,
  `ele_estadofinanza` enum('ACEPTADO','PENDIENTE','RECHAZADO') COLLATE utf8mb4_unicode_ci NOT NULL,
  `ele_tecnica` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ele_tecnica_nombre` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ele_tecnica_check` tinyint(1) NOT NULL DEFAULT '0',
  `ele_obstecnica` text COLLATE utf8mb4_unicode_ci,
  `ele_tecregistra` datetime DEFAULT NULL,
  `ele_tecactualiza` datetime DEFAULT NULL,
  `idtecnico_registra` int(10) unsigned NOT NULL,
  `idtecnico_actualiza` int(10) unsigned NOT NULL,
  `ele_estadotecnico` enum('SINVALOR','ACEPTADO','PENDIENTE','RECHAZADO') COLLATE utf8mb4_unicode_ci NOT NULL,
  `ele_legal` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ele_legal_nombre` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ele_legal_check` tinyint(1) NOT NULL DEFAULT '0',
  `ele_obslegal` text COLLATE utf8mb4_unicode_ci,
  `ele_legregistra` datetime DEFAULT NULL,
  `ele_legactualiza` datetime DEFAULT NULL,
  `idlegal_registra` int(10) unsigned NOT NULL,
  `idlegal_actualiza` int(10) unsigned NOT NULL,
  `ele_estadolegal` enum('SINVALOR','ACEPTADO','PENDIENTE','RECHAZADO') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `elegibles_iddocumento_foreign` (`iddocumento`),
  KEY `elegibles_idfinanciero_registra_foreign` (`idfinanciero_registra`),
  KEY `elegibles_idfinanciero_actualiza_foreign` (`idfinanciero_actualiza`),
  KEY `elegibles_idtecnico_registra_foreign` (`idtecnico_registra`),
  KEY `elegibles_idtecnico_actualiza_foreign` (`idtecnico_actualiza`),
  KEY `elegibles_idlegal_registra_foreign` (`idlegal_registra`),
  KEY `elegibles_idlegal_actualiza_foreign` (`idlegal_actualiza`),
  CONSTRAINT `elegibles_iddocumento_foreign` FOREIGN KEY (`iddocumento`) REFERENCES `documentos` (`id`),
  CONSTRAINT `elegibles_idfinanciero_actualiza_foreign` FOREIGN KEY (`idfinanciero_actualiza`) REFERENCES `users` (`id`),
  CONSTRAINT `elegibles_idfinanciero_registra_foreign` FOREIGN KEY (`idfinanciero_registra`) REFERENCES `users` (`id`),
  CONSTRAINT `elegibles_idlegal_actualiza_foreign` FOREIGN KEY (`idlegal_actualiza`) REFERENCES `users` (`id`),
  CONSTRAINT `elegibles_idlegal_registra_foreign` FOREIGN KEY (`idlegal_registra`) REFERENCES `users` (`id`),
  CONSTRAINT `elegibles_idtecnico_actualiza_foreign` FOREIGN KEY (`idtecnico_actualiza`) REFERENCES `users` (`id`),
  CONSTRAINT `elegibles_idtecnico_registra_foreign` FOREIGN KEY (`idtecnico_registra`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elegibles`
--

LOCK TABLES `elegibles` WRITE;
/*!40000 ALTER TABLE `elegibles` DISABLE KEYS */;
INSERT INTO `elegibles` VALUES (1,6,'archivo/elegibles/finanza/2018227-143128.PDF','A.PDF',1,'a la fecha 27/02/2018 no se presencia de la documentacion fisica en el area financiero','2018-02-27 10:23:04','2018-02-27 14:31:28',2,2,'PENDIENTE',NULL,NULL,0,NULL,NULL,NULL,2,2,'SINVALOR',NULL,NULL,0,NULL,NULL,NULL,2,2,'SINVALOR','2018-02-27 14:23:04','2018-02-27 18:31:28'),(2,7,'archivo/elegibles/finanza/2018227-124845.PDF','A.PDF',1,'sin observaciones','2018-02-27 12:48:45','2018-02-27 12:48:45',2,2,'ACEPTADO','archivo/elegibles/tecnica/2018228-125838.pdf','INTERNOS FONABOSQUE.pdf',1,'por presentar la documentacion, mas presentacion de documentos','2018-02-28 12:58:38','2018-02-28 12:58:38',2,2,'ACEPTADO','archivo/elegibles/legal2/2018228-154645.pdf','INTERNOS FONABOSQUE.pdf',0,'por llegar la documentacion fisica, con mas informacion','2018-02-28 15:46:45','2018-02-28 15:46:45',2,2,'ACEPTADO','2018-02-27 16:48:46','2018-02-28 19:46:45');
/*!40000 ALTER TABLE `elegibles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entidades`
--

DROP TABLE IF EXISTS `entidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entidades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ent_nombre` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ent_descripcion` text COLLATE utf8mb4_unicode_ci,
  `ent_estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entidades`
--

LOCK TABLES `entidades` WRITE;
/*!40000 ALTER TABLE `entidades` DISABLE KEYS */;
INSERT INTO `entidades` VALUES (1,'Gobierno Autonomo Departamental','GAD - Gobiernos Autonomos Departamentales',1,'2018-02-18 04:00:00','2018-02-18 04:00:00'),(2,'Gobierno Autonomo Municipal','GAM - Gobiernos Autonomos Municipales',1,'2018-02-18 04:00:00','2018-02-18 04:00:00'),(3,'Otras Entidades','Otras Entidades',1,'2018-02-18 04:00:00','2018-02-18 04:00:00');
/*!40000 ALTER TABLE `entidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2015_01_20_084450_create_roles_table',1),(4,'2015_01_20_084525_create_role_user_table',1),(5,'2015_01_24_080208_create_permissions_table',1),(6,'2015_01_24_080433_create_permission_role_table',1),(7,'2015_12_04_003040_add_special_role_column',1),(8,'2017_10_17_170735_create_permission_user_table',1),(11,'2018_02_18_095040_create_entidades_table',2),(12,'2018_02_18_095341_create_correlativos_table',2),(13,'2018_02_18_100003_create_documentos_table',2),(15,'2018_02_19_003535_create_elegelibilidad_table',3),(16,'2018_02_22_120252_create_programas_table',4),(18,'2018_02_22_123914_add_column_documentos',5),(20,'2018_02_23_084915_create_municipios_table',6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `municipios`
--

DROP TABLE IF EXISTS `municipios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `municipios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mun_depto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mun_municipio` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mun_descripcion` text COLLATE utf8mb4_unicode_ci,
  `mun_estado` tinyint(1) NOT NULL DEFAULT '1',
  `mun_obs` text COLLATE utf8mb4_unicode_ci,
  `idregistra` int(10) unsigned NOT NULL,
  `idactualiza` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `municipios_idregistra_foreign` (`idregistra`),
  KEY `municipios_idactualiza_foreign` (`idactualiza`),
  CONSTRAINT `municipios_idactualiza_foreign` FOREIGN KEY (`idactualiza`) REFERENCES `users` (`id`),
  CONSTRAINT `municipios_idregistra_foreign` FOREIGN KEY (`idregistra`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipios`
--

LOCK TABLES `municipios` WRITE;
/*!40000 ALTER TABLE `municipios` DISABLE KEYS */;
INSERT INTO `municipios` VALUES (1,'LA PAZ','Murillo','Murillo',1,'ninguna',1,1,'2018-02-23 13:39:01','2018-02-23 13:39:01'),(2,'LA PAZ','El Alto','El Alto',1,'ninguna',1,1,'2018-02-23 13:39:03','2018-02-23 13:39:03'),(3,'COCHABAMBA','Sacaba','Sacaba',1,'ninguna',1,1,'2018-02-23 13:39:07','2018-02-23 13:39:07');
/*!40000 ALTER TABLE `municipios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (1,1,4,'2018-02-11 03:43:29','2018-02-11 03:43:29'),(2,2,4,'2018-02-11 03:43:29','2018-02-11 03:43:29'),(3,1,6,'2018-02-12 20:14:32','2018-02-12 20:14:32'),(4,2,6,'2018-02-12 20:14:32','2018-02-12 20:14:32'),(5,10,7,'2018-02-14 19:13:46','2018-02-14 19:13:46'),(6,11,7,'2018-02-14 19:13:46','2018-02-14 19:13:46'),(7,12,7,'2018-02-14 19:13:46','2018-02-14 19:13:46'),(8,13,7,'2018-02-14 19:13:46','2018-02-14 19:13:46'),(9,14,7,'2018-02-14 22:21:35','2018-02-14 22:21:35'),(10,15,7,'2018-02-14 22:21:35','2018-02-14 22:21:35'),(17,22,8,'2018-02-21 20:44:13','2018-02-21 20:44:13'),(18,23,8,'2018-02-21 20:44:13','2018-02-21 20:44:13'),(19,24,8,'2018-02-21 20:44:14','2018-02-21 20:44:14'),(20,25,8,'2018-02-21 20:44:14','2018-02-21 20:44:14'),(21,26,8,'2018-02-21 20:44:14','2018-02-21 20:44:14'),(22,27,8,'2018-02-21 20:44:14','2018-02-21 20:44:14'),(23,28,9,'2018-02-21 20:45:09','2018-02-21 20:45:09'),(24,29,9,'2018-02-21 20:45:09','2018-02-21 20:45:09'),(25,30,9,'2018-02-21 20:45:09','2018-02-21 20:45:09'),(26,31,9,'2018-02-21 20:45:09','2018-02-21 20:45:09'),(27,32,9,'2018-02-21 20:45:09','2018-02-21 20:45:09'),(28,33,9,'2018-02-21 20:45:09','2018-02-21 20:45:09'),(29,16,10,'2018-02-26 12:55:46','2018-02-26 12:55:46'),(30,17,10,'2018-02-26 12:55:47','2018-02-26 12:55:47'),(31,18,10,'2018-02-26 12:55:47','2018-02-26 12:55:47'),(32,19,10,'2018-02-26 12:55:47','2018-02-26 12:55:47'),(33,20,10,'2018-02-26 12:55:47','2018-02-26 12:55:47'),(34,21,10,'2018-02-26 12:55:47','2018-02-26 12:55:47'),(35,34,11,'2018-02-26 18:24:49','2018-02-26 18:24:49'),(36,35,11,'2018-02-26 18:24:49','2018-02-26 18:24:49'),(37,36,11,'2018-02-26 18:24:49','2018-02-26 18:24:49'),(38,37,11,'2018-02-26 18:24:49','2018-02-26 18:24:49'),(39,38,11,'2018-02-26 18:24:49','2018-02-26 18:24:49'),(40,39,11,'2018-02-26 18:24:49','2018-02-26 18:24:49');
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_user`
--

DROP TABLE IF EXISTS `permission_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_user_permission_id_index` (`permission_id`),
  KEY `permission_user_user_id_index` (`user_id`),
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_user`
--

LOCK TABLES `permission_user` WRITE;
/*!40000 ALTER TABLE `permission_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'Roles, listar datos','roles.index','Lista y navega todos los roles del sistema','2018-02-08 10:16:40','2018-02-08 10:16:40'),(2,'Rol, ver detalle','roles.show','Ve en detalle cada rol del sistema','2018-02-08 10:16:40','2018-02-08 10:16:40'),(3,'Rol, crear nuevo dato','roles.create','Crear nuevo rol del sistema','2018-02-08 10:16:40','2018-02-13 02:31:00'),(4,'Rol, actualizar dato','roles.edit','Actualizar datos de un rol del sistema','2018-02-08 10:16:40','2018-02-08 10:16:40'),(5,'Rol, eliminar dato','roles.destroy','Elimina un rol del sistema','2018-02-08 10:16:40','2018-02-08 10:16:40'),(6,'Permisos, listar datos','permisos.index','Listar todos los permisos registrados','2018-02-13 00:28:22','2018-02-13 00:28:22'),(7,'Permiso, ver detalle','permiso.show','Ve en detalle el Permiso del sistema','2018-02-13 02:28:03','2018-02-13 02:28:03'),(8,'Permiso, crear nuevo permiso','permiso.create','Crear nuevo permiso del sistema','2018-02-13 02:30:17','2018-02-13 02:30:17'),(9,'Permiso, actualizar permiso','permiso.edit','Actualizar datos de un Permiso del sistema','2018-02-13 02:55:05','2018-02-13 02:55:05'),(10,'Documentacion previa, listar','previous.index','Listar todas las documentaciones previas','2018-02-14 19:08:43','2018-02-14 19:08:43'),(11,'Documentacion previa, crear nuevo','previous.create','Crear un nueva nueva solicitud','2018-02-14 19:10:34','2018-02-14 19:10:34'),(12,'Documentacion previa, editar dato','previous.edit','Actualizar datos de la documentación','2018-02-14 19:11:44','2018-02-14 19:11:44'),(13,'Documentacion previa, mostrar datos','previous.show','Visualizar el detalle de la documentación previa','2018-02-14 19:12:32','2018-02-14 19:12:32'),(14,'Documentacion previa, guardar dato','previous.store','Guardar la documentación previa','2018-02-14 22:18:54','2018-02-14 22:18:54'),(15,'Documentacion previa, actualizar dato','previous.update','Actualizar los datos de la documentación previa','2018-02-14 22:19:49','2018-02-14 22:19:49'),(16,'Elegibilidad Financiero, listar datos','elefin.index','Listado de datos con referente al cumplimiento de elegibilidad financiero','2018-02-21 13:52:19','2018-02-21 20:22:32'),(17,'Elegibilidad Financiero, crear nuevo dato','elefin.create','Visualizar el formulario de registro de nuevo dato de cumplimiento de elegibilidad financiero','2018-02-21 13:53:29','2018-02-21 20:21:55'),(18,'Elegibilidad Financiero, registrar nuevo dato','elefin.store','Registrar nuevo cumplimiento de elegibilidad financiero','2018-02-21 13:54:25','2018-02-21 20:21:22'),(19,'Elegibilidad Financiero, visualizar formulario de edición','elefin.edit','Visualiza el formulario de edicion de datos del cumplimiento de elegilidad financiero','2018-02-21 13:57:10','2018-02-21 20:21:01'),(20,'Elegibilidad Financiero, actualizar datos','elefin.update','Actualiza los datos de un cumplimiento de elegibilidad financiero','2018-02-21 13:58:01','2018-02-21 20:20:39'),(21,'Elegibilidad Financiero, Mostrar un dato','elefin.show','Visualiza en un formulario modal los datos de un cumplimiento de elegibilidad Financiero','2018-02-21 13:59:13','2018-02-21 20:20:05'),(22,'Elegibilidad Técnico, listar datos','eletec.index','Listado de datos con referente al cumplimiento de elegibilidad tecnico','2018-02-21 20:23:59','2018-02-21 20:23:59'),(23,'Elegibilidad Técnico, crear nuevo dato','eletec.create','Visualizar el formulario de registro de nuevo dato de cumplimiento de elegibilidad tecnico','2018-02-21 20:25:49','2018-02-21 20:25:49'),(24,'Elegibilidad Técnico, registrar nuevo dato','eletec.store','Registrar nuevo cumplimiento de elegibilidad tecnico','2018-02-21 20:26:23','2018-02-21 20:26:23'),(25,'Elegibilidad Técnico, visualizar formulario de edición','eletec.edit','Visualiza el formulario de edicion de datos del cumplimiento de elegilidad tecnico','2018-02-21 20:27:37','2018-02-21 20:27:37'),(26,'Elegibilidad Técnico, actualizar datos','eletec.update','Actualiza los datos de un cumplimiento de elegibilidad tecnico','2018-02-21 20:28:27','2018-02-21 20:28:27'),(27,'Elegibilidad Técnico, Mostrar un dato','eletec.show','Visualiza en un formulario modal los datos de un cumplimiento de elegibilidad tecnico','2018-02-21 20:29:15','2018-02-21 20:29:15'),(28,'Elegibilidad Legal, listar datos','eleleg.index','Listado de datos con referente al cumplimiento de elegibilidad legal','2018-02-21 20:37:51','2018-02-21 20:38:54'),(29,'Elegibilidad Legal, crear nuevo dato','eleleg.create','Visualizar el formulario de registro de nuevo dato de cumplimiento de elegibilidad legal','2018-02-21 20:38:37','2018-02-21 20:38:37'),(30,'Elegibilidad Legal, registrar nuevo dato','eleleg.store','Registrar nuevo cumplimiento de elegibilidad legal','2018-02-21 20:39:32','2018-02-21 20:39:32'),(31,'Elegibilidad Legal, visualizar formulario de edición','eleleg.edit','Visualiza el formulario de edicion de datos del cumplimiento de elegilidad legal','2018-02-21 20:40:10','2018-02-21 20:40:10'),(32,'Elegibilidad Legal, actualizar datos','eleleg.update','Actualiza los datos de un cumplimiento de elegibilidad legal','2018-02-21 20:41:15','2018-02-21 20:41:15'),(33,'Elegibilidad Legal, Mostrar un dato','eleleg.show','Visualiza en un formulario modal los datos de un cumplimiento de elegibilidad legal','2018-02-21 20:42:09','2018-02-21 20:42:09'),(34,'Techo Presupuestario, listar datos del techo','techo.index','Techo Presupuestario, listar datos del techo','2018-02-26 18:20:09','2018-02-26 18:20:09'),(35,'Techo Presupuestario, formulario nuevo de registro','techo.create','Techo Presupuestario, formulario nuevo de registro','2018-02-26 18:21:04','2018-02-26 18:21:04'),(36,'Techo Presupuestario, registrar formulario (guardar)','techo.store','Techo Presupuestario, registrar formulario (guardar)','2018-02-26 18:21:44','2018-02-26 18:21:44'),(37,'Techo Presupuestario, formulario de edicion de datos','techo.edit','Techo Presupuestario, formulario de edicion de datos','2018-02-26 18:22:45','2018-02-26 18:22:45'),(38,'Techo Presupuestario, registrar datos actualizados','techo.update','Techo Presupuestario, registrar datos actualizados','2018-02-26 18:23:13','2018-02-26 18:23:13'),(39,'Techo Presupuestario, mostrar datos del techo','techo.show','Techo Presupuestario, mostrar datos del techo','2018-02-26 18:24:04','2018-02-26 18:24:04');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `programas`
--

DROP TABLE IF EXISTS `programas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `programas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pro_sigla` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_estado` tinyint(1) NOT NULL DEFAULT '1',
  `idregistra` int(10) unsigned NOT NULL,
  `idactualiza` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `programas_pro_sigla_unique` (`pro_sigla`),
  UNIQUE KEY `programas_pro_nombre_unique` (`pro_nombre`),
  KEY `programas_idregistra_foreign` (`idregistra`),
  KEY `programas_idactualiza_foreign` (`idactualiza`),
  CONSTRAINT `programas_idactualiza_foreign` FOREIGN KEY (`idactualiza`) REFERENCES `users` (`id`),
  CONSTRAINT `programas_idregistra_foreign` FOREIGN KEY (`idregistra`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `programas`
--

LOCK TABLES `programas` WRITE;
/*!40000 ALTER TABLE `programas` DISABLE KEYS */;
INSERT INTO `programas` VALUES (1,'PNFR','Programa Nacional de Forestación y Deforestación',1,1,1,'2018-02-22 16:10:05','2018-02-22 16:10:05'),(2,'PGIB','Programa de Gestión Integral de Bosques',1,1,1,'2018-02-22 16:10:06','2018-02-22 16:10:06'),(3,'PNRDDB','Programa Nacional de Reforestación de la Degradación y Disminución de Bosques',1,1,1,'2018-02-22 16:10:07','2018-02-22 16:10:07');
/*!40000 ALTER TABLE `programas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user_role_id_index` (`role_id`),
  KEY `role_user_user_id_index` (`user_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (1,2,1,'2018-02-02 04:00:00','2018-02-02 04:00:00'),(2,1,1,'2018-02-13 07:57:03','2018-02-13 07:57:03'),(4,7,2,'2018-02-14 19:14:45','2018-02-14 19:14:45'),(7,7,3,'2018-02-23 21:19:27','2018-02-23 21:19:27'),(8,10,3,'2018-02-26 12:56:30','2018-02-26 12:56:30'),(9,10,2,'2018-02-26 19:54:41','2018-02-26 19:54:41'),(10,8,2,'2018-02-27 19:29:13','2018-02-27 19:29:13'),(11,9,2,'2018-02-28 19:18:40','2018-02-28 19:18:40'),(12,14,4,'2018-03-03 13:14:21','2018-03-03 13:14:21');
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `special` enum('all-access','no-access') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`),
  UNIQUE KEY `roles_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin','slug','Super Administrador','2018-02-08 10:16:43','2018-02-08 10:16:43','all-access'),(2,'direccion','direccion.index','unidad de Direccion','2018-02-09 16:26:27','2018-02-09 16:26:27','all-access'),(4,'mi direccion de rol','direccion.rol','la direccion de este rol aun esta de prueba','2018-02-11 03:43:29','2018-02-11 03:43:29',NULL),(6,'Listar solo rol','slug.rol','Listar solo los roles para ver sus detalles','2018-02-12 20:14:32','2018-02-12 20:14:32',NULL),(7,'Documentación Previa','previous.index','Puede realizar el CRUD completo del modulo de documentación previa','2018-02-14 19:13:45','2018-02-14 19:13:45',NULL),(8,'Cumplimiento de elegibilidad Tecnica','eletec.index','Cumplimiento de elegibilidad Tecnica','2018-02-21 20:44:13','2018-02-21 20:44:13',NULL),(9,'Cumplimiento de elegibilidad Legal','eleleg.index','Cumplimiento de elegibilidad legal','2018-02-21 20:45:09','2018-02-21 20:45:09',NULL),(10,'Cumplimiento de elegibilidad Financiera','elefin.index','Cumplimiento de Elegibilidad Financiera','2018-02-26 12:55:46','2018-02-26 12:55:46',NULL),(11,'Techo Presupuestario','techo.index','Listado de los techos presupuestarios registrados en el sistema','2018-02-26 18:24:49','2018-02-26 18:24:49',NULL),(14,'Direcciion General','direcciongeneral.index','Direccion General (Visualizacion de Reportes)','2018-03-03 13:14:07','2018-03-03 13:14:07','no-access');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `us_nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_paterno` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_materno` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_carnet` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_expedido` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_telefono` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_genero` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idcargo` int(10) unsigned NOT NULL,
  `idprofesion` int(10) unsigned NOT NULL,
  `us_ingresoasis` int(11) NOT NULL DEFAULT '0',
  `us_fechaingreso` datetime DEFAULT NULL,
  `us_imagen` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_nombreimagen` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_cuenta` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_estado` tinyint(1) NOT NULL DEFAULT '1',
  `us_observaciones` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_us_cuenta_unique` (`us_cuenta`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Administrador','Admin','Admin','1234567','LP','0','Masculino',1,1,0,'2018-01-15 00:00:00','archivo/usuario/2018128-225840.jpg','descarga.jpg','admin.super',1,NULL,'admin@admin.com','$2y$10$NmNBlntWzVohNEWXb5sCRu0NLp1ThA2hPOxQYbjkBGTy7vntuegeK','V2tJ7gP8CZjO8Ey7kfS26dI4UYLbZxVkqkCbhD6HbYfbo8pfDCr0xYHYqitf','2018-01-12 04:00:00','2018-01-29 02:58:40'),(2,'Test user','Paterno user','Materno user','552311','OR','76525242','Masculino',1,1,0,'2018-01-15 00:00:00','archivo/usuario/2018213-61448.png','avatar5.png','test.user',1,'-','testuser@test.com','$2y$10$oCXGsaLV.7PeyOIDPKc3OeyGEihVXW1p9AWOI25pzS17UENVvIdJy','83FOUdOBufEW6hlcgCVocivxsqFgcZMy8U1sPnBGx6TPw5vqxwqQ0xnZCMrt','2018-02-13 10:14:49','2018-02-14 19:14:45'),(3,'Mariela','Flores','Tito','6722455','LP','794152558','Femenina',1,1,0,NULL,'archivo/usuario/2018223-171927.png','mariela.png','mariela.flores',1,'ninguna','mariela.flores@fonabosque.gob.bo','$2y$10$ttl7FqEFDnI6zwCPzLZv6Owue/oiVJClKI8HD4eMLsRAoS40mp0KW','AIzl8n8BttrwDtuwwB9MZZYjFZ0MTTrK7yDxQquONoGuJyfDvZu64Qec7Usx','2018-02-23 21:19:27','2018-02-23 21:19:27'),(4,'Roaxan Lourdes','Araujo','Romay','535345','LP','0','Femenina',1,1,0,NULL,'archivo/usuario/201833-91236.jpg','uno.jpg','roxana.araujo',1,'ninguna','roxana.araujo@fonabosque.gob.bo','$2y$10$YqgwmXJS67KmDqeJt8UuMuAqM1W3a.PtYqFEjTdbx7USvHgePuici',NULL,'2018-03-03 13:12:36','2018-03-03 13:12:36');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-02 18:30:50
