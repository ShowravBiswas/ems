-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_ems
CREATE DATABASE IF NOT EXISTS `db_ems` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `db_ems`;

-- Dumping structure for table db_ems.events
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_datetime` datetime NOT NULL,
  `max_capacity` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `venue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `events_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ems.events: ~8 rows (approximately)
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` (`id`, `name`, `description`, `event_datetime`, `max_capacity`, `created_by`, `created_at`, `venue`) VALUES
	(1, 'Mastering Python Bootcamp', 'A hands-on coding workshop for beginners and professionals.', '2025-04-28 17:00:00', 20, 1, '2025-01-28 14:55:46', 'Dhaka, Bangladesh.'),
	(2, 'Leadership & Networking', 'An exclusive event to connect with top professionals and business leaders.', '2025-04-18 10:00:00', 20, 1, '2025-01-28 15:06:37', 'Chattogram, Bangladesh.'),
	(4, 'Global Entrepreneurs Meetup', 'A networking event for entrepreneurs to share ideas and grow their businesses.', '2025-04-09 15:00:00', 20, 1, '2025-01-28 15:10:51', 'Dhaka, Bangladesh.'),
	(5, 'Tech Innovators Summit 2025', 'A gathering of industry leaders discussing the latest advancements in technology.', '2025-04-02 10:00:00', 4, 1, '2025-01-28 15:56:06', 'Dhaka, Bangladesh.'),
	(7, 'AI & Data Science Conference', 'A deep dive into artificial intelligence and data analytics trends.', '2025-04-10 11:00:00', 50, 1, '2025-01-28 16:09:55', 'Dhaka, Bangladesh.'),
	(8, 'Startup Growth Strategies', 'Practical insights for scaling startups successfully.', '2025-04-17 15:00:00', 90, 1, '2025-01-28 16:10:15', 'Chattogram, Bangladesh.'),
	(9, 'Digital Marketing 101', 'Learn the basics of digital marketing and online advertising.', '2025-05-13 17:00:00', 50, 1, '2025-01-28 16:10:25', 'Dhaka, Bangladesh.'),
	(10, 'Summer Beats Music Festival', 'A lively music festival featuring top artists and DJs', '2025-04-28 10:00:00', 100, 1, '2025-01-28 16:10:43', 'Chattogram, Bangladesh.');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;

-- Dumping structure for table db_ems.event_attendees
CREATE TABLE IF NOT EXISTS `event_attendees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `registered_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `event_id` (`event_id`,`email`),
  UNIQUE KEY `event_id_2` (`event_id`,`phone_no`),
  CONSTRAINT `event_attendees_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ems.event_attendees: ~7 rows (approximately)
/*!40000 ALTER TABLE `event_attendees` DISABLE KEYS */;
INSERT INTO `event_attendees` (`id`, `event_id`, `name`, `email`, `phone_no`, `address`, `registered_at`) VALUES
	(1, 1, 'Meghan Frank', 'mezamajyfu@mailinator.com', '01632025589', 'Et lorem id dolorem', '2025-01-28 17:12:29'),
	(4, 1, 'Meghan Frank', 'mezamajyfu@mailinsator.com', '01632025580', 'Et lorem id dolorem', '2025-01-28 17:13:17'),
	(5, 9, 'Meghan Frank', 'mezamajyfu@mailinsator.com', '01632025580', 'Et lorem id dolorem', '2025-01-28 17:14:31'),
	(8, 1, 'Meghan Frank', 'mezaasdmajyfu@mailinsator.com', '01633025580', 'Et lorem id dolorem', '2025-01-28 17:15:38'),
	(9, 1, 'Meghan Frank', 'mezaasdmsajyfu@mailinsator.com', '01631125580', 'Et lorem id dolorem', '2025-01-28 17:15:51'),
	(10, 1, 'Meghan Frank', 'mezaasdmssajyfu@mailinsator.com', '01631445580', 'Et lorem id dolorem', '2025-01-28 17:16:00'),
	(11, 9, 'sdf', 'adsssssssin@gmail.com', '01522000258', 'asf', '2025-01-31 12:30:49');
/*!40000 ALTER TABLE `event_attendees` ENABLE KEYS */;

-- Dumping structure for table db_ems.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_approved` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ems.users: ~7 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone_no`, `is_approved`, `created_at`) VALUES
	(1, 'Showrav Biswas', 'showrav.biswas1@gmail.com', '$2y$10$8VSgx3KUNCGTARihIMUS9e2VN3bvHatGcrn2N26g8UllC5Jn2e5Gm', '01635183372', 1, '2025-01-27 10:28:01'),
	(5, 'Showrav Biswas', 'showrav.bisssssswas1@gmail.com', '$2y$10$QZiPn3OavNDJlFZrozI.PutQzK2AcQIDaRuih9tPdD3./kbM7mA86', '01635183000', 0, '2025-01-28 12:00:42'),
	(6, 'Showrav Biswas', 'showrav.bissswas1@gmail.com', '$2y$10$QZiPn3OavNDJlFZrozI.PutQzK2AcQIDaRuih9tPdD3./kbM7mA86', '01632520032', 0, '2025-01-28 12:00:42'),
	(7, 'Showrav Biswas', 'showrav.bisas1@gmail.com', '$2y$10$QZiPn3OavNDJlFZrozI.PutQzK2AcQIDaRuih9tPdD3./kbM7mA86', '01632500032', 0, '2025-01-28 12:00:42'),
	(8, 'Showrav Biswas', 'showrav.bs1@gmail.com', '$2y$10$QZiPn3OavNDJlFZrozI.PutQzK2AcQIDaRuih9tPdD3./kbM7mA86', '01600000032', 0, '2025-01-28 12:00:42'),
	(9, 'Showrav Biswas', 'showrav.bsd1@gmail.com', '$2y$10$QZiPn3OavNDJlFZrozI.PutQzK2AcQIDaRuih9tPdD3./kbM7mA86', '01677700032', 0, '2025-01-28 12:00:42'),
	(10, 'Admin', 'admin@example.com', '$2y$10$zXfydNr0pOpyONrsWfaI5ee.8lZ6yfsKKvAiXt/K4YBOnxjQNJoRO', '01600000000', 1, '2025-01-31 12:29:39');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
