-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2024 at 06:47 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_products`
--

CREATE TABLE `book_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `unit_price` decimal(8,2) NOT NULL,
  `sales_unit_price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_products`
--

INSERT INTO `book_products` (`id`, `product_code`, `name`, `category`, `stock`, `unit_price`, `sales_unit_price`, `created_at`, `updated_at`) VALUES
(2, 'Book008', 'GAN', 'Books', 24, '500.00', '600.00', '2024-09-17 15:03:50', '2024-09-17 16:52:06');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `company`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Shahid', 'shahid@gmail.com', 'Startech', 'IDB', '016453287470', '2024-09-08 08:31:49', '2024-09-08 08:31:49'),
(2, 'Shafi', 'shafi@gmail.com', 'Asus', 'IDB', '01697575470', '2024-09-08 10:51:34', '2024-09-08 10:51:34'),
(3, 'Dip', 'dip@gmail.com', 'Dip Co', 'Jatrabari', '013245894', '2024-09-17 17:04:55', '2024-09-17 17:04:55');

-- --------------------------------------------------------

--
-- Table structure for table `electronic_products`
--

CREATE TABLE `electronic_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `unit_price` decimal(8,2) NOT NULL,
  `sales_unit_price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `electronic_products`
--

INSERT INTO `electronic_products` (`id`, `product_code`, `name`, `category`, `stock`, `unit_price`, `sales_unit_price`, `created_at`, `updated_at`) VALUES
(3, 'M87', 'Xinmeng', 'Electronics', 14, '3500.00', '4500.00', '2024-09-17 16:51:55', '2024-09-17 16:52:01');

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
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_mail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `due` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `customer_name`, `customer_mail`, `company`, `address`, `item`, `product_name`, `price`, `quantity`, `total`, `payment`, `due`, `created_at`, `updated_at`) VALUES
(1, '1', 'shahid@gmail.com', 'Startech', 'IDB', 'Headphone', 'Redragon', '3000', 1, '3000', '3000', '0', '2024-09-08 12:24:30', '2024-09-08 12:24:30'),
(2, 'Shafi', 'shafi@gmail.com', 'Asus', 'IDB', 'Motherboard', 'Asus Gaming Motherboard', '12000', 12, '144000', '144000', '0', '2024-09-08 13:20:53', '2024-09-08 13:20:53'),
(3, 'Shafi', 'shafi@gmail.com', 'Asus', 'IDB', 'Books', 'GAN', '500.00', 1, '500', '400', '100', '2024-09-17 16:17:59', '2024-09-17 16:17:59'),
(4, '2', 'shafi@gmail.com', 'Asus', 'IDB', 'Choose...', 'GAN', '120', 1, '120', '120', '0', '2024-09-17 16:23:22', '2024-09-17 16:23:22'),
(5, 'Shafi', 'shafi@gmail.com', 'Asus', 'IDB', 'Electronics', 'Xinmeng', '3500.00', 1, '3500', '3500', '0', '2024-09-17 16:52:49', '2024-09-17 16:52:49'),
(6, '3', 'dip@gmail.com', 'Dip Co', 'Jatrabari', 'Choose...', 'Atova', '35', 4, '35', '35', '0', '2024-09-21 09:46:27', '2024-09-21 09:46:27');

-- --------------------------------------------------------

--
-- Table structure for table `medical_products`
--

CREATE TABLE `medical_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `unit_price` decimal(8,2) NOT NULL,
  `sales_unit_price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medical_products`
--

INSERT INTO `medical_products` (`id`, `product_code`, `name`, `category`, `stock`, `unit_price`, `sales_unit_price`, `created_at`, `updated_at`) VALUES
(1, 'M0098', 'Rosuva', 'Medical', 33, '90.00', '110.00', '2024-09-17 15:06:45', '2024-09-17 16:52:10'),
(2, 'X007', 'Atova', 'Medical', 10, '40.00', '45.00', '2024-09-21 09:42:39', '2024-09-21 09:43:37');

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
(4, '2021_03_13_091736_create_products_table', 1),
(5, '2021_03_17_052722_create_customers_table', 1),
(6, '2021_03_17_053202_create_orders_table', 1),
(7, '2021_03_17_053807_create_invoices_table', 1),
(8, '2024_09_17_204230_create_medical_products_table', 2),
(9, '2024_09_17_204235_create_book_products_table', 2),
(10, '2024_09_17_204240_create_electronic_products_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `email`, `product_code`, `product_name`, `quantity`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 'shahid@gmail.com', 'B407', 'Asus Gaming Motherboard', 1, 1, '2024-09-08 08:32:49', '2024-09-08 12:24:30'),
(3, 'shafi@gmail.com', 'B407', 'B407', 1, 1, '2024-09-08 11:15:08', '2024-09-17 16:52:49'),
(5, 'shahid@gmail.com', 'B407', 'Asus Gaming Motherboard', 1, 1, '2024-09-08 11:21:20', '2024-09-08 12:24:30'),
(7, 'shafi@gmail.com', 'Z604', 'Z604', 1, 1, '2024-09-08 11:25:16', '2024-09-17 16:52:49'),
(8, 'shahid@gmail.com', 'Z604', 'Redragon', 1, 1, '2024-09-08 12:24:30', '2024-09-08 12:24:30'),
(17, 'shafi@gmail.com', 'Book008', 'GAN', 1, 1, '2024-09-17 16:01:14', '2024-09-17 16:52:49'),
(18, 'shafi@gmail.com', 'Book008', 'GAN', 1, 1, '2024-09-17 16:17:59', '2024-09-17 16:52:49'),
(19, 'shafi@gmail.com', 'Book008', 'GAN', 1, 1, '2024-09-17 16:23:22', '2024-09-17 16:52:49'),
(20, 'shafi@gmail.com', 'M87', 'Xinmeng', 1, 1, '2024-09-17 16:52:33', '2024-09-17 16:52:49'),
(21, 'shafi@gmail.com', 'M87', 'Xinmeng', 1, 1, '2024-09-17 16:52:49', '2024-09-17 16:52:49'),
(22, 'dip@gmail.com', 'X007', 'Atova', 4, 1, '2024-09-21 09:46:27', '2024-09-21 09:46:27');

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
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `unit_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_unit_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Shahid', 'shahid@gmail.com', NULL, '$2y$10$/1WqCD5zBI83uWKn7udzGOkIXgzhRlBpSNcepGTnFCiQk8U/RS5bi', NULL, '2024-09-08 09:48:47', '2024-09-08 09:48:47'),
(3, 'Hridoy', 'hridoy.khan@gmail.com', NULL, '$2y$10$JA2.NVS6myqRHutuzxHWTu0aQ1N2Fmlhvo3QkJdXjvulWPFl5gyhC', NULL, '2024-09-14 10:22:36', '2024-09-14 10:22:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_products`
--
ALTER TABLE `book_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `electronic_products`
--
ALTER TABLE `electronic_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_products`
--
ALTER TABLE `medical_products`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_product_code_unique` (`product_code`);

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
-- AUTO_INCREMENT for table `book_products`
--
ALTER TABLE `book_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `electronic_products`
--
ALTER TABLE `electronic_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `medical_products`
--
ALTER TABLE `medical_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
