-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 14 Mar 2022 pada 02.48
-- Versi server: 5.7.33
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_rental_mobil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pengguna`
--

CREATE TABLE `data_pengguna` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `data_foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kendaraan_deskripsi` text COLLATE utf8mb4_unicode_ci,
  `kendaraan_kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kendaraan_foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kendaraan_harga_sewa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kendaraan_tipe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kendaraan_merk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kendaraan_kondisi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kendaraan_max_mil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kendaraan_tahun` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kendaraan_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kendaraan_jenis_transmisi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kendaraan_jenis_body` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan` (`id`, `kendaraan_deskripsi`, `kendaraan_kode`, `kendaraan_foto`, `kendaraan_harga_sewa`, `kendaraan_tipe`, `kendaraan_merk`, `kendaraan_kondisi`, `kendaraan_max_mil`, `kendaraan_tahun`, `kendaraan_status`, `kendaraan_jenis_transmisi`, `kendaraan_jenis_body`, `created_at`, `updated_at`) VALUES
(6, '<p>AVANZA/CALYA/XENIA MANUAL RP 300.000 (DLM Kota)<br />Luar kota seperti busel dan Buton 350.000</p><p>EREKE 500.000, KENDARI 400.000</p><p><strong>PROSES RENTAL :&nbsp;</strong></p><p>- Konsumen melakukan pemilihan Kendaraan yang akan disewakan, jika telah dipilih selanjutnya membawa invoice Tanda Kendaraan berupa informasi data Kendaraan yang nanti nya diberikan ke Tempat Rental Langsung, sekaligus menyerahkan beberapa bukti seperti KTP , SIM, BPJS, dan sebagainya.&nbsp;</p>', 'KDR-BENNX', 'xwxgrdhhnw.jpeg', '300000', 'MOBIL', 'AVANZA', 'BAIK', '1000000', '2022', 'TERSEDIA', 'MANUAL', 'STATION WAGON', '2022-03-14 09:19:16', '2022-03-14 09:46:31'),
(7, '<p>AVANZA/CALYA/XENIA MANUAL RP 300.000 (DLM Kota)<br />Luar kota seperti busel dan Buton 350.000</p><p>EREKE 500.000, KENDARI 400.000</p><p><strong>PROSES RENTAL :&nbsp;</strong></p><p>- Konsumen melakukan pemilihan Kendaraan yang akan disewakan, jika telah dipilih selanjutnya membawa invoice Tanda Kendaraan berupa informasi data Kendaraan yang nanti nya diberikan ke Tempat Rental Langsung, sekaligus menyerahkan beberapa bukti seperti KTP , SIM, BPJS, dan sebagainya.&nbsp;</p>', 'KDR-H4EVC', 'sgj6gwzdii.jpg', '300000', 'MOBIL', 'TOYOTA CALYA', 'BAIK', '100000', '2022', 'TERSEDIA', 'MANUAL', 'STATION WAGON', '2022-03-14 09:21:24', '2022-03-14 09:39:59'),
(8, '<p>AVANZA/CALYA/XENIA MANUAL RP 300.000 (DLM Kota)<br />Luar kota seperti busel dan Buton 350.000</p><p>EREKE 500.000, KENDARI 400.000</p><p><strong>PROSES RENTAL :&nbsp;</strong></p><p>- Konsumen melakukan pemilihan Kendaraan yang akan disewakan, jika telah dipilih selanjutnya membawa invoice Tanda Kendaraan berupa informasi data Kendaraan yang nanti nya diberikan ke Tempat Rental Langsung, sekaligus menyerahkan beberapa bukti seperti KTP , SIM, BPJS, dan sebagainya.&nbsp;</p>', 'KDR-7LNVN', 'etod4zyd6n.jpeg', '300000', 'MOBIL', 'DAIHATSU XENIA', 'BAIK', '100000', '2022', 'TERSEDIA', 'MANUAL', 'STATION WAGON', '2022-03-14 09:25:24', '2022-03-14 09:40:15'),
(11, '<p><strong>PROSES RENTAL :&nbsp;</strong></p><p>- Konsumen melakukan pemilihan Kendaraan yang akan disewakan, jika telah dipilih selanjutnya membawa invoice Tanda Kendaraan berupa informasi data Kendaraan yang nanti nya diberikan ke Tempat Rental Langsung, sekaligus menyerahkan beberapa bukti seperti KTP , SIM, BPJS, dan sebagainya.&nbsp;</p><p>&nbsp;</p>', 'KDR-UVPWX', 'kmdazcgial.jpg', '350000', 'MOBIL', 'Avanza', 'BAIK', '100000', '2022', 'TERSEDIA', 'AUTOMATIC', 'STATION WAGON', '2022-03-14 09:42:43', '2022-03-14 09:42:52'),
(12, '<p><strong>PROSES RENTAL :&nbsp;</strong></p><p>- Konsumen melakukan pemilihan Kendaraan yang akan disewakan, jika telah dipilih selanjutnya membawa invoice Tanda Kendaraan berupa informasi data Kendaraan yang nanti nya diberikan ke Tempat Rental Langsung, sekaligus menyerahkan beberapa bukti seperti KTP , SIM, BPJS, dan sebagainya.&nbsp;</p>', 'KDR-LVJ3Q', 'v3hl0ztaet.jpg', '350000', 'MOBIL', 'Calya (Matic)', 'BAIK', '100000', '2022', 'TERSEDIA', 'AUTOMATIC', 'STATION WAGON', '2022-03-14 09:43:57', '2022-03-14 09:44:14'),
(13, '<p><strong>PROSES RENTAL :&nbsp;</strong></p><p>- Konsumen melakukan pemilihan Kendaraan yang akan disewakan, jika telah dipilih selanjutnya membawa invoice Tanda Kendaraan berupa informasi data Kendaraan yang nanti nya diberikan ke Tempat Rental Langsung, sekaligus menyerahkan beberapa bukti seperti KTP , SIM, BPJS, dan sebagainya.&nbsp;</p>', 'KDR-HX6QO', 'cw9sxxnldl.jpg', '350000', 'MOBIL', 'Xenia (Matic)', 'BAIK', '100000', '2022', 'TERSEDIA', 'AUTOMATIC', 'STATION WAGON', '2022-03-14 09:45:12', '2022-03-14 09:45:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `login_nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_token` text COLLATE utf8mb4_unicode_ci,
  `login_level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `login_nama`, `login_username`, `login_password`, `login_email`, `login_telepon`, `login_token`, `login_level`, `login_status`, `data_id`, `created_at`, `updated_at`) VALUES
(1, 'FathurWalkers', 'fathurwalkers', '$2y$12$nwbKHdyA0ayApFhOHSzqVu9gfzl4t6GcVLW4vHwtw1LweacBog1/O', 'fathurwalkers44@gmail.com', '085342072185', '$2y$12$tWNsC4N05calh/TBq2cjWe8Fb29MyU4c4UeX5uDvguybmwm6OxKtG', 'admin', 'verified', NULL, '2022-03-14 07:19:23', '2022-03-14 07:19:23'),
(2, 'yuni', 'yuni', '$2y$12$olJteJRYJtaxM.VWJraDduECcXzZksGAlo0QaV1I.VD4i.EzEnpx6', 'yuni@gmail.com', '085342442385', '$2y$12$XLn6EakVBk82AgjEUe4lfuE3lwshtRDro5loQAMs2yn2xefvVbN4y', 'admin', 'verified', NULL, '2022-03-14 07:19:24', '2022-03-14 07:19:24');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_27_065102_create_data_table', 1),
(6, '2022_02_27_065140_create_logins_table', 1),
(7, '2022_02_28_111555_create_kendaraans_table', 1),
(8, '2022_02_28_111616_create_rentals_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rental`
--

CREATE TABLE `rental` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rental_kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rental_waktu_pemesanan` datetime DEFAULT NULL,
  `rental_durasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rental_satuan_waktu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rental_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rental_bukti_ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rental_bukti_lain` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kendaraan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_pengguna`
--
ALTER TABLE `data_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_login_username_unique` (`login_username`),
  ADD UNIQUE KEY `login_login_email_unique` (`login_email`),
  ADD KEY `login_data_id_foreign` (`data_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rental`
--
ALTER TABLE `rental`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rental_data_id_foreign` (`data_id`),
  ADD KEY `rental_kendaraan_id_foreign` (`kendaraan_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_pengguna`
--
ALTER TABLE `data_pengguna`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `rental`
--
ALTER TABLE `rental`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_data_id_foreign` FOREIGN KEY (`data_id`) REFERENCES `data_pengguna` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rental`
--
ALTER TABLE `rental`
  ADD CONSTRAINT `rental_data_id_foreign` FOREIGN KEY (`data_id`) REFERENCES `data_pengguna` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rental_kendaraan_id_foreign` FOREIGN KEY (`kendaraan_id`) REFERENCES `kendaraan` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
