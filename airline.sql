-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2024 at 08:06 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airline`
--

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `flight_id` int(11) NOT NULL,
  `dist` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `src_city` varchar(255) DEFAULT NULL,
  `dist_city` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`flight_id`, `dist`, `price`, `path`, `src_city`, `dist_city`, `description`) VALUES
(2, 'United Arab Emirates', 241.00, 'resources/images/Dubai.jpg', 'Amman', 'Dubai', 'Dubai image'),
(3, 'United Arab Emirates', 154.00, 'resources/images/Abu Dhabi.jpg', 'Amman', 'Abu Dhabi', 'Abu Dhabi image'),
(4, 'Lebanon', 178.00, 'resources/images/Beirut.jpg', 'Amman', 'Beirut', 'Beirut image'),
(5, 'Egypt', 187.00, 'resources/images/Cairo.jpg', 'Amman', 'Cairo', 'Cairo image'),
(6, 'kuwait', 140.00, 'resources/images/kuwait.jpg', 'Amman', 'kuwait', 'kuwait image'),
(7, 'Istanbul', 140.00, 'resources/images/Istanbul.jpg', 'Amman', 'Istanbul', 'Istanbul image');

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`id`, `fname`, `lname`, `username`, `email`, `pass`) VALUES
(1, 'sara', 'mharmeh', 'saramharmeh', 's@g.com', '123'),
(4, 'ss', 'ss', 'ss', 'sss@g.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `pass_fli`
--

CREATE TABLE `pass_fli` (
  `pass_id` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `departuref` varchar(255) DEFAULT NULL,
  `returnf` varchar(255) DEFAULT NULL,
  `typef` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pass_fli`
--

INSERT INTO `pass_fli` (`pass_id`, `flight_id`, `departuref`, `returnf`, `typef`) VALUES
(1, 3, '1/9/2024', '3/9/2024', 'One Way'),
(1, 4, '10/10/2024', '23/10/2024', 'Round Trip');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`flight_id`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pass_fli`
--
ALTER TABLE `pass_fli`
  ADD PRIMARY KEY (`pass_id`,`flight_id`),
  ADD KEY `flight_id` (`flight_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `flight`
--
ALTER TABLE `flight`
  MODIFY `flight_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `passenger`
--
ALTER TABLE `passenger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pass_fli`
--
ALTER TABLE `pass_fli`
  ADD CONSTRAINT `pass_fli_ibfk_1` FOREIGN KEY (`pass_id`) REFERENCES `passenger` (`id`),
  ADD CONSTRAINT `pass_fli_ibfk_2` FOREIGN KEY (`flight_id`) REFERENCES `flight` (`flight_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
