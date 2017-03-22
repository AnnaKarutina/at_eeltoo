-- MySQL dump 10.16  Distrib 10.1.19-MariaDB, for Win32 (AMD64)
--
-- Host: 127.0.0.1    Database: 127.0.0.1
-- ------------------------------------------------------
-- Server version	10.1.19-MariaDB

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
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answers` (
  `answer_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Autocreated',
  `answer_text` varchar(191) NOT NULL COMMENT 'Autocreated',
  `answer_correct` tinyint(4) NOT NULL DEFAULT '0',
  `question_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`answer_id`),
  KEY `question_id` (`question_id`),
  CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answers`
--

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
INSERT INTO `answers` VALUES (4,'<h1>',1,7),(5,'<h6>',0,7),(6,'<head>',0,7),(7,'<br>',1,8),(8,'<lb>',0,8),(9,'<break>',0,8),(10,'<li>',1,9),(11,'<le>',0,9),(12,'<element>',0,9),(13,'Cascading Style Sheets',1,10),(14,'Computer Style Sheets',0,10),(15,'Creative Style Sheets',0,10),(16,'<em>',1,11),(17,'<it>',0,11),(18,'<italic>',0,11),(19,'<strong>',1,12),(20,'<thick>',0,12),(21,'<fat>',0,12),(22,'<!--',1,13),(23,'/*',0,13),(24,'//',0,13),(25,'<title>',1,14),(26,'<heading>',0,14),(27,'<headline>',0,14),(28,'<a href=\"google.com\">',1,15),(29,'<link=\"google.com\">',0,15),(30,'<url=\"google.com\">',0,15),(31,'<!DOCTYPE html>',1,16),(32,'<html document>',0,16),(33,'<DOCTYPE html>',0,16),(34,'<img src=\"\">',1,17),(35,'<picture href=\"\">',0,17),(36,'<image url=\"\">',0,17),(37,'<video src=\"\">',1,18),(38,'<movie url=\"\">',0,18),(39,'<film href=\"\">',0,18),(40,'<audio src=\"\">',1,19),(41,'<media href=\"\">',0,19),(42,'<sound url=\"\">',0,19),(43,'<html lang=\"et\">',1,20),(44,'<doc lang=\"et\">',0,20),(45,'<language=\"et\">',0,20),(46,'<p style=\"font-size:10px\">',1,21),(47,'<p type=\"font-size:10px\">',0,21),(48,'<p style=font-size:10px>',0,21),(49,'font-family: Verdana',1,22),(50,'font-size: Verdana',0,22),(51,'font: Verdana',0,22),(52,'background-color: red',1,23),(53,'background color: red',0,23),(54,'background: red',0,23),(55,'<p align=\"right\">',1,24),(56,'<p margin=\"right\">',0,24),(57,'<p move=\"right\">',0,24),(58,'Et dokumenti loogiliselt jaotada',1,25),(59,'Et tabelite vahele vahesid jätta',0,25),(60,'Paragrahvide asendamiseks',0,25),(61,'textarea tag',1,26),(62,'text tag',0,26),(63,'textml tag',0,26),(64,'rowspan',1,27),(65,'rn',0,27),(66,'rownumb',0,27),(67,'<ol>',1,28),(68,'<ul>',0,28),(69,'<ordlist>',0,28),(70,'<ul>',1,29),(71,'<ol>',0,29),(72,'<unlist>',0,29),(73,'src',1,30),(74,'url',0,30),(75,'href',0,30),(76,'face',1,31),(77,'font',0,31),(78,'fontname',0,31),(79,'head tag-is',1,32),(80,'body tag-is',0,32),(81,'ükskõik kummas',0,32),(82,'2',1,33),(83,'3',0,33),(84,'1',0,33),(85,'_blank',1,34),(86,'_newtab',0,34),(87,'blank',0,34),(88,'<h7>',1,35),(89,'<h4>',0,35),(90,'<h2>',0,35);
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `practical`
--

DROP TABLE IF EXISTS `practical`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `practical` (
  `practical_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Autocreated',
  `practical_text` text NOT NULL COMMENT 'Autocreated',
  `practical_title` varchar(255) NOT NULL,
  PRIMARY KEY (`practical_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `practical`
--

LOCK TABLES `practical` WRITE;
/*!40000 ALTER TABLE `practical` DISABLE KEYS */;
INSERT INTO `practical` VALUES (1,'1. Loo suurima formaadiga pealkiri, mille sisuks on vabalt valitud tekst. Määra pealkirja värvuseks sinine, fontiks Verdana ja suuruseks 35 pikslit.;2. Loo paragrahv, mille sisuks on vabalt valitud tekst. Määra paragrahvi värvuseks punane, fontiks Arial ja suuruseks 40 pikslit.;3. Loo tabel, kus on kaks rida ja kolm veergu. Esimese rea esimesse veergu kirjuta \"Eesnimi\", teise veergu \"Vanus\" ja kolmandasse veergu \"Lemmik värv\". Teise rea veergudesse kirjuta esimese rea veergudele vastavad väärtused.;4. Määra tabelile ühe piksline must raam, joonda tekst keskele, kasuta fonti Calibri ja määra teksti suuruseks 40 pikslit. Tabeli laiuseks määra 70%.;        ','Ülesanne 1');
/*!40000 ALTER TABLE `practical` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `question_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` text,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (7,'Milline on suurima pealkirja HTML element?'),(8,'Millise HTML elemendiga saab sooritada reavahet?'),(9,'Kuidas tähistatakse listi elementi?'),(10,'Mida tähendab CSS?'),(11,'Kuidas rõhutada teksti(itaaliapärane)?'),(12,'Kuidas muuta tekst paksuks?'),(13,'Milliste märkidega alustatakse HTMLis kommentaari?'),(14,'Millise HTMLi märgendiga määratakse lehekülje pealkiri?'),(15,'Millist HTMLi märgendit kasutatakse klõpsatava veebilingi jaoks?'),(16,'Kuidas alustatakse HTMLi dokumenti?'),(17,'Kuidas sisestatakse pilti?'),(18,'Kuidas sisestatakse videot?'),(19,'Kuidas sisestatakse heliklippi?'),(20,'Kuidas määrata HTML dokumendi keel?'),(21,'Kuidas muuta HTML dokumendis paragrahvi stiili?'),(22,'Kuidas määrata font-iks Verdana?'),(23,'Kuidas määrata taustavärvi?'),(24,'Kuidas joondada paragrahvi paremale?'),(25,'Mille jaoks kasutatakse <div> märgendeid?'),(26,'Millist järgmistest märgenditest kasutatakse mitmerealise tekstisisestuse haldamiseks?'),(27,'Millist atribuuti kasutatakse ridade arvu tähistamiseks?'),(28,'Kuidas teha järjestatud listi?'),(29,'Kuidas teha järjestamata listi?'),(30,'Milline on <img> märgendi atribuut?'),(31,'Millist järgnevatest atribuutidest kasutatakse fonti nime täpsustamiseks?'),(32,'Kus määratakse HTMLi koodis lehekülje pealkiri?'),(33,'Mitu märgendit on tavalises elemendis?'),(34,'Millist atribuuti kasutatakse, et klikitav link avaneks uues aknas?'),(35,'Milline järgmistest HTMLi märgenditest pole kehtiv?');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `results`
--

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
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `practical_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`result_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `results_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `results`
--

LOCK TABLES `results` WRITE;
/*!40000 ALTER TABLE `results` DISABLE KEYS */;
/*!40000 ALTER TABLE `results` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`127.0.0.1`*/ /*!50003 TRIGGER results_deleted
BEFORE DELETE ON results
FOR EACH ROW
INSERT INTO results_log
SET result_id = OLD.result_id,
theoretical_points = OLD.theoretical_points,
user_id = OLD.user_id,
practical_errors = OLD.practical_errors,
practical_points = OLD.practical_points,
nr_of_questions = OLD.nr_of_questions,
firstname = (SELECT firstname FROM results INNER JOIN users ON results.user_id = users.user_id WHERE results.user_id = OLD.user_id),
lastname = (SELECT lastname FROM results INNER JOIN users ON results.user_id = users.user_id WHERE results.user_id = OLD.user_id),
date = OLD.date */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `results_log`
--

DROP TABLE IF EXISTS `results_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `results_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `theoretical_points` tinyint(4) NOT NULL DEFAULT '-1',
  `user_id` int(10) unsigned NOT NULL,
  `practical_errors` blob,
  `practical_points` tinyint(4) DEFAULT '-2',
  `nr_of_questions` tinyint(3) unsigned DEFAULT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `date` datetime DEFAULT NULL,
  `result_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`log_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `results_log`
--

LOCK TABLES `results_log` WRITE;
/*!40000 ALTER TABLE `results_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `results_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` char(1) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `nr_of_questions` tinyint(4) NOT NULL,
  `htmlvalidator` tinyint(4) NOT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `livehtml` tinyint(3) unsigned DEFAULT NULL,
  `scores` tinyint(3) unsigned DEFAULT NULL,
  `scores_private` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES ('1','3905',3,1,'2017-03-22 12:14:33','2017-03-22 16:14:33',1,1,1);
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `translations`
--

DROP TABLE IF EXISTS `translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `translations` (
  `translation_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phrase` varchar(191) NOT NULL,
  `language` char(3) NOT NULL,
  `translation` varchar(191) DEFAULT NULL,
  `controller` varchar(15) NOT NULL,
  `action` varchar(20) NOT NULL,
  PRIMARY KEY (`translation_id`),
  UNIQUE KEY `language_phrase_controller_action_index` (`language`,`phrase`,`controller`,`action`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `translations`
--

LOCK TABLES `translations` WRITE;
/*!40000 ALTER TABLE `translations` DISABLE KEYS */;
INSERT INTO `translations` VALUES (1,'Action','ee','{untranslated}','global','global');
/*!40000 ALTER TABLE `translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

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
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (17,'admin',1,'$2y$10$awo99t94fHCRveHtwlS0CefVizfvur6SB8B9Gve6mC7i9l43mURjm',0,'Renee','Test','39002202734');
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

-- Dump completed on 2017-03-22 15:54:27
