-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 03, 2021 at 11:05 AM
-- Server version: 10.3.24-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itams`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessories`
--

CREATE TABLE `accessories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_id` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accessory_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accessory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_no` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_no` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_qty` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_unit_price` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_total_price` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warranty_expiry_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manufacturer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accessories`
--

INSERT INTO `accessories` (`id`, `company_id`, `vendor_id`, `accessory_category`, `accessory_name`, `model_no`, `order_no`, `purchase_qty`, `purchase_unit_price`, `purchase_total_price`, `purchase_date`, `warranty_expiry_date`, `manufacturer`, `status`, `created_at`, `updated_at`) VALUES
(1, 'JNP', '2', 'Mouse', 'A4Tech Mouse', 'OP-602D', '1234567890', '10', '250', '2500', '2020-06-10', NULL, 'A4Tech', '0', '2020-09-28 02:05:36', '2020-09-28 02:05:36'),
(2, 'JAV', '1', 'Keyboard', 'A4Tech Keyboard', 'OP-602DD', '123456789023', '150', '300', '45000', '2020-02-11', '2022-01-26', 'A4Tech update', '0', '2020-09-28 02:07:47', '2020-09-29 21:42:10');

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_category_id` char(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_type_id` char(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_id` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asset_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial_no` char(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `depreciation_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_price` int(11) DEFAULT NULL,
  `warranty_expiry_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `useful_life` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `residual_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `residual_rate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Unassigned,1=Assigned',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `product_id`, `product_category_id`, `product_type_id`, `vendor_id`, `asset_name`, `serial_no`, `depreciation_type`, `purchase_type`, `purchase_date`, `purchase_price`, `warranty_expiry_date`, `description`, `useful_life`, `residual_value`, `residual_rate`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Web Hosting Package', 'Software', 'Web Server', '8', 'Hosting package for jaysonbd', '#29938', 'Straight Line', 'Owned', '2020-09-16', 2500, '2021-09-16', '4 GB SSD Storage\r\n200 GB Data Transfer\r\nMonthlyLiteSpeed Web Server\r\n4 Addon Domains\r\ncPanel Control Panel\r\nFREE SSL Life Time\r\nFREE Weekly Backup\r\nUnlimited Sub Domains\r\nUnlimited Email Accounts\r\nUnlimited Databases', '1', NULL, NULL, 1, '2020-09-21 23:04:43', '2020-09-21 23:40:40'),
(4, 'Lenovo Laptop', 'Hardware', 'laptop', '9', 'Lenovo i3 Laptop', '12345678', 'Declining Balance', 'Owned', '2019-12-16', 40000, '2021-08-24', NULL, NULL, NULL, NULL, 1, '2020-09-21 23:38:49', '2020-09-21 23:40:53'),
(5, 'Dell Laptop', 'Hardware', 'laptop', '10', 'Dell i5 Laptop', '1234567844', 'Straight Line', 'Owned', '2019-07-08', 70000, '2021-10-19', NULL, NULL, NULL, NULL, 1, '2020-09-21 23:40:21', '2020-09-21 23:41:03'),
(6, 'Computer Set', 'Hardware', 'Computer', '2', 'Computer Set', '2e4fewrfw3r', 'Straight Line', 'Owned', '2020-05-19', 35000, '2021-05-29', NULL, NULL, NULL, NULL, 0, '2020-09-21 23:47:10', '2020-09-21 23:47:10'),
(7, 'Computer Set', NULL, NULL, '2', 'Computer Set', 'erdtyutyrtrwr', 'One Time Purchase', 'Owned', '2019-08-22', 40000, '2021-07-31', 'N/A', '2', NULL, NULL, 0, '2020-09-22 00:41:10', '2020-09-22 00:41:10');

-- --------------------------------------------------------

--
-- Table structure for table `assigned_assets`
--

CREATE TABLE `assigned_assets` (
  `id` int(10) UNSIGNED NOT NULL,
  `asset_id` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assigned_assets`
--

INSERT INTO `assigned_assets` (`id`, `asset_id`, `employee_id`, `created_at`, `updated_at`) VALUES
(3, '3', '1100003', '2020-09-21 23:40:40', '2020-09-21 23:40:40'),
(4, '4', '1100003', '2020-09-21 23:40:53', '2020-09-21 23:40:53'),
(5, '5', '1100002', '2020-09-21 23:41:03', '2020-09-21 23:41:03');

-- --------------------------------------------------------

--
-- Table structure for table `chat_user`
--

CREATE TABLE `chat_user` (
  `id` int(11) NOT NULL,
  `login_oauth_uid` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `profile_picture` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_user`
--

INSERT INTO `chat_user` (`id`, `login_oauth_uid`, `first_name`, `last_name`, `email_address`, `profile_picture`, `created_at`, `updated_at`) VALUES
(1, '107551470271186881001', 'Md. Akmal', 'Hossain', 'akmalhossain307@gmail.com', 'https://lh3.googleusercontent.com/a-/AOh14GgmFP80e4X0n9svjFrDkbCINn8qNhozS_7JPPEdPQ', '2020-06-16 06:34:58', '2020-07-13 04:20:27'),
(3, '107909784362990025351', 'Akmal', 'Hossain', 'akmal110130@gmail.com', 'https://lh3.googleusercontent.com/a-/AOh14GjjaMbLQ3asFl37rNqxsFxQd87KvI7AI6XSW1sx6w', '2020-07-13 04:11:22', '2020-07-13 04:19:53');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_code` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_code`, `company_name`, `created_at`, `updated_at`) VALUES
(1, 'JPL', 'Jayson Pharmaceuticals Ltd.', '2020-08-21 21:53:05', '2020-08-21 21:59:47'),
(2, 'TST', 'Test Company', '2020-08-21 21:54:03', '2020-08-21 21:54:03'),
(4, 'JAV', 'Jayson Agrovet Ltd.', '2020-09-21 10:45:01', '2020-09-21 10:45:01'),
(5, 'JNP', 'Jayson Natural Products Ltd.', '2020-09-21 10:45:19', '2020-09-21 10:45:19'),
(6, 'SGL', 'Segway Gas Ltd.', '2020-09-21 10:45:40', '2020-09-21 10:45:40'),
(7, 'TIL', 'Trexim International Ltd.', '2020-09-21 10:46:02', '2020-09-21 10:46:02'),
(8, 'EMES', 'EMES Securities Ltd.', '2020-09-21 10:46:22', '2020-09-21 10:46:22'),
(9, 'YBC', 'Yesbd.com Ltd.', '2020-09-21 10:46:39', '2020-09-21 10:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `created_at`, `updated_at`) VALUES
(1, 'IT', '2020-08-21 21:04:40', '2020-09-21 10:47:26'),
(2, 'Administration', '2020-08-21 21:15:14', '2020-09-21 10:47:40'),
(4, 'Accounts', '2020-08-21 22:42:41', '2020-09-21 10:47:57'),
(5, 'Audit', '2020-08-21 22:47:13', '2020-09-21 10:48:12'),
(6, 'Sourcing', '2020-09-21 10:48:24', '2020-09-21 10:48:24'),
(7, 'Sales', '2020-09-21 10:48:34', '2020-09-21 10:48:34'),
(8, 'Marketing', '2020-09-21 10:48:46', '2020-09-21 10:48:46'),
(9, 'Distribution', '2020-09-21 10:48:57', '2020-09-21 10:48:57'),
(10, 'Import', '2020-09-21 10:49:11', '2020-09-21 10:49:11'),
(11, 'Export', '2020-09-21 10:49:23', '2020-09-21 10:49:23'),
(12, 'Tender', '2020-09-21 10:49:36', '2020-09-21 10:49:36'),
(13, 'PMD', '2020-09-21 10:49:47', '2020-09-21 10:49:47'),
(14, 'Documentation', '2020-09-21 10:50:50', '2020-09-21 10:50:50'),
(15, 'Quality control (QC)', '2020-09-21 10:51:04', '2020-09-21 10:51:04'),
(16, 'Quality Assurance (QA)', '2020-09-21 10:51:16', '2020-09-21 10:51:16');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_id`, `company_id`, `department_id`, `location_id`, `emp_name`, `emp_email`, `emp_phone`, `created_at`, `updated_at`) VALUES
(4, '1100003', '9', '1', '22', 'Md. Akmal Hossain', 'akmal@yesbd.com', '01738279545', '2020-09-21 23:14:25', '2020-09-21 23:16:05'),
(5, '1100002', '9', '1', '22', 'Shamsia Jafrin Shuchi', 'shuchi@yesbd.com', '01557474198', '2020-09-21 23:15:42', '2020-09-21 23:15:42');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location`, `details`, `created_at`, `updated_at`) VALUES
(1, 'DHAKA NORTH', 'DHAKA NORTH DEPOT', '2020-08-21 12:49:54', '2020-09-21 10:36:40'),
(2, 'DINAJPUR', 'DINAJPUR DEPOT', '2020-08-21 12:50:38', '2020-09-21 10:39:25'),
(4, 'DHAKA SOUTH', 'DHAKA SOUTH DEPOT', '2020-09-21 10:37:13', '2020-09-21 10:37:13'),
(5, 'CHATTOGRAM', 'CHATTOGRAM DEPOT', '2020-09-21 10:37:37', '2020-09-21 10:37:37'),
(6, 'BARISAL', 'BARISAL DEPOT', '2020-09-21 10:37:53', '2020-09-21 10:37:53'),
(7, 'BOGRA', 'BOGRA DEPOT', '2020-09-21 10:38:13', '2020-09-21 10:38:13'),
(8, 'COMILLA', 'COMILLA DEPOT', '2020-09-21 10:38:31', '2020-09-21 10:38:31'),
(9, 'COX\'S BAZAR', 'COX\'S BAZAR DEPOT', '2020-09-21 10:38:51', '2020-09-21 10:38:51'),
(10, 'FARIDPUR', 'FARIDPUR DEPOT', '2020-09-21 10:40:21', '2020-09-21 10:40:21'),
(11, 'GAZIPUR', 'GAZIPUR DEPOT', '2020-09-21 10:40:36', '2020-09-21 10:40:36'),
(12, 'KHULNA', 'KHULNA DEPOT', '2020-09-21 10:40:53', '2020-09-21 10:40:53'),
(13, 'KUSHTIA', 'KUSHTIA DEPOT', '2020-09-21 10:41:07', '2020-09-21 10:41:07'),
(14, 'MYMENSINGH', 'MYMENSINGH DEPOT', '2020-09-21 10:41:28', '2020-09-21 10:41:28'),
(15, 'NARAYANGONJ', 'NARAYANGONJ DEPOT', '2020-09-21 10:41:45', '2020-09-21 10:41:45'),
(16, 'NOAKHALI', 'NOAKHALI DEPOT', '2020-09-21 10:42:01', '2020-09-21 10:42:01'),
(17, 'RAJSHAHI', 'RAJSHAHI DEPOT', '2020-09-21 10:42:24', '2020-09-21 10:42:24'),
(18, 'RANGPUR', 'RANGPUR DEPOT', '2020-09-21 10:42:39', '2020-09-21 10:42:39'),
(19, 'SAVAR', 'SAVAR DEPOT', '2020-09-21 10:42:54', '2020-09-21 10:42:54'),
(20, 'SYLHET', 'SYLHET DEPOT', '2020-09-21 10:43:09', '2020-09-21 10:43:09'),
(21, 'TANGAIL', 'TANGAIL DEPOT', '2020-09-21 10:43:27', '2020-09-21 10:43:27'),
(22, 'Jayson Group Corporate Office', 'Head Office of Jayson Group of Companies', '2020-09-21 23:11:18', '2020-09-21 23:11:18'),
(23, 'JPL Factory', 'Jayson Pharmaceuticals Ltd. Factory Office', '2020-09-21 23:12:19', '2020-09-21 23:12:19');

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
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_07_09_090955_create_products_table', 2),
(4, '2020_07_11_144209_create_permission_tables', 3),
(5, '2014_10_12_100000_create_password_resets_table', 4),
(10, '2020_07_12_085549_create_products_table', 5),
(11, '2020_08_20_093747_create_vendors_table', 5),
(12, '2020_08_21_180535_create_companies_table', 6),
(13, '2020_08_21_180625_create_departments_table', 6),
(14, '2020_08_21_180649_create_locations_table', 6),
(15, '2020_08_21_181651_create_employees_table', 6),
(23, '2020_08_23_063035_create_assets_table', 7),
(24, '2020_08_23_065022_create_specifications_table', 7),
(26, '2020_08_31_014033_create_assigned_assets_table', 8),
(27, '2020_09_21_112814_create_settings_table', 9),
(29, '2020_09_28_064435_create_accessories_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(9, 'App\\User', 8),
(10, 'App\\User', 9),
(11, 'App\\User', 10);

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
(13, 'vendor module', 'web', '2020-09-29 00:52:38', '2020-09-29 00:52:38'),
(14, 'product module', 'web', '2020-09-29 00:52:38', '2020-09-29 00:52:38'),
(15, 'accessory module', 'web', '2020-09-29 00:52:38', '2020-09-29 00:52:38'),
(16, 'asset module', 'web', '2020-09-29 00:52:38', '2020-09-29 00:52:38'),
(17, 'employee module', 'web', '2020-09-29 00:52:38', '2020-09-29 00:52:38'),
(18, 'user module', 'web', '2020-09-29 00:52:38', '2020-09-29 00:52:38'),
(19, 'report module', 'web', '2020-09-29 00:52:38', '2020-09-29 00:52:38'),
(20, 'create vendor', 'web', '2020-09-29 00:52:38', '2020-09-29 00:52:38'),
(21, 'view vendor', 'web', '2020-09-29 00:52:38', '2020-09-29 00:52:38'),
(22, 'edit vendor', 'web', '2020-09-29 00:52:38', '2020-09-29 00:52:38'),
(23, 'delete vendor', 'web', '2020-09-29 00:52:38', '2020-09-29 00:52:38'),
(24, 'create product', 'web', '2020-09-29 00:52:38', '2020-09-29 00:52:38'),
(25, 'view product', 'web', '2020-09-29 00:52:38', '2020-09-29 00:52:38'),
(26, 'edit product', 'web', '2020-09-29 00:52:38', '2020-09-29 00:52:38'),
(27, 'delete product', 'web', '2020-09-29 00:52:38', '2020-09-29 00:52:38'),
(28, 'create accessory', 'web', '2020-09-29 00:52:38', '2020-09-29 00:52:38'),
(29, 'view accessory', 'web', '2020-09-29 00:52:38', '2020-09-29 00:52:38'),
(30, 'edit accessory', 'web', '2020-09-29 00:52:38', '2020-09-29 00:52:38'),
(31, 'delete accessory', 'web', '2020-09-29 00:52:38', '2020-09-29 00:52:38'),
(32, 'create asset', 'web', '2020-09-29 00:52:38', '2020-09-29 00:52:38'),
(33, 'view asset', 'web', '2020-09-29 00:52:38', '2020-09-29 00:52:38'),
(34, 'edit asset', 'web', '2020-09-29 00:52:38', '2020-09-29 00:52:38'),
(35, 'delete asset', 'web', '2020-09-29 00:52:38', '2020-09-29 00:52:38'),
(36, 'create employee', 'web', '2020-09-29 00:52:38', '2020-09-29 00:52:38'),
(37, 'view employee', 'web', '2020-09-29 00:52:38', '2020-09-29 00:52:38'),
(38, 'edit employee', 'web', '2020-09-29 00:52:38', '2020-09-29 00:52:38'),
(39, 'delete employee', 'web', '2020-09-29 00:52:38', '2020-09-29 00:52:38'),
(40, 'create user', 'web', '2020-09-29 00:52:38', '2020-09-29 00:52:38'),
(41, 'edit user', 'web', '2020-09-29 00:52:38', '2020-09-29 00:52:38'),
(42, 'delete user', 'web', '2020-09-29 00:52:38', '2020-09-29 00:52:38'),
(43, 'create role', 'web', '2020-09-29 00:52:38', '2020-09-29 00:52:38'),
(44, 'edit role', 'web', '2020-09-29 00:52:38', '2020-09-29 00:52:38'),
(45, 'delete role', 'web', '2020-09-29 00:52:38', '2020-09-29 00:52:38'),
(46, 'edit profile', 'web', '2020-09-29 00:52:38', '2020-09-29 00:52:38'),
(47, 'view notification', 'web', '2020-09-29 00:52:38', '2020-09-29 00:52:38'),
(48, 'edit settings', 'web', '2020-09-29 00:52:38', '2020-09-29 00:52:38'),
(49, 'view dashboard', 'web', '2020-09-29 00:52:39', '2020-09-29 00:52:39');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_manufacturer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_category`, `product_type`, `product_name`, `product_manufacturer`, `product_description`, `created_at`, `updated_at`) VALUES
(1, 'Software', 'Web Server', 'Web Hosting Package', 'n/a', NULL, '2020-08-21 08:45:40', '2020-09-21 22:51:51'),
(5, 'Hardware', 'laptop', 'Lenovo Laptop', 'Lenovo', NULL, '2020-09-21 23:24:47', '2020-09-21 23:24:47'),
(6, 'Hardware', 'laptop', 'Dell Laptop', 'Dell', NULL, '2020-09-21 23:25:25', '2020-09-21 23:25:25'),
(7, 'Hardware', 'Computer', 'Computer Set', 'N/A', 'N/A', '2020-09-21 23:44:35', '2020-09-21 23:44:35');

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

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(3, 'writer', 'web', '2020-07-12 03:25:22', '2020-07-12 03:25:22'),
(4, 'Admin', 'web', '2020-07-14 23:54:47', '2020-07-14 23:54:47'),
(9, 'Super Admin', 'web', '2020-09-29 01:00:07', '2020-09-29 01:00:07'),
(10, 'user', 'web', '2020-09-29 01:28:00', '2020-09-29 01:28:00'),
(11, 'general user', 'web', '2020-09-29 04:38:25', '2020-09-29 04:38:25');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(13, 9),
(13, 10),
(13, 11),
(14, 9),
(14, 10),
(15, 9),
(15, 10),
(15, 11),
(16, 9),
(16, 10),
(17, 9),
(17, 10),
(17, 11),
(18, 9),
(18, 10),
(19, 9),
(19, 10),
(20, 9),
(20, 10),
(20, 11),
(21, 9),
(21, 10),
(21, 11),
(22, 9),
(22, 10),
(23, 9),
(23, 10),
(24, 9),
(24, 10),
(25, 9),
(25, 10),
(26, 9),
(26, 10),
(27, 9),
(27, 10),
(28, 9),
(28, 10),
(28, 11),
(29, 9),
(29, 10),
(29, 11),
(30, 9),
(30, 10),
(31, 9),
(31, 10),
(32, 9),
(32, 10),
(33, 9),
(33, 10),
(34, 9),
(34, 10),
(35, 9),
(35, 10),
(36, 9),
(36, 10),
(36, 11),
(37, 9),
(37, 10),
(37, 11),
(38, 9),
(38, 10),
(39, 9),
(39, 10),
(40, 9),
(40, 10),
(41, 9),
(41, 10),
(42, 9),
(42, 10),
(43, 9),
(43, 10),
(44, 9),
(44, 10),
(45, 9),
(45, 10),
(46, 9),
(46, 10),
(47, 9),
(47, 10),
(48, 9),
(48, 10),
(49, 9),
(49, 10),
(49, 11);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_name` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_email` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` char(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `app_name`, `company_name`, `company_logo`, `favicon`, `company_email`, `contact_no`, `address`, `footer_text`, `created_at`, `updated_at`) VALUES
(1, 'IT Asset Management System', 'Jayson Group', '1600703756.png', 'logo.ico', 'info@jaysonbd.com', '+8801738279545', 'N/A', '2020 © Jayson Group. Developed By', '2020-09-21 14:41:33', '2020-09-21 09:55:56');

-- --------------------------------------------------------

--
-- Table structure for table `specifications`
--

CREATE TABLE `specifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `asset_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specification_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specification_value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specifications`
--

INSERT INTO `specifications` (`id`, `asset_id`, `specification_name`, `specification_value`, `created_at`, `updated_at`) VALUES
(1, '1', 'n1', 'v1', '2020-08-24 06:03:23', '2020-08-24 06:03:23'),
(2, '1', 'n2', 'v2', '2020-08-24 06:03:23', '2020-08-24 06:03:23'),
(3, '1', 'n3', 'v3', '2020-08-24 06:03:23', '2020-08-24 06:03:23'),
(4, '1', 'n4', 'v4', '2020-08-24 06:03:23', '2020-08-24 06:03:23'),
(5, '1', 'n5', 'v5', '2020-08-24 06:03:23', '2020-08-24 06:03:23'),
(6, '1', NULL, NULL, '2020-08-24 06:03:23', '2020-08-24 06:03:23'),
(7, '2', 'n22', 'v22', '2020-08-24 22:14:36', '2020-08-24 22:14:36'),
(8, '2', 'n33', 'v33', '2020-08-24 22:14:36', '2020-08-24 22:14:36'),
(9, '2', NULL, NULL, '2020-08-24 22:14:36', '2020-08-24 22:14:36'),
(10, '3', NULL, NULL, '2020-09-21 23:04:43', '2020-09-21 23:04:43'),
(11, '3', NULL, NULL, '2020-09-21 23:04:43', '2020-09-21 23:04:43'),
(12, '4', 'RAM', '8 GB', '2020-09-21 23:38:49', '2020-09-21 23:38:49'),
(13, '4', 'Processor', 'Intel Core i3, 2.40GHz', '2020-09-21 23:38:49', '2020-09-21 23:38:49'),
(14, '4', 'HDD', '1TB', '2020-09-21 23:38:49', '2020-09-21 23:38:49'),
(15, '4', NULL, NULL, '2020-09-21 23:38:49', '2020-09-21 23:38:49'),
(16, '5', NULL, NULL, '2020-09-21 23:40:21', '2020-09-21 23:40:21'),
(17, '5', NULL, NULL, '2020-09-21 23:40:21', '2020-09-21 23:40:21'),
(18, '6', NULL, NULL, '2020-09-21 23:47:10', '2020-09-21 23:47:10'),
(19, '6', NULL, NULL, '2020-09-21 23:47:10', '2020-09-21 23:47:10'),
(20, '7', NULL, NULL, '2020-09-22 00:41:10', '2020-09-22 00:41:10'),
(21, '7', NULL, NULL, '2020-09-22 00:41:10', '2020-09-22 00:41:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 'Md. Akmal Hossain', 'admin@admin.com', NULL, '$2y$10$GlKa.7/Tj5Pj9Je48fagkeDOPAxzJ1dfNnt8t3IxTY320MryepFTe', NULL, '2020-09-29 01:02:17', '2020-09-29 08:55:58'),
(9, 'Md. Akmal Hossain', 'user@user.com', NULL, '$2y$10$rnRmJNZ6ryTHrM7Wc48oQOFsVEcabt.E3f3LVByk9Lii2OwrVt9Ie', NULL, '2020-09-29 01:28:30', '2020-09-29 01:28:30'),
(10, 'shamsia jafrin shuchi', 'sjshuchi5@gmail.com', NULL, '$2y$10$FJOkTycvIgCufs0g0tLVAu/b99QMYaltfPG3B0YNPMSL2vusvPj9i', NULL, '2020-09-29 04:38:49', '2020-09-29 04:38:49');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `logo`, `email`, `contact_person`, `designation`, `phone_no`, `address`, `details`, `created_at`, `updated_at`) VALUES
(1, 'Metronet', '1601376535.jpg', 'info@metronet.com', 'Mr. xxxxxx', 'Senior Executive', '12345678', 'N/A', 'N/A', '2020-08-21 09:00:21', '2020-09-29 04:48:55'),
(2, 'Rain Computers', '1598242820.jpg', 'info@rain.com', 'Mr. yyyyyyyy', 'CEO', '2345678', 'N/A', 'N/A', '2020-08-23 22:20:20', '2020-09-21 10:25:23'),
(3, 'Eicra Soft Ltd.', '', 'info@eicrasoft.com', 'Mr. xxxxxx', 'Head of IT', '1234567', 'N/A', 'N/A', '2020-09-21 10:26:27', '2020-09-21 10:26:27'),
(4, 'Zaman IT', '', 'info@zamanit.com', 'Mr. xxxxxx', 'Head of Operations', '1234567', 'N/A', 'N/A', '2020-09-21 10:28:00', '2020-09-21 10:28:00'),
(5, 'Robi', '', 'info@robi.com', 'Mr. xxxxxx', 'Manager', '1234567', 'N/A', 'N/A', '2020-09-21 10:28:59', '2020-09-21 10:28:59'),
(6, 'Grameen Phone(GP)', '', 'info@gp.com', 'Mr. xxxxxx', 'Manager', '123456789', 'N/A', 'N/A', '2020-09-21 10:29:43', '2020-09-21 10:29:43'),
(7, 'Network Solutions', '', 'info@networksolutions.com', 'Mr. xxxxxx', 'Head of IT', '3456789', 'N/A', 'N/A', '2020-09-21 10:30:38', '2020-09-21 10:30:38'),
(8, 'Web Host BD', '', 'webhostbd.net@gmail.com', 'Mr. xxxxxx', 'Head of Operations', '01799771177', '42/2, Kallyanpur Main Road\r\nMirpur, Dhaka-1207', 'Domain & Hosting provider', '2020-09-21 22:56:19', '2020-09-21 22:56:19'),
(9, 'Lenovo', '', 'info@lenovo.com', 'Mr. xxxxxx', 'Head of IT', '1234567', 'N/A', 'N/A', '2020-09-21 23:29:19', '2020-09-21 23:29:47'),
(10, 'Dell', '', 'info@dell.com', 'Mr. xxxxxx', 'Head of Operations', '123456', 'N/A', 'N/A', '2020-09-21 23:30:14', '2020-09-21 23:30:14'),
(11, 'Test vendor', '', 'rayhan328@gmail.com', 'Mohammad Salimullah', 'Head of IT', '123456789', '232-234, Tejgaon I/A, Dhaka-1208', 'testststt', '2020-10-02 23:05:16', '2020-10-02 23:05:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessories`
--
ALTER TABLE `accessories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assigned_assets`
--
ALTER TABLE `assigned_assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_user`
--
ALTER TABLE `chat_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specifications`
--
ALTER TABLE `specifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessories`
--
ALTER TABLE `accessories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `assigned_assets`
--
ALTER TABLE `assigned_assets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `chat_user`
--
ALTER TABLE `chat_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `specifications`
--
ALTER TABLE `specifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
