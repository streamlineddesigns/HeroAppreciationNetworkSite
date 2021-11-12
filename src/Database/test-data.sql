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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `details`
--

LOCK TABLES `details` WRITE;
/*!40000 ALTER TABLE `details` DISABLE KEYS */;
INSERT INTO `details` VALUES (1,NULL,'','2021-11-10 09:21:05','2021-11-10 09:21:05'),(2,NULL,'Expand access to wrap-around support services by building capacity across the Goodwill network','2021-11-11 23:17:53','2021-11-11 23:17:53'),(3,NULL,'Improve job quality outcomes by equipping career advancers with locally-relevant skills','2021-11-11 23:17:53','2021-11-11 23:17:53'),(4,NULL,'Increase the numbers of people connected with good jobs through expanded employer relationships and retention support','2021-11-11 23:17:53','2021-11-11 23:17:53'),(5,NULL,'Divert more goods from landfills through growth in retail','2021-11-11 23:17:53','2021-11-11 23:17:53'),(6,NULL,'Increase funding for our mission and opportunities','2021-11-11 23:17:53','2021-11-11 23:17:53'),(7,NULL,'Offer equal employment opportunities. Local Goodwills collectively employ 141,000 people','2021-11-11 23:17:53','2021-11-11 23:17:53'),(8,NULL,'','2021-11-11 23:26:21','2021-11-11 23:26:21'),(9,NULL,'','2021-11-12 17:52:44','2021-11-12 17:52:44');
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
  `message` text COLLATE utf8mb4_unicode_ci,
  `is_invisible` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `donations_sender_user_id_foreign` (`sender_user_id`),
  KEY `donations_recipient_organization_id_foreign` (`recipient_organization_id`),
  CONSTRAINT `donations_recipient_organization_id_foreign` FOREIGN KEY (`recipient_organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE,
  CONSTRAINT `donations_sender_user_id_foreign` FOREIGN KEY (`sender_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donations`
--

LOCK TABLES `donations` WRITE;
/*!40000 ALTER TABLE `donations` DISABLE KEYS */;
INSERT INTO `donations` VALUES (1,6,4,50,NULL,0,'2021-11-12 00:10:51','2021-11-12 00:10:51'),(2,7,2,250,NULL,0,'2021-11-12 00:12:01','2021-11-12 00:12:01'),(3,8,3,375,NULL,0,'2021-11-12 00:13:14','2021-11-12 00:13:14'),(4,9,2,525,NULL,0,'2021-11-12 00:14:15','2021-11-12 00:14:15'),(5,10,1,575,NULL,0,'2021-11-12 00:14:54','2021-11-12 00:14:54'),(6,11,1,900,NULL,0,'2021-11-12 00:15:38','2021-11-12 00:15:38'),(7,12,4,75,NULL,0,'2021-11-12 00:16:40','2021-11-12 00:16:40'),(8,13,4,750,NULL,0,'2021-11-12 00:17:17','2021-11-12 00:17:17'),(9,14,4,400,NULL,0,'2021-11-12 00:18:16','2021-11-12 00:18:16'),(10,15,3,500,NULL,0,'2021-11-12 00:18:50','2021-11-12 00:18:50');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `extra_text`
--

LOCK TABLES `extra_text` WRITE;
/*!40000 ALTER TABLE `extra_text` DISABLE KEYS */;
INSERT INTO `extra_text` VALUES (1,1,NULL,NULL,NULL,'The mission of the Mexican American\r\nOpportunity Foundation (MAOF) is to provide for the socio-economic betterment of the greater Latino community of California, while preserving the pride, values and heritage of the Mexican American culture.','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-11-10 09:16:24','2021-11-10 09:16:24'),(2,2,NULL,NULL,NULL,'AAMA\'s goal is for the inclusion and full acceptance of all African descent persons in our denomination.','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-11-11 23:06:24','2021-11-11 23:06:24'),(3,3,NULL,NULL,NULL,'With our bold new vision, a committed network and like-minded partners, we are poised to accelerate and expand impact like never before. By building capacity across the network and enhancing our support of local operations, we aim to:','Goodwill career centers prepare job seekers for in-demand careers. People come to Goodwill to learn new skills, earn credentials, create résumés, and prepare for interviews. Last year, Goodwill helped 1.09 million people build competencies, earn jobs and advance in their careers.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-11-11 23:17:53','2021-11-11 23:17:53'),(4,4,NULL,NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-11-11 23:24:14','2021-11-11 23:24:14');
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
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2021_08_11_165331_create_everything',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `org_template_about_section`
--

LOCK TABLES `org_template_about_section` WRITE;
/*!40000 ALTER TABLE `org_template_about_section` DISABLE KEYS */;
INSERT INTO `org_template_about_section` VALUES (1,1,'The Mexican American Opportunity Foundation (MAOF) is a non-profit, state-wide community-based organization that was established in 1963 by Founder Dionicio Morales to serve disadvantaged individuals and families in the Los Angeles area. MAOF is one of the largest family services organizations in the Unites States and has achieved this status by providing high quality social services and programs to diverse communities where the need is the greatest. It currently operates in seven California counties with over 60 service locations and over 900 employees. The annual budget exceeds $120,000,000.','0ce2f8b427a15fe8.jpg',1,'2021-11-10 09:16:24','2021-11-10 09:34:43'),(2,2,'The AAMA is a place for fellowship, education and empowerment. You will have the opportunity to grow with your peers while developing ministerial skills. Becoming a member opens up the opportunity to engage within our community and ministerium, learning from established ministry leaders. Within AAMA, we pride ourselves in supporting each other working together to build relationships and grow within the Kingdom of God.','6ae67c9af8084799.jpg',1,'2021-11-11 23:06:24','2021-11-11 23:06:24'),(3,3,'Goodwill stores generate $5 billion in annual revenue while diverting nearly 5 billion pounds of goods from landfills and into reuse. Retail revenue augments grants and other philanthropy to fund Goodwill career centers and services. Goodwill retail operations generate revenue that supports our mission work. People can have a positive impact on their communities and the environment simply through their donations.','ab7f1928e9c8c843.png',1,'2021-11-11 23:17:53','2021-11-12 17:51:45'),(4,4,'In partnership with other nonprofit organizations, The Hero Appreciation Network wants to honor all fallen heroes in your community while also helping students achieve their academic dreams through a generous scholarship and grant program.','f802e7f641029a5a.jpg',1,'2021-11-11 23:24:14','2021-11-12 17:50:24');
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `org_template_details_section`
--

LOCK TABLES `org_template_details_section` WRITE;
/*!40000 ALTER TABLE `org_template_details_section` DISABLE KEYS */;
INSERT INTO `org_template_details_section` VALUES (1,1,1,1,'2021-11-10 09:21:05','2021-11-10 09:21:05'),(2,3,2,1,'2021-11-11 23:17:53','2021-11-11 23:17:53'),(3,3,3,1,'2021-11-11 23:17:53','2021-11-11 23:17:53'),(4,3,4,1,'2021-11-11 23:17:53','2021-11-11 23:17:53'),(5,3,5,1,'2021-11-11 23:17:53','2021-11-11 23:17:53'),(6,3,6,1,'2021-11-11 23:17:53','2021-11-11 23:17:53'),(7,3,7,1,'2021-11-11 23:17:53','2021-11-11 23:17:53'),(8,4,8,1,'2021-11-11 23:26:21','2021-11-11 23:26:21'),(9,2,9,1,'2021-11-12 17:52:44','2021-11-12 17:52:44');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `org_template_hero_section`
--

LOCK TABLES `org_template_hero_section` WRITE;
/*!40000 ALTER TABLE `org_template_hero_section` DISABLE KEYS */;
INSERT INTO `org_template_hero_section` VALUES (1,1,'65850f6af3fee9b1.png','1b5ff40a44bd64ba.png','Help support the socio-economic betterment of the Latino community in California',1,'2021-11-10 09:16:24','2021-11-12 17:53:05'),(2,2,'914da38b45daff72.jpg','b128a7cef0b90f92.webp','Donate to help all African Americans in our denomination',1,'2021-11-11 23:06:24','2021-11-12 17:52:44'),(3,3,'33686d285df33977.jpg','767fdde1132ff996.png','85% of every dollar reinvested into communities',1,'2021-11-11 23:17:53','2021-11-12 17:51:45'),(4,4,'d6f136162db65ddc.png','580729e266a9aadb.png','',1,'2021-11-11 23:24:14','2021-11-11 23:26:21');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organization_users`
--

LOCK TABLES `organization_users` WRITE;
/*!40000 ALTER TABLE `organization_users` DISABLE KEYS */;
INSERT INTO `organization_users` VALUES (1,1,2,'2021-11-10 09:16:24','2021-11-10 09:16:24'),(2,2,3,'2021-11-11 23:06:24','2021-11-11 23:06:24'),(3,3,4,'2021-11-11 23:17:53','2021-11-11 23:17:53'),(4,4,5,'2021-11-11 23:24:14','2021-11-11 23:24:14');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organizations`
--

LOCK TABLES `organizations` WRITE;
/*!40000 ALTER TABLE `organizations` DISABLE KEYS */;
INSERT INTO `organizations` VALUES (1,'Mexican American Opportunity Foundation','401 N. Garfield Avenue Montebello, CA 90640','info@maof.com','(323) 890-9600',NULL,'987e866a35d2793d.jpg',NULL,NULL,0,'2021-11-10 09:16:24','2021-11-12 17:53:05'),(2,'African American Ministers Association','','info@aama.com','',NULL,'31fa5a81e30cb52d.png',NULL,NULL,0,'2021-11-11 23:06:24','2021-11-12 17:52:44'),(3,'Goodwill','15810 Indianola Dr. Rockville, MD 20855 USA','info@goodwill.com','',NULL,'08761b95963118d7.jpg',NULL,NULL,0,'2021-11-11 23:17:53','2021-11-11 23:17:53'),(4,'Hero Appreciation Network','','info@heroappreciationnetwork.com','',NULL,'bc6e5cbe5bd566c7.png',NULL,NULL,0,'2021-11-11 23:24:14','2021-11-11 23:24:14');
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
-- Table structure for table `user_follows`
--

DROP TABLE IF EXISTS `user_follows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_follows` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `follower_user_id` int(10) unsigned NOT NULL,
  `followed_user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_follows_follower_user_id_foreign` (`follower_user_id`),
  KEY `user_follows_followed_user_id_foreign` (`followed_user_id`),
  CONSTRAINT `user_follows_followed_user_id_foreign` FOREIGN KEY (`followed_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_follows_follower_user_id_foreign` FOREIGN KEY (`follower_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_follows`
--

LOCK TABLES `user_follows` WRITE;
/*!40000 ALTER TABLE `user_follows` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_follows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_messages`
--

DROP TABLE IF EXISTS `user_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sender_user_id` int(10) unsigned NOT NULL,
  `recipient_user_id` int(10) unsigned NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_messages_sender_user_id_foreign` (`sender_user_id`),
  KEY `user_messages_recipient_user_id_foreign` (`recipient_user_id`),
  CONSTRAINT `user_messages_recipient_user_id_foreign` FOREIGN KEY (`recipient_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_messages_sender_user_id_foreign` FOREIGN KEY (`sender_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_messages`
--

LOCK TABLES `user_messages` WRITE;
/*!40000 ALTER TABLE `user_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_messages` ENABLE KEYS */;
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
INSERT INTO `user_roles` VALUES (1,1,3,'2021-08-24 22:06:49','2021-08-24 22:06:49'),(2,2,2,'2021-11-10 09:16:24','2021-11-10 09:16:24'),(3,3,2,'2021-11-11 23:06:24','2021-11-11 23:06:24'),(4,4,2,'2021-11-11 23:17:53','2021-11-11 23:17:53'),(5,5,2,'2021-11-11 23:24:14','2021-11-11 23:24:14'),(6,6,1,'2021-11-11 23:40:55','2021-11-11 23:40:55'),(7,7,1,'2021-11-11 23:41:12','2021-11-11 23:41:12'),(8,8,1,'2021-11-11 23:41:29','2021-11-11 23:41:29'),(9,9,1,'2021-11-11 23:41:49','2021-11-11 23:41:49'),(10,10,1,'2021-11-11 23:42:24','2021-11-11 23:42:24'),(11,11,1,'2021-11-11 23:42:42','2021-11-11 23:42:42'),(12,12,1,'2021-11-11 23:43:03','2021-11-11 23:43:03'),(13,13,1,'2021-11-11 23:43:16','2021-11-11 23:43:16'),(14,14,1,'2021-11-11 23:43:28','2021-11-11 23:43:28'),(15,15,1,'2021-11-11 23:43:45','2021-11-11 23:43:45');
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
INSERT INTO `users` VALUES (1,'Super','User','admin@colorswitch.com','b56db951978df0bd.png','f0e4c2f76c58916ec258f246851bea091d14d4247a2fc3e18694461b1816e13b',1,'2021-08-24 22:06:49','2021-09-08 13:58:38'),(2,' ',' ','info@maof.com',NULL,'f0e4c2f76c58916ec258f246851bea091d14d4247a2fc3e18694461b1816e13b',0,'2021-11-10 09:16:24','2021-11-10 09:16:24'),(3,' ',' ','info@aama.com',NULL,'f0e4c2f76c58916ec258f246851bea091d14d4247a2fc3e18694461b1816e13b',0,'2021-11-11 23:06:24','2021-11-11 23:06:24'),(4,' ',' ','info@goodwill.com',NULL,'f0e4c2f76c58916ec258f246851bea091d14d4247a2fc3e18694461b1816e13b',0,'2021-11-11 23:17:53','2021-11-11 23:17:53'),(5,' ',' ','info@heroappreciationnetwork.com',NULL,'f0e4c2f76c58916ec258f246851bea091d14d4247a2fc3e18694461b1816e13b',0,'2021-11-11 23:24:14','2021-11-11 23:24:14'),(6,'James','Ross','James.Ross@gmail.com','c39aaed518111425.jpg','f0e4c2f76c58916ec258f246851bea091d14d4247a2fc3e18694461b1816e13b',0,'2021-11-11 23:40:55','2021-11-11 23:58:27'),(7,'John','Scott','John.Scott@gmail.com','1eb834eacc80d3b8.jpg','f0e4c2f76c58916ec258f246851bea091d14d4247a2fc3e18694461b1816e13b',0,'2021-11-11 23:41:12','2021-11-11 23:59:11'),(8,'Tamika','Davis','Tamika.Davis@gmail.com','0322062b297770f9.jpg','f0e4c2f76c58916ec258f246851bea091d14d4247a2fc3e18694461b1816e13b',0,'2021-11-11 23:41:29','2021-11-12 00:06:35'),(9,'Jevonte','Williams','Jevonte.Williams@gmail.com','b07a212208a2ce6e.jpg','f0e4c2f76c58916ec258f246851bea091d14d4247a2fc3e18694461b1816e13b',0,'2021-11-11 23:41:49','2021-11-12 00:00:15'),(10,'Verónica','Garcia','Veronica.Garcia@gmail.com','c07f7d7c9a55b6d0.jpg','f0e4c2f76c58916ec258f246851bea091d14d4247a2fc3e18694461b1816e13b',0,'2021-11-11 23:42:24','2021-11-12 00:00:46'),(11,'Alejandro','Lopez','Alejandro.Lopez@gmail.com','5ad166edf8f8fcd2.jpg','f0e4c2f76c58916ec258f246851bea091d14d4247a2fc3e18694461b1816e13b',0,'2021-11-11 23:42:42','2021-11-12 00:01:31'),(12,'Tobias','Schmidt','Tobias.Schmidt@gmail.com','8d6f9704242f17bb.png','f0e4c2f76c58916ec258f246851bea091d14d4247a2fc3e18694461b1816e13b',0,'2021-11-11 23:43:03','2021-11-12 00:03:40'),(13,'Finn','Wagner','Finn.Wagner@gmail.com','d05cb1f6093a8b74.jpg','f0e4c2f76c58916ec258f246851bea091d14d4247a2fc3e18694461b1816e13b',0,'2021-11-11 23:43:16','2021-11-12 00:04:09'),(14,'Roisin','Murphy','Roisin.Murphy@gmail.com','de547e93cf1d9600.jpg','f0e4c2f76c58916ec258f246851bea091d14d4247a2fc3e18694461b1816e13b',0,'2021-11-11 23:43:28','2021-11-12 00:04:45'),(15,'Niamh','Walsh','Niamh.Walsh@gmail.com','0781f2f78990b8b1.jpg','f0e4c2f76c58916ec258f246851bea091d14d4247a2fc3e18694461b1816e13b',0,'2021-11-11 23:43:45','2021-11-12 00:05:56');
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

-- Dump completed on 2021-11-12 19:15:58
