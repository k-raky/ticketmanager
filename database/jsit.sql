-- MySQL dump 10.13  Distrib 8.0.30, for Linux (x86_64)
--
-- Host: localhost    Database: jsit
-- ------------------------------------------------------
-- Server version	8.0.30-0ubuntu0.20.04.2

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
-- Table structure for table `allocations`
--

DROP TABLE IF EXISTS `allocations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `allocations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commande_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `allocations_commande_id_unique` (`commande_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `allocations`
--

LOCK TABLES `allocations` WRITE;
/*!40000 ALTER TABLE `allocations` DISABLE KEYS */;
/*!40000 ALTER TABLE `allocations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assets`
--

DROP TABLE IF EXISTS `assets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assets` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `danger_level` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assets`
--

LOCK TABLES `assets` WRITE;
/*!40000 ALTER TABLE `assets` DISABLE KEYS */;
INSERT INTO `assets` VALUES (1,'gloves','gloves','2022-10-03 14:46:24','2022-10-03 14:46:24',NULL,0),(2,'masks','masks','2022-10-03 14:46:24','2022-10-03 14:46:24',NULL,0),(3,'respirators','respirators','2022-10-03 14:46:24','2022-10-03 14:46:24',NULL,0),(4,'protective overalls','protective overalls','2022-10-03 14:46:24','2022-10-03 14:46:24',NULL,0),(5,'protective glasses','protective glasses','2022-10-03 14:46:24','2022-10-03 14:46:24',NULL,0);
/*!40000 ALTER TABLE `assets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `counters`
--

DROP TABLE IF EXISTS `counters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `counters` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `value` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `counters`
--

LOCK TABLES `counters` WRITE;
/*!40000 ALTER TABLE `counters` DISABLE KEYS */;
INSERT INTO `counters` VALUES (1,154,'2022-10-17 20:18:46','2022-12-07 21:32:06');
/*!40000 ALTER TABLE `counters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `desktop_passwords`
--

DROP TABLE IF EXISTS `desktop_passwords`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `desktop_passwords` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `desktop_passwords`
--

LOCK TABLES `desktop_passwords` WRITE;
/*!40000 ALTER TABLE `desktop_passwords` DISABLE KEYS */;
INSERT INTO `desktop_passwords` VALUES (1,NULL,'2022-10-31 22:48:31','2022-11-23 20:16:35');
/*!40000 ALTER TABLE `desktop_passwords` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `logs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `log_date` datetime NOT NULL,
  `table_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `log_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (1,12,'2022-10-03 16:47:28','','login','{\"ip\":\"154.124.101.181\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/104.0.0.0 Safari\\/537.36\"}'),(2,1,'2022-10-03 16:49:24','','login','{\"ip\":\"154.124.101.181\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/104.0.0.0 Safari\\/537.36\"}'),(3,1,'2022-10-03 22:00:08','users','delete','{\"id\":13,\"name\":\"TESTX\",\"email\":\"test@test.com\",\"email_verified_at\":null,\"password\":\"$2y$10$AI\\/RDTyPyh0gaSKXX8KeiO1M3ms5Yw9yLPFIBWkj4XLlaEg9NQI9m\",\"remember_token\":null,\"created_at\":\"2022-10-03 21:55:50\",\"updated_at\":\"2022-10-03 22:00:08\",\"deleted_at\":\"2022-10-03 22:00:08\",\"team_id\":null}'),(4,1,'2022-10-04 12:39:50','users','delete','{\"id\":9,\"name\":\"Doctor 133\",\"email\":\"doctor133@gmail.com\",\"email_verified_at\":\"2022-10-03 16:46:24\",\"password\":\"$2y$10$vy\\/uTS2Y3vHpIMYVZc0NRuJYT7ElS6WCsN.UrLyzRwm5AIJ3DIXnu\",\"remember_token\":null,\"created_at\":\"2022-10-03 16:46:24\",\"updated_at\":\"2022-10-04 12:39:50\",\"deleted_at\":\"2022-10-04 12:39:50\",\"team_id\":4}'),(5,1,'2022-10-04 12:45:25','users','delete','{\"id\":8,\"name\":\"Director 133\",\"email\":\"director133@gmail.com\",\"email_verified_at\":\"2022-10-03 16:46:24\",\"password\":\"$2y$10$G3foVsMRuCYM.n8hT5eq5uAYqxe\\/zLD7j2rctUtd8hVMib1tmUDEy\",\"remember_token\":null,\"created_at\":\"2022-10-03 16:46:24\",\"updated_at\":\"2022-10-04 12:45:25\",\"deleted_at\":\"2022-10-04 12:45:25\",\"team_id\":4}'),(6,1,'2022-10-04 12:53:17','users','delete','{\"id\":2,\"name\":\"Director 402\",\"email\":\"director402@gmail.com\",\"email_verified_at\":\"2022-10-03 16:46:23\",\"password\":\"$2y$10$etGAO\\/L4BDYiANU9j6ae6u39GGpw3.Vieem36xRQlW37IG.QOrBHi\",\"remember_token\":null,\"created_at\":\"2022-10-03 16:46:23\",\"updated_at\":\"2022-10-04 12:53:17\",\"deleted_at\":\"2022-10-04 12:53:17\",\"team_id\":1}'),(7,1,'2022-10-04 15:41:17','users','delete','{\"id\":14,\"name\":\"TESTX\",\"email\":\"test@testt.com\",\"email_verified_at\":null,\"password\":\"$2y$10$SJLb.aD0Mk30ThEcStJsw.MSilB2SxDpbUf5Dc\\/b4SYNEWoEr8Z\\/m\",\"remember_token\":null,\"created_at\":\"2022-10-04 15:39:23\",\"updated_at\":\"2022-10-04 15:41:17\",\"deleted_at\":\"2022-10-04 15:41:17\",\"team_id\":null}'),(8,1,'2022-10-04 15:42:02','users','delete','{\"id\":3,\"name\":\"Doctor 402\",\"email\":\"doctor402@gmail.com\",\"email_verified_at\":\"2022-10-03 16:46:23\",\"password\":\"$2y$10$nXujIGxeoMZHXp6JauNxn.wKDUwC6VBKMTCPVJjdWFAt6TC.2kX.e\",\"remember_token\":null,\"created_at\":\"2022-10-03 16:46:23\",\"updated_at\":\"2022-10-04 15:42:02\",\"deleted_at\":\"2022-10-04 15:42:02\",\"team_id\":1}'),(9,1,'2022-10-06 18:17:31','users','delete','{\"id\":15,\"name\":\"test_IT2\",\"email\":\"test2@gmail.com\",\"email_verified_at\":null,\"password\":\"$2y$10$BEKDwzn18\\/ia3\\/PNAR0DPuXWdo3px2JDmjbbaR5UZwuILQBD3PMye\",\"remember_token\":null,\"created_at\":\"2022-10-06 18:17:01\",\"updated_at\":\"2022-10-06 18:17:31\",\"deleted_at\":\"2022-10-06 18:17:31\",\"team_id\":null}'),(10,1,'2022-10-06 19:37:55','users','delete','{\"id\":6,\"name\":\"Director 718\",\"email\":\"director718@gmail.com\",\"email_verified_at\":\"2022-10-03 16:46:24\",\"password\":\"$2y$10$iKlbBtS9Jl89BycoFANji.ygXjy7SjcHvEio72JfZfHm3hrEAXOqy\",\"remember_token\":null,\"created_at\":\"2022-10-03 16:46:24\",\"updated_at\":\"2022-10-06 19:37:55\",\"deleted_at\":\"2022-10-06 19:37:55\",\"team_id\":3}');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_100000_create_password_resets_table',1),(2,'2016_06_01_000001_create_oauth_auth_codes_table',1),(3,'2016_06_01_000002_create_oauth_access_tokens_table',1),(4,'2016_06_01_000003_create_oauth_refresh_tokens_table',1),(5,'2016_06_01_000004_create_oauth_clients_table',1),(6,'2016_06_01_000005_create_oauth_personal_access_clients_table',1),(7,'2020_03_31_000001_create_permissions_table',1),(8,'2020_03_31_000002_create_roles_table',1),(9,'2020_03_31_000003_create_users_table',1),(10,'2020_03_31_000004_create_assets_table',1),(11,'2020_03_31_000005_create_teams_table',1),(12,'2020_03_31_000006_create_stocks_table',1),(13,'2020_03_31_000007_create_transactions_table',1),(14,'2020_03_31_000008_create_permission_role_pivot_table',1),(15,'2020_03_31_000009_create_role_user_pivot_table',1),(16,'2020_03_31_000010_add_relationship_fields_to_users_table',1),(17,'2020_03_31_000011_add_relationship_fields_to_stocks_table',1),(18,'2020_03_31_000012_add_relationship_fields_to_transactions_table',1),(19,'2020_03_31_102945_make_asset_and_team_unique_in_stocks_table',1),(20,'2020_04_01_055439_add_danger_level_field_to_assets_table',1),(21,'2020_11_20_100001_create_log_table',1),(22,'2022_09_16_213712_create_allocations_table',1),(23,'2022_10_16_125819_create_counters_table',2),(25,'2022_10_30_003142_create_passwords_table',3),(26,'2022_10_30_165233_create_desktop_passwords_table',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `client_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_access_tokens`
--

LOCK TABLES `oauth_access_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `client_id` bigint unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_auth_codes`
--

LOCK TABLES `oauth_auth_codes` WRITE;
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_clients`
--

LOCK TABLES `oauth_clients` WRITE;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_personal_access_clients`
--

LOCK TABLES `oauth_personal_access_clients` WRITE;
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_refresh_tokens`
--

LOCK TABLES `oauth_refresh_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permission_role` (
  `role_id` int unsigned NOT NULL,
  `permission_id` int unsigned NOT NULL,
  KEY `role_id_fk_1230843` (`role_id`),
  KEY `permission_id_fk_1230843` (`permission_id`),
  CONSTRAINT `permission_id_fk_1230843` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_id_fk_1230843` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (1,1),(1,2),(1,3),(1,4),(1,5),(1,6),(1,7),(1,8),(1,9),(1,10),(1,11),(1,12),(1,13),(1,14),(1,15),(1,16),(1,17),(1,18),(1,19),(1,20),(1,21),(1,22),(1,23),(1,24),(1,25),(1,26),(1,27),(1,28),(1,29),(1,30),(1,31),(1,32),(1,33),(1,34),(1,35),(1,36),(1,37),(2,18),(2,19),(2,21),(2,22),(2,23),(2,24),(2,25),(2,26),(2,27),(2,28),(2,29),(2,30),(2,31),(2,32),(2,33),(2,34),(2,35),(2,36),(2,37),(2,38);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'user_management_access',NULL,NULL,NULL),(2,'permission_create',NULL,NULL,NULL),(3,'permission_edit',NULL,NULL,NULL),(4,'permission_show',NULL,NULL,NULL),(5,'permission_delete',NULL,NULL,NULL),(6,'permission_access',NULL,NULL,NULL),(7,'role_create',NULL,NULL,NULL),(8,'role_edit',NULL,NULL,NULL),(9,'role_show',NULL,NULL,NULL),(10,'role_delete',NULL,NULL,NULL),(11,'role_access',NULL,NULL,NULL),(12,'user_create',NULL,NULL,NULL),(13,'user_edit',NULL,NULL,NULL),(14,'user_show',NULL,NULL,NULL),(15,'user_delete',NULL,NULL,NULL),(16,'user_access',NULL,NULL,NULL),(17,'asset_create',NULL,NULL,NULL),(18,'asset_edit',NULL,NULL,NULL),(19,'asset_show',NULL,NULL,NULL),(20,'asset_delete',NULL,NULL,NULL),(21,'asset_access',NULL,NULL,NULL),(22,'team_create',NULL,NULL,NULL),(23,'team_edit',NULL,NULL,NULL),(24,'team_show',NULL,NULL,NULL),(25,'team_delete',NULL,NULL,NULL),(26,'team_access',NULL,NULL,NULL),(27,'stock_create',NULL,NULL,NULL),(28,'stock_edit',NULL,NULL,NULL),(29,'stock_show',NULL,NULL,NULL),(30,'stock_delete',NULL,NULL,NULL),(31,'stock_access',NULL,NULL,NULL),(32,'transaction_create',NULL,NULL,NULL),(33,'transaction_edit',NULL,NULL,NULL),(34,'transaction_show',NULL,NULL,NULL),(35,'transaction_delete',NULL,NULL,NULL),(36,'transaction_access',NULL,NULL,NULL),(37,'profile_password_edit',NULL,NULL,NULL),(38,'simple_user','2022-11-05 23:30:59','2022-11-05 23:30:59',NULL);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_user` (
  `user_id` int unsigned NOT NULL,
  `role_id` int unsigned NOT NULL,
  KEY `user_id_fk_1230852` (`user_id`),
  KEY `role_id_fk_1230852` (`role_id`),
  CONSTRAINT `role_id_fk_1230852` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_id_fk_1230852` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (1,1),(2,2),(3,2),(4,2),(5,2),(6,2),(7,2),(8,2),(9,2),(10,2),(11,2),(12,2),(13,2),(14,2),(15,2),(16,2);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin',NULL,NULL,NULL),(2,'User',NULL,NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stocks`
--

DROP TABLE IF EXISTS `stocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stocks` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `current_stock` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `asset_id` int unsigned NOT NULL,
  `team_id` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `stocks_asset_id_team_id_deleted_at_unique` (`asset_id`,`team_id`,`deleted_at`),
  KEY `team_fk_1230970` (`team_id`),
  CONSTRAINT `asset_fk_1230965` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`id`),
  CONSTRAINT `team_fk_1230970` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stocks`
--

LOCK TABLES `stocks` WRITE;
/*!40000 ALTER TABLE `stocks` DISABLE KEYS */;
INSERT INTO `stocks` VALUES (1,0,'2022-10-03 14:46:24','2022-10-03 14:46:24',NULL,1,1),(2,0,'2022-10-03 14:46:24','2022-10-03 14:46:24',NULL,1,2),(3,0,'2022-10-03 14:46:24','2022-10-03 14:46:24',NULL,1,3),(4,0,'2022-10-03 14:46:24','2022-10-03 14:46:24',NULL,1,4),(5,0,'2022-10-03 14:46:24','2022-10-03 14:46:24',NULL,1,5),(6,0,'2022-10-03 14:46:24','2022-10-03 14:46:24',NULL,2,1),(7,0,'2022-10-03 14:46:24','2022-10-03 14:46:24',NULL,2,2),(8,0,'2022-10-03 14:46:24','2022-10-03 14:46:24',NULL,2,3),(9,0,'2022-10-03 14:46:24','2022-10-03 14:46:24',NULL,2,4),(10,0,'2022-10-03 14:46:24','2022-10-03 14:46:24',NULL,2,5),(11,0,'2022-10-03 14:46:24','2022-10-03 14:46:24',NULL,3,1),(12,0,'2022-10-03 14:46:24','2022-10-03 14:46:24',NULL,3,2),(13,0,'2022-10-03 14:46:24','2022-10-03 14:46:24',NULL,3,3),(14,0,'2022-10-03 14:46:24','2022-10-03 14:46:24',NULL,3,4),(15,0,'2022-10-03 14:46:24','2022-10-03 14:46:24',NULL,3,5),(16,0,'2022-10-03 14:46:24','2022-10-03 14:46:24',NULL,4,1),(17,0,'2022-10-03 14:46:24','2022-10-03 14:46:24',NULL,4,2),(18,0,'2022-10-03 14:46:24','2022-10-03 14:46:24',NULL,4,3),(19,0,'2022-10-03 14:46:24','2022-10-03 14:46:24',NULL,4,4),(20,0,'2022-10-03 14:46:24','2022-10-03 14:46:24',NULL,4,5),(21,0,'2022-10-03 14:46:24','2022-10-03 14:46:24',NULL,5,1),(22,0,'2022-10-03 14:46:24','2022-10-03 14:46:24',NULL,5,2),(23,0,'2022-10-03 14:46:24','2022-10-03 14:46:24',NULL,5,3),(24,0,'2022-10-03 14:46:24','2022-10-03 14:46:24',NULL,5,4),(25,0,'2022-10-03 14:46:24','2022-10-03 14:46:24',NULL,5,5);
/*!40000 ALTER TABLE `stocks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teams` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` VALUES (1,'Hospital 402','2022-10-03 14:46:23','2022-10-03 14:46:23',NULL),(2,'Hospital 729','2022-10-03 14:46:23','2022-10-03 14:46:23',NULL),(3,'Hospital 718','2022-10-03 14:46:24','2022-10-03 14:46:24',NULL),(4,'Hospital 133','2022-10-03 14:46:24','2022-10-03 14:46:24',NULL),(5,'Hospital 254','2022-10-03 14:46:24','2022-10-03 14:46:24',NULL);
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transactions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `stock` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `asset_id` int unsigned NOT NULL,
  `team_id` int unsigned DEFAULT NULL,
  `user_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `asset_fk_1230972` (`asset_id`),
  KEY `team_fk_1230977` (`team_id`),
  KEY `user_fk_1233734` (`user_id`),
  CONSTRAINT `asset_fk_1230972` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`id`),
  CONSTRAINT `team_fk_1230977` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`),
  CONSTRAINT `user_fk_1233734` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `team_id` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `team_fk_1230947` (`team_id`),
  CONSTRAINT `team_fk_1230947` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@admin.com',NULL,'$2y$10$lLPZGfz7o6pynq9WK3MvpOOBjTrvYLokD2elUl5CwpHRXg6bHQVey','N8PNFWrG9EKVBKIg3qAODC3bUQ3FjSt3KJTmgCNsuO4Kw4zmNXEE0jE7tCnA','2022-10-03 16:46:23','2022-11-23 20:21:11',NULL,NULL),(2,'Director 402','director402@gmail.com','2022-10-03 16:46:23','$2y$10$etGAO/L4BDYiANU9j6ae6u39GGpw3.Vieem36xRQlW37IG.QOrBHi',NULL,'2022-10-03 14:46:23','2022-10-04 10:53:17','2022-10-04 10:53:17',1),(3,'Doctor 402','doctor402@gmail.com','2022-10-03 16:46:23','$2y$10$nXujIGxeoMZHXp6JauNxn.wKDUwC6VBKMTCPVJjdWFAt6TC.2kX.e',NULL,'2022-10-03 14:46:23','2022-10-04 13:42:02','2022-10-04 13:42:02',1),(4,'Director 729','director729@gmail.com','2022-10-03 16:46:24','$2y$10$M84udfrviVQaXpKjevEhie5TFeWkBs/I2nZB9LxPEaJ9sNhJ6llKi',NULL,'2022-10-03 14:46:24','2022-10-03 14:46:24',NULL,2),(5,'Doctor 729','doctor729@gmail.com','2022-10-03 16:46:24','$2y$10$R52Xj1D0XoZyzJsUNMk61eOHFBRfUF0C10qgSUOb1qcj8lKwpypyW',NULL,'2022-10-03 14:46:24','2022-10-03 14:46:24',NULL,2),(6,'Director 718','director718@gmail.com','2022-10-03 16:46:24','$2y$10$iKlbBtS9Jl89BycoFANji.ygXjy7SjcHvEio72JfZfHm3hrEAXOqy',NULL,'2022-10-03 14:46:24','2022-10-06 17:37:55','2022-10-06 17:37:55',3),(7,'Doctor 718','doctor718@gmail.com','2022-10-03 16:46:24','$2y$10$utjt38EzozK4BJifAmwreO2YY039nhLOdtpeg.Mk9efKjuVoEl.j2',NULL,'2022-10-03 14:46:24','2022-10-03 14:46:24',NULL,3),(8,'Director 133','director133@gmail.com','2022-10-03 16:46:24','$2y$10$G3foVsMRuCYM.n8hT5eq5uAYqxe/zLD7j2rctUtd8hVMib1tmUDEy',NULL,'2022-10-03 14:46:24','2022-10-04 10:45:25','2022-10-04 10:45:25',4),(9,'Doctor 133','doctor133@gmail.com','2022-10-03 16:46:24','$2y$10$vy/uTS2Y3vHpIMYVZc0NRuJYT7ElS6WCsN.UrLyzRwm5AIJ3DIXnu',NULL,'2022-10-03 14:46:24','2022-10-04 10:39:50','2022-10-04 10:39:50',4),(10,'Director 254','director254@gmail.com','2022-10-03 16:46:24','$2y$10$BHQSKqDPYsWNQLCI1q0miO.WI5a497a/fzxwuaEovw1a9/kCe6po6',NULL,'2022-10-03 14:46:24','2022-10-03 14:46:24',NULL,5),(11,'Doctor 252','doctor252@gmail.com','2022-10-03 16:46:24','$2y$10$R.caEZjuLIawmyzKUZ4fM.7R2Ku4jng9nguBahwKPyi2j0yTorOVi',NULL,'2022-10-03 14:46:24','2022-10-06 16:16:20',NULL,5),(12,'test_IT','test@gmail.com',NULL,'$2y$10$t9RVV0OhVk/DcnvyjhrdNOUf2Hsc7qt8jlvxmOqzmoy0wIeyvGap.',NULL,'2022-10-03 14:47:02','2022-10-03 14:47:02',NULL,NULL),(13,'TESTX','test@test.com',NULL,'$2y$10$AI/RDTyPyh0gaSKXX8KeiO1M3ms5Yw9yLPFIBWkj4XLlaEg9NQI9m',NULL,'2022-10-03 19:55:50','2022-10-03 20:00:08','2022-10-03 20:00:08',NULL),(14,'TESTX','test@testt.com',NULL,'$2y$10$SJLb.aD0Mk30ThEcStJsw.MSilB2SxDpbUf5Dc/b4SYNEWoEr8Z/m',NULL,'2022-10-04 13:39:23','2022-10-04 13:41:17','2022-10-04 13:41:17',NULL),(15,'test_IT2','test2@gmail.com',NULL,'$2y$10$BEKDwzn18/ia3/PNAR0DPuXWdo3px2JDmjbbaR5UZwuILQBD3PMye',NULL,'2022-10-06 16:17:01','2022-10-06 16:17:31','2022-10-06 16:17:31',NULL),(16,'jean paul','jean.paul@gmail.com',NULL,'$2y$10$.B3aoAGIwjncrpSVX1U0xOCKFPMVBbddo.05.iPlUnhwvurPNpayO',NULL,'2022-11-23 20:12:07','2022-11-23 20:12:07',NULL,NULL);
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

-- Dump completed on 2023-01-22 21:56:45
