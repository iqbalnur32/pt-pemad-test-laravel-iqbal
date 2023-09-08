-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 202.145.3.66
-- Generation Time: Sep 08, 2023 at 04:34 PM
-- Server version: 5.7.42-0ubuntu0.18.04.1
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testiqbal`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahasa`
--

CREATE TABLE `bahasa` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `klien`
--

CREATE TABLE `klien` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `klien`
--

INSERT INTO `klien` (`id`, `nama`, `alamat`, `telepon`, `email`, `created_at`, `updated_at`) VALUES
(3, 'Iqbal Nur Wicaksana', 'Graha Harapan Regency, Blok G3 / 3, Babelan Kota, Babelan', '089898989', 'iqbalnurw9@gmail.com', '2023-09-02 17:39:03', '2023-09-02 17:39:03'),
(4, 'Alwan', 'Gotong Royong', '089889812', 'alwanputra2712@gmail.com', '2023-09-02 17:39:21', '2023-09-02 17:39:21');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2023_09_02_052822_create_klien_table', 1),
(5, '2023_09_02_052850_create_tipe_perkerjaan_table', 1),
(6, '2023_09_02_052941_create_pekerjaan_table', 1),
(7, '2023_09_02_053337_create_proyek_table', 1),
(8, '2023_09_02_053344_create_penawaran_jasa_table', 1),
(9, '2023_09_02_053350_create_permintaan_jasa_table', 1),
(10, '2023_09_02_053357_create_tagihan_table', 1),
(11, '2023_09_02_053403_create_pembayaran_pembelian_table', 1),
(12, '2023_09_02_053409_create_pesanaan_pembelian_table', 1),
(13, '2023_09_02_053416_create_perusahaan_table', 1),
(14, '2023_09_02_053422_create_bahasa_table', 1);

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
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_pekerjaan_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id`, `nama`, `tipe_pekerjaan_id`, `created_at`, `updated_at`) VALUES
(4, 'Pembuatan Sistem', NULL, '2023-09-03 02:48:40', '2023-09-03 02:48:40'),
(5, 'Management Sistem', NULL, '2023-09-03 02:48:51', '2023-09-03 02:48:51');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_pembelian`
--

CREATE TABLE `pembayaran_pembelian` (
  `id` int(10) UNSIGNED NOT NULL,
  `tagihan_id` int(10) UNSIGNED DEFAULT NULL,
  `jumlah` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayaran_pembelian`
--

INSERT INTO `pembayaran_pembelian` (`id`, `tagihan_id`, `jumlah`, `created_at`, `updated_at`) VALUES
(2, 1, '1.00', '2023-09-03 15:44:23', '2023-09-03 15:44:53');

-- --------------------------------------------------------

--
-- Table structure for table `penawaran_jasa`
--

CREATE TABLE `penawaran_jasa` (
  `id` int(10) UNSIGNED NOT NULL,
  `pekerjaan_id` int(10) UNSIGNED DEFAULT NULL,
  `proyek_id` int(10) UNSIGNED DEFAULT NULL,
  `harga` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penawaran_jasa`
--

INSERT INTO `penawaran_jasa` (`id`, `pekerjaan_id`, `proyek_id`, `harga`, `created_at`, `updated_at`) VALUES
(1, 4, 2, '200000.00', '2023-09-03 02:51:25', '2023-09-03 14:40:31'),
(2, 5, 3, '10000.00', '2023-09-03 14:38:48', '2023-09-03 14:38:48');

-- --------------------------------------------------------

--
-- Table structure for table `permintaan_jasa`
--

CREATE TABLE `permintaan_jasa` (
  `id` int(10) UNSIGNED NOT NULL,
  `pekerjaan_id` int(10) UNSIGNED DEFAULT NULL,
  `proyek_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permintaan_jasa`
--

INSERT INTO `permintaan_jasa` (`id`, `pekerjaan_id`, `proyek_id`, `created_at`, `updated_at`) VALUES
(2, 4, 2, '2023-09-03 13:57:45', '2023-09-03 13:57:45'),
(3, 5, 2, '2023-09-03 13:57:49', '2023-09-03 13:57:49'),
(4, 5, 3, '2023-09-03 13:57:54', '2023-09-03 13:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_rekening` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `nama`, `jenis`, `nilai`, `email`, `bank`, `bank_name`, `bank_rekening`, `created_at`, `updated_at`) VALUES
(2, 'Alwan', 'Baru', '120', 'alwanputra2712@gmail.com', 'BCA DIGITAL', 'Alwan Putra', '123123113', '2023-09-07 09:23:09', '2023-09-07 09:23:29');

-- --------------------------------------------------------

--
-- Table structure for table `pesanaan_pembelian`
--

CREATE TABLE `pesanaan_pembelian` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipe_pekerjaan_id` int(10) UNSIGNED DEFAULT NULL,
  `jumlah` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanaan_pembelian`
--

INSERT INTO `pesanaan_pembelian` (`id`, `tipe_pekerjaan_id`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 2, '20.00', '2023-09-04 04:28:32', '2023-09-04 04:31:57'),
(2, 5, '200.00', '2023-09-04 04:31:51', '2023-09-04 04:31:51');

-- --------------------------------------------------------

--
-- Table structure for table `proyek`
--

CREATE TABLE `proyek` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `klien_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`id`, `nama`, `klien_id`, `created_at`, `updated_at`) VALUES
(2, 'Proyek A', 3, '2023-09-03 02:48:15', '2023-09-03 02:48:15'),
(3, 'Proyek B', 4, '2023-09-03 02:48:21', '2023-09-03 02:48:21');

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `id` int(10) UNSIGNED NOT NULL,
  `penawaran_jasa_id` int(10) UNSIGNED DEFAULT NULL,
  `jumlah` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tagihan`
--

INSERT INTO `tagihan` (`id`, `penawaran_jasa_id`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 1, '200000.00', '2023-09-03 14:32:43', '2023-09-03 14:32:43'),
(2, 1, '1000000.00', '2023-09-03 14:39:11', '2023-09-03 14:40:57'),
(3, 2, '9900.00', '2023-09-03 14:40:46', '2023-09-03 14:40:46');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_pekerjaan`
--

CREATE TABLE `tipe_pekerjaan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tipe_pekerjaan`
--

INSERT INTO `tipe_pekerjaan` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(2, 'Mandor IT', '2023-09-02 17:38:32', '2023-09-02 17:39:45'),
(3, 'Kuli IT', '2023-09-02 17:38:38', '2023-09-02 17:38:38'),
(4, 'Boss Besar', '2023-09-02 17:38:44', '2023-09-02 17:38:44'),
(5, 'Ceo', '2023-09-02 17:38:47', '2023-09-02 17:38:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'admin', 'admin@admin.com', NULL, '$2y$10$IUfH6qPGNOuQuDOLGSlzi.zJUBrlqRXELznMrVEyrG99bxSXnjtSK', 'admin', NULL, '2023-09-07 09:06:24', '2023-09-07 09:06:24'),
(5, 'iqbal', 'iqbal@iqbal.com', NULL, '$2y$10$BSAjNRHC2g1IfLK8hEHf6uQmUM6S/DGnexRGaNQ9IJQwBxiJnNR7q', 'admin', NULL, '2023-09-07 09:14:38', '2023-09-07 09:14:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahasa`
--
ALTER TABLE `bahasa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klien`
--
ALTER TABLE `klien`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pekerjaan_tipe_pekerjaan_id_foreign` (`tipe_pekerjaan_id`);

--
-- Indexes for table `pembayaran_pembelian`
--
ALTER TABLE `pembayaran_pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayaran_pembelian_tagihan_id_foreign` (`tagihan_id`);

--
-- Indexes for table `penawaran_jasa`
--
ALTER TABLE `penawaran_jasa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penawaran_jasa_pekerjaan_id_foreign` (`pekerjaan_id`),
  ADD KEY `penawaran_jasa_proyek_id_foreign` (`proyek_id`);

--
-- Indexes for table `permintaan_jasa`
--
ALTER TABLE `permintaan_jasa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permintaan_jasa_pekerjaan_id_foreign` (`pekerjaan_id`),
  ADD KEY `permintaan_jasa_proyek_id_foreign` (`proyek_id`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanaan_pembelian`
--
ALTER TABLE `pesanaan_pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanaan_pembelian_tipe_pekerjaan_id_foreign` (`tipe_pekerjaan_id`);

--
-- Indexes for table `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proyek_klien_id_foreign` (`klien_id`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tagihan_penawaran_jasa_id_foreign` (`penawaran_jasa_id`);

--
-- Indexes for table `tipe_pekerjaan`
--
ALTER TABLE `tipe_pekerjaan`
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
-- AUTO_INCREMENT for table `bahasa`
--
ALTER TABLE `bahasa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `klien`
--
ALTER TABLE `klien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembayaran_pembelian`
--
ALTER TABLE `pembayaran_pembelian`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penawaran_jasa`
--
ALTER TABLE `penawaran_jasa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permintaan_jasa`
--
ALTER TABLE `permintaan_jasa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pesanaan_pembelian`
--
ALTER TABLE `pesanaan_pembelian`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tipe_pekerjaan`
--
ALTER TABLE `tipe_pekerjaan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD CONSTRAINT `pekerjaan_tipe_pekerjaan_id_foreign` FOREIGN KEY (`tipe_pekerjaan_id`) REFERENCES `tipe_pekerjaan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pembayaran_pembelian`
--
ALTER TABLE `pembayaran_pembelian`
  ADD CONSTRAINT `pembayaran_pembelian_tagihan_id_foreign` FOREIGN KEY (`tagihan_id`) REFERENCES `tagihan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `penawaran_jasa`
--
ALTER TABLE `penawaran_jasa`
  ADD CONSTRAINT `penawaran_jasa_pekerjaan_id_foreign` FOREIGN KEY (`pekerjaan_id`) REFERENCES `pekerjaan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penawaran_jasa_proyek_id_foreign` FOREIGN KEY (`proyek_id`) REFERENCES `proyek` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permintaan_jasa`
--
ALTER TABLE `permintaan_jasa`
  ADD CONSTRAINT `permintaan_jasa_pekerjaan_id_foreign` FOREIGN KEY (`pekerjaan_id`) REFERENCES `pekerjaan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permintaan_jasa_proyek_id_foreign` FOREIGN KEY (`proyek_id`) REFERENCES `proyek` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pesanaan_pembelian`
--
ALTER TABLE `pesanaan_pembelian`
  ADD CONSTRAINT `pesanaan_pembelian_tipe_pekerjaan_id_foreign` FOREIGN KEY (`tipe_pekerjaan_id`) REFERENCES `tipe_pekerjaan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `proyek`
--
ALTER TABLE `proyek`
  ADD CONSTRAINT `proyek_klien_id_foreign` FOREIGN KEY (`klien_id`) REFERENCES `klien` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD CONSTRAINT `tagihan_penawaran_jasa_id_foreign` FOREIGN KEY (`penawaran_jasa_id`) REFERENCES `penawaran_jasa` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
