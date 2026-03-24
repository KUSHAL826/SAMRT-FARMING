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
-- Table structure for table `farmer_crop_confirmations`
--

CREATE TABLE `farmer_crop_confirmations` (
  `id` int(11) NOT NULL,
  `farmer_name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL,
  `soil_type` varchar(50) NOT NULL,
  `water_availability` varchar(50) NOT NULL,
  `season` varchar(50) NOT NULL,
  `land_details` varchar(100) NOT NULL,
  `crop_name` varchar(100) NOT NULL,
  `expected_production` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farmer_crop_confirmations`
--

INSERT INTO `farmer_crop_confirmations` (`id`, `farmer_name`, `phone`, `address`, `soil_type`, `water_availability`, `season`, `land_details`, `crop_name`, `expected_production`, `created_at`) VALUES
(6, 'KUSHAL', '8296060284', 'Blore', 'Sandy', 'Medium', 'Winter', '5', 'Tomato', 250, '2026-03-14 12:39:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `farmer_crop_confirmations`
--
ALTER TABLE `farmer_crop_confirmations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `farmer_crop_confirmations`
--
ALTER TABLE `farmer_crop_confirmations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
