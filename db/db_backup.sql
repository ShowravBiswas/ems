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

-- Dumping structure for table db_ems.events
CREATE TABLE IF NOT EXISTS `events` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_datetime` datetime NOT NULL,
  `max_capacity` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `venue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `events_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ems.events: ~8 rows (approximately)
DELETE FROM `events`;
INSERT INTO `events` (`id`, `name`, `description`, `event_datetime`, `max_capacity`, `created_by`, `created_at`, `venue`) VALUES
	(1, 'Tech Fest 2025', 'Here is the description...', '2025-01-31 17:00:00', 5, 1, '2025-01-28 08:55:46', 'K.B Conf sdfds'),
	(2, 'Java Bootcamp 2025', 'ASD', '2025-02-18 10:00:00', 20, 1, '2025-01-28 09:06:37', 'M A AZIZ '),
	(4, 'ASDASF', 'asf', '2025-01-17 15:11:00', 20, 1, '2025-01-28 09:10:51', 'ffas'),
	(5, 'Haley Buck', 'Necessitatibus sint', '2005-03-02 19:49:00', 4, 1, '2025-01-28 09:56:06', 'Laborum quia eligend'),
	(7, 'Stone Crosby', 'Possimus dignissimo', '2025-02-19 04:30:00', 49, 1, '2025-01-28 10:09:55', 'Fuga Ut distinctio'),
	(8, 'Adena Sanders', 'Est enim esse laud', '2025-04-17 16:10:00', 89, 1, '2025-01-28 10:10:15', 'Consequatur fugiat'),
	(9, 'May Spencer', 'Esse repudiandae tem', '2025-02-13 17:47:00', 47, 1, '2025-01-28 10:10:25', 'Voluptatem in neque'),
	(10, 'Sybil Henderson', 'Eos facilis quia ve', '2025-01-28 10:29:00', 88, 1, '2025-01-28 10:10:43', 'Nisi enim ex illum ');

-- Dumping structure for table db_ems.event_attendees
CREATE TABLE IF NOT EXISTS `event_attendees` (
  `id` int NOT NULL AUTO_INCREMENT,
  `event_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `registered_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `event_id` (`event_id`,`email`),
  UNIQUE KEY `event_id_2` (`event_id`,`phone_no`),
  CONSTRAINT `event_attendees_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ems.event_attendees: ~6 rows (approximately)
DELETE FROM `event_attendees`;
INSERT INTO `event_attendees` (`id`, `event_id`, `name`, `email`, `phone_no`, `address`, `registered_at`) VALUES
	(1, 1, 'Meghan Frank', 'mezamajyfu@mailinator.com', '01632025589', 'Et lorem id dolorem', '2025-01-28 11:12:29'),
	(4, 1, 'Meghan Frank', 'mezamajyfu@mailinsator.com', '01632025580', 'Et lorem id dolorem', '2025-01-28 11:13:17'),
	(5, 9, 'Meghan Frank', 'mezamajyfu@mailinsator.com', '01632025580', 'Et lorem id dolorem', '2025-01-28 11:14:31'),
	(8, 1, 'Meghan Frank', 'mezaasdmajyfu@mailinsator.com', '01633025580', 'Et lorem id dolorem', '2025-01-28 11:15:38'),
	(9, 1, 'Meghan Frank', 'mezaasdmsajyfu@mailinsator.com', '01631125580', 'Et lorem id dolorem', '2025-01-28 11:15:51'),
	(10, 1, 'Meghan Frank', 'mezaasdmssajyfu@mailinsator.com', '01631445580', 'Et lorem id dolorem', '2025-01-28 11:16:00');

-- Dumping structure for table db_ems.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_approved` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ems.users: ~5 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone_no`, `is_approved`, `created_at`) VALUES
	(1, 'Showrav Biswas', 'showrav.biswas1@gmail.com', '$2y$10$8VSgx3KUNCGTARihIMUS9e2VN3bvHatGcrn2N26g8UllC5Jn2e5Gm', '01635183372', 1, '2025-01-27 04:28:01'),
	(5, 'Showrav Biswas', 'showrav.bisssssswas1@gmail.com', '$2y$10$QZiPn3OavNDJlFZrozI.PutQzK2AcQIDaRuih9tPdD3./kbM7mA86', '01635183000', 0, '2025-01-28 06:00:42'),
	(6, 'Showrav Biswas', 'showrav.bissswas1@gmail.com', '$2y$10$QZiPn3OavNDJlFZrozI.PutQzK2AcQIDaRuih9tPdD3./kbM7mA86', '01632520032', 0, '2025-01-28 06:00:42'),
	(7, 'Showrav Biswas', 'showrav.bisas1@gmail.com', '$2y$10$QZiPn3OavNDJlFZrozI.PutQzK2AcQIDaRuih9tPdD3./kbM7mA86', '01632500032', 0, '2025-01-28 06:00:42'),
	(8, 'Showrav Biswas', 'showrav.bs1@gmail.com', '$2y$10$QZiPn3OavNDJlFZrozI.PutQzK2AcQIDaRuih9tPdD3./kbM7mA86', '01600000032', 0, '2025-01-28 06:00:42'),
	(9, 'Showrav Biswas', 'showrav.bsd1@gmail.com', '$2y$10$QZiPn3OavNDJlFZrozI.PutQzK2AcQIDaRuih9tPdD3./kbM7mA86', '01677700032', 0, '2025-01-28 06:00:42');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
