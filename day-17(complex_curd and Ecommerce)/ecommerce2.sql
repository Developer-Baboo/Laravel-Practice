-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2023 at 05:48 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce2`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `prod_id` varchar(255) NOT NULL,
  `prod_qty` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `popular` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_descrip` varchar(255) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_descrip`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(3, 'Electronics', 'electronics', 'You can find the best quality products on our ecommerce plateform', 0, 1, '1695279361.png', 'sdf', 'sdfsd', 'sfsd', '2023-09-20 15:56:01', '2023-09-20 15:56:01'),
(4, 'Dress', 'dress', 'You can find the best quality and branded clothes on our ecommerce plateform', 0, 1, '1695360425.png', 'meta_title', 'Meta KeyWordsMeta KeyWordsMeta KeyWords', 'Meta KeyWordsMeta KeyWords', '2023-09-21 14:27:05', '2023-09-21 14:27:05'),
(5, 'Groceries', 'groceries', 'You can find the best quality grocery products on our ecommerce plateform', 0, 1, '1695366349.png', 'meta_title', 'Description', 'Description', '2023-09-21 16:05:49', '2023-09-21 16:05:49'),
(6, 'Stationary', 'stationaries', 'Here You can find the best quality products on our ecommerce platform', 0, 0, '1695366391.png', 'meta_title', 'DescriptionDescriptionDescription', 'DescriptionDescription', '2023-09-21 16:06:31', '2023-09-21 16:06:31');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_09_20_111605_create_categories_table', 1),
(7, '2023_09_21_074822_create_products_table', 1),
(8, '2023_09_22_130158_create_carts_table', 1),
(9, '2023_09_25_174024_create_orders_table', 1),
(10, '2023_09_25_175915_create_order_items_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `message` varchar(255) DEFAULT NULL,
  `tracking_no` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `fname`, `lname`, `email`, `phone`, `address1`, `address2`, `city`, `state`, `country`, `pincode`, `status`, `message`, `tracking_no`, `created_at`, `updated_at`) VALUES
(1, '', 'baboo', 'kumar', 'baboo23@gmail.com', '03422449445', 'address1', 'address2', 'city', 'state', 'pak', '12', 0, NULL, 'Baboo5551', '2023-09-25 17:46:43', '2023-09-25 17:46:43'),
(2, '', 'Mohan', 'Lal', 'mohan@gmail.com', '03422449445', 'karachi', 'mithi', 'city', 'sate', 'Country', 'Country', 0, NULL, 'Baboo7093', '2023-09-25 17:52:10', '2023-09-25 17:52:10'),
(3, '', 'baboo', 'kumar', 'baboo23@gmail.com', '03422449445', 'address1', 'address2', 'city', 'state', 'pak', '12', 0, NULL, 'Baboo8615', '2023-09-25 18:25:04', '2023-09-25 18:25:04'),
(4, '', 'Mohan', 'kumar', 'mohan@gmail.com', '03422449445', 'Address1', 'Address2', 'Jamshoro', 'State', 'Pakistan', 'Pin Code', 0, NULL, 'Baboo5672', '2023-09-25 18:26:46', '2023-09-25 18:26:46'),
(5, '', 'Mohan', 'kumar', 'mohan@gmail.com', '03422449445', 'Address1', 'Address2', 'Jamshoro', 'State', 'Pakistan', 'Pin Code', 0, NULL, 'Baboo5290', '2023-09-25 18:27:50', '2023-09-25 18:27:50'),
(6, '', 'Mohan', 'kumar', 'mohan@gmail.com', '03422449445', 'Address1', 'Address2', 'Jamshoro', 'State', 'Pakistan', 'Pin Code', 0, NULL, 'Baboo2234', '2023-09-25 19:04:15', '2023-09-25 19:04:15');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `prod_id` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `prod_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, '1', '5', '1', '700', '2023-09-25 17:46:43', '2023-09-25 17:46:43'),
(2, '1', '4', '2', '1300', '2023-09-25 17:46:43', '2023-09-25 17:46:43'),
(3, '1', '8', '2', '80000', '2023-09-25 17:46:43', '2023-09-25 17:46:43'),
(4, '2', '5', '1', '700', '2023-09-25 17:52:10', '2023-09-25 17:52:10'),
(5, '2', '4', '2', '1300', '2023-09-25 17:52:10', '2023-09-25 17:52:10'),
(6, '2', '8', '2', '80000', '2023-09-25 17:52:10', '2023-09-25 17:52:10'),
(7, '3', '5', '1', '700', '2023-09-25 18:25:04', '2023-09-25 18:25:04'),
(8, '3', '4', '2', '1300', '2023-09-25 18:25:04', '2023-09-25 18:25:04'),
(9, '3', '8', '2', '80000', '2023-09-25 18:25:04', '2023-09-25 18:25:04'),
(10, '4', '5', '1', '700', '2023-09-25 18:26:46', '2023-09-25 18:26:46'),
(11, '4', '4', '2', '1300', '2023-09-25 18:26:46', '2023-09-25 18:26:46'),
(12, '4', '8', '2', '80000', '2023-09-25 18:26:46', '2023-09-25 18:26:46'),
(13, '5', '5', '1', '700', '2023-09-25 18:27:50', '2023-09-25 18:27:50'),
(14, '5', '4', '2', '1300', '2023-09-25 18:27:50', '2023-09-25 18:27:50'),
(15, '5', '8', '2', '80000', '2023-09-25 18:27:50', '2023-09-25 18:27:50'),
(16, '6', '5', '1', '700', '2023-09-25 19:04:15', '2023-09-25 19:04:15'),
(17, '6', '4', '2', '1300', '2023-09-25 19:04:15', '2023-09-25 19:04:15'),
(18, '6', '8', '2', '80000', '2023-09-25 19:04:15', '2023-09-25 19:04:15'),
(19, '6', '7', '1', '48000', '2023-09-25 19:04:15', '2023-09-25 19:04:15');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cate_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `small_description` mediumtext NOT NULL,
  `description` longtext NOT NULL,
  `original_price` varchar(255) NOT NULL,
  `selling_price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `tax` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `trending` tinyint(4) NOT NULL,
  `meta_title` mediumtext NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cate_id`, `name`, `slug`, `small_description`, `description`, `original_price`, `selling_price`, `image`, `qty`, `tax`, `status`, `trending`, `meta_title`, `meta_keywords`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 3, 'Samsung Tablet', 'samsung-tablet', 'It is one of the high quality samsung table in pakistan', 'sdfsd', '90000', '80000', '1695295827.png', '33', '33', 1, 1, 'sdf', 'sfsdf', 'sfsd', '2023-09-20 20:30:27', '2023-09-20 20:30:27'),
(2, 3, 'Iphone Keypad', 'iphone-keypad', 'It is one of the high quality samsung table in pakistan', 'sdfsd', '35000', '33000', '1695295869.png', '3', '3', 0, 1, 'sdfsd', 'sdfsd', 'sdfsd', '2023-09-20 20:31:09', '2023-09-20 20:31:09'),
(3, 4, 'Baby Dress', 'baby-dress', 'It is one of the high quality baby dress in pakistan', 'Small DescriptionSmall DescriptionSmall Description', '1400', '1300', '1695360527.png', '5', '60', 1, 1, 'meta_title', 'Meta KeyWordsMeta KeyWords', 'Meta DescriptionMeta Description', '2023-09-21 14:28:47', '2023-09-21 14:28:47'),
(4, 4, '3-Piece', '3-piece', 'It is one of the high quality 3 Piece in pakistan', 'DescriptionDescription', '1400', '1300', '1695360640.png', '30', '10', 1, 1, 'meta_title', 'Meta KeyWordsMeta KeyWords', 'Meta KeyWordsMeta KeyWords', '2023-09-21 14:30:40', '2023-09-21 14:30:40'),
(5, 4, 'Formal Shirt', 'formal-shirt', 'It is one of the high quality samsung table in pakistan', 'Meta KeyWordsMeta KeyWordsMeta KeyWords', '800', '700', '1695360746.png', '4', '50', 1, 1, 'Meta KeyWords', 'Meta KeyWordsMeta KeyWords', 'Meta KeyWordsMeta KeyWordsMeta KeyWords', '2023-09-21 14:32:26', '2023-09-21 14:32:26'),
(6, 3, 'Head Set', 'Slug', 'Small DescriptionSmall Description', 'DescriptionDescription', '4000', '3000', '1695360848.jpg', '30', '200', 0, 0, 'meta_title', 'Meta KeyWordMeta KeyWord', 'Meta KeyWordMeta KeyWordMeta KeyWord', '2023-09-21 14:34:08', '2023-09-21 14:34:08'),
(7, 3, 'Dell Laptop', 'dell-laptop', 'Meta KeyWordMeta KeyWord', 'Meta KeyWordMeta KeyWord', '40000', '48000', '1695360920.jpg', '5', '30', 1, 1, 'Meta KeyWord', 'Meta KeyWordMeta KeyWord', 'Meta KeyWordMeta KeyWord', '2023-09-21 14:35:20', '2023-09-21 14:35:20'),
(8, 3, 'Lenvo Laptop', 'lenovo-laptop', 'Meta KeyWordMeta KeyWord', 'Meta KeyWordMeta KeyWord', '88000', '80000', '1695360981.jpg', '4', '20', 1, 1, 'Meta KeyWord', 'Meta KeyWordMeta KeyWord', 'Meta KeyWordMeta KeyWord', '2023-09-21 14:36:21', '2023-09-21 14:36:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address1` varchar(200) NOT NULL,
  `address2` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `pincode` varchar(200) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `lname`, `phone`, `address1`, `address2`, `city`, `state`, `country`, `pincode`, `role_as`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Baboo', 'baboo@gmail.com', NULL, '$2y$10$LMLt325bycj6R7QYVWKLauq4BXjKDpb26cbMh9eotyVPxqS2plz1m', '0', '0', '', '', '', '', '', '', 1, 'i0G8khrijikVfHyAMNX68qB5zEZdBaIrckMDnfytgfaPqz4kBdMZ6ej5v4Tj', '2023-09-19 14:41:56', '2023-09-19 14:41:56'),
(2, 'Mohan', 'mohan@gmail.com', NULL, '$2y$10$usZH6T3cRQV7awI/iuH6nOm5oW7RyhlPJNmmuNts81rba5FcZ3Ntq', 'kumar', '03422449445', 'Address1', 'Address2', 'Jamshoro', 'State', 'Pakistan', 'Pin Code', 0, 'qAaun3IQprcAG0hU3Moeb69Oj5SlBFquRRSvsqApMzArQrRGk1chxhQvx2Em', '2023-09-19 15:26:04', '2023-09-25 18:27:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
