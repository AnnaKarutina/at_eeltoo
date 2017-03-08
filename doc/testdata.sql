DROP TABLE IF EXISTS `results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `results` (
  `result_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Autocreated',
  `theoretical_points` tinyint(4) NOT NULL DEFAULT '-1' COMMENT 'Autocreated',
  `user_id` int(10) unsigned NOT NULL,
  `practical_errors` blob,
  `practical_points` tinyint(4) DEFAULT '-2',
  `nr_of_questions` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`result_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `results_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;




DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(25) DEFAULT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT '0',
  `password` varchar(191) NOT NULL,
  `deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `social_id` varchar(14) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `users_social_id_uindex` (`social_id`),
  UNIQUE KEY `UNIQUE` (`user_name`),
  UNIQUE KEY `users_user_name_social_id_uindex` (`user_name`,`social_id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;


LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (17,'admin',1,'$2y$10$awo99t94fHCRveHtwlS0CefVizfvur6SB8B9Gve6mC7i9l43mURjm',0,'Renee','Test','39002202734'),(53,NULL,0,'',0,'Mati','Murakas','39046582901'),(54,NULL,0,'',0,'Aadu','Must','39029405941'),(55,NULL,0,'',0,'Martin','Jalakas','39384950911'),(56,NULL,0,'',0,'Proovime','Midagi','392002002022');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;


LOCK TABLES `results` WRITE;
/*!40000 ALTER TABLE `results` DISABLE KEYS */;
INSERT INTO `results` VALUES (40,1,53,NULL,1,3),(41,0,54,NULL,7,3),(42,2,55,NULL,9,3),(43,2,56,NULL,-2,3);
/*!40000 ALTER TABLE `results` ENABLE KEYS */;
UNLOCK TABLES;