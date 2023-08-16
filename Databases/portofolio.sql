-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 15 Agu 2023 pada 05.44
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portofolio`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `halaman`
--

CREATE TABLE `halaman` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `halaman`
--

INSERT INTO `halaman` (`id`, `judul`, `isi`, `created_at`, `updated_at`) VALUES
(16, 'Farhan Maulana Pangestu', '<p>Saya adalah seorang programming, yang ingin mempunyai skill, dewa akan tetapi dengan usaha yang saya miliki, dan otodidak</p>', '2023-07-26 16:03:57', '2023-08-14 16:06:56'),
(19, 'Interest', '<p>goiid</p>', '2023-08-12 01:56:55', '2023-08-12 01:56:55'),
(20, 'Awards', '<ul><li>Juara Utama Paskibra se Pulau Jawa</li><li>Juara Sandi Semaphore se Pulau Jawa&nbsp;</li><li>Juara Coding Terfavorite&nbsp;&nbsp;</li></ul>', '2023-08-12 01:57:05', '2023-08-15 01:06:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `metadata`
--

CREATE TABLE `metadata` (
  `id` bigint UNSIGNED NOT NULL,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `metadata`
--

INSERT INTO `metadata` (`id`, `meta_key`, `meta_value`, `created_at`, `updated_at`) VALUES
(2, '_language', 'javascript, php, laravel, tailwindcss, dart, css3, java', '2023-08-09 04:29:37', '2023-08-15 02:14:13'),
(4, '_workflow', '<ul><li>github</li><li>mysql</li><li>phpmyadmin</li><li>laragon</li></ul>', '2023-08-09 05:11:42', '2023-08-15 01:47:45'),
(5, '_foto', '230814103109.jpg', '2023-08-10 09:08:08', '2023-08-14 15:31:09'),
(6, '_email', 'farhanmaulana1727@gmail.com', '2023-08-10 09:08:08', '2023-08-10 09:08:08'),
(7, '_kota', 'Indramayu', '2023-08-12 00:09:35', '2023-08-12 00:09:35'),
(8, '_provinsi', 'Jawa barat', '2023-08-12 00:09:36', '2023-08-12 00:09:36'),
(9, '_nohp', '085218515697', '2023-08-12 00:09:36', '2023-08-12 00:09:36'),
(10, '_facebook', 'https://wa.me/qr/7IPJQELYVRMEK1', '2023-08-12 00:09:36', '2023-08-14 16:27:40'),
(11, '_linkedin', 'https://www.linkedin.com/in/farhanmaulanapangestu', '2023-08-12 00:09:36', '2023-08-12 00:09:36'),
(12, '_github', 'https://github.com/farhnDev', '2023-08-12 00:09:36', '2023-08-12 00:09:36'),
(13, '_instagram', 'https://www.instagram.com/farhanbaeee/?hl=id', '2023-08-12 00:09:36', '2023-08-12 00:09:36'),
(14, '_halaman_about', '16', '2023-08-12 01:40:01', '2023-08-12 02:03:11'),
(15, '_halaman_interest', '19', '2023-08-12 02:02:22', '2023-08-12 02:06:34'),
(16, '_halaman_awards', '20', '2023-08-12 02:02:22', '2023-08-12 02:02:22'),
(17, '_whatsapp', 'https://wa.me/qr/7IPJQELYVRMEK1', '2023-08-14 16:30:32', '2023-08-14 16:31:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2023_07_15_150816_table_users_add_column_google_id', 2),
(3, '2023_07_15_171446_users_set_default_password', 3),
(4, '2023_07_16_134732_user_add_column_avatar', 4),
(5, '2023_07_16_140739_create_halamen_table', 5),
(6, '2023_07_17_111235_create_riwayats_table', 6),
(7, '2023_07_21_220327_riwayat_set_default_isi', 7),
(8, '2023_08_08_142037_create_metadata_table', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat`
--

CREATE TABLE `riwayat` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` enum('experience','education') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `info1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `riwayat`
--

INSERT INTO `riwayat` (`id`, `judul`, `tipe`, `tgl_mulai`, `tgl_akhir`, `info1`, `info2`, `info3`, `isi`, `created_at`, `updated_at`) VALUES
(37, 'Ma Darul Fallah Bongas', 'education', '2023-07-25', '2021-07-16', 'XMIA', 'Science Of Student', '3.99', NULL, '2023-07-26 16:03:10', '2023-08-08 06:58:38'),
(49, 'Web Development', 'experience', '2023-08-14', '2023-12-21', 'Dicoding', NULL, NULL, 'mantap', '2023-07-26 16:40:46', '2023-07-26 16:40:46'),
(51, 'Mts Darul Fallah', 'education', '2015-07-16', '2018-05-15', 'Madrasah', 'Madrasah', '3.50', NULL, '2023-08-08 06:58:02', '2023-08-08 06:58:02'),
(52, 'Universitas Almaata', 'education', '2021-11-17', NULL, 'Komputer', 'Informatika S1', '3.60', NULL, '2023-08-08 07:00:13', '2023-08-08 07:00:13'),
(53, 'Apps Development', 'experience', '2023-02-15', '2023-03-15', 'Telkom Indonesia', NULL, NULL, 'saya disinih mengambil banyak sekali pengalaman, dari segi dasaran dan juga beberapa yang perlu di pelajari untuk apps mobile', '2023-08-15 01:13:21', '2023-08-15 01:21:38'),
(54, 'Front And Beck end', 'experience', '2023-08-14', NULL, 'Dicoding', NULL, NULL, 'Mantap Banget program dari kampus merdeka ini, mengapa? karena dia membuat beberapa pelatihan khusus', '2023-08-15 01:25:41', '2023-08-15 01:25:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `google_id`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'Farhan Maulana', 'farhanmaulana1710@gmail.com', NULL, NULL, NULL, '102905298885080998218', '102905298885080998218.jpg', '2023-07-15 10:25:18', '2023-07-16 07:00:01');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `halaman`
--
ALTER TABLE `halaman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `metadata`
--
ALTER TABLE `metadata`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `halaman`
--
ALTER TABLE `halaman`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `metadata`
--
ALTER TABLE `metadata`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
