-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2019 at 02:17 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eedmis-bootstrap`
--

-- --------------------------------------------------------

--
-- Table structure for table `ibjt_drivers`
--

CREATE TABLE `ibjt_drivers` (
  `driver_id` int(11) NOT NULL,
  `first_name` varchar(16) NOT NULL,
  `last_name` varchar(16) NOT NULL,
  `address` varchar(36) NOT NULL,
  `birthdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ibjt_drivers`
--

INSERT INTO `ibjt_drivers` (`driver_id`, `first_name`, `last_name`, `address`, `birthdate`) VALUES
(1, 'raul', 'pedro', 'Iligan', '1998-11-05'),
(2, 'sad', 'asd', 'asd', '2019-10-22');

-- --------------------------------------------------------

--
-- Table structure for table `ibjt_schedule`
--

CREATE TABLE `ibjt_schedule` (
  `schedule_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `driver_route` varchar(16) NOT NULL,
  `schedule_time` time NOT NULL,
  `schedule_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ibjt_schedule`
--

INSERT INTO `ibjt_schedule` (`schedule_id`, `driver_id`, `driver_route`, `schedule_time`, `schedule_date`) VALUES
(2, 1, '', '02:12:00', '2019-10-17'),
(3, 1, '', '00:12:00', '1212-12-12'),
(6, 2, '', '02:13:00', '2019-10-25');

-- --------------------------------------------------------

--
-- Table structure for table `slaughterhouse_pricing`
--

CREATE TABLE `slaughterhouse_pricing` (
  `pricing_id` int(11) NOT NULL,
  `species_type` varchar(36) NOT NULL,
  `spiecies_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `test_id` int(11) NOT NULL,
  `data1` varchar(36) DEFAULT NULL,
  `data2` int(36) DEFAULT NULL,
  `data3` int(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`test_id`, `data1`, `data2`, `data3`) VALUES
(1, 'test one', 1, 2),
(2, 'test two', 3, 4),
(3, 'test three', 5, 6),
(4, 'test four', 7, 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `user_role` varchar(16) NOT NULL,
  `user_image` varchar(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `first_name`, `last_name`, `user_role`, `user_image`) VALUES
(1, 'ibjt', 'ibjt', 'ibjt', 'admin', 'ibjt', NULL),
(2, 'admin', 'admin', 'James', 'Acain', 'admin', NULL),
(3, 'slaughterhouse', 'slaughterhouse', 'slaughterhouse', 'slaughterhouse', 'slaughterhouse', NULL),
(4, 'market', 'market', 'market', 'market', 'market', NULL),
(5, 'burial', 'burial', 'burial', 'burial', 'cemetery', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ibjt_drivers`
--
ALTER TABLE `ibjt_drivers`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `ibjt_schedule`
--
ALTER TABLE `ibjt_schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `slaughterhouse_pricing`
--
ALTER TABLE `slaughterhouse_pricing`
  ADD PRIMARY KEY (`pricing_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ibjt_drivers`
--
ALTER TABLE `ibjt_drivers`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ibjt_schedule`
--
ALTER TABLE `ibjt_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slaughterhouse_pricing`
--
ALTER TABLE `slaughterhouse_pricing`
  MODIFY `pricing_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
