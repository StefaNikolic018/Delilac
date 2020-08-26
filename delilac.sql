-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Aug 26, 2020 at 10:47 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `delilac`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `body`, `created_at`, `img`) VALUES
(6, 4, 'uzak krug', '2020-08-20 17:07:00', 'circle-cropped(1).png'),
(7, 4, 'fontelic', '2020-08-20 17:18:25', '68671-android-white-iphone-telephone-free-transparent-image-hq.png');

-- --------------------------------------------------------

--
-- Table structure for table `token_auth`
--

DROP TABLE IF EXISTS `token_auth`;
CREATE TABLE IF NOT EXISTS `token_auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `selector_hash` varchar(255) NOT NULL,
  `is_expired` int(11) DEFAULT '0',
  `expiry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `token_auth`
--

INSERT INTO `token_auth` (`id`, `username`, `password_hash`, `selector_hash`, `is_expired`) VALUES
(1, 'Stefan', '$2y$10$HlqvV2ENC2Nxcigi.nN19eaUMyvOl3xI9JsTdyvWyQHP91z8GkJRO', '$2y$10$sDHGscMbceJXR9kObfQEXuLQw2.f5R.f0FsPSav/JFMOUXRIBueaW', 1),
(2, 'Stefan', '$2y$10$j75.QtNmBB8fpDSBkNiF.eho9tUL6v3v1.iz3NRhqZ58vdrCQtMEK', '$2y$10$4fC6stj9v7MeOP6j.t5kqOfZOvzkIUPn/XToyn7gVI/PZF0CdEyty', 1),
(3, 'Stefan', '$2y$10$Lh967cZOYAxqSyIMt6PQCuJ.R6V6T4U45tf40OTcJ.axqDEvCa.bq', '$2y$10$UNY0hvUgKhksdlu.lhM95.eqC7vIEddMPtk2OUat5/iWG87QeE1Mu', 1),
(4, 'Stefan', '$2y$10$3PJuE4NS4iP1og7Uu2N0EufYyJ/04t0ayMB.Hlz3JafNhZRcod//C', '$2y$10$naEzliP4bn4J0opr35GVpeR4ggr3lTZmJl9KpVza.YtZjq7eyv4z2', 1),
(5, 'Stefan', '$2y$10$4ej.3ihBp4Vz2kRPedXiJuP4qnvzsHLu6uRM9rURfSLERbcIhYDJC', '$2y$10$R9kT1uOvJwA8gjkgiyGao.c2rpCeuVvY5X1CBKpXOZkRJFnEPeJlu', 1),
(6, 'Stefan', '$2y$10$DQHDq2uCOhmSTjgWjwk72eZDaO6rDeYFV8mSMPqe5eS71n80AIss.', '$2y$10$YF40X4IHQtZ/dQ7j3NC.s.wlfmvsSKTbIU3Lx5VWreX2ySK14kHCO', 1),
(7, 'Stefan', '$2y$10$QLlBTt/h.zIUMtIySbK.UeLlScR3JIc74wQgcYsUXtTx/okSzCVqi', '$2y$10$3D5JoVWGZ35uRqY0yMgdtOw4GaKQ7xfuxsLKxs5qJZ6G7KbgRQGCG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(4, 'Stefan', 'stefan@gmail.com', '$2y$10$6vhWEZc3TxF9TDljmb0KCeotMj1Xqbcp.Q8Ubr4hJL3aZKuG24.zC', '2020-07-14 04:16:15');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
