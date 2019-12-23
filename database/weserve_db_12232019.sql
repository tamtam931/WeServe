-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2019 at 01:53 AM
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
-- Table structure for table `tbl_activity_logs`
--

CREATE TABLE `tbl_activity_logs` (
  `id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_activity_logs`
--

INSERT INTO `tbl_activity_logs` (`id`, `ticket_id`, `description`, `created_by`, `date_created`, `status`) VALUES
(10, 10, 'THIS IS A SAMPLE', 14, '2019-12-18 07:29:29', 0),
(11, 10, 'sample<br> <a href=\'http://localhost/weserve/uploads/TEM-2019-00001_-NOTE1.jpg\'>Attachment</a>', 7, '2019-12-18 07:50:01', 0),
(13, 10, 'SUCCESS call attempt', 3, '2019-12-18 10:51:13', 0),
(14, 10, 'FAILED call attempt', 3, '2019-12-18 10:55:20', 0),
(35, 10, 'Unit/Parking has been accepted by Unit Owner.', 14, '2019-12-19 12:05:22', 0),
(65, 17, 'SUCCESS call attempt', 7, '2019-12-20 02:03:10', 0),
(70, 17, 'Unit Owner confirmed the turnover schedule.', 7, '2019-12-20 03:08:17', 0),
(71, 17, 'FAILED call attempt', 7, '2019-12-20 03:10:24', 0),
(72, 17, 'SUCCESS call attempt', 7, '2019-12-20 03:12:25', 0),
(73, 17, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br> <a href=\'http://localhost/weserve/uploads/BCR-2019-00008_-NOTE.png\'>Attachment</a>', 7, '2019-12-20 03:14:59', 0),
(74, 10, 'Inbound Associate selected a turnover schedule for Unit Owner', 8, '2019-12-20 05:12:22', 0),
(75, 10, 'This is a sample note note note', 8, '2019-12-20 05:15:48', 0),
(76, 25, 'Inbound Associate selected a turnover schedule for Unit Owner', 8, '2019-12-20 06:05:35', 0),
(77, 26, 'Inbound Associate selected a turnover schedule for Unit Owner', 8, '2019-12-20 06:11:55', 0),
(78, 27, 'Inbound Associate selected a turnover schedule for Unit Owner', 8, '2019-12-20 06:18:36', 0),
(79, 27, 'Unit/Parking has been accepted by Unit Owner.', 16, '2019-12-20 08:59:37', 0),
(80, 27, 'Unit/Parking has been accepted by Unit Owner.', 16, '2019-12-20 09:28:24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buyers`
--

CREATE TABLE `tbl_buyers` (
  `id` int(11) NOT NULL,
  `customer_number` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `tin` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` varchar(255) NOT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `civil_status` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `spouse` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `default_no` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_buyers`
--

INSERT INTO `tbl_buyers` (`id`, `customer_number`, `customer_name`, `tin`, `birthday`, `address`, `gender`, `telephone`, `civil_status`, `mobile_number`, `email_address`, `spouse`, `fax`, `status`, `default_no`, `created_at`, `updated_at`, `deleted_at`) VALUES
(55, 136170, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:56', '0000-00-00 00:00:00', NULL),
(56, 136171, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:57', '0000-00-00 00:00:00', NULL),
(57, 136172, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:57', '0000-00-00 00:00:00', NULL),
(58, 136173, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:57', '0000-00-00 00:00:00', NULL),
(59, 136174, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:57', '0000-00-00 00:00:00', NULL),
(60, 136175, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:57', '0000-00-00 00:00:00', NULL),
(61, 136176, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:57', '0000-00-00 00:00:00', NULL),
(62, 136177, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:57', '0000-00-00 00:00:00', NULL),
(63, 136178, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:57', '0000-00-00 00:00:00', NULL),
(64, 136179, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:57', '0000-00-00 00:00:00', NULL),
(65, 136180, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:57', '0000-00-00 00:00:00', NULL),
(66, 136181, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:57', '0000-00-00 00:00:00', NULL),
(67, 136182, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:57', '0000-00-00 00:00:00', NULL),
(68, 136183, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:57', '0000-00-00 00:00:00', NULL),
(69, 136184, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:57', '0000-00-00 00:00:00', NULL),
(70, 136185, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:57', '0000-00-00 00:00:00', NULL),
(71, 136186, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:57', '0000-00-00 00:00:00', NULL),
(72, 136187, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:57', '0000-00-00 00:00:00', NULL),
(73, 136188, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:58', '0000-00-00 00:00:00', NULL),
(74, 136189, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:58', '0000-00-00 00:00:00', NULL),
(75, 136190, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:58', '0000-00-00 00:00:00', NULL),
(76, 136191, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:58', '0000-00-00 00:00:00', NULL),
(77, 136192, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:58', '0000-00-00 00:00:00', NULL),
(78, 136193, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:58', '0000-00-00 00:00:00', NULL),
(79, 136194, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:58', '0000-00-00 00:00:00', NULL),
(80, 136195, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:58', '0000-00-00 00:00:00', NULL),
(81, 136196, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:58', '0000-00-00 00:00:00', NULL),
(82, 136197, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:58', '0000-00-00 00:00:00', NULL),
(83, 136198, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:58', '0000-00-00 00:00:00', NULL),
(84, 136199, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:58', '0000-00-00 00:00:00', NULL),
(85, 136200, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:58', '0000-00-00 00:00:00', NULL),
(86, 136201, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:58', '0000-00-00 00:00:00', NULL),
(87, 136202, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:58', '0000-00-00 00:00:00', NULL),
(88, 136203, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:58', '0000-00-00 00:00:00', NULL),
(89, 136204, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:58', '0000-00-00 00:00:00', NULL),
(90, 136205, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:58', '0000-00-00 00:00:00', NULL),
(91, 136206, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:58', '0000-00-00 00:00:00', NULL),
(92, 136207, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:58', '0000-00-00 00:00:00', NULL),
(93, 136208, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:58', '0000-00-00 00:00:00', NULL),
(94, 136209, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:58', '0000-00-00 00:00:00', NULL),
(95, 136210, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:58', '0000-00-00 00:00:00', NULL),
(96, 136211, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:58', '0000-00-00 00:00:00', NULL),
(97, 136212, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:58', '0000-00-00 00:00:00', NULL),
(98, 136213, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:59', '0000-00-00 00:00:00', NULL),
(99, 136214, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:59', '0000-00-00 00:00:00', NULL),
(100, 136215, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:59', '0000-00-00 00:00:00', NULL),
(101, 136216, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:59', '0000-00-00 00:00:00', NULL),
(102, 136217, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0', '2019-12-17 23:05:59', '0000-00-00 00:00:00', NULL),
(103, 136218, ' GEOHARI LOYOLA HAMOY', '938-718-596-000', '1977-12-14', '6 Amare Homes 32,, Quezon City', 'Male', NULL, '02', NULL, 'geohari.hamoy@gmail.com', NULL, NULL, NULL, '09152685890', '2019-12-17 23:06:00', '0000-00-00 00:00:00', NULL),
(104, 136219, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '1', '2019-12-17 23:06:00', '0000-00-00 00:00:00', NULL),
(105, 136220, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '1', '2019-12-17 23:06:00', '0000-00-00 00:00:00', NULL),
(106, 136221, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '1', '2019-12-17 23:06:00', '0000-00-00 00:00:00', NULL),
(107, 136222, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '1', '2019-12-17 23:06:00', '0000-00-00 00:00:00', NULL),
(108, 136223, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '1', '2019-12-17 23:06:00', '0000-00-00 00:00:00', NULL),
(109, 136224, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '1', '2019-12-17 23:06:00', '0000-00-00 00:00:00', NULL),
(110, 136225, ' SHI LIHUA', '264-394-811-000', '1967-02-17', '17E Anchor Tower, Pasay City', 'Female', NULL, '01', NULL, 'fgcanta@federalland.ph', NULL, NULL, NULL, '09189855328', '2019-12-17 23:06:00', '0000-00-00 00:00:00', NULL),
(111, 136226, ' SHI LIHUA', '264-394-811-000', '1967-02-17', '17E Anchor Tower, Pasay City', 'Female', NULL, '01', NULL, 'rina.wang28@yahoo.com', NULL, NULL, NULL, '09178875886', '2019-12-17 23:06:00', '0000-00-00 00:00:00', NULL),
(112, 136227, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '1', '2019-12-17 23:06:00', '0000-00-00 00:00:00', NULL),
(113, 136228, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '1', '2019-12-17 23:06:00', '0000-00-00 00:00:00', NULL),
(114, 136229, ' ZHOU KAI LIAN', '263-336-513-000', '1972-08-26', '6A Boardwalk, Bay Gardens, Pasay City', 'Female', NULL, '01', NULL, 'fgcanta@federalland.ph', NULL, NULL, NULL, '09189855328', '2019-12-17 23:06:00', '0000-00-00 00:00:00', NULL),
(115, 136230, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '1', '2019-12-17 23:06:00', '0000-00-00 00:00:00', NULL),
(116, 136231, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '1', '2019-12-17 23:06:00', '0000-00-00 00:00:00', NULL),
(117, 136232, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '1', '2019-12-17 23:06:00', '0000-00-00 00:00:00', NULL),
(118, 136233, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '1', '2019-12-17 23:06:00', '0000-00-00 00:00:00', NULL),
(119, 136234, ' SHI DAN NI', '403-470-820-000', '1988-12-28', 'RM 1109 State Center Building,, Binondo, Manila', 'Female', NULL, '01', NULL, 'mwsy_ent2014@yahoo.com', NULL, NULL, NULL, '09172788888', '2019-12-17 23:06:00', '0000-00-00 00:00:00', NULL),
(120, 136235, ' SHI DAN NI', '403-470-820-000', '1988-12-28', 'RM 1109 State Center Building, Binondo, Manila', 'Female', NULL, '01', NULL, 'mwsy_ent2014@yahoo.com', NULL, NULL, NULL, '09172788888', '2019-12-17 23:06:00', '0000-00-00 00:00:00', NULL),
(121, 136236, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '1', '2019-12-17 23:06:00', '0000-00-00 00:00:00', NULL),
(122, 136237, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '1', '2019-12-17 23:06:00', '0000-00-00 00:00:00', NULL),
(123, 136238, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '1', '2019-12-17 23:06:00', '0000-00-00 00:00:00', NULL),
(124, 136239, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '1', '2019-12-17 23:06:01', '0000-00-00 00:00:00', NULL),
(125, 136240, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '1', '2019-12-17 23:06:01', '0000-00-00 00:00:00', NULL),
(126, 136241, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '1', '2019-12-17 23:06:01', '0000-00-00 00:00:00', NULL),
(127, 136242, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '1', '2019-12-17 23:06:01', '0000-00-00 00:00:00', NULL),
(128, 136243, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '1', '2019-12-17 23:06:01', '0000-00-00 00:00:00', NULL),
(129, 136244, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '1', '2019-12-17 23:06:01', '0000-00-00 00:00:00', NULL),
(130, 136245, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '1', '2019-12-17 23:06:01', '0000-00-00 00:00:00', NULL),
(131, 136246, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '1', '2019-12-17 23:06:01', '0000-00-00 00:00:00', NULL),
(132, 136247, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '1', '2019-12-17 23:06:01', '0000-00-00 00:00:00', NULL),
(133, 136248, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '1', '2019-12-17 23:06:01', '0000-00-00 00:00:00', NULL),
(134, 136249, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '1', '2019-12-17 23:06:01', '0000-00-00 00:00:00', NULL),
(135, 136250, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '1', '2019-12-17 23:06:01', '0000-00-00 00:00:00', NULL),
(136, 136251, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '1', '2019-12-17 23:06:01', '0000-00-00 00:00:00', NULL),
(137, 136252, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '1', '2019-12-17 23:06:01', '0000-00-00 00:00:00', NULL),
(138, 136253, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '1', '2019-12-17 23:06:01', '0000-00-00 00:00:00', NULL),
(139, 136254, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '1', '2019-12-17 23:06:01', '0000-00-00 00:00:00', NULL),
(140, 136255, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '1', '2019-12-17 23:06:01', '0000-00-00 00:00:00', NULL),
(141, 136256, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '1', '2019-12-17 23:06:01', '0000-00-00 00:00:00', NULL),
(142, 136257, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '1', '2019-12-17 23:06:01', '0000-00-00 00:00:00', NULL),
(143, 136258, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '1', '2019-12-17 23:06:01', '0000-00-00 00:00:00', NULL),
(144, 136259, ' ARMEL ADEFUIN ALCANTARA', '101-201-738-000', '1964-09-09', 'Ilawod 2, Gapo Daraga,, Albay', 'Male', NULL, '04', NULL, 'alcantaraarmel@yahoo.com', NULL, NULL, NULL, '09175276087', '2019-12-17 23:06:01', '0000-00-00 00:00:00', NULL),
(145, 136260, ' CHON KAM HING', '435-211-694-000', '1962-01-12', '901B Escolta Twin Tower, Sta. Cruz Manila', 'Male', NULL, '02', NULL, 'kinggo2004@yahoo.com', NULL, NULL, NULL, '09178193144', '2019-12-17 23:06:01', '0000-00-00 00:00:00', NULL),
(146, 136261, ' CHON KAM HING', '435-211-694-000', '1962-01-12', '901B Escolta Twin Tower, Sta. Cruz Manila', 'Male', NULL, '02', NULL, 'kinggo2004@yahoo.com', NULL, NULL, NULL, '09178193144', '2019-12-17 23:06:01', '0000-00-00 00:00:00', NULL),
(147, 136262, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '1', '2019-12-17 23:06:01', '0000-00-00 00:00:00', NULL),
(148, 136263, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '1', '2019-12-17 23:06:01', '0000-00-00 00:00:00', NULL),
(149, 136264, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '1', '2019-12-17 23:06:01', '0000-00-00 00:00:00', NULL),
(150, 136265, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '1', '2019-12-17 23:06:01', '0000-00-00 00:00:00', NULL),
(151, 136266, ' SAMUEL MARBELLA MANGUBAT', '310-472-622-000', '1990-12-21', 'Unit 809 La Breza Hotel, Quezon City', 'Male', '09770861037', '01', NULL, 'mangubatsam@gmail.com', NULL, NULL, NULL, NULL, '2019-12-17 23:06:02', '0000-00-00 00:00:00', NULL),
(152, 136267, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '1', '2019-12-17 23:06:03', '0000-00-00 00:00:00', NULL),
(153, 136271, ' Sy Ben ten', '333-444-555', '1984-09-15', '123 CARTOON NETWORK, Quezon city', 'Female', NULL, '01', NULL, 'fgcanta@federalland.ph', NULL, NULL, NULL, '09189855328', '2019-12-17 23:06:03', '0000-00-00 00:00:00', NULL),
(154, 136272, ' ', '', NULL, 'REGALADO, FAIRVIEW, QUEZON CITY', 'Female', NULL, '00', NULL, 'fgcanta@federalland.ph', NULL, NULL, NULL, '09189855328', '2019-12-17 23:06:03', '0000-00-00 00:00:00', NULL),
(155, 136276, ' LOUVELLE JANEO', '', '1984-08-12', '88 ALEX ST. SAMPALOC, MANILA', 'Female', '08088888', '01', NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-17 23:06:03', '0000-00-00 00:00:00', NULL),
(156, 136277, ' LLOYD EMMANUEL JANEO', '', '1984-10-20', '88 ALEX ST., SAMPALOC, MANILA', 'Male', '4153536', '01', NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-17 23:06:03', '0000-00-00 00:00:00', NULL),
(157, 136278, ' Adelle Olalia', '', '1968-01-16', 'University Tower Malate, 109th Floor Unit A, 728 Pedro Gil', 'Female', NULL, '05', NULL, 'fgcanta@federalland.ph', NULL, NULL, NULL, '09189855328', '2019-12-17 23:06:03', '0000-00-00 00:00:00', NULL),
(158, 136279, ' Raymund DaEf', '', '1968-08-16', '777 Ortega St., Vista Verde, Rizal City', 'Female', '09985505767', '01', NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-17 23:06:03', '0000-00-00 00:00:00', NULL),
(159, 136281, ' JAMES', '', '1984-09-15', '123 LTO, QUEZON CITY', 'Male', NULL, '01', NULL, 'fgcanta@federalland.ph', NULL, NULL, NULL, '09189855328', '2019-12-17 23:06:03', '0000-00-00 00:00:00', NULL),
(160, 136282, ' LEBRON JAMES', '', '1984-09-15', '123 CLEVELAND, QUEZON CITY', 'Female', NULL, '01', NULL, 'fgcanta@federalland.ph', NULL, NULL, NULL, '09189855328', '2019-12-17 23:06:03', '0000-00-00 00:00:00', NULL),
(161, 136283, ' Sir Mon', '', '1992-01-30', '96 ORTIGAS EXTENSION, PASIG', 'Female', NULL, '01', NULL, 'fgcanta@federalland.ph', NULL, NULL, NULL, '09189855328', '2019-12-17 23:06:03', '0000-00-00 00:00:00', NULL),
(162, 136284, ' ROGELIO MUYOT - LTO', '', '1992-01-30', '123 LTO TESTING, Quezon city', 'Female', '1234567', '01', NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-17 23:06:03', '0000-00-00 00:00:00', NULL),
(163, 136285, ' Brightside', '', '1984-09-15', '0000/Florida, Quezon', 'Male', '7654321', '01', NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-17 23:06:03', '0000-00-00 00:00:00', NULL),
(164, 136286, ' Bright Side', '', '1984-09-15', '0000/Florida, Quezon', 'Female', '7654321', '01', NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-17 23:06:03', '0000-00-00 00:00:00', NULL),
(165, 136287, ' Brightside', '', '1984-09-15', 'Jaro Glass Aluminum Service,  57 Sen. Gil Puyat Ave. Makati', 'Male', '7654321', '01', NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-17 23:06:03', '0000-00-00 00:00:00', NULL),
(166, 136288, ' ', '', NULL, 'A, ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '123', '2019-12-17 23:06:03', '0000-00-00 00:00:00', NULL),
(167, 136289, ' MICKEY J. MOUSE', '', '1985-08-22', '6969 Malupit Street, Batangas', 'Female', NULL, '01', NULL, 'fgcanta@federalland.ph', NULL, NULL, NULL, '09189855328', '2019-12-17 23:06:03', '0000-00-00 00:00:00', NULL),
(168, 136290, ' JOHN VILLAFRIA', '123-456-789-000', '1985-06-06', 'Filomena Building III,, 104 Amorsolo Street,', 'Male', NULL, '01', NULL, 'fgcanta@federalland.ph', NULL, NULL, NULL, '09189855328', '2019-12-17 23:06:03', '0000-00-00 00:00:00', NULL),
(169, 136291, ' ', '', NULL, 'greenhills, pasig', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '1234567', '2019-12-17 23:06:03', '0000-00-00 00:00:00', NULL),
(170, 136296, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0000', '2019-12-17 23:06:04', '0000-00-00 00:00:00', NULL),
(171, 136297, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0000', '2019-12-17 23:06:04', '0000-00-00 00:00:00', NULL),
(172, 136298, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0000', '2019-12-17 23:06:04', '0000-00-00 00:00:00', NULL),
(173, 136299, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0000', '2019-12-17 23:06:04', '0000-00-00 00:00:00', NULL),
(174, 136300, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0000', '2019-12-17 23:06:04', '0000-00-00 00:00:00', NULL),
(175, 136301, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0000', '2019-12-17 23:06:04', '0000-00-00 00:00:00', NULL),
(176, 136302, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0000', '2019-12-17 23:06:04', '0000-00-00 00:00:00', NULL),
(177, 136303, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0000', '2019-12-17 23:06:04', '0000-00-00 00:00:00', NULL),
(178, 136304, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0000', '2019-12-17 23:06:04', '0000-00-00 00:00:00', NULL),
(179, 136305, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0000', '2019-12-17 23:06:04', '0000-00-00 00:00:00', NULL),
(180, 136306, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0000', '2019-12-17 23:06:04', '0000-00-00 00:00:00', NULL),
(181, 136307, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0000', '2019-12-17 23:06:04', '0000-00-00 00:00:00', NULL),
(182, 136308, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0917', '2019-12-17 23:06:04', '0000-00-00 00:00:00', NULL),
(183, 136309, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '8888', '2019-12-17 23:06:04', '0000-00-00 00:00:00', NULL),
(184, 136310, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0917', '2019-12-17 23:06:04', '0000-00-00 00:00:00', NULL),
(185, 136311, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0917', '2019-12-17 23:06:04', '0000-00-00 00:00:00', NULL),
(186, 136312, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0917', '2019-12-17 23:06:04', '0000-00-00 00:00:00', NULL),
(187, 136313, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0917', '2019-12-17 23:06:04', '0000-00-00 00:00:00', NULL),
(188, 136314, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0917', '2019-12-17 23:06:04', '0000-00-00 00:00:00', NULL),
(189, 136315, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0917', '2019-12-17 23:06:04', '0000-00-00 00:00:00', NULL),
(190, 136316, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0917', '2019-12-17 23:06:04', '0000-00-00 00:00:00', NULL),
(191, 136317, ' ', '', NULL, 'ROQUE, BUHAY NA TUBIG, GENERAL SANTOS CITY,, GENERAL SANTOS CITY', 'Female', NULL, '00', NULL, 'ABSILVERIO@GMAIL.COM', NULL, NULL, NULL, '09565838888', '2019-12-17 23:06:04', '0000-00-00 00:00:00', NULL),
(192, 136318, ' ', '', NULL, ', Manila', 'Female', '0917', '00', NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-17 23:06:04', '0000-00-00 00:00:00', NULL),
(193, 136319, ' PEÑA', '276611498', '1974-08-06', 'TEST1, Manila City', 'Male', NULL, '01', NULL, 'SAB@GMAIL.COM', NULL, NULL, NULL, '09558608787', '2019-12-17 23:06:04', '0000-00-00 00:00:00', NULL),
(194, 136320, ' Labrador, Archey Myka P.', '', '1994-06-18', ', Manila', 'Female', '09284923756', '01', NULL, 'archeymyka18@gmail.com', NULL, NULL, NULL, NULL, '2019-12-17 23:06:04', '0000-00-00 00:00:00', NULL),
(195, 136321, ' ', '', NULL, 'UNIT 11 FDL BUILDING NO. 2638 BLOCK, GENERAL SANTOS CITY', 'Female', NULL, '00', NULL, 'ABSILVERIO@GMAIL.COM', NULL, NULL, NULL, '09565838888', '2019-12-17 23:06:05', '0000-00-00 00:00:00', NULL),
(196, 136322, 'TESTMIDDLENAME TESTLASTNAME', '', '1974-08-06', 'ROQUE, BUHAY NA TUBIG, GENERAL SANTOS CITY,, GENERAL SANTOS CITY', 'Female', NULL, '01', NULL, 'ABSILVERIO@GMAIL.COM', NULL, NULL, NULL, '09565838888', '2019-12-17 23:06:05', '0000-00-00 00:00:00', NULL),
(197, 136323, 'TESTMIDDLENAME TESTLASTNAME', '', '1974-08-06', 'ROQUE, BUHAY NA TUBIG, GENERAL SANTOS CITY', 'Male', NULL, '02', NULL, 'ABSILVERIO@GMAIL.COM', NULL, NULL, NULL, '09565838888', '2019-12-17 23:06:05', '0000-00-00 00:00:00', NULL),
(198, 136324, ' ', '', NULL, ', Manila', 'Female', '0917', '00', NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-17 23:06:05', '0000-00-00 00:00:00', NULL),
(199, 136325, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0917', '2019-12-17 23:06:08', '0000-00-00 00:00:00', NULL),
(200, 136326, ' ', '', NULL, 'TUBIG, GENERAL SANTOS CITY,, GENERAL SANTOS CITY', 'Female', '3561198', '00', NULL, 'archeymyka@gmail.com', NULL, NULL, NULL, NULL, '2019-12-17 23:06:08', '0000-00-00 00:00:00', NULL),
(201, 136331, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0917', '2019-12-17 23:06:08', '0000-00-00 00:00:00', NULL),
(202, 136332, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '09189855328', '2019-12-17 23:06:08', '0000-00-00 00:00:00', NULL),
(203, 136333, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0917', '2019-12-17 23:06:08', '0000-00-00 00:00:00', NULL),
(204, 136334, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0917', '2019-12-17 23:06:08', '0000-00-00 00:00:00', NULL),
(205, 136335, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0917', '2019-12-17 23:06:08', '0000-00-00 00:00:00', NULL),
(206, 136336, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0917', '2019-12-17 23:06:08', '0000-00-00 00:00:00', NULL),
(207, 136337, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0917', '2019-12-17 23:06:09', '0000-00-00 00:00:00', NULL),
(208, 136338, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0917', '2019-12-17 23:06:09', '0000-00-00 00:00:00', NULL),
(209, 136339, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0917', '2019-12-17 23:06:09', '0000-00-00 00:00:00', NULL),
(210, 136340, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0917', '2019-12-17 23:06:09', '0000-00-00 00:00:00', NULL),
(211, 136341, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0917', '2019-12-17 23:06:09', '0000-00-00 00:00:00', NULL),
(212, 136342, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0917', '2019-12-17 23:06:09', '0000-00-00 00:00:00', NULL),
(213, 136343, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0917', '2019-12-17 23:06:09', '0000-00-00 00:00:00', NULL),
(214, 136344, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0917', '2019-12-17 23:06:09', '0000-00-00 00:00:00', NULL),
(215, 136345, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0917', '2019-12-17 23:06:09', '0000-00-00 00:00:00', NULL),
(216, 136346, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0917', '2019-12-17 23:06:09', '0000-00-00 00:00:00', NULL),
(217, 136347, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0917', '2019-12-17 23:06:09', '0000-00-00 00:00:00', NULL),
(218, 136348, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0917', '2019-12-17 23:06:09', '0000-00-00 00:00:00', NULL),
(219, 136349, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0917', '2019-12-17 23:06:09', '0000-00-00 00:00:00', NULL),
(220, 136350, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0917', '2019-12-17 23:06:09', '0000-00-00 00:00:00', NULL),
(221, 136351, ' ariane tambolero', '123-456-789', '1988-05-08', '204d solano hills villongco st. suc, muntinlupa city', 'Female', '09175509993', '02', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, NULL, '2019-12-17 23:06:09', '0000-00-00 00:00:00', NULL),
(222, 136352, ' tambolero', '', '1988-05-08', '204D solano hills villongco st., Muntinlupa City', 'Male', '028154010', '02', NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-17 23:06:09', '0000-00-00 00:00:00', NULL),
(223, 136353, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0917', '2019-12-17 23:06:09', '0000-00-00 00:00:00', NULL),
(224, 136354, ' TAMBOLERO', '', '1988-05-08', ', ', 'Female', NULL, '02', NULL, NULL, NULL, NULL, NULL, '0917', '2019-12-17 23:06:09', '0000-00-00 00:00:00', NULL),
(225, 136355, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'fgcanta@federalland.ph', NULL, NULL, NULL, '09189855328', '2019-12-17 23:06:09', '0000-00-00 00:00:00', NULL),
(226, 136356, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'test_ariane@tst.tst', NULL, NULL, NULL, '09109998877', '2019-12-17 23:06:09', '0000-00-00 00:00:00', NULL),
(227, 136357, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'TEST@GMAIL.COM', NULL, NULL, NULL, '09887776543', '2019-12-17 23:06:09', '0000-00-00 00:00:00', NULL),
(228, 136358, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'TEST@GMAIL.COM', NULL, NULL, NULL, '09887776543', '2019-12-17 23:06:09', '0000-00-00 00:00:00', NULL),
(229, 136359, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'TEST2@YAHOO.COM', NULL, NULL, NULL, '09999999999', '2019-12-17 23:06:09', '0000-00-00 00:00:00', NULL),
(230, 136360, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'test@gmail.com', NULL, NULL, NULL, '09888888888', '2019-12-17 23:06:09', '0000-00-00 00:00:00', NULL),
(231, 136361, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'CHECK@GMAIL.COM', NULL, NULL, NULL, '09888887766', '2019-12-17 23:06:09', '0000-00-00 00:00:00', NULL),
(232, 136362, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '9999', '2019-12-17 23:06:10', '0000-00-00 00:00:00', NULL),
(233, 136363, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '9999', '2019-12-17 23:06:10', '0000-00-00 00:00:00', NULL),
(234, 136366, ' ', '', NULL, ', TEST3', 'Female', NULL, '00', NULL, 'SAB@GMAIL.COM', NULL, NULL, NULL, '9999', '2019-12-17 23:06:10', '0000-00-00 00:00:00', NULL),
(235, 136367, ' ', '', NULL, ', None', 'Female', '09985775601', '00', NULL, 'SAB@GMAIL.COM', NULL, NULL, NULL, NULL, '2019-12-17 23:06:10', '0000-00-00 00:00:00', NULL),
(236, 136368, ' ', '', NULL, ', ', 'Female', '09985775601', '00', NULL, 'SAB@GMAIL.COM', NULL, NULL, NULL, NULL, '2019-12-17 23:06:10', '0000-00-00 00:00:00', NULL),
(237, 136369, ' ', '', NULL, ', TEST3', 'Female', '09985775602', '00', NULL, 'SAB@GMAIL.COM', NULL, NULL, NULL, NULL, '2019-12-17 23:06:10', '0000-00-00 00:00:00', NULL),
(238, 136370, ' ', '', NULL, ', ', 'Female', '09985775602', '00', NULL, 'SAB@GMAIL.COM', NULL, NULL, NULL, NULL, '2019-12-17 23:06:10', '0000-00-00 00:00:00', NULL),
(239, 136371, ' ', '', NULL, ', ', 'Female', '09985775602', '00', NULL, 'SAB@GMAIL.COM', NULL, NULL, NULL, NULL, '2019-12-17 23:06:10', '0000-00-00 00:00:00', NULL),
(240, 136372, ' ', '', NULL, ', ', 'Female', '09985775602', '00', NULL, 'SAB@GMAIL.COM', NULL, NULL, NULL, NULL, '2019-12-17 23:06:10', '0000-00-00 00:00:00', NULL),
(241, 136373, ' ', '', NULL, ', QUEZON CITY', 'Female', NULL, '00', NULL, 'SAB@GMAIL.COM', NULL, NULL, NULL, '13465464', '2019-12-17 23:06:10', '0000-00-00 00:00:00', NULL),
(242, 136374, ' ', '', NULL, ', QUEZON CITY1', 'Female', NULL, '00', NULL, 'SAB@GMAIL.COM', NULL, NULL, NULL, '13465464', '2019-12-17 23:06:11', '0000-00-00 00:00:00', NULL),
(243, 136375, ' ', '', NULL, ', QUEZON CITY2', 'Female', NULL, '00', NULL, 'SAB@GMAIL.COM', NULL, NULL, NULL, '123456789', '2019-12-17 23:06:12', '0000-00-00 00:00:00', NULL),
(244, 136376, ' ', '', NULL, ', None', 'Female', '123456789', '00', NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-17 23:06:12', '0000-00-00 00:00:00', NULL),
(245, 136377, ' ', '', NULL, ', QUEZON CITY3', 'Female', NULL, '00', NULL, 'SAB@GMAIL.COM', NULL, NULL, NULL, '13465464', '2019-12-17 23:06:12', '0000-00-00 00:00:00', NULL),
(246, 136378, ' ', '', NULL, ', QUEZON CITY5', 'Female', NULL, '00', NULL, 'SAB@GMAIL.COM', NULL, NULL, NULL, '123456789', '2019-12-17 23:06:12', '0000-00-00 00:00:00', NULL),
(247, 136379, ' ', '', NULL, 'Jaro Glass Aluminum Service,  57 Sen. Gil Puyat Ave. Makati', 'Female', '123456789', '00', NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-17 23:06:12', '0000-00-00 00:00:00', NULL),
(248, 136380, ' ', '', NULL, ', QUEZON CITY7', 'Female', NULL, '00', NULL, 'SAB@GMAIL.COM', NULL, NULL, NULL, '123456789', '2019-12-17 23:06:12', '0000-00-00 00:00:00', NULL),
(249, 136381, ' ', '', NULL, ', QUEZON CITY9', 'Female', NULL, '00', NULL, 'SAB@GMAIL.COM', NULL, NULL, NULL, '09558608787', '2019-12-17 23:06:12', '0000-00-00 00:00:00', NULL),
(250, 136382, ' ', '', NULL, ', QUEZON CITY10', 'Female', NULL, '00', NULL, 'SAB@GMAIL.COM', NULL, NULL, NULL, '09558608787', '2019-12-17 23:06:12', '0000-00-00 00:00:00', NULL),
(251, 136383, ' ', '', NULL, ', TEST3', 'Female', NULL, '00', NULL, 'SAB@GMAIL.COM', NULL, NULL, NULL, '09558608787', '2019-12-17 23:06:12', '0000-00-00 00:00:00', NULL),
(252, 136384, ' ', '', NULL, ', TEST3', 'Female', NULL, '00', NULL, 'SAB@GMAIL.COM', NULL, NULL, NULL, '09558608787', '2019-12-17 23:06:12', '0000-00-00 00:00:00', NULL),
(253, 136385, ' ', '', NULL, ', QC', 'Female', NULL, '00', NULL, 'ABSILVERIO@GMAIL.COM', NULL, NULL, NULL, '09558608787', '2019-12-17 23:06:12', '0000-00-00 00:00:00', NULL),
(254, 136386, ' ', '', NULL, ', GENERAL SANTOS CITY', 'Female', NULL, '00', NULL, 'ABSILVERIO@GMAIL.COM', NULL, NULL, NULL, '09558608787', '2019-12-17 23:06:12', '0000-00-00 00:00:00', NULL),
(255, 136387, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'gemzie_rojas121986@yahoo.com.ph', NULL, NULL, NULL, '09178054873', '2019-12-17 23:06:12', '0000-00-00 00:00:00', NULL),
(256, 136388, ' ', '', NULL, 'Nuñez Street, Lacap Subd.,, General Santos City', 'Female', NULL, '00', NULL, 'istipin_keri99@gmail.com', NULL, NULL, NULL, '9111111', '2019-12-17 23:06:12', '0000-00-00 00:00:00', NULL),
(257, 136389, ' ', '', NULL, 'Montgomery Place, Unit 33 Fairhope, Quezon City', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '2', '2019-12-17 23:06:12', '0000-00-00 00:00:00', NULL),
(258, 136390, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, 'ADS', '2019-12-17 23:06:13', '0000-00-00 00:00:00', NULL),
(259, 136391, ' ', '', NULL, ', QC', 'Female', NULL, '00', NULL, 'patriciamarimaclang@gmail.com', NULL, NULL, NULL, '09132313213', '2019-12-17 23:06:13', '0000-00-00 00:00:00', NULL),
(260, 136392, ' ', '', NULL, '4th/F Festival Mall,, Alabang', 'Female', '09189855328', '00', NULL, 'fgcanta@federalland.ph', NULL, NULL, NULL, NULL, '2019-12-17 23:06:13', '0000-00-00 00:00:00', NULL),
(261, 136393, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '09284923756', '2019-12-17 23:06:13', '0000-00-00 00:00:00', NULL),
(262, 136394, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '09175509993', '2019-12-17 23:06:13', '0000-00-00 00:00:00', NULL),
(263, 136395, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '09175509993', '2019-12-17 23:06:13', '0000-00-00 00:00:00', NULL),
(264, 136396, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '09175509993', '2019-12-17 23:06:13', '0000-00-00 00:00:00', NULL),
(265, 136397, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '09175509993', '2019-12-17 23:06:13', '0000-00-00 00:00:00', NULL),
(266, 136398, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'TEST@GMAIL.COM', NULL, NULL, NULL, '09777777777', '2019-12-17 23:06:13', '0000-00-00 00:00:00', NULL),
(267, 136399, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'raebacay@federalland.ph', NULL, NULL, NULL, '09272821411', '2019-12-17 23:06:13', '0000-00-00 00:00:00', NULL),
(268, 136400, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'gmail@gmail.com', NULL, NULL, NULL, '09111111111', '2019-12-17 23:06:13', '0000-00-00 00:00:00', NULL),
(269, 136401, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'POPO@gmail.com', NULL, NULL, NULL, '09111111122', '2019-12-17 23:06:13', '0000-00-00 00:00:00', NULL),
(270, 136402, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'POPe@gmail.com', NULL, NULL, NULL, '09111111123', '2019-12-17 23:06:13', '0000-00-00 00:00:00', NULL),
(271, 136403, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'POPe@gmail.com', NULL, NULL, NULL, '09111111123', '2019-12-17 23:06:13', '0000-00-00 00:00:00', NULL),
(272, 136404, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'POPe@gmail.com', NULL, NULL, NULL, '09111111123', '2019-12-17 23:06:13', '0000-00-00 00:00:00', NULL),
(273, 136405, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'POPe@gmail.com', NULL, NULL, NULL, '09111111123', '2019-12-17 23:06:13', '0000-00-00 00:00:00', NULL),
(274, 136406, 'TESTMIDDLENAME TESTLASTNAME', '', '1974-08-06', 'ROQUE, BUHAY NA TUBIG, GENERAL SANTOS CITY', 'Male', NULL, '02', NULL, 'ABSILVERIO@GMAIL.COM', NULL, NULL, NULL, '09565838888', '2019-12-17 23:06:13', '0000-00-00 00:00:00', NULL),
(275, 136407, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'ABC@gmail.com', NULL, NULL, NULL, '09111111144', '2019-12-17 23:06:13', '0000-00-00 00:00:00', NULL),
(276, 136408, 'TESTMIDDLENAME TESTLASTNAME', '', '1974-08-06', 'ROQUE, BUHAY NA TUBIG, GENERAL SANTOS CITY', 'Male', NULL, '02', NULL, 'ABSILVERIO@GMAIL.COM', NULL, NULL, NULL, '09565838888', '2019-12-17 23:06:13', '0000-00-00 00:00:00', NULL),
(277, 136409, 'TESTMIDDLENAME TESTLASTNAME', '', '1974-08-06', 'ROQUE, BUHAY NA TUBIG, GENERAL SANTOS CITY', 'Male', NULL, '02', NULL, 'ABSILVERIO@GMAIL.COM', NULL, NULL, NULL, '09284923756', '2019-12-17 23:06:13', '0000-00-00 00:00:00', NULL),
(278, 136410, 'TESTMIDDLENAME TESTLASTNAME', '', '1974-08-06', 'ROQUE, BUHAY NA TUBIG, GENERAL SANTOS CITY', 'Male', NULL, '02', NULL, 'ABSILVERIO@GMAIL.COM', NULL, NULL, NULL, '09565838888', '2019-12-17 23:06:13', '0000-00-00 00:00:00', NULL),
(279, 136411, 'TESTMIDDLENAME TESTLASTNAME', '', '1974-08-06', 'ROQUE, BUHAY NA TUBIG, GENERAL SANTOS CITY', 'Male', NULL, '02', NULL, 'ABSILVERIO@GMAIL.COM', NULL, NULL, NULL, '09565838888', '2019-12-17 23:06:13', '0000-00-00 00:00:00', NULL),
(280, 136412, ' ', '', NULL, ', Manila', 'Female', NULL, '00', NULL, 'MRQ@gmail.com', NULL, NULL, NULL, '09887776655', '2019-12-17 23:06:13', '0000-00-00 00:00:00', NULL),
(281, 136413, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'CHECK@GMAIL.COM', NULL, NULL, NULL, '09152950515', '2019-12-17 23:06:14', '0000-00-00 00:00:00', NULL),
(282, 136414, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'CHECK@GMAIL.COM', NULL, NULL, NULL, '09152950515', '2019-12-17 23:06:14', '0000-00-00 00:00:00', NULL),
(283, 136415, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'CHECK@GMAIL.COM', NULL, NULL, NULL, '09152950515', '2019-12-17 23:06:14', '0000-00-00 00:00:00', NULL),
(284, 136416, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'CHECK@GMAIL.COM', NULL, NULL, NULL, '09152950515', '2019-12-17 23:06:14', '0000-00-00 00:00:00', NULL),
(285, 136417, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'CHECK@GMAIL.COM', NULL, NULL, NULL, '09152950515', '2019-12-17 23:06:14', '0000-00-00 00:00:00', NULL),
(286, 136418, 'TESTMIDDLENAME TESTLASTNAME', '', '1974-08-06', 'ROQUE, BUHAY NA TUBIG, GENERAL SANTOS CITY', 'Male', NULL, '02', NULL, 'ABSILVERIO@GMAIL.COM', NULL, NULL, NULL, '09565838888', '2019-12-17 23:06:14', '0000-00-00 00:00:00', NULL),
(287, 136419, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'TEST@FAS.COM', NULL, NULL, NULL, '09888888888', '2019-12-17 23:06:14', '0000-00-00 00:00:00', NULL),
(288, 136420, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'ZZ@ZZ.ZZZZZZZZZZZZZZZZZZ', NULL, NULL, NULL, '09888888888', '2019-12-17 23:06:14', '0000-00-00 00:00:00', NULL),
(289, 136421, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'ZZ@ZZ.ZZZZZZZZZZZZZZZZZZ', NULL, NULL, NULL, '09888888888', '2019-12-17 23:06:14', '0000-00-00 00:00:00', NULL),
(290, 136422, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'ZZ@ZZ.ZZZZZZZZZZZZZZZZZZ', NULL, NULL, NULL, '09888888888', '2019-12-17 23:06:14', '0000-00-00 00:00:00', NULL),
(291, 136423, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'ZZ@ZZ.ZZZZZZZZZZZZZZZZZZ', NULL, NULL, NULL, '09888888888', '2019-12-17 23:06:15', '0000-00-00 00:00:00', NULL),
(292, 136424, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'ZZ@ZZ.ZZZZZZZZZZZZZZZZZZ', NULL, NULL, NULL, '09888888888', '2019-12-17 23:06:15', '0000-00-00 00:00:00', NULL),
(293, 136425, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'korosukiru@gmail.com', NULL, NULL, NULL, '09888888888', '2019-12-17 23:06:15', '0000-00-00 00:00:00', NULL),
(294, 136426, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'korosukiru@gmail.com', NULL, NULL, NULL, '09888888888', '2019-12-17 23:06:15', '0000-00-00 00:00:00', NULL),
(295, 136427, ' ', '', NULL, 'Newfoundland Street, Parañaque City', 'Female', NULL, '00', NULL, 'jcaquino@federalland.ph', NULL, NULL, NULL, '09088754974', '2019-12-17 23:06:15', '0000-00-00 00:00:00', NULL),
(296, 136431, ' ', '123123', NULL, 'Olive, Manila', 'Female', '9111111', '00', NULL, 'Letters@abbaabba333.com', NULL, NULL, NULL, NULL, '2019-12-17 23:06:15', '0000-00-00 00:00:00', NULL),
(297, 136432, ' ', '1512', NULL, '1 East Street, Marikina', 'Female', NULL, '00', NULL, 'JJJ@GMAIL.COM', NULL, NULL, NULL, '911', '2019-12-17 23:06:15', '0000-00-00 00:00:00', NULL),
(298, 136433, 'Estepa J', '1412413', '1992-03-06', '30th Floor Tycoon, Pasig City', 'Male', NULL, '01', NULL, 'JJJ@JJ.COM', NULL, NULL, NULL, '091111111', '2019-12-17 23:06:15', '0000-00-00 00:00:00', NULL),
(299, 136434, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '09561274980', '2019-12-17 23:06:15', '0000-00-00 00:00:00', NULL),
(300, 136435, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '09561274980', '2019-12-17 23:06:15', '0000-00-00 00:00:00', NULL),
(301, 136436, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '09561274980', '2019-12-17 23:06:15', '0000-00-00 00:00:00', NULL),
(302, 136437, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '123', '2019-12-17 23:06:15', '0000-00-00 00:00:00', NULL),
(303, 136438, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'WEFLI@GMAIL.COM', NULL, NULL, NULL, '09999999999', '2019-12-17 23:06:15', '0000-00-00 00:00:00', NULL),
(304, 136439, ' ', '14124134', NULL, ', ', 'Female', NULL, '00', NULL, 'STRC@GMAIL.COM', NULL, NULL, NULL, '09888888888', '2019-12-17 23:06:15', '0000-00-00 00:00:00', NULL),
(305, 136440, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'STRC@GMAIL.COM', NULL, NULL, NULL, '09888888888', '2019-12-17 23:06:15', '0000-00-00 00:00:00', NULL),
(306, 136441, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '09561274980', '2019-12-17 23:06:15', '0000-00-00 00:00:00', NULL),
(307, 136442, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '111', '2019-12-17 23:06:15', '0000-00-00 00:00:00', NULL),
(308, 136443, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '222', '2019-12-17 23:06:15', '0000-00-00 00:00:00', NULL),
(309, 136444, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '22121', '2019-12-17 23:06:16', '0000-00-00 00:00:00', NULL),
(310, 136445, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '09189855328', '2019-12-17 23:06:16', '0000-00-00 00:00:00', NULL),
(311, 136446, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '09175509993', '2019-12-17 23:06:16', '0000-00-00 00:00:00', NULL),
(312, 136447, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '09175509993', '2019-12-17 23:06:16', '0000-00-00 00:00:00', NULL),
(313, 136448, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '09175509993', '2019-12-17 23:06:16', '0000-00-00 00:00:00', NULL),
(314, 136449, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '09175509993', '2019-12-17 23:06:16', '0000-00-00 00:00:00', NULL),
(315, 136450, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '09175509993', '2019-12-17 23:06:16', '0000-00-00 00:00:00', NULL),
(316, 136451, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '09175509993', '2019-12-17 23:06:16', '0000-00-00 00:00:00', NULL),
(317, 136452, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '09175509993', '2019-12-17 23:06:16', '0000-00-00 00:00:00', NULL),
(318, 136453, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '09175509993', '2019-12-17 23:06:16', '0000-00-00 00:00:00', NULL),
(319, 136454, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '09175509993', '2019-12-17 23:06:16', '0000-00-00 00:00:00', NULL),
(320, 136455, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '09175509993', '2019-12-17 23:06:16', '0000-00-00 00:00:00', NULL),
(321, 136456, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '09175509993', '2019-12-17 23:06:16', '0000-00-00 00:00:00', NULL),
(322, 136457, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '09175509993', '2019-12-17 23:06:16', '0000-00-00 00:00:00', NULL),
(323, 136458, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '09175509993', '2019-12-17 23:06:16', '0000-00-00 00:00:00', NULL),
(324, 136459, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '09175509993', '2019-12-17 23:06:16', '0000-00-00 00:00:00', NULL),
(325, 136460, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '09175509993', '2019-12-17 23:06:16', '0000-00-00 00:00:00', NULL),
(326, 136461, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '09175509993', '2019-12-17 23:06:16', '0000-00-00 00:00:00', NULL),
(327, 136462, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '09175509993', '2019-12-17 23:06:16', '0000-00-00 00:00:00', NULL),
(328, 136463, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '09175509993', '2019-12-17 23:06:16', '0000-00-00 00:00:00', NULL),
(329, 136464, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '09175509993', '2019-12-17 23:06:16', '0000-00-00 00:00:00', NULL),
(330, 136465, ' ', '', NULL, ', ', 'Female', '09189855328', '00', NULL, 'fgcanta@federalland.ph', NULL, NULL, NULL, NULL, '2019-12-17 23:06:16', '0000-00-00 00:00:00', NULL),
(331, 136466, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '09175509993', '2019-12-17 23:06:16', '0000-00-00 00:00:00', NULL),
(332, 136467, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '09175509993', '2019-12-17 23:06:16', '0000-00-00 00:00:00', NULL),
(333, 136468, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '09175509993', '2019-12-17 23:06:16', '0000-00-00 00:00:00', NULL),
(334, 136469, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '09175509993', '2019-12-17 23:06:16', '0000-00-00 00:00:00', NULL),
(335, 136470, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '09175509993', '2019-12-17 23:06:16', '0000-00-00 00:00:00', NULL),
(336, 136471, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '09175509993', '2019-12-17 23:06:17', '0000-00-00 00:00:00', NULL),
(337, 136472, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '09175509993', '2019-12-17 23:06:17', '0000-00-00 00:00:00', NULL),
(338, 136473, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '09175509993', '2019-12-17 23:06:17', '0000-00-00 00:00:00', NULL),
(339, 136474, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '09175509993', '2019-12-17 23:06:17', '0000-00-00 00:00:00', NULL),
(340, 136475, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '09175509993', '2019-12-17 23:06:17', '0000-00-00 00:00:00', NULL),
(341, 136476, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '09175509993', '2019-12-17 23:06:17', '0000-00-00 00:00:00', NULL),
(342, 136477, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '09175509993', '2019-12-17 23:06:17', '0000-00-00 00:00:00', NULL),
(343, 136478, ' ARIANE GAYLE MALLARI TAMBOLERO', '917-637-677', '1991-01-11', 'B-13 L-50 Emerald Crest Village,  Cavite', 'Female', '', '01', '09213283730', 'vbparale@federalland.ph', NULL, NULL, NULL, NULL, '2019-12-17 23:06:17', '0000-00-00 00:00:00', NULL),
(344, 136479, ' ', '917-637-677', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '12334', '2019-12-17 23:06:17', '0000-00-00 00:00:00', NULL),
(345, 136480, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '0911111111', '2019-12-17 23:06:18', '0000-00-00 00:00:00', NULL),
(346, 136481, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '1234', '2019-12-17 23:06:18', '0000-00-00 00:00:00', NULL),
(347, 136482, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '5678', '2019-12-17 23:06:18', '0000-00-00 00:00:00', NULL),
(348, 136483, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '91', '2019-12-17 23:06:18', '0000-00-00 00:00:00', NULL),
(349, 136484, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '123', '2019-12-17 23:06:18', '0000-00-00 00:00:00', NULL),
(350, 136485, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'TEST@GMAIL.COM', NULL, NULL, NULL, '09999999999', '2019-12-17 23:06:18', '0000-00-00 00:00:00', NULL),
(351, 136486, ' ', '', NULL, '0677 Quirino Avenue,, Parañaque City', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '027101578', '2019-12-17 23:06:18', '0000-00-00 00:00:00', NULL),
(352, 136487, ' ', '', NULL, '805 G. Masangkay Street, Binondo, Manila', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '09189855328', '2019-12-17 23:06:18', '0000-00-00 00:00:00', NULL),
(353, 136491, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'test@gmail.com', NULL, NULL, NULL, '09565839080', '2019-12-17 23:06:18', '0000-00-00 00:00:00', NULL);
INSERT INTO `tbl_buyers` (`id`, `customer_number`, `customer_name`, `tin`, `birthday`, `address`, `gender`, `telephone`, `civil_status`, `mobile_number`, `email_address`, `spouse`, `fax`, `status`, `default_no`, `created_at`, `updated_at`, `deleted_at`) VALUES
(354, 136492, ' TEST TEST', '', '1990-05-01', ', ALABEL', 'Male', NULL, '01', NULL, 'TEST@GMAIL.COM', NULL, NULL, NULL, '09999999999', '2019-12-17 23:06:18', '0000-00-00 00:00:00', NULL),
(355, 136493, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'test@gmail.com', NULL, NULL, NULL, '09565839080', '2019-12-17 23:06:18', '0000-00-00 00:00:00', NULL),
(356, 136496, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '890', '2019-12-17 23:06:18', '0000-00-00 00:00:00', NULL),
(357, 136497, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'archeymyka18@gmail.com', NULL, NULL, NULL, '09284923756', '2019-12-17 23:06:18', '0000-00-00 00:00:00', NULL),
(358, 136498, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'archeymyka18@gmail.com', NULL, NULL, NULL, '09284923756', '2019-12-17 23:06:18', '0000-00-00 00:00:00', NULL),
(359, 136499, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'archeymyka18@gmail.com', NULL, NULL, NULL, '09284923756', '2019-12-17 23:06:18', '0000-00-00 00:00:00', NULL),
(360, 136500, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'archeymyka18@gmail.com', NULL, NULL, NULL, '09284923756', '2019-12-17 23:06:18', '0000-00-00 00:00:00', NULL),
(361, 136501, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'archeymyka18@gmail.com', NULL, NULL, NULL, '09284923756', '2019-12-17 23:06:18', '0000-00-00 00:00:00', NULL),
(362, 136502, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'archeymyka18@gmail.com', NULL, NULL, NULL, '09284923756', '2019-12-17 23:06:18', '0000-00-00 00:00:00', NULL),
(363, 136503, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'archeymyka18@gmail.com', NULL, NULL, NULL, '09284923756', '2019-12-17 23:06:18', '0000-00-00 00:00:00', NULL),
(364, 136504, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'archeymyka18@gmail.com', NULL, NULL, NULL, '09284923756', '2019-12-17 23:06:18', '0000-00-00 00:00:00', NULL),
(365, 136505, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'archeymyka18@gmail.com', NULL, NULL, NULL, '09284923756', '2019-12-17 23:06:18', '0000-00-00 00:00:00', NULL),
(366, 136506, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'archeymyka18@gmail.com', NULL, NULL, NULL, '09284923756', '2019-12-17 23:06:18', '0000-00-00 00:00:00', NULL),
(367, 136507, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'archeymyka18@gmail.com', NULL, NULL, NULL, '09284923756', '2019-12-17 23:06:18', '0000-00-00 00:00:00', NULL),
(368, 136508, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'archeymyka18@gmail.com', NULL, NULL, NULL, '09284923756', '2019-12-17 23:06:18', '0000-00-00 00:00:00', NULL),
(369, 136509, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'archeymyka18@gmail.com', NULL, NULL, NULL, '09284923756', '2019-12-17 23:06:18', '0000-00-00 00:00:00', NULL),
(370, 136510, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'archeymyka18@gmail.com', NULL, NULL, NULL, '09284923756', '2019-12-17 23:06:19', '0000-00-00 00:00:00', NULL),
(371, 136511, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'archeymyka18@gmail.com', NULL, NULL, NULL, '09284923756', '2019-12-17 23:06:19', '0000-00-00 00:00:00', NULL),
(372, 136512, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, 'SDF', '2019-12-17 23:06:19', '0000-00-00 00:00:00', NULL),
(373, 136513, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '09175509995', '2019-12-17 23:06:19', '0000-00-00 00:00:00', NULL),
(374, 136514, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '09175509995', '2019-12-17 23:06:19', '0000-00-00 00:00:00', NULL),
(375, 136515, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '09175509995', '2019-12-17 23:06:19', '0000-00-00 00:00:00', NULL),
(376, 136516, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '09175509995', '2019-12-17 23:06:19', '0000-00-00 00:00:00', NULL),
(377, 136517, 'VIEL PARALE', '1233546456', '1990-07-04', 'Filomena Building III,, 104 Amorsolo Street,', 'Female', '09213283730', '02', NULL, 'vbparale@federalland.ph', NULL, NULL, NULL, NULL, '2019-12-17 23:06:19', '0000-00-00 00:00:00', NULL),
(378, 136518, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '09175509995', '2019-12-17 23:06:19', '0000-00-00 00:00:00', NULL),
(379, 136519, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '09175509995', '2019-12-17 23:06:19', '0000-00-00 00:00:00', NULL),
(380, 136520, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'arah.tamby@gmail.com', NULL, NULL, NULL, '09175509995', '2019-12-17 23:06:19', '0000-00-00 00:00:00', NULL),
(381, 136521, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '09175509995', '2019-12-17 23:06:19', '0000-00-00 00:00:00', NULL),
(382, 136522, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '0917', '2019-12-17 23:06:19', '0000-00-00 00:00:00', NULL),
(383, 136523, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'juan.delacruz@yahoo.com', NULL, NULL, NULL, '1234', '2019-12-17 23:06:19', '0000-00-00 00:00:00', NULL),
(384, 136524, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'test@gmail.com', NULL, NULL, NULL, '09565839080', '2019-12-17 23:06:19', '0000-00-00 00:00:00', NULL),
(385, 136525, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'test@gmail.com', NULL, NULL, NULL, '09565839080', '2019-12-17 23:06:19', '0000-00-00 00:00:00', NULL),
(386, 136526, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'test@gmail.com', NULL, NULL, NULL, '09565839080', '2019-12-17 23:06:19', '0000-00-00 00:00:00', NULL),
(387, 136527, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'test@gmail.com', NULL, NULL, NULL, '09565839080', '2019-12-17 23:06:19', '0000-00-00 00:00:00', NULL),
(388, 136528, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'test@gmail.com', NULL, NULL, NULL, '09565839080', '2019-12-17 23:06:20', '0000-00-00 00:00:00', NULL),
(389, 136529, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, 'test@gmail.com', NULL, NULL, NULL, '09565839080', '2019-12-17 23:06:20', '0000-00-00 00:00:00', NULL),
(390, 12345, ' Bongbong De Guzman', '1234567890000', '1989-07-01', 'Blk 18, Taguig', 'Female', NULL, '01', '09213283730', 'vbparale@federalland.ph', NULL, NULL, NULL, '09189855328', '2019-12-17 23:06:20', '0000-00-00 00:00:00', NULL),
(391, 136531, ' ', '1234567890000', NULL, 'Blk 18, Taguig', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '09189855328', '2019-12-17 23:06:20', '0000-00-00 00:00:00', NULL),
(392, 136532, ' ', '', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '09189855328', '2019-12-17 23:06:20', '0000-00-00 00:00:00', NULL),
(393, 136536, ' ', '917-637-678', NULL, ', ', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '09175600495', '2019-12-17 23:06:20', '0000-00-00 00:00:00', NULL),
(394, 136537, ' ', '', NULL, 'Blk 18, Taguig', 'Female', NULL, '00', NULL, NULL, NULL, NULL, NULL, '09175600495', '2019-12-17 23:06:20', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buyers_advance_charges`
--

CREATE TABLE `tbl_buyers_advance_charges` (
  `id` int(11) NOT NULL,
  `customer_number` int(11) NOT NULL,
  `arc_billing_date` date NOT NULL,
  `arc_billing_amount` float NOT NULL,
  `arc_payment_date` datetime NOT NULL,
  `arc_amount_paid` float NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_buyers_advance_charges`
--

INSERT INTO `tbl_buyers_advance_charges` (`id`, `customer_number`, `arc_billing_date`, `arc_billing_amount`, `arc_payment_date`, `arc_amount_paid`, `status`) VALUES
(1, 5555, '2019-11-19', 85346, '2019-11-20 00:00:00', 85346, 0),
(2, 12345, '2019-11-13', 70000, '2019-11-20 00:00:00', 70000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buyers_documents`
--

CREATE TABLE `tbl_buyers_documents` (
  `id` int(11) NOT NULL,
  `customer_number` int(11) NOT NULL,
  `document_description` varchar(255) NOT NULL,
  `document_status` varchar(255) NOT NULL,
  `status_date` date NOT NULL,
  `document_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_buyers_documents`
--

INSERT INTO `tbl_buyers_documents` (`id`, `customer_number`, `document_description`, `document_status`, `status_date`, `document_type`) VALUES
(1, 55555, 'Post Dated Checks', 'SUBMITTED', '2019-11-20', 'DOCUMENTARY'),
(2, 55555, 'Contract to Sell', 'RELEASED', '2019-11-20', 'LEGAL_DOCUMENT'),
(3, 55555, 'Notice to Comply Requirements for\r\nTransfer of Title to Buyer\'s Name', '', '2019-11-20', 'NOTICE'),
(4, 55555, 'Proof of Billing', 'SUBMITTED', '2019-11-20', 'DOCUMENTARY'),
(5, 55555, 'Valid Government Issued ID', 'SUBMITTED', '2019-11-20', 'DOCUMENTARY'),
(6, 55555, 'Transfer of Certificate of Title', 'CLAIMED', '2019-11-20', 'LEGAL_DOCUMENT');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buyers_payment`
--

CREATE TABLE `tbl_buyers_payment` (
  `id` int(11) NOT NULL,
  `customer_number` int(11) NOT NULL,
  `net_selling_amount` float NOT NULL,
  `outstanding_balance` float NOT NULL,
  `amount_collected` float NOT NULL,
  `percent_collected` varchar(255) NOT NULL,
  `collection_date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_buyers_payment`
--

INSERT INTO `tbl_buyers_payment` (`id`, `customer_number`, `net_selling_amount`, `outstanding_balance`, `amount_collected`, `percent_collected`, `collection_date`, `status`) VALUES
(1, 55555, 3000000, 0, 3000000, '100%', '2019-11-13', 0),
(2, 12345, 6000000, 0, 3000000, '50%', '2019-11-13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buyers_transaction`
--

CREATE TABLE `tbl_buyers_transaction` (
  `id` int(11) NOT NULL,
  `customer_number` int(11) NOT NULL,
  `project` varchar(255) NOT NULL,
  `tower` varchar(255) NOT NULL,
  `runitid` varchar(255) NOT NULL,
  `accepted_qcd` datetime NOT NULL,
  `accepted_handover` datetime NOT NULL,
  `qualified_turnover_date` datetime NOT NULL,
  `accepted_oomc` datetime NOT NULL,
  `approved_turnover` datetime NOT NULL,
  `building_turnover` datetime NOT NULL,
  `schedule_date` datetime NOT NULL,
  `tagged_no_show` datetime NOT NULL,
  `transaction_date` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_buyers_transaction`
--

INSERT INTO `tbl_buyers_transaction` (`id`, `customer_number`, `project`, `tower`, `runitid`, `accepted_qcd`, `accepted_handover`, `qualified_turnover_date`, `accepted_oomc`, `approved_turnover`, `building_turnover`, `schedule_date`, `tagged_no_show`, `transaction_date`, `status`) VALUES
(1, 12345, 'BCR', '001', '00000003', '2019-11-07 00:00:00', '2019-11-07 00:00:00', '2019-11-20 00:00:00', '0000-00-00 00:00:00', '2019-11-08 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2019-11-20 00:00:00', 0),
(2, 55555, 'TEM', '0001', '00000021', '2019-11-01 00:00:00', '2019-11-12 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2019-11-11 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2019-11-01 00:00:00', 0),
(3, 80808, 'TEM', '0001', '00000031', '2019-11-07 00:00:00', '2019-11-07 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2019-11-15 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2019-11-20 00:00:00', 0),
(4, 19191, 'TEM', '0001', '00000041', '2019-11-07 00:00:00', '2019-11-07 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2019-11-20 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2019-11-20 00:00:00', 0),
(5, 136517, 'BCR', '001', '00000005', '2019-11-07 00:00:00', '2019-11-07 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2019-11-20 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2019-11-20 00:00:00', 0),
(6, 136478, 'BCR', '001', '00000001', '2019-11-07 00:00:00', '2019-11-07 00:00:00', '2019-12-19 00:00:00', '0000-00-00 00:00:00', '2019-11-20 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2019-11-20 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_call_logs`
--

CREATE TABLE `tbl_call_logs` (
  `id` int(11) NOT NULL,
  `internal_user` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `result` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_call_logs`
--

INSERT INTO `tbl_call_logs` (`id`, `internal_user`, `ticket_id`, `result`, `date_time`) VALUES
(1, 3, 10, 'SUCCESS', '2019-12-18 10:50:36'),
(2, 3, 10, 'SUCCESS', '2019-12-18 10:51:13'),
(3, 3, 10, 'FAILED', '2019-12-18 10:55:20'),
(4, 7, 17, 'SUCCESS', '2019-12-20 02:03:10'),
(5, 7, 17, 'FAILED', '2019-12-20 03:10:24'),
(6, 7, 17, 'SUCCESS', '2019-12-20 03:12:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_checking_areas`
--

CREATE TABLE `tbl_checking_areas` (
  `id` int(11) NOT NULL,
  `unit_type` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `required` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_checking_areas`
--

INSERT INTO `tbl_checking_areas` (`id`, `unit_type`, `project`, `area_id`, `required`, `status`) VALUES
(3, 1, 1, 4, 0, 0),
(4, 1, 1, 3, 1, 0),
(14, 2, 3, 2, 1, 0),
(18, 109, 126, 7, 1, 0),
(19, 109, 126, 1, 1, 0),
(20, 109, 126, 3, 1, 0),
(21, 126, 217, 5, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_checking_areas_list`
--

CREATE TABLE `tbl_checking_areas_list` (
  `id` int(11) NOT NULL,
  `area_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_checking_areas_list`
--

INSERT INTO `tbl_checking_areas_list` (`id`, `area_description`) VALUES
(1, 'Living Area'),
(2, 'Dining Area'),
(3, 'Toilet and Bathroom'),
(4, 'Bedroom 1'),
(5, 'Bedroom 2'),
(7, 'Balcony');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dashboard_status`
--

CREATE TABLE `tbl_dashboard_status` (
  `id` int(11) NOT NULL,
  `status_description` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dashboard_status`
--

INSERT INTO `tbl_dashboard_status` (`id`, `status_description`, `color`) VALUES
(1, 'Unsold', '#E5AC00'),
(2, 'Under Construction', '#FFBF04'),
(3, 'Accepted by QCD', '#FE65E1'),
(4, 'Accepted by Handover', '#EEFDA2'),
(5, 'With Building Turnover', '#D2B0CC'),
(6, 'With TOAS', '#F6CF8C'),
(7, 'Without TOAS', '#FC0204'),
(8, 'Qualified for Turnover', '#C5E0B3'),
(9, 'Scheduled for Turnover', '#A5FEFF'),
(10, 'No Show', '#BCBCBC'),
(11, 'Accepted with Punchlist', '#7AFA9B'),
(12, 'Not Accepted with Punchlist', '#D9D9D9'),
(13, 'Not Accepted with Other Concern', '#ED7D31'),
(14, 'Accepted by Unit Owner', '#00B5EF'),
(15, 'Deemed Legally Accepted', '#F87C98');

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
-- Table structure for table `tbl_projects`
--

CREATE TABLE `tbl_projects` (
  `id` int(11) NOT NULL,
  `project_code` varchar(255) NOT NULL,
  `project` varchar(255) NOT NULL,
  `tower` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `company_code` varchar(255) DEFAULT NULL,
  `project_code_sap` varchar(255) DEFAULT NULL,
  `is_activated` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_projects`
--

INSERT INTO `tbl_projects` (`id`, `project_code`, `project`, `tower`, `address`, `company_code`, `project_code_sap`, `is_activated`, `created_at`, `updated_at`, `deleted_at`) VALUES
(125, 'AMT', 'G7519 SAMP', '001', NULL, 'BP01', 'AMT-001', 1, '2019-12-17 23:04:17', '0000-00-00 00:00:00', NULL),
(126, 'BCR', 'BGCR-Banyan Tower', '001', 'Makati City', 'BP01', 'BCR-001', 1, '2019-12-17 23:04:17', '0000-00-00 00:00:00', NULL),
(128, 'BCR', 'BGCR-Royal Palm Tower', '002', NULL, 'BP01', 'BCR-002', 1, '2019-12-17 23:04:17', '0000-00-00 00:00:00', NULL),
(129, 'BCR', 'BGCR-Mandarin Tower', '003', NULL, 'BP01', 'BCR-003', 1, '2019-12-17 23:04:17', '0000-00-00 00:00:00', NULL),
(131, 'BCR', 'TESTPROPERTY', '004', NULL, 'BP01', 'BCR-004', 1, '2019-12-17 23:04:17', '0000-00-00 00:00:00', NULL),
(132, 'BCR', 'TESTPROPERTY2', '005', NULL, 'BP01', 'BCR-005', 1, '2019-12-17 23:04:17', '0000-00-00 00:00:00', NULL),
(133, 'BCR', 'TESTPROPERTY3', '006', NULL, 'BP01', 'BCR-006', 1, '2019-12-17 23:04:17', '0000-00-00 00:00:00', NULL),
(134, 'BCR', 'TESTPROPERTY4', '007', NULL, 'BP01', 'BCR-007', 1, '2019-12-17 23:04:17', '0000-00-00 00:00:00', NULL),
(135, 'BCR', 'TESTPROPERTYALL', '009', NULL, 'BP01', 'BCR-009', 1, '2019-12-17 23:04:17', '0000-00-00 00:00:00', NULL),
(136, 'BCR', 'TEST PROPERTY10', '010', NULL, 'BP01', 'BCR-010', 1, '2019-12-17 23:04:17', '0000-00-00 00:00:00', NULL),
(137, 'BCR', 'TEST PROPERTY11', '011', NULL, 'BP01', 'BCR-011', 1, '2019-12-17 23:04:17', '0000-00-00 00:00:00', NULL),
(138, 'BCR', 'TEST PROPERTY12', '012', NULL, 'BP01', 'BCR-012', 1, '2019-12-17 23:04:17', '0000-00-00 00:00:00', NULL),
(139, 'BCR', 'TEST PROPERTY13', '013', NULL, 'BP01', 'BCR-013', 1, '2019-12-17 23:04:17', '0000-00-00 00:00:00', NULL),
(140, 'BCR', 'TEST PROPERTY14', '014', NULL, 'BP01', 'BCR-014', 1, '2019-12-17 23:04:17', '0000-00-00 00:00:00', NULL),
(141, 'BCR', 'TEST PROPERTY FOR WEFLI', '015', NULL, 'BP01', 'BCR-015', 1, '2019-12-17 23:04:17', '0000-00-00 00:00:00', NULL),
(142, 'BCR', 'TEST PROPERTY 16', '016', NULL, 'BP01', 'BCR-016', 1, '2019-12-17 23:04:18', '0000-00-00 00:00:00', NULL),
(143, 'BCR', 'TEST PROPERTY 17', '017', NULL, 'BP01', 'BCR-017', 1, '2019-12-17 23:04:18', '0000-00-00 00:00:00', NULL),
(144, 'BCR', 'TEST PROPERTY 18***', '018', NULL, 'BP01', 'BCR-018', 1, '2019-12-17 23:04:18', '0000-00-00 00:00:00', NULL),
(145, 'BCR', 'TEST PROPERTY 19', '019', NULL, 'BP01', 'BCR-019', 1, '2019-12-17 23:04:18', '0000-00-00 00:00:00', NULL),
(146, 'BCR', 'TEST PROPERTY 20 ***', '020', NULL, 'BP01', 'BCR-020', 1, '2019-12-17 23:04:18', '0000-00-00 00:00:00', NULL),
(147, 'BCR', 'TEST PROPERTY 21', '021', NULL, 'BP01', 'BCR-021', 1, '2019-12-17 23:04:18', '0000-00-00 00:00:00', NULL),
(148, 'BCR', 'Test Tower 022', '022', NULL, 'BP01', 'BCR-022', 1, '2019-12-17 23:04:18', '0000-00-00 00:00:00', NULL),
(149, 'BG', 'Bay Garden - Anchor', '001', NULL, 'BP01', 'BG-001', 1, '2019-12-17 23:04:18', '0000-00-00 00:00:00', NULL),
(150, 'BG', 'Bay Garden - Boardwalk', '002', NULL, 'BP01', 'BG-002', 1, '2019-12-17 23:04:18', '0000-00-00 00:00:00', NULL),
(151, 'BG', 'Bay Garden - Crystal', '003', NULL, 'BP01', 'BG-003', 1, '2019-12-17 23:04:18', '0000-00-00 00:00:00', NULL),
(152, 'BGR', 'Bay Garden - Mactan Tower', '001', NULL, 'BP01', 'BGR-001', 1, '2019-12-17 23:04:18', '0000-00-00 00:00:00', NULL),
(153, 'BGR', 'Bay Garden - Palawan Tower', '002', NULL, 'BP01', 'BGR-002', 1, '2019-12-17 23:04:18', '0000-00-00 00:00:00', NULL),
(155, 'FSE', 'FSE- Jacksonville', '001', NULL, 'S01A', 'FSE-001', 1, '2019-12-17 23:04:18', '0000-00-00 00:00:00', NULL),
(156, 'FSE', 'Florida Sun Estate-Miami', '002', NULL, 'S01A', 'FSE-002', 1, '2019-12-17 23:04:18', '0000-00-00 00:00:00', NULL),
(157, 'FSE', 'FSE-Tampa', '003', NULL, 'S01A', 'FSE-003', 1, '2019-12-17 23:04:18', '0000-00-00 00:00:00', NULL),
(158, 'FSE', 'FSE-Orlando', '004', NULL, 'S01A', 'FSE-004', 1, '2019-12-17 23:04:18', '0000-00-00 00:00:00', NULL),
(159, 'FSE', 'FSE-HOME', 'HOME', NULL, 'S01A', 'FSE-HOME', 1, '2019-12-17 23:04:18', '0000-00-00 00:00:00', NULL),
(160, 'GHR', 'Grand Hyatt Manila Res.', '001', NULL, 'S01E', 'GHR-001', 1, '2019-12-17 23:04:18', '0000-00-00 00:00:00', NULL),
(161, 'GHR', 'Grand Hyatt Res. 2 - South', '002', NULL, 'S01L', 'GHR-002', 1, '2019-12-17 23:04:18', '0000-00-00 00:00:00', NULL),
(163, 'IKI', 'The Tower', '032', NULL, 'S01L', 'IKI-032', 1, '2019-12-17 23:04:18', '0000-00-00 00:00:00', NULL),
(164, 'INI', 'Initial Projects', '001', NULL, 'BP01', 'INI-001', 1, '2019-12-17 23:04:18', '0000-00-00 00:00:00', NULL),
(165, 'JCA', '123-test loc 1', '001', NULL, 'BP01', 'JCA-001', 1, '2019-12-17 23:04:18', '0000-00-00 00:00:00', NULL),
(166, 'JCA', 'jca2-test 23', '002', NULL, 'BP01', 'JCA-002', 1, '2019-12-17 23:04:19', '0000-00-00 00:00:00', NULL),
(167, 'MBC', 'MBC Tower', '001', NULL, 'S01E', 'MBC-001', 1, '2019-12-17 23:04:19', '0000-00-00 00:00:00', NULL),
(168, 'MC', 'MI CASA - HAWAII', '001', NULL, 'BP01', 'MC-001', 1, '2019-12-17 23:04:19', '0000-00-00 00:00:00', NULL),
(169, 'MGM', 'PGMH-Molave Tower', '001', NULL, 'BP01', 'MGM-001', 1, '2019-12-17 23:04:19', '0000-00-00 00:00:00', NULL),
(170, 'MGM', 'Peninsula Garden Midtwon Hms-B', '002', NULL, 'BP01', 'MGM-002', 1, '2019-12-17 23:04:19', '0000-00-00 00:00:00', NULL),
(171, 'MGM', 'PGMH- Maple Tower', '003', NULL, 'BP01', 'MGM-003', 1, '2019-12-17 23:04:19', '0000-00-00 00:00:00', NULL),
(172, 'MGM', 'PGMH- Maple Tower', '003', NULL, 'S01A', 'MGM-003', 1, '2019-12-17 23:04:19', '0000-00-00 00:00:00', NULL),
(173, 'MGM', 'PGMH-Narra Tower', '004', NULL, 'S01A', 'MGM-004', 1, '2019-12-17 23:04:19', '0000-00-00 00:00:00', NULL),
(174, 'MGM', 'PGMH-MagnoliaTower', '005', NULL, 'S01A', 'MGM-005', 1, '2019-12-17 23:04:19', '0000-00-00 00:00:00', NULL),
(175, 'MGM', 'PGMH-Mandarin Tower', '006', NULL, 'S01A', 'MGM-006', 1, '2019-12-17 23:04:19', '0000-00-00 00:00:00', NULL),
(176, 'MGM', 'PGMH-Mahogany Tower', '007', NULL, 'S01A', 'MGM-007', 1, '2019-12-17 23:04:19', '0000-00-00 00:00:00', NULL),
(177, 'MGM', 'PGMH - Mango Tower', '008', NULL, 'S01A', 'MGM-008', 1, '2019-12-17 23:04:19', '0000-00-00 00:00:00', NULL),
(178, 'MGM', 'Peninsula Garden Midtown Homes', '02A', NULL, 'BP01', 'MGM-02A', 1, '2019-12-17 23:04:19', '0000-00-00 00:00:00', NULL),
(179, 'MGT', 'Tropicana Garden City - Toledo', '001', NULL, 'BP01', 'MGT-001', 1, '2019-12-17 23:04:19', '0000-00-00 00:00:00', NULL),
(180, 'MGT', 'TGC-Valderrama Tower', '002', NULL, 'BP01', 'MGT-002', 1, '2019-12-17 23:04:19', '0000-00-00 00:00:00', NULL),
(181, 'MGT', 'Tropicana Garden City - Ibiza', '003', NULL, 'S01A', 'MGT-003', 1, '2019-12-17 23:04:19', '0000-00-00 00:00:00', NULL),
(182, 'MGT', 'TropicanaGardenCity-Valderrama', '02A', NULL, 'BP01', 'MGT-02A', 1, '2019-12-17 23:04:19', '0000-00-00 00:00:00', NULL),
(183, 'MGT', 'Tropicana Garden City-Pkg Bldg', 'PKG', NULL, 'S01A', 'MGT-PKG', 1, '2019-12-17 23:04:19', '0000-00-00 00:00:00', NULL),
(184, 'MPR', 'MP Residences', '001', NULL, 'BP01', 'MPR-001', 1, '2019-12-17 23:04:19', '0000-00-00 00:00:00', NULL),
(185, 'MPR', 'MP Residences 2', '002', NULL, 'BP01', 'MPR-002', 1, '2019-12-17 23:04:19', '0000-00-00 00:00:00', NULL),
(186, 'MPR', 'MPR Parkview', '003', NULL, 'BP01', 'MPR-003', 1, '2019-12-17 23:04:19', '0000-00-00 00:00:00', NULL),
(187, 'MPR', 'MPR Oceanview', '004', NULL, 'BP01', 'MPR-004', 1, '2019-12-17 23:04:19', '0000-00-00 00:00:00', NULL),
(188, 'MPR', 'MPR Parkplace', '005', NULL, 'BP01', 'MPR-005', 1, '2019-12-17 23:04:19', '0000-00-00 00:00:00', NULL),
(189, 'MQR', 'Marquinton Residences Alicante', '001', NULL, 'BP01', 'MQR-001', 1, '2019-12-17 23:04:20', '0000-00-00 00:00:00', NULL),
(190, 'MQR', 'Marquinton Res. - Barcelona', '002', NULL, 'BP01', 'MQR-002', 1, '2019-12-17 23:04:20', '0000-00-00 00:00:00', NULL),
(191, 'MQR', 'Marquinton Residences- Cordova', '003', NULL, 'BP01', 'MQR-003', 1, '2019-12-17 23:04:20', '0000-00-00 00:00:00', NULL),
(192, 'MQR', 'Marquinton Res. -Alicante HCAI', 'H01', NULL, 'S01A', 'MQR-H01', 1, '2019-12-17 23:04:20', '0000-00-00 00:00:00', NULL),
(193, 'OGH', 'OGR - Acacia Building', '001', NULL, 'BP01', 'OGH-001', 1, '2019-12-17 23:04:20', '0000-00-00 00:00:00', NULL),
(194, 'OGH', 'OGR - Bellflower Building', '002', NULL, 'BP01', 'OGH-002', 1, '2019-12-17 23:04:20', '0000-00-00 00:00:00', NULL),
(195, 'OGH', 'OGR- Cypress Building', '003', NULL, 'BP01', 'OGH-003', 1, '2019-12-17 23:04:20', '0000-00-00 00:00:00', NULL),
(196, 'OGM', 'Oriental Gardens Makati-Orchid', '001', NULL, 'BP01', 'OGM-001', 1, '2019-12-17 23:04:20', '0000-00-00 00:00:00', NULL),
(197, 'OGM', 'Oriental Gardens Makati-Lotus', '002', NULL, 'BP01', 'OGM-002', 1, '2019-12-17 23:04:20', '0000-00-00 00:00:00', NULL),
(198, 'OGM', 'Oriental Garden Makati Lotus', '002', NULL, 'S01A', 'OGM-002', 1, '2019-12-17 23:04:20', '0000-00-00 00:00:00', NULL),
(199, 'OGM', 'Oriental Gardens Makati-Lilac', '003', NULL, 'BP01', 'OGM-003', 1, '2019-12-17 23:04:20', '0000-00-00 00:00:00', NULL),
(200, 'OWS', 'One Wilson Square', '001', NULL, 'BP01', 'OWS-001', 1, '2019-12-17 23:04:20', '0000-00-00 00:00:00', NULL),
(201, 'PBV', 'Palm Beach Villas-Boracay', '001', NULL, 'S01A', 'PBV-001', 1, '2019-12-17 23:04:20', '0000-00-00 00:00:00', NULL),
(202, 'PBV', 'Palm Beach Villas-Panglao', '002', NULL, 'S01A', 'PBV-002', 1, '2019-12-17 23:04:20', '0000-00-00 00:00:00', NULL),
(203, 'PBV', 'Palm Beach West-Misibis Tower', '003', NULL, 'S01A', 'PBV-003', 1, '2019-12-17 23:04:20', '0000-00-00 00:00:00', NULL),
(204, 'PBV', 'Palm Beach West-Siargao Tower', '004', NULL, 'S01A', 'PBV-004', 1, '2019-12-17 23:04:20', '0000-00-00 00:00:00', NULL),
(205, 'PDR', 'Paseo De Roces-Legazpi Tower', '001', NULL, 'BP01', 'PDR-001', 1, '2019-12-17 23:04:20', '0000-00-00 00:00:00', NULL),
(206, 'PDR', 'Paseo De Roces-Salcedo Tower', '002', NULL, 'BP01', 'PDR-002', 1, '2019-12-17 23:04:20', '0000-00-00 00:00:00', NULL),
(207, 'PW', 'Park West', '001', NULL, 'BP01', 'PW-001', 1, '2019-12-17 23:04:20', '0000-00-00 00:00:00', NULL),
(208, 'RG', 'FSR-Plum Blossom Tower', '001', NULL, 'BP01', 'RG-001', 1, '2019-12-17 23:04:20', '0000-00-00 00:00:00', NULL),
(209, 'RG', 'Four Season Riviera- Lotus', '002', NULL, 'BP01', 'RG-002', 1, '2019-12-17 23:04:20', '0000-00-00 00:00:00', NULL),
(210, 'RVM', 'Riverview Mansion', '001', NULL, 'BP01', 'RVM-001', 1, '2019-12-17 23:04:20', '0000-00-00 00:00:00', NULL),
(211, 'SSR', 'Six Senses Resort - Tower 1', '001', NULL, 'BP01', 'SSR-001', 1, '2019-12-17 23:04:20', '0000-00-00 00:00:00', NULL),
(212, 'SSR', 'Six Senses Resort - Tower 2', '002', NULL, 'BP01', 'SSR-002', 1, '2019-12-17 23:04:20', '0000-00-00 00:00:00', NULL),
(213, 'SSR', 'Six Senses Resort - Tower 3', '003', NULL, 'BP01', 'SSR-003', 1, '2019-12-17 23:04:20', '0000-00-00 00:00:00', NULL),
(214, 'SSR', 'Six Senses Resort - Tower 4', '004', NULL, 'BP01', 'SSR-004', 1, '2019-12-17 23:04:21', '0000-00-00 00:00:00', NULL),
(215, 'SSR', 'Six Senses Resort - Tower 5', '005', NULL, 'BP01', 'SSR-005', 1, '2019-12-17 23:04:21', '0000-00-00 00:00:00', NULL),
(216, 'SSR', 'Six Senses Resort - Tower 6', '006', NULL, 'BP01', 'SSR-006', 1, '2019-12-17 23:04:21', '0000-00-00 00:00:00', NULL),
(217, 'ST', 'Siena Tower 1', '001', NULL, 'S01A', 'ST-001', 1, '2019-12-17 23:04:21', '0000-00-00 00:00:00', NULL),
(219, 'TAG', 'Lot 1 Outer Delta', '001', NULL, 'BP01', 'TAG-001', 1, '2019-12-17 23:04:21', '0000-00-00 00:00:00', NULL),
(220, 'TBA', 'TBA- Central Park West', '001', NULL, 'BP01', 'TBA-001', 1, '2019-12-17 23:04:21', '0000-00-00 00:00:00', NULL),
(221, 'TBA', 'TBA - Madison Park West', '002', NULL, 'BP01', 'TBA-002', 1, '2019-12-17 23:04:21', '0000-00-00 00:00:00', NULL),
(222, 'TBA', 'TIMES SQUARE WEST', '003', NULL, 'BP01', 'TBA-003', 1, '2019-12-17 23:04:21', '0000-00-00 00:00:00', NULL),
(223, 'TBA', 'PARK AVENUE', '004', NULL, 'BP01', 'TBA-004', 1, '2019-12-17 23:04:21', '0000-00-00 00:00:00', NULL),
(224, 'TBA', 'Test', '005', NULL, 'BP01', 'TBA-005', 1, '2019-12-17 23:04:21', '0000-00-00 00:00:00', NULL),
(225, 'TCT', 'The Capital Towers - Athens', '001', NULL, 'BP01', 'TCT-001', 1, '2019-12-17 23:04:21', '0000-00-00 00:00:00', NULL),
(226, 'TCT', 'The Capital Towers - Beijing', '002', NULL, 'BP01', 'TCT-002', 1, '2019-12-17 23:04:21', '0000-00-00 00:00:00', NULL),
(227, 'TCT', 'The Capital Towers - Rio', '003', NULL, 'BP01', 'TCT-003', 1, '2019-12-17 23:04:21', '0000-00-00 00:00:00', NULL),
(229, 'TGM', 'The Grand Midori Makati Tower2', '001', NULL, 'BP02', 'TGM-001', 1, '2019-12-17 23:04:21', '0000-00-00 00:00:00', NULL),
(230, 'TGM', 'The Grand Midori Makati 2', '002', NULL, 'BP02', 'TGM-002', 1, '2019-12-17 23:04:21', '0000-00-00 00:00:00', NULL),
(231, 'TOP', 'The Oriental Place', '001', NULL, 'BP01', 'TOP-001', 1, '2019-12-17 23:04:21', '0000-00-00 00:00:00', NULL),
(232, 'TRDC', 'TRDC-Farmsville', '001', NULL, 'S01G', 'TRDC-001', 1, '2019-12-17 23:04:21', '0000-00-00 00:00:00', NULL),
(233, 'TRDC', 'TRDC-Farmsville', '001', NULL, 'S01A', 'TRDC-001', 1, '2019-12-17 23:04:21', '0000-00-00 00:00:00', NULL),
(234, 'TSR', 'Haru Tower', 'A', NULL, 'BP07', 'TSR-A', 1, '2019-12-17 23:04:21', '0000-00-00 00:00:00', NULL),
(235, 'TSR', 'TSR TOWER B', 'B', NULL, 'BP07', 'TSR-B', 1, '2019-12-17 23:04:21', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project_distance`
--

CREATE TABLE `tbl_project_distance` (
  `id` int(11) NOT NULL,
  `project_from` int(11) NOT NULL,
  `project_to` int(11) NOT NULL,
  `distance` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_project_distance`
--

INSERT INTO `tbl_project_distance` (`id`, `project_from`, `project_to`, `distance`) VALUES
(1, 1, 6, 7),
(2, 2, 5, 11),
(3, 1, 3, 7.2),
(4, 5, 2, 11);

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
(5, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sap_company`
--

CREATE TABLE `tbl_sap_company` (
  `id` int(11) NOT NULL,
  `company_code` varchar(255) NOT NULL,
  `company_description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sap_company`
--

INSERT INTO `tbl_sap_company` (`id`, `company_code`, `company_description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(146, 'BP01', 'Federal Land, Inc.', '2019-12-17 23:04:07', '0000-00-00 00:00:00', NULL),
(147, 'BP02', 'Federal Land-Orix Corp.', '2019-12-17 23:04:07', '0000-00-00 00:00:00', NULL),
(148, 'BP03', 'GT Capital Holdings, Inc.', '2019-12-17 23:04:07', '0000-00-00 00:00:00', NULL),
(149, 'BP04', 'Philippine Securities Cor', '2019-12-17 23:04:07', '0000-00-00 00:00:00', NULL),
(150, 'BP05', 'Federal Homes Inc.', '2019-12-17 23:04:08', '0000-00-00 00:00:00', NULL),
(151, 'BP06', 'ST 6747 RESOURCES CORP.', '2019-12-17 23:04:08', '0000-00-00 00:00:00', NULL),
(152, 'BP07', 'Sunshine Fort North', '2019-12-17 23:04:08', '0000-00-00 00:00:00', NULL),
(153, 'BP08', 'Project Ortigas', '2019-12-17 23:04:08', '0000-00-00 00:00:00', NULL),
(154, 'BP09', 'Multi Fortune Holdings In', '2019-12-17 23:04:08', '0000-00-00 00:00:00', NULL),
(155, 'BP0X', 'Omni-Orient Mktg Net Inc.', '2019-12-17 23:04:08', '0000-00-00 00:00:00', NULL),
(156, 'S01A', 'Horizon Land Property Dev', '2019-12-17 23:04:08', '0000-00-00 00:00:00', NULL),
(157, 'S01B', 'Paco Realty Devp\'t Corp.', '2019-12-17 23:04:08', '0000-00-00 00:00:00', NULL),
(158, 'S01C', 'Omni-Orient Marketing', '2019-12-17 23:04:08', '0000-00-00 00:00:00', NULL),
(159, 'S01D', 'Fedsales Marketing, Inc.', '2019-12-17 23:04:08', '0000-00-00 00:00:00', NULL),
(160, 'S01E', 'Bonifacio Landmark Realty', '2019-12-17 23:04:08', '0000-00-00 00:00:00', NULL),
(161, 'S01F', 'Omni Orient Management', '2019-12-17 23:04:08', '0000-00-00 00:00:00', NULL),
(162, 'S01G', 'Topsphere Realty Dev\'t', '2019-12-17 23:04:08', '0000-00-00 00:00:00', NULL),
(163, 'S01H', 'Federal Brent Retail, Inc', '2019-12-17 23:04:08', '0000-00-00 00:00:00', NULL),
(164, 'S01I', 'Central Realty & Dev Corp', '2019-12-17 23:04:08', '0000-00-00 00:00:00', NULL),
(165, 'S01J', 'Alveo Federal Land', '2019-12-17 23:04:08', '0000-00-00 00:00:00', NULL),
(166, 'S01K', 'Crown Central Properties', '2019-12-17 23:04:08', '0000-00-00 00:00:00', NULL),
(167, 'S01L', 'North Bonifacio Landmark', '2019-12-17 23:04:08', '0000-00-00 00:00:00', NULL),
(168, 'S01M', 'MAGNIFICAT RESOURCES CORP', '2019-12-17 23:04:09', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sap_config`
--

CREATE TABLE `tbl_sap_config` (
  `id` int(11) NOT NULL,
  `sap_scheme` varchar(255) NOT NULL,
  `sap_domain` varchar(255) NOT NULL,
  `sap_base` varchar(255) NOT NULL,
  `auth_cookie` text NOT NULL,
  `auth_username` varchar(255) DEFAULT NULL,
  `auth_password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sap_config`
--

INSERT INTO `tbl_sap_config` (`id`, `sap_scheme`, `sap_domain`, `sap_base`, `auth_cookie`, `auth_username`, `auth_password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'http', 'vtrident.fedland.local:8000', '/weserve/rest/v1', 'a:2:{i:0;a:9:{s:4:\"Name\";s:15:\"sap-usercontext\";s:5:\"Value\";s:14:\"sap-client=300\";s:6:\"Domain\";s:22:\"vtrident.fedland.local\";s:4:\"Path\";s:1:\"/\";s:7:\"Max-Age\";N;s:7:\"Expires\";N;s:6:\"Secure\";b:0;s:7:\"Discard\";b:0;s:8:\"HttpOnly\";b:0;}i:1;a:9:{s:4:\"Name\";s:21:\"SAP_SESSIONID_FLD_300\";s:5:\"Value\";s:46:\"gjgv1aZG_VR0fuDba5Y2xy1ZjSghXBHqgNkAUFahPho%3d\";s:6:\"Domain\";s:22:\"vtrident.fedland.local\";s:4:\"Path\";s:1:\"/\";s:7:\"Max-Age\";N;s:7:\"Expires\";N;s:6:\"Secure\";b:0;s:7:\"Discard\";b:0;s:8:\"HttpOnly\";b:0;}}', 'admin', 'Federal@01', '2019-12-02 05:37:00', '2019-12-18 06:04:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sap_floors`
--

CREATE TABLE `tbl_sap_floors` (
  `id` int(11) NOT NULL,
  `floor_code` varchar(255) NOT NULL,
  `company_code` varchar(255) NOT NULL,
  `project_code` varchar(255) NOT NULL,
  `is_activated` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sap_floors`
--

INSERT INTO `tbl_sap_floors` (`id`, `floor_code`, `company_code`, `project_code`, `is_activated`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2499, '01ST COMM', 'BP01', 'BCR-001', 1, '2019-12-17 23:04:36', '0000-00-00 00:00:00', NULL),
(2500, '02ND FLOOR', 'BP01', 'BCR-001', 1, '2019-12-17 23:04:36', '0000-00-00 00:00:00', NULL),
(2501, '03RD FLOOR', 'BP01', 'BCR-001', 1, '2019-12-17 23:04:36', '0000-00-00 00:00:00', NULL),
(2502, '05TH FLOOR', 'BP01', 'BCR-001', 1, '2019-12-17 23:04:36', '0000-00-00 00:00:00', NULL),
(2503, '06TH FLOOR', 'BP01', 'BCR-001', 1, '2019-12-17 23:04:36', '0000-00-00 00:00:00', NULL),
(2504, '07TH FLOOR', 'BP01', 'BCR-001', 1, '2019-12-17 23:04:36', '0000-00-00 00:00:00', NULL),
(2505, '08TH FLOOR', 'BP01', 'BCR-001', 1, '2019-12-17 23:04:36', '0000-00-00 00:00:00', NULL),
(2506, '09TH FLOOR', 'BP01', 'BCR-001', 1, '2019-12-17 23:04:36', '0000-00-00 00:00:00', NULL),
(2507, '10TH FLOOR', 'BP01', 'BCR-001', 1, '2019-12-17 23:04:36', '0000-00-00 00:00:00', NULL),
(2508, '11TH FLOOR', 'BP01', 'BCR-001', 1, '2019-12-17 23:04:36', '0000-00-00 00:00:00', NULL),
(2509, '12TH FLOOR', 'BP01', 'BCR-001', 1, '2019-12-17 23:04:36', '0000-00-00 00:00:00', NULL),
(2510, '15TH / 16TH', 'BP01', 'BCR-001', 1, '2019-12-17 23:04:36', '0000-00-00 00:00:00', NULL),
(2511, '17TH / 18TH', 'BP01', 'BCR-001', 1, '2019-12-17 23:04:37', '0000-00-00 00:00:00', NULL),
(2512, '19TH / 20TH', 'BP01', 'BCR-001', 1, '2019-12-17 23:04:37', '0000-00-00 00:00:00', NULL),
(2513, 'LOWER PKG', 'BP01', 'BCR-001', 1, '2019-12-17 23:04:37', '0000-00-00 00:00:00', NULL),
(2514, 'MEZZANINE', 'BP01', 'BCR-001', 1, '2019-12-17 23:04:37', '0000-00-00 00:00:00', NULL),
(2515, '01ST COMM8', 'BP01', 'BCR-002', 1, '2019-12-17 23:04:37', '0000-00-00 00:00:00', NULL),
(2516, '03RD FLOOR', 'BP01', 'BCR-002', 1, '2019-12-17 23:04:37', '0000-00-00 00:00:00', NULL),
(2517, '05TH FLOOR', 'BP01', 'BCR-002', 1, '2019-12-17 23:04:37', '0000-00-00 00:00:00', NULL),
(2518, '06TH FLOOR', 'BP01', 'BCR-002', 1, '2019-12-17 23:04:37', '0000-00-00 00:00:00', NULL),
(2519, '07TH FLOOR', 'BP01', 'BCR-002', 1, '2019-12-17 23:04:37', '0000-00-00 00:00:00', NULL),
(2520, '08TH FLOOR', 'BP01', 'BCR-002', 1, '2019-12-17 23:04:37', '0000-00-00 00:00:00', NULL),
(2521, '09TH FLOOR', 'BP01', 'BCR-002', 1, '2019-12-17 23:04:37', '0000-00-00 00:00:00', NULL),
(2522, '10TH FLOOR', 'BP01', 'BCR-002', 1, '2019-12-17 23:04:37', '0000-00-00 00:00:00', NULL),
(2523, '11TH FLOOR', 'BP01', 'BCR-002', 1, '2019-12-17 23:04:37', '0000-00-00 00:00:00', NULL),
(2524, '12TH FLOOR', 'BP01', 'BCR-002', 1, '2019-12-17 23:04:37', '0000-00-00 00:00:00', NULL),
(2525, '15TH FLOOR', 'BP01', 'BCR-002', 1, '2019-12-17 23:04:37', '0000-00-00 00:00:00', NULL),
(2526, '16TH FLOOR', 'BP01', 'BCR-002', 1, '2019-12-17 23:04:37', '0000-00-00 00:00:00', NULL),
(2527, '17TH FLOOR', 'BP01', 'BCR-002', 1, '2019-12-17 23:04:37', '0000-00-00 00:00:00', NULL),
(2528, '18TH FLOOR', 'BP01', 'BCR-002', 1, '2019-12-17 23:04:37', '0000-00-00 00:00:00', NULL),
(2529, '19TH FLOOR', 'BP01', 'BCR-002', 1, '2019-12-17 23:04:37', '0000-00-00 00:00:00', NULL),
(2530, '20TH FLOOR', 'BP01', 'BCR-002', 1, '2019-12-17 23:04:37', '0000-00-00 00:00:00', NULL),
(2531, 'LOWER PKG', 'BP01', 'BCR-002', 1, '2019-12-17 23:04:37', '0000-00-00 00:00:00', NULL),
(2532, ' 01ST PKG', 'BP01', 'BCR-003', 1, '2019-12-17 23:04:37', '0000-00-00 00:00:00', NULL),
(2533, '01ST COMM', 'BP01', 'BCR-003', 1, '2019-12-17 23:04:37', '0000-00-00 00:00:00', NULL),
(2534, '03RD FLOOR', 'BP01', 'BCR-003', 1, '2019-12-17 23:04:37', '0000-00-00 00:00:00', NULL),
(2535, '05TH FLOOR', 'BP01', 'BCR-003', 1, '2019-12-17 23:04:37', '0000-00-00 00:00:00', NULL),
(2536, '06TH FLOOR', 'BP01', 'BCR-003', 1, '2019-12-17 23:04:37', '0000-00-00 00:00:00', NULL),
(2537, '07TH FLOOR', 'BP01', 'BCR-003', 1, '2019-12-17 23:04:38', '0000-00-00 00:00:00', NULL),
(2538, '08TH FLOOR', 'BP01', 'BCR-003', 1, '2019-12-17 23:04:38', '0000-00-00 00:00:00', NULL),
(2539, '09TH FLOOR', 'BP01', 'BCR-003', 1, '2019-12-17 23:04:38', '0000-00-00 00:00:00', NULL),
(2540, '10TH FLOOR', 'BP01', 'BCR-003', 1, '2019-12-17 23:04:38', '0000-00-00 00:00:00', NULL),
(2541, '11TH FLOOR', 'BP01', 'BCR-003', 1, '2019-12-17 23:04:38', '0000-00-00 00:00:00', NULL),
(2542, '12TH FLOOR', 'BP01', 'BCR-003', 1, '2019-12-17 23:04:38', '0000-00-00 00:00:00', NULL),
(2543, '15TH FLOOR', 'BP01', 'BCR-003', 1, '2019-12-17 23:04:38', '0000-00-00 00:00:00', NULL),
(2544, '16TH FLOOR', 'BP01', 'BCR-003', 1, '2019-12-17 23:04:38', '0000-00-00 00:00:00', NULL),
(2545, '17TH FLOOR', 'BP01', 'BCR-003', 1, '2019-12-17 23:04:38', '0000-00-00 00:00:00', NULL),
(2546, '18TH FLOOR', 'BP01', 'BCR-003', 1, '2019-12-17 23:04:38', '0000-00-00 00:00:00', NULL),
(2547, '19/20TH FLR', 'BP01', 'BCR-003', 1, '2019-12-17 23:04:38', '0000-00-00 00:00:00', NULL),
(2548, '2ND FLR', 'BP01', 'BCR-010', 1, '2019-12-17 23:04:38', '0000-00-00 00:00:00', NULL),
(2549, 'GRND FLR', 'BP01', 'BCR-010', 1, '2019-12-17 23:04:38', '0000-00-00 00:00:00', NULL),
(2550, '2ND FLR', 'BP01', 'BCR-011', 1, '2019-12-17 23:04:38', '0000-00-00 00:00:00', NULL),
(2551, 'GRND FLR', 'BP01', 'BCR-011', 1, '2019-12-17 23:04:38', '0000-00-00 00:00:00', NULL),
(2552, '2ND FLR', 'BP01', 'BCR-012', 1, '2019-12-17 23:04:38', '0000-00-00 00:00:00', NULL),
(2553, 'GRND FLR', 'BP01', 'BCR-012', 1, '2019-12-17 23:04:38', '0000-00-00 00:00:00', NULL),
(2554, 'MEZZANINE', 'BP01', 'BCR-012', 1, '2019-12-17 23:04:38', '0000-00-00 00:00:00', NULL),
(2555, '2ND FLR', 'BP01', 'BCR-013', 1, '2019-12-17 23:04:38', '0000-00-00 00:00:00', NULL),
(2556, 'GRND FLR', 'BP01', 'BCR-013', 1, '2019-12-17 23:04:38', '0000-00-00 00:00:00', NULL),
(2557, 'MEZZANINE', 'BP01', 'BCR-013', 1, '2019-12-17 23:04:38', '0000-00-00 00:00:00', NULL),
(2558, '2ND FLR', 'BP01', 'BCR-014', 1, '2019-12-17 23:04:39', '0000-00-00 00:00:00', NULL),
(2559, 'GRND FLR', 'BP01', 'BCR-014', 1, '2019-12-17 23:04:39', '0000-00-00 00:00:00', NULL),
(2560, '10TH FLR', 'BP01', 'BCR-015', 1, '2019-12-17 23:04:39', '0000-00-00 00:00:00', NULL),
(2561, '11TH FLR', 'BP01', 'BCR-015', 1, '2019-12-17 23:04:39', '0000-00-00 00:00:00', NULL),
(2562, '12TH FLR', 'BP01', 'BCR-015', 1, '2019-12-17 23:04:39', '0000-00-00 00:00:00', NULL),
(2563, '14TH FLR', 'BP01', 'BCR-015', 1, '2019-12-17 23:04:39', '0000-00-00 00:00:00', NULL),
(2564, '15TH FLR', 'BP01', 'BCR-015', 1, '2019-12-17 23:04:39', '0000-00-00 00:00:00', NULL),
(2565, '16TH FLOOR', 'BP01', 'BCR-015', 1, '2019-12-17 23:04:39', '0000-00-00 00:00:00', NULL),
(2566, '2ND FLOOR', 'BP01', 'BCR-015', 1, '2019-12-17 23:04:39', '0000-00-00 00:00:00', NULL),
(2567, '3RD FLOOR', 'BP01', 'BCR-015', 1, '2019-12-17 23:04:39', '0000-00-00 00:00:00', NULL),
(2568, '4TH FLOOR', 'BP01', 'BCR-015', 1, '2019-12-17 23:04:39', '0000-00-00 00:00:00', NULL),
(2569, '5TH FLOOR', 'BP01', 'BCR-015', 1, '2019-12-17 23:04:39', '0000-00-00 00:00:00', NULL),
(2570, '6TH FLR', 'BP01', 'BCR-015', 1, '2019-12-17 23:04:39', '0000-00-00 00:00:00', NULL),
(2571, '7TH FLR', 'BP01', 'BCR-015', 1, '2019-12-17 23:04:39', '0000-00-00 00:00:00', NULL),
(2572, '8TH FLR', 'BP01', 'BCR-015', 1, '2019-12-17 23:04:39', '0000-00-00 00:00:00', NULL),
(2573, '9TH FLOOR', 'BP01', 'BCR-015', 1, '2019-12-17 23:04:39', '0000-00-00 00:00:00', NULL),
(2574, 'GRND FLOOR', 'BP01', 'BCR-015', 1, '2019-12-17 23:04:39', '0000-00-00 00:00:00', NULL),
(2575, 'GRND FLOOR', 'BP01', 'BCR-016', 1, '2019-12-17 23:04:39', '0000-00-00 00:00:00', NULL),
(2576, 'LOWER PKG', 'BP01', 'BCR-016', 1, '2019-12-17 23:04:39', '0000-00-00 00:00:00', NULL),
(2577, '2ND FLOOR', 'BP01', 'BCR-017', 1, '2019-12-17 23:04:39', '0000-00-00 00:00:00', NULL),
(2578, '3RD FLOOR', 'BP01', 'BCR-017', 1, '2019-12-17 23:04:39', '0000-00-00 00:00:00', NULL),
(2579, '4TH FLOOR', 'BP01', 'BCR-017', 1, '2019-12-17 23:04:39', '0000-00-00 00:00:00', NULL),
(2580, '5TH FLOOR', 'BP01', 'BCR-017', 1, '2019-12-17 23:04:39', '0000-00-00 00:00:00', NULL),
(2581, '6TH FLOOR', 'BP01', 'BCR-017', 1, '2019-12-17 23:04:39', '0000-00-00 00:00:00', NULL),
(2582, 'GRND FLOOR', 'BP01', 'BCR-017', 1, '2019-12-17 23:04:40', '0000-00-00 00:00:00', NULL),
(2583, 'LOWER PKG', 'BP01', 'BCR-017', 1, '2019-12-17 23:04:40', '0000-00-00 00:00:00', NULL),
(2584, '2ND FLOOR', 'BP01', 'BCR-018', 1, '2019-12-17 23:04:40', '0000-00-00 00:00:00', NULL),
(2585, '3RD FLOOR', 'BP01', 'BCR-018', 1, '2019-12-17 23:04:40', '0000-00-00 00:00:00', NULL),
(2586, '4TH FLOOR', 'BP01', 'BCR-018', 1, '2019-12-17 23:04:40', '0000-00-00 00:00:00', NULL),
(2587, '5TH FLOOR', 'BP01', 'BCR-018', 1, '2019-12-17 23:04:40', '0000-00-00 00:00:00', NULL),
(2588, '6TH FLOOR', 'BP01', 'BCR-018', 1, '2019-12-17 23:04:40', '0000-00-00 00:00:00', NULL),
(2589, 'GRND FLOOR', 'BP01', 'BCR-018', 1, '2019-12-17 23:04:40', '0000-00-00 00:00:00', NULL),
(2590, 'LOWER PKG', 'BP01', 'BCR-018', 1, '2019-12-17 23:04:40', '0000-00-00 00:00:00', NULL),
(2591, '2ND FLOOR', 'BP01', 'BCR-019', 1, '2019-12-17 23:04:40', '0000-00-00 00:00:00', NULL),
(2592, 'GRND FLOOR', 'BP01', 'BCR-019', 1, '2019-12-17 23:04:40', '0000-00-00 00:00:00', NULL),
(2593, '10TH FLOOR', 'BP01', 'BCR-020', 1, '2019-12-17 23:04:40', '0000-00-00 00:00:00', NULL),
(2594, '11TH FLOOR', 'BP01', 'BCR-020', 1, '2019-12-17 23:04:40', '0000-00-00 00:00:00', NULL),
(2595, '12TH FLOOR', 'BP01', 'BCR-020', 1, '2019-12-17 23:04:40', '0000-00-00 00:00:00', NULL),
(2596, '13TH FLOOR', 'BP01', 'BCR-020', 1, '2019-12-17 23:04:40', '0000-00-00 00:00:00', NULL),
(2597, '14TH FLOOR', 'BP01', 'BCR-020', 1, '2019-12-17 23:04:40', '0000-00-00 00:00:00', NULL),
(2598, '15TH FLOOR', 'BP01', 'BCR-020', 1, '2019-12-17 23:04:40', '0000-00-00 00:00:00', NULL),
(2599, '16TH FLOOR', 'BP01', 'BCR-020', 1, '2019-12-17 23:04:40', '0000-00-00 00:00:00', NULL),
(2600, '17TH FLOOR', 'BP01', 'BCR-020', 1, '2019-12-17 23:04:40', '0000-00-00 00:00:00', NULL),
(2601, '2ND FLOOR', 'BP01', 'BCR-020', 1, '2019-12-17 23:04:40', '0000-00-00 00:00:00', NULL),
(2602, '3RD FLOOR', 'BP01', 'BCR-020', 1, '2019-12-17 23:04:40', '0000-00-00 00:00:00', NULL),
(2603, '4TH FLOOR', 'BP01', 'BCR-020', 1, '2019-12-17 23:04:40', '0000-00-00 00:00:00', NULL),
(2604, '5TH FLOOR', 'BP01', 'BCR-020', 1, '2019-12-17 23:04:40', '0000-00-00 00:00:00', NULL),
(2605, '6TH FLOOR', 'BP01', 'BCR-020', 1, '2019-12-17 23:04:40', '0000-00-00 00:00:00', NULL),
(2606, '7TH FLOOR', 'BP01', 'BCR-020', 1, '2019-12-17 23:04:40', '0000-00-00 00:00:00', NULL),
(2607, '8TH FLOOR', 'BP01', 'BCR-020', 1, '2019-12-17 23:04:40', '0000-00-00 00:00:00', NULL),
(2608, '9TH FLOOR', 'BP01', 'BCR-020', 1, '2019-12-17 23:04:40', '0000-00-00 00:00:00', NULL),
(2609, 'GRND FLOOR', 'BP01', 'BCR-020', 1, '2019-12-17 23:04:40', '0000-00-00 00:00:00', NULL),
(2610, 'LOWER PKG', 'BP01', 'BCR-020', 1, '2019-12-17 23:04:41', '0000-00-00 00:00:00', NULL),
(2611, '2ND FLOOR', 'BP01', 'BCR-021', 1, '2019-12-17 23:04:41', '0000-00-00 00:00:00', NULL),
(2612, '3RD FLOOR', 'BP01', 'BCR-021', 1, '2019-12-17 23:04:41', '0000-00-00 00:00:00', NULL),
(2613, '4TH FLOOR', 'BP01', 'BCR-021', 1, '2019-12-17 23:04:41', '0000-00-00 00:00:00', NULL),
(2614, '5TH FLOOR', 'BP01', 'BCR-021', 1, '2019-12-17 23:04:41', '0000-00-00 00:00:00', NULL),
(2615, 'GRND FLOOR', 'BP01', 'BCR-021', 1, '2019-12-17 23:04:41', '0000-00-00 00:00:00', NULL),
(2616, '2ND FLOOR', 'BP01', 'BCR-022', 1, '2019-12-17 23:04:41', '0000-00-00 00:00:00', NULL),
(2617, 'GRND FLOOR', 'BP01', 'BCR-022', 1, '2019-12-17 23:04:41', '0000-00-00 00:00:00', NULL),
(2618, '01ST FLOOR', 'BP01', 'BG-001', 1, '2019-12-17 23:04:41', '0000-00-00 00:00:00', NULL),
(2619, '01ST PKG', 'BP01', 'BG-001', 1, '2019-12-17 23:04:41', '0000-00-00 00:00:00', NULL),
(2620, '02ND FLOOR', 'BP01', 'BG-001', 1, '2019-12-17 23:04:41', '0000-00-00 00:00:00', NULL),
(2621, '03RD FLOOR', 'BP01', 'BG-001', 1, '2019-12-17 23:04:41', '0000-00-00 00:00:00', NULL),
(2622, '05TH FLOOR', 'BP01', 'BG-001', 1, '2019-12-17 23:04:41', '0000-00-00 00:00:00', NULL),
(2623, '06TH FLOOR', 'BP01', 'BG-001', 1, '2019-12-17 23:04:41', '0000-00-00 00:00:00', NULL),
(2624, '07TH FLOOR', 'BP01', 'BG-001', 1, '2019-12-17 23:04:41', '0000-00-00 00:00:00', NULL),
(2625, '08TH FLOOR', 'BP01', 'BG-001', 1, '2019-12-17 23:04:41', '0000-00-00 00:00:00', NULL),
(2626, '09TH FLOOR', 'BP01', 'BG-001', 1, '2019-12-17 23:04:41', '0000-00-00 00:00:00', NULL),
(2627, '10TH FLOOR', 'BP01', 'BG-001', 1, '2019-12-17 23:04:41', '0000-00-00 00:00:00', NULL),
(2628, '11TH FLOOR', 'BP01', 'BG-001', 1, '2019-12-17 23:04:41', '0000-00-00 00:00:00', NULL),
(2629, '12TH FLOOR', 'BP01', 'BG-001', 1, '2019-12-17 23:04:41', '0000-00-00 00:00:00', NULL),
(2630, '14TH FLOOR', 'BP01', 'BG-001', 1, '2019-12-17 23:04:42', '0000-00-00 00:00:00', NULL),
(2631, '15TH FLOOR', 'BP01', 'BG-001', 1, '2019-12-17 23:04:42', '0000-00-00 00:00:00', NULL),
(2632, '16TH FLOOR', 'BP01', 'BG-001', 1, '2019-12-17 23:04:42', '0000-00-00 00:00:00', NULL),
(2633, '17TH FLOOR', 'BP01', 'BG-001', 1, '2019-12-17 23:04:42', '0000-00-00 00:00:00', NULL),
(2634, '03RD FLOOR', 'BP01', 'BG-002', 1, '2019-12-17 23:04:42', '0000-00-00 00:00:00', NULL),
(2635, '05TH FLOOR', 'BP01', 'BG-002', 1, '2019-12-17 23:04:42', '0000-00-00 00:00:00', NULL),
(2636, '06TH FLOOR', 'BP01', 'BG-002', 1, '2019-12-17 23:04:42', '0000-00-00 00:00:00', NULL),
(2637, '07TH FLOOR', 'BP01', 'BG-002', 1, '2019-12-17 23:04:42', '0000-00-00 00:00:00', NULL),
(2638, '08TH FLOOR', 'BP01', 'BG-002', 1, '2019-12-17 23:04:42', '0000-00-00 00:00:00', NULL),
(2639, '09TH FLOOR', 'BP01', 'BG-002', 1, '2019-12-17 23:04:42', '0000-00-00 00:00:00', NULL),
(2640, '10TH FLOOR', 'BP01', 'BG-002', 1, '2019-12-17 23:04:42', '0000-00-00 00:00:00', NULL),
(2641, '11TH FLOOR', 'BP01', 'BG-002', 1, '2019-12-17 23:04:42', '0000-00-00 00:00:00', NULL),
(2642, '12TH FLOOR', 'BP01', 'BG-002', 1, '2019-12-17 23:04:42', '0000-00-00 00:00:00', NULL),
(2643, '14TH FLOOR', 'BP01', 'BG-002', 1, '2019-12-17 23:04:42', '0000-00-00 00:00:00', NULL),
(2644, '15TH FLOOR', 'BP01', 'BG-002', 1, '2019-12-17 23:04:42', '0000-00-00 00:00:00', NULL),
(2645, '16TH FLOOR', 'BP01', 'BG-002', 1, '2019-12-17 23:04:42', '0000-00-00 00:00:00', NULL),
(2646, '17TH FLOOR', 'BP01', 'BG-002', 1, '2019-12-17 23:04:42', '0000-00-00 00:00:00', NULL),
(2647, '01ST PKG', 'BP01', 'BG-003', 1, '2019-12-17 23:04:42', '0000-00-00 00:00:00', NULL),
(2648, '02ND FLOOR', 'BP01', 'BG-003', 1, '2019-12-17 23:04:42', '0000-00-00 00:00:00', NULL),
(2649, '03RD FLOOR', 'BP01', 'BG-003', 1, '2019-12-17 23:04:42', '0000-00-00 00:00:00', NULL),
(2650, '05TH FLOOR', 'BP01', 'BG-003', 1, '2019-12-17 23:04:42', '0000-00-00 00:00:00', NULL),
(2651, '06TH FLOOR', 'BP01', 'BG-003', 1, '2019-12-17 23:04:43', '0000-00-00 00:00:00', NULL),
(2652, '07TH FLOOR', 'BP01', 'BG-003', 1, '2019-12-17 23:04:43', '0000-00-00 00:00:00', NULL),
(2653, '08TH FLOOR', 'BP01', 'BG-003', 1, '2019-12-17 23:04:43', '0000-00-00 00:00:00', NULL),
(2654, '09TH FLOOR', 'BP01', 'BG-003', 1, '2019-12-17 23:04:43', '0000-00-00 00:00:00', NULL),
(2655, '10TH FLOOR', 'BP01', 'BG-003', 1, '2019-12-17 23:04:43', '0000-00-00 00:00:00', NULL),
(2656, '11TH FLOOR', 'BP01', 'BG-003', 1, '2019-12-17 23:04:43', '0000-00-00 00:00:00', NULL),
(2657, '12TH FLOOR', 'BP01', 'BG-003', 1, '2019-12-17 23:04:43', '0000-00-00 00:00:00', NULL),
(2658, '14TH FLOOR', 'BP01', 'BG-003', 1, '2019-12-17 23:04:43', '0000-00-00 00:00:00', NULL),
(2659, '15TH FLOOR', 'BP01', 'BG-003', 1, '2019-12-17 23:04:43', '0000-00-00 00:00:00', NULL),
(2660, '16TH FLOOR', 'BP01', 'BG-003', 1, '2019-12-17 23:04:43', '0000-00-00 00:00:00', NULL),
(2661, '17TH FLOOR', 'BP01', 'BG-003', 1, '2019-12-17 23:04:43', '0000-00-00 00:00:00', NULL),
(2662, ' LOWER PKG', 'BP01', 'BGR-001', 1, '2019-12-17 23:04:43', '0000-00-00 00:00:00', NULL),
(2663, ' UPPER PKG', 'BP01', 'BGR-001', 1, '2019-12-17 23:04:43', '0000-00-00 00:00:00', NULL),
(2664, '02ND FLOOR', 'BP01', 'BGR-001', 1, '2019-12-17 23:04:43', '0000-00-00 00:00:00', NULL),
(2665, '03RD FLOOR', 'BP01', 'BGR-001', 1, '2019-12-17 23:04:43', '0000-00-00 00:00:00', NULL),
(2666, '05TH FLOOR', 'BP01', 'BGR-001', 1, '2019-12-17 23:04:43', '0000-00-00 00:00:00', NULL),
(2667, '06TH FLOOR', 'BP01', 'BGR-001', 1, '2019-12-17 23:04:43', '0000-00-00 00:00:00', NULL),
(2668, '07TH FLOOR', 'BP01', 'BGR-001', 1, '2019-12-17 23:04:43', '0000-00-00 00:00:00', NULL),
(2669, '08TH FLOOR', 'BP01', 'BGR-001', 1, '2019-12-17 23:04:43', '0000-00-00 00:00:00', NULL),
(2670, '09TH FLOOR', 'BP01', 'BGR-001', 1, '2019-12-17 23:04:43', '0000-00-00 00:00:00', NULL),
(2671, '10TH FLOOR', 'BP01', 'BGR-001', 1, '2019-12-17 23:04:43', '0000-00-00 00:00:00', NULL),
(2672, '11TH FLOOR', 'BP01', 'BGR-001', 1, '2019-12-17 23:04:43', '0000-00-00 00:00:00', NULL),
(2673, '12TH FLOOR', 'BP01', 'BGR-001', 1, '2019-12-17 23:04:43', '0000-00-00 00:00:00', NULL),
(2674, '14TH FLOOR', 'BP01', 'BGR-001', 1, '2019-12-17 23:04:43', '0000-00-00 00:00:00', NULL),
(2675, '15TH FLOOR', 'BP01', 'BGR-001', 1, '2019-12-17 23:04:43', '0000-00-00 00:00:00', NULL),
(2676, '16TH FLOOR', 'BP01', 'BGR-001', 1, '2019-12-17 23:04:43', '0000-00-00 00:00:00', NULL),
(2677, '17TH FLOOR', 'BP01', 'BGR-001', 1, '2019-12-17 23:04:43', '0000-00-00 00:00:00', NULL),
(2678, '18TH FLOOR', 'BP01', 'BGR-001', 1, '2019-12-17 23:04:44', '0000-00-00 00:00:00', NULL),
(2679, ' LOWER PKG', 'BP01', 'BGR-002', 1, '2019-12-17 23:04:44', '0000-00-00 00:00:00', NULL),
(2680, ' UPPER PKG', 'BP01', 'BGR-002', 1, '2019-12-17 23:04:44', '0000-00-00 00:00:00', NULL),
(2681, '01ST FLOOR', 'BP01', 'BGR-002', 1, '2019-12-17 23:04:44', '0000-00-00 00:00:00', NULL),
(2682, '02ND FLOOR', 'BP01', 'BGR-002', 1, '2019-12-17 23:04:44', '0000-00-00 00:00:00', NULL),
(2683, '03RD FLOOR', 'BP01', 'BGR-002', 1, '2019-12-17 23:04:44', '0000-00-00 00:00:00', NULL),
(2684, '05TH FLOOR', 'BP01', 'BGR-002', 1, '2019-12-17 23:04:44', '0000-00-00 00:00:00', NULL),
(2685, '06TH FLOOR', 'BP01', 'BGR-002', 1, '2019-12-17 23:04:44', '0000-00-00 00:00:00', NULL),
(2686, '07TH FLOOR', 'BP01', 'BGR-002', 1, '2019-12-17 23:04:44', '0000-00-00 00:00:00', NULL),
(2687, '08TH FLOOR', 'BP01', 'BGR-002', 1, '2019-12-17 23:04:44', '0000-00-00 00:00:00', NULL),
(2688, '09TH FLOOR', 'BP01', 'BGR-002', 1, '2019-12-17 23:04:44', '0000-00-00 00:00:00', NULL),
(2689, '10TH FLOOR', 'BP01', 'BGR-002', 1, '2019-12-17 23:04:44', '0000-00-00 00:00:00', NULL),
(2690, '11TH FLOOR', 'BP01', 'BGR-002', 1, '2019-12-17 23:04:44', '0000-00-00 00:00:00', NULL),
(2691, '12TH FLOOR', 'BP01', 'BGR-002', 1, '2019-12-17 23:04:44', '0000-00-00 00:00:00', NULL),
(2692, '14TH FLOOR', 'BP01', 'BGR-002', 1, '2019-12-17 23:04:44', '0000-00-00 00:00:00', NULL),
(2693, '15TH FLOOR', 'BP01', 'BGR-002', 1, '2019-12-17 23:04:44', '0000-00-00 00:00:00', NULL),
(2694, '17TH FLOOR', 'BP01', 'BGR-002', 1, '2019-12-17 23:04:44', '0000-00-00 00:00:00', NULL),
(2695, '05TH FLOOR', 'BP01', 'BRC-001', 1, '2019-12-17 23:04:44', '0000-00-00 00:00:00', NULL),
(2696, '09TH FLOOR', 'BP01', 'BRC-001', 1, '2019-12-17 23:04:44', '0000-00-00 00:00:00', NULL),
(2697, '14TH FLOOR', 'BP01', 'BRC-001', 1, '2019-12-17 23:04:44', '0000-00-00 00:00:00', NULL),
(2698, '17TH FLOOR', 'BP01', 'BRC-001', 1, '2019-12-17 23:04:44', '0000-00-00 00:00:00', NULL),
(2699, '1ST FLOOR', 'BP01', 'JCA-001', 1, '2019-12-17 23:04:44', '0000-00-00 00:00:00', NULL),
(2700, ' 01ST PKG', 'BP01', 'MGM-001', 1, '2019-12-17 23:04:44', '0000-00-00 00:00:00', NULL),
(2701, ' 02ND PKG', 'BP01', 'MGM-001', 1, '2019-12-17 23:04:44', '0000-00-00 00:00:00', NULL),
(2702, ' 03RD PKG', 'BP01', 'MGM-001', 1, '2019-12-17 23:04:44', '0000-00-00 00:00:00', NULL),
(2703, '03RD FLOOR', 'BP01', 'MGM-001', 1, '2019-12-17 23:04:45', '0000-00-00 00:00:00', NULL),
(2704, '05TH FLOOR', 'BP01', 'MGM-001', 1, '2019-12-17 23:04:45', '0000-00-00 00:00:00', NULL),
(2705, '06TH FLOOR', 'BP01', 'MGM-001', 1, '2019-12-17 23:04:45', '0000-00-00 00:00:00', NULL),
(2706, '07TH FLOOR', 'BP01', 'MGM-001', 1, '2019-12-17 23:04:45', '0000-00-00 00:00:00', NULL),
(2707, '08TH FLOOR', 'BP01', 'MGM-001', 1, '2019-12-17 23:04:45', '0000-00-00 00:00:00', NULL),
(2708, '09TH FLOOR', 'BP01', 'MGM-001', 1, '2019-12-17 23:04:45', '0000-00-00 00:00:00', NULL),
(2709, '10TH FLOOR', 'BP01', 'MGM-001', 1, '2019-12-17 23:04:45', '0000-00-00 00:00:00', NULL),
(2710, '11TH FLOOR', 'BP01', 'MGM-001', 1, '2019-12-17 23:04:45', '0000-00-00 00:00:00', NULL),
(2711, '12TH FLOOR', 'BP01', 'MGM-001', 1, '2019-12-17 23:04:45', '0000-00-00 00:00:00', NULL),
(2712, '15TH FLOOR', 'BP01', 'MGM-001', 1, '2019-12-17 23:04:45', '0000-00-00 00:00:00', NULL),
(2713, '16TH FLOOR', 'BP01', 'MGM-001', 1, '2019-12-17 23:04:45', '0000-00-00 00:00:00', NULL),
(2714, '17TH FLOOR', 'BP01', 'MGM-001', 1, '2019-12-17 23:04:45', '0000-00-00 00:00:00', NULL),
(2715, '18TH FLOOR', 'BP01', 'MGM-001', 1, '2019-12-17 23:04:45', '0000-00-00 00:00:00', NULL),
(2716, ' 01ST PKG', 'BP01', 'MGM-002', 1, '2019-12-17 23:04:45', '0000-00-00 00:00:00', NULL),
(2717, ' 02ND PKG', 'BP01', 'MGM-002', 1, '2019-12-17 23:04:45', '0000-00-00 00:00:00', NULL),
(2718, ' 03RD PKG', 'BP01', 'MGM-002', 1, '2019-12-17 23:04:45', '0000-00-00 00:00:00', NULL),
(2719, '05TH FLOOR', 'BP01', 'MGM-002', 1, '2019-12-17 23:04:45', '0000-00-00 00:00:00', NULL),
(2720, '06TH FLOOR', 'BP01', 'MGM-002', 1, '2019-12-17 23:04:45', '0000-00-00 00:00:00', NULL),
(2721, '07TH FLOOR', 'BP01', 'MGM-002', 1, '2019-12-17 23:04:45', '0000-00-00 00:00:00', NULL),
(2722, '08TH FLOOR', 'BP01', 'MGM-002', 1, '2019-12-17 23:04:46', '0000-00-00 00:00:00', NULL),
(2723, '09TH FLOOR', 'BP01', 'MGM-002', 1, '2019-12-17 23:04:46', '0000-00-00 00:00:00', NULL),
(2724, '10TH FLOOR', 'BP01', 'MGM-002', 1, '2019-12-17 23:04:46', '0000-00-00 00:00:00', NULL),
(2725, '11TH FLOOR', 'BP01', 'MGM-002', 1, '2019-12-17 23:04:46', '0000-00-00 00:00:00', NULL),
(2726, '12TH FLOOR', 'BP01', 'MGM-002', 1, '2019-12-17 23:04:46', '0000-00-00 00:00:00', NULL),
(2727, '15TH FLOOR', 'BP01', 'MGM-002', 1, '2019-12-17 23:04:46', '0000-00-00 00:00:00', NULL),
(2728, '16TH FLOOR', 'BP01', 'MGM-002', 1, '2019-12-17 23:04:46', '0000-00-00 00:00:00', NULL),
(2729, '17TH FLOOR', 'BP01', 'MGM-002', 1, '2019-12-17 23:04:46', '0000-00-00 00:00:00', NULL),
(2730, '18TH FLOOR', 'BP01', 'MGM-002', 1, '2019-12-17 23:04:46', '0000-00-00 00:00:00', NULL),
(2731, '01ST FLOOR', 'BP01', 'MGM-003', 1, '2019-12-17 23:04:46', '0000-00-00 00:00:00', NULL),
(2732, '02ND FLOOR', 'BP01', 'MGM-003', 1, '2019-12-17 23:04:46', '0000-00-00 00:00:00', NULL),
(2733, '03RD FLOOR', 'BP01', 'MGM-003', 1, '2019-12-17 23:04:46', '0000-00-00 00:00:00', NULL),
(2734, '05TH FLOOR', 'BP01', 'MGM-003', 1, '2019-12-17 23:04:46', '0000-00-00 00:00:00', NULL),
(2735, '06TH FLOOR', 'BP01', 'MGM-003', 1, '2019-12-17 23:04:46', '0000-00-00 00:00:00', NULL),
(2736, '07TH FLOOR', 'BP01', 'MGM-003', 1, '2019-12-17 23:04:46', '0000-00-00 00:00:00', NULL),
(2737, '08TH FLOOR', 'BP01', 'MGM-003', 1, '2019-12-17 23:04:46', '0000-00-00 00:00:00', NULL),
(2738, '09TH FLOOR', 'BP01', 'MGM-003', 1, '2019-12-17 23:04:46', '0000-00-00 00:00:00', NULL),
(2739, '10TH FLOOR', 'BP01', 'MGM-003', 1, '2019-12-17 23:04:46', '0000-00-00 00:00:00', NULL),
(2740, '11TH FLOOR', 'BP01', 'MGM-003', 1, '2019-12-17 23:04:46', '0000-00-00 00:00:00', NULL),
(2741, '12TH FLOOR', 'BP01', 'MGM-003', 1, '2019-12-17 23:04:46', '0000-00-00 00:00:00', NULL),
(2742, '15TH FLOOR', 'BP01', 'MGM-003', 1, '2019-12-17 23:04:47', '0000-00-00 00:00:00', NULL),
(2743, '16TH FLOOR', 'BP01', 'MGM-003', 1, '2019-12-17 23:04:47', '0000-00-00 00:00:00', NULL),
(2744, '17TH FLOOR', 'BP01', 'MGM-003', 1, '2019-12-17 23:04:47', '0000-00-00 00:00:00', NULL),
(2745, '18TH FLOOR', 'BP01', 'MGM-003', 1, '2019-12-17 23:04:47', '0000-00-00 00:00:00', NULL),
(2746, ' 01ST PKG', 'BP01', 'MGM-02A', 1, '2019-12-17 23:04:47', '0000-00-00 00:00:00', NULL),
(2747, ' 04TH PKG', 'BP01', 'MGM-02A', 1, '2019-12-17 23:04:47', '0000-00-00 00:00:00', NULL),
(2748, ' 05TH PKG', 'BP01', 'MGM-02A', 1, '2019-12-17 23:04:47', '0000-00-00 00:00:00', NULL),
(2749, ' 06TH PKG', 'BP01', 'MGM-02A', 1, '2019-12-17 23:04:47', '0000-00-00 00:00:00', NULL),
(2750, ' 07TH PKG', 'BP01', 'MGM-02A', 1, '2019-12-17 23:04:47', '0000-00-00 00:00:00', NULL),
(2751, ' GF PKG', 'BP01', 'MGM-02A', 1, '2019-12-17 23:04:47', '0000-00-00 00:00:00', NULL),
(2752, ' HLPDC-PKG', 'BP01', 'MGM-02A', 1, '2019-12-17 23:04:47', '0000-00-00 00:00:00', NULL),
(2753, ' 01ST PKG', 'BP01', 'MGT-001', 1, '2019-12-17 23:04:47', '0000-00-00 00:00:00', NULL),
(2754, '01ST FLOOR', 'BP01', 'MGT-001', 1, '2019-12-17 23:04:47', '0000-00-00 00:00:00', NULL),
(2755, '02ND FLOOR', 'BP01', 'MGT-001', 1, '2019-12-17 23:04:47', '0000-00-00 00:00:00', NULL),
(2756, '03RD FLOOR', 'BP01', 'MGT-001', 1, '2019-12-17 23:04:47', '0000-00-00 00:00:00', NULL),
(2757, '05TH FLOOR', 'BP01', 'MGT-001', 1, '2019-12-17 23:04:47', '0000-00-00 00:00:00', NULL),
(2758, '06TH FLOOR', 'BP01', 'MGT-001', 1, '2019-12-17 23:04:47', '0000-00-00 00:00:00', NULL),
(2759, '07TH FLOOR', 'BP01', 'MGT-001', 1, '2019-12-17 23:04:47', '0000-00-00 00:00:00', NULL),
(2760, '08TH FLOOR', 'BP01', 'MGT-001', 1, '2019-12-17 23:04:47', '0000-00-00 00:00:00', NULL),
(2761, '09TH FLOOR', 'BP01', 'MGT-001', 1, '2019-12-17 23:04:47', '0000-00-00 00:00:00', NULL),
(2762, '10TH FLOOR', 'BP01', 'MGT-001', 1, '2019-12-17 23:04:47', '0000-00-00 00:00:00', NULL),
(2763, '11TH FLOOR', 'BP01', 'MGT-001', 1, '2019-12-17 23:04:47', '0000-00-00 00:00:00', NULL),
(2764, '12TH FLOOR', 'BP01', 'MGT-001', 1, '2019-12-17 23:04:48', '0000-00-00 00:00:00', NULL),
(2765, '14TH FLOOR', 'BP01', 'MGT-001', 1, '2019-12-17 23:04:48', '0000-00-00 00:00:00', NULL),
(2766, '15TH FLOOR', 'BP01', 'MGT-001', 1, '2019-12-17 23:04:48', '0000-00-00 00:00:00', NULL),
(2767, '16TH FLOOR', 'BP01', 'MGT-001', 1, '2019-12-17 23:04:48', '0000-00-00 00:00:00', NULL),
(2768, '17TH FLOOR', 'BP01', 'MGT-001', 1, '2019-12-17 23:04:48', '0000-00-00 00:00:00', NULL),
(2769, '03RD FLOOR', 'BP01', 'MGT-002', 1, '2019-12-17 23:04:48', '0000-00-00 00:00:00', NULL),
(2770, '06TH FLOOR', 'BP01', 'MGT-002', 1, '2019-12-17 23:04:48', '0000-00-00 00:00:00', NULL),
(2771, '07TH FLOOR', 'BP01', 'MGT-002', 1, '2019-12-17 23:04:48', '0000-00-00 00:00:00', NULL),
(2772, '08TH FLOOR', 'BP01', 'MGT-002', 1, '2019-12-17 23:04:48', '0000-00-00 00:00:00', NULL),
(2773, '09TH FLOOR', 'BP01', 'MGT-002', 1, '2019-12-17 23:04:48', '0000-00-00 00:00:00', NULL),
(2774, '10TH FLOOR', 'BP01', 'MGT-002', 1, '2019-12-17 23:04:48', '0000-00-00 00:00:00', NULL),
(2775, '11TH FLOOR', 'BP01', 'MGT-002', 1, '2019-12-17 23:04:48', '0000-00-00 00:00:00', NULL),
(2776, '12TH FLOOR', 'BP01', 'MGT-002', 1, '2019-12-17 23:04:48', '0000-00-00 00:00:00', NULL),
(2777, '14TH FLOOR', 'BP01', 'MGT-002', 1, '2019-12-17 23:04:48', '0000-00-00 00:00:00', NULL),
(2778, '15TH FLOOR', 'BP01', 'MGT-002', 1, '2019-12-17 23:04:48', '0000-00-00 00:00:00', NULL),
(2779, '16TH FLOOR', 'BP01', 'MGT-002', 1, '2019-12-17 23:04:48', '0000-00-00 00:00:00', NULL),
(2780, '17TH FLOOR', 'BP01', 'MGT-002', 1, '2019-12-17 23:04:48', '0000-00-00 00:00:00', NULL),
(2781, '01ST FLOOR', 'BP01', 'MGT-02A', 1, '2019-12-17 23:04:48', '0000-00-00 00:00:00', NULL),
(2782, '02ND FLOOR', 'BP01', 'MGT-02A', 1, '2019-12-17 23:04:48', '0000-00-00 00:00:00', NULL),
(2783, '03RD FLOOR', 'BP01', 'MGT-02A', 1, '2019-12-17 23:04:48', '0000-00-00 00:00:00', NULL),
(2784, '05TH FLOOR', 'BP01', 'MGT-02A', 1, '2019-12-17 23:04:48', '0000-00-00 00:00:00', NULL),
(2785, '06TH FLOOR', 'BP01', 'MGT-02A', 1, '2019-12-17 23:04:48', '0000-00-00 00:00:00', NULL),
(2786, '07TH FLOOR', 'BP01', 'MGT-02A', 1, '2019-12-17 23:04:48', '0000-00-00 00:00:00', NULL),
(2787, '08TH FLOOR', 'BP01', 'MGT-02A', 1, '2019-12-17 23:04:48', '0000-00-00 00:00:00', NULL),
(2788, '09TH FLOOR', 'BP01', 'MGT-02A', 1, '2019-12-17 23:04:48', '0000-00-00 00:00:00', NULL),
(2789, '10TH FLOOR', 'BP01', 'MGT-02A', 1, '2019-12-17 23:04:49', '0000-00-00 00:00:00', NULL),
(2790, '11TH FLOOR', 'BP01', 'MGT-02A', 1, '2019-12-17 23:04:49', '0000-00-00 00:00:00', NULL),
(2791, '12TH FLOOR', 'BP01', 'MGT-02A', 1, '2019-12-17 23:04:49', '0000-00-00 00:00:00', NULL),
(2792, '15TH FLOOR', 'BP01', 'MGT-02A', 1, '2019-12-17 23:04:49', '0000-00-00 00:00:00', NULL),
(2793, '16TH FLOOR', 'BP01', 'MGT-02A', 1, '2019-12-17 23:04:49', '0000-00-00 00:00:00', NULL),
(2794, '17TH FLOOR', 'BP01', 'MGT-02A', 1, '2019-12-17 23:04:49', '0000-00-00 00:00:00', NULL),
(2795, '18TH FLOOR', 'BP01', 'MGT-02A', 1, '2019-12-17 23:04:49', '0000-00-00 00:00:00', NULL),
(2796, '19TH FLOOR', 'BP01', 'MGT-02A', 1, '2019-12-17 23:04:49', '0000-00-00 00:00:00', NULL),
(2797, '20TH FLOOR', 'BP01', 'MGT-02A', 1, '2019-12-17 23:04:49', '0000-00-00 00:00:00', NULL),
(2798, ' 01ST PKG', 'BP01', 'MPR-001', 1, '2019-12-17 23:04:49', '0000-00-00 00:00:00', NULL),
(2799, ' 02ND PKG', 'BP01', 'MPR-001', 1, '2019-12-17 23:04:49', '0000-00-00 00:00:00', NULL),
(2800, ' 03RD PKG', 'BP01', 'MPR-001', 1, '2019-12-17 23:04:49', '0000-00-00 00:00:00', NULL),
(2801, ' BSMNT PKG1', 'BP01', 'MPR-001', 1, '2019-12-17 23:04:49', '0000-00-00 00:00:00', NULL),
(2802, ' BSMNT PKG2', 'BP01', 'MPR-001', 1, '2019-12-17 23:04:49', '0000-00-00 00:00:00', NULL),
(2803, ' CIRC PKG', 'BP01', 'MPR-001', 1, '2019-12-17 23:04:49', '0000-00-00 00:00:00', NULL),
(2804, '05TH FLOOR', 'BP01', 'MPR-001', 1, '2019-12-17 23:04:49', '0000-00-00 00:00:00', NULL),
(2805, '06TH FLOOR', 'BP01', 'MPR-001', 1, '2019-12-17 23:04:49', '0000-00-00 00:00:00', NULL),
(2806, '07TH FLOOR', 'BP01', 'MPR-001', 1, '2019-12-17 23:04:49', '0000-00-00 00:00:00', NULL),
(2807, '08TH FLOOR', 'BP01', 'MPR-001', 1, '2019-12-17 23:04:49', '0000-00-00 00:00:00', NULL),
(2808, '09TH FLOOR', 'BP01', 'MPR-001', 1, '2019-12-17 23:04:49', '0000-00-00 00:00:00', NULL),
(2809, '10TH FLOOR', 'BP01', 'MPR-001', 1, '2019-12-17 23:04:49', '0000-00-00 00:00:00', NULL),
(2810, '11TH FLOOR', 'BP01', 'MPR-001', 1, '2019-12-17 23:04:49', '0000-00-00 00:00:00', NULL),
(2811, '12TH FLOOR', 'BP01', 'MPR-001', 1, '2019-12-17 23:04:49', '0000-00-00 00:00:00', NULL),
(2812, '15TH FLOOR', 'BP01', 'MPR-001', 1, '2019-12-17 23:04:49', '0000-00-00 00:00:00', NULL),
(2813, '16TH FLOOR', 'BP01', 'MPR-001', 1, '2019-12-17 23:04:49', '0000-00-00 00:00:00', NULL),
(2814, '17TH FLOOR', 'BP01', 'MPR-001', 1, '2019-12-17 23:04:49', '0000-00-00 00:00:00', NULL),
(2815, '18TH FLOOR', 'BP01', 'MPR-001', 1, '2019-12-17 23:04:50', '0000-00-00 00:00:00', NULL),
(2816, '19TH FLOOR', 'BP01', 'MPR-001', 1, '2019-12-17 23:04:50', '0000-00-00 00:00:00', NULL),
(2817, '20TH FLOOR', 'BP01', 'MPR-001', 1, '2019-12-17 23:04:50', '0000-00-00 00:00:00', NULL),
(2818, '21ST FLOOR', 'BP01', 'MPR-001', 1, '2019-12-17 23:04:50', '0000-00-00 00:00:00', NULL),
(2819, '22ND FLOOR', 'BP01', 'MPR-001', 1, '2019-12-17 23:04:50', '0000-00-00 00:00:00', NULL),
(2820, '23RD FLOOR', 'BP01', 'MPR-001', 1, '2019-12-17 23:04:50', '0000-00-00 00:00:00', NULL),
(2821, '25TH FLOOR', 'BP01', 'MPR-001', 1, '2019-12-17 23:04:50', '0000-00-00 00:00:00', NULL),
(2822, '26TH FLOOR', 'BP01', 'MPR-001', 1, '2019-12-17 23:04:50', '0000-00-00 00:00:00', NULL),
(2823, ' 01ST PKG', 'BP01', 'MPR-002', 1, '2019-12-17 23:04:50', '0000-00-00 00:00:00', NULL),
(2824, ' 02ND PKG', 'BP01', 'MPR-002', 1, '2019-12-17 23:04:50', '0000-00-00 00:00:00', NULL),
(2825, ' 03RD PKG', 'BP01', 'MPR-002', 1, '2019-12-17 23:04:50', '0000-00-00 00:00:00', NULL),
(2826, ' GARDEN', 'BP01', 'MPR-002', 1, '2019-12-17 23:04:50', '0000-00-00 00:00:00', NULL),
(2827, '01ST FLOOR', 'BP01', 'MPR-002', 1, '2019-12-17 23:04:50', '0000-00-00 00:00:00', NULL),
(2828, '02ND FLOOR', 'BP01', 'MPR-002', 1, '2019-12-17 23:04:50', '0000-00-00 00:00:00', NULL),
(2829, '03RD FLOOR', 'BP01', 'MPR-002', 1, '2019-12-17 23:04:50', '0000-00-00 00:00:00', NULL),
(2830, '05TH FLOOR', 'BP01', 'MPR-002', 1, '2019-12-17 23:04:50', '0000-00-00 00:00:00', NULL),
(2831, '06TH FLOOR', 'BP01', 'MPR-002', 1, '2019-12-17 23:04:50', '0000-00-00 00:00:00', NULL),
(2832, '07TH FLOOR', 'BP01', 'MPR-002', 1, '2019-12-17 23:04:50', '0000-00-00 00:00:00', NULL),
(2833, '08TH FLOOR', 'BP01', 'MPR-002', 1, '2019-12-17 23:04:50', '0000-00-00 00:00:00', NULL),
(2834, '09TH FLOOR', 'BP01', 'MPR-002', 1, '2019-12-17 23:04:50', '0000-00-00 00:00:00', NULL),
(2835, '10TH FLOOR', 'BP01', 'MPR-002', 1, '2019-12-17 23:04:50', '0000-00-00 00:00:00', NULL),
(2836, '11TH FLOOR', 'BP01', 'MPR-002', 1, '2019-12-17 23:04:50', '0000-00-00 00:00:00', NULL),
(2837, '12TH FLOOR', 'BP01', 'MPR-002', 1, '2019-12-17 23:04:50', '0000-00-00 00:00:00', NULL),
(2838, '15TH FLOOR', 'BP01', 'MPR-002', 1, '2019-12-17 23:04:50', '0000-00-00 00:00:00', NULL),
(2839, '16TH FLOOR', 'BP01', 'MPR-002', 1, '2019-12-17 23:04:50', '0000-00-00 00:00:00', NULL),
(2840, '17TH FLOOR', 'BP01', 'MPR-002', 1, '2019-12-17 23:04:50', '0000-00-00 00:00:00', NULL),
(2841, '18TH FLOOR', 'BP01', 'MPR-002', 1, '2019-12-17 23:04:51', '0000-00-00 00:00:00', NULL),
(2842, '19TH FLOOR', 'BP01', 'MPR-002', 1, '2019-12-17 23:04:51', '0000-00-00 00:00:00', NULL),
(2843, '20TH FLOOR', 'BP01', 'MPR-002', 1, '2019-12-17 23:04:51', '0000-00-00 00:00:00', NULL),
(2844, '21ST FLOOR', 'BP01', 'MPR-002', 1, '2019-12-17 23:04:51', '0000-00-00 00:00:00', NULL),
(2845, '22ND FLOOR', 'BP01', 'MPR-002', 1, '2019-12-17 23:04:51', '0000-00-00 00:00:00', NULL),
(2846, '23RD FLOOR', 'BP01', 'MPR-002', 1, '2019-12-17 23:04:51', '0000-00-00 00:00:00', NULL),
(2847, '25TH FLOOR', 'BP01', 'MPR-002', 1, '2019-12-17 23:04:51', '0000-00-00 00:00:00', NULL),
(2848, '26TH FLOOR', 'BP01', 'MPR-002', 1, '2019-12-17 23:04:51', '0000-00-00 00:00:00', NULL),
(2849, '27TH FLOOR', 'BP01', 'MPR-002', 1, '2019-12-17 23:04:51', '0000-00-00 00:00:00', NULL),
(2850, '28TH FLOOR', 'BP01', 'MPR-002', 1, '2019-12-17 23:04:51', '0000-00-00 00:00:00', NULL),
(2851, '29TH FLOOR', 'BP01', 'MPR-002', 1, '2019-12-17 23:04:51', '0000-00-00 00:00:00', NULL),
(2852, 'TANDEM PKG', 'BP01', 'MPR-002', 1, '2019-12-17 23:04:51', '0000-00-00 00:00:00', NULL),
(2853, 'VILLA PKG', 'BP01', 'MPR-002', 1, '2019-12-17 23:04:51', '0000-00-00 00:00:00', NULL),
(2854, ' PARKING', 'BP01', 'MPR-003', 1, '2019-12-17 23:04:51', '0000-00-00 00:00:00', NULL),
(2855, '01ST FLOOR', 'BP01', 'MPR-003', 1, '2019-12-17 23:04:51', '0000-00-00 00:00:00', NULL),
(2856, '02ND FLOOR', 'BP01', 'MPR-003', 1, '2019-12-17 23:04:51', '0000-00-00 00:00:00', NULL),
(2857, '03RD FLOOR', 'BP01', 'MPR-003', 1, '2019-12-17 23:04:51', '0000-00-00 00:00:00', NULL),
(2858, '05TH FLOOR', 'BP01', 'MPR-003', 1, '2019-12-17 23:04:51', '0000-00-00 00:00:00', NULL),
(2859, '06TH FLOOR', 'BP01', 'MPR-003', 1, '2019-12-17 23:04:51', '0000-00-00 00:00:00', NULL),
(2860, '07TH FLOOR', 'BP01', 'MPR-003', 1, '2019-12-17 23:04:51', '0000-00-00 00:00:00', NULL),
(2861, '08TH FLOOR', 'BP01', 'MPR-003', 1, '2019-12-17 23:04:51', '0000-00-00 00:00:00', NULL),
(2862, '09TH FLOOR', 'BP01', 'MPR-003', 1, '2019-12-17 23:04:51', '0000-00-00 00:00:00', NULL),
(2863, '10TH FLOOR', 'BP01', 'MPR-003', 1, '2019-12-17 23:04:51', '0000-00-00 00:00:00', NULL),
(2864, '11TH FLOOR', 'BP01', 'MPR-003', 1, '2019-12-17 23:04:51', '0000-00-00 00:00:00', NULL),
(2865, '12TH FLOOR', 'BP01', 'MPR-003', 1, '2019-12-17 23:04:51', '0000-00-00 00:00:00', NULL),
(2866, '15TH FLOOR', 'BP01', 'MPR-003', 1, '2019-12-17 23:04:51', '0000-00-00 00:00:00', NULL),
(2867, '16TH FLOOR', 'BP01', 'MPR-003', 1, '2019-12-17 23:04:52', '0000-00-00 00:00:00', NULL),
(2868, '17TH FLOOR', 'BP01', 'MPR-003', 1, '2019-12-17 23:04:52', '0000-00-00 00:00:00', NULL),
(2869, '18TH FLOOR', 'BP01', 'MPR-003', 1, '2019-12-17 23:04:52', '0000-00-00 00:00:00', NULL),
(2870, '19TH FLOOR', 'BP01', 'MPR-003', 1, '2019-12-17 23:04:52', '0000-00-00 00:00:00', NULL),
(2871, '20TH FLOOR', 'BP01', 'MPR-003', 1, '2019-12-17 23:04:52', '0000-00-00 00:00:00', NULL),
(2872, '21ST FLOOR', 'BP01', 'MPR-003', 1, '2019-12-17 23:04:52', '0000-00-00 00:00:00', NULL),
(2873, '22ND FLOOR', 'BP01', 'MPR-003', 1, '2019-12-17 23:04:52', '0000-00-00 00:00:00', NULL),
(2874, '23RD FLOOR', 'BP01', 'MPR-003', 1, '2019-12-17 23:04:52', '0000-00-00 00:00:00', NULL),
(2875, '25TH FLOOR', 'BP01', 'MPR-003', 1, '2019-12-17 23:04:52', '0000-00-00 00:00:00', NULL),
(2876, '26TH FLOOR', 'BP01', 'MPR-003', 1, '2019-12-17 23:04:52', '0000-00-00 00:00:00', NULL),
(2877, '27TH FLOOR', 'BP01', 'MPR-003', 1, '2019-12-17 23:04:52', '0000-00-00 00:00:00', NULL),
(2878, '28TH FLOOR', 'BP01', 'MPR-003', 1, '2019-12-17 23:04:52', '0000-00-00 00:00:00', NULL),
(2879, '29TH FLOOR', 'BP01', 'MPR-003', 1, '2019-12-17 23:04:52', '0000-00-00 00:00:00', NULL),
(2880, '30TH FLOOR', 'BP01', 'MPR-003', 1, '2019-12-17 23:04:52', '0000-00-00 00:00:00', NULL),
(2881, 'TANDEM PKG', 'BP01', 'MPR-003', 1, '2019-12-17 23:04:52', '0000-00-00 00:00:00', NULL),
(2882, '02ND FLOOR', 'BP01', 'MPR-004', 1, '2019-12-17 23:04:52', '0000-00-00 00:00:00', NULL),
(2883, '03RD FLOOR', 'BP01', 'MPR-004', 1, '2019-12-17 23:04:52', '0000-00-00 00:00:00', NULL),
(2884, '05TH FLOOR', 'BP01', 'MPR-004', 1, '2019-12-17 23:04:52', '0000-00-00 00:00:00', NULL),
(2885, '06TH FLOOR', 'BP01', 'MPR-004', 1, '2019-12-17 23:04:52', '0000-00-00 00:00:00', NULL),
(2886, '07TH FLOOR', 'BP01', 'MPR-004', 1, '2019-12-17 23:04:52', '0000-00-00 00:00:00', NULL),
(2887, '08TH FLOOR', 'BP01', 'MPR-004', 1, '2019-12-17 23:04:52', '0000-00-00 00:00:00', NULL),
(2888, '09TH FLOOR', 'BP01', 'MPR-004', 1, '2019-12-17 23:04:52', '0000-00-00 00:00:00', NULL),
(2889, '10TH FLOOR', 'BP01', 'MPR-004', 1, '2019-12-17 23:04:52', '0000-00-00 00:00:00', NULL),
(2890, '11TH FLOOR', 'BP01', 'MPR-004', 1, '2019-12-17 23:04:52', '0000-00-00 00:00:00', NULL),
(2891, '12TH FLOOR', 'BP01', 'MPR-004', 1, '2019-12-17 23:04:52', '0000-00-00 00:00:00', NULL),
(2892, '15TH FLOOR', 'BP01', 'MPR-004', 1, '2019-12-17 23:04:52', '0000-00-00 00:00:00', NULL),
(2893, '16TH FLOOR', 'BP01', 'MPR-004', 1, '2019-12-17 23:04:52', '0000-00-00 00:00:00', NULL),
(2894, '17TH FLOOR', 'BP01', 'MPR-004', 1, '2019-12-17 23:04:53', '0000-00-00 00:00:00', NULL),
(2895, '18TH FLOOR', 'BP01', 'MPR-004', 1, '2019-12-17 23:04:53', '0000-00-00 00:00:00', NULL),
(2896, '19TH FLOOR', 'BP01', 'MPR-004', 1, '2019-12-17 23:04:53', '0000-00-00 00:00:00', NULL),
(2897, '20TH FLOOR', 'BP01', 'MPR-004', 1, '2019-12-17 23:04:53', '0000-00-00 00:00:00', NULL),
(2898, '21ST FLOOR', 'BP01', 'MPR-004', 1, '2019-12-17 23:04:53', '0000-00-00 00:00:00', NULL),
(2899, '22ND FLOOR', 'BP01', 'MPR-004', 1, '2019-12-17 23:04:53', '0000-00-00 00:00:00', NULL),
(2900, '23RD FLOOR', 'BP01', 'MPR-004', 1, '2019-12-17 23:04:53', '0000-00-00 00:00:00', NULL),
(2901, '25TH FLOOR', 'BP01', 'MPR-004', 1, '2019-12-17 23:04:53', '0000-00-00 00:00:00', NULL),
(2902, '26TH FLOOR', 'BP01', 'MPR-004', 1, '2019-12-17 23:04:53', '0000-00-00 00:00:00', NULL),
(2903, '27TH FLOOR', 'BP01', 'MPR-004', 1, '2019-12-17 23:04:53', '0000-00-00 00:00:00', NULL),
(2904, 'PARKING', 'BP01', 'MPR-004', 1, '2019-12-17 23:04:53', '0000-00-00 00:00:00', NULL),
(2905, 'TANDEM PKG', 'BP01', 'MPR-004', 1, '2019-12-17 23:04:53', '0000-00-00 00:00:00', NULL),
(2906, 'U/G FLOOR', 'BP01', 'MPR-004', 1, '2019-12-17 23:04:53', '0000-00-00 00:00:00', NULL),
(2907, ' 01ST PKG', 'BP01', 'MQR-001', 1, '2019-12-17 23:04:53', '0000-00-00 00:00:00', NULL),
(2908, ' 02ND PKG', 'BP01', 'MQR-001', 1, '2019-12-17 23:04:53', '0000-00-00 00:00:00', NULL),
(2909, ' OUT PKG', 'BP01', 'MQR-001', 1, '2019-12-17 23:04:53', '0000-00-00 00:00:00', NULL),
(2910, '01ST COMM', 'BP01', 'MQR-001', 1, '2019-12-17 23:04:53', '0000-00-00 00:00:00', NULL),
(2911, '01ST FLOOR', 'BP01', 'MQR-001', 1, '2019-12-17 23:04:53', '0000-00-00 00:00:00', NULL),
(2912, '02ND FLOOR', 'BP01', 'MQR-001', 1, '2019-12-17 23:04:53', '0000-00-00 00:00:00', NULL),
(2913, '03RD FLOOR', 'BP01', 'MQR-001', 1, '2019-12-17 23:04:53', '0000-00-00 00:00:00', NULL),
(2914, '05TH FLOOR', 'BP01', 'MQR-001', 1, '2019-12-17 23:04:53', '0000-00-00 00:00:00', NULL),
(2915, '06TH FLOOR', 'BP01', 'MQR-001', 1, '2019-12-17 23:04:53', '0000-00-00 00:00:00', NULL),
(2916, '07TH FLOOR', 'BP01', 'MQR-001', 1, '2019-12-17 23:04:53', '0000-00-00 00:00:00', NULL),
(2917, '08TH FLOOR', 'BP01', 'MQR-001', 1, '2019-12-17 23:04:54', '0000-00-00 00:00:00', NULL),
(2918, '09TH FLOOR', 'BP01', 'MQR-001', 1, '2019-12-17 23:04:54', '0000-00-00 00:00:00', NULL),
(2919, '10TH FLOOR', 'BP01', 'MQR-001', 1, '2019-12-17 23:04:54', '0000-00-00 00:00:00', NULL),
(2920, ' 01ST PKG', 'BP01', 'MQR-002', 1, '2019-12-17 23:04:54', '0000-00-00 00:00:00', NULL),
(2921, ' 02ND PKG', 'BP01', 'MQR-002', 1, '2019-12-17 23:04:54', '0000-00-00 00:00:00', NULL),
(2922, ' 03RD PKG', 'BP01', 'MQR-002', 1, '2019-12-17 23:04:54', '0000-00-00 00:00:00', NULL),
(2923, ' 05TH PKG', 'BP01', 'MQR-002', 1, '2019-12-17 23:04:54', '0000-00-00 00:00:00', NULL),
(2924, ' OUT PKG', 'BP01', 'MQR-002', 1, '2019-12-17 23:04:54', '0000-00-00 00:00:00', NULL),
(2925, '01ST COMM', 'BP01', 'MQR-002', 1, '2019-12-17 23:04:54', '0000-00-00 00:00:00', NULL),
(2926, '02ND FLOOR', 'BP01', 'MQR-002', 1, '2019-12-17 23:04:54', '0000-00-00 00:00:00', NULL),
(2927, '03RD FLOOR', 'BP01', 'MQR-002', 1, '2019-12-17 23:04:54', '0000-00-00 00:00:00', NULL),
(2928, '05TH FLOOR', 'BP01', 'MQR-002', 1, '2019-12-17 23:04:54', '0000-00-00 00:00:00', NULL),
(2929, '06TH FLOOR', 'BP01', 'MQR-002', 1, '2019-12-17 23:04:54', '0000-00-00 00:00:00', NULL),
(2930, '07TH FLOOR', 'BP01', 'MQR-002', 1, '2019-12-17 23:04:54', '0000-00-00 00:00:00', NULL),
(2931, '08TH FLOOR', 'BP01', 'MQR-002', 1, '2019-12-17 23:04:54', '0000-00-00 00:00:00', NULL),
(2932, '09TH FLOOR', 'BP01', 'MQR-002', 1, '2019-12-17 23:04:54', '0000-00-00 00:00:00', NULL),
(2933, '10TH FLOOR', 'BP01', 'MQR-002', 1, '2019-12-17 23:04:54', '0000-00-00 00:00:00', NULL),
(2934, ' 01ST PKG', 'BP01', 'MQR-003', 1, '2019-12-17 23:04:54', '0000-00-00 00:00:00', NULL),
(2935, ' 02ND PKG', 'BP01', 'MQR-003', 1, '2019-12-17 23:04:54', '0000-00-00 00:00:00', NULL),
(2936, ' 03RD PKG', 'BP01', 'MQR-003', 1, '2019-12-17 23:04:54', '0000-00-00 00:00:00', NULL),
(2937, ' 05TH PKG', 'BP01', 'MQR-003', 1, '2019-12-17 23:04:54', '0000-00-00 00:00:00', NULL),
(2938, ' OUT PKG', 'BP01', 'MQR-003', 1, '2019-12-17 23:04:54', '0000-00-00 00:00:00', NULL),
(2939, '01ST COMM', 'BP01', 'MQR-003', 1, '2019-12-17 23:04:54', '0000-00-00 00:00:00', NULL),
(2940, '02ND FLOOR', 'BP01', 'MQR-003', 1, '2019-12-17 23:04:54', '0000-00-00 00:00:00', NULL),
(2941, '03RD FLOOR', 'BP01', 'MQR-003', 1, '2019-12-17 23:04:54', '0000-00-00 00:00:00', NULL),
(2942, '05TH FLOOR', 'BP01', 'MQR-003', 1, '2019-12-17 23:04:54', '0000-00-00 00:00:00', NULL),
(2943, '06TH FLOOR', 'BP01', 'MQR-003', 1, '2019-12-17 23:04:54', '0000-00-00 00:00:00', NULL),
(2944, '07TH FLOOR', 'BP01', 'MQR-003', 1, '2019-12-17 23:04:55', '0000-00-00 00:00:00', NULL),
(2945, '08TH FLOOR', 'BP01', 'MQR-003', 1, '2019-12-17 23:04:55', '0000-00-00 00:00:00', NULL),
(2946, '09TH FLOOR', 'BP01', 'MQR-003', 1, '2019-12-17 23:04:55', '0000-00-00 00:00:00', NULL),
(2947, '10TH FLOOR', 'BP01', 'MQR-003', 1, '2019-12-17 23:04:55', '0000-00-00 00:00:00', NULL),
(2948, '11TH FLOOR', 'BP01', 'MQR-003', 1, '2019-12-17 23:04:55', '0000-00-00 00:00:00', NULL),
(2949, '12TH FLOOR', 'BP01', 'MQR-003', 1, '2019-12-17 23:04:55', '0000-00-00 00:00:00', NULL),
(2950, '14TH FLOOR', 'BP01', 'MQR-003', 1, '2019-12-17 23:04:55', '0000-00-00 00:00:00', NULL),
(2951, '15TH FLOOR', 'BP01', 'MQR-003', 1, '2019-12-17 23:04:55', '0000-00-00 00:00:00', NULL),
(2952, '16TH FLOOR', 'BP01', 'MQR-003', 1, '2019-12-17 23:04:55', '0000-00-00 00:00:00', NULL),
(2953, ' 01ST PKG', 'BP01', 'OGH-001', 1, '2019-12-17 23:04:55', '0000-00-00 00:00:00', NULL),
(2954, '01ST FLOOR', 'BP01', 'OGH-001', 1, '2019-12-17 23:04:55', '0000-00-00 00:00:00', NULL),
(2955, '02ND FLOOR', 'BP01', 'OGH-001', 1, '2019-12-17 23:04:55', '0000-00-00 00:00:00', NULL),
(2956, ' 01ST PKG', 'BP01', 'OGH-002', 1, '2019-12-17 23:04:55', '0000-00-00 00:00:00', NULL),
(2957, '01ST FLOOR', 'BP01', 'OGH-002', 1, '2019-12-17 23:04:55', '0000-00-00 00:00:00', NULL),
(2958, '02ND FLOOR', 'BP01', 'OGH-002', 1, '2019-12-17 23:04:56', '0000-00-00 00:00:00', NULL),
(2959, '03RD FLOOR', 'BP01', 'OGH-002', 1, '2019-12-17 23:04:56', '0000-00-00 00:00:00', NULL),
(2960, '05TH FLOOR', 'BP01', 'OGH-002', 1, '2019-12-17 23:04:56', '0000-00-00 00:00:00', NULL),
(2961, ' 01ST PKG', 'BP01', 'OGH-003', 1, '2019-12-17 23:04:56', '0000-00-00 00:00:00', NULL),
(2962, '01ST FLOOR', 'BP01', 'OGH-003', 1, '2019-12-17 23:04:56', '0000-00-00 00:00:00', NULL),
(2963, '02ND FLOOR', 'BP01', 'OGH-003', 1, '2019-12-17 23:04:56', '0000-00-00 00:00:00', NULL),
(2964, '03RD FLOOR', 'BP01', 'OGH-003', 1, '2019-12-17 23:04:56', '0000-00-00 00:00:00', NULL),
(2965, '05TH FLOOR', 'BP01', 'OGH-003', 1, '2019-12-17 23:04:56', '0000-00-00 00:00:00', NULL),
(2966, 'PENT FLOOR', 'BP01', 'OGH-003', 1, '2019-12-17 23:04:56', '0000-00-00 00:00:00', NULL),
(2967, ' 02ND PKG', 'BP01', 'OGM-001', 1, '2019-12-17 23:04:56', '0000-00-00 00:00:00', NULL),
(2968, ' 03RD PKG', 'BP01', 'OGM-001', 1, '2019-12-17 23:04:56', '0000-00-00 00:00:00', NULL),
(2969, ' 04TH', 'BP01', 'OGM-001', 1, '2019-12-17 23:04:56', '0000-00-00 00:00:00', NULL),
(2970, ' 05TH PKG', 'BP01', 'OGM-001', 1, '2019-12-17 23:04:56', '0000-00-00 00:00:00', NULL),
(2971, ' 06TH PKG', 'BP01', 'OGM-001', 1, '2019-12-17 23:04:56', '0000-00-00 00:00:00', NULL),
(2972, ' 07TH PKG', 'BP01', 'OGM-001', 1, '2019-12-17 23:04:56', '0000-00-00 00:00:00', NULL),
(2973, '01ST COMM', 'BP01', 'OGM-001', 1, '2019-12-17 23:04:56', '0000-00-00 00:00:00', NULL),
(2974, '02ND COMM', 'BP01', 'OGM-001', 1, '2019-12-17 23:04:56', '0000-00-00 00:00:00', NULL),
(2975, '08TH FLOOR', 'BP01', 'OGM-001', 1, '2019-12-17 23:04:56', '0000-00-00 00:00:00', NULL),
(2976, '09TH FLOOR', 'BP01', 'OGM-001', 1, '2019-12-17 23:04:56', '0000-00-00 00:00:00', NULL),
(2977, '10TH FLOOR', 'BP01', 'OGM-001', 1, '2019-12-17 23:04:56', '0000-00-00 00:00:00', NULL),
(2978, '11TH FLOOR', 'BP01', 'OGM-001', 1, '2019-12-17 23:04:56', '0000-00-00 00:00:00', NULL),
(2979, '12TH FLOOR', 'BP01', 'OGM-001', 1, '2019-12-17 23:04:56', '0000-00-00 00:00:00', NULL),
(2980, '15TH FLOOR', 'BP01', 'OGM-001', 1, '2019-12-17 23:04:56', '0000-00-00 00:00:00', NULL),
(2981, '16TH FLOOR', 'BP01', 'OGM-001', 1, '2019-12-17 23:04:56', '0000-00-00 00:00:00', NULL),
(2982, '17TH FLOOR', 'BP01', 'OGM-001', 1, '2019-12-17 23:04:56', '0000-00-00 00:00:00', NULL),
(2983, '18TH FLOOR', 'BP01', 'OGM-001', 1, '2019-12-17 23:04:56', '0000-00-00 00:00:00', NULL),
(2984, '19TH FLOOR', 'BP01', 'OGM-001', 1, '2019-12-17 23:04:57', '0000-00-00 00:00:00', NULL),
(2985, '20TH FLOOR', 'BP01', 'OGM-001', 1, '2019-12-17 23:04:57', '0000-00-00 00:00:00', NULL),
(2986, '21ST FLOOR', 'BP01', 'OGM-001', 1, '2019-12-17 23:04:57', '0000-00-00 00:00:00', NULL),
(2987, '22ND FLOOR', 'BP01', 'OGM-001', 1, '2019-12-17 23:04:57', '0000-00-00 00:00:00', NULL),
(2988, '23RD FLOOR', 'BP01', 'OGM-001', 1, '2019-12-17 23:04:57', '0000-00-00 00:00:00', NULL),
(2989, '24TH FLOOR', 'BP01', 'OGM-001', 1, '2019-12-17 23:04:57', '0000-00-00 00:00:00', NULL),
(2990, '25TH FLOOR', 'BP01', 'OGM-001', 1, '2019-12-17 23:04:57', '0000-00-00 00:00:00', NULL),
(2991, '26TH FLOOR', 'BP01', 'OGM-001', 1, '2019-12-17 23:04:57', '0000-00-00 00:00:00', NULL),
(2992, '27TH FLOOR', 'BP01', 'OGM-001', 1, '2019-12-17 23:04:57', '0000-00-00 00:00:00', NULL),
(2993, '28TH FLOOR', 'BP01', 'OGM-001', 1, '2019-12-17 23:04:57', '0000-00-00 00:00:00', NULL),
(2994, '29TH FLOOR', 'BP01', 'OGM-001', 1, '2019-12-17 23:04:57', '0000-00-00 00:00:00', NULL),
(2995, '30TH FLOOR', 'BP01', 'OGM-001', 1, '2019-12-17 23:04:57', '0000-00-00 00:00:00', NULL),
(2996, '31ST FLOOR', 'BP01', 'OGM-001', 1, '2019-12-17 23:04:57', '0000-00-00 00:00:00', NULL),
(2997, '32ND FLOOR', 'BP01', 'OGM-001', 1, '2019-12-17 23:04:57', '0000-00-00 00:00:00', NULL),
(2998, 'INI PROJECT', 'BP01', 'OGM-001', 1, '2019-12-17 23:04:57', '0000-00-00 00:00:00', NULL),
(2999, ' 02ND PKG', 'BP01', 'OGM-002', 1, '2019-12-17 23:04:57', '0000-00-00 00:00:00', NULL),
(3000, ' 03RD PKG', 'BP01', 'OGM-002', 1, '2019-12-17 23:04:57', '0000-00-00 00:00:00', NULL),
(3001, ' 04TH PKG', 'BP01', 'OGM-002', 1, '2019-12-17 23:04:57', '0000-00-00 00:00:00', NULL),
(3002, ' 05TH PKG', 'BP01', 'OGM-002', 1, '2019-12-17 23:04:57', '0000-00-00 00:00:00', NULL),
(3003, ' 06TH PKG', 'BP01', 'OGM-002', 1, '2019-12-17 23:04:57', '0000-00-00 00:00:00', NULL),
(3004, ' 07TH PKG', 'BP01', 'OGM-002', 1, '2019-12-17 23:04:57', '0000-00-00 00:00:00', NULL),
(3005, '01ST COMM', 'BP01', 'OGM-002', 1, '2019-12-17 23:04:57', '0000-00-00 00:00:00', NULL),
(3006, '08TH FLOOR', 'BP01', 'OGM-002', 1, '2019-12-17 23:04:57', '0000-00-00 00:00:00', NULL),
(3007, '09TH FLOOR', 'BP01', 'OGM-002', 1, '2019-12-17 23:04:58', '0000-00-00 00:00:00', NULL),
(3008, '10TH FLOOR', 'BP01', 'OGM-002', 1, '2019-12-17 23:04:58', '0000-00-00 00:00:00', NULL),
(3009, '11TH FLOOR', 'BP01', 'OGM-002', 1, '2019-12-17 23:04:58', '0000-00-00 00:00:00', NULL),
(3010, '12TH FLOOR', 'BP01', 'OGM-002', 1, '2019-12-17 23:04:58', '0000-00-00 00:00:00', NULL),
(3011, '15TH FLOOR', 'BP01', 'OGM-002', 1, '2019-12-17 23:04:58', '0000-00-00 00:00:00', NULL),
(3012, '16TH FLOOR', 'BP01', 'OGM-002', 1, '2019-12-17 23:04:58', '0000-00-00 00:00:00', NULL),
(3013, '17TH FLOOR', 'BP01', 'OGM-002', 1, '2019-12-17 23:04:58', '0000-00-00 00:00:00', NULL),
(3014, '18TH FLOOR', 'BP01', 'OGM-002', 1, '2019-12-17 23:04:58', '0000-00-00 00:00:00', NULL),
(3015, '19TH FLOOR', 'BP01', 'OGM-002', 1, '2019-12-17 23:04:58', '0000-00-00 00:00:00', NULL),
(3016, '20TH FLOOR', 'BP01', 'OGM-002', 1, '2019-12-17 23:04:58', '0000-00-00 00:00:00', NULL),
(3017, '21ST FLOOR', 'BP01', 'OGM-002', 1, '2019-12-17 23:04:58', '0000-00-00 00:00:00', NULL),
(3018, '22ND FLOOR', 'BP01', 'OGM-002', 1, '2019-12-17 23:04:58', '0000-00-00 00:00:00', NULL),
(3019, '23RD FLOOR', 'BP01', 'OGM-002', 1, '2019-12-17 23:04:58', '0000-00-00 00:00:00', NULL),
(3020, '24TH FLOOR', 'BP01', 'OGM-002', 1, '2019-12-17 23:04:58', '0000-00-00 00:00:00', NULL),
(3021, '25TH FLOOR', 'BP01', 'OGM-002', 1, '2019-12-17 23:04:58', '0000-00-00 00:00:00', NULL),
(3022, '26TH FLOOR', 'BP01', 'OGM-002', 1, '2019-12-17 23:04:58', '0000-00-00 00:00:00', NULL),
(3023, '27TH FLOOR', 'BP01', 'OGM-002', 1, '2019-12-17 23:04:58', '0000-00-00 00:00:00', NULL),
(3024, '28TH FLOOR', 'BP01', 'OGM-002', 1, '2019-12-17 23:04:59', '0000-00-00 00:00:00', NULL),
(3025, '29TH FLOOR', 'BP01', 'OGM-002', 1, '2019-12-17 23:04:59', '0000-00-00 00:00:00', NULL),
(3026, '30TH FLOOR', 'BP01', 'OGM-002', 1, '2019-12-17 23:04:59', '0000-00-00 00:00:00', NULL),
(3027, '31ST FLOOR', 'BP01', 'OGM-002', 1, '2019-12-17 23:04:59', '0000-00-00 00:00:00', NULL),
(3028, '32ND FLOOR', 'BP01', 'OGM-002', 1, '2019-12-17 23:04:59', '0000-00-00 00:00:00', NULL),
(3029, ' 02ND PKG', 'BP01', 'OGM-003', 1, '2019-12-17 23:04:59', '0000-00-00 00:00:00', NULL),
(3030, ' 03RD PKG', 'BP01', 'OGM-003', 1, '2019-12-17 23:04:59', '0000-00-00 00:00:00', NULL);
INSERT INTO `tbl_sap_floors` (`id`, `floor_code`, `company_code`, `project_code`, `is_activated`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3031, ' 04TH PKG', 'BP01', 'OGM-003', 1, '2019-12-17 23:04:59', '0000-00-00 00:00:00', NULL),
(3032, ' 05TH PKG', 'BP01', 'OGM-003', 1, '2019-12-17 23:04:59', '0000-00-00 00:00:00', NULL),
(3033, ' 06TH PKG', 'BP01', 'OGM-003', 1, '2019-12-17 23:04:59', '0000-00-00 00:00:00', NULL),
(3034, ' 07TH PKG', 'BP01', 'OGM-003', 1, '2019-12-17 23:04:59', '0000-00-00 00:00:00', NULL),
(3035, ' GF COMML', 'BP01', 'OGM-003', 1, '2019-12-17 23:04:59', '0000-00-00 00:00:00', NULL),
(3036, '08TH FLOOR', 'BP01', 'OGM-003', 1, '2019-12-17 23:04:59', '0000-00-00 00:00:00', NULL),
(3037, '09TH FLOOR', 'BP01', 'OGM-003', 1, '2019-12-17 23:04:59', '0000-00-00 00:00:00', NULL),
(3038, '10TH FLOOR', 'BP01', 'OGM-003', 1, '2019-12-17 23:04:59', '0000-00-00 00:00:00', NULL),
(3039, '11TH FLOOR', 'BP01', 'OGM-003', 1, '2019-12-17 23:05:00', '0000-00-00 00:00:00', NULL),
(3040, '12TH FLOOR', 'BP01', 'OGM-003', 1, '2019-12-17 23:05:00', '0000-00-00 00:00:00', NULL),
(3041, '15TH FLOOR', 'BP01', 'OGM-003', 1, '2019-12-17 23:05:00', '0000-00-00 00:00:00', NULL),
(3042, '16TH FLOOR', 'BP01', 'OGM-003', 1, '2019-12-17 23:05:00', '0000-00-00 00:00:00', NULL),
(3043, '17TH FLOOR', 'BP01', 'OGM-003', 1, '2019-12-17 23:05:00', '0000-00-00 00:00:00', NULL),
(3044, '18TH FLOOR', 'BP01', 'OGM-003', 1, '2019-12-17 23:05:00', '0000-00-00 00:00:00', NULL),
(3045, '19TH FLOOR', 'BP01', 'OGM-003', 1, '2019-12-17 23:05:00', '0000-00-00 00:00:00', NULL),
(3046, '20TH FLOOR', 'BP01', 'OGM-003', 1, '2019-12-17 23:05:00', '0000-00-00 00:00:00', NULL),
(3047, '21ST FLOOR', 'BP01', 'OGM-003', 1, '2019-12-17 23:05:00', '0000-00-00 00:00:00', NULL),
(3048, '22ND FLOOR', 'BP01', 'OGM-003', 1, '2019-12-17 23:05:00', '0000-00-00 00:00:00', NULL),
(3049, '23RD FLOOR', 'BP01', 'OGM-003', 1, '2019-12-17 23:05:00', '0000-00-00 00:00:00', NULL),
(3050, '24TH FLOOR', 'BP01', 'OGM-003', 1, '2019-12-17 23:05:00', '0000-00-00 00:00:00', NULL),
(3051, '25TH FLOOR', 'BP01', 'OGM-003', 1, '2019-12-17 23:05:00', '0000-00-00 00:00:00', NULL),
(3052, '26TH FLOOR', 'BP01', 'OGM-003', 1, '2019-12-17 23:05:00', '0000-00-00 00:00:00', NULL),
(3053, '27TH FLOOR', 'BP01', 'OGM-003', 1, '2019-12-17 23:05:00', '0000-00-00 00:00:00', NULL),
(3054, '28TH FLOOR', 'BP01', 'OGM-003', 1, '2019-12-17 23:05:00', '0000-00-00 00:00:00', NULL),
(3055, '29TH FLOOR', 'BP01', 'OGM-003', 1, '2019-12-17 23:05:00', '0000-00-00 00:00:00', NULL),
(3056, '30TH FLOOR', 'BP01', 'OGM-003', 1, '2019-12-17 23:05:00', '0000-00-00 00:00:00', NULL),
(3057, '31ST FLOOR', 'BP01', 'OGM-003', 1, '2019-12-17 23:05:00', '0000-00-00 00:00:00', NULL),
(3058, '32ND FLOOR', 'BP01', 'OGM-003', 1, '2019-12-17 23:05:00', '0000-00-00 00:00:00', NULL),
(3059, '33RD FLOOR', 'BP01', 'OGM-003', 1, '2019-12-17 23:05:00', '0000-00-00 00:00:00', NULL),
(3060, '34TH FLOOR', 'BP01', 'OGM-003', 1, '2019-12-17 23:05:00', '0000-00-00 00:00:00', NULL),
(3061, '08TH FLOOR', 'BP01', 'OWS-001', 1, '2019-12-17 23:05:00', '0000-00-00 00:00:00', NULL),
(3062, '09TH FLOOR', 'BP01', 'OWS-001', 1, '2019-12-17 23:05:00', '0000-00-00 00:00:00', NULL),
(3063, '10TH FLOOR', 'BP01', 'OWS-001', 1, '2019-12-17 23:05:00', '0000-00-00 00:00:00', NULL),
(3064, '11TH FLOOR', 'BP01', 'OWS-001', 1, '2019-12-17 23:05:01', '0000-00-00 00:00:00', NULL),
(3065, '12TH FLOOR', 'BP01', 'OWS-001', 1, '2019-12-17 23:05:01', '0000-00-00 00:00:00', NULL),
(3066, '15TH FLOOR', 'BP01', 'OWS-001', 1, '2019-12-17 23:05:01', '0000-00-00 00:00:00', NULL),
(3067, '16TH FLOOR', 'BP01', 'OWS-001', 1, '2019-12-17 23:05:01', '0000-00-00 00:00:00', NULL),
(3068, '17TH FLOOR', 'BP01', 'OWS-001', 1, '2019-12-17 23:05:01', '0000-00-00 00:00:00', NULL),
(3069, '18TH FLOOR', 'BP01', 'OWS-001', 1, '2019-12-17 23:05:01', '0000-00-00 00:00:00', NULL),
(3070, '19TH FLOOR', 'BP01', 'OWS-001', 1, '2019-12-17 23:05:01', '0000-00-00 00:00:00', NULL),
(3071, '20TH FLOOR', 'BP01', 'OWS-001', 1, '2019-12-17 23:05:01', '0000-00-00 00:00:00', NULL),
(3072, '21ST FLOOR', 'BP01', 'OWS-001', 1, '2019-12-17 23:05:01', '0000-00-00 00:00:00', NULL),
(3073, '22ND FLOOR', 'BP01', 'OWS-001', 1, '2019-12-17 23:05:01', '0000-00-00 00:00:00', NULL),
(3074, '23RD FLOOR', 'BP01', 'OWS-001', 1, '2019-12-17 23:05:01', '0000-00-00 00:00:00', NULL),
(3075, '25TH FLOOR', 'BP01', 'OWS-001', 1, '2019-12-17 23:05:01', '0000-00-00 00:00:00', NULL),
(3076, '26TH FLOOR', 'BP01', 'OWS-001', 1, '2019-12-17 23:05:01', '0000-00-00 00:00:00', NULL),
(3077, '27TH FLOOR', 'BP01', 'OWS-001', 1, '2019-12-17 23:05:01', '0000-00-00 00:00:00', NULL),
(3078, '28TH FLOOR', 'BP01', 'OWS-001', 1, '2019-12-17 23:05:01', '0000-00-00 00:00:00', NULL),
(3079, '29TH FLOOR', 'BP01', 'OWS-001', 1, '2019-12-17 23:05:01', '0000-00-00 00:00:00', NULL),
(3080, '30TH FLOOR', 'BP01', 'OWS-001', 1, '2019-12-17 23:05:01', '0000-00-00 00:00:00', NULL),
(3081, '31ST FLOOR', 'BP01', 'OWS-001', 1, '2019-12-17 23:05:01', '0000-00-00 00:00:00', NULL),
(3082, '32ND FLOOR', 'BP01', 'OWS-001', 1, '2019-12-17 23:05:01', '0000-00-00 00:00:00', NULL),
(3083, '33RD FLOOR', 'BP01', 'OWS-001', 1, '2019-12-17 23:05:01', '0000-00-00 00:00:00', NULL),
(3084, '34TH FLOOR', 'BP01', 'OWS-001', 1, '2019-12-17 23:05:01', '0000-00-00 00:00:00', NULL),
(3085, '35TH FLOOR', 'BP01', 'OWS-001', 1, '2019-12-17 23:05:01', '0000-00-00 00:00:00', NULL),
(3086, '36TH FLOOR', 'BP01', 'OWS-001', 1, '2019-12-17 23:05:01', '0000-00-00 00:00:00', NULL),
(3087, '37TH FLOOR', 'BP01', 'OWS-001', 1, '2019-12-17 23:05:01', '0000-00-00 00:00:00', NULL),
(3088, '38TH FLOOR', 'BP01', 'OWS-001', 1, '2019-12-17 23:05:01', '0000-00-00 00:00:00', NULL),
(3089, '3RD PKG', 'BP01', 'OWS-001', 1, '2019-12-17 23:05:01', '0000-00-00 00:00:00', NULL),
(3090, '4TH PKG', 'BP01', 'OWS-001', 1, '2019-12-17 23:05:02', '0000-00-00 00:00:00', NULL),
(3091, '5TH PKG', 'BP01', 'OWS-001', 1, '2019-12-17 23:05:02', '0000-00-00 00:00:00', NULL),
(3092, '6TH PKG', 'BP01', 'OWS-001', 1, '2019-12-17 23:05:02', '0000-00-00 00:00:00', NULL),
(3093, 'BASEMENT 1', 'BP01', 'OWS-001', 1, '2019-12-17 23:05:02', '0000-00-00 00:00:00', NULL),
(3094, 'BASEMENT 2', 'BP01', 'OWS-001', 1, '2019-12-17 23:05:02', '0000-00-00 00:00:00', NULL),
(3095, 'BASEMENT 3', 'BP01', 'OWS-001', 1, '2019-12-17 23:05:02', '0000-00-00 00:00:00', NULL),
(3096, 'COMMERCIAL', 'BP01', 'OWS-001', 1, '2019-12-17 23:05:02', '0000-00-00 00:00:00', NULL),
(3097, ' 01ST PKG', 'BP01', 'PDR-001', 1, '2019-12-17 23:05:02', '0000-00-00 00:00:00', NULL),
(3098, '07TH FLOOR', 'BP01', 'PDR-001', 1, '2019-12-17 23:05:02', '0000-00-00 00:00:00', NULL),
(3099, '08TH FLOOR', 'BP01', 'PDR-001', 1, '2019-12-17 23:05:02', '0000-00-00 00:00:00', NULL),
(3100, '09TH FLOOR', 'BP01', 'PDR-001', 1, '2019-12-17 23:05:02', '0000-00-00 00:00:00', NULL),
(3101, '10TH FLOOR', 'BP01', 'PDR-001', 1, '2019-12-17 23:05:03', '0000-00-00 00:00:00', NULL),
(3102, '11TH FLOOR', 'BP01', 'PDR-001', 1, '2019-12-17 23:05:03', '0000-00-00 00:00:00', NULL),
(3103, '12TH FLOOR', 'BP01', 'PDR-001', 1, '2019-12-17 23:05:03', '0000-00-00 00:00:00', NULL),
(3104, '15TH FLOOR', 'BP01', 'PDR-001', 1, '2019-12-17 23:05:03', '0000-00-00 00:00:00', NULL),
(3105, '16TH FLOOR', 'BP01', 'PDR-001', 1, '2019-12-17 23:05:03', '0000-00-00 00:00:00', NULL),
(3106, '17TH FLOOR', 'BP01', 'PDR-001', 1, '2019-12-17 23:05:03', '0000-00-00 00:00:00', NULL),
(3107, '18TH FLOOR', 'BP01', 'PDR-001', 1, '2019-12-17 23:05:03', '0000-00-00 00:00:00', NULL),
(3108, '19TH FLOOR', 'BP01', 'PDR-001', 1, '2019-12-17 23:05:03', '0000-00-00 00:00:00', NULL),
(3109, '20TH FLOOR', 'BP01', 'PDR-001', 1, '2019-12-17 23:05:03', '0000-00-00 00:00:00', NULL),
(3110, '21ST FLOOR', 'BP01', 'PDR-001', 1, '2019-12-17 23:05:03', '0000-00-00 00:00:00', NULL),
(3111, '22ND FLOOR', 'BP01', 'PDR-001', 1, '2019-12-17 23:05:03', '0000-00-00 00:00:00', NULL),
(3112, '23RD FLOOR', 'BP01', 'PDR-001', 1, '2019-12-17 23:05:03', '0000-00-00 00:00:00', NULL),
(3113, '24TH FLOOR', 'BP01', 'PDR-001', 1, '2019-12-17 23:05:03', '0000-00-00 00:00:00', NULL),
(3114, '25TH FLOOR', 'BP01', 'PDR-001', 1, '2019-12-17 23:05:03', '0000-00-00 00:00:00', NULL),
(3115, '26TH FLOOR', 'BP01', 'PDR-001', 1, '2019-12-17 23:05:03', '0000-00-00 00:00:00', NULL),
(3116, '27TH FLOOR', 'BP01', 'PDR-001', 1, '2019-12-17 23:05:03', '0000-00-00 00:00:00', NULL),
(3117, '28TH FLOOR', 'BP01', 'PDR-001', 1, '2019-12-17 23:05:03', '0000-00-00 00:00:00', NULL),
(3118, '29TH FLOOR', 'BP01', 'PDR-001', 1, '2019-12-17 23:05:03', '0000-00-00 00:00:00', NULL),
(3119, '32ND FLOOR', 'BP01', 'PDR-001', 1, '2019-12-17 23:05:03', '0000-00-00 00:00:00', NULL),
(3120, 'COMMERCIAL', 'BP01', 'PDR-001', 1, '2019-12-17 23:05:03', '0000-00-00 00:00:00', NULL),
(3121, 'LOWER G/F', 'BP01', 'PDR-001', 1, '2019-12-17 23:05:03', '0000-00-00 00:00:00', NULL),
(3122, 'PENTHOUSE', 'BP01', 'PDR-001', 1, '2019-12-17 23:05:03', '0000-00-00 00:00:00', NULL),
(3123, 'TANDEM PKG', 'BP01', 'PDR-001', 1, '2019-12-17 23:05:04', '0000-00-00 00:00:00', NULL),
(3124, 'UPPER G/F', 'BP01', 'PDR-001', 1, '2019-12-17 23:05:04', '0000-00-00 00:00:00', NULL),
(3125, '01ST PKG', 'BP01', 'PDR-002', 1, '2019-12-17 23:05:04', '0000-00-00 00:00:00', NULL),
(3126, '06TH FLOOR', 'BP01', 'PDR-002', 1, '2019-12-17 23:05:04', '0000-00-00 00:00:00', NULL),
(3127, '07TH FLOOR', 'BP01', 'PDR-002', 1, '2019-12-17 23:05:04', '0000-00-00 00:00:00', NULL),
(3128, '08TH FLOOR', 'BP01', 'PDR-002', 1, '2019-12-17 23:05:04', '0000-00-00 00:00:00', NULL),
(3129, '09TH FLOOR', 'BP01', 'PDR-002', 1, '2019-12-17 23:05:04', '0000-00-00 00:00:00', NULL),
(3130, '10TH FLOOR', 'BP01', 'PDR-002', 1, '2019-12-17 23:05:04', '0000-00-00 00:00:00', NULL),
(3131, '11TH FLOOR', 'BP01', 'PDR-002', 1, '2019-12-17 23:05:04', '0000-00-00 00:00:00', NULL),
(3132, '12TH FLOOR', 'BP01', 'PDR-002', 1, '2019-12-17 23:05:04', '0000-00-00 00:00:00', NULL),
(3133, '15TH FLOOR', 'BP01', 'PDR-002', 1, '2019-12-17 23:05:04', '0000-00-00 00:00:00', NULL),
(3134, '16TH FLOOR', 'BP01', 'PDR-002', 1, '2019-12-17 23:05:04', '0000-00-00 00:00:00', NULL),
(3135, '17TH FLOOR', 'BP01', 'PDR-002', 1, '2019-12-17 23:05:04', '0000-00-00 00:00:00', NULL),
(3136, '18TH FLOOR', 'BP01', 'PDR-002', 1, '2019-12-17 23:05:04', '0000-00-00 00:00:00', NULL),
(3137, '19TH FLOOR', 'BP01', 'PDR-002', 1, '2019-12-17 23:05:04', '0000-00-00 00:00:00', NULL),
(3138, '20TH FLOOR', 'BP01', 'PDR-002', 1, '2019-12-17 23:05:04', '0000-00-00 00:00:00', NULL),
(3139, '21ST FLOOR', 'BP01', 'PDR-002', 1, '2019-12-17 23:05:04', '0000-00-00 00:00:00', NULL),
(3140, '22ND FLOOR', 'BP01', 'PDR-002', 1, '2019-12-17 23:05:04', '0000-00-00 00:00:00', NULL),
(3141, '23RD FLOOR', 'BP01', 'PDR-002', 1, '2019-12-17 23:05:04', '0000-00-00 00:00:00', NULL),
(3142, '24TH FLOOR', 'BP01', 'PDR-002', 1, '2019-12-17 23:05:04', '0000-00-00 00:00:00', NULL),
(3143, '25TH FLOOR', 'BP01', 'PDR-002', 1, '2019-12-17 23:05:04', '0000-00-00 00:00:00', NULL),
(3144, '26TH FLOOR', 'BP01', 'PDR-002', 1, '2019-12-17 23:05:04', '0000-00-00 00:00:00', NULL),
(3145, '27TH FLOOR', 'BP01', 'PDR-002', 1, '2019-12-17 23:05:04', '0000-00-00 00:00:00', NULL),
(3146, '28TH FLOOR', 'BP01', 'PDR-002', 1, '2019-12-17 23:05:04', '0000-00-00 00:00:00', NULL),
(3147, '29TH FLOOR', 'BP01', 'PDR-002', 1, '2019-12-17 23:05:04', '0000-00-00 00:00:00', NULL),
(3148, '30TH FLOOR', 'BP01', 'PDR-002', 1, '2019-12-17 23:05:04', '0000-00-00 00:00:00', NULL),
(3149, '31ST FLOOR', 'BP01', 'PDR-002', 1, '2019-12-17 23:05:04', '0000-00-00 00:00:00', NULL),
(3150, '32ND FLOOR', 'BP01', 'PDR-002', 1, '2019-12-17 23:05:05', '0000-00-00 00:00:00', NULL),
(3151, '33RD FLOOR', 'BP01', 'PDR-002', 1, '2019-12-17 23:05:05', '0000-00-00 00:00:00', NULL),
(3152, '34TH FLOOR', 'BP01', 'PDR-002', 1, '2019-12-17 23:05:05', '0000-00-00 00:00:00', NULL),
(3153, 'COMMERCIAL', 'BP01', 'PDR-002', 1, '2019-12-17 23:05:05', '0000-00-00 00:00:00', NULL),
(3154, 'LOWER G/F', 'BP01', 'PDR-002', 1, '2019-12-17 23:05:05', '0000-00-00 00:00:00', NULL),
(3155, 'TANDEM PKG', 'BP01', 'PDR-002', 1, '2019-12-17 23:05:05', '0000-00-00 00:00:00', NULL),
(3156, 'UPPER G/F', 'BP01', 'PDR-002', 1, '2019-12-17 23:05:05', '0000-00-00 00:00:00', NULL),
(3157, ' 01ST PKG', 'BP01', 'PW-001', 1, '2019-12-17 23:05:05', '0000-00-00 00:00:00', NULL),
(3158, ' 2ND FLOOR', 'BP01', 'PW-001', 1, '2019-12-17 23:05:05', '0000-00-00 00:00:00', NULL),
(3159, ' GRND FLOOR', 'BP01', 'PW-001', 1, '2019-12-17 23:05:05', '0000-00-00 00:00:00', NULL),
(3160, '06TH/GARDEN', 'BP01', 'PW-001', 1, '2019-12-17 23:05:05', '0000-00-00 00:00:00', NULL),
(3161, '07TH FLOOR', 'BP01', 'PW-001', 1, '2019-12-17 23:05:05', '0000-00-00 00:00:00', NULL),
(3162, '08TH FLOOR', 'BP01', 'PW-001', 1, '2019-12-17 23:05:05', '0000-00-00 00:00:00', NULL),
(3163, '09TH FLOOR', 'BP01', 'PW-001', 1, '2019-12-17 23:05:05', '0000-00-00 00:00:00', NULL),
(3164, '10TH FLOOR', 'BP01', 'PW-001', 1, '2019-12-17 23:05:05', '0000-00-00 00:00:00', NULL),
(3165, '11TH FLOOR', 'BP01', 'PW-001', 1, '2019-12-17 23:05:05', '0000-00-00 00:00:00', NULL),
(3166, '12TH FLOOR', 'BP01', 'PW-001', 1, '2019-12-17 23:05:05', '0000-00-00 00:00:00', NULL),
(3167, '14TH FLOOR', 'BP01', 'PW-001', 1, '2019-12-17 23:05:05', '0000-00-00 00:00:00', NULL),
(3168, '15TH FLOOR', 'BP01', 'PW-001', 1, '2019-12-17 23:05:05', '0000-00-00 00:00:00', NULL),
(3169, '16TH FLOOR', 'BP01', 'PW-001', 1, '2019-12-17 23:05:05', '0000-00-00 00:00:00', NULL),
(3170, '17TH FLOOR', 'BP01', 'PW-001', 1, '2019-12-17 23:05:05', '0000-00-00 00:00:00', NULL),
(3171, '18TH FLOOR', 'BP01', 'PW-001', 1, '2019-12-17 23:05:05', '0000-00-00 00:00:00', NULL),
(3172, '19TH FLOOR', 'BP01', 'PW-001', 1, '2019-12-17 23:05:06', '0000-00-00 00:00:00', NULL),
(3173, '1ST FLOOR', 'BP01', 'PW-001', 1, '2019-12-17 23:05:06', '0000-00-00 00:00:00', NULL),
(3174, '20TH FLOOR', 'BP01', 'PW-001', 1, '2019-12-17 23:05:06', '0000-00-00 00:00:00', NULL),
(3175, '21ST FLOOR', 'BP01', 'PW-001', 1, '2019-12-17 23:05:06', '0000-00-00 00:00:00', NULL),
(3176, '22ND FLOOR', 'BP01', 'PW-001', 1, '2019-12-17 23:05:06', '0000-00-00 00:00:00', NULL),
(3177, '23RD FLOOR', 'BP01', 'PW-001', 1, '2019-12-17 23:05:06', '0000-00-00 00:00:00', NULL),
(3178, '24TH FLOOR', 'BP01', 'PW-001', 1, '2019-12-17 23:05:06', '0000-00-00 00:00:00', NULL),
(3179, '25TH FLOOR', 'BP01', 'PW-001', 1, '2019-12-17 23:05:06', '0000-00-00 00:00:00', NULL),
(3180, '26TH FLOOR', 'BP01', 'PW-001', 1, '2019-12-17 23:05:06', '0000-00-00 00:00:00', NULL),
(3181, '27TH FLOOR', 'BP01', 'PW-001', 1, '2019-12-17 23:05:06', '0000-00-00 00:00:00', NULL),
(3182, '28TH FLOOR', 'BP01', 'PW-001', 1, '2019-12-17 23:05:06', '0000-00-00 00:00:00', NULL),
(3183, '29TH FLOOR', 'BP01', 'PW-001', 1, '2019-12-17 23:05:06', '0000-00-00 00:00:00', NULL),
(3184, '30TH FLOOR', 'BP01', 'PW-001', 1, '2019-12-17 23:05:06', '0000-00-00 00:00:00', NULL),
(3185, '31ST FLOOR', 'BP01', 'PW-001', 1, '2019-12-17 23:05:06', '0000-00-00 00:00:00', NULL),
(3186, '32ND FLOOR', 'BP01', 'PW-001', 1, '2019-12-17 23:05:06', '0000-00-00 00:00:00', NULL),
(3187, '33RD FLOOR', 'BP01', 'PW-001', 1, '2019-12-17 23:05:06', '0000-00-00 00:00:00', NULL),
(3188, '34TH FLOOR', 'BP01', 'PW-001', 1, '2019-12-17 23:05:06', '0000-00-00 00:00:00', NULL),
(3189, '35TH FLOOR', 'BP01', 'PW-001', 1, '2019-12-17 23:05:06', '0000-00-00 00:00:00', NULL),
(3190, '36TH FLOOR', 'BP01', 'PW-001', 1, '2019-12-17 23:05:06', '0000-00-00 00:00:00', NULL),
(3191, '37TH FLOOR', 'BP01', 'PW-001', 1, '2019-12-17 23:05:06', '0000-00-00 00:00:00', NULL),
(3192, '38TH FLOOR', 'BP01', 'PW-001', 1, '2019-12-17 23:05:07', '0000-00-00 00:00:00', NULL),
(3193, '39TH FLOOR', 'BP01', 'PW-001', 1, '2019-12-17 23:05:07', '0000-00-00 00:00:00', NULL),
(3194, '3F PKG', 'BP01', 'PW-001', 1, '2019-12-17 23:05:07', '0000-00-00 00:00:00', NULL),
(3195, '40TH FLOOR', 'BP01', 'PW-001', 1, '2019-12-17 23:05:07', '0000-00-00 00:00:00', NULL),
(3196, '41ST FLOOR', 'BP01', 'PW-001', 1, '2019-12-17 23:05:07', '0000-00-00 00:00:00', NULL),
(3197, '4F PKG', 'BP01', 'PW-001', 1, '2019-12-17 23:05:07', '0000-00-00 00:00:00', NULL),
(3198, '5F PKG', 'BP01', 'PW-001', 1, '2019-12-17 23:05:07', '0000-00-00 00:00:00', NULL),
(3199, '6F PKG', 'BP01', 'PW-001', 1, '2019-12-17 23:05:07', '0000-00-00 00:00:00', NULL),
(3200, 'ALTERATION', 'BP01', 'PW-001', 1, '2019-12-17 23:05:07', '0000-00-00 00:00:00', NULL),
(3201, 'B1 PKG', 'BP01', 'PW-001', 1, '2019-12-17 23:05:07', '0000-00-00 00:00:00', NULL),
(3202, 'B2 PKG', 'BP01', 'PW-001', 1, '2019-12-17 23:05:07', '0000-00-00 00:00:00', NULL),
(3203, 'LHH', 'BP01', 'PW-001', 1, '2019-12-17 23:05:07', '0000-00-00 00:00:00', NULL),
(3204, 'MBTC PKG', 'BP01', 'PW-001', 1, '2019-12-17 23:05:07', '0000-00-00 00:00:00', NULL),
(3205, 'P.SLOTLEASE', 'BP01', 'PW-001', 1, '2019-12-17 23:05:07', '0000-00-00 00:00:00', NULL),
(3206, 'PWD', 'BP01', 'PW-001', 1, '2019-12-17 23:05:07', '0000-00-00 00:00:00', NULL),
(3207, 'RETAIL PKG', 'BP01', 'PW-001', 1, '2019-12-17 23:05:07', '0000-00-00 00:00:00', NULL),
(3208, 'UNITS LEASE', 'BP01', 'PW-001', 1, '2019-12-17 23:05:07', '0000-00-00 00:00:00', NULL),
(3209, ' GF COMML', 'BP01', 'RG-001', 1, '2019-12-17 23:05:07', '0000-00-00 00:00:00', NULL),
(3210, '07TH FLOOR', 'BP01', 'RG-001', 1, '2019-12-17 23:05:07', '0000-00-00 00:00:00', NULL),
(3211, '08TH FLOOR', 'BP01', 'RG-001', 1, '2019-12-17 23:05:07', '0000-00-00 00:00:00', NULL),
(3212, '09TH FLOOR', 'BP01', 'RG-001', 1, '2019-12-17 23:05:07', '0000-00-00 00:00:00', NULL),
(3213, '10TH FLOOR', 'BP01', 'RG-001', 1, '2019-12-17 23:05:07', '0000-00-00 00:00:00', NULL),
(3214, '11TH FLOOR', 'BP01', 'RG-001', 1, '2019-12-17 23:05:07', '0000-00-00 00:00:00', NULL),
(3215, '12TH FLOOR', 'BP01', 'RG-001', 1, '2019-12-17 23:05:07', '0000-00-00 00:00:00', NULL),
(3216, '15TH FLOOR', 'BP01', 'RG-001', 1, '2019-12-17 23:05:07', '0000-00-00 00:00:00', NULL),
(3217, '16TH FLOOR', 'BP01', 'RG-001', 1, '2019-12-17 23:05:07', '0000-00-00 00:00:00', NULL),
(3218, '17TH FLOOR', 'BP01', 'RG-001', 1, '2019-12-17 23:05:07', '0000-00-00 00:00:00', NULL),
(3219, '18TH FLOOR', 'BP01', 'RG-001', 1, '2019-12-17 23:05:07', '0000-00-00 00:00:00', NULL),
(3220, '19TH FLOOR', 'BP01', 'RG-001', 1, '2019-12-17 23:05:08', '0000-00-00 00:00:00', NULL),
(3221, '20TH FLOOR', 'BP01', 'RG-001', 1, '2019-12-17 23:05:08', '0000-00-00 00:00:00', NULL),
(3222, '21ST FLOOR', 'BP01', 'RG-001', 1, '2019-12-17 23:05:08', '0000-00-00 00:00:00', NULL),
(3223, '22ND FLOOR', 'BP01', 'RG-001', 1, '2019-12-17 23:05:08', '0000-00-00 00:00:00', NULL),
(3224, '23RD FLOOR', 'BP01', 'RG-001', 1, '2019-12-17 23:05:08', '0000-00-00 00:00:00', NULL),
(3225, '25TH FLOOR', 'BP01', 'RG-001', 1, '2019-12-17 23:05:08', '0000-00-00 00:00:00', NULL),
(3226, '26TH FLOOR', 'BP01', 'RG-001', 1, '2019-12-17 23:05:08', '0000-00-00 00:00:00', NULL),
(3227, '27TH FLOOR', 'BP01', 'RG-001', 1, '2019-12-17 23:05:08', '0000-00-00 00:00:00', NULL),
(3228, '28TH FLOOR', 'BP01', 'RG-001', 1, '2019-12-17 23:05:08', '0000-00-00 00:00:00', NULL),
(3229, '29TH FLOOR', 'BP01', 'RG-001', 1, '2019-12-17 23:05:08', '0000-00-00 00:00:00', NULL),
(3230, '30TH FLOOR', 'BP01', 'RG-001', 1, '2019-12-17 23:05:08', '0000-00-00 00:00:00', NULL),
(3231, '31ST FLOOR', 'BP01', 'RG-001', 1, '2019-12-17 23:05:08', '0000-00-00 00:00:00', NULL),
(3232, '32ND FLOOR', 'BP01', 'RG-001', 1, '2019-12-17 23:05:08', '0000-00-00 00:00:00', NULL),
(3233, '33RD FLOOR', 'BP01', 'RG-001', 1, '2019-12-17 23:05:08', '0000-00-00 00:00:00', NULL),
(3234, '35TH FLOOR', 'BP01', 'RG-001', 1, '2019-12-17 23:05:08', '0000-00-00 00:00:00', NULL),
(3235, 'MEZZANINE1', 'BP01', 'RG-001', 1, '2019-12-17 23:05:08', '0000-00-00 00:00:00', NULL),
(3236, 'SINGLE PKG', 'BP01', 'RG-001', 1, '2019-12-17 23:05:08', '0000-00-00 00:00:00', NULL),
(3237, 'TANDEM PKG', 'BP01', 'RG-001', 1, '2019-12-17 23:05:08', '0000-00-00 00:00:00', NULL),
(3238, '01ST COMM', 'BP01', 'RG-002', 1, '2019-12-17 23:05:08', '0000-00-00 00:00:00', NULL),
(3239, '01ST PKG', 'BP01', 'RG-002', 1, '2019-12-17 23:05:08', '0000-00-00 00:00:00', NULL),
(3240, '07TH FLOOR', 'BP01', 'RG-002', 1, '2019-12-17 23:05:08', '0000-00-00 00:00:00', NULL),
(3241, '08TH FLOOR', 'BP01', 'RG-002', 1, '2019-12-17 23:05:08', '0000-00-00 00:00:00', NULL),
(3242, '09TH FLOOR', 'BP01', 'RG-002', 1, '2019-12-17 23:05:08', '0000-00-00 00:00:00', NULL),
(3243, '10TH FLOOR', 'BP01', 'RG-002', 1, '2019-12-17 23:05:08', '0000-00-00 00:00:00', NULL),
(3244, '11TH FLOOR', 'BP01', 'RG-002', 1, '2019-12-17 23:05:09', '0000-00-00 00:00:00', NULL),
(3245, '12TH FLOOR', 'BP01', 'RG-002', 1, '2019-12-17 23:05:09', '0000-00-00 00:00:00', NULL),
(3246, '15TH FLOOR', 'BP01', 'RG-002', 1, '2019-12-17 23:05:09', '0000-00-00 00:00:00', NULL),
(3247, '16TH FLOOR', 'BP01', 'RG-002', 1, '2019-12-17 23:05:09', '0000-00-00 00:00:00', NULL),
(3248, '17TH FLOOR', 'BP01', 'RG-002', 1, '2019-12-17 23:05:09', '0000-00-00 00:00:00', NULL),
(3249, '18TH FLOOR', 'BP01', 'RG-002', 1, '2019-12-17 23:05:09', '0000-00-00 00:00:00', NULL),
(3250, '19TH FLOOR', 'BP01', 'RG-002', 1, '2019-12-17 23:05:09', '0000-00-00 00:00:00', NULL),
(3251, '20TH FLOOR', 'BP01', 'RG-002', 1, '2019-12-17 23:05:09', '0000-00-00 00:00:00', NULL),
(3252, '21ST FLOOR', 'BP01', 'RG-002', 1, '2019-12-17 23:05:09', '0000-00-00 00:00:00', NULL),
(3253, '22ND FLOOR', 'BP01', 'RG-002', 1, '2019-12-17 23:05:09', '0000-00-00 00:00:00', NULL),
(3254, '23RD FLOOR', 'BP01', 'RG-002', 1, '2019-12-17 23:05:09', '0000-00-00 00:00:00', NULL),
(3255, '25TH FLOOR', 'BP01', 'RG-002', 1, '2019-12-17 23:05:09', '0000-00-00 00:00:00', NULL),
(3256, '26TH FLOOR', 'BP01', 'RG-002', 1, '2019-12-17 23:05:09', '0000-00-00 00:00:00', NULL),
(3257, '27TH FLOOR', 'BP01', 'RG-002', 1, '2019-12-17 23:05:09', '0000-00-00 00:00:00', NULL),
(3258, '28TH FLOOR', 'BP01', 'RG-002', 1, '2019-12-17 23:05:09', '0000-00-00 00:00:00', NULL),
(3259, '29TH FLOOR', 'BP01', 'RG-002', 1, '2019-12-17 23:05:09', '0000-00-00 00:00:00', NULL),
(3260, '30TH FLOOR', 'BP01', 'RG-002', 1, '2019-12-17 23:05:09', '0000-00-00 00:00:00', NULL),
(3261, '31ST FLOOR', 'BP01', 'RG-002', 1, '2019-12-17 23:05:09', '0000-00-00 00:00:00', NULL),
(3262, '32ND FLOOR', 'BP01', 'RG-002', 1, '2019-12-17 23:05:09', '0000-00-00 00:00:00', NULL),
(3263, '33RD FLOOR', 'BP01', 'RG-002', 1, '2019-12-17 23:05:09', '0000-00-00 00:00:00', NULL),
(3264, '35TH FLOOR', 'BP01', 'RG-002', 1, '2019-12-17 23:05:09', '0000-00-00 00:00:00', NULL),
(3265, 'MEZZANINE1', 'BP01', 'RG-002', 1, '2019-12-17 23:05:09', '0000-00-00 00:00:00', NULL),
(3266, 'TANDEM PKG', 'BP01', 'RG-002', 1, '2019-12-17 23:05:09', '0000-00-00 00:00:00', NULL),
(3267, ' 02ND PKG', 'BP01', 'RVM-001', 1, '2019-12-17 23:05:09', '0000-00-00 00:00:00', NULL),
(3268, ' 03RD PKG', 'BP01', 'RVM-001', 1, '2019-12-17 23:05:09', '0000-00-00 00:00:00', NULL),
(3269, ' 04TH PKG', 'BP01', 'RVM-001', 1, '2019-12-17 23:05:10', '0000-00-00 00:00:00', NULL),
(3270, ' 05TH PKG', 'BP01', 'RVM-001', 1, '2019-12-17 23:05:10', '0000-00-00 00:00:00', NULL),
(3271, ' 06TH PKG', 'BP01', 'RVM-001', 1, '2019-12-17 23:05:10', '0000-00-00 00:00:00', NULL),
(3272, '01ST COMML', 'BP01', 'RVM-001', 1, '2019-12-17 23:05:10', '0000-00-00 00:00:00', NULL),
(3273, '08TH FLOOR', 'BP01', 'RVM-001', 1, '2019-12-17 23:05:10', '0000-00-00 00:00:00', NULL),
(3274, '09TH FLOOR', 'BP01', 'RVM-001', 1, '2019-12-17 23:05:10', '0000-00-00 00:00:00', NULL),
(3275, '10TH FLOOR', 'BP01', 'RVM-001', 1, '2019-12-17 23:05:10', '0000-00-00 00:00:00', NULL),
(3276, '11TH FLOOR', 'BP01', 'RVM-001', 1, '2019-12-17 23:05:10', '0000-00-00 00:00:00', NULL),
(3277, '12TH FLOOR', 'BP01', 'RVM-001', 1, '2019-12-17 23:05:10', '0000-00-00 00:00:00', NULL),
(3278, '15TH FLOOR', 'BP01', 'RVM-001', 1, '2019-12-17 23:05:10', '0000-00-00 00:00:00', NULL),
(3279, '16TH FLOOR', 'BP01', 'RVM-001', 1, '2019-12-17 23:05:10', '0000-00-00 00:00:00', NULL),
(3280, '17TH FLOOR', 'BP01', 'RVM-001', 1, '2019-12-17 23:05:10', '0000-00-00 00:00:00', NULL),
(3281, '18TH FLOOR', 'BP01', 'RVM-001', 1, '2019-12-17 23:05:10', '0000-00-00 00:00:00', NULL),
(3282, '19TH FLOOR', 'BP01', 'RVM-001', 1, '2019-12-17 23:05:10', '0000-00-00 00:00:00', NULL),
(3283, '20TH FLOOR', 'BP01', 'RVM-001', 1, '2019-12-17 23:05:10', '0000-00-00 00:00:00', NULL),
(3284, '21ST FLOOR', 'BP01', 'RVM-001', 1, '2019-12-17 23:05:10', '0000-00-00 00:00:00', NULL),
(3285, '22ND FLOOR', 'BP01', 'RVM-001', 1, '2019-12-17 23:05:10', '0000-00-00 00:00:00', NULL),
(3286, '23RD FLOOR', 'BP01', 'RVM-001', 1, '2019-12-17 23:05:10', '0000-00-00 00:00:00', NULL),
(3287, '24TH FLOOR', 'BP01', 'RVM-001', 1, '2019-12-17 23:05:10', '0000-00-00 00:00:00', NULL),
(3288, '25TH FLOOR', 'BP01', 'RVM-001', 1, '2019-12-17 23:05:10', '0000-00-00 00:00:00', NULL),
(3289, '26TH FLOOR', 'BP01', 'RVM-001', 1, '2019-12-17 23:05:11', '0000-00-00 00:00:00', NULL),
(3290, '27TH FLOOR', 'BP01', 'RVM-001', 1, '2019-12-17 23:05:11', '0000-00-00 00:00:00', NULL),
(3291, '28TH FLOOR', 'BP01', 'RVM-001', 1, '2019-12-17 23:05:11', '0000-00-00 00:00:00', NULL),
(3292, '29TH FLOOR', 'BP01', 'RVM-001', 1, '2019-12-17 23:05:11', '0000-00-00 00:00:00', NULL),
(3293, '30TH FLOOR', 'BP01', 'RVM-001', 1, '2019-12-17 23:05:11', '0000-00-00 00:00:00', NULL),
(3294, '31ST FLOOR', 'BP01', 'RVM-001', 1, '2019-12-17 23:05:11', '0000-00-00 00:00:00', NULL),
(3295, '32ND FLOOR', 'BP01', 'RVM-001', 1, '2019-12-17 23:05:11', '0000-00-00 00:00:00', NULL),
(3296, 'LOWER PENT', 'BP01', 'RVM-001', 1, '2019-12-17 23:05:11', '0000-00-00 00:00:00', NULL),
(3297, 'UPPER PENT', 'BP01', 'RVM-001', 1, '2019-12-17 23:05:11', '0000-00-00 00:00:00', NULL),
(3298, ' PARKING', 'BP01', 'SSR-001', 1, '2019-12-17 23:05:11', '0000-00-00 00:00:00', NULL),
(3299, '01ST COMM', 'BP01', 'SSR-001', 1, '2019-12-17 23:05:11', '0000-00-00 00:00:00', NULL),
(3300, '03RD FLOOR', 'BP01', 'SSR-001', 1, '2019-12-17 23:05:11', '0000-00-00 00:00:00', NULL),
(3301, '05TH FLOOR', 'BP01', 'SSR-001', 1, '2019-12-17 23:05:11', '0000-00-00 00:00:00', NULL),
(3302, '06TH FLOOR', 'BP01', 'SSR-001', 1, '2019-12-17 23:05:11', '0000-00-00 00:00:00', NULL),
(3303, '07TH FLOOR', 'BP01', 'SSR-001', 1, '2019-12-17 23:05:11', '0000-00-00 00:00:00', NULL),
(3304, '08TH FLOOR', 'BP01', 'SSR-001', 1, '2019-12-17 23:05:11', '0000-00-00 00:00:00', NULL),
(3305, '09TH FLOOR', 'BP01', 'SSR-001', 1, '2019-12-17 23:05:11', '0000-00-00 00:00:00', NULL),
(3306, '10TH FLOOR', 'BP01', 'SSR-001', 1, '2019-12-17 23:05:11', '0000-00-00 00:00:00', NULL),
(3307, '11TH FLOOR', 'BP01', 'SSR-001', 1, '2019-12-17 23:05:11', '0000-00-00 00:00:00', NULL),
(3308, '12TH FLOOR', 'BP01', 'SSR-001', 1, '2019-12-17 23:05:12', '0000-00-00 00:00:00', NULL),
(3309, '14TH FLOOR', 'BP01', 'SSR-001', 1, '2019-12-17 23:05:12', '0000-00-00 00:00:00', NULL),
(3310, '15TH FLOOR', 'BP01', 'SSR-001', 1, '2019-12-17 23:05:12', '0000-00-00 00:00:00', NULL),
(3311, '16TH FLOOR', 'BP01', 'SSR-001', 1, '2019-12-17 23:05:12', '0000-00-00 00:00:00', NULL),
(3312, '17TH FLOOR', 'BP01', 'SSR-001', 1, '2019-12-17 23:05:12', '0000-00-00 00:00:00', NULL),
(3313, '18TH FLOOR', 'BP01', 'SSR-001', 1, '2019-12-17 23:05:12', '0000-00-00 00:00:00', NULL),
(3314, 'PH FLOOR', 'BP01', 'SSR-001', 1, '2019-12-17 23:05:12', '0000-00-00 00:00:00', NULL),
(3315, ' SUITE FLR', 'BP01', 'SSR-002', 1, '2019-12-17 23:05:12', '0000-00-00 00:00:00', NULL),
(3316, '01ST COMM', 'BP01', 'SSR-002', 1, '2019-12-17 23:05:12', '0000-00-00 00:00:00', NULL),
(3317, '03RD FLOOR', 'BP01', 'SSR-002', 1, '2019-12-17 23:05:12', '0000-00-00 00:00:00', NULL),
(3318, '05TH FLOOR', 'BP01', 'SSR-002', 1, '2019-12-17 23:05:12', '0000-00-00 00:00:00', NULL),
(3319, '06TH FLOOR', 'BP01', 'SSR-002', 1, '2019-12-17 23:05:12', '0000-00-00 00:00:00', NULL),
(3320, '07TH FLOOR', 'BP01', 'SSR-002', 1, '2019-12-17 23:05:12', '0000-00-00 00:00:00', NULL),
(3321, '08TH FLOOR', 'BP01', 'SSR-002', 1, '2019-12-17 23:05:12', '0000-00-00 00:00:00', NULL),
(3322, '09TH FLOOR', 'BP01', 'SSR-002', 1, '2019-12-17 23:05:12', '0000-00-00 00:00:00', NULL),
(3323, '10TH FLOOR', 'BP01', 'SSR-002', 1, '2019-12-17 23:05:12', '0000-00-00 00:00:00', NULL),
(3324, '11TH FLOOR', 'BP01', 'SSR-002', 1, '2019-12-17 23:05:12', '0000-00-00 00:00:00', NULL),
(3325, '12TH FLOOR', 'BP01', 'SSR-002', 1, '2019-12-17 23:05:12', '0000-00-00 00:00:00', NULL),
(3326, '15TH FLOOR', 'BP01', 'SSR-002', 1, '2019-12-17 23:05:12', '0000-00-00 00:00:00', NULL),
(3327, '16TH FLOOR', 'BP01', 'SSR-002', 1, '2019-12-17 23:05:12', '0000-00-00 00:00:00', NULL),
(3328, '17TH FLOOR', 'BP01', 'SSR-002', 1, '2019-12-17 23:05:12', '0000-00-00 00:00:00', NULL),
(3329, '18TH FLOOR', 'BP01', 'SSR-002', 1, '2019-12-17 23:05:12', '0000-00-00 00:00:00', NULL),
(3330, 'PARKING', 'BP01', 'SSR-002', 1, '2019-12-17 23:05:12', '0000-00-00 00:00:00', NULL),
(3331, 'PH FLOOR', 'BP01', 'SSR-002', 1, '2019-12-17 23:05:12', '0000-00-00 00:00:00', NULL),
(3332, '01ST COMM', 'BP01', 'SSR-003', 1, '2019-12-17 23:05:12', '0000-00-00 00:00:00', NULL),
(3333, '03RD FLOOR', 'BP01', 'SSR-003', 1, '2019-12-17 23:05:12', '0000-00-00 00:00:00', NULL),
(3334, '05TH FLOOR', 'BP01', 'SSR-003', 1, '2019-12-17 23:05:12', '0000-00-00 00:00:00', NULL),
(3335, '06TH FLOOR', 'BP01', 'SSR-003', 1, '2019-12-17 23:05:13', '0000-00-00 00:00:00', NULL),
(3336, '07TH FLOOR', 'BP01', 'SSR-003', 1, '2019-12-17 23:05:13', '0000-00-00 00:00:00', NULL),
(3337, '08TH FLOOR', 'BP01', 'SSR-003', 1, '2019-12-17 23:05:13', '0000-00-00 00:00:00', NULL),
(3338, '09TH FLOOR', 'BP01', 'SSR-003', 1, '2019-12-17 23:05:13', '0000-00-00 00:00:00', NULL),
(3339, '10TH FLOOR', 'BP01', 'SSR-003', 1, '2019-12-17 23:05:13', '0000-00-00 00:00:00', NULL),
(3340, '11TH FLOOR', 'BP01', 'SSR-003', 1, '2019-12-17 23:05:13', '0000-00-00 00:00:00', NULL),
(3341, '12TH FLOOR', 'BP01', 'SSR-003', 1, '2019-12-17 23:05:13', '0000-00-00 00:00:00', NULL),
(3342, '15TH FLOOR', 'BP01', 'SSR-003', 1, '2019-12-17 23:05:13', '0000-00-00 00:00:00', NULL),
(3343, '16TH FLOOR', 'BP01', 'SSR-003', 1, '2019-12-17 23:05:13', '0000-00-00 00:00:00', NULL),
(3344, '17TH FLOOR', 'BP01', 'SSR-003', 1, '2019-12-17 23:05:13', '0000-00-00 00:00:00', NULL),
(3345, '18TH FLOOR', 'BP01', 'SSR-003', 1, '2019-12-17 23:05:13', '0000-00-00 00:00:00', NULL),
(3346, '19TH FLOOR', 'BP01', 'SSR-003', 1, '2019-12-17 23:05:13', '0000-00-00 00:00:00', NULL),
(3347, 'PARKING', 'BP01', 'SSR-003', 1, '2019-12-17 23:05:13', '0000-00-00 00:00:00', NULL),
(3348, 'PENTHOUSE', 'BP01', 'SSR-003', 1, '2019-12-17 23:05:13', '0000-00-00 00:00:00', NULL),
(3349, '02ND FLOOR', 'BP01', 'SSR-004', 1, '2019-12-17 23:05:13', '0000-00-00 00:00:00', NULL),
(3350, '03RD FLOOR', 'BP01', 'SSR-004', 1, '2019-12-17 23:05:13', '0000-00-00 00:00:00', NULL),
(3351, '05TH FLOOR', 'BP01', 'SSR-004', 1, '2019-12-17 23:05:13', '0000-00-00 00:00:00', NULL),
(3352, '06TH FLOOR', 'BP01', 'SSR-004', 1, '2019-12-17 23:05:13', '0000-00-00 00:00:00', NULL),
(3353, '07TH FLOOR', 'BP01', 'SSR-004', 1, '2019-12-17 23:05:13', '0000-00-00 00:00:00', NULL),
(3354, '08TH FLOOR', 'BP01', 'SSR-004', 1, '2019-12-17 23:05:13', '0000-00-00 00:00:00', NULL),
(3355, '09TH FLOOR', 'BP01', 'SSR-004', 1, '2019-12-17 23:05:13', '0000-00-00 00:00:00', NULL),
(3356, '10TH FLOOR', 'BP01', 'SSR-004', 1, '2019-12-17 23:05:13', '0000-00-00 00:00:00', NULL),
(3357, '11TH FLOOR', 'BP01', 'SSR-004', 1, '2019-12-17 23:05:13', '0000-00-00 00:00:00', NULL),
(3358, '12TH FLOOR', 'BP01', 'SSR-004', 1, '2019-12-17 23:05:13', '0000-00-00 00:00:00', NULL),
(3359, '15TH FLOOR', 'BP01', 'SSR-004', 1, '2019-12-17 23:05:13', '0000-00-00 00:00:00', NULL),
(3360, '16TH FLOOR', 'BP01', 'SSR-004', 1, '2019-12-17 23:05:14', '0000-00-00 00:00:00', NULL),
(3361, '17TH FLOOR', 'BP01', 'SSR-004', 1, '2019-12-17 23:05:14', '0000-00-00 00:00:00', NULL),
(3362, '18TH FLOOR', 'BP01', 'SSR-004', 1, '2019-12-17 23:05:14', '0000-00-00 00:00:00', NULL),
(3363, '19TH FLOOR', 'BP01', 'SSR-004', 1, '2019-12-17 23:05:14', '0000-00-00 00:00:00', NULL),
(3364, 'PARKING', 'BP01', 'SSR-004', 1, '2019-12-17 23:05:14', '0000-00-00 00:00:00', NULL),
(3365, 'PENTHOUSE', 'BP01', 'SSR-004', 1, '2019-12-17 23:05:14', '0000-00-00 00:00:00', NULL),
(3366, '02ND FLOOR', 'BP01', 'SSR-005', 1, '2019-12-17 23:05:14', '0000-00-00 00:00:00', NULL),
(3367, '03RD FLOOR', 'BP01', 'SSR-005', 1, '2019-12-17 23:05:14', '0000-00-00 00:00:00', NULL),
(3368, '05TH FLOOR', 'BP01', 'SSR-005', 1, '2019-12-17 23:05:14', '0000-00-00 00:00:00', NULL),
(3369, '06TH FLOOR', 'BP01', 'SSR-005', 1, '2019-12-17 23:05:14', '0000-00-00 00:00:00', NULL),
(3370, '07TH FLOOR', 'BP01', 'SSR-005', 1, '2019-12-17 23:05:14', '0000-00-00 00:00:00', NULL),
(3371, '08TH FLOOR', 'BP01', 'SSR-005', 1, '2019-12-17 23:05:14', '0000-00-00 00:00:00', NULL),
(3372, '09TH FLOOR', 'BP01', 'SSR-005', 1, '2019-12-17 23:05:14', '0000-00-00 00:00:00', NULL),
(3373, '10TH FLOOR', 'BP01', 'SSR-005', 1, '2019-12-17 23:05:14', '0000-00-00 00:00:00', NULL),
(3374, '11TH FLOOR', 'BP01', 'SSR-005', 1, '2019-12-17 23:05:15', '0000-00-00 00:00:00', NULL),
(3375, '12TH FLOOR', 'BP01', 'SSR-005', 1, '2019-12-17 23:05:15', '0000-00-00 00:00:00', NULL),
(3376, '15TH FLOOR', 'BP01', 'SSR-005', 1, '2019-12-17 23:05:15', '0000-00-00 00:00:00', NULL),
(3377, '16TH FLOOR', 'BP01', 'SSR-005', 1, '2019-12-17 23:05:15', '0000-00-00 00:00:00', NULL),
(3378, '17TH FLOOR', 'BP01', 'SSR-005', 1, '2019-12-17 23:05:15', '0000-00-00 00:00:00', NULL),
(3379, '18TH FLOOR', 'BP01', 'SSR-005', 1, '2019-12-17 23:05:15', '0000-00-00 00:00:00', NULL),
(3380, '19TH FLOOR', 'BP01', 'SSR-005', 1, '2019-12-17 23:05:15', '0000-00-00 00:00:00', NULL),
(3381, 'PARKING', 'BP01', 'SSR-005', 1, '2019-12-17 23:05:15', '0000-00-00 00:00:00', NULL),
(3382, 'PENTHOUSE', 'BP01', 'SSR-005', 1, '2019-12-17 23:05:15', '0000-00-00 00:00:00', NULL),
(3383, '02ND FLOOR', 'BP01', 'SSR-006', 1, '2019-12-17 23:05:15', '0000-00-00 00:00:00', NULL),
(3384, '03RD FLOOR', 'BP01', 'SSR-006', 1, '2019-12-17 23:05:15', '0000-00-00 00:00:00', NULL),
(3385, '05TH FLOOR', 'BP01', 'SSR-006', 1, '2019-12-17 23:05:15', '0000-00-00 00:00:00', NULL),
(3386, '06TH FLOOR', 'BP01', 'SSR-006', 1, '2019-12-17 23:05:15', '0000-00-00 00:00:00', NULL),
(3387, '07TH FLOOR', 'BP01', 'SSR-006', 1, '2019-12-17 23:05:15', '0000-00-00 00:00:00', NULL),
(3388, '08TH FLOOR', 'BP01', 'SSR-006', 1, '2019-12-17 23:05:15', '0000-00-00 00:00:00', NULL),
(3389, '09TH FLOOR', 'BP01', 'SSR-006', 1, '2019-12-17 23:05:15', '0000-00-00 00:00:00', NULL),
(3390, '10TH FLOOR', 'BP01', 'SSR-006', 1, '2019-12-17 23:05:15', '0000-00-00 00:00:00', NULL),
(3391, '11TH FLOOR', 'BP01', 'SSR-006', 1, '2019-12-17 23:05:15', '0000-00-00 00:00:00', NULL),
(3392, '12TH FLOOR', 'BP01', 'SSR-006', 1, '2019-12-17 23:05:15', '0000-00-00 00:00:00', NULL),
(3393, '15TH FLOOR', 'BP01', 'SSR-006', 1, '2019-12-17 23:05:15', '0000-00-00 00:00:00', NULL),
(3394, '16TH FLOOR', 'BP01', 'SSR-006', 1, '2019-12-17 23:05:15', '0000-00-00 00:00:00', NULL),
(3395, '17TH FLOOR', 'BP01', 'SSR-006', 1, '2019-12-17 23:05:15', '0000-00-00 00:00:00', NULL),
(3396, '18TH FLOOR', 'BP01', 'SSR-006', 1, '2019-12-17 23:05:15', '0000-00-00 00:00:00', NULL),
(3397, 'PARKING', 'BP01', 'SSR-006', 1, '2019-12-17 23:05:15', '0000-00-00 00:00:00', NULL),
(3398, 'PENTHOUSE', 'BP01', 'SSR-006', 1, '2019-12-17 23:05:15', '0000-00-00 00:00:00', NULL),
(3399, 'BLOCK 1', 'BP01', 'TAG-001', 1, '2019-12-17 23:05:15', '0000-00-00 00:00:00', NULL),
(3400, '01ST PKG', 'BP01', 'TBA-001', 1, '2019-12-17 23:05:15', '0000-00-00 00:00:00', NULL),
(3401, '05/06TH FLR', 'BP01', 'TBA-001', 1, '2019-12-17 23:05:15', '0000-00-00 00:00:00', NULL),
(3402, '07TH FLOOR', 'BP01', 'TBA-001', 1, '2019-12-17 23:05:16', '0000-00-00 00:00:00', NULL),
(3403, '08TH FLOOR', 'BP01', 'TBA-001', 1, '2019-12-17 23:05:16', '0000-00-00 00:00:00', NULL),
(3404, '09TH FLOOR', 'BP01', 'TBA-001', 1, '2019-12-17 23:05:16', '0000-00-00 00:00:00', NULL),
(3405, '10TH FLOOR', 'BP01', 'TBA-001', 1, '2019-12-17 23:05:16', '0000-00-00 00:00:00', NULL),
(3406, '11TH FLOOR', 'BP01', 'TBA-001', 1, '2019-12-17 23:05:16', '0000-00-00 00:00:00', NULL),
(3407, '12TH FLOOR', 'BP01', 'TBA-001', 1, '2019-12-17 23:05:16', '0000-00-00 00:00:00', NULL),
(3408, '14TH FLOOR', 'BP01', 'TBA-001', 1, '2019-12-17 23:05:16', '0000-00-00 00:00:00', NULL),
(3409, '15TH FLOOR', 'BP01', 'TBA-001', 1, '2019-12-17 23:05:16', '0000-00-00 00:00:00', NULL),
(3410, '16TH FLOOR', 'BP01', 'TBA-001', 1, '2019-12-17 23:05:16', '0000-00-00 00:00:00', NULL),
(3411, '17TH FLOOR', 'BP01', 'TBA-001', 1, '2019-12-17 23:05:16', '0000-00-00 00:00:00', NULL),
(3412, '18TH FLOOR', 'BP01', 'TBA-001', 1, '2019-12-17 23:05:16', '0000-00-00 00:00:00', NULL),
(3413, '19TH FLOOR', 'BP01', 'TBA-001', 1, '2019-12-17 23:05:16', '0000-00-00 00:00:00', NULL),
(3414, '2/F COMM.', 'BP01', 'TBA-001', 1, '2019-12-17 23:05:16', '0000-00-00 00:00:00', NULL),
(3415, '20TH FLOOR', 'BP01', 'TBA-001', 1, '2019-12-17 23:05:16', '0000-00-00 00:00:00', NULL),
(3416, '21ST FLOOR', 'BP01', 'TBA-001', 1, '2019-12-17 23:05:16', '0000-00-00 00:00:00', NULL),
(3417, '22ND FLOOR', 'BP01', 'TBA-001', 1, '2019-12-17 23:05:16', '0000-00-00 00:00:00', NULL),
(3418, '23RD FLOOR', 'BP01', 'TBA-001', 1, '2019-12-17 23:05:16', '0000-00-00 00:00:00', NULL),
(3419, '24TH FLOOR', 'BP01', 'TBA-001', 1, '2019-12-17 23:05:16', '0000-00-00 00:00:00', NULL),
(3420, '25TH FLOOR', 'BP01', 'TBA-001', 1, '2019-12-17 23:05:16', '0000-00-00 00:00:00', NULL),
(3421, '26TH FLOOR', 'BP01', 'TBA-001', 1, '2019-12-17 23:05:16', '0000-00-00 00:00:00', NULL),
(3422, '27TH FLOOR', 'BP01', 'TBA-001', 1, '2019-12-17 23:05:17', '0000-00-00 00:00:00', NULL),
(3423, '28TH FLOOR', 'BP01', 'TBA-001', 1, '2019-12-17 23:05:17', '0000-00-00 00:00:00', NULL),
(3424, '29TH FLOOR', 'BP01', 'TBA-001', 1, '2019-12-17 23:05:17', '0000-00-00 00:00:00', NULL),
(3425, '30TH FLOOR', 'BP01', 'TBA-001', 1, '2019-12-17 23:05:17', '0000-00-00 00:00:00', NULL),
(3426, '31ST FLOOR', 'BP01', 'TBA-001', 1, '2019-12-17 23:05:17', '0000-00-00 00:00:00', NULL),
(3427, '32ND FLOOR', 'BP01', 'TBA-001', 1, '2019-12-17 23:05:17', '0000-00-00 00:00:00', NULL),
(3428, '33RD FLOOR', 'BP01', 'TBA-001', 1, '2019-12-17 23:05:17', '0000-00-00 00:00:00', NULL),
(3429, '34TH FLOOR', 'BP01', 'TBA-001', 1, '2019-12-17 23:05:17', '0000-00-00 00:00:00', NULL),
(3430, '35TH FLOOR', 'BP01', 'TBA-001', 1, '2019-12-17 23:05:17', '0000-00-00 00:00:00', NULL),
(3431, '36TH FLOOR', 'BP01', 'TBA-001', 1, '2019-12-17 23:05:17', '0000-00-00 00:00:00', NULL),
(3432, '6TH F/GRDEN', 'BP01', 'TBA-001', 1, '2019-12-17 23:05:17', '0000-00-00 00:00:00', NULL),
(3433, 'G/F COMM.', 'BP01', 'TBA-001', 1, '2019-12-17 23:05:17', '0000-00-00 00:00:00', NULL),
(3434, 'RETAIL PKG', 'BP01', 'TBA-001', 1, '2019-12-17 23:05:17', '0000-00-00 00:00:00', NULL),
(3435, '01ST PKG', 'BP01', 'TBA-002', 1, '2019-12-17 23:05:17', '0000-00-00 00:00:00', NULL),
(3436, '06TH FLOOR', 'BP01', 'TBA-002', 1, '2019-12-17 23:05:17', '0000-00-00 00:00:00', NULL),
(3437, '07TH FLOOR', 'BP01', 'TBA-002', 1, '2019-12-17 23:05:17', '0000-00-00 00:00:00', NULL),
(3438, '08TH FLOOR', 'BP01', 'TBA-002', 1, '2019-12-17 23:05:17', '0000-00-00 00:00:00', NULL),
(3439, '09TH FLOOR', 'BP01', 'TBA-002', 1, '2019-12-17 23:05:17', '0000-00-00 00:00:00', NULL),
(3440, '10TH FLOOR', 'BP01', 'TBA-002', 1, '2019-12-17 23:05:17', '0000-00-00 00:00:00', NULL),
(3441, '11TH FLOOR', 'BP01', 'TBA-002', 1, '2019-12-17 23:05:17', '0000-00-00 00:00:00', NULL),
(3442, '12TH FLOOR', 'BP01', 'TBA-002', 1, '2019-12-17 23:05:17', '0000-00-00 00:00:00', NULL),
(3443, '14TH FLOOR', 'BP01', 'TBA-002', 1, '2019-12-17 23:05:18', '0000-00-00 00:00:00', NULL),
(3444, '15TH FLOOR', 'BP01', 'TBA-002', 1, '2019-12-17 23:05:18', '0000-00-00 00:00:00', NULL),
(3445, '16TH FLOOR', 'BP01', 'TBA-002', 1, '2019-12-17 23:05:18', '0000-00-00 00:00:00', NULL),
(3446, '17TH FLOOR', 'BP01', 'TBA-002', 1, '2019-12-17 23:05:18', '0000-00-00 00:00:00', NULL),
(3447, '18TH FLOOR', 'BP01', 'TBA-002', 1, '2019-12-17 23:05:18', '0000-00-00 00:00:00', NULL),
(3448, '19TH FLOOR', 'BP01', 'TBA-002', 1, '2019-12-17 23:05:18', '0000-00-00 00:00:00', NULL),
(3449, '20TH FLOOR', 'BP01', 'TBA-002', 1, '2019-12-17 23:05:18', '0000-00-00 00:00:00', NULL),
(3450, '21ST FLOOR', 'BP01', 'TBA-002', 1, '2019-12-17 23:05:18', '0000-00-00 00:00:00', NULL),
(3451, '22ND FLOOR', 'BP01', 'TBA-002', 1, '2019-12-17 23:05:18', '0000-00-00 00:00:00', NULL),
(3452, '23RD FLOOR', 'BP01', 'TBA-002', 1, '2019-12-17 23:05:18', '0000-00-00 00:00:00', NULL),
(3453, '24TH FLOOR', 'BP01', 'TBA-002', 1, '2019-12-17 23:05:18', '0000-00-00 00:00:00', NULL),
(3454, '25TH FLOOR', 'BP01', 'TBA-002', 1, '2019-12-17 23:05:18', '0000-00-00 00:00:00', NULL),
(3455, '26TH FLOOR', 'BP01', 'TBA-002', 1, '2019-12-17 23:05:18', '0000-00-00 00:00:00', NULL),
(3456, '27TH FLOOR', 'BP01', 'TBA-002', 1, '2019-12-17 23:05:18', '0000-00-00 00:00:00', NULL),
(3457, '28TH FLOOR', 'BP01', 'TBA-002', 1, '2019-12-17 23:05:18', '0000-00-00 00:00:00', NULL),
(3458, '29TH FLOOR', 'BP01', 'TBA-002', 1, '2019-12-17 23:05:18', '0000-00-00 00:00:00', NULL),
(3459, '2ND FLOOR', 'BP01', 'TBA-002', 1, '2019-12-17 23:05:18', '0000-00-00 00:00:00', NULL),
(3460, '30TH FLOOR', 'BP01', 'TBA-002', 1, '2019-12-17 23:05:18', '0000-00-00 00:00:00', NULL),
(3461, '31ST FLOOR', 'BP01', 'TBA-002', 1, '2019-12-17 23:05:18', '0000-00-00 00:00:00', NULL),
(3462, '32ND FLOOR', 'BP01', 'TBA-002', 1, '2019-12-17 23:05:18', '0000-00-00 00:00:00', NULL),
(3463, '33RD FLOOR', 'BP01', 'TBA-002', 1, '2019-12-17 23:05:18', '0000-00-00 00:00:00', NULL),
(3464, '34TH FLOOR', 'BP01', 'TBA-002', 1, '2019-12-17 23:05:18', '0000-00-00 00:00:00', NULL),
(3465, '35TH FLOOR', 'BP01', 'TBA-002', 1, '2019-12-17 23:05:18', '0000-00-00 00:00:00', NULL),
(3466, '36TH FLOOR', 'BP01', 'TBA-002', 1, '2019-12-17 23:05:18', '0000-00-00 00:00:00', NULL),
(3467, '37TH FLOOR', 'BP01', 'TBA-002', 1, '2019-12-17 23:05:18', '0000-00-00 00:00:00', NULL),
(3468, '38TH FLOOR', 'BP01', 'TBA-002', 1, '2019-12-17 23:05:18', '0000-00-00 00:00:00', NULL),
(3469, '39TH FLOOR', 'BP01', 'TBA-002', 1, '2019-12-17 23:05:18', '0000-00-00 00:00:00', NULL),
(3470, '40TH FLOOR', 'BP01', 'TBA-002', 1, '2019-12-17 23:05:19', '0000-00-00 00:00:00', NULL),
(3471, '41ST FLOOR', 'BP01', 'TBA-002', 1, '2019-12-17 23:05:19', '0000-00-00 00:00:00', NULL),
(3472, '42ND FLOOR', 'BP01', 'TBA-002', 1, '2019-12-17 23:05:19', '0000-00-00 00:00:00', NULL),
(3473, '43RD FLOOR', 'BP01', 'TBA-002', 1, '2019-12-17 23:05:19', '0000-00-00 00:00:00', NULL),
(3474, 'GROUNDFLOOR', 'BP01', 'TBA-002', 1, '2019-12-17 23:05:19', '0000-00-00 00:00:00', NULL),
(3475, '01ST PKG', 'BP01', 'TBA-003', 1, '2019-12-17 23:05:19', '0000-00-00 00:00:00', NULL),
(3476, '06TH FLOOR', 'BP01', 'TBA-003', 1, '2019-12-17 23:05:19', '0000-00-00 00:00:00', NULL),
(3477, '07TH FLOOR', 'BP01', 'TBA-003', 1, '2019-12-17 23:05:19', '0000-00-00 00:00:00', NULL),
(3478, '08TH FLOOR', 'BP01', 'TBA-003', 1, '2019-12-17 23:05:19', '0000-00-00 00:00:00', NULL),
(3479, '09TH FLOOR', 'BP01', 'TBA-003', 1, '2019-12-17 23:05:19', '0000-00-00 00:00:00', NULL),
(3480, '10TH FLOOR', 'BP01', 'TBA-003', 1, '2019-12-17 23:05:19', '0000-00-00 00:00:00', NULL),
(3481, '11TH FLOOR', 'BP01', 'TBA-003', 1, '2019-12-17 23:05:19', '0000-00-00 00:00:00', NULL),
(3482, '12TH FLOOR', 'BP01', 'TBA-003', 1, '2019-12-17 23:05:19', '0000-00-00 00:00:00', NULL),
(3483, '14TH FLOOR', 'BP01', 'TBA-003', 1, '2019-12-17 23:05:19', '0000-00-00 00:00:00', NULL),
(3484, '15TH FLOOR', 'BP01', 'TBA-003', 1, '2019-12-17 23:05:19', '0000-00-00 00:00:00', NULL),
(3485, '16TH FLOOR', 'BP01', 'TBA-003', 1, '2019-12-17 23:05:19', '0000-00-00 00:00:00', NULL),
(3486, '17TH FLOOR', 'BP01', 'TBA-003', 1, '2019-12-17 23:05:19', '0000-00-00 00:00:00', NULL),
(3487, '18TH FLOOR', 'BP01', 'TBA-003', 1, '2019-12-17 23:05:19', '0000-00-00 00:00:00', NULL),
(3488, '19TH FLOOR', 'BP01', 'TBA-003', 1, '2019-12-17 23:05:19', '0000-00-00 00:00:00', NULL),
(3489, '20TH FLOOR', 'BP01', 'TBA-003', 1, '2019-12-17 23:05:19', '0000-00-00 00:00:00', NULL),
(3490, '21ST FLOOR', 'BP01', 'TBA-003', 1, '2019-12-17 23:05:19', '0000-00-00 00:00:00', NULL),
(3491, '22ND FLOOR', 'BP01', 'TBA-003', 1, '2019-12-17 23:05:19', '0000-00-00 00:00:00', NULL),
(3492, '23RD FLOOR', 'BP01', 'TBA-003', 1, '2019-12-17 23:05:19', '0000-00-00 00:00:00', NULL),
(3493, '24TH FLOOR', 'BP01', 'TBA-003', 1, '2019-12-17 23:05:19', '0000-00-00 00:00:00', NULL),
(3494, '25TH FLOOR', 'BP01', 'TBA-003', 1, '2019-12-17 23:05:20', '0000-00-00 00:00:00', NULL),
(3495, '26TH FLOOR', 'BP01', 'TBA-003', 1, '2019-12-17 23:05:20', '0000-00-00 00:00:00', NULL),
(3496, '27TH FLOOR', 'BP01', 'TBA-003', 1, '2019-12-17 23:05:20', '0000-00-00 00:00:00', NULL),
(3497, '28TH FLOOR', 'BP01', 'TBA-003', 1, '2019-12-17 23:05:20', '0000-00-00 00:00:00', NULL),
(3498, '29TH FLOOR', 'BP01', 'TBA-003', 1, '2019-12-17 23:05:20', '0000-00-00 00:00:00', NULL),
(3499, '30TH FLOOR', 'BP01', 'TBA-003', 1, '2019-12-17 23:05:20', '0000-00-00 00:00:00', NULL),
(3500, '31ST FLOOR', 'BP01', 'TBA-003', 1, '2019-12-17 23:05:20', '0000-00-00 00:00:00', NULL),
(3501, '32ND FLOOR', 'BP01', 'TBA-003', 1, '2019-12-17 23:05:20', '0000-00-00 00:00:00', NULL),
(3502, '33RD FLOOR', 'BP01', 'TBA-003', 1, '2019-12-17 23:05:20', '0000-00-00 00:00:00', NULL),
(3503, '34TH FLOOR', 'BP01', 'TBA-003', 1, '2019-12-17 23:05:20', '0000-00-00 00:00:00', NULL),
(3504, '35TH FLOOR', 'BP01', 'TBA-003', 1, '2019-12-17 23:05:20', '0000-00-00 00:00:00', NULL),
(3505, '36TH FLOOR', 'BP01', 'TBA-003', 1, '2019-12-17 23:05:20', '0000-00-00 00:00:00', NULL),
(3506, '37TH FLOOR', 'BP01', 'TBA-003', 1, '2019-12-17 23:05:20', '0000-00-00 00:00:00', NULL),
(3507, '38TH FLOOR', 'BP01', 'TBA-003', 1, '2019-12-17 23:05:20', '0000-00-00 00:00:00', NULL),
(3508, '39TH FLOOR', 'BP01', 'TBA-003', 1, '2019-12-17 23:05:20', '0000-00-00 00:00:00', NULL),
(3509, '40TH FLOOR', 'BP01', 'TBA-003', 1, '2019-12-17 23:05:20', '0000-00-00 00:00:00', NULL),
(3510, '41ST FLOOR', 'BP01', 'TBA-003', 1, '2019-12-17 23:05:20', '0000-00-00 00:00:00', NULL),
(3511, '42ND FLOOR', 'BP01', 'TBA-003', 1, '2019-12-17 23:05:20', '0000-00-00 00:00:00', NULL),
(3512, '43RD FLOOR', 'BP01', 'TBA-003', 1, '2019-12-17 23:05:20', '0000-00-00 00:00:00', NULL),
(3513, '06TH FLOOR', 'BP01', 'TBA-004', 1, '2019-12-17 23:05:20', '0000-00-00 00:00:00', NULL),
(3514, '07TH FLOOR', 'BP01', 'TBA-004', 1, '2019-12-17 23:05:20', '0000-00-00 00:00:00', NULL),
(3515, '08TH FLOOR', 'BP01', 'TBA-004', 1, '2019-12-17 23:05:20', '0000-00-00 00:00:00', NULL),
(3516, '09TH FLOOR', 'BP01', 'TBA-004', 1, '2019-12-17 23:05:20', '0000-00-00 00:00:00', NULL),
(3517, '10TH FLOOR', 'BP01', 'TBA-004', 1, '2019-12-17 23:05:20', '0000-00-00 00:00:00', NULL),
(3518, '11TH FLOOR', 'BP01', 'TBA-004', 1, '2019-12-17 23:05:20', '0000-00-00 00:00:00', NULL),
(3519, '12TH FLOOR', 'BP01', 'TBA-004', 1, '2019-12-17 23:05:20', '0000-00-00 00:00:00', NULL),
(3520, '14TH FLOOR', 'BP01', 'TBA-004', 1, '2019-12-17 23:05:21', '0000-00-00 00:00:00', NULL),
(3521, '15TH FLOOR', 'BP01', 'TBA-004', 1, '2019-12-17 23:05:21', '0000-00-00 00:00:00', NULL),
(3522, '16TH FLOOR', 'BP01', 'TBA-004', 1, '2019-12-17 23:05:21', '0000-00-00 00:00:00', NULL),
(3523, '17TH FLOOR', 'BP01', 'TBA-004', 1, '2019-12-17 23:05:21', '0000-00-00 00:00:00', NULL),
(3524, '18TH FLOOR', 'BP01', 'TBA-004', 1, '2019-12-17 23:05:21', '0000-00-00 00:00:00', NULL),
(3525, '19TH FLOOR', 'BP01', 'TBA-004', 1, '2019-12-17 23:05:21', '0000-00-00 00:00:00', NULL),
(3526, '1ST PKG', 'BP01', 'TBA-004', 1, '2019-12-17 23:05:21', '0000-00-00 00:00:00', NULL),
(3527, '20TH FLOOR', 'BP01', 'TBA-004', 1, '2019-12-17 23:05:21', '0000-00-00 00:00:00', NULL),
(3528, '21ST FLOOR', 'BP01', 'TBA-004', 1, '2019-12-17 23:05:21', '0000-00-00 00:00:00', NULL),
(3529, '22ND FLOOR', 'BP01', 'TBA-004', 1, '2019-12-17 23:05:21', '0000-00-00 00:00:00', NULL),
(3530, '23RD FLOOR', 'BP01', 'TBA-004', 1, '2019-12-17 23:05:21', '0000-00-00 00:00:00', NULL),
(3531, '24TH FLOOR', 'BP01', 'TBA-004', 1, '2019-12-17 23:05:21', '0000-00-00 00:00:00', NULL),
(3532, '25TH FLOOR', 'BP01', 'TBA-004', 1, '2019-12-17 23:05:21', '0000-00-00 00:00:00', NULL),
(3533, '26TH FLOOR', 'BP01', 'TBA-004', 1, '2019-12-17 23:05:21', '0000-00-00 00:00:00', NULL),
(3534, '27TH FLOOR', 'BP01', 'TBA-004', 1, '2019-12-17 23:05:21', '0000-00-00 00:00:00', NULL),
(3535, '28TH FLOOR', 'BP01', 'TBA-004', 1, '2019-12-17 23:05:21', '0000-00-00 00:00:00', NULL),
(3536, '29TH FLOOR', 'BP01', 'TBA-004', 1, '2019-12-17 23:05:21', '0000-00-00 00:00:00', NULL),
(3537, '30TH FLOOR', 'BP01', 'TBA-004', 1, '2019-12-17 23:05:21', '0000-00-00 00:00:00', NULL),
(3538, '31ST FLOOR', 'BP01', 'TBA-004', 1, '2019-12-17 23:05:21', '0000-00-00 00:00:00', NULL),
(3539, '32ND FLOOR', 'BP01', 'TBA-004', 1, '2019-12-17 23:05:21', '0000-00-00 00:00:00', NULL),
(3540, '33RD FLOOR', 'BP01', 'TBA-004', 1, '2019-12-17 23:05:22', '0000-00-00 00:00:00', NULL),
(3541, '34TH FLOOR', 'BP01', 'TBA-004', 1, '2019-12-17 23:05:22', '0000-00-00 00:00:00', NULL),
(3542, '35TH FLOOR', 'BP01', 'TBA-004', 1, '2019-12-17 23:05:22', '0000-00-00 00:00:00', NULL),
(3543, '36TH FLOOR', 'BP01', 'TBA-004', 1, '2019-12-17 23:05:22', '0000-00-00 00:00:00', NULL),
(3544, ' 02ND PKG', 'BP01', 'TCT-001', 1, '2019-12-17 23:05:22', '0000-00-00 00:00:00', NULL),
(3545, ' 03RD PKG', 'BP01', 'TCT-001', 1, '2019-12-17 23:05:22', '0000-00-00 00:00:00', NULL),
(3546, ' 05TH PKG', 'BP01', 'TCT-001', 1, '2019-12-17 23:05:22', '0000-00-00 00:00:00', NULL),
(3547, ' 06TH PKG', 'BP01', 'TCT-001', 1, '2019-12-17 23:05:22', '0000-00-00 00:00:00', NULL),
(3548, ' GROUND PKG', 'BP01', 'TCT-001', 1, '2019-12-17 23:05:22', '0000-00-00 00:00:00', NULL),
(3549, '01ST COMM', 'BP01', 'TCT-001', 1, '2019-12-17 23:05:22', '0000-00-00 00:00:00', NULL),
(3550, '02ND FLOOR', 'BP01', 'TCT-001', 1, '2019-12-17 23:05:22', '0000-00-00 00:00:00', NULL),
(3551, '03RD FLOOR', 'BP01', 'TCT-001', 1, '2019-12-17 23:05:22', '0000-00-00 00:00:00', NULL),
(3552, '05TH FLOOR', 'BP01', 'TCT-001', 1, '2019-12-17 23:05:22', '0000-00-00 00:00:00', NULL),
(3553, '06TH FLOOR', 'BP01', 'TCT-001', 1, '2019-12-17 23:05:22', '0000-00-00 00:00:00', NULL),
(3554, '07TH FLOOR', 'BP01', 'TCT-001', 1, '2019-12-17 23:05:22', '0000-00-00 00:00:00', NULL),
(3555, '08TH FLOOR', 'BP01', 'TCT-001', 1, '2019-12-17 23:05:22', '0000-00-00 00:00:00', NULL),
(3556, '09TH FLOOR', 'BP01', 'TCT-001', 1, '2019-12-17 23:05:22', '0000-00-00 00:00:00', NULL),
(3557, '10TH FLOOR', 'BP01', 'TCT-001', 1, '2019-12-17 23:05:22', '0000-00-00 00:00:00', NULL),
(3558, '11TH FLOOR', 'BP01', 'TCT-001', 1, '2019-12-17 23:05:22', '0000-00-00 00:00:00', NULL),
(3559, '12TH FLOOR', 'BP01', 'TCT-001', 1, '2019-12-17 23:05:22', '0000-00-00 00:00:00', NULL),
(3560, '15TH FLOOR', 'BP01', 'TCT-001', 1, '2019-12-17 23:05:22', '0000-00-00 00:00:00', NULL),
(3561, '16TH FLOOR', 'BP01', 'TCT-001', 1, '2019-12-17 23:05:22', '0000-00-00 00:00:00', NULL),
(3562, '17TH FLOOR', 'BP01', 'TCT-001', 1, '2019-12-17 23:05:22', '0000-00-00 00:00:00', NULL);
INSERT INTO `tbl_sap_floors` (`id`, `floor_code`, `company_code`, `project_code`, `is_activated`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3563, '18TH FLOOR', 'BP01', 'TCT-001', 1, '2019-12-17 23:05:22', '0000-00-00 00:00:00', NULL),
(3564, '19TH FLOOR', 'BP01', 'TCT-001', 1, '2019-12-17 23:05:22', '0000-00-00 00:00:00', NULL),
(3565, '20TH FLOOR', 'BP01', 'TCT-001', 1, '2019-12-17 23:05:22', '0000-00-00 00:00:00', NULL),
(3566, '21ST FLOOR', 'BP01', 'TCT-001', 1, '2019-12-17 23:05:23', '0000-00-00 00:00:00', NULL),
(3567, '22ND FLOOR', 'BP01', 'TCT-001', 1, '2019-12-17 23:05:23', '0000-00-00 00:00:00', NULL),
(3568, '23RD FLOOR', 'BP01', 'TCT-001', 1, '2019-12-17 23:05:23', '0000-00-00 00:00:00', NULL),
(3569, '24TH FLOOR', 'BP01', 'TCT-001', 1, '2019-12-17 23:05:23', '0000-00-00 00:00:00', NULL),
(3570, '25TH FLOOR', 'BP01', 'TCT-001', 1, '2019-12-17 23:05:23', '0000-00-00 00:00:00', NULL),
(3571, '26TH FLOOR', 'BP01', 'TCT-001', 1, '2019-12-17 23:05:23', '0000-00-00 00:00:00', NULL),
(3572, '27TH FLOOR', 'BP01', 'TCT-001', 1, '2019-12-17 23:05:23', '0000-00-00 00:00:00', NULL),
(3573, '28TH FLOOR', 'BP01', 'TCT-001', 1, '2019-12-17 23:05:23', '0000-00-00 00:00:00', NULL),
(3574, '29TH FLOOR', 'BP01', 'TCT-001', 1, '2019-12-17 23:05:23', '0000-00-00 00:00:00', NULL),
(3575, '30TH FLOOR', 'BP01', 'TCT-001', 1, '2019-12-17 23:05:23', '0000-00-00 00:00:00', NULL),
(3576, '31ST FLOOR', 'BP01', 'TCT-001', 1, '2019-12-17 23:05:23', '0000-00-00 00:00:00', NULL),
(3577, '32ND FLOOR', 'BP01', 'TCT-001', 1, '2019-12-17 23:05:23', '0000-00-00 00:00:00', NULL),
(3578, '33RD FLOOR', 'BP01', 'TCT-001', 1, '2019-12-17 23:05:23', '0000-00-00 00:00:00', NULL),
(3579, '34TH FLOOR', 'BP01', 'TCT-001', 1, '2019-12-17 23:05:23', '0000-00-00 00:00:00', NULL),
(3580, '35TH FLOOR', 'BP01', 'TCT-001', 1, '2019-12-17 23:05:23', '0000-00-00 00:00:00', NULL),
(3581, '36TH FLOOR', 'BP01', 'TCT-001', 1, '2019-12-17 23:05:23', '0000-00-00 00:00:00', NULL),
(3582, '37TH FLOOR', 'BP01', 'TCT-001', 1, '2019-12-17 23:05:23', '0000-00-00 00:00:00', NULL),
(3583, '38TH FLOOR', 'BP01', 'TCT-001', 1, '2019-12-17 23:05:23', '0000-00-00 00:00:00', NULL),
(3584, ' 01ST COMM', 'BP01', 'TCT-002', 1, '2019-12-17 23:05:23', '0000-00-00 00:00:00', NULL),
(3585, ' 02ND PKG', 'BP01', 'TCT-002', 1, '2019-12-17 23:05:23', '0000-00-00 00:00:00', NULL),
(3586, ' 03RD PKG', 'BP01', 'TCT-002', 1, '2019-12-17 23:05:23', '0000-00-00 00:00:00', NULL),
(3587, ' 05TH PKG', 'BP01', 'TCT-002', 1, '2019-12-17 23:05:23', '0000-00-00 00:00:00', NULL),
(3588, ' 06TH PKG', 'BP01', 'TCT-002', 1, '2019-12-17 23:05:23', '0000-00-00 00:00:00', NULL),
(3589, ' 07TH LPKG', 'BP01', 'TCT-002', 1, '2019-12-17 23:05:23', '0000-00-00 00:00:00', NULL),
(3590, ' 07TH UPKG', 'BP01', 'TCT-002', 1, '2019-12-17 23:05:23', '0000-00-00 00:00:00', NULL),
(3591, '07TH FLOOR', 'BP01', 'TCT-002', 1, '2019-12-17 23:05:23', '0000-00-00 00:00:00', NULL),
(3592, '08TH FLOOR', 'BP01', 'TCT-002', 1, '2019-12-17 23:05:24', '0000-00-00 00:00:00', NULL),
(3593, '09TH FLOOR', 'BP01', 'TCT-002', 1, '2019-12-17 23:05:24', '0000-00-00 00:00:00', NULL),
(3594, '10TH FLOOR', 'BP01', 'TCT-002', 1, '2019-12-17 23:05:24', '0000-00-00 00:00:00', NULL),
(3595, '11TH FLOOR', 'BP01', 'TCT-002', 1, '2019-12-17 23:05:24', '0000-00-00 00:00:00', NULL),
(3596, '12TH FLOOR', 'BP01', 'TCT-002', 1, '2019-12-17 23:05:24', '0000-00-00 00:00:00', NULL),
(3597, '15TH FLOOR', 'BP01', 'TCT-002', 1, '2019-12-17 23:05:24', '0000-00-00 00:00:00', NULL),
(3598, '16TH FLOOR', 'BP01', 'TCT-002', 1, '2019-12-17 23:05:24', '0000-00-00 00:00:00', NULL),
(3599, '17TH FLOOR', 'BP01', 'TCT-002', 1, '2019-12-17 23:05:24', '0000-00-00 00:00:00', NULL),
(3600, '18TH FLOOR', 'BP01', 'TCT-002', 1, '2019-12-17 23:05:24', '0000-00-00 00:00:00', NULL),
(3601, '19TH FLOOR', 'BP01', 'TCT-002', 1, '2019-12-17 23:05:24', '0000-00-00 00:00:00', NULL),
(3602, '20TH FLOOR', 'BP01', 'TCT-002', 1, '2019-12-17 23:05:24', '0000-00-00 00:00:00', NULL),
(3603, '21ST FLOOR', 'BP01', 'TCT-002', 1, '2019-12-17 23:05:24', '0000-00-00 00:00:00', NULL),
(3604, '22ND FLOOR', 'BP01', 'TCT-002', 1, '2019-12-17 23:05:24', '0000-00-00 00:00:00', NULL),
(3605, '23RD FLOOR', 'BP01', 'TCT-002', 1, '2019-12-17 23:05:24', '0000-00-00 00:00:00', NULL),
(3606, '24TH FLOOR', 'BP01', 'TCT-002', 1, '2019-12-17 23:05:24', '0000-00-00 00:00:00', NULL),
(3607, '25TH FLOOR', 'BP01', 'TCT-002', 1, '2019-12-17 23:05:24', '0000-00-00 00:00:00', NULL),
(3608, '26TH FLOOR', 'BP01', 'TCT-002', 1, '2019-12-17 23:05:24', '0000-00-00 00:00:00', NULL),
(3609, '27TH FLOOR', 'BP01', 'TCT-002', 1, '2019-12-17 23:05:24', '0000-00-00 00:00:00', NULL),
(3610, '28TH FLOOR', 'BP01', 'TCT-002', 1, '2019-12-17 23:05:24', '0000-00-00 00:00:00', NULL),
(3611, '29TH FLOOR', 'BP01', 'TCT-002', 1, '2019-12-17 23:05:24', '0000-00-00 00:00:00', NULL),
(3612, '30TH FLOOR', 'BP01', 'TCT-002', 1, '2019-12-17 23:05:24', '0000-00-00 00:00:00', NULL),
(3613, '31ST FLOOR', 'BP01', 'TCT-002', 1, '2019-12-17 23:05:24', '0000-00-00 00:00:00', NULL),
(3614, '32ND FLOOR', 'BP01', 'TCT-002', 1, '2019-12-17 23:05:24', '0000-00-00 00:00:00', NULL),
(3615, '33RD FLOOR', 'BP01', 'TCT-002', 1, '2019-12-17 23:05:24', '0000-00-00 00:00:00', NULL),
(3616, '34TH FLOOR', 'BP01', 'TCT-002', 1, '2019-12-17 23:05:24', '0000-00-00 00:00:00', NULL),
(3617, '35TH FLOOR', 'BP01', 'TCT-002', 1, '2019-12-17 23:05:24', '0000-00-00 00:00:00', NULL),
(3618, '36TH FLOOR', 'BP01', 'TCT-002', 1, '2019-12-17 23:05:24', '0000-00-00 00:00:00', NULL),
(3619, ' 01ST PKG', 'BP01', 'TCT-003', 1, '2019-12-17 23:05:25', '0000-00-00 00:00:00', NULL),
(3620, '01ST COMM', 'BP01', 'TCT-003', 1, '2019-12-17 23:05:25', '0000-00-00 00:00:00', NULL),
(3621, '07TH FLOOR', 'BP01', 'TCT-003', 1, '2019-12-17 23:05:25', '0000-00-00 00:00:00', NULL),
(3622, '08TH FLOOR', 'BP01', 'TCT-003', 1, '2019-12-17 23:05:25', '0000-00-00 00:00:00', NULL),
(3623, '09TH FLOOR', 'BP01', 'TCT-003', 1, '2019-12-17 23:05:25', '0000-00-00 00:00:00', NULL),
(3624, '10TH FLOOR', 'BP01', 'TCT-003', 1, '2019-12-17 23:05:25', '0000-00-00 00:00:00', NULL),
(3625, '11TH FLOOR', 'BP01', 'TCT-003', 1, '2019-12-17 23:05:25', '0000-00-00 00:00:00', NULL),
(3626, '12TH FLOOR', 'BP01', 'TCT-003', 1, '2019-12-17 23:05:25', '0000-00-00 00:00:00', NULL),
(3627, '15TH FLOOR', 'BP01', 'TCT-003', 1, '2019-12-17 23:05:25', '0000-00-00 00:00:00', NULL),
(3628, '16TH FLOOR', 'BP01', 'TCT-003', 1, '2019-12-17 23:05:25', '0000-00-00 00:00:00', NULL),
(3629, '17TH FLOOR', 'BP01', 'TCT-003', 1, '2019-12-17 23:05:25', '0000-00-00 00:00:00', NULL),
(3630, '18TH FLOOR', 'BP01', 'TCT-003', 1, '2019-12-17 23:05:25', '0000-00-00 00:00:00', NULL),
(3631, '19TH FLOOR', 'BP01', 'TCT-003', 1, '2019-12-17 23:05:25', '0000-00-00 00:00:00', NULL),
(3632, '20TH FLOOR', 'BP01', 'TCT-003', 1, '2019-12-17 23:05:25', '0000-00-00 00:00:00', NULL),
(3633, '21ST FLOOR', 'BP01', 'TCT-003', 1, '2019-12-17 23:05:25', '0000-00-00 00:00:00', NULL),
(3634, '22ND FLOOR', 'BP01', 'TCT-003', 1, '2019-12-17 23:05:25', '0000-00-00 00:00:00', NULL),
(3635, '23RD FLOOR', 'BP01', 'TCT-003', 1, '2019-12-17 23:05:25', '0000-00-00 00:00:00', NULL),
(3636, '24TH FLOOR', 'BP01', 'TCT-003', 1, '2019-12-17 23:05:25', '0000-00-00 00:00:00', NULL),
(3637, '25TH FLOOR', 'BP01', 'TCT-003', 1, '2019-12-17 23:05:25', '0000-00-00 00:00:00', NULL),
(3638, '26TH FLOOR', 'BP01', 'TCT-003', 1, '2019-12-17 23:05:25', '0000-00-00 00:00:00', NULL),
(3639, '27TH FLOOR', 'BP01', 'TCT-003', 1, '2019-12-17 23:05:25', '0000-00-00 00:00:00', NULL),
(3640, '28TH FLOOR', 'BP01', 'TCT-003', 1, '2019-12-17 23:05:25', '0000-00-00 00:00:00', NULL),
(3641, '29TH FLOOR', 'BP01', 'TCT-003', 1, '2019-12-17 23:05:25', '0000-00-00 00:00:00', NULL),
(3642, '30TH FLOOR', 'BP01', 'TCT-003', 1, '2019-12-17 23:05:26', '0000-00-00 00:00:00', NULL),
(3643, '31ST FLOOR', 'BP01', 'TCT-003', 1, '2019-12-17 23:05:26', '0000-00-00 00:00:00', NULL),
(3644, '32ND FLOOR', 'BP01', 'TCT-003', 1, '2019-12-17 23:05:26', '0000-00-00 00:00:00', NULL),
(3645, '33RD FLOOR', 'BP01', 'TCT-003', 1, '2019-12-17 23:05:26', '0000-00-00 00:00:00', NULL),
(3646, '34TH FLOOR', 'BP01', 'TCT-003', 1, '2019-12-17 23:05:26', '0000-00-00 00:00:00', NULL),
(3647, '35TH FLOOR', 'BP01', 'TCT-003', 1, '2019-12-17 23:05:26', '0000-00-00 00:00:00', NULL),
(3648, '36TH FLOOR', 'BP01', 'TCT-003', 1, '2019-12-17 23:05:26', '0000-00-00 00:00:00', NULL),
(3649, '37TH FLOOR', 'BP01', 'TCT-003', 1, '2019-12-17 23:05:26', '0000-00-00 00:00:00', NULL),
(3650, '38TH FLOOR', 'BP01', 'TCT-003', 1, '2019-12-17 23:05:26', '0000-00-00 00:00:00', NULL),
(3651, '39TH FLOOR', 'BP01', 'TCT-003', 1, '2019-12-17 23:05:26', '0000-00-00 00:00:00', NULL),
(3652, '40TH FLOOR', 'BP01', 'TCT-003', 1, '2019-12-17 23:05:26', '0000-00-00 00:00:00', NULL),
(3653, '41ST FLOOR', 'BP01', 'TCT-003', 1, '2019-12-17 23:05:26', '0000-00-00 00:00:00', NULL),
(3654, '42ND FLOOR', 'BP01', 'TCT-003', 1, '2019-12-17 23:05:26', '0000-00-00 00:00:00', NULL),
(3655, ' 02ND PKG', 'BP01', 'TOP-001', 1, '2019-12-17 23:05:26', '0000-00-00 00:00:00', NULL),
(3656, ' 03RD PKG', 'BP01', 'TOP-001', 1, '2019-12-17 23:05:26', '0000-00-00 00:00:00', NULL),
(3657, ' 04TH PKG', 'BP01', 'TOP-001', 1, '2019-12-17 23:05:26', '0000-00-00 00:00:00', NULL),
(3658, ' 05TH PKG', 'BP01', 'TOP-001', 1, '2019-12-17 23:05:26', '0000-00-00 00:00:00', NULL),
(3659, '06TH FLOOR', 'BP01', 'TOP-001', 1, '2019-12-17 23:05:26', '0000-00-00 00:00:00', NULL),
(3660, '07TH FLOOR', 'BP01', 'TOP-001', 1, '2019-12-17 23:05:26', '0000-00-00 00:00:00', NULL),
(3661, '08TH FLOOR', 'BP01', 'TOP-001', 1, '2019-12-17 23:05:26', '0000-00-00 00:00:00', NULL),
(3662, '09TH FLOOR', 'BP01', 'TOP-001', 1, '2019-12-17 23:05:26', '0000-00-00 00:00:00', NULL),
(3663, '10TH FLOOR', 'BP01', 'TOP-001', 1, '2019-12-17 23:05:27', '0000-00-00 00:00:00', NULL),
(3664, '11TH FLOOR', 'BP01', 'TOP-001', 1, '2019-12-17 23:05:27', '0000-00-00 00:00:00', NULL),
(3665, '12TH FLOOR', 'BP01', 'TOP-001', 1, '2019-12-17 23:05:27', '0000-00-00 00:00:00', NULL),
(3666, '15TH FLOOR', 'BP01', 'TOP-001', 1, '2019-12-17 23:05:27', '0000-00-00 00:00:00', NULL),
(3667, '16TH FLOOR', 'BP01', 'TOP-001', 1, '2019-12-17 23:05:27', '0000-00-00 00:00:00', NULL),
(3668, '17TH FLOOR', 'BP01', 'TOP-001', 1, '2019-12-17 23:05:27', '0000-00-00 00:00:00', NULL),
(3669, '18TH FLOOR', 'BP01', 'TOP-001', 1, '2019-12-17 23:05:27', '0000-00-00 00:00:00', NULL),
(3670, '19TH FLOOR', 'BP01', 'TOP-001', 1, '2019-12-17 23:05:27', '0000-00-00 00:00:00', NULL),
(3671, '20TH FLOOR', 'BP01', 'TOP-001', 1, '2019-12-17 23:05:27', '0000-00-00 00:00:00', NULL),
(3672, '21ST FLOOR', 'BP01', 'TOP-001', 1, '2019-12-17 23:05:27', '0000-00-00 00:00:00', NULL),
(3673, '22ND FLOOR', 'BP01', 'TOP-001', 1, '2019-12-17 23:05:27', '0000-00-00 00:00:00', NULL),
(3674, '23RD FLOOR', 'BP01', 'TOP-001', 1, '2019-12-17 23:05:27', '0000-00-00 00:00:00', NULL),
(3675, '24TH FLOOR', 'BP01', 'TOP-001', 1, '2019-12-17 23:05:27', '0000-00-00 00:00:00', NULL),
(3676, '25TH FLOOR', 'BP01', 'TOP-001', 1, '2019-12-17 23:05:27', '0000-00-00 00:00:00', NULL),
(3677, '26TH FLOOR', 'BP01', 'TOP-001', 1, '2019-12-17 23:05:27', '0000-00-00 00:00:00', NULL),
(3678, '27TH FLOOR', 'BP01', 'TOP-001', 1, '2019-12-17 23:05:27', '0000-00-00 00:00:00', NULL),
(3679, '28TH FLOOR', 'BP01', 'TOP-001', 1, '2019-12-17 23:05:27', '0000-00-00 00:00:00', NULL),
(3680, '29TH FLOOR', 'BP01', 'TOP-001', 1, '2019-12-17 23:05:27', '0000-00-00 00:00:00', NULL),
(3681, '30TH FLOOR', 'BP01', 'TOP-001', 1, '2019-12-17 23:05:27', '0000-00-00 00:00:00', NULL),
(3682, '31ST FLOOR', 'BP01', 'TOP-001', 1, '2019-12-17 23:05:27', '0000-00-00 00:00:00', NULL),
(3683, '32ND FLOOR', 'BP01', 'TOP-001', 1, '2019-12-17 23:05:27', '0000-00-00 00:00:00', NULL),
(3684, '33RD FLOOR', 'BP01', 'TOP-001', 1, '2019-12-17 23:05:27', '0000-00-00 00:00:00', NULL),
(3685, '34TH FLOOR', 'BP01', 'TOP-001', 1, '2019-12-17 23:05:27', '0000-00-00 00:00:00', NULL),
(3686, '35TH FLOOR', 'BP01', 'TOP-001', 1, '2019-12-17 23:05:27', '0000-00-00 00:00:00', NULL),
(3687, '36TH / 37TH', 'BP01', 'TOP-001', 1, '2019-12-17 23:05:27', '0000-00-00 00:00:00', NULL),
(3688, 'COMML FLOOR', 'BP01', 'TOP-001', 1, '2019-12-17 23:05:27', '0000-00-00 00:00:00', NULL),
(3689, 'GF PKG', 'BP01', 'TOP-001', 1, '2019-12-17 23:05:27', '0000-00-00 00:00:00', NULL),
(3690, ' 01ST PKG', 'BP02', 'TGM-001', 1, '2019-12-17 23:05:28', '0000-00-00 00:00:00', NULL),
(3691, '01ST COMM', 'BP02', 'TGM-001', 1, '2019-12-17 23:05:28', '0000-00-00 00:00:00', NULL),
(3692, '07TH FLOOR', 'BP02', 'TGM-001', 1, '2019-12-17 23:05:28', '0000-00-00 00:00:00', NULL),
(3693, '08TH FLOOR', 'BP02', 'TGM-001', 1, '2019-12-17 23:05:28', '0000-00-00 00:00:00', NULL),
(3694, '09TH FLOOR', 'BP02', 'TGM-001', 1, '2019-12-17 23:05:28', '0000-00-00 00:00:00', NULL),
(3695, '10TH FLOOR', 'BP02', 'TGM-001', 1, '2019-12-17 23:05:28', '0000-00-00 00:00:00', NULL),
(3696, '11TH FLOOR', 'BP02', 'TGM-001', 1, '2019-12-17 23:05:28', '0000-00-00 00:00:00', NULL),
(3697, '12TH FLOOR', 'BP02', 'TGM-001', 1, '2019-12-17 23:05:28', '0000-00-00 00:00:00', NULL),
(3698, '15TH FLOOR', 'BP02', 'TGM-001', 1, '2019-12-17 23:05:28', '0000-00-00 00:00:00', NULL),
(3699, '16TH FLOOR', 'BP02', 'TGM-001', 1, '2019-12-17 23:05:28', '0000-00-00 00:00:00', NULL),
(3700, '17TH FLOOR', 'BP02', 'TGM-001', 1, '2019-12-17 23:05:28', '0000-00-00 00:00:00', NULL),
(3701, '18TH FLOOR', 'BP02', 'TGM-001', 1, '2019-12-17 23:05:28', '0000-00-00 00:00:00', NULL),
(3702, '19TH FLOOR', 'BP02', 'TGM-001', 1, '2019-12-17 23:05:28', '0000-00-00 00:00:00', NULL),
(3703, '20TH FLOOR', 'BP02', 'TGM-001', 1, '2019-12-17 23:05:28', '0000-00-00 00:00:00', NULL),
(3704, '21ST FLOOR', 'BP02', 'TGM-001', 1, '2019-12-17 23:05:28', '0000-00-00 00:00:00', NULL),
(3705, '22ND FLOOR', 'BP02', 'TGM-001', 1, '2019-12-17 23:05:28', '0000-00-00 00:00:00', NULL),
(3706, '23RD FLOOR', 'BP02', 'TGM-001', 1, '2019-12-17 23:05:28', '0000-00-00 00:00:00', NULL),
(3707, '24TH FLOOR', 'BP02', 'TGM-001', 1, '2019-12-17 23:05:28', '0000-00-00 00:00:00', NULL),
(3708, '25TH FLOOR', 'BP02', 'TGM-001', 1, '2019-12-17 23:05:28', '0000-00-00 00:00:00', NULL),
(3709, '26TH FLOOR', 'BP02', 'TGM-001', 1, '2019-12-17 23:05:28', '0000-00-00 00:00:00', NULL),
(3710, '27TH FLOOR', 'BP02', 'TGM-001', 1, '2019-12-17 23:05:28', '0000-00-00 00:00:00', NULL),
(3711, '28TH FLOOR', 'BP02', 'TGM-001', 1, '2019-12-17 23:05:28', '0000-00-00 00:00:00', NULL),
(3712, '29TH FLOOR', 'BP02', 'TGM-001', 1, '2019-12-17 23:05:28', '0000-00-00 00:00:00', NULL),
(3713, '30TH FLOOR', 'BP02', 'TGM-001', 1, '2019-12-17 23:05:28', '0000-00-00 00:00:00', NULL),
(3714, '31ST FLOOR', 'BP02', 'TGM-001', 1, '2019-12-17 23:05:28', '0000-00-00 00:00:00', NULL),
(3715, '32ND FLOOR', 'BP02', 'TGM-001', 1, '2019-12-17 23:05:29', '0000-00-00 00:00:00', NULL),
(3716, '33RD FLOOR', 'BP02', 'TGM-001', 1, '2019-12-17 23:05:29', '0000-00-00 00:00:00', NULL),
(3717, '34TH FLOOR', 'BP02', 'TGM-001', 1, '2019-12-17 23:05:29', '0000-00-00 00:00:00', NULL),
(3718, '35TH FLOOR', 'BP02', 'TGM-001', 1, '2019-12-17 23:05:29', '0000-00-00 00:00:00', NULL),
(3719, '36TH FLOOR', 'BP02', 'TGM-001', 1, '2019-12-17 23:05:29', '0000-00-00 00:00:00', NULL),
(3720, '38TH FLOOR', 'BP02', 'TGM-001', 1, '2019-12-17 23:05:29', '0000-00-00 00:00:00', NULL),
(3721, ' 01ST PKG', 'BP02', 'TGM-002', 1, '2019-12-17 23:05:29', '0000-00-00 00:00:00', NULL),
(3722, '07TH FLOOR', 'BP02', 'TGM-002', 1, '2019-12-17 23:05:29', '0000-00-00 00:00:00', NULL),
(3723, '08TH FLOOR', 'BP02', 'TGM-002', 1, '2019-12-17 23:05:29', '0000-00-00 00:00:00', NULL),
(3724, '09TH FLOOR', 'BP02', 'TGM-002', 1, '2019-12-17 23:05:29', '0000-00-00 00:00:00', NULL),
(3725, '10TH FLOOR', 'BP02', 'TGM-002', 1, '2019-12-17 23:05:29', '0000-00-00 00:00:00', NULL),
(3726, '11TH FLOOR', 'BP02', 'TGM-002', 1, '2019-12-17 23:05:29', '0000-00-00 00:00:00', NULL),
(3727, '12TH FLOOR', 'BP02', 'TGM-002', 1, '2019-12-17 23:05:29', '0000-00-00 00:00:00', NULL),
(3728, '15TH FLOOR', 'BP02', 'TGM-002', 1, '2019-12-17 23:05:29', '0000-00-00 00:00:00', NULL),
(3729, '16TH FLOOR', 'BP02', 'TGM-002', 1, '2019-12-17 23:05:29', '0000-00-00 00:00:00', NULL),
(3730, '17TH FLOOR', 'BP02', 'TGM-002', 1, '2019-12-17 23:05:29', '0000-00-00 00:00:00', NULL),
(3731, '18TH FLOOR', 'BP02', 'TGM-002', 1, '2019-12-17 23:05:29', '0000-00-00 00:00:00', NULL),
(3732, '19TH FLOOR', 'BP02', 'TGM-002', 1, '2019-12-17 23:05:29', '0000-00-00 00:00:00', NULL),
(3733, '20TH FLOOR', 'BP02', 'TGM-002', 1, '2019-12-17 23:05:29', '0000-00-00 00:00:00', NULL),
(3734, '21ST FLOOR', 'BP02', 'TGM-002', 1, '2019-12-17 23:05:29', '0000-00-00 00:00:00', NULL),
(3735, '22ND FLOOR', 'BP02', 'TGM-002', 1, '2019-12-17 23:05:29', '0000-00-00 00:00:00', NULL),
(3736, '23RD FLOOR', 'BP02', 'TGM-002', 1, '2019-12-17 23:05:29', '0000-00-00 00:00:00', NULL),
(3737, '24TH FLOOR', 'BP02', 'TGM-002', 1, '2019-12-17 23:05:29', '0000-00-00 00:00:00', NULL),
(3738, '25TH FLOOR', 'BP02', 'TGM-002', 1, '2019-12-17 23:05:29', '0000-00-00 00:00:00', NULL),
(3739, '26TH FLOOR', 'BP02', 'TGM-002', 1, '2019-12-17 23:05:29', '0000-00-00 00:00:00', NULL),
(3740, '27TH FLOOR', 'BP02', 'TGM-002', 1, '2019-12-17 23:05:29', '0000-00-00 00:00:00', NULL),
(3741, '28TH FLOOR', 'BP02', 'TGM-002', 1, '2019-12-17 23:05:29', '0000-00-00 00:00:00', NULL),
(3742, '29TH FLOOR', 'BP02', 'TGM-002', 1, '2019-12-17 23:05:30', '0000-00-00 00:00:00', NULL),
(3743, '30TH FLOOR', 'BP02', 'TGM-002', 1, '2019-12-17 23:05:30', '0000-00-00 00:00:00', NULL),
(3744, '31ST FLOOR', 'BP02', 'TGM-002', 1, '2019-12-17 23:05:30', '0000-00-00 00:00:00', NULL),
(3745, '32ND FLOOR', 'BP02', 'TGM-002', 1, '2019-12-17 23:05:30', '0000-00-00 00:00:00', NULL),
(3746, '33RD FLOOR', 'BP02', 'TGM-002', 1, '2019-12-17 23:05:30', '0000-00-00 00:00:00', NULL),
(3747, '34TH FLOOR', 'BP02', 'TGM-002', 1, '2019-12-17 23:05:30', '0000-00-00 00:00:00', NULL),
(3748, '35TH FLOOR', 'BP02', 'TGM-002', 1, '2019-12-17 23:05:30', '0000-00-00 00:00:00', NULL),
(3749, '36TH FLOOR', 'BP02', 'TGM-002', 1, '2019-12-17 23:05:30', '0000-00-00 00:00:00', NULL),
(3750, '37TH FLOOR', 'BP02', 'TGM-002', 1, '2019-12-17 23:05:30', '0000-00-00 00:00:00', NULL),
(3751, '38TH FLOOR', 'BP02', 'TGM-002', 1, '2019-12-17 23:05:30', '0000-00-00 00:00:00', NULL),
(3752, '03RD FLOOR', 'BP07', 'TSR-A', 1, '2019-12-17 23:05:30', '0000-00-00 00:00:00', NULL),
(3753, '07TH FLOOR', 'BP07', 'TSR-A', 1, '2019-12-17 23:05:30', '0000-00-00 00:00:00', NULL),
(3754, '08TH FLOOR', 'BP07', 'TSR-A', 1, '2019-12-17 23:05:30', '0000-00-00 00:00:00', NULL),
(3755, '08TH FLOOR', 'BP07', 'TSR-B', 1, '2019-12-17 23:05:30', '0000-00-00 00:00:00', NULL),
(3756, 'BLOCK 02', 'S01A', 'FSE-001', 1, '2019-12-17 23:05:30', '0000-00-00 00:00:00', NULL),
(3757, 'BLOCK 08', 'S01A', 'FSE-001', 1, '2019-12-17 23:05:30', '0000-00-00 00:00:00', NULL),
(3758, 'BLOCK 09', 'S01A', 'FSE-001', 1, '2019-12-17 23:05:30', '0000-00-00 00:00:00', NULL),
(3759, 'BLOCK 10', 'S01A', 'FSE-001', 1, '2019-12-17 23:05:30', '0000-00-00 00:00:00', NULL),
(3760, 'BLOCK 11', 'S01A', 'FSE-001', 1, '2019-12-17 23:05:30', '0000-00-00 00:00:00', NULL),
(3761, 'BLOCK 12', 'S01A', 'FSE-001', 1, '2019-12-17 23:05:30', '0000-00-00 00:00:00', NULL),
(3762, 'BLOCK 14', 'S01A', 'FSE-001', 1, '2019-12-17 23:05:30', '0000-00-00 00:00:00', NULL),
(3763, 'BLOCK 15', 'S01A', 'FSE-001', 1, '2019-12-17 23:05:30', '0000-00-00 00:00:00', NULL),
(3764, 'BLOCK 01', 'S01A', 'FSE-002', 1, '2019-12-17 23:05:31', '0000-00-00 00:00:00', NULL),
(3765, 'BLOCK 02', 'S01A', 'FSE-002', 1, '2019-12-17 23:05:31', '0000-00-00 00:00:00', NULL),
(3766, 'BLOCK 03', 'S01A', 'FSE-002', 1, '2019-12-17 23:05:31', '0000-00-00 00:00:00', NULL),
(3767, 'BLOCK 04', 'S01A', 'FSE-002', 1, '2019-12-17 23:05:31', '0000-00-00 00:00:00', NULL),
(3768, 'BLOCK 05', 'S01A', 'FSE-002', 1, '2019-12-17 23:05:31', '0000-00-00 00:00:00', NULL),
(3769, 'BLOCK 06', 'S01A', 'FSE-002', 1, '2019-12-17 23:05:31', '0000-00-00 00:00:00', NULL),
(3770, 'BLOCK 07', 'S01A', 'FSE-002', 1, '2019-12-17 23:05:31', '0000-00-00 00:00:00', NULL),
(3771, 'BLOCK 12', 'S01A', 'FSE-003', 1, '2019-12-17 23:05:31', '0000-00-00 00:00:00', NULL),
(3772, 'BLOCK 13', 'S01A', 'FSE-003', 1, '2019-12-17 23:05:31', '0000-00-00 00:00:00', NULL),
(3773, 'BLOCK 14', 'S01A', 'FSE-003', 1, '2019-12-17 23:05:31', '0000-00-00 00:00:00', NULL),
(3774, 'BLOCK 15', 'S01A', 'FSE-003', 1, '2019-12-17 23:05:31', '0000-00-00 00:00:00', NULL),
(3775, 'BLOCK 16', 'S01A', 'FSE-003', 1, '2019-12-17 23:05:31', '0000-00-00 00:00:00', NULL),
(3776, 'BLOCK 17', 'S01A', 'FSE-003', 1, '2019-12-17 23:05:31', '0000-00-00 00:00:00', NULL),
(3777, 'BLOCK 18', 'S01A', 'FSE-003', 1, '2019-12-17 23:05:31', '0000-00-00 00:00:00', NULL),
(3778, 'BLOCK 19', 'S01A', 'FSE-003', 1, '2019-12-17 23:05:31', '0000-00-00 00:00:00', NULL),
(3779, 'BLOCK 20', 'S01A', 'FSE-003', 1, '2019-12-17 23:05:31', '0000-00-00 00:00:00', NULL),
(3780, 'BLOCK 21', 'S01A', 'FSE-003', 1, '2019-12-17 23:05:31', '0000-00-00 00:00:00', NULL),
(3781, 'BLOCK 22', 'S01A', 'FSE-003', 1, '2019-12-17 23:05:31', '0000-00-00 00:00:00', NULL),
(3782, 'BLOCK 23', 'S01A', 'FSE-003', 1, '2019-12-17 23:05:31', '0000-00-00 00:00:00', NULL),
(3783, 'BLOCK 28', 'S01A', 'FSE-004', 1, '2019-12-17 23:05:31', '0000-00-00 00:00:00', NULL),
(3784, 'BLOCK 29', 'S01A', 'FSE-004', 1, '2019-12-17 23:05:31', '0000-00-00 00:00:00', NULL),
(3785, 'BLOCK 30', 'S01A', 'FSE-004', 1, '2019-12-17 23:05:31', '0000-00-00 00:00:00', NULL),
(3786, 'BLOCK 31', 'S01A', 'FSE-004', 1, '2019-12-17 23:05:32', '0000-00-00 00:00:00', NULL),
(3787, 'BLOCK 32', 'S01A', 'FSE-004', 1, '2019-12-17 23:05:32', '0000-00-00 00:00:00', NULL),
(3788, 'BLOCK 33', 'S01A', 'FSE-004', 1, '2019-12-17 23:05:32', '0000-00-00 00:00:00', NULL),
(3789, 'BLOCK 34', 'S01A', 'FSE-004', 1, '2019-12-17 23:05:32', '0000-00-00 00:00:00', NULL),
(3790, 'BLOCK 35', 'S01A', 'FSE-004', 1, '2019-12-17 23:05:32', '0000-00-00 00:00:00', NULL),
(3791, 'BLOCK 36', 'S01A', 'FSE-004', 1, '2019-12-17 23:05:32', '0000-00-00 00:00:00', NULL),
(3792, 'BLOCK 37', 'S01A', 'FSE-004', 1, '2019-12-17 23:05:32', '0000-00-00 00:00:00', NULL),
(3793, 'JACKSONVILL', 'S01A', 'FSE-HOME', 1, '2019-12-17 23:05:32', '0000-00-00 00:00:00', NULL),
(3794, 'MIAMI', 'S01A', 'FSE-HOME', 1, '2019-12-17 23:05:32', '0000-00-00 00:00:00', NULL),
(3795, 'TAMPA', 'S01A', 'FSE-HOME', 1, '2019-12-17 23:05:32', '0000-00-00 00:00:00', NULL),
(3796, '01ST FLOOR', 'S01A', 'MGM-003', 1, '2019-12-17 23:05:32', '0000-00-00 00:00:00', NULL),
(3797, '01ST PKG', 'S01A', 'MGM-003', 1, '2019-12-17 23:05:32', '0000-00-00 00:00:00', NULL),
(3798, '02ND FLOOR', 'S01A', 'MGM-003', 1, '2019-12-17 23:05:32', '0000-00-00 00:00:00', NULL),
(3799, '02ND PKG', 'S01A', 'MGM-003', 1, '2019-12-17 23:05:32', '0000-00-00 00:00:00', NULL),
(3800, '03RD FLOOR', 'S01A', 'MGM-003', 1, '2019-12-17 23:05:32', '0000-00-00 00:00:00', NULL),
(3801, '05TH FLOOR', 'S01A', 'MGM-003', 1, '2019-12-17 23:05:32', '0000-00-00 00:00:00', NULL),
(3802, '06TH FLOOR', 'S01A', 'MGM-003', 1, '2019-12-17 23:05:32', '0000-00-00 00:00:00', NULL),
(3803, '07TH FLOOR', 'S01A', 'MGM-003', 1, '2019-12-17 23:05:32', '0000-00-00 00:00:00', NULL),
(3804, '08TH FLOOR', 'S01A', 'MGM-003', 1, '2019-12-17 23:05:32', '0000-00-00 00:00:00', NULL),
(3805, '09TH FLOOR', 'S01A', 'MGM-003', 1, '2019-12-17 23:05:32', '0000-00-00 00:00:00', NULL),
(3806, '10TH FLOOR', 'S01A', 'MGM-003', 1, '2019-12-17 23:05:32', '0000-00-00 00:00:00', NULL),
(3807, '11TH FLOOR', 'S01A', 'MGM-003', 1, '2019-12-17 23:05:33', '0000-00-00 00:00:00', NULL),
(3808, '12TH FLOOR', 'S01A', 'MGM-003', 1, '2019-12-17 23:05:33', '0000-00-00 00:00:00', NULL),
(3809, '15TH FLOOR', 'S01A', 'MGM-003', 1, '2019-12-17 23:05:33', '0000-00-00 00:00:00', NULL),
(3810, '16TH FLOOR', 'S01A', 'MGM-003', 1, '2019-12-17 23:05:33', '0000-00-00 00:00:00', NULL),
(3811, '17TH FLOOR', 'S01A', 'MGM-003', 1, '2019-12-17 23:05:33', '0000-00-00 00:00:00', NULL),
(3812, '18TH FLOOR', 'S01A', 'MGM-003', 1, '2019-12-17 23:05:33', '0000-00-00 00:00:00', NULL),
(3813, '19TH FLOOR', 'S01A', 'MGM-003', 1, '2019-12-17 23:05:33', '0000-00-00 00:00:00', NULL),
(3814, '20TH FLOOR', 'S01A', 'MGM-003', 1, '2019-12-17 23:05:33', '0000-00-00 00:00:00', NULL),
(3815, '21ST FLOOR', 'S01A', 'MGM-003', 1, '2019-12-17 23:05:33', '0000-00-00 00:00:00', NULL),
(3816, '22ND FLOOR', 'S01A', 'MGM-003', 1, '2019-12-17 23:05:33', '0000-00-00 00:00:00', NULL),
(3817, '23RD FLOOR', 'S01A', 'MGM-003', 1, '2019-12-17 23:05:33', '0000-00-00 00:00:00', NULL),
(3818, 'B1 PKG', 'S01A', 'MGM-003', 1, '2019-12-17 23:05:33', '0000-00-00 00:00:00', NULL),
(3819, 'B2 PKG', 'S01A', 'MGM-003', 1, '2019-12-17 23:05:33', '0000-00-00 00:00:00', NULL),
(3820, '01ST FLOOR', 'S01A', 'MGM-004', 1, '2019-12-17 23:05:33', '0000-00-00 00:00:00', NULL),
(3821, '02ND FLOOR', 'S01A', 'MGM-004', 1, '2019-12-17 23:05:33', '0000-00-00 00:00:00', NULL),
(3822, '03RD FLOOR', 'S01A', 'MGM-004', 1, '2019-12-17 23:05:33', '0000-00-00 00:00:00', NULL),
(3823, '05TH FLOOR', 'S01A', 'MGM-004', 1, '2019-12-17 23:05:33', '0000-00-00 00:00:00', NULL),
(3824, '06TH FLOOR', 'S01A', 'MGM-004', 1, '2019-12-17 23:05:33', '0000-00-00 00:00:00', NULL),
(3825, '07TH FLOOR', 'S01A', 'MGM-004', 1, '2019-12-17 23:05:33', '0000-00-00 00:00:00', NULL),
(3826, '08TH FLOOR', 'S01A', 'MGM-004', 1, '2019-12-17 23:05:33', '0000-00-00 00:00:00', NULL),
(3827, '09TH FLOOR', 'S01A', 'MGM-004', 1, '2019-12-17 23:05:33', '0000-00-00 00:00:00', NULL),
(3828, '10TH FLOOR', 'S01A', 'MGM-004', 1, '2019-12-17 23:05:33', '0000-00-00 00:00:00', NULL),
(3829, '11TH FLOOR', 'S01A', 'MGM-004', 1, '2019-12-17 23:05:33', '0000-00-00 00:00:00', NULL),
(3830, '12TH FLOOR', 'S01A', 'MGM-004', 1, '2019-12-17 23:05:33', '0000-00-00 00:00:00', NULL),
(3831, '14TH FLOOR', 'S01A', 'MGM-004', 1, '2019-12-17 23:05:34', '0000-00-00 00:00:00', NULL),
(3832, '15TH FLOOR', 'S01A', 'MGM-004', 1, '2019-12-17 23:05:34', '0000-00-00 00:00:00', NULL),
(3833, '16TH FLOOR', 'S01A', 'MGM-004', 1, '2019-12-17 23:05:34', '0000-00-00 00:00:00', NULL),
(3834, '17TH FLOOR', 'S01A', 'MGM-004', 1, '2019-12-17 23:05:34', '0000-00-00 00:00:00', NULL),
(3835, '18TH FLOOR', 'S01A', 'MGM-004', 1, '2019-12-17 23:05:34', '0000-00-00 00:00:00', NULL),
(3836, '19TH FLOOR', 'S01A', 'MGM-004', 1, '2019-12-17 23:05:34', '0000-00-00 00:00:00', NULL),
(3837, '20TH FLOOR', 'S01A', 'MGM-004', 1, '2019-12-17 23:05:34', '0000-00-00 00:00:00', NULL),
(3838, '02ND FLOOR', 'S01A', 'MGM-005', 1, '2019-12-17 23:05:34', '0000-00-00 00:00:00', NULL),
(3839, '03RD FLOOR', 'S01A', 'MGM-005', 1, '2019-12-17 23:05:34', '0000-00-00 00:00:00', NULL),
(3840, '04TH FLOOR', 'S01A', 'MGM-005', 1, '2019-12-17 23:05:34', '0000-00-00 00:00:00', NULL),
(3841, '05TH FLOOR', 'S01A', 'MGM-005', 1, '2019-12-17 23:05:34', '0000-00-00 00:00:00', NULL),
(3842, '06TH FLOOR', 'S01A', 'MGM-005', 1, '2019-12-17 23:05:34', '0000-00-00 00:00:00', NULL),
(3843, '07TH FLOOR', 'S01A', 'MGM-005', 1, '2019-12-17 23:05:34', '0000-00-00 00:00:00', NULL),
(3844, '08TH FLOOR', 'S01A', 'MGM-005', 1, '2019-12-17 23:05:34', '0000-00-00 00:00:00', NULL),
(3845, '09TH FLOOR', 'S01A', 'MGM-005', 1, '2019-12-17 23:05:34', '0000-00-00 00:00:00', NULL),
(3846, '10TH FLOOR', 'S01A', 'MGM-005', 1, '2019-12-17 23:05:34', '0000-00-00 00:00:00', NULL),
(3847, 'GRNDFLR PKG', 'S01A', 'MGM-005', 1, '2019-12-17 23:05:34', '0000-00-00 00:00:00', NULL),
(3848, '02ND FLOOR', 'S01A', 'MGM-006', 1, '2019-12-17 23:05:34', '0000-00-00 00:00:00', NULL),
(3849, '03RD FLOOR', 'S01A', 'MGM-006', 1, '2019-12-17 23:05:34', '0000-00-00 00:00:00', NULL),
(3850, '04TH FLOOR', 'S01A', 'MGM-006', 1, '2019-12-17 23:05:34', '0000-00-00 00:00:00', NULL),
(3851, '05TH FLOOR', 'S01A', 'MGM-006', 1, '2019-12-17 23:05:34', '0000-00-00 00:00:00', NULL),
(3852, '06TH FLOOR', 'S01A', 'MGM-006', 1, '2019-12-17 23:05:34', '0000-00-00 00:00:00', NULL),
(3853, '07TH FLOOR', 'S01A', 'MGM-006', 1, '2019-12-17 23:05:34', '0000-00-00 00:00:00', NULL),
(3854, '08TH FLOOR', 'S01A', 'MGM-006', 1, '2019-12-17 23:05:34', '0000-00-00 00:00:00', NULL),
(3855, '09TH FLOOR', 'S01A', 'MGM-006', 1, '2019-12-17 23:05:34', '0000-00-00 00:00:00', NULL),
(3856, '10TH FLOOR', 'S01A', 'MGM-006', 1, '2019-12-17 23:05:34', '0000-00-00 00:00:00', NULL),
(3857, '11TH FLOOR', 'S01A', 'MGM-006', 1, '2019-12-17 23:05:34', '0000-00-00 00:00:00', NULL),
(3858, '12TH FLOOR', 'S01A', 'MGM-006', 1, '2019-12-17 23:05:35', '0000-00-00 00:00:00', NULL),
(3859, '14TH FLOOR', 'S01A', 'MGM-006', 1, '2019-12-17 23:05:35', '0000-00-00 00:00:00', NULL),
(3860, '15TH FLOOR', 'S01A', 'MGM-006', 1, '2019-12-17 23:05:35', '0000-00-00 00:00:00', NULL),
(3861, '16TH FLOOR', 'S01A', 'MGM-006', 1, '2019-12-17 23:05:35', '0000-00-00 00:00:00', NULL),
(3862, '17TH FLOOR', 'S01A', 'MGM-006', 1, '2019-12-17 23:05:35', '0000-00-00 00:00:00', NULL),
(3863, '18TH FLOOR', 'S01A', 'MGM-006', 1, '2019-12-17 23:05:35', '0000-00-00 00:00:00', NULL),
(3864, '02ND FLOOR', 'S01A', 'MGM-007', 1, '2019-12-17 23:05:35', '0000-00-00 00:00:00', NULL),
(3865, '03RD FLOOR', 'S01A', 'MGM-007', 1, '2019-12-17 23:05:35', '0000-00-00 00:00:00', NULL),
(3866, '04TH FLOOR', 'S01A', 'MGM-007', 1, '2019-12-17 23:05:35', '0000-00-00 00:00:00', NULL),
(3867, '05TH FLOOR', 'S01A', 'MGM-007', 1, '2019-12-17 23:05:35', '0000-00-00 00:00:00', NULL),
(3868, '06TH FLOOR', 'S01A', 'MGM-007', 1, '2019-12-17 23:05:35', '0000-00-00 00:00:00', NULL),
(3869, '07TH FLOOR', 'S01A', 'MGM-007', 1, '2019-12-17 23:05:35', '0000-00-00 00:00:00', NULL),
(3870, '08TH FLOOR', 'S01A', 'MGM-007', 1, '2019-12-17 23:05:35', '0000-00-00 00:00:00', NULL),
(3871, '09TH FLOOR', 'S01A', 'MGM-007', 1, '2019-12-17 23:05:35', '0000-00-00 00:00:00', NULL),
(3872, '10TH FLOOR', 'S01A', 'MGM-007', 1, '2019-12-17 23:05:35', '0000-00-00 00:00:00', NULL),
(3873, '11TH FLOOR', 'S01A', 'MGM-007', 1, '2019-12-17 23:05:35', '0000-00-00 00:00:00', NULL),
(3874, '12TH FLOOR', 'S01A', 'MGM-007', 1, '2019-12-17 23:05:35', '0000-00-00 00:00:00', NULL),
(3875, '14TH FLOOR', 'S01A', 'MGM-007', 1, '2019-12-17 23:05:35', '0000-00-00 00:00:00', NULL),
(3876, '15TH FLOOR', 'S01A', 'MGM-007', 1, '2019-12-17 23:05:35', '0000-00-00 00:00:00', NULL),
(3877, '16TH FLOOR', 'S01A', 'MGM-007', 1, '2019-12-17 23:05:35', '0000-00-00 00:00:00', NULL),
(3878, '17TH FLOOR', 'S01A', 'MGM-007', 1, '2019-12-17 23:05:35', '0000-00-00 00:00:00', NULL),
(3879, '18TH FLOOR', 'S01A', 'MGM-007', 1, '2019-12-17 23:05:35', '0000-00-00 00:00:00', NULL),
(3880, '19TH FLOOR', 'S01A', 'MGM-007', 1, '2019-12-17 23:05:36', '0000-00-00 00:00:00', NULL),
(3881, 'GROUND', 'S01A', 'MGM-007', 1, '2019-12-17 23:05:36', '0000-00-00 00:00:00', NULL),
(3882, '02ND PKG', 'S01A', 'MGM-008', 1, '2019-12-17 23:05:36', '0000-00-00 00:00:00', NULL),
(3883, '03RD PKG', 'S01A', 'MGM-008', 1, '2019-12-17 23:05:36', '0000-00-00 00:00:00', NULL),
(3884, '04TH FLOOR', 'S01A', 'MGM-008', 1, '2019-12-17 23:05:36', '0000-00-00 00:00:00', NULL),
(3885, '05TH FLOOR', 'S01A', 'MGM-008', 1, '2019-12-17 23:05:36', '0000-00-00 00:00:00', NULL),
(3886, '06TH FLOOR', 'S01A', 'MGM-008', 1, '2019-12-17 23:05:36', '0000-00-00 00:00:00', NULL),
(3887, '07TH FLOOR', 'S01A', 'MGM-008', 1, '2019-12-17 23:05:36', '0000-00-00 00:00:00', NULL),
(3888, '08TH FLOOR', 'S01A', 'MGM-008', 1, '2019-12-17 23:05:36', '0000-00-00 00:00:00', NULL),
(3889, '09TH FLOOR', 'S01A', 'MGM-008', 1, '2019-12-17 23:05:36', '0000-00-00 00:00:00', NULL),
(3890, '10TH FLOOR', 'S01A', 'MGM-008', 1, '2019-12-17 23:05:36', '0000-00-00 00:00:00', NULL),
(3891, '11TH FLOOR', 'S01A', 'MGM-008', 1, '2019-12-17 23:05:36', '0000-00-00 00:00:00', NULL),
(3892, '12TH FLOOR', 'S01A', 'MGM-008', 1, '2019-12-17 23:05:36', '0000-00-00 00:00:00', NULL),
(3893, '15TH FLOOR', 'S01A', 'MGM-008', 1, '2019-12-17 23:05:36', '0000-00-00 00:00:00', NULL),
(3894, '16TH FLOOR', 'S01A', 'MGM-008', 1, '2019-12-17 23:05:36', '0000-00-00 00:00:00', NULL),
(3895, '17TH FLOOR', 'S01A', 'MGM-008', 1, '2019-12-17 23:05:36', '0000-00-00 00:00:00', NULL),
(3896, '18TH FLOOR', 'S01A', 'MGM-008', 1, '2019-12-17 23:05:36', '0000-00-00 00:00:00', NULL),
(3897, '19TH FLOOR', 'S01A', 'MGM-008', 1, '2019-12-17 23:05:36', '0000-00-00 00:00:00', NULL),
(3898, '20TH FLOOR', 'S01A', 'MGM-008', 1, '2019-12-17 23:05:36', '0000-00-00 00:00:00', NULL),
(3899, '01ST FLOOR', 'S01A', 'MGT-003', 1, '2019-12-17 23:05:36', '0000-00-00 00:00:00', NULL),
(3900, '02ND FLOOR', 'S01A', 'MGT-003', 1, '2019-12-17 23:05:36', '0000-00-00 00:00:00', NULL),
(3901, '03RD FLOOR', 'S01A', 'MGT-003', 1, '2019-12-17 23:05:36', '0000-00-00 00:00:00', NULL),
(3902, '05TH FLOOR', 'S01A', 'MGT-003', 1, '2019-12-17 23:05:36', '0000-00-00 00:00:00', NULL),
(3903, '06TH FLOOR', 'S01A', 'MGT-003', 1, '2019-12-17 23:05:36', '0000-00-00 00:00:00', NULL),
(3904, '07TH FLOOR', 'S01A', 'MGT-003', 1, '2019-12-17 23:05:37', '0000-00-00 00:00:00', NULL),
(3905, '08TH FLOOR', 'S01A', 'MGT-003', 1, '2019-12-17 23:05:37', '0000-00-00 00:00:00', NULL),
(3906, '09TH FLOOR', 'S01A', 'MGT-003', 1, '2019-12-17 23:05:37', '0000-00-00 00:00:00', NULL),
(3907, '10TH FLOOR', 'S01A', 'MGT-003', 1, '2019-12-17 23:05:37', '0000-00-00 00:00:00', NULL),
(3908, '11TH FLOOR', 'S01A', 'MGT-003', 1, '2019-12-17 23:05:37', '0000-00-00 00:00:00', NULL),
(3909, '12TH FLOOR', 'S01A', 'MGT-003', 1, '2019-12-17 23:05:37', '0000-00-00 00:00:00', NULL),
(3910, '15TH FLOOR', 'S01A', 'MGT-003', 1, '2019-12-17 23:05:37', '0000-00-00 00:00:00', NULL),
(3911, ' 01ST PKG', 'S01A', 'MGT-PKG', 1, '2019-12-17 23:05:37', '0000-00-00 00:00:00', NULL),
(3912, '01ST COMM', 'S01A', 'MGT-PKG', 1, '2019-12-17 23:05:37', '0000-00-00 00:00:00', NULL),
(3913, '03RD FLOOR', 'S01A', 'MQR-H01', 1, '2019-12-17 23:05:37', '0000-00-00 00:00:00', NULL),
(3914, '05TH FLOOR', 'S01A', 'MQR-H01', 1, '2019-12-17 23:05:37', '0000-00-00 00:00:00', NULL),
(3915, '06TH FLOOR', 'S01A', 'MQR-H01', 1, '2019-12-17 23:05:37', '0000-00-00 00:00:00', NULL),
(3916, '07TH FLOOR', 'S01A', 'MQR-H01', 1, '2019-12-17 23:05:37', '0000-00-00 00:00:00', NULL),
(3917, '08TH FLOOR', 'S01A', 'MQR-H01', 1, '2019-12-17 23:05:37', '0000-00-00 00:00:00', NULL),
(3918, '09TH FLOOR', 'S01A', 'MQR-H01', 1, '2019-12-17 23:05:37', '0000-00-00 00:00:00', NULL),
(3919, '07TH PKG', 'S01A', 'OGM-002', 1, '2019-12-17 23:05:37', '0000-00-00 00:00:00', NULL),
(3920, '28TH FLOOR', 'S01A', 'OGM-002', 1, '2019-12-17 23:05:37', '0000-00-00 00:00:00', NULL),
(3921, '31ST FLOOR', 'S01A', 'OGM-002', 1, '2019-12-17 23:05:37', '0000-00-00 00:00:00', NULL),
(3922, '01ST PKG', 'S01A', 'PBV-001', 1, '2019-12-17 23:05:37', '0000-00-00 00:00:00', NULL),
(3923, '02ND FLOOR', 'S01A', 'PBV-001', 1, '2019-12-17 23:05:37', '0000-00-00 00:00:00', NULL),
(3924, '03RD FLOOR', 'S01A', 'PBV-001', 1, '2019-12-17 23:05:37', '0000-00-00 00:00:00', NULL),
(3925, '05TH FLOOR', 'S01A', 'PBV-001', 1, '2019-12-17 23:05:37', '0000-00-00 00:00:00', NULL),
(3926, '06TH FLOOR', 'S01A', 'PBV-001', 1, '2019-12-17 23:05:37', '0000-00-00 00:00:00', NULL),
(3927, '07TH FLOOR', 'S01A', 'PBV-001', 1, '2019-12-17 23:05:37', '0000-00-00 00:00:00', NULL),
(3928, '08TH FLOOR', 'S01A', 'PBV-001', 1, '2019-12-17 23:05:37', '0000-00-00 00:00:00', NULL),
(3929, '09TH FLOOR', 'S01A', 'PBV-001', 1, '2019-12-17 23:05:38', '0000-00-00 00:00:00', NULL),
(3930, '10TH FLOOR', 'S01A', 'PBV-001', 1, '2019-12-17 23:05:38', '0000-00-00 00:00:00', NULL),
(3931, '11TH FLOOR', 'S01A', 'PBV-001', 1, '2019-12-17 23:05:38', '0000-00-00 00:00:00', NULL),
(3932, '12TH FLOOR', 'S01A', 'PBV-001', 1, '2019-12-17 23:05:38', '0000-00-00 00:00:00', NULL),
(3933, '14TH FLOOR', 'S01A', 'PBV-001', 1, '2019-12-17 23:05:38', '0000-00-00 00:00:00', NULL),
(3934, '15TH FLOOR', 'S01A', 'PBV-001', 1, '2019-12-17 23:05:38', '0000-00-00 00:00:00', NULL),
(3935, '16TH FLOOR', 'S01A', 'PBV-001', 1, '2019-12-17 23:05:38', '0000-00-00 00:00:00', NULL),
(3936, '17TH FLOOR', 'S01A', 'PBV-001', 1, '2019-12-17 23:05:38', '0000-00-00 00:00:00', NULL),
(3937, '18TH FLOOR', 'S01A', 'PBV-001', 1, '2019-12-17 23:05:38', '0000-00-00 00:00:00', NULL),
(3938, '01ST COMM', 'S01A', 'PBV-002', 1, '2019-12-17 23:05:38', '0000-00-00 00:00:00', NULL),
(3939, '01ST PKG', 'S01A', 'PBV-002', 1, '2019-12-17 23:05:38', '0000-00-00 00:00:00', NULL),
(3940, '02ND FLOOR', 'S01A', 'PBV-002', 1, '2019-12-17 23:05:38', '0000-00-00 00:00:00', NULL),
(3941, '03RD FLOOR', 'S01A', 'PBV-002', 1, '2019-12-17 23:05:38', '0000-00-00 00:00:00', NULL),
(3942, '05TH FLOOR', 'S01A', 'PBV-002', 1, '2019-12-17 23:05:38', '0000-00-00 00:00:00', NULL),
(3943, '06TH FLOOR', 'S01A', 'PBV-002', 1, '2019-12-17 23:05:38', '0000-00-00 00:00:00', NULL),
(3944, '07TH FLOOR', 'S01A', 'PBV-002', 1, '2019-12-17 23:05:38', '0000-00-00 00:00:00', NULL),
(3945, '08TH FLOOR', 'S01A', 'PBV-002', 1, '2019-12-17 23:05:38', '0000-00-00 00:00:00', NULL),
(3946, '09TH FLOOR', 'S01A', 'PBV-002', 1, '2019-12-17 23:05:38', '0000-00-00 00:00:00', NULL),
(3947, '10TH FLOOR', 'S01A', 'PBV-002', 1, '2019-12-17 23:05:38', '0000-00-00 00:00:00', NULL),
(3948, '11TH FLOOR', 'S01A', 'PBV-002', 1, '2019-12-17 23:05:38', '0000-00-00 00:00:00', NULL),
(3949, '12TH FLOOR', 'S01A', 'PBV-002', 1, '2019-12-17 23:05:39', '0000-00-00 00:00:00', NULL),
(3950, '14TH FLOOR', 'S01A', 'PBV-002', 1, '2019-12-17 23:05:39', '0000-00-00 00:00:00', NULL),
(3951, '15TH FLOOR', 'S01A', 'PBV-002', 1, '2019-12-17 23:05:39', '0000-00-00 00:00:00', NULL),
(3952, '16TH FLOOR', 'S01A', 'PBV-002', 1, '2019-12-17 23:05:39', '0000-00-00 00:00:00', NULL),
(3953, '17TH FLOOR', 'S01A', 'PBV-002', 1, '2019-12-17 23:05:39', '0000-00-00 00:00:00', NULL),
(3954, '18TH FLOOR', 'S01A', 'PBV-002', 1, '2019-12-17 23:05:39', '0000-00-00 00:00:00', NULL),
(3955, '02ND FLOOR', 'S01A', 'PBV-003', 1, '2019-12-17 23:05:39', '0000-00-00 00:00:00', NULL),
(3956, '03RD FLOOR', 'S01A', 'PBV-003', 1, '2019-12-17 23:05:39', '0000-00-00 00:00:00', NULL),
(3957, '05TH FLOOR', 'S01A', 'PBV-003', 1, '2019-12-17 23:05:39', '0000-00-00 00:00:00', NULL),
(3958, '06TH FLOOR', 'S01A', 'PBV-003', 1, '2019-12-17 23:05:39', '0000-00-00 00:00:00', NULL),
(3959, '07TH FLOOR', 'S01A', 'PBV-003', 1, '2019-12-17 23:05:39', '0000-00-00 00:00:00', NULL),
(3960, '08TH FLOOR', 'S01A', 'PBV-003', 1, '2019-12-17 23:05:39', '0000-00-00 00:00:00', NULL),
(3961, '09TH FLOOR', 'S01A', 'PBV-003', 1, '2019-12-17 23:05:39', '0000-00-00 00:00:00', NULL),
(3962, '10TH FLOOR', 'S01A', 'PBV-003', 1, '2019-12-17 23:05:39', '0000-00-00 00:00:00', NULL),
(3963, '11TH FLOOR', 'S01A', 'PBV-003', 1, '2019-12-17 23:05:39', '0000-00-00 00:00:00', NULL),
(3964, '12TH FLOOR', 'S01A', 'PBV-003', 1, '2019-12-17 23:05:39', '0000-00-00 00:00:00', NULL),
(3965, '14TH FLOOR', 'S01A', 'PBV-003', 1, '2019-12-17 23:05:40', '0000-00-00 00:00:00', NULL),
(3966, '15TH FLOOR', 'S01A', 'PBV-003', 1, '2019-12-17 23:05:40', '0000-00-00 00:00:00', NULL),
(3967, '16TH FLOOR', 'S01A', 'PBV-003', 1, '2019-12-17 23:05:40', '0000-00-00 00:00:00', NULL),
(3968, '17TH FLOOR', 'S01A', 'PBV-003', 1, '2019-12-17 23:05:40', '0000-00-00 00:00:00', NULL),
(3969, '18TH FLOOR', 'S01A', 'PBV-003', 1, '2019-12-17 23:05:40', '0000-00-00 00:00:00', NULL),
(3970, 'PARKING', 'S01A', 'PBV-003', 1, '2019-12-17 23:05:40', '0000-00-00 00:00:00', NULL),
(3971, '02ND FLOOR', 'S01A', 'PBV-004', 1, '2019-12-17 23:05:40', '0000-00-00 00:00:00', NULL),
(3972, '03RD FLOOR', 'S01A', 'PBV-004', 1, '2019-12-17 23:05:40', '0000-00-00 00:00:00', NULL),
(3973, '05TH FLOOR', 'S01A', 'PBV-004', 1, '2019-12-17 23:05:40', '0000-00-00 00:00:00', NULL),
(3974, '06TH FLOOR', 'S01A', 'PBV-004', 1, '2019-12-17 23:05:40', '0000-00-00 00:00:00', NULL),
(3975, '07TH FLOOR', 'S01A', 'PBV-004', 1, '2019-12-17 23:05:40', '0000-00-00 00:00:00', NULL),
(3976, '08TH FLOOR', 'S01A', 'PBV-004', 1, '2019-12-17 23:05:40', '0000-00-00 00:00:00', NULL),
(3977, '09TH FLOOR', 'S01A', 'PBV-004', 1, '2019-12-17 23:05:40', '0000-00-00 00:00:00', NULL),
(3978, '10TH FLOOR', 'S01A', 'PBV-004', 1, '2019-12-17 23:05:40', '0000-00-00 00:00:00', NULL),
(3979, '11TH FLOOR', 'S01A', 'PBV-004', 1, '2019-12-17 23:05:40', '0000-00-00 00:00:00', NULL),
(3980, '12TH FLOOR', 'S01A', 'PBV-004', 1, '2019-12-17 23:05:40', '0000-00-00 00:00:00', NULL),
(3981, '14TH FLOOR', 'S01A', 'PBV-004', 1, '2019-12-17 23:05:40', '0000-00-00 00:00:00', NULL),
(3982, '15TH FLOOR', 'S01A', 'PBV-004', 1, '2019-12-17 23:05:40', '0000-00-00 00:00:00', NULL),
(3983, '16TH FLOOR', 'S01A', 'PBV-004', 1, '2019-12-17 23:05:40', '0000-00-00 00:00:00', NULL),
(3984, '17TH FLOOR', 'S01A', 'PBV-004', 1, '2019-12-17 23:05:40', '0000-00-00 00:00:00', NULL),
(3985, '18TH FLOOR', 'S01A', 'PBV-004', 1, '2019-12-17 23:05:40', '0000-00-00 00:00:00', NULL),
(3986, 'BASEMENT', 'S01A', 'PBV-004', 1, '2019-12-17 23:05:40', '0000-00-00 00:00:00', NULL),
(3987, 'GF PKG', 'S01A', 'PBV-004', 1, '2019-12-17 23:05:40', '0000-00-00 00:00:00', NULL),
(3988, 'PODIUM L-1', 'S01A', 'PBV-004', 1, '2019-12-17 23:05:40', '0000-00-00 00:00:00', NULL),
(3989, 'PODIUM L-2', 'S01A', 'PBV-004', 1, '2019-12-17 23:05:41', '0000-00-00 00:00:00', NULL),
(3990, '04TH PKG', 'S01A', 'ST-001', 1, '2019-12-17 23:05:41', '0000-00-00 00:00:00', NULL),
(3991, '05TH FLOOR', 'S01A', 'ST-001', 1, '2019-12-17 23:05:41', '0000-00-00 00:00:00', NULL),
(3992, '06TH FLOOR', 'S01A', 'ST-001', 1, '2019-12-17 23:05:41', '0000-00-00 00:00:00', NULL),
(3993, '07TH FLOOR', 'S01A', 'ST-001', 1, '2019-12-17 23:05:41', '0000-00-00 00:00:00', NULL),
(3994, '08TH FLOOR', 'S01A', 'ST-001', 1, '2019-12-17 23:05:41', '0000-00-00 00:00:00', NULL),
(3995, '09TH FLOOR', 'S01A', 'ST-001', 1, '2019-12-17 23:05:41', '0000-00-00 00:00:00', NULL),
(3996, '10TH FLOOR', 'S01A', 'ST-001', 1, '2019-12-17 23:05:41', '0000-00-00 00:00:00', NULL),
(3997, '11TH FLOOR', 'S01A', 'ST-001', 1, '2019-12-17 23:05:41', '0000-00-00 00:00:00', NULL),
(3998, '12TH FLOOR', 'S01A', 'ST-001', 1, '2019-12-17 23:05:41', '0000-00-00 00:00:00', NULL),
(3999, '15TH FLOOR', 'S01A', 'ST-001', 1, '2019-12-17 23:05:41', '0000-00-00 00:00:00', NULL),
(4000, '16TH FLOOR', 'S01A', 'ST-001', 1, '2019-12-17 23:05:41', '0000-00-00 00:00:00', NULL),
(4001, '17TH FLOOR', 'S01A', 'ST-001', 1, '2019-12-17 23:05:41', '0000-00-00 00:00:00', NULL),
(4002, '18TH FLOOR', 'S01A', 'ST-001', 1, '2019-12-17 23:05:41', '0000-00-00 00:00:00', NULL),
(4003, '19TH FLOOR', 'S01A', 'ST-001', 1, '2019-12-17 23:05:41', '0000-00-00 00:00:00', NULL),
(4004, '20TH FLOOR', 'S01A', 'ST-001', 1, '2019-12-17 23:05:41', '0000-00-00 00:00:00', NULL),
(4005, '21ST FLOOR', 'S01A', 'ST-001', 1, '2019-12-17 23:05:41', '0000-00-00 00:00:00', NULL),
(4006, '22ND FLOOR', 'S01A', 'ST-001', 1, '2019-12-17 23:05:41', '0000-00-00 00:00:00', NULL),
(4007, '01ST PKG', 'S01E', 'GHR-001', 1, '2019-12-17 23:05:41', '0000-00-00 00:00:00', NULL),
(4008, '07TH FLOOR', 'S01E', 'GHR-001', 1, '2019-12-17 23:05:41', '0000-00-00 00:00:00', NULL),
(4009, '08TH FLOOR', 'S01E', 'GHR-001', 1, '2019-12-17 23:05:41', '0000-00-00 00:00:00', NULL),
(4010, '09TH FLOOR', 'S01E', 'GHR-001', 1, '2019-12-17 23:05:41', '0000-00-00 00:00:00', NULL),
(4011, '10TH FLOOR', 'S01E', 'GHR-001', 1, '2019-12-17 23:05:41', '0000-00-00 00:00:00', NULL),
(4012, '11TH FLOOR', 'S01E', 'GHR-001', 1, '2019-12-17 23:05:41', '0000-00-00 00:00:00', NULL),
(4013, '12TH FLOOR', 'S01E', 'GHR-001', 1, '2019-12-17 23:05:41', '0000-00-00 00:00:00', NULL),
(4014, '15TH FLOOR', 'S01E', 'GHR-001', 1, '2019-12-17 23:05:42', '0000-00-00 00:00:00', NULL),
(4015, '16TH FLOOR', 'S01E', 'GHR-001', 1, '2019-12-17 23:05:42', '0000-00-00 00:00:00', NULL),
(4016, '17TH FLOOR', 'S01E', 'GHR-001', 1, '2019-12-17 23:05:42', '0000-00-00 00:00:00', NULL),
(4017, '18TH FLOOR', 'S01E', 'GHR-001', 1, '2019-12-17 23:05:42', '0000-00-00 00:00:00', NULL),
(4018, '19TH FLOOR', 'S01E', 'GHR-001', 1, '2019-12-17 23:05:42', '0000-00-00 00:00:00', NULL),
(4019, '20TH FLOOR', 'S01E', 'GHR-001', 1, '2019-12-17 23:05:42', '0000-00-00 00:00:00', NULL),
(4020, '21ST FLOOR', 'S01E', 'GHR-001', 1, '2019-12-17 23:05:42', '0000-00-00 00:00:00', NULL),
(4021, '22ND FLOOR', 'S01E', 'GHR-001', 1, '2019-12-17 23:05:42', '0000-00-00 00:00:00', NULL),
(4022, '23RD FLOOR', 'S01E', 'GHR-001', 1, '2019-12-17 23:05:42', '0000-00-00 00:00:00', NULL),
(4023, '25TH FLOOR', 'S01E', 'GHR-001', 1, '2019-12-17 23:05:42', '0000-00-00 00:00:00', NULL),
(4024, '26TH FLOOR', 'S01E', 'GHR-001', 1, '2019-12-17 23:05:42', '0000-00-00 00:00:00', NULL),
(4025, '27TH FLOOR', 'S01E', 'GHR-001', 1, '2019-12-17 23:05:42', '0000-00-00 00:00:00', NULL),
(4026, '28TH FLOOR', 'S01E', 'GHR-001', 1, '2019-12-17 23:05:42', '0000-00-00 00:00:00', NULL),
(4027, '29TH FLOOR', 'S01E', 'GHR-001', 1, '2019-12-17 23:05:42', '0000-00-00 00:00:00', NULL),
(4028, '30TH FLOOR', 'S01E', 'GHR-001', 1, '2019-12-17 23:05:42', '0000-00-00 00:00:00', NULL),
(4029, '31ST FLOOR', 'S01E', 'GHR-001', 1, '2019-12-17 23:05:42', '0000-00-00 00:00:00', NULL),
(4030, '32ND FLOOR', 'S01E', 'GHR-001', 1, '2019-12-17 23:05:42', '0000-00-00 00:00:00', NULL),
(4031, '33RD FLOOR', 'S01E', 'GHR-001', 1, '2019-12-17 23:05:42', '0000-00-00 00:00:00', NULL),
(4032, '35TH FLOOR', 'S01E', 'GHR-001', 1, '2019-12-17 23:05:42', '0000-00-00 00:00:00', NULL),
(4033, '36TH FLOOR', 'S01E', 'GHR-001', 1, '2019-12-17 23:05:42', '0000-00-00 00:00:00', NULL),
(4034, '37TH FLOOR', 'S01E', 'GHR-001', 1, '2019-12-17 23:05:42', '0000-00-00 00:00:00', NULL),
(4035, '38TH FLOOR', 'S01E', 'GHR-001', 1, '2019-12-17 23:05:42', '0000-00-00 00:00:00', NULL),
(4036, '39/40TH FLR', 'S01E', 'GHR-001', 1, '2019-12-17 23:05:42', '0000-00-00 00:00:00', NULL),
(4037, '39TH FLOOR', 'S01E', 'GHR-001', 1, '2019-12-17 23:05:42', '0000-00-00 00:00:00', NULL),
(4038, '40TH FLOOR', 'S01E', 'GHR-001', 1, '2019-12-17 23:05:42', '0000-00-00 00:00:00', NULL),
(4039, '41/42ND FLR', 'S01E', 'GHR-001', 1, '2019-12-17 23:05:42', '0000-00-00 00:00:00', NULL),
(4040, '41ST FLOOR', 'S01E', 'GHR-001', 1, '2019-12-17 23:05:42', '0000-00-00 00:00:00', NULL),
(4041, '42ND FLOOR', 'S01E', 'GHR-001', 1, '2019-12-17 23:05:43', '0000-00-00 00:00:00', NULL),
(4042, '43RD FLOOR', 'S01E', 'GHR-001', 1, '2019-12-17 23:05:43', '0000-00-00 00:00:00', NULL),
(4043, '45TH FLOOR', 'S01E', 'GHR-001', 1, '2019-12-17 23:05:43', '0000-00-00 00:00:00', NULL),
(4044, '46TH FLOOR', 'S01E', 'GHR-001', 1, '2019-12-17 23:05:43', '0000-00-00 00:00:00', NULL),
(4045, '47TH FLOOR', 'S01E', 'GHR-001', 1, '2019-12-17 23:05:43', '0000-00-00 00:00:00', NULL),
(4046, '48TH FLOOR', 'S01E', 'GHR-001', 1, '2019-12-17 23:05:43', '0000-00-00 00:00:00', NULL),
(4047, '49TH FLOOR', 'S01E', 'GHR-001', 1, '2019-12-17 23:05:43', '0000-00-00 00:00:00', NULL),
(4048, '50TH FLOOR', 'S01E', 'GHR-001', 1, '2019-12-17 23:05:43', '0000-00-00 00:00:00', NULL),
(4049, 'OFFICE', 'S01E', 'MBC-001', 1, '2019-12-17 23:05:43', '0000-00-00 00:00:00', NULL),
(4050, 'PKG FLR', 'S01E', 'MBC-001', 1, '2019-12-17 23:05:43', '0000-00-00 00:00:00', NULL),
(4051, '01ST FLOOR', 'S01G', 'TRDC-001', 1, '2019-12-17 23:05:43', '0000-00-00 00:00:00', NULL),
(4052, '02ND FLOOR', 'S01G', 'TRDC-001', 1, '2019-12-17 23:05:43', '0000-00-00 00:00:00', NULL),
(4053, '03RD FLOOR', 'S01G', 'TRDC-001', 1, '2019-12-17 23:05:43', '0000-00-00 00:00:00', NULL),
(4054, '04TH FLOOR', 'S01G', 'TRDC-001', 1, '2019-12-17 23:05:43', '0000-00-00 00:00:00', NULL),
(4055, '05TH FLOOR', 'S01G', 'TRDC-001', 1, '2019-12-17 23:05:43', '0000-00-00 00:00:00', NULL),
(4056, '06TH FLOOR', 'S01G', 'TRDC-001', 1, '2019-12-17 23:05:43', '0000-00-00 00:00:00', NULL),
(4057, '08TH FLOOR', 'S01L', 'GHR-002', 1, '2019-12-17 23:05:43', '0000-00-00 00:00:00', NULL),
(4058, '09TH FLOOR', 'S01L', 'GHR-002', 1, '2019-12-17 23:05:43', '0000-00-00 00:00:00', NULL),
(4059, '10TH FLOOR', 'S01L', 'GHR-002', 1, '2019-12-17 23:05:43', '0000-00-00 00:00:00', NULL),
(4060, '11TH FLOOR', 'S01L', 'GHR-002', 1, '2019-12-17 23:05:43', '0000-00-00 00:00:00', NULL),
(4061, '12TH FLOOR', 'S01L', 'GHR-002', 1, '2019-12-17 23:05:44', '0000-00-00 00:00:00', NULL),
(4062, '15TH FLOOR', 'S01L', 'GHR-002', 1, '2019-12-17 23:05:44', '0000-00-00 00:00:00', NULL),
(4063, '16TH FLOOR', 'S01L', 'GHR-002', 1, '2019-12-17 23:05:44', '0000-00-00 00:00:00', NULL),
(4064, '17TH FLOOR', 'S01L', 'GHR-002', 1, '2019-12-17 23:05:44', '0000-00-00 00:00:00', NULL),
(4065, '18TH FLOOR', 'S01L', 'GHR-002', 1, '2019-12-17 23:05:44', '0000-00-00 00:00:00', NULL),
(4066, '19TH FLOOR', 'S01L', 'GHR-002', 1, '2019-12-17 23:05:44', '0000-00-00 00:00:00', NULL),
(4067, '20TH FLOOR', 'S01L', 'GHR-002', 1, '2019-12-17 23:05:44', '0000-00-00 00:00:00', NULL),
(4068, '21ST FLOOR', 'S01L', 'GHR-002', 1, '2019-12-17 23:05:44', '0000-00-00 00:00:00', NULL),
(4069, '22ND FLOOR', 'S01L', 'GHR-002', 1, '2019-12-17 23:05:44', '0000-00-00 00:00:00', NULL),
(4070, '23RD FLOOR', 'S01L', 'GHR-002', 1, '2019-12-17 23:05:44', '0000-00-00 00:00:00', NULL),
(4071, '25TH FLOOR', 'S01L', 'GHR-002', 1, '2019-12-17 23:05:44', '0000-00-00 00:00:00', NULL),
(4072, '26TH FLOOR', 'S01L', 'GHR-002', 1, '2019-12-17 23:05:44', '0000-00-00 00:00:00', NULL),
(4073, '27TH FLOOR', 'S01L', 'GHR-002', 1, '2019-12-17 23:05:44', '0000-00-00 00:00:00', NULL),
(4074, '28TH FLOOR', 'S01L', 'GHR-002', 1, '2019-12-17 23:05:44', '0000-00-00 00:00:00', NULL),
(4075, '29TH FLOOR', 'S01L', 'GHR-002', 1, '2019-12-17 23:05:44', '0000-00-00 00:00:00', NULL),
(4076, '30TH FLOOR', 'S01L', 'GHR-002', 1, '2019-12-17 23:05:44', '0000-00-00 00:00:00', NULL),
(4077, '31ST FLOOR', 'S01L', 'GHR-002', 1, '2019-12-17 23:05:44', '0000-00-00 00:00:00', NULL),
(4078, '32ND FLOOR', 'S01L', 'GHR-002', 1, '2019-12-17 23:05:44', '0000-00-00 00:00:00', NULL),
(4079, '33RD FLOOR', 'S01L', 'GHR-002', 1, '2019-12-17 23:05:44', '0000-00-00 00:00:00', NULL),
(4080, '35TH FLOOR', 'S01L', 'GHR-002', 1, '2019-12-17 23:05:44', '0000-00-00 00:00:00', NULL),
(4081, '36TH FLOOR', 'S01L', 'GHR-002', 1, '2019-12-17 23:05:44', '0000-00-00 00:00:00', NULL),
(4082, '37TH FLOOR', 'S01L', 'GHR-002', 1, '2019-12-17 23:05:44', '0000-00-00 00:00:00', NULL),
(4083, '38TH FLOOR', 'S01L', 'GHR-002', 1, '2019-12-17 23:05:44', '0000-00-00 00:00:00', NULL),
(4084, '39TH FLOOR', 'S01L', 'GHR-002', 1, '2019-12-17 23:05:45', '0000-00-00 00:00:00', NULL),
(4085, '40TH FLOOR', 'S01L', 'GHR-002', 1, '2019-12-17 23:05:45', '0000-00-00 00:00:00', NULL),
(4086, '41ST FLOOR', 'S01L', 'GHR-002', 1, '2019-12-17 23:05:45', '0000-00-00 00:00:00', NULL),
(4087, '42ND FLOOR', 'S01L', 'GHR-002', 1, '2019-12-17 23:05:45', '0000-00-00 00:00:00', NULL),
(4088, '45TH FLOOR', 'S01L', 'GHR-002', 1, '2019-12-17 23:05:45', '0000-00-00 00:00:00', NULL),
(4089, '46TH FLOOR', 'S01L', 'GHR-002', 1, '2019-12-17 23:05:45', '0000-00-00 00:00:00', NULL),
(4090, '47TH FLOOR', 'S01L', 'GHR-002', 1, '2019-12-17 23:05:45', '0000-00-00 00:00:00', NULL),
(4091, '48TH FLOOR', 'S01L', 'GHR-002', 1, '2019-12-17 23:05:45', '0000-00-00 00:00:00', NULL),
(4092, '49TH FLOOR', 'S01L', 'GHR-002', 1, '2019-12-17 23:05:45', '0000-00-00 00:00:00', NULL),
(4093, '50TH FLOOR', 'S01L', 'GHR-002', 1, '2019-12-17 23:05:45', '0000-00-00 00:00:00', NULL),
(4094, 'PKG_TEST', 'S01L', 'GHR-002', 1, '2019-12-17 23:05:45', '0000-00-00 00:00:00', NULL);
INSERT INTO `tbl_sap_floors` (`id`, `floor_code`, `company_code`, `project_code`, `is_activated`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4095, '10TH FLOOR', 'S01L', 'IKI-032', 1, '2019-12-17 23:05:45', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedule`
--

CREATE TABLE `tbl_schedule` (
  `id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `schedule` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(5, 'Handover'),
(6, 'Default');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_temp_schedule_link`
--

CREATE TABLE `tbl_temp_schedule_link` (
  `id` int(11) NOT NULL,
  `ticket_number` varchar(255) NOT NULL,
  `temp_link` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tickets`
--

CREATE TABLE `tbl_tickets` (
  `id` int(11) NOT NULL,
  `ticket_number` varchar(255) NOT NULL,
  `customer_number` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `assigned_to` int(11) NOT NULL,
  `acceptance_signature` longtext,
  `status` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_assigned` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tickets`
--

INSERT INTO `tbl_tickets` (`id`, `ticket_number`, `customer_number`, `created_by`, `category`, `subject`, `assigned_to`, `acceptance_signature`, `status`, `date_created`, `last_update`, `date_assigned`) VALUES
(10, 'TEM-2019-00001', 12345, 8, 'FOR CALLOUT', 'For Call Confirmation of Outbound Associate', 7, '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aESAQtaIEH8emcBC1SkoYpERsiEJkEALBChkLUBjl/oEaqtTKPBqqNYR7RS0JW8SIAESqEeAQsb5QQIkQAIkEGsCFLJYp4/OkwAJkAAJUMg4B0iABEiABGJNgEIW6/TReRIgARIgAQoZ5wAJkAAJkECsCVDIYp0+Ok8CJEACJEAh4xwgARIgARKINQEKWazTR+dJgARIgAQoZJwDJEACJEACsSZAIYt1+ug8CZAACZAAhYxzgARIgARIINYEKGSxTh+dJwESIAESoJBxDpAACZAACcSaAIUs1umj8yRAAiRAAhQyzgESIAESIIFYE6CQxTp9dJ4ESIAESIBCxjlAAiRAAiQQawIUslinj86TAAmQAAlQyDgHSIAESIAEYk2AQhbr9NF5EiABEiABChnnAAmQAAmQQKwJUMhinT46TwIkQAIkQCHjHCABEiABEog1AQpZrNNH50mABEiABChknAMkQAIkQAKxJkAhi3X66DwJkAAJkACFjHOABEiABEgg1gQoZLFOH50nARIgARKgkHEOkAAJkAAJxJoAhSzW6aPzJEACJEACFDLOARIgARIggVgT+H8+7NnH7RX/jwAAAABJRU5ErkJggg==', 0, '2019-11-26 02:52:35', '2019-12-19 13:16:09', '2019-11-26 03:52:00'),
(11, 'TEM-2019-00002\n', 12345, 8, 'Turnover', 'For Schedule Confirmation', 7, '', 0, '2019-11-26 06:03:10', '2019-11-26 06:03:10', '2019-11-26 07:03:00'),
(12, 'TEM-2019-00003\n', 12345, 7, 'Turnover', 'For Schedule Confirmation', 7, '', 0, '2019-11-27 02:02:43', '2019-11-27 02:02:43', '2019-11-27 03:02:00'),
(13, 'TEM-2019-00004\n', 12345, 7, 'Turnover', 'For Schedule Confirmation', 7, '', 0, '2019-11-27 02:04:25', '2019-11-27 02:04:25', '2019-11-27 03:04:00'),
(14, 'TEM-2019-00005\n', 12345, 7, 'Turnover', 'For Schedule Confirmation', 7, '', 0, '2019-11-27 02:04:49', '2019-11-27 02:04:49', '2019-11-27 03:04:00'),
(15, 'TEM-2019-00006\n', 12345, 7, 'Turnover', 'For Schedule Confirmation', 7, '', 0, '2019-11-27 02:05:37', '2019-11-27 02:05:37', '2019-11-27 03:05:00'),
(16, 'TEM-2019-00007\n', 12345, 7, 'Turnover', 'For Schedule Confirmation', 7, '', 0, '2019-11-27 02:06:01', '2019-11-27 02:06:01', '2019-11-27 03:06:00'),
(17, 'BCR-2019-00008\n', 136478, 8, 'Turnover', 'For Schedule Confirmation', 7, NULL, 0, '2019-12-20 01:14:25', '2019-12-20 01:14:25', '2019-12-20 02:14:00'),
(21, 'BCR-2019-00009\n', 136478, 7, 'Turnover', 'For Schedule Confirmation', 7, NULL, 0, '2019-12-20 03:08:17', '2019-12-20 03:08:17', '2019-12-20 04:08:00'),
(22, 'BCR-2019-00010\n', 12345, 8, 'Turnover', 'For Schedule Confirmation', 7, NULL, 0, '2019-12-20 03:26:25', '2019-12-20 03:26:25', '2019-12-20 04:26:00'),
(27, 'BCR-2019-00011', 136517, 8, 'TURNOVER', 'FOR TURNOVER', 16, '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', 0, '2019-12-20 06:18:35', '2019-12-20 09:27:55', '2019-12-20 07:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tickets_images`
--

CREATE TABLE `tbl_tickets_images` (
  `id` int(11) NOT NULL,
  `ticket_number` varchar(255) NOT NULL,
  `image_description` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `date_uploaded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tickets_images`
--

INSERT INTO `tbl_tickets_images` (`id`, `ticket_number`, `image_description`, `image_path`, `date_uploaded`, `status`) VALUES
(17, 'TGM-2019-00001', '1', 'TGM-2019-00001-1.png', '2019-11-11 05:25:46', 0),
(18, 'TGM-2019-00001', '2', 'TGM-2019-00001-21.jpg', '2019-11-11 06:00:59', 0),
(19, 'TGM-2019-00001', '9', 'TGM-2019-00001-9.png', '2019-11-11 06:02:07', 0),
(26, 'TGM-2019-00001', 'Special Power of Attorney', 'TGM-2019-00001-Special_Power_of_Attorney2.png', '2019-11-11 07:19:37', 0),
(32, 'TGM-2019-00001', 'Authorized Representative Identification Card', 'TGM-2019-00001-Authorized_Representative_Identification_Card11.jpg', '2019-11-11 08:07:36', 0),
(33, 'TGM-2019-00001', 'Authorized Representative Identification Card', 'TGM-2019-00001-Authorized_Representative_Identification_Card12.jpg', '2019-11-11 08:09:23', 0),
(35, 'TGM-2019-00001', '2', 'TGM-2019-00001-21.png', '2019-11-11 08:13:45', 0),
(36, 'TGM-2019-00001', 'Authorized Representative Identification Card', 'TGM-2019-00001-Authorized_Representative_Identification_Card13.JPG', '2019-11-12 05:52:47', 0),
(37, 'TGM-2019-00001', 'Authorized Representative Identification Card', 'TGM-2019-00001-Authorized_Representative_Identification_Card14.JPG', '2019-11-12 05:52:49', 0),
(38, 'BCR-2019-00011', 'Authorized Representative Identification Card', 'BCR-2019-00011-Authorized_Representative_Identification_Card.jpg', '2019-12-20 06:44:36', 0),
(39, 'BCR-2019-00011', 'Authorized Representative Identification Card', 'BCR-2019-00011-Authorized_Representative_Identification_Card1.jpg', '2019-12-20 06:56:22', 0),
(40, 'BCR-2019-00011', 'Authorized Representative Identification Card', 'BCR-2019-00011-Authorized_Representative_Identification_Card2.jpg', '2019-12-20 06:56:59', 0),
(41, 'BCR-2019-00011', 'Authorized Representative Identification Card', 'BCR-2019-00011-Authorized_Representative_Identification_Card3.jpg', '2019-12-20 07:03:25', 0),
(42, 'BCR-2019-00011', 'Special Power of Attorney', 'BCR-2019-00011-Special_Power_of_Attorney.jpg', '2019-12-20 07:05:54', 0),
(43, 'BCR-2019-00011', 'Authorized Representative Identification Card', 'BCR-2019-00011-Authorized_Representative_Identification_Card4.jpg', '2019-12-20 07:06:44', 0),
(44, 'BCR-2019-00011', 'Authorized Representative Identification Card', 'BCR-2019-00011-Authorized_Representative_Identification_Card5.jpg', '2019-12-20 07:16:17', 0),
(45, 'BCR-2019-00011', 'Authorized Representative Identification Card', 'BCR-2019-00011-Authorized_Representative_Identification_Card6.jpg', '2019-12-20 07:16:48', 0),
(46, 'BCR-2019-00011', 'Special Power of Attorney', 'BCR-2019-00011-Special_Power_of_Attorney.png', '2019-12-20 07:20:24', 0),
(47, 'BCR-2019-00011', 'Special Power of Attorney', 'BCR-2019-00011-Special_Power_of_Attorney1.JPG', '2019-12-20 07:20:54', 0),
(48, 'BCR-2019-00011', 'Authorized Representative Identification Card', 'BCR-2019-00011-Authorized_Representative_Identification_Card.png', '2019-12-20 07:21:49', 0),
(49, 'BCR-2019-00011', 'Authorized Representative Identification Card', 'BCR-2019-00011-Authorized_Representative_Identification_Card7.jpg', '2019-12-20 07:22:13', 0),
(61, 'BCR-2019-00011', '20', 'BCR-2019-00011-20.png', '2019-12-20 08:42:32', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ticket_checklist`
--

CREATE TABLE `tbl_ticket_checklist` (
  `id` int(11) NOT NULL,
  `ticket_number` varchar(255) NOT NULL,
  `area_for_checking` int(11) NOT NULL,
  `observation` longtext NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ticket_checklist`
--

INSERT INTO `tbl_ticket_checklist` (`id`, `ticket_number`, `area_for_checking`, `observation`, `attachment`, `date_created`, `status`) VALUES
(32, 'TGM-2019-00001', 2, 'Sample Observation.', '', '2019-11-12 05:57:12', 0),
(33, 'TGM-2019-00001', 5, '', '', '2019-11-12 05:57:12', 0),
(34, 'TGM-2019-00001', 6, 'Test', '', '2019-11-12 05:57:12', 0),
(35, 'TGM-2019-00001', 9, 'Sample Observation.', '', '2019-11-12 05:57:12', 0),
(108, 'TEM-2019-00001', 18, '', '', '2019-12-19 13:16:10', 0),
(109, 'TEM-2019-00001', 19, '', '', '2019-12-19 13:16:10', 0),
(110, 'TEM-2019-00001', 20, '', '', '2019-12-19 13:16:11', 0),
(114, 'BCR-2019-00011', 18, 'This is a sample observation', '', '2019-12-20 09:28:24', 0),
(115, 'BCR-2019-00011', 19, 'This is a sample observation', '', '2019-12-20 09:28:24', 0),
(116, 'BCR-2019-00011', 20, 'This is a sample observation', '', '2019-12-20 09:28:24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ticket_checklist_others`
--

CREATE TABLE `tbl_ticket_checklist_others` (
  `id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `temporary_parking` varchar(255) NOT NULL,
  `parking_remarks` varchar(255) NOT NULL,
  `other_concern` longtext NOT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ticket_checklist_others`
--

INSERT INTO `tbl_ticket_checklist_others` (`id`, `ticket_id`, `temporary_parking`, `parking_remarks`, `other_concern`, `attachment`, `date_created`, `status`) VALUES
(1, 10, 'B6135 / B6136', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 'Sample Concern', NULL, '2019-12-19 01:52:18', 0),
(2, 10, 'B6135 / B6136', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', '', '', '2019-12-19 01:54:39', 0),
(5, 27, 'B6135 / B6136', 'This is a sample remarks for temporary parking', 'This is a sample other concern', '27-OTHERCONCERN.png', '2019-12-20 09:18:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ticket_notes`
--

CREATE TABLE `tbl_ticket_notes` (
  `id` int(11) NOT NULL,
  `ticket_number` varchar(255) NOT NULL,
  `view_status` int(11) NOT NULL,
  `team_huddle` int(11) NOT NULL,
  `note` longtext NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ticket_notes`
--

INSERT INTO `tbl_ticket_notes` (`id`, `ticket_number`, `view_status`, `team_huddle`, `note`, `attachment`, `created_by`, `date_created`) VALUES
(17, 'TEM-2019-00001', 0, 0, 'TEST NOTE', 'TEM-2019-00001_-NOTE1.png', 14, '2019-12-18 07:26:29'),
(18, 'TEM-2019-00001', 0, 0, 'THIS IS A SAMPLE', '', 14, '2019-12-18 07:29:29'),
(19, 'TEM-2019-00001\r\n', 0, 0, 'sample', 'TEM-2019-00001_-NOTE1.jpg', 7, '2019-12-18 07:50:01'),
(20, 'BCR-2019-00008\r\n', 0, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'BCR-2019-00008_-NOTE.png', 7, '2019-12-20 03:14:59'),
(21, 'TEM-2019-00001', 0, 7, 'This is a sample note note note', '', 8, '2019-12-20 05:15:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_turnover_schedule`
--

CREATE TABLE `tbl_turnover_schedule` (
  `id` int(11) NOT NULL,
  `customer_number` int(11) NOT NULL,
  `ticket_number` varchar(255) NOT NULL,
  `schedule` datetime NOT NULL,
  `assigned_to` int(11) NOT NULL,
  `sequence` int(11) NOT NULL DEFAULT '1',
  `show_status` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_turnover_schedule`
--

INSERT INTO `tbl_turnover_schedule` (`id`, `customer_number`, `ticket_number`, `schedule`, `assigned_to`, `sequence`, `show_status`, `status`, `date_created`) VALUES
(89, 12345, 'TEM-2019-00001', '2019-11-21 11:00:00', 14, 1, 1, 0, '2019-11-26 02:52:35'),
(90, 55555, 'TEM-2019-00001', '2019-11-21 11:00:00', 14, 1, 1, 0, '2019-11-26 02:52:35'),
(91, 80808, 'TEM-2019-00001', '2019-11-21 11:00:00', 14, 1, 1, 0, '2019-11-26 02:52:35'),
(92, 12345, 'TEM-2019-00002\n', '2019-11-08 11:00:00', 14, 1, 0, 0, '2019-11-26 06:02:39'),
(93, 12345, 'TEM-2019-00002\n', '2019-11-08 11:00:00', 16, 2, 0, 0, '2019-11-26 06:02:55'),
(94, 12345, 'TEM-2019-00002\n', '2019-11-08 11:00:00', 0, 3, 0, 0, '2019-11-26 06:03:10'),
(95, 12345, 'TEM-2019-00003\n', '2019-11-20 11:00:00', 16, 1, 0, 0, '2019-11-27 02:02:42'),
(96, 55555, 'TEM-2019-00003\n', '2019-11-20 11:00:00', 16, 1, 0, 0, '2019-11-27 02:02:42'),
(97, 80808, 'TEM-2019-00003\n', '2019-11-20 11:00:00', 16, 1, 0, 0, '2019-11-27 02:02:43'),
(98, 12345, 'TEM-2019-00004\n', '2019-11-06 09:00:00', 16, 1, 0, 0, '2019-11-27 02:04:25'),
(99, 12345, 'TEM-2019-00005\n', '2019-11-05 14:00:00', 14, 1, 0, 0, '2019-11-27 02:04:49'),
(100, 12345, 'TEM-2019-00006\n', '2019-11-05 09:00:00', 14, 1, 0, 0, '2019-11-27 02:05:37'),
(101, 12345, 'TEM-2019-00007\n', '2019-11-04 09:00:00', 14, 1, 0, 0, '2019-11-27 02:06:01'),
(126, 136478, 'BCR-2019-00009\n', '2019-12-04 11:00:00', 14, 1, 0, 0, '2019-12-20 03:08:17'),
(139, 136517, 'BCR-2019-00011', '2019-12-19 11:00:00', 14, 1, 0, 0, '2019-12-20 06:18:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_units`
--

CREATE TABLE `tbl_units` (
  `id` int(11) NOT NULL,
  `project` varchar(255) NOT NULL,
  `runitid` varchar(255) NOT NULL,
  `unit_number` varchar(255) NOT NULL,
  `unit_desc` varchar(255) NOT NULL,
  `unit_type` varchar(255) NOT NULL,
  `floor_area` varchar(255) NOT NULL,
  `parking_number` varchar(255) NOT NULL,
  `parking_floor_area` varchar(255) NOT NULL,
  `tower` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_units`
--

INSERT INTO `tbl_units` (`id`, `project`, `runitid`, `unit_number`, `unit_desc`, `unit_type`, `floor_area`, `parking_number`, `parking_floor_area`, `tower`, `status`) VALUES
(1, 'BCR', '00000001', '8', 'A', 'CON-101', '176.5', 'B6135 / B6136', '180.0', '1', 1),
(2, 'TEM', '00000002', '8', 'B', 'CON-101', '', 'B6053 / B6054 / B6055', '', '1', 1),
(3, 'BCR', '00000003', '8', 'C', 'CON-101', '190.0', 'B6123 / B6124', '', '1', 10),
(4, 'TEM', '00000004', '8', 'D', 'CON-101', '', 'B6046 / B6047 / B6048', '', '1', 2),
(5, 'BCR', '00000005', '8', 'E', 'CON-101', '', 'B6003 / B6004', '', '1', 1),
(6, 'TEM', '00000006', '8', 'F', 'CON-101', '', 'B6030 / B6031 / B6032', '', '1', 1),
(7, 'TEM', '00000007', '8', 'G', 'CON-101', '', 'B6001 / B6002', '', '1', 1),
(8, 'TEM', '00000008', '8', 'H', 'CON-101', '', 'B6048 / B6049 / B6050', '', '1', 5),
(9, 'TEM', '00000009', '9', 'A', 'CON-101', '', 'B5065 / B5066', '', '1', 1),
(10, 'TEM', '00000010', '9', 'B', 'CON-101', '', 'B4058 / B4059 / B4060', '', '1', 5),
(11, 'TEM', '00000011', '9', 'C', 'CON-101', '', 'B6097 / B6098', '', '1', 11),
(12, 'TEM', '00000012', '9', 'D', 'CON-101', '', 'B6068 / B6069 / B6070', '', '1', 1),
(13, 'TEM', '00000013', '9', 'E', 'CON-101', '', 'B6099 / B6100', '', '1', 2),
(14, 'TEM', '00000014', '9', 'F', 'CON-101', '', 'B6018 / B6019 / B6020', '', '1', 7),
(15, 'TEM', '00000015', '9', 'G', 'CON-101', '', 'B6089 / B6090', '', '1', 5),
(16, 'TEM', '00000016', '9', 'H', 'CON-101', '', 'B5107 / B5108 / B5109', '', '1', 1),
(17, 'TEM', '00000017', '10', 'A', 'CON-101', '', 'B6010 / B6011', '', '1', 1),
(18, 'TEM', '00000018', '10', 'B', 'CON-101', '', 'B5101 / B5102 / B5103', '', '1', 2),
(19, 'TEM', '00000019', '10', 'C', 'CON-101', '', 'B6083 / B6084', '', '1', 4),
(20, 'TEM', '00000020', '10', 'D', 'CON-101', '', 'B5038 / B5039 / B5040', '', '1', 1),
(21, 'TEM', '00000021', '10', 'E', 'CON-101', '', 'B6051 / B6052', '', '1', 12),
(22, 'TEM', '00000022', '10', 'F', 'CON-101', '', 'B5021 / B5022 / B5023', '', '1', 1),
(23, 'TEM', '00000023', '10', 'G', 'CON-101', '', 'B5003 / B5004', '', '1', 1),
(24, 'TEM', '00000024', '10', 'H', 'CON-101', '', 'B4048 / B4049 / B4050', '', '1', 1),
(25, 'TEM', '00000025', '11', 'A', 'CON-101', '', 'B6056 / B6057', '', '1', 1),
(26, 'TEM', '00000026', '11', 'B', 'CON-101', '', 'B5024 / B5025 / B5026', '', '1', 1),
(27, 'TEM', '00000027', '11', 'C', 'CON-101', '', 'B6077 / B6078', '', '1', 7),
(28, 'TEM', '00000028', '11', 'D', 'CON-101', '', 'B4122 / B4123 / B4124', '', '1', 9),
(29, 'TEM', '00000029', '11', 'E', 'CON-101', '', 'B6061 / B6062', '', '1', 5),
(30, 'TEM', '00000030', '11', 'F', 'CON-101', '', 'B4119 / B4120 / B4121', '', '1', 5),
(31, 'TEM', '00000031', '11', 'G', 'CON-101', '', 'B6071 / B6072', '', '1', 1),
(32, 'TEM', '00000032', '11', 'H', 'CON-101', '', 'B4035 / B4036 / B4037', '', '1', 1),
(33, 'TEM', '00000033', '12', 'A', 'CON-101', '', 'B6093 / B6094', '', '1', 4),
(34, 'TEM', '00000034', '12', 'B', 'CON-101', '', 'B5119 / B5120 / B5121', '', '1', 1),
(35, 'TEM', '00000035', '12', 'C', 'CON-101', '', 'B6095 / B6096', '', '1', 6),
(36, 'TEM', '00000036', '12', 'D', 'CON-101', '', 'B5005 / B5006 / B5007', '', '1', 1),
(37, 'TEM', '00000037', '12', 'E', 'CON-101', '', 'B5115 / B5116 / B3055', '', '1', 7),
(38, 'TEM', '00000038', '12', 'F', 'CON-101', '', 'B4041 / B4042 / B4125 / B4126', '', '1', 1),
(39, 'TEM', '00000039', '12', 'G', 'CON-101', '', 'B6105 / B6106 / B6107', '', '1', 11),
(40, 'TEM', '00000040', '12', 'H', 'CON-101', '', 'B4008 / B4009 / B4010 / B4011', '', '1', 12),
(41, 'TEM', '00000041', '15', 'A', 'CON-101', '', 'B6129 / B6130 / B6131', '', '1', 13),
(42, 'TEM', '00000042', '15', 'B', 'CON-101', '', 'B2022 / B2023 / B2024 / B2025', '', '1', 1),
(43, 'TEM', '00000043', '15', 'C', 'CON-101', '', 'B5091 / B5092 / B3053', '', '1', 1),
(44, 'TEM', '00000044', '15', 'D', 'CON-101', '', 'B4001 / B4002 / B4003 / B4004', '', '1', 1),
(45, 'TEM', '00000045', '15', 'E', 'CON-101', '', 'B6027 / B6028 / B6029', '', '1', 7),
(46, 'TEM', '00000046', '15', 'F', 'CON-101', '', 'B4081 / B4082 / B4083 / B4084', '', '1', 1),
(47, 'TEM', '00000047', '15', 'G', 'CON-101', '', 'B5127 / B5128 / B3051', '', '1', 3),
(48, 'TEM', '00000048', '15', 'H', 'CON-101', '', 'B4085 / B4086 / B4087 / B4088', '', '1', 1),
(49, 'TEM', '00000049', '16', 'A', 'CON-101', '', 'B6039 / B6040 / B6041', '', '1', 2),
(50, 'TEM', '00000050', '16', 'B', 'CON-101', '', 'B4065 / B4066 / B4067 / B4068', '', '1', 1),
(51, 'TEM', '00000051', '16', 'C', 'CON-101', '', 'B5087 / B5088 / B3049', '', '1', 1),
(52, 'TEM', '00000052', '16', 'D', 'CON-101', '', 'B4069 / B4070 / B4071 / B4072', '', '1', 1),
(53, 'TEM', '00000053', '16', 'E', 'CON-101', '', 'B5110 / B5111 / B5112', '', '1', 1),
(54, 'TEM', '00000054', '16', 'F', 'CON-101', '', 'B3067 / B3068 / B3070 / B3071', '', '1', 1),
(55, 'TEM', '00000055', '16', 'G', 'CON-101', '', 'B5083 / B5084 / B3047', '', '1', 1),
(56, 'TEM', '00000056', '16', 'H', 'CON-101', '', 'B4051 / B4052 / B4053 / B4054', '', '1', 6),
(57, 'TEM', '00000057', '17', 'A', 'CON-101', '', 'B5012 / B5013 / B5014', '', '1', 5),
(58, 'TEM', '00000058', '17', 'B', 'CON-101', '', 'B3001 / B3002 / B3003 / B3004', '', '1', 1),
(59, 'TEM', '00000059', '17', 'C', 'CON-101', '', 'B4024 / B4025 / B4026', '', '1', 1),
(60, 'TEM', '00000060', '17', 'D', 'CON-101', '', 'B1043 / B1044 / B1045 / B1046', '', '1', 4),
(61, 'TEM', '00000061', '17', 'E', 'CON-101', '', 'B5079 / B5080 / B3045', '', '1', 1),
(62, 'TEM', '00000062', '17', 'F', 'CON-101', '', 'B3063 / B3064 / B3065 / B3066', '', '1', 1),
(63, 'TEM', '00000063', '17', 'G', 'CON-101', '', 'B5018 / B5019 / B5020', '', '1', 9),
(64, 'TEM', '00000064', '17', 'H', 'CON-101', '', 'B3059 / B3060 / B3061 / B3062', '', '1', 1),
(65, 'TEM', '00000065', '18', 'A', 'CON-101', '', 'B5075 / B5076 / B2055', '', '1', 3),
(66, 'TEM', '00000066', '18', 'B', 'CON-101', '', 'B3009 / B3010 / B3011 / B3012', '', '1', 2),
(67, 'TEM', '00000067', '18', 'C', 'CON-101', '', 'B5048 / B5049 / B5050', '', '1', 2),
(68, 'TEM', '00000068', '18', 'D', 'CON-101', '', 'B3039 / B3040 / B3057 / B3058', '', '1', 3),
(69, 'TEM', '00000069', '18', 'E', 'CON-101', '', 'B5071 / B5072 / B2053', '', '1', 1),
(70, 'TEM', '00000070', '18', 'F', 'CON-101', '', 'B3041 / B3042 / B3043 / B3044', '', '1', 10),
(71, 'TEM', '00000071', '18', 'G', 'CON-101', '', 'B4107 / B4108 / B4109', '', '1', 1),
(72, 'TEM', '00000072', '18', 'H', 'CON-101', '', 'B2067 / B2068 / B2070 / B2071', '', '1', 11),
(73, 'TEM', '00000073', '19', 'A', 'CON-101', '', 'B5067 / B5068 / B2051', '', '1', 12),
(74, 'TEM', '00000074', '19', 'B', 'CON-101', '', 'B3031 / B3032 / B3033 / B3034', '', '1', 1),
(75, 'TEM', '00000075', '19', 'C', 'CON-101', '', 'B4012 / B4013 / B4014', '', '1', 15),
(76, 'TEM', '00000076', '19', 'D', 'CON-101', '', 'B2020 / B2021 / B2077 / B2078', '', '1', 1),
(77, 'TEM', '00000077', '19', 'E', 'CON-101', '', 'B6111 / B6112 / B6113', '', '1', 1),
(78, 'TEM', '00000078', '19', 'F', 'CON-101', '', 'B1047 / B1048 / B1049 / B1050', '', '1', 1),
(79, 'TEM', '00000079', '19', 'G', 'CON-101', '', 'B5061 / B5062 / B2049', '', '1', 1),
(80, 'TEM', '00000080', '19', 'H', 'CON-101', '', 'B2063 / B2064 / B2065 / B2066', '', '1', 1),
(81, 'TEM', '00000081', '20', 'A', 'CON-101', '', 'B4101 / B4102 / B4103', '', '1', 1),
(82, 'TEM', '00000082', '20', 'B', 'CON-101', '', 'B2041 / B2042 / B2043 / B2044', '', '1', 1),
(83, 'TEM', '00000083', '20', 'C', 'CON-101', '', 'B6117 / B6118 / B6119', '', '1', 1),
(84, 'TEM', '00000084', '20', 'D', 'CON-101', '', 'B2045 / B2046 / B2047 / B2048', '', '1', 1),
(85, 'TEM', '00000085', '20', 'E', 'CON-101', '', 'B4043 / B4044 / B4045', '', '1', 1),
(86, 'TEM', '00000086', '20', 'F', 'CON-101', '', 'B2035 / B2036 / B2037 / B2038', '', '1', 1),
(87, 'TEM', '00000087', '20', 'G', 'CON-101', '', 'B4095 / B4096 / B4097', '', '1', 1),
(88, 'TEM', '00000088', '20', 'H', 'CON-101', '', 'B2031 / B2032 / B2033 / B2034', '', '1', 1),
(89, 'TEM', '00000089', '21', 'A', 'CON-101', '', 'B6120 / B6121 / B6122', '', '1', 1),
(90, 'TEM', '00000090', '21', 'B', 'CON-101', '', 'B2059 / B2060 / B2061 / B2062', '', '1', 1),
(91, 'TEM', '00000091', '21', 'C', 'CON-101', '', 'B1022 / B1023 / B1024 / B1025', '', '1', 1),
(92, 'TEM', '00000092', '21', 'D', 'CON-101', '', 'B1014 / B1015 / B1016 / B1017', '', '1', 1),
(93, 'TEM', '00000093', '21', 'E', 'CON-101', '', 'B1056 / B1057 / B1058 / B1059 / B1060 / B1061', '', '1', 1),
(94, 'TEM', '00000094', '21', 'F', 'CON-101', '', 'B1030 / B1031 / B1032 / B1033 / B1034 / B1035', '', '1', 1),
(95, 'TEM', '00000095', '21', 'G', 'CON-101', '', 'B6125 / B6126', '', '1', 1),
(96, 'TEM', '00000096', '21', 'H', 'CON-101', '', 'B6021 / B6022 / B6023', '', '1', 1),
(97, 'TEM', '00000097', '22', 'A', 'CON-101', '', 'B6127 / B6128', '', '1', 1),
(98, 'TEM', '00000098', '22', 'B', 'CON-101', '', 'B6042 / B6043 / B6044', '', '1', 1),
(99, 'TEM', '00000099', '22', 'C', 'CON-101', '', 'B6139 / B6140', '', '1', 1),
(100, 'TEM', '00000100', '22', 'D', 'CON-101', '', 'B6058 / B6059 / B6060', '', '1', 1),
(101, 'TEM', '00000101', '22', 'E', 'CON-101', '', 'B6137 / B6138', '', '1', 1),
(102, 'TEM', '00000102', '22', 'F', 'CON-101', '', 'B6012 / B6013 / B6014', '', '1', 1),
(103, 'TEM', '00000103', '22', 'G', 'CON-101', '', 'B5010 / B5011', '', '1', 1),
(104, 'TEM', '00000104', '22', 'H', 'CON-101', '', 'B4110 / B4111 / B4112', '', '1', 1),
(105, 'TEM', '00000105', '23', 'A', 'CON-101', '', 'B6101 / B6102', '', '1', 1),
(106, 'TEM', '00000106', '23', 'B', 'CON-101', '', 'B6036 / B6037 / B6038', '', '1', 1),
(107, 'TEM', '00000107', '23', 'C', 'CON-101', '', 'B6103 / B6104', '', '1', 1),
(108, 'TEM', '00000108', '23', 'D', 'CON-101', '', 'B6015 / B6016 / B6017', '', '1', 1),
(109, 'TEM', '00000109', '23', 'E', 'CON-101', '', 'B6008 / B6009', '', '1', 1),
(110, 'TEM', '00000110', '23', 'F', 'CON-101', '', 'B5122 / B5123 / B5124', '', '1', 1),
(111, 'TEM', '00000111', '23', 'G', 'CON-101', '', 'B6091 / B6092', '', '1', 1),
(112, 'TEM', '00000112', '23', 'H', 'CON-101', '', 'B5035 / B5036 / B5037', '', '1', 1),
(113, 'TEM', '00000113', '25', 'A', 'CON-101', '', 'B6085 / B6086', '', '1', 1),
(114, 'TEM', '00000114', '25', 'B', 'CON-101', '', 'B5032 / B5033 / B5034', '', '1', 1),
(115, 'TEM', '00000115', '25', 'C', 'CON-101', '', 'B6087 / B6088', '', '1', 1),
(116, 'TEM', '00000116', '25', 'D', 'CON-101', '', 'B5015 / B5016 / B5017', '', '1', 1),
(117, 'TEM', '00000117', '25', 'E', 'CON-101', '', 'B6079 / B6080', '', '1', 1),
(118, 'TEM', '00000118', '25', 'F', 'CON-101', '', 'B5095 / B5096 / B5097', '', '1', 1),
(119, 'TEM', '00000119', '25', 'G', 'CON-101', '', 'B6081 / B6082', '', '1', 1),
(120, 'TEM', '00000120', '25', 'H', 'CON-101', '', 'B5027 / B5028 / B5029', '', '1', 1),
(121, 'TEM', '00000121', '26', 'A', 'CON-101', '', 'B5008 / B5009', '', '1', 1),
(122, 'TEM', '00000122', '26', 'B', 'CON-101', '', 'B4027 / B4028 / B4029', '', '1', 1),
(123, 'TEM', '00000123', '26', 'C', 'CON-101', '', 'B6073 / B6074', '', '1', 1),
(124, 'TEM', '00000124', '26', 'D', 'CON-101', '', 'B5058 / B5059 / B5060', '', '1', 1),
(125, 'TEM', '00000125', '27', 'A', 'CON-101', '', 'B6075 / B6076', '', '1', 1),
(126, 'TEM', '00000126', '27', 'B', 'CON-101', '', 'B4005 / B4006 / B4007', '', '1', 1),
(127, 'TEM', '00000127', '27', 'C', 'CON-101', '', 'B5001 / B5002', '', '1', 1),
(128, 'TEM', '00000128', '27', 'D', 'CON-101', '', 'B4104 / B4105 / B4106', '', '1', 1),
(129, 'TEM', '00000129', '28', 'A', 'CON-101', '', 'B6063 / B6064', '', '1', 1),
(130, 'TEM', '00000130', '28', 'B', 'CON-101', '', 'B4038 / B4039 / B4040', '', '1', 1),
(131, 'TEM', '00000131', '28', 'C', 'CON-101', '', 'B5117 / B5118 / B3056', '', '1', 1),
(132, 'TEM', '00000132', '28', 'D', 'CON-101', '', 'B5051 / B5052 / B5053 / B5054', '', '1', 1),
(133, 'TEM', '00000133', '29', 'A', 'CON-101', '', 'B6108 / B6109 / B6110', '', '1', 1),
(134, 'TEM', '00000134', '29', 'B', 'CON-101', '', 'B4115 / B4116 / B4117 / B4118', '', '1', 1),
(135, 'TEM', '00000135', '29', 'C', 'CON-101', '', 'B4018 / B4019 / B4020', '', '1', 1),
(136, 'TEM', '00000136', '29', 'D', 'CON-101', '', 'B2013 / B2014 / B2015 / B2016', '', '1', 1),
(137, 'TEM', '00000137', '30', 'A', 'CON-101', '', 'B5093 / B5094 / B3054', '', '1', 1),
(138, 'TEM', '00000138', '30', 'B', 'CON-101', '', 'B4127 / B4128 / B4129 / B4130', '', '1', 1),
(139, 'TEM', '00000139', '30', 'C', 'CON-101', '', 'B6024 / B6025 / B6026', '', '1', 1),
(140, 'TEM', '00000140', '30', 'D', 'CON-101', '', 'B4089 / B4090 / B4091 / B4092', '', '1', 1),
(141, 'TEM', '00000141', '31', 'A', 'CON-101', '', 'B5089 / B5090 / B3052', '', '1', 1),
(142, 'TEM', '00000142', '31', 'B', 'CON-101', '', 'B4093 / B4094 / B4113 / B4114', '', '1', 1),
(143, 'TEM', '00000143', '31', 'C', 'CON-101', '', 'B6033 / B6034 / B6035', '', '1', 1),
(144, 'TEM', '00000144', '31', 'D', 'CON-101', '', 'B4073 / B4074 / B4075 / B4076', '', '1', 1),
(145, 'TEM', '00000145', '32', 'A', 'CON-101', '', 'B5129 / B5130 / B3050', '', '1', 1),
(146, 'TEM', '00000146', '32', 'B', 'CON-101', '', 'B4077 / B4078 / B4079 / B4080', '', '1', 1),
(147, 'TEM', '00000147', '32', 'C', 'CON-101', '', 'B6065 / B6066 / B6067', '', '1', 1),
(148, 'TEM', '00000148', '32', 'D', 'CON-101', '', 'B4061 / B4062 / B4063 / B4064', '', '1', 1),
(149, 'TEM', '00000149', '33', 'A', 'CON-101', '', 'B5085 / B5086 / B3048', '', '1', 1),
(150, 'TEM', '00000150', '33', 'B', 'CON-101', '', 'B4030 / B4031 / B4046 / B4047', '', '1', 1),
(151, 'TEM', '00000151', '33', 'C', 'CON-101', '', 'B5104 / B5105 / B5106', '', '1', 1),
(152, 'TEM', '00000152', '33', 'D', 'CON-101', '', 'B3072 / B3073 / B3074 / B3075', '', '1', 1),
(153, 'TEM', '00000153', '35', 'A', 'CON-101', '', 'B6005 / B6006 / B6007', '', '1', 1),
(154, 'TEM', '00000154', '35', 'B', 'CON-101', '', 'B1052 / B1053 / B1054 / B1055', '', '1', 1),
(155, 'TEM', '00000155', '35', 'C', 'CON-101', '', 'B5081 / B5082 / B3046', '', '1', 1),
(156, 'TEM', '00000156', '35', 'D', 'CON-101', '', 'B3020 / B3021 / B3077 / B3078', '', '1', 1),
(157, 'TEM', '00000157', '36', 'A', 'CON-101', '', 'B5098 / B5099 / B5100', '', '1', 1),
(158, 'TEM', '00000158', '36', 'B', 'CON-101', '', 'B3022 / B3023 / B3024 / B3025', '', '1', 1),
(159, 'TEM', '00000159', '36', 'C', 'CON-101', '', 'B5077 / B5078 / B2056', '', '1', 1),
(160, 'TEM', '00000160', '36', 'D', 'CON-101', '', 'B3005 / B3006 / B3007 / B3008', '', '1', 1),
(161, 'TEM', '00000161', '37', 'A', 'CON-101', '', 'B5043 / B5044 / B5045', '', '1', 1),
(162, 'TEM', '00000162', '37', 'B', 'CON-101', '', 'B3027 / B3028 / B3029 / B3030', '', '1', 1),
(163, 'TEM', '00000163', '37', 'C', 'CON-101', '', 'B5073 / B5074 / B2054', '', '1', 1),
(164, 'TEM', '00000164', '37', 'D', 'CON-101', '', 'B3013 / B3014 / B3015 / B3016', '', '1', 1),
(165, 'TEM', '00000165', '38', 'A', 'CON-101', '', 'B5055 / B5056 / B5057', '', '1', 1),
(166, 'TEM', '00000166', '38', 'B', 'CON-101', '', 'B3035 / B3036 / B3037 / B3038', '', '1', 1),
(167, 'TEM', '00000167', '38', 'C', 'CON-101', '', 'B5069 / B5070 / B2052', '', '1', 1),
(168, 'TEM', '00000168', '38', 'D', 'CON-101', '', 'B3017 / B3018 / B3019 / B3026', '', '1', 1),
(169, 'TEM', '00000169', '39', 'A', 'CON-101', '', 'B4032 / B4033 / B4034', '', '1', 1),
(170, 'TEM', '00000170', '39', 'B', 'CON-101', '', 'B2072 / B2073 / B2074 / B2075', '', '1', 1),
(171, 'TEM', '00000171', '40', 'A', 'CON-101', '', 'B4055 / B4056 / B4057', '', '1', 1),
(172, 'TEM', '00000172', '40', 'B', 'CON-101', '', 'B1010 / B1011 / B1012 / B1013', '', '1', 1),
(173, 'TEM', '00000173', '41', 'A', 'CON-101', '', 'B5063 / B5064 / B2050', '', '1', 1),
(174, 'TEM', '00000174', '41', 'B', 'CON-101', '', 'B2001 / B2002 / B2003 / B2004', '', '1', 1),
(175, 'TEM', '00000175', '42', 'A', 'CON-101', '', 'B4015 / B4016 / B4017', '', '1', 1),
(176, 'TEM', '00000176', '42', 'B', 'CON-101', '', 'B2009 / B2010 / B2011 / B2012', '', '1', 1),
(177, 'TEM', '00000177', '45', 'A', 'CON-101', '', 'B6132 / B6133 / B6134', '', '1', 1),
(178, 'TEM', '00000178', '45', 'B', 'CON-101', '', 'B2005 / B2006 / B2007 / B2008', '', '1', 1),
(179, 'TEM', '00000179', '46', 'A', 'CON-101', '', 'B4098 / B4099 / B4100', '', '1', 1),
(180, 'TEM', '00000180', '46', 'B', 'CON-101', '', 'B2039 / B2040 / B2057 / B2058', '', '1', 1),
(181, 'TEM', '00000181', '47', 'A', 'CON-101', '', 'B6114 / B6115 / B6116', '', '1', 1),
(182, 'TEM', '00000182', '47', 'B', 'CON-101', '', 'B2027 / B2028 / B2029 / B2030', '', '1', 1),
(183, 'TEM', '00000183', '48', 'A', 'CON-101', '', 'B4021 / B4022 / B4023', '', '1', 1),
(184, 'TEM', '00000184', '48', 'B', 'CON-101', '', 'B2017 / B2018 / B2019 / B2026', '', '1', 1),
(185, 'TEM', '00000185', '49', 'A', 'CON-101', '', 'B1026 / B1027 / B1028 / B1029', '', '1', 1),
(186, 'TEM', '00000186', '49', 'B', 'CON-101', '', 'B1018 / B1019 / B1020 / B1021', '', '1', 1),
(187, 'TEM', '00000187', '50', 'A', 'CON-101', '', 'B1036 / B1037 / B1038 / B1039 / B1040 / B1041', '', '1', 1),
(188, 'TEM', '00000188', '50', 'B', 'CON-101', '', 'B1001 / B1002 / B1003 / B1004 / B1005 / B1006', '', '1', 1),
(189, 'ST', '00000001', '1', 'A', 'CON-101', '', 'B6135 / B6136', '', '1', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_unit_type`
--

CREATE TABLE `tbl_unit_type` (
  `id` int(11) NOT NULL,
  `unit_type_code` varchar(255) DEFAULT NULL,
  `unit_type` varchar(255) NOT NULL,
  `unit_type_abbreviation` varchar(255) DEFAULT NULL,
  `status` tinyint(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_unit_type`
--

INSERT INTO `tbl_unit_type` (`id`, `unit_type_code`, `unit_type`, `unit_type_abbreviation`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(109, 'CON-101', 'One Bedroom', '1B', 0, '2019-12-17 23:04:27', '0000-00-00 00:00:00', NULL),
(110, 'CON-102', 'One Bedroom Loft', '1B-L', 0, '2019-12-17 23:04:27', '0000-00-00 00:00:00', NULL),
(111, 'CON-103', 'One Bedroom Penthouse', '1B-P', 0, '2019-12-17 23:04:27', '0000-00-00 00:00:00', NULL),
(112, 'CON-104', 'One Bedroom Garden', '1B-G', 0, '2019-12-17 23:04:27', '0000-00-00 00:00:00', NULL),
(113, 'CON-105', 'One Bedroom Deluxe', '1B-D', 0, '2019-12-17 23:04:27', '0000-00-00 00:00:00', NULL),
(114, 'CON-106', 'One Bedroom Combo (2BR)', '1BC-2B', 0, '2019-12-17 23:04:27', '0000-00-00 00:00:00', NULL),
(115, 'CON-107', 'One Bedroom Combo (Jr. 2BR)', '1BC-J2B', 0, '2019-12-17 23:04:27', '0000-00-00 00:00:00', NULL),
(116, 'CON-108', 'One Bedroom Suite', '1B-S', 0, '2019-12-17 23:04:27', '0000-00-00 00:00:00', NULL),
(117, 'CON-109', 'Executive One Bedroom Garden', '1B-EG', 0, '2019-12-17 23:04:27', '0000-00-00 00:00:00', NULL),
(118, 'CON-110', 'Executive One Bedroom corner Garden', '1B-ECG', 0, '2019-12-17 23:04:27', '0000-00-00 00:00:00', NULL),
(119, 'CON-111', 'One Bedroom with Balcony', '', 0, '2019-12-17 23:04:27', '0000-00-00 00:00:00', NULL),
(120, 'CON-112', 'One Bedroom Adjacent', '', 0, '2019-12-17 23:04:27', '0000-00-00 00:00:00', NULL),
(121, 'CON-113', 'One Bedroom with Lanai', '', 0, '2019-12-17 23:04:27', '0000-00-00 00:00:00', NULL),
(122, 'CON-114', 'One Bedroom Corner with Balcony', '', 0, '2019-12-17 23:04:27', '0000-00-00 00:00:00', NULL),
(123, 'CON-115', 'One Bedroom Premiere', '', 0, '2019-12-17 23:04:27', '0000-00-00 00:00:00', NULL),
(124, 'CON-201', 'Two BedroomSSSSSSS', '2B', 0, '2019-12-17 23:04:27', '0000-00-00 00:00:00', NULL),
(125, 'CON-202', 'Two Bedroom Loft', '2B-L', 0, '2019-12-17 23:04:27', '0000-00-00 00:00:00', NULL),
(126, 'CON-203', 'Two Bedroom Penthouse', '2B-P', 0, '2019-12-17 23:04:28', '0000-00-00 00:00:00', NULL),
(127, 'CON-204', 'Two Bedroom Bi-Level', '2B-BL', 0, '2019-12-17 23:04:28', '0000-00-00 00:00:00', NULL),
(128, 'CON-205', 'Two Bedroom Bi-Level Garden', '2B-BLG', 0, '2019-12-17 23:04:28', '0000-00-00 00:00:00', NULL),
(129, 'CON-206', 'Two Bedroom Garden', '2B-G', 0, '2019-12-17 23:04:28', '0000-00-00 00:00:00', NULL),
(130, 'CON-207', 'Two Bedroom Deluxe', '2B-D', 0, '2019-12-17 23:04:28', '0000-00-00 00:00:00', NULL),
(131, 'CON-208', 'Jr. Two Bedroom', 'J2B', 0, '2019-12-17 23:04:28', '0000-00-00 00:00:00', NULL),
(132, 'CON-209', 'Jr. Two Bedroom Combo (3BR)', 'J2BC-3B', 0, '2019-12-17 23:04:28', '0000-00-00 00:00:00', NULL),
(133, 'CON-210', 'Two Bedroom with Balcony', '2B-BAL', 0, '2019-12-17 23:04:28', '0000-00-00 00:00:00', NULL),
(134, 'CON-211', 'Two Bedroom Suite', '2B-S', 0, '2019-12-17 23:04:28', '0000-00-00 00:00:00', NULL),
(135, 'CON-212', 'Executive Two Bedroom', '2B-E', 0, '2019-12-17 23:04:28', '0000-00-00 00:00:00', NULL),
(136, 'CON-213', 'Two Bedroom Villa', '2B-V', 0, '2019-12-17 23:04:28', '0000-00-00 00:00:00', NULL),
(137, 'CON-214', 'Two Bedroom Combo', '2B-COMB', 0, '2019-12-17 23:04:28', '0000-00-00 00:00:00', NULL),
(138, 'CON-215', 'Two Bedroom Adjacent', '', 0, '2019-12-17 23:04:28', '0000-00-00 00:00:00', NULL),
(139, 'CON-216', 'Two Bedroom with Lanai', '', 0, '2019-12-17 23:04:28', '0000-00-00 00:00:00', NULL),
(140, 'CON-217', '2 Bedroom / 1 Parking', '', 0, '2019-12-17 23:04:28', '0000-00-00 00:00:00', NULL),
(141, 'CON-218', 'Two Bedroom Deluxe/ One Parking', '', 0, '2019-12-17 23:04:28', '0000-00-00 00:00:00', NULL),
(142, 'CON-301', 'Three Bedroom', '3B', 0, '2019-12-17 23:04:28', '0000-00-00 00:00:00', NULL),
(143, 'CON-302', 'Three Bedroom Loft', '3B-L', 0, '2019-12-17 23:04:28', '0000-00-00 00:00:00', NULL),
(144, 'CON-303', 'Three Bedroom Penthouse', '3B-P', 0, '2019-12-17 23:04:28', '0000-00-00 00:00:00', NULL),
(145, 'CON-304', 'Three Bedroom Bi-Level', '3B-BL', 0, '2019-12-17 23:04:28', '0000-00-00 00:00:00', NULL),
(146, 'CON-305', 'Three Bedroom Bi-Level Garden', '3B-BLG', 0, '2019-12-17 23:04:28', '0000-00-00 00:00:00', NULL),
(147, 'CON-306', 'Three Bedroom Garden', '3B-G', 0, '2019-12-17 23:04:28', '0000-00-00 00:00:00', NULL),
(148, 'CON-307', 'Three Bedroom Deluxe', '3B-D', 0, '2019-12-17 23:04:28', '0000-00-00 00:00:00', NULL),
(149, 'CON-308', 'Three Bedroom with Balcony', '3B-BAL', 0, '2019-12-17 23:04:28', '0000-00-00 00:00:00', NULL),
(150, 'CON-309', 'Executive Three Bedroom', '3B-E', 0, '2019-12-17 23:04:29', '0000-00-00 00:00:00', NULL),
(151, 'CON-310', 'Three Bedroom Suite', '3B-S', 0, '2019-12-17 23:04:29', '0000-00-00 00:00:00', NULL),
(152, 'CON-311', 'Three Bedroom Villa', '3B-V', 0, '2019-12-17 23:04:29', '0000-00-00 00:00:00', NULL),
(153, 'CON-312', 'Three Bedroom Combo', '3B-COMB', 0, '2019-12-17 23:04:29', '0000-00-00 00:00:00', NULL),
(154, 'CON-313', 'Three Bedroom (with den)', '', 0, '2019-12-17 23:04:29', '0000-00-00 00:00:00', NULL),
(155, 'CON-314', 'Three Bedroom (with den & private garden', '', 0, '2019-12-17 23:04:29', '0000-00-00 00:00:00', NULL),
(156, 'CON-315', '3 Bedroom / 1 Parking', '', 0, '2019-12-17 23:04:29', '0000-00-00 00:00:00', NULL),
(157, 'CON-401', 'Four Bedroom', '4B', 0, '2019-12-17 23:04:29', '0000-00-00 00:00:00', NULL),
(158, 'CON-402', 'Four Bedroom Loft', '4B-L', 0, '2019-12-17 23:04:29', '0000-00-00 00:00:00', NULL),
(159, 'CON-403', 'Four Bedroom Penthouse', '4B-P', 0, '2019-12-17 23:04:29', '0000-00-00 00:00:00', NULL),
(160, 'CON-404', 'Four Bedroom Bi-Level', '4B-BL', 0, '2019-12-17 23:04:29', '0000-00-00 00:00:00', NULL),
(161, 'CON-405', 'Four Bedroom Bi-Level Garden', '4B-BLG', 0, '2019-12-17 23:04:29', '0000-00-00 00:00:00', NULL),
(162, 'CON-406', 'Four Bedroom Garden', '4B-G', 0, '2019-12-17 23:04:29', '0000-00-00 00:00:00', NULL),
(163, 'CON-407', 'Four Bedroom Deluxe', '4B-D', 0, '2019-12-17 23:04:29', '0000-00-00 00:00:00', NULL),
(164, 'CON-408', 'Four Bedroom Suite', '', 0, '2019-12-17 23:04:29', '0000-00-00 00:00:00', NULL),
(165, 'CON-501', 'Studio', 'S', 0, '2019-12-17 23:04:29', '0000-00-00 00:00:00', NULL),
(166, 'CON-502', 'Studio Combo (Jr. 2BR)', 'SC-J2B', 0, '2019-12-17 23:04:29', '0000-00-00 00:00:00', NULL),
(167, 'CON-503', 'Studio Combo (2BR)', 'SC-2B', 0, '2019-12-17 23:04:29', '0000-00-00 00:00:00', NULL),
(168, 'CON-504', 'Studio Combo (3BR)', 'SC-3B', 0, '2019-12-17 23:04:29', '0000-00-00 00:00:00', NULL),
(169, 'CON-505', 'Studio Combo (1BR)', 'SC-1BR', 0, '2019-12-17 23:04:29', '0000-00-00 00:00:00', NULL),
(170, 'CON-506', 'Studio Adjacent', '', 0, '2019-12-17 23:04:29', '0000-00-00 00:00:00', NULL),
(171, 'CON-507', 'Studio (combined 3 Adjacent units)', '', 0, '2019-12-17 23:04:29', '0000-00-00 00:00:00', NULL),
(172, 'CON-508', 'Studio Premiere', '', 0, '2019-12-17 23:04:29', '0000-00-00 00:00:00', NULL),
(173, 'CON-509', 'Studio with Balcony', '', 0, '2019-12-17 23:04:29', '0000-00-00 00:00:00', NULL),
(174, 'CON-510', '2 Bedroom / 2 Parking', '', 0, '2019-12-17 23:04:30', '0000-00-00 00:00:00', NULL),
(175, 'CON-511', '2 Bedroom / 2 Parking (w/ mech pkg)', '', 0, '2019-12-17 23:04:30', '0000-00-00 00:00:00', NULL),
(176, 'CON-512', '3 Bedroom / 3 Parking', '', 0, '2019-12-17 23:04:30', '0000-00-00 00:00:00', NULL),
(177, 'CON-513', '3 Bedroom / 3 Parking (w/ mech pkg)', '', 0, '2019-12-17 23:04:30', '0000-00-00 00:00:00', NULL),
(178, 'CON-514', '3 Bedroom Premium /  4 Parking', '', 0, '2019-12-17 23:04:30', '0000-00-00 00:00:00', NULL),
(179, 'CON-515', '3 Bedroom Premium /  4 Pkg (w/ mech pkg)', '', 0, '2019-12-17 23:04:30', '0000-00-00 00:00:00', NULL),
(180, 'CON-516', 'Sub Penthouse / 4 Parking', '', 0, '2019-12-17 23:04:30', '0000-00-00 00:00:00', NULL),
(181, 'CON-517', 'Super Penthouse / 6 Parking', '', 0, '2019-12-17 23:04:30', '0000-00-00 00:00:00', NULL),
(182, 'CON-601', 'Commercial Unit', 'COMM', 0, '2019-12-17 23:04:30', '0000-00-00 00:00:00', NULL),
(183, 'CON-701', 'Single Parking Slot', 'ONE-PKG', 0, '2019-12-17 23:04:30', '0000-00-00 00:00:00', NULL),
(184, 'CON-702', 'Tandem Parking Slot', 'TAN-PKG', 0, '2019-12-17 23:04:30', '0000-00-00 00:00:00', NULL),
(185, 'CON-703', 'Outdoor Parking Slot', 'OUT-PKG', 0, '2019-12-17 23:04:30', '0000-00-00 00:00:00', NULL),
(186, 'CON-704', 'Interior Lot', 'INT LOT', 0, '2019-12-17 23:04:30', '0000-00-00 00:00:00', NULL),
(187, 'CON-705', 'Corner Lot', 'COR LOT', 0, '2019-12-17 23:04:30', '0000-00-00 00:00:00', NULL),
(188, 'CON-706', 'Executive One Bedroom', '1B-E', 0, '2019-12-17 23:04:30', '0000-00-00 00:00:00', NULL),
(189, 'CON-707', 'Executive One Bedroom Corner', '1B-EC', 0, '2019-12-17 23:04:30', '0000-00-00 00:00:00', NULL),
(190, 'CON-708', 'Mechanical Parking', '', 0, '2019-12-17 23:04:30', '0000-00-00 00:00:00', NULL),
(191, 'CON-709', '2 of single with mechanical car lift', '', 0, '2019-12-17 23:04:30', '0000-00-00 00:00:00', NULL),
(192, 'CON-710', '2 of single with mechanical lift', '', 0, '2019-12-17 23:04:30', '0000-00-00 00:00:00', NULL),
(193, 'CON-711', '2 of single, tandem', '', 0, '2019-12-17 23:04:30', '0000-00-00 00:00:00', NULL),
(194, 'CON-712', '2 of tandem', '', 0, '2019-12-17 23:04:30', '0000-00-00 00:00:00', NULL),
(195, 'CON-713', '3 of tandem', '', 0, '2019-12-17 23:04:30', '0000-00-00 00:00:00', NULL),
(196, 'CON-714', '4 of single', '', 0, '2019-12-17 23:04:30', '0000-00-00 00:00:00', NULL),
(197, 'CON-715', 'single with mechanical car lift', '', 0, '2019-12-17 23:04:30', '0000-00-00 00:00:00', NULL),
(198, 'CON-716', 'single with mechanical car lift, single', '', 0, '2019-12-17 23:04:30', '0000-00-00 00:00:00', NULL),
(199, 'CON-717', 'single with mechanical car lift, tandem', '', 0, '2019-12-17 23:04:30', '0000-00-00 00:00:00', NULL),
(200, 'CON-718', 'single, single with mechanical car lift', '', 0, '2019-12-17 23:04:30', '0000-00-00 00:00:00', NULL),
(201, 'CON-719', 'single, single with mechanical lift', '', 0, '2019-12-17 23:04:31', '0000-00-00 00:00:00', NULL),
(202, 'CON-720', 'tandem', '', 0, '2019-12-17 23:04:31', '0000-00-00 00:00:00', NULL),
(203, 'CON-721', 'tandem with mechanical car lift', '', 0, '2019-12-17 23:04:31', '0000-00-00 00:00:00', NULL),
(204, 'CON-722', 'tandem, 2 of single', '', 0, '2019-12-17 23:04:31', '0000-00-00 00:00:00', NULL),
(205, 'CON-801', 'House Model- Avery', '', 0, '2019-12-17 23:04:31', '0000-00-00 00:00:00', NULL),
(206, 'CON-802', 'House Model- Burberry', '', 0, '2019-12-17 23:04:31', '0000-00-00 00:00:00', NULL),
(207, 'CON-803', 'House Model- Canary', '', 0, '2019-12-17 23:04:31', '0000-00-00 00:00:00', NULL),
(208, 'CON-804', 'House Model- Dania', '', 0, '2019-12-17 23:04:31', '0000-00-00 00:00:00', NULL),
(209, 'CON-805', 'House Model- Holly', '', 0, '2019-12-17 23:04:31', '0000-00-00 00:00:00', NULL),
(210, 'CON-806', 'House Model- Lauren', '', 0, '2019-12-17 23:04:31', '0000-00-00 00:00:00', NULL),
(211, 'CON-807', 'House Model- Madison', '', 0, '2019-12-17 23:04:31', '0000-00-00 00:00:00', NULL),
(212, 'CON-901', 'Five Bedroom', '5B', 0, '2019-12-17 23:04:31', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `position` int(11) NOT NULL DEFAULT '0',
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `extension_number` int(11) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `last_logon` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `firstname`, `middlename`, `lastname`, `position`, `username`, `password`, `email_address`, `mobile_number`, `extension_number`, `creation_date`, `created_by`, `status`, `last_logon`) VALUES
(1, 'Daenerys', 'Mai', 'Targaryen', 1, 'dmtargaryen', 'WGZmYTVQK0FLOXl1T2w3L0xzYVV4QT09', 'vbparale@federalland.ph', '', 0, '2019-10-28 06:38:24', '3', 1, '0000-00-00 00:00:00'),
(3, 'Janelle', 'Mendoza', 'Dome', 2, 'jmdome', 'WGZmYTVQK0FLOXl1T2w3L0xzYVV4QT09', 'vbparale@federalland.ph', '', 0, '2019-10-28 07:03:04', '3', 0, '2019-12-18 10:32:21'),
(4, 'Jane', '', 'Kent', 4, 'jkent', 'WGZmYTVQK0FLOXl1T2w3L0xzYVV4QT09', 'vbparale@federalland.ph', '', 0, '2019-10-28 07:31:35', '3', 1, '0000-00-00 00:00:00'),
(7, 'Clark', 'Ty', 'Brookes', 7, 'ctbrookes', 'WGZmYTVQK0FLOXl1T2w3L0xzYVV4QT09', 'vbparale@federalland.ph', '', 0, '2019-10-28 08:02:42', '3', 1, '2019-12-20 06:38:50'),
(8, 'Dinah', 'Mai', 'Targaryen', 6, 'dimtargaryen', 'WGZmYTVQK0FLOXl1T2w3L0xzYVV4QT09', 'vbparale@federalland.ph', '', 0, '2019-10-29 03:02:38', '3', 1, '2019-12-20 06:49:01'),
(9, 'Vendor', 'Ty', 'Eclarinal', 9, 'vteclarinal', 'WGZmYTVQK0FLOXl1T2w3L0xzYVV4QT09', 'vbparale@federalland.ph', '', 0, '2019-10-29 03:09:30', '3', 0, '2019-10-30 04:05:24'),
(14, 'Bon', '', 'Poseidon', 10, 'bposeidon', 'WGZmYTVQK0FLOXl1T2w3L0xzYVV4QT09', 'vbparale@federalland.ph', '', 0, '2019-10-29 03:23:43', '3', 1, '2019-12-20 06:39:13'),
(15, 'Amarah', 'Jane', 'Lopez', 0, 'ajlopez', 'WGZmYTVQK0FLOXl1T2w3L0xzYVV4QT09', 'vbparale@federalland.ph', '', 0, '2019-10-29 05:24:37', '3', 1, '2019-12-23 01:52:28'),
(16, 'Jheaster Irish', 'Perez', 'Santos', 10, 'jpsantos', 'WGZmYTVQK0FLOXl1T2w3L0xzYVV4QT09', 'vbparale@federalland.ph', '', 0, '2019-10-30 00:49:55', '15', 1, '2019-12-20 07:32:26'),
(17, 'Jernalyn', '', 'Rodriguez', 1, 'jrodriguez', 'Ynd0WlFMVmVISVpPamk3UUVQL1p4QT09', 'vbparale@federalland.ph', '', 0, '2019-11-12 05:36:09', '15', 1, '0000-00-00 00:00:00'),
(18, 'Michael', 'Saint', 'Scofield', 2, 'mscoscofield', 'WGZmYTVQK0FLOXl1T2w3L0xzYVV4QT09', 'vbparale@federalland.ph', '09213283730', 1002, '2019-12-20 10:03:01', '15', 1, '0000-00-00 00:00:00'),
(19, 'Dummy', '', 'Dummy', 8, 'ddummy', '', 'vbparale@federalland.ph', '09213283730', 1002, '2019-12-20 10:08:43', '15', 0, '0000-00-00 00:00:00');

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
(3, 15, 'WGZmYTVQK0FLOXl1T2w3L0xzYVV4QT09', '2019-10-30 03:03:50'),
(4, 15, 'WGZmYTVQK0FLOXl1T2w3L0xzYVV4QT09', '2019-12-20 12:30:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_activity_logs`
--
ALTER TABLE `tbl_activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_buyers`
--
ALTER TABLE `tbl_buyers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_buyers_advance_charges`
--
ALTER TABLE `tbl_buyers_advance_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_buyers_documents`
--
ALTER TABLE `tbl_buyers_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_buyers_payment`
--
ALTER TABLE `tbl_buyers_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_buyers_transaction`
--
ALTER TABLE `tbl_buyers_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_call_logs`
--
ALTER TABLE `tbl_call_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_checking_areas`
--
ALTER TABLE `tbl_checking_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_checking_areas_list`
--
ALTER TABLE `tbl_checking_areas_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dashboard_status`
--
ALTER TABLE `tbl_dashboard_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_position`
--
ALTER TABLE `tbl_position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_projects`
--
ALTER TABLE `tbl_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_project_distance`
--
ALTER TABLE `tbl_project_distance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sap_company`
--
ALTER TABLE `tbl_sap_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sap_config`
--
ALTER TABLE `tbl_sap_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sap_floors`
--
ALTER TABLE `tbl_sap_floors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_section`
--
ALTER TABLE `tbl_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_temp_schedule_link`
--
ALTER TABLE `tbl_temp_schedule_link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tickets`
--
ALTER TABLE `tbl_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tickets_images`
--
ALTER TABLE `tbl_tickets_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ticket_checklist`
--
ALTER TABLE `tbl_ticket_checklist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ticket_checklist_others`
--
ALTER TABLE `tbl_ticket_checklist_others`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ticket_notes`
--
ALTER TABLE `tbl_ticket_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_turnover_schedule`
--
ALTER TABLE `tbl_turnover_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_units`
--
ALTER TABLE `tbl_units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_unit_type`
--
ALTER TABLE `tbl_unit_type`
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
-- AUTO_INCREMENT for table `tbl_activity_logs`
--
ALTER TABLE `tbl_activity_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `tbl_buyers`
--
ALTER TABLE `tbl_buyers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=395;

--
-- AUTO_INCREMENT for table `tbl_buyers_advance_charges`
--
ALTER TABLE `tbl_buyers_advance_charges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_buyers_documents`
--
ALTER TABLE `tbl_buyers_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_buyers_payment`
--
ALTER TABLE `tbl_buyers_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_buyers_transaction`
--
ALTER TABLE `tbl_buyers_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_call_logs`
--
ALTER TABLE `tbl_call_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_checking_areas`
--
ALTER TABLE `tbl_checking_areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_checking_areas_list`
--
ALTER TABLE `tbl_checking_areas_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_dashboard_status`
--
ALTER TABLE `tbl_dashboard_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_projects`
--
ALTER TABLE `tbl_projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;

--
-- AUTO_INCREMENT for table `tbl_project_distance`
--
ALTER TABLE `tbl_project_distance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_sap_company`
--
ALTER TABLE `tbl_sap_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `tbl_sap_config`
--
ALTER TABLE `tbl_sap_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_sap_floors`
--
ALTER TABLE `tbl_sap_floors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4096;

--
-- AUTO_INCREMENT for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_section`
--
ALTER TABLE `tbl_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_temp_schedule_link`
--
ALTER TABLE `tbl_temp_schedule_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_tickets`
--
ALTER TABLE `tbl_tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_tickets_images`
--
ALTER TABLE `tbl_tickets_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tbl_ticket_checklist`
--
ALTER TABLE `tbl_ticket_checklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `tbl_ticket_checklist_others`
--
ALTER TABLE `tbl_ticket_checklist_others`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_ticket_notes`
--
ALTER TABLE `tbl_ticket_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_turnover_schedule`
--
ALTER TABLE `tbl_turnover_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `tbl_units`
--
ALTER TABLE `tbl_units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `tbl_unit_type`
--
ALTER TABLE `tbl_unit_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_user_pwd_history`
--
ALTER TABLE `tbl_user_pwd_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
