-- Progettazione Web 
DROP DATABASE if exists db_flappyBird; 
CREATE DATABASE db_flappyBird; 
USE db_flappyBird; 
-- MySQL dump 10.13  Distrib 5.7.28, for Win64 (x86_64)
--
-- Host: localhost    Database: db_flappyBird
-- ------------------------------------------------------
-- Server version	5.7.28

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
-- Table structure for table `game`
--

DROP TABLE IF EXISTS `game`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `_username` varchar(20) NOT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  `played_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `_username` (`_username`),
  CONSTRAINT `game_ibfk_1` FOREIGN KEY (`_username`) REFERENCES `utenti` (`username`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game`
--

LOCK TABLES `game` WRITE;
/*!40000 ALTER TABLE `game` DISABLE KEYS */;
INSERT INTO `game` VALUES (1,'mario',4,'2023-06-02 16:30:07'),(2,'mario',9,'2023-06-02 16:32:45'),(3,'luigi',2,'2023-06-02 16:33:34'),(4,'luigi',0,'2023-06-02 16:33:38'),(5,'sara',10,'2023-06-02 16:34:40'),(6,'sara',0,'2023-06-02 16:34:58'),(7,'sara',2,'2023-06-02 16:35:11'),(8,'marti01',0,'2023-06-02 16:36:21'),(9,'marti01',5,'2023-06-02 16:36:43'),(10,'marti01',8,'2023-06-02 16:37:24'),(11,'pippo',0,'2023-06-02 16:38:04'),(12,'pippo',0,'2023-06-02 16:38:17'),(13,'pippo',4,'2023-06-02 16:38:36'),(14,'pippo',0,'2023-06-02 16:38:47'),(15,'pippo',0,'2023-06-02 16:38:50'),(16,'pippo',3,'2023-06-02 16:39:06'),(17,'ross00',11,'2023-06-02 16:40:37'),(18,'ross00',6,'2023-06-02 16:41:05'),(19,'ross00',0,'2023-06-02 16:41:09'),(20,'marti01',1,'2023-06-02 16:47:35'),(21,'marti01',7,'2023-06-02 16:48:12'),(22,'marti01',1,'2023-06-02 16:49:50');
/*!40000 ALTER TABLE `game` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utenti`
--

DROP TABLE IF EXISTS `utenti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utenti` (
  `username` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utenti`
--

LOCK TABLES `utenti` WRITE;
/*!40000 ALTER TABLE `utenti` DISABLE KEYS */;
INSERT INTO `utenti` VALUES ('luigi','$2y$10$o0pChKvEYstquE8ZCi64F.1H9tW2ZdcgbYcPZGhiH0Ssi7xAD5qam'),('mario','$2y$10$x6RqTTCAYyAv3wjERqqM5u80fNJUVEtTMPo4EuNYC2ZPHpK9yDEdW'),('marti01','$2y$10$gqNXaMe7Op1qkYnYKQiM2OWeelqTdDmO5l9elXnSg1nR/LNoWPoTu'),('pippo','$2y$10$QOPnKCNWnahALn4/lvy0JuvR/8EsO.CEWWdUlAOciG72AUUeRwzZS'),('ross00','$2y$10$ezHl2ugH9b1vL4HmNHRJtu173Dihd3p1EzkKrkH8pwgSyeFfTQLZ2'),('sara','$2y$10$e9IQIYQXRd5XHFyVcsojJ.PyxvefUutZE8foJWNPQcwikLyJm2asK');
/*!40000 ALTER TABLE `utenti` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-02 16:51:44
