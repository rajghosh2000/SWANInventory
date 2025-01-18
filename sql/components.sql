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
-- Table structure for table `components`
--

CREATE TABLE `components` (
  `cmpt_id` varchar(100) NOT NULL,
  `cmpt_name` longtext NOT NULL,
  `cmpt_unique_id` varchar(1000) NOT NULL,
  `cmpt_class` varchar(100) NOT NULL,
  `cmp_qty` int(11) NOT NULL,
  `cmp_unit` varchar(100) NOT NULL,
  `cmpt_consumable` text NOT NULL,
  `cmpt_global_location` longtext NOT NULL,
  `cmpt_location_compartment` longtext NOT NULL,
  `cmpt_altered_loc` longtext NOT NULL,
  `cmpt_missing` longtext NOT NULL,
  `cmpt_notes` longtext NOT NULL,
  `cmpt_supplier` text NOT NULL,
  `cmpt_invoice_no` varchar(1000) NOT NULL,
  `cmpt_added_by` varchar(11) NOT NULL,
  `cmpt_project_id` varchar(100) NOT NULL,
  `cm_timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `components`
--
ALTER TABLE `components`
  ADD PRIMARY KEY (`cmpt_id`),
  ADD KEY `cmpt_added_by` (`cmpt_added_by`),
  ADD KEY `cmpt_project_id` (`cmpt_project_id`),
  ADD KEY `cmpt_class` (`cmpt_class`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `components`
--
ALTER TABLE `components`
  ADD CONSTRAINT `components_ibfk_1` FOREIGN KEY (`cmpt_added_by`) REFERENCES `admin` (`a_id`),
  ADD CONSTRAINT `components_ibfk_2` FOREIGN KEY (`cmpt_project_id`) REFERENCES `projects` (`pro_id`),
  ADD CONSTRAINT `components_ibfk_3` FOREIGN KEY (`cmpt_class`) REFERENCES `components_class` (`it_c_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
