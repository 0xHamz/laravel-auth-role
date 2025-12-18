-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 18, 2025 at 07:33 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_role_auth`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text,
  `payload` longtext NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('9pOKj9zF3gYT6flwChN66wRiyyMqmxeUH4xrHtA8', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVEM0YlNvSmJwYzJiWjNXTHV0QmhxOFBGY212dENnSXVEOUpjdEhqMCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1766043157),
('PMLeaDayMoqOjcSO6urthRqcG35gXL4QhvzWzk6j', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRUdWMWpPR21Uc0RnYXk1MTZ0RWNYYW13Mk13MGpuREc0OWVzQ2dPaSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9jdXN0b21lci92aWRlb3MiO3M6NToicm91dGUiO047fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1766043016);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','customer') DEFAULT 'customer',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@mail.com', '$2y$12$fwa9N28y4qsB02wKzT5EJuK2QkODDWUw/KtyJDyewp7RMxiklK2LS', 'admin', NULL, '2025-12-17 21:09:07'),
(2, 'Custtomer 1', 'customer1@gmail.com', '$2y$12$fwa9N28y4qsB02wKzT5EJuK2QkODDWUw/KtyJDyewp7RMxiklK2LS', 'customer', NULL, '2025-12-17 21:09:24'),
(3, 'Customer 2', 'customer2@gmail.com', '$2y$12$PqjQxiQxIRfSCRCYemMnietFG8ExJw7PURv8V4WNJyTpSQkSKLdNS', 'customer', '2025-12-17 21:47:47', '2025-12-17 21:47:47');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `description` text,
  `video_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `description`, `video_url`, `created_at`, `updated_at`) VALUES
(4, 'Bisnis', NULL, 'https://www.youtube.com/embed/eOwtRnJemrg', '2025-12-17 23:11:49', '2025-12-17 23:11:49'),
(5, 'Ekonomi', NULL, 'https://www.youtube.com/embed/Ss6ud71pmvQ', '2025-12-18 00:03:53', '2025-12-18 00:04:19'),
(6, 'Belajar coding', NULL, 'https://www.youtube.com/embed/unxpUD9Xd_c', '2025-12-18 00:04:47', '2025-12-18 00:04:47'),
(7, 'Standup', NULL, 'https://www.youtube.com/embed/fsSySXCBIhk', '2025-12-18 00:05:20', '2025-12-18 00:05:20');

-- --------------------------------------------------------

--
-- Table structure for table `video_permissions`
--

CREATE TABLE `video_permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `video_id` bigint UNSIGNED DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `video_permissions`
--

INSERT INTO `video_permissions` (`id`, `user_id`, `video_id`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(10, 3, 7, '2025-12-18 07:05:44', '2025-12-18 08:05:44', '2025-12-18 00:05:44', '2025-12-18 00:05:44'),
(11, 3, 4, '2025-12-18 07:18:42', '2025-12-18 08:18:42', '2025-12-18 00:18:42', '2025-12-18 00:18:42'),
(12, 2, 7, '2025-12-18 07:30:13', '2025-12-18 08:30:13', '2025-12-18 00:30:13', '2025-12-18 00:30:13');

-- --------------------------------------------------------

--
-- Table structure for table `video_requests`
--

CREATE TABLE `video_requests` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `video_id` bigint UNSIGNED DEFAULT NULL,
  `status` enum('pending','approved','rejected','revoked') DEFAULT 'pending',
  `duration_hours` int DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `requested_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `video_requests`
--

INSERT INTO `video_requests` (`id`, `user_id`, `video_id`, `status`, `duration_hours`, `start_time`, `end_time`, `requested_at`, `created_at`, `updated_at`) VALUES
(14, 3, 7, 'approved', 1, '2025-12-18 07:05:44', '2025-12-18 08:05:44', '2025-12-18 07:05:38', '2025-12-18 00:05:38', '2025-12-18 00:05:44'),
(22, 3, 4, 'approved', 1, '2025-12-18 07:18:42', '2025-12-18 08:18:42', '2025-12-18 07:18:36', '2025-12-18 00:18:36', '2025-12-18 00:18:42'),
(23, 2, 7, 'approved', 1, '2025-12-18 07:30:13', '2025-12-18 08:30:13', '2025-12-18 07:30:04', '2025-12-18 00:30:04', '2025-12-18 00:30:13'),
(24, 2, 4, 'pending', NULL, NULL, NULL, '2025-12-18 07:30:16', '2025-12-18 00:30:16', '2025-12-18 00:30:16');

-- --------------------------------------------------------

--
-- Table structure for table `watch_logs`
--

CREATE TABLE `watch_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `video_id` bigint UNSIGNED DEFAULT NULL,
  `watched_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_permissions`
--
ALTER TABLE `video_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `video_id` (`video_id`);

--
-- Indexes for table `video_requests`
--
ALTER TABLE `video_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `video_id` (`video_id`);

--
-- Indexes for table `watch_logs`
--
ALTER TABLE `watch_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `video_id` (`video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `video_permissions`
--
ALTER TABLE `video_permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `video_requests`
--
ALTER TABLE `video_requests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `watch_logs`
--
ALTER TABLE `watch_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `video_permissions`
--
ALTER TABLE `video_permissions`
  ADD CONSTRAINT `video_permissions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `video_permissions_ibfk_2` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`);

--
-- Constraints for table `video_requests`
--
ALTER TABLE `video_requests`
  ADD CONSTRAINT `video_requests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `video_requests_ibfk_2` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`);

--
-- Constraints for table `watch_logs`
--
ALTER TABLE `watch_logs`
  ADD CONSTRAINT `watch_logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `watch_logs_ibfk_2` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
