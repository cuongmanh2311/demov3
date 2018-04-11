-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 05, 2018 at 04:01 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `alias`, `parent_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Mens', 'mens', 0, NULL, '2018-03-04 05:16:11', '2018-03-04 05:16:11'),
(9, 'shirt', 'shirt', 1, '!!!!', '2018-03-04 11:34:14', '2018-03-04 11:34:14'),
(3, 'Equipment', 'equipment', 0, 'Modern', '2018-03-04 05:19:51', '2018-03-04 05:19:51'),
(7, 'Demi', 'demi', 1, NULL, '2018-03-04 11:30:04', '2018-03-04 11:30:04'),
(8, 'Cap', 'cap', 1, NULL, '2018-03-04 11:30:12', '2018-03-04 11:30:12'),
(6, 'Skirt', 'skirt', 0, 'nice', '2018-03-04 10:42:37', '2018-03-04 10:47:34'),
(10, 'Henru', 'henru', 9, '123', '2018-03-04 12:03:35', '2018-03-04 12:03:35'),
(11, '12312', '12312', 9, 'asdqwee', '2018-03-04 12:10:53', '2018-03-04 12:10:53'),
(12, 'qweq', 'qweq', 3, '123123', '2018-03-04 12:11:10', '2018-03-04 12:11:10'),
(13, '123', '123', 3, 'qweqwe', '2018-03-04 12:14:16', '2018-03-04 12:14:16'),
(14, 'aaaa', 'aaaa', 1, '123123', '2018-03-04 12:28:33', '2018-03-04 12:28:33');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2018_03_03_132007_create_permission_table', 1),
(9, '2018_03_04_025942_create_categories_table', 1),
(11, '2018_03_04_124650_create_products_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

DROP TABLE IF EXISTS `permission`;
CREATE TABLE IF NOT EXISTS `permission` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Customer', NULL, NULL),
(2, 'User', NULL, NULL),
(3, 'Admin', NULL, NULL),
(4, 'SuperAdmin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `intro` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `cate_id`, `price`, `intro`, `description`, `image`, `view`, `created_at`, `updated_at`) VALUES
(1, 'Nike', 10, 50, 'expensive', '1111', 'bg11520222120.jpg', 0, '2018-03-04 22:22:38', '2018-03-05 03:55:20'),
(4, 'kkk', 10, 100, 'nice!!!', '123a', 'cadong1520222076.jpg', 0, '2018-03-05 11:54:36', '2018-03-05 03:54:36'),
(5, 'Hector', 10, 30, 'Good!!', 'Good!!', 'caingot21520243276.jpg', 0, '2018-03-05 17:47:56', '2018-03-05 09:47:56'),
(6, 'Nike Shorty', 11, 60, 'high Quality', '111', 'cabasa1520243308.jpg', 0, '2018-03-05 17:48:28', '2018-03-05 09:48:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Harrik', 4, 'a@gmail.com', '$2y$10$fGDtsXxDYBMwaAmMmTtBSu3Oqf6mavCf2C45ansG16JLwa.6mhFmC', 'Ggj2RjSkGHcf1dbuXmkletLvyK8GeuxqWT4gpYui7FeaMztWKDqUI0l1vB56', '2018-03-04 13:13:54', '2018-03-04 13:13:54'),
(4, 'Harry', 3, 'b@gmail.com', '$2y$10$cgD1Vl1eXQ22ejshGpp4ruw/Gjrrqs.zJfEJjLwT2egBnQhlGv5Ke', 'gEPbWAPTNu6BoGX8p9vJ7oiGoMWSwh0ieJhe0KxixSe0lEd30FinqeLbhFPT', '2018-03-04 13:15:30', '2018-03-04 13:15:30'),
(5, 'Johang', 1, 'j@gmail.com', '$2y$10$vwtoMWg80G4p3VQF89WtCugOGFdfRCTM694v5vAM/TmJWeJuAOwbC', 'DQgcT3UzY3FFmA1I72W8S4CrTTekDosnHuzxWuxskQM9fDXwl5CyBpehI22b', '2018-03-04 13:15:49', '2018-03-04 13:15:49');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
