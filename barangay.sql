-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2019 at 10:40 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barangay`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `id` int(11) NOT NULL,
  `fname` varchar(500) NOT NULL,
  `lname` varchar(500) NOT NULL,
  `mname` varchar(500) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `occupation` varchar(500) NOT NULL,
  `birthday` varchar(500) NOT NULL,
  `sex` varchar(500) NOT NULL,
  `fingerprint` varchar(1000) NOT NULL,
  `email` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`id`, `fname`, `lname`, `mname`, `address`, `occupation`, `birthday`, `sex`, `fingerprint`, `email`) VALUES
(39, 'john', 'guardian', 'llanderal', 'bagbag', 'none', 'Wednesday, 1 January 1958', 'Male', 'U9DQ9V0FCX.fpt', 'guardian@gmail.com'),
(38, 'sdsdasdsadas', 'asdasd', 'asdasd', 'bagbag', 'none', 'Wednesday, 25 September 2019', 'Male', '31OMDON7ZK.fpt', 'asd@gmail.com'),
(36, 'ivan', 'josep', 'cando', 'Bagbag', 'None', 'Monday, 23 September 1996', 'Male', '1LLJVCF8XI.fpt', 'ivan_923@yahoo.com'),
(37, 'rigel', 'cagande', 'maas', 'bagbag', 'none', 'Saturday, 4 May 2019', 'Male', '81R3J7W81L.fpt', 'rigel@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `biodatas`
--

CREATE TABLE `biodatas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fingerprint` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blotter`
--

CREATE TABLE `blotter` (
  `id` int(11) NOT NULL,
  `suspect` varchar(500) NOT NULL,
  `victim` varchar(500) NOT NULL,
  `reason` varchar(1000) NOT NULL,
  `datetime` varchar(500) NOT NULL,
  `place` varchar(500) NOT NULL,
  `fingerprint` varchar(1000) NOT NULL,
  `deleted_at` varchar(200) DEFAULT NULL,
  `updated_at` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blotter`
--

INSERT INTO `blotter` (`id`, `suspect`, `victim`, `reason`, `datetime`, `place`, `fingerprint`, `deleted_at`, `updated_at`) VALUES
(13, 'john', 'maceh', 'Threat', 'Wednesday, 25 September 2019', 'STI NOVA', '841MEYQ22I.fpt', NULL, '2019-09-26 02:46:23'),
(12, 'sdasdasdasd', 'ivan', 'threat', 'Tuesday, 24 September 2019', 'seminaryo', '63A7FH81MZ.fpt', NULL, '2019-09-26 02:34:42'),
(11, 'Ivan Josep', 'rigel', 'snatching', 'Tuesday, 24 September 2019', 'Bagbag', 'LX1DTGZ9G5.fpt', NULL, '2019-09-26 02:45:34');

-- --------------------------------------------------------

--
-- Table structure for table `blotters`
--

CREATE TABLE `blotters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `suspect` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `victim` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fingerprint` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cashiers`
--

CREATE TABLE `cashiers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `receipt_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resident` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_total` bigint(20) DEFAULT NULL,
  `total_amount` bigint(20) DEFAULT NULL,
  `pay_amount` bigint(20) DEFAULT NULL,
  `change` bigint(20) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Completed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cashiers`
--

INSERT INTO `cashiers` (`id`, `receipt_no`, `resident`, `tin`, `contact`, `address`, `discount`, `sub_total`, `total_amount`, `pay_amount`, `change`, `status`, `created_at`, `updated_at`) VALUES
(1, '000000', 'sdfsdf', '000000000', '09055171321', 'Barangay Bagbag', '32', NULL, 0, 232, 0, 'Completed', '2019-09-22 18:44:35', '2019-09-22 18:44:35'),
(2, '000001', 'Cess', '000000000', '09055171321', 'Barangay Bagbag', '100', NULL, 0, 1000, 0, 'Completed', '2019-09-23 04:41:07', '2019-09-23 04:41:07'),
(3, '000002', 'cess dela', '000000000', '09055171321', 'Barangay Bagbag', '5', NULL, 0, 100, 0, 'Completed', '2019-09-23 08:38:05', '2019-09-23 08:38:05'),
(4, '000003', 'cess', '000000000', '09055171321', 'Barangay Bagbag', '0', NULL, 0, 0, 0, 'Completed', '2019-09-25 05:39:16', '2019-09-25 05:39:16'),
(5, '000004', 'ivan', '000000000', '09055171321', 'Barangay Bagbag', '10', NULL, 0, 100, 0, 'Completed', '2019-09-25 05:41:56', '2019-09-25 05:41:56'),
(6, '000005', 'ivan', '000000000', '09055171321', 'Barangay Bagbag', '1', NULL, 0, 100, 0, 'Completed', '2019-09-25 08:40:57', '2019-09-25 08:40:57');

-- --------------------------------------------------------

--
-- Table structure for table `certifications`
--

CREATE TABLE `certifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `resident_id` bigint(20) UNSIGNED NOT NULL,
  `purpose` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certifications`
--

INSERT INTO `certifications` (`id`, `resident_id`, `purpose`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Businness', '1005486352.png', '2019-09-23 04:42:39', '2019-09-23 04:42:39'),
(2, 4, 'Businness', '1638242715.jpg', '2019-09-25 06:17:47', '2019-09-25 06:17:47'),
(3, 4, 'Business', '284319521.jpg', '2019-09-25 08:39:52', '2019-09-25 08:39:52'),
(4, 4, 'test', '521983520.jpg', '2019-09-25 19:09:22', '2019-09-25 19:09:22'),
(5, 4, 'test', '1452918403.jpg', '2019-09-25 19:13:15', '2019-09-25 19:13:15'),
(6, 4, 'test', '1467601894.jpg', '2019-09-25 19:13:17', '2019-09-25 19:13:17'),
(7, 4, 'test', '1053730938.jpg', '2019-09-25 19:13:19', '2019-09-25 19:13:19'),
(8, 4, 'asdasd', '2097130208.png', '2019-09-25 19:13:32', '2019-09-25 19:13:32'),
(9, 4, 'asd', '623353662.png', '2019-09-25 19:17:41', '2019-09-25 19:17:41'),
(10, 4, 'test', '471232510.png', '2019-09-25 19:18:11', '2019-09-25 19:18:11');

-- --------------------------------------------------------

--
-- Table structure for table `clearances`
--

CREATE TABLE `clearances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_from` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_to` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `date`, `time_from`, `time_to`, `location`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 'testasd', 'asda', '2019-09-05', '14:32', '02:32', 'asdasd', '1', '938989627.png', '2019-09-22 18:42:08', '2019-09-22 18:42:08');

-- --------------------------------------------------------

--
-- Table structure for table `incident_types`
--

CREATE TABLE `incident_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `incident_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kagawads`
--

CREATE TABLE `kagawads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(38, '2014_10_12_000000_create_users_table', 2),
(39, '2014_10_12_100000_create_password_resets_table', 2),
(40, '2019_08_10_113615_create_missions_table', 2),
(41, '2019_08_11_105947_create_events_table', 2),
(42, '2019_08_12_054659_create_announcements_table', 2),
(43, '2019_08_12_151346_create_projects_table', 2),
(44, '2019_08_25_230300_create_incident_types_table', 2),
(45, '2019_08_26_005411_create_kagawads_table', 2),
(46, '2019_08_26_011630_create_positions_table', 2),
(47, '2019_08_27_201821_create_cashiers_table', 2),
(48, '2019_08_27_202607_create_clearances_table', 2),
(49, '2019_08_27_212803_create_residents_table', 2),
(50, '2019_08_27_223831_create_blotters_table', 2),
(51, '2019_09_09_142212_create_transactions_table', 2),
(20, '2019_09_22_221401_create_biodatas_table', 1),
(52, '2019_09_09_184110_create_receipts_table', 2),
(53, '2019_09_16_004908_create_queue_numbers_table', 2),
(54, '2019_09_19_113346_create_certifications_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `missions`
--

CREATE TABLE `missions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mission` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'Mission',
  `vission` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'Vission',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `missions`
--

INSERT INTO `missions` (`id`, `mission`, `vission`, `created_at`, `updated_at`) VALUES
(1, 'Mission', 'Vission', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `date`, `image`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test', '2019-09-23', '1327718825.jpg', '2019-09-23 02:30:46', '2019-09-23 02:30:46'),
(2, 'asdas', 'asdasd', '2019-09-24', '808722677.jpg', '2019-09-23 02:31:28', '2019-09-23 02:31:28'),
(4, 'try', 'sf', '2019-09-23', '80380996.jpg', '2019-09-23 02:34:28', '2019-09-23 02:34:28'),
(5, 'try', 'asd', '2019-09-23', '2029400226.jpg', '2019-09-23 02:39:23', '2019-09-23 02:39:23');

-- --------------------------------------------------------

--
-- Table structure for table `queue_numbers`
--

CREATE TABLE `queue_numbers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receipts`
--

INSERT INTO `receipts` (`id`, `tin`, `contact`, `address`, `created_at`, `updated_at`) VALUES
(1, '000000000', '09055171321', 'Barangay Bagbag', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `residents`
--

CREATE TABLE `residents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `biodata_fingerprint` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resident_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `citizenship` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `civil_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthplace` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `educational` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_presented` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `residents`
--

INSERT INTO `residents` (`id`, `biodata_fingerprint`, `reference`, `surname`, `firstname`, `middlename`, `nickname`, `resident_date`, `citizenship`, `gender`, `civil_status`, `birthday`, `age`, `birthplace`, `contact_no`, `current_address`, `other_address`, `educational`, `occupation`, `card_presented`, `email`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 'R-0000001-2019', 'llagas', 'Princess', 'lauron', 'cess', '1997-09-30', 'sdgsa', 'female', 'Single', '1997-09-29', '22', 'manila', '09533245342', 'gdggs', 'caloocan', 'college level', 'na', 'sgag', 'cess@gmail.com', NULL, '2019-09-23 04:31:46', '2019-09-23 04:31:46'),
(2, NULL, 'R-0000002-2019', 'asssd', 'asd', 'asd', 'asd', '2019-09-03', 'asdasd', 'male', 'Widowed', '2019-09-23', '23', 'asd', '232323', 'asdasd', 'asd', 'asd', 'asd', 'asd', 'asdasd@gmail.com', NULL, '2019-09-23 09:21:14', '2019-09-23 09:21:14'),
(3, NULL, 'R-0000003-2019', 'asdas', 'asd', 'asd', 'asd', '2008-01-28', 'asd', 'male', 'Widowed', '2019-11-29', '23', 'Quezon City', '11111111111', 'bagbag', NULL, 'asd', 'asd', 'asd', 'asd@yahoo.com', NULL, '2019-09-23 09:23:26', '2019-09-23 09:23:26'),
(4, NULL, 'R-0000004-2019', 'Josep', 'Ivan', 'Cando', 'van', '1999-01-25', 'Filipino', 'male', 'Widowed', '2009-11-29', '23', 'Quezon Cit', '09216442268', 'Bagbag', NULL, 'College', 'None', 'Voter\'s ID', 'ivan_923@yahoo.com', NULL, '2019-09-23 09:32:04', '2019-09-23 09:32:04'),
(5, NULL, 'R-0000005-2019', 'cagande', 'rigel ken', 'maas', 'gel', '2010-05-04', 'Filipino', 'male', 'Married', '2019-12-31', '21', 'Quezon City', '09216442268', 'Bagbag', NULL, 'College', 'None', 'Voter\'s ID', 'rigel@yahoo.com', NULL, '2019-09-23 09:38:15', '2019-09-23 09:38:15'),
(6, NULL, 'R-0000006-2019', 'asdsdasd', 'asdasd', 'asdasd', 'asdasd', '2019-12-31', 'Filipino', 'male', 'Married', '1997-11-30', '23', 'Quezon City', '09216442268', 'bagbag', NULL, 'College', 'None', 'voter\'s id', 'asd@gmail.com', NULL, '2019-09-25 06:12:06', '2019-09-25 06:12:06'),
(7, NULL, 'R-0000007-2019', 'Guardian', 'John', 'Llanderal', 'john', '1998-09-09', 'Filipino', 'male', 'Single', '1958-01-01', '24', 'Quezon City', '22222222222', 'Bagbag', NULL, 'College', 'STI Professor', 'Voter\'s ID', 'guardian@yahoo.com', NULL, '2019-09-25 08:35:03', '2019-09-25 08:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cashier_id` bigint(20) UNSIGNED NOT NULL,
  `item` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `cashier_id`, `item`, `quantity`, `price`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 'sd', '23', '2', '46', '2019-09-22 18:44:35', '2019-09-22 18:44:35'),
(2, 2, 'sample', '2', '20', '40', '2019-09-23 04:41:08', '2019-09-23 04:41:08'),
(3, 2, 'tasd', '2', '100', '200', '2019-09-23 04:41:31', '2019-09-23 04:41:31'),
(4, 3, 'Clearance', '1', '53', '53', '2019-09-23 08:38:05', '2019-09-23 08:38:05'),
(5, 4, 'Cedula', '1', '53', '53', '2019-09-25 05:39:16', '2019-09-25 05:39:16'),
(6, 4, 'Clearance', '1', '50', '50', '2019-09-25 05:40:21', '2019-09-25 05:40:21'),
(7, 5, 'Clearance', '1', '53', '53', '2019-09-25 05:41:56', '2019-09-25 05:41:56'),
(8, 6, 'Cedula', '1', '53', '53', '2019-09-25 08:40:57', '2019-09-25 08:40:57');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'password', 1),
(2, 'cashier', 'password', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `surname`, `email`, `email_verified_at`, `password`, `role`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admininistrator', '', '', 'admin@gmail.com', NULL, '$2y$10$mGVC8yPZ1V80w6/b6we2WOfvwV7ly8QB/YbMa6IIFe11Sr81jgulO', 'Super Admin', NULL, NULL, NULL, NULL),
(2, 'Princess', 'lauron', 'llagas', 'cess@gmail.com', NULL, '$2y$10$eOkoi4QxCCxrC6UvHWqCy.CQK8Vi7a7uVi832ovxftMuqm6tlDI/u', 'User', NULL, NULL, '2019-09-23 04:31:47', '2019-09-23 04:31:47'),
(3, 'ivan', 'cando', 'josep', 'ivan_923@yahoo.com', NULL, '$2y$10$DAk3t3LCSr.fonaSHevlKO9lZYd1fO2isE3aGFcD2lwUXkwGSJiHy', 'Cashier', NULL, NULL, '2019-09-23 08:36:40', '2019-09-23 08:36:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `biodatas`
--
ALTER TABLE `biodatas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blotter`
--
ALTER TABLE `blotter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blotters`
--
ALTER TABLE `blotters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashiers`
--
ALTER TABLE `cashiers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certifications`
--
ALTER TABLE `certifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `certifications_resident_id_foreign` (`resident_id`);

--
-- Indexes for table `clearances`
--
ALTER TABLE `clearances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incident_types`
--
ALTER TABLE `incident_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kagawads`
--
ALTER TABLE `kagawads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `missions`
--
ALTER TABLE `missions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queue_numbers`
--
ALTER TABLE `queue_numbers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `queue_numbers_user_id_foreign` (`user_id`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `residents`
--
ALTER TABLE `residents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_cashier_id_foreign` (`cashier_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `biodatas`
--
ALTER TABLE `biodatas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blotter`
--
ALTER TABLE `blotter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `blotters`
--
ALTER TABLE `blotters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cashiers`
--
ALTER TABLE `cashiers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `certifications`
--
ALTER TABLE `certifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `clearances`
--
ALTER TABLE `clearances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `incident_types`
--
ALTER TABLE `incident_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kagawads`
--
ALTER TABLE `kagawads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `missions`
--
ALTER TABLE `missions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `queue_numbers`
--
ALTER TABLE `queue_numbers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `residents`
--
ALTER TABLE `residents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `certifications`
--
ALTER TABLE `certifications`
  ADD CONSTRAINT `certifications_resident_id_foreign` FOREIGN KEY (`resident_id`) REFERENCES `residents` (`id`);

--
-- Constraints for table `queue_numbers`
--
ALTER TABLE `queue_numbers`
  ADD CONSTRAINT `queue_numbers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_cashier_id_foreign` FOREIGN KEY (`cashier_id`) REFERENCES `cashiers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
