-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2021 at 09:09 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopolox_web_application`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Size', 1, '2020-09-22 10:09:27', '2021-06-12 14:06:38'),
(2, 'Color', 1, '2020-10-13 23:26:52', '2021-06-12 14:06:30'),
(3, 'Weight', 1, '2021-06-12 14:06:19', '2021-06-12 14:06:19');

-- --------------------------------------------------------

--
-- Table structure for table `balances`
--

CREATE TABLE `balances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `balances`
--

INSERT INTO `balances` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Bkash Personal', '2021-07-01 10:08:29', '2021-07-01 10:08:29'),
(2, 'Bkash Merchant', '2021-07-01 10:21:54', '2021-07-01 10:21:54'),
(3, 'Nagad Personal', '2021-07-01 10:22:03', '2021-07-01 10:22:03'),
(4, 'Nagad Merchant', '2021-07-01 10:22:17', '2021-07-01 10:22:17'),
(5, 'Dutch Bangla', '2021-07-01 10:22:31', '2021-07-01 10:22:31'),
(6, 'Axim Bank', '2021-07-01 10:22:39', '2021-07-01 10:22:39'),
(7, 'Bank Asia', '2021-07-01 13:22:15', '2021-07-01 13:22:15'),
(8, 'Brack Bank', '2021-07-01 13:22:47', '2021-07-01 13:22:47'),
(9, 'Cash', '2021-07-03 06:43:21', '2021-07-10 01:38:10'),
(10, 'Islami Bank', '2021-07-10 01:39:23', '2021-07-10 01:39:23');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `url` varchar(250) DEFAULT NULL,
  `image` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `url`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'https://shopolox.com/mens-100', 'images/banner/1EpQEzSPB7Bl7XFvxr7wvRUTSzV5USbcVuMfYlq6.png', 1, '2021-06-14 10:29:31', '2021-09-04 11:05:39'),
(2, 'https://shopolox.com/womens-100', 'images/banner/ZFPJbskohRmSQ2eFYhkASSygqCFvIaNBMXfrocXo.jpg', 1, '2021-07-13 12:16:13', '2021-09-04 11:05:24');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Daraz', 'daraz', 'images/brand/UAsl0jBWsLbt7ooZidIvnBQ4l9yX1GV3zPjWyPCv.jpg', 1, '2021-06-14 10:29:31', '2021-06-14 10:29:31'),
(2, 'Shopolox', 'shopolox', 'images/brand/oQ9RqaXi3GwnBvHULxhqpdUjfwljSwOKB9fQ1XNc.jpg', 1, '2021-08-01 22:08:06', '2021-08-01 22:08:06');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Men\'s Fashion', 'mens-fashion', 'images/category/h3bmYrrBAKFBXCvX9PhxTIz0HCfH6kqCawmuJOLB.jpg', 1, '2021-06-09 11:18:23', '2021-06-11 12:33:03'),
(2, 'Women\'s Fashion', 'womens-fashion', NULL, 1, '2021-06-11 10:54:49', '2021-06-11 13:25:46'),
(3, 'Fitness Care', 'fitness-care', NULL, 1, '2021-08-01 21:43:52', '2021-08-01 21:43:52'),
(4, 'Beauty Bay', 'beauty-bay', NULL, 1, '2021-08-01 21:44:18', '2021-08-01 21:44:18'),
(5, 'Baby Care', 'baby-care', NULL, 1, '2021-08-01 21:44:41', '2021-08-01 21:44:41'),
(6, 'Home Care', 'home-care', NULL, 1, '2021-08-01 21:45:03', '2021-08-01 21:45:03'),
(7, 'Electronics & Gagdet', 'electronics-gagdet', NULL, 1, '2021-08-01 21:45:27', '2021-08-01 21:45:27'),
(8, 'Global Collections', 'global-collections', NULL, 1, '2021-08-01 21:45:45', '2021-08-01 21:45:45');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_charge` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `delivery_charge`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 70, 1, '2020-09-21 20:17:18', '2020-12-01 10:29:45'),
(2, 'Barguna', 120, 1, '2020-09-22 09:25:37', '2020-12-24 01:05:47'),
(3, 'Barisal', 120, 1, '2020-09-22 09:28:14', '2020-12-24 01:05:37'),
(4, 'Bhola', 120, 1, '2020-09-22 09:29:11', '2020-12-24 01:05:28'),
(5, 'Jalokathi', 120, 1, '2020-09-22 09:29:34', '2020-12-24 01:05:18'),
(6, 'Patuakhali', 120, 1, '2020-09-22 09:29:56', '2020-12-24 01:05:02'),
(8, 'Bandorbon', 120, 1, '2020-09-22 09:32:37', '2020-12-24 01:04:42'),
(9, 'Brahmanbaria', 120, 1, '2020-09-22 09:33:21', '2020-12-24 01:04:30'),
(10, 'Chandpur', 120, 1, '2020-09-22 09:53:56', '2020-12-24 01:04:13'),
(11, 'Chottogram', 120, 1, '2020-09-22 09:54:07', '2020-12-24 01:04:03'),
(12, 'Cumilla', 120, 1, '2020-09-22 09:54:23', '2020-12-24 01:03:53'),
(13, 'Cox\'Bazar', 120, 1, '2020-09-22 09:54:36', '2020-12-24 01:03:38'),
(14, 'Feni', 120, 1, '2020-09-22 09:54:43', '2020-12-24 01:03:26'),
(15, 'Khagrachari', 120, 1, '2020-09-22 09:55:16', '2020-12-24 01:03:16'),
(16, 'Lakshmipur', 120, 1, '2020-09-22 09:55:28', '2020-12-24 01:03:04'),
(17, 'Noakhali', 120, 1, '2020-09-22 09:55:44', '2020-12-24 01:02:52'),
(18, 'Rangamati', 120, 1, '2020-09-22 09:55:57', '2020-12-24 01:02:43'),
(19, 'Faridpur', 120, 1, '2020-09-22 09:56:17', '2020-12-24 01:02:32'),
(20, 'Gazipur', 120, 1, '2020-09-22 09:56:28', '2020-12-24 01:02:20'),
(21, 'Gopalgonj', 120, 1, '2020-09-22 09:56:36', '2020-12-24 01:01:58'),
(22, 'Kishorgonj', 120, 1, '2020-09-22 09:57:04', '2020-12-24 01:01:47'),
(23, 'Madaripur', 120, 1, '2020-09-22 09:57:24', '2020-12-24 01:01:39'),
(24, 'Manikgonj', 120, 1, '2020-09-22 09:59:26', '2020-12-24 01:01:27'),
(25, 'Munshigonj', 120, 1, '2020-09-22 09:59:45', '2020-12-24 01:01:20'),
(26, 'Narayangonj', 120, 1, '2020-09-22 10:00:05', '2020-12-24 01:01:14'),
(27, 'Narsingdhi', 120, 1, '2020-09-22 10:00:27', '2020-12-24 00:59:16'),
(28, 'Rajbari', 120, 1, '2020-09-22 10:00:40', '2020-12-24 01:00:59'),
(29, 'Shariatpur', 120, 1, '2020-09-22 10:00:50', '2020-12-24 01:00:51'),
(30, 'Tangail', 120, 1, '2020-09-22 10:01:06', '2020-12-24 01:00:38'),
(31, 'Bagerhat', 120, 1, '2020-09-22 10:01:16', '2020-12-24 01:00:23'),
(32, 'Chuadanga', 120, 1, '2020-09-22 10:01:31', '2020-12-24 01:00:14'),
(33, 'Jessore', 120, 1, '2020-09-22 10:01:49', '2020-12-24 01:00:04'),
(34, 'Jhenaidah', 120, 1, '2020-09-22 10:02:02', '2020-12-24 00:59:52'),
(35, 'Khulna', 120, 1, '2020-09-22 10:02:18', '2020-12-24 00:59:36'),
(36, 'Kusthia', 120, 1, '2020-09-22 10:02:28', '2020-12-24 00:59:24'),
(37, 'Magura', 120, 1, '2020-09-22 10:02:35', '2020-12-24 00:59:00'),
(38, 'Meherpur', 120, 1, '2020-09-22 10:02:52', '2020-12-24 00:58:51'),
(39, 'Narail', 120, 1, '2020-09-22 10:03:03', '2020-12-24 00:58:42'),
(40, 'Satkhira', 120, 1, '2020-09-22 10:03:13', '2020-12-24 00:58:29'),
(41, 'Jamalpur', 120, 1, '2020-09-22 10:03:34', '2020-12-24 00:58:20'),
(42, 'Mymensingh', 120, 1, '2020-09-22 10:03:51', '2020-12-24 00:58:01'),
(43, 'Netrokona', 120, 1, '2020-09-22 10:04:03', '2020-12-24 00:57:48'),
(44, 'Sherpur', 120, 1, '2020-09-22 10:07:38', '2020-12-24 00:57:38'),
(45, 'Bogura', 120, 1, '2020-09-22 10:07:48', '2020-12-24 00:57:30'),
(46, 'Joypurhat', 120, 1, '2020-09-22 10:08:00', '2020-12-24 00:57:18'),
(47, 'Noygaon', 120, 1, '2020-09-22 10:08:18', '2020-12-24 00:57:07'),
(48, 'Natore', 120, 1, '2020-09-22 10:08:25', '2020-12-24 00:56:58'),
(49, 'Chapainawabganj', 120, 1, '2020-09-22 10:08:46', '2020-12-24 00:56:46'),
(50, 'Pabna', 120, 1, '2020-09-22 10:08:54', '2020-12-24 00:56:35'),
(51, 'Rajshahi', 120, 1, '2020-09-22 10:09:01', '2020-12-24 00:56:27'),
(52, 'Sirajgonj', 120, 1, '2020-09-22 10:09:15', '2020-12-24 00:56:05'),
(53, 'Dinajpur', 120, 1, '2020-09-22 10:09:22', '2020-12-24 00:55:49'),
(54, 'Gaibandha', 120, 1, '2020-09-22 10:09:34', '2020-12-24 00:55:38'),
(55, 'Kurigram', 120, 1, '2020-09-22 10:09:49', '2020-12-24 00:55:29'),
(56, 'Lalmonirhat', 120, 1, '2020-09-22 10:09:57', '2020-12-24 00:55:18'),
(57, 'Nilphamari', 120, 1, '2020-09-22 10:10:08', '2020-12-24 00:55:10'),
(58, 'Panchagarh', 120, 1, '2020-09-22 10:10:52', '2020-12-24 00:55:04'),
(59, 'Rangpur', 120, 1, '2020-09-22 10:11:05', '2020-12-24 00:54:58'),
(60, 'Thakurgaon', 120, 1, '2020-09-22 10:11:16', '2020-12-24 00:54:48'),
(61, 'Hobigonj', 120, 1, '2020-09-22 10:11:28', '2020-12-24 00:54:42'),
(62, 'Mowlovibazar', 120, 1, '2020-09-22 10:11:43', '2020-12-24 00:54:37'),
(63, 'Sunamgonj', 120, 1, '2020-09-22 10:12:00', '2020-12-24 00:54:31'),
(64, 'Sylhet', 120, 1, '2020-09-22 10:12:11', '2020-12-24 00:54:09'),
(65, 'savar', 120, 1, '2020-11-29 16:57:55', '2020-12-24 00:54:02'),
(66, 'Outside of Dhaka', 120, 1, '2020-11-29 16:58:19', '2020-12-24 00:53:42');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `expire_date` date NOT NULL,
  `discount_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_amount` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `start_date`, `expire_date`, `discount_type`, `discount_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, '173740', '2021-09-06', '2021-09-10', 'decimal', 50, 1, '2021-09-06 11:34:37', '2021-09-06 11:34:37'),
(2, '707535', '2021-09-10', '2021-09-30', 'percentage', 5, 1, '2021-09-06 11:44:24', '2021-09-06 11:44:24');

-- --------------------------------------------------------

--
-- Table structure for table `credits`
--

CREATE TABLE `credits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL COMMENT 'date',
  `purpose` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance_id` int(11) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insert_admin_id` int(11) NOT NULL COMMENT 'store_admin_id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `user_id`, `phone`, `address`, `city_id`, `created_at`, `updated_at`) VALUES
(4, 'shibbir ahmad', 2, '01737481778', 'Dhaka', 54, '2021-08-19 14:36:29', '2021-08-28 13:02:32');

-- --------------------------------------------------------

--
-- Table structure for table `debits`
--

CREATE TABLE `debits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purpose` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance_id` int(11) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insert_admin_id` int(11) NOT NULL COMMENT 'store_admin_id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `debits`
--

INSERT INTO `debits` (`id`, `purpose`, `balance_id`, `amount`, `comment`, `insert_admin_id`, `created_at`, `updated_at`) VALUES
(1, 'Product Purchase ', 1, 1200.00, 'product purchase paid \'1200\'', 1, '2021-07-10 03:17:05', '2021-07-10 03:17:05'),
(2, 'Product Purchase ', 10, 500.00, 'product purchase paid \'500\'', 1, '2021-07-10 04:19:30', '2021-07-10 04:19:30'),
(3, 'Product Purchase ', 1, 500.00, 'product purchase paid \'500\'', 1, '2021-07-10 05:03:09', '2021-07-10 05:03:09'),
(4, 'Product Purchase ', 2, 5000.00, 'product purchase paid \'5000\'', 1, '2021-07-13 13:05:13', '2021-07-13 13:05:13');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_09_064312_create_pages_table', 1),
(5, '2021_06_09_120803_create_categories_table', 1),
(15, '2021_06_14_182006_create_products_table', 2),
(16, '2021_06_14_185429_create_shipment_infos_table', 2),
(17, '2021_06_14_185738_create_product_images_table', 2),
(18, '2021_06_16_004046_create_protduct_categories_table', 2),
(19, '2021_06_16_004413_create_protduct_sub_categories_table', 2),
(20, '2021_06_16_004434_create_protduct_sub_sub_categories_table', 2),
(21, '2021_06_18_192322_create_suppliers_table', 2),
(22, '2021_06_18_192356_create_purchases_table', 2),
(23, '2021_06_18_192426_create_purchase_items_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `city_id` int(11) DEFAULT NULL,
  `sub_city_id` int(11) DEFAULT NULL,
  `courier_id` int(11) DEFAULT NULL,
  `shipping_cost` int(11) NOT NULL DEFAULT 0,
  `discount` int(11) NOT NULL DEFAULT 0,
  `paid` int(11) NOT NULL DEFAULT 0,
  `paid_by` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` float NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'order placed',
  `coupon_id` int(11) DEFAULT NULL,
  `coupon_discount` int(11) DEFAULT NULL,
  `create_admin_id` int(11) DEFAULT NULL,
  `pending_admin_id` int(11) DEFAULT NULL,
  `pending_date` date DEFAULT NULL,
  `approved_admin_id` int(11) DEFAULT NULL,
  `approved_date` date DEFAULT NULL,
  `shipment_admin_id` int(11) DEFAULT NULL,
  `shippment_date` date DEFAULT NULL,
  `delivered_admin_id` int(11) DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `cancel_admin_id` int(11) DEFAULT NULL,
  `cancel_date` date DEFAULT NULL,
  `return_admin_id` int(11) DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `reseller_id` int(11) DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `invoice_no`, `customer_id`, `city_id`, `sub_city_id`, `courier_id`, `shipping_cost`, `discount`, `paid`, `paid_by`, `total`, `status`, `coupon_id`, `coupon_discount`, `create_admin_id`, `pending_admin_id`, `pending_date`, `approved_admin_id`, `approved_date`, `shipment_admin_id`, `shippment_date`, `delivered_admin_id`, `delivery_date`, `cancel_admin_id`, `cancel_date`, `return_admin_id`, `return_date`, `reseller_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 100, 4, 1, 67, NULL, 70, 0, 0, NULL, 302.5, 'order placed\r\n\r\n', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-19 14:36:29', '2021-08-19 14:36:29'),
(2, 101, 4, 6, 273, NULL, 120, 0, 0, NULL, 0, 'order placed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-09-01 11:28:31', '2021-09-01 11:28:31'),
(3, 102, 4, 1, 77, NULL, 70, 0, 0, NULL, 1754.5, 'order placed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-09-01 11:37:55', '2021-09-01 11:37:55'),
(4, 103, 4, 1, 92, NULL, 70, 0, 0, NULL, 302.5, 'confirm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-09-01 11:38:50', '2021-09-01 12:50:38'),
(5, 104, 4, 14, 194, NULL, 120, 0, 0, NULL, 1755, 'order placed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-09-01 12:59:50', '2021-09-01 12:59:50'),
(6, 105, 4, 12, 159, NULL, 120, 0, 0, NULL, 484, 'order placed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-09-24 09:07:06', '2021-09-24 09:07:06'),
(7, 106, 4, 12, 159, NULL, 120, 0, 0, NULL, 2360, 'order placed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-09-24 11:41:53', '2021-09-24 11:41:53');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` float NOT NULL,
  `size` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `price`, `quantity`, `total`, `size`, `color`, `weight`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 250, 1, 250, 'S', 'White', '', 0, '2021-08-19 14:36:29', '2021-08-19 14:36:29'),
(2, 3, 1, 250, 1, 250, 'L', 'Black', '', 0, '2021-09-01 11:37:55', '2021-09-01 11:37:55'),
(3, 3, 13, 1200, 1, 1200, 'L', 'Black', '', 0, '2021-09-01 11:37:55', '2021-09-01 11:37:55'),
(4, 4, 4, 250, 1, 250, '', 'Black', '', 0, '2021-09-01 11:38:50', '2021-09-01 11:38:50'),
(5, 5, 2, 250, 1, 250, '', 'Black', '', 0, '2021-09-01 12:59:50', '2021-09-01 12:59:50'),
(6, 5, 13, 1200, 1, 1200, 'L', 'Black', '', 0, '2021-09-01 12:59:50', '2021-09-01 12:59:50'),
(7, 6, 4, 400, 1, 400, '', 'Black', '', 0, '2021-09-24 09:07:06', '2021-09-24 09:07:06'),
(8, 7, 1, 400, 2, 800, 'L', 'Black', '', 0, '2021-09-24 11:41:53', '2021-09-24 11:41:53'),
(9, 7, 13, 1150, 1, 1150, 'S', 'Red', '', 0, '2021-09-24 11:41:53', '2021-09-24 11:41:53');

-- --------------------------------------------------------

--
-- Table structure for table `order_payments`
--

CREATE TABLE `order_payments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_id` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_payments`
--

INSERT INTO `order_payments` (`id`, `name`, `email`, `phone`, `amount`, `address`, `status`, `order_id`, `transaction_id`, `currency`) VALUES
(1, 'shibbir ahmad', 'noemail@gmail.com', '01737481778', 48.4, 'Dhaka', 'Pending', '6', '614de99d3e95e', 'BDT'),
(2, 'shibbir ahmad', 'noemail@gmail.com', '01737481778', 236, 'Dhaka', 'Pending', '7', '614e0de312490', 'BDT');

-- --------------------------------------------------------

--
-- Table structure for table `otp_verifications`
--

CREATE TABLE `otp_verifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `otp_verifications`
--

INSERT INTO `otp_verifications` (`id`, `phone`, `code`, `created_at`, `updated_at`) VALUES
(1, '01737481778', '$2y$10$ZJayQAB6BShvkpPazxSK0OIJXtVp3SdoI1kFn05YeIrqu59XeaSjG', '2021-08-19 11:26:23', '2021-08-19 11:26:23'),
(2, '01737481778', '$2y$10$mWrU9pWmnMnaeKVrq0P3AuQjcTuCp5Ca0SjjQDrQeo6zZQ.F3dHEy', '2021-09-28 11:28:13', '2021-09-28 11:28:13'),
(3, '01737481778', '$2y$10$jkcUjhkcHM7zCt/lze0YBOzzEZ.8s9ni.fu0co3eG0ZiIEynO3p5q', '2021-09-28 11:34:40', '2021-09-28 11:34:40'),
(4, '01635172218', '$2y$10$CApmjKOhWVKqbedBFTwuxOSZD5kYXf5BUgmJAMUFVXg6Cfk56cUfu', '2021-09-28 11:40:13', '2021-09-28 11:40:13'),
(5, '01737481778', '$2y$10$2TtZpem8fr9LcMWbjAp1V.nnTqDxJQrLUMU0qesyHbAxhP9DRep5W', '2021-09-28 11:54:10', '2021-09-28 11:54:10'),
(6, '01737481778', '$2y$10$NhHVbjxBXggZy6ZHmBJKdeQK71J76xh5lLg6vaUdNZCaCpwUMv3Su', '2021-09-28 12:04:28', '2021-09-28 12:04:28'),
(7, '01759416979', '$2y$10$oHylAzJ9bVk.1xX9MLtrg.PwHaLYHoOO4pzjRhRfnY23b3O83cayu', '2021-09-28 12:05:24', '2021-09-28 12:05:24'),
(8, '01737481778', '$2y$10$OM5mHPLqXDrqd5yGzbo3cOgHeWXLXL6B29OFwYyoiXVhiZYguG4bm', '2021-09-28 12:09:21', '2021-09-28 12:09:21'),
(9, '01737481778', '$2y$10$vVmTzLO0qSOGFQ7S4auFs.Ig.xTiFhFIgd/vELbCG5P8kTyUmPqAe', '2021-09-28 12:59:55', '2021-09-28 12:59:55'),
(10, '01737481778', '$2y$10$E9OSias8.VPFyU6Z3tw5U.JbqHzI9Vsb5DvaoJ2ar8l6jr90RvkAy', '2021-09-28 13:02:07', '2021-09-28 13:02:07');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `slug`, `content`, `created_at`, `updated_at`) VALUES
(1, 'about', 'about', 'this is about page', '2021-06-13 09:58:19', '2021-06-13 09:58:19');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail_img` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `regular_price` int(11) NOT NULL,
  `discount` int(11) NOT NULL DEFAULT 0,
  `sale_price` int(11) NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `shiping_info_id` int(11) DEFAULT NULL,
  `stock` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_featured` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `labels` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `slug`, `thumbnail_img`, `details`, `regular_price`, `discount`, `sale_price`, `brand_id`, `shiping_info_id`, `stock`, `status`, `is_featured`, `collection_type`, `labels`, `tags`, `seo_title`, `seo_description`, `created_at`, `updated_at`) VALUES
(1, 'Half Sleeve Cotton T-Shirt', '1001', 'half-sleeve-cotton-t-shirt-1001', '1632238564Cem7EC5CdlwHVZoYu7NsPfK7jrzLQmJ0KWHPxC58.jpg', 'Half Sleeve Cotton T-Shirt\r\nFabrics: Cotton\r\nSize: M, L, XL, XXL\r\nM= Chest-36, Length-27\r\nL= Chest-38, Length-28\r\nXL=  Chest-40, Length-29\r\nXXL=  Chest-43, Length-30', 450, 50, 400, 1, 1, '0', '1', 'on', 'new arrival', 'new', NULL, NULL, NULL, '2021-09-21 09:36:05', '2021-09-21 09:36:05'),
(2, 'Half Sleeve Cotton T-Shirt', '1001', 'half-sleeve-cotton-t-shirt-1001', '1632238564Cem7EC5CdlwHVZoYu7NsPfK7jrzLQmJ0KWHPxC58.jpg', 'Half Sleeve Cotton T-Shirt\r\nFabrics: Cotton\r\nSize: M, L, XL, XXL\r\nM= Chest-36, Length-27\r\nL= Chest-38, Length-28\r\nXL=  Chest-40, Length-29\r\nXXL=  Chest-43, Length-30', 450, 50, 400, 1, 1, '0', '1', 'on', NULL, 'new', NULL, NULL, NULL, '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(3, 'Half Sleeve Cotton T-Shirt', '1002', 'half-sleeve-cotton-t-shirt-1002', '1632238564Cem7EC5CdlwHVZoYu7NsPfK7jrzLQmJ0KWHPxC58.jpg', 'Half Sleeve Cotton T-Shirt\r\nFabrics: Cotton\r\nSize: M, L, XL, XXL\r\nM= Chest-36, Length-27\r\nL= Chest-38, Length-28\r\nXL=  Chest-40, Length-29\r\nXXL=  Chest-43, Length-30', 450, 50, 400, 1, 1, '0', '1', 'on', NULL, 'new', NULL, NULL, NULL, '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(4, 'Half Sleeve Cotton T-Shirt', '1003', 'half-sleeve-cotton-t-shirt-1003', '1632238564Cem7EC5CdlwHVZoYu7NsPfK7jrzLQmJ0KWHPxC58.jpg', 'Half Sleeve Cotton T-Shirt\r\nFabrics: Cotton\r\nSize: M, L, XL, XXL\r\nM= Chest-36, Length-27\r\nL= Chest-38, Length-28\r\nXL=  Chest-40, Length-29\r\nXXL=  Chest-43, Length-30', 450, 50, 400, 1, 1, '0', '1', 'on', NULL, 'new', NULL, NULL, NULL, '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(5, 'Half Sleeve Cotton T-Shirt', '1004', 'half-sleeve-cotton-t-shirt-1004', '1632238564Cem7EC5CdlwHVZoYu7NsPfK7jrzLQmJ0KWHPxC58.jpg', 'Half Sleeve Cotton T-Shirt\r\nFabrics: Cotton\r\nSize: M, L, XL, XXL\r\nM= Chest-36, Length-27\r\nL= Chest-38, Length-28\r\nXL=  Chest-40, Length-29\r\nXXL=  Chest-43, Length-30', 450, 50, 400, 1, 1, '0', '1', 'on', NULL, 'new', NULL, NULL, NULL, '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(6, 'Half Sleeve Cotton T-Shirt', '1005', 'half-sleeve-cotton-t-shirt-1005', '1632238564Cem7EC5CdlwHVZoYu7NsPfK7jrzLQmJ0KWHPxC58.jpg', 'Half Sleeve Cotton T-Shirt\r\nFabrics: Cotton\r\nSize: M, L, XL, XXL\r\nM= Chest-36, Length-27\r\nL= Chest-38, Length-28\r\nXL=  Chest-40, Length-29\r\nXXL=  Chest-43, Length-30', 450, 50, 400, 1, 1, '0', '1', 'on', NULL, 'new', NULL, NULL, NULL, '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(7, 'Half Sleeve Cotton T-Shirt', '1006', 'half-sleeve-cotton-t-shirt-1006', '1632238564Cem7EC5CdlwHVZoYu7NsPfK7jrzLQmJ0KWHPxC58.jpg', 'Half Sleeve Cotton T-Shirt\r\nFabrics: Cotton\r\nSize: M, L, XL, XXL\r\nM= Chest-36, Length-27\r\nL= Chest-38, Length-28\r\nXL=  Chest-40, Length-29\r\nXXL=  Chest-43, Length-30', 450, 50, 400, 1, 1, '0', '1', 'on', NULL, 'new', NULL, NULL, NULL, '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(8, 'Half Sleeve Cotton T-Shirt', '1007', 'half-sleeve-cotton-t-shirt-1007', '1632238564Cem7EC5CdlwHVZoYu7NsPfK7jrzLQmJ0KWHPxC58.jpg', 'Half Sleeve Cotton T-Shirt\r\nFabrics: Cotton\r\nSize: M, L, XL, XXL\r\nM= Chest-36, Length-27\r\nL= Chest-38, Length-28\r\nXL=  Chest-40, Length-29\r\nXXL=  Chest-43, Length-30', 450, 50, 400, 1, 1, '0', '1', 'on', NULL, 'new', NULL, NULL, NULL, '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(9, 'Half Sleeve Cotton T-Shirt', '1008', 'half-sleeve-cotton-t-shirt-1008', '1632238564Cem7EC5CdlwHVZoYu7NsPfK7jrzLQmJ0KWHPxC58.jpg', 'Half Sleeve Cotton T-Shirt\r\nFabrics: Cotton\r\nSize: M, L, XL, XXL\r\nM= Chest-36, Length-27\r\nL= Chest-38, Length-28\r\nXL=  Chest-40, Length-29\r\nXXL=  Chest-43, Length-30', 450, 50, 400, 1, 1, '0', '1', 'on', NULL, 'new', NULL, NULL, NULL, '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(10, 'Half Sleeve Cotton T-Shirt', '1009', 'half-sleeve-cotton-t-shirt-1009', '1632238564Cem7EC5CdlwHVZoYu7NsPfK7jrzLQmJ0KWHPxC58.jpg', 'Half Sleeve Cotton T-Shirt\r\nFabrics: Cotton\r\nSize: M, L, XL, XXL\r\nM= Chest-36, Length-27\r\nL= Chest-38, Length-28\r\nXL=  Chest-40, Length-29\r\nXXL=  Chest-43, Length-30', 450, 50, 400, 1, 1, '0', '1', 'on', NULL, 'new', NULL, NULL, NULL, '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(11, 'Half Sleeve Cotton T-Shirt', '1010', 'half-sleeve-cotton-t-shirt-1010', '1632238564Cem7EC5CdlwHVZoYu7NsPfK7jrzLQmJ0KWHPxC58.jpg', 'Half Sleeve Cotton T-Shirt\r\nFabrics: Cotton\r\nSize: M, L, XL, XXL\r\nM= Chest-36, Length-27\r\nL= Chest-38, Length-28\r\nXL=  Chest-40, Length-29\r\nXXL=  Chest-43, Length-30', 450, 50, 400, 1, 1, '0', '1', 'on', NULL, 'new', NULL, NULL, NULL, '2021-09-21 09:36:39', '2021-09-21 09:36:39'),
(12, 'Half Sleeve Cotton T-Shirt', '1011', 'half-sleeve-cotton-t-shirt-1011', '1632238564Cem7EC5CdlwHVZoYu7NsPfK7jrzLQmJ0KWHPxC58.jpg', 'Half Sleeve Cotton T-Shirt\r\nFabrics: Cotton\r\nSize: M, L, XL, XXL\r\nM= Chest-36, Length-27\r\nL= Chest-38, Length-28\r\nXL=  Chest-40, Length-29\r\nXXL=  Chest-43, Length-30', 450, 50, 400, 1, 1, '0', '1', 'on', NULL, 'new', NULL, NULL, NULL, '2021-09-21 09:36:39', '2021-09-21 09:36:39'),
(13, 'Indian Cotton Febrics Panjabi', '1012', 'indian-cotton-febrics-panjabi-1012', '163223870856fQQN03CZybHCwqhGQ7gD8Cdu7SHucb52599evH.jpg', 'Indian Cotton Febrics Panjabi\r\nFabrics: Cotton/Linen\r\nSize: 40, 42, 44\r\nMeasurement:\r\n40=Chest-40, Length-40\r\n42=Chest-42, Length-42\r\n44=Chest-44, Length-44\r\nStylish & Fashionable men\'s wear.', 1250, 100, 1150, NULL, NULL, '0', '1', 'on', 'new arrival', 'new', NULL, NULL, NULL, '2021-09-21 09:38:29', '2021-09-21 09:38:29'),
(14, 'Indian Cotton Febrics Panjabi', '1013', 'indian-cotton-febrics-panjabi-1013', '163223870856fQQN03CZybHCwqhGQ7gD8Cdu7SHucb52599evH.jpg', 'Indian Cotton Febrics Panjabi\r\nFabrics: Cotton/Linen\r\nSize: 40, 42, 44\r\nMeasurement:\r\n40=Chest-40, Length-40\r\n42=Chest-42, Length-42\r\n44=Chest-44, Length-44\r\nStylish & Fashionable men\'s wear.', 1250, 100, 1150, NULL, NULL, '0', '1', 'on', NULL, 'new', NULL, NULL, NULL, '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(15, 'Indian Cotton Febrics Panjabi', '1014', 'indian-cotton-febrics-panjabi-1014', '163223870856fQQN03CZybHCwqhGQ7gD8Cdu7SHucb52599evH.jpg', 'Indian Cotton Febrics Panjabi\r\nFabrics: Cotton/Linen\r\nSize: 40, 42, 44\r\nMeasurement:\r\n40=Chest-40, Length-40\r\n42=Chest-42, Length-42\r\n44=Chest-44, Length-44\r\nStylish & Fashionable men\'s wear.', 1250, 100, 1150, NULL, NULL, '0', '1', 'on', NULL, 'new', NULL, NULL, NULL, '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(16, 'Indian Cotton Febrics Panjabi', '1015', 'indian-cotton-febrics-panjabi-1015', '163223870856fQQN03CZybHCwqhGQ7gD8Cdu7SHucb52599evH.jpg', 'Indian Cotton Febrics Panjabi\r\nFabrics: Cotton/Linen\r\nSize: 40, 42, 44\r\nMeasurement:\r\n40=Chest-40, Length-40\r\n42=Chest-42, Length-42\r\n44=Chest-44, Length-44\r\nStylish & Fashionable men\'s wear.', 1250, 100, 1150, NULL, NULL, '0', '1', 'on', NULL, 'new', NULL, NULL, NULL, '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(17, 'Indian Cotton Febrics Panjabi', '1016', 'indian-cotton-febrics-panjabi-1016', '163223870856fQQN03CZybHCwqhGQ7gD8Cdu7SHucb52599evH.jpg', 'Indian Cotton Febrics Panjabi\r\nFabrics: Cotton/Linen\r\nSize: 40, 42, 44\r\nMeasurement:\r\n40=Chest-40, Length-40\r\n42=Chest-42, Length-42\r\n44=Chest-44, Length-44\r\nStylish & Fashionable men\'s wear.', 1250, 100, 1150, NULL, NULL, '0', '1', 'on', NULL, 'new', NULL, NULL, NULL, '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(18, 'Indian Cotton Febrics Panjabi', '1017', 'indian-cotton-febrics-panjabi-1017', '163223870856fQQN03CZybHCwqhGQ7gD8Cdu7SHucb52599evH.jpg', 'Indian Cotton Febrics Panjabi\r\nFabrics: Cotton/Linen\r\nSize: 40, 42, 44\r\nMeasurement:\r\n40=Chest-40, Length-40\r\n42=Chest-42, Length-42\r\n44=Chest-44, Length-44\r\nStylish & Fashionable men\'s wear.', 1250, 100, 1150, NULL, NULL, '0', '1', 'on', NULL, 'new', NULL, NULL, NULL, '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(19, 'Indian Cotton Febrics Panjabi', '1018', 'indian-cotton-febrics-panjabi-1018', '163223870856fQQN03CZybHCwqhGQ7gD8Cdu7SHucb52599evH.jpg', 'Indian Cotton Febrics Panjabi\r\nFabrics: Cotton/Linen\r\nSize: 40, 42, 44\r\nMeasurement:\r\n40=Chest-40, Length-40\r\n42=Chest-42, Length-42\r\n44=Chest-44, Length-44\r\nStylish & Fashionable men\'s wear.', 1250, 100, 1150, NULL, NULL, '0', '1', 'on', NULL, 'new', NULL, NULL, NULL, '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(20, 'Indian Cotton Febrics Panjabi', '1019', 'indian-cotton-febrics-panjabi-1019', '163223870856fQQN03CZybHCwqhGQ7gD8Cdu7SHucb52599evH.jpg', 'Indian Cotton Febrics Panjabi\r\nFabrics: Cotton/Linen\r\nSize: 40, 42, 44\r\nMeasurement:\r\n40=Chest-40, Length-40\r\n42=Chest-42, Length-42\r\n44=Chest-44, Length-44\r\nStylish & Fashionable men\'s wear.', 1250, 100, 1150, NULL, NULL, '0', '1', 'on', NULL, 'new', NULL, NULL, NULL, '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(21, 'Indian Cotton Febrics Panjabi', '1020', 'indian-cotton-febrics-panjabi-1020', '163223870856fQQN03CZybHCwqhGQ7gD8Cdu7SHucb52599evH.jpg', 'Indian Cotton Febrics Panjabi\r\nFabrics: Cotton/Linen\r\nSize: 40, 42, 44\r\nMeasurement:\r\n40=Chest-40, Length-40\r\n42=Chest-42, Length-42\r\n44=Chest-44, Length-44\r\nStylish & Fashionable men\'s wear.', 1250, 100, 1150, NULL, NULL, '0', '1', 'on', NULL, 'new', NULL, NULL, NULL, '2021-09-21 09:39:08', '2021-09-21 09:39:08'),
(22, 'Indian Cotton Febrics Panjabi', '1021', 'indian-cotton-febrics-panjabi-1021', '163223870856fQQN03CZybHCwqhGQ7gD8Cdu7SHucb52599evH.jpg', 'Indian Cotton Febrics Panjabi\r\nFabrics: Cotton/Linen\r\nSize: 40, 42, 44\r\nMeasurement:\r\n40=Chest-40, Length-40\r\n42=Chest-42, Length-42\r\n44=Chest-44, Length-44\r\nStylish & Fashionable men\'s wear.', 1250, 100, 1150, NULL, NULL, '0', '1', 'on', NULL, 'new', NULL, NULL, NULL, '2021-09-21 09:39:08', '2021-09-21 09:39:08'),
(23, 'Indian Cotton Febrics Panjabi', '1022', 'indian-cotton-febrics-panjabi-1022', '163223870856fQQN03CZybHCwqhGQ7gD8Cdu7SHucb52599evH.jpg', 'Indian Cotton Febrics Panjabi\r\nFabrics: Cotton/Linen\r\nSize: 40, 42, 44\r\nMeasurement:\r\n40=Chest-40, Length-40\r\n42=Chest-42, Length-42\r\n44=Chest-44, Length-44\r\nStylish & Fashionable men\'s wear.', 1250, 100, 1150, NULL, NULL, '0', '1', 'on', NULL, 'new', NULL, NULL, NULL, '2021-09-21 09:39:08', '2021-09-21 09:39:08'),
(24, 'Indian Cotton Febrics Panjabi', '1023', 'indian-cotton-febrics-panjabi-1023', '163223870856fQQN03CZybHCwqhGQ7gD8Cdu7SHucb52599evH.jpg', 'Indian Cotton Febrics Panjabi\r\nFabrics: Cotton/Linen\r\nSize: 40, 42, 44\r\nMeasurement:\r\n40=Chest-40, Length-40\r\n42=Chest-42, Length-42\r\n44=Chest-44, Length-44\r\nStylish & Fashionable men\'s wear.', 1250, 100, 1150, NULL, NULL, '0', '1', 'on', NULL, 'new', NULL, NULL, NULL, '2021-09-21 09:39:08', '2021-09-21 09:39:08'),
(25, 'Universal Notebook Power Adapter', '1024', 'universal-notebook-power-adapter-1024', '1632239016sA0SB8h2VHzsnNOldAhH58pUJal7W5UmwMs58fbx.jpg', '**Product details of Universal Notebook Power Adapter**\r\nProduct Description Reliable power for your notebook and most mobile devices.\r\nit even powers mobile devices such as cell phones, smart phones, iPod, MP3 and more.\r\nThe built-in USB power port charges your mobile devices (USB Power Tips sold separately). T\r\nips are included for notebook computer charging, including tips for Dell, HP, Compaq, IBM, Lenovo, Toshiba, Sony, Gateway and Acer computers.\r\n100W Universal Laptop Power Supply 110-220v AC To DC 12V/16V/20V/24V Adapter For Laptop/Notebook 20pcs/Lot Free Shipping\r\nCategory: Laptop Adapters & Chargers\r\nShort Description: 100% Brand New. Adjustable output voltage at 15V, 16V, 18V, 19V, 20V, 24V Universal Input Voltage at 110V-240V AC Output at 15 - 24V DC Replace power supply for Dell PA-6 or Dell PA-9', 800, 200, 600, NULL, 1, '0', '1', 'on', 'new arrival', 'new', NULL, NULL, NULL, '2021-09-21 09:43:36', '2021-09-21 09:43:36'),
(26, 'Universal Notebook Power Adapter', '1025', 'universal-notebook-power-adapter-1025', '1632239016sA0SB8h2VHzsnNOldAhH58pUJal7W5UmwMs58fbx.jpg', '**Product details of Universal Notebook Power Adapter**\r\nProduct Description Reliable power for your notebook and most mobile devices.\r\nit even powers mobile devices such as cell phones, smart phones, iPod, MP3 and more.\r\nThe built-in USB power port charges your mobile devices (USB Power Tips sold separately). T\r\nips are included for notebook computer charging, including tips for Dell, HP, Compaq, IBM, Lenovo, Toshiba, Sony, Gateway and Acer computers.\r\n100W Universal Laptop Power Supply 110-220v AC To DC 12V/16V/20V/24V Adapter For Laptop/Notebook 20pcs/Lot Free Shipping\r\nCategory: Laptop Adapters & Chargers\r\nShort Description: 100% Brand New. Adjustable output voltage at 15V, 16V, 18V, 19V, 20V, 24V Universal Input Voltage at 110V-240V AC Output at 15 - 24V DC Replace power supply for Dell PA-6 or Dell PA-9', 800, 200, 600, NULL, 1, '0', '1', 'on', NULL, 'new', NULL, NULL, NULL, '2021-09-21 09:43:43', '2021-09-21 09:43:43'),
(27, 'Universal Notebook Power Adapter', '1026', 'universal-notebook-power-adapter-1026', '1632239016sA0SB8h2VHzsnNOldAhH58pUJal7W5UmwMs58fbx.jpg', '**Product details of Universal Notebook Power Adapter**\r\nProduct Description Reliable power for your notebook and most mobile devices.\r\nit even powers mobile devices such as cell phones, smart phones, iPod, MP3 and more.\r\nThe built-in USB power port charges your mobile devices (USB Power Tips sold separately). T\r\nips are included for notebook computer charging, including tips for Dell, HP, Compaq, IBM, Lenovo, Toshiba, Sony, Gateway and Acer computers.\r\n100W Universal Laptop Power Supply 110-220v AC To DC 12V/16V/20V/24V Adapter For Laptop/Notebook 20pcs/Lot Free Shipping\r\nCategory: Laptop Adapters & Chargers\r\nShort Description: 100% Brand New. Adjustable output voltage at 15V, 16V, 18V, 19V, 20V, 24V Universal Input Voltage at 110V-240V AC Output at 15 - 24V DC Replace power supply for Dell PA-6 or Dell PA-9', 800, 200, 600, NULL, 1, '0', '1', 'on', NULL, 'new', NULL, NULL, NULL, '2021-09-21 09:43:43', '2021-09-21 09:43:43'),
(28, 'Universal Notebook Power Adapter', '1027', 'universal-notebook-power-adapter-1027', '1632239016sA0SB8h2VHzsnNOldAhH58pUJal7W5UmwMs58fbx.jpg', '**Product details of Universal Notebook Power Adapter**\r\nProduct Description Reliable power for your notebook and most mobile devices.\r\nit even powers mobile devices such as cell phones, smart phones, iPod, MP3 and more.\r\nThe built-in USB power port charges your mobile devices (USB Power Tips sold separately). T\r\nips are included for notebook computer charging, including tips for Dell, HP, Compaq, IBM, Lenovo, Toshiba, Sony, Gateway and Acer computers.\r\n100W Universal Laptop Power Supply 110-220v AC To DC 12V/16V/20V/24V Adapter For Laptop/Notebook 20pcs/Lot Free Shipping\r\nCategory: Laptop Adapters & Chargers\r\nShort Description: 100% Brand New. Adjustable output voltage at 15V, 16V, 18V, 19V, 20V, 24V Universal Input Voltage at 110V-240V AC Output at 15 - 24V DC Replace power supply for Dell PA-6 or Dell PA-9', 800, 200, 600, NULL, 1, '0', '1', 'on', NULL, 'new', NULL, NULL, NULL, '2021-09-21 09:43:43', '2021-09-21 09:43:43'),
(29, 'Universal Notebook Power Adapter', '1028', 'universal-notebook-power-adapter-1028', '1632239016sA0SB8h2VHzsnNOldAhH58pUJal7W5UmwMs58fbx.jpg', '**Product details of Universal Notebook Power Adapter**\r\nProduct Description Reliable power for your notebook and most mobile devices.\r\nit even powers mobile devices such as cell phones, smart phones, iPod, MP3 and more.\r\nThe built-in USB power port charges your mobile devices (USB Power Tips sold separately). T\r\nips are included for notebook computer charging, including tips for Dell, HP, Compaq, IBM, Lenovo, Toshiba, Sony, Gateway and Acer computers.\r\n100W Universal Laptop Power Supply 110-220v AC To DC 12V/16V/20V/24V Adapter For Laptop/Notebook 20pcs/Lot Free Shipping\r\nCategory: Laptop Adapters & Chargers\r\nShort Description: 100% Brand New. Adjustable output voltage at 15V, 16V, 18V, 19V, 20V, 24V Universal Input Voltage at 110V-240V AC Output at 15 - 24V DC Replace power supply for Dell PA-6 or Dell PA-9', 800, 200, 600, NULL, 1, '0', '1', 'on', NULL, 'new', NULL, NULL, NULL, '2021-09-21 09:43:43', '2021-09-21 09:43:43'),
(30, 'Universal Notebook Power Adapter', '1029', 'universal-notebook-power-adapter-1029', '1632239016sA0SB8h2VHzsnNOldAhH58pUJal7W5UmwMs58fbx.jpg', '**Product details of Universal Notebook Power Adapter**\r\nProduct Description Reliable power for your notebook and most mobile devices.\r\nit even powers mobile devices such as cell phones, smart phones, iPod, MP3 and more.\r\nThe built-in USB power port charges your mobile devices (USB Power Tips sold separately). T\r\nips are included for notebook computer charging, including tips for Dell, HP, Compaq, IBM, Lenovo, Toshiba, Sony, Gateway and Acer computers.\r\n100W Universal Laptop Power Supply 110-220v AC To DC 12V/16V/20V/24V Adapter For Laptop/Notebook 20pcs/Lot Free Shipping\r\nCategory: Laptop Adapters & Chargers\r\nShort Description: 100% Brand New. Adjustable output voltage at 15V, 16V, 18V, 19V, 20V, 24V Universal Input Voltage at 110V-240V AC Output at 15 - 24V DC Replace power supply for Dell PA-6 or Dell PA-9', 800, 200, 600, NULL, 1, '0', '1', 'on', NULL, 'new', NULL, NULL, NULL, '2021-09-21 09:43:43', '2021-09-21 09:43:43'),
(31, 'High Sound able new smart sound box', '1030', 'high-sound-able-new-smart-sound-box-1030', '16322395098.jpg', 'Unrestrained and portable active stereo speaker\r\nFree from the confines of wires and chords\r\n20 hours of portable capabilities\r\nDouble-ended Coil Cord with 3.5mm Stereo Plugs Included\r\n3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X', 2500, 0, 2500, 2, 2, '0', '1', 'on', 'new arrival', 'new', NULL, NULL, NULL, '2021-09-21 09:47:11', '2021-09-21 09:51:49'),
(38, 'High Sound able new smart sound box', '1031', 'high-sound-able-new-smart-sound-box-1031', '16322395098.jpg', 'Unrestrained and portable active stereo speaker\r\nFree from the confines of wires and chords\r\n20 hours of portable capabilities\r\nDouble-ended Coil Cord with 3.5mm Stereo Plugs Included\r\n3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X', 2500, 0, 2500, 2, 2, '0', '1', 'on', NULL, 'new', NULL, NULL, NULL, '2021-09-21 09:55:11', '2021-09-21 09:55:11'),
(39, 'High Sound able new smart sound box', '1038', 'high-sound-able-new-smart-sound-box-1038', '16322395098.jpg', 'Unrestrained and portable active stereo speaker\r\nFree from the confines of wires and chords\r\n20 hours of portable capabilities\r\nDouble-ended Coil Cord with 3.5mm Stereo Plugs Included\r\n3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X', 2500, 0, 2500, 2, 2, '0', '1', 'on', NULL, 'new', NULL, NULL, NULL, '2021-09-21 09:55:11', '2021-09-21 09:55:11'),
(40, 'High Sound able new smart sound box', '1039', 'high-sound-able-new-smart-sound-box-1039', '16322395098.jpg', 'Unrestrained and portable active stereo speaker\r\nFree from the confines of wires and chords\r\n20 hours of portable capabilities\r\nDouble-ended Coil Cord with 3.5mm Stereo Plugs Included\r\n3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X', 2500, 0, 2500, 2, 2, '0', '1', 'on', NULL, 'new', NULL, NULL, NULL, '2021-09-21 09:55:11', '2021-09-21 09:55:11'),
(41, 'High Sound able new smart sound box', '1040', 'high-sound-able-new-smart-sound-box-1040', '16322395098.jpg', 'Unrestrained and portable active stereo speaker\r\nFree from the confines of wires and chords\r\n20 hours of portable capabilities\r\nDouble-ended Coil Cord with 3.5mm Stereo Plugs Included\r\n3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X', 2500, 0, 2500, 2, 2, '0', '1', 'on', NULL, 'new', NULL, NULL, NULL, '2021-09-21 09:55:11', '2021-09-21 09:55:11'),
(42, 'High Sound able new smart sound box', '1041', 'high-sound-able-new-smart-sound-box-1041', '16322395098.jpg', 'Unrestrained and portable active stereo speaker\r\nFree from the confines of wires and chords\r\n20 hours of portable capabilities\r\nDouble-ended Coil Cord with 3.5mm Stereo Plugs Included\r\n3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X', 2500, 0, 2500, 2, 2, '0', '1', 'on', NULL, 'new', NULL, NULL, NULL, '2021-09-21 09:55:11', '2021-09-21 09:55:11'),
(43, 'High Sound able new smart sound box', '1042', 'high-sound-able-new-smart-sound-box-1042', '16322395098.jpg', 'Unrestrained and portable active stereo speaker\r\nFree from the confines of wires and chords\r\n20 hours of portable capabilities\r\nDouble-ended Coil Cord with 3.5mm Stereo Plugs Included\r\n3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X', 2500, 0, 2500, 2, 2, '0', '1', 'on', NULL, 'new', NULL, NULL, NULL, '2021-09-21 09:55:11', '2021-09-21 09:55:11'),
(44, 'High Sound able new smart sound box', '1043', 'high-sound-able-new-smart-sound-box-1043', '16322395098.jpg', 'Unrestrained and portable active stereo speaker\r\nFree from the confines of wires and chords\r\n20 hours of portable capabilities\r\nDouble-ended Coil Cord with 3.5mm Stereo Plugs Included\r\n3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X', 2500, 0, 2500, 2, 2, '0', '1', 'on', NULL, 'new', NULL, NULL, NULL, '2021-09-21 09:55:11', '2021-09-21 09:55:11');

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `product_id`, `attribute_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2021-09-21 09:36:06', '2021-09-21 09:36:06'),
(2, 1, 1, '2021-09-21 09:36:06', '2021-09-21 09:36:06'),
(3, 2, 2, '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(4, 3, 2, '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(5, 4, 2, '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(6, 5, 2, '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(7, 6, 2, '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(8, 7, 2, '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(9, 8, 2, '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(10, 9, 2, '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(11, 10, 2, '2021-09-21 09:36:39', '2021-09-21 09:36:39'),
(12, 11, 2, '2021-09-21 09:36:39', '2021-09-21 09:36:39'),
(13, 12, 2, '2021-09-21 09:36:39', '2021-09-21 09:36:39'),
(14, 13, 2, '2021-09-21 09:38:29', '2021-09-21 09:38:29'),
(15, 13, 1, '2021-09-21 09:38:29', '2021-09-21 09:38:29'),
(16, 14, 2, '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(17, 15, 2, '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(18, 16, 2, '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(19, 17, 2, '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(20, 18, 2, '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(21, 19, 2, '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(22, 20, 2, '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(23, 21, 2, '2021-09-21 09:39:08', '2021-09-21 09:39:08'),
(24, 22, 2, '2021-09-21 09:39:08', '2021-09-21 09:39:08'),
(25, 23, 2, '2021-09-21 09:39:08', '2021-09-21 09:39:08'),
(26, 24, 2, '2021-09-21 09:39:08', '2021-09-21 09:39:08'),
(27, 25, 3, '2021-09-21 09:43:36', '2021-09-21 09:43:36'),
(28, 26, 3, '2021-09-21 09:43:43', '2021-09-21 09:43:43'),
(29, 27, 3, '2021-09-21 09:43:43', '2021-09-21 09:43:43'),
(30, 28, 3, '2021-09-21 09:43:43', '2021-09-21 09:43:43'),
(31, 29, 3, '2021-09-21 09:43:43', '2021-09-21 09:43:43'),
(32, 30, 3, '2021-09-21 09:43:43', '2021-09-21 09:43:43'),
(34, 31, 3, '2021-09-21 09:51:49', '2021-09-21 09:51:49'),
(35, 38, 3, '2021-09-21 09:55:11', '2021-09-21 09:55:11'),
(36, 39, 3, '2021-09-21 09:55:11', '2021-09-21 09:55:11'),
(37, 40, 3, '2021-09-21 09:55:11', '2021-09-21 09:55:11'),
(38, 41, 3, '2021-09-21 09:55:11', '2021-09-21 09:55:11'),
(39, 42, 3, '2021-09-21 09:55:11', '2021-09-21 09:55:11'),
(40, 43, 3, '2021-09-21 09:55:11', '2021-09-21 09:55:11'),
(41, 44, 3, '2021-09-21 09:55:11', '2021-09-21 09:55:11');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '2021-09-21 09:36:06', '2021-09-21 09:36:06'),
(2, '1', '2', '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(3, '1', '3', '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(4, '1', '4', '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(5, '1', '5', '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(6, '1', '6', '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(7, '1', '7', '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(8, '1', '8', '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(9, '1', '9', '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(10, '1', '10', '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(11, '1', '11', '2021-09-21 09:36:39', '2021-09-21 09:36:39'),
(12, '1', '12', '2021-09-21 09:36:39', '2021-09-21 09:36:39'),
(13, '1', '13', '2021-09-21 09:38:29', '2021-09-21 09:38:29'),
(14, '1', '14', '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(15, '1', '15', '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(16, '1', '16', '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(17, '1', '17', '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(18, '1', '18', '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(19, '1', '19', '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(20, '1', '20', '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(21, '1', '21', '2021-09-21 09:39:08', '2021-09-21 09:39:08'),
(22, '1', '22', '2021-09-21 09:39:08', '2021-09-21 09:39:08'),
(23, '1', '23', '2021-09-21 09:39:08', '2021-09-21 09:39:08'),
(24, '1', '24', '2021-09-21 09:39:08', '2021-09-21 09:39:08'),
(25, '7', '25', '2021-09-21 09:43:36', '2021-09-21 09:43:36'),
(26, '7', '26', '2021-09-21 09:43:43', '2021-09-21 09:43:43'),
(27, '7', '27', '2021-09-21 09:43:43', '2021-09-21 09:43:43'),
(28, '7', '28', '2021-09-21 09:43:43', '2021-09-21 09:43:43'),
(29, '7', '29', '2021-09-21 09:43:43', '2021-09-21 09:43:43'),
(30, '7', '30', '2021-09-21 09:43:43', '2021-09-21 09:43:43'),
(37, '7', '31', '2021-09-21 09:51:49', '2021-09-21 09:51:49'),
(39, '7', '38', '2021-09-21 09:55:11', '2021-09-21 09:55:11'),
(40, '7', '39', '2021-09-21 09:55:11', '2021-09-21 09:55:11'),
(41, '7', '40', '2021-09-21 09:55:11', '2021-09-21 09:55:11'),
(42, '7', '41', '2021-09-21 09:55:11', '2021-09-21 09:55:11'),
(43, '7', '42', '2021-09-21 09:55:11', '2021-09-21 09:55:11'),
(44, '7', '43', '2021-09-21 09:55:11', '2021-09-21 09:55:11'),
(45, '7', '44', '2021-09-21 09:55:11', '2021-09-21 09:55:11');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'images/products/ojSR5FnE8Kun7Ldp0uiHZmrCQ8ba3xC30DN8zLai.jpg', '2021-09-21 09:36:06', '2021-09-21 09:36:06'),
(2, 1, 'images/products/ClQpu1BZWatJ7FcYgdqPQvFsDCxiS6rn4DFbpDTx.jpg', '2021-09-21 09:36:06', '2021-09-21 09:36:06'),
(3, 1, 'images/products/ArALkhSYgfzxyfIthvcKHDBSCdNDaKuB2lQt5TDe.jpg', '2021-09-21 09:36:06', '2021-09-21 09:36:06'),
(4, 2, 'images/products/ojSR5FnE8Kun7Ldp0uiHZmrCQ8ba3xC30DN8zLai.jpg', '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(5, 3, 'images/products/ojSR5FnE8Kun7Ldp0uiHZmrCQ8ba3xC30DN8zLai.jpg', '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(6, 4, 'images/products/ojSR5FnE8Kun7Ldp0uiHZmrCQ8ba3xC30DN8zLai.jpg', '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(7, 5, 'images/products/ojSR5FnE8Kun7Ldp0uiHZmrCQ8ba3xC30DN8zLai.jpg', '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(8, 6, 'images/products/ojSR5FnE8Kun7Ldp0uiHZmrCQ8ba3xC30DN8zLai.jpg', '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(9, 7, 'images/products/ojSR5FnE8Kun7Ldp0uiHZmrCQ8ba3xC30DN8zLai.jpg', '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(10, 8, 'images/products/ojSR5FnE8Kun7Ldp0uiHZmrCQ8ba3xC30DN8zLai.jpg', '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(11, 9, 'images/products/ojSR5FnE8Kun7Ldp0uiHZmrCQ8ba3xC30DN8zLai.jpg', '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(12, 10, 'images/products/ojSR5FnE8Kun7Ldp0uiHZmrCQ8ba3xC30DN8zLai.jpg', '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(13, 11, 'images/products/ojSR5FnE8Kun7Ldp0uiHZmrCQ8ba3xC30DN8zLai.jpg', '2021-09-21 09:36:39', '2021-09-21 09:36:39'),
(14, 12, 'images/products/ojSR5FnE8Kun7Ldp0uiHZmrCQ8ba3xC30DN8zLai.jpg', '2021-09-21 09:36:39', '2021-09-21 09:36:39'),
(15, 13, 'images/products/5GRKT0tuSobqV6rKWI6kYMUyQhDjYWu1Y5Pqf3SO.jpg', '2021-09-21 09:38:29', '2021-09-21 09:38:29'),
(16, 13, 'images/products/L42EXYhylD71V136GW5yw07vDJ1VqfhXyfmQtbmS.jpg', '2021-09-21 09:38:29', '2021-09-21 09:38:29'),
(17, 13, 'images/products/rztPhNOG83aeMoayY6Mtmx4z4B29vxzPmYNfPi3y.jpg', '2021-09-21 09:38:29', '2021-09-21 09:38:29'),
(18, 14, 'images/products/5GRKT0tuSobqV6rKWI6kYMUyQhDjYWu1Y5Pqf3SO.jpg', '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(19, 15, 'images/products/5GRKT0tuSobqV6rKWI6kYMUyQhDjYWu1Y5Pqf3SO.jpg', '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(20, 16, 'images/products/5GRKT0tuSobqV6rKWI6kYMUyQhDjYWu1Y5Pqf3SO.jpg', '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(21, 17, 'images/products/5GRKT0tuSobqV6rKWI6kYMUyQhDjYWu1Y5Pqf3SO.jpg', '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(22, 18, 'images/products/5GRKT0tuSobqV6rKWI6kYMUyQhDjYWu1Y5Pqf3SO.jpg', '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(23, 19, 'images/products/5GRKT0tuSobqV6rKWI6kYMUyQhDjYWu1Y5Pqf3SO.jpg', '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(24, 20, 'images/products/5GRKT0tuSobqV6rKWI6kYMUyQhDjYWu1Y5Pqf3SO.jpg', '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(25, 21, 'images/products/5GRKT0tuSobqV6rKWI6kYMUyQhDjYWu1Y5Pqf3SO.jpg', '2021-09-21 09:39:08', '2021-09-21 09:39:08'),
(26, 22, 'images/products/5GRKT0tuSobqV6rKWI6kYMUyQhDjYWu1Y5Pqf3SO.jpg', '2021-09-21 09:39:08', '2021-09-21 09:39:08'),
(27, 23, 'images/products/5GRKT0tuSobqV6rKWI6kYMUyQhDjYWu1Y5Pqf3SO.jpg', '2021-09-21 09:39:08', '2021-09-21 09:39:08'),
(28, 24, 'images/products/5GRKT0tuSobqV6rKWI6kYMUyQhDjYWu1Y5Pqf3SO.jpg', '2021-09-21 09:39:08', '2021-09-21 09:39:08'),
(29, 25, 'images/products/XY6EG6eLwUj1rmDL1MSXhW4qVuHO6TPGkPal3e0y.jpg', '2021-09-21 09:43:36', '2021-09-21 09:43:36'),
(30, 26, 'images/products/XY6EG6eLwUj1rmDL1MSXhW4qVuHO6TPGkPal3e0y.jpg', '2021-09-21 09:43:43', '2021-09-21 09:43:43'),
(31, 27, 'images/products/XY6EG6eLwUj1rmDL1MSXhW4qVuHO6TPGkPal3e0y.jpg', '2021-09-21 09:43:43', '2021-09-21 09:43:43'),
(32, 28, 'images/products/XY6EG6eLwUj1rmDL1MSXhW4qVuHO6TPGkPal3e0y.jpg', '2021-09-21 09:43:43', '2021-09-21 09:43:43'),
(33, 29, 'images/products/XY6EG6eLwUj1rmDL1MSXhW4qVuHO6TPGkPal3e0y.jpg', '2021-09-21 09:43:43', '2021-09-21 09:43:43'),
(34, 30, 'images/products/XY6EG6eLwUj1rmDL1MSXhW4qVuHO6TPGkPal3e0y.jpg', '2021-09-21 09:43:43', '2021-09-21 09:43:43'),
(35, 31, 'images/products/zKrcw5ONGtGXS58QOoIPG5ZqmoGh3l0sxCNk5MTc.jpg', '2021-09-21 09:47:11', '2021-09-21 09:47:11'),
(41, 31, 'images/products/uNHYXsx40vea0vhTDhIu42VkTEeN1z7htsBvUA1E.jpg', '2021-09-21 09:51:49', '2021-09-21 09:51:49'),
(43, 38, 'images/products/zKrcw5ONGtGXS58QOoIPG5ZqmoGh3l0sxCNk5MTc.jpg', '2021-09-21 09:55:11', '2021-09-21 09:55:11'),
(44, 39, 'images/products/zKrcw5ONGtGXS58QOoIPG5ZqmoGh3l0sxCNk5MTc.jpg', '2021-09-21 09:55:11', '2021-09-21 09:55:11'),
(45, 40, 'images/products/zKrcw5ONGtGXS58QOoIPG5ZqmoGh3l0sxCNk5MTc.jpg', '2021-09-21 09:55:11', '2021-09-21 09:55:11'),
(46, 41, 'images/products/zKrcw5ONGtGXS58QOoIPG5ZqmoGh3l0sxCNk5MTc.jpg', '2021-09-21 09:55:11', '2021-09-21 09:55:11'),
(47, 42, 'images/products/zKrcw5ONGtGXS58QOoIPG5ZqmoGh3l0sxCNk5MTc.jpg', '2021-09-21 09:55:11', '2021-09-21 09:55:11'),
(48, 43, 'images/products/zKrcw5ONGtGXS58QOoIPG5ZqmoGh3l0sxCNk5MTc.jpg', '2021-09-21 09:55:11', '2021-09-21 09:55:11'),
(49, 44, 'images/products/zKrcw5ONGtGXS58QOoIPG5ZqmoGh3l0sxCNk5MTc.jpg', '2021-09-21 09:55:11', '2021-09-21 09:55:11');

-- --------------------------------------------------------

--
-- Table structure for table `product_sub_categories`
--

CREATE TABLE `product_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sub_categories`
--

INSERT INTO `product_sub_categories` (`id`, `sub_category_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2021-09-21 09:36:06', '2021-09-21 09:36:06'),
(2, 3, 2, '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(3, 3, 3, '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(4, 3, 4, '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(5, 3, 5, '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(6, 3, 6, '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(7, 3, 7, '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(8, 3, 8, '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(9, 3, 9, '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(10, 3, 10, '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(11, 3, 11, '2021-09-21 09:36:39', '2021-09-21 09:36:39'),
(12, 3, 12, '2021-09-21 09:36:39', '2021-09-21 09:36:39'),
(13, 15, 13, '2021-09-21 09:38:29', '2021-09-21 09:38:29'),
(14, 15, 14, '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(15, 15, 15, '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(16, 15, 16, '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(17, 15, 17, '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(18, 15, 18, '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(19, 15, 19, '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(20, 15, 20, '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(21, 15, 21, '2021-09-21 09:39:08', '2021-09-21 09:39:08'),
(22, 15, 22, '2021-09-21 09:39:08', '2021-09-21 09:39:08'),
(23, 15, 23, '2021-09-21 09:39:08', '2021-09-21 09:39:08'),
(24, 15, 24, '2021-09-21 09:39:08', '2021-09-21 09:39:08'),
(25, 10, 25, '2021-09-21 09:43:36', '2021-09-21 09:43:36'),
(26, 10, 26, '2021-09-21 09:43:43', '2021-09-21 09:43:43'),
(27, 10, 27, '2021-09-21 09:43:43', '2021-09-21 09:43:43'),
(28, 10, 28, '2021-09-21 09:43:43', '2021-09-21 09:43:43'),
(29, 10, 29, '2021-09-21 09:43:43', '2021-09-21 09:43:43'),
(30, 10, 30, '2021-09-21 09:43:43', '2021-09-21 09:43:43'),
(38, 11, 31, '2021-09-21 09:51:49', '2021-09-21 09:51:49'),
(39, 12, 31, '2021-09-21 09:51:49', '2021-09-21 09:51:49'),
(41, 11, 38, '2021-09-21 09:55:11', '2021-09-21 09:55:11'),
(42, 11, 39, '2021-09-21 09:55:11', '2021-09-21 09:55:11'),
(43, 11, 40, '2021-09-21 09:55:11', '2021-09-21 09:55:11'),
(44, 11, 41, '2021-09-21 09:55:11', '2021-09-21 09:55:11'),
(45, 11, 42, '2021-09-21 09:55:11', '2021-09-21 09:55:11'),
(46, 11, 43, '2021-09-21 09:55:11', '2021-09-21 09:55:11'),
(47, 11, 44, '2021-09-21 09:55:11', '2021-09-21 09:55:11');

-- --------------------------------------------------------

--
-- Table structure for table `product_sub_sub_categories`
--

CREATE TABLE `product_sub_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_sub_category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sub_sub_categories`
--

INSERT INTO `product_sub_sub_categories` (`id`, `sub_sub_category_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2021-09-21 09:36:06', '2021-09-21 09:36:06'),
(2, 5, 1, '2021-09-21 09:36:06', '2021-09-21 09:36:06'),
(3, 3, 2, '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(4, 3, 3, '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(5, 3, 4, '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(6, 3, 5, '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(7, 3, 6, '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(8, 3, 7, '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(9, 3, 8, '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(10, 3, 9, '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(11, 3, 10, '2021-09-21 09:36:39', '2021-09-21 09:36:39'),
(12, 3, 11, '2021-09-21 09:36:39', '2021-09-21 09:36:39'),
(13, 3, 12, '2021-09-21 09:36:39', '2021-09-21 09:36:39'),
(14, 12, 13, '2021-09-21 09:38:29', '2021-09-21 09:38:29'),
(15, 14, 13, '2021-09-21 09:38:29', '2021-09-21 09:38:29'),
(16, 12, 14, '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(17, 12, 15, '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(18, 12, 16, '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(19, 12, 17, '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(20, 12, 18, '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(21, 12, 19, '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(22, 12, 20, '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(23, 12, 21, '2021-09-21 09:39:08', '2021-09-21 09:39:08'),
(24, 12, 22, '2021-09-21 09:39:08', '2021-09-21 09:39:08'),
(25, 12, 23, '2021-09-21 09:39:08', '2021-09-21 09:39:08'),
(26, 12, 24, '2021-09-21 09:39:08', '2021-09-21 09:39:08'),
(27, 9, 25, '2021-09-21 09:43:36', '2021-09-21 09:43:36'),
(28, 9, 26, '2021-09-21 09:43:43', '2021-09-21 09:43:43'),
(29, 9, 27, '2021-09-21 09:43:43', '2021-09-21 09:43:43'),
(30, 9, 28, '2021-09-21 09:43:43', '2021-09-21 09:43:43'),
(31, 9, 29, '2021-09-21 09:43:43', '2021-09-21 09:43:43'),
(32, 9, 30, '2021-09-21 09:43:43', '2021-09-21 09:43:43');

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `variant_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `variant_id`, `created_at`, `updated_at`) VALUES
(1, 1, 30, '2021-09-21 09:36:06', '2021-09-21 09:36:06'),
(2, 1, 31, '2021-09-21 09:36:06', '2021-09-21 09:36:06'),
(3, 1, 34, '2021-09-21 09:36:06', '2021-09-21 09:36:06'),
(4, 1, 35, '2021-09-21 09:36:06', '2021-09-21 09:36:06'),
(5, 1, 1, '2021-09-21 09:36:06', '2021-09-21 09:36:06'),
(6, 1, 2, '2021-09-21 09:36:06', '2021-09-21 09:36:06'),
(7, 1, 3, '2021-09-21 09:36:06', '2021-09-21 09:36:06'),
(8, 1, 4, '2021-09-21 09:36:06', '2021-09-21 09:36:06'),
(9, 1, 5, '2021-09-21 09:36:06', '2021-09-21 09:36:06'),
(10, 2, 30, '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(11, 3, 30, '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(12, 4, 30, '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(13, 5, 30, '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(14, 6, 30, '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(15, 7, 30, '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(16, 8, 30, '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(17, 9, 30, '2021-09-21 09:36:38', '2021-09-21 09:36:38'),
(18, 10, 30, '2021-09-21 09:36:39', '2021-09-21 09:36:39'),
(19, 11, 30, '2021-09-21 09:36:39', '2021-09-21 09:36:39'),
(20, 12, 30, '2021-09-21 09:36:39', '2021-09-21 09:36:39'),
(21, 13, 30, '2021-09-21 09:38:29', '2021-09-21 09:38:29'),
(22, 13, 31, '2021-09-21 09:38:29', '2021-09-21 09:38:29'),
(23, 13, 34, '2021-09-21 09:38:29', '2021-09-21 09:38:29'),
(24, 13, 35, '2021-09-21 09:38:29', '2021-09-21 09:38:29'),
(25, 13, 1, '2021-09-21 09:38:29', '2021-09-21 09:38:29'),
(26, 13, 2, '2021-09-21 09:38:29', '2021-09-21 09:38:29'),
(27, 13, 3, '2021-09-21 09:38:29', '2021-09-21 09:38:29'),
(28, 13, 4, '2021-09-21 09:38:29', '2021-09-21 09:38:29'),
(29, 13, 5, '2021-09-21 09:38:29', '2021-09-21 09:38:29'),
(30, 14, 30, '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(31, 15, 30, '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(32, 16, 30, '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(33, 17, 30, '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(34, 18, 30, '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(35, 19, 30, '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(36, 20, 30, '2021-09-21 09:39:07', '2021-09-21 09:39:07'),
(37, 21, 30, '2021-09-21 09:39:08', '2021-09-21 09:39:08'),
(38, 22, 30, '2021-09-21 09:39:08', '2021-09-21 09:39:08'),
(39, 23, 30, '2021-09-21 09:39:08', '2021-09-21 09:39:08'),
(40, 24, 30, '2021-09-21 09:39:08', '2021-09-21 09:39:08'),
(41, 25, 33, '2021-09-21 09:43:36', '2021-09-21 09:43:36'),
(42, 26, 33, '2021-09-21 09:43:43', '2021-09-21 09:43:43'),
(43, 27, 33, '2021-09-21 09:43:43', '2021-09-21 09:43:43'),
(44, 28, 33, '2021-09-21 09:43:43', '2021-09-21 09:43:43'),
(45, 29, 33, '2021-09-21 09:43:43', '2021-09-21 09:43:43'),
(46, 30, 33, '2021-09-21 09:43:43', '2021-09-21 09:43:43'),
(48, 31, 36, '2021-09-21 09:51:49', '2021-09-21 09:51:49'),
(49, 38, 36, '2021-09-21 09:55:11', '2021-09-21 09:55:11'),
(50, 39, 36, '2021-09-21 09:55:11', '2021-09-21 09:55:11'),
(51, 40, 36, '2021-09-21 09:55:11', '2021-09-21 09:55:11'),
(52, 41, 36, '2021-09-21 09:55:11', '2021-09-21 09:55:11'),
(53, 42, 36, '2021-09-21 09:55:11', '2021-09-21 09:55:11'),
(54, 43, 36, '2021-09-21 09:55:11', '2021-09-21 09:55:11'),
(55, 44, 36, '2021-09-21 09:55:11', '2021-09-21 09:55:11');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `invoice_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance_id` int(11) NOT NULL,
  `paid` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `memo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_items`
--

CREATE TABLE `purchase_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request_products`
--

CREATE TABLE `request_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_one_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_one_variant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_two_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_two_variant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_products`
--

INSERT INTO `request_products` (`id`, `name`, `phone`, `email`, `product_one_link`, `product_one_variant`, `product_two_link`, `product_two_variant`, `created_at`, `updated_at`) VALUES
(1, 'shibbir ahmad', '01737481778', 'shopolox@gmail.com', 'https://alibaba.com/product1', 'red,M', 'https://alibaba.com/product2', 'L,Black', '2021-09-24 11:24:58', '2021-09-24 11:24:58');

-- --------------------------------------------------------

--
-- Table structure for table `shipment_infos`
--

CREATE TABLE `shipment_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipment_infos`
--

INSERT INTO `shipment_infos` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'china shipment policy', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem. Veritatis\r\nobcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam\r\nnihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,\r\ntenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit,\r\nquia. Quo neque error repudiandae fuga? Ipsa laudantium molestias eos \r\nsapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam\r\nrecusandae alias error harum maxime adipisci amet laborum. Perspiciatis \r\nminima nesciunt dolorem! Officiis iure rerum voluptates a cumque velit \r\nquibusdam sed amet tempora. Sit laborum ab, eius fugit doloribus tenetur', 1, '2021-06-20 09:51:21', '2021-08-05 11:25:56'),
(2, 'japan shipment policy', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem. Veritatis\r\nobcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam\r\nnihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,\r\ntenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit,\r\nquia. Quo neque error repudiandae fuga? Ipsa laudantium molestias eos \r\nsapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam\r\nrecusandae alias error harum maxime adipisci amet laborum. Perspiciatis \r\nminima nesciunt dolorem! Officiis iure rerum voluptates a cumque velit \r\nquibusdam sed amet tempora. Sit laborum ab, eius fugit doloribus tenetur', 1, '2021-06-20 09:52:44', '2021-08-05 11:25:47');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `url`, `status`, `created_at`, `updated_at`) VALUES
(1, 'images/slider/BCulErCqU2K6EzhHnc1zY5u9rCuzvOCXezmA173R.jpg', 'https://shopolox.com', 1, '2021-07-13 10:34:31', '2021-09-04 10:56:00'),
(2, 'images/slider/YH6WbxAPvDGgjZmPLOZZRULrGAfLaY9r1UU1Vk8n.jpg', 'https://shopolox.com', 1, '2021-07-13 11:37:36', '2021-09-04 10:55:45'),
(3, 'images/slider/7a2Srkg5PK4sliyqn1lHaMaaKHsASpRLpwLtKLX9.jpg', 'https://shopolox.com/mens-100', 1, '2021-09-04 10:55:23', '2021-09-04 10:55:23');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` int(11) DEFAULT 0,
  `discount` int(11) DEFAULT NULL,
  `discount_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `slug`, `category_id`, `status`, `image`, `position`, `discount`, `discount_type`, `created_at`, `updated_at`) VALUES
(2, 'Clock', '1001-Clock', 1, 0, 'images/subCategory/YHCdkFkE7Mm8wTyAccHUgHIulvbah2MkuSyQ2JsR.jpg', 1, NULL, NULL, '2021-06-11 11:46:43', '2021-08-07 10:24:42'),
(3, 't-shirt', 't-shirt-61', 1, 1, NULL, 2, NULL, NULL, '2021-06-14 11:17:20', '2021-06-14 11:17:20'),
(4, 'Hair Care', 'hair-care-86', 4, 0, NULL, 0, NULL, NULL, '2021-08-01 21:46:58', '2021-08-07 10:24:33'),
(5, 'Eye Care', 'eye-care-64', 4, 0, NULL, 0, NULL, NULL, '2021-08-01 21:47:29', '2021-08-07 10:24:56'),
(6, 'Babay Accessories', 'babay-accessories-95', 5, 0, NULL, 0, NULL, NULL, '2021-08-01 21:47:52', '2021-08-07 10:25:32'),
(7, 'School Supplies', 'school-supplies-69', 5, 0, NULL, 0, NULL, NULL, '2021-08-01 21:48:27', '2021-08-07 10:25:06'),
(8, 'Toys', 'toys-46', 5, 0, NULL, 0, NULL, NULL, '2021-08-01 21:48:40', '2021-08-07 10:23:59'),
(9, 'Mobile Accessories', 'mobile-accessories-81', 7, 0, NULL, 0, NULL, NULL, '2021-08-01 21:49:26', '2021-08-07 10:25:51'),
(10, 'Computer Accessories', 'computer-accessories-41', 7, 1, NULL, 0, NULL, NULL, '2021-08-01 21:49:46', '2021-08-01 21:49:46'),
(11, 'Daily Electronics', 'daily-electronics-37', 7, 0, NULL, 0, NULL, NULL, '2021-08-01 21:50:39', '2021-08-07 10:27:14'),
(12, 'Sound System', 'sound-system-22', 7, 1, NULL, 0, NULL, NULL, '2021-08-01 21:50:56', '2021-08-01 21:50:56'),
(13, 'Home Storage', 'home-storage-47', 6, 0, NULL, 0, NULL, NULL, '2021-08-01 21:52:08', '2021-08-07 10:23:46'),
(14, 'Cleaning Tools', 'cleaning-tools-95', 6, 0, NULL, 0, NULL, NULL, '2021-08-01 21:52:35', '2021-08-07 10:23:38'),
(15, 'Panjabi', 'panjabi-34', 1, 1, NULL, 0, NULL, NULL, '2021-08-01 21:52:49', '2021-08-01 21:52:49');

-- --------------------------------------------------------

--
-- Table structure for table `sub_cities`
--

CREATE TABLE `sub_cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_cities`
--

INSERT INTO `sub_cities` (`id`, `city_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(3, 63, 'Derai', 1, '2021-01-12 17:16:55', '2021-01-12 17:16:55'),
(4, 64, 'Balaganj', 1, '2021-01-12 17:38:21', '2021-01-12 17:38:21'),
(5, 64, 'Beanibazar', 1, '2021-01-12 17:38:43', '2021-01-12 17:38:43'),
(6, 64, 'Biswanath', 1, '2021-01-12 17:40:09', '2021-01-12 17:40:09'),
(7, 64, 'Companiganj', 1, '2021-01-12 17:41:43', '2021-01-12 17:41:43'),
(8, 64, 'Fenchuganj', 1, '2021-01-12 17:42:00', '2021-01-12 17:42:00'),
(9, 64, 'Golapganj', 1, '2021-01-12 17:42:16', '2021-01-12 17:42:16'),
(10, 64, 'Dakshin Surma Upazila', 1, '2021-01-12 17:44:27', '2021-01-12 17:44:27'),
(11, 64, 'Gowainghat Upazila‎', 1, '2021-01-12 17:45:02', '2021-01-12 17:45:02'),
(12, 64, 'Jaintiapur Upazila‎', 1, '2021-01-12 17:45:19', '2021-01-12 17:45:19'),
(13, 64, 'Kanaighat Upazila‎', 1, '2021-01-12 17:45:36', '2021-01-12 17:45:36'),
(14, 64, 'Osmani Nagar Upazila', 1, '2021-01-12 17:45:50', '2021-01-12 17:45:50'),
(15, 64, 'Zakiganj Upazila', 1, '2021-01-12 17:46:01', '2021-01-12 17:46:01'),
(16, 66, 'Savar', 1, '2021-01-12 17:47:47', '2021-01-13 02:06:38'),
(17, 66, 'Amin bazar', 1, '2021-01-12 17:48:00', '2021-01-13 02:15:42'),
(18, 66, 'Birulia', 1, '2021-01-12 17:48:10', '2021-01-13 02:14:46'),
(19, 66, 'Ashulia', 1, '2021-01-12 17:48:35', '2021-01-13 02:14:30'),
(20, 66, 'Shimulia', 1, '2021-01-12 17:48:45', '2021-01-13 02:14:57'),
(21, 66, 'Kaundia', 1, '2021-01-12 17:48:54', '2021-01-13 02:15:28'),
(22, 64, 'Sylhet Sadar', 1, '2021-01-12 17:49:57', '2021-01-12 17:49:57'),
(23, 63, 'Sunamganj sadar', 1, '2021-01-12 17:50:15', '2021-01-12 17:50:15'),
(24, 63, 'Chhatak Upazila‎', 1, '2021-01-12 17:53:07', '2021-01-12 17:53:07'),
(25, 63, 'Derai Upazila‎', 1, '2021-01-12 17:53:26', '2021-01-12 17:53:26'),
(26, 63, 'Dharampasha Upazila‎', 1, '2021-01-12 17:53:51', '2021-01-12 17:53:51'),
(27, 63, 'Jagannathpur Upazila‎', 1, '2021-01-12 17:55:06', '2021-01-12 17:55:06'),
(28, 62, 'Barlekha Upazila‎', 1, '2021-01-12 17:55:52', '2021-01-12 17:55:52'),
(29, 62, 'Moulvibazar sadar', 1, '2021-01-12 17:56:24', '2021-01-12 17:56:24'),
(30, 62, 'Juri Upazila‎', 1, '2021-01-12 17:56:38', '2021-01-12 17:56:38'),
(31, 62, 'Kamalganj Upazila', 1, '2021-01-12 17:56:51', '2021-01-12 17:56:51'),
(32, 62, 'Kulaura Upazila', 1, '2021-01-12 17:57:02', '2021-01-12 17:57:02'),
(33, 62, 'Rajnagar Upazila‎', 1, '2021-01-12 17:57:19', '2021-01-12 17:57:19'),
(34, 62, 'Srimangal Upazila‎', 1, '2021-01-12 17:57:30', '2021-01-12 17:57:30'),
(35, 61, 'Habiganj sadar', 1, '2021-01-12 17:58:18', '2021-01-12 17:58:18'),
(36, 61, 'Ajmiriganj Upazila', 1, '2021-01-12 17:58:28', '2021-01-12 17:58:28'),
(37, 61, 'Bahubal Upazila', 1, '2021-01-12 17:58:38', '2021-01-12 17:58:38'),
(38, 61, 'Baniachong Upazila', 1, '2021-01-12 17:58:50', '2021-01-12 17:58:50'),
(39, 61, 'Chunarughat Upazila', 1, '2021-01-12 17:59:02', '2021-01-12 17:59:02'),
(40, 61, 'Habiganj Sadar Upazila', 1, '2021-01-12 17:59:13', '2021-01-12 17:59:13'),
(41, 61, 'Lakhai Upazila', 1, '2021-01-12 17:59:23', '2021-01-12 17:59:23'),
(42, 61, 'Madhabpur Upazila', 1, '2021-01-12 17:59:34', '2021-01-12 17:59:34'),
(43, 61, 'Nabiganj Upazila', 1, '2021-01-12 17:59:53', '2021-01-12 17:59:53'),
(44, 60, 'Thakurgaon sadar', 1, '2021-01-12 18:00:49', '2021-01-12 18:00:49'),
(45, 60, 'Baliadangi Upazila', 1, '2021-01-12 18:01:00', '2021-01-12 18:01:00'),
(46, 60, 'Haripur Upazila', 1, '2021-01-12 18:01:12', '2021-01-12 18:01:12'),
(47, 60, 'Pirganj Upazila', 1, '2021-01-12 18:01:33', '2021-01-12 18:01:33'),
(48, 60, 'Ranisankail Upazila', 1, '2021-01-12 18:01:43', '2021-01-12 18:01:43'),
(49, 59, 'Rangpur sadar', 1, '2021-01-12 18:02:30', '2021-01-12 18:02:38'),
(50, 59, 'Badarganj Upazila', 1, '2021-01-12 18:02:53', '2021-01-12 18:02:53'),
(51, 59, 'Gangachara Upazila', 1, '2021-01-12 18:03:04', '2021-01-12 18:03:04'),
(52, 59, 'Kaunia Upazila', 1, '2021-01-12 18:03:16', '2021-01-12 18:03:16'),
(53, 59, 'Mithapukur Upazila', 1, '2021-01-12 18:03:28', '2021-01-12 18:03:28'),
(54, 59, 'Pirgacha Upazila', 1, '2021-01-12 18:03:44', '2021-01-12 18:03:44'),
(55, 59, 'Taraganj Upazila', 1, '2021-01-12 18:04:15', '2021-01-12 18:04:15'),
(56, 58, 'Panchagarh Sadar', 1, '2021-01-12 18:39:41', '2021-01-12 18:39:41'),
(57, 58, 'Atwari Upazila', 1, '2021-01-12 18:39:53', '2021-01-12 18:39:53'),
(58, 58, 'Boda Upazila', 1, '2021-01-12 18:40:04', '2021-01-12 18:40:04'),
(59, 58, 'Debiganj Upazila', 1, '2021-01-12 18:40:20', '2021-01-12 18:40:20'),
(60, 58, 'Tetulia Upazila', 1, '2021-01-12 18:40:32', '2021-01-12 18:40:32'),
(61, 57, 'Nilphamari Sadar Upazila', 1, '2021-01-12 18:40:59', '2021-01-12 18:40:59'),
(62, 57, 'Dimla Upazila', 1, '2021-01-12 18:41:27', '2021-01-12 18:41:27'),
(63, 57, 'Domar Upazila', 1, '2021-01-12 18:45:33', '2021-01-12 18:45:33'),
(64, 57, 'Jaldhaka Upazila', 1, '2021-01-12 18:45:51', '2021-01-12 18:45:51'),
(65, 57, 'Kishoreganj Upazila', 1, '2021-01-12 18:46:00', '2021-01-12 18:46:00'),
(66, 57, 'Saidpur Upazila', 1, '2021-01-12 18:46:12', '2021-01-12 18:46:12'),
(67, 1, 'Adabar Thana', 1, '2021-01-12 18:47:27', '2021-01-12 18:47:27'),
(68, 1, 'Azampur', 1, '2021-01-12 18:52:01', '2021-01-12 18:52:01'),
(69, 1, 'Badda Thana', 1, '2021-01-12 18:52:14', '2021-01-12 18:52:14'),
(70, 1, 'Bangsal', 1, '2021-01-12 18:52:33', '2021-01-12 18:52:33'),
(71, 1, 'Bimanbandar', 1, '2021-01-12 18:52:48', '2021-01-12 18:52:48'),
(72, 1, 'Cantonment', 1, '2021-01-12 18:53:01', '2021-01-12 18:53:01'),
(73, 1, 'Chowkbazar', 1, '2021-01-12 18:53:26', '2021-01-12 18:53:26'),
(74, 1, 'Darus Salam', 1, '2021-01-12 18:53:40', '2021-01-12 18:53:40'),
(75, 1, 'Lalmatia', 1, '2021-01-12 18:53:53', '2021-01-13 01:50:01'),
(76, 1, 'Dhanmondi', 1, '2021-01-12 18:54:07', '2021-01-12 18:54:07'),
(77, 1, 'Gendaria', 1, '2021-01-12 18:54:24', '2021-01-12 18:54:24'),
(78, 1, 'Gulshan-1', 1, '2021-01-12 18:55:25', '2021-01-12 18:55:25'),
(79, 1, 'Gulshan-2', 1, '2021-01-12 18:55:34', '2021-01-12 18:55:34'),
(80, 1, 'Hazaribagh', 1, '2021-01-12 18:56:05', '2021-01-12 18:56:05'),
(81, 1, 'Kadamtali', 1, '2021-01-12 18:57:29', '2021-01-12 18:57:29'),
(82, 1, 'Kafrul', 1, '2021-01-12 18:57:44', '2021-01-12 18:57:44'),
(83, 1, 'Kalabagan', 1, '2021-01-12 18:57:59', '2021-01-12 18:57:59'),
(84, 1, 'Khilgaon', 1, '2021-01-12 18:58:18', '2021-01-12 18:58:18'),
(85, 1, 'Khilkhet', 1, '2021-01-12 18:58:52', '2021-01-12 18:59:13'),
(86, 1, 'Kotwali', 1, '2021-01-12 18:59:32', '2021-01-12 18:59:32'),
(87, 1, 'Lalbagh', 1, '2021-01-12 18:59:50', '2021-01-12 18:59:50'),
(88, 1, 'Mirpur-1', 1, '2021-01-12 19:00:07', '2021-01-12 19:00:07'),
(89, 1, 'Mirpur-2', 1, '2021-01-12 19:00:18', '2021-01-12 19:00:18'),
(90, 1, 'Mirpur-6', 1, '2021-01-12 19:00:28', '2021-01-12 19:00:28'),
(91, 1, 'Mirpur-7', 1, '2021-01-12 19:00:41', '2021-01-12 19:00:41'),
(92, 1, 'Mirpur-10', 1, '2021-01-12 19:00:51', '2021-01-12 19:00:51'),
(93, 1, 'Mirpur-11', 1, '2021-01-12 19:01:02', '2021-01-12 19:01:02'),
(94, 1, 'Mirpur-12', 1, '2021-01-12 19:01:36', '2021-01-12 19:01:36'),
(95, 1, 'Mirpur-13', 1, '2021-01-12 19:01:56', '2021-01-12 19:01:56'),
(96, 1, 'Mirpur-14', 1, '2021-01-12 19:02:06', '2021-01-12 19:02:06'),
(97, 1, 'Mohammadpur', 1, '2021-01-12 19:02:45', '2021-01-12 19:02:45'),
(98, 1, 'Motijheel', 1, '2021-01-12 19:02:54', '2021-01-12 19:02:54'),
(99, 1, 'New Market', 1, '2021-01-12 19:03:06', '2021-01-12 19:03:06'),
(100, 1, 'Pallabi', 1, '2021-01-12 19:03:22', '2021-01-12 19:03:22'),
(101, 1, 'Paltan', 1, '2021-01-12 19:03:35', '2021-01-12 19:03:35'),
(102, 1, 'Panthapath', 1, '2021-01-12 19:03:46', '2021-01-12 19:03:46'),
(103, 1, 'Ramna', 1, '2021-01-12 19:04:08', '2021-01-12 19:04:08'),
(104, 1, 'Rampura', 1, '2021-01-12 19:04:20', '2021-01-12 19:04:20'),
(105, 1, 'Sabujbagh', 1, '2021-01-12 19:04:52', '2021-01-12 19:04:52'),
(106, 1, 'Shah Ali thana Mirpur', 1, '2021-01-12 19:05:10', '2021-01-12 19:05:10'),
(107, 1, 'Shahbagh', 1, '2021-01-12 19:05:20', '2021-01-12 19:05:20'),
(108, 1, 'Sher-e-Bangla Nagar', 1, '2021-01-12 19:07:00', '2021-01-12 19:07:00'),
(109, 1, 'Shyampur', 1, '2021-01-12 19:07:12', '2021-01-12 19:07:12'),
(110, 1, 'Nowabpur', 1, '2021-01-12 19:07:24', '2021-01-13 01:59:45'),
(111, 1, 'Tejgaon Industrial Area', 1, '2021-01-12 19:07:37', '2021-01-12 19:07:37'),
(112, 1, 'Tejgaon', 1, '2021-01-12 19:08:30', '2021-01-12 19:08:30'),
(113, 1, 'Turag Thana', 1, '2021-01-12 19:08:42', '2021-01-12 19:08:42'),
(114, 1, 'Uttar Khan', 1, '2021-01-12 19:08:56', '2021-01-12 19:08:56'),
(115, 1, 'Uttara', 1, '2021-01-12 19:09:18', '2021-01-12 19:09:18'),
(116, 1, 'Vatara Thana', 1, '2021-01-12 19:09:32', '2021-01-12 19:09:32'),
(117, 1, 'Wari', 1, '2021-01-12 19:09:43', '2021-01-12 19:09:43'),
(118, 1, 'Dhaka University', 1, '2021-01-12 19:10:03', '2021-01-12 19:10:03'),
(119, 1, 'Buet', 1, '2021-01-12 19:10:12', '2021-01-12 19:10:12'),
(120, 1, 'Bangladesh Sochibaloy', 1, '2021-01-12 19:10:29', '2021-01-12 19:10:29'),
(121, 1, 'Farmgate', 1, '2021-01-12 19:10:41', '2021-01-12 19:10:41'),
(122, 1, 'Elephant Road', 1, '2021-01-12 19:10:55', '2021-01-12 19:10:55'),
(123, 1, 'Segunbagicha', 1, '2021-01-12 19:11:12', '2021-01-12 19:11:12'),
(124, 1, 'Noya Paltan', 1, '2021-01-12 19:11:22', '2021-01-12 19:11:22'),
(125, 1, 'Purana Paltan', 1, '2021-01-12 19:11:32', '2021-01-12 19:11:32'),
(126, 1, 'Bongabazar', 1, '2021-01-12 19:11:43', '2021-01-12 19:11:43'),
(127, 1, 'Uttara Sector-1', 1, '2021-01-12 19:14:16', '2021-01-12 19:14:16'),
(128, 1, 'Uttara Sector-2', 1, '2021-01-12 19:14:23', '2021-01-12 19:14:23'),
(129, 1, 'Uttara Sector-3', 1, '2021-01-12 19:14:32', '2021-01-12 19:14:32'),
(130, 1, 'Uttara Sector-4', 1, '2021-01-12 19:14:39', '2021-01-12 19:14:39'),
(131, 1, 'Uttara Sector-5', 1, '2021-01-12 19:14:47', '2021-01-12 19:14:47'),
(132, 1, 'Uttara Sector-6', 1, '2021-01-12 19:14:54', '2021-01-12 19:14:54'),
(133, 1, 'Uttara Sector-7', 1, '2021-01-12 19:15:02', '2021-01-12 19:15:02'),
(134, 1, 'Uttara Sector-8', 1, '2021-01-12 19:15:09', '2021-01-12 19:15:09'),
(135, 1, 'Uttara Sector-9', 1, '2021-01-12 19:15:16', '2021-01-12 19:15:16'),
(136, 1, 'Uttara Sector-10', 1, '2021-01-12 19:15:23', '2021-01-12 19:15:23'),
(137, 1, 'Uttara Sector-11', 1, '2021-01-12 19:15:29', '2021-01-12 19:15:29'),
(138, 1, 'Uttara Sector-12', 1, '2021-01-12 19:15:34', '2021-01-12 19:15:34'),
(139, 1, 'Ashkona', 1, '2021-01-12 19:16:13', '2021-01-12 19:16:13'),
(140, 1, 'Jatio Songsod', 1, '2021-01-12 19:17:10', '2021-01-12 19:17:10'),
(141, 1, 'Baridhara', 1, '2021-01-12 19:17:54', '2021-01-12 19:17:54'),
(142, 1, 'Bashundhora R/A', 1, '2021-01-12 19:18:16', '2021-01-12 19:18:16'),
(143, 16, 'Kamalnagar', 1, '2021-01-12 19:18:22', '2021-01-12 19:18:22'),
(144, 16, 'Lakshmipur Sadar', 1, '2021-01-12 19:18:48', '2021-01-12 19:18:48'),
(145, 1, 'Rajarbag', 1, '2021-01-12 19:18:51', '2021-01-12 19:18:51'),
(146, 1, 'Shantinagar', 1, '2021-01-12 19:18:59', '2021-01-12 19:18:59'),
(147, 16, 'Raipur', 1, '2021-01-12 19:19:17', '2021-01-12 19:19:17'),
(148, 1, 'Shahjahanpur', 1, '2021-01-12 19:19:18', '2021-01-12 19:19:18'),
(149, 1, 'Jatrabari', 1, '2021-01-12 19:19:29', '2021-01-12 19:19:29'),
(150, 16, 'Ramgati', 1, '2021-01-12 19:19:32', '2021-01-12 19:19:32'),
(151, 1, 'Sayedabad', 1, '2021-01-12 19:19:39', '2021-01-12 19:19:39'),
(152, 16, 'Ramganj', 1, '2021-01-12 19:19:45', '2021-01-12 19:19:45'),
(153, 1, 'Basabo', 1, '2021-01-12 19:20:00', '2021-01-12 19:20:00'),
(154, 1, 'Malibagh', 1, '2021-01-12 19:20:19', '2021-01-12 19:20:19'),
(155, 1, 'Shantibagh', 1, '2021-01-12 19:20:41', '2021-01-12 19:20:41'),
(156, 1, 'Moghbazar', 1, '2021-01-12 19:20:52', '2021-01-12 19:20:52'),
(157, 1, 'Kawran bazar', 1, '2021-01-12 19:21:02', '2021-01-12 19:21:02'),
(158, 1, 'Zighatola', 1, '2021-01-12 19:21:18', '2021-01-12 19:21:18'),
(159, 12, 'Comilla Sadar', 1, '2021-01-12 19:21:20', '2021-01-12 19:21:20'),
(160, 1, 'Gulisthan', 1, '2021-01-12 19:21:32', '2021-01-12 19:21:32'),
(161, 1, 'Islampur', 1, '2021-01-12 19:21:40', '2021-01-12 19:21:40'),
(162, 1, 'Bonosri', 1, '2021-01-12 19:22:02', '2021-01-12 19:22:02'),
(163, 12, 'Debidwar', 1, '2021-01-12 19:22:10', '2021-01-12 19:22:10'),
(164, 1, 'Aftabnagar', 1, '2021-01-12 19:22:24', '2021-01-12 19:22:24'),
(165, 1, 'Mohakhali', 1, '2021-01-12 19:23:10', '2021-01-12 19:23:10'),
(166, 12, 'Brahmanpara', 1, '2021-01-12 19:23:13', '2021-01-12 19:23:13'),
(167, 1, 'Arambag', 1, '2021-01-12 19:23:21', '2021-01-12 19:23:21'),
(168, 12, 'Barura', 1, '2021-01-12 19:23:35', '2021-01-12 19:23:35'),
(169, 12, 'Chandina', 1, '2021-01-12 19:23:52', '2021-01-12 19:23:52'),
(170, 1, 'Nikunja-1', 1, '2021-01-12 19:23:55', '2021-01-12 19:23:55'),
(171, 1, 'Nikunja-2', 1, '2021-01-12 19:24:02', '2021-01-12 19:24:02'),
(172, 1, 'namapara', 1, '2021-01-12 19:24:13', '2021-01-12 19:24:13'),
(173, 1, 'Easter Housing-Mirpur', 1, '2021-01-12 19:24:43', '2021-01-12 19:24:43'),
(174, 1, 'Duaripara', 1, '2021-01-12 19:24:53', '2021-01-12 19:24:53'),
(175, 1, 'Mirpur Cantonment', 1, '2021-01-12 19:25:12', '2021-01-12 19:25:12'),
(176, 12, 'Chauddagram', 1, '2021-01-12 19:25:35', '2021-01-12 19:25:35'),
(177, 12, 'Daudkandi', 1, '2021-01-12 19:25:47', '2021-01-12 19:25:47'),
(178, 1, 'Rajabazar', 1, '2021-01-12 19:25:52', '2021-01-12 19:25:52'),
(179, 12, 'Homna', 1, '2021-01-12 19:25:58', '2021-01-12 19:25:58'),
(180, 12, 'Laksam', 1, '2021-01-12 19:26:11', '2021-01-12 19:26:11'),
(181, 1, 'Sukrabad', 1, '2021-01-12 19:26:12', '2021-01-12 19:26:12'),
(182, 12, 'Muradnagar', 1, '2021-01-12 19:26:26', '2021-01-12 19:26:26'),
(183, 1, 'Katabon', 1, '2021-01-12 19:26:30', '2021-01-12 19:26:30'),
(184, 1, 'Hatirpool', 1, '2021-01-12 19:26:39', '2021-01-12 19:26:39'),
(185, 12, 'Nangalkot', 1, '2021-01-12 19:26:53', '2021-01-12 19:26:53'),
(186, 12, 'Adarsha Sadar', 1, '2021-01-12 19:27:44', '2021-01-12 19:27:44'),
(187, 12, 'Meghna', 1, '2021-01-12 19:27:57', '2021-01-12 19:27:57'),
(188, 12, 'Monohargonj', 1, '2021-01-12 19:28:15', '2021-01-12 19:28:15'),
(189, 12, 'Sadar south upazila', 1, '2021-01-12 19:28:36', '2021-01-12 19:28:36'),
(190, 12, 'Titas', 1, '2021-01-12 19:28:48', '2021-01-12 19:28:48'),
(191, 12, 'Burichang', 1, '2021-01-12 19:29:06', '2021-01-12 19:29:06'),
(192, 12, 'Lalmai', 1, '2021-01-12 19:29:18', '2021-01-12 19:29:18'),
(193, 1, 'Mogbazar', 1, '2021-01-12 19:30:10', '2021-01-12 19:30:10'),
(194, 14, 'Feni Sadar', 1, '2021-01-12 19:30:16', '2021-01-12 19:30:16'),
(195, 1, 'Chowdhuripara', 1, '2021-01-12 19:30:20', '2021-01-12 19:30:20'),
(196, 14, 'Sonagazi', 1, '2021-01-12 19:30:29', '2021-01-12 19:30:29'),
(197, 1, 'Tejkunipara', 1, '2021-01-12 19:30:38', '2021-01-12 19:30:38'),
(198, 14, 'Fulgazi', 1, '2021-01-12 19:30:46', '2021-01-12 19:30:46'),
(199, 1, 'Mohakhali DOHS', 1, '2021-01-12 19:31:11', '2021-01-12 19:31:11'),
(200, 14, 'Parshuram', 1, '2021-01-12 19:31:15', '2021-01-12 19:31:15'),
(201, 1, 'Mirpur DOHS', 1, '2021-01-12 19:31:27', '2021-01-12 19:31:27'),
(202, 1, 'Baridhara DOHS', 1, '2021-01-12 19:31:36', '2021-01-12 19:31:36'),
(203, 14, 'Daganbhuiyan', 1, '2021-01-12 19:31:59', '2021-01-12 19:31:59'),
(204, 14, 'Feni Pourashava', 1, '2021-01-12 19:32:36', '2021-01-12 19:32:36'),
(205, 1, 'Maniknagor', 1, '2021-01-12 19:32:36', '2021-01-12 19:32:36'),
(206, 9, 'Brahmanbaria Sadar', 1, '2021-01-12 19:34:02', '2021-01-12 19:34:10'),
(207, 9, 'Kasbo', 1, '2021-01-12 19:35:06', '2021-01-12 19:35:06'),
(208, 9, 'Nasirnagar', 1, '2021-01-12 19:35:16', '2021-01-12 19:35:16'),
(209, 9, 'Sarail', 1, '2021-01-12 19:35:35', '2021-01-12 19:35:35'),
(210, 9, 'Ashuganj', 1, '2021-01-12 19:35:46', '2021-01-12 19:35:46'),
(211, 9, 'Akhaura', 1, '2021-01-12 19:36:06', '2021-01-12 19:36:06'),
(212, 9, 'Nabinagar', 1, '2021-01-12 19:36:21', '2021-01-12 19:36:21'),
(213, 9, 'Bancharampur', 1, '2021-01-12 19:36:55', '2021-01-12 19:36:55'),
(214, 9, 'Bijoynagar', 1, '2021-01-12 19:37:12', '2021-01-12 19:37:12'),
(215, 1, 'Golapbag', 1, '2021-01-12 19:37:34', '2021-01-12 19:37:34'),
(216, 1, 'Mugda', 1, '2021-01-12 19:37:55', '2021-01-12 19:37:55'),
(217, 1, 'Tikatuli', 1, '2021-01-12 19:38:08', '2021-01-12 19:38:08'),
(218, 1, 'nakhalpara', 1, '2021-01-12 19:39:16', '2021-01-12 19:39:16'),
(219, 1, 'Niketon', 1, '2021-01-12 19:39:57', '2021-01-12 19:39:57'),
(220, 1, 'Ibrahirpur', 1, '2021-01-12 19:40:19', '2021-01-12 19:40:19'),
(221, 1, 'Shewrapara', 1, '2021-01-12 19:40:37', '2021-01-12 19:40:37'),
(222, 1, 'Kazipara', 1, '2021-01-12 19:40:49', '2021-01-12 19:40:49'),
(223, 1, 'Monipur', 1, '2021-01-12 19:41:07', '2021-01-12 19:41:07'),
(224, 1, 'Ahmed Nagar', 1, '2021-01-12 19:41:36', '2021-01-12 19:41:36'),
(225, 1, 'Manikdi', 1, '2021-01-12 19:42:02', '2021-01-12 19:42:02'),
(226, 1, 'Balughat', 1, '2021-01-12 19:42:15', '2021-01-12 19:42:15'),
(227, 1, 'Kurmitola', 1, '2021-01-12 19:42:33', '2021-01-12 19:42:33'),
(228, 1, 'Azompur-South', 1, '2021-01-12 19:42:57', '2021-01-12 19:42:57'),
(229, 1, 'Azompur-North', 1, '2021-01-12 19:43:06', '2021-01-12 19:43:16'),
(230, 1, 'Mollapara', 1, '2021-01-12 19:43:29', '2021-01-12 19:43:29'),
(231, 1, 'Moddhopara', 1, '2021-01-12 19:43:39', '2021-01-12 19:43:39'),
(232, 1, 'Doyaganj', 1, '2021-01-12 19:44:37', '2021-01-12 19:44:37'),
(233, 1, 'Dhaka Cantonment', 1, '2021-01-12 19:44:46', '2021-01-13 02:01:17'),
(234, 1, 'Narinda', 1, '2021-01-12 19:44:54', '2021-01-12 19:44:54'),
(235, 1, 'TT para', 1, '2021-01-12 19:45:09', '2021-01-12 19:45:09'),
(236, 17, 'Noakhali Sadar', 1, '2021-01-12 19:45:49', '2021-01-12 19:45:49'),
(237, 1, 'Komolapur', 1, '2021-01-12 19:45:57', '2021-01-12 19:45:57'),
(238, 1, 'Baily Road', 1, '2021-01-12 19:46:20', '2021-01-12 19:46:20'),
(239, 2, 'Barguna Sadar', 1, '2021-01-12 19:48:48', '2021-01-12 19:48:48'),
(240, 2, 'Amtali', 1, '2021-01-12 19:49:06', '2021-01-12 19:49:06'),
(241, 2, 'Betagi', 1, '2021-01-12 19:49:24', '2021-01-12 19:49:24'),
(242, 2, 'Bamna', 1, '2021-01-12 19:49:34', '2021-01-12 19:49:34'),
(243, 2, 'Pathorghata', 1, '2021-01-12 19:49:51', '2021-01-12 19:49:51'),
(244, 2, 'Taltali', 1, '2021-01-12 19:50:10', '2021-01-12 19:50:10'),
(245, 3, 'Agailjhara Upazila', 1, '2021-01-12 19:51:42', '2021-01-12 19:51:42'),
(246, 3, 'Barisal Sadar', 1, '2021-01-12 19:51:55', '2021-01-12 19:51:55'),
(247, 3, 'Babuganj Upazila', 1, '2021-01-12 19:52:15', '2021-01-12 19:52:15'),
(248, 3, 'Bakerganj Upazila', 1, '2021-01-12 19:52:27', '2021-01-12 19:52:27'),
(249, 3, 'Banaripara Upazila', 1, '2021-01-12 19:52:39', '2021-01-12 19:52:39'),
(250, 3, 'Gournadi Upazila', 1, '2021-01-12 19:52:52', '2021-01-12 19:52:52'),
(251, 3, 'Hizla Upazila', 1, '2021-01-12 19:53:01', '2021-01-12 19:53:01'),
(252, 3, 'Mehendiganj Upazila', 1, '2021-01-12 19:53:13', '2021-01-12 19:53:13'),
(253, 3, 'Muladi Upazila', 1, '2021-01-12 19:53:31', '2021-01-12 19:53:31'),
(254, 3, 'Wazirpur Upazila', 1, '2021-01-12 19:53:43', '2021-01-12 19:53:43'),
(255, 17, 'Sonaimuri', 1, '2021-01-12 19:54:45', '2021-01-12 19:54:45'),
(256, 4, 'Bhola Sadar', 1, '2021-01-12 19:54:59', '2021-01-12 19:54:59'),
(257, 4, 'Borhanuddin Upazila', 1, '2021-01-12 19:55:10', '2021-01-12 19:55:10'),
(258, 17, 'Chatkhil', 1, '2021-01-12 19:55:17', '2021-01-12 19:55:17'),
(259, 4, 'Char Fasson Upazila', 1, '2021-01-12 19:55:21', '2021-01-12 19:55:21'),
(260, 4, 'Daulatkhan Upazila', 1, '2021-01-12 19:55:32', '2021-01-12 19:55:32'),
(261, 4, 'Lalmohan Upazila', 1, '2021-01-12 19:55:43', '2021-01-12 19:55:43'),
(262, 4, 'Manpura Upazila', 1, '2021-01-12 19:55:55', '2021-01-12 19:55:55'),
(263, 17, 'Senbng', 1, '2021-01-12 19:56:05', '2021-01-12 19:56:05'),
(264, 4, 'Tazumuddin Upazila', 1, '2021-01-12 19:56:06', '2021-01-12 19:56:06'),
(265, 17, 'Kabirhat', 1, '2021-01-12 19:56:45', '2021-01-12 19:56:45'),
(266, 17, 'Subarnachar', 1, '2021-01-12 19:57:36', '2021-01-12 19:57:36'),
(267, 5, 'Jhalokathi Sadar', 1, '2021-01-12 19:57:38', '2021-01-12 19:57:38'),
(268, 5, 'Kathalia', 1, '2021-01-12 19:58:04', '2021-01-12 19:58:04'),
(269, 17, 'Hatia', 1, '2021-01-12 19:58:15', '2021-01-12 19:58:15'),
(270, 5, 'Nalchity', 1, '2021-01-12 19:58:20', '2021-01-12 19:58:20'),
(271, 5, 'Rajapur', 1, '2021-01-12 19:58:36', '2021-01-12 19:58:36'),
(272, 17, 'Begumganj', 1, '2021-01-12 19:58:39', '2021-01-12 19:58:39'),
(273, 6, 'Patuakhali Sadar', 1, '2021-01-12 19:59:26', '2021-01-12 19:59:26'),
(274, 6, 'Bauphal Upazila', 1, '2021-01-12 19:59:38', '2021-01-12 19:59:38'),
(275, 6, 'Dashmina Upazila', 1, '2021-01-12 19:59:51', '2021-01-12 19:59:51'),
(276, 6, 'Dumki Upazila', 1, '2021-01-12 20:00:09', '2021-01-12 20:00:09'),
(277, 6, 'Galachipa Upazila', 1, '2021-01-12 20:00:18', '2021-01-12 20:00:18'),
(278, 6, 'Kalapara Upazila', 1, '2021-01-12 20:00:58', '2021-01-12 20:00:58'),
(279, 6, 'Mirzaganj Upazila', 1, '2021-01-12 20:01:10', '2021-01-12 20:01:10'),
(280, 6, 'Rangabali Upazila', 1, '2021-01-12 20:01:26', '2021-01-12 20:01:26'),
(282, 7, 'Bhandaria Upazila', 1, '2021-01-12 20:02:22', '2021-01-12 20:02:22'),
(283, 7, 'Indurkani Upazila', 1, '2021-01-12 20:02:36', '2021-01-12 20:02:36'),
(285, 7, 'Mathbaria Upazila', 1, '2021-01-12 20:03:06', '2021-01-12 20:03:06'),
(286, 7, 'Nazirpur Upazila', 1, '2021-01-12 20:03:19', '2021-01-12 20:03:19'),
(290, 8, 'Ali Kadam Upazila', 1, '2021-01-12 20:07:31', '2021-01-12 20:07:31'),
(291, 8, 'Bandarban Sadar', 1, '2021-01-12 20:07:58', '2021-01-12 20:07:58'),
(292, 10, 'Chandpur Sadar', 1, '2021-01-12 20:09:25', '2021-01-12 20:16:41'),
(293, 8, 'Lama Upazila', 1, '2021-01-12 20:09:41', '2021-01-12 20:09:41'),
(294, 10, 'Kachua', 1, '2021-01-12 20:09:49', '2021-01-12 20:09:49'),
(295, 10, 'Haimchar', 1, '2021-01-12 20:10:12', '2021-01-12 20:10:12'),
(296, 8, 'Naikhongchhari Upazila', 1, '2021-01-12 20:10:42', '2021-01-12 20:10:42'),
(297, 8, 'Rowangchhari Upazila', 1, '2021-01-12 20:11:19', '2021-01-12 20:11:19'),
(298, 8, 'Ruma Upazila', 1, '2021-01-12 20:11:31', '2021-01-12 20:11:31'),
(299, 8, 'Thanchi Upazila', 1, '2021-01-12 20:11:42', '2021-01-12 20:11:42'),
(300, 10, 'Matlab South', 1, '2021-01-12 20:12:30', '2021-01-12 20:12:30'),
(301, 10, 'Hajiganj', 1, '2021-01-12 20:12:58', '2021-01-12 20:12:58'),
(302, 11, 'Akbarshah Thana', 1, '2021-01-12 20:13:26', '2021-01-12 20:13:26'),
(303, 11, 'Bakoliya Thana', 1, '2021-01-12 20:13:38', '2021-01-12 20:13:38'),
(304, 11, 'Bandar Thana', 1, '2021-01-12 20:13:51', '2021-01-12 20:13:51'),
(305, 11, 'Bayazid Thana', 1, '2021-01-12 20:14:02', '2021-01-12 20:14:02'),
(306, 11, 'Bhujpur Thana', 1, '2021-01-12 20:14:13', '2021-01-12 20:14:13'),
(307, 10, 'Matlab North', 1, '2021-01-12 20:14:44', '2021-01-12 20:14:44'),
(308, 11, 'Chandgaon Thana', 1, '2021-01-12 20:14:47', '2021-01-12 20:14:47'),
(309, 11, 'Double Mooring Thana', 1, '2021-01-12 20:14:58', '2021-01-12 20:14:58'),
(310, 11, 'EPZ Thana', 1, '2021-01-12 20:15:10', '2021-01-12 20:15:10'),
(311, 11, 'Halishahar Thana', 1, '2021-01-12 20:15:20', '2021-01-12 20:15:20'),
(312, 10, 'Faridgonj', 1, '2021-01-12 20:15:31', '2021-01-12 20:15:31'),
(313, 11, 'Karnaphuli Upazila', 1, '2021-01-12 20:15:37', '2021-01-12 20:15:37'),
(314, 11, 'Khulshi Thana', 1, '2021-01-12 20:15:48', '2021-01-12 20:15:48'),
(315, 11, 'Kotwali Thana (Chittagong)', 1, '2021-01-12 20:15:58', '2021-01-12 20:15:58'),
(316, 11, 'Pahartali Thana', 1, '2021-01-12 20:16:10', '2021-01-12 20:16:10'),
(317, 11, 'Panchlaish Thana', 1, '2021-01-12 20:16:21', '2021-01-12 20:16:21'),
(318, 11, 'Patenga Thana', 1, '2021-01-12 20:16:31', '2021-01-12 20:16:31'),
(319, 13, 'Chakaria Upazila', 1, '2021-01-12 20:17:26', '2021-01-12 20:17:26'),
(320, 13, 'Cox\'s Bazar Sadar', 1, '2021-01-12 20:17:58', '2021-01-12 20:17:58'),
(321, 13, 'Kutubdia Upazila', 1, '2021-01-12 20:18:14', '2021-01-12 20:18:14'),
(322, 13, 'Moheshkhali Upazila', 1, '2021-01-12 20:18:28', '2021-01-12 20:18:28'),
(323, 13, 'Pekua Upazila', 1, '2021-01-12 20:18:44', '2021-01-12 20:18:44'),
(324, 13, 'Ramu Upazila', 1, '2021-01-12 20:19:03', '2021-01-12 20:19:03'),
(325, 13, 'Teknaf Upazila', 1, '2021-01-12 20:19:26', '2021-01-12 20:19:26'),
(326, 13, 'Ukhia Upazila', 1, '2021-01-12 20:19:38', '2021-01-12 20:19:38'),
(327, 16, 'Raipur Upazila', 1, '2021-01-12 20:21:20', '2021-01-12 20:21:20'),
(328, 16, 'Kamalnagar Upazila', 1, '2021-01-12 20:22:20', '2021-01-12 20:22:20'),
(329, 16, 'Ramganj Upazila', 1, '2021-01-12 20:23:03', '2021-01-12 20:23:03'),
(330, 16, 'Ramgati Upazila', 1, '2021-01-12 20:23:16', '2021-01-12 20:23:16'),
(331, 16, 'Chandraganj Thana', 1, '2021-01-12 20:23:32', '2021-01-12 20:23:32'),
(332, 53, 'Biral Upazila', 1, '2021-01-12 20:25:41', '2021-01-12 20:25:41'),
(333, 53, 'Birampur Upazila', 1, '2021-01-12 20:25:59', '2021-01-12 20:25:59'),
(334, 53, 'Birganj Upazila', 1, '2021-01-12 20:26:17', '2021-01-12 20:26:17'),
(335, 53, 'Bochaganj Upazila', 1, '2021-01-12 20:26:46', '2021-01-12 20:26:46'),
(336, 53, 'Chirirbandar Upazila', 1, '2021-01-12 20:26:59', '2021-01-12 20:26:59'),
(337, 53, 'Dinajpur Sadar Upazila', 1, '2021-01-12 20:27:11', '2021-01-12 20:27:11'),
(338, 53, 'Fulbari Upazila', 1, '2021-01-12 20:27:22', '2021-01-12 20:27:22'),
(339, 53, 'Ghoraghat Upazila', 1, '2021-01-12 20:27:33', '2021-01-12 20:27:33'),
(340, 53, 'Hakimpur Upazila', 1, '2021-01-12 20:27:47', '2021-01-12 20:27:47'),
(341, 53, 'Kaharole Upazila', 1, '2021-01-12 20:27:58', '2021-01-12 20:27:58'),
(342, 53, 'Khansama Upazila', 1, '2021-01-12 20:28:09', '2021-01-12 20:28:09'),
(343, 53, 'Nawabganj Upazila', 1, '2021-01-12 20:28:22', '2021-01-12 20:28:22'),
(344, 53, 'Parbatipur Upazila', 1, '2021-01-12 20:28:36', '2021-01-12 20:28:36'),
(345, 17, 'Companiganj', 1, '2021-01-12 20:33:43', '2021-01-12 20:33:43'),
(346, 55, 'Kurigram Sadar', 1, '2021-01-12 20:38:22', '2021-01-12 20:38:22'),
(347, 55, 'Bhurungamari Upazila', 1, '2021-01-12 20:39:01', '2021-01-12 20:39:01'),
(348, 55, 'Bhurungamari Upazila', 1, '2021-01-12 20:39:42', '2021-01-12 20:39:42'),
(349, 55, 'Char Rajibpur Upazila', 1, '2021-01-12 20:39:57', '2021-01-12 20:39:57'),
(350, 55, 'Chilmari Upazila', 1, '2021-01-12 20:40:23', '2021-01-12 20:40:23'),
(351, 55, 'Nageshwari Upazila', 1, '2021-01-12 20:40:49', '2021-01-12 20:40:49'),
(352, 55, 'Phulbari Upazila', 1, '2021-01-12 20:42:49', '2021-01-12 20:42:49'),
(353, 55, 'Rajarhat Upazila', 1, '2021-01-12 20:43:05', '2021-01-12 20:43:05'),
(354, 55, 'Raomari Upazila', 1, '2021-01-12 20:43:18', '2021-01-12 20:43:18'),
(355, 55, 'Ulipur Upazila', 1, '2021-01-12 20:43:32', '2021-01-12 20:43:32'),
(356, 56, 'Lalmonirhat sadar', 1, '2021-01-12 20:44:09', '2021-01-12 20:44:09'),
(357, 56, 'Aditmari Upazila‎', 1, '2021-01-12 20:44:54', '2021-01-12 20:44:54'),
(358, 56, 'Hatibandha Upazila', 1, '2021-01-12 20:45:08', '2021-01-12 20:45:08'),
(359, 56, 'Kaliganj Upazila', 1, '2021-01-12 20:45:23', '2021-01-12 20:45:23'),
(360, 56, 'Patgram Upazila', 1, '2021-01-12 20:45:37', '2021-01-12 20:45:37'),
(361, 48, 'Natore Sadar', 1, '2021-01-12 20:46:28', '2021-01-12 20:46:28'),
(362, 20, 'Gazipur Sadar', 1, '2021-01-12 20:55:26', '2021-01-12 20:55:26'),
(363, 20, 'Kapasia Upazila‎', 1, '2021-01-12 20:56:15', '2021-01-12 20:56:15'),
(364, 20, 'Kaliakair Upazila', 1, '2021-01-12 20:56:25', '2021-01-12 20:56:25'),
(365, 20, 'Kaliganj Upazila', 1, '2021-01-12 20:56:37', '2021-01-12 20:56:37'),
(366, 20, 'Kapasia Upazila', 1, '2021-01-12 20:56:47', '2021-01-12 20:56:47'),
(367, 20, 'Sreepur Upazila', 1, '2021-01-12 20:56:59', '2021-01-12 20:56:59'),
(368, 27, 'Narsingdi Sadar', 1, '2021-01-12 20:58:06', '2021-01-12 20:58:06'),
(369, 27, 'Belabo Upazila', 1, '2021-01-12 20:58:18', '2021-01-12 20:58:18'),
(370, 27, 'Monohardi Upazila', 1, '2021-01-12 20:58:29', '2021-01-12 20:58:29'),
(371, 27, 'Palash Upazila', 1, '2021-01-12 20:58:42', '2021-01-12 20:58:42'),
(372, 27, 'Raipura Upazila', 1, '2021-01-12 20:58:51', '2021-01-12 20:59:01'),
(373, 27, 'Shibpur Upazila', 1, '2021-01-12 20:59:31', '2021-01-12 20:59:31'),
(374, 51, 'Rajshahi Sadar', 1, '2021-01-12 21:02:03', '2021-01-12 21:02:03'),
(375, 51, 'Bagha Upazila', 1, '2021-01-12 21:02:22', '2021-01-12 21:02:22'),
(376, 51, 'Bagmara Upazila', 1, '2021-01-12 21:02:34', '2021-01-12 21:02:34'),
(377, 51, 'Boalia Thana', 1, '2021-01-12 21:02:45', '2021-01-12 21:02:45'),
(378, 51, 'Charghat Upazila', 1, '2021-01-12 21:02:55', '2021-01-12 21:02:55'),
(379, 51, 'Durgapur Upazila, Rajshahi', 1, '2021-01-12 21:03:09', '2021-01-12 21:03:09'),
(380, 51, 'Godagari Upazila', 1, '2021-01-12 21:03:19', '2021-01-12 21:03:19'),
(381, 51, 'Mohanpur Upazila', 1, '2021-01-12 21:03:29', '2021-01-12 21:03:29'),
(382, 51, 'Paba Upazila', 1, '2021-01-12 21:03:39', '2021-01-12 21:03:39'),
(383, 51, 'Puthia Upazila', 1, '2021-01-12 21:03:51', '2021-01-12 21:03:51'),
(384, 51, 'Shah Makhdum Thana', 1, '2021-01-12 21:04:01', '2021-01-12 21:04:01'),
(385, 51, 'Tanore Upazila', 1, '2021-01-12 21:04:14', '2021-01-12 21:04:14'),
(386, 19, 'Alfadanga Upazila', 1, '2021-01-12 21:04:45', '2021-01-12 21:04:45'),
(387, 19, 'Bhanga Upazila', 1, '2021-01-12 21:04:55', '2021-01-12 21:04:55'),
(388, 19, 'Boalmari Upazila', 1, '2021-01-12 21:05:04', '2021-01-12 21:05:04'),
(389, 19, 'Charbhadrasan Upazila', 1, '2021-01-12 21:05:14', '2021-01-12 21:05:14'),
(390, 19, 'Faridpur Sadar', 1, '2021-01-12 21:05:26', '2021-01-12 21:05:26'),
(391, 19, 'Madhukhali Upazila', 1, '2021-01-12 21:05:36', '2021-01-12 21:05:36'),
(392, 19, 'Nagarkanda Upazila', 1, '2021-01-12 21:05:46', '2021-01-12 21:05:46'),
(393, 19, 'Sadarpur Upazila', 1, '2021-01-12 21:05:54', '2021-01-12 21:05:54'),
(394, 19, 'Saltha Upazila', 1, '2021-01-12 21:06:04', '2021-01-12 21:06:04'),
(395, 45, 'Adamdighi Upazila', 1, '2021-01-12 21:06:55', '2021-01-12 21:06:55'),
(396, 45, 'Bogura Sadar', 1, '2021-01-12 21:07:12', '2021-01-12 21:07:12'),
(397, 45, 'Dhunat Upazila', 1, '2021-01-12 21:07:23', '2021-01-12 21:07:23'),
(398, 45, 'Dhupchanchia Upazila', 1, '2021-01-12 21:07:33', '2021-01-12 21:07:33'),
(399, 45, 'Gabtali Upazila', 1, '2021-01-12 21:07:43', '2021-01-12 21:07:43'),
(400, 45, 'Kahaloo Upazila', 1, '2021-01-12 21:07:54', '2021-01-12 21:07:54'),
(401, 45, 'Nandigram Upazila', 1, '2021-01-12 21:08:04', '2021-01-12 21:08:04'),
(402, 45, 'Sariakandi Upazila', 1, '2021-01-12 21:08:16', '2021-01-12 21:08:16'),
(403, 45, 'Shajahanpur Upazila', 1, '2021-01-12 21:08:26', '2021-01-12 21:08:26'),
(404, 45, 'Sherpur', 1, '2021-01-12 21:08:46', '2021-01-12 21:08:46'),
(405, 45, 'Shibganj Upazila, Bogra', 1, '2021-01-12 21:08:56', '2021-01-12 21:08:56'),
(406, 45, 'Sonatala Upazila', 1, '2021-01-12 21:09:05', '2021-01-12 21:09:05'),
(407, 49, 'Chapainawabganj Sadar', 1, '2021-01-12 21:09:46', '2021-01-12 21:09:46'),
(408, 49, 'Bholahat Upazila', 1, '2021-01-12 21:10:36', '2021-01-12 21:10:36'),
(409, 49, 'Dogachi', 1, '2021-01-12 21:10:49', '2021-01-12 21:10:49'),
(410, 49, 'Gomostapur Upazila', 1, '2021-01-12 21:10:58', '2021-01-12 21:10:58'),
(411, 49, 'Nachol Upazila', 1, '2021-01-12 21:11:08', '2021-01-12 21:11:08'),
(412, 49, 'Shibganj Upazila, Chapai Nawabganj', 1, '2021-01-12 21:11:17', '2021-01-12 21:11:17'),
(413, 9, 'Kasba Upazila', 1, '2021-01-12 21:28:00', '2021-01-12 21:28:00'),
(414, 18, 'Rangamati Sadar', 1, '2021-01-12 21:29:00', '2021-01-12 21:29:00'),
(415, 9, 'Akhaura Upazila', 1, '2021-01-12 21:29:07', '2021-01-12 21:29:07'),
(416, 9, 'Ashuganj Upazila', 1, '2021-01-12 21:29:24', '2021-01-12 21:29:24'),
(417, 18, 'Kaptai', 1, '2021-01-12 21:29:26', '2021-01-12 21:29:26'),
(418, 18, 'Kawkhali', 1, '2021-01-12 21:29:40', '2021-01-12 21:29:40'),
(419, 9, 'Bancharampur Upazila', 1, '2021-01-12 21:30:01', '2021-01-12 21:30:01'),
(420, 18, 'Baghaichari', 1, '2021-01-12 21:30:10', '2021-01-12 21:30:10'),
(421, 9, 'Bijoynagar Upazila', 1, '2021-01-12 21:30:13', '2021-01-12 21:30:13'),
(422, 18, 'Barkal', 1, '2021-01-12 21:30:27', '2021-01-12 21:30:27'),
(423, 9, 'Nasirnagar Upazila', 1, '2021-01-12 21:30:31', '2021-01-12 21:30:31'),
(424, 9, 'Sarail Upazila', 1, '2021-01-12 21:30:41', '2021-01-12 21:30:41'),
(425, 18, 'Langadu', 1, '2021-01-12 21:30:42', '2021-01-12 21:30:42'),
(426, 18, 'Rajasthali', 1, '2021-01-12 21:31:05', '2021-01-12 21:31:05'),
(427, 15, 'Khagrachari Sadar', 1, '2021-01-12 21:31:25', '2021-01-12 21:31:25'),
(428, 18, 'Belaichari', 1, '2021-01-12 21:31:28', '2021-01-12 21:31:28'),
(429, 18, 'Juraichari', 1, '2021-01-12 21:31:45', '2021-01-12 21:31:45'),
(430, 18, 'Naniarchar', 1, '2021-01-12 21:32:02', '2021-01-12 21:32:02'),
(431, 26, 'Narayanganj Sadar', 1, '2021-01-12 21:38:50', '2021-01-12 21:38:50'),
(432, 26, 'Araihajar', 1, '2021-01-12 21:39:18', '2021-01-12 21:39:18'),
(433, 26, 'Bandar', 1, '2021-01-12 21:39:33', '2021-01-12 21:39:33'),
(434, 26, 'Rupganj', 1, '2021-01-12 21:39:52', '2021-01-12 21:39:52'),
(435, 26, 'Sonargaon', 1, '2021-01-12 21:40:09', '2021-01-12 21:40:09'),
(436, 30, 'Tangail Sadar', 1, '2021-01-12 21:41:17', '2021-01-12 21:41:17'),
(437, 30, 'Sakhipur Upazila', 1, '2021-01-12 21:43:26', '2021-01-12 21:43:26'),
(438, 30, 'Basail Upazila', 1, '2021-01-12 21:43:37', '2021-01-12 21:43:37'),
(439, 30, 'Madhupur Upazila', 1, '2021-01-12 21:43:51', '2021-01-12 21:43:51'),
(440, 30, 'Ghatail', 1, '2021-01-12 21:44:07', '2021-01-12 21:44:07'),
(441, 30, 'Kalihati', 1, '2021-01-12 21:44:19', '2021-01-12 21:44:19'),
(442, 30, 'Nagarpur', 1, '2021-01-12 21:44:31', '2021-01-12 21:44:31'),
(443, 30, 'Mirzapur', 1, '2021-01-12 21:44:49', '2021-01-12 21:44:49'),
(444, 30, 'Gopalpur', 1, '2021-01-12 21:45:04', '2021-01-12 21:45:04'),
(445, 30, 'Delduar', 1, '2021-01-12 21:45:23', '2021-01-12 21:45:23'),
(446, 30, 'Bhuapur', 1, '2021-01-12 21:45:34', '2021-01-12 21:45:34'),
(447, 30, 'Dhanbari', 1, '2021-01-12 21:45:45', '2021-01-12 21:45:45'),
(448, 22, 'Kishoreganj Sadar', 1, '2021-01-12 21:48:24', '2021-01-12 21:48:24'),
(449, 22, 'Kuliarchar', 1, '2021-01-12 21:49:01', '2021-01-12 21:49:01'),
(450, 11, 'Sitakunda', 1, '2021-01-12 21:54:19', '2021-01-12 21:54:19'),
(451, 11, 'Satkania', 1, '2021-01-12 22:04:50', '2021-01-12 22:04:50'),
(452, 11, 'Satkania Upazila', 1, '2021-01-12 22:07:08', '2021-01-12 22:07:08'),
(453, 11, 'Sandwip Upazila', 1, '2021-01-12 22:07:22', '2021-01-12 22:07:22'),
(454, 11, 'Raozan Upazila', 1, '2021-01-12 22:07:37', '2021-01-12 22:07:37'),
(455, 11, 'Rangunia Upazila', 1, '2021-01-12 22:07:49', '2021-01-12 22:07:49'),
(456, 11, 'Patiya Upazila', 1, '2021-01-12 22:08:04', '2021-01-12 22:08:04'),
(457, 11, 'Mirsharai Upazila', 1, '2021-01-12 22:08:18', '2021-01-12 22:08:18'),
(458, 11, 'Lohagara Upazila', 1, '2021-01-12 22:08:29', '2021-01-12 22:08:29'),
(459, 11, 'Hathazari Upazila', 1, '2021-01-12 22:08:51', '2021-01-12 22:08:51'),
(460, 11, 'Fatikchhari Upazila', 1, '2021-01-12 22:09:05', '2021-01-12 22:09:05'),
(461, 11, 'Chandanaish Upazila', 1, '2021-01-12 22:09:16', '2021-01-12 22:09:16'),
(462, 11, 'Boalkhali Upazila', 1, '2021-01-12 22:09:27', '2021-01-12 22:09:27'),
(463, 11, 'Banshkhali Upazila', 1, '2021-01-12 22:09:35', '2021-01-12 22:09:35'),
(464, 11, 'Anwara Upazila', 1, '2021-01-12 22:09:48', '2021-01-12 22:09:48'),
(465, 22, 'Hossainpur', 1, '2021-01-12 22:14:57', '2021-01-12 22:14:57'),
(466, 22, 'Pakundia', 1, '2021-01-12 22:15:13', '2021-01-12 22:15:13'),
(467, 22, 'Bajitpur', 1, '2021-01-12 22:15:40', '2021-01-12 22:15:40'),
(468, 22, 'Austagram', 1, '2021-01-12 22:15:54', '2021-01-12 22:15:54'),
(469, 22, 'Karimganj', 1, '2021-01-12 22:16:07', '2021-01-12 22:16:07'),
(470, 22, 'Katiadi', 1, '2021-01-12 22:16:22', '2021-01-12 22:16:22'),
(471, 22, 'Tarail', 1, '2021-01-12 22:16:40', '2021-01-12 22:16:40'),
(472, 22, 'Itna', 1, '2021-01-12 22:16:53', '2021-01-12 22:16:53'),
(473, 22, 'Nikli', 1, '2021-01-12 22:17:10', '2021-01-12 22:17:10'),
(474, 22, 'Mithamain', 1, '2021-01-12 22:17:21', '2021-01-12 22:17:21'),
(475, 22, 'Bhairab', 1, '2021-01-12 22:17:34', '2021-01-12 22:17:34'),
(476, 24, 'Manikganj Sadar', 1, '2021-01-12 22:18:58', '2021-01-12 22:18:58'),
(477, 24, 'Singair', 1, '2021-01-12 22:19:46', '2021-01-12 22:19:46'),
(478, 24, 'Shivalaya', 1, '2021-01-12 22:19:58', '2021-01-12 22:19:58'),
(479, 24, 'Saturia', 1, '2021-01-12 22:20:12', '2021-01-12 22:20:12'),
(480, 24, 'Harirampur', 1, '2021-01-12 22:20:26', '2021-01-12 22:20:26'),
(481, 24, 'Ghior', 1, '2021-01-12 22:20:37', '2021-01-12 22:20:37'),
(482, 24, 'Daulatpur', 1, '2021-01-12 22:20:52', '2021-01-12 22:20:52'),
(483, 23, 'Madaripur Sadar', 1, '2021-01-12 22:22:05', '2021-01-12 22:22:05'),
(484, 23, 'Kalkini', 1, '2021-01-12 22:22:17', '2021-01-12 22:22:17'),
(485, 23, 'Rajoir', 1, '2021-01-12 22:22:39', '2021-01-12 22:22:39'),
(486, 23, 'Shibchar', 1, '2021-01-12 22:22:49', '2021-01-12 22:22:49'),
(487, 25, 'Munshiganj Sadar', 1, '2021-01-12 22:23:38', '2021-01-12 22:23:38'),
(488, 25, 'Lohajang', 1, '2021-01-12 22:23:50', '2021-01-12 22:23:50'),
(489, 25, 'Sreenagar', 1, '2021-01-12 22:24:03', '2021-01-12 22:24:03'),
(490, 25, 'Sirajdikhan', 1, '2021-01-12 22:24:13', '2021-01-12 22:24:13'),
(491, 25, 'Tongibari', 1, '2021-01-12 22:24:27', '2021-01-12 22:24:27'),
(492, 25, 'Gazaria', 1, '2021-01-12 22:24:37', '2021-01-12 22:24:37'),
(493, 28, 'Rajbari Sadar', 1, '2021-01-12 22:25:45', '2021-01-12 22:25:45'),
(494, 28, 'Baliakandi', 1, '2021-01-12 22:25:57', '2021-01-12 22:25:57'),
(495, 28, 'Goalanda', 1, '2021-01-12 22:26:13', '2021-01-12 22:26:13'),
(496, 28, 'Pangsha', 1, '2021-01-12 22:26:25', '2021-01-12 22:26:25'),
(497, 28, 'Kalukhali', 1, '2021-01-12 22:26:36', '2021-01-12 22:26:36'),
(498, 29, 'Shariatpur Sadar', 1, '2021-01-12 22:27:15', '2021-01-12 22:27:15'),
(499, 29, 'Damudya', 1, '2021-01-12 22:27:30', '2021-01-12 22:27:30'),
(500, 29, 'Naria', 1, '2021-01-12 22:27:44', '2021-01-12 22:27:44'),
(501, 29, 'Zanjira', 1, '2021-01-12 22:27:55', '2021-01-12 22:27:55'),
(502, 29, 'Bhedarganj', 1, '2021-01-12 22:28:06', '2021-01-12 22:28:06'),
(503, 29, 'Gosairhat', 1, '2021-01-12 22:28:27', '2021-01-12 22:28:27'),
(504, 29, 'Shakhipur', 1, '2021-01-12 22:28:39', '2021-01-12 22:28:39'),
(505, 41, 'Jamalpur Sadar', 1, '2021-01-12 22:46:42', '2021-01-12 22:46:42'),
(506, 41, 'Dewanganj', 1, '2021-01-12 22:47:04', '2021-01-12 22:47:04'),
(507, 41, 'Baksiganj', 1, '2021-01-12 22:47:19', '2021-01-12 22:47:19'),
(508, 41, 'Madarganj', 1, '2021-01-12 22:47:55', '2021-01-12 22:47:55'),
(509, 41, 'Melandaha', 1, '2021-01-12 22:48:06', '2021-01-12 22:48:06'),
(510, 41, 'Sarishabari', 1, '2021-01-12 22:48:19', '2021-01-12 22:48:19'),
(511, 40, 'Satkhira Sadar', 1, '2021-01-12 22:56:18', '2021-01-12 22:56:18'),
(512, 40, 'Assasuni', 1, '2021-01-12 22:56:29', '2021-01-12 22:56:29'),
(513, 40, 'Debhata', 1, '2021-01-12 22:56:45', '2021-01-12 22:56:45'),
(514, 40, 'Tala', 1, '2021-01-12 22:56:57', '2021-01-12 22:56:57'),
(515, 40, 'Kalaroa', 1, '2021-01-12 22:57:09', '2021-01-12 22:57:09'),
(516, 40, 'Kaliganj', 1, '2021-01-12 22:57:24', '2021-01-12 22:57:24'),
(517, 40, 'Shyamnagar', 1, '2021-01-12 22:57:37', '2021-01-12 22:57:37'),
(518, 33, 'Abhaynagar', 1, '2021-01-12 22:59:00', '2021-01-12 22:59:00'),
(519, 33, 'Bagherpara', 1, '2021-01-12 22:59:14', '2021-01-12 22:59:14'),
(520, 33, 'Chaugachha', 1, '2021-01-12 22:59:25', '2021-01-12 22:59:25'),
(521, 33, 'Jhikargachha', 1, '2021-01-12 22:59:35', '2021-01-12 22:59:35'),
(522, 33, 'Keshabpur', 1, '2021-01-12 22:59:45', '2021-01-12 22:59:45'),
(523, 33, 'Jessore Sadar', 1, '2021-01-12 22:59:55', '2021-01-12 22:59:55'),
(524, 33, 'Manirampur', 1, '2021-01-12 23:00:05', '2021-01-12 23:00:05'),
(525, 33, 'Sharsha', 1, '2021-01-12 23:00:24', '2021-01-12 23:00:24'),
(526, 32, 'Alamdanga', 1, '2021-01-12 23:01:41', '2021-01-12 23:01:41'),
(527, 32, 'Chuadanga Sadar', 1, '2021-01-12 23:01:55', '2021-01-12 23:01:55'),
(528, 32, 'Jibannagar', 1, '2021-01-12 23:02:10', '2021-01-12 23:02:10'),
(529, 32, 'Damurhuda', 1, '2021-01-12 23:02:30', '2021-01-12 23:02:30'),
(530, 32, 'Darsana', 1, '2021-01-12 23:02:46', '2021-01-12 23:02:46'),
(531, 31, 'Bagerhat Sadar', 1, '2021-01-12 23:03:48', '2021-01-12 23:03:48'),
(532, 31, 'Chitalmari', 1, '2021-01-12 23:04:08', '2021-01-12 23:04:08'),
(533, 31, 'Fakirhat', 1, '2021-01-12 23:04:25', '2021-01-12 23:04:25'),
(534, 31, 'Mollahat', 1, '2021-01-12 23:04:56', '2021-01-12 23:04:56'),
(535, 31, 'Kachua Upazila', 1, '2021-01-12 23:05:18', '2021-01-12 23:05:18'),
(536, 31, 'Mongla', 1, '2021-01-12 23:05:35', '2021-01-12 23:05:35'),
(537, 31, 'Morrelganj', 1, '2021-01-12 23:05:53', '2021-01-12 23:05:53'),
(538, 31, 'Rampal', 1, '2021-01-12 23:06:10', '2021-01-12 23:06:10'),
(539, 31, 'Sarankhola', 1, '2021-01-12 23:06:23', '2021-01-12 23:06:23'),
(540, 34, 'Jhenaidah Sadar', 1, '2021-01-12 23:07:52', '2021-01-12 23:07:52'),
(541, 34, 'Maheshpur', 1, '2021-01-12 23:08:05', '2021-01-12 23:08:05'),
(542, 34, 'Kaliganj  Upazila', 1, '2021-01-12 23:08:49', '2021-01-12 23:08:49'),
(543, 34, 'Kotchandpur', 1, '2021-01-12 23:09:00', '2021-01-12 23:09:00'),
(544, 34, 'Shailkupa', 1, '2021-01-12 23:09:15', '2021-01-12 23:09:15'),
(545, 34, 'Harinakunda', 1, '2021-01-12 23:09:26', '2021-01-12 23:09:26'),
(546, 36, 'Bheramara', 1, '2021-01-12 23:12:02', '2021-01-12 23:12:02'),
(547, 36, 'Daulatpur Upazila', 1, '2021-01-12 23:12:27', '2021-01-12 23:12:27'),
(548, 36, 'Khoksa', 1, '2021-01-12 23:12:40', '2021-01-12 23:12:40'),
(549, 36, 'Kumarkhali', 1, '2021-01-12 23:12:51', '2021-01-12 23:12:51'),
(550, 36, 'Kushtia Sadar', 1, '2021-01-12 23:13:06', '2021-01-12 23:13:06'),
(551, 36, 'Mirpur', 1, '2021-01-12 23:13:21', '2021-01-12 23:13:21'),
(552, 47, 'Atrai', 1, '2021-01-13 00:41:25', '2021-01-13 00:41:25'),
(553, 47, 'Badalgachhi', 1, '2021-01-13 00:41:43', '2021-01-13 00:41:43'),
(554, 47, 'Dhamoirhat', 1, '2021-01-13 00:41:58', '2021-01-13 00:41:58'),
(555, 47, 'Manda', 1, '2021-01-13 00:42:13', '2021-01-13 00:42:13'),
(556, 47, 'Mohadevpur', 1, '2021-01-13 00:42:32', '2021-01-13 00:42:32'),
(557, 47, 'Naogaon Sadar', 1, '2021-01-13 00:42:50', '2021-01-13 00:42:50'),
(558, 47, 'Niamatpur', 1, '2021-01-13 00:43:03', '2021-01-13 00:43:03'),
(559, 47, 'Patnitala', 1, '2021-01-13 00:43:18', '2021-01-13 00:43:18'),
(560, 47, 'Porsha', 1, '2021-01-13 00:43:29', '2021-01-13 00:43:29'),
(561, 47, 'Raninagar', 1, '2021-01-13 00:43:43', '2021-01-13 00:43:43'),
(562, 47, 'Sapahar', 1, '2021-01-13 00:43:57', '2021-01-13 00:43:57'),
(563, 46, 'Joypurhat Sadar', 1, '2021-01-13 00:45:10', '2021-01-13 00:45:10'),
(564, 46, 'Akkelpur', 1, '2021-01-13 00:45:24', '2021-01-13 00:45:24'),
(565, 46, 'Kalai', 1, '2021-01-13 00:45:37', '2021-01-13 00:45:37'),
(566, 46, 'Khetlal', 1, '2021-01-13 00:45:48', '2021-01-13 00:45:48'),
(567, 46, 'Panchbibi', 1, '2021-01-13 00:46:04', '2021-01-13 00:46:04'),
(568, 44, 'Jhenaigati', 1, '2021-01-13 00:46:47', '2021-01-13 00:46:47'),
(569, 44, 'Nakla Upazila', 1, '2021-01-13 00:46:58', '2021-01-13 00:46:58'),
(570, 44, 'Nalitabari', 1, '2021-01-13 00:47:11', '2021-01-13 00:47:11'),
(571, 44, 'Sherpur Sadar', 1, '2021-01-13 00:47:25', '2021-01-13 00:47:25'),
(572, 44, 'Sreebardi', 1, '2021-01-13 00:47:37', '2021-01-13 00:47:37'),
(573, 43, 'Atpara', 1, '2021-01-13 00:48:14', '2021-01-13 00:48:14'),
(574, 43, 'Barhatta', 1, '2021-01-13 00:48:26', '2021-01-13 00:48:26'),
(575, 44, 'Durgapur', 1, '2021-01-13 00:48:43', '2021-01-13 00:48:43'),
(576, 44, 'Khaliajuri', 1, '2021-01-13 00:49:01', '2021-01-13 00:49:01'),
(577, 44, 'Kalmakanda', 1, '2021-01-13 00:49:17', '2021-01-13 00:49:17'),
(578, 44, 'Kendua', 1, '2021-01-13 00:49:32', '2021-01-13 00:49:32'),
(579, 44, 'Madan', 1, '2021-01-13 00:49:45', '2021-01-13 00:49:45'),
(580, 44, 'Mohanganj', 1, '2021-01-13 00:49:59', '2021-01-13 00:49:59'),
(581, 44, 'Netrokona Sadar', 1, '2021-01-13 00:50:16', '2021-01-13 00:50:16'),
(582, 44, 'Purbadhala', 1, '2021-01-13 00:50:27', '2021-01-13 00:50:27'),
(583, 48, 'Gurudaspur', 1, '2021-01-13 00:51:44', '2021-01-13 00:51:44'),
(584, 48, 'Baraigram', 1, '2021-01-13 00:52:04', '2021-01-13 00:52:04'),
(585, 48, 'Bagatipara', 1, '2021-01-13 00:52:19', '2021-01-13 00:52:19'),
(586, 48, 'Lalpur', 1, '2021-01-13 00:52:34', '2021-01-13 00:52:34'),
(587, 48, 'Singra', 1, '2021-01-13 00:52:48', '2021-01-13 00:52:48'),
(588, 48, 'Naldanga', 1, '2021-01-13 00:53:06', '2021-01-13 00:53:06'),
(589, 21, 'Gopalganj Sadar', 1, '2021-01-13 00:55:56', '2021-01-13 00:55:56'),
(590, 21, 'Kashiani', 1, '2021-01-13 00:56:06', '2021-01-13 00:56:06'),
(591, 21, 'Kotalipara', 1, '2021-01-13 00:56:19', '2021-01-13 00:56:19'),
(592, 21, 'Muksudpur', 1, '2021-01-13 00:56:39', '2021-01-13 00:56:39'),
(593, 21, 'Tungipara', 1, '2021-01-13 00:56:52', '2021-01-13 00:56:52'),
(594, 35, 'erokhada', 0, '2021-01-13 00:58:56', '2021-01-24 15:08:46'),
(595, 35, 'Sonadanga', 1, '2021-01-13 00:59:09', '2021-01-13 00:59:09'),
(596, 35, 'Rupsa', 1, '2021-01-13 00:59:26', '2021-01-13 00:59:26'),
(597, 35, 'Phultala', 1, '2021-01-13 00:59:37', '2021-01-13 00:59:37'),
(598, 35, 'Paikgachha', 1, '2021-01-13 00:59:52', '2021-01-13 00:59:52'),
(599, 35, 'Koyra', 1, '2021-01-13 01:00:06', '2021-01-13 01:00:06'),
(600, 35, 'Kotwali Upazila', 1, '2021-01-13 01:00:32', '2021-01-13 01:00:32'),
(601, 35, 'Khan Jahan ALi', 1, '2021-01-13 01:00:44', '2021-01-13 01:00:44'),
(602, 35, 'Khalishpur', 1, '2021-01-13 01:01:01', '2021-01-13 01:01:01'),
(603, 35, 'Harintana', 1, '2021-01-13 01:01:19', '2021-01-13 01:01:19'),
(604, 35, 'Dumuria', 1, '2021-01-13 01:01:32', '2021-01-13 01:01:32'),
(605, 35, 'Dighalia', 1, '2021-01-13 01:01:45', '2021-01-13 01:01:45'),
(606, 35, 'Daulatpur  Upazila', 1, '2021-01-13 01:02:12', '2021-01-13 01:02:12'),
(607, 35, 'Dacope', 1, '2021-01-13 01:02:23', '2021-01-13 01:02:23'),
(608, 35, 'Batiaghata', 1, '2021-01-13 01:02:34', '2021-01-13 01:02:34'),
(609, 37, 'Magura Sadar', 1, '2021-01-13 01:03:37', '2021-01-13 01:03:37'),
(610, 37, 'Shalikha', 1, '2021-01-13 01:03:46', '2021-01-13 01:03:46'),
(611, 37, 'Mohammadpur Upazila', 1, '2021-01-13 01:04:00', '2021-01-13 01:04:00'),
(612, 37, 'Sreepur', 1, '2021-01-13 01:04:12', '2021-01-13 01:04:12'),
(613, 38, 'Meherpur Sadar', 1, '2021-01-13 01:04:58', '2021-01-13 01:04:58'),
(614, 38, 'Gangni', 1, '2021-01-13 01:05:15', '2021-01-13 01:05:15'),
(615, 38, 'Mujibnagar', 1, '2021-01-13 01:05:33', '2021-01-13 01:05:33'),
(616, 39, 'Narail Sadar', 1, '2021-01-13 01:06:19', '2021-01-13 01:06:19'),
(617, 39, 'Kalia', 1, '2021-01-13 01:06:35', '2021-01-13 01:06:35'),
(618, 39, 'Lohagara', 1, '2021-01-13 01:06:50', '2021-01-13 01:06:50'),
(619, 42, 'Mymensingh Sadar', 1, '2021-01-13 01:07:57', '2021-01-13 01:07:57'),
(620, 42, 'Bhaluka', 1, '2021-01-13 01:08:11', '2021-01-13 01:08:11'),
(621, 42, 'Trishal', 1, '2021-01-13 01:08:28', '2021-01-13 01:08:28'),
(622, 42, 'Haluaghat', 1, '2021-01-13 01:08:42', '2021-01-13 01:08:42'),
(623, 42, 'Muktagacha', 1, '2021-01-13 01:08:55', '2021-01-13 01:08:55'),
(624, 42, 'Dhobaura', 1, '2021-01-13 01:09:08', '2021-01-13 01:09:08'),
(625, 42, 'Fulbaria', 1, '2021-01-13 01:09:20', '2021-01-13 01:09:20'),
(626, 42, 'Gaffargaon', 1, '2021-01-13 01:09:33', '2021-01-13 01:09:33'),
(627, 42, 'Gauripur', 1, '2021-01-13 01:09:43', '2021-01-13 01:09:43'),
(628, 42, 'Ishwarganj', 1, '2021-01-13 01:09:58', '2021-01-13 01:09:58'),
(629, 42, 'Nandail', 1, '2021-01-13 01:10:10', '2021-01-13 01:10:10'),
(630, 42, 'Phulpur', 1, '2021-01-13 01:10:23', '2021-01-13 01:10:23'),
(631, 42, 'Tara Khanda', 1, '2021-01-13 01:10:34', '2021-01-13 01:10:34'),
(632, 50, 'Pabna Sadar', 1, '2021-01-13 01:13:05', '2021-01-13 01:13:05'),
(633, 50, 'Atgharia', 1, '2021-01-13 01:13:20', '2021-01-13 01:13:20'),
(634, 50, 'Bera', 1, '2021-01-13 01:13:30', '2021-01-13 01:13:30'),
(635, 50, 'Bhangura', 1, '2021-01-13 01:13:43', '2021-01-13 01:13:43'),
(636, 50, 'Chatmohar', 1, '2021-01-13 01:13:59', '2021-01-13 01:13:59'),
(637, 50, 'Faridpur', 1, '2021-01-13 01:14:15', '2021-01-13 01:14:15'),
(638, 50, 'Ishwardi', 1, '2021-01-13 01:14:29', '2021-01-13 01:14:29'),
(639, 50, 'Shathia', 1, '2021-01-13 01:14:43', '2021-01-13 01:14:43'),
(640, 50, 'Sujanagar', 1, '2021-01-13 01:14:54', '2021-01-13 01:14:54'),
(641, 52, 'Sirajganj Sadar', 1, '2021-01-13 01:15:21', '2021-01-13 01:15:21'),
(642, 52, 'Kazipur', 1, '2021-01-13 01:15:52', '2021-01-13 01:15:52'),
(643, 52, 'Ullahpara', 1, '2021-01-13 01:16:02', '2021-01-13 01:16:02'),
(644, 52, 'Shahjadpur', 1, '2021-01-13 01:16:15', '2021-01-13 01:16:15'),
(645, 52, 'Raiganj', 1, '2021-01-13 01:16:30', '2021-01-13 01:16:30'),
(646, 52, 'Kamarkhanda', 1, '2021-01-13 01:16:42', '2021-01-13 01:16:42'),
(647, 52, 'Tarash', 1, '2021-01-13 01:16:59', '2021-01-13 01:16:59'),
(648, 52, 'Belkuchi', 1, '2021-01-13 01:17:11', '2021-01-13 01:17:11'),
(649, 52, 'Chauhali', 1, '2021-01-13 01:17:23', '2021-01-13 01:17:23'),
(650, 54, 'Gaibandha Sadar', 1, '2021-01-13 01:18:10', '2021-01-13 01:18:10'),
(651, 54, 'Fulchhari', 1, '2021-01-13 01:18:24', '2021-01-13 01:18:24'),
(652, 54, 'Gobindaganj', 1, '2021-01-13 01:18:39', '2021-01-13 01:18:39'),
(653, 54, 'Palashbari', 1, '2021-01-13 01:18:51', '2021-01-13 01:18:51'),
(654, 54, 'Sadullapur', 1, '2021-01-13 01:19:03', '2021-01-13 01:19:03'),
(655, 54, 'Sundarganj', 1, '2021-01-13 01:19:19', '2021-01-13 01:19:19'),
(656, 54, 'Saghata', 1, '2021-01-13 01:19:31', '2021-01-13 01:19:31'),
(657, 66, 'Tongi Bazar', 1, '2021-01-13 01:33:49', '2021-01-13 01:33:49'),
(658, 66, 'Keraniganj', 1, '2021-01-13 01:34:03', '2021-01-13 01:54:10'),
(659, 67, 'Dohar', 1, '2021-01-13 01:47:44', '2021-01-13 01:47:44'),
(660, 66, 'Demra', 1, '2021-01-13 01:50:08', '2021-01-13 01:50:08'),
(661, 67, 'Nowabganj', 1, '2021-01-13 01:56:35', '2021-01-13 01:56:35'),
(662, 66, 'Sutrapur', 1, '2021-01-13 02:04:45', '2021-01-13 02:04:45'),
(663, 66, 'Dolaikhal', 1, '2021-01-13 02:05:01', '2021-01-13 02:05:01'),
(664, 66, 'Dolaipar', 1, '2021-01-13 02:05:13', '2021-01-13 02:05:13'),
(665, 66, 'Sonir Akhra', 1, '2021-01-13 02:08:00', '2021-01-13 02:08:00'),
(666, 66, 'Chittagong Road', 1, '2021-01-13 02:08:23', '2021-01-13 02:08:23'),
(667, 66, 'Jurain', 1, '2021-01-13 02:10:24', '2021-01-13 02:10:24'),
(668, 66, 'Postogola', 1, '2021-01-13 02:10:35', '2021-01-13 02:10:35'),
(669, 65, 'Agrabad', 1, '2021-01-13 17:41:39', '2021-01-13 17:41:39'),
(670, 65, 'Nasirabad', 1, '2021-01-13 17:42:28', '2021-01-13 17:42:28'),
(671, 65, 'Halishahar', 1, '2021-01-13 17:45:32', '2021-01-13 17:45:32'),
(672, 65, 'New Market ctg', 1, '2021-01-13 17:49:49', '2021-01-13 17:49:49'),
(673, 67, 'Banani', 1, '2021-01-13 21:54:48', '2021-01-14 00:46:36'),
(674, 11, 'baraiyarhat', 1, '2021-01-14 17:30:30', '2021-01-14 17:30:30'),
(675, 66, 'Kamrangichar', 1, '2021-01-16 17:11:26', '2021-01-16 17:11:26'),
(676, 43, 'Durgapur-', 1, '2021-01-18 22:40:27', '2021-01-18 22:40:27'),
(677, 43, 'Mohongonj', 1, '2021-01-18 22:46:14', '2021-01-18 22:46:14'),
(678, 43, 'Purbadhala.', 1, '2021-01-18 22:46:53', '2021-01-18 22:46:53'),
(679, 43, 'Kalmakanda.', 1, '2021-01-18 22:47:43', '2021-01-18 22:47:43'),
(680, 43, 'Khaliajuri.', 1, '2021-01-18 22:48:46', '2021-01-18 22:48:46'),
(681, 43, 'Madan.', 1, '2021-01-18 22:49:26', '2021-01-18 22:49:26'),
(682, 43, 'Kendua.', 1, '2021-01-18 22:50:04', '2021-01-18 22:50:04'),
(683, 11, 'Patenga', 1, '2021-01-19 21:47:39', '2021-01-19 21:47:39'),
(684, 1, 'Kochukhet', 1, '2021-01-20 16:12:21', '2021-01-20 16:12:21'),
(685, 1, 'Gudaraghat', 1, '2021-01-20 16:12:59', '2021-01-20 16:12:59'),
(686, 1, 'Agargaon', 1, '2021-01-20 16:14:25', '2021-01-20 16:14:25'),
(687, 1, 'Ibrahimpur', 1, '2021-01-20 16:15:28', '2021-01-20 16:15:28'),
(688, 1, 'Vashantek', 1, '2021-01-20 16:16:36', '2021-01-20 16:16:36');
INSERT INTO `sub_cities` (`id`, `city_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(689, 1, 'Matikata', 1, '2021-01-20 16:17:18', '2021-01-20 16:17:18'),
(690, 1, 'Rupnagar Residential Area', 1, '2021-01-20 16:17:40', '2021-01-20 16:17:40'),
(691, 1, 'Rainkhola', 1, '2021-01-20 16:19:21', '2021-01-20 16:19:21'),
(692, 1, 'Mirpur Diabari', 1, '2021-01-20 16:19:41', '2021-01-20 16:19:41'),
(693, 1, 'Mazar Road', 1, '2021-01-20 16:21:51', '2021-01-20 16:21:51'),
(694, 1, 'Shagufta', 1, '2021-01-20 16:23:17', '2021-01-20 16:23:17'),
(695, 1, 'Bawnia', 1, '2021-01-20 16:23:28', '2021-01-20 16:23:28'),
(696, 1, 'Baigertek', 1, '2021-01-20 16:24:25', '2021-01-20 16:24:25'),
(697, 1, 'Madina nagar', 1, '2021-01-20 16:25:29', '2021-01-20 16:25:29'),
(698, 1, 'Dewanpara', 1, '2021-01-20 16:27:13', '2021-01-20 16:27:13'),
(699, 1, 'Mastertek', 1, '2021-01-20 16:27:33', '2021-01-20 16:27:33'),
(700, 1, 'Barontek', 1, '2021-01-20 16:27:52', '2021-01-20 16:27:52'),
(701, 1, 'Goltek', 1, '2021-01-20 16:28:32', '2021-01-20 16:28:32'),
(702, 1, 'Shewra', 1, '2021-01-20 16:28:51', '2021-01-20 16:28:51'),
(703, 1, 'Uttarkhan', 1, '2021-01-20 16:29:10', '2021-01-20 16:29:10'),
(704, 1, 'Dakshinkhan', 1, '2021-01-20 16:29:29', '2021-01-20 16:29:29'),
(705, 1, 'Fayedabad', 1, '2021-01-20 16:29:42', '2021-01-20 16:29:42'),
(706, 1, 'Kuril', 1, '2021-01-20 16:32:08', '2021-01-20 16:32:08'),
(707, 1, 'Nikunja', 1, '2021-01-20 16:32:35', '2021-01-20 16:32:35'),
(708, 1, 'Hajipara', 1, '2021-01-20 16:35:42', '2021-01-20 16:35:42'),
(709, 1, 'Kawla', 1, '2021-01-20 16:35:55', '2021-01-20 16:35:55'),
(710, 1, 'Naddapara', 1, '2021-01-20 16:36:14', '2021-01-20 16:36:14'),
(711, 1, 'Bashundhara R/A', 1, '2021-01-20 16:36:38', '2021-01-20 16:36:38'),
(712, 1, 'Vatara', 1, '2021-01-20 16:36:53', '2021-01-20 16:36:53'),
(713, 1, 'Nadda', 1, '2021-01-20 16:37:05', '2021-01-20 16:37:05'),
(714, 1, 'Notun Bazar', 1, '2021-01-20 16:37:45', '2021-01-20 16:37:45'),
(715, 1, 'Uttor Badda', 1, '2021-01-20 16:38:17', '2021-01-20 16:38:17'),
(716, 1, 'Middle Badda', 1, '2021-01-20 16:38:39', '2021-01-20 16:38:39'),
(717, 1, 'South Badda', 1, '2021-01-20 16:38:49', '2021-01-20 16:38:49'),
(718, 1, 'Merul Badda', 1, '2021-01-20 16:38:59', '2021-01-20 16:38:59'),
(719, 1, 'Banani DOHS', 1, '2021-01-20 16:39:26', '2021-01-20 16:39:26'),
(720, 1, 'South Monipur', 1, '2021-01-20 16:39:53', '2021-01-20 16:39:53'),
(721, 1, 'Shah Ali Bag', 1, '2021-01-20 16:40:06', '2021-01-20 16:40:06'),
(722, 1, 'Aziz Palli', 1, '2021-01-20 16:40:17', '2021-01-20 16:40:17'),
(723, 1, 'Bashtola', 1, '2021-01-20 16:40:40', '2021-01-20 16:40:40'),
(724, 1, 'South Baridhara, DIT Project', 1, '2021-01-20 16:40:51', '2021-01-20 16:40:51'),
(725, 1, 'Bijoy Shoroni', 1, '2021-01-20 16:41:08', '2021-01-20 16:41:08'),
(726, 1, 'Indira Road', 1, '2021-01-20 16:42:51', '2021-01-20 16:42:51'),
(727, 1, 'Razabazar', 1, '2021-01-20 16:43:59', '2021-01-20 16:43:59'),
(728, 1, 'Panthopath', 1, '2021-01-20 16:44:17', '2021-01-20 16:44:17'),
(729, 1, 'Green Road', 1, '2021-01-20 16:45:02', '2021-01-20 16:45:02'),
(730, 1, 'Manik Mia Avenue', 1, '2021-01-20 16:45:18', '2021-01-20 16:45:18'),
(731, 1, 'Asad Avenue', 1, '2021-01-20 16:45:38', '2021-01-20 16:45:38'),
(732, 1, 'West Dhanmondi', 1, '2021-01-20 16:45:51', '2021-01-20 16:45:51'),
(733, 1, 'Shankar', 1, '2021-01-20 16:46:03', '2021-01-20 16:46:03'),
(734, 1, 'Rayer Bazar', 1, '2021-01-20 16:46:15', '2021-01-20 16:46:15'),
(735, 1, 'Tallabag', 1, '2021-01-20 16:46:30', '2021-01-20 16:46:30'),
(736, 1, 'Hazaribag', 1, '2021-01-20 16:46:42', '2021-01-20 16:46:42'),
(737, 1, 'Pilkhana', 1, '2021-01-20 16:47:02', '2021-01-20 16:47:02'),
(738, 1, 'Nawabgonj Puran Dhaka', 1, '2021-01-20 16:47:47', '2021-01-20 16:47:47'),
(739, 1, 'Azimpur', 1, '2021-01-20 16:48:22', '2021-01-20 16:48:22'),
(740, 1, 'Nilkhet', 1, '2021-01-20 16:48:56', '2021-01-20 16:48:56'),
(741, 1, 'Chawkbazar (Dhaka)', 1, '2021-01-20 16:49:23', '2021-01-20 16:49:23'),
(742, 1, 'Naya Bazar', 1, '2021-01-20 16:49:39', '2021-01-20 16:49:39'),
(743, 1, 'Tatibazar', 1, '2021-01-20 16:50:06', '2021-01-20 16:50:06'),
(744, 1, 'Luxmi Bazar', 1, '2021-01-20 16:50:24', '2021-01-20 16:50:24'),
(745, 1, 'Puran Dhaka', 1, '2021-01-20 16:50:36', '2021-01-20 16:50:36'),
(746, 1, 'Siddique Bazar', 1, '2021-01-20 16:51:11', '2021-01-20 16:51:11'),
(747, 1, 'Tikatuly', 1, '2021-01-20 16:51:37', '2021-01-20 16:51:37'),
(748, 1, 'Nawabpur', 1, '2021-01-20 16:52:00', '2021-01-20 16:52:00'),
(749, 1, 'Kaptan Bazar', 1, '2021-01-20 16:52:15', '2021-01-20 16:52:15'),
(750, 1, 'Gulistan', 1, '2021-01-20 16:52:27', '2021-01-20 16:52:27'),
(751, 1, 'Bongo Bazar', 1, '2021-01-20 16:52:47', '2021-01-20 16:52:47'),
(752, 1, 'Chankarpul', 1, '2021-01-20 16:53:00', '2021-01-20 16:53:00'),
(753, 1, 'Palashi', 1, '2021-01-20 17:07:59', '2021-01-20 17:07:59'),
(754, 1, 'Dhakeshwari', 1, '2021-01-20 17:12:52', '2021-01-20 17:12:52'),
(755, 1, 'Kamalapur', 1, '2021-01-20 17:13:05', '2021-01-20 17:13:05'),
(756, 1, 'Dainik Bangla Mor', 1, '2021-01-20 17:13:35', '2021-01-20 17:13:35'),
(757, 1, 'Fakirapul', 1, '2021-01-20 17:13:50', '2021-01-20 17:13:50'),
(758, 1, 'Kakrail', 1, '2021-01-20 17:14:06', '2021-01-20 17:14:06'),
(759, 1, 'Naya Paltan', 1, '2021-01-20 17:14:25', '2021-01-20 17:14:25'),
(760, 1, 'Press Club', 1, '2021-01-20 17:14:57', '2021-01-20 17:14:57'),
(761, 1, 'High Court', 1, '2021-01-20 17:15:20', '2021-01-20 17:15:20'),
(762, 1, 'Dhaka Medical', 1, '2021-01-20 17:15:44', '2021-01-20 17:15:44'),
(763, 1, 'Bongo Bondhu Avenue', 1, '2021-01-20 17:15:58', '2021-01-20 17:15:58'),
(764, 1, 'Kazi Nazrul Islam Avenue', 1, '2021-01-20 17:16:22', '2021-01-20 17:16:22'),
(765, 1, 'Shantibag', 1, '2021-01-20 17:17:23', '2021-01-20 17:17:23'),
(766, 1, 'Minto Road', 1, '2021-01-20 17:18:04', '2021-01-20 17:18:04'),
(767, 1, 'Old Elephant Road', 1, '2021-01-20 17:18:16', '2021-01-20 17:18:16'),
(768, 1, 'Eskaton Garden Road', 1, '2021-01-20 17:18:28', '2021-01-20 17:18:28'),
(769, 1, 'Eskaton', 1, '2021-01-20 17:18:42', '2021-01-20 17:18:42'),
(770, 1, 'Mouchak', 1, '2021-01-20 17:19:01', '2021-01-20 17:19:01'),
(771, 1, 'Malibag', 1, '2021-01-20 17:19:13', '2021-01-20 17:19:13'),
(772, 1, 'Shahbag', 1, '2021-01-20 17:19:33', '2021-01-20 17:19:33'),
(773, 1, 'Bashabo', 1, '2021-01-20 17:20:02', '2021-01-20 17:20:02'),
(774, 1, 'Middle Bashabo', 1, '2021-01-20 17:24:36', '2021-01-20 17:24:36'),
(775, 1, 'Goran', 1, '2021-01-20 17:25:10', '2021-01-20 17:25:10'),
(776, 1, 'Madartek', 1, '2021-01-20 17:25:21', '2021-01-20 17:25:21'),
(777, 1, 'Manik Nagar', 1, '2021-01-20 17:25:33', '2021-01-20 17:25:33'),
(778, 1, 'Banasree', 1, '2021-01-20 17:27:12', '2021-01-20 17:27:12'),
(779, 1, 'Meradia', 1, '2021-01-20 17:27:25', '2021-01-20 17:27:25'),
(780, 1, 'Khilbari Tek', 1, '2021-01-20 17:27:38', '2021-01-20 17:27:38'),
(781, 1, 'Bawaliapara', 1, '2021-01-20 17:27:50', '2021-01-20 17:27:50'),
(782, 1, 'Mughdapara', 1, '2021-01-20 17:28:01', '2021-01-20 17:28:01'),
(783, 1, 'Golapbag (Dhaka)', 1, '2021-01-20 17:28:14', '2021-01-20 17:28:14'),
(784, 1, 'Hatirjheel', 1, '2021-01-20 17:28:58', '2021-01-20 17:28:58'),
(785, 1, 'Banglamotor', 1, '2021-01-20 17:29:08', '2021-01-20 17:29:08'),
(786, 1, 'Paribag', 1, '2021-01-20 17:29:20', '2021-01-20 17:29:20'),
(787, 1, 'Bakshibazar', 1, '2021-01-20 17:29:31', '2021-01-20 17:29:31'),
(788, 1, 'Kathalbagan', 1, '2021-01-20 17:30:02', '2021-01-20 17:30:02'),
(789, 1, 'Malibagh Taltola', 1, '2021-01-20 17:30:14', '2021-01-20 17:30:14'),
(790, 1, 'Central Road', 1, '2021-01-20 17:30:25', '2021-01-20 17:30:25'),
(791, 1, 'Sabujbag', 1, '2021-01-20 17:30:38', '2021-01-20 17:30:38'),
(792, 1, 'Shiddheswari', 1, '2021-01-20 17:30:52', '2021-01-20 17:30:52'),
(793, 1, 'Shegunbagicha', 1, '2021-01-20 17:31:49', '2021-01-20 17:31:49'),
(794, 1, 'Babubazar', 1, '2021-01-20 17:32:09', '2021-01-20 17:32:09'),
(795, 1, 'Islampur(Dhaka)', 1, '2021-01-20 17:32:21', '2021-01-20 17:32:21'),
(796, 1, 'Imamgonj', 1, '2021-01-20 17:32:36', '2021-01-20 17:32:36'),
(797, 1, 'Nayabazar', 1, '2021-01-20 17:32:48', '2021-01-20 17:32:48'),
(798, 1, 'Zigatola', 1, '2021-01-20 17:33:01', '2021-01-20 17:33:01'),
(799, 1, 'Kalshi', 1, '2021-01-20 17:33:26', '2021-01-20 17:33:26'),
(800, 1, 'Dholaipar', 1, '2021-01-20 17:34:00', '2021-01-20 17:34:00'),
(801, 1, 'Monipuripara', 1, '2021-01-20 17:34:12', '2021-01-20 17:34:12'),
(802, 1, 'Bosila', 1, '2021-01-20 17:34:24', '2021-01-20 17:34:24'),
(803, 1, 'Shonir Akhra', 1, '2021-01-20 17:34:36', '2021-01-20 17:34:36'),
(804, 1, 'Bongshal', 1, '2021-01-20 17:34:59', '2021-01-20 17:34:59'),
(805, 1, 'Siddweswari', 1, '2021-01-20 17:35:11', '2021-01-20 17:35:11'),
(806, 1, 'Dokshingaon', 1, '2021-01-20 17:35:29', '2021-01-20 17:35:29'),
(807, 1, 'Joar Shahara', 1, '2021-01-20 17:35:40', '2021-01-20 17:35:40'),
(808, 1, 'Science Lab', 1, '2021-01-20 17:35:54', '2021-01-20 17:35:54'),
(809, 1, 'Sobhanbag', 1, '2021-01-20 17:36:07', '2021-01-20 17:36:07'),
(810, 1, 'ECB Chattar', 1, '2021-01-20 17:36:18', '2021-01-20 17:36:18'),
(811, 1, 'Armanitola', 1, '2021-01-20 17:36:36', '2021-01-20 17:36:36'),
(812, 1, 'Islambag', 1, '2021-01-20 17:36:48', '2021-01-20 17:36:48'),
(813, 1, 'Kamarpara', 1, '2021-01-20 17:37:02', '2021-01-20 17:37:02'),
(814, 1, 'Mitford', 1, '2021-01-20 17:37:13', '2021-01-20 17:37:13'),
(815, 1, 'Shakhari Bazar', 1, '2021-01-20 17:37:26', '2021-01-20 17:37:26'),
(816, 1, 'Katherpol', 1, '2021-01-20 17:37:38', '2021-01-20 17:37:38'),
(817, 1, 'Bangla Bazar', 1, '2021-01-20 17:38:20', '2021-01-20 17:38:20'),
(818, 1, 'Patuatuly', 1, '2021-01-20 17:38:32', '2021-01-20 17:38:32'),
(819, 1, 'Nandipara', 1, '2021-01-20 17:38:49', '2021-01-20 17:38:49'),
(820, 1, 'Nazira Bazar', 1, '2021-01-20 17:39:01', '2021-01-20 17:39:01'),
(821, 1, 'Gopibag', 1, '2021-01-20 17:39:21', '2021-01-20 17:39:21'),
(822, 1, 'Shwamibag', 1, '2021-01-20 17:39:35', '2021-01-20 17:39:35'),
(823, 1, 'Sadarghat (Dhaka)', 1, '2021-01-20 17:40:01', '2021-01-20 17:40:01'),
(824, 1, 'Kaltabazar', 1, '2021-01-20 17:40:13', '2021-01-20 17:40:13'),
(825, 1, 'Gandaria', 1, '2021-01-20 17:40:33', '2021-01-20 17:40:33'),
(826, 1, 'RayerBag', 1, '2021-01-20 17:40:45', '2021-01-20 17:40:45'),
(827, 1, 'Faridabad', 1, '2021-01-20 17:40:57', '2021-01-20 17:40:57'),
(828, 1, 'Matuail', 1, '2021-01-20 17:41:09', '2021-01-20 17:41:09'),
(829, 1, 'Donia', 1, '2021-01-20 17:41:19', '2021-01-20 17:41:19'),
(830, 1, 'Konapara', 1, '2021-01-20 17:41:40', '2021-01-20 17:41:40'),
(831, 1, 'Dhaka Uddyan', 1, '2021-01-20 17:41:55', '2021-01-20 17:41:55'),
(832, 1, 'Shekhertek', 1, '2021-01-20 17:42:07', '2021-01-20 17:42:07'),
(833, 1, 'CWH', 1, '2021-01-20 17:43:15', '2021-01-20 17:43:15'),
(834, 1, 'Mirpur Taltola', 1, '2021-01-20 17:43:28', '2021-01-20 17:43:28'),
(835, 1, 'Manda(Dhaka)', 1, '2021-01-20 17:44:03', '2021-01-20 17:44:03'),
(836, 1, 'Shahjahanpur (Dhaka)', 1, '2021-01-20 17:44:31', '2021-01-20 17:44:31'),
(837, 1, 'Haterrjheel', 1, '2021-01-20 17:44:43', '2021-01-20 17:44:43'),
(838, 1, 'Dhaka uddan', 1, '2021-01-20 17:44:54', '2021-01-20 17:44:54'),
(839, 1, 'Chad Uddan', 1, '2021-01-20 17:45:08', '2021-01-20 17:45:08'),
(840, 1, 'Mohammadia Housing', 1, '2021-01-20 17:45:23', '2021-01-20 17:45:23'),
(841, 1, 'Ring Road', 1, '2021-01-20 17:48:31', '2021-01-20 17:48:31'),
(842, 1, 'Tajmahal Road', 1, '2021-01-20 17:48:46', '2021-01-20 17:48:46'),
(843, 1, 'Nurjahan Road', 1, '2021-01-20 17:49:42', '2021-01-20 17:49:42'),
(844, 1, 'Rajia Sultana Road', 1, '2021-01-20 17:49:52', '2021-01-20 17:49:52'),
(845, 1, 'Goaltek', 1, '2021-01-20 17:50:36', '2021-01-20 17:50:36'),
(846, 1, 'Chalabon', 1, '2021-01-20 17:50:47', '2021-01-20 17:50:47'),
(847, 1, 'Azampur (East)', 1, '2021-01-20 17:51:06', '2021-01-20 17:51:06'),
(848, 1, 'Nalbhog', 1, '2021-01-20 17:51:17', '2021-01-20 17:51:17'),
(849, 1, 'Azampur (West)', 1, '2021-01-20 17:51:30', '2021-01-20 17:51:30'),
(850, 1, 'Phulbaria', 1, '2021-01-20 17:51:41', '2021-01-20 17:51:41'),
(851, 1, 'Bhatuliya', 1, '2021-01-20 17:51:59', '2021-01-20 17:51:59'),
(852, 1, 'Bamnartek', 1, '2021-01-20 17:52:11', '2021-01-20 17:52:11'),
(853, 1, 'Turag', 1, '2021-01-20 17:52:25', '2021-01-20 17:52:25'),
(854, 1, 'Kallanpur', 1, '2021-01-20 17:52:35', '2021-01-20 17:52:35'),
(855, 1, 'Lalkuthi', 1, '2021-01-20 17:52:47', '2021-01-20 17:52:47'),
(856, 1, 'Tolarbag', 1, '2021-01-20 17:53:00', '2021-01-20 17:53:00'),
(857, 1, 'Paikpara', 1, '2021-01-20 17:53:35', '2021-01-20 17:53:35'),
(858, 1, 'Pirerbag', 1, '2021-01-20 17:53:45', '2021-01-20 17:53:45'),
(859, 1, 'Taltola', 1, '2021-01-20 17:54:26', '2021-01-20 17:54:26'),
(860, 1, 'MES Colony', 1, '2021-01-20 17:54:38', '2021-01-20 17:54:38'),
(861, 1, 'Zia Colony', 1, '2021-01-20 17:54:49', '2021-01-20 17:54:49'),
(862, 1, 'Ajiz Market', 1, '2021-01-20 17:55:16', '2021-01-20 17:55:16'),
(863, 1, 'Aga Nagar', 1, '2021-01-20 17:55:28', '2021-01-20 17:55:28'),
(864, 1, 'Kunipara', 1, '2021-01-20 17:55:40', '2021-01-20 17:55:40'),
(865, 1, 'Babli Masjid', 1, '2021-01-20 17:55:54', '2021-01-20 17:55:54'),
(866, 1, 'Kaderabad Housing', 1, '2021-01-20 17:56:06', '2021-01-20 17:56:06'),
(867, 1, 'Boro Bari', 1, '2021-01-20 17:56:24', '2021-01-20 17:56:24'),
(868, 1, 'Board Bazar', 1, '2021-01-20 17:56:37', '2021-01-20 17:56:37'),
(869, 1, 'Kamarjuri', 1, '2021-01-20 17:56:52', '2021-01-20 17:56:52'),
(870, 1, 'Dattapara', 1, '2021-01-20 17:57:05', '2021-01-20 17:57:05'),
(871, 1, 'Ershadnagar', 1, '2021-01-20 17:57:19', '2021-01-20 17:57:19'),
(872, 1, 'Sataish', 1, '2021-01-20 17:57:32', '2021-01-20 17:57:32'),
(873, 1, 'Nurer Chala', 1, '2021-01-20 17:58:01', '2021-01-20 17:58:01'),
(874, 1, 'Bawaila Para', 1, '2021-01-20 17:58:13', '2021-01-20 17:58:13'),
(875, 1, 'Satarkul', 1, '2021-01-20 17:58:25', '2021-01-20 17:58:25'),
(876, 1, 'Khilbar Tek', 1, '2021-01-20 17:58:38', '2021-01-20 17:58:38'),
(877, 1, 'Buddho Mondir', 1, '2021-01-20 17:58:51', '2021-01-20 17:58:51'),
(878, 1, 'Sipahibag', 1, '2021-01-20 17:59:03', '2021-01-20 17:59:03'),
(879, 1, 'Eastern Housing', 1, '2021-01-20 17:59:24', '2021-01-20 17:59:24'),
(880, 1, 'Teskunipara', 1, '2021-01-20 17:59:37', '2021-01-20 17:59:37'),
(881, 1, 'DHAKA TENARI MORE', 1, '2021-01-20 17:59:50', '2021-01-20 17:59:50'),
(882, 1, 'Shahidnagar', 1, '2021-01-20 18:00:03', '2021-01-20 18:00:03'),
(883, 1, 'Jhigatola', 1, '2021-01-20 18:00:19', '2021-01-20 18:00:19'),
(884, 1, 'Polashi', 1, '2021-01-20 18:00:31', '2021-01-20 18:00:31'),
(885, 1, 'Satmoshjid Road', 1, '2021-01-20 18:00:44', '2021-01-20 18:00:44'),
(886, 1, 'Shukrabad', 1, '2021-01-20 18:01:58', '2021-01-20 18:01:58'),
(887, 1, 'BNP Bazar', 1, '2021-01-20 18:02:18', '2021-01-20 18:02:18'),
(888, 1, 'Kalachandpur', 1, '2021-01-20 18:03:10', '2021-01-20 18:03:10'),
(889, 1, 'Jogonnathpur', 1, '2021-01-20 18:03:53', '2021-01-20 18:03:53'),
(890, 1, 'Kuratuli', 1, '2021-01-20 18:04:30', '2021-01-20 18:04:30'),
(891, 1, 'Alatunnessa School Road', 1, '2021-01-20 18:04:46', '2021-01-20 18:04:46'),
(892, 1, 'Purbo Rampura', 1, '2021-01-20 18:04:58', '2021-01-20 18:04:58'),
(893, 1, 'Bou Bazar', 1, '2021-01-20 18:05:41', '2021-01-20 18:05:41'),
(894, 1, 'Chairman Goli', 1, '2021-01-20 18:05:54', '2021-01-20 18:05:54'),
(895, 2, 'Confidence Tower, Jhilpar', 1, '2021-01-20 18:06:09', '2021-01-20 18:06:09'),
(896, 1, 'Fuji Trade Center', 1, '2021-01-20 18:06:22', '2021-01-20 18:06:22'),
(897, 1, 'Khil Barirtek', 1, '2021-01-20 18:06:36', '2021-01-20 18:06:36'),
(898, 1, 'Korail', 1, '2021-01-20 18:06:48', '2021-01-20 18:06:48'),
(899, 1, 'Mahanogor', 1, '2021-01-20 18:07:10', '2021-01-20 18:07:10'),
(900, 1, 'Nimtola', 1, '2021-01-20 18:07:34', '2021-01-20 18:07:34'),
(901, 1, 'Nurerchala', 1, '2021-01-20 18:07:46', '2021-01-20 18:07:46'),
(902, 1, 'Pastola Bazar', 1, '2021-01-20 18:07:58', '2021-01-20 18:07:58'),
(903, 1, 'Poschim Badda', 1, '2021-01-20 18:08:13', '2021-01-20 18:08:13'),
(904, 1, 'Purbo Badda', 1, '2021-01-20 18:08:26', '2021-01-20 18:08:26'),
(905, 1, 'Sat-tola Bazar', 1, '2021-01-20 18:08:37', '2021-01-20 18:08:37'),
(906, 1, 'Shaheenbagh', 1, '2021-01-20 18:08:55', '2021-01-20 18:08:55'),
(907, 1, 'Subastu', 1, '2021-01-20 18:09:06', '2021-01-20 18:09:06'),
(908, 1, 'Satrasta', 1, '2021-01-20 18:09:21', '2021-01-20 18:09:21'),
(909, 1, 'Tekpara Adorsonagor', 1, '2021-01-20 18:09:31', '2021-01-20 18:09:31'),
(910, 1, 'Uttar Badda', 1, '2021-01-20 18:09:42', '2021-01-20 18:09:42'),
(911, 1, 'Wireless', 1, '2021-01-20 18:09:53', '2021-01-20 18:09:53'),
(912, 1, 'Solmaid', 1, '2021-01-20 18:10:05', '2021-01-20 18:10:05'),
(913, 1, '300 Feet', 1, '2021-01-20 18:10:18', '2021-01-20 18:10:18'),
(914, 1, 'Mirhazirbagh', 1, '2021-01-20 18:10:29', '2021-01-20 18:10:29'),
(915, 1, 'Mahut Tuli', 1, '2021-01-20 18:10:39', '2021-01-20 18:10:39'),
(916, 1, 'Alubazar', 1, '2021-01-20 18:10:50', '2021-01-20 18:10:50'),
(917, 1, 'Badam Toli', 1, '2021-01-20 18:11:00', '2021-01-20 18:11:00'),
(918, 1, 'Chamelibag', 1, '2021-01-20 18:11:12', '2021-01-20 18:11:12'),
(919, 1, 'Dholaikhal', 1, '2021-01-20 18:11:24', '2021-01-20 18:11:24'),
(920, 1, 'Doyagonj', 1, '2021-01-20 18:11:32', '2021-01-20 18:11:32'),
(921, 1, 'Farashgong', 1, '2021-01-20 18:11:48', '2021-01-20 18:11:48'),
(922, 1, 'Dholpur', 1, '2021-01-20 18:11:59', '2021-01-20 18:11:59'),
(923, 1, 'Kodomtoli', 1, '2021-01-20 18:12:08', '2021-01-20 18:12:08'),
(924, 1, 'Kotwali (Puran Dhaka)', 1, '2021-01-20 18:12:19', '2021-01-20 18:12:19'),
(925, 1, 'Railway Colony', 1, '2021-01-20 18:12:29', '2021-01-20 18:12:29'),
(926, 1, 'Rajar Dewri', 1, '2021-01-20 18:12:42', '2021-01-20 18:12:42'),
(927, 1, 'Sat rowja', 1, '2021-01-20 18:13:08', '2021-01-20 18:13:08'),
(928, 1, 'Tantibazar', 1, '2021-01-20 18:13:20', '2021-01-20 18:13:20'),
(929, 1, 'Rosulbagh', 1, '2021-01-20 18:13:31', '2021-01-20 18:13:31'),
(930, 1, 'College Gatev', 1, '2021-01-20 18:13:51', '2021-01-20 18:13:51'),
(931, 1, 'Badekomelosshor', 1, '2021-01-20 18:14:04', '2021-01-20 18:14:04'),
(932, 1, 'Rail Station', 1, '2021-01-20 18:14:26', '2021-01-20 18:14:26'),
(933, 1, 'Uttarkhan Mazar', 1, '2021-01-20 18:14:36', '2021-01-20 18:14:36'),
(934, 1, 'Dakshinkhan Bazar', 1, '2021-01-20 18:15:10', '2021-01-20 18:15:10'),
(935, 1, 'Ranavola', 1, '2021-01-20 18:15:43', '2021-01-20 18:15:43'),
(936, 1, 'Joynal Market', 1, '2021-01-20 18:15:55', '2021-01-20 18:15:55'),
(937, 1, 'Johura Market', 1, '2021-01-20 18:16:06', '2021-01-20 18:16:06'),
(938, 1, 'Habib Market', 1, '2021-01-20 18:16:17', '2021-01-20 18:16:17'),
(939, 1, 'BDR Market-House Building', 1, '2021-01-20 18:16:32', '2021-01-20 18:16:32'),
(940, 1, 'BDR Market-Sector 6', 1, '2021-01-20 18:16:44', '2021-01-20 18:16:44'),
(941, 1, 'Moinartek', 1, '2021-01-20 18:16:56', '2021-01-20 18:16:56'),
(942, 1, 'Atipara', 1, '2021-01-20 18:18:16', '2021-01-20 18:18:16'),
(943, 1, 'Kot Bari', 1, '2021-01-20 18:18:34', '2021-01-20 18:18:34'),
(944, 1, 'Abdullahpur', 1, '2021-01-20 18:18:44', '2021-01-20 18:18:44'),
(945, 1, 'Mollartek', 1, '2021-01-20 18:19:02', '2021-01-20 18:19:02'),
(946, 1, 'Gawair', 1, '2021-01-20 18:19:17', '2021-01-20 18:19:17'),
(947, 1, 'Kosaibari', 1, '2021-01-20 18:19:28', '2021-01-20 18:19:28'),
(948, 1, 'Prembagan', 1, '2021-01-20 18:19:40', '2021-01-20 18:19:40'),
(949, 1, 'Kachkura', 1, '2021-01-20 18:19:52', '2021-01-20 18:19:52'),
(950, 1, 'Helal Market', 1, '2021-01-20 18:20:08', '2021-01-20 18:20:08'),
(951, 1, 'Masterpara', 1, '2021-01-20 18:20:23', '2021-01-20 18:20:23'),
(952, 1, 'Munda', 1, '2021-01-20 18:20:34', '2021-01-20 18:20:34'),
(953, 1, 'Namapara-Khilkhet', 1, '2021-01-20 18:20:49', '2021-01-20 18:20:49'),
(954, 1, 'Ahalia-Uttara', 1, '2021-01-20 18:21:01', '2021-01-20 18:21:01'),
(955, 1, 'Ainusbag-Uttara', 1, '2021-01-20 18:21:13', '2021-01-20 18:21:13'),
(956, 1, 'Diabari', 1, '2021-01-20 18:21:25', '2021-01-20 18:21:25'),
(957, 1, 'Habib Market-Uttara', 1, '2021-01-20 18:25:29', '2021-01-20 18:25:29'),
(958, 1, 'Pakuria-Uttara', 1, '2021-01-20 18:26:09', '2021-01-20 18:26:09'),
(959, 1, 'Aftab Nagar', 1, '2021-01-20 18:27:29', '2021-01-20 18:27:29'),
(960, 1, 'Gulbagh', 1, '2021-01-20 18:27:40', '2021-01-20 18:27:40'),
(961, 1, 'Meradiya Bazar', 1, '2021-01-20 18:27:51', '2021-01-20 18:27:51'),
(962, 1, 'Mirbagh', 1, '2021-01-20 18:28:03', '2021-01-20 18:28:03'),
(963, 1, 'Modhubagh', 1, '2021-01-20 18:28:20', '2021-01-20 18:28:20'),
(964, 1, 'Rampura TV center', 1, '2021-01-20 18:28:30', '2021-01-20 18:28:30'),
(965, 1, 'TV gate', 1, '2021-01-20 18:28:48', '2021-01-20 18:28:48'),
(966, 1, 'Ulan road', 1, '2021-01-20 18:28:56', '2021-01-20 18:28:56'),
(967, 1, 'Gudaraghat-Mirpur', 1, '2021-01-20 18:29:08', '2021-01-20 18:29:08'),
(968, 1, 'Namapara-Mirpur', 1, '2021-01-20 18:29:20', '2021-01-20 18:29:20'),
(969, 1, 'Technical', 1, '2021-01-20 18:29:44', '2021-01-20 18:29:44'),
(970, 1, 'Beribadh-Mirpur', 1, '2021-01-20 18:30:02', '2021-01-20 18:30:02'),
(971, 1, 'Buddhijibi Road', 1, '2021-01-20 18:30:13', '2021-01-20 18:30:13'),
(972, 1, 'Rupnagor', 1, '2021-01-20 18:30:37', '2021-01-20 18:30:37'),
(973, 66, 'Savar Cantonment', 1, '2021-01-21 19:56:28', '2021-01-21 19:56:28'),
(974, 66, 'Kalatia', 1, '2021-01-21 19:56:47', '2021-01-21 19:56:47'),
(975, 66, 'Kathuria', 1, '2021-01-21 19:57:15', '2021-01-21 19:57:15'),
(976, 66, 'Goljarbag', 1, '2021-01-21 19:57:30', '2021-01-21 19:57:30'),
(977, 66, 'Nazirabag', 1, '2021-01-21 19:57:45', '2021-01-21 19:57:45'),
(978, 66, 'Nazarganj', 1, '2021-01-21 19:58:09', '2021-01-21 19:58:09'),
(979, 66, 'Zinzira', 1, '2021-01-21 19:58:26', '2021-01-21 19:58:26'),
(980, 66, 'Auchpara', 1, '2021-01-21 19:58:40', '2021-01-21 19:58:40'),
(981, 66, 'Cherag Ali', 1, '2021-01-21 19:58:54', '2021-01-21 19:58:54'),
(982, 66, 'Hasnabad', 1, '2021-01-21 19:59:48', '2021-01-21 19:59:48'),
(983, 66, 'Signboard', 1, '2021-01-21 20:00:01', '2021-01-21 20:00:01'),
(984, 65, 'Bondor (Chittagong)', 1, '2021-01-21 20:05:12', '2021-01-21 20:08:42'),
(985, 14, 'Chagalnaiya', 1, '2021-01-23 18:29:56', '2021-01-23 18:29:56'),
(986, 35, 'Terokhada', 1, '2021-01-24 15:08:26', '2021-01-24 15:08:26'),
(987, 35, 'Khulna sadar', 1, '2021-01-24 15:13:11', '2021-01-24 15:13:11'),
(988, 17, 'Daganbhuiya', 1, '2021-01-24 20:27:02', '2021-01-24 20:27:02'),
(989, 11, 'Kornelhat', 1, '2021-01-31 22:15:34', '2021-01-31 22:15:34'),
(990, 43, 'Sadar', 1, '2021-02-02 20:11:12', '2021-02-02 20:11:12'),
(991, 63, 'Chhatak', 1, '2021-06-13 08:26:10', '2021-06-13 08:27:03');

-- --------------------------------------------------------

--
-- Table structure for table `sub_sub_categories`
--

CREATE TABLE `sub_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `discount_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_sub_categories`
--

INSERT INTO `sub_sub_categories` (`id`, `name`, `slug`, `category_id`, `sub_category_id`, `image`, `discount`, `status`, `created_at`, `updated_at`, `discount_type`) VALUES
(1, 'smart watch', 'smart-watch-48', 1, 2, NULL, NULL, 1, '2021-06-12 11:03:46', '2021-06-12 11:34:19', NULL),
(2, 'Digital Clock', 'digital-clock-39', 1, 2, NULL, NULL, 1, '2021-06-14 11:16:25', '2021-06-14 11:16:25', NULL),
(3, 'Stylish T-shirt', 'stylish-t-shirt-58', 1, 3, NULL, NULL, 1, '2021-08-01 21:54:17', '2021-08-01 21:54:17', NULL),
(4, 'Printed T-shirt', 'printed-t-shirt-91', 1, 3, NULL, NULL, 1, '2021-08-01 21:55:18', '2021-08-01 21:55:18', NULL),
(5, 'Solid Color T-shirt', 'solid-color-t-shirt-74', 1, 3, NULL, NULL, 1, '2021-08-01 21:55:40', '2021-08-01 21:55:40', NULL),
(6, 'Couple T-shirt', 'couple-t-shirt-77', 1, 3, NULL, NULL, 1, '2021-08-01 21:56:05', '2021-08-01 21:56:05', NULL),
(7, 'Head Phone', 'head-phone-90', 7, 9, NULL, NULL, 1, '2021-08-01 21:57:22', '2021-08-01 21:57:22', NULL),
(8, 'Power Bank', 'power-bank-81', 7, 9, NULL, NULL, 1, '2021-08-01 21:58:27', '2021-08-01 21:58:27', NULL),
(9, 'Charger', 'charger-25', 7, 10, NULL, NULL, 1, '2021-08-01 21:58:54', '2021-08-01 21:58:54', NULL),
(10, 'Laptop', 'laptop-99', 7, 10, NULL, NULL, 1, '2021-08-01 21:59:13', '2021-08-01 21:59:13', NULL),
(11, 'Desktop', 'desktop-38', 7, 10, NULL, NULL, 1, '2021-08-01 21:59:32', '2021-08-01 21:59:32', NULL),
(12, 'Luxury Panjabi', 'luxury-panjabi-73', 1, 15, NULL, NULL, 1, '2021-08-01 22:18:22', '2021-08-01 22:18:22', NULL),
(13, 'Kabli', 'kabli-92', 1, 15, NULL, NULL, 1, '2021-08-01 22:19:03', '2021-08-01 22:19:03', NULL),
(14, 'Premium', 'premium-87', 1, 15, NULL, NULL, 1, '2021-08-01 22:19:21', '2021-08-01 22:19:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `company_name`, `phone`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Shibbir Ahmad', 'MIT', '01737481778', 'shibbirahmad920229@gmail.com', 1, '2021-06-20 15:32:40', '2021-06-20 15:33:33');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_payments`
--

CREATE TABLE `supplier_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `balance_id` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier_payments`
--

INSERT INTO `supplier_payments` (`id`, `supplier_id`, `amount`, `balance_id`, `created_at`, `updated_at`) VALUES
(9, 1, 1200, '1', '2021-07-10 03:17:05', '2021-07-10 03:17:05'),
(10, 1, 500, '10', '2021-07-10 04:19:30', '2021-07-10 04:19:30'),
(11, 1, 500, '1', '2021-07-10 05:03:09', '2021-07-10 05:03:09'),
(12, 1, 5000, '2', '2021-07-13 13:05:13', '2021-07-13 13:05:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT 1,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `city_id`, `address`, `email_verified_at`, `password`, `role`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'shopolox', 's@admin.com', '01759416979', NULL, NULL, NULL, '$2y$10$/3BPsXwWANWgyMSH1rNXv.zEwW017/vwoNDadA.s6f.7zv9Gydp3e', 2, 'user.png', NULL, NULL, NULL),
(2, 'shibbir ahmad', 'shopolox@gmail.com', '01737481778', 12, 'Dhaka', NULL, '$2y$10$1X2JIrzwuRaWmtgisIgxferc8KGdPM0UtQlXKNTRuT4fdl2wER6mO', 1, 'user.png', NULL, '2021-08-18 14:10:52', '2021-09-24 09:07:06'),
(3, 'Shibbir Ahmad', 'shibbirahmad920229@gmail.com', '', NULL, NULL, NULL, '$2y$10$gvkIvnnf4lUxS2en2c5Ezuwjy4RBf/a5xvTDkyxt/gh7.FPS0/BNO', 1, 'user.png', NULL, '2021-08-18 09:19:37', '2021-08-18 09:19:37');

-- --------------------------------------------------------

--
-- Table structure for table `variants`
--

CREATE TABLE `variants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `variants`
--

INSERT INTO `variants` (`id`, `name`, `attribute_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'S', 1, 1, '2020-11-09 10:53:10', '2020-11-09 10:53:10'),
(2, 'L', 1, 1, '2020-11-09 10:53:21', '2020-11-09 10:53:21'),
(3, 'M', 1, 1, '2020-11-09 10:53:31', '2020-11-09 10:53:31'),
(4, 'XL', 1, 1, '2020-11-09 10:54:19', '2020-11-09 10:54:19'),
(5, 'XXL', 1, 1, '2020-11-09 10:54:26', '2020-11-09 10:54:26'),
(30, 'Red', 2, 1, '2021-06-16 10:55:57', '2021-08-05 14:02:48'),
(31, 'Black', 2, 1, '2021-06-16 10:56:18', '2021-08-05 14:02:59'),
(32, '5 gm', 3, 1, '2021-06-16 10:57:03', '2021-06-16 10:57:03'),
(33, '500 gm', 3, 1, '2021-07-13 13:13:51', '2021-07-13 13:13:51'),
(34, 'White', 2, 1, '2021-08-01 22:08:56', '2021-08-01 22:08:56'),
(35, 'Navy Blue', 2, 1, '2021-08-01 22:10:02', '2021-08-01 22:10:02'),
(36, '1200 gm', 3, 1, '2021-08-01 22:10:46', '2021-08-01 22:10:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attributes_name_unique` (`name`);

--
-- Indexes for table `balances`
--
ALTER TABLE `balances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`) USING HASH,
  ADD UNIQUE KEY `categories_slug_unique` (`slug`) USING HASH,
  ADD KEY `categories_id_index` (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cupons_code_unique` (`code`);

--
-- Indexes for table `credits`
--
ALTER TABLE `credits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `debits`
--
ALTER TABLE `debits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_payments`
--
ALTER TABLE `order_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otp_verifications`
--
ALTER TABLE `otp_verifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_name_unique` (`name`) USING HASH,
  ADD UNIQUE KEY `pages_slug_unique` (`slug`) USING HASH,
  ADD KEY `pages_id_index` (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sub_categories`
--
ALTER TABLE `product_sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sub_sub_categories`
--
ALTER TABLE `product_sub_sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_items`
--
ALTER TABLE `purchase_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_products`
--
ALTER TABLE `request_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipment_infos`
--
ALTER TABLE `shipment_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_cities`
--
ALTER TABLE `sub_cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_payments`
--
ALTER TABLE `supplier_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `balances`
--
ALTER TABLE `balances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `credits`
--
ALTER TABLE `credits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `debits`
--
ALTER TABLE `debits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_payments`
--
ALTER TABLE `order_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `otp_verifications`
--
ALTER TABLE `otp_verifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `product_sub_categories`
--
ALTER TABLE `product_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `product_sub_sub_categories`
--
ALTER TABLE `product_sub_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_items`
--
ALTER TABLE `purchase_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request_products`
--
ALTER TABLE `request_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipment_infos`
--
ALTER TABLE `shipment_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sub_cities`
--
ALTER TABLE `sub_cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=992;

--
-- AUTO_INCREMENT for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier_payments`
--
ALTER TABLE `supplier_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `variants`
--
ALTER TABLE `variants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
