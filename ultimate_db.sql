-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2021 at 03:22 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ultimate_db`
--

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
(4, '2021_06_16_130935_laratrust_setup_tables', 1),
(5, '2021_06_22_082107_create_provinces_table', 1),
(6, '2021_10_23_090423_create_notifications_table', 1),
(7, '2021_11_02_103507_create_projects_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'users_create', 'Create Users', 'Create Users', '2021-11-02 07:47:03', '2021-11-02 07:47:03'),
(2, 'users_read', 'Read Users', 'Read Users', '2021-11-02 07:47:03', '2021-11-02 07:47:03'),
(3, 'users_update', 'Update Users', 'Update Users', '2021-11-02 07:47:03', '2021-11-02 07:47:03'),
(4, 'users_delete', 'Delete Users', 'Delete Users', '2021-11-02 07:47:04', '2021-11-02 07:47:04'),
(5, 'project_create', 'Create Project', 'Create Project', '2021-11-02 07:47:04', '2021-11-02 07:47:04'),
(6, 'project_read', 'Read Project', 'Read Project', '2021-11-02 07:47:04', '2021-11-02 07:47:04'),
(7, 'project_update', 'Update Project', 'Update Project', '2021-11-02 07:47:04', '2021-11-02 07:47:04'),
(8, 'project_delete', 'Delete Project', 'Delete Project', '2021-11-02 07:47:04', '2021-11-02 07:47:04');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `user_id`, `location`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'شيس', 'شسي', 1, 'الأقصر', '1', '2021-11-02 11:12:11', '2021-11-02 11:12:11'),
(2, 'asd', 'asd', 2, 'قنا', '1', '2021-11-02 12:11:24', '2021-11-02 12:11:24'),
(4, 'mmmasdsadasd', 'adsasdasdasdasd', 1, 'الأقصر', 'Super Admin', '2021-11-02 12:16:52', '2021-11-04 10:41:32'),
(5, 'asd', 'asd', NULL, 'سوهاج', 'Super Admin', '2021-11-02 12:17:41', '2021-11-02 12:17:41'),
(6, 'asd', 'asd', NULL, 'قنا', 'Super Admin', '2021-11-02 12:18:10', '2021-11-02 12:18:10'),
(7, 'asdasd', 'asdasda', NULL, 'قنا', 'Super Admin', '2021-11-02 12:20:50', '2021-11-02 12:20:50'),
(9, 'test', 'test', NULL, 'مطروح', 'Super Admin', '2021-11-02 12:22:42', '2021-11-02 13:20:31'),
(10, 'das', 'asd', NULL, 'الإسكندرية', 'Super Admin', '2021-11-03 06:46:56', '2021-11-03 06:46:56'),
(11, 'asd', 'asdasd', NULL, 'بورسعيد', 'Super Admin', '2021-11-03 06:48:17', '2021-11-03 06:48:17'),
(12, 'aa', 'aa', NULL, 'الأقصر', 'Super Admin', '2021-11-03 06:53:53', '2021-11-03 06:53:53'),
(13, 'adasd', 'asdasd', NULL, 'بورسعيد', 'Super Admin', '2021-11-03 06:54:43', '2021-11-03 06:54:43'),
(14, 'ads', 'sadasd', NULL, 'بورسعيد', 'Super Admin', '2021-11-03 06:56:07', '2021-11-03 06:56:07'),
(15, 'asd', 'adsasdasdasdasdadsasdasdasd', 1, 'الأقصر', 'Super Admin', '2021-11-04 11:24:45', '2021-11-04 11:24:45'),
(16, 'asd', 'asd', 1, 'الأقصر', 'Super Admin', '2021-11-04 11:25:04', '2021-11-04 11:25:04'),
(17, 'asdasd', 'asdasdasdsa', 1, 'سوهاج', 'Super Admin', '2021-11-04 11:25:41', '2021-11-04 11:25:41'),
(18, 'asd', 'sadasd', 1, 'بورسعيد', 'Super Admin', '2021-11-04 11:26:07', '2021-11-04 11:26:07');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'القاهرة', '2021-11-02 07:47:07', '2021-11-02 07:47:07'),
(2, 'الإسكندرية', '2021-11-02 07:47:07', '2021-11-02 07:47:07'),
(3, 'بورسعيد', '2021-11-02 07:47:07', '2021-11-02 07:47:07'),
(4, 'الأقصر', '2021-11-02 07:47:07', '2021-11-02 07:47:07'),
(5, 'قنا', '2021-11-02 07:47:08', '2021-11-02 07:47:08'),
(6, 'سوهاج', '2021-11-02 07:47:08', '2021-11-02 07:47:08'),
(7, 'الجيزة', '2021-11-02 07:47:08', '2021-11-02 07:47:08'),
(8, 'الدقهلية', '2021-11-02 07:47:08', '2021-11-02 07:47:08'),
(9, 'دمياط', '2021-11-02 07:47:08', '2021-11-02 07:47:08'),
(10, 'كفر الشيخ', '2021-11-02 07:47:08', '2021-11-02 07:47:08'),
(11, 'السويس', '2021-11-02 07:47:08', '2021-11-02 07:47:08'),
(12, 'الغربية', '2021-11-02 07:47:08', '2021-11-02 07:47:08'),
(13, 'الفيوم', '2021-11-02 07:47:08', '2021-11-02 07:47:08'),
(14, 'المنوفية', '2021-11-02 07:47:08', '2021-11-02 07:47:08'),
(15, 'مطروح', '2021-11-02 07:47:08', '2021-11-02 07:47:08'),
(16, 'الوادي الجديد', '2021-11-02 07:47:08', '2021-11-02 07:47:08'),
(17, 'المنيا', '2021-11-02 07:47:08', '2021-11-02 07:47:08'),
(18, 'أسوان', '2021-11-02 07:47:08', '2021-11-02 07:47:08'),
(19, 'البحيرة', '2021-11-02 07:47:08', '2021-11-02 07:47:08'),
(20, 'بني سويف', '2021-11-02 07:47:08', '2021-11-02 07:47:08'),
(21, 'الإسماعيلية', '2021-11-02 07:47:08', '2021-11-02 07:47:08'),
(22, 'أسيوط', '2021-11-02 07:47:08', '2021-11-02 07:47:08'),
(23, 'شمال سيناء', '2021-11-02 07:47:08', '2021-11-02 07:47:08'),
(24, 'جنوب سيناء', '2021-11-02 07:47:08', '2021-11-02 07:47:08'),
(25, 'البحر الأحمر', '2021-11-02 07:47:08', '2021-11-02 07:47:08'),
(26, 'القليوبية', '2021-11-02 07:47:08', '2021-11-02 07:47:08');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'Super Admin', 'Super Admin', '2021-11-02 07:47:03', '2021-11-02 07:47:03'),
(2, 'admin', 'Admin', 'Admin', '2021-11-02 07:47:06', '2021-11-02 07:47:06');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dueDate` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `urgency` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `project_id`, `name`, `description`, `dueDate`, `status`, `urgency`, `created_by`, `created_at`, `updated_at`) VALUES
(2, NULL, 'asd', 'sad', '2021-11-24', '1', '2', 'Super Admin', '2021-11-04 08:20:10', '2021-11-04 08:20:10'),
(3, NULL, 'aaaaaaaaaaaa', 'asdads', '2021-11-09', '1', '2', 'Super Admin', '2021-11-04 08:20:15', '2021-11-04 10:35:07'),
(4, NULL, 'asd', 'asdasdad sad oias d8yoovuhvhdv idfuhvjkdfhvhdfuvdfvj dfkjvnk jn v kcxjznvkjx vzvxzvxcvxzvcvxzvxcz', '2021-11-16', '1', '2', 'Super Admin', '2021-11-04 08:20:16', '2021-11-04 10:40:46'),
(5, NULL, 'asd', 'sad', '2021-11-24', '1', '2', 'Super Admin', '2021-11-04 08:20:16', '2021-11-04 08:20:16'),
(6, 3, 'sdas', 'asdads', '2021-11-09', '1', '2', 'Super Admin', '2021-11-04 08:21:10', '2021-11-04 08:21:10'),
(7, 3, 'asd', 'asd', '2021-11-01', '1', '1', 'Super Admin', '2021-11-04 08:22:45', '2021-11-04 08:22:45'),
(10, 4, 'test', 'tetsc', '2021-11-23', '2', '1', 'Super Admin', '2021-11-04 08:28:53', '2021-11-04 08:28:53'),
(11, 4, 'aaaaaaaaaaaa', 'tetsc', '2021-11-23', '2', '1', 'Super Admin', '2021-11-04 08:29:02', '2021-11-04 08:29:02'),
(12, 4, 'aaaaaaaaaaaa', 'tetsc', '2021-11-03', '2', '1', 'Super Admin', '2021-11-04 08:29:20', '2021-11-04 08:29:20'),
(13, 1, 'aaaaaaaaaaaa', 'tetsc', '2021-11-03', '2', '1', 'Super Admin', '2021-11-04 08:30:41', '2021-11-04 08:30:41'),
(14, 4, 'asd', 'aaaa', '2021-11-17', '1', '1', 'Super Admin', '2021-11-04 09:33:59', '2021-11-04 09:33:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `first_name`, `last_name`, `location`, `job_title`, `mobile`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super', 'Admin', 'cairo', 'Maneger', '01239456549', 'super_admin@gmail.com', NULL, '$2y$10$lyt6GIhztUkpT57wY2JL6OBVxZlTdEuP8alrhe1/Id5O7P2AiPuwW', NULL, '2021-11-02 07:47:06', '2021-11-02 07:47:06');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
