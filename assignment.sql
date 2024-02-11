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


-- Dumping database structure for material_assignment
CREATE DATABASE IF NOT EXISTS `material_assignment` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `material_assignment`;

-- Dumping structure for table material_assignment.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table material_assignment.categories: ~1 rows (approximately)
INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Nisha1', '2024-02-09 13:55:17', '2024-02-10 14:57:00'),
	(2, 'Finish Goods', '2024-02-10 01:59:30', '2024-02-10 01:59:30'),
	(3, 'dvdf', '2024-02-10 15:47:51', '2024-02-10 15:47:51');

-- Dumping structure for table material_assignment.inward_outward_masters
CREATE TABLE IF NOT EXISTS `inward_outward_masters` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned NOT NULL,
  `material_id` bigint unsigned NOT NULL,
  `quantity` int NOT NULL,
  `entry_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `inward_outward_master_category_id_foreign` (`category_id`),
  KEY `inward_outward_master_material_id_foreign` (`material_id`),
  CONSTRAINT `inward_outward_master_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `inward_outward_master_material_id_foreign` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table material_assignment.inward_outward_masters: ~4 rows (approximately)
INSERT INTO `inward_outward_masters` (`id`, `category_id`, `material_id`, `quantity`, `entry_date`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 1, '2024-02-11', '2024-02-11 09:05:21', '2024-02-11 09:05:21'),
	(2, 2, 1, 1, '2024-02-11', '2024-02-11 09:27:29', '2024-02-11 09:27:29'),
	(3, 2, 1, 1, '2024-02-11', '2024-02-11 09:29:56', '2024-02-11 09:29:56'),
	(4, 2, 1, 1, '2024-02-11', '2024-02-11 09:30:24', '2024-02-11 09:30:24'),
	(6, 1, 1, -1, '2024-02-11', '2024-02-11 13:14:21', '2024-02-11 13:14:21');

-- Dumping structure for table material_assignment.materials
CREATE TABLE IF NOT EXISTS `materials` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `opening_balance` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `materials_category_id_foreign` (`category_id`),
  CONSTRAINT `materials_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table material_assignment.materials: ~0 rows (approximately)
INSERT INTO `materials` (`id`, `name`, `category_id`, `opening_balance`, `created_at`, `updated_at`) VALUES
	(1, 'abcd1', 1, 2000.00, '2024-02-11 06:49:49', '2024-02-11 07:11:43');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
