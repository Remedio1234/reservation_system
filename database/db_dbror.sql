-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2021 at 03:49 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `details` text DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `amount_per_hour` double DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `x` varchar(10) DEFAULT NULL,
  `y` varchar(10) DEFAULT NULL,
  `transform` varchar(100) DEFAULT NULL,
  `status` enum('av','na') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_amenities`
--

INSERT INTO `tbl_amenities` (`id`, `category_id`, `name`, `details`, `capacity`, `quantity`, `amount_per_hour`, `photo`, `x`, `y`, `transform`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Chairs', 'N/A', 1, 300, 100, 'default.jpg', NULL, NULL, '', 'av', '2021-07-15 13:01:46', '2021-07-15 21:01:46'),
(2, 6, 'Tables', 'N/A', 5, 50, 200, 'default.jpg', NULL, NULL, '', 'av', '2021-07-15 13:04:58', '2021-07-15 21:04:58'),
(3, 3, '1', 'Cottage 1', 1, 1, 1500, 'default.jpg', '516.5', '101.5', 'matrix(0.8675 0 0 1 530.6191 128.522)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(4, 3, '2', 'Cottage 2', 1, 1, 1500, 'default.jpg', '564.5', '101.5', 'matrix(0.8675 0 0 1 579.3447 128.522)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(5, 3, '3', 'Cottage 3', 1, 1, 1500, 'default.jpg', '613.5', '101.5', 'matrix(0.8675 0 0 1 628.0703 128.522)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(6, 3, '4', 'Cottage 4', 1, 1, 1500, 'default.jpg', '662.5', '101.5', 'matrix(0.8675 0 0 1 676.7969 128.522)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(7, 3, '5', 'Cottage 5', 1, 1, 1500, 'default.jpg', '710.5', '101.5', 'matrix(0.8675 0 0 1 724.71 128.522)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(8, 3, '6', 'Cottage 6', 1, 1, 1500, 'default.jpg', '757.5', '101.5', 'matrix(0.8675 0 0 1 772.624 128.522)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(9, 3, '7', 'Cottage 7', 1, 1, 1500, 'default.jpg', '806.5', '101.5', 'matrix(0.8675 0 0 1 820.5381 128.522)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(10, 3, '8', 'Cottage 8', 1, 1, 1500, 'default.jpg', '852.5', '101.5', 'matrix(0.8675 0 0 1 867.6396 128.522)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(11, 3, '9', 'Cottage 9', 1, 1, 1500, 'default.jpg', '899.5', '101.5', 'matrix(0.8675 0 0 1 914.7412 128.522)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(12, 3, '10', 'Cottage 10', 1, 1, 1500, 'default.jpg', '899.5', '156.5', 'matrix(0.8675 0 0 1 909.0566 183.752)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(13, 3, '11', 'Cottage 11', 1, 1, 1500, 'default.jpg', '847.5', '156.5', 'matrix(0.8675 0 0 1 856.2695 183.752)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(14, 3, '12', 'Cottage 12', 1, 1, 1500, 'default.jpg', '794.5', '156.5', 'matrix(0.8675 0 0 1 805.1074 183.752)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(15, 3, '13', 'Cottage 13', 1, 1, 1500, 'default.jpg', '741.5', '156.5', 'matrix(0.8675 0 0 1 751.5088 183.752)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(16, 3, '14', 'Cottage 14', 1, 1, 1500, 'default.jpg', '685.5', '156.5', 'matrix(0.8675 0 0 1 693.8105 183.752)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(17, 3, '15', 'Cottage 15', 1, 1, 1500, 'default.jpg', '629.5', '156.5', 'matrix(0.8675 0 0 1 637.8154 183.752)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(18, 3, '16', 'Cottage 16', 1, 1, 1500, 'default.jpg', '572.5', '156.5', 'matrix(0.8675 0 0 1 580.9688 183.752)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(19, 3, '17', 'Cottage 17', 1, 1, 1500, 'default.jpg', '517.5', '156.5', 'matrix(0.8675 0 0 1 525.7461 183.752)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(20, 3, '18', 'Cottage 18', 1, 1, 1500, 'default.jpg', '517.5', '211.5', 'matrix(0.8675 0 0 1 525.7461 238.9819)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(21, 3, '19', 'Cottage 19', 1, 1, 1500, 'default.jpg', '572.5', '211.5', 'matrix(0.8675 0 0 1 580.9688 238.9819)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(22, 3, '20', 'Cottage 20', 1, 1, 1500, 'default.jpg', '629.5', '211.5', 'matrix(0.8675 0 0 1 637.8154 238.9819)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(23, 3, '21', 'Cottage 21', 1, 1, 1500, 'default.jpg', '685.5', '211.5', 'matrix(0.8675 0 0 1 693.8105 238.9819)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(24, 3, '22', 'Cottage 22', 1, 1, 1500, 'default.jpg', '741.5', '211.5', 'matrix(0.8675 0 0 1 751.5088 238.9819)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(25, 3, '23', 'Cottage 23', 1, 1, 1500, 'default.jpg', '794.5', '211.5', 'matrix(0.8675 0 0 1 804.2949 238.9819)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(26, 3, '24', 'Cottage 24', 1, 1, 1500, 'default.jpg', '847.5', '211.5', 'matrix(0.8675 0 0 1 855.458 238.9819)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(27, 3, '25', 'Cottage 25', 1, 1, 1500, 'default.jpg', '899.5', '211.5', 'matrix(0.8675 0 0 1 909.0566 238.9819)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(28, 3, '26', 'Cottage 26', 1, 1, 1500, 'default.jpg', '684.5', '268.5', 'matrix(0.8675 0 0 1 692.3604 295.1479)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(29, 3, '27', 'Cottage 27', 1, 1, 1500, 'default.jpg', '628.5', '268.5', 'matrix(0.8675 0 0 1 637.6338 295.1479)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(30, 3, '28', 'Cottage 28', 1, 1, 1500, 'default.jpg', '571.5', '268.5', 'matrix(0.8675 0 0 1 579.9082 295.1479)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(31, 3, '29', 'Cottage 29', 1, 1, 1500, 'default.jpg', '517.5', '268.5', 'matrix(0.8675 0 0 1 528.1816 295.1479)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(32, 3, '30', 'Cottage 30', 1, 1, 1500, 'default.jpg', '92.5', '404.5', 'matrix(1.1306 0 0 1 102.6152 428.71)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(33, 3, '31', 'Cottage 31', 1, 1, 1500, 'default.jpg', '30.5', '404.5', 'matrix(1.1306 0 0 1 41.9258 428.71)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(34, 5, 'Room 4', 'Room 4', 10, 1, 1000, 'default.jpg', '98.5', '693.5', 'matrix(1 0 0 1 113.2637 722)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(35, 5, 'Room 3', 'Room 3', 10, 1, 1000, 'default.jpg', '98.5', '751.5', 'matrix(1 0 0 1 114.2637 781)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(36, 5, 'Room 2', 'Room 2', 10, 1, 1000, 'default.jpg', '98.5', '810.5', 'matrix(1 0 0 1 114.2637 837)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(37, 5, 'Room 1', 'Room 1', 10, 1, 1000, 'default.jpg', '98.5', '865.5', 'matrix(1 0 0 1 113.2637 894.4736)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(38, 2, '1', 'Tent 1', 1, 1, 500, 'default.jpg', '21.5', '103.5', 'matrix(0.8035 0 0 1 35.5015 131.3696)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(39, 2, '2', 'Tent 2', 1, 1, 500, 'default.jpg', '69.5', '103.5', 'matrix(0.8035 0 0 1 82.0479 131.3696)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(40, 2, '3', 'Tent 3', 1, 1, 500, 'default.jpg', '114.5', '103.5', 'matrix(0.8035 0 0 1 128.5942 131.3696)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(41, 2, '4', 'Tent 4', 1, 1, 500, 'default.jpg', '161.5', '103.5', 'matrix(0.8035 0 0 1 175.1416 131.3696)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(42, 2, '5', 'Tent 5', 1, 1, 500, 'default.jpg', '206.5', '103.5', 'matrix(0.8035 0 0 1 220.9121 131.3696)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(43, 2, '6', 'Tent 6', 1, 1, 500, 'default.jpg', '252.5', '103.5', 'matrix(0.8035 0 0 1 266.6831 131.3696)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(44, 2, '7', 'Tent 7', 1, 1, 500, 'default.jpg', '298.5', '103.5', 'matrix(0.8035 0 0 1 312.4536 131.3696)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(45, 2, '8', 'Tent 8', 1, 1, 500, 'default.jpg', '343.5', '103.5', 'matrix(0.8035 0 0 1 357.4478 131.3696)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(46, 2, '9', 'Tent 9', 1, 1, 500, 'default.jpg', '388.5', '103.5', 'matrix(0.8035 0 0 1 402.4438 131.3696)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(47, 2, '10', 'Tent 10', 1, 1, 500, 'default.jpg', '388.5', '160.5', 'matrix(0.8035 0 0 1 397.0132 188.3335)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(48, 2, '11', 'Tent 11', 1, 1, 500, 'default.jpg', '337.5', '160.5', 'matrix(0.8035 0 0 1 346.5884 188.3335)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(49, 2, '12', 'Tent 12', 1, 1, 500, 'default.jpg', '287.5', '160.5', 'matrix(0.8035 0 0 1 297.7144 188.3335)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(50, 2, '13', 'Tent 13', 1, 1, 500, 'default.jpg', '238.5', '160.5', 'matrix(0.8035 0 0 1 246.5132 188.3335)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(51, 2, '14', 'Tent 14', 1, 1, 500, 'default.jpg', '182.5', '160.5', 'matrix(0.8035 0 0 1 191.394 188.3335)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(52, 2, '15', 'Tent 15', 1, 1, 500, 'default.jpg', '129.5', '160.5', 'matrix(0.8035 0 0 1 137.9043 188.3335)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(53, 2, '16', 'Tent 16', 1, 1, 500, 'default.jpg', '75.5', '160.5', 'matrix(0.8035 0 0 1 83.6001 188.3335)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(54, 2, '17', 'Tent 17', 1, 1, 500, 'default.jpg', '23.5', '160.5', 'matrix(0.8035 0 0 1 30.8472 188.3335)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(55, 2, '18', 'Tent 18', 1, 1, 500, 'default.jpg', '23.5', '217.5', 'matrix(0.8035 0 0 1 30.8472 245.2964)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(56, 2, '19', 'Tent 19', 1, 1, 500, 'default.jpg', '75.5', '217.5', 'matrix(0.8035 0 0 1 83.6001 245.2964)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(57, 2, '20', 'Tent 20', 1, 1, 500, 'default.jpg', '129.5', '217.5', 'matrix(0.8035 0 0 1 137.9043 245.2964)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(58, 2, '21', 'Tent 21', 1, 1, 500, 'default.jpg', '182.5', '217.5', 'matrix(0.8035 0 0 1 191.394 245.2964)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(59, 2, '22', 'Tent 22', 1, 1, 500, 'default.jpg', '238.5', '217.5', 'matrix(0.8035 0 0 1 246.5132 245.2964)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(60, 2, '23', 'Tent 23', 1, 1, 500, 'default.jpg', '287.5', '217.5', 'matrix(0.8035 0 0 1 296.938 245.2964)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(61, 2, '24', 'Tent 24', 1, 1, 500, 'default.jpg', '337.5', '217.5', 'matrix(0.8035 0 0 1 345.812 245.2964)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(62, 2, '25', 'Tent 25', 1, 1, 500, 'default.jpg', '388.5', '217.5', 'matrix(0.8035 0 0 1 397.0132 245.2964)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(63, 2, '26', 'Tent 26', 1, 1, 500, 'default.jpg', '181.5', '276.5', 'matrix(0.8035 0 0 1 190.1738 303.2241)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(64, 2, '27', 'Tent 27', 1, 1, 500, 'default.jpg', '127.5', '276.5', 'matrix(0.8035 0 0 1 136.1738 303.2241)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(65, 2, '28', 'Tent 28', 1, 1, 500, 'default.jpg', '74.5', '276.5', 'matrix(0.8035 0 0 1 82.1738 303.2241)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(66, 2, '29', 'Tent 29', 1, 1, 500, 'default.jpg', '23.5', '276.5', 'matrix(0.8035 0 0 1 33.1738 303.2241)', 'av', '2021-07-18 01:57:53', '2021-07-18 09:57:53'),
(67, 4, 'Function Hall', 'N/A', 1000, 1, 2000, 'default.jpg', NULL, NULL, '', 'av', '2021-07-15 13:04:58', '2021-07-15 21:04:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `status` enum('av','na') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
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
  `address` text DEFAULT NULL,
  `status` enum('pen','av','na') DEFAULT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`id`, `guest_id`, `username`, `password`, `email_address`, `fullname`, `contact`, `address`, `status`, `profile`, `created_at`, `updated_at`) VALUES
(1, NULL, 'ping', '96e79218965eb72c92a549dd5a330112', 'panfilo.glophics@gmail.com', 'Panfilo O. Remedio Jr', '09322090821', 'Mandaue', NULL, 'default.jpg', '2021-07-23 13:21:06', '0000-00-00 00:00:00');

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
  `date_from` varchar(55) DEFAULT NULL,
  `date_to` varchar(55) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total_days` double DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_details`
--

INSERT INTO `tbl_details` (`id`, `reservation_id`, `amenities_id`, `name`, `category`, `date_from`, `date_to`, `price`, `quantity`, `total_days`, `total_amount`, `created_at`, `updated_at`) VALUES
(37, 10, 38, '1', 'Tent', '2021-07-23', '2021-07-23', 500, 1, 1, 500, '2021-07-23 13:33:33', '2021-07-23 13:33:33'),
(38, 10, 38, '1', 'Tent', '2021-07-24', '2021-07-24', 500, 1, 1, 500, '2021-07-23 13:33:33', '2021-07-23 13:33:33'),
(39, 11, 3, '1', 'Cottage', '2021-07-23', '2021-07-23', 1500, 1, 1, 1500, '2021-07-23 13:40:00', '2021-07-23 13:40:00'),
(40, 11, 37, 'Room 1', 'Room', '2021-07-23', '2021-07-23', 1000, 1, 1, 1000, '2021-07-23 13:40:00', '2021-07-23 13:40:00'),
(41, 11, 2, 'Tables', 'Table', '2021-07-23', '2021-07-23', 200, 1, 1, 200, '2021-07-23 13:40:00', '2021-07-23 13:40:00'),
(42, 11, 1, 'Chairs', 'Chair', '2021-07-23', '2021-07-23', 100, 2, 1, 200, '2021-07-23 13:40:01', '2021-07-23 13:40:01');

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
(1, 'DBROR AND MAPPING MAPPING MANAGEMENT SYSTEM', '1626348918logo.jpg', 'Events Organizer', '+630123340334', 'company@gmail.com', 'Sample address');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_proof_payment`
--

CREATE TABLE `tbl_proof_payment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reservation_id` bigint(20) UNSIGNED NOT NULL,
  `file_proof` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
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
  `date_applied` timestamp NULL DEFAULT current_timestamp(),
  `status` enum('pending','approved','cancelled') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_reservations`
--

INSERT INTO `tbl_reservations` (`id`, `customer_id`, `guest_id`, `reservation_id`, `date_applied`, `status`, `created_at`, `updated_at`) VALUES
(10, 1, 0, 12107230011, '2021-07-23 13:33:33', 'pending', '2021-07-23 13:33:33', '2021-07-23 13:33:33'),
(11, 1, 0, 12107230012, '2021-07-23 13:40:00', 'pending', '2021-07-23 13:40:00', '2021-07-23 13:40:00');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_login` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `fullname`, `username`, `password`, `salt`, `email`, `role`, `status`, `created_at`, `last_login`) VALUES
(1, 'administrator', 'admin', '07b6b408a3d4c73353a722f9ffda37865f6478475f1c7d397392c44d5c1bb8a47a78de115aae4613f527a5453fccf24344a76078f62c9f64e8ef247f8171ad0e', 'du%b4vd6Ygu@E1Xfl38CBQ5uo6nJW0xARu26G51b1&PtZBCBcZsZO&N?gQLTzHYa', 'admin@yahoo.com', 'admin', '1', '2018-09-09 04:54:18', '2021/07/18 01:44:59');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_details`
--
ALTER TABLE `tbl_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_profile`
--
ALTER TABLE `tbl_profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_proof_payment`
--
ALTER TABLE `tbl_proof_payment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_reservations`
--
ALTER TABLE `tbl_reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
