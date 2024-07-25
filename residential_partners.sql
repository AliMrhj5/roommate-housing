-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2024 at 10:39 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `residential_partners`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `budget` decimal(10,2) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `number_of_rooms` int(11) DEFAULT NULL,
  `number_of_bathrooms` int(11) DEFAULT NULL,
  `furnished` tinyint(1) DEFAULT NULL,
  `smoking_allowed` tinyint(1) DEFAULT NULL,
  `pets_allowed` tinyint(1) DEFAULT NULL,
  `availability_date` date DEFAULT NULL,
  `preferences` text DEFAULT NULL,
  `ad_type` enum('House','Partner') NOT NULL,
  `residence_type` enum('apartment','house','shared','studio') NOT NULL,
  `location_description` text DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `room_size` decimal(8,2) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `contact_phone` varchar(255) DEFAULT NULL,
  `status` enum('open','closed') NOT NULL DEFAULT 'open',
  `partner_age_min` int(11) DEFAULT NULL,
  `partner_age_max` int(11) DEFAULT NULL,
  `partner_gender` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `title`, `budget`, `user_id`, `created_at`, `updated_at`, `number_of_rooms`, `number_of_bathrooms`, `furnished`, `smoking_allowed`, `pets_allowed`, `availability_date`, `preferences`, `ad_type`, `residence_type`, `location_description`, `country_id`, `city_id`, `room_size`, `contact_email`, `notes`, `contact_phone`, `status`, `partner_age_min`, `partner_age_max`, `partner_gender`) VALUES
(28, 'MRHJENIO', 4.00, 7, '2024-07-23 10:11:09', '2024-07-23 10:11:09', NULL, NULL, NULL, NULL, NULL, '2024-07-24', NULL, 'Partner', 'house', NULL, 1, 1, NULL, NULL, NULL, '325234', 'open', NULL, NULL, 'female'),
(30, 'احمد', 5.00, 7, '2024-07-23 11:04:18', '2024-07-23 11:04:18', 2, NULL, NULL, NULL, NULL, '2024-07-12', NULL, 'House', 'studio', NULL, 1, 3, 3.00, '123@yahoo.com', NULL, '0966543345', 'open', NULL, NULL, 'male'),
(31, 'احمد', 6.00, 7, '2024-07-23 12:36:36', '2024-07-23 12:36:36', NULL, NULL, 1, 1, 0, '2024-07-09', NULL, 'House', 'house', NULL, 1, 2, NULL, NULL, NULL, '421231', 'open', NULL, NULL, 'male'),
(32, 'Test', 5.00, 7, '2024-07-24 11:00:47', '2024-07-24 11:00:47', 3, 1, NULL, 1, 1, '2024-07-15', NULL, 'House', 'shared', NULL, 1, 5, 2.00, NULL, NULL, '090000000000', 'open', NULL, NULL, 'male');

-- --------------------------------------------------------

--
-- Table structure for table `ads_type`
--

CREATE TABLE `ads_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ads_type`
--

INSERT INTO `ads_type` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'البحث عن شقة', 'البحث عن شقة للأجار', NULL, NULL),
(2, 'البحث عن شريك', 'البحث عن شريك للسكن', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'أبوظبي', 1, '2024-07-14 08:57:24', '2024-07-14 08:57:24'),
(2, 'دبي', 1, '2024-07-14 08:57:24', '2024-07-14 08:57:24'),
(3, 'الشارقة', 1, '2024-07-14 08:57:24', '2024-07-14 08:57:24'),
(4, 'عجمان', 1, '2024-07-14 08:57:24', '2024-07-14 08:57:24'),
(5, 'رأس الخيمة', 1, '2024-07-14 08:57:24', '2024-07-14 08:57:24'),
(6, 'الفجيرة', 1, '2024-07-14 08:57:24', '2024-07-14 08:57:24'),
(7, 'أم القيوين', 1, '2024-07-14 08:57:24', '2024-07-14 08:57:24');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'الإمارات العربية المتحدة', '2024-07-14 08:57:24', '2024-07-14 08:57:24');

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
-- Table structure for table `imageads`
--

CREATE TABLE `imageads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `ad_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `imageads`
--

INSERT INTO `imageads` (`id`, `image_path`, `ad_id`, `created_at`, `updated_at`) VALUES
(2, 'ads_images/1721740269_splash.jpeg', 28, '2024-07-23 10:11:09', '2024-07-23 10:11:09'),
(3, 'ads_images/1721740269_splash_2.jpg', 28, '2024-07-23 10:11:09', '2024-07-23 10:11:09'),
(6, 'ads_images/1721743458_splash_2.jpg', 30, '2024-07-23 11:04:18', '2024-07-23 11:04:18'),
(7, 'ads_images/1721748996_splash.jpeg', 31, '2024-07-23 12:36:36', '2024-07-23 12:36:36'),
(8, 'ads_images/1721748996_splash_2.jpg', 31, '2024-07-23 12:36:36', '2024-07-23 12:36:36'),
(9, 'ads_images/1721829647_splash.jpeg', 32, '2024-07-24 11:00:47', '2024-07-24 11:00:47'),
(10, 'ads_images/1721829647_splash_2.jpg', 32, '2024-07-24 11:00:47', '2024-07-24 11:00:47');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '2024_07_14_104451_create_countries_table', 1),
(2, '2024_07_14_104759_create_cities_table', 2),
(3, '2024_07_14_104106_create_account_types_table', 3),
(4, '0001_01_01_000000_create_users_table', 4),
(5, '0001_01_01_000001_create_cache_table', 5),
(6, '0001_01_01_000002_create_jobs_table', 5),
(7, '2024_07_14_105336_create_ads_type_table', 5),
(8, '2024_07_14_105519_create_residence_type_table', 5),
(9, '2024_07_14_105734_create_ads_table', 5),
(10, '2024_07_21_084256_add_profile_picture_to_users_table', 6),
(11, '2024_07_21_111041_add_account_type_enum_to_users_table', 7),
(12, '2024_07_21_111347_drop_account_types_table', 8),
(13, '2024_07_21_112158_remove_account_type_foreign_key_from_users_table', 9),
(14, '2024_07_21_111347_drop_account_types1_table', 10),
(15, '2024_07_21_113510_update_ads_table_for_different_ad_types', 11),
(16, '2024_07_21_134401_add_new_fields_to_ads_table', 12),
(17, '2024_07_21_134401_add_new_fields_to_ads1_table', 13),
(18, '2024_07_21_140856_drop_foreign_keys_from_ads_table', 14),
(19, '2024_07_21_140856_drop_foreign_keys_from_ads1_table', 15),
(20, '2024_07_22_145356_create_images_table', 16),
(21, '2024_07_23_122504_create_image_ads_table', 17);

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
-- Table structure for table `residence_type`
--

CREATE TABLE `residence_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `residence_type`
--

INSERT INTO `residence_type` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'شقة', 'شقة سكنية في مبنى متعدد الطوابق', NULL, NULL),
(2, 'غرفة', 'غرفة مستقلة', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('8eRSniq9HrahyfdowCwIagbIOujtwQQEGYLdyumL', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36 Edg/126.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMExQN0tVN3ZtV3A2ZEZPdFhkVWVpM0RHMlZtbW8wd0o0bTEzaTJGcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2Vycy9ob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3VzZXJzL3Byb2ZpbGUvNyI7fX0=', 1721896537);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `job` varchar(255) DEFAULT NULL,
  `marital_status` enum('single','married','divorced','widowed') DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `account_type` enum('Search for Residence','Search for Roommate') NOT NULL DEFAULT 'Search for Residence'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `phone_number`, `birthday`, `gender`, `nationality`, `country_id`, `city_id`, `job`, `marital_status`, `profile_picture`, `remember_token`, `created_at`, `updated_at`, `account_type`) VALUES
(5, 'ali', 'alsaadi', 'dota50882@gmail.com', NULL, '$2y$12$5TkWRItnhmvV8leH20ihJuGQbvd320sxptAFJ/gLDVGAkXdAtjssy', '0931606119', '2024-07-18', 'male', 'syrian', 1, 3, 'it', 'single', 'profile_pictures/1721554294.jpg', NULL, '2024-07-18 04:42:56', '2024-07-22 10:25:12', 'Search for Residence'),
(7, 'ali', 'mrhj', 'aloshmrhj555@gmail.com', NULL, '$2y$12$PH.tYNSTjMmcRs.TxxgBfORdTH2jl6Uhq1PbsT9JR6P8Hhm3WjF72', '654443', '2000-07-22', 'male', 'syrian', 1, 2, 'it', 'married', 'profile_pictures/1721655382.jpg', NULL, '2024-07-22 10:34:59', '2024-07-23 10:07:53', 'Search for Roommate');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ads_user_id_foreign` (`user_id`),
  ADD KEY `ads_country_id_foreign` (`country_id`),
  ADD KEY `ads_city_id_foreign` (`city_id`);

--
-- Indexes for table `ads_type`
--
ALTER TABLE `ads_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_country_id_foreign` (`country_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `imageads`
--
ALTER TABLE `imageads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imageads_ad_id_foreign` (`ad_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `residence_type`
--
ALTER TABLE `residence_type`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_country_id_foreign` (`country_id`),
  ADD KEY `users_city_id_foreign` (`city_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `ads_type`
--
ALTER TABLE `ads_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imageads`
--
ALTER TABLE `imageads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `residence_type`
--
ALTER TABLE `residence_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ads`
--
ALTER TABLE `ads`
  ADD CONSTRAINT `ads_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `ads_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `ads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `imageads`
--
ALTER TABLE `imageads`
  ADD CONSTRAINT `imageads_ad_id_foreign` FOREIGN KEY (`ad_id`) REFERENCES `ads` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
