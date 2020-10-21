-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2020 at 03:48 PM
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
-- Database: `mlinform`
--

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
(1, '2020_10_15_125850_create_password_resets_table', 1),
(2, '2020_10_16_161628_add_profile_to_users', 2),
(3, '2020_10_16_165255_add_profile_to_users', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('mksaxena27@gmail.com', '0hPwp7mHKJuw7J9pVMRxNE3Ruzvo09nu7TT46ZyUGVNf71zrKGPQCznpjs9Q', '2020-10-15 08:48:19'),
('mksaxena27@gmail.com', 'vxGqFCHdNc46i4WekoPGxbpmB6fqJroxoUiFLthf7e3QxFaGOfAuUUvVSPu9', '2020-10-15 08:49:33');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_type`, `status`) VALUES
(1, 'mohit', 'mksaxena27@gmail.com', NULL, '$2y$10$pthU9qyAdCJES9H/CDfB1umufDYASlDj.B.T9S/RT2s/zLBEJgTFq', NULL, '2020-10-15 05:19:21', '2020-10-19 05:17:33', 'admin', '1'),
(2, 'abhi', 'abhi27@gmail.com', NULL, '$2y$10$mEJIAkZSt9JFzEsbvxfjV.In7q.upwKVtbjVOpiPZDAVuFN7RDGye', NULL, '2020-10-15 05:45:12', '2020-10-21 08:10:47', '', '0'),
(3, 'abc', 'abc@gmail.com', NULL, '$2y$10$amcjQFl02kS796Dzhp8Ze.QBnOLMMzMa3/ytkM6fJoh6ySGxCMs1K', NULL, '2020-10-15 10:54:06', '2020-10-21 08:09:09', '', '0'),
(5, 'mno', 'mno@gmail.com', NULL, '$2y$10$.4rC4U8auIj6yQZcScJsOO92AzY79YYSLD3twY9FnMCJS0jpDDU3a', NULL, '2020-10-19 07:22:56', '2020-10-21 05:47:34', NULL, '1'),
(6, 'xyz', 'xyz@gmail.com', NULL, '$2y$10$XVc9AUwQfIX3T61vlfR8z.wTW385l0VSOrQrjjUdzuDGZ2Kywtf.q', NULL, '2020-10-21 08:07:30', '2020-10-21 08:10:51', NULL, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
