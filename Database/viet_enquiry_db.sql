-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2024 at 02:41 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `viet_enquiry_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_db_table`
--

CREATE TABLE `enquiry_db_table` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone_no` varchar(18) NOT NULL,
  `referred_by_name` varchar(50) NOT NULL,
  `academic_course_type` varchar(20) NOT NULL,
  `courses` varchar(100) NOT NULL,
  `date_enquired` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping sample data for table `enquiry_db_table`
--

INSERT INTO `enquiry_db_table` (`id`, `name`, `phone_no`, `referred_by_name`, `academic_course_type`, `courses`, `date_enquired`) VALUES
(35, 'manoj', '9888777666', 'kumar', 'diploma', 'd-ece,d-eee,d-mec', '2024-03-25 08:02:27'),
(36, 'venkatesh', '7888000111', 'manoj', 'engg', 'e-ug-cse-datasci,e-ug-cse-cyber,e-ug-cse-ai-ml', '2024-03-25 08:06:11'),
(37, 'salman', '8999000777', 'venkatesh', 'engg', 'e-pg-cad-cam,e-pg-cse', '2024-03-25 08:08:06'),
(38, 'vinay', '6999000888', 'venkatesh', 'engg', 'e-pg-struct,e-pg-cad-cam,e-pg-cse', '2024-03-25 08:11:32'),
(39, 'pavan', '6777888999', 'manoj', 'mgmt', 'm-ug-bba,m-ug-bca', '2024-03-25 08:13:32'),

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enquiry_db_table`
--
ALTER TABLE `enquiry_db_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enquiry_db_table`
--
ALTER TABLE `enquiry_db_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
