-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2019 at 07:38 AM
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
-- Table structure for table `tbl_buyers`
--

CREATE TABLE `tbl_buyers` (
  `id` int(11) NOT NULL,
  `customer_number` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `tin` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `civil_status` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `spouse` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_buyers`
--

INSERT INTO `tbl_buyers` (`id`, `customer_number`, `customer_name`, `tin`, `birthday`, `address`, `gender`, `telephone`, `civil_status`, `mobile_number`, `email_address`, `spouse`, `fax`, `status`) VALUES
(1, 12345, 'John Doe', '411-101-602', '1990-11-14', '76 F. Mariano Ave. Dela Paz Pasig City', 'Male', '2342342', 'Single', '09955562669', 'vbparale@federalland.ph', '', '', 0),
(2, 23245, 'Erika Rabara', '543-200-602', '1995-12-01', '0005 San Agustin Hagonoy, Bulacan', 'Female', '234234234', 'Single', '09955562669', 'vbparale@federalland.ph', '', '', 0),
(3, 55555, 'John Doe1', '411-101-602', '1990-11-14', '76 F. Mariano Ave. Dela Paz Pasig City', 'Male', '2342342', 'Single', '09955562669', 'vbparale@federalland.ph', '', '', 0),
(4, 80808, 'John Doe2', '411-101-602', '1990-11-14', '76 F. Mariano Ave. Dela Paz Pasig City', 'Male', '2342342', 'Single', '09955562669', 'vbparale@federalland.ph', '', '', 0),
(5, 11111, 'Viel Parale', '123-200-123', '1995-12-01', '0005 San Agustin Hagonoy, Bulacan', 'Female', '234234234', 'Single', '09955562669', 'vbparale@federalland.ph', '', '', 0);

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

INSERT INTO `tbl_buyers_transaction` (`id`, `customer_number`, `project`, `tower`, `runitid`, `accepted_qcd`, `accepted_handover`, `approved_turnover`, `building_turnover`, `schedule_date`, `tagged_no_show`, `transaction_date`, `status`) VALUES
(1, 12345, 'TEM', '0001', '00000003', '2019-11-07 00:00:00', '2019-11-07 00:00:00', '2019-11-08 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2019-11-20 00:00:00', 0),
(2, 55555, 'TEM', '0001', '00000021', '2019-11-01 00:00:00', '2019-11-12 00:00:00', '2019-11-11 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2019-11-01 00:00:00', 0),
(3, 80808, 'TEM', '0001', '00000031', '2019-11-07 00:00:00', '2019-11-07 00:00:00', '2019-11-15 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2019-11-20 00:00:00', 0),
(4, 19191, 'TEM', '0001', '00000041', '2019-11-07 00:00:00', '2019-11-07 00:00:00', '2019-11-20 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2019-11-20 00:00:00', 0),
(5, 11111, 'ST', '0001', '00000001', '2019-11-07 00:00:00', '2019-11-07 00:00:00', '2019-11-20 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2019-11-20 00:00:00', 0),
(6, 23245, 'TEM', '0001', '00000001', '2019-11-07 00:00:00', '2019-11-07 00:00:00', '2019-11-20 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2019-11-20 00:00:00', 0);

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
(18, 1, 1, 7, 0, 0),
(19, 4, 2, 1, 0, 0),
(20, 4, 2, 3, 0, 0);

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
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_projects`
--

INSERT INTO `tbl_projects` (`id`, `project_code`, `project`, `tower`, `address`) VALUES
(1, 'TGMO', 'The Grand Midori Ortigas', '0001', 'Exchange Road corner Jade Drive, Ortigas Center, Brgy. San Antonio, Pasig City'),
(2, 'TEM', 'The Estate Makati', '0001', 'Ayala Avenue, Makati City'),
(3, 'GHR', 'The Grand Hyatt Residences', '0002', '8th Avenue corner 36th Street Grand Central Park Fort Bonifacio Global City'),
(4, 'QR', 'Quantum Residences', '0001', 'Taft Avenue, Brgy. 49, Pasay City'),
(5, 'ST', 'Siena Towers', '0001', 'Sumulong Highway, Brgy. Sto Niño, Marikina City'),
(6, 'PGMH', 'Peninsula Garden Midtown Homes', '0001', 'Penafrancia Street, Paco, Manila');

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
  `status` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_assigned` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tickets`
--

INSERT INTO `tbl_tickets` (`id`, `ticket_number`, `customer_number`, `created_by`, `category`, `subject`, `assigned_to`, `status`, `date_created`, `last_update`, `date_assigned`) VALUES
(10, 'TEM-2019-00001\n', 12345, 8, 'Turnover', 'For Schedule Confirmation', 7, 0, '2019-11-26 02:52:35', '2019-11-26 05:55:56', '2019-11-26 03:52:00'),
(11, 'TEM-2019-00002\n', 12345, 8, 'Turnover', 'For Schedule Confirmation', 7, 0, '2019-11-26 06:03:10', '2019-11-26 06:03:10', '2019-11-26 07:03:00'),
(12, 'TEM-2019-00003\n', 12345, 7, 'Turnover', 'For Schedule Confirmation', 7, 0, '2019-11-27 02:02:43', '2019-11-27 02:02:43', '2019-11-27 03:02:00'),
(13, 'TEM-2019-00004\n', 12345, 7, 'Turnover', 'For Schedule Confirmation', 7, 0, '2019-11-27 02:04:25', '2019-11-27 02:04:25', '2019-11-27 03:04:00'),
(14, 'TEM-2019-00005\n', 12345, 7, 'Turnover', 'For Schedule Confirmation', 7, 0, '2019-11-27 02:04:49', '2019-11-27 02:04:49', '2019-11-27 03:04:00'),
(15, 'TEM-2019-00006\n', 12345, 7, 'Turnover', 'For Schedule Confirmation', 7, 0, '2019-11-27 02:05:37', '2019-11-27 02:05:37', '2019-11-27 03:05:00'),
(16, 'TEM-2019-00007\n', 12345, 7, 'Turnover', 'For Schedule Confirmation', 7, 0, '2019-11-27 02:06:01', '2019-11-27 02:06:01', '2019-11-27 03:06:00');

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
(37, 'TGM-2019-00001', 'Authorized Representative Identification Card', 'TGM-2019-00001-Authorized_Representative_Identification_Card14.JPG', '2019-11-12 05:52:49', 0);

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
(31, 'TEM-2019-00001', 1, 'Sample Observation.', '', '2019-11-27 01:25:09', 0),
(32, 'TGM-2019-00001', 2, 'Sample Observation.', '', '2019-11-12 05:57:12', 0),
(33, 'TGM-2019-00001', 5, '', '', '2019-11-12 05:57:12', 0),
(34, 'TGM-2019-00001', 6, 'Test', '', '2019-11-12 05:57:12', 0),
(35, 'TGM-2019-00001', 9, 'Sample Observation.', '', '2019-11-12 05:57:12', 0);

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
  `status` int(11) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_turnover_schedule`
--

INSERT INTO `tbl_turnover_schedule` (`id`, `customer_number`, `ticket_number`, `schedule`, `assigned_to`, `sequence`, `status`, `date_created`) VALUES
(89, 12345, 'TEM-2019-00001\n', '2019-11-21 11:00:00', 14, 1, 0, '2019-11-26 02:52:35'),
(90, 55555, 'TEM-2019-00001\n', '2019-11-21 11:00:00', 14, 1, 0, '2019-11-26 02:52:35'),
(91, 80808, 'TEM-2019-00001\n', '2019-11-21 11:00:00', 14, 1, 0, '2019-11-26 02:52:35'),
(92, 12345, 'TEM-2019-00002\n', '2019-11-08 11:00:00', 14, 1, 0, '2019-11-26 06:02:39'),
(93, 12345, 'TEM-2019-00002\n', '2019-11-08 11:00:00', 16, 2, 0, '2019-11-26 06:02:55'),
(94, 12345, 'TEM-2019-00002\n', '2019-11-08 11:00:00', 0, 3, 0, '2019-11-26 06:03:10'),
(95, 12345, 'TEM-2019-00003\n', '2019-11-20 11:00:00', 16, 1, 0, '2019-11-27 02:02:42'),
(96, 55555, 'TEM-2019-00003\n', '2019-11-20 11:00:00', 16, 1, 0, '2019-11-27 02:02:42'),
(97, 80808, 'TEM-2019-00003\n', '2019-11-20 11:00:00', 16, 1, 0, '2019-11-27 02:02:43'),
(98, 12345, 'TEM-2019-00004\n', '2019-11-06 09:00:00', 16, 1, 0, '2019-11-27 02:04:25'),
(99, 12345, 'TEM-2019-00005\n', '2019-11-05 14:00:00', 14, 1, 0, '2019-11-27 02:04:49'),
(100, 12345, 'TEM-2019-00006\n', '2019-11-05 09:00:00', 14, 1, 0, '2019-11-27 02:05:37'),
(101, 12345, 'TEM-2019-00007\n', '2019-11-04 09:00:00', 14, 1, 0, '2019-11-27 02:06:01');

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
  `parking_number` varchar(255) NOT NULL,
  `tower` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_units`
--

INSERT INTO `tbl_units` (`id`, `project`, `runitid`, `unit_number`, `unit_desc`, `unit_type`, `parking_number`, `tower`, `status`) VALUES
(1, 'TEM', '00000001', '8', 'A', '2BR', 'B6135 / B6136', '1', 5),
(2, 'TEM', '00000002', '8', 'B', '3BR', 'B6053 / B6054 / B6055', '1', 1),
(3, 'TEM', '00000003', '8', 'C', '2BR', 'B6123 / B6124', '1', 8),
(4, 'TEM', '00000004', '8', 'D', '3BR', 'B6046 / B6047 / B6048', '1', 2),
(5, 'TEM', '00000005', '8', 'E', '2BR', 'B6003 / B6004', '1', 1),
(6, 'TEM', '00000006', '8', 'F', '3BR', 'B6030 / B6031 / B6032', '1', 1),
(7, 'TEM', '00000007', '8', 'G', '2BR', 'B6001 / B6002', '1', 1),
(8, 'TEM', '00000008', '8', 'H', '3BR', 'B6048 / B6049 / B6050', '1', 5),
(9, 'TEM', '00000009', '9', 'A', '2BR', 'B5065 / B5066', '1', 1),
(10, 'TEM', '00000010', '9', 'B', '3BR', 'B4058 / B4059 / B4060', '1', 5),
(11, 'TEM', '00000011', '9', 'C', '2BR', 'B6097 / B6098', '1', 11),
(12, 'TEM', '00000012', '9', 'D', '3BR', 'B6068 / B6069 / B6070', '1', 1),
(13, 'TEM', '00000013', '9', 'E', '2BR', 'B6099 / B6100', '1', 2),
(14, 'TEM', '00000014', '9', 'F', '3BR', 'B6018 / B6019 / B6020', '1', 7),
(15, 'TEM', '00000015', '9', 'G', '2BR', 'B6089 / B6090', '1', 5),
(16, 'TEM', '00000016', '9', 'H', '3BR', 'B5107 / B5108 / B5109', '1', 1),
(17, 'TEM', '00000017', '10', 'A', '2BR', 'B6010 / B6011', '1', 1),
(18, 'TEM', '00000018', '10', 'B', '3BR', 'B5101 / B5102 / B5103', '1', 2),
(19, 'TEM', '00000019', '10', 'C', '2BR', 'B6083 / B6084', '1', 4),
(20, 'TEM', '00000020', '10', 'D', '3BR', 'B5038 / B5039 / B5040', '1', 1),
(21, 'TEM', '00000021', '10', 'E', '2BR', 'B6051 / B6052', '1', 12),
(22, 'TEM', '00000022', '10', 'F', '3BR', 'B5021 / B5022 / B5023', '1', 1),
(23, 'TEM', '00000023', '10', 'G', '2BR', 'B5003 / B5004', '1', 1),
(24, 'TEM', '00000024', '10', 'H', '3BR', 'B4048 / B4049 / B4050', '1', 1),
(25, 'TEM', '00000025', '11', 'A', '2BR', 'B6056 / B6057', '1', 1),
(26, 'TEM', '00000026', '11', 'B', '3BR', 'B5024 / B5025 / B5026', '1', 1),
(27, 'TEM', '00000027', '11', 'C', '2BR', 'B6077 / B6078', '1', 7),
(28, 'TEM', '00000028', '11', 'D', '3BR', 'B4122 / B4123 / B4124', '1', 9),
(29, 'TEM', '00000029', '11', 'E', '2BR', 'B6061 / B6062', '1', 5),
(30, 'TEM', '00000030', '11', 'F', '3BR', 'B4119 / B4120 / B4121', '1', 5),
(31, 'TEM', '00000031', '11', 'G', '2BR', 'B6071 / B6072', '1', 1),
(32, 'TEM', '00000032', '11', 'H', '3BR', 'B4035 / B4036 / B4037', '1', 1),
(33, 'TEM', '00000033', '12', 'A', '2BR', 'B6093 / B6094', '1', 4),
(34, 'TEM', '00000034', '12', 'B', '3BR', 'B5119 / B5120 / B5121', '1', 1),
(35, 'TEM', '00000035', '12', 'C', '2BR', 'B6095 / B6096', '1', 6),
(36, 'TEM', '00000036', '12', 'D', '3BR', 'B5005 / B5006 / B5007', '1', 1),
(37, 'TEM', '00000037', '12', 'E', '3BR', 'B5115 / B5116 / B3055', '1', 7),
(38, 'TEM', '00000038', '12', 'F', '3BR Premium', 'B4041 / B4042 / B4125 / B4126', '1', 1),
(39, 'TEM', '00000039', '12', 'G', '3BR', 'B6105 / B6106 / B6107', '1', 11),
(40, 'TEM', '00000040', '12', 'H', '3BR Premium', 'B4008 / B4009 / B4010 / B4011', '1', 12),
(41, 'TEM', '00000041', '15', 'A', '3BR', 'B6129 / B6130 / B6131', '1', 13),
(42, 'TEM', '00000042', '15', 'B', '3BR Premium', 'B2022 / B2023 / B2024 / B2025', '1', 1),
(43, 'TEM', '00000043', '15', 'C', '3BR', 'B5091 / B5092 / B3053', '1', 1),
(44, 'TEM', '00000044', '15', 'D', '3BR Premium', 'B4001 / B4002 / B4003 / B4004', '1', 1),
(45, 'TEM', '00000045', '15', 'E', '3BR', 'B6027 / B6028 / B6029', '1', 7),
(46, 'TEM', '00000046', '15', 'F', '3BR Premium', 'B4081 / B4082 / B4083 / B4084', '1', 1),
(47, 'TEM', '00000047', '15', 'G', '3BR', 'B5127 / B5128 / B3051', '1', 3),
(48, 'TEM', '00000048', '15', 'H', '3BR Premium', 'B4085 / B4086 / B4087 / B4088', '1', 1),
(49, 'TEM', '00000049', '16', 'A', '3BR', 'B6039 / B6040 / B6041', '1', 2),
(50, 'TEM', '00000050', '16', 'B', '3BR Premium', 'B4065 / B4066 / B4067 / B4068', '1', 1),
(51, 'TEM', '00000051', '16', 'C', '3BR', 'B5087 / B5088 / B3049', '1', 1),
(52, 'TEM', '00000052', '16', 'D', '3BR Premium', 'B4069 / B4070 / B4071 / B4072', '1', 1),
(53, 'TEM', '00000053', '16', 'E', '3BR', 'B5110 / B5111 / B5112', '1', 1),
(54, 'TEM', '00000054', '16', 'F', '3BR Premium', 'B3067 / B3068 / B3070 / B3071', '1', 1),
(55, 'TEM', '00000055', '16', 'G', '3BR', 'B5083 / B5084 / B3047', '1', 1),
(56, 'TEM', '00000056', '16', 'H', '3BR Premium', 'B4051 / B4052 / B4053 / B4054', '1', 6),
(57, 'TEM', '00000057', '17', 'A', '3BR', 'B5012 / B5013 / B5014', '1', 5),
(58, 'TEM', '00000058', '17', 'B', '3BR Premium', 'B3001 / B3002 / B3003 / B3004', '1', 1),
(59, 'TEM', '00000059', '17', 'C', '3BR', 'B4024 / B4025 / B4026', '1', 1),
(60, 'TEM', '00000060', '17', 'D', '3BR Premium', 'B1043 / B1044 / B1045 / B1046', '1', 4),
(61, 'TEM', '00000061', '17', 'E', '3BR', 'B5079 / B5080 / B3045', '1', 1),
(62, 'TEM', '00000062', '17', 'F', '3BR Premium', 'B3063 / B3064 / B3065 / B3066', '1', 1),
(63, 'TEM', '00000063', '17', 'G', '3BR', 'B5018 / B5019 / B5020', '1', 9),
(64, 'TEM', '00000064', '17', 'H', '3BR Premium', 'B3059 / B3060 / B3061 / B3062', '1', 1),
(65, 'TEM', '00000065', '18', 'A', '3BR', 'B5075 / B5076 / B2055', '1', 3),
(66, 'TEM', '00000066', '18', 'B', '3BR Premium', 'B3009 / B3010 / B3011 / B3012', '1', 2),
(67, 'TEM', '00000067', '18', 'C', '3BR', 'B5048 / B5049 / B5050', '1', 2),
(68, 'TEM', '00000068', '18', 'D', '3BR Premium', 'B3039 / B3040 / B3057 / B3058', '1', 3),
(69, 'TEM', '00000069', '18', 'E', '3BR', 'B5071 / B5072 / B2053', '1', 1),
(70, 'TEM', '00000070', '18', 'F', '3BR Premium', 'B3041 / B3042 / B3043 / B3044', '1', 10),
(71, 'TEM', '00000071', '18', 'G', '3BR', 'B4107 / B4108 / B4109', '1', 1),
(72, 'TEM', '00000072', '18', 'H', '3BR Premium', 'B2067 / B2068 / B2070 / B2071', '1', 11),
(73, 'TEM', '00000073', '19', 'A', '3BR', 'B5067 / B5068 / B2051', '1', 12),
(74, 'TEM', '00000074', '19', 'B', '3BR Premium', 'B3031 / B3032 / B3033 / B3034', '1', 1),
(75, 'TEM', '00000075', '19', 'C', '3BR', 'B4012 / B4013 / B4014', '1', 15),
(76, 'TEM', '00000076', '19', 'D', '3BR Premium', 'B2020 / B2021 / B2077 / B2078', '1', 1),
(77, 'TEM', '00000077', '19', 'E', '3BR', 'B6111 / B6112 / B6113', '1', 1),
(78, 'TEM', '00000078', '19', 'F', '3BR Premium', 'B1047 / B1048 / B1049 / B1050', '1', 1),
(79, 'TEM', '00000079', '19', 'G', '3BR', 'B5061 / B5062 / B2049', '1', 1),
(80, 'TEM', '00000080', '19', 'H', '3BR Premium', 'B2063 / B2064 / B2065 / B2066', '1', 1),
(81, 'TEM', '00000081', '20', 'A', '3BR', 'B4101 / B4102 / B4103', '1', 1),
(82, 'TEM', '00000082', '20', 'B', '3BR Premium', 'B2041 / B2042 / B2043 / B2044', '1', 1),
(83, 'TEM', '00000083', '20', 'C', '3BR', 'B6117 / B6118 / B6119', '1', 1),
(84, 'TEM', '00000084', '20', 'D', '3BR Premium', 'B2045 / B2046 / B2047 / B2048', '1', 1),
(85, 'TEM', '00000085', '20', 'E', '3BR', 'B4043 / B4044 / B4045', '1', 1),
(86, 'TEM', '00000086', '20', 'F', '3BR Premium', 'B2035 / B2036 / B2037 / B2038', '1', 1),
(87, 'TEM', '00000087', '20', 'G', '3BR', 'B4095 / B4096 / B4097', '1', 1),
(88, 'TEM', '00000088', '20', 'H', '3BR Premium', 'B2031 / B2032 / B2033 / B2034', '1', 1),
(89, 'TEM', '00000089', '21', 'A', '3BR', 'B6120 / B6121 / B6122', '1', 1),
(90, 'TEM', '00000090', '21', 'B', '3BR Premium', 'B2059 / B2060 / B2061 / B2062', '1', 1),
(91, 'TEM', '00000091', '21', 'C', 'Sub Penthouse', 'B1022 / B1023 / B1024 / B1025', '1', 1),
(92, 'TEM', '00000092', '21', 'D', 'Sub Penthouse', 'B1014 / B1015 / B1016 / B1017', '1', 1),
(93, 'TEM', '00000093', '21', 'E', 'Super Penthouse', 'B1056 / B1057 / B1058 / B1059 / B1060 / B1061', '1', 1),
(94, 'TEM', '00000094', '21', 'F', 'Super Penthouse', 'B1030 / B1031 / B1032 / B1033 / B1034 / B1035', '1', 1),
(95, 'TEM', '00000095', '21', 'G', '2BR', 'B6125 / B6126', '1', 1),
(96, 'TEM', '00000096', '21', 'H', '3BR', 'B6021 / B6022 / B6023', '1', 1),
(97, 'TEM', '00000097', '22', 'A', '2BR', 'B6127 / B6128', '1', 1),
(98, 'TEM', '00000098', '22', 'B', '3BR', 'B6042 / B6043 / B6044', '1', 1),
(99, 'TEM', '00000099', '22', 'C', '2BR', 'B6139 / B6140', '1', 1),
(100, 'TEM', '00000100', '22', 'D', '3BR', 'B6058 / B6059 / B6060', '1', 1),
(101, 'TEM', '00000101', '22', 'E', '2BR', 'B6137 / B6138', '1', 1),
(102, 'TEM', '00000102', '22', 'F', '3BR', 'B6012 / B6013 / B6014', '1', 1),
(103, 'TEM', '00000103', '22', 'G', '2BR', 'B5010 / B5011', '1', 1),
(104, 'TEM', '00000104', '22', 'H', '3BR', 'B4110 / B4111 / B4112', '1', 1),
(105, 'TEM', '00000105', '23', 'A', '2BR', 'B6101 / B6102', '1', 1),
(106, 'TEM', '00000106', '23', 'B', '3BR', 'B6036 / B6037 / B6038', '1', 1),
(107, 'TEM', '00000107', '23', 'C', '2BR', 'B6103 / B6104', '1', 1),
(108, 'TEM', '00000108', '23', 'D', '3BR', 'B6015 / B6016 / B6017', '1', 1),
(109, 'TEM', '00000109', '23', 'E', '2BR', 'B6008 / B6009', '1', 1),
(110, 'TEM', '00000110', '23', 'F', '3BR', 'B5122 / B5123 / B5124', '1', 1),
(111, 'TEM', '00000111', '23', 'G', '2BR', 'B6091 / B6092', '1', 1),
(112, 'TEM', '00000112', '23', 'H', '3BR', 'B5035 / B5036 / B5037', '1', 1),
(113, 'TEM', '00000113', '25', 'A', '2BR', 'B6085 / B6086', '1', 1),
(114, 'TEM', '00000114', '25', 'B', '3BR', 'B5032 / B5033 / B5034', '1', 1),
(115, 'TEM', '00000115', '25', 'C', '2BR', 'B6087 / B6088', '1', 1),
(116, 'TEM', '00000116', '25', 'D', '3BR', 'B5015 / B5016 / B5017', '1', 1),
(117, 'TEM', '00000117', '25', 'E', '2BR', 'B6079 / B6080', '1', 1),
(118, 'TEM', '00000118', '25', 'F', '3BR', 'B5095 / B5096 / B5097', '1', 1),
(119, 'TEM', '00000119', '25', 'G', '2BR', 'B6081 / B6082', '1', 1),
(120, 'TEM', '00000120', '25', 'H', '3BR', 'B5027 / B5028 / B5029', '1', 1),
(121, 'TEM', '00000121', '26', 'A', '2BR', 'B5008 / B5009', '1', 1),
(122, 'TEM', '00000122', '26', 'B', '3BR', 'B4027 / B4028 / B4029', '1', 1),
(123, 'TEM', '00000123', '26', 'C', '2BR', 'B6073 / B6074', '1', 1),
(124, 'TEM', '00000124', '26', 'D', '3BR', 'B5058 / B5059 / B5060', '1', 1),
(125, 'TEM', '00000125', '27', 'A', '2BR', 'B6075 / B6076', '1', 1),
(126, 'TEM', '00000126', '27', 'B', '3BR', 'B4005 / B4006 / B4007', '1', 1),
(127, 'TEM', '00000127', '27', 'C', '2BR', 'B5001 / B5002', '1', 1),
(128, 'TEM', '00000128', '27', 'D', '3BR', 'B4104 / B4105 / B4106', '1', 1),
(129, 'TEM', '00000129', '28', 'A', '2BR', 'B6063 / B6064', '1', 1),
(130, 'TEM', '00000130', '28', 'B', '3BR', 'B4038 / B4039 / B4040', '1', 1),
(131, 'TEM', '00000131', '28', 'C', '3BR', 'B5117 / B5118 / B3056', '1', 1),
(132, 'TEM', '00000132', '28', 'D', '3BR Premium', 'B5051 / B5052 / B5053 / B5054', '1', 1),
(133, 'TEM', '00000133', '29', 'A', '3BR', 'B6108 / B6109 / B6110', '1', 1),
(134, 'TEM', '00000134', '29', 'B', '3BR Premium', 'B4115 / B4116 / B4117 / B4118', '1', 1),
(135, 'TEM', '00000135', '29', 'C', '3BR', 'B4018 / B4019 / B4020', '1', 1),
(136, 'TEM', '00000136', '29', 'D', '3BR Premium', 'B2013 / B2014 / B2015 / B2016', '1', 1),
(137, 'TEM', '00000137', '30', 'A', '3BR', 'B5093 / B5094 / B3054', '1', 1),
(138, 'TEM', '00000138', '30', 'B', '3BR Premium', 'B4127 / B4128 / B4129 / B4130', '1', 1),
(139, 'TEM', '00000139', '30', 'C', '3BR', 'B6024 / B6025 / B6026', '1', 1),
(140, 'TEM', '00000140', '30', 'D', '3BR Premium', 'B4089 / B4090 / B4091 / B4092', '1', 1),
(141, 'TEM', '00000141', '31', 'A', '3BR', 'B5089 / B5090 / B3052', '1', 1),
(142, 'TEM', '00000142', '31', 'B', '3BR Premium', 'B4093 / B4094 / B4113 / B4114', '1', 1),
(143, 'TEM', '00000143', '31', 'C', '3BR', 'B6033 / B6034 / B6035', '1', 1),
(144, 'TEM', '00000144', '31', 'D', '3BR Premium', 'B4073 / B4074 / B4075 / B4076', '1', 1),
(145, 'TEM', '00000145', '32', 'A', '3BR', 'B5129 / B5130 / B3050', '1', 1),
(146, 'TEM', '00000146', '32', 'B', '3BR Premium', 'B4077 / B4078 / B4079 / B4080', '1', 1),
(147, 'TEM', '00000147', '32', 'C', '3BR', 'B6065 / B6066 / B6067', '1', 1),
(148, 'TEM', '00000148', '32', 'D', '3BR Premium', 'B4061 / B4062 / B4063 / B4064', '1', 1),
(149, 'TEM', '00000149', '33', 'A', '3BR', 'B5085 / B5086 / B3048', '1', 1),
(150, 'TEM', '00000150', '33', 'B', '3BR Premium', 'B4030 / B4031 / B4046 / B4047', '1', 1),
(151, 'TEM', '00000151', '33', 'C', '3BR', 'B5104 / B5105 / B5106', '1', 1),
(152, 'TEM', '00000152', '33', 'D', '3BR Premium', 'B3072 / B3073 / B3074 / B3075', '1', 1),
(153, 'TEM', '00000153', '35', 'A', '3BR', 'B6005 / B6006 / B6007', '1', 1),
(154, 'TEM', '00000154', '35', 'B', '3BR Premium', 'B1052 / B1053 / B1054 / B1055', '1', 1),
(155, 'TEM', '00000155', '35', 'C', '3BR', 'B5081 / B5082 / B3046', '1', 1),
(156, 'TEM', '00000156', '35', 'D', '3BR Premium', 'B3020 / B3021 / B3077 / B3078', '1', 1),
(157, 'TEM', '00000157', '36', 'A', '3BR', 'B5098 / B5099 / B5100', '1', 1),
(158, 'TEM', '00000158', '36', 'B', '3BR Premium', 'B3022 / B3023 / B3024 / B3025', '1', 1),
(159, 'TEM', '00000159', '36', 'C', '3BR', 'B5077 / B5078 / B2056', '1', 1),
(160, 'TEM', '00000160', '36', 'D', '3BR Premium', 'B3005 / B3006 / B3007 / B3008', '1', 1),
(161, 'TEM', '00000161', '37', 'A', '3BR', 'B5043 / B5044 / B5045', '1', 1),
(162, 'TEM', '00000162', '37', 'B', '3BR Premium', 'B3027 / B3028 / B3029 / B3030', '1', 1),
(163, 'TEM', '00000163', '37', 'C', '3BR', 'B5073 / B5074 / B2054', '1', 1),
(164, 'TEM', '00000164', '37', 'D', '3BR Premium', 'B3013 / B3014 / B3015 / B3016', '1', 1),
(165, 'TEM', '00000165', '38', 'A', '3BR', 'B5055 / B5056 / B5057', '1', 1),
(166, 'TEM', '00000166', '38', 'B', '3BR Premium', 'B3035 / B3036 / B3037 / B3038', '1', 1),
(167, 'TEM', '00000167', '38', 'C', '3BR', 'B5069 / B5070 / B2052', '1', 1),
(168, 'TEM', '00000168', '38', 'D', '3BR Premium', 'B3017 / B3018 / B3019 / B3026', '1', 1),
(169, 'TEM', '00000169', '39', 'A', '3BR', 'B4032 / B4033 / B4034', '1', 1),
(170, 'TEM', '00000170', '39', 'B', '3BR Premium', 'B2072 / B2073 / B2074 / B2075', '1', 1),
(171, 'TEM', '00000171', '40', 'A', '3BR', 'B4055 / B4056 / B4057', '1', 1),
(172, 'TEM', '00000172', '40', 'B', '3BR Premium', 'B1010 / B1011 / B1012 / B1013', '1', 1),
(173, 'TEM', '00000173', '41', 'A', '3BR', 'B5063 / B5064 / B2050', '1', 1),
(174, 'TEM', '00000174', '41', 'B', '3BR Premium', 'B2001 / B2002 / B2003 / B2004', '1', 1),
(175, 'TEM', '00000175', '42', 'A', '3BR', 'B4015 / B4016 / B4017', '1', 1),
(176, 'TEM', '00000176', '42', 'B', '3BR Premium', 'B2009 / B2010 / B2011 / B2012', '1', 1),
(177, 'TEM', '00000177', '45', 'A', '3BR', 'B6132 / B6133 / B6134', '1', 1),
(178, 'TEM', '00000178', '45', 'B', '3BR Premium', 'B2005 / B2006 / B2007 / B2008', '1', 1),
(179, 'TEM', '00000179', '46', 'A', '3BR', 'B4098 / B4099 / B4100', '1', 1),
(180, 'TEM', '00000180', '46', 'B', '3BR Premium', 'B2039 / B2040 / B2057 / B2058', '1', 1),
(181, 'TEM', '00000181', '47', 'A', '3BR', 'B6114 / B6115 / B6116', '1', 1),
(182, 'TEM', '00000182', '47', 'B', '3BR Premium', 'B2027 / B2028 / B2029 / B2030', '1', 1),
(183, 'TEM', '00000183', '48', 'A', '3BR', 'B4021 / B4022 / B4023', '1', 1),
(184, 'TEM', '00000184', '48', 'B', '3BR Premium', 'B2017 / B2018 / B2019 / B2026', '1', 1),
(185, 'TEM', '00000185', '49', 'A', 'Sub Penthouse', 'B1026 / B1027 / B1028 / B1029', '1', 1),
(186, 'TEM', '00000186', '49', 'B', 'Sub Penthouse', 'B1018 / B1019 / B1020 / B1021', '1', 1),
(187, 'TEM', '00000187', '50', 'A', 'Super Penthouse', 'B1036 / B1037 / B1038 / B1039 / B1040 / B1041', '1', 1),
(188, 'TEM', '00000188', '50', 'B', 'Super Penthouse', 'B1001 / B1002 / B1003 / B1004 / B1005 / B1006', '1', 1),
(189, 'ST', '00000001', '1', 'A', '2BR', 'B6135 / B6136', '1', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_unit_type`
--

CREATE TABLE `tbl_unit_type` (
  `id` int(11) NOT NULL,
  `unit_type` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_unit_type`
--

INSERT INTO `tbl_unit_type` (`id`, `unit_type`, `status`) VALUES
(1, 'One Bedroom', 0),
(2, 'Two Bedroom', 0),
(3, 'Studio', 0),
(4, '2BR', 0);

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
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `last_logon` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `firstname`, `middlename`, `lastname`, `position`, `username`, `password`, `email_address`, `creation_date`, `created_by`, `status`, `last_logon`) VALUES
(1, 'Daenerys', 'Mai', 'Targaryen', 1, 'dmtargaryen', 'WGZmYTVQK0FLOXl1T2w3L0xzYVV4QT09', '', '2019-10-28 06:38:24', '3', 1, '0000-00-00 00:00:00'),
(3, 'Janelle', 'Mendoza', 'Dome', 2, 'jmdome', 'WGZmYTVQK0FLOXl1T2w3L0xzYVV4QT09', '', '2019-10-28 07:03:04', '3', 0, '0000-00-00 00:00:00'),
(4, 'Jane', '', 'Kent', 4, 'jkent', 'WGZmYTVQK0FLOXl1T2w3L0xzYVV4QT09', '', '2019-10-28 07:31:35', '3', 1, '0000-00-00 00:00:00'),
(7, 'Clark', 'Ty', 'Brookes', 7, 'ctbrookes', 'WGZmYTVQK0FLOXl1T2w3L0xzYVV4QT09', '', '2019-10-28 08:02:42', '3', 1, '2019-12-02 06:42:41'),
(8, 'Dinah', 'Mai', 'Targaryen', 6, 'dimtargaryen', 'WGZmYTVQK0FLOXl1T2w3L0xzYVV4QT09', '', '2019-10-29 03:02:38', '3', 1, '2019-11-26 07:01:58'),
(9, 'Vendor', 'Ty', 'Eclarinal', 9, 'vteclarinal', 'WGZmYTVQK0FLOXl1T2w3L0xzYVV4QT09', '', '2019-10-29 03:09:30', '3', 0, '2019-10-30 04:05:24'),
(14, 'Bon', '', 'Poseidon', 10, 'bposeidon', 'WGZmYTVQK0FLOXl1T2w3L0xzYVV4QT09', '', '2019-10-29 03:23:43', '3', 1, '2019-11-27 03:06:32'),
(15, 'Amarah', 'Jane', 'Lopez', 0, 'ajlopez', 'WGZmYTVQK0FLOXl1T2w3L0xzYVV4QT09', '', '2019-10-29 05:24:37', '3', 1, '2019-12-02 06:58:12'),
(16, 'Jheaster Irish', 'Perez', 'Santos', 10, 'jpsantos', 'WGZmYTVQK0FLOXl1T2w3L0xzYVV4QT09', '', '2019-10-30 00:49:55', '15', 1, '2019-12-02 06:48:49'),
(17, 'Jernalyn', '', 'Rodriguez', 1, 'jrodriguez', 'Ynd0WlFMVmVISVpPamk3UUVQL1p4QT09', '', '2019-11-12 05:36:09', '15', 1, '0000-00-00 00:00:00');

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
-- AUTO_INCREMENT for table `tbl_buyers`
--
ALTER TABLE `tbl_buyers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT for table `tbl_checking_areas`
--
ALTER TABLE `tbl_checking_areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_tickets_images`
--
ALTER TABLE `tbl_tickets_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_ticket_checklist`
--
ALTER TABLE `tbl_ticket_checklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_turnover_schedule`
--
ALTER TABLE `tbl_turnover_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `tbl_units`
--
ALTER TABLE `tbl_units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `tbl_unit_type`
--
ALTER TABLE `tbl_unit_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_user_pwd_history`
--
ALTER TABLE `tbl_user_pwd_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
