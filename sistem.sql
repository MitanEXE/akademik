-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2020 at 02:49 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `id_kelas` int(10) UNSIGNED NOT NULL,
  `ket_absensi` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_absensi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_pengguna`
--

CREATE TABLE `data_pengguna` (
  `id` int(10) UNSIGNED NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_hp` bigint(20) DEFAULT NULL,
  `nama_ortu_wali` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir_ortu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir_ortu` date DEFAULT NULL,
  `alamat_ortu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp_ortu` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_pengguna`
--

INSERT INTO `data_pengguna` (`id`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `no_hp`, `nama_ortu_wali`, `tempat_lahir_ortu`, `tanggal_lahir_ortu`, `alamat_ortu`, `no_hp_ortu`) VALUES
(1, 'Alamat Default', 'Tempat Lahir', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Alamat Default', 'Tempat Lahir', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'andia', 'andia', '2020-08-07', 1111111111, NULL, NULL, NULL, NULL, NULL),
(6, 'andi', 'andi', '2020-08-07', 1111111111, NULL, NULL, NULL, NULL, NULL),
(7, 'hendra', 'hendra', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'andiaa', 'candra', '2020-08-07', 1111111, NULL, NULL, NULL, NULL, NULL),
(9, 'andi', '18171', '2020-08-29', 1111111, NULL, NULL, NULL, NULL, NULL),
(10, 'andi', '18171', '2020-08-29', 1111111, NULL, NULL, NULL, NULL, NULL),
(11, 'andi', '18171', '2020-08-29', 1111111, NULL, NULL, NULL, NULL, NULL),
(12, 'andi', '18171', '2020-08-29', 1111111, NULL, NULL, NULL, NULL, NULL),
(13, 'andi', '18171', '2020-08-29', 1111111, NULL, NULL, NULL, NULL, NULL),
(14, 'andi', '18171', '2020-08-29', 1111111, NULL, NULL, NULL, NULL, NULL),
(15, 'andi', '18171', '2020-08-29', 1111111, NULL, NULL, NULL, NULL, NULL),
(16, 'andi', '18171', '2020-08-29', 1111111, NULL, NULL, NULL, NULL, NULL),
(17, 'andi', '18171', '2020-08-29', 1111111, NULL, NULL, NULL, NULL, NULL),
(21, 'aaaaa', 'aaaaaaaaa', '2020-08-13', 8121, NULL, NULL, NULL, NULL, NULL),
(23, 'Batu Batam', 'Tanjung Berlian Kundur', '2003-07-06', 81374819762, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `untuk` enum('Publik','Siswa','Orang Tua','Guru') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id`, `judul`, `isi`, `user_id`, `untuk`, `created_at`, `updated_at`) VALUES
(1, 'SPP', 'WOI BAYAR SPP', 1, 'Publik', '2020-08-12 14:41:57', '2020-08-12 14:41:57');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(10) UNSIGNED NOT NULL,
  `nama_kelas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(2, 'ACC XII'),
(3, 'MKT XII'),
(7, 'RPL XI'),
(1, 'RPL XII'),
(5, 'SMP IX'),
(6, 'SMP VII'),
(4, 'SMP VIII');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(10) UNSIGNED NOT NULL,
  `kode_mapel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mapel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `kode_mapel`, `nama_mapel`) VALUES
(1, 'BINDO1', 'Bahasa indonesia'),
(2, 'BING1', 'Bahasa Inggris');

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
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_resets_table', 1),
(15, '2017_04_13_100359_entrust_setup_tables', 1),
(16, '2017_04_26_084234_TableKelasMigration', 1),
(17, '2017_04_28_154324_TableRombelMigration', 1),
(18, '2017_04_30_162733_TableMatapelajaranMigration', 1),
(19, '2017_05_01_080618_TableNilaiMigrate', 1),
(20, '2017_05_31_172808_TableAbsensiMigration', 1),
(21, '2017_08_04_141351_Create_table_data_pengguna', 1),
(22, '2017_08_04_150225_create_relation_useranddatapengguna', 1),
(23, '2017_08_18_004205_CreateTableSmsGateway', 1),
(24, '2017_08_20_185245_crate_table_informasi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(10) UNSIGNED NOT NULL,
  `kode_mapel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `nilai` int(10) UNSIGNED NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `kode_mapel`, `user_id`, `nilai`, `keterangan`) VALUES
(2, 'BINDO1', 7, 75, 'Ulangan Harian'),
(4, 'BINDO1', 6, 90, 'Makan Makan'),
(5, 'BINDO1', 6, 75, 'Final Blok'),
(6, 'BINDO1', 7, 75, 'Final Blok');

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
  `id` int(10) UNSIGNED NOT NULL,
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
(1, 'RoleRead', 'Display Roles Listing RoleRead', 'Deskprisi RoleRead', '2020-08-12 14:00:04', '2020-08-12 14:00:04'),
(2, 'RoleWrite', 'Display Roles Listing RoleWrite', 'Deskprisi RoleWrite', '2020-08-12 14:00:04', '2020-08-12 14:00:04'),
(3, 'RoleCreate', 'Display Roles Listing RoleCreate', 'Deskprisi RoleCreate', '2020-08-12 14:00:04', '2020-08-12 14:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
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
(1, 'Admin', 'Display Roles Listing Admin', 'Deskprisi Role Admin', '2020-08-12 14:00:04', '2020-08-12 14:00:04'),
(2, 'Guru', 'Display Roles Listing Guru', 'Deskprisi Role Guru', '2020-08-12 14:00:04', '2020-08-12 14:00:04'),
(3, 'Siswa', 'Display Roles Listing Siswa', 'Deskprisi Role Siswa', '2020-08-12 14:00:04', '2020-08-12 14:00:04'),
(4, 'Orang Tua', 'Display Roles Listing Orang Tua', 'Deskprisi Role Orang tua', '2020-08-12 14:00:04', '2020-08-12 14:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(6, 3),
(7, 3),
(40, 3);

-- --------------------------------------------------------

--
-- Table structure for table `rombel`
--

CREATE TABLE `rombel` (
  `id_kelas` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rombel`
--

INSERT INTO `rombel` (`id_kelas`, `user_id`) VALUES
(1, 6),
(1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `smsgateway`
--

CREATE TABLE `smsgateway` (
  `id` int(10) UNSIGNED NOT NULL,
  `notujuan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isipesan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Terkirim','Pending') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smsgateway`
--

INSERT INTO `smsgateway` (`id`, `notujuan`, `isipesan`, `status`, `created_at`, `updated_at`) VALUES
(1, '081374819762', 'aaaaaaaaaa', 'Terkirim', '2020-08-19 03:18:04', '2020-08-19 03:18:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_pengguna_id` int(10) UNSIGNED DEFAULT NULL,
  `job` enum('Guru','Siswa','Orang Tua','Admin') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('nonaktif','aktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'nonaktif',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `agama` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `data_pengguna_id`, `job`, `gender`, `status`, `email`, `password`, `picture`, `remember_token`, `created_at`, `updated_at`, `agama`) VALUES
(1, 'admin@lfyteam.com', 'Admin', 1, 'Admin', NULL, 'aktif', 'admin@a.com', '$2y$10$L8SftuvFYOdnUCsW41mJlOeP.bMuZxXqbmr0SqgT2m4EQtLXTAa52', 'sY497LF5TA.jpg', '58SEFRtzJQG7JoHioYxirDdOU9vljMgnKzlku73T4ZSgTNuzacL3u02kO53H', '2020-08-12 14:00:04', '2020-08-23 06:19:56', ''),
(2, 'guru', 'Guru', 2, 'Guru', NULL, 'aktif', 'guru@a.com', '$2y$10$L8SftuvFYOdnUCsW41mJlOeP.bMuZxXqbmr0SqgT2m4EQtLXTAa52', '49mMmBx1cE.JPG', 'b9bx5efFB6wMkCnJw5fMrZWmwe30bmL7ZBemriY4W6RpGoLc8l1gPyTJMkIc', '2020-08-12 14:00:04', '2020-08-12 14:01:11', ''),
(5, 'org', 'org', NULL, 'Orang Tua', 'Laki-laki', 'aktif', 'org', '$2y$10$L8SftuvFYOdnUCsW41mJlOeP.bMuZxXqbmr0SqgT2m4EQtLXTAa52', 'org', NULL, NULL, NULL, 'org'),
(6, 'andia', 'andia', 5, 'Siswa', 'Laki-laki', 'aktif', 'andia@and.com', '$2y$10$vhP5JCTN1duNkQ8vvd1YAeU8XHeMe8ynN3gER8Xs8MeFZuGiBAVNS', NULL, NULL, '2020-08-21 16:17:45', '2020-08-21 16:17:45', NULL),
(7, 'andi', 'andi', 6, 'Siswa', 'Laki-laki', 'aktif', 'andi@s.comm', '$2y$10$uUh6TtHkymR3V2LOKDeSjOgD.3Vpgl.0JWU5FNnY9YPZumrLFbQf.', NULL, NULL, '2020-08-21 16:23:52', '2020-08-21 16:23:52', NULL),
(38, 'a11', 'aaaaaaaaa', 21, 'Siswa', 'Laki-laki', 'nonaktif', 'andiaa@andia.com', '$2y$10$ZXxl.Q8nfx5xO6Ymp.yqy.p1xjfuk4ybYJpA0PuAGya4xQ58uZ9pS', NULL, NULL, '2020-08-21 17:32:51', '2020-08-21 17:32:51', NULL),
(40, '18161041', 'Hendra Huang', 23, 'Siswa', 'Laki-laki', 'aktif', 'hendra@hendra.com', '$2y$10$y97rHCfD5PxmKLHeOijdvecndcb093FHm6hLLgN.gTRbEW0lEm/XK', NULL, NULL, '2020-08-23 03:49:57', '2020-08-23 03:49:57', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `absensi_id_kelas_foreign` (`id_kelas`),
  ADD KEY `absensi_user_id_foreign` (`user_id`);

--
-- Indexes for table `data_pengguna`
--
ALTER TABLE `data_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `informasi_user_id_foreign` (`user_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD UNIQUE KEY `kelas_nama_kelas_unique` (`nama_kelas`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`),
  ADD UNIQUE KEY `mapel_kode_mapel_unique` (`kode_mapel`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `nilai_kode_mapel_foreign` (`kode_mapel`),
  ADD KEY `nilai_user_id_foreign` (`user_id`);

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `rombel`
--
ALTER TABLE `rombel`
  ADD PRIMARY KEY (`id_kelas`,`user_id`),
  ADD KEY `rombel_user_id_foreign` (`user_id`);

--
-- Indexes for table `smsgateway`
--
ALTER TABLE `smsgateway`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_data_pengguna_id_foreign` (`data_pengguna_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_pengguna`
--
ALTER TABLE `data_pengguna`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `smsgateway`
--
ALTER TABLE `smsgateway`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `absensi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `informasi`
--
ALTER TABLE `informasi`
  ADD CONSTRAINT `informasi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_kode_mapel_foreign` FOREIGN KEY (`kode_mapel`) REFERENCES `mapel` (`kode_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rombel`
--
ALTER TABLE `rombel`
  ADD CONSTRAINT `rombel_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rombel_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_data_pengguna_id_foreign` FOREIGN KEY (`data_pengguna_id`) REFERENCES `data_pengguna` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
