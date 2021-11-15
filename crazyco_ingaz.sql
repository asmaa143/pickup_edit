-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 15, 2021 at 08:36 AM
-- Server version: 10.2.38-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crazyco_ingaz`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(10) UNSIGNED NOT NULL,
  `store_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `store_id`, `created_at`, `updated_at`) VALUES
(2, 4, '2021-10-25 19:27:23', '2021-10-25 19:27:23');

-- --------------------------------------------------------

--
-- Table structure for table `about_translations`
--

CREATE TABLE `about_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `about_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about_translations`
--

INSERT INTO `about_translations` (`id`, `locale`, `text`, `about_id`, `created_at`, `updated_at`) VALUES
(3, 'en', 'qsadasddsds', 2, '2021-10-25 19:27:23', '2021-10-25 19:27:23'),
(4, 'ar', 'sddsds', 2, '2021-10-25 19:27:23', '2021-10-25 19:27:23');

-- --------------------------------------------------------

--
-- Table structure for table `adds`
--

CREATE TABLE `adds` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` text DEFAULT NULL,
  `default_price` int(11) DEFAULT 0,
  `product_id` int(11) DEFAULT NULL,
  `link` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `store_id` int(11) DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adds`
--

INSERT INTO `adds` (`id`, `image`, `default_price`, `product_id`, `link`, `created_at`, `updated_at`, `store_id`, `category_id`) VALUES
(18, 'uploads/adds/1635015769.png', 121, NULL, NULL, '2021-10-23 17:02:49', '2021-10-23 17:02:49', 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `adds_translations`
--

CREATE TABLE `adds_translations` (
  `id` int(11) NOT NULL,
  `adds_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `locale` varchar(191) NOT NULL,
  `title` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adds_translations`
--

INSERT INTO `adds_translations` (`id`, `adds_id`, `created_at`, `updated_at`, `locale`, `title`) VALUES
(35, 18, '2021-10-23 17:02:49', '2021-10-23 17:02:49', 'en', 'kn'),
(36, 18, '2021-10-23 17:02:49', '2021-10-23 17:02:49', 'ar', 'bj');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` int(10) UNSIGNED NOT NULL,
  `lat` double DEFAULT NULL,
  `lon` double DEFAULT NULL,
  `zone_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `state_id` int(10) UNSIGNED DEFAULT NULL,
  `city_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `lat`, `lon`, `zone_id`, `created_at`, `updated_at`, `state_id`, `city_id`) VALUES
(5, 30.174889715539, 31.023220474609, 4, '2021-10-10 18:47:13', '2021-10-10 18:47:13', NULL, NULL),
(6, 30.164204305251, 31.106304581055, 4, '2021-10-10 18:47:13', '2021-10-10 18:47:13', NULL, NULL),
(7, 30.053720619782, 31.067852432617, 4, '2021-10-10 18:47:13', '2021-10-10 18:47:13', NULL, NULL),
(8, 30.174889715539, 31.023220474609, 4, '2021-10-10 18:47:13', '2021-10-10 18:47:13', NULL, NULL),
(9, 29.963757650288, 30.888637955078, 5, '2021-10-18 19:11:32', '2021-10-18 19:11:32', NULL, NULL),
(10, 30.012524974754, 31.178402359375, 5, '2021-10-18 19:11:32', '2021-10-18 19:11:32', NULL, NULL),
(11, 29.810162937014, 31.164669449219, 5, '2021-10-18 19:11:32', '2021-10-18 19:11:32', NULL, NULL),
(12, 29.963757650288, 30.888637955078, 5, '2021-10-18 19:11:33', '2021-10-18 19:11:33', NULL, NULL),
(13, 30.172198689138, 30.988888199219, 6, '2021-10-24 18:26:39', '2021-10-24 18:26:39', NULL, NULL),
(14, 30.110443095355, 31.113857681641, 6, '2021-10-24 18:26:39', '2021-10-24 18:26:39', NULL, NULL),
(15, 29.984437125371, 31.003994400391, 6, '2021-10-24 18:26:39', '2021-10-24 18:26:39', NULL, NULL),
(16, 30.172198689138, 30.988888199219, 6, '2021-10-24 18:26:40', '2021-10-24 18:26:40', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `callcenter_order_address`
--

CREATE TABLE `callcenter_order_address` (
  `id` int(11) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `alternate_phone` varchar(191) DEFAULT NULL,
  `city` varchar(191) DEFAULT NULL,
  `state` varchar(191) DEFAULT NULL,
  `area` varchar(191) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `type_address` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `callcenter_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `callcenter_order_address`
--

INSERT INTO `callcenter_order_address` (`id`, `name`, `phone`, `alternate_phone`, `city`, `state`, `area`, `address`, `type_address`, `created_at`, `updated_at`, `callcenter_id`, `store_id`) VALUES
(1, 'name', '01090478832', '01090478832', 'city', 'state', 'area', 'address', NULL, '2021-10-19 12:46:39', '2021-10-19 12:46:39', 1, 1),
(2, 'name', '01090478832', '01090478832', 'city', 'state', 'area', 'address', NULL, '2021-10-19 12:50:59', '2021-10-19 12:50:59', 1, 1),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-20 07:47:30', '2021-10-20 07:47:30', 1, 1),
(4, 'name', '01090478832', '01090478832', 'city', 'state', 'area', 'address', NULL, '2021-10-20 07:49:35', '2021-10-20 07:49:35', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `call_centers`
--

CREATE TABLE `call_centers` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `device_token` text DEFAULT NULL,
  `device_id` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `store_id` int(11) NOT NULL,
  `phone_verify` int(11) NOT NULL DEFAULT 0,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `call_centers`
--

INSERT INTO `call_centers` (`id`, `name`, `phone`, `password`, `device_token`, `device_id`, `created_at`, `updated_at`, `store_id`, `phone_verify`, `image`) VALUES
(1, 'driver', '01090478832', '$2y$10$BDxu9Zgh3nWPi0XRdQ1qEO6IGHYIrXktWL9/YmHjGdGxbw1pLN5pm', NULL, NULL, '2021-10-19 09:48:57', '2021-10-19 09:49:13', 1, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `customer_id` smallint(5) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `store_id` int(11) NOT NULL,
  `coupon_id` int(11) DEFAULT NULL,
  `notes` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `callcenter_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `quantity`, `customer_id`, `created_at`, `updated_at`, `store_id`, `coupon_id`, `notes`, `callcenter_id`) VALUES
(12, 26, 2, 3, '2021-10-26 21:32:14', '2021-10-26 21:57:40', 4, NULL, 'this test for cart', NULL),
(13, 26, 1, 4, '2021-10-26 21:51:58', '2021-10-26 21:51:58', 4, NULL, 'this test for cart', NULL),
(14, 43, 1, 3, '2021-10-27 09:26:56', '2021-10-27 09:26:56', 4, NULL, NULL, NULL),
(15, 43, 2, 5, '2021-10-28 14:18:31', '2021-11-03 01:26:18', 4, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart_product_extra`
--

CREATE TABLE `cart_product_extra` (
  `id` int(11) NOT NULL,
  `extra_id` int(11) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cart_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_product_extra`
--

INSERT INTO `cart_product_extra` (`id`, `extra_id`, `type`, `created_at`, `updated_at`, `cart_id`) VALUES
(3, 41, NULL, '2021-10-26 21:32:14', '2021-10-26 21:32:14', 12),
(4, 48, NULL, '2021-10-26 21:32:14', '2021-10-26 21:32:14', 12),
(5, 41, NULL, '2021-10-26 21:51:58', '2021-10-26 21:51:58', 13),
(6, 48, NULL, '2021-10-26 21:51:58', '2021-10-26 21:51:58', 13);

-- --------------------------------------------------------

--
-- Table structure for table `cart_product_extradetails`
--

CREATE TABLE `cart_product_extradetails` (
  `id` int(11) NOT NULL,
  `cartproductextra_id` int(11) NOT NULL,
  `extra_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `extradetail_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_product_extradetails`
--

INSERT INTO `cart_product_extradetails` (`id`, `cartproductextra_id`, `extra_id`, `cart_id`, `extradetail_id`, `created_at`, `updated_at`) VALUES
(5, 3, 41, 12, 34, '2021-10-26 21:32:14', '2021-10-26 21:32:14'),
(6, 3, 41, 12, 40, '2021-10-26 21:32:14', '2021-10-26 21:32:14'),
(7, 4, 48, 12, 34, '2021-10-26 21:32:14', '2021-10-26 21:32:14'),
(8, 4, 48, 12, 40, '2021-10-26 21:32:14', '2021-10-26 21:32:14'),
(9, 5, 41, 13, 34, '2021-10-26 21:51:58', '2021-10-26 21:51:58'),
(10, 5, 41, 13, 40, '2021-10-26 21:51:58', '2021-10-26 21:51:58'),
(11, 6, 48, 13, 34, '2021-10-26 21:51:58', '2021-10-26 21:51:58'),
(12, 6, 48, 13, 40, '2021-10-26 21:51:58', '2021-10-26 21:51:58');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `store_id` int(10) UNSIGNED DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `store_id`, `image`) VALUES
(4, '2021-10-17 07:46:09', '2021-10-17 07:52:16', 4, 'uploads/categories/1634464336.png'),
(5, '2021-10-22 09:30:59', '2021-10-22 09:31:00', 4, 'uploads/categories/1634902260.png');

-- --------------------------------------------------------

--
-- Table structure for table `category_translations`
--

CREATE TABLE `category_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_translations`
--

INSERT INTO `category_translations` (`id`, `title`, `locale`, `category_id`, `created_at`, `updated_at`) VALUES
(5, 'حلوياتen', 'en', 4, '2021-10-17 07:46:09', '2021-10-17 07:46:09'),
(6, 'حلوياتar', 'ar', 4, '2021-10-17 07:46:10', '2021-10-17 07:46:10'),
(7, 'مشويات', 'en', 5, '2021-10-22 09:31:00', '2021-10-22 09:31:00'),
(8, 'مشويات', 'ar', 5, '2021-10-22 09:31:00', '2021-10-22 09:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `state_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `state_id`, `created_at`, `updated_at`) VALUES
(2, 1, '2021-10-09 18:54:24', '2021-10-09 18:54:24'),
(4, 1, '2021-10-18 18:33:31', '2021-10-18 18:33:31');

-- --------------------------------------------------------

--
-- Table structure for table `city_translations`
--

CREATE TABLE `city_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city_translations`
--

INSERT INTO `city_translations` (`id`, `title`, `locale`, `city_id`, `created_at`, `updated_at`) VALUES
(3, 'mansoura', 'en', 2, '2021-10-09 18:54:24', '2021-10-09 19:01:09'),
(4, 'المنصوره', 'ar', 2, '2021-10-09 18:54:25', '2021-10-09 19:01:09'),
(7, 'سندوب', 'en', 4, '2021-10-18 18:33:31', '2021-10-18 18:33:31'),
(8, 'سندوب', 'ar', 4, '2021-10-18 18:33:31', '2021-10-18 18:33:31');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `store_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maximum` int(11) DEFAULT 0,
  `minimum` int(11) DEFAULT 0,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `is_percentage` tinyint(4) DEFAULT 0,
  `active` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `created_at`, `updated_at`, `store_id`, `code`, `maximum`, `minimum`, `start_date`, `end_date`, `value`, `is_percentage`, `active`) VALUES
(1, '2021-10-25 18:35:08', '2021-10-27 10:49:03', 4, '555', 222, 22, '2021-10-25', '2021-10-14', 33, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_id` int(10) UNSIGNED DEFAULT NULL,
  `phone_verify` tinyint(4) DEFAULT 0,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `password`, `device_token`, `device_id`, `store_id`, `phone_verify`, `image`, `created_at`, `updated_at`) VALUES
(1, 'name', '323232', NULL, NULL, NULL, 4, 0, NULL, NULL, NULL),
(3, 'fathy', '01212648022', '$2y$10$qOlGF5GeogWwE6d5GPHQqOlM3XuK8o3u69Lei5qIh2vfgc/E7tHPu', NULL, NULL, NULL, 0, NULL, '2021-10-26 18:44:07', '2021-10-26 18:44:07'),
(4, 'ahmed', '01090478832', '$2y$10$7bUoYkx6kFEa1wRswYqMKecp6lCIZbijb5dhsgLKBrhu0cTazDuvu', NULL, NULL, NULL, 0, NULL, '2021-10-26 21:50:49', '2021-10-26 21:50:49'),
(5, 'fathy', '01212648022', '$2y$10$phN3edbfcR1gO5Mnm2EUtORJh57TGgq/wW8xs2dzqYo/KUc9eOZ26', NULL, NULL, 4, 1, NULL, '2021-10-28 14:17:06', '2021-11-05 13:46:08'),
(6, 'gt', '012123656479', '$2y$10$hvIxVU8d.Cv5gdcxUcNxO.y.hnPkL22TnStn95IhRn9Rq0i.3El/q', NULL, NULL, 4, 0, NULL, '2021-11-03 01:54:16', '2021-11-03 01:54:16'),
(7, 'shsh', '0121264806622', '$2y$10$NaILNk7fhR2LwCQAFi3SOuNy/6HL9HxBNWuXdk8LOw1S2xIUE45nq', NULL, NULL, 4, 0, NULL, '2021-11-03 02:01:31', '2021-11-03 02:01:31'),
(8, 'huhu', '01245787897', '$2y$10$nEmlO0r0sUmSWNe3gq.tDODK2yTU/U1kHq4pJkWXiNWZ6orabUL8K', NULL, NULL, 4, 0, NULL, '2021-11-03 02:08:12', '2021-11-03 02:08:12'),
(9, 'huhu', '0124578789667', '$2y$10$BnrXeEIUDyCsBGxnkCAdEOKZ8XMsTGMczNuhlgZi3Lojf.C3t.7WC', NULL, NULL, 4, 0, NULL, '2021-11-03 02:10:52', '2021-11-03 02:10:52'),
(10, 'huhu', '01245787896666', '$2y$10$83Zq9fr2T8CX59TMqwPU6.Gd2QkSPQrV.YkY3fSqVqYZmSM7CwK1S', NULL, NULL, 4, 0, NULL, '2021-11-03 02:12:00', '2021-11-03 02:12:00'),
(11, 'huhu', '01245783396666', '$2y$10$Lxk0VCLpbfmhxSl4JHBrNOCah0Q6Q4sQ5NnHoqagrvA.ncBatIwq.', NULL, NULL, 4, 0, NULL, '2021-11-03 02:12:56', '2021-11-03 02:12:56'),
(12, 'yu', '0121235464949', '$2y$10$AwQRg2n1Pm7xo4RZdCc2MOJOJxBlVOSTC.9eataKG6Wj8scvNvUku', NULL, NULL, 4, 0, NULL, '2021-11-03 02:15:36', '2021-11-03 02:15:36'),
(13, 'ahmed', '012354949799', '$2y$10$o3lLkn6DIx.wy6QWo0E23uR1TGtZr7dLZ54XY89FfLhcfhQEF55Dy', NULL, NULL, 4, 0, NULL, '2021-11-05 20:28:22', '2021-11-05 20:28:22'),
(14, 'uuuuu', '0121376797997', '$2y$10$gGaDZWb0nY863NYuJ0o5Fewc0FDvgecnWCuc967c4qWYzezCsfNde', NULL, NULL, 4, 0, NULL, '2021-11-05 20:30:49', '2021-11-05 20:30:49'),
(15, 'bzbsb', '01212648022558', '$2y$10$kDnUUBghKPUFmtpTLSxofOIRvQriZeFG60bToeLxIXT75T3trggUq', NULL, NULL, 4, 0, NULL, '2021-11-05 20:34:45', '2021-11-05 20:34:45'),
(16, 'ghgh', '0125454646', '$2y$10$4Yaa4YvSnJAxBimMb5b.0.wbn1i5P4UiTH7gYnNZze0c587NZN7B.', NULL, NULL, 4, 0, NULL, '2021-11-05 20:43:36', '2021-11-05 20:43:36'),
(17, 'test', '01212648044', '$2y$10$skeMD.wdepQxBg8J2YUPrulV/6MR0odvDCz4wtj9A7qY3hf7ifRke', NULL, NULL, 4, 0, NULL, '2021-11-05 20:53:39', '2021-11-05 20:53:39'),
(18, 'mahmoud', '01069494830', '$2y$10$KdVMmlzOFfQvWixf1iq8LOmhlkhsdVVhSst0tExWPoTavzldWC.XS', NULL, NULL, 4, 0, NULL, '2021-11-10 11:46:05', '2021-11-10 11:46:05'),
(19, 'Ibrahim', '01017100093', '$2y$10$Lnxm0aya4u2tCKrDs.X9cOYO10Kx983gcjZ4BRSjjoMRTGtLzVGJK', NULL, NULL, 4, 0, NULL, '2021-11-14 14:58:11', '2021-11-14 14:58:11');

-- --------------------------------------------------------

--
-- Table structure for table `customers_coupons`
--

CREATE TABLE `customers_coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `store_id` int(10) UNSIGNED NOT NULL,
  `minimum` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maximum` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` time DEFAULT NULL,
  `end_date` time DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `is_percentage` smallint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_addresses`
--

CREATE TABLE `customer_addresses` (
  `id` int(11) UNSIGNED NOT NULL,
  `address` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp(),
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `customer_id` smallint(5) UNSIGNED NOT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `building_name` varchar(191) DEFAULT NULL,
  `type` varchar(191) DEFAULT NULL,
  `flat_number` varchar(191) DEFAULT NULL,
  `floor_number` varchar(191) DEFAULT NULL,
  `details` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_addresses`
--

INSERT INTO `customer_addresses` (`id`, `address`, `last_update`, `lat`, `lng`, `active`, `customer_id`, `phone`, `building_name`, `type`, `flat_number`, `floor_number`, `details`, `created_at`, `updated_at`) VALUES
(110, 'mansoura', '2021-10-17 14:22:01', 33.33, 33.33, 0, 7, '01090478832', 'elwaly', NULL, '11', '2', 'details for address', '2021-10-17 12:22:01', '2021-10-17 17:18:45'),
(111, 'mansoura', '2021-10-17 14:23:43', 33.33, 33.33, 0, 7, '01090478832', 'elwaly', NULL, '11', '2', 'details for address', '2021-10-17 12:23:43', '2021-10-17 17:18:45'),
(112, 'mansoura', '2021-10-17 14:24:20', 33.33, 33.33, 0, 7, '01090478832', 'elwaly', NULL, '11', '2', 'details for address', '2021-10-17 12:24:20', '2021-10-17 17:18:45'),
(113, 'mansoura', '2021-10-17 14:53:20', 33.33, 33.33, 0, 7, '01090478832', 'elwaly', NULL, '11', '2', 'details for address', '2021-10-17 12:53:20', '2021-10-17 17:18:45'),
(114, 'mansoura', '2021-10-17 14:53:47', 33.33, 33.33, 0, 7, '01090478832', 'elwaly', NULL, '11', '2', 'details for address', '2021-10-17 12:53:47', '2021-10-17 17:18:45'),
(115, 'mansoura', '2021-10-17 14:56:27', 33.33, 33.33, 0, 7, '01090478832', 'elwaly', NULL, '11', '2', 'details for address', '2021-10-17 12:56:27', '2021-10-17 17:18:45'),
(116, 'mansoura', '2021-10-17 14:56:40', 33.33, 33.33, 0, 7, '01090478832', 'elwaly', NULL, '11', '2', 'details for address', '2021-10-17 12:56:40', '2021-10-17 17:18:45'),
(117, 'mansoura', '2021-10-17 14:57:07', 33.33, 33.33, 0, 7, '01090478832', 'elwaly', NULL, '11', '2', 'details for address', '2021-10-17 12:57:07', '2021-10-17 17:18:45'),
(118, 'mansoura', '2021-10-17 14:57:23', 33.33, 33.33, 0, 7, '01090478832', 'elwaly', NULL, '11', '2', 'details for address', '2021-10-17 12:57:23', '2021-10-17 17:18:45'),
(119, 'mansoura', '2021-10-17 14:57:40', 33.33, 33.33, 0, 7, '01090478832', 'elwaly', NULL, '11', '2', 'details for address', '2021-10-17 12:57:40', '2021-10-17 17:18:45'),
(120, 'mansoura', '2021-10-17 14:57:57', 33.33, 33.33, 0, 7, '01090478832', 'elwaly', NULL, '11', '2', 'details for address', '2021-10-17 12:57:57', '2021-10-17 17:18:45'),
(121, 'mansoura', '2021-10-17 14:58:30', 33.33, 33.33, 0, 7, '01090478832', 'elwaly', NULL, '11', '2', 'details for address', '2021-10-17 12:58:30', '2021-10-17 17:18:45'),
(122, 'mansoura', '2021-10-17 14:59:29', 33.33, 33.33, 0, 7, '01090478832', 'elwaly', NULL, '11', '2', 'details for address', '2021-10-17 12:59:29', '2021-10-17 17:18:45'),
(123, 'mansoura', '2021-10-17 15:00:23', 33.33, 33.33, 0, 7, '01090478832', 'elwaly', NULL, '11', '2', 'details for address', '2021-10-17 13:00:23', '2021-10-17 17:18:45'),
(124, 'mansoura', '2021-10-17 15:01:00', 33.33, 33.33, 0, 7, '01090478832', 'elwaly', NULL, '11', '2', 'details for address', '2021-10-17 13:01:00', '2021-10-17 17:18:45'),
(125, 'mansoura', '2021-10-17 15:02:12', 33.33, 33.33, 0, 7, '01090478832', 'elwaly', NULL, '11', '2', 'details for address', '2021-10-17 13:02:12', '2021-10-17 17:18:45'),
(126, 'mansoura', '2021-10-17 15:02:49', 33.33, 33.33, 0, 7, '01090478832', 'elwaly', NULL, '11', '2', 'details for address', '2021-10-17 13:02:49', '2021-10-17 17:18:45'),
(127, 'mansoura', '2021-10-17 15:04:00', 33.33, 33.33, 0, 7, '01090478832', 'elwaly', NULL, '11', '2', 'details for address', '2021-10-17 13:04:00', '2021-10-17 17:18:45'),
(128, 'mansoura', '2021-10-17 15:05:02', 33.33, 33.33, 0, 7, '01090478832', 'elwaly', NULL, '11', '2', 'details for address', '2021-10-17 13:05:02', '2021-10-17 17:18:45'),
(129, 'mansoura', '2021-10-17 15:07:49', 33.33, 33.33, 0, 7, '01090478832', 'elwaly', NULL, '11', '2', 'details for address', '2021-10-17 13:07:49', '2021-10-17 17:18:45'),
(130, 'mansoura', '2021-10-17 15:11:43', 33.33, 33.33, 0, 7, '01090478832', 'elwaly', NULL, '11', '2', 'details for address', '2021-10-17 13:11:43', '2021-10-17 17:18:45'),
(131, 'mansoura', '2021-10-17 15:12:15', 33.33, 33.33, 0, 7, '01090478832', 'elwaly', NULL, '11', '2', 'details for address', '2021-10-17 13:12:15', '2021-10-17 17:18:45'),
(132, 'mansoura', '2021-10-17 15:22:26', 33.33, 33.33, 0, 7, '01090478832', 'elwaly', NULL, '11', '2', 'details for address', '2021-10-17 13:22:26', '2021-10-17 17:18:45'),
(133, 'mansoura', '2021-10-17 15:26:15', 33.33, 33.33, 0, 7, '01090478832', 'elwaly', NULL, '11', '2', 'details for address', '2021-10-17 13:26:15', '2021-10-17 17:18:45'),
(134, 'mansoura', '2021-10-17 15:26:53', 33.33, 33.33, 0, 7, '01090478832', 'elwaly', NULL, '11', '2', 'details for address', '2021-10-17 13:26:53', '2021-10-17 17:18:45'),
(135, 'mansoura', '2021-10-17 15:28:01', 33.33, 33.33, 0, 7, '01090478832', 'elwaly', NULL, '11', '2', 'details for address', '2021-10-17 13:28:01', '2021-10-17 17:18:45'),
(136, 'mansoura', '2021-10-17 15:28:41', 33.33, 33.33, 0, 7, '01090478832', 'elwaly', NULL, '11', '2', 'details for address', '2021-10-17 13:28:41', '2021-10-17 17:18:45'),
(137, 'mansoura', '2021-10-17 15:29:48', 33.33, 33.33, 0, 7, '01090478832', 'elwaly', NULL, '11', '2', 'details for address', '2021-10-17 13:29:48', '2021-10-17 17:18:45'),
(138, 'mansoura', '2021-10-17 15:31:57', 33.33, 33.33, 0, 7, '01090478832', 'elwaly', NULL, '11', '2', 'details for address', '2021-10-17 13:31:57', '2021-10-17 17:18:45'),
(139, 'mansoura', '2021-10-17 15:32:11', 33.33, 33.33, 0, 7, '01090478832', 'elwaly', NULL, '11', '2', 'details for address', '2021-10-17 13:32:11', '2021-10-17 17:18:45'),
(140, 'mansoura', '2021-10-17 15:48:13', 33.33, 33.33, 0, 7, '01090478832', 'elwaly', NULL, '11', '2', 'details for address', '2021-10-17 13:48:13', '2021-10-17 17:18:45'),
(141, 'mansoura', '2021-10-17 16:58:08', 33.33, 33.33, 0, 7, '01090478832', 'elwaly', NULL, '11', '2', 'details for address', '2021-10-17 14:58:08', '2021-10-17 17:18:45'),
(142, 'mansoura', '2021-10-17 16:58:34', 33.33, 33.33, 0, 7, '01090478832', 'elwaly', NULL, '11', '2', 'details for address', '2021-10-17 14:58:34', '2021-10-17 17:18:45'),
(143, 'mansoura', '2021-10-17 16:58:59', 33.33, 33.33, 0, 7, '01090478832', 'elwaly', NULL, '11', '2', 'details for address', '2021-10-17 14:58:59', '2021-10-17 17:18:45'),
(144, 'mansoura', '2021-10-17 16:59:42', 33.33, 33.33, 0, 7, '01090478832', 'elwaly', NULL, '11', '2', 'details for address', '2021-10-17 14:59:42', '2021-10-17 17:18:45'),
(145, 'mansoura', '2021-10-17 17:00:15', 33.33, 33.33, 0, 7, '01090478832', 'elwaly', NULL, '11', '2', 'details for address', '2021-10-17 15:00:15', '2021-10-17 17:18:45'),
(146, 'mansoura', '2021-10-17 17:02:05', 33.33, 33.33, 0, 7, '01090478832', 'elwaly', NULL, '11', '2', 'details for address', '2021-10-17 15:02:05', '2021-10-17 17:18:45'),
(147, 'mansoura', '2021-10-17 17:02:51', 33.33, 33.33, 0, 7, '01090478832', 'elwaly', NULL, '11', '2', 'details for address', '2021-10-17 15:02:51', '2021-10-17 17:18:45'),
(148, 'mansoura', '2021-10-17 17:03:10', 33.33, 33.33, 0, 7, '01090478832', 'elwaly', NULL, '11', '2', 'details for address', '2021-10-17 15:03:10', '2021-10-17 17:18:45'),
(149, 'address', '2021-10-17 18:22:31', 33.33, 33.6, 0, 7, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-17 16:22:31', '2021-10-17 17:18:45'),
(150, 'address', '2021-10-17 18:23:21', 33.33, 33.6, 0, 7, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-17 16:23:21', '2021-10-17 17:18:45'),
(151, 'address', '2021-10-17 18:23:50', 33.33, 33.6, 0, 7, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-17 16:23:50', '2021-10-17 17:18:45'),
(152, 'address', '2021-10-17 18:24:07', 33.33, 33.6, 0, 7, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-17 16:24:07', '2021-10-17 17:18:45'),
(153, 'address', '2021-10-17 18:24:39', 33.33, 33.6, 0, 7, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-17 16:24:39', '2021-10-17 17:18:45'),
(154, 'mansoura', '2021-10-17 19:08:17', 33.33, 33.33, 0, 7, '01090478832', 'elwaly', NULL, '11', '2', 'details for address', '2021-10-17 17:08:17', '2021-10-17 17:18:45'),
(155, 'mansoura', '2021-10-17 19:18:45', 33.33, 33.33, 1, 7, '01090478832', 'elwaly', NULL, '11', '2', 'details for address', '2021-10-17 17:18:45', '2021-10-17 17:18:45'),
(156, 'mansoura', '2021-10-27 08:15:28', 33.33, 33.33, 0, 4, NULL, 'elwaly', NULL, '11', '2', 'details for address', '2021-10-27 08:15:28', '2021-10-27 08:32:06'),
(157, 'mansoura', '2021-10-27 08:32:06', 33.33, 33.33, 1, 4, NULL, 'elwaly', NULL, '11', '2', 'details for address', '2021-10-27 08:32:06', '2021-10-27 08:32:06'),
(158, 'mansoura', '2021-10-27 10:32:04', 33.33, 33.33, 0, 3, NULL, 'elwaly', NULL, '11', '2', 'details for address', '2021-10-27 10:32:04', '2021-10-27 10:51:58'),
(159, 'mansoura', '2021-10-27 10:32:17', 33.33, 33.33, 0, 3, NULL, 'elwaly', NULL, '11', '2', NULL, '2021-10-27 10:32:17', '2021-10-27 10:51:58'),
(160, 'mansoura', '2021-10-27 10:33:33', 33.33, 33.33, 0, 3, NULL, 'elwaly', NULL, '11', '2', NULL, '2021-10-27 10:33:33', '2021-10-27 10:51:58'),
(161, 'mansoura', '2021-10-27 10:35:01', 33.33, 33.33, 0, 3, NULL, 'elwaly', NULL, '11', '2', 'details for address', '2021-10-27 10:35:01', '2021-10-27 10:51:58'),
(162, 'mansoura', '2021-10-27 10:35:04', 33.33, 33.33, 0, 3, NULL, 'elwaly', NULL, '11', '2', NULL, '2021-10-27 10:35:04', '2021-10-27 10:51:58'),
(163, 'mansoura', '2021-10-27 10:35:13', 33.33, 33.33, 0, 3, NULL, 'elwaly', NULL, '11', '2', 'details for address', '2021-10-27 10:35:13', '2021-10-27 10:51:58'),
(164, 'dfdf', '2021-10-27 10:35:36', 2.02, 3.02, 0, 3, NULL, 'fd', NULL, 'df', 'df', NULL, '2021-10-27 10:35:36', '2021-10-27 10:51:58'),
(165, 'dfdf', '2021-10-27 10:51:58', 2.02, 3.02, 1, 3, NULL, 'fd', NULL, 'df', 'df', NULL, '2021-10-27 10:51:58', '2021-10-27 10:51:58'),
(166, 'df', '2021-10-28 14:38:18', 2.02, 3.02, 0, 5, NULL, 'df', NULL, 'df', 'df', NULL, '2021-10-28 14:38:18', '2021-11-03 01:28:31'),
(167, 'df', '2021-10-28 14:45:21', 2.02, 3.02, 0, 5, NULL, 'df', NULL, 'df', 'df', NULL, '2021-10-28 14:45:21', '2021-11-03 01:28:31'),
(168, 'df', '2021-10-28 14:48:17', 2.02, 3.02, 0, 5, NULL, 'df', NULL, 'df', 'df', NULL, '2021-10-28 14:48:17', '2021-11-03 01:28:31'),
(169, 'df', '2021-10-28 14:48:40', 2.02, 3.02, 0, 5, NULL, 'df', NULL, 'df', 'df', NULL, '2021-10-28 14:48:40', '2021-11-03 01:28:31'),
(170, 'df', '2021-10-28 14:49:09', 2.02, 3.02, 0, 5, NULL, 'df', NULL, 'df', 'df', NULL, '2021-10-28 14:49:09', '2021-11-03 01:28:31'),
(171, 'الغربية - المحلة الكبرى (قسم 2) - شارع البهلوان، المحلة الكبرى (قسم 2)، مركز المحله الكبرى، الغربية، مصر', '2021-11-03 01:05:31', 30.9712274, 31.1655655, 0, 5, NULL, 'تنن', NULL, '88', '66', NULL, '2021-11-03 01:05:31', '2021-11-03 01:28:31'),
(172, 'الغربية - المحلة الكبرى (قسم 2) - شارع البهلوان، المحلة الكبرى (قسم 2)، مركز المحله الكبرى، الغربية، مصر', '2021-11-03 01:06:10', 30.9712274, 31.1655655, 0, 5, NULL, 'تنن', NULL, '88', '66', NULL, '2021-11-03 01:06:10', '2021-11-03 01:28:31'),
(173, 'الغربية - المحلة الكبرى (قسم 2) - شارع الطباخين، المحلة الكبرى (قسم 2)، مركز المحله الكبرى، الغربية، مصر', '2021-11-03 01:08:11', 30.9711536, 31.1656003, 0, 5, NULL, 'ةةت', NULL, '99', '99', NULL, '2021-11-03 01:08:11', '2021-11-03 01:28:31'),
(174, 'الغربية - المحلة الكبرى (قسم 2) - شارع الطباخين، المحلة الكبرى (قسم 2)، مركز المحله الكبرى، الغربية، مصر', '2021-11-03 01:08:25', 30.9711536, 31.1656003, 0, 5, NULL, 'ةةت', NULL, '99', '99', NULL, '2021-11-03 01:08:25', '2021-11-03 01:28:31'),
(175, 'الغربية - المحلة الكبرى (قسم 2) - شارع البهلوان، المحلة الكبرى (قسم 2)، مركز المحله الكبرى، الغربية، مصر', '2021-11-03 01:26:36', 30.9712197, 31.1655683, 0, 5, NULL, 'وؤوؤ', NULL, '7679', '7979', NULL, '2021-11-03 01:26:36', '2021-11-03 01:28:31'),
(176, 'الغربية - المحلة الكبرى (قسم 2) - شارع البهلوان، المحلة الكبرى (قسم 2)، مركز المحله الكبرى، الغربية، مصر', '2021-11-03 01:28:31', 30.9711766, 31.1655705, 1, 5, NULL, 'تيويوتيوب', NULL, '656568', '98986', NULL, '2021-11-03 01:28:31', '2021-11-03 01:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `value` int(11) DEFAULT NULL,
  `percentage` tinyint(4) DEFAULT 0,
  `start_date` date DEFAULT NULL,
  `epired_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `store_id` int(10) UNSIGNED DEFAULT NULL,
  `branch_id` int(10) UNSIGNED DEFAULT NULL,
  `workshift_id` int(10) UNSIGNED DEFAULT NULL,
  `device_id` text DEFAULT NULL,
  `device_token` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `name`, `email`, `phone`, `password`, `store_id`, `branch_id`, `workshift_id`, `device_id`, `device_token`, `created_at`, `updated_at`) VALUES
(4, 'store_id', 'ehabtalaat1@gmail.com', '0101010', '$2y$10$F0gUGi3Ggw3ZmNnznMRpieLPmOkFhUxqB1VQfaEHomc3dgs9B19Xy', 4, NULL, NULL, NULL, NULL, '2021-10-19 22:44:41', '2021-10-19 22:44:41');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `created_at`, `updated_at`, `name`, `phone`, `email`, `password`, `image`, `remember_token`) VALUES
(2, '2021-10-13 19:25:58', '2021-10-13 19:25:58', '1title', '1231234', 'admin@admin.com', '$2y$10$no6ycLGqq7Qf8szC1jKl5unv52W.UKjkrDkhLAR0HEX3QaNsMk5xe', NULL, NULL),
(3, '2021-10-13 19:46:56', '2021-10-13 19:46:56', 'ehabtalaat', '01009060299', 'ehabtalaat@gmail.com', '$2y$10$Tys/Ur8rq4q041AwLgFREOMc/64/syYZVcGSHOYp3Sus6vFrJtZ9a', NULL, 'mjFvJKWM5yXvkHcgPpFzfQjjlu3Pd9SK1cz4JhtijfRmNSE2mIWU5z9dCxyZ');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `expensetype_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses_types`
--

CREATE TABLE `expenses_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses_types`
--

INSERT INTO `expenses_types` (`id`, `created_at`, `updated_at`) VALUES
(1, '2021-10-11 16:41:25', '2021-10-11 16:41:25');

-- --------------------------------------------------------

--
-- Table structure for table `expensetype_translations`
--

CREATE TABLE `expensetype_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expensetype_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expensetype_translations`
--

INSERT INTO `expensetype_translations` (`id`, `locale`, `title`, `expensetype_id`, `created_at`, `updated_at`) VALUES
(1, 'en', 'cash', 1, '2021-10-11 16:41:25', '2021-10-11 16:41:25'),
(2, 'ar', 'كاش', 1, '2021-10-11 16:41:25', '2021-10-11 16:41:25');

-- --------------------------------------------------------

--
-- Table structure for table `expense_translations`
--

CREATE TABLE `expense_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `extradetail_translations`
--

CREATE TABLE `extradetail_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extradetail_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `extradetail_translations`
--

INSERT INTO `extradetail_translations` (`id`, `title`, `extradetail_id`, `locale`, `created_at`, `updated_at`) VALUES
(67, 'Aperiam ipsum imped', 34, 'en', '2021-10-18 10:45:10', '2021-10-18 10:45:10'),
(68, 'Non quo velit eos qu', 34, 'ar', '2021-10-18 10:45:10', '2021-10-18 10:45:10'),
(79, 'Libero et in vel qui', 40, 'en', '2021-10-22 09:59:12', '2021-10-22 09:59:12'),
(80, 'Velit assumenda eum', 40, 'ar', '2021-10-22 09:59:12', '2021-10-22 09:59:12'),
(81, 'Inventore ea perfere', 41, 'en', '2021-10-22 09:59:12', '2021-10-22 09:59:12'),
(82, 'Debitis enim id sun', 41, 'ar', '2021-10-22 09:59:12', '2021-10-22 09:59:12'),
(83, NULL, 42, 'en', '2021-10-22 09:59:12', '2021-10-22 09:59:12'),
(84, NULL, 42, 'ar', '2021-10-22 09:59:13', '2021-10-22 09:59:13'),
(85, NULL, 43, 'en', '2021-10-22 09:59:13', '2021-10-22 09:59:13'),
(86, NULL, 43, 'ar', '2021-10-22 09:59:13', '2021-10-22 09:59:13'),
(87, NULL, 44, 'en', '2021-10-22 09:59:13', '2021-10-22 09:59:13'),
(88, NULL, 44, 'ar', '2021-10-22 09:59:13', '2021-10-22 09:59:13'),
(91, 'Blanditiis quis expe', 46, 'en', '2021-10-23 16:34:49', '2021-10-23 16:34:49'),
(92, 'Cum duis numquam qui', 46, 'ar', '2021-10-23 16:34:49', '2021-10-23 16:34:49'),
(95, 'Blanditiis quis expe', 48, 'en', '2021-10-23 16:42:36', '2021-10-23 16:42:36'),
(96, 'Cum duis numquam qui', 48, 'ar', '2021-10-23 16:42:36', '2021-10-23 16:42:36'),
(99, 'Blanditiis quis expe', 50, 'en', '2021-10-23 16:46:39', '2021-10-23 16:46:39'),
(100, 'Cum duis numquam qui', 50, 'ar', '2021-10-23 16:46:39', '2021-10-23 16:46:39'),
(121, 'Blanditiis quis expe', 61, 'en', '2021-10-23 17:10:24', '2021-10-23 17:10:24'),
(122, 'Cum duis numquam qui', 61, 'ar', '2021-10-23 17:10:24', '2021-10-23 17:10:24'),
(123, 'Quo veniam reprehen', 62, 'en', '2021-10-23 17:10:24', '2021-10-23 17:10:24'),
(124, 'Necessitatibus perfe', 62, 'ar', '2021-10-23 17:10:24', '2021-10-23 17:10:24');

-- --------------------------------------------------------

--
-- Table structure for table `extras`
--

CREATE TABLE `extras` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `optional` tinyint(4) DEFAULT 0,
  `multichoice` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `extras`
--

INSERT INTO `extras` (`id`, `product_id`, `optional`, `multichoice`, `created_at`, `updated_at`) VALUES
(41, 27, 0, 1, '2021-10-18 10:45:10', '2021-10-18 10:45:10'),
(48, 26, 1, 1, '2021-10-22 09:59:11', '2021-10-22 09:59:12'),
(49, 26, 1, 1, '2021-10-22 09:59:12', '2021-10-22 09:59:12'),
(50, 26, 0, 1, '2021-10-22 09:59:13', '2021-10-22 09:59:13'),
(51, 26, 0, 0, '2021-10-22 09:59:13', '2021-10-22 09:59:13'),
(52, 26, 0, 0, '2021-10-22 09:59:13', '2021-10-22 09:59:14'),
(53, 26, 0, 0, '2021-10-22 09:59:14', '2021-10-22 09:59:14'),
(68, 27, 0, 0, '2021-10-23 16:34:49', '2021-10-23 16:34:49'),
(70, 27, 0, 1, '2021-10-23 16:42:35', '2021-10-23 16:42:36'),
(72, 27, 0, 1, '2021-10-23 16:46:38', '2021-10-23 16:46:38'),
(85, 43, 0, 1, '2021-10-23 17:10:23', '2021-10-23 17:10:23'),
(86, 43, 0, 0, '2021-10-23 17:10:24', '2021-10-23 17:10:24');

-- --------------------------------------------------------

--
-- Table structure for table `extra_details`
--

CREATE TABLE `extra_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `extra_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `default` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `extra_details`
--

INSERT INTO `extra_details` (`id`, `created_at`, `updated_at`, `extra_id`, `product_id`, `price`, `default`) VALUES
(34, '2021-10-18 10:45:10', '2021-10-18 10:45:10', 41, NULL, '117', 1),
(40, '2021-10-22 09:59:12', '2021-10-22 09:59:12', 48, NULL, '998', 1),
(41, '2021-10-22 09:59:12', '2021-10-22 09:59:12', 48, NULL, '170', 0),
(42, '2021-10-22 09:59:12', '2021-10-22 09:59:12', 49, NULL, '526', 0),
(43, '2021-10-22 09:59:13', '2021-10-22 09:59:13', 49, NULL, '881', 0),
(44, '2021-10-22 09:59:13', '2021-10-22 09:59:13', 50, NULL, '486', 0),
(46, '2021-10-23 16:34:49', '2021-10-23 16:34:49', 68, 27, '0', 0),
(48, '2021-10-23 16:42:36', '2021-10-23 16:42:36', 70, 27, '0', 0),
(50, '2021-10-23 16:46:38', '2021-10-23 16:46:38', 72, 27, '0', 0),
(61, '2021-10-23 17:10:24', '2021-10-23 17:10:24', 85, 27, '0', 0),
(62, '2021-10-23 17:10:24', '2021-10-23 17:10:24', 86, 26, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `extra_translations`
--

CREATE TABLE `extra_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exra_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `extra_translations`
--

INSERT INTO `extra_translations` (`id`, `title`, `locale`, `exra_id`, `created_at`, `updated_at`) VALUES
(73, 'Possimus ea qui eni', 'en', 41, '2021-10-18 10:45:10', '2021-10-18 10:45:10'),
(74, 'Eu quia cumque dolor', 'ar', 41, '2021-10-18 10:45:10', '2021-10-18 10:45:10'),
(87, 'Molestiae voluptatem', 'en', 48, '2021-10-22 09:59:11', '2021-10-22 09:59:11'),
(88, 'Voluptate minima fac', 'ar', 48, '2021-10-22 09:59:11', '2021-10-22 09:59:11'),
(89, 'Eveniet provident', 'en', 49, '2021-10-22 09:59:12', '2021-10-22 09:59:12'),
(90, 'Natus qui corporis i', 'ar', 49, '2021-10-22 09:59:12', '2021-10-22 09:59:12'),
(91, 'Enim fugiat quis min', 'en', 50, '2021-10-22 09:59:13', '2021-10-22 09:59:13'),
(92, 'Velit doloribus mod', 'ar', 50, '2021-10-22 09:59:13', '2021-10-22 09:59:13'),
(93, 'At ad obcaecati nost', 'en', 51, '2021-10-22 09:59:13', '2021-10-22 09:59:13'),
(94, 'Odit inventore iste', 'ar', 51, '2021-10-22 09:59:13', '2021-10-22 09:59:13'),
(95, 'Itaque id dolor omni', 'en', 52, '2021-10-22 09:59:13', '2021-10-22 09:59:13'),
(96, 'Dolorem omnis doloru', 'ar', 52, '2021-10-22 09:59:13', '2021-10-22 09:59:13'),
(97, 'Voluptates nostrum a', 'en', 53, '2021-10-22 09:59:14', '2021-10-22 09:59:14'),
(98, 'Dolorem nobis et ill', 'ar', 53, '2021-10-22 09:59:14', '2021-10-22 09:59:14'),
(127, 'ss', 'en', 68, '2021-10-23 16:34:49', '2021-10-23 16:34:49'),
(128, 'ss', 'ar', 68, '2021-10-23 16:34:49', '2021-10-23 16:34:49'),
(131, 'ss', 'en', 70, '2021-10-23 16:42:35', '2021-10-23 16:42:35'),
(132, 'ss', 'ar', 70, '2021-10-23 16:42:35', '2021-10-23 16:42:35'),
(135, 'ss', 'en', 72, '2021-10-23 16:46:38', '2021-10-23 16:46:38'),
(136, 'ss', 'ar', 72, '2021-10-23 16:46:38', '2021-10-23 16:46:38'),
(161, 'zcxxc', 'en', 85, '2021-10-23 17:10:23', '2021-10-23 17:10:23'),
(162, 'zxxz', 'ar', 85, '2021-10-23 17:10:23', '2021-10-23 17:10:23'),
(163, 'ssa', 'en', 86, '2021-10-23 17:10:24', '2021-10-23 17:10:24'),
(164, 'assa', 'ar', 86, '2021-10-23 17:10:24', '2021-10-23 17:10:24');

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
-- Table structure for table `favorite_products`
--

CREATE TABLE `favorite_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `customer_id` int(10) UNSIGNED DEFAULT NULL,
  `store_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `features_texts`
--

CREATE TABLE `features_texts` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `packagefeature_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `featuretext_translations`
--

CREATE TABLE `featuretext_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featuretext_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kindoffeature_translations`
--

CREATE TABLE `kindoffeature_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `kindoffeature_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kinds_of_features`
--

CREATE TABLE `kinds_of_features` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `shortcut` varchar(191) DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `shortcut`, `image`, `created_at`, `updated_at`) VALUES
(1, 'en', 'uploads/languages/1635330575.png', '2021-10-27 08:29:02', '2021-10-27 08:29:35');

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `majors` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`id`, `created_at`, `updated_at`) VALUES
(1, '2021-10-11 21:07:06', '2021-10-11 21:07:06');

-- --------------------------------------------------------

--
-- Table structure for table `major_translations`
--

CREATE TABLE `major_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `major_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `major_translations`
--

INSERT INTO `major_translations` (`id`, `title`, `locale`, `major_id`, `created_at`, `updated_at`) VALUES
(1, 'major', 'en', 1, '2021-10-11 21:07:06', '2021-10-11 21:07:06'),
(2, 'تخصص', 'ar', 1, '2021-10-11 21:07:06', '2021-10-11 21:07:06');

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
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2021_10_06_182301_create_areas_table', 1),
(10, '2021_10_06_182301_create_categories_table', 1),
(11, '2021_10_06_182301_create_category_translations_table', 1),
(12, '2021_10_06_182301_create_cities_table', 1),
(13, '2021_10_06_182301_create_city_translations_table', 1),
(14, '2021_10_06_182301_create_coupons_table', 1),
(15, '2021_10_06_182301_create_customers_table', 1),
(16, '2021_10_06_182301_create_discounts_table', 1),
(17, '2021_10_06_182301_create_employees_table', 1),
(18, '2021_10_06_182301_create_expense_translations_table', 1),
(19, '2021_10_06_182301_create_expenses_table', 1),
(20, '2021_10_06_182301_create_expenses_types_table', 1),
(21, '2021_10_06_182301_create_expensetype_translations_table', 1),
(22, '2021_10_06_182301_create_extra_details_table', 1),
(23, '2021_10_06_182301_create_extra_translations_table', 1),
(24, '2021_10_06_182301_create_extradetail_translations_table', 1),
(25, '2021_10_06_182301_create_extras_table', 1),
(26, '2021_10_06_182301_create_favorite_products_table', 1),
(27, '2021_10_06_182301_create_features_texts_table', 1),
(28, '2021_10_06_182301_create_featuretext_translations_table', 1),
(29, '2021_10_06_182301_create_kindoffeature_translations_table', 1),
(30, '2021_10_06_182301_create_kinds_of_features_table', 1),
(31, '2021_10_06_182301_create_major_translations_table', 1),
(32, '2021_10_06_182301_create_majors_table', 1),
(33, '2021_10_06_182301_create_offers_stores_table', 1),
(34, '2021_10_06_182301_create_offers_table', 1),
(35, '2021_10_06_182301_create_package_translations_table', 1),
(36, '2021_10_06_182301_create_packages_featurepackage_table', 1),
(37, '2021_10_06_182301_create_packages_table', 1),
(38, '2021_10_06_182301_create_packeges_features_table', 1),
(39, '2021_10_06_182301_create_paymentway_translations_table', 1),
(40, '2021_10_06_182301_create_paymentways_table', 1),
(41, '2021_10_06_182301_create_product_translations_table', 1),
(42, '2021_10_06_182301_create_products_table', 1),
(43, '2021_10_06_182301_create_products_tags_table', 1),
(44, '2021_10_06_182301_create_state_translations_table', 1),
(45, '2021_10_06_182301_create_states_table', 1),
(46, '2021_10_06_182301_create_store_branches_table', 1),
(47, '2021_10_06_182301_create_store_employees_table', 1),
(48, '2021_10_06_182301_create_stores_languages_table', 1),
(49, '2021_10_06_182301_create_stores_table', 1),
(50, '2021_10_06_182301_create_tag_translations_table', 1),
(51, '2021_10_06_182301_create_tags_table', 1),
(52, '2021_10_06_182301_create_zone_translations_table', 1),
(53, '2021_10_06_182301_create_zones_table', 1),
(54, '2021_10_06_182311_create_foreign_keys', 1),
(55, '2021_10_06_190243_laratrust_setup_tables', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `store_id` int(10) UNSIGNED DEFAULT NULL,
  `title` text DEFAULT NULL,
  `text` text DEFAULT NULL,
  `employee_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `store_id`, `title`, `text`, `employee_id`, `created_at`, `updated_at`) VALUES
(1, 4, 'العنوان', 'النص', 2, '2021-10-23 14:06:20', '2021-10-23 14:06:20');

-- --------------------------------------------------------

--
-- Table structure for table `notifications_customers`
--

CREATE TABLE `notifications_customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `notification_id` int(10) UNSIGNED DEFAULT NULL,
  `customer_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('05ede617518bc3f755b59484c642bdfca9ec529132c97029d9d222c2d693411c3eb2b235996cc834', 5, 1, 'Laravel Password Grant Client', '[\"customer\"]', 0, '2021-11-03 02:17:21', '2021-11-03 02:17:21', '2022-11-03 02:17:21'),
('06eff182b7738bee717c17d9140aaeb18609ce918e2ac311b091917de40492f3cf763ae14b4867b2', 5, 1, 'Laravel Password Grant Client', '[\"customer\"]', 0, '2021-11-05 20:52:56', '2021-11-05 20:52:56', '2022-11-05 20:52:56'),
('0bab12d1c13e63642982d19e4d959da48633075407011a9f053c1365e7ba553c4d472d77e8c1d417', 17, 1, 'Laravel Password Grant Client', '[\"customer\"]', 0, '2021-11-05 20:53:39', '2021-11-05 20:53:39', '2022-11-05 20:53:39'),
('0e3742b88106b4e94487318870ad4f82ff01342f2b671de491583244ce3fe5586aa431aca610a245', 5, 1, 'Laravel Password Grant Client', '[\"customer\"]', 0, '2021-11-05 13:25:13', '2021-11-05 13:25:13', '2022-11-05 13:25:13'),
('10ca248ab3db9da8f31784e9b5d3cd259a7dc5b62bb8c871d4c6dd5629139312375cc40d455f9def', 3, 1, 'Laravel Password Grant Client', '[\"customer\"]', 0, '2021-10-26 18:44:07', '2021-10-26 18:44:07', '2022-10-26 18:44:07'),
('144cbef374ee5dea6bf56bf336af8fede966a5c9e53928abc1192f514442f20c554d3a3eceb86db3', 5, 1, 'Laravel Password Grant Client', '[\"customer\"]', 0, '2021-11-05 13:21:45', '2021-11-05 13:21:45', '2022-11-05 13:21:45'),
('15804c46b283a2c8502b12abde7c3b0db4c5397936c5dbfb1a2f698f77c2427ff1842968ffef4b42', 18, 1, 'Laravel Password Grant Client', '[\"customer\"]', 0, '2021-11-10 11:46:05', '2021-11-10 11:46:05', '2022-11-10 11:46:05'),
('1c5645a3ca2925d7b56c6533d37bbe429da50b390475b93ffbf36ceb9e820fa512a0dc9ec24a4428', 5, 1, 'Laravel Password Grant Client', '[\"customer\"]', 0, '2021-10-28 14:17:06', '2021-10-28 14:17:06', '2022-10-28 14:17:06'),
('41c6259b2dd0a3eaa6ec459673b387e8153246df3bba854e4429d6b28a28b4da1a4d205a65bff86f', 5, 1, 'Laravel Password Grant Client', '[\"customer\"]', 0, '2021-11-03 02:17:16', '2021-11-03 02:17:16', '2022-11-03 02:17:16'),
('6062fa69b09e4fad47b01a25319076c256cbea90467ee69c734b9b5089b5988085890a89be49abfd', 17, 1, 'Laravel Password Grant Client', '[\"customer\"]', 0, '2021-11-05 20:55:07', '2021-11-05 20:55:07', '2022-11-05 20:55:07'),
('639d4f2385e9035eba50959961dcddb67f3c27f21d143b459562557070a841862eb01c9f6d8a2bb9', 19, 1, 'Laravel Password Grant Client', '[\"customer\"]', 0, '2021-11-14 14:58:11', '2021-11-14 14:58:11', '2022-11-14 14:58:11'),
('6975eb9e676b96277900bf32199aa49e7173be7c67cceb4d179d761c5eedca192addce13e20e3fb9', 8, 1, 'Laravel Password Grant Client', '[\"customer\"]', 0, '2021-11-03 02:08:12', '2021-11-03 02:08:12', '2022-11-03 02:08:12'),
('6d372384302c316c304ad89c5eff10ed873a6ea1b5f0c80eeaf19a2af4a8b45a9b367e983cde365c', 16, 1, 'Laravel Password Grant Client', '[\"customer\"]', 0, '2021-11-05 20:43:36', '2021-11-05 20:43:36', '2022-11-05 20:43:36'),
('78d403be2a86c13ec95ddfec1c5c6c1bdc2c048ffdb6859734df7e06e71dbc3c338f578fac960dbb', 10, 1, 'Laravel Password Grant Client', '[\"customer\"]', 0, '2021-11-03 02:12:00', '2021-11-03 02:12:00', '2022-11-03 02:12:00'),
('7b674255d3cfebe19a8a725ae055c5a10633f8ca80c522903917eaeb0e69741e95a2bd1dc61dafa3', 7, 1, 'Laravel Password Grant Client', '[\"customer\"]', 0, '2021-11-03 02:01:31', '2021-11-03 02:01:31', '2022-11-03 02:01:31'),
('7b86a9a68fca5bc9ff54d0c5b198f6411c24aae345cf9d84dc33379e5634b04b24a7fb3a5ea490ab', 5, 1, 'Laravel Password Grant Client', '[\"customer\"]', 0, '2021-11-05 13:29:19', '2021-11-05 13:29:19', '2022-11-05 13:29:19'),
('7bb510d645785d60f75a7252d2c1085b7adaca19ff9569f3aa55c2712be29df490fac29809217345', 12, 1, 'Laravel Password Grant Client', '[\"customer\"]', 0, '2021-11-03 02:15:36', '2021-11-03 02:15:36', '2022-11-03 02:15:36'),
('9e2e0f28151c8fdea389ecff0ffe5f907f532c8a83b2d5209985609a1df8a334b4fd10bccefbf3b3', 13, 1, 'Laravel Password Grant Client', '[\"customer\"]', 0, '2021-11-05 20:28:22', '2021-11-05 20:28:22', '2022-11-05 20:28:22'),
('9efc233ed86df9c22275eb6c455ecff50b99d4f59d21606dbddda43b76ed232be5d206ca7d9c644d', 5, 1, 'Laravel Password Grant Client', '[\"customer\"]', 0, '2021-11-05 20:53:23', '2021-11-05 20:53:23', '2022-11-05 20:53:23'),
('9f367601af3db110a18fd0071fc3bc5c6365ae9fa437c49dc9b2583c0fa921375a29df058537cee7', 11, 1, 'Laravel Password Grant Client', '[\"customer\"]', 0, '2021-11-03 02:12:56', '2021-11-03 02:12:56', '2022-11-03 02:12:56'),
('b6988cb1ee3bfc04b3896a052c8aca117ad7f294761bad4e1676b0ad63589a980664ccf94c36bbbf', 4, 1, 'Laravel Password Grant Client', '[\"customer\"]', 0, '2021-10-26 21:50:49', '2021-10-26 21:50:49', '2022-10-26 21:50:49'),
('c85c330c081262848346211f632cb413823b13f45fdc90f43c0d42a217327d2ce665b44e9e82c106', 15, 1, 'Laravel Password Grant Client', '[\"customer\"]', 0, '2021-11-05 20:34:45', '2021-11-05 20:34:45', '2022-11-05 20:34:45'),
('e2faab711c84319a0ff866e233e02691a5dbd51d32bdbdbdd661a882636acbe458a736eb0a0794b1', 9, 1, 'Laravel Password Grant Client', '[\"customer\"]', 0, '2021-11-03 02:10:52', '2021-11-03 02:10:52', '2022-11-03 02:10:52'),
('e67645bc72980318adf4894bc94c1c801d689ad6fd99f3774f58a76e075a77579cf6a601ea549228', 5, 1, 'Laravel Password Grant Client', '[\"customer\"]', 0, '2021-11-05 13:46:08', '2021-11-05 13:46:08', '2022-11-05 13:46:08'),
('ee8b51e7a5e7bb86f3fff97b0b58c0f6956474e9d3a7d406f2a41d7b962e68a5d2e26f2b380a374d', 5, 1, 'Laravel Password Grant Client', '[\"customer\"]', 0, '2021-11-03 01:53:46', '2021-11-03 01:53:46', '2022-11-03 01:53:46'),
('f182decf86dc247a68fc520861e76385a49a158cdc007ce70e1064f4327a4de80422fb27bc8b7152', 14, 1, 'Laravel Password Grant Client', '[\"customer\"]', 0, '2021-11-05 20:30:49', '2021-11-05 20:30:49', '2022-11-05 20:30:49'),
('f6399c6ca0c39d66ef1e424d736031a24d5ae168edbebb4923f530f75a48f58152526365c774e334', 6, 1, 'Laravel Password Grant Client', '[\"customer\"]', 0, '2021-11-03 01:54:16', '2021-11-03 01:54:16', '2022-11-03 01:54:16'),
('f9e0019d9f901bb46f5e46a60b8c83b1eb5e03b96807bf341a8adcd07504ff9808b5f9c099a5a02d', 5, 1, 'Laravel Password Grant Client', '[\"customer\"]', 0, '2021-11-05 21:11:22', '2021-11-05 21:11:22', '2022-11-05 21:11:22'),
('fa083e43c425c2d2db6b6b3af57c6c9f686df8c2f7a46cd1f36630607b5eb5bd452c7f28a0810df3', 5, 1, 'Laravel Password Grant Client', '[\"customer\"]', 0, '2021-11-05 13:31:14', '2021-11-05 13:31:14', '2022-11-05 13:31:14');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'vdIN889n2REqUzmf2UMcmUgujEOopZLjGqL5qldx', NULL, 'http://localhost', 1, 0, 0, '2021-10-26 18:03:05', '2021-10-26 18:03:05'),
(2, NULL, 'Laravel Password Grant Client', '1H7luAnBQ9mx92c8ypmi0G6NThaXUnHQzLpCO9KV', 'users', 'http://localhost', 0, 1, 0, '2021-10-26 18:03:05', '2021-10-26 18:03:05');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-10-26 18:03:05', '2021-10-26 18:03:05');

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
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offers_stores`
--

CREATE TABLE `offers_stores` (
  `id` int(10) UNSIGNED NOT NULL,
  `offer_id` int(10) UNSIGNED NOT NULL,
  `store_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(191) DEFAULT NULL,
  `customer_phone` varchar(191) DEFAULT NULL,
  `address_details` text DEFAULT NULL,
  `table_number` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `voucher_id` int(11) DEFAULT NULL,
  `product_price` double NOT NULL,
  `driver_price` int(11) NOT NULL DEFAULT 0,
  `final_price` double DEFAULT NULL,
  `payment_method` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) DEFAULT 1,
  `store_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `type` varchar(191) DEFAULT NULL,
  `serial_number` varchar(191) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `first_status_time` timestamp NULL DEFAULT NULL,
  `second_status_time` timestamp NULL DEFAULT NULL,
  `third_status_time` timestamp NULL DEFAULT NULL,
  `forth_status_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `customer_name`, `customer_phone`, `address_details`, `table_number`, `customer_id`, `driver_id`, `address_id`, `voucher_id`, `product_price`, `driver_price`, `final_price`, `payment_method`, `created_at`, `updated_at`, `status`, `store_id`, `date`, `type`, `serial_number`, `branch_id`, `first_status_time`, `second_status_time`, `third_status_time`, `forth_status_time`) VALUES
(1, NULL, NULL, NULL, 2, 7, NULL, 155, NULL, 0, 0, 34, 'cash', '2021-10-17 17:18:46', '2021-10-28 13:55:12', 4, 4, '2021-10-17', 'table', '', NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL, 7, NULL, 155, NULL, 0, 0, 34, 'cash', '2021-10-17 17:18:55', '2021-10-17 17:18:55', 0, 1, '2021-10-17', 'delivery', '', NULL, NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL, 7, NULL, 155, NULL, 0, 0, 34, 'cash', '2021-10-18 08:41:31', '2021-10-18 08:41:31', 0, 1, '2021-10-17', 'delivery', '732273631', NULL, NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'cash', '2021-10-22 11:10:30', '2021-10-22 11:10:30', 0, 4, '2021-10-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'title', '442424', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'cash', '2021-10-22 11:49:45', '2021-10-22 11:49:45', 0, 4, '2021-10-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'title', '442424', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'cash', '2021-10-22 11:50:38', '2021-10-22 11:50:38', 0, 4, '2021-10-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'title', '442424', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'cash', '2021-10-22 11:51:09', '2021-10-22 11:51:09', 0, 4, '2021-10-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'title', '442424', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'cash', '2021-10-22 11:52:11', '2021-10-22 11:52:11', 0, 4, '2021-10-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'title', '442424', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'cash', '2021-10-22 12:01:35', '2021-10-22 12:01:35', 0, 4, '2021-10-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'title', '442424', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'cash', '2021-10-22 12:02:59', '2021-10-22 12:02:59', 0, 4, '2021-10-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'title', '442424', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'cash', '2021-10-22 12:03:27', '2021-10-22 12:03:27', 0, 4, '2021-10-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'title', '442424', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'cash', '2021-10-22 12:04:14', '2021-10-22 12:04:14', 0, 4, '2021-10-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'title', '442424', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'cash', '2021-10-22 12:05:24', '2021-10-22 12:05:24', 0, 4, '2021-10-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'title', '23232', 'sssds', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'cash', '2021-10-22 15:32:18', '2021-10-22 15:32:18', 0, 4, '2021-10-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'ahmed', '01090478832', 'mansoura', NULL, 4, NULL, 157, NULL, 2441, 0, 2441, 'cash', '2021-10-27 08:32:06', '2021-10-27 08:32:06', 0, 4, '2021-10-27', 'delivery', '551163276', NULL, NULL, NULL, NULL, NULL),
(16, 'fathy', '01212648022', 'mansoura', NULL, 3, NULL, 158, NULL, 5003, 0, 5003, 'cash', '2021-10-27 10:32:04', '2021-10-27 10:32:04', 0, 4, '2021-10-27', 'delivery', '265075394', NULL, NULL, NULL, NULL, NULL),
(17, 'fathy', '01212648022', 'mansoura', NULL, 3, NULL, 159, NULL, 5003, 0, 5003, 'cash', '2021-10-27 10:32:17', '2021-10-27 10:32:17', 0, 4, '2021-10-27', 'delivery', '140688571', NULL, NULL, NULL, NULL, NULL),
(18, 'fathy', '01212648022', 'mansoura', NULL, 3, NULL, 160, NULL, 5003, 0, 5003, 'cash', '2021-10-27 10:33:33', '2021-10-27 10:33:33', 0, 4, '2021-10-27', 'delivery', '225743853', NULL, NULL, NULL, NULL, NULL),
(19, 'fathy', '01212648022', 'mansoura', NULL, 3, NULL, 161, NULL, 5003, 0, 5003, 'cash', '2021-10-27 10:35:01', '2021-10-27 10:35:01', 0, 4, '2021-10-27', 'delivery', '488801672', NULL, NULL, NULL, NULL, NULL),
(20, 'fathy', '01212648022', 'mansoura', NULL, 3, NULL, 162, NULL, 5003, 0, 5003, 'cash', '2021-10-27 10:35:04', '2021-10-27 10:35:04', 0, 4, '2021-10-27', 'delivery', '425980682', NULL, NULL, NULL, NULL, NULL),
(21, 'fathy', '01212648022', 'mansoura', NULL, 3, NULL, 163, NULL, 5003, 0, 5003, 'cash', '2021-10-27 10:35:13', '2021-10-27 10:35:13', 0, 4, '2021-10-27', 'delivery', '732781267', NULL, NULL, NULL, NULL, NULL),
(22, 'fathy', '01212648022', 'dfdf', NULL, 3, NULL, 164, NULL, 5003, 0, 5003, 'cash', '2021-10-27 10:35:36', '2021-10-27 10:35:36', 0, 4, '2021-10-27', 'delivery', '164838744', NULL, NULL, NULL, NULL, NULL),
(23, 'fathy', '01212648022', 'dfdf', NULL, 3, NULL, 165, NULL, 5003, 0, 5003, 'cash', '2021-10-27 10:51:58', '2021-10-27 10:51:58', 0, 4, '2021-10-27', 'delivery', '228109595', NULL, NULL, NULL, NULL, NULL),
(24, 'fathy', '01212648022', 'df', NULL, 5, NULL, 166, NULL, 605, 0, 605, 'cash', '2021-10-28 14:38:18', '2021-10-28 14:38:18', 0, 4, '2021-10-28', 'delivery', '238694638', NULL, NULL, NULL, NULL, NULL),
(25, 'fathy', '01212648022', 'mansoura', NULL, 5, NULL, NULL, NULL, 605, 0, 605, 'cash', '2021-10-28 14:38:23', '2021-10-28 14:38:23', 0, 4, '2021-10-28', 'car', '262220169', NULL, NULL, NULL, NULL, NULL),
(26, 'fathy', '01212648022', 'mansoura', NULL, 5, NULL, NULL, NULL, 605, 0, 605, 'cash', '2021-10-28 14:43:04', '2021-10-28 14:43:04', 0, 4, '2021-10-28', 'car', '247649719', NULL, NULL, NULL, NULL, NULL),
(27, 'fathy', '01212648022', 'df', NULL, 5, NULL, 167, NULL, 605, 0, 605, 'cash', '2021-10-28 14:45:21', '2021-10-28 14:45:21', 0, 4, '2021-10-28', 'delivery', '766826728', NULL, NULL, NULL, NULL, NULL),
(28, 'fathy', '01212648022', 'df', NULL, 5, NULL, 168, NULL, 605, 0, 605, 'cash', '2021-10-28 14:48:17', '2021-10-28 14:48:17', 0, 4, '2021-10-28', 'delivery', '579057590', NULL, NULL, NULL, NULL, NULL),
(29, 'fathy', '01212648022', 'df', NULL, 5, NULL, 169, NULL, 605, 0, 605, 'cash', '2021-10-28 14:48:40', '2021-10-28 14:48:40', 0, 4, '2021-10-28', 'delivery', '631362439', NULL, NULL, NULL, NULL, NULL),
(30, 'fathy', '01212648022', 'df', NULL, 5, NULL, 170, NULL, 605, 0, 605, 'cash', '2021-10-28 14:49:09', '2021-10-28 14:49:09', 0, 4, '2021-10-28', 'delivery', '768216737', NULL, NULL, NULL, NULL, NULL),
(31, 'fathy', '01212648022', 'الغربية - المحلة الكبرى (قسم 2) - شارع البهلوان، المحلة الكبرى (قسم 2)، مركز المحله الكبرى، الغربية، مصر', NULL, 5, NULL, 171, NULL, 121, 0, 121, 'cash', '2021-11-03 01:05:31', '2021-11-03 01:05:31', 0, 4, '2021-11-03', 'delivery', '509227713', NULL, NULL, NULL, NULL, NULL),
(32, 'fathy', '01212648022', 'الغربية - المحلة الكبرى (قسم 2) - شارع البهلوان، المحلة الكبرى (قسم 2)، مركز المحله الكبرى، الغربية، مصر', NULL, 5, NULL, 172, NULL, 121, 0, 121, 'cash', '2021-11-03 01:06:10', '2021-11-03 01:06:10', 0, 4, '2021-11-03', 'delivery', '761735613', NULL, NULL, NULL, NULL, NULL),
(33, 'fathy', '01212648022', 'الغربية - المحلة الكبرى (قسم 2) - شارع الطباخين، المحلة الكبرى (قسم 2)، مركز المحله الكبرى، الغربية، مصر', NULL, 5, NULL, 173, NULL, 121, 0, 121, 'cash', '2021-11-03 01:08:11', '2021-11-03 01:08:11', 0, 4, '2021-11-03', 'delivery', '587662096', NULL, NULL, NULL, NULL, NULL),
(34, 'fathy', '01212648022', 'الغربية - المحلة الكبرى (قسم 2) - شارع الطباخين، المحلة الكبرى (قسم 2)، مركز المحله الكبرى، الغربية، مصر', NULL, 5, NULL, 174, NULL, 121, 0, 121, 'cash', '2021-11-03 01:08:25', '2021-11-03 01:08:25', 0, 4, '2021-11-03', 'delivery', '934763129', NULL, NULL, NULL, NULL, NULL),
(35, 'fathy', '01212648022', 'الغربية - المحلة الكبرى (قسم 2) - شارع البهلوان، المحلة الكبرى (قسم 2)، مركز المحله الكبرى، الغربية، مصر', NULL, 5, NULL, 175, NULL, 242, 0, 242, 'cash', '2021-11-03 01:26:36', '2021-11-03 01:26:36', 0, 4, '2021-11-03', 'delivery', '109752109', NULL, NULL, NULL, NULL, NULL),
(36, 'fathy', '01212648022', 'الغربية - المحلة الكبرى (قسم 2) - شارع البهلوان، المحلة الكبرى (قسم 2)، مركز المحله الكبرى، الغربية، مصر', NULL, 5, NULL, 176, NULL, 242, 0, 242, 'cash', '2021-11-03 01:28:31', '2021-11-03 01:28:31', 0, 4, '2021-11-03', 'delivery', '354451777', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_cars`
--

CREATE TABLE `order_cars` (
  `id` int(11) NOT NULL,
  `car_type` varchar(191) NOT NULL,
  `car_color` varchar(191) NOT NULL,
  `car_number` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `store_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_has_products`
--

CREATE TABLE `order_has_products` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_has_products`
--

INSERT INTO `order_has_products` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 1, 34, '2021-10-17 17:18:46', '2021-10-17 17:18:46'),
(2, 2, 4, 1, 34, '2021-10-17 17:18:55', '2021-10-17 17:18:55'),
(3, 3, 4, 1, 34, '2021-10-18 08:41:31', '2021-10-18 08:41:31'),
(4, 6, 26, 1, 211, '2021-10-22 11:50:38', '2021-10-22 11:50:38'),
(5, 7, 26, 1, 211, '2021-10-22 11:51:09', '2021-10-22 11:51:09'),
(6, 8, 26, 1, 211, '2021-10-22 11:52:12', '2021-10-22 11:52:12'),
(7, 9, 26, 1, 211, '2021-10-22 12:01:35', '2021-10-22 12:01:35'),
(8, 10, 26, 1, 211, '2021-10-22 12:02:59', '2021-10-22 12:02:59'),
(9, 11, 26, 1, 211, '2021-10-22 12:03:27', '2021-10-22 12:03:27'),
(10, 12, 26, 1, 211, '2021-10-22 12:04:15', '2021-10-22 12:04:15'),
(11, 13, 26, 1, 211, '2021-10-22 12:05:24', '2021-10-22 12:05:24'),
(12, 14, 26, 2, 211, '2021-10-22 15:32:18', '2021-10-22 15:32:18'),
(13, 14, 27, 1, 248, '2021-10-22 15:32:19', '2021-10-22 15:32:19'),
(14, 15, 26, 1, 2441, '2021-10-27 08:32:06', '2021-10-27 08:32:06'),
(15, 16, 26, 2, 4882, '2021-10-27 10:32:04', '2021-10-27 10:32:04'),
(16, 16, 43, 1, 4581, '2021-10-27 10:32:04', '2021-10-27 10:32:04'),
(17, 17, 26, 2, 4882, '2021-10-27 10:32:17', '2021-10-27 10:32:17'),
(18, 17, 43, 1, 4581, '2021-10-27 10:32:17', '2021-10-27 10:32:17'),
(19, 18, 26, 2, 4882, '2021-10-27 10:33:33', '2021-10-27 10:33:33'),
(20, 18, 43, 1, 4581, '2021-10-27 10:33:33', '2021-10-27 10:33:33'),
(21, 19, 26, 2, 4882, '2021-10-27 10:35:01', '2021-10-27 10:35:01'),
(22, 19, 43, 1, 4581, '2021-10-27 10:35:01', '2021-10-27 10:35:01'),
(23, 20, 26, 2, 4882, '2021-10-27 10:35:04', '2021-10-27 10:35:04'),
(24, 20, 43, 1, 4581, '2021-10-27 10:35:04', '2021-10-27 10:35:04'),
(25, 21, 26, 2, 4882, '2021-10-27 10:35:13', '2021-10-27 10:35:13'),
(26, 21, 43, 1, 4581, '2021-10-27 10:35:13', '2021-10-27 10:35:13'),
(27, 22, 26, 2, 4882, '2021-10-27 10:35:36', '2021-10-27 10:35:36'),
(28, 22, 43, 1, 4581, '2021-10-27 10:35:36', '2021-10-27 10:35:36'),
(29, 23, 26, 2, 4882, '2021-10-27 10:51:58', '2021-10-27 10:51:58'),
(30, 23, 43, 1, 4581, '2021-10-27 10:51:58', '2021-10-27 10:51:58'),
(31, 24, 43, 5, 605, '2021-10-28 14:38:18', '2021-10-28 14:38:18'),
(32, 25, 43, 5, 605, '2021-10-28 14:38:23', '2021-10-28 14:38:23'),
(33, 26, 43, 5, 605, '2021-10-28 14:43:04', '2021-10-28 14:43:04'),
(34, 27, 43, 5, 605, '2021-10-28 14:45:21', '2021-10-28 14:45:21'),
(35, 28, 43, 5, 605, '2021-10-28 14:48:17', '2021-10-28 14:48:17'),
(36, 29, 43, 5, 605, '2021-10-28 14:48:40', '2021-10-28 14:48:40'),
(37, 30, 43, 5, 605, '2021-10-28 14:49:09', '2021-10-28 14:49:09'),
(38, 31, 43, 1, 121, '2021-11-03 01:05:31', '2021-11-03 01:05:31'),
(39, 32, 43, 1, 121, '2021-11-03 01:06:10', '2021-11-03 01:06:10'),
(40, 33, 43, 1, 121, '2021-11-03 01:08:11', '2021-11-03 01:08:11'),
(41, 34, 43, 1, 121, '2021-11-03 01:08:25', '2021-11-03 01:08:25'),
(42, 35, 43, 2, 242, '2021-11-03 01:26:36', '2021-11-03 01:26:36'),
(43, 36, 43, 2, 242, '2021-11-03 01:28:31', '2021-11-03 01:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `order_products_has_extra_details`
--

CREATE TABLE `order_products_has_extra_details` (
  `id` int(11) NOT NULL,
  `OrderProductHasExtra_id` int(11) NOT NULL,
  `extradetail_id` int(11) NOT NULL,
  `price` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_products_has_extra_details`
--

INSERT INTO `order_products_has_extra_details` (`id`, `OrderProductHasExtra_id`, `extradetail_id`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 8, NULL, '2021-10-17 17:18:46', '2021-10-17 17:18:46'),
(2, 1, 9, NULL, '2021-10-17 17:18:46', '2021-10-17 17:18:46'),
(3, 2, 8, NULL, '2021-10-17 17:18:56', '2021-10-17 17:18:56'),
(4, 2, 9, NULL, '2021-10-17 17:18:56', '2021-10-17 17:18:56'),
(5, 3, 8, NULL, '2021-10-18 08:41:32', '2021-10-18 08:41:32'),
(6, 3, 9, NULL, '2021-10-18 08:41:32', '2021-10-18 08:41:32'),
(7, 5, 40, '998', '2021-10-22 11:52:12', '2021-10-22 11:52:12'),
(8, 5, 41, '170', '2021-10-22 11:52:12', '2021-10-22 11:52:12'),
(9, 6, 40, '998', '2021-10-22 12:01:35', '2021-10-22 12:01:35'),
(10, 6, 41, '170', '2021-10-22 12:01:35', '2021-10-22 12:01:35'),
(11, 7, 40, '998', '2021-10-22 12:02:59', '2021-10-22 12:02:59'),
(12, 7, 41, '170', '2021-10-22 12:03:00', '2021-10-22 12:03:00'),
(13, 8, 40, '998', '2021-10-22 12:03:27', '2021-10-22 12:03:27'),
(14, 8, 41, '170', '2021-10-22 12:03:27', '2021-10-22 12:03:27'),
(15, 9, 40, '998', '2021-10-22 12:04:15', '2021-10-22 12:04:15'),
(16, 9, 41, '170', '2021-10-22 12:04:15', '2021-10-22 12:04:15'),
(17, 10, 40, '998', '2021-10-22 12:05:24', '2021-10-22 12:05:24'),
(18, 10, 41, '170', '2021-10-22 12:05:24', '2021-10-22 12:05:24'),
(19, 11, 40, '998', '2021-10-22 15:32:18', '2021-10-22 15:32:18'),
(20, 11, 41, '170', '2021-10-22 15:32:19', '2021-10-22 15:32:19'),
(21, 12, 34, '117', '2021-10-22 15:32:19', '2021-10-22 15:32:19'),
(22, 13, 40, '998', '2021-10-22 15:32:20', '2021-10-22 15:32:20'),
(23, 13, 41, '170', '2021-10-22 15:32:20', '2021-10-22 15:32:20'),
(24, 14, 34, '117', '2021-10-22 15:32:20', '2021-10-22 15:32:20'),
(25, 16, 34, NULL, '2021-10-27 08:32:06', '2021-10-27 08:32:06'),
(26, 16, 40, NULL, '2021-10-27 08:32:06', '2021-10-27 08:32:06'),
(27, 18, 34, NULL, '2021-10-27 10:32:04', '2021-10-27 10:32:04'),
(28, 18, 40, NULL, '2021-10-27 10:32:04', '2021-10-27 10:32:04'),
(29, 20, 34, NULL, '2021-10-27 10:32:17', '2021-10-27 10:32:17'),
(30, 20, 40, NULL, '2021-10-27 10:32:17', '2021-10-27 10:32:17'),
(31, 22, 34, NULL, '2021-10-27 10:33:33', '2021-10-27 10:33:33'),
(32, 22, 40, NULL, '2021-10-27 10:33:33', '2021-10-27 10:33:33'),
(33, 24, 34, NULL, '2021-10-27 10:35:01', '2021-10-27 10:35:01'),
(34, 24, 40, NULL, '2021-10-27 10:35:01', '2021-10-27 10:35:01'),
(35, 26, 34, NULL, '2021-10-27 10:35:04', '2021-10-27 10:35:04'),
(36, 26, 40, NULL, '2021-10-27 10:35:04', '2021-10-27 10:35:04'),
(37, 28, 34, NULL, '2021-10-27 10:35:13', '2021-10-27 10:35:13'),
(38, 28, 40, NULL, '2021-10-27 10:35:13', '2021-10-27 10:35:13'),
(39, 30, 34, NULL, '2021-10-27 10:35:36', '2021-10-27 10:35:36'),
(40, 30, 40, NULL, '2021-10-27 10:35:36', '2021-10-27 10:35:36'),
(41, 32, 34, NULL, '2021-10-27 10:51:58', '2021-10-27 10:51:58'),
(42, 32, 40, NULL, '2021-10-27 10:51:58', '2021-10-27 10:51:58');

-- --------------------------------------------------------

--
-- Table structure for table `order_product_has_extra`
--

CREATE TABLE `order_product_has_extra` (
  `id` int(11) NOT NULL,
  `OrderHasProduct_id` int(11) NOT NULL,
  `extra_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_product_has_extra`
--

INSERT INTO `order_product_has_extra` (`id`, `OrderHasProduct_id`, `extra_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-10-17 17:18:46', '2021-10-17 17:18:46'),
(2, 2, 1, '2021-10-17 17:18:55', '2021-10-17 17:18:55'),
(3, 3, 1, '2021-10-18 08:41:32', '2021-10-18 08:41:32'),
(4, 5, 48, '2021-10-22 11:51:10', '2021-10-22 11:51:10'),
(5, 6, 48, '2021-10-22 11:52:12', '2021-10-22 11:52:12'),
(6, 7, 48, '2021-10-22 12:01:35', '2021-10-22 12:01:35'),
(7, 8, 48, '2021-10-22 12:02:59', '2021-10-22 12:02:59'),
(8, 9, 48, '2021-10-22 12:03:27', '2021-10-22 12:03:27'),
(9, 10, 48, '2021-10-22 12:04:15', '2021-10-22 12:04:15'),
(10, 11, 48, '2021-10-22 12:05:24', '2021-10-22 12:05:24'),
(11, 12, 48, '2021-10-22 15:32:18', '2021-10-22 15:32:18'),
(12, 12, 41, '2021-10-22 15:32:19', '2021-10-22 15:32:19'),
(13, 13, 48, '2021-10-22 15:32:19', '2021-10-22 15:32:19'),
(14, 13, 41, '2021-10-22 15:32:20', '2021-10-22 15:32:20'),
(15, 14, 41, '2021-10-27 08:32:06', '2021-10-27 08:32:06'),
(16, 14, 48, '2021-10-27 08:32:06', '2021-10-27 08:32:06'),
(17, 15, 41, '2021-10-27 10:32:04', '2021-10-27 10:32:04'),
(18, 15, 48, '2021-10-27 10:32:04', '2021-10-27 10:32:04'),
(19, 17, 41, '2021-10-27 10:32:17', '2021-10-27 10:32:17'),
(20, 17, 48, '2021-10-27 10:32:17', '2021-10-27 10:32:17'),
(21, 19, 41, '2021-10-27 10:33:33', '2021-10-27 10:33:33'),
(22, 19, 48, '2021-10-27 10:33:33', '2021-10-27 10:33:33'),
(23, 21, 41, '2021-10-27 10:35:01', '2021-10-27 10:35:01'),
(24, 21, 48, '2021-10-27 10:35:01', '2021-10-27 10:35:01'),
(25, 23, 41, '2021-10-27 10:35:04', '2021-10-27 10:35:04'),
(26, 23, 48, '2021-10-27 10:35:04', '2021-10-27 10:35:04'),
(27, 25, 41, '2021-10-27 10:35:13', '2021-10-27 10:35:13'),
(28, 25, 48, '2021-10-27 10:35:13', '2021-10-27 10:35:13'),
(29, 27, 41, '2021-10-27 10:35:36', '2021-10-27 10:35:36'),
(30, 27, 48, '2021-10-27 10:35:36', '2021-10-27 10:35:36'),
(31, 29, 41, '2021-10-27 10:51:58', '2021-10-27 10:51:58'),
(32, 29, 48, '2021-10-27 10:51:58', '2021-10-27 10:51:58');

-- --------------------------------------------------------

--
-- Table structure for table `order_rates`
--

CREATE TABLE `order_rates` (
  `id` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `store_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_rates`
--

INSERT INTO `order_rates` (`id`, `rate`, `comment`, `created_at`, `updated_at`, `store_id`, `customer_id`) VALUES
(1, 4, 'message', '2021-10-18 08:48:13', '2021-10-18 08:48:13', 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(10) UNSIGNED NOT NULL,
  `monthprice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `3monthprice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `6monthprice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yearprice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packages_featurepackage`
--

CREATE TABLE `packages_featurepackage` (
  `id` int(10) UNSIGNED NOT NULL,
  `package_id` int(10) UNSIGNED DEFAULT NULL,
  `featurepackage_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package_translations`
--

CREATE TABLE `package_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packeges_features`
--

CREATE TABLE `packeges_features` (
  `id` int(10) UNSIGNED NOT NULL,
  `kindoffeature_id` int(10) UNSIGNED DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `paymentways`
--

CREATE TABLE `paymentways` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paymentways`
--

INSERT INTO `paymentways` (`id`, `created_at`, `updated_at`) VALUES
(1, '2021-10-11 20:49:08', '2021-10-11 20:49:08');

-- --------------------------------------------------------

--
-- Table structure for table `paymentway_translations`
--

CREATE TABLE `paymentway_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymentway_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paymentway_translations`
--

INSERT INTO `paymentway_translations` (`id`, `title`, `locale`, `paymentway_id`, `created_at`, `updated_at`) VALUES
(1, 'zone', 'en', 1, '2021-10-11 20:49:08', '2021-10-11 20:49:08'),
(2, 'sيص', 'ar', 1, '2021-10-11 20:49:08', '2021-10-11 20:49:08');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `privacy`
--

CREATE TABLE `privacy` (
  `id` int(10) UNSIGNED NOT NULL,
  `store_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `privacy`
--

INSERT INTO `privacy` (`id`, `store_id`, `created_at`, `updated_at`) VALUES
(1, 4, '2021-10-25 19:35:57', '2021-10-25 19:35:57');

-- --------------------------------------------------------

--
-- Table structure for table `privacy_translations`
--

CREATE TABLE `privacy_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `privacy_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `privacy_translations`
--

INSERT INTO `privacy_translations` (`id`, `locale`, `text`, `privacy_id`, `created_at`, `updated_at`) VALUES
(1, 'en', 'sasa', 1, '2021-10-25 19:35:58', '2021-10-25 19:35:58'),
(2, 'ar', 'assasa', 1, '2021-10-25 19:35:58', '2021-10-25 19:35:58');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `store_id` int(10) UNSIGNED DEFAULT NULL,
  `branch_id` int(10) UNSIGNED DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `preparation_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calories` int(11) DEFAULT NULL,
  `default_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `is_offer` tinyint(4) DEFAULT 0,
  `add_id` int(10) UNSIGNED DEFAULT NULL,
  `is_price` tinyint(1) DEFAULT 1,
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `store_id`, `branch_id`, `image`, `category_id`, `preparation_time`, `calories`, `default_price`, `is_offer`, `add_id`, `is_price`, `status`, `created_at`, `updated_at`) VALUES
(26, 4, NULL, 'uploads/products/1634903919.png', 4, '34', 43, '211', 0, NULL, 1, 0, '2021-10-18 09:02:32', '2021-10-22 09:58:39'),
(27, 4, NULL, 'uploads/products/1634561109.jpeg', 4, '44', 100, '248', 0, NULL, 1, 0, '2021-10-18 10:45:08', '2021-10-18 10:45:09'),
(43, 4, NULL, 'uploads/adds/1635015769.png', 5, NULL, NULL, '121', 1, 18, 1, 0, '2021-10-23 17:02:49', '2021-10-23 17:02:49');

-- --------------------------------------------------------

--
-- Table structure for table `products_tags`
--

CREATE TABLE `products_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_tags`
--

INSERT INTO `products_tags` (`id`, `product_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 26, 1, NULL, NULL),
(18, 43, 1, NULL, NULL),
(19, 43, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_rates`
--

CREATE TABLE `product_rates` (
  `id` int(11) NOT NULL,
  `rate` int(11) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `store_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_translations`
--

CREATE TABLE `product_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_translations`
--

INSERT INTO `product_translations` (`id`, `created_at`, `updated_at`, `product_id`, `locale`, `title`, `description`) VALUES
(51, '2021-10-18 09:02:33', '2021-10-18 09:02:33', 26, 'en', 'Quo veniam reprehen', NULL),
(52, '2021-10-18 09:02:33', '2021-10-18 09:02:33', 26, 'ar', 'Necessitatibus perfe', NULL),
(53, '2021-10-18 10:45:08', '2021-10-18 10:45:08', 27, 'en', 'Blanditiis quis expe', NULL),
(54, '2021-10-18 10:45:08', '2021-10-18 10:45:08', 27, 'ar', 'Cum duis numquam qui', NULL),
(85, '2021-10-23 17:02:49', '2021-10-23 17:02:49', 43, 'en', 'kn', NULL),
(86, '2021-10-23 17:02:49', '2021-10-23 17:02:49', 43, 'ar', 'bj', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `store_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `store_id`, `created_at`, `updated_at`) VALUES
(1, 4, '2021-10-27 10:01:24', '2021-10-27 10:01:24');

-- --------------------------------------------------------

--
-- Table structure for table `question_translations`
--

CREATE TABLE `question_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text DEFAULT NULL,
  `text` text DEFAULT NULL,
  `locale` varchar(191) DEFAULT NULL,
  `question_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_translations`
--

INSERT INTO `question_translations` (`id`, `title`, `text`, `locale`, `question_id`, `created_at`, `updated_at`) VALUES
(1, 'ewwe', 'ewewweweew', 'en', 1, '2021-10-27 10:01:24', '2021-10-27 10:01:24'),
(2, 'weew', 'weewewew', 'ar', 1, '2021-10-27 10:01:24', '2021-10-27 10:01:24');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `serverurl` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `serverurl`, `created_at`, `updated_at`) VALUES
(1, 'https://stackoverflow.com/questions/25743994/syntaxerror-json-parse-unexpected-character-at-line-1-column-1-of-the-json-dat/27939239', '2021-10-10 21:39:28', '2021-10-10 19:41:00');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `created_at`, `updated_at`) VALUES
(1, '2021-10-09 15:28:39', '2021-10-09 15:28:39'),
(4, '2021-10-10 17:34:16', '2021-10-10 17:34:16');

-- --------------------------------------------------------

--
-- Table structure for table `state_translations`
--

CREATE TABLE `state_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `state_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `state_translations`
--

INSERT INTO `state_translations` (`id`, `state_id`, `locale`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'cairo', '2021-10-09 15:28:39', '2021-10-09 15:28:39'),
(2, 1, 'ar', 'الدقهليه', '2021-10-09 15:28:39', '2021-10-09 17:21:27'),
(7, 4, 'en', 'الدقهليه', '2021-10-10 17:34:16', '2021-10-10 17:34:16'),
(8, 4, 'ar', 'الدقهليه', '2021-10-10 17:34:16', '2021-10-10 17:34:16');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `responsible_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `responsible_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `major_id` int(10) UNSIGNED DEFAULT NULL,
  `cr_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `zone_id` int(10) UNSIGNED DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sales_officer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lon` double DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_key` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `created_at`, `updated_at`, `name`, `responsible_name`, `responsible_phone`, `major_id`, `cr_no`, `tax_number`, `phone`, `email`, `state_id`, `city_id`, `zone_id`, `address`, `password`, `contract_image`, `sales_officer`, `lat`, `lon`, `logo`, `comment`, `api_key`, `currency`) VALUES
(1, '2021-10-12 21:09:35', '2021-10-13 22:37:45', 'Marcia Horton', 'Kane Riley', '33223', 1, '40', '763', '27', 'ehabtalaat@gmail.com', 1, 2, 4, NULL, NULL, 'uploads/stores/1634171865.png', 'Quia harum neque min', NULL, NULL, 'uploads/stores/1634171865.png', 'Cum deserunt excepte', NULL, NULL),
(4, '2021-10-16 15:37:40', '2021-10-16 15:37:41', 'Rinah Torres', 'Ian Mcfadden', '32', 1, '23', '353', '0101010', 'cuzulami@mailinator.com', 1, 2, 4, NULL, '$2y$10$F7uFkKMgUgHTBK57XVLeDOT.FDEU17ykGU4Tj1tiPSi781BMM7QJ6', 'uploads/stores/1634405861.png', 'Adipisci blanditiis', NULL, NULL, 'uploads/stores/1634405861.png', 'Omnis eiusmod conseq', '123456789', 'eg');

-- --------------------------------------------------------

--
-- Table structure for table `stores_languages`
--

CREATE TABLE `stores_languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `store_id` int(10) UNSIGNED NOT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores_languages`
--

INSERT INTO `stores_languages` (`id`, `created_at`, `updated_at`, `store_id`, `lang`, `title`, `image`) VALUES
(4, '2021-10-13 22:37:45', '2021-10-13 22:37:45', 1, 'en', 'اللغه الانجليزيه', NULL),
(5, '2021-10-13 22:37:45', '2021-10-13 22:37:45', 1, 'ar', 'اللغه العربيه', NULL),
(6, '2021-10-16 15:37:40', '2021-10-16 15:37:40', 4, 'en', 'اللغه الانجليزيه', NULL),
(7, '2021-10-16 15:37:40', '2021-10-16 15:37:40', 4, 'ar', 'اللغه العربيه', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `storetables`
--

CREATE TABLE `storetables` (
  `id` int(10) UNSIGNED NOT NULL,
  `store_id` int(10) UNSIGNED DEFAULT NULL,
  `branch_id` int(10) UNSIGNED DEFAULT NULL,
  `tablenumber` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `storetables`
--

INSERT INTO `storetables` (`id`, `store_id`, `branch_id`, `tablenumber`, `created_at`, `updated_at`) VALUES
(1, 4, 3, 2, '2021-10-28 08:34:13', '2021-10-28 08:34:13');

-- --------------------------------------------------------

--
-- Table structure for table `store_branches`
--

CREATE TABLE `store_branches` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_id` int(10) UNSIGNED NOT NULL,
  `lat` double DEFAULT NULL,
  `lon` double DEFAULT NULL,
  `state_id` int(10) UNSIGNED DEFAULT NULL,
  `city_id` int(10) UNSIGNED DEFAULT NULL,
  `zone_id` int(10) UNSIGNED DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whats_up` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store_branches`
--

INSERT INTO `store_branches` (`id`, `created_at`, `updated_at`, `name`, `store_id`, `lat`, `lon`, `state_id`, `city_id`, `zone_id`, `address`, `phone`, `whats_up`, `image`) VALUES
(3, '2021-10-19 18:26:30', '2021-10-20 07:19:21', 'فرع سيد', 4, 25.3769111601609, 49.59477424621582, 1, 4, 5, 'Voluptate pariatur', '37', '454545', 'uploads/branches/1634675190.png');

-- --------------------------------------------------------

--
-- Table structure for table `store_callus`
--

CREATE TABLE `store_callus` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `type` varchar(191) DEFAULT NULL COMMENT '1 or 2 or 3',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `store_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store_callus`
--

INSERT INTO `store_callus` (`id`, `title`, `type`, `created_at`, `updated_at`, `store_id`) VALUES
(1, '01090478832', '1', '2021-10-28 14:11:33', '2021-10-28 14:11:33', 4),
(2, 'ahmed@gmail.com', '2', '2021-10-28 14:11:33', '2021-10-28 14:11:33', 4),
(3, '01090478832', '3', '2021-10-28 14:11:33', '2021-10-28 14:11:33', 4);

-- --------------------------------------------------------

--
-- Table structure for table `store_employees`
--

CREATE TABLE `store_employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_id` int(10) UNSIGNED DEFAULT NULL,
  `branch_id` int(10) UNSIGNED DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store_employees`
--

INSERT INTO `store_employees` (`id`, `name`, `email`, `phone`, `store_id`, `branch_id`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Rinah Torres', 'cuzulami@mailinator.com', '0101010', 4, NULL, '$2y$10$Tys/Ur8rq4q041AwLgFREOMc/64/syYZVcGSHOYp3Sus6vFrJtZ9a', NULL, 'NJTueUJwqqfEtVsjJ9hKGmc25P6CSs4aIIAyH9LGHnELvykloixP9azEnx3Y', '2021-10-16 15:37:42', '2021-10-16 15:37:42'),
(3, 'احمد', 'ehabtalaat@gmail.com', '01011010', 4, 3, '$2y$10$U8vN7fVRrCd9Zfz2KzQHPeyKYWDmF0ahXS.Lg13bJKfhAhnAhN0Ie', NULL, NULL, '2021-10-20 08:29:20', '2021-10-20 08:29:20');

-- --------------------------------------------------------

--
-- Table structure for table `store_settings`
--

CREATE TABLE `store_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `least_price` varchar(191) DEFAULT NULL,
  `active` smallint(6) DEFAULT 0,
  `taxes` varchar(191) DEFAULT NULL,
  `store_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `store_settings`
--

INSERT INTO `store_settings` (`id`, `least_price`, `active`, `taxes`, `store_id`, `created_at`, `updated_at`) VALUES
(4, '55', 1, NULL, 4, '2021-10-20 06:36:30', '2021-10-20 06:45:43');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `store_id` int(10) UNSIGNED DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `store_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 4, NULL, '2021-10-17 09:38:00', '2021-10-17 09:38:00');

-- --------------------------------------------------------

--
-- Table structure for table `tag_translations`
--

CREATE TABLE `tag_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tag_translations`
--

INSERT INTO `tag_translations` (`id`, `created_at`, `updated_at`, `title`, `locale`, `tag_id`) VALUES
(1, '2021-10-17 09:38:00', '2021-10-17 09:38:00', 'تاج en', 'en', 1),
(2, '2021-10-17 09:38:00', '2021-10-17 09:38:00', 'تاج ar', 'ar', 1);

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` int(10) UNSIGNED NOT NULL,
  `store_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `store_id`, `created_at`, `updated_at`) VALUES
(1, 4, '2021-10-25 19:35:44', '2021-10-25 19:35:44');

-- --------------------------------------------------------

--
-- Table structure for table `term_translations`
--

CREATE TABLE `term_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `term_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `term_translations`
--

INSERT INTO `term_translations` (`id`, `locale`, `text`, `term_id`, `created_at`, `updated_at`) VALUES
(1, 'en', 'sas', 1, '2021-10-25 19:35:44', '2021-10-25 19:35:44'),
(2, 'ar', 'assa', 1, '2021-10-25 19:35:44', '2021-10-25 19:35:44');

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

-- --------------------------------------------------------

--
-- Table structure for table `workshifts`
--

CREATE TABLE `workshifts` (
  `id` int(10) UNSIGNED NOT NULL,
  `store_id` int(10) UNSIGNED DEFAULT NULL,
  `fromtime` time DEFAULT NULL,
  `totime` time DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `workshifts`
--

INSERT INTO `workshifts` (`id`, `store_id`, `fromtime`, `totime`, `created_at`, `updated_at`) VALUES
(1, 4, '08:16:00', '20:11:00', '2021-10-25 17:15:20', '2021-10-25 17:17:16');

-- --------------------------------------------------------

--
-- Table structure for table `workshift_translations`
--

CREATE TABLE `workshift_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `locale` varchar(191) DEFAULT NULL,
  `workshift_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `workshift_translations`
--

INSERT INTO `workshift_translations` (`id`, `title`, `locale`, `workshift_id`, `created_at`, `updated_at`) VALUES
(1, 'kn', 'en', 1, '2021-10-25 17:15:20', '2021-10-25 17:15:20'),
(2, 'ماكولات شعبيه ar', 'ar', 1, '2021-10-25 17:15:20', '2021-10-25 17:15:20');

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id` int(10) UNSIGNED NOT NULL,
  `state_id` int(10) UNSIGNED NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id`, `state_id`, `city_id`, `text`, `store_id`, `created_at`, `updated_at`) VALUES
(4, 1, 2, '[{\"lat\":30.174889715538647,\"lng\":31.023220474609367},{\"lat\":30.16420430525067,\"lng\":31.10630458105468},{\"lat\":30.053720619781732,\"lng\":31.06785243261718},{\"lat\":30.174889715538647,\"lng\":31.023220474609367}]', NULL, '2021-10-10 18:47:12', '2021-10-10 18:47:12'),
(5, 1, 4, '[{\"lat\":29.963757650287626,\"lng\":30.888637955078117},{\"lat\":30.012524974754054,\"lng\":31.178402359374992},{\"lat\":29.810162937013907,\"lng\":31.164669449218742},{\"lat\":29.963757650287626,\"lng\":30.888637955078117}]', 4, '2021-10-18 19:11:32', '2021-10-18 19:11:32'),
(6, 1, 2, '[{\"lat\":30.1721986891378,\"lng\":30.988888199218742},{\"lat\":30.110443095354892,\"lng\":31.113857681640617},{\"lat\":29.984437125370857,\"lng\":31.003994400390617},{\"lat\":30.1721986891378,\"lng\":30.988888199218742}]', 4, '2021-10-24 18:26:38', '2021-10-24 18:26:38');

-- --------------------------------------------------------

--
-- Table structure for table `zones_prices`
--

CREATE TABLE `zones_prices` (
  `id` int(11) NOT NULL,
  `zone_id` int(10) UNSIGNED DEFAULT NULL,
  `store_id` int(10) UNSIGNED DEFAULT NULL,
  `price` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zones_prices`
--

INSERT INTO `zones_prices` (`id`, `zone_id`, `store_id`, `price`, `created_at`, `updated_at`) VALUES
(2, 5, 4, '11', '2021-10-18 19:11:33', '2021-10-18 19:11:33');

-- --------------------------------------------------------

--
-- Table structure for table `zone_translations`
--

CREATE TABLE `zone_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zone_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zone_translations`
--

INSERT INTO `zone_translations` (`id`, `title`, `locale`, `zone_id`, `created_at`, `updated_at`) VALUES
(7, 'dsds', 'en', 4, '2021-10-10 18:47:13', '2021-10-10 19:08:43'),
(8, 'dsds', 'ar', 4, '2021-10-10 18:47:13', '2021-10-10 19:08:43'),
(9, 'kn', 'en', 5, '2021-10-18 19:11:32', '2021-10-18 19:11:32'),
(10, 'منطقه', 'ar', 5, '2021-10-18 19:11:32', '2021-10-18 19:11:32'),
(11, 's', 'en', 6, '2021-10-24 18:26:38', '2021-10-24 18:26:38'),
(12, 'ss', 'ar', 6, '2021-10-24 18:26:38', '2021-10-24 18:26:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seller_idfk212` (`store_id`);

--
-- Indexes for table `about_translations`
--
ALTER TABLE `about_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `about_idfk2` (`about_id`);

--
-- Indexes for table `adds`
--
ALTER TABLE `adds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adds_translations`
--
ALTER TABLE `adds_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adds_idfk22` (`adds_id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `areas_zone_id_foreign` (`zone_id`),
  ADD KEY `areas_state_id_foreign` (`state_id`),
  ADD KEY `areas_city_id_foreign` (`city_id`);

--
-- Indexes for table `callcenter_order_address`
--
ALTER TABLE `callcenter_order_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `call_centers`
--
ALTER TABLE `call_centers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product-cart-fk` (`product_id`),
  ADD KEY `customer-fk-cart` (`customer_id`),
  ADD KEY `coupon_id-fk` (`coupon_id`);

--
-- Indexes for table `cart_product_extra`
--
ALTER TABLE `cart_product_extra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id-fk` (`cart_id`);

--
-- Indexes for table `cart_product_extradetails`
--
ALTER TABLE `cart_product_extradetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_store_id_foreign` (`store_id`);

--
-- Indexes for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_translations_category_id_foreign` (`category_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_state_id_foreign` (`state_id`);

--
-- Indexes for table `city_translations`
--
ALTER TABLE `city_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_translations_city_id_foreign` (`city_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coupons_store_id_foreign` (`store_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers_coupons`
--
ALTER TABLE `customers_coupons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coupons_store_id_foreign` (`store_id`);

--
-- Indexes for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_address_customer1_idx` (`customer_id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discounts_product_id_foreign` (`product_id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_expensetype_id_foreign` (`expensetype_id`);

--
-- Indexes for table `expenses_types`
--
ALTER TABLE `expenses_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expensetype_translations`
--
ALTER TABLE `expensetype_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expensetype_translations_expensetype_id_foreign` (`expensetype_id`);

--
-- Indexes for table `expense_translations`
--
ALTER TABLE `expense_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extradetail_translations`
--
ALTER TABLE `extradetail_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `extradetail_translations_extradetail_id_foreign` (`extradetail_id`);

--
-- Indexes for table `extras`
--
ALTER TABLE `extras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `extras_product_id_foreign` (`product_id`);

--
-- Indexes for table `extra_details`
--
ALTER TABLE `extra_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `extra_details_extra_id_foreign` (`extra_id`);

--
-- Indexes for table `extra_translations`
--
ALTER TABLE `extra_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `extra_translations_exra_id_foreign` (`exra_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favorite_products`
--
ALTER TABLE `favorite_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorite_products_product_id_foreign` (`product_id`),
  ADD KEY `favorite_products_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `features_texts`
--
ALTER TABLE `features_texts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `features_texts_packagefeature_id_foreign` (`packagefeature_id`);

--
-- Indexes for table `featuretext_translations`
--
ALTER TABLE `featuretext_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `featuretext_translations_featuretext_id_foreign` (`featuretext_id`);

--
-- Indexes for table `kindoffeature_translations`
--
ALTER TABLE `kindoffeature_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kindoffeature_translations_kindoffeature_id_foreign` (`kindoffeature_id`);

--
-- Indexes for table `kinds_of_features`
--
ALTER TABLE `kinds_of_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `major_translations`
--
ALTER TABLE `major_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `major_translations_major_id_foreign` (`major_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `store_idfk55` (`store_id`);

--
-- Indexes for table `notifications_customers`
--
ALTER TABLE `notifications_customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notification_idfk22` (`notification_id`),
  ADD KEY `customer_idfk33` (`customer_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers_stores`
--
ALTER TABLE `offers_stores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offers_stores_offer_id_foreign` (`offer_id`),
  ADD KEY `offers_stores_store_id_foreign` (`store_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_cars`
--
ALTER TABLE `order_cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_has_products`
--
ALTER TABLE `order_has_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products_has_extra_details`
--
ALTER TABLE `order_products_has_extra_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_product_has_extra`
--
ALTER TABLE `order_product_has_extra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_rates`
--
ALTER TABLE `order_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages_featurepackage`
--
ALTER TABLE `packages_featurepackage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `packages_featurepackage_package_id_foreign` (`package_id`),
  ADD KEY `packages_featurepackage_featurepackage_id_foreign` (`featurepackage_id`);

--
-- Indexes for table `package_translations`
--
ALTER TABLE `package_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_translations_package_id_foreign` (`package_id`);

--
-- Indexes for table `packeges_features`
--
ALTER TABLE `packeges_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `packeges_features_kindoffeature_id_foreign` (`kindoffeature_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `paymentways`
--
ALTER TABLE `paymentways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentway_translations`
--
ALTER TABLE `paymentway_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paymentway_translations_paymentway_id_foreign` (`paymentway_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `privacy`
--
ALTER TABLE `privacy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privacy_translations`
--
ALTER TABLE `privacy_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `privacy_idfk2` (`privacy_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_branch_id_foreign` (`branch_id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_store_id_foreign` (`store_id`),
  ADD KEY `add_idfk12` (`add_id`);

--
-- Indexes for table `products_tags`
--
ALTER TABLE `products_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_tags_product_id_foreign` (`product_id`),
  ADD KEY `products_tags_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `product_rates`
--
ALTER TABLE `product_rates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productId-fk3` (`product_id`),
  ADD KEY `customerid2-fk` (`customer_id`);

--
-- Indexes for table `product_translations`
--
ALTER TABLE `product_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_translations_product_id_foreign` (`product_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `store_idfk322` (`store_id`);

--
-- Indexes for table `question_translations`
--
ALTER TABLE `question_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_idfk` (`question_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state_translations`
--
ALTER TABLE `state_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_translations_state_id_foreign` (`state_id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores_languages`
--
ALTER TABLE `stores_languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stores_languages_store_id_foreign` (`store_id`);

--
-- Indexes for table `storetables`
--
ALTER TABLE `storetables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `store_idfk3223` (`store_id`),
  ADD KEY `branch_idfk21` (`branch_id`);

--
-- Indexes for table `store_branches`
--
ALTER TABLE `store_branches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `store_branches_store_id_foreign` (`store_id`),
  ADD KEY `store_branches_zone_id_foreign` (`zone_id`);

--
-- Indexes for table `store_callus`
--
ALTER TABLE `store_callus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_employees`
--
ALTER TABLE `store_employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `store_employees_store_id_foreign` (`store_id`);

--
-- Indexes for table `store_settings`
--
ALTER TABLE `store_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tags_store_id_foreign` (`store_id`);

--
-- Indexes for table `tag_translations`
--
ALTER TABLE `tag_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tag_translations_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `store_idfk32` (`store_id`);

--
-- Indexes for table `term_translations`
--
ALTER TABLE `term_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `term_idfk` (`term_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `workshifts`
--
ALTER TABLE `workshifts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `store_idfk3` (`store_id`);

--
-- Indexes for table `workshift_translations`
--
ALTER TABLE `workshift_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `workshift_id` (`workshift_id`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zones_state_id_foreign` (`state_id`),
  ADD KEY `zones_city_id_foreign` (`city_id`);

--
-- Indexes for table `zones_prices`
--
ALTER TABLE `zones_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zone_idfk20` (`zone_id`),
  ADD KEY `store_idfk22` (`store_id`);

--
-- Indexes for table `zone_translations`
--
ALTER TABLE `zone_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zone_translations_zone_id_foreign` (`zone_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `about_translations`
--
ALTER TABLE `about_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `adds`
--
ALTER TABLE `adds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `adds_translations`
--
ALTER TABLE `adds_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `callcenter_order_address`
--
ALTER TABLE `callcenter_order_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `call_centers`
--
ALTER TABLE `call_centers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cart_product_extra`
--
ALTER TABLE `cart_product_extra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart_product_extradetails`
--
ALTER TABLE `cart_product_extradetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category_translations`
--
ALTER TABLE `category_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `city_translations`
--
ALTER TABLE `city_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `customers_coupons`
--
ALTER TABLE `customers_coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses_types`
--
ALTER TABLE `expenses_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expensetype_translations`
--
ALTER TABLE `expensetype_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expense_translations`
--
ALTER TABLE `expense_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `extradetail_translations`
--
ALTER TABLE `extradetail_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `extras`
--
ALTER TABLE `extras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `extra_details`
--
ALTER TABLE `extra_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `extra_translations`
--
ALTER TABLE `extra_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorite_products`
--
ALTER TABLE `favorite_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `features_texts`
--
ALTER TABLE `features_texts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `featuretext_translations`
--
ALTER TABLE `featuretext_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kindoffeature_translations`
--
ALTER TABLE `kindoffeature_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kinds_of_features`
--
ALTER TABLE `kinds_of_features`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `majors`
--
ALTER TABLE `majors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `major_translations`
--
ALTER TABLE `major_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notifications_customers`
--
ALTER TABLE `notifications_customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offers_stores`
--
ALTER TABLE `offers_stores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `order_cars`
--
ALTER TABLE `order_cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_has_products`
--
ALTER TABLE `order_has_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `order_products_has_extra_details`
--
ALTER TABLE `order_products_has_extra_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `order_product_has_extra`
--
ALTER TABLE `order_product_has_extra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `order_rates`
--
ALTER TABLE `order_rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packages_featurepackage`
--
ALTER TABLE `packages_featurepackage`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package_translations`
--
ALTER TABLE `package_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packeges_features`
--
ALTER TABLE `packeges_features`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymentways`
--
ALTER TABLE `paymentways`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `paymentway_translations`
--
ALTER TABLE `paymentway_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privacy`
--
ALTER TABLE `privacy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `privacy_translations`
--
ALTER TABLE `privacy_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `products_tags`
--
ALTER TABLE `products_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product_rates`
--
ALTER TABLE `product_rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_translations`
--
ALTER TABLE `product_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `question_translations`
--
ALTER TABLE `question_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `state_translations`
--
ALTER TABLE `state_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stores_languages`
--
ALTER TABLE `stores_languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `storetables`
--
ALTER TABLE `storetables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `store_branches`
--
ALTER TABLE `store_branches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `store_callus`
--
ALTER TABLE `store_callus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `store_employees`
--
ALTER TABLE `store_employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `store_settings`
--
ALTER TABLE `store_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tag_translations`
--
ALTER TABLE `tag_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `term_translations`
--
ALTER TABLE `term_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `workshifts`
--
ALTER TABLE `workshifts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `workshift_translations`
--
ALTER TABLE `workshift_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `zones_prices`
--
ALTER TABLE `zones_prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `zone_translations`
--
ALTER TABLE `zone_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `about`
--
ALTER TABLE `about`
  ADD CONSTRAINT `seller_idfk212` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `about_translations`
--
ALTER TABLE `about_translations`
  ADD CONSTRAINT `about_idfk2` FOREIGN KEY (`about_id`) REFERENCES `about` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `adds_translations`
--
ALTER TABLE `adds_translations`
  ADD CONSTRAINT `adds_idfk22` FOREIGN KEY (`adds_id`) REFERENCES `adds` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `areas`
--
ALTER TABLE `areas`
  ADD CONSTRAINT `areas_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `areas_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `areas_zone_id_foreign` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD CONSTRAINT `category_translations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `city_translations`
--
ALTER TABLE `city_translations`
  ADD CONSTRAINT `city_translations_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `coupons`
--
ALTER TABLE `coupons`
  ADD CONSTRAINT `coupons_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `discounts`
--
ALTER TABLE `discounts`
  ADD CONSTRAINT `discounts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_expensetype_id_foreign` FOREIGN KEY (`expensetype_id`) REFERENCES `expenses_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `expensetype_translations`
--
ALTER TABLE `expensetype_translations`
  ADD CONSTRAINT `expensetype_translations_expensetype_id_foreign` FOREIGN KEY (`expensetype_id`) REFERENCES `expenses_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `extradetail_translations`
--
ALTER TABLE `extradetail_translations`
  ADD CONSTRAINT `extradetail_translations_extradetail_id_foreign` FOREIGN KEY (`extradetail_id`) REFERENCES `extra_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `extras`
--
ALTER TABLE `extras`
  ADD CONSTRAINT `extras_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `extra_details`
--
ALTER TABLE `extra_details`
  ADD CONSTRAINT `extra_details_extra_id_foreign` FOREIGN KEY (`extra_id`) REFERENCES `extras` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `extra_translations`
--
ALTER TABLE `extra_translations`
  ADD CONSTRAINT `extra_translations_exra_id_foreign` FOREIGN KEY (`exra_id`) REFERENCES `extras` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favorite_products`
--
ALTER TABLE `favorite_products`
  ADD CONSTRAINT `favorite_products_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorite_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `features_texts`
--
ALTER TABLE `features_texts`
  ADD CONSTRAINT `features_texts_packagefeature_id_foreign` FOREIGN KEY (`packagefeature_id`) REFERENCES `packeges_features` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `featuretext_translations`
--
ALTER TABLE `featuretext_translations`
  ADD CONSTRAINT `featuretext_translations_featuretext_id_foreign` FOREIGN KEY (`featuretext_id`) REFERENCES `features_texts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kindoffeature_translations`
--
ALTER TABLE `kindoffeature_translations`
  ADD CONSTRAINT `kindoffeature_translations_kindoffeature_id_foreign` FOREIGN KEY (`kindoffeature_id`) REFERENCES `kinds_of_features` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `major_translations`
--
ALTER TABLE `major_translations`
  ADD CONSTRAINT `major_translations_major_id_foreign` FOREIGN KEY (`major_id`) REFERENCES `majors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `store_idfk55` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications_customers`
--
ALTER TABLE `notifications_customers`
  ADD CONSTRAINT `customer_idfk33` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notification_idfk22` FOREIGN KEY (`notification_id`) REFERENCES `notifications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `offers_stores`
--
ALTER TABLE `offers_stores`
  ADD CONSTRAINT `offers_stores_offer_id_foreign` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `offers_stores_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `packages_featurepackage`
--
ALTER TABLE `packages_featurepackage`
  ADD CONSTRAINT `packages_featurepackage_featurepackage_id_foreign` FOREIGN KEY (`featurepackage_id`) REFERENCES `packeges_features` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `packages_featurepackage_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `package_translations`
--
ALTER TABLE `package_translations`
  ADD CONSTRAINT `package_translations_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `packeges_features`
--
ALTER TABLE `packeges_features`
  ADD CONSTRAINT `packeges_features_kindoffeature_id_foreign` FOREIGN KEY (`kindoffeature_id`) REFERENCES `kinds_of_features` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `paymentway_translations`
--
ALTER TABLE `paymentway_translations`
  ADD CONSTRAINT `paymentway_translations_paymentway_id_foreign` FOREIGN KEY (`paymentway_id`) REFERENCES `paymentways` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `privacy_translations`
--
ALTER TABLE `privacy_translations`
  ADD CONSTRAINT `privacy_idfk2` FOREIGN KEY (`privacy_id`) REFERENCES `privacy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `add_idfk12` FOREIGN KEY (`add_id`) REFERENCES `adds` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `store_branches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products_tags`
--
ALTER TABLE `products_tags`
  ADD CONSTRAINT `products_tags_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_translations`
--
ALTER TABLE `product_translations`
  ADD CONSTRAINT `product_translations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `store_idfk322` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question_translations`
--
ALTER TABLE `question_translations`
  ADD CONSTRAINT `question_idfk` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `state_translations`
--
ALTER TABLE `state_translations`
  ADD CONSTRAINT `state_translations_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stores_languages`
--
ALTER TABLE `stores_languages`
  ADD CONSTRAINT `stores_languages_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `storetables`
--
ALTER TABLE `storetables`
  ADD CONSTRAINT `branch_idfk21` FOREIGN KEY (`branch_id`) REFERENCES `store_branches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `store_idfk3223` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `store_branches`
--
ALTER TABLE `store_branches`
  ADD CONSTRAINT `store_branches_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `store_branches_zone_id_foreign` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `store_employees`
--
ALTER TABLE `store_employees`
  ADD CONSTRAINT `store_employees_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `store_settings`
--
ALTER TABLE `store_settings`
  ADD CONSTRAINT `store_id` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `tags_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tag_translations`
--
ALTER TABLE `tag_translations`
  ADD CONSTRAINT `tag_translations_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `terms`
--
ALTER TABLE `terms`
  ADD CONSTRAINT `store_idfk32` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `term_translations`
--
ALTER TABLE `term_translations`
  ADD CONSTRAINT `term_idfk` FOREIGN KEY (`term_id`) REFERENCES `terms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `workshifts`
--
ALTER TABLE `workshifts`
  ADD CONSTRAINT `store_idfk3` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `workshift_translations`
--
ALTER TABLE `workshift_translations`
  ADD CONSTRAINT `workshift_id` FOREIGN KEY (`workshift_id`) REFERENCES `workshifts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `zones`
--
ALTER TABLE `zones`
  ADD CONSTRAINT `zones_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `zones_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `zones_prices`
--
ALTER TABLE `zones_prices`
  ADD CONSTRAINT `store_idfk22` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `zone_idfk20` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `zone_translations`
--
ALTER TABLE `zone_translations`
  ADD CONSTRAINT `zone_translations_zone_id_foreign` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
