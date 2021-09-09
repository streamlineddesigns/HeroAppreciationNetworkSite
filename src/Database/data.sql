-- MySQL dump 10.13  Distrib 5.7.29, for Linux (x86_64)
--
-- Host: localhost    Database: homestead
-- ------------------------------------------------------
-- Server version	5.7.29-0ubuntu0.18.04.1

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
-- Table structure for table `details`
--

DROP TABLE IF EXISTS `details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `section_icon_id` int(10) unsigned DEFAULT NULL,
  `detail_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `details_section_icon_id_foreign` (`section_icon_id`),
  CONSTRAINT `details_section_icon_id_foreign` FOREIGN KEY (`section_icon_id`) REFERENCES `section_icons` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `details`
--

LOCK TABLES `details` WRITE;
/*!40000 ALTER TABLE `details` DISABLE KEYS */;
INSERT INTO `details` VALUES (1,NULL,'We create games 100% from scratch.',NULL,'2021-08-26 06:58:33'),(2,NULL,'We make peoples dreams come true.',NULL,'2021-08-26 06:58:33'),(3,NULL,'Reinventing the way gaming is done.',NULL,'2021-08-26 06:58:33'),(4,NULL,'This is how gaming was meant to be.',NULL,'2021-08-26 06:58:33'),(5,NULL,'New 1','2021-08-26 03:19:25','2021-08-26 03:19:25'),(6,NULL,'We do awesome things','2021-08-26 03:19:47','2021-08-26 07:20:31'),(7,NULL,'We create awesome games','2021-08-26 03:19:47','2021-08-26 07:20:31'),(8,NULL,'We create inspiring experiences','2021-08-26 03:19:47','2021-08-26 07:20:31'),(9,NULL,'We game. Often','2021-08-26 03:20:58','2021-08-26 07:20:31'),(10,NULL,'2','2021-08-26 21:38:04','2021-08-26 21:38:04'),(11,NULL,'Detail 1','2021-08-26 21:43:16','2021-09-07 13:24:36'),(12,NULL,'Quality is our specialty. It\'s just what we do','2021-08-27 13:37:37','2021-08-27 13:37:37'),(13,NULL,'Color swatches','2021-08-27 13:37:37','2021-08-27 13:41:36'),(14,NULL,'Loren Ipsum is all I can say','2021-08-27 13:37:37','2021-08-27 13:37:37'),(15,NULL,'I\'m interested in populating with text','2021-08-27 13:37:37','2021-08-27 13:37:37'),(16,NULL,'any text will do','2021-08-27 13:37:37','2021-08-27 13:37:37'),(17,NULL,'As long as this just gets filled up with any words','2021-08-27 13:37:37','2021-08-27 13:37:37'),(18,NULL,'regardless if they\'re nonsensical or reasonable','2021-08-27 13:37:37','2021-08-27 13:37:37'),(19,NULL,'Doesn\'t matter one way or the other','2021-08-27 13:37:37','2021-08-27 13:37:37'),(20,NULL,'Detail 2','2021-09-07 13:24:36','2021-09-07 13:24:36'),(21,NULL,'Detail 3','2021-09-07 13:24:36','2021-09-07 13:24:36'),(22,NULL,'Detail 4','2021-09-07 13:24:36','2021-09-07 13:24:36'),(23,NULL,'Detail 5','2021-09-07 13:24:36','2021-09-07 13:24:36'),(24,NULL,'Detail 6','2021-09-07 13:24:36','2021-09-07 13:24:36'),(25,NULL,'Detail 7','2021-09-07 13:24:36','2021-09-07 13:24:36'),(26,NULL,'Detail 8','2021-09-07 13:24:36','2021-09-07 13:24:36'),(27,NULL,'','2021-09-07 15:23:08','2021-09-07 15:23:08'),(28,NULL,'We meet human need\nwithout discrimination\n\n','2021-09-07 20:23:03','2021-09-07 20:40:36'),(29,NULL,'We assist approximately 23 million\nAmericans annually','2021-09-07 20:40:36','2021-09-07 20:40:36'),(30,NULL,'We serve in 130 countries around the globe','2021-09-07 20:40:36','2021-09-07 20:40:36'),(31,NULL,'We have over 1.5 million members\nconsisting of officers, soldiers, and adherents','2021-09-07 20:40:36','2021-09-07 20:41:54'),(32,NULL,'We’ve been pursuing our mission since 1865','2021-09-07 20:40:36','2021-09-07 20:40:36'),(33,NULL,'At The Salvation Army, we are dedicated to Doing the Most Good','2021-09-07 20:40:36','2021-09-07 20:40:36'),(34,NULL,'Give back to the community','2021-09-07 20:40:36','2021-09-07 20:40:36'),(35,NULL,'Help the homeless','2021-09-07 20:40:36','2021-09-07 20:40:36'),(36,NULL,'Cost to family: $0\n','2021-09-07 21:13:14','2021-09-08 07:11:34'),(37,NULL,'Saving kids worldwide\n','2021-09-07 21:20:01','2021-09-08 07:11:34'),(38,NULL,'Our goal: 100% survival\n','2021-09-07 21:20:01','2021-09-08 07:11:34'),(39,NULL,'St. Jude has treated children from all 50 states and from around the world.\n\n','2021-09-07 21:20:01','2021-09-08 07:11:34'),(40,NULL,'Treatments invented at St. Jude have helped push the overall childhood cancer survival rate up','2021-09-07 21:20:01','2021-09-08 07:11:34'),(41,NULL,'Families never receive a bill from St. Jude for treatment, travel, housing or food ','2021-09-07 21:20:01','2021-09-08 07:11:34'),(42,NULL,'Unlike any other hospital, the majority of our funding comes from individual contributions','2021-09-07 21:20:01','2021-09-08 07:11:34'),(43,NULL,'Our approach makes us different from most children’s hospitals','2021-09-07 21:20:01','2021-09-08 07:11:34'),(44,NULL,'We provide critical funding for cancer research worldwide to fuel advances in tumor biology, genetics, prevention, treatment, metastasis and survivorship.\n','2021-09-07 21:47:04','2021-09-08 08:22:00'),(45,NULL,'Since our founding in 1993 by Evelyn H. Lauder, BCRF has raised more than half a billion dollars for lifesaving research','2021-09-07 21:47:04','2021-09-08 08:22:00'),(46,NULL,'Through a unique and streamlined grants program, we seek out the brightest minds in science and medicine and give them the necessary resources to pursue their best ideas','2021-09-07 21:55:41','2021-09-08 08:22:00'),(47,NULL,'Our goal is to accelerate the breakthroughs bringing us closer to a cure to speed up the progress that will improve survivorship and quality of life for breast cancer patients today','2021-09-07 21:55:41','2021-09-08 08:22:00'),(48,NULL,'Our mission is to prevent and cure breast cancer by advancing the world\'s most promising research','2021-09-07 21:55:41','2021-09-08 08:22:00'),(49,NULL,'BCRF is recognized as one of the most financially efficient nonprofits in the country. We are the highest-rated breast cancer charity in the U.S.','2021-09-07 21:55:41','2021-09-08 08:26:28'),(50,NULL,'','2021-09-07 21:55:41','2021-09-08 08:26:28'),(51,NULL,'','2021-09-07 21:55:41','2021-09-08 08:26:28'),(52,NULL,'Expand access to wrap-around support services by building capacity across the Goodwill network','2021-09-08 05:29:04','2021-09-08 05:45:46'),(53,NULL,'Improve job quality outcomes by equipping career advancers with locally-relevant skills','2021-09-08 05:45:46','2021-09-08 05:45:46'),(54,NULL,'Increase the numbers of people connected with good jobs through expanded employer relationships and retention support','2021-09-08 05:45:46','2021-09-08 05:45:46'),(55,NULL,'Divert more goods from landfills through growth in retail','2021-09-08 05:45:46','2021-09-08 05:45:46'),(56,NULL,'Increase funding for our mission and opportunities ','2021-09-08 05:45:46','2021-09-08 05:50:44'),(57,NULL,'1. Goodwill social enterprises hire','2021-09-08 05:45:46','2021-09-08 05:50:44'),(58,NULL,' Local Goodwills collectively employ 141,000 people','2021-09-08 05:47:01','2021-09-08 05:47:01'),(59,NULL,'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum','2021-09-08 05:49:22','2021-09-08 05:49:22'),(60,NULL,'A wish can be that spark that helps these children believe that anything is possible and gives them the strength to fight harder against their illness','2021-09-08 14:07:06','2021-09-08 14:15:28'),(61,NULL,'A wish\'s impact is why we are driven to make every one of these wishes come true. ','2021-09-08 14:07:06','2021-09-08 14:15:28'),(62,NULL,'Tens of thousands of volunteers, donors and supporters advance the Make-A-Wish® vision to grant the wish of every child diagnosed with a critical illness','2021-09-08 14:15:28','2021-09-08 14:15:28'),(63,NULL,'In the U.S. and its territories, a wish is granted every 34 minutes','2021-09-08 14:15:28','2021-09-08 14:15:28'),(64,NULL,'A wish can be that spark that helps these children believe that anything is possible and gives them the strength to fight harder against their illnesses','2021-09-08 14:15:28','2021-09-08 14:15:28'),(65,NULL,'This one belief guides us and inspires us to grant wishes that change the lives of the kids we serve','2021-09-08 14:15:28','2021-09-08 14:15:28'),(66,NULL,'For over 40 years, the Make-A-Wish has been granting life-changing wishes for children and families','2021-09-08 14:15:28','2021-09-08 14:15:28'),(67,NULL,'Make-A-Wish is one united family','2021-09-08 14:15:28','2021-09-08 14:15:28'),(68,NULL,'Today, the Association reaches millions of people affected by Alzheimer\'s and all other dementia','2021-09-08 14:25:04','2021-09-08 14:28:23'),(69,NULL,'The brand of the Alzheimer\'s Association represents who we are and what we do','2021-09-08 14:28:23','2021-09-08 14:28:23'),(70,NULL,'It is both a visual symbol of our dual mission of people and science and a commitment that guides us in our daily work in providing support, research, advocacy and education.','2021-09-08 14:28:23','2021-09-08 14:28:23'),(71,NULL,'Purple is our signature color, combining the calm stability of blue and the passionate energy of red. Purple makes a statement about our Association and our supporters: we are strong and unrelenting in the fight against Alzheimer’s disease.','2021-09-08 14:28:51','2021-09-08 14:28:51'),(72,NULL,'Create and support one-to-one mentoring relationships that ignite the power and promise of youth.\n\n','2021-09-08 14:42:19','2021-09-08 14:45:35'),(73,NULL,'Create and support one-to-one mentoring relationships that ignite the power and promise of youth.\n\n','2021-09-08 14:45:35','2021-09-08 14:45:35'),(74,NULL,'All youth achieve their full potential.\n\n','2021-09-08 14:45:35','2021-09-08 14:45:35'),(75,NULL,'All youth achieve their full potential.\n\n','2021-09-08 14:45:35','2021-09-08 14:45:35'),(76,NULL,'By partnering with parents/guardians, volunteers, and others in the community we are accountable for each child in our program achieving:\n\n','2021-09-08 14:45:35','2021-09-08 14:45:35'),(77,NULL,'By partnering with parents/guardians, volunteers, and others in the community we are accountable for each child in our program achieving:\n\n','2021-09-08 14:45:35','2021-09-08 14:45:35'),(78,NULL,'Since 1904, Big Brothers Big Sisters has operated under the belief that inherent in every child is incredible potential. As the nation’s largest donor','2021-09-08 14:45:35','2021-09-08 14:45:35'),(79,NULL,'By partnering with parents/guardians, volunteers, and others in the community we are accountable for each child in our program achieving:\n\n','2021-09-08 14:45:35','2021-09-08 14:45:35');
/*!40000 ALTER TABLE `details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `donations`
--

DROP TABLE IF EXISTS `donations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `donations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sender_user_id` int(10) unsigned NOT NULL,
  `recipient_organization_id` int(10) unsigned NOT NULL,
  `amount` int(10) unsigned NOT NULL,
  `is_invisible` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `donations_sender_user_id_foreign` (`sender_user_id`),
  KEY `donations_recipient_organization_id_foreign` (`recipient_organization_id`),
  CONSTRAINT `donations_recipient_organization_id_foreign` FOREIGN KEY (`recipient_organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE,
  CONSTRAINT `donations_sender_user_id_foreign` FOREIGN KEY (`sender_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donations`
--

LOCK TABLES `donations` WRITE;
/*!40000 ALTER TABLE `donations` DISABLE KEYS */;
INSERT INTO `donations` VALUES (16,7,5,50,1,'2021-09-07 19:55:44','2021-09-07 19:55:44'),(17,8,6,5,1,'2021-09-07 20:15:39','2021-09-07 20:15:39'),(18,9,7,10000,1,'2021-09-07 21:32:45','2021-09-07 21:32:45'),(19,10,8,1000,1,'2021-09-07 21:58:19','2021-09-07 21:58:19'),(20,10,5,2500,1,'2021-09-07 21:58:40','2021-09-07 21:58:40'),(21,10,6,8000,1,'2021-09-07 21:59:05','2021-09-07 21:59:05'),(22,7,7,500,1,'2021-09-07 22:21:43','2021-09-07 22:21:43'),(23,7,7,1500,1,'2021-09-07 22:55:10','2021-09-07 22:55:10'),(24,11,9,50000,1,'2021-09-08 05:54:44','2021-09-08 05:54:44'),(25,10,9,8000,1,'2021-09-08 05:56:55','2021-09-08 05:56:55'),(26,9,9,3000,1,'2021-09-08 05:57:49','2021-09-08 05:57:49'),(27,9,9,1000,1,'2021-09-08 05:58:50','2021-09-08 05:58:50'),(28,7,9,5000,1,'2021-09-08 05:59:13','2021-09-08 05:59:13'),(29,8,9,1500,1,'2021-09-08 05:59:50','2021-09-08 05:59:50'),(30,8,9,1750,0,'2021-09-08 06:00:06','2021-09-08 06:00:06'),(31,10,7,1900,1,'2021-09-08 06:09:56','2021-09-08 06:09:56'),(32,10,9,50,1,'2021-09-08 06:34:12','2021-09-08 06:34:12'),(33,12,10,50,1,'2021-09-08 14:18:22','2021-09-08 14:18:22'),(34,13,11,7500,1,'2021-09-08 14:33:04','2021-09-08 14:33:04'),(35,13,11,7500,1,'2021-09-08 14:33:05','2021-09-08 14:33:05'),(36,14,12,5000,1,'2021-09-08 14:47:16','2021-09-08 14:47:16'),(37,14,12,10000,1,'2021-09-08 14:48:41','2021-09-08 14:48:41'),(38,14,10,2500,1,'2021-09-08 14:49:32','2021-09-08 14:49:32'),(39,14,4,25,1,'2021-09-08 14:51:09','2021-09-08 14:51:09'),(40,15,9,1000,1,'2021-09-08 15:10:10','2021-09-08 15:10:10'),(41,15,12,1000,1,'2021-09-08 15:10:24','2021-09-08 15:10:24'),(42,15,11,1000,1,'2021-09-08 15:10:36','2021-09-08 15:10:36'),(43,15,7,5000,1,'2021-09-08 15:10:54','2021-09-08 15:10:54'),(44,15,10,1000,1,'2021-09-08 15:11:11','2021-09-08 15:11:11'),(45,15,8,1000,1,'2021-09-08 15:11:30','2021-09-08 15:11:30'),(46,10,9,100,1,'2021-09-08 23:40:10','2021-09-08 23:40:10'),(47,14,6,50,1,'2021-09-09 03:08:59','2021-09-09 03:08:59'),(48,14,11,50,1,'2021-09-09 03:11:22','2021-09-09 03:11:22');
/*!40000 ALTER TABLE `donations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `extra_text`
--

DROP TABLE IF EXISTS `extra_text`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `extra_text` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(10) unsigned NOT NULL,
  `about_one` text COLLATE utf8mb4_unicode_ci,
  `about_two` text COLLATE utf8mb4_unicode_ci,
  `about_three` text COLLATE utf8mb4_unicode_ci,
  `detail_one` text COLLATE utf8mb4_unicode_ci,
  `detail_two` text COLLATE utf8mb4_unicode_ci,
  `detail_three` text COLLATE utf8mb4_unicode_ci,
  `hero_one` text COLLATE utf8mb4_unicode_ci,
  `hero_two` text COLLATE utf8mb4_unicode_ci,
  `hero_three` text COLLATE utf8mb4_unicode_ci,
  `quote_one` text COLLATE utf8mb4_unicode_ci,
  `quote_two` text COLLATE utf8mb4_unicode_ci,
  `quote_three` text COLLATE utf8mb4_unicode_ci,
  `social_one` text COLLATE utf8mb4_unicode_ci,
  `social_two` text COLLATE utf8mb4_unicode_ci,
  `social_three` text COLLATE utf8mb4_unicode_ci,
  `extra_one` text COLLATE utf8mb4_unicode_ci,
  `extra_two` text COLLATE utf8mb4_unicode_ci,
  `extra_three` text COLLATE utf8mb4_unicode_ci,
  `extra_four` text COLLATE utf8mb4_unicode_ci,
  `extra_five` text COLLATE utf8mb4_unicode_ci,
  `extra_six` text COLLATE utf8mb4_unicode_ci,
  `extra_seven` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `extra_text_organization_id_foreign` (`organization_id`),
  CONSTRAINT `extra_text_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `extra_text`
--

LOCK TABLES `extra_text` WRITE;
/*!40000 ALTER TABLE `extra_text` DISABLE KEYS */;
INSERT INTO `extra_text` VALUES (4,4,NULL,NULL,NULL,'We\'ve always got a fresh coat of paint around. ','Either way though, this text will get populated',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-08-27 13:37:37','2021-08-27 13:41:36'),(5,5,NULL,NULL,NULL,'Trees help clean the air we breathe, filter the water we drink, and provide habitat to over 80% of the world\'s terrestrial biodiversity. They also provide jobs to over 1.6 billion people, absorb harmful carbon from the atmosphere, and are key ingredients in 25% of all medicines.','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-09-07 15:23:08','2021-09-07 15:55:56'),(6,6,NULL,NULL,NULL,'The Salvation Army exists to meet human need wherever, whenever, and however we can.','We Fight Nature\'s Fury With Human Kindness',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-09-07 20:23:03','2021-09-07 20:41:54'),(7,7,NULL,NULL,NULL,'St. Jude is leading the way the world understands, treats and defeats childhood cancer and other life-threatening diseases.','The mission of St. Jude Children’s Research Hospital is to advance cures, and means of prevention, for pediatric catastrophic diseases through research and treatment',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-09-07 21:13:14','2021-09-08 07:11:34'),(8,8,NULL,NULL,NULL,'The Breast Cancer Research Foundation is an independent, not-for-profit organization which has raised $569.4 million to support clinical and translational research on breast cancer at medical institutions in the United States and abroad. BCRF currently funds over 275 researchers in 15 countries.','The Breast Cancer Research Foundation is a nonprofit organization committed to achieving prevention and a cure for breast cancer',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-09-07 21:47:04','2021-09-08 08:26:28'),(9,9,NULL,NULL,NULL,'With our bold new vision, a committed network and like-minded partners, we are poised to accelerate and expand impact like never before. By building capacity across the network and enhancing our support of local operations, we aim to:','Goodwill career centers prepare job seekers for in-demand careers. People come to Goodwill to learn new skills, earn credentials, create résumés, and prepare for interviews. Last year, Goodwill helped 1.09 million people build competencies, earn jobs and advance in their careers.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-09-08 05:29:04','2021-09-08 05:49:49'),(10,10,NULL,NULL,NULL,'For every wish we grant, there are three more children with critical illnesses whose wishes need your financial support','For children diagnosed with critical illnesses, a wish come true can be a crucial turning point in their lives',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-09-08 14:07:06','2021-09-08 14:15:28'),(11,11,NULL,NULL,NULL,'The Alzheimer’s Association was founded in 1980 by a group of family caregivers and individuals who recognized the need for an organization that would unite caregivers, provide support to those facing Alzheimer’s and advance research into the disease.\r\n','While we have changed our look over the years, we haven’t veered from our purpose: We are the Alzheimer\'s Association and our vision is a world without Alzheimer\'s and all other dementia',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-09-08 14:25:04','2021-09-08 14:28:23'),(12,12,NULL,NULL,NULL,'Big Brothers Big Sisters helps children realize their potential and build their futures. We nurture children and strengthen communities. And we couldn\'t do any of it without you.','Big Brothers Big Sisters helps children realize their potential and build their futures. We nurture children and strengthen communities. And we couldn\'t do any of it without you.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-09-08 14:42:19','2021-09-08 14:45:35');
/*!40000 ALTER TABLE `extra_text` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `galleries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `img_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galleries`
--

LOCK TABLES `galleries` WRITE;
/*!40000 ALTER TABLE `galleries` DISABLE KEYS */;
/*!40000 ALTER TABLE `galleries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `org_template_about_section`
--

DROP TABLE IF EXISTS `org_template_about_section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `org_template_about_section` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(10) unsigned NOT NULL,
  `about_us_text` text COLLATE utf8mb4_unicode_ci,
  `about_img_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_invisible` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `org_template_about_section_organization_id_foreign` (`organization_id`),
  CONSTRAINT `org_template_about_section_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `org_template_about_section`
--

LOCK TABLES `org_template_about_section` WRITE;
/*!40000 ALTER TABLE `org_template_about_section` DISABLE KEYS */;
INSERT INTO `org_template_about_section` VALUES (4,4,'Giving your home or office a fresh coat of paint can really update the look and feel of your space. The professional painters here have over 12 years of experience in consulting with our customers to make sure they are choosing the right products and the right colors for their home or office. Our professional painters take extreme care to pay close attention to details, to be prompt and meticulous, so you can impress your guests, or your clients, with a clean and professional look. We can tackle any job, large or small, from residential / commercial repaints, or new construction, to a complex exterior job. You can be rest assured that your professional paint job will be done to your complete satisfaction! Contact our professional painters today for your free estimate.','a1145384248170a6.png',0,'2021-08-27 13:37:37','2021-08-27 13:37:37'),(5,5,'    ONE TREE PLANTED IS A 501C3 NON-PROFIT WITH A FOCUS ON GLOBAL REFORESTATION. All by planting trees!\r\n\r\n    As an environmental charity, we are dedicated to making it easier for individuals and businesses to give back to the environment, create a healthier climate, protect biodiversity, and help reforestation efforts around the world. All by planting trees!\r\n\r\n    Started in 2014, we have more than doubled the number of trees planted year over year, and work with awesome reforestations partners across 43 countries who help us get trees in the ground. These projects restore forests after fires and floods, create jobs, build communities, and protect habitat for wildlife.','195ae7d824c6a26c.jpg',0,'2021-09-07 15:23:08','2021-09-07 15:51:52'),(6,6,'The Salvation Army, an international movement, is an evangelical part of the universal Christian Church. Its message is based on the Bible. Its ministry is motivated by the love of God. Its mission is to preach the gospel of Jesus Christ and to meet human needs in His name without discrimination.','f02e031e9e0ffd7b.png',0,'2021-09-07 20:23:03','2021-09-07 20:23:03'),(7,7,'The mission of St. Jude Children’s Research Hospital is to advance cures, and means of prevention, for pediatric catastrophic diseases through research and treatment. Consistent with the vision of our founder Danny Thomas, no child is denied treatment based on race, religion or a family\'s ability to pay.\r\n\r\n','6a335722f26ddc43.jpg',0,'2021-09-07 21:13:14','2021-09-07 21:15:09'),(8,8,'The Breast Cancer Research Foundation is an independent, not-for-profit organization which has raised $569.4 million to support clinical and translational research on breast cancer at medical institutions in the United States and abroad. BCRF currently funds over 275 researchers in 15 countries.','a1b69d650eaf15ba.jpg',0,'2021-09-07 21:47:04','2021-09-08 08:23:22'),(9,9,'3. Goodwill retail operations generate revenue that supports our mission work. People can have a positive impact on their communities and the environment simply through their donations. Goodwill stores generate $5 billion in annual revenue while diverting nearly 5 billion pounds of goods from landfills and into reuse. Retail revenue augments grants and other philanthropy to fund Goodwill career centers and services.\r\n','340d7dce4f9d109e.png',0,'2021-09-08 05:29:04','2021-09-08 05:48:41'),(10,10,'This one belief guides us in everything we do at Make-A-Wish. It inspires us to grant life-changing wishes for children going through so much. It compels us to be creative in exceeding the expectations of every wish kid. It drives us to make our donated resources go as far as possible. Most of all, it\'s the founding principle of our vision to grant the wish of every eligible child.','41e932066f586a43.jpg',0,'2021-09-08 14:07:06','2021-09-08 14:16:43'),(11,11,'The Alzheimer\'s Association leads the way to end Alzheimer\'s and all other dementia — by accelerating global research, driving risk reduction and early detection, and maximizing quality care and support.\r\n\r\n','05ae59deec623eca.jpg',0,'2021-09-08 14:25:04','2021-09-08 14:26:55'),(12,12,'Since 1904, Big Brothers Big Sisters has operated under the belief that inherent in every child is incredible potential. As the nation’s largest donor- and volunteer-supported mentoring network, Big Brothers Big Sisters makes meaningful, monitored matches between adult volunteers (“Bigs”) and children (“Littles”), ages 5 through young adulthood in communities across the country. We develop positive relationships that have a direct and lasting effect on the lives of young people.','eb3342e80ea1f304.jpg',0,'2021-09-08 14:42:19','2021-09-08 14:43:57');
/*!40000 ALTER TABLE `org_template_about_section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `org_template_details_section`
--

DROP TABLE IF EXISTS `org_template_details_section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `org_template_details_section` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(10) unsigned NOT NULL,
  `detail_id` int(10) unsigned NOT NULL,
  `is_invisible` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `org_template_details_section_organization_id_foreign` (`organization_id`),
  KEY `org_template_details_section_detail_id_foreign` (`detail_id`),
  CONSTRAINT `org_template_details_section_detail_id_foreign` FOREIGN KEY (`detail_id`) REFERENCES `details` (`id`) ON DELETE CASCADE,
  CONSTRAINT `org_template_details_section_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `org_template_details_section`
--

LOCK TABLES `org_template_details_section` WRITE;
/*!40000 ALTER TABLE `org_template_details_section` DISABLE KEYS */;
INSERT INTO `org_template_details_section` VALUES (11,4,12,0,'2021-08-27 13:37:37','2021-08-27 13:37:37'),(12,4,13,0,'2021-08-27 13:37:37','2021-08-27 13:37:37'),(13,4,14,0,'2021-08-27 13:37:37','2021-08-27 13:37:37'),(14,4,15,0,'2021-08-27 13:37:37','2021-08-27 13:37:37'),(15,4,16,0,'2021-08-27 13:37:37','2021-08-27 13:37:37'),(16,4,17,0,'2021-08-27 13:37:37','2021-08-27 13:37:37'),(17,4,18,0,'2021-08-27 13:37:37','2021-08-27 13:37:37'),(18,4,19,0,'2021-08-27 13:37:37','2021-08-27 13:37:37'),(26,5,27,0,'2021-09-07 15:23:08','2021-09-07 15:23:08'),(27,6,28,0,'2021-09-07 20:23:03','2021-09-07 20:23:03'),(28,6,29,0,'2021-09-07 20:40:36','2021-09-07 20:40:36'),(29,6,30,0,'2021-09-07 20:40:36','2021-09-07 20:40:36'),(30,6,31,0,'2021-09-07 20:40:36','2021-09-07 20:40:36'),(31,6,32,0,'2021-09-07 20:40:36','2021-09-07 20:40:36'),(32,6,33,0,'2021-09-07 20:40:36','2021-09-07 20:40:36'),(33,6,34,0,'2021-09-07 20:40:36','2021-09-07 20:40:36'),(34,6,35,0,'2021-09-07 20:40:36','2021-09-07 20:40:36'),(35,7,36,0,'2021-09-07 21:13:14','2021-09-07 21:13:14'),(36,7,37,0,'2021-09-07 21:20:01','2021-09-07 21:20:01'),(37,7,38,0,'2021-09-07 21:20:01','2021-09-07 21:20:01'),(38,7,39,0,'2021-09-07 21:20:01','2021-09-07 21:20:01'),(39,7,40,0,'2021-09-07 21:20:01','2021-09-07 21:20:01'),(40,7,41,0,'2021-09-07 21:20:01','2021-09-07 21:20:01'),(41,7,42,0,'2021-09-07 21:20:01','2021-09-07 21:20:01'),(42,7,43,0,'2021-09-07 21:20:01','2021-09-07 21:20:01'),(43,8,44,0,'2021-09-07 21:47:04','2021-09-07 21:47:04'),(44,8,45,0,'2021-09-07 21:47:04','2021-09-07 21:47:04'),(45,8,46,0,'2021-09-07 21:55:41','2021-09-07 21:55:41'),(46,8,47,0,'2021-09-07 21:55:41','2021-09-07 21:55:41'),(47,8,48,0,'2021-09-07 21:55:41','2021-09-07 21:55:41'),(48,8,49,0,'2021-09-07 21:55:41','2021-09-07 21:55:41'),(49,8,50,0,'2021-09-07 21:55:41','2021-09-07 21:55:41'),(50,8,51,0,'2021-09-07 21:55:41','2021-09-07 21:55:41'),(51,9,52,0,'2021-09-08 05:29:04','2021-09-08 05:29:04'),(52,9,53,0,'2021-09-08 05:45:46','2021-09-08 05:45:46'),(53,9,54,0,'2021-09-08 05:45:46','2021-09-08 05:45:46'),(54,9,55,0,'2021-09-08 05:45:46','2021-09-08 05:45:46'),(55,9,56,0,'2021-09-08 05:45:46','2021-09-08 05:45:46'),(56,9,57,0,'2021-09-08 05:45:46','2021-09-08 05:45:46'),(57,9,58,0,'2021-09-08 05:47:01','2021-09-08 05:47:01'),(58,9,59,0,'2021-09-08 05:49:22','2021-09-08 05:49:22'),(59,10,60,0,'2021-09-08 14:07:06','2021-09-08 14:07:06'),(60,10,61,0,'2021-09-08 14:07:06','2021-09-08 14:07:06'),(61,10,62,0,'2021-09-08 14:15:28','2021-09-08 14:15:28'),(62,10,63,0,'2021-09-08 14:15:28','2021-09-08 14:15:28'),(63,10,64,0,'2021-09-08 14:15:28','2021-09-08 14:15:28'),(64,10,65,0,'2021-09-08 14:15:28','2021-09-08 14:15:28'),(65,10,66,0,'2021-09-08 14:15:28','2021-09-08 14:15:28'),(66,10,67,0,'2021-09-08 14:15:28','2021-09-08 14:15:28'),(67,11,68,0,'2021-09-08 14:25:04','2021-09-08 14:25:04'),(68,11,69,0,'2021-09-08 14:28:23','2021-09-08 14:28:23'),(69,11,70,0,'2021-09-08 14:28:23','2021-09-08 14:28:23'),(70,11,71,0,'2021-09-08 14:28:51','2021-09-08 14:28:51'),(71,12,72,0,'2021-09-08 14:42:19','2021-09-08 14:42:19'),(72,12,73,0,'2021-09-08 14:45:35','2021-09-08 14:45:35'),(73,12,74,0,'2021-09-08 14:45:35','2021-09-08 14:45:35'),(74,12,75,0,'2021-09-08 14:45:35','2021-09-08 14:45:35'),(75,12,76,0,'2021-09-08 14:45:35','2021-09-08 14:45:35'),(76,12,77,0,'2021-09-08 14:45:35','2021-09-08 14:45:35'),(77,12,78,0,'2021-09-08 14:45:35','2021-09-08 14:45:35'),(78,12,79,0,'2021-09-08 14:45:35','2021-09-08 14:45:35');
/*!40000 ALTER TABLE `org_template_details_section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `org_template_gallery_section`
--

DROP TABLE IF EXISTS `org_template_gallery_section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `org_template_gallery_section` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(10) unsigned NOT NULL,
  `gallery_id` int(10) unsigned NOT NULL,
  `is_invisible` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `org_template_gallery_section_organization_id_foreign` (`organization_id`),
  KEY `org_template_gallery_section_gallery_id_foreign` (`gallery_id`),
  CONSTRAINT `org_template_gallery_section_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`) ON DELETE CASCADE,
  CONSTRAINT `org_template_gallery_section_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `org_template_gallery_section`
--

LOCK TABLES `org_template_gallery_section` WRITE;
/*!40000 ALTER TABLE `org_template_gallery_section` DISABLE KEYS */;
/*!40000 ALTER TABLE `org_template_gallery_section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `org_template_hero_section`
--

DROP TABLE IF EXISTS `org_template_hero_section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `org_template_hero_section` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(10) unsigned NOT NULL,
  `hero_img_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured_img_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cta_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_invisible` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `org_template_hero_section_organization_id_foreign` (`organization_id`),
  CONSTRAINT `org_template_hero_section_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `org_template_hero_section`
--

LOCK TABLES `org_template_hero_section` WRITE;
/*!40000 ALTER TABLE `org_template_hero_section` DISABLE KEYS */;
INSERT INTO `org_template_hero_section` VALUES (3,4,'51935e4a5058c02e.png','7f183ca1117e7591.png','Providing our customers with top quality, professional painting services since 2003',0,'2021-08-27 13:37:37','2021-08-27 13:38:28'),(4,5,'09e6f58bd73c8dc7.jpg','4053c0958bb69876.jpg','ONE DOLLAR. ONE TREE.',0,'2021-09-07 15:23:08','2021-09-08 13:41:12'),(5,6,'52b40c280766c95c.jpg','50317db88c8ef81a.jpg','Doing the most good',0,'2021-09-07 20:32:59','2021-09-07 21:02:41'),(6,7,'fd28049ba9abf494.jpg','ffe20c6909e8f18e.webp','Giving back to those who need it most',0,'2021-09-07 21:13:14','2021-09-08 13:13:48'),(7,8,'6aca7dd6eb557cff.jpg','dce319ba50d3e134.jpg','We\'re here to make a difference',0,'2021-09-07 21:47:04','2021-09-08 14:32:31'),(8,9,'7385c36b37cd6c7a.jpg','57d60dd00a9b8837.png','85% of every dollar reinvested into comunities',0,'2021-09-08 05:29:04','2021-09-08 05:48:41'),(9,10,'d29d52c3420e507c.jpg','08bf81435f17fe70.jpg','A wish begins with hope.  And hope begins with you.',0,'2021-09-08 14:07:06','2021-09-08 14:11:28'),(10,11,'de1845d95b44052c.jpg','3a0253a6889edc12.png','Together, we can end Alzheimer’s. Donate today.',0,'2021-09-08 14:25:04','2021-09-08 14:31:02'),(11,12,'bf9e942dc59f468e.jpg','0fc9b924c6cec647.jpg','Lets inspire children\'s passions and encourage them to achieve success in life',0,'2021-09-08 14:42:19','2021-09-09 02:28:54');
/*!40000 ALTER TABLE `org_template_hero_section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `org_template_quote_section`
--

DROP TABLE IF EXISTS `org_template_quote_section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `org_template_quote_section` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(10) unsigned NOT NULL,
  `quote_id` int(10) unsigned NOT NULL,
  `is_invisible` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `org_template_quote_section_organization_id_foreign` (`organization_id`),
  KEY `org_template_quote_section_quote_id_foreign` (`quote_id`),
  CONSTRAINT `org_template_quote_section_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE,
  CONSTRAINT `org_template_quote_section_quote_id_foreign` FOREIGN KEY (`quote_id`) REFERENCES `quotes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `org_template_quote_section`
--

LOCK TABLES `org_template_quote_section` WRITE;
/*!40000 ALTER TABLE `org_template_quote_section` DISABLE KEYS */;
/*!40000 ALTER TABLE `org_template_quote_section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `org_template_social_media_section`
--

DROP TABLE IF EXISTS `org_template_social_media_section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `org_template_social_media_section` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(10) unsigned NOT NULL,
  `social_media_id` int(10) unsigned NOT NULL,
  `is_invisible` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `org_template_social_media_section_organization_id_foreign` (`organization_id`),
  KEY `org_template_social_media_section_social_media_id_foreign` (`social_media_id`),
  CONSTRAINT `org_template_social_media_section_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE,
  CONSTRAINT `org_template_social_media_section_social_media_id_foreign` FOREIGN KEY (`social_media_id`) REFERENCES `social_medias` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `org_template_social_media_section`
--

LOCK TABLES `org_template_social_media_section` WRITE;
/*!40000 ALTER TABLE `org_template_social_media_section` DISABLE KEYS */;
/*!40000 ALTER TABLE `org_template_social_media_section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `org_templates`
--

DROP TABLE IF EXISTS `org_templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `org_templates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(10) unsigned NOT NULL,
  `template_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `org_templates_organization_id_foreign` (`organization_id`),
  KEY `org_templates_template_id_foreign` (`template_id`),
  CONSTRAINT `org_templates_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE,
  CONSTRAINT `org_templates_template_id_foreign` FOREIGN KEY (`template_id`) REFERENCES `templates` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `org_templates`
--

LOCK TABLES `org_templates` WRITE;
/*!40000 ALTER TABLE `org_templates` DISABLE KEYS */;
/*!40000 ALTER TABLE `org_templates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organization_sign_up_tokens`
--

DROP TABLE IF EXISTS `organization_sign_up_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organization_sign_up_tokens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `organization_sign_up_tokens_organization_id_foreign` (`organization_id`),
  CONSTRAINT `organization_sign_up_tokens_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organization_sign_up_tokens`
--

LOCK TABLES `organization_sign_up_tokens` WRITE;
/*!40000 ALTER TABLE `organization_sign_up_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `organization_sign_up_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organization_users`
--

DROP TABLE IF EXISTS `organization_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organization_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `organization_users_organization_id_foreign` (`organization_id`),
  KEY `organization_users_user_id_foreign` (`user_id`),
  CONSTRAINT `organization_users_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE,
  CONSTRAINT `organization_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organization_users`
--

LOCK TABLES `organization_users` WRITE;
/*!40000 ALTER TABLE `organization_users` DISABLE KEYS */;
INSERT INTO `organization_users` VALUES (4,4,5,'2021-08-27 13:25:39','2021-08-27 13:25:39'),(5,5,7,'2021-09-07 15:17:39','2021-09-07 15:17:39'),(6,6,8,'2021-09-07 20:14:20','2021-09-07 20:14:20'),(7,7,9,'2021-09-07 21:09:03','2021-09-07 21:09:03'),(8,8,10,'2021-09-07 21:42:10','2021-09-07 21:42:10'),(9,9,11,'2021-09-08 05:26:20','2021-09-08 05:26:20'),(10,10,12,'2021-09-08 14:06:03','2021-09-08 14:06:03'),(11,11,13,'2021-09-08 14:23:11','2021-09-08 14:23:11'),(12,12,14,'2021-09-08 14:39:07','2021-09-08 14:39:07'),(13,13,15,'2021-09-08 15:08:44','2021-09-08 15:08:44');
/*!40000 ALTER TABLE `organization_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organizations`
--

DROP TABLE IF EXISTS `organizations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organizations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_img_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_img_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primary_brand_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_brand_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_invisible` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organizations`
--

LOCK TABLES `organizations` WRITE;
/*!40000 ALTER TABLE `organizations` DISABLE KEYS */;
INSERT INTO `organizations` VALUES (4,'Community Painting','123 N Saturday Dr, August, FL, 39213','streamlined.our.designs@gmail.com','616-392-2325',NULL,'86d7d3d9c25f9d3d.jpg',NULL,NULL,1,'2021-08-27 13:24:59','2021-08-27 13:37:37'),(5,'ONE TREE PLANTED','3255 2nd st, ft lauderdale, fl, 34299','info@onetreeplanted.org','248-233-3303',NULL,'3c213966ab22a77d.jpg',NULL,NULL,1,'2021-09-07 15:16:22','2021-09-08 13:42:05'),(6,'The Salvation Army','432 Shady St, New Jersey, 34245','info@salvationarmyusa.org','3495082394',NULL,'baaf82f8a3d8f3a8.png',NULL,NULL,1,'2021-09-07 20:12:17','2021-09-07 20:34:31'),(7,'St. Jude Children\'s Hospital','8946 Cleveland St. Warminster, PA 18974','info@stjudes.com','2344634523',NULL,'4361eb29b54099bf.png',NULL,NULL,1,'2021-09-07 21:08:09','2021-09-08 18:58:33'),(8,'Breast Cancer Research Foundation','8 Thomas Road Attleboro, MA 02703','info@bcrf.org','646-497-2600',NULL,'ec712ef00aa20778.jpg',NULL,NULL,1,'2021-09-07 21:40:50','2021-09-08 14:32:31'),(9,'Goodwill','603 Summer Lane Lake Villa, IL 60046','info@goodwill.org','9524233905',NULL,'4fc76aab265e388f.jpg',NULL,NULL,1,'2021-09-08 05:23:39','2021-09-08 05:49:02'),(10,'Make a wish foundation','227 Warren Road Lake In The Hills, IL 60156','info@wish.org','64123478734',NULL,'53bfcdd8303306a6.png',NULL,NULL,1,'2021-09-08 14:04:29','2021-09-08 14:17:54'),(11,'Alzheimer\'s Association','498 Cardinal Avenue Vista, CA 92083','info@alz.org','91923419232',NULL,'03722bf8c69ebbf8.jpg',NULL,NULL,1,'2021-09-08 14:21:55','2021-09-08 14:28:23'),(12,'Big Brothers Big Sisters','246 Peanut Ln, Raining, Kn, 34256','info@bbbs.org','345234345559',NULL,'e3282922662f09d0.png',NULL,NULL,1,'2021-09-08 14:38:09','2021-09-08 14:45:35'),(13,'American Kidney Fund',NULL,'info@kidneyfund.org',NULL,NULL,NULL,NULL,NULL,0,'2021-09-08 15:07:47','2021-09-08 15:07:47');
/*!40000 ALTER TABLE `organizations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quotes`
--

DROP TABLE IF EXISTS `quotes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quotes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quote_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quotes`
--

LOCK TABLES `quotes` WRITE;
/*!40000 ALTER TABLE `quotes` DISABLE KEYS */;
/*!40000 ALTER TABLE `quotes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'user',NULL,NULL),(2,'admin',NULL,NULL),(3,'superuser',NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section_icon_icon_types`
--

DROP TABLE IF EXISTS `section_icon_icon_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `section_icon_icon_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `section_icon_id` int(10) unsigned NOT NULL,
  `section_icon_type_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `section_icon_icon_types_section_icon_id_foreign` (`section_icon_id`),
  KEY `section_icon_icon_types_section_icon_type_id_foreign` (`section_icon_type_id`),
  CONSTRAINT `section_icon_icon_types_section_icon_id_foreign` FOREIGN KEY (`section_icon_id`) REFERENCES `section_icons` (`id`) ON DELETE CASCADE,
  CONSTRAINT `section_icon_icon_types_section_icon_type_id_foreign` FOREIGN KEY (`section_icon_type_id`) REFERENCES `section_icon_types` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section_icon_icon_types`
--

LOCK TABLES `section_icon_icon_types` WRITE;
/*!40000 ALTER TABLE `section_icon_icon_types` DISABLE KEYS */;
INSERT INTO `section_icon_icon_types` VALUES (1,1,1,'2021-08-26 20:05:34','2021-08-26 20:05:34'),(2,2,1,'2021-08-26 20:05:50','2021-08-26 20:05:50'),(3,3,1,'2021-08-26 20:06:08','2021-08-26 20:06:08'),(4,4,1,'2021-08-26 20:06:48','2021-08-26 20:06:48'),(5,5,1,'2021-08-26 20:07:08','2021-08-26 20:07:08');
/*!40000 ALTER TABLE `section_icon_icon_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section_icon_types`
--

DROP TABLE IF EXISTS `section_icon_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `section_icon_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section_icon_types`
--

LOCK TABLES `section_icon_types` WRITE;
/*!40000 ALTER TABLE `section_icon_types` DISABLE KEYS */;
INSERT INTO `section_icon_types` VALUES (1,'Social','2021-08-26 20:04:58','2021-08-26 20:04:58'),(2,'General','2021-08-26 20:05:09','2021-08-26 20:05:09');
/*!40000 ALTER TABLE `section_icon_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section_icons`
--

DROP TABLE IF EXISTS `section_icons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `section_icons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section_icons`
--

LOCK TABLES `section_icons` WRITE;
/*!40000 ALTER TABLE `section_icons` DISABLE KEYS */;
INSERT INTO `section_icons` VALUES (1,'Facebook','fab fa-facebook-square','2021-08-26 20:05:34','2021-08-26 20:05:34'),(2,'Instagram','fab fa-instagram','2021-08-26 20:05:50','2021-08-26 20:05:50'),(3,'Twitter','fab fa-twitter','2021-08-26 20:06:08','2021-08-26 20:06:08'),(4,'LinkedIn','fab fa-linkedin','2021-08-26 20:06:48','2021-08-26 20:06:48'),(5,'Google','fab fa-google','2021-08-26 20:07:08','2021-08-26 20:07:08');
/*!40000 ALTER TABLE `section_icons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `social_medias`
--

DROP TABLE IF EXISTS `social_medias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `social_medias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `section_icon_id` int(10) unsigned NOT NULL,
  `page_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `social_medias_section_icon_id_foreign` (`section_icon_id`),
  CONSTRAINT `social_medias_section_icon_id_foreign` FOREIGN KEY (`section_icon_id`) REFERENCES `section_icons` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `social_medias`
--

LOCK TABLES `social_medias` WRITE;
/*!40000 ALTER TABLE `social_medias` DISABLE KEYS */;
/*!40000 ALTER TABLE `social_medias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `templates`
--

DROP TABLE IF EXISTS `templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `templates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hero_section_img_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_section_img_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details_section_img_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quotes_section_img_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_media_section_img_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gallery_section_img_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_invisible` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `templates`
--

LOCK TABLES `templates` WRITE;
/*!40000 ALTER TABLE `templates` DISABLE KEYS */;
/*!40000 ALTER TABLE `templates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_roles_user_id_foreign` (`user_id`),
  KEY `user_roles_role_id_foreign` (`role_id`),
  CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles`
--

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
INSERT INTO `user_roles` VALUES (1,1,3,'2021-08-24 22:06:49','2021-08-24 22:06:49'),(5,5,2,'2021-08-27 13:25:39','2021-08-27 13:25:39'),(6,6,1,'2021-08-29 23:06:07','2021-08-29 23:06:07'),(7,7,2,'2021-08-29 23:06:30','2021-09-07 15:17:39'),(8,8,2,'2021-09-07 20:14:20','2021-09-07 20:14:20'),(9,9,2,'2021-09-07 21:09:03','2021-09-07 21:09:03'),(10,10,2,'2021-09-07 21:42:10','2021-09-07 21:42:10'),(11,11,2,'2021-09-08 05:26:20','2021-09-08 05:26:20'),(12,12,2,'2021-09-08 14:06:03','2021-09-08 14:06:03'),(13,13,2,'2021-09-08 14:23:11','2021-09-08 14:23:11'),(14,14,2,'2021-09-08 14:39:07','2021-09-08 14:39:07'),(15,15,2,'2021-09-08 15:08:44','2021-09-08 15:08:44');
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_img_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_invisible` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Super','User','streamline.our.designs@gmail.com','b56db951978df0bd.png','f0e4c2f76c58916ec258f246851bea091d14d4247a2fc3e18694461b1816e13b',0,'2021-08-24 22:06:49','2021-09-08 13:58:38'),(5,'Pierce','Prange','streamlined.our.designs@gmail.com','3217f99a77df0d85.PNG','f0e4c2f76c58916ec258f246851bea091d14d4247a2fc3e18694461b1816e13b',1,'2021-08-27 13:25:39','2021-08-29 23:03:43'),(6,'Pierce','Prange','asdf@gmail.com',NULL,'f0e4c2f76c58916ec258f246851bea091d14d4247a2fc3e18694461b1816e13b',0,'2021-08-29 23:06:07','2021-08-29 23:06:07'),(7,'Tosh','. 0','info@onetreeplanted.org','fd39efd95d014852.jpg','f0e4c2f76c58916ec258f246851bea091d14d4247a2fc3e18694461b1816e13b',0,'2021-08-29 23:06:30','2021-09-07 22:58:39'),(8,'John','Doe','info@salvationarmyusa.org',NULL,'f0e4c2f76c58916ec258f246851bea091d14d4247a2fc3e18694461b1816e13b',1,'2021-09-07 20:14:20','2021-09-07 20:14:20'),(9,'Will','Smith','info@stjudes.com','55ded5e7665ff52e.jpg','f0e4c2f76c58916ec258f246851bea091d14d4247a2fc3e18694461b1816e13b',1,'2021-09-07 21:09:03','2021-09-08 13:03:09'),(10,'Stacy','Smith','info@bcrf.org','369b8e12051c7fc4.jpg','f0e4c2f76c58916ec258f246851bea091d14d4247a2fc3e18694461b1816e13b',1,'2021-09-07 21:42:10','2021-09-07 22:00:37'),(11,'The','Hulk','info@goodwill.org','3cf2c455ae50bef0.jpg','f0e4c2f76c58916ec258f246851bea091d14d4247a2fc3e18694461b1816e13b',1,'2021-09-08 05:26:20','2021-09-08 05:27:13'),(12,'Tony','Hawk','info@wish.org','0faa8ea67c87e84f.jpg','f0e4c2f76c58916ec258f246851bea091d14d4247a2fc3e18694461b1816e13b',1,'2021-09-08 14:06:03','2021-09-08 14:06:34'),(13,'Marilyn','Monroe','info@alz.org','bbfa58fd394437f3.png','f0e4c2f76c58916ec258f246851bea091d14d4247a2fc3e18694461b1816e13b',1,'2021-09-08 14:23:11','2021-09-08 14:24:33'),(14,'Jennifer','Lopez','info@bbbs.org','657c06a3c6f42827.jpg','f0e4c2f76c58916ec258f246851bea091d14d4247a2fc3e18694461b1816e13b',1,'2021-09-08 14:39:07','2021-09-08 14:39:53'),(15,'Oprah','Winfrey','info@kidneyfund.org','148b10ec95410be8.jpg','f0e4c2f76c58916ec258f246851bea091d14d4247a2fc3e18694461b1816e13b',1,'2021-09-08 15:08:44','2021-09-08 15:09:14');
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

-- Dump completed on 2021-09-09  3:12:22
