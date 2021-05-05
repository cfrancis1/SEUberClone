-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2021 at 09:56 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seuberclone`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(40) NOT NULL,
  `cc1` bigint(16) NOT NULL,
  `cc2` bigint(16) NOT NULL,
  `cc3` bigint(16) NOT NULL,
  `favL1` varchar(40) NOT NULL,
  `favL2` varchar(40) NOT NULL,
  `favL3` varchar(40) NOT NULL,
  `totalCash` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `name`, `cc1`, `cc2`, `cc3`, `favL1`, `favL2`, `favL3`, `totalCash`) VALUES
(19, 'cfrancis1', '', 'Christian Francis', 1234123412341234, 5678567856785678, 9090909090909090, '', '', '', 0),
(20, 'a', '2345676', 'a', 123, 2, 23, 'my house', 'your moms house', 'your sisters house', 380);

-- --------------------------------------------------------

--
-- Table structure for table `admin_accounts`
--

CREATE TABLE `admin_accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_accounts`
--

INSERT INTO `admin_accounts` (`id`, `username`, `password`) VALUES
(1, 'admin', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `ride_request`
--

CREATE TABLE `ride_request` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `pickUp` varchar(40) NOT NULL,
  `dropOff` varchar(40) NOT NULL,
  `availability` varchar(30) NOT NULL,
  `distance` float NOT NULL,
  `passengers` int(11) NOT NULL,
  `cc` bigint(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ride_request`
--

INSERT INTO `ride_request` (`id`, `name`, `pickUp`, `dropOff`, `availability`, `distance`, `passengers`, `cc`) VALUES
(12, '1', '2', '3', '5', 4, 6, 7),
(13, '1', '2', '3', '5', 4, 6, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ride_request`
--
ALTER TABLE `ride_request`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ride_request`
--
ALTER TABLE `ride_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
