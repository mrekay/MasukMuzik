-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: masukmuzik
-- ------------------------------------------------------
-- Server version	5.7.23

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
-- Table structure for table `tbl_muzik`
--

DROP TABLE IF EXISTS `tbl_muzik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_muzik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `unique_id` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `name` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `path` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_muzik`
--

LOCK TABLES `tbl_muzik` WRITE;
/*!40000 ALTER TABLE `tbl_muzik` DISABLE KEYS */;
INSERT INTO `tbl_muzik` VALUES (1,NULL,'665ed4bdb5869','test','user_files//musics/665ed4bdb5869.mp3',NULL),(2,NULL,'665ed7b862c19','test','user_files//musics/665ed7b862c19.mp3',NULL),(3,NULL,'665ed7c3b541b','test','user_files//musics/665ed7c3b541b.mp3',NULL),(4,NULL,'665ed7d469e6a','test','user_files//musics/665ed7d469e6a.mp3',NULL),(5,NULL,'665edbf91e2e8','test','user_files//musics/665edbf91e2e8.mp3',NULL),(6,NULL,'665edc2b32e8f','test','user_files//musics/665edc2b32e8f.mp3',NULL),(7,NULL,'665edc3e76725','test','user_files//musics/665edc3e76725.mp3',NULL),(8,NULL,'665edc4794964','test','user_files//musics/665edc4794964.mp3',NULL),(9,1,'665edd0ae0a43','test','user_files/1/musics/665edd0ae0a43.mp3',NULL),(10,1,'665edd90d91fd','test','user_files/1/musics/665edd90d91fd.mp3',NULL),(11,1,'665edd9648788','test','user_files/1/musics/665edd9648788.mp3',NULL);
/*!40000 ALTER TABLE `tbl_muzik` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_muzik_playlist`
--

DROP TABLE IF EXISTS `tbl_muzik_playlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_muzik_playlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `music_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `playlist_id` int(11) DEFAULT NULL,
  `create_date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_muzik_playlist`
--

LOCK TABLES `tbl_muzik_playlist` WRITE;
/*!40000 ALTER TABLE `tbl_muzik_playlist` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_muzik_playlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_playlists`
--

DROP TABLE IF EXISTS `tbl_playlists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_playlists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_private` int(11) DEFAULT NULL,
  `create_date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_playlists`
--

LOCK TABLES `tbl_playlists` WRITE;
/*!40000 ALTER TABLE `tbl_playlists` DISABLE KEYS */;
INSERT INTO `tbl_playlists` VALUES (1,'test',1,0,'2024-06-04 15:24:05'),(2,'deneme',1,0,'2024-06-04 15:24:35'),(3,'deneme',1,0,'2024-06-04 15:24:36'),(4,'54',1,0,'2024-06-04 15:25:00'),(5,'detes',1,0,'2024-06-04 15:25:10'),(6,'abdÃ¼',1,0,'2024-06-04 15:25:19');
/*!40000 ALTER TABLE `tbl_playlists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `create_date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_users`
--

LOCK TABLES `tbl_users` WRITE;
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` VALUES (1,'ertugrul','Ertuğrul Kadir','ALEMDAROĞLU','1f82ea75c5cc526729e2d581aeb3aeccfef4407e','2024-06-04 12:12:44');
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'masukmuzik'
--

--
-- Dumping routines for database 'masukmuzik'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-08-31 14:52:58
