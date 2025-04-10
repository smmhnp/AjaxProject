-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Mar 15, 2025 at 01:04 AM
-- Server version: 9.1.0
-- PHP Version: 8.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ajax`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int NOT NULL,
  `img` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `age`, `img`) VALUES
(48, 'علی', 'علوی', 'ali@gmail.com', 22, '1558914203.jpg'),
(67, 'احمد', 'احمدی', 'ahmad@gmail.com', 22, '1991406542.png'),
(68, 'حسن', 'حسنی', 'hasan@gmail.com', 12, '520465201.jpg'),
(77, 'مهدی', 'مهدوی', 'mahdi@gmail.com', 23, '753493509.png'),
(78, 'آرزو ', 'آوایی', 'arezoo@gmail.com', 10, '693797529.png'),
(79, 'امیر', 'اصغری', 'amir@gmail.com', 30, '1990147640.png'),
(80, 'آرمان', 'اقبالی', 'arman@gmail.com', 23, '1469755070.jpg'),
(81, 'ارمین', 'اسعدی', 'armin@gmail.com', 24, '1266145789.png'),
(82, 'پناه', 'پناهی', 'panah@gmail.com', 34, '2028194954.png'),
(83, 'جعفر', 'جوادی', 'jafar@gmail.com', 26, '810142816.png'),
(84, 'حمید', 'حمیدی', 'hamid@gmail.com', 19, '333049781.png'),
(85, 'ثریا', 'ثنایی', 'soraya@yahoo.com', 19, '303321453.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
