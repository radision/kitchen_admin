-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 27, 2015 at 03:19 AM
-- Server version: 5.6.27
-- PHP Version: 7.0.0RC5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kitchen`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(10) UNSIGNED NOT NULL,
  `consumer_mobile_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `city` char(50) NOT NULL,
  `district` char(50) NOT NULL,
  `garden` char(50) NOT NULL COMMENT '小区名称',
  `room` char(255) NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_at` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `consumer_mobile_id`, `city`, `district`, `garden`, `room`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '北京', '朝阳', '康营家园', '123', 1, 1434896315, 1434896315),
(2, 1, '北京', '朝阳', '康营家园', '123', 1, 1434896421, 1434896421),
(3, 1, '北京', '朝阳', '康营家园', '123', 1, 1434896499, 1434896499),
(4, 1, '北京', '朝阳', '康营家园', '123', 1, 1434896562, 1434896562),
(5, 1, '北京', '朝阳', '康营家园', '123', 1, 1434896632, 1434896632);

-- --------------------------------------------------------

--
-- Table structure for table `consumer_mobile`
--

CREATE TABLE `consumer_mobile` (
  `consumer_mobile_id` int(10) UNSIGNED NOT NULL,
  `mobile_no` char(20) NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_at` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `consumer_mobile`
--

INSERT INTO `consumer_mobile` (`consumer_mobile_id`, `mobile_no`, `status`, `created_at`, `updated_at`) VALUES
(1, '123', 1, 1434880131, 1434880131);

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE `goods` (
  `goods_id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL DEFAULT '0',
  `title` char(255) NOT NULL,
  `desc` text NOT NULL,
  `price` float(10,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `picture_url` char(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`goods_id`, `merchant_id`, `title`, `desc`, `price`, `picture_url`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '红烧肉', '红烧肉', 0.01, '1434183590.jpg', 1, 1434065187, 1434183590);

-- --------------------------------------------------------

--
-- Table structure for table `goods_stock`
--

CREATE TABLE `goods_stock` (
  `goods_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `total` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `ordered` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `today` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品库存';

--
-- Dumping data for table `goods_stock`
--

INSERT INTO `goods_stock` (`goods_id`, `total`, `ordered`, `today`) VALUES
(1, 10, 2, 20150615),
(1, 10, 0, 20150621);

-- --------------------------------------------------------

--
-- Table structure for table `merchant`
--

CREATE TABLE `merchant` (
  `merchant_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `title` char(255) NOT NULL,
  `desc` text NOT NULL,
  `shipping` char(255) NOT NULL COMMENT '送货区域',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_at` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `merchant`
--

INSERT INTO `merchant` (`merchant_id`, `user_id`, `title`, `desc`, `shipping`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, '金大厨私房菜', '金大厨私房菜', '康营家园', 1, 1433932603, 1434321935);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `consumer_mobile_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `address_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `goods_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL DEFAULT '0',
  `amount` float(10,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `created_at` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `consumer_mobile_id`, `address_id`, `goods_id`, `quantity`, `amount`, `created_at`) VALUES
(1, 1, 4, 1, 2, 0.02, 1434896562),
(2, 1, 5, 1, 2, 0.02, 1434896632);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `consumer_mobile`
--
ALTER TABLE `consumer_mobile`
  ADD PRIMARY KEY (`consumer_mobile_id`);

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`goods_id`),
  ADD KEY `merchant_id` (`merchant_id`);

--
-- Indexes for table `goods_stock`
--
ALTER TABLE `goods_stock`
  ADD KEY `goods_id` (`goods_id`);

--
-- Indexes for table `merchant`
--
ALTER TABLE `merchant`
  ADD PRIMARY KEY (`merchant_id`),
  ADD KEY `admin_id` (`user_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

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
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `consumer_mobile`
--
ALTER TABLE `consumer_mobile`
  MODIFY `consumer_mobile_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `goods`
--
ALTER TABLE `goods`
  MODIFY `goods_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `merchant`
--
ALTER TABLE `merchant`
  MODIFY `merchant_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
