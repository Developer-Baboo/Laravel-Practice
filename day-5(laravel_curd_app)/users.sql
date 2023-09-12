-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2023 at 03:15 PM
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
-- Database: `project_query19`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `age` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `age`, `city`, `created_at`, `updated_at`) VALUES
(1, 'Baboo', 'baboo@gmil.com', 21, 'Mithi', '2023-09-01 01:11:02', '2023-09-01 01:11:02'),
(2, 'Kelash', 'kelash@gmil.com', 19, 'Lahore', '2023-09-01 01:11:02', '2023-09-01 01:11:02'),
(3, 'Suresh12', 'suresh12@gmil.com', 25, 'Diplo0', '2023-09-01 01:11:02', '2023-09-01 01:11:02'),
(4, 'Mohan', 'mohan@gmil.com', 22, 'Mithi', '2023-09-01 01:11:02', '2023-09-01 01:11:02'),
(5, 'Santosh', 'babo@gmail.com', 22, 'Karachi', '2023-09-01 05:56:27', '2023-09-01 05:56:27'),
(6, 'Rabia', 'rabia@gmail.com', 22, 'Jamshoro', '2023-09-01 06:12:03', '2023-09-01 06:12:03'),
(7, 'Yusra', 'yusra@gmail.com', 22, 'Mithi', NULL, NULL),
(8, 'Shayan', 'shayan@gmail.com', 21, 'Mithi', NULL, NULL),
(10, 'shahid', 'shahid@gmail.com', 22, 'diplo', NULL, NULL),
(11, 'shahid12', 'shayan12@gmail.com', 22, 'sukkur', NULL, NULL),
(12, 'Kahn', 'kahn@gmail.com', 22, 'sukkur', NULL, NULL),
(13, 'Ali', 'ali@gmail.com', 22, 'sdfsd', NULL, NULL),
(16, 'saad', 'saad@gmail.com', 26, 'umerkot', NULL, NULL),
(17, 'aasad', 'asaad@gmail.com', 29, 'umerkoot', NULL, NULL);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
