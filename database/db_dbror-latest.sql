-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2021 at 04:05 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dbror`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_amenities`
--

CREATE TABLE `tbl_amenities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `details` text,
  `capacity` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `amount_per_hour` double DEFAULT NULL,
  `amount_per_night` double DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `x` varchar(10) DEFAULT NULL,
  `y` varchar(10) DEFAULT NULL,
  `transform` varchar(100) DEFAULT NULL,
  `txt_transform` text NOT NULL,
  `status` enum('av','na') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_amenities`
--

INSERT INTO `tbl_amenities` (`id`, `category_id`, `name`, `details`, `capacity`, `quantity`, `amount_per_hour`, `amount_per_night`, `photo`, `x`, `y`, `transform`, `txt_transform`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Chairs', 'N/A', 1, 300, 100, 100, 'default.jpg', NULL, NULL, '', '', 'av', '2021-07-15 13:01:46', '2021-07-15 21:01:46'),
(2, 6, 'Tables', 'N/A', 5, 50, 200, 200, 'default.jpg', NULL, NULL, '', '', 'av', '2021-07-15 13:04:58', '2021-07-15 21:04:58'),
(3, 3, '1', 'Cottage 1', 1, 1, 1500, 1500, 'default.jpg', '516.5', '101.5', 'matrix(0.2901 0 0 0.2901 1255.2979 361.4561)', 'matrix(1 0 0 1 1217.7676 362.457)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(4, 3, '2', 'Cottage 2', 1, 1, 1500, 1500, 'default.jpg', '564.5', '101.5', 'matrix(0.2901 0 0 0.2901 1342.4688 362.457)', 'matrix(1 0 0 1 1298.3828 360.4565)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(5, 3, '3', 'Cottage 3', 1, 1, 1500, 1500, 'default.jpg', '613.5', '101.5', 'matrix(0.2901 0 0 0.2901 1429.2676 362.457)', 'matrix(1 0 0 1 1375.7383 360.4565)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(6, 3, '4', 'Cottage 4', 1, 1, 1500, 1500, 'default.jpg', '662.5', '101.5', 'matrix(0.2901 0 0 0.2901 1512.2822 361.4561)', 'matrix(1 0 0 1 1464.6895 360.4565)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(7, 3, '5', 'Cottage 5', 1, 1, 1500, 1500, 'default.jpg', '710.5', '101.5', 'matrix(0.2901 0 0 0.2901 1597.082 361.4561)', 'matrix(1 0 0 1 1552.3672 362.457)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(8, 3, '6', 'Cottage 6', 1, 1, 1500, 1500, 'default.jpg', '757.5', '101.5', 'matrix(0.2901 0 0 0.2901 1686.7998 362.457)', 'matrix(1 0 0 1 1633.7266 361.4565)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(9, 3, '7', 'Cottage 7', 1, 1, 1500, 1500, 'default.jpg', '806.5', '101.5', 'matrix(0.2901 0 0 0.2901 1776.5195 362.457)', 'matrix(1 0 0 1 1720.7217 361.4565)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(10, 3, '8', 'Cottage 8', 1, 1, 1500, 1500, 'default.jpg', '852.5', '101.5', 'matrix(0.2901 0 0 0.2901 1848.7432 360.4561)', 'matrix(1 0 0 1 1812.2168 361.4565)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(11, 3, '9', 'Cottage 9', 1, 1, 1500, 1500, 'default.jpg', '899.5', '101.5', 'matrix(0.2901 0 0 0.2901 1181.127 361.4561)', 'matrix(1 0 0 1 1884.1553 360.4565)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(12, 3, '10', 'Cottage 10', 1, 1, 1500, 1500, 'default.jpg', '899.5', '156.5', 'matrix(0.3291 0 0 0.3291 1840.4941 425.5425)', 'matrix(1 0 0 1 1880.6592 425.5425)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(13, 3, '11', 'Cottage 11', 1, 1, 1500, 1500, 'default.jpg', '847.5', '156.5', 'matrix(0.3291 0 0 0.3291 1756.2969 427.811)', 'matrix(1 0 0 1 1796.7842 426.6763)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(14, 3, '12', 'Cottage 12', 1, 1, 1500, 1500, 'default.jpg', '794.5', '156.5', 'matrix(0.3291 0 0 0.3291 1654.5361 427.811)', 'matrix(1 0 0 1 1693.0117 426.6763)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(15, 3, '13', 'Cottage 13', 1, 1, 1500, 1500, 'default.jpg', '741.5', '156.5', 'matrix(0.3291 0 0 0.3291 1552.7783 426.6772)', 'matrix(1 0 0 1 1594.3408 426.6763)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(16, 3, '14', 'Cottage 14', 1, 1, 1500, 1500, 'default.jpg', '685.5', '156.5', 'matrix(0.3291 0 0 0.3291 1456.5986 426.6772)', 'matrix(1 0 0 1 1502.0635 427.811)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(17, 3, '15', 'Cottage 15', 1, 1, 1500, 1500, 'default.jpg', '629.5', '156.5', 'matrix(0.3291 0 0 0.3291 1362.4434 427.811)', 'matrix(1 0 0 1 1402.6191 425.5425)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(18, 3, '16', 'Cottage 16', 1, 1, 1500, 1500, 'default.jpg', '572.5', '156.5', 'matrix(0.3291 0 0 0.3291 1263.9961 427.811)', 'matrix(1 0 0 1 1301.7314 425.5425)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(19, 3, '17', 'Cottage 17', 1, 1, 1500, 1500, 'default.jpg', '517.5', '156.5', 'matrix(0.3291 0 0 0.3291 1173.127 426.6772)', 'matrix(1 0 0 1 1221.9941 425.5425)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(20, 3, '18', 'Cottage 18', 1, 1, 1500, 1500, 'default.jpg', '517.5', '211.5', 'matrix(0.3291 0 0 0.3291 1171.127 496.6772)', 'matrix(1 0 0 1 1219.9941 494.5425)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(21, 3, '19', 'Cottage 19', 1, 1, 1500, 1500, 'default.jpg', '572.5', '211.5', 'matrix(0.3291 0 0 0.3291 1261.9961 497.811)', 'matrix(1 0 0 1 1299.7314 494.5425)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(22, 3, '20', 'Cottage 20', 1, 1, 1500, 1500, 'default.jpg', '629.5', '211.5', 'matrix(0.3291 0 0 0.3291 1360.4434 497.811)', 'matrix(1 0 0 1 1400.6191 494.5425)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(23, 3, '21', 'Cottage 21', 1, 1, 1500, 1500, 'default.jpg', '685.5', '211.5', 'matrix(0.3291 0 0 0.3291 1454.5986 496.6772)', 'matrix(1 0 0 1 1500.0635 496.811)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(24, 3, '22', 'Cottage 22', 1, 1, 1500, 1500, 'default.jpg', '741.5', '211.5', 'matrix(0.3291 0 0 0.3291 1550.7783 496.6772)', 'matrix(1 0 0 1 1592.3408 495.6763)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(25, 3, '23', 'Cottage 23', 1, 1, 1500, 1500, 'default.jpg', '794.5', '211.5', 'matrix(0.3291 0 0 0.3291 1652.5361 496.811)', 'matrix(1 0 0 1 1691.0117 495.6763)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(26, 3, '24', 'Cottage 24', 1, 1, 1500, 1500, 'default.jpg', '847.5', '211.5', 'matrix(0.3291 0 0 0.3291 1754.2969 496.811)', 'matrix(1 0 0 1 1794.7842 495.6763)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(27, 3, '25', 'Cottage 25', 1, 1, 1500, 1500, 'default.jpg', '899.5', '211.5', 'matrix(0.3291 0 0 0.3291 1838.4941 494.5425)', 'matrix(1 0 0 1 1878.6592 494.5425)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(28, 3, '26', 'Cottage 26', 1, 1, 1500, 1500, 'default.jpg', '684.5', '268.5', 'matrix(0.3291 0 0 0.3291 1458.5986 573.6777)', 'matrix(1 0 0 1 1504.0635 570.8105)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(29, 3, '27', 'Cottage 27', 1, 1, 1500, 1500, 'default.jpg', '628.5', '268.5', 'matrix(0.3291 0 0 0.3291 1364.4434 574.8105)', 'matrix(1 0 0 1 1404.6191 572.543)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(30, 3, '28', 'Cottage 28', 1, 1, 1500, 1500, 'default.jpg', '571.5', '268.5', 'matrix(0.3291 0 0 0.3291 1265.9961 574.8105)', 'matrix(1 0 0 1 1303.7314 572.543)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(31, 3, '29', 'Cottage 29', 1, 1, 1500, 1500, 'default.jpg', '517.5', '268.5', 'matrix(0.3291 0 0 0.3291 1175.127 573.6777)', 'matrix(1 0 0 1 1223.9941 572.543)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(32, 3, '30', 'Cottage 30', 1, 1, 1500, 1500, 'default.jpg', '92.5', '404.5', 'matrix(0.3291 0 0 0.3291 100.1338 444.353)', 'matrix(1 0 0 1 137.8696 442.0845)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(33, 3, '31', 'Cottage 31', 1, 1, 1500, 1500, 'default.jpg', '30.5', '404.5', 'matrix(0.3291 0 0 0.3291 10 439.2192)', 'matrix(1 0 0 1 58.8677 438.0845)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(34, 5, 'Room 4', 'Room 4', 10, 1, 1000, 1000, 'default.jpg', '98.5', '693.5', 'matrix(0.257 0 0 0.257 175.1235 899.6445)', 'matrix(1 0 0 1 97.6353 769)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(35, 5, 'Room 3', 'Room 3', 10, 1, 1000, 1000, 'default.jpg', '98.5', '751.5', 'matrix(0.257 0 0 0.257 175.1235 846.3086)', 'matrix(1 0 0 1 97.6353 819.6748)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(36, 5, 'Room 2', 'Room 2', 10, 1, 1000, 1000, 'default.jpg', '98.5', '810.5', 'matrix(0.257 0 0 0.257 175.1235 793.4092)', 'matrix(1 0 0 1 97.6353 872.4424)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(37, 5, 'Room 1', 'Room 1', 10, 1, 1000, 1000, 'default.jpg', '98.5', '865.5', 'matrix(0.257 0 0 0.257 175.1235 741.2344)', 'matrix(1 0 0 1 97.6353 924.0703)', 'na', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(67, 4, 'Function Hall', 'N/A', 1000, 1, 2000, 2500, 'default.jpg', NULL, NULL, '', '', 'av', '2021-07-15 13:04:58', '2021-07-15 21:04:58'),
(68, 2, 'TENTS', 'N/A', 100, 29, 500, 500, 'default.jpg', NULL, NULL, '', '', 'av', '2021-07-15 13:04:58', '2021-07-15 21:04:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `details` text,
  `status` enum('av','na') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `name`, `details`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Chair', '300 Chairs', 'av', '2021-07-15 12:06:07', '2021-07-15 20:06:07'),
(2, 'Tent', '29 Tents', 'av', '2021-07-15 12:07:59', '2021-07-15 20:07:59'),
(3, 'Cottage', '32 Cottages Available', 'av', '2021-07-15 12:08:40', '2021-07-15 20:08:40'),
(4, 'Function Hall', 'Function Halls, 1 Swimming Pool', 'av', '2021-07-15 12:09:39', '2021-07-15 20:09:39'),
(5, 'Room', '4 Rooms available', 'av', '2021-07-15 12:09:51', '2021-07-15 20:09:51'),
(6, 'Table', '29 Pcs Available', 'av', '2021-07-15 12:11:09', '2021-07-15 20:11:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `id` int(11) UNSIGNED NOT NULL,
  `guest_id` bigint(20) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `address` text,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `profile` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`id`, `guest_id`, `username`, `password`, `email_address`, `fullname`, `contact`, `address`, `status`, `profile`, `created_at`, `updated_at`) VALUES
(1, 1627213276, NULL, NULL, 'test@gmail.com', 'test', '09322090321', 'aurora', 'active', NULL, '2021-07-25 11:41:16', NULL),
(2, 1627303704, NULL, NULL, 'panfilo.glophics@gmail.com', 'Panfilo', '09322090821', 'Panfilo', 'active', NULL, '2021-07-26 12:48:24', NULL),
(3, 1636987611, NULL, NULL, 'test@yahoo.com', 'test', '09322090821', 'test', 'active', NULL, '2021-11-15 14:46:51', NULL),
(4, 1636988642, NULL, NULL, 'ddd@yahoo.com', 'ddd', '09332090821', 'ddd', 'active', NULL, '2021-11-15 15:04:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_details`
--

CREATE TABLE `tbl_details` (
  `id` int(11) NOT NULL,
  `reservation_id` bigint(20) UNSIGNED NOT NULL,
  `amenities_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(55) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `type` enum('day','night') NOT NULL DEFAULT 'day',
  `date_from` varchar(55) DEFAULT NULL,
  `date_to` varchar(55) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total_days` double DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `status` enum('pending','approved','cancelled') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_details`
--

INSERT INTO `tbl_details` (`id`, `reservation_id`, `amenities_id`, `name`, `category`, `type`, `date_from`, `date_to`, `price`, `quantity`, `total_days`, `total_amount`, `status`, `created_at`, `updated_at`) VALUES
(4, 3, 1, 'Chairs', 'Chair', 'day', ' 2021-11-15 22:46', '2021-11-16 22:46', 100, 300, 1, 30000, 'cancelled', '2021-11-15 14:46:51', '2021-11-15 14:46:51'),
(5, 4, 68, 'TENTS', 'Tent', 'day', ' 2021-11-15 23:03', '2021-11-16 23:03', 500, 28, 1, 14000, 'cancelled', '2021-11-15 15:04:02', '2021-11-15 15:04:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `gallery_id` int(11) NOT NULL,
  `amenities_id` int(11) NOT NULL,
  `photos` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`gallery_id`, `amenities_id`, `photos`, `created_at`) VALUES
(3, 1, '1636983769Naruto_Uzumaki!!.png', '2021-11-15 13:42:49'),
(4, 1, '1636983769static-assets-upload17760067261066695579.jpg', '2021-11-15 13:42:49'),
(5, 68, '1636988705why-boruto-wont-kill-off-naruto-death-yet-manga-spoilers-isshiki-1247440.jpeg', '2021-11-15 15:05:05'),
(6, 68, '1636988725static-assets-upload17760067261066695579.jpg', '2021-11-15 15:05:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profile`
--

CREATE TABLE `tbl_profile` (
  `profile_id` int(11) NOT NULL,
  `site_title` varchar(255) NOT NULL,
  `site_logo` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_profile`
--

INSERT INTO `tbl_profile` (`profile_id`, `site_title`, `site_logo`, `company_name`, `contact`, `email_address`, `address`) VALUES
(1, 'DBROR AND MAPPING MAPPING MANAGEMENT SYSTEM', '1627217762logo.jpg', 'Events Organizer', '+630123340334', 'company@gmail.com', 'Sample address');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_proof_payment`
--

CREATE TABLE `tbl_proof_payment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reservation_id` bigint(20) UNSIGNED NOT NULL,
  `file_proof` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reservations`
--

CREATE TABLE `tbl_reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) UNSIGNED DEFAULT NULL,
  `guest_id` int(11) DEFAULT NULL,
  `reservation_id` bigint(20) UNSIGNED NOT NULL,
  `date_applied` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('pending','approved','cancelled') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_reservations`
--

INSERT INTO `tbl_reservations` (`id`, `customer_id`, `guest_id`, `reservation_id`, `date_applied`, `status`, `created_at`, `updated_at`) VALUES
(3, 0, 1636987611, 12111150004, '2021-11-15 14:46:51', 'cancelled', '2021-11-15 14:46:51', '2021-11-15 14:46:51'),
(4, 0, 1636988642, 12111150005, '2021-11-15 15:04:02', 'cancelled', '2021-11-15 15:04:02', '2021-11-15 15:04:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` char(128) NOT NULL,
  `salt` varchar(64) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` enum('admin','cashier') NOT NULL,
  `status` enum('1','0') NOT NULL COMMENT '1 - is ACTIVE, 0 - INACTIVE',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `fullname`, `username`, `password`, `salt`, `email`, `role`, `status`, `created_at`, `last_login`) VALUES
(1, 'administrator', 'donel', '07b6b408a3d4c73353a722f9ffda37865f6478475f1c7d397392c44d5c1bb8a47a78de115aae4613f527a5453fccf24344a76078f62c9f64e8ef247f8171ad0e', 'du%b4vd6Ygu@E1Xfl38CBQ5uo6nJW0xARu26G51b1&PtZBCBcZsZO&N?gQLTzHYa', 'admin@yahoo.com', 'admin', '1', '2018-09-09 04:54:18', '2021/11/15 14:24:09'),
(2, 'Cashier', 'cashier', '84b53d6d8cc64be01ad46e87cbb1c036a810de77a577303ddc0aa029c4545db19c0b91d6dca325b32d85242d4d498f088caec15ffac8c0b49d3799f091ce2fca', 'El3h2KTjqP2yTzJYTWmx%mAxAz#y*6O&xV3frL%QSIc7tK%*0vbx7!FAq%6frs?2', 'cashier@yahoo.com', 'cashier', '1', '2018-09-09 04:54:18', '2021/07/26 15:09:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_amenities`
--
ALTER TABLE `tbl_amenities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_details`
--
ALTER TABLE `tbl_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `amenities_id` (`amenities_id`),
  ADD KEY `reservation_id` (`reservation_id`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `tbl_profile`
--
ALTER TABLE `tbl_profile`
  ADD PRIMARY KEY (`profile_id`);

--
-- Indexes for table `tbl_proof_payment`
--
ALTER TABLE `tbl_proof_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservation_id` (`reservation_id`);

--
-- Indexes for table `tbl_reservations`
--
ALTER TABLE `tbl_reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_amenities`
--
ALTER TABLE `tbl_amenities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_details`
--
ALTER TABLE `tbl_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_profile`
--
ALTER TABLE `tbl_profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_proof_payment`
--
ALTER TABLE `tbl_proof_payment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_reservations`
--
ALTER TABLE `tbl_reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_amenities`
--
ALTER TABLE `tbl_amenities`
  ADD CONSTRAINT `tbl_amenities_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbl_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_details`
--
ALTER TABLE `tbl_details`
  ADD CONSTRAINT `tbl_details_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `tbl_reservations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_details_ibfk_2` FOREIGN KEY (`amenities_id`) REFERENCES `tbl_amenities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_proof_payment`
--
ALTER TABLE `tbl_proof_payment`
  ADD CONSTRAINT `tbl_proof_payment_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `tbl_reservations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
