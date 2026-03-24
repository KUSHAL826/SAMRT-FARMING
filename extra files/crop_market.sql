-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2026 at 01:44 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_farming`
--

-- --------------------------------------------------------

--
-- Table structure for table `crop_market`
--

CREATE TABLE `crop_market` (
  `crop_id` int(11) NOT NULL,
  `crop_name` varchar(100) DEFAULT NULL,
  `total_demand` int(11) NOT NULL,
  `current_production` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crop_market`
--

INSERT INTO `crop_market` (`crop_id`, `crop_name`, `total_demand`, `current_production`) VALUES
(1, 'Tomato', 100, 250),
(2, 'Onion', 250, 0),
(3, 'Potato', 80, 0),
(4, 'Chilli', 200, 0),
(5, 'Rice', 200, 0),
(6, 'Wheat', 200, 0),
(7, 'Maize', 150, 0),
(8, 'Groundnut', 90, 0),
(9, 'Brinjal', 70, 0),
(10, 'Cauliflower', 140, 0),
(11, 'Cotton', 130, 0),
(12, 'Cabbage', 220, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crop_market`
--
ALTER TABLE `crop_market`
  ADD PRIMARY KEY (`crop_id`),
  ADD UNIQUE KEY `crop_name` (`crop_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crop_market`
--
ALTER TABLE `crop_market`
  MODIFY `crop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
