-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 25, 2022 at 07:54 AM
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
-- Database: `bookTaxi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `username` text NOT NULL,
  `password` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `role` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `password`, `email`, `role`) VALUES
(1, 'Admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `user_booking_id` int(11) NOT NULL,
  `taxiInfo_id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `crt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ownerLogin`
--

CREATE TABLE `ownerLogin` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `taxiNo` varchar(1000) NOT NULL,
  `adharNo` varchar(1000) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `email_id` varchar(1000) NOT NULL,
  `mobileNo` varchar(1000) NOT NULL,
  `role` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ownerLogin`
--

INSERT INTO `ownerLogin` (`id`, `name`, `taxiNo`, `adharNo`, `username`, `password`, `email_id`, `mobileNo`, `role`) VALUES
(2, 'demo demo', 'MH12BC5215', '765898598554', 'owner@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'demo@gmail.com', '+91987654321', 'O');

-- --------------------------------------------------------

--
-- Table structure for table `ownerTaxiInfo`
--

CREATE TABLE `ownerTaxiInfo` (
  `taxiInfo_id` int(11) NOT NULL,
  `taxiNumber` varchar(1000) NOT NULL,
  `passingYear` varchar(1000) NOT NULL,
  `ownerName` varchar(1000) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `adharNumber` varchar(1000) NOT NULL,
  `modileNumber` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `seatsInTaxi` varchar(1000) NOT NULL,
  `crt_by` varchar(1000) NOT NULL,
  `crt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ownerTaxiInfo`
--

INSERT INTO `ownerTaxiInfo` (`taxiInfo_id`, `taxiNumber`, `passingYear`, `ownerName`, `address`, `adharNumber`, `modileNumber`, `email`, `seatsInTaxi`, `crt_by`, `crt`) VALUES
(1, 'MH10BX3250', '2021', 'More Sachin', 'A/p Sangli', '780558654562', '0987654321', 'admin@gmail.com', '8', '2', '2022-03-24 23:18:35'),
(2, 'MH10YT5565', '2020', 'Rohit Jadhav', 'Sangli', '895689854858', '0987654321', 'rohit@gmail.com', '5', '2', '2022-03-25 12:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `route_id` int(11) NOT NULL,
  `start` varchar(1000) NOT NULL,
  `end` varchar(1000) NOT NULL,
  `crt_by` varchar(1000) NOT NULL,
  `crt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`route_id`, `start`, `end`, `crt_by`, `crt`) VALUES
(1, 'Sangli', 'Vita', '1', '2022-03-23 20:11:18'),
(2, 'Vita', 'Karad', '1', '2022-03-23 20:11:54'),
(3, 'Vita', 'Karad', '1', '2022-03-23 20:14:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `mobile` varchar(1000) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `role` varchar(500) NOT NULL,
  `email` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `address`, `username`, `password`, `role`, `email`) VALUES
(3, 'user', '0987654321', 'sangli', 'useradmin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'U', 'user@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_booking`
--

CREATE TABLE `user_booking` (
  `user_booking_id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `mobile` varchar(1000) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `route` varchar(1000) NOT NULL,
  `stop_name` varchar(1000) NOT NULL,
  `distance_KM` varchar(1000) NOT NULL,
  `status` varchar(1000) NOT NULL,
  `crt_by` varchar(1000) NOT NULL,
  `crt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `ownerLogin`
--
ALTER TABLE `ownerLogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ownerTaxiInfo`
--
ALTER TABLE `ownerTaxiInfo`
  ADD PRIMARY KEY (`taxiInfo_id`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`route_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_booking`
--
ALTER TABLE `user_booking`
  ADD PRIMARY KEY (`user_booking_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ownerLogin`
--
ALTER TABLE `ownerLogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ownerTaxiInfo`
--
ALTER TABLE `ownerTaxiInfo`
  MODIFY `taxiInfo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_booking`
--
ALTER TABLE `user_booking`
  MODIFY `user_booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
