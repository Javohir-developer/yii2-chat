-- MySQL dump 10.13  Distrib 8.0.25, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: yii2_chat
-- ------------------------------------------------------
-- Server version	8.0.25-0ubuntu0.20.04.1

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
-- Table structure for table `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `idx-auth_assignment-user_id` (`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_assignment`
--

LOCK TABLES `auth_assignment` WRITE;
/*!40000 ALTER TABLE `auth_assignment` DISABLE KEYS */;
INSERT INTO `auth_assignment` VALUES ('Admin','1',NULL),('Admin','10',NULL),('Admin','12',NULL),('User','11',NULL),('User','2',NULL),('User','3',NULL),('User','4',NULL),('User','5',NULL),('User','6',NULL),('User','7',NULL),('User','8',NULL),('User','9',NULL);
/*!40000 ALTER TABLE `auth_assignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item`
--

LOCK TABLES `auth_item` WRITE;
/*!40000 ALTER TABLE `auth_item` DISABLE KEYS */;
INSERT INTO `auth_item` VALUES ('Admin',1,'Registered users, members of this site',NULL,NULL,1622672855,1622672855),('Drektor',1,'Registered users, members of this site',NULL,NULL,1622672854,1622672854),('theCreator',1,'You!',NULL,NULL,1622672855,1622672855),('User',1,'Registered users, members of this site',NULL,NULL,1622672854,1622672854),('UserController',2,'Allows premium+ roles to use premium content',NULL,NULL,1622672853,1622672853);
/*!40000 ALTER TABLE `auth_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item_child`
--

LOCK TABLES `auth_item_child` WRITE;
/*!40000 ALTER TABLE `auth_item_child` DISABLE KEYS */;
INSERT INTO `auth_item_child` VALUES ('theCreator','Admin'),('theCreator','Drektor'),('theCreator','User'),('Admin','UserController'),('Drektor','UserController'),('User','UserController');
/*!40000 ALTER TABLE `auth_item_child` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_rule`
--

LOCK TABLES `auth_rule` WRITE;
/*!40000 ALTER TABLE `auth_rule` DISABLE KEYS */;
INSERT INTO `auth_rule` VALUES ('isAuthor',_binary 'O:28:\"common\\rbac\\rules\\AuthorRule\":3:{s:4:\"name\";s:8:\"isAuthor\";s:9:\"createdAt\";i:1622672853;s:9:\"updatedAt\";i:1622672853;}',1622672853,1622672853);
/*!40000 ALTER TABLE `auth_rule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('m000000_000000_base',1622672824),('m130524_201442_init',1622672829),('m140506_102106_rbac_init',1622672844),('m170907_052038_rbac_add_index_on_auth_assignment_user_id',1622672845),('m180523_151638_rbac_updates_indexes_without_prefix',1622672847),('m190124_110200_add_verification_token_column_to_user_table',1622672830),('m200409_110543_rbac_update_mssql_trigger',1622672847),('m210602_195744_create_post_table',1622672831);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `partner_id` int NOT NULL,
  `body` text,
  `date` datetime DEFAULT NULL,
  `status` smallint NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (1,12,11,'lorem ',NULL,1),(2,11,12,'sfadda',NULL,1),(3,12,11,'salom',NULL,1),(4,12,11,'asda',NULL,1),(5,12,11,'asdfa',NULL,1),(6,12,11,'asdas',NULL,1),(7,11,12,'xabar',NULL,1),(8,12,11,'sasaas',NULL,1),(9,12,11,'asdfasdf',NULL,1),(10,12,11,'sdasdfas',NULL,1),(11,12,11,'asdfasdf',NULL,1),(12,12,11,'asdfasd',NULL,1),(13,12,11,'asdfasdgfasd',NULL,1),(14,12,11,'asdfasdfa',NULL,1);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rule` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint NOT NULL DEFAULT '10',
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Javohir123','Javohir12',NULL,'ubNKLP4N-WE9uso9mSaMfxCJJJzS35t9','$2y$13$zCHUI//yDfwrgaxxlfxETeI3N/lE859ul/3EAyCpIqpwSoD5rILD2',NULL,NULL,'Admin',10,1622672908,1622674379,'1rSfxXc5WjjKMRW_n10zlgxQDPLFMOEW_1622672908'),(2,'Javohir1','Javohir1',NULL,'Nid_CJm-4HGlKIYuuK1a6KqImtoQy7Cu','$2y$13$aBtOWbAaDVWLI.W67pFwMOa6ti8oZh91rIUg2tDiH6frXEtGOYbPW',NULL,NULL,'User',10,1622673591,1622673591,'uNEgLriR6jG-atRTGT--0DjY3YCU51W__1622673591'),(3,'Javohir11','Javohir11',NULL,'LtVevShfArxOcAOm1MCnpUMjBpO96CT6','$2y$13$8WhGRMDDich2rt2qeoMiaepbxObDcYFXEeJOWihTdzNsNYXYA1UHi',NULL,NULL,'User',10,1622673638,1622673638,'x-wAMF39ioa1cNWx7J0OLiXj6tFTssC3_1622673638'),(4,'Javohir12','Javohir12',NULL,'3YSkSbHcoICFmAgsndvXmQy94dvte15r','$2y$13$TIG/LWJcC8CDkhrye68QUO7ImYvUPELdqnGlByfZoT9qFMxHHoyQO',NULL,NULL,'User',10,1622673806,1622673806,'geo_PJChLe17CUfWbxxTsP8HuWOq06Sv_1622673806'),(5,'Javohir13','Javohir13',NULL,'T67dJcFH8s4YM-z9NZi4Fp73dNjr4NVa','$2y$13$UZmQfRidT35u/Yid6ZTu3ebEVmuaJ7htCDoky7lwYcQne0WxKIr.i',NULL,NULL,'User',10,1622673886,1622673886,'JmROU9H1n18tcC61Wz9PC2SnYcidVWb-_1622673886'),(6,'Javohir1123413','Javohir12',NULL,'0td1Ab5yRnoGCWao2kcZQo-t2iBXlXI7','$2y$13$jf/bmS.m6DdbfdeRpBhin.l3qYjiy04oPqhAb4f7OMV/gftuUW/J2',NULL,NULL,'Admin',9,1622674530,1622674570,'vriYZVDVNdNyowEw4MZ0rAf7adJE18DK_1622674530'),(7,'Javohir11231231','Javohir11231231',NULL,'eWFHusCGZTLde-k_oX3wUuN89qEKreV4','$2y$13$sKzsgHCg0395dhspGSCS4OPCDrNKlZEvIdQEBTVY0M4QZxH/bYmLy',NULL,NULL,'User',10,1622674609,1622674609,'vugm-aP8lPwulqGoDZnY831eNwtXJbc6_1622674609'),(8,'Javohir1321','Javohir1321',NULL,'lNPOHY6GCriTlEStzRt_lYOoCjiWeo_-','$2y$13$xkZqH.CBxYKdtMWJx/chYOOYtR.njgo7vslowVpgAPwopaax83YB6',NULL,NULL,'User',10,1622674724,1622674724,'5VQ9qLxS3dcOebNKZ0eWuqIMGAVBwyer_1622674724'),(9,'Javohir1312','Javohir1312',NULL,'iwrbcDGvbcJzGE77Z4UGf5x68HH3gyEh','$2y$13$aKigitM9Jtam5si0.llfIOBOc/mRkk6U61NGgYIl/OPTu39gA62WC',NULL,NULL,'User',10,1622674804,1622674804,'OrfsFTK3IUkKYa_HCuP1odXmCLBI6nIe_1622674804'),(10,'Javohir1qwq','Javohir1qwq',NULL,'VRYxzb9t9rB6-xpMeleI43lLperwIG8Q','$2y$13$xjKv3P30aDnJBEkFrso6LO9f5XoGFFq4OBPAx6vEQkV6MLZpk8YgC',NULL,NULL,'Admin',9,1622674876,1622674876,'dhD3i662MrMp_Uw2ZwJLbk5KzyXjZmIK_1622674876'),(11,'javohir1998321','Elmurodov Javohir',NULL,'yvw9J3YN8G_O3-ZvQSVVQyQbSLDXwpky','$2y$13$9xyKoM0IRzvWvxLY44pj2.3DnhMjcoCo5mPI9VJSkL4E/mibgGdz.',NULL,NULL,'User',10,1622691474,1622691474,'vbdOh7DLRFe94Lm8PUaFKRkjHmHA0DcO_1622691474'),(12,'@Javohir11998','Elmurodov Javohir',NULL,'pE27AKdDTlz5vDQZ6d3Uw1BWFg9S73a8','$2y$13$gP0ic06/6L14x41I6EPg4OHOikDIwp27w7x7ggkK4Igjp5b.kh6vG',NULL,NULL,'Admin',10,1622691512,1622691512,'OXR4XfyqXrRzNoS1SackVhzszVblJ92i_1622691512');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-03 15:19:21
