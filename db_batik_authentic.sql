-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jul 2020 pada 04.35
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_batik_authentic`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `batik`
--

CREATE TABLE `batik` (
  `id` int(10) UNSIGNED NOT NULL,
  `sentra_id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asal_daerah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cara_pembuatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warna` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `motif` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_pembuat` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `batik`
--

INSERT INTO `batik` (`id`, `sentra_id`, `nama`, `asal_daerah`, `cara_pembuatan`, `warna`, `motif`, `nama_pembuat`, `foto`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Nisya Batik', 'Indonesia', 'Semi Tulis', 'merah, hijau, kuning', 'Adu Manis', 'Sutisna', 'Nisya Batik-5f1980a07195e.jpg', NULL, '2020-07-23 05:20:48', NULL),
(2, 2, 'Nisya Batik', 'Indonesia', 'Semi Tulis', 'merah, hijau, kuning', 'Bokor Binatang', 'Sutisna', 'Nisya Batik-5f1980bec64d1.jpg', NULL, '2020-07-23 05:21:18', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(16, '2013_07_12_064409_create_sentra_batik_table', 1),
(17, '2014_10_12_000000_create_users_table', 1),
(18, '2014_10_12_100000_create_password_resets_table', 1),
(19, '2019_08_19_000000_create_failed_jobs_table', 1),
(20, '2020_07_11_162406_create_batik_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sentra_batik`
--

CREATE TABLE `sentra_batik` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pemilik` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sentra_batik`
--

INSERT INTO `sentra_batik` (`id`, `nama`, `lokasi`, `tahun`, `pemilik`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Batik Kultur', 'Kuningan, Jawa Barat', '2017', 'Ifan Alwi', NULL, NULL, NULL),
(2, 'Batik Trusmi', 'Cirebon, Jawa Barat', '2006', 'Ibnu Riyanto', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `sentra_id` int(10) UNSIGNED DEFAULT NULL,
  `role` int(10) UNSIGNED NOT NULL,
  `api_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `sentra_id`, `role`, `api_token`, `nama`, `username`, `password`, `email`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, NULL, 'super admin', 'indonesia', '$2y$10$jrKpQNAbZfLZFipTQ2.xiOheg/KI2BpvkyDYte3UPvAZVJXjPzzjq', 'indonesia@gmail.com', NULL, NULL, NULL, NULL, NULL),
(2, 2, 1, NULL, 'super admin', 'malaysia', '$2y$10$ya5k91Usesd6l4Wx6I//VObwEMCMRclwh8oSUwzcoHc/ol62kyYCS', 'malaysia@gmail.com', NULL, NULL, NULL, NULL, NULL),
(3, 1, 3, 'HUCFTpxsJmwbZz4MZZt7XLOfN99z7ZfjBzBZ5oC5sn7l4AUxA9EiGMyYdcXH', 'Idam Idzin Dimiati', 'idamidzin', '$2y$10$94ZuzEwnFi3r8mqXRWfunuYgU5Lgbyx1aUwcK9N0YNfPJyhGIN.2C', 'idamidzin@gmail.com', NULL, NULL, NULL, '2020-07-23 05:18:54', NULL),
(4, NULL, 3, 'VEm8lMPcoXvRkCr8CgOBN6lmnWco7Jn2lZ2vtDSrJAwG4tVnrJpv3Obpydyz', 'idam', 'idam', NULL, 'idamidzins@gmail.com', NULL, NULL, '2020-07-23 04:47:09', '2020-07-23 04:47:09', NULL),
(5, NULL, 3, 'aMbrYdK1TIZU3rZK9gTqY5341QxGrrA0iUXA3Bz44Qtd2EETY8IJRvN4DWpx', 'Muslihudin Anawawi', 'Muslihudin Anawawi', NULL, 'muslihudinanawawi45@gmail.com', NULL, NULL, '2020-07-23 05:25:48', '2020-07-23 05:25:48', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `batik`
--
ALTER TABLE `batik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `batik_sentra_id_index` (`sentra_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `sentra_batik`
--
ALTER TABLE `sentra_batik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_api_token_unique` (`api_token`),
  ADD KEY `users_sentra_id_index` (`sentra_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `batik`
--
ALTER TABLE `batik`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `sentra_batik`
--
ALTER TABLE `sentra_batik`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `batik`
--
ALTER TABLE `batik`
  ADD CONSTRAINT `batik_sentra_id_foreign` FOREIGN KEY (`sentra_id`) REFERENCES `sentra_batik` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_sentra_id_foreign` FOREIGN KEY (`sentra_id`) REFERENCES `sentra_batik` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
