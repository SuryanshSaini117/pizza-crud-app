-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2025 at 07:04 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizza_hut`
--

-- --------------------------------------------------------

--
-- Table structure for table `pizza_orders`
--

CREATE TABLE `pizza_orders` (
  `id` int(11) UNSIGNED NOT NULL,
  `pizza_size` enum('big','midium','small','') NOT NULL DEFAULT 'big',
  `crust_type` enum('thin','thick','stuffed','') DEFAULT 'thin',
  `corn` enum('yes','no','','') DEFAULT 'no',
  `pepper` enum('yes','no','','') DEFAULT 'no',
  `mushroom` enum('yes','no','','') DEFAULT 'no',
  `name` varchar(20) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `status` enum('active','inactive','deleted','') DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pizza_orders`
--

INSERT INTO `pizza_orders` (`id`, `pizza_size`, `crust_type`, `corn`, `pepper`, `mushroom`, `name`, `phone_no`, `message`, `status`, `created_at`, `updated_at`) VALUES
(2, 'midium', 'stuffed', 'no', 'yes', 'no', 'NARUTO UZUMAKI', '106106106', 'a corn pizza with extra cron.IF POSSIBALE ADD ICHIRAKU NOODLES TASTE IN THE PIZZA.', 'inactive', '2025-08-21 13:48:26', '2025-08-21 13:48:26'),
(8, 'big', 'thick', 'yes', 'no', 'yes', 'aman BRO', '1234567890', 'ASDFGHJKOP', 'deleted', '2025-08-21 13:48:37', '2025-08-21 13:48:37'),
(45, 'big', 'stuffed', 'no', 'yes', 'yes', 'kakashi hatake', '1234567891', 'asdfvgbhjk', 'active', '2025-09-03 14:12:40', '2025-09-03 14:12:40'),
(46, 'big', 'stuffed', 'no', 'yes', 'no', 'sasuke uchiha', '7894561233', 'qswefsrdgtfyguioop', 'inactive', '2025-08-31 19:51:16', '2025-08-31 19:51:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pizza_orders`
--
ALTER TABLE `pizza_orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pizza_orders`
--
ALTER TABLE `pizza_orders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
