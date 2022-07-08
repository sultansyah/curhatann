-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 08, 2022 at 04:38 PM
-- Server version: 5.7.33
-- PHP Version: 8.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `curhatan`
--

-- --------------------------------------------------------

--
-- Table structure for table `curhatans`
--

CREATE TABLE `curhatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hashtags` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` longtext COLLATE utf8mb4_unicode_ci,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `curhatans`
--

INSERT INTO `curhatans` (`id`, `judul`, `hashtags`, `isi`, `user_id`, `created_at`, `updated_at`) VALUES
(20, 'laptop saya hampir rusak', '#rusak #caraperbaiki #laptop', '<p>laptop ini sudah menemani saya selama 2 tahun</p>\r\n\r\n<p><img alt=\"\" src=\"http://127.0.0.1:8000/images/IMG_20220106_073601_1657295142.jpg\" style=\"height:133px; width:100px\" /></p>', 1, '2022-07-08 08:45:49', '2022-07-08 08:45:49'),
(21, 'sad', '#sad', '<p>sad</p>', 4, '2022-07-08 09:18:00', '2022-07-08 09:18:00');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hashtags`
--

CREATE TABLE `hashtags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hashtag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hashtags`
--

INSERT INTO `hashtags` (`id`, `hashtag`, `created_at`, `updated_at`) VALUES
(13, 'rusak ', '2022-07-08 08:45:49', '2022-07-08 08:45:49'),
(14, 'caraperbaiki ', '2022-07-08 08:45:49', '2022-07-08 08:45:49'),
(15, 'laptop', '2022-07-08 08:45:49', '2022-07-08 08:45:49'),
(16, 'sad', '2022-07-08 09:18:00', '2022-07-08 09:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `komentar_curhatans`
--

CREATE TABLE `komentar_curhatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `komentar` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `curhatan_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `komentar_curhatans`
--

INSERT INTO `komentar_curhatans` (`id`, `komentar`, `curhatan_id`, `user_id`, `created_at`, `updated_at`) VALUES
(14, 'kenapa bisa rusak?', 20, 4, '2022-07-08 09:20:56', '2022-07-08 09:20:56');

-- --------------------------------------------------------

--
-- Table structure for table `love_curhatans`
--

CREATE TABLE `love_curhatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `curhatan_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_06_29_084611_create_sessions_table', 1),
(7, '2022_07_02_143801_create_hashtags_table', 1),
(8, '2022_07_02_155657_create_curhatans_table', 1),
(10, '2022_07_04_174054_create_komentar_curhatans_table', 2),
(11, '2022_07_05_154551_add_love_to_curhatans_table', 3),
(12, '2022_07_06_193424_add_love_to_komentar_curhatans_table', 3),
(15, '2022_07_06_195035_create_love_curhatans_table', 4);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0kNeNpZ0saSVrE73CqtRnyu3v2PQshfJ2tvHXXYR', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoic1dsUFhQYUh4QndwY2FrQUJrTUcyQ0xWc1hYWlQzeDZpb3hhcTlRTiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jdXJoYXRhbiI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkWGdJeG92dXN2YThvcXVKSXllMTByLmhaUWtueGtHZnJvOHRzdUVuRlJ4TXhGdTdiZ1QyZ2UiO30=', 1657297256);

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
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Sultansyah', 'muhammadsultansyah14@gmail.com', NULL, '$2y$10$WNqOUZ189rxbmW2QHU9WQe6JxM1uN7PPbm7Uzl6NYkWhBoSats2Ae', NULL, NULL, NULL, 'voOB5l31iLDTnWgxDkU1np9tGDTdhnMdzl5F98UJhHkWM9dVaVaZT3eCoypp', NULL, 'profile-photos/4u1D87YyY4irI3wemW1Cq820iK4XqKipUp4X4SQ0.png', '2022-07-03 01:47:45', '2022-07-03 21:34:59'),
(2, 'Sultan', 'muhammadsultansyah15@gmail.com', NULL, '$2y$10$WNqOUZ189rxbmW2QHU9WQe6JxM1uN7PPbm7Uzl6NYkWhBoSats2Ae', NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-03 01:47:45', '2022-07-03 01:47:45'),
(3, 'losky', 'ryokami011@gmail.com', NULL, '$2y$10$zbVwnjV3gma8ch2o8HqiQ.D6r13876Yzi9D1yz4BGe9/vuCwnjMzy', NULL, NULL, NULL, NULL, NULL, 'profile-photos/Kalv7yh4PpFHa0VIxtN2Tv1VSWIhx47sbJqQFrqe.jpg', '2022-07-05 08:41:16', '2022-07-05 08:43:10'),
(4, 'narlis', 'narlis@gmail.com', NULL, '$2y$10$XgIxovusva8oquJIye10r.hZQknxkGfro8tsuEnFRxMxFu7bgT2ge', NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-08 09:12:56', '2022-07-08 09:12:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `curhatans`
--
ALTER TABLE `curhatans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `curhatans_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hashtags`
--
ALTER TABLE `hashtags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar_curhatans`
--
ALTER TABLE `komentar_curhatans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komentar_curhatans_curhatan_id_foreign` (`curhatan_id`),
  ADD KEY `komentar_curhatans_user_id_foreign` (`user_id`);

--
-- Indexes for table `love_curhatans`
--
ALTER TABLE `love_curhatans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `love_curhatans_user_id_foreign` (`user_id`),
  ADD KEY `love_curhatans_curhatan_id_foreign` (`curhatan_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `curhatans`
--
ALTER TABLE `curhatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hashtags`
--
ALTER TABLE `hashtags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `komentar_curhatans`
--
ALTER TABLE `komentar_curhatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `love_curhatans`
--
ALTER TABLE `love_curhatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `curhatans`
--
ALTER TABLE `curhatans`
  ADD CONSTRAINT `curhatans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `komentar_curhatans`
--
ALTER TABLE `komentar_curhatans`
  ADD CONSTRAINT `komentar_curhatans_curhatan_id_foreign` FOREIGN KEY (`curhatan_id`) REFERENCES `curhatans` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar_curhatans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `love_curhatans`
--
ALTER TABLE `love_curhatans`
  ADD CONSTRAINT `love_curhatans_curhatan_id_foreign` FOREIGN KEY (`curhatan_id`) REFERENCES `curhatans` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `love_curhatans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
