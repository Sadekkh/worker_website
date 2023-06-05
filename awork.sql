-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for farming
CREATE DATABASE IF NOT EXISTS `farming` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `farming`;

-- Dumping structure for table farming.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table farming.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;

-- Dumping structure for table farming.job_requests
CREATE TABLE IF NOT EXISTS `job_requests` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `job_id` int NOT NULL,
  `emp_id` int DEFAULT NULL,
  `worker_id` int NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `payement_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget` int NOT NULL,
  `accept` tinyint(1) NOT NULL DEFAULT '0',
  `review` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `job_request_job_id_index` (`job_id`),
  KEY `job_request_worker_id_index` (`worker_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table farming.job_requests: ~1 rows (approximately)
DELETE FROM `job_requests`;
INSERT INTO `job_requests` (`id`, `job_id`, `emp_id`, `worker_id`, `date_start`, `date_end`, `time_start`, `time_end`, `payement_type`, `budget`, `accept`, `review`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 1, '2023-05-24', '2023-05-17', '00:27:00', '00:27:00', 'باليوم', 10, 0, 0, '2023-05-16 22:27:39', '2023-05-16 22:27:39');

-- Dumping structure for table farming.job_reviews
CREATE TABLE IF NOT EXISTS `job_reviews` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `job_id` int NOT NULL,
  `employer_id` int NOT NULL,
  `worker_id` int NOT NULL,
  `review` int NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jobreview_job_id_index` (`job_id`),
  KEY `jobreview_worker_id_index` (`worker_id`),
  KEY `jobreview_empolyer_id_index` (`employer_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table farming.job_reviews: ~0 rows (approximately)
DELETE FROM `job_reviews`;

-- Dumping structure for table farming.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table farming.migrations: ~10 rows (approximately)
DELETE FROM `migrations`;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2014_10_12_100000_create_password_resets_table', 1),
	(4, '2019_08_19_000000_create_failed_jobs_table', 1),
	(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(6, '2023_04_14_215802_job_post', 1),
	(7, '2023_04_14_223725_job_request', 1),
	(8, '2023_04_14_223912_job_review', 1),
	(10, '2023_04_14_230213_transporter', 2),
	(11, '2016_01_04_173148_create_admin_tables', 3);

-- Dumping structure for table farming.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table farming.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;

-- Dumping structure for table farming.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table farming.password_reset_tokens: ~0 rows (approximately)
DELETE FROM `password_reset_tokens`;

-- Dumping structure for table farming.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table farming.personal_access_tokens: ~0 rows (approximately)
DELETE FROM `personal_access_tokens`;

-- Dumping structure for table farming.post_jobs
CREATE TABLE IF NOT EXISTS `post_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `payement_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget` int NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tools` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `worker_number` int DEFAULT NULL,
  `worker_left` int(10) unsigned zerofill NOT NULL,
  `place` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `review` int DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `job_post_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table farming.post_jobs: ~1 rows (approximately)
DELETE FROM `post_jobs`;
INSERT INTO `post_jobs` (`id`, `user_id`, `title`, `description`, `date_start`, `date_end`, `time_start`, `time_end`, `payement_type`, `budget`, `type`, `tools`, `worker_number`, `worker_left`, `place`, `state`, `created_at`, `updated_at`, `review`) VALUES
	(1, 1, '20', 'u5PTw0ZNJF', '2023-04-20', '2023-04-20', '03:34:00', '03:34:00', 'بالكمية', 151022, 'حفر', 'بالة', 20, 0000000020, '20', 0, '2023-05-16 21:36:19', '2023-05-16 21:36:19', 0);

-- Dumping structure for table farming.transports
CREATE TABLE IF NOT EXISTS `transports` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `job_id` int NOT NULL,
  `worker_id` int NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `payement_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget` int NOT NULL,
  `accept` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `emp_id` int DEFAULT NULL,
  `review` int DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `transporter_job_id_index` (`job_id`),
  KEY `transporter_worker_id_index` (`worker_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table farming.transports: ~0 rows (approximately)
DELETE FROM `transports`;

-- Dumping structure for table farming.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `cin` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mnumber` int NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insurance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insur_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transp_mat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transp_place` int DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isadmin` int DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_cin_unique` (`cin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table farming.users: ~1 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `cin`, `name`, `mnumber`, `location`, `type`, `insurance`, `insur_type`, `transp_mat`, `transp_place`, `password`, `remember_token`, `created_at`, `updated_at`, `isadmin`) VALUES
	(1, 1234567899, 'aa', 1234567899, 'dd', '2', 'هل تريد التسجيل في منظومة التأمين', 'إختر الصندوق المناسب', NULL, NULL, '$2y$10$XtcS.2AkC1ajramBWDnh4uR/JfyraXLNE7fhmNAzFsvr7bBvGiiJy', NULL, '2023-05-16 18:18:22', '2023-05-16 18:18:22', 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
