-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2025 at 06:38 AM
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
-- Database: `swanims`
--

-- --------------------------------------------------------

--
-- Table structure for table `components_class`
--

CREATE TABLE `components_class` (
  `it_c_id` varchar(100) NOT NULL,
  `it_c_name` varchar(500) NOT NULL,
  `it_c_desc` longtext NOT NULL,
  `it_c_created_by` varchar(11) NOT NULL,
  `it_c_timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `it_c_img` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `components_class`
--

INSERT INTO `components_class` (`it_c_id`, `it_c_name`, `it_c_desc`, `it_c_created_by`, `it_c_timestamp`, `it_c_img`) VALUES
('ITC00001', 'DEFAULT', 'NO SPECIFIED CLASS ITEMS', 'AD001', '2025-01-18 01:04:31', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `components_class`
--
ALTER TABLE `components_class`
  ADD PRIMARY KEY (`it_c_id`),
  ADD KEY `it_c_created_by` (`it_c_created_by`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `components_class`
--
ALTER TABLE `components_class`
  ADD CONSTRAINT `components_class_ibfk_1` FOREIGN KEY (`it_c_created_by`) REFERENCES `admin` (`a_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
