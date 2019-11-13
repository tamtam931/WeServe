-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2019 at 09:14 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weserve_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_position`
--

CREATE TABLE `tbl_position` (
  `id` int(11) NOT NULL,
  `position_desc` varchar(255) NOT NULL,
  `section_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_position`
--

INSERT INTO `tbl_position` (`id`, `position_desc`, `section_id`, `role_id`) VALUES
(1, 'Customer Care Head', 1, 2),
(2, 'Inbound Head', 2, 2),
(3, 'Outbound Head', 3, 2),
(4, 'Fulfillment Head', 4, 2),
(5, 'Handover Head', 5, 2),
(6, 'Inbound Associate', 2, 4),
(7, 'Outbound Associate', 3, 4),
(8, 'Fulfillment Associate', 4, 4),
(9, 'Handover Officer', 5, 3),
(10, 'Handover Associate', 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `id` int(11) NOT NULL,
  `role_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`id`, `role_desc`) VALUES
(1, 'Administrator'),
(2, 'Head'),
(3, 'Officer'),
(4, 'Associate'),
(5, 'Default');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_section`
--

CREATE TABLE `tbl_section` (
  `id` int(11) NOT NULL,
  `section_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_section`
--

INSERT INTO `tbl_section` (`id`, `section_desc`) VALUES
(1, 'Customer Care'),
(2, 'Inbound'),
(3, 'Outbound'),
(4, 'Fulfillment'),
(5, 'Handover');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `position` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `last_logon` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `firstname`, `middlename`, `lastname`, `position`, `username`, `password`, `creation_date`, `created_by`, `status`, `last_logon`) VALUES
(1, 'Daenerys', 'Mai', 'Targaryen', 1, 'dmtargaryen', 'WGZmYTVQK0FLOXl1T2w3L0xzYVV4QT09', '2019-10-28 06:38:24', '3', 1, '0000-00-00 00:00:00'),
(3, 'Janelle', 'Mendoza', 'Dome', 2, 'jmdome', 'WGZmYTVQK0FLOXl1T2w3L0xzYVV4QT09', '2019-10-28 07:03:04', '3', 0, '0000-00-00 00:00:00'),
(4, 'Jane', '', 'Kent', 4, 'jkent', 'WGZmYTVQK0FLOXl1T2w3L0xzYVV4QT09', '2019-10-28 07:31:35', '3', 1, '0000-00-00 00:00:00'),
(7, 'Clark', 'Ty', 'Brookes', 3, 'ctbrookes', 'WGZmYTVQK0FLOXl1T2w3L0xzYVV4QT09', '2019-10-28 08:02:42', '3', 0, '2019-10-29 07:37:55'),
(8, 'Dinah', 'Mai', 'Targaryen', 6, 'dimtargaryen', 'WGZmYTVQK0FLOXl1T2w3L0xzYVV4QT09', '2019-10-29 03:02:38', '3', 1, '0000-00-00 00:00:00'),
(9, 'Vendor', 'Ty', 'Eclarinal', 9, 'vteclarinal', 'WGZmYTVQK0FLOXl1T2w3L0xzYVV4QT09', '2019-10-29 03:09:30', '3', 1, '2019-10-30 04:05:24'),
(14, 'Bon', '', 'Poseidon', 10, 'bposeidon', 'WGZmYTVQK0FLOXl1T2w3L0xzYVV4QT09', '2019-10-29 03:23:43', '3', 1, '0000-00-00 00:00:00'),
(15, 'Amarah', 'Jane', 'Lopez', 5, 'ajlopez', 'WGZmYTVQK0FLOXl1T2w3L0xzYVV4QT09', '2019-10-29 05:24:37', '3', 1, '2019-10-30 04:02:13'),
(16, 'Jheaster Irish', 'Perez', 'Santos', 10, 'jpsantos', 'WGZmYTVQK0FLOXl1T2w3L0xzYVV4QT09', '2019-10-30 00:49:55', '15', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_pwd_history`
--

CREATE TABLE `tbl_user_pwd_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `date_changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_pwd_history`
--

INSERT INTO `tbl_user_pwd_history` (`id`, `user_id`, `user_password`, `date_changed`) VALUES
(1, 9, 'WGZmYTVQK0FLOXl1T2w3L0xzYVV4QT09', '2019-10-29 09:15:31'),
(3, 15, 'WGZmYTVQK0FLOXl1T2w3L0xzYVV4QT09', '2019-10-30 03:03:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_position`
--
ALTER TABLE `tbl_position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_section`
--
ALTER TABLE `tbl_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_pwd_history`
--
ALTER TABLE `tbl_user_pwd_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_section`
--
ALTER TABLE `tbl_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_user_pwd_history`
--
ALTER TABLE `tbl_user_pwd_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
