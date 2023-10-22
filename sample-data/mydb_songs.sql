CREATE DATABASE  IF NOT EXISTS `mydb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `mydb`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: mydb
-- ------------------------------------------------------
-- Server version	8.0.34

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `songs`
--

DROP TABLE IF EXISTS `songs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `songs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(400) DEFAULT NULL,
  `artist` varchar(400) DEFAULT NULL,
  `album` varchar(400) DEFAULT NULL,
  `cover` varchar(300) DEFAULT NULL,
  `cover-alt-text` varchar(100) DEFAULT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `link` varchar(500) DEFAULT NULL,
  `lyrics` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `link_UNIQUE` (`link`),
  UNIQUE KEY `lyrics_UNIQUE` (`lyrics`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `songs`
--

LOCK TABLES `songs` WRITE;
/*!40000 ALTER TABLE `songs` DISABLE KEYS */;
INSERT INTO `songs` VALUES (1,'Dramaturgy','Eve','Bunka','IMG_652ed3e828e789.50127255.png','eve original art','Jpop','jJzw1h5CR-I','LYRICS_652ed3e828e7f8.97761838.txt'),(2,'Desvelado','Bobby Pulido','Desvelado','IMG_652ed4903b2223.11820468.png','bobby portrait','Regional','qyMp1ADlRD8','LYRICS_652ed4903b2297.50337365.txt'),(3,'Now and Then','Re:vale','Single','IMG_652ed82fcf6de9.51083419.jpg','now & then with pink and green','Idol','YZscMf4jg0w','LYRICS_652ed82fcf6e76.22748888.txt'),(4,'New Genesis','Ado','UTAS SONGS ONE PIECE FILM RED','IMG_652ed8dd906bd0.57724121.png','one piece art of ado, uta, and luffy','Jpop','1FliVTcX8bQ','LYRICS_652ed8dd906c36.09369712.txt'),(5,'PLEDGE','the GazettE','TOXIC','IMG_652edb3485e667.99297376.jpg','','Visual Kei','3khQd1dnaP0','LYRICS_652edb3485e753.08077337.txt'),(6,'Reila','the GazettE','Single','IMG_652edb7a097fa8.73579244.png','white hands and blood','Visual Kei','deVOCuLEjG0','LYRICS_652edb7a098037.43119496.txt'),(7,'God Shattering Star','FamilyJules','Single','IMG_652f3277ae69d0.77443177.png','nemesis art','Metal','jXu9htg70P8','LYRICS_652f3277ae6c11.55125178.txt'),(10,'Bury The Light','Casey Edwards','Devil May Cry 5','IMG_6535439bb083c2.22155354.jpg','DMC5 logo','Metal','Jrg9KxGNeJY','LYRICS_6535439bb08463.21934251.txt'),(11,'No Sacrifice','ZOOL','No Sacrifice','IMG_653544343f3f03.97117751.png','zool illustration','Idol','cg28_DcaXkY','LYRICS_653544343f3f95.25198053.txt');
/*!40000 ALTER TABLE `songs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-22 19:04:18
