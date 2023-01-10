-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2023 at 03:15 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bhms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `booked_meals`
--

CREATE TABLE `booked_meals` (
  `id` int(20) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `breakfast` int(11) UNSIGNED NOT NULL,
  `lunch` int(11) UNSIGNED NOT NULL,
  `dinner` int(11) UNSIGNED NOT NULL,
  `total` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booked_meals`
--

INSERT INTO `booked_meals` (`id`, `user_type`, `user_id`, `date`, `breakfast`, `lunch`, `dinner`, `total`, `created_at`, `updated_at`) VALUES
(26, 'admin', 'ict@baiust.edu.bd', '2023-01-02', 1, 1, 0, 134, '2022-12-31 19:13:12', '2022-12-31 19:13:18'),
(27, 'student', '1109020', '2023-01-02', 1, 1, 1, 192, '2022-12-31 20:02:28', '2022-12-31 20:02:28'),
(28, 'student', '1109020', '2023-01-03', 1, 1, 1, 160, '2022-12-31 20:02:28', '2022-12-31 20:02:28'),
(29, 'student', '1109020', '2023-02-02', 0, 1, 1, 128, '2022-12-31 20:21:56', '2022-12-31 20:21:56'),
(30, 'student', '1109020', '2023-02-03', 0, 1, 1, 158, '2022-12-31 20:21:56', '2022-12-31 20:21:56'),
(31, 'admin', 'nahid@hms.com', '2023-01-09', 0, 1, 0, 108, '2023-01-08 16:32:50', '2023-01-08 16:32:50'),
(32, 'admin', 'ict@baiust.edu.bd', '2023-01-10', 0, 1, 0, 76, '2023-01-08 18:20:41', '2023-01-08 18:20:41');

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE `buildings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Boys Paradise Hostel', '2022-11-03 11:07:10', '2022-11-03 11:07:10'),
(2, 'Queens Garden Hostel', '2022-11-03 11:41:28', '2022-11-03 11:41:28');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flats`
--

CREATE TABLE `flats` (
  `id` int(11) NOT NULL,
  `building_id` int(11) NOT NULL,
  `floor_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flats`
--

INSERT INTO `flats` (`id`, `building_id`, `floor_id`, `name`, `created_at`, `updated_at`) VALUES
(18, 1, 11, 'A', '2022-11-12 11:18:25', '2022-11-12 11:18:25'),
(19, 1, 11, 'B', '2022-11-12 11:18:50', '2022-11-12 11:18:50'),
(20, 1, 11, 'C', '2022-11-12 11:18:57', '2022-11-12 11:18:57'),
(21, 1, 11, 'D', '2022-11-12 11:19:13', '2022-11-12 11:19:13'),
(22, 1, 12, 'A', '2022-11-12 11:24:24', '2022-11-12 11:24:24'),
(23, 1, 12, 'B', '2022-11-12 11:24:31', '2022-11-12 11:24:31'),
(24, 1, 12, 'C', '2022-11-12 11:24:36', '2022-11-12 11:24:36'),
(25, 1, 12, 'D', '2022-11-12 11:24:41', '2022-11-12 11:24:41'),
(26, 1, 13, 'A', '2022-11-12 11:26:52', '2022-11-12 11:26:52'),
(27, 1, 13, 'B', '2022-11-12 11:26:58', '2022-11-12 11:26:58'),
(28, 2, 14, 'A', '2022-11-12 11:50:41', '2022-11-12 11:50:41'),
(29, 2, 14, 'B', '2022-11-12 11:50:49', '2022-11-12 11:50:49'),
(30, 2, 14, 'C', '2022-11-12 11:50:56', '2022-11-12 11:50:56');

-- --------------------------------------------------------

--
-- Table structure for table `floors`
--

CREATE TABLE `floors` (
  `id` int(11) UNSIGNED NOT NULL,
  `building_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `floors`
--

INSERT INTO `floors` (`id`, `building_id`, `name`, `created_at`, `updated_at`) VALUES
(11, 1, '1', '2022-11-12 11:04:55', '2022-11-12 11:04:55'),
(12, 1, '2', '2022-11-12 11:05:02', '2022-11-12 11:05:02'),
(13, 1, '3', '2022-11-12 11:05:12', '2022-11-12 11:05:12'),
(14, 2, '1', '2022-11-12 11:50:24', '2022-11-12 11:50:24'),
(15, 2, 'aaaa', '2022-11-13 09:48:25', '2022-11-13 09:48:25'),
(16, 1, '111', '2022-11-13 10:45:09', '2022-11-13 10:45:09');

-- --------------------------------------------------------

--
-- Table structure for table `hostel_meals`
--

CREATE TABLE `hostel_meals` (
  `id` int(11) NOT NULL,
  `day` varchar(255) NOT NULL,
  `meal_type` varchar(255) NOT NULL,
  `meal_items` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hostel_meals`
--

INSERT INTO `hostel_meals` (`id`, `day`, `meal_type`, `meal_items`, `price`, `created_at`, `updated_at`) VALUES
(25, 'Saturday', 'Breakfast', 'মুরগির তেহারি', 45, '2022-12-19 12:10:53', '2022-12-19 12:10:53'),
(26, 'Saturday', 'Lunch', 'ভাত, মাছ ভর্তা, সবজি (শাক / বেগুন ভাজি), ডাল', 53, '2022-12-19 12:12:09', '2022-12-19 12:12:09'),
(27, 'Saturday', 'Dinner', 'ভাত, মুরগি ভুনা, ডাল, সালাদ', 68, '2022-12-19 12:12:53', '2022-12-19 12:12:53'),
(28, 'Sunday', 'Breakfast', 'পরোটা (2 টা), সবজি / ভাজি', 24, '2022-12-19 12:13:18', '2022-12-19 12:13:18'),
(29, 'Sunday', 'Lunch', 'খিচুড়ি, বয়লার মুরগি (দুই প্রকারের রান্না), সালাদ, সবজির বড়া / চাটনি', 75, '2022-12-19 12:14:21', '2022-12-19 12:14:21'),
(30, 'Sunday', 'Dinner', 'ভাত, ডিমের কারি, ভর্তা (ডাল / টমেটো / সিম / ধনিয়া / বেগুন)', 52, '2022-12-19 12:15:40', '2022-12-19 12:15:40'),
(31, 'Monday', 'Breakfast', 'পরোটা (2 টা), মুগ ডাল', 26, '2022-12-19 12:16:45', '2022-12-19 12:16:45'),
(32, 'Monday', 'Lunch', 'ভাত, গরুর মাংস (আলুসহ) / সোনালী মুরগি, ডাল (নরমাল), সালাদ', 108, '2022-12-19 12:18:32', '2022-12-19 12:18:32'),
(33, 'Monday', 'Dinner', 'ভাত, মুড়িঘন্ট, বেগুন ভর্তা / ঢেঁড়স ভাজি', 58, '2022-12-19 12:19:57', '2022-12-19 12:19:57'),
(34, 'Tuesday', 'Breakfast', 'পরোটা (2 টা), ভাজি', 24, '2022-12-19 12:20:30', '2022-12-19 12:20:30'),
(35, 'Tuesday', 'Lunch', 'ভাত, মাছ (রান্না / ভাজা), সবজি, ডাল', 76, '2022-12-19 12:21:31', '2022-12-19 12:21:31'),
(36, 'Tuesday', 'Dinner', 'খিচুড়ি, ডিমের কারি, সালাদ', 60, '2022-12-19 12:22:25', '2022-12-19 12:22:25'),
(37, 'Wednesday', 'Breakfast', 'পরোটা (2 টা), বুটের ডাল', 22, '2022-12-19 12:23:05', '2022-12-19 12:23:05'),
(38, 'Wednesday', 'Lunch', 'ভাত, ব্রয়লার মুরগি, সালাদ, সবজি, ডাল', 78, '2022-12-19 12:24:30', '2022-12-19 12:24:30'),
(39, 'Wednesday', 'Dinner', 'ভাত, মাছ (পাবদা / তেলাপিয়া / রুই), সবজি, ডাল', 75, '2022-12-19 12:25:57', '2022-12-19 12:25:57'),
(40, 'Thursday', 'Breakfast', 'মুরগির তেহারি', 45, '2022-12-19 12:26:40', '2022-12-19 12:26:40'),
(41, 'Thursday', 'Lunch', 'ভাত, মাছ (পাবদা / তেলাপিয়া / রুই), সবজি, ডাল', 78, '2022-12-19 12:29:04', '2022-12-19 12:29:04'),
(42, 'Thursday', 'Dinner', 'ভাত, ভাজি, ডিম (ভুনা / ভাজি), ডাল', 50, '2022-12-19 12:29:57', '2022-12-19 12:29:57'),
(44, 'Friday', 'Lunch', 'পোলাও, (গলা গিলা দিয়ে ডাল), সালাদ ও দধি,  ব্রয়লার মুরগি (দুই প্রকারের রান্না)', 115, '2022-12-19 12:33:25', '2022-12-19 12:33:25'),
(45, 'Friday', 'Dinner', 'ভাত, (আলু + শিম + বেগুন + ফুলকপি) ভাজি, ডাল', 43, '2022-12-19 12:34:29', '2022-12-19 12:34:29'),
(46, 'Friday', 'Breakfast', 'পরোটা (2 টা), আলু ভাজি', 22, '2023-01-08 18:43:55', '2023-01-08 18:43:55');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_26_055549_create_permission_tables', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 3),
(1, 'App\\Models\\User', 16),
(1, 'App\\Models\\User', 18),
(2, 'App\\Models\\User', 18),
(4, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 15),
(4, 'App\\Models\\User', 16),
(4, 'App\\Models\\User', 18),
(5, 'App\\Models\\User', 3),
(5, 'App\\Models\\User', 16),
(5, 'App\\Models\\User', 18),
(6, 'App\\Models\\User', 3),
(6, 'App\\Models\\User', 16),
(6, 'App\\Models\\User', 18),
(8, 'App\\Models\\User', 3),
(8, 'App\\Models\\User', 16),
(8, 'App\\Models\\User', 18),
(9, 'App\\Models\\User', 18),
(11, 'App\\Models\\User', 18),
(12, 'App\\Models\\User', 18),
(13, 'App\\Models\\User', 18);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `other_bills`
--

CREATE TABLE `other_bills` (
  `id` int(11) NOT NULL,
  `service_name` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `amount` int(255) NOT NULL,
  `student_id` int(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `other_bills`
--

INSERT INTO `other_bills` (`id`, `service_name`, `date`, `amount`, `student_id`, `created_at`, `updated_at`) VALUES
(2, 'Service Charge', '2023-01-28', 300, 1109020, '2022-12-19 09:12:43', '2023-01-01 10:04:03'),
(3, 'Wifi', '2023-01-28', 50, 1109020, '2023-01-01 10:05:47', '2023-01-01 10:05:47');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_history`
--

CREATE TABLE `payment_history` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `studentID` int(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'add-student', 'web', NULL, NULL),
(2, 'edit-student', 'web', NULL, NULL),
(3, 'edit articles', 'web', '2023-01-08 12:12:28', '2023-01-08 12:12:28'),
(4, 'see-users', 'web', '2023-01-08 13:56:59', '2023-01-08 13:56:59'),
(5, 'add-user', 'web', '2023-01-08 13:56:59', '2023-01-08 13:56:59'),
(6, 'edit-user', 'web', '2023-01-08 13:56:59', '2023-01-08 13:56:59'),
(8, 'edit-permissions', 'web', '2023-01-08 14:35:01', '2023-01-08 14:35:01'),
(9, 'see-students', 'web', '2023-01-08 17:36:13', '2023-01-08 17:36:13'),
(10, 'see-student', 'web', '2023-01-08 17:37:39', '2023-01-08 17:37:39'),
(11, 'edit-meal', 'web', '2023-01-08 17:44:37', '2023-01-08 17:44:37'),
(12, 'see-booked-meals', 'web', '2023-01-08 17:45:29', '2023-01-08 17:45:29'),
(13, 'book-meal', 'web', '2023-01-08 17:50:19', '2023-01-08 17:50:19');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` int(11) NOT NULL,
  `building_id` int(11) NOT NULL,
  `floor_id` int(11) NOT NULL,
  `flat_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `building_id`, `floor_id`, `flat_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(47, 1, 11, 18, '1', 1, '2022-11-12 11:20:07', '2022-11-13 11:10:17'),
(49, 1, 11, 18, '3', 1, '2022-11-12 11:20:33', '2022-11-25 13:45:24'),
(50, 1, 11, 18, '4', 1, '2022-11-12 11:20:40', '2022-11-12 11:32:48'),
(51, 1, 11, 19, '1', 1, '2022-11-12 11:22:02', '2022-11-25 16:37:10'),
(52, 1, 11, 19, '2', 0, '2022-11-12 11:22:11', '2022-11-13 05:18:18'),
(53, 1, 11, 19, '3', 0, '2022-11-12 11:22:18', '2022-11-13 05:18:40'),
(54, 1, 11, 19, '4', 0, '2022-11-12 11:22:24', '2022-11-12 11:22:24'),
(55, 1, 11, 20, '4', 0, '2022-11-12 11:22:50', '2022-11-12 11:22:50'),
(56, 1, 11, 20, '3', 0, '2022-11-12 11:22:56', '2022-11-12 11:22:56'),
(57, 1, 11, 20, '2', 0, '2022-11-12 11:23:01', '2022-11-12 11:23:01'),
(58, 1, 11, 20, '1', 0, '2022-11-12 11:23:06', '2022-11-12 11:23:06'),
(59, 1, 11, 21, '1', 0, '2022-11-12 11:23:27', '2022-11-12 11:23:27'),
(60, 1, 11, 21, '3', 0, '2022-11-12 11:23:32', '2022-11-12 11:23:32'),
(61, 1, 11, 21, '4', 0, '2022-11-12 11:23:38', '2022-11-12 11:23:38'),
(62, 1, 11, 21, '2', 0, '2022-11-12 11:23:45', '2022-11-12 11:23:45'),
(63, 1, 12, 22, '1', 0, '2022-11-12 11:24:48', '2022-11-13 01:37:44'),
(64, 1, 12, 22, '2', 0, '2022-11-12 11:24:54', '2022-11-12 11:24:54'),
(65, 1, 12, 22, '3', 0, '2022-11-12 11:25:00', '2022-11-12 11:25:00'),
(66, 1, 12, 22, '4', 0, '2022-11-12 11:25:05', '2022-11-12 11:25:05'),
(67, 1, 12, 23, '1', 0, '2022-11-12 11:25:28', '2022-11-12 11:25:28'),
(68, 1, 12, 23, '2', 1, '2022-11-12 11:25:33', '2022-11-12 11:49:16'),
(69, 1, 12, 23, '3', 0, '2022-11-12 11:25:38', '2022-11-12 11:25:38'),
(70, 1, 12, 23, '4', 0, '2022-11-12 11:25:42', '2022-11-12 11:25:42'),
(71, 1, 12, 24, '1', 0, '2022-11-12 11:25:54', '2022-11-12 11:25:54'),
(72, 1, 12, 24, '2', 0, '2022-11-12 11:25:59', '2022-11-12 11:25:59'),
(73, 1, 12, 24, '3', 0, '2022-11-12 11:26:04', '2022-11-12 11:26:04'),
(74, 1, 12, 24, '4', 0, '2022-11-12 11:26:08', '2022-11-12 11:26:08'),
(75, 1, 12, 25, '1', 0, '2022-11-12 11:26:22', '2022-11-12 11:26:22'),
(76, 1, 12, 25, '2', 0, '2022-11-12 11:26:26', '2022-11-12 11:26:26'),
(77, 1, 12, 25, '3', 0, '2022-11-12 11:26:30', '2022-11-12 11:26:30'),
(78, 1, 12, 25, '4', 1, '2022-11-12 11:26:34', '2022-11-12 11:49:47'),
(79, 1, 13, 26, '1', 0, '2022-11-12 11:27:22', '2022-11-12 11:27:22'),
(80, 1, 13, 26, '2', 0, '2022-11-12 11:27:26', '2022-11-12 11:27:26'),
(81, 1, 13, 26, '3', 0, '2022-11-12 11:27:36', '2022-11-12 11:27:36'),
(82, 1, 13, 26, '4', 0, '2022-11-12 11:27:40', '2022-11-12 11:27:40'),
(83, 1, 13, 27, '1', 0, '2022-11-12 11:27:50', '2022-11-12 11:27:50'),
(84, 1, 13, 27, '2', 0, '2022-11-12 11:27:53', '2022-11-12 11:27:53'),
(85, 1, 13, 27, '3', 0, '2022-11-12 11:27:56', '2022-11-12 11:27:56'),
(86, 1, 13, 27, '4', 0, '2022-11-12 11:28:00', '2022-11-12 11:28:00'),
(87, 2, 14, 28, '1', 0, '2022-11-12 11:51:34', '2022-11-13 04:50:29'),
(88, 2, 14, 28, '2', 1, '2022-11-12 11:51:38', '2022-11-12 11:57:12'),
(89, 2, 14, 29, '1', 1, '2022-11-12 11:51:50', '2022-11-12 11:53:21'),
(90, 2, 14, 29, '2', 1, '2022-11-12 11:51:53', '2022-11-12 11:56:11'),
(91, 2, 14, 30, '1', 0, '2022-11-12 11:52:02', '2022-11-12 11:52:02'),
(92, 2, 14, 30, '2', 1, '2022-11-12 11:52:05', '2022-11-12 11:57:49');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `building` int(11) NOT NULL,
  `floor` int(11) NOT NULL,
  `flat` int(11) NOT NULL,
  `seat` int(11) NOT NULL,
  `phone` varchar(60) NOT NULL,
  `g_phone` varchar(60) NOT NULL,
  `status` int(10) NOT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `name`, `dept`, `image`, `password`, `building`, `floor`, `flat`, `seat`, `phone`, `g_phone`, `status`, `remarks`, `created_at`, `updated_at`) VALUES
(27, 1109014, 'Mohd. Eftay Khyrul Alam', 'CSE', '1109014.jpg', '$2y$10$nmebisj/yNvyJoFlq85tWu47Q9gRCihCHcDnnu6vHQge7AFtozTP2', 1, 11, 18, 47, '1109014', '11090141', 1, 'NO', '2022-11-12 11:28:58', '2022-12-18 20:06:21'),
(30, 1111021, 'Md. Yeakub Ali', 'CSE', NULL, '$2y$10$dicPfr.EgW.GS.NmGSinM.KMFagFJW6m53y1wVgVbOSeI8/TkEbji', 1, 11, 18, 50, '1111021', '11110211', 1, 'QQ', '2022-11-12 11:32:47', '2022-11-12 11:32:47'),
(32, 822120102161014, 'Tasbiul Hasnath Nabil', 'English', NULL, '$2y$10$yshBO/HKwaOsg2jLGpP4De012gxUPHNLRmDX7hctu.7NoxXjAvDCq', 1, 12, 23, 68, '0822', '08221', 1, 'jryfdcg', '2022-11-12 11:49:16', '2022-11-12 11:49:16'),
(33, 822120102161027, 'Swad Hossain Saivid', 'English', NULL, '$2y$10$g0DKGK2.HHQFxHbtL5gBxeYIUCYrftPb/vwHKs9bWk3tyypNQny3q', 1, 12, 25, 78, '516', '852', 1, 'sdfgh', '2022-11-12 11:49:47', '2022-11-12 11:49:47'),
(34, 5203032, 'Suraiya Akter Juma', 'LLB', NULL, '$2y$10$ROLIBxbNhKNQQmcF0uWQveCngpj8wdgdpjTw6kI8LeqUpfQXz6y7u', 2, 14, 29, 89, '538538463', '98634662589', 1, '354', '2022-11-12 11:53:21', '2022-11-12 11:53:21'),
(36, 1109025, 'Syeda Sabiqunnahar Brinty', 'CSE', NULL, '$2y$10$IkfK5X1L54azsN6ZV6DwJ.GwcvIXj0NxeAL4rnFEAEpB0mUvpLFfG', 2, 14, 29, 90, '53543', '45635463', 1, '4534533', '2022-11-12 11:56:11', '2022-11-12 11:56:11'),
(37, 5108004, 'Jannatul Ferdous Urmi', 'English', NULL, '$2y$10$fOSfcv54Zye3nZFx./GFgupM86SlLrm3Vpe/qhMVZEeVF8lCPA0iG', 2, 14, 28, 88, '647864563', '94636453415', 1, '543', '2022-11-12 11:57:12', '2022-11-12 11:57:12'),
(38, 822120202161016, 'Fatema Khanum Shanta', 'English', NULL, '$2y$10$QA/VL5anOF4cWXiDFUT4Z.ELHl3HCuNXNi/ZagxnKm.sFBEaS89m2', 2, 14, 30, 92, '013030052378', '635635', 1, '362', '2022-11-12 11:57:48', '2022-11-12 11:57:48'),
(39, 1109020, 'Nahid Hasan Noyon', 'CSE', '1109020.jpg', '$2y$10$CGdGFM4GV6OlcUzVp0kByuLqGcFrVXzb3jmjp/fmVsi7H16tRff7e', 1, 11, 18, 49, '20', '20', 1, NULL, '2022-11-12 21:45:16', '2022-12-18 02:31:30'),
(40, 822110105081009, 'Demo', 'CSE', NULL, '$2y$10$ZUi4MwZkCDq0FUOyQ6Z0beUc7Dr7hHmNoftNJ8rKX/89XFH/Kpe06', 1, 11, 19, 51, '4534', '34534', 1, NULL, '2022-11-25 16:37:10', '2022-11-25 16:37:10');

-- --------------------------------------------------------

--
-- Table structure for table `types_of_bills`
--

CREATE TABLE `types_of_bills` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `types_of_bills`
--

INSERT INTO `types_of_bills` (`id`, `name`, `amount`, `status`, `updated_at`, `created_at`) VALUES
(1, 'Wifi', 200, 'active', '2022-12-18 11:13:54', '2022-12-18 11:13:54'),
(2, 'Electricity', 300, 'active', '2022-12-19 05:58:39', '2022-12-19 05:58:39'),
(3, 'Laundry', 200, 'inactive', '2022-12-31 19:42:00', '2022-12-19 05:59:56'),
(4, 'Seat', 2100, 'active', '2022-12-20 06:22:41', '2022-12-20 06:22:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `employee_id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'nahid@hms.com', 'Nahid Hasan Daya', '01627465928', 'nahid@hms.com', NULL, '$2y$10$HwFtAiCM46oQ7abKa8u1HOTLvWyTaO5rl6KiUTQLdPChcNmSZspyq', NULL, '2022-10-10 13:10:31', '2022-12-18 01:42:04'),
(15, 'sheila@hms.com', 'Tania Sultana Sheila', '01685756270', 'sheila@hms.com', NULL, '$2y$10$IHOWaIdWhAYfm9uEMR2bq.o8yHdDGmGyb1yPJiXpqMlcjp4wSiPsS', NULL, '2022-12-18 20:16:38', '2022-12-18 20:16:38'),
(16, 'eftay@hms.com', 'Md. Eftay Khairul Alam', '01303006671', 'eftay@hms.com', NULL, '$2y$10$ZaFf7gAXhH/a4.Vdz/xmEudtp1GAgY0if7jcFII7R6yixzuXDvxQy', NULL, '2022-12-18 20:22:02', '2023-01-08 15:12:55'),
(18, 'ict@baiust.edu.bd', 'BAIUST ICT', '01533019893', 'ict@baiust.edu.bd', NULL, '$2y$10$ZSoCA1fLSScuWkQzKAoWhupy2/LnCTxNArbWcg6ppudgMUWhnWgmq', NULL, '2022-12-21 11:07:36', '2022-12-21 11:07:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booked_meals`
--
ALTER TABLE `booked_meals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `flats`
--
ALTER TABLE `flats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `floors`
--
ALTER TABLE `floors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hostel_meals`
--
ALTER TABLE `hostel_meals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `other_bills`
--
ALTER TABLE `other_bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_history`
--
ALTER TABLE `payment_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- Indexes for table `types_of_bills`
--
ALTER TABLE `types_of_bills`
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
-- AUTO_INCREMENT for table `booked_meals`
--
ALTER TABLE `booked_meals`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `buildings`
--
ALTER TABLE `buildings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flats`
--
ALTER TABLE `flats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `floors`
--
ALTER TABLE `floors`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `hostel_meals`
--
ALTER TABLE `hostel_meals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `other_bills`
--
ALTER TABLE `other_bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_history`
--
ALTER TABLE `payment_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `types_of_bills`
--
ALTER TABLE `types_of_bills`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
