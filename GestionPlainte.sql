-- MySQL dump 10.13  Distrib 8.0.32, for Linux (x86_64)
--
-- Host: localhost    Database: GestionPlainte
-- ------------------------------------------------------
-- Server version	8.0.32-0ubuntu0.20.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `plaignant`
--

DROP TABLE IF EXISTS `plaignant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `plaignant` (
  `id_plaignant` int unsigned NOT NULL AUTO_INCREMENT,
  `nom_plaignant` varchar(50) DEFAULT NULL,
  `adresse_plaignant` varchar(50) DEFAULT NULL,
  `email_plaignant` varchar(100) DEFAULT NULL,
  `tel_plaignant` varchar(10) DEFAULT NULL,
  `anonyme` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_plaignant`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plaignant`
--

LOCK TABLES `plaignant` WRITE;
/*!40000 ALTER TABLE `plaignant` DISABLE KEYS */;
INSERT INTO `plaignant` VALUES (44,NULL,NULL,NULL,NULL,1,'2023-02-17 22:50:30'),(45,'User_1','Yopougon','user_1@gmail.com','0404552069',1,'2023-02-17 22:51:48'),(46,'User_2','Adjamé','user_2@gmail.com','0547589565',1,'2023-02-17 23:02:25'),(47,'user_3','Abobo','usr_3@gmail.com','0745856952',1,'2023-02-17 23:05:15'),(48,'user_encore','Cocody','user_encore@gmail.com','0504548565',1,'2023-02-17 23:08:43'),(49,'dd','dddd','ddae@gmail','0547589565',1,'2023-02-17 23:15:38'),(50,'\'zt(y-hry','efzrgthyrh','ztehryf@gmail','0547589565',1,'2023-02-17 23:17:16'),(51,'Rakistaba','Treicheville','rakis@gmail.com','0542658545',1,'2023-02-20 10:35:16'),(52,NULL,NULL,NULL,NULL,1,'2023-02-20 10:36:26');
/*!40000 ALTER TABLE `plaignant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plainte`
--

DROP TABLE IF EXISTS `plainte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `plainte` (
  `id_plainte` int unsigned NOT NULL AUTO_INCREMENT,
  `date_plainte` date DEFAULT NULL,
  `objet_plainte` varchar(50) DEFAULT NULL,
  `description_plainte` varchar(255) DEFAULT NULL,
  `mode_emission` varchar(10) DEFAULT NULL,
  `id_plaignant` int unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_plainte`),
  KEY `id_plaignant` (`id_plaignant`),
  CONSTRAINT `plainte_ibfk_1` FOREIGN KEY (`id_plaignant`) REFERENCES `plaignant` (`id_plaignant`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plainte`
--

LOCK TABLES `plainte` WRITE;
/*!40000 ALTER TABLE `plainte` DISABLE KEYS */;
INSERT INTO `plainte` VALUES (15,'2023-02-17','Objet_Anonyme','Description_Anonyme','Courier',44,'2023-02-17 22:50:30'),(16,'2023-02-14','Essai1','Description_essai_1','Email',47,'2023-02-17 23:05:15'),(17,'2023-02-26','Encore','Description_encore','Email',48,'2023-02-17 23:08:43'),(18,'2023-02-08','bll','bll','Email',49,'2023-02-17 23:15:38'),(19,'2023-02-15','pufœ','zergetry','Courier',50,'2023-02-17 23:17:16'),(20,'2023-02-17','Essai_11','Description essai_11','Email',51,'2023-02-20 10:35:16'),(21,'2023-02-24','Essai_anonyme','Description_anonyme','Email',52,'2023-02-20 10:36:26');
/*!40000 ALTER TABLE `plainte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reponse`
--

DROP TABLE IF EXISTS `reponse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reponse` (
  `id_reponse` int unsigned NOT NULL AUTO_INCREMENT,
  `date_reponse` date DEFAULT NULL,
  `objet_reponse` varchar(50) DEFAULT NULL,
  `description_reponse` varchar(255) DEFAULT NULL,
  `emis_par` varchar(10) DEFAULT NULL,
  `codeT` int unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_reponse`),
  KEY `codeT` (`codeT`),
  CONSTRAINT `reponse_ibfk_1` FOREIGN KEY (`codeT`) REFERENCES `transmission` (`codeT`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reponse`
--

LOCK TABLES `reponse` WRITE;
/*!40000 ALTER TABLE `reponse` DISABLE KEYS */;
/*!40000 ALTER TABLE `reponse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `service` (
  `codeS` int unsigned NOT NULL AUTO_INCREMENT,
  `libelleS` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`codeS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service`
--

LOCK TABLES `service` WRITE;
/*!40000 ALTER TABLE `service` DISABLE KEYS */;
/*!40000 ALTER TABLE `service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transmission`
--

DROP TABLE IF EXISTS `transmission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transmission` (
  `codeT` int unsigned NOT NULL AUTO_INCREMENT,
  `date_transmission` date DEFAULT NULL,
  `date_reponse` date DEFAULT NULL,
  `id_plainte` int unsigned NOT NULL,
  `codeS` int unsigned NOT NULL,
  PRIMARY KEY (`codeT`),
  KEY `id_plainte` (`id_plainte`),
  KEY `codeS` (`codeS`),
  CONSTRAINT `transmission_ibfk_1` FOREIGN KEY (`id_plainte`) REFERENCES `plainte` (`id_plainte`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `transmission_ibfk_2` FOREIGN KEY (`codeS`) REFERENCES `service` (`codeS`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transmission`
--

LOCK TABLES `transmission` WRITE;
/*!40000 ALTER TABLE `transmission` DISABLE KEYS */;
/*!40000 ALTER TABLE `transmission` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-02-20 10:49:51
