-- MySQL dump 10.13  Distrib 8.0.27, for macos11 (x86_64)
--
-- Host: 127.0.0.1    Database: bms
-- ------------------------------------------------------
-- Server version	8.0.29

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
-- Table structure for table `clearances`
--

DROP TABLE IF EXISTS `clearances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clearances` (
  `id` int NOT NULL AUTO_INCREMENT,
  `requestedby` int DEFAULT NULL,
  `purpose` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `status` varchar(32) DEFAULT 'Pending',
  PRIMARY KEY (`id`),
  KEY `clearances_id_fk` (`requestedby`),
  CONSTRAINT `clearances_id_fk` FOREIGN KEY (`requestedby`) REFERENCES `residents` (`residentid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clearances`
--

LOCK TABLES `clearances` WRITE;
/*!40000 ALTER TABLE `clearances` DISABLE KEYS */;
INSERT INTO `clearances` VALUES (1,2,'For purposes of enrolling at PUP','2022-05-17 08:18:51','2022-05-28 14:45:45',NULL,'Completed'),(2,4,'Enrollment','2022-05-28 21:47:17','2022-05-28 21:48:14',NULL,'Completed');
/*!40000 ALTER TABLE `clearances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `complaintnotes`
--

DROP TABLE IF EXISTS `complaintnotes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `complaintnotes` (
  `noteid` int NOT NULL AUTO_INCREMENT,
  `complaintid` int DEFAULT NULL,
  `notes` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `enteredby` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`noteid`),
  KEY `note_complaintid_fk` (`complaintid`),
  CONSTRAINT `note_complaintid_fk` FOREIGN KEY (`complaintid`) REFERENCES `complaints` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `complaintnotes`
--

LOCK TABLES `complaintnotes` WRITE;
/*!40000 ALTER TABLE `complaintnotes` DISABLE KEYS */;
INSERT INTO `complaintnotes` VALUES (1,1,'I entered this nonsense note','2022-05-16 08:28:39','2022-05-17 09:20:04','2022-05-17 09:20:04','Dela Cruz, Juan Santos'),(2,1,'Another note from me','2022-05-16 08:28:56','2022-05-16 08:28:56',NULL,'Dela Cruz, Juan Santos'),(3,1,'Third note','2022-05-16 08:32:25','2022-05-16 08:32:25',NULL,'Dela Cruz, Juan Santos'),(4,1,'Pang apat','2022-05-16 08:33:23','2022-05-16 14:50:37','2022-05-16 14:50:37','Dela Cruz, Juan Santos'),(5,1,'Fifth','2022-05-16 08:33:54','2022-05-16 08:33:54',NULL,'Dela Cruz, Juan Santos'),(6,1,'asdfasdfasdfasdfasdfasdf','2022-05-16 08:34:16','2022-05-16 14:52:23','2022-05-16 14:52:23','Dela Cruz, Juan Santos'),(7,2,'Notes for second complaint','2022-05-16 08:36:54','2022-05-16 08:36:54',NULL,'Dela Cruz, Juan Santos'),(8,1,'This is another note from another day','2022-05-18 04:31:06','2022-05-18 04:31:06',NULL,'Dela Cruz, Juan Santos'),(9,1,'Note 23234','2022-05-28 21:42:44','2022-05-28 21:42:44',NULL,'Dela Cruz, Jan-ssen Santos');
/*!40000 ALTER TABLE `complaintnotes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `complaints`
--

DROP TABLE IF EXISTS `complaints`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `complaints` (
  `id` int NOT NULL AUTO_INCREMENT,
  `complainant` varchar(255) DEFAULT NULL,
  `complainee` varchar(255) DEFAULT NULL,
  `complaint` text,
  `resolution` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `complaints`
--

LOCK TABLES `complaints` WRITE;
/*!40000 ALTER TABLE `complaints` DISABLE KEYS */;
INSERT INTO `complaints` VALUES (1,'Complainant 1',' Complainee ','I have modified this complaint description again and again and again',NULL,'2022-05-16 06:38:30','2022-05-16 14:54:32',NULL,'Open'),(2,'Complainant 2','Another Complainee','this is a legit complaint','No further action required','2022-05-16 08:35:33','2022-05-16 09:35:12',NULL,'Resolved');
/*!40000 ALTER TABLE `complaints` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `getclearances`
--

DROP TABLE IF EXISTS `getclearances`;
/*!50001 DROP VIEW IF EXISTS `getclearances`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `getclearances` AS SELECT 
 1 AS `id`,
 1 AS `requestedby`,
 1 AS `purpose`,
 1 AS `created_at`,
 1 AS `updated_at`,
 1 AS `deleted_at`,
 1 AS `status`,
 1 AS `lastname`,
 1 AS `firstname`,
 1 AS `middlename`,
 1 AS `fullname`,
 1 AS `civilstatus`,
 1 AS `gender`,
 1 AS `birthday`,
 1 AS `age`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `gettransactions`
--

DROP TABLE IF EXISTS `gettransactions`;
/*!50001 DROP VIEW IF EXISTS `gettransactions`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `gettransactions` AS SELECT 
 1 AS `id`,
 1 AS `requestid`,
 1 AS `ornumber`,
 1 AS `amountpaid`,
 1 AS `created_at`,
 1 AS `updated_at`,
 1 AS `deleted_at`,
 1 AS `fullname`,
 1 AS `status`,
 1 AS `purpose`,
 1 AS `daterequested`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `privs`
--

DROP TABLE IF EXISTS `privs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `privs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userid` int DEFAULT NULL,
  `privtype` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `priv_userid_fk` (`userid`),
  CONSTRAINT `priv_userid_fk` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `privs`
--

LOCK TABLES `privs` WRITE;
/*!40000 ALTER TABLE `privs` DISABLE KEYS */;
/*!40000 ALTER TABLE `privs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `residents`
--

DROP TABLE IF EXISTS `residents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `residents` (
  `residentid` int NOT NULL AUTO_INCREMENT,
  `lastname` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `contactnumber` varchar(32) DEFAULT NULL,
  `address` text,
  `email` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `civilstatus` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`residentid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `residents`
--

LOCK TABLES `residents` WRITE;
/*!40000 ALTER TABLE `residents` DISABLE KEYS */;
INSERT INTO `residents` VALUES (1,'Pacquito','Emmanuel','Santos','099813456789','#45 Purok 1, Sampaguita Street','mpaquiao@mailinator.com','2022-05-15 06:01:51','2022-05-17 02:42:27',NULL,'Male','1991-06-19','Single'),(2,'Lopez','Mark Henderson','Lacson','099813456789','#19 Purok 1, Sampaguita Street','mlopez@mailinator.com','2022-05-15 06:10:52','2022-05-17 02:42:36',NULL,'Male','1991-01-13','Married'),(3,'Lopez','Mark Henderson','Lacson','099813456789','#19 Purok 1, Sampaguita Street','mlopez@mailinator.com','2022-05-15 06:26:08','2022-05-15 17:28:24','2022-05-15 17:28:24','Male','1991-01-13',NULL),(4,'Martinez','Jamie','De Leon','09751236789','$9 Purok 5','jmartinez@mailinator.com','2022-05-15 17:24:50','2022-05-17 02:42:45',NULL,'Female','1995-11-09','Single');
/*!40000 ALTER TABLE `residents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `systemactivities`
--

DROP TABLE IF EXISTS `systemactivities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `systemactivities` (
  `id` int NOT NULL AUTO_INCREMENT,
  `performedby` text,
  `actionperformed` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `systemactivities`
--

LOCK TABLES `systemactivities` WRITE;
/*!40000 ALTER TABLE `systemactivities` DISABLE KEYS */;
INSERT INTO `systemactivities` VALUES (1,'Dela Cruz, Jan-ssen Santos','Deleted user with User ID: 7','2022-05-29 07:33:21',NULL,NULL),(2,'Dela Cruz, Jan-ssen Santos','Updated user with User ID: 4','2022-05-29 07:45:26',NULL,NULL),(3,'Dela Cruz, Jan-ssen Santos','Updated user with User ID: 4','2022-05-29 07:55:02',NULL,NULL),(4,'Dela Cruz, Jan-ssen Santos','Updated user with User ID: 4','2022-05-29 07:55:59',NULL,NULL),(5,'Dela Cruz, Jan-ssen Santos','Added notes on complaint with Complaint ID: 1','2022-05-29 10:42:44',NULL,NULL),(6,'Dela Cruz, Jan-ssen Santos','Added clearance request requested by Resident ID: 4','2022-05-29 10:47:17',NULL,NULL),(7,'Dela Cruz, Jan-ssen Santos','Created payment for Request ID: 2','2022-05-29 10:47:50',NULL,NULL),(8,'Dela Cruz, Jan-ssen Santos','Completed clearance request with Clearance ID: 2','2022-05-29 10:48:14',NULL,NULL);
/*!40000 ALTER TABLE `systemactivities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TRANSACTIONS`
--

DROP TABLE IF EXISTS `TRANSACTIONS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `TRANSACTIONS` (
  `id` int NOT NULL AUTO_INCREMENT,
  `requestid` int DEFAULT NULL,
  `ornumber` varchar(255) DEFAULT NULL,
  `amountpaid` decimal(10,2) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `requestid` (`requestid`),
  UNIQUE KEY `ornumber` (`ornumber`),
  CONSTRAINT `transaction_reqid_fk` FOREIGN KEY (`requestid`) REFERENCES `clearances` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TRANSACTIONS`
--

LOCK TABLES `TRANSACTIONS` WRITE;
/*!40000 ALTER TABLE `TRANSACTIONS` DISABLE KEYS */;
INSERT INTO `TRANSACTIONS` VALUES (2,1,'OR00001',50.00,'2022-05-17 09:06:20','2022-05-17 09:06:20',NULL),(3,2,'OR000034',50.00,'2022-05-28 21:47:50','2022-05-28 21:47:50',NULL);
/*!40000 ALTER TABLE `TRANSACTIONS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `useractivities`
--

DROP TABLE IF EXISTS `useractivities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `useractivities` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userid` int DEFAULT NULL,
  `activity` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_activities_fk` (`userid`),
  CONSTRAINT `user_activities_fk` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `useractivities`
--

LOCK TABLES `useractivities` WRITE;
/*!40000 ALTER TABLE `useractivities` DISABLE KEYS */;
INSERT INTO `useractivities` VALUES (1,1,'Logged in','2022-05-29 06:45:33',NULL,NULL),(2,1,'Updated profile information','2022-05-29 06:48:09',NULL,NULL),(3,1,'Logged out','2022-05-29 07:07:19',NULL,NULL),(4,1,'Logged in','2022-05-29 07:07:24',NULL,NULL),(5,1,'Logged out','2022-05-29 07:47:14',NULL,NULL),(6,4,'Logged in','2022-05-29 07:47:22',NULL,NULL),(7,4,'Logged out','2022-05-29 07:49:11',NULL,NULL),(8,1,'Logged in','2022-05-29 07:49:15',NULL,NULL),(9,1,'Logged out','2022-05-29 07:55:09',NULL,NULL),(10,4,'Logged in','2022-05-29 07:55:15',NULL,NULL),(11,4,'Logged out','2022-05-29 07:55:37',NULL,NULL),(12,1,'Logged in','2022-05-29 07:55:44',NULL,NULL),(13,1,'Logged out','2022-05-29 08:57:27',NULL,NULL),(14,NULL,'Logged out','2022-05-29 08:57:56',NULL,NULL),(15,NULL,'Logged out','2022-05-29 08:58:09',NULL,NULL),(16,1,'Logged in','2022-05-29 08:58:18',NULL,NULL),(17,1,'Logged out','2022-05-29 09:10:45',NULL,NULL),(18,1,'Logged in','2022-05-29 10:41:24',NULL,NULL),(19,1,'Updated profile information','2022-05-29 10:49:00',NULL,NULL),(20,1,'Logged out','2022-05-29 10:49:51',NULL,NULL),(21,4,'Logged in','2022-05-29 10:49:56',NULL,NULL),(22,4,'Logged out','2022-05-29 10:50:42',NULL,NULL),(23,NULL,'Logged out','2022-05-29 10:54:24',NULL,NULL),(24,1,'Logged in','2022-05-29 10:55:10',NULL,NULL);
/*!40000 ALTER TABLE `useractivities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `userid` int NOT NULL AUTO_INCREMENT,
  `lastname` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `address` text,
  `email` varchar(255) DEFAULT NULL,
  `loginpassword` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `roletype` int DEFAULT '0',
  `contactnumber` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Dela Cruz','Janssen','Santos','Purok 2 Sampaguita Street','jdelacruz@mailinator.com','$2y$10$Ay7o9xI7k2iYMD8IPl7.qeUQ955N4bAOUjNvtrTf11FvAr1cNEkL.','2022-05-13 09:04:17','2022-05-28 21:49:00',NULL,1,'09171234567'),(4,'Apelado','Rholex John','Yamat','Poblacion, San Manuel, Tarlac','baitrholex@mailinator.com','$2y$10$v.SNIgGfKGvXExIWqoYusOjAvJouWjaSI9tCtpZ1StNFWwbv1M9/K','2022-05-14 03:02:36','2022-05-28 18:55:59',NULL,0,'09187345678'),(6,'Apelado','Rholex','Yamat','Poblacion, San Manuel, Tarlac','baitrholex2@mailinator.com','$2y$10$NUlwM8JstvGVEIoeFGnPCOCs6p4WfvZYgQJyrjw1M0QYFLKcna4GK','2022-05-15 09:44:59','2022-05-15 10:28:48','2022-05-15 10:28:48',0,''),(7,'Sagun','Jomer Jon','Caliguran','#33 Purok 3','jsagun@mailinator.com','$2y$10$imta0D961njcBYVGml2i/e2tlIWaTWtQ8aOSokzTimZda2kMBQjVq','2022-05-15 10:10:46','2022-05-28 18:33:21','2022-05-28 18:33:21',0,'0998765432');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `getclearances`
--

/*!50001 DROP VIEW IF EXISTS `getclearances`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `getclearances` AS select `clearances`.`id` AS `id`,`clearances`.`requestedby` AS `requestedby`,`clearances`.`purpose` AS `purpose`,`clearances`.`created_at` AS `created_at`,`clearances`.`updated_at` AS `updated_at`,`clearances`.`deleted_at` AS `deleted_at`,`clearances`.`status` AS `status`,`residents`.`lastname` AS `lastname`,`residents`.`firstname` AS `firstname`,`residents`.`middlename` AS `middlename`,concat(`residents`.`lastname`,', ',`residents`.`firstname`,' ',`residents`.`middlename`) AS `fullname`,`residents`.`civilstatus` AS `civilstatus`,`residents`.`gender` AS `gender`,`residents`.`birthday` AS `birthday`,truncate(((to_days(curdate()) - to_days(`residents`.`birthday`)) / 365),0) AS `age` from (`clearances` join `residents` on((`clearances`.`requestedby` = `residents`.`residentid`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `gettransactions`
--

/*!50001 DROP VIEW IF EXISTS `gettransactions`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `gettransactions` AS select `transactions`.`id` AS `id`,`transactions`.`requestid` AS `requestid`,`transactions`.`ornumber` AS `ornumber`,`transactions`.`amountpaid` AS `amountpaid`,`transactions`.`created_at` AS `created_at`,`transactions`.`updated_at` AS `updated_at`,`transactions`.`deleted_at` AS `deleted_at`,concat(`residents`.`lastname`,', ',`residents`.`firstname`,' ',`residents`.`middlename`) AS `fullname`,`clearances`.`status` AS `status`,`clearances`.`purpose` AS `purpose`,`clearances`.`created_at` AS `daterequested` from ((`transactions` join `clearances` on((`transactions`.`requestid` = `clearances`.`id`))) join `residents` on((`clearances`.`requestedby` = `residents`.`residentid`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-29 11:13:36
