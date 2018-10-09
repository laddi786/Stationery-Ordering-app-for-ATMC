-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2018 at 03:44 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atmc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(250) NOT NULL,
  `type` enum('admin','staff') NOT NULL,
  `type_name` varchar(200) NOT NULL,
  `is_delete` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `type`, `type_name`, `is_delete`, `created_at`) VALUES
(8, 'admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin', '', 0, '2018-09-26 10:07:50'),
(24, 'Staff', 'staff@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Teacher', 0, '2018-10-09 01:39:23'),
(25, 'Daljit Kaur', 'daljit@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Teacher', 1, '2018-10-09 00:38:17'),
(26, 'jaikrishna', 'jk@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'teacher', 0, '2018-10-09 00:30:12');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `qty` varchar(200) NOT NULL,
  `stationery_id` int(11) NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `staff_id`, `qty`, `stationery_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 25, '5', 1, 'approved', '2018-10-08 09:07:49', '2018-10-08'),
(2, 25, '5', 2, 'approved', '2018-10-08 09:08:26', '2018-10-08'),
(3, 25, '5', 1, 'approved', '2018-10-08 09:12:55', '2018-10-08'),
(4, 25, '5', 2, 'approved', '2018-10-08 09:13:35', '2018-10-08'),
(5, 25, '5', 2, 'rejected', '2018-10-08 09:19:21', '2018-10-08'),
(6, 24, '5', 1, 'approved', '2018-10-09 00:34:56', '2018-10-09'),
(7, 24, '6', 1, 'pending', '2018-10-09 00:37:05', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `stationery`
--

CREATE TABLE `stationery` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `total_stock` varchar(200) NOT NULL DEFAULT '0',
  `threshold_value` int(200) NOT NULL,
  `is_delete` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stationery`
--

INSERT INTO `stationery` (`id`, `name`, `total_stock`, `threshold_value`, `is_delete`, `created_at`) VALUES
(1, 'Pen', '10', 5, 0, '2018-10-09 00:37:56'),
(2, 'pencil', '10', 5, 0, '2018-10-08 22:36:31'),
(3, 'marker', '20', 5, 0, '2018-10-09 00:32:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stationery`
--
ALTER TABLE `stationery`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stationery`
--
ALTER TABLE `stationery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
