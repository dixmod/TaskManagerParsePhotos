-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: localhost    Database: otus10
-- ------------------------------------------------------
-- Server version	5.7.23-0ubuntu0.18.04.1

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
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log` (
  `task` int(11) NOT NULL,
  `status` tinyint(3) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`task`,`status`),
  KEY `log_taskStatus_FK` (`status`),
  CONSTRAINT `log_taskStatus_FK` FOREIGN KEY (`status`) REFERENCES `taskStatus` (`id`),
  CONSTRAINT `log_task_FK` FOREIGN KEY (`task`) REFERENCES `task` (`id`),
  CONSTRAINT `log_task_FK1` FOREIGN KEY (`task`) REFERENCES `task` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photoFilter`
--

DROP TABLE IF EXISTS `photoFilter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photoFilter` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL COMMENT 'Название фильтра',
  `description` text COMMENT 'Подробное описание, что делает фильтр',
  `code` varchar(100) NOT NULL COMMENT 'Символьный код фильтра',
  PRIMARY KEY (`id`),
  UNIQUE KEY `photoFilter_UN` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photoFilter`
--

LOCK TABLES `photoFilter` WRITE;
/*!40000 ALTER TABLE `photoFilter` DISABLE KEYS */;
INSERT INTO `photoFilter` VALUES (1,'Сепия',NULL,'sepia'),(2,'Нигатив',NULL,'negate'),(3,'Оттенки серого',NULL,'grayscale'),(4,'Размытие',NULL,'gaussianBlur');
/*!40000 ALTER TABLE `photoFilter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `task`
--

DROP TABLE IF EXISTS `task`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL COMMENT 'Название задания',
  `description` text,
  `type` tinyint(3) NOT NULL COMMENT 'Тип задания',
  `status` tinyint(3) DEFAULT NULL COMMENT 'Статус выполнения',
  `user` int(11) NOT NULL COMMENT 'Автор',
  PRIMARY KEY (`id`),
  KEY `task_user_IDX` (`user`) USING BTREE,
  KEY `task_status_IDX` (`status`) USING BTREE,
  KEY `task_type_IDX` (`type`) USING BTREE,
  CONSTRAINT `task_taskStatus_FK` FOREIGN KEY (`status`) REFERENCES `taskStatus` (`id`),
  CONSTRAINT `task_user_FK` FOREIGN KEY (`user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task`
--

LOCK TABLES `task` WRITE;
/*!40000 ALTER TABLE `task` DISABLE KEYS */;
INSERT INTO `task` VALUES (1,'Задача 1',NULL,1,1,1),(2,'Задача 2',NULL,2,1,1),(3,'Задача 3',NULL,3,1,1);
/*!40000 ALTER TABLE `task` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taskStatus`
--

DROP TABLE IF EXISTS `taskStatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `taskStatus` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL COMMENT 'Название статуса',
  `description` text COMMENT 'Подробное описание статуса',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taskStatus`
--

LOCK TABLES `taskStatus` WRITE;
/*!40000 ALTER TABLE `taskStatus` DISABLE KEYS */;
INSERT INTO `taskStatus` VALUES (1,'Создана','Задача поступала на выполнение'),(2,'В работе','Задача взята в работу'),(3,'Выполнена','Задача выполнена'),(4,'Ошибка','Ошибка в процессе выполнения');
/*!40000 ALTER TABLE `taskStatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typeTaskPhotoDownload`
--

DROP TABLE IF EXISTS `typeTaskPhotoDownload`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typeTaskPhotoDownload` (
  `id` int(11) NOT NULL,
  `url` varchar(100) NOT NULL COMMENT 'Ссылка на фото для скачивания',
  `photo` varchar(100) NOT NULL COMMENT 'Название файла после скачивания',
  KEY `typeTaskDownload_task_FK` (`id`),
  CONSTRAINT `typeTaskDownload_task_FK` FOREIGN KEY (`id`) REFERENCES `task` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typeTaskPhotoDownload`
--

LOCK TABLES `typeTaskPhotoDownload` WRITE;
/*!40000 ALTER TABLE `typeTaskPhotoDownload` DISABLE KEYS */;
INSERT INTO `typeTaskPhotoDownload` VALUES (1,'https://otus.ru/media/83/9c/839c578bf13941a9906403ddab6f855a.jpg?action=resize&width=340&height=340','1.jpg');
/*!40000 ALTER TABLE `typeTaskPhotoDownload` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typeTaskPhotoParse`
--

DROP TABLE IF EXISTS `typeTaskPhotoParse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typeTaskPhotoParse` (
  `id` int(11) NOT NULL,
  `photo` varchar(100) DEFAULT NULL COMMENT 'Имя файла',
  `filter` int(3) DEFAULT NULL COMMENT 'Тип фильтр для наложение на фото',
  `params` text COMMENT 'Настройки обработки, параметры фильтра',
  KEY `typeTaskParsePhoto_task_FK` (`id`),
  KEY `typeTaskPhotoParse_photoFilter_FK` (`filter`),
  CONSTRAINT `typeTaskParsePhoto_task_FK` FOREIGN KEY (`id`) REFERENCES `task` (`id`),
  CONSTRAINT `typeTaskPhotoParse_photoFilter_FK` FOREIGN KEY (`filter`) REFERENCES `photoFilter` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typeTaskPhotoParse`
--

LOCK TABLES `typeTaskPhotoParse` WRITE;
/*!40000 ALTER TABLE `typeTaskPhotoParse` DISABLE KEYS */;
INSERT INTO `typeTaskPhotoParse` VALUES (2,'1.jpg',1,'');
/*!40000 ALTER TABLE `typeTaskPhotoParse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typeTaskPhotoSend`
--

DROP TABLE IF EXISTS `typeTaskPhotoSend`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typeTaskPhotoSend` (
  `id` int(11) NOT NULL,
  `photo` varchar(100) NOT NULL COMMENT 'Название файла фото',
  `email` varchar(100) DEFAULT NULL,
  KEY `typeTaskPhotoSend_task_FK` (`id`),
  CONSTRAINT `typeTaskPhotoSend_task_FK` FOREIGN KEY (`id`) REFERENCES `task` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typeTaskPhotoSend`
--

LOCK TABLES `typeTaskPhotoSend` WRITE;
/*!40000 ALTER TABLE `typeTaskPhotoSend` DISABLE KEYS */;
INSERT INTO `typeTaskPhotoSend` VALUES (3,'1.jpg','test@test.ru');
/*!40000 ALTER TABLE `typeTaskPhotoSend` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_UN` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Иван','ivan@mail.ru'),(2,'Петр','petr@mail.ru'),(3,'Семен','semen@mail.ru');
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

-- Dump completed on 2018-09-24 16:29:55
