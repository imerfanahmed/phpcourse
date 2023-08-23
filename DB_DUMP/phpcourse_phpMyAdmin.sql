-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 23, 2023 at 06:09 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpcourse`
--

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `amount` int DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `amount`, `date`) VALUES
(9, 46, 1000, '2023-08-18'),
(10, 46, 500, '2023-08-19'),
(11, 46, 900, '2023-08-20'),
(12, 48, 1000, '2023-08-18'),
(13, 48, 500, '2023-08-19'),
(14, 48, 2000, '2023-08-26'),
(15, 46, 50, '2023-08-19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `image` varchar(1024) DEFAULT NULL,
  `password` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `isAdmin` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `phone`, `address`, `image`, `password`, `isAdmin`) VALUES
(46, 'Ovicorsho', 'Erfan Ahmed Siam', 'erfan.siam98@gmail.com', '01786922512', '40/1/A , West-Matikata, Dhaka Cantonment', '64df6f30ecfd8.jpg', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0),
(47, 'admin', 'Admin User', 'admin@admin.com', '01786922512', '40/1/A , West-Matikata, Dhaka Cantonment', '64df6f992fc79.jpg', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 1),
(48, 'farhant', 'farhan Tanvir', 'farhan@email.com', '01786922512', 'Faridpur Engineering College, Faridpur Sadar', '64df753d9a0f7.png', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0),
(51, 'xiluf', 'Abbot Gardner', 'jiwac@mailinator.com', '34', 'Autem excepturi mole', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0),
(52, 'qavofawu', 'Julian Huff', 'myjuc@mailinator.com', '78', 'Sit in provident t', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0),
(53, 'sixedovu', 'Leilani Carr', 'qurehabu@mailinator.com', '40', 'Quisquam non a ipsum', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0),
(54, 'qufaqiz', 'Ethan Solomon', 'jofokuhe@mailinator.com', '33', 'Enim repellendus La', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0),
(55, 'fygyhogum', 'Declan Harrington', 'zeseciwih@mailinator.com', '22', 'Quia molestiae nemo ', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0),
(56, 'zukac', 'Brody Petty', 'didor@mailinator.com', '20', 'Ipsum magni repelle', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0),
(57, 'walyturi', 'Iola Valenzuela', 'byhu@mailinator.com', '82', 'Fugiat alias cillum ', '64e6476aa72c6.jpg', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
