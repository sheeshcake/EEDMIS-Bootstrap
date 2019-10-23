-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2019 at 06:08 PM
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
-- Table structure for table `market_payment`
--

CREATE TABLE `market_payment` (
  `payment_id` int(32) NOT NULL,
  `tenant_id` int(32) NOT NULL,
  `total_bill` int(32) NOT NULL,
  `total_payment` int(32) NOT NULL,
  `date_paid` date DEFAULT NULL,
  `date_billing` date NOT NULL,
  `status` varchar(12) NOT NULL DEFAULT 'unpaid'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `market_stalls`
--

CREATE TABLE `market_stalls` (
  `stall_id` int(11) NOT NULL,
  `stall_dept` varchar(16) NOT NULL,
  `stall_name` varchar(32) DEFAULT NULL,
  `tenant_id` int(11) DEFAULT NULL,
  `date_time_occupied` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `market_stalls`
--

INSERT INTO `market_stalls` (`stall_id`, `stall_dept`, `stall_name`, `tenant_id`, `date_time_occupied`) VALUES
(1, 'green', 'Dy Store', 1, '2019-10-23 05:51:53'),
(2, 'green', 'Dy Store2', 1, '2019-10-23 05:58:30'),
(3, 'green', 'Dy Store3', 1, '2019-10-23 05:59:25'),
(4, 'green', 'Acain Store', 2, '2019-10-23 06:02:33'),
(5, 'blue', 'Acain Stall2', 2, '2019-10-23 06:02:46'),
(6, 'blue', 'Dy Store', 2, '2019-10-23 06:08:23'),
(7, 'blue', '', NULL, '0000-00-00 00:00:00'),
(8, 'v', '', NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `market_tenant`
--

CREATE TABLE `market_tenant` (
  `tenant_id` int(11) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `middle_name` varchar(16) NOT NULL,
  `birthdate` date NOT NULL,
  `sex` varchar(16) NOT NULL,
  `civil_status` varchar(16) NOT NULL,
  `address` varchar(32) NOT NULL,
  `contact_number` int(12) NOT NULL,
  `tenant_image` varchar(32) DEFAULT NULL,
  `stall_image` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `market_tenant`
--

INSERT INTO `market_tenant` (`tenant_id`, `first_name`, `last_name`, `middle_name`, `birthdate`, `sex`, `civil_status`, `address`, `contact_number`, `tenant_image`, `stall_image`) VALUES
(1, 'Wendale', 'Dy', 'R.', '1998-11-05', 'Male', 'Single', 'Luinab Bahayan', 123123, NULL, NULL),
(2, 'James', 'Acain', 'B.', '1997-12-03', 'Male', 'Single', 'Iligan', 12312322, NULL, NULL);

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
-- Indexes for table `market_payment`
--
ALTER TABLE `market_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `market_stalls`
--
ALTER TABLE `market_stalls`
  ADD PRIMARY KEY (`stall_id`);

--
-- Indexes for table `market_tenant`
--
ALTER TABLE `market_tenant`
  ADD PRIMARY KEY (`tenant_id`);

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
-- AUTO_INCREMENT for table `market_payment`
--
ALTER TABLE `market_payment`
  MODIFY `payment_id` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `market_stalls`
--
ALTER TABLE `market_stalls`
  MODIFY `stall_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `market_tenant`
--
ALTER TABLE `market_tenant`
  MODIFY `tenant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
