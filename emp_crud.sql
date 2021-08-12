-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2021 at 10:36 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emp_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(16, 'CEO', '2021-08-12 07:40:55', '2021-08-12 07:40:55'),
(17, 'CFO', '2021-08-12 07:40:55', '2021-08-12 07:40:55'),
(18, 'Manager', '2021-08-12 07:40:55', '2021-08-12 07:40:55'),
(19, 'Assisstant Manager', '2021-08-12 07:40:55', '2021-08-12 07:40:55'),
(20, 'Chairman', '2021-08-12 07:40:55', '2021-08-12 07:40:55'),
(21, 'Supervisor', '2021-08-12 07:40:55', '2021-08-12 07:40:55'),
(22, 'Driver', '2021-08-12 07:40:55', '2021-08-12 07:40:55');

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
(1, '2010_09_12_114408_create_designations_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation_id` bigint(20) UNSIGNED NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `designation_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'test1', 'test1@gmail.com', 'user/grhsyavh3LEqFDAKNJaydjXuvF3HbTTEYB2q0UPX.jpg', 21, NULL, 'test1', NULL, '2021-05-26 07:36:06', '2021-08-12 15:04:14'),
(4, 'sfsd', 'shilpavijayan33@gmail.comdd', '', 19, NULL, '$2y$10$l5EhMt6KkS5Ki5voSApr1.yfuScaGRR/dRZ0RF0Ozzppfd0oHuire', NULL, '2021-08-12 12:16:42', '2021-08-12 13:47:31'),
(5, 'sfsd', 'shilpaviccjayan33@gmail.com', 'user/lo4tGOMejtzmh2aeps3I83XSAdaL4d0DXmgjgueb.jpg', 18, NULL, '$2y$10$qO0EigMQBD4iZIjBH2xJFOL0HyiSV2jvp146arNG.VP7eX3S3aO2W', NULL, '2021-08-12 12:19:33', '2021-08-12 13:48:45'),
(9, 'zczv', 'shiddlpavijayan33@gmail.com', '', 18, NULL, '$2y$10$2nLKsl8fUlTkM4u8GNJZ8uGSIpZxdpM9E4kWsIukV0yhV4uJQgWoa', NULL, '2021-08-12 12:27:40', '2021-08-12 12:27:40'),
(10, 'Shilpa vijayan Vij', 'shilpvvavijayan33@gmail.com', '', 18, NULL, '$2y$10$dcavc4mpMxX66/wyy.hae.ANXoRrmXAnMSlwPtoS9qN4rw2W3VgOG', NULL, '2021-08-12 12:31:41', '2021-08-12 12:31:41'),
(11, 't1', 't1@t1.t', '', 19, NULL, '$2y$10$zgonyrTiEE8U5eYzltQATu8KNeXmoDJWAlgpQo6P9lOP0qgVQw71u', NULL, '2021-08-12 14:39:21', '2021-08-12 14:39:21'),
(12, 't2', 't2@t1.t', '', 19, NULL, '$2y$10$l/6oHjTY0dIISsBP23CLH.hFiA.fyj2fMh9MyO9A9Wi7WJGgI3GE.', NULL, '2021-08-12 14:39:32', '2021-08-12 14:39:32'),
(13, 't3', 't3@t1.t', '', 19, NULL, '$2y$10$TLlREI/JImtyorAOZ2dOQ.tslMwcYP6IIi2ziGDTxhOL1b3JarYcm', NULL, '2021-08-12 14:40:02', '2021-08-12 14:40:02'),
(14, 't4', 't4@t1.t', '', 19, NULL, '$2y$10$g.sg12dI.38xoojRKjdOTenoTqBt/DIQ3At9CZzCaJWCNgrX3Ai0.', NULL, '2021-08-12 14:40:10', '2021-08-12 14:40:10'),
(15, 't4', 'shilpavijayan33@gmail.com', '', 19, NULL, '$2y$10$xCB07ylV112SLCPTT0OLO.d3bwQZf93PMaL.tBjCtCu2MyuinVOu.', NULL, '2021-08-12 14:43:01', '2021-08-12 14:43:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_designation_id_foreign` (`designation_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_designation_id_foreign` FOREIGN KEY (`designation_id`) REFERENCES `designations` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
