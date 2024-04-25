-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 15, 2019 at 04:55 PM
-- Server version: 5.6.41-84.1-log
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thetezft_uportaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Appliance Repair', '2019-02-18 09:31:13', '2019-02-18 09:31:13'),
(2, 'Beauty & Spa', '2019-02-18 09:31:24', '2019-02-18 09:31:24'),
(3, 'Home Cleaning & Repairs', '2019-02-18 09:31:39', '2019-02-18 09:31:39'),
(4, 'Business & Taxes', '2019-02-18 09:31:57', '2019-02-18 09:31:57'),
(5, 'Personal & More', '2019-02-18 09:32:16', '2019-02-18 09:32:16'),
(6, 'Wedding & Events', '2019-02-18 09:39:44', '2019-02-18 09:39:44'),
(7, 'Car Services', '2019-02-18 18:45:40', '2019-02-18 18:49:11'),
(8, 'Education Service', '2019-02-22 18:35:36', '2019-02-22 18:37:09'),
(9, 'Maid Service', '2019-02-22 18:35:47', '2019-02-22 18:35:47'),
(10, 'Pandit & Pooja Service', '2019-02-22 18:36:07', '2019-02-22 18:37:21'),
(11, 'IT Services', '2019-03-09 02:42:26', '2019-03-09 02:42:26'),
(12, 'Others', '2019-03-27 08:27:37', '2019-03-27 08:27:37');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city`, `created_at`, `updated_at`) VALUES
(2, 'Nagpur', '2019-02-18 09:30:24', '2019-02-18 09:30:24'),
(4, 'Delhi NCR', '2019-02-18 09:30:35', '2019-02-18 09:30:35'),
(5, 'Patna', '2019-02-18 17:56:23', '2019-02-18 17:56:23'),
(6, 'Saguna More, Patna', '2019-03-12 17:31:11', '2019-03-12 17:31:11'),
(7, 'Maurya Lok, Patna', '2019-03-12 17:31:20', '2019-03-12 17:31:20'),
(8, 'Kankarbagh, Patna', '2019-03-12 17:31:26', '2019-03-12 17:31:26'),
(9, 'Boring Road, Patna', '2019-03-12 17:31:48', '2019-03-12 17:31:48'),
(10, 'Araria', '2019-04-20 20:09:32', '2019-04-20 20:09:32'),
(11, 'Arwal', '2019-04-20 20:09:45', '2019-04-20 20:09:45'),
(12, 'Aurangabad', '2019-04-20 20:09:52', '2019-04-20 20:09:52'),
(13, 'Banka', '2019-04-20 20:10:02', '2019-04-20 20:10:02'),
(14, 'Begusarai', '2019-04-20 20:10:12', '2019-04-20 20:10:12'),
(15, 'Bhagalpur', '2019-04-20 20:10:19', '2019-04-20 20:10:19'),
(16, 'Bhojpur', '2019-04-20 20:10:29', '2019-04-20 20:10:29'),
(17, 'Buxar', '2019-04-20 20:10:35', '2019-04-20 20:10:35'),
(18, 'Darbhanga', '2019-04-20 20:10:47', '2019-04-20 20:10:47'),
(19, 'East Champaran', '2019-04-20 20:10:56', '2019-04-20 20:10:56'),
(20, 'Gaya', '2019-04-20 20:11:06', '2019-04-20 20:11:06'),
(21, 'Gopalganj', '2019-04-20 20:11:12', '2019-04-20 20:11:12'),
(22, 'Jamui', '2019-04-20 20:11:23', '2019-04-20 20:11:23'),
(23, 'Jehanabad', '2019-04-20 20:11:28', '2019-04-20 20:11:28'),
(24, 'Khagaria', '2019-04-20 20:11:36', '2019-04-20 20:11:36'),
(25, 'Kishanganj', '2019-04-20 20:11:47', '2019-04-20 20:11:47'),
(26, 'Kaimur', '2019-04-20 20:11:52', '2019-04-20 20:11:52'),
(27, 'Katihar', '2019-04-20 20:12:00', '2019-04-20 20:12:00'),
(28, 'Lakhisarai', '2019-04-20 20:12:09', '2019-04-20 20:12:09'),
(29, 'Madhubani', '2019-04-20 20:12:17', '2019-04-20 20:12:17'),
(30, 'Munger', '2019-04-20 20:12:25', '2019-04-20 20:12:25'),
(31, 'Madhepura', '2019-04-20 20:12:34', '2019-04-20 20:12:34'),
(32, 'Muzaffarpur', '2019-04-20 20:12:42', '2019-04-20 20:12:42'),
(33, 'Nalanda', '2019-04-20 20:12:49', '2019-04-20 20:12:49'),
(34, 'Nawada', '2019-04-20 20:12:57', '2019-04-20 20:12:57'),
(35, 'Purnia', '2019-04-20 20:13:05', '2019-04-20 20:13:05'),
(36, 'Rohtas', '2019-04-20 20:13:17', '2019-04-20 20:13:17'),
(37, 'Saharsa', '2019-04-20 20:13:27', '2019-04-20 20:13:27'),
(38, 'Samastipur', '2019-04-20 20:13:36', '2019-04-20 20:13:36'),
(39, 'Sheohar', '2019-04-20 20:13:45', '2019-04-20 20:13:45'),
(40, 'Sheikhpura', '2019-04-20 20:13:52', '2019-04-20 20:13:52'),
(41, 'Saran', '2019-04-20 20:14:00', '2019-04-20 20:14:00'),
(42, 'Sitamarhi', '2019-04-20 20:14:09', '2019-04-20 20:14:09'),
(43, 'Supaul', '2019-04-20 20:14:23', '2019-04-20 20:14:23'),
(44, 'Siwan', '2019-04-20 20:14:30', '2019-04-20 20:14:30'),
(45, 'Vaishali', '2019-04-20 20:14:41', '2019-04-20 20:14:41'),
(46, 'West Champaran', '2019-04-20 20:14:47', '2019-04-20 20:14:47'),
(47, 'Ranchi', '2019-04-20 20:18:24', '2019-04-20 20:18:24'),
(48, 'Dhanbad', '2019-04-20 20:18:28', '2019-04-20 20:18:28'),
(49, 'Giridih', '2019-04-20 20:18:38', '2019-04-20 20:18:38'),
(50, 'Purbi Singhbhum', '2019-04-20 20:18:47', '2019-04-20 20:18:47'),
(51, 'Bokaro', '2019-04-20 20:18:54', '2019-04-20 20:18:54'),
(52, 'Bokaro', '2019-04-20 20:19:07', '2019-04-20 20:19:07'),
(53, 'Palamu', '2019-04-20 20:19:13', '2019-04-20 20:19:13'),
(54, 'Hazaribagh', '2019-04-20 20:19:21', '2019-04-20 20:19:21'),
(55, 'Pashchimi Singhbhum', '2019-04-20 20:19:29', '2019-04-20 20:19:29'),
(56, 'Deoghar', '2019-04-20 20:19:37', '2019-04-20 20:19:37'),
(57, 'Garhwa', '2019-04-20 20:19:45', '2019-04-20 20:19:45'),
(58, 'Dumka', '2019-04-20 20:19:54', '2019-04-20 20:19:54'),
(59, 'Godda', '2019-04-20 20:20:01', '2019-04-20 20:20:01'),
(60, 'Sahibganj', '2019-04-20 20:20:09', '2019-04-20 20:20:09'),
(61, 'Saraikela-Kharsawan', '2019-04-20 20:20:17', '2019-04-20 20:20:17'),
(62, 'Chatra', '2019-04-20 20:20:25', '2019-04-20 20:20:25'),
(63, 'Gumla', '2019-04-20 20:20:34', '2019-04-20 20:20:34'),
(64, 'Ramgarh', '2019-04-20 20:20:45', '2019-04-20 20:20:45'),
(65, 'Pakur', '2019-04-20 20:20:55', '2019-04-20 20:20:55'),
(66, 'Jamtara', '2019-04-20 20:21:05', '2019-04-20 20:21:05'),
(67, 'Latehar', '2019-04-20 20:21:13', '2019-04-20 20:21:13'),
(68, 'Kodarma', '2019-04-20 20:21:22', '2019-04-20 20:21:22'),
(69, 'Simdega', '2019-04-20 20:21:32', '2019-04-20 20:21:32'),
(70, 'Khunti', '2019-04-20 20:21:36', '2019-04-20 20:21:36'),
(71, 'Lohardaga', '2019-04-20 20:21:44', '2019-04-20 20:21:44'),
(72, 'Indore', '2019-04-20 20:23:01', '2019-04-20 20:23:01'),
(73, 'Jabalpur', '2019-04-20 20:23:06', '2019-04-20 20:23:06'),
(74, 'Sagar', '2019-04-20 20:23:12', '2019-04-20 20:23:12'),
(75, 'Bhopal', '2019-04-20 20:23:21', '2019-04-20 20:23:21'),
(76, 'Rewa', '2019-04-20 20:23:27', '2019-04-20 20:23:27'),
(77, 'Satna', '2019-04-20 20:23:36', '2019-04-20 20:23:36'),
(78, 'Dhar', '2019-04-20 20:23:41', '2019-04-20 20:23:41'),
(79, 'Chhindwara', '2019-04-20 20:23:52', '2019-04-20 20:23:52'),
(80, 'Gwalior', '2019-04-20 20:24:01', '2019-04-20 20:24:01'),
(81, 'Ujjain', '2019-04-20 20:24:07', '2019-04-20 20:24:07'),
(82, 'Morena', '2019-04-20 20:24:14', '2019-04-20 20:24:14'),
(83, 'Khargone', '2019-04-20 20:24:20', '2019-04-20 20:24:20'),
(84, 'Chhatarpur', '2019-04-20 20:24:26', '2019-04-20 20:24:26'),
(85, 'Shivpuri', '2019-04-20 20:24:36', '2019-04-20 20:24:36'),
(86, 'Bhind', '2019-04-20 20:24:44', '2019-04-20 20:24:44'),
(87, 'Balaghat', '2019-04-20 20:24:50', '2019-04-20 20:24:50'),
(88, 'Betul', '2019-04-20 20:25:01', '2019-04-20 20:25:01'),
(89, 'Dewas', '2019-04-20 20:25:05', '2019-04-20 20:25:05'),
(90, 'Rajgarh', '2019-04-20 20:25:15', '2019-04-20 20:25:15'),
(91, 'Shajapur', '2019-04-20 20:25:22', '2019-04-20 20:25:22'),
(92, 'Vidisha', '2019-04-20 20:25:32', '2019-04-20 20:25:32'),
(93, 'Ratlam', '2019-04-20 20:25:38', '2019-04-20 20:25:38'),
(94, 'Tikamgarh', '2019-04-20 20:25:50', '2019-04-20 20:25:50'),
(95, 'Barwani', '2019-04-20 20:26:03', '2019-04-20 20:26:03'),
(96, 'Seoni', '2019-04-20 20:26:17', '2019-04-20 20:26:17'),
(97, 'Mandsaur', '2019-04-20 20:26:25', '2019-04-20 20:26:25'),
(98, 'Raisen', '2019-04-20 20:26:30', '2019-04-20 20:26:30'),
(99, 'Sehore', '2019-04-20 20:26:41', '2019-04-20 20:26:41'),
(100, 'Khandwa', '2019-04-20 20:26:50', '2019-04-20 20:26:50'),
(101, 'Katni', '2019-04-20 20:26:55', '2019-04-20 20:26:55'),
(102, 'Damoh', '2019-04-20 20:27:09', '2019-04-20 20:27:09'),
(103, 'Guna', '2019-04-20 20:27:14', '2019-04-20 20:27:14'),
(104, 'Hoshangabad', '2019-04-20 20:27:19', '2019-04-20 20:27:19'),
(105, 'Singrauli', '2019-04-20 20:27:30', '2019-04-20 20:27:30'),
(106, 'Sidhi', '2019-04-20 20:27:36', '2019-04-20 20:27:36'),
(107, 'Narsimhapur', '2019-04-20 20:27:42', '2019-04-20 20:27:42'),
(108, 'Shahdol', '2019-04-20 20:27:52', '2019-04-20 20:27:52'),
(109, 'Mandla', '2019-04-20 20:27:58', '2019-04-20 20:27:58'),
(110, 'Jhabua', '2019-04-20 20:28:07', '2019-04-20 20:28:07'),
(111, 'Panna', '2019-04-20 20:28:13', '2019-04-20 20:28:13'),
(112, 'Ashoknagar', '2019-04-20 20:28:22', '2019-04-20 20:28:22'),
(113, 'Neemuch', '2019-04-20 20:28:26', '2019-04-20 20:28:26'),
(114, 'Datia', '2019-04-20 20:28:36', '2019-04-20 20:28:36'),
(115, 'Burhanpur', '2019-04-20 20:28:42', '2019-04-20 20:28:42'),
(116, 'Anuppur', '2019-04-20 20:28:50', '2019-04-20 20:28:50'),
(117, 'Alirajpur', '2019-04-20 20:28:55', '2019-04-20 20:28:55'),
(118, 'Dindori', '2019-04-20 20:29:00', '2019-04-20 20:29:00'),
(119, 'Sheopur', '2019-04-20 20:29:07', '2019-04-20 20:29:07'),
(120, 'Umaria', '2019-04-20 20:29:22', '2019-04-20 20:29:22'),
(121, 'Harda', '2019-04-20 20:29:28', '2019-04-20 20:29:28');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `name`, `email`, `phone`, `profession`, `created_at`, `updated_at`) VALUES
(1, 'Rahul', 'trickuweb@gmail.com', '8252469683', 'AC Service & Repair', '2019-05-11 17:21:20', '2019-05-11 17:21:20');

-- --------------------------------------------------------

--
-- Table structure for table `guest_emails`
--

CREATE TABLE `guest_emails` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guest_emails`
--

INSERT INTO `guest_emails` (`id`, `user_id`, `email`, `relation`, `created_at`, `updated_at`) VALUES
(1, '1', 'praveen82524@gmail.com', 'Friend', '2019-05-09 19:46:14', '2019-05-09 19:46:14'),
(2, '10', 'praveen82524@gmail.com', 'Friend', '2019-05-10 06:04:29', '2019-05-10 06:04:29'),
(3, '10', 'trickuweb@gmail.com', 'Friend', '2019-05-10 06:04:39', '2019-05-10 06:04:39'),
(4, '17', 'meet2dipti@yahoo.com', 'Friend', '2019-05-10 12:13:30', '2019-05-10 12:13:30'),
(6, '10', 'praveenemalid@gmail.com', 'Friend', '2019-05-11 17:14:52', '2019-05-11 17:14:52');

-- --------------------------------------------------------

--
-- Table structure for table `guest_lists`
--

CREATE TABLE `guest_lists` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guest_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attending_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_guest` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guest_lists`
--

INSERT INTO `guest_lists` (`id`, `user_id`, `email`, `event_id`, `name`, `guest_email`, `attending_status`, `total_guest`, `slug`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, 'Test', 'test@gmail.com', 'Yes', '1', '1557431264birthday-party', '2019-05-09 19:48:28', '2019-05-09 19:48:28'),
(2, NULL, NULL, NULL, 'TrickuWeb', 'praveenemalid@gmail.com', 'Yes', '1', '1557594931birthday-party', '2019-05-11 17:17:47', '2019-05-11 17:17:47'),
(3, NULL, NULL, NULL, 'Praveen', 'trickuweb@gmail.com', 'Yes', '10', '1557594931birthday-party', '2019-05-11 17:19:04', '2019-05-11 17:19:04'),
(4, NULL, NULL, NULL, 'Praveen', 'praveen82524@gmail.com', 'Yes', '12', '1557594943birthday-party', '2019-05-11 17:34:29', '2019-05-11 17:34:29'),
(5, NULL, NULL, NULL, 'Prakash', 'test@gmail.com', 'May Be', '100', '1557669957nitin-shaadi', '2019-05-12 14:07:53', '2019-05-12 14:07:53'),
(6, NULL, NULL, NULL, 'Nikhil', 'nikil@gmail.com', 'Yes', '8', '1557669957nitin-shaadi', '2019-05-12 14:08:43', '2019-05-12 14:08:43'),
(7, NULL, NULL, NULL, 'Praveen', 'praveen82524@gmail.com', 'Yes', '112', '1557669967nitin-shaadi', '2019-05-12 14:43:53', '2019-05-12 14:43:53'),
(8, NULL, NULL, NULL, 'Praveen', 'praveen82524@gmail.com', 'Yes', '10', '1557683298slug-testing', '2019-05-12 17:48:51', '2019-05-12 17:48:51');

-- --------------------------------------------------------

--
-- Table structure for table `guest_phones`
--

CREATE TABLE `guest_phones` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guest_phones`
--

INSERT INTO `guest_phones` (`id`, `user_id`, `phone`, `relation`, `created_at`, `updated_at`) VALUES
(1, '17', '7979771140', 'Friend', '2019-05-10 12:14:21', '2019-05-10 12:14:21'),
(2, '17', '8102812009', 'Work', '2019-05-10 12:14:53', '2019-05-10 12:14:53'),
(3, '17', '7004216711', 'Work', '2019-05-10 12:15:41', '2019-05-10 12:15:41');

-- --------------------------------------------------------

--
-- Table structure for table `invitations`
--

CREATE TABLE `invitations` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hosted_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `co_hosted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landmark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` mediumtext COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invitations`
--

INSERT INTO `invitations` (`id`, `event_title`, `event_type`, `hosted_by`, `user_id`, `name`, `phone`, `email`, `co_hosted_by`, `event_date`, `event_time`, `event_phone`, `landmark`, `address`, `city`, `state`, `zip`, `message`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Birthday party', 'Birthday', 'Praveen', '1', 'Praveen', '8789529215', 'praveenemalid@gmail.com', NULL, '2019-05-13T19:46:00.000Z', '03:02 pm', '8252469683', 'Saguna More', 'Saguna', 'Patna', 'Bihar', NULL, 'Hi', '1557431272birthday-party', '2019-05-09 19:47:52', '2019-05-09 19:47:52'),
(2, 'Birthday Party', 'Birthday', 'Praveen', '10', 'TrickuWeb', NULL, 'trickuweb@gmail.com', NULL, '2019-05-16T06:03:00.000Z', '03:02 pm', '8789529215', 'Bihar', 'Saguna More Danapur Cantt, Gas Godawn Near Aata Chakki, Budhiyan Kuan Masjid', 'Patna', 'Bihar', NULL, NULL, '1557468255birthday-party', '2019-05-10 06:04:15', '2019-05-10 06:04:15'),
(3, 'Marraige Annivaersy', 'Birthday', 'Praveen', '10', 'TrickuWeb', NULL, 'trickuweb@gmail.com', NULL, '2019-05-15T06:04:00.000Z', '03:02 pm', '8789529215', 'Bihar', 'Saguna More Danapur Cantt, Gas Godawn Near Aata Chakki, Budhiyan Kuan Masjid', 'Patna', 'Bihar', NULL, NULL, '1557468314marraige-annivaersy', '2019-05-10 06:05:14', '2019-05-10 06:05:14'),
(4, 'Duggu\'s 6th birthday', 'Birthday', 'Shashank', '17', 'Shashank Shekhar', '6291746036', 'shashankit@yahoo.co.in', NULL, '2019-06-15T12:07:00.000Z', '07:00 pm', '6291746036', 'Bihar', 'C/O - MK Singh Thikedar Mother Teresa Road Ram Krishna Nagar', 'Patna', 'Bihar', NULL, NULL, '1557490165duggus-6th-birthday', '2019-05-10 12:09:25', '2019-05-10 12:09:25'),
(5, 'Duggu\'s 6th birthday', 'Birthday', 'Shashank', '17', 'Shashank Shekhar', '6291746036', 'shashankit@yahoo.co.in', NULL, '2019-06-06T12:15:00.000Z', '00:00', '6033743580', 'Missouri', '1637 Baronet Dr Apt A', 'WASHINGTON', 'DC', NULL, 'Please come', '1557490646duggus-6th-birthday', '2019-05-10 12:17:26', '2019-05-10 12:17:26'),
(6, 'Birthday Party', 'Birthday', 'Praveen', '10', 'TrickuWeb', NULL, 'trickuweb@gmail.com', NULL, '2019-05-09T17:14:00.000Z', '03:02 pm', '8252469683', 'Bihar', 'S/O PREM NATH PRASAD, BUDHIYAN KUAN NEAR MASJID', 'PATNA', 'Bihar', NULL, 'hi', '1557594943birthday-party', '2019-05-11 17:15:43', '2019-05-11 17:15:43'),
(7, 'Nitin shaadi', 'Shaadi', 'Praveen', '10', 'TrickuWeb', NULL, 'trickuweb@gmail.com', NULL, '2019-05-30T14:04:00.000Z', '04:02 pm', '8789529215', 'Saguna', 'Saguna more', 'Patna', 'Bihar', NULL, 'Come to the party', '1557669967nitin-shaadi', '2019-05-12 14:06:07', '2019-05-12 14:06:07'),
(8, 'Slug Testing', 'slug testing', 'Kumar', '10', 'TrickuWeb', NULL, 'trickuweb@gmail.com', NULL, '2019-05-23T17:47:00.000Z', '03:02 pm', '8252469683', 'Bihar', 'S/O PREM NATH PRASAD, BUDHIYAN KUAN NEAR MASJID', 'PATNA', 'Bihar', NULL, NULL, '1557683298slug-testing', '2019-05-12 17:48:27', '2019-05-12 17:48:27');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_02_14_182825_create_professionals_table', 1),
(9, '2019_02_16_095627_create_cities_table', 1),
(10, '2019_02_16_112350_create_categories_table', 1),
(11, '2019_02_16_194623_create_posts_table', 1),
(12, '2019_02_17_101041_create_subcategories_table', 1),
(13, '2019_03_02_065633_create_enquiries_table', 1),
(14, '2019_04_28_100550_create_invitations_table', 1),
(15, '2019_05_04_015759_create_guest_emails_table', 1),
(16, '2019_05_04_015837_create_guest_phones_table', 1),
(17, '2019_05_07_074622_create_guest_lists_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` mediumtext COLLATE utf8mb4_unicode_ci,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category`, `profession`, `about`, `city`, `photo1`, `photo2`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Home Cleaning & Repairs', 'Home Deep Cleaning', '<ul>\n <li>We provide all home cleaning services and we care of each and every corner of the house</li> \n<li> Our team will often start in this area of your home and will focus on your counters, cabinets, floors, dishwasher, stove, sinks etc. </li>\n<li> We use a careful system to deep clean each of your rooms on a rotation basis. </li> \n</ul>', NULL, '1550485319.jpeg', NULL, 'home-deep-cleaning', '2019-02-18 10:21:59', '2019-02-26 19:42:12'),
(2, 'Appliance Repair', 'Refrigerator Repair', '<ul>\n <li>We offer trained and professionals team are proficient in repairing any kind of refrigerator problem. </li> \n<li> We are dealing with any types of refrigerator services such as freeze repairing services. </li>\n<li> We can provide you the Quality & Quick service and faster than regular refrigerator service providers</li> \n</ul>', NULL, '1550486731.jpeg', NULL, 'refrigerator-repair', '2019-02-18 10:23:56', '2019-02-24 12:01:21'),
(3, 'Home Cleaning & Repairs', 'Plumbers', '<ul>\n <li>Arvice present their best in class Plumbing survives in India.</li> \n<li> We provide reasonable pricing; you can avail our Plumbing services anywhere in Bihar</li>\n<li> We serve best plumbing services all plumbing issues, whether it is related to bathroom, kitchen, drains, or toilet etc. </li> \n</ul>', NULL, '1550511449.jpeg', NULL, 'plumbers', '2019-02-18 17:37:29', '2019-02-24 11:52:44'),
(4, 'Beauty & Spa', 'Salon at Home for Women', '<ul>\n <li> Arvice provide best Salon and Beauty Services is an exclusive Salon around all over india</li> \n<li>Our aims to bring out your good looks and your personality</li>\n<li>We have been providing appointment salon service needs at your home. </li> \n</ul>', NULL, '1550511931.jpeg', NULL, 'salon-at-home-for-women', '2019-02-18 17:45:32', '2019-02-24 11:38:32'),
(5, 'Wedding & Events', 'Pre-Wedding Shoot', '<ul>\n <li> We provide best services for Wedding Photography, Pre Wedding Photo shoots, Kids & Family Portfolio, Conference Photography, Product Shoots etc</li> \n<li> We are one of the top wedding photographers in India and we also provide pre wedding photography service </li>\n<li> We are professionally qualified team and get best prices for the kind of services you get from us. </li> \n</ul>', NULL, '1550512064.jpeg', NULL, 'pre-wedding-shoot', '2019-02-18 17:47:44', '2019-02-24 12:19:05'),
(6, 'Beauty & Spa', 'Mehandi Artists', '<ul>\n <li>Arvice most talented Mehandi Artists an respected in this field</li> \n<li> We offer you a unique design bridal mehandi art and design service.</li> \n<li> We make your event impactful by filling the color and aroma of mehndi with best design\n</li> \n</ul>', NULL, '1550512206.jpeg', NULL, 'mehandi-artists', '2019-02-18 17:50:06', '2019-02-24 11:25:19'),
(7, 'Appliance Repair', 'Washing Machine Repair', '<ul> \n<li>we provide fast & reliable washing machine repair in india</li>\n<li>we have a very rigid hiring process which ensures only skilled, experienced take up your requirements.</li>\n<li>We repair all major brands of washing machine repair</li>\n</ul>', NULL, '1550512295.jpeg', NULL, 'washing-machine-repair', '2019-02-18 17:51:36', '2019-02-25 13:18:30'),
(8, 'Appliance Repair', 'RO & Water Purifier Repair', '<ul>\n <li>Arvice provides best experienced RO & Water Purifier Repair technicians.</li> \n<li> Our service costs are very competitive and our inspection charge is the lowest in the market</li> \n<li>We have technicians to fix all kind of water purifier models. </li> \n</ul>', NULL, '1550512388.jpeg', NULL, 'ro-water-purifier-repair', '2019-02-18 17:53:08', '2019-02-24 10:53:43'),
(9, 'Home Cleaning & Repairs', 'Carpet Cleaning', '<ul>\n<li>Keep your home looking and running great inside and out with our wide range of expert cleaning services.</li>\n<li> Eliminate dust mites, allergens and trapped-in soil</li>\n<li>Restore the natural, clean appearance and texture of the carpets</li>\n</ul>', NULL, '1550512479.jpeg', NULL, 'carpet-cleaning', '2019-02-18 17:54:39', '2019-02-24 10:46:37'),
(10, 'Home Cleaning & Repairs', 'Kitchen Deep Cleaning', '<ul><li>We have Well Equipped and Trained Team, who carries out Deep kitchen Cleaning and Sanitization with Non-Hazardous Chemicals</li><li>Get fast and efficient service</li><li> We offer the most affordable home cleaning services</li></ul>', NULL, '1550512522.jpeg', NULL, 'kitchen-deep-cleaning', '2019-02-18 17:55:22', '2019-02-23 09:32:41'),
(11, 'Beauty & Spa', 'Massage for Men', '<ul><li>Recharge yourself with body massage by senior male therapists at the comfort of your home.</li><li>Get highly trained and well hygined male therapist</li><li>We offer services like foot reflexology, swedish massage, deep tissue massage </li></ul>', NULL, '1550861257.jpeg', NULL, 'massage-for-men', '2019-02-18 18:00:15', '2019-02-26 19:38:54'),
(12, 'Beauty & Spa', 'Massage for women', '<ul><li>Recharge yourself with body massage by senior female therapists at the comfort of your home.</li><li>Get highly trained and well hygined female therapist</li><li>We offer services like foot reflexology, swedish massage, deep tissue massage </li></ul>', NULL, '11553936182.jpeg', NULL, 'massage-for-women', '2019-02-18 18:01:03', '2019-03-30 08:56:24'),
(13, 'Appliance Repair', 'AC Service & Repair', '<ul><li> Want a good spa facilty at your home?</li><li>Now select from various spa package and service</li><li>Choose your own time slot</li><li>  We provide trained & experienced female therapists who are hygiene friendly. They will recreate spa experience at home and it includes massage bed,oils, etc. To de-stress yourself book full body massage at home.</li></ul>', NULL, '1550512927.jpeg', NULL, 'ac-service-repair', '2019-02-18 18:02:07', '2019-02-23 09:29:30'),
(14, 'Wedding & Events', 'DJ', '<ul><li>Plannig for a DJ night in your  wedding reception?</li><li> We provide best DJ and sound facility</li><li>Get highly experienced and professional djs well equipped with backgroud music players and modern sound systems</li></ul>', NULL, '1550513022.jpeg', NULL, 'dj', '2019-02-18 18:03:42', '2019-02-23 09:28:15'),
(15, 'Wedding & Events', 'Bartender', '<ul><li>GET Nostalgic and full of variety drinks at your party</li><li>Get well dressed and highly trained waiters and bar tenders</li></ul>', NULL, '1550513092.jpeg', NULL, 'bartender', '2019-02-18 18:04:52', '2019-02-26 19:36:59'),
(16, 'Wedding & Events', 'Party Decoration', '<ul><li>Planning for big fat Indian wedding?</li><li> Get in touch with us</li><li>we provide best service for party decoration</li></ul>', NULL, '1550513148.jpeg', NULL, 'party-decoration', '2019-02-18 18:05:48', '2019-02-23 09:27:33'),
(17, 'Car Services', 'Car Wash', '<ul><li>Get the best car wash facility at your door steps</li><li>Complete indoor and out door car spa facility</li><li>Car interior decoration facility is also available</li></ul>', NULL, '1550515913.jpeg', NULL, 'car-wash', '2019-02-18 18:51:53', '2019-02-23 09:27:12'),
(18, 'Car Services', 'Car Rent', '<ul><li> We provide best car rent service </li> <li>Go anywhere in india with our expert chauffeurs </li>\n         <li>We also provide  self drive car facility</li>\n         <li>Our price are also reasonable</li>\n      </ul>', NULL, '1550516161.jpeg', NULL, 'car-rent', '2019-02-18 18:56:01', '2019-02-23 09:26:55'),
(19, 'Maid Service', 'Maid Service', '<ul><li>Want a domestic maid?</Li><li>Get well trained and registered domestic helper</li><li>Contact us and get highly trained and well behaved domestic maid at your home</li></ul>', NULL, '11553936280.jpeg', NULL, 'maid-service', '2019-02-22 18:40:03', '2019-03-30 08:58:01'),
(20, 'Maid Service', 'Microwave Repair', 'Microwave Repair', NULL, '11553936294.png', NULL, 'microwave-repair', '2019-03-04 19:24:50', '2019-03-30 08:58:15'),
(21, 'IT Services', 'Website Development', 'Get Your Website Developed with professionals', NULL, '11553936364.jpeg', NULL, 'website-development', '2019-03-09 02:44:27', '2019-03-30 08:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `professionals`
--

CREATE TABLE `professionals` (
  `id` int(10) UNSIGNED NOT NULL,
  `profession` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Not Listed',
  `about` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `professionals`
--

INSERT INTO `professionals` (`id`, `profession`, `profession_name`, `type`, `about`, `photo`, `state`, `city`, `name`, `phone`, `email`, `address`, `slug`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Others', 'Education Service', 'Partner', 'B. Tech electronics & communication', NULL, NULL, 'Patna', 'Giridhari Kumar', '8210214846', NULL, 'Kankerbag', 'others', '6', '2019-03-28 09:49:28', '2019-03-28 09:49:28'),
(2, 'Others', 'Others', 'Partner', 'Lic of India, Oriental insurance ( GIC), & Flights tickets booking ( 24×7 service)', NULL, NULL, 'Patna', 'Vivek Kumar', '9334497337', NULL, 'Vivek OnLine,1st floor,Mahadev Market,near-shalimar Sweet,above Axis Bank ATM,kankarbagh, Patna - 20', 'others', '8', '2019-04-05 05:09:17', '2019-04-05 05:09:17'),
(3, 'Graphics Designer', 'IT Services', 'Partner', 'Best Graphics Designer', '1557468607.jpeg', NULL, 'PATNA', 'TrickuWeb', 'trickuweb@gmail.com', NULL, 'S/O PREM NATH PRASAD, BUDHIYAN KUAN NEAR MASJID', 'graphics-designer', '10', '2019-05-10 06:07:58', '2019-05-10 06:10:07'),
(6, 'Graphics Designer', 'IT Services', 'Partner', 'hi', '11557514220.png', NULL, 'Patna', 'Praveen', 'praveenemalid@gmail.com', NULL, 'Saguna More Danapur Cantt, Gas Godawn Near Aata Chakki, Budhiyan Kuan Masjid', 'graphics-designer', '1', '2019-05-10 18:50:21', '2019-05-10 18:50:21'),
(7, 'Web Design & Developer', 'IT Services', 'Partner', 'Best Website Designer', '11557514931.png', NULL, 'Patna', 'TrickuWeb', 'trickuweb@gmail.com', NULL, 'Saguna More Danapur Cantt, Gas Godawn Near Aata Chakki, Budhiyan Kuan Masjid', 'web-design-developer', '10', '2019-05-10 19:02:11', '2019-05-10 19:02:11');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `belongs_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `belongs_to`, `created_at`, `updated_at`) VALUES
(1, 'AC Service & Repair', 'Home Cleaning & Repairs', '2019-02-18 09:40:50', '2019-03-28 14:07:37'),
(2, 'Refrigerator Repair', 'Home Cleaning & Repairs', '2019-02-18 09:41:05', '2019-03-28 14:07:26'),
(3, 'Washing Machine Repair', 'Home Cleaning & Repairs', '2019-02-18 09:41:25', '2019-03-28 14:07:16'),
(4, 'RO & Water Purifier Repair', 'Home Cleaning & Repairs', '2019-02-18 09:42:02', '2019-03-28 14:07:05'),
(5, 'Microwave Repair', 'Home Cleaning & Repairs', '2019-02-18 09:42:17', '2019-03-28 14:06:55'),
(6, 'Salon at Home for Women', 'Personal & More', '2019-02-18 09:42:35', '2019-03-28 14:06:45'),
(7, 'Massage for women', 'Personal & More', '2019-02-18 09:44:37', '2019-03-28 14:06:34'),
(8, 'Makeup & Hair Styling', 'Personal & More', '2019-02-18 09:44:55', '2019-03-28 14:06:00'),
(9, 'Mehandi Artists', 'Wedding & Events', '2019-02-18 09:45:27', '2019-03-28 14:05:45'),
(10, 'Massage for Men', 'Personal & More', '2019-02-18 09:45:50', '2019-03-28 14:05:33'),
(11, 'Men\'s Haircut & Grooming', 'Personal & More', '2019-02-18 09:46:09', '2019-03-28 14:05:09'),
(12, 'Electricians', 'Home Cleaning & Repairs', '2019-02-18 09:47:21', '2019-03-28 14:04:54'),
(13, 'Plumbers', 'Home Cleaning & Repairs', '2019-02-18 09:47:30', '2019-03-28 14:04:45'),
(14, 'Carpenters', 'Home Cleaning & Repairs', '2019-02-18 09:47:39', '2019-03-28 14:04:36'),
(15, 'Bathroom Deep Cleaning', 'Home Cleaning & Repairs', '2019-02-18 09:47:49', '2019-03-28 14:04:24'),
(16, 'Carpet Cleaning', 'Home Cleaning & Repairs', '2019-02-18 09:47:58', '2019-03-28 14:04:14'),
(17, 'Home Deep Cleaning', 'Home Cleaning & Repairs', '2019-02-18 09:48:09', '2019-03-28 14:04:05'),
(18, 'Kitchen Deep Cleaning', 'Home Cleaning & Repairs', '2019-02-18 09:48:22', '2019-03-28 14:03:53'),
(19, 'Car Cleaning', 'Car Services', '2019-02-18 09:48:35', '2019-03-28 14:03:43'),
(20, 'Pest Cleaning', 'Home Cleaning & Repairs', '2019-02-18 09:48:44', '2019-03-28 14:03:32'),
(21, 'Web Design & Developer', 'IT Services', '2019-02-18 09:48:59', '2019-03-28 14:03:23'),
(22, 'CA for Income Tax Filing', 'Business & Taxes', '2019-02-18 09:49:13', '2019-03-28 14:03:09'),
(23, 'CA for Small Business', 'Business & Taxes', '2019-02-18 09:49:29', '2019-03-28 14:02:57'),
(24, 'Lawer', 'Business & Taxes', '2019-02-18 09:49:36', '2019-03-28 14:02:47'),
(25, 'Graphics Designer', 'IT Services', '2019-02-18 09:49:51', '2019-03-28 14:02:37'),
(26, 'CA / CS for Company Registration', 'Business & Taxes', '2019-02-18 09:50:14', '2019-03-28 14:02:26'),
(27, 'Visa Agency', 'Business & Taxes', '2019-02-18 09:50:23', '2019-03-28 14:02:06'),
(28, 'Real Estate Lawyer', 'Business & Taxes', '2019-02-18 09:50:47', '2019-03-28 14:01:50'),
(29, 'Vastu Shastra Consultants', 'Pandit & Pooja Service', '2019-02-18 09:51:10', '2019-03-28 14:01:41'),
(30, 'Wedding Photography', 'Wedding & Events', '2019-02-18 09:51:38', '2019-03-28 14:01:22'),
(31, 'Wedding Choreographer', 'Wedding & Events', '2019-02-18 09:51:55', '2019-03-28 14:00:09'),
(32, 'Pre-Wedding Shoot', 'Wedding & Events', '2019-02-18 09:52:07', '2019-03-28 13:59:24'),
(33, 'Party Decoration', 'Wedding & Events', '2019-02-18 09:52:24', '2019-03-28 13:59:11'),
(34, 'Astrologer', 'Pandit & Pooja Service', '2019-02-18 09:52:34', '2019-03-28 13:58:56'),
(35, 'DJ', 'Wedding & Events', '2019-02-18 09:52:40', '2019-03-28 13:58:36'),
(36, 'Bartender', 'Wedding & Events', '2019-02-18 09:52:47', '2019-03-28 13:58:24'),
(37, 'Baby Portfolio Photographer', 'Personal & More', '2019-02-18 09:53:20', '2019-03-28 13:58:03'),
(38, 'Home Tutor', 'Education Service', '2019-02-18 09:53:30', '2019-03-28 13:57:43'),
(39, 'CCTV Camera & Installation', 'Personal & More', '2019-02-18 09:53:47', '2019-03-28 13:57:29'),
(40, 'Dry Cleaning', 'Home Cleaning & Repairs', '2019-02-18 09:53:58', '2019-03-28 13:57:11'),
(41, 'Maternity Photographer', 'Personal & More', '2019-02-18 09:54:21', '2019-03-28 14:01:06'),
(42, 'Packers & Movers', 'Personal & More', '2019-02-18 09:54:29', '2019-03-28 13:56:38'),
(43, 'Divorce Lawyer', 'Business & Taxes', '2019-02-18 09:54:41', '2019-03-28 13:56:25'),
(44, 'Car Wash', 'Car Services', '2019-02-18 18:49:54', '2019-03-28 13:56:16'),
(45, 'Car Rent', 'Car Services', '2019-02-18 18:54:21', '2019-03-28 13:56:09'),
(46, 'Maid Service', 'Home Cleaning & Repairs', '2019-02-22 18:36:33', '2019-03-28 13:56:00'),
(47, 'General Home Tutors', 'Education Service', '2019-02-22 18:38:04', '2019-03-28 13:55:36'),
(48, 'Website Development', 'IT Services', '2019-03-09 02:42:43', '2019-03-28 13:55:24'),
(50, 'Home Tutors for Specific Subjects', 'Education Service', '2019-03-27 10:10:44', '2019-03-28 13:55:17'),
(51, 'Professional Subject Tutors (E.g., Java, C++)', 'Education Service', '2019-03-27 10:12:12', '2019-03-28 13:55:08'),
(52, 'Others', 'Others', '2019-03-27 10:12:22', '2019-03-28 14:00:18'),
(53, 'Car Selling', 'Car Services', '2019-04-18 06:06:52', '2019-04-18 06:06:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `provider`, `provider_id`, `phone`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Praveen', 'praveenemalid@gmail.com', NULL, '$2y$10$Om47mDOnTzst092T8XJBYu8PlF3cmB3FWeE4ZO2DlW27K86rUrrsK', NULL, NULL, '8789529215', 'Admin', '7mqZf79IaqDyrZKiJkV6JS23ZP7RDyqgwvUZkwHilhhbCRL6KZ4K68G7n4ED', '2019-02-18 10:32:15', '2019-05-09 19:58:47'),
(2, 'Nitin Kumar', 'nitinwax@gmail.com', NULL, '$2y$10$d4LmYS0zfNKaavpiejFllegWuHQKIaBD9YWp.CpH44vK2c2SsC2Jq', NULL, NULL, '8676805808', 'Admin', '7x7W8MM8ak94fN6zynoOmEBhMwxGCaTJU4OfBwm0cH2viHRg6iQFpL8YOsc1', '2019-02-18 12:22:27', '2019-02-18 12:23:10'),
(3, 'Shashank Shekhar', 'shashankit@gmail.com', NULL, '6291746036', NULL, NULL, '6291746036', 'Admin', 'z2iprE63Wz8pEfXd5h5MZiVTOSRZmUCqqLhOGDAU5ESVzlzuf9DVEUz2aVdN', '2019-02-19 09:20:24', '2019-04-19 07:25:45'),
(4, 'test', 'test@me.com', NULL, '$2y$10$DChRvMWnSOCeNRqO.7y3pO2/VKLZIoHkQKL8/XLa6yJLqmr27Jjme', NULL, NULL, '9877889922', 'User', NULL, '2019-03-04 19:14:59', '2019-03-04 19:14:59'),
(5, 'Ravi Ranjan', 'raviranjan.facebook@gmail.com', NULL, '$2y$10$GJ8Be9XuFUlkiF7eE1XuEeUJa4Rb3mQvnpEfQeVEBLWyA.FLVuTbm', NULL, NULL, '8224905401', 'User', 'vKgoXchTcy0ErpIx26gc87wkuQNOwxaj1Q2owEZ5uzli5gSXZTNccsoPIvxz', '2019-03-18 05:07:56', '2019-03-18 05:07:56'),
(6, 'Giridhari Kumar', 'giridhari9525@gmail.com', NULL, '$2y$10$wSuJh3qHc71wb3/9iVrLKuKlSdq5/fNFNcRJQ9FjFP8Lf5Yt99PG.', NULL, NULL, '8210214846', 'User', 'oBnfnteGX6GQNqEgAwAJNvpHPZQJXGlErTHKn0kBltHLpLQVXaaqB1nv1er9', '2019-03-27 05:50:22', '2019-03-27 05:50:22'),
(7, 'AVINASH KUMAR SINGH', 'singhavinash7777@gmail.com', NULL, '$2y$10$g5jQNtF6oT9tFXmRhezq9ODg2b/hKdZ83gckn0RNRfIdQt3hgd83.', NULL, NULL, '9472927407', 'User', '5zUQIYrQpXZoj06k0IMrJ5xz9uiN0q76qAUNbgMCfDDcppzLJtjZps3Gy9Lq', '2019-03-28 13:06:51', '2019-03-28 13:06:51'),
(8, 'Vivek Kumar', 'vivekkmr397@gmail.com', NULL, '$2y$10$vvJx0KXpj8jpZeeGEBlaUujup6hhFkInJ3HzarPLSDBNBmNYl3EB.', NULL, NULL, '9334497337', 'User', 'AiyqpEiTncKSXYUG2WEsVHiAtcwOHmKv5Z0q6RKK6UW7miuKTs6Io9F9mg9q', '2019-04-05 05:03:12', '2019-04-05 05:03:12'),
(9, 'Praveen Kumar', 'praveen82524@gmail.com', NULL, NULL, 'GOOGLE', '114474495239847997258', NULL, NULL, NULL, '2019-05-10 03:37:51', '2019-05-10 03:37:51'),
(10, 'TrickuWeb', 'trickuweb@gmail.com', NULL, NULL, 'GOOGLE', '116969358125232775874', NULL, NULL, 'i2hjocfvGw1xrBdupEbRxXXMfV6iSOrdFGm5gB09Xccw8OlMHWy9LTfA75IA', '2019-05-10 03:38:42', '2019-05-10 03:38:42'),
(11, 'Praven Kumar', 'praveen.marsplanet@gmail.com', NULL, NULL, 'GOOGLE', '100187173117149264824', NULL, NULL, 'zuIx9OkKKnc0tsK7Oz3Dc426TNDludeScdEVMi8jb97xrkNmK4SwkHgvU3pV', '2019-05-10 03:45:04', '2019-05-10 03:45:04'),
(15, 'Shashank Shekhar', 'shashank.kaamil@gmail.com', NULL, NULL, 'GOOGLE', '115465341111473410140', NULL, NULL, 'dT5GYyuF0zCGNPwlXb7MSg8xoshcv2K4yKo75uIV7i60O1y3cyUrXutxW87U', '2019-05-10 06:26:00', '2019-05-10 06:26:00'),
(17, 'Shashank Shekhar', 'shashankit@yahoo.co.in', NULL, '$2y$10$NYmIaVBkQ7GaenjNpukMhuj0L06UQC8VghHvGygZVpyAPRDUoY3I.', NULL, NULL, '6291746036', 'User', '2tb2jcSPhA4hiwsjXeRtYLxDMMgzFhTbGYZsJJZ0yhC57H3SXhbgCOlzZAg7', '2019-05-10 12:07:30', '2019-05-10 12:07:30'),
(18, 'Praveen Kumar', 'ipraveenkmr@hotmail.com', NULL, NULL, 'FACEBOOK', '817177425332939', NULL, NULL, 'WZwDq29ssc8bCTGXTxU6km3kLrjlJKKNjsjvDI5syfmKW7aaZ91nDZVZy4vA', '2019-05-10 19:12:10', '2019-05-10 19:12:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest_emails`
--
ALTER TABLE `guest_emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest_lists`
--
ALTER TABLE `guest_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest_phones`
--
ALTER TABLE `guest_phones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invitations`
--
ALTER TABLE `invitations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_profession_unique` (`profession`);

--
-- Indexes for table `professionals`
--
ALTER TABLE `professionals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guest_emails`
--
ALTER TABLE `guest_emails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `guest_lists`
--
ALTER TABLE `guest_lists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `guest_phones`
--
ALTER TABLE `guest_phones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invitations`
--
ALTER TABLE `invitations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `professionals`
--
ALTER TABLE `professionals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
