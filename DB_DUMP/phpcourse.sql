-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table phpcourse.payments
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `amount` int DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15;

-- Dumping data for table phpcourse.payments: ~6 rows (approximately)
DELETE FROM `payments`;
INSERT INTO `payments` (`id`, `user_id`, `amount`, `date`) VALUES
	(9, 46, 1000, '2023-08-18'),
	(10, 46, 500, '2023-08-19'),
	(11, 46, 900, '2023-08-20'),
	(12, 48, 1000, '2023-08-18'),
	(13, 48, 500, '2023-08-19'),
	(14, 48, 2000, '2023-08-26');

-- Dumping structure for table phpcourse.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `image` varchar(1024) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `isAdmin` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57;

-- Dumping data for table phpcourse.users: ~10 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `username`, `name`, `email`, `phone`, `address`, `image`, `password`, `isAdmin`) VALUES
	(46, 'Ovicorsho', 'Erfan Ahmed Siam', 'erfan.siam98@gmail.com', '01786922512', '40/1/A , West-Matikata, Dhaka Cantonment', '64df6f30ecfd8.jpg', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0),
	(47, 'admin', 'Admin User', 'admin@admin.com', '01786922512', '40/1/A , West-Matikata, Dhaka Cantonment', '64df6f992fc79.jpg', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 1),
	(48, 'farhant', 'farhan Tanvir', 'farhan@email.com', '01786922512', 'Faridpur Engineering College, Faridpur Sadar', '64df753d9a0f7.png', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0),
	(49, 'paqadoduwu', 'Ovi', 'fimixu@mailinator.com', '96', 'Qui', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 0),
	(51, 'xiluf', 'Abbot Gardner', 'jiwac@mailinator.com', '34', 'Autem excepturi mole', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0),
	(52, 'qavofawu', 'Julian Huff', 'myjuc@mailinator.com', '78', 'Sit in provident t', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0),
	(53, 'sixedovu', 'Leilani Carr', 'qurehabu@mailinator.com', '40', 'Quisquam non a ipsum', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0),
	(54, 'qufaqiz', 'Ethan Solomon', 'jofokuhe@mailinator.com', '33', 'Enim repellendus La', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0),
	(55, 'fygyhogum', 'Declan Harrington', 'zeseciwih@mailinator.com', '22', 'Quia molestiae nemo ', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0),
	(56, 'zukac', 'Brody Petty', 'didor@mailinator.com', '20', 'Ipsum magni repelle', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
