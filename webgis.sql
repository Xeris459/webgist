-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2021 at 03:33 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webgis`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `tempat_ibadah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`, `tempat_ibadah`) VALUES
(1, 'super admin', 'developer permission', NULL),
(2, 'admin', 'reguler permission', NULL),
(3, 'Takmir', 'pengurus masjid', 'Masjid');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 8),
(2, 25),
(3, 24);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'vikryking@gmail.com', NULL, '2021-10-12 18:58:38', 0),
(2, '::1', 'vikryking@gmail.com', NULL, '2021-10-12 18:58:43', 0),
(3, '::1', 'vikryking@gmail.com', NULL, '2021-10-12 18:58:53', 0),
(4, '::1', 'vikryking@gmail.com', NULL, '2021-10-12 18:58:58', 0),
(5, '::1', 'vikryking@gmail.com', NULL, '2021-10-12 19:03:41', 0),
(6, '::1', 'vikryanto449@gmail.com', 10, '2021-10-12 19:34:40', 1),
(7, '::1', 'vikryking@gmail.com', 8, '2021-10-12 19:35:25', 1),
(8, '::1', 'vikryking@gmail.com', 8, '2021-10-13 01:39:03', 1),
(9, '::1', 'vikryking@gmail.com', 8, '2021-10-13 08:56:30', 1),
(10, '::1', 'vikryking@gmail.com', 8, '2021-10-13 08:56:31', 1),
(11, '::1', 'vikryking@gmail.com', 8, '2021-10-14 06:41:06', 1),
(12, '::1', 'vikryking@gmail.com', 8, '2021-10-14 06:46:20', 1),
(13, '::1', 'vikryking@gmail.com', 8, '2021-10-14 19:09:41', 1),
(14, '::1', 'vikryking@gmail.com', NULL, '2021-10-15 01:37:29', 0),
(15, '::1', 'vikryking@gmail.com', 8, '2021-10-15 01:37:34', 1),
(16, '::1', 'vikryking@gmail.com', 8, '2021-10-15 22:12:03', 1),
(17, '::1', 'vikryking@gmail.com', NULL, '2021-10-17 06:39:23', 0),
(18, '::1', 'vikryking@gmail.com', 8, '2021-10-17 06:59:49', 1),
(19, '::1', 'takmir@gmail.com', 24, '2021-10-17 07:03:32', 1),
(20, '::1', 'vikryking@gmail.com', 8, '2021-10-17 07:07:24', 1),
(21, '::1', 'takmir@gmail.com', 24, '2021-10-17 07:59:28', 1),
(22, '::1', 'vikryking@gmail.com', 8, '2021-10-17 07:59:40', 1),
(23, '::1', 'vikryking@gmail.com', 8, '2021-10-19 06:25:50', 1),
(24, '::1', 'admin@l-cq.com', 25, '2021-10-19 07:24:32', 1),
(25, '::1', 'vikryking@gmail.com', 8, '2021-10-19 07:24:45', 1),
(26, '::1', 'vikryking@gmail.com', 8, '2021-10-19 08:46:25', 1),
(27, '::1', 'vikryking@gmail.com', 8, '2021-10-19 09:46:54', 1),
(28, '::1', 'vikryking@gmail.com', NULL, '2021-10-20 05:54:51', 0),
(29, '::1', 'vikryking@gmail.com', 8, '2021-10-20 05:54:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_tokens`
--

INSERT INTO `auth_tokens` (`id`, `selector`, `hashedValidator`, `user_id`, `expires`) VALUES
(3, 'fd30edf192d531f4fe49478e', '2978504f9b1c5693d9989bb9b7d71da12febc448844247bd05f6484af3e86bed', 8, '2021-11-19 04:54:57');

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) UNSIGNED NOT NULL,
  `users_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `users_id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 8, 'Fakir Miskin', '2021-10-19 07:13:44', '2021-10-19 07:13:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `keluarga`
--

CREATE TABLE `keluarga` (
  `id` int(11) UNSIGNED NOT NULL,
  `mark_id` int(11) NOT NULL,
  `NIK` int(18) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birthday` date DEFAULT NULL,
  `gender` enum('laki-laki','perempuan') DEFAULT NULL,
  `isworker` int(1) NOT NULL DEFAULT 0,
  `pekerjaan` varchar(255) DEFAULT NULL,
  `pendapatan` int(50) DEFAULT NULL,
  `asal_sekolah` varchar(255) DEFAULT NULL,
  `jenjang_pendidikan` varchar(255) DEFAULT NULL,
  `agama` enum('islam','katolik','kristen','budha','hindu') DEFAULT NULL,
  `status` enum('menikah','belum menikah','janda','duda') DEFAULT NULL,
  `kepala_keluarga` int(1) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `bersekolah` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keluarga`
--

INSERT INTO `keluarga` (`id`, `mark_id`, `NIK`, `name`, `birthday`, `gender`, `isworker`, `pekerjaan`, `pendapatan`, `asal_sekolah`, `jenjang_pendidikan`, `agama`, `status`, `kepala_keluarga`, `created_at`, `updated_at`, `deleted_at`, `bersekolah`) VALUES
(1, 1, 0, 'Kiana Kaslana', '2021-10-20', 'perempuan', 0, '', 0, '', '', 'islam', 'belum menikah', 0, '2021-10-20 09:40:18', '2021-10-20 09:40:18', NULL, 0),
(2, 2, 0, 'keqing', '2021-10-20', 'perempuan', 0, '', 0, '', '', 'budha', 'belum menikah', 1, '2021-10-20 09:40:53', '2021-10-20 09:40:53', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

CREATE TABLE `mark` (
  `id` int(11) UNSIGNED NOT NULL,
  `users_id` int(11) NOT NULL,
  `color` varchar(10) NOT NULL,
  `longtitude` varchar(50) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mark`
--

INSERT INTO `mark` (`id`, `users_id`, `color`, `longtitude`, `latitude`, `image`, `created_at`, `updated_at`, `deleted_at`, `title`, `category_id`) VALUES
(1, 8, '#ffc107', '117.50555455684663', '0.13359534556007394', '1634740818_3393929aacf82cde9724.jpg', '2021-10-20 09:40:18', '2021-10-20 09:40:18', NULL, 'Kiana', NULL),
(2, 8, '#000000', '117.50506103038789', '0.13365435399792439', '1634740852_140ca351ba6fc45cc6ff.png', '2021-10-20 09:40:53', '2021-10-20 09:40:53', NULL, 'keqing', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2021-10-17-025744', 'App\\Database\\Migrations\\Mark', 'default', 'App', 1634440124, 1),
(2, '2021-10-17-030011', 'App\\Database\\Migrations\\Keluarga', 'default', 'App', 1634440200, 2),
(3, '2021-10-17-052144', 'App\\Database\\Migrations\\Mark', 'default', 'App', 1634448455, 3),
(4, '2021-10-17-052502', 'App\\Database\\Migrations\\Category', 'default', 'App', 1634448455, 3),
(5, '2021-10-17-062757', 'App\\Database\\Migrations\\Keluarga', 'default', 'App', 1634452163, 4),
(6, '2021-10-19-134351', 'App\\Database\\Migrations\\Users', 'default', 'App', 1634651161, 5),
(7, '2021-10-19-134501', 'App\\Database\\Migrations\\Role', 'default', 'App', 1634651161, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.svg',
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `long` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `fullname`, `image`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`, `lat`, `long`) VALUES
(8, 'vikryking@gmail.com', 'vikri anto', 'vikri anto', 'default.svg', '$2y$10$i7EOm5rPX6E3f/./ccQkI.3VT6GlmIw8rWrJM/qNEzKWWj0gzg7fu', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-09-23 21:03:45', '2021-10-19 10:00:09', NULL, '0.13379382848683', '117.50612854958'),
(24, 'takmir@gmail.com', 'takmir', 'takmir12', 'default.svg', '$2y$10$PZIw.V1e5H1P3wF7Z2n0a.rmGXBBL8DHw708tI70LFgzMLoQkIyLK', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-10-17 07:03:18', '2021-10-17 09:03:07', NULL, NULL, NULL),
(25, 'admin@l-cq.com', 'admin lcq', 'admin lcq', 'default.svg', '$2y$10$6uowJ2P1z1YqMx8J2ueR6.2pJMvuQZ99neO/xDrFxehSFm.WzgSHW', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-10-17 09:07:39', '2021-10-17 09:07:39', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mark_id` (`mark_id`);

--
-- Indexes for table `mark`
--
ALTER TABLE `mark`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `keluarga`
--
ALTER TABLE `keluarga`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mark`
--
ALTER TABLE `mark`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
