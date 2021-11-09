--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'user',NULL,NULL),(2,'admin',NULL,NULL),(3,'superuser',NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Super','User','admin@colorswitch.com','b56db951978df0bd.png','f0e4c2f76c58916ec258f246851bea091d14d4247a2fc3e18694461b1816e13b',1,'2021-08-24 22:06:49','2021-09-08 13:58:38');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `user_roles`
--

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
INSERT INTO `user_roles` VALUES (1,1,3,'2021-08-24 22:06:49','2021-08-24 22:06:49');
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Dumping data for table `section_icon_types`
--

LOCK TABLES `section_icon_types` WRITE;
/*!40000 ALTER TABLE `section_icon_types` DISABLE KEYS */;
INSERT INTO `section_icon_types` VALUES (1,'Social','2021-08-26 20:04:58','2021-08-26 20:04:58'),(2,'General','2021-08-26 20:05:09','2021-08-26 20:05:09');
/*!40000 ALTER TABLE `section_icon_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `section_icons`
--

LOCK TABLES `section_icons` WRITE;
/*!40000 ALTER TABLE `section_icons` DISABLE KEYS */;
INSERT INTO `section_icons` VALUES (1,'Facebook','fab fa-facebook-square','2021-08-26 20:05:34','2021-08-26 20:05:34'),(2,'Instagram','fab fa-instagram','2021-08-26 20:05:50','2021-08-26 20:05:50'),(3,'Twitter','fab fa-twitter','2021-08-26 20:06:08','2021-08-26 20:06:08'),(4,'LinkedIn','fab fa-linkedin','2021-08-26 20:06:48','2021-08-26 20:06:48'),(5,'Google','fab fa-google','2021-08-26 20:07:08','2021-08-26 20:07:08');
/*!40000 ALTER TABLE `section_icons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `section_icon_icon_types`
--

LOCK TABLES `section_icon_icon_types` WRITE;
/*!40000 ALTER TABLE `section_icon_icon_types` DISABLE KEYS */;
INSERT INTO `section_icon_icon_types` VALUES (1,1,1,'2021-08-26 20:05:34','2021-08-26 20:05:34'),(2,2,1,'2021-08-26 20:05:50','2021-08-26 20:05:50'),(3,3,1,'2021-08-26 20:06:08','2021-08-26 20:06:08'),(4,4,1,'2021-08-26 20:06:48','2021-08-26 20:06:48'),(5,5,1,'2021-08-26 20:07:08','2021-08-26 20:07:08');
/*!40000 ALTER TABLE `section_icon_icon_types` ENABLE KEYS */;
UNLOCK TABLES;