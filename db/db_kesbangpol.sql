-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 10.4.19-MariaDB - mariadb.org binary distribution
-- OS Server:                    Win64
-- HeidiSQL Versi:               10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- membuang struktur untuk table db_kesbangpol.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_kesbangpol.failed_jobs: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- membuang struktur untuk table db_kesbangpol.foto_tbl
CREATE TABLE IF NOT EXISTS `foto_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) DEFAULT NULL,
  `gambar` varchar(200) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel db_kesbangpol.foto_tbl: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `foto_tbl` DISABLE KEYS */;
INSERT INTO `foto_tbl` (`id`, `judul`, `gambar`, `user_id`, `created_at`, `updated_at`) VALUES
	(17, 'sasa', '1621419934.jpg', 1, '2021-05-19 10:25:34', '2021-05-19 10:25:34'),
	(18, 'xxx', '1621420015.jpg', 1, '2021-05-19 10:26:55', '2021-05-19 10:26:55');
/*!40000 ALTER TABLE `foto_tbl` ENABLE KEYS */;

-- membuang struktur untuk table db_kesbangpol.izin_penelitian_tbl
CREATE TABLE IF NOT EXISTS `izin_penelitian_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(50) NOT NULL DEFAULT '0',
  `surat_perguruan_tinggi` varchar(300) DEFAULT NULL,
  `proposal_penelitian` varchar(300) DEFAULT NULL,
  `ktp_peneliti` varchar(300) DEFAULT NULL,
  `izin_penelitian` varchar(300) DEFAULT NULL,
  `surat_pernyataan` varchar(300) DEFAULT NULL,
  `dokumen_rekomendasi` varchar(300) DEFAULT NULL,
  `nama` varchar(300) DEFAULT NULL,
  `tempat` varchar(300) DEFAULT NULL,
  `judul` varchar(300) DEFAULT NULL,
  `lokasi` varchar(300) DEFAULT NULL,
  `waktu_kegiatan` varchar(300) DEFAULT NULL,
  `bidang` varchar(300) DEFAULT NULL,
  `status_kegiatan` varchar(300) DEFAULT NULL,
  `menimbang` text DEFAULT NULL,
  `perbaikan` varchar(300) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel db_kesbangpol.izin_penelitian_tbl: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `izin_penelitian_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `izin_penelitian_tbl` ENABLE KEYS */;

-- membuang struktur untuk table db_kesbangpol.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_kesbangpol.migrations: ~6 rows (lebih kurang)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
	(5, '2019_12_14_000001_create_personal_access_tokens_table', 2),
	(6, '2021_05_03_224041_create_sessions_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- membuang struktur untuk table db_kesbangpol.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_kesbangpol.password_resets: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- membuang struktur untuk table db_kesbangpol.pengaduan_tbl
CREATE TABLE IF NOT EXISTS `pengaduan_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subjek` varchar(400) DEFAULT NULL,
  `pesan` text DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel db_kesbangpol.pengaduan_tbl: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `pengaduan_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `pengaduan_tbl` ENABLE KEYS */;

-- membuang struktur untuk table db_kesbangpol.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_kesbangpol.personal_access_tokens: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- membuang struktur untuk table db_kesbangpol.profil_tbl
CREATE TABLE IF NOT EXISTS `profil_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dinas` varchar(300) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telp` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel db_kesbangpol.profil_tbl: ~1 rows (lebih kurang)
/*!40000 ALTER TABLE `profil_tbl` DISABLE KEYS */;
INSERT INTO `profil_tbl` (`id`, `nama_dinas`, `alamat`, `telp`, `email`, `created_at`, `updated_at`) VALUES
	(1, 'KESBANGPOL KOTA KENDARI', 'w', '3343', 'kesbangpolkendari@gmail.com', NULL, '2021-05-19 10:54:00');
/*!40000 ALTER TABLE `profil_tbl` ENABLE KEYS */;

-- membuang struktur untuk table db_kesbangpol.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_kesbangpol.sessions: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('WxRlwmz1UqYypEqaoskONWJNp9H5IzbxKeVYy1QC', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicVlCaW1oWnI5UU1rSXJ4NnFvaFh5U0NMTTB6ZE5YMmhnYXZXZEpDcyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Qva2VzYmFuZ3BvbCI7fX0=', 1621429210),
	('wYWK5dd7VRN3WTRSqUo9qlgjYybVxQZUvrUXre3x', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', 'YTo1OntzOjM6InVybCI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly9sb2NhbGhvc3Qva2VzYmFuZ3BvbC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoiX3Rva2VuIjtzOjQwOiJaUzBhN1UzeGo5UEdXeldhTmRkNjNpMDhrYlhmbnpGdkJQUDE4TFlhIjtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJG0xUzNsTmM5L3dTSDZyMUQzQ0cvb3VYM0NzVzdDVDgxOG14M2U2Nkd1amZzVXFFdGdGUG5TIjt9', 1621429107);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;

-- membuang struktur untuk table db_kesbangpol.skk_ormas_tbl
CREATE TABLE IF NOT EXISTS `skk_ormas_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(50) NOT NULL DEFAULT '0',
  `anggaran_dasar` varchar(300) DEFAULT NULL,
  `logo` varchar(300) DEFAULT NULL,
  `bendera` varchar(300) DEFAULT NULL,
  `program_kerja` varchar(300) DEFAULT NULL,
  `domisili` varchar(300) DEFAULT NULL,
  `kepemilikan` varchar(300) DEFAULT NULL,
  `foto_kantor` varchar(300) DEFAULT NULL,
  `susunan_pengurus` varchar(300) DEFAULT NULL,
  `biodata_ketua` varchar(300) DEFAULT NULL,
  `foto_ketua` varchar(300) DEFAULT NULL,
  `ktp_ketua` varchar(300) DEFAULT NULL,
  `biodata_sekretaris` varchar(300) DEFAULT NULL,
  `foto_sekretaris` varchar(300) DEFAULT NULL,
  `ktp_sekretaris` varchar(300) DEFAULT NULL,
  `biodata_bendahara` varchar(300) DEFAULT NULL,
  `foto_bendahara` varchar(300) DEFAULT NULL,
  `ktp_bendahara` varchar(300) DEFAULT NULL,
  `formulir` varchar(300) DEFAULT NULL,
  `rekomendasi` varchar(300) DEFAULT NULL,
  `surat_pernyataan_permendagri` varchar(300) DEFAULT NULL,
  `surat_pernyataan_kesediaan` varchar(300) DEFAULT NULL,
  `skt` varchar(300) DEFAULT NULL,
  `dokumen_rekomendasi` varchar(300) DEFAULT NULL,
  `perbaikan` varchar(300) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel db_kesbangpol.skk_ormas_tbl: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `skk_ormas_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `skk_ormas_tbl` ENABLE KEYS */;

-- membuang struktur untuk table db_kesbangpol.skt_ormas_tbl
CREATE TABLE IF NOT EXISTS `skt_ormas_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(50) NOT NULL DEFAULT '0',
  `anggaran_dasar` varchar(300) DEFAULT NULL,
  `logo` varchar(300) DEFAULT NULL,
  `bendera` varchar(300) DEFAULT NULL,
  `program_kerja` varchar(300) DEFAULT NULL,
  `domisili` varchar(300) DEFAULT NULL,
  `kepemilikan` varchar(300) DEFAULT NULL,
  `foto_kantor` varchar(300) DEFAULT NULL,
  `susunan_pengurus` varchar(300) DEFAULT NULL,
  `biodata_ketua` varchar(300) DEFAULT NULL,
  `foto_ketua` varchar(300) DEFAULT NULL,
  `ktp_ketua` varchar(300) DEFAULT NULL,
  `biodata_sekretaris` varchar(300) DEFAULT NULL,
  `foto_sekretaris` varchar(300) DEFAULT NULL,
  `ktp_sekretaris` varchar(300) DEFAULT NULL,
  `biodata_bendahara` varchar(300) DEFAULT NULL,
  `foto_bendahara` varchar(300) DEFAULT NULL,
  `ktp_bendahara` varchar(300) DEFAULT NULL,
  `formulir` varchar(300) DEFAULT NULL,
  `rekomendasi` varchar(300) DEFAULT NULL,
  `surat_pernyataan_permendagri` varchar(300) DEFAULT NULL,
  `surat_pernyataan_kesediaan` varchar(300) DEFAULT NULL,
  `dokumen_rekomendasi` varchar(300) DEFAULT NULL,
  `perbaikan` varchar(300) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel db_kesbangpol.skt_ormas_tbl: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `skt_ormas_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `skt_ormas_tbl` ENABLE KEYS */;

-- membuang struktur untuk table db_kesbangpol.slider_tbl
CREATE TABLE IF NOT EXISTS `slider_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(300) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel db_kesbangpol.slider_tbl: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `slider_tbl` DISABLE KEYS */;
INSERT INTO `slider_tbl` (`id`, `judul`, `isi`, `gambar`, `created_at`, `updated_at`) VALUES
	(14, 'SELAMAT DATANG DI KESBANGPOL', 'dsssssssssssssss', '1621416621.jpg', '2021-05-19 09:25:30', '2021-05-19 09:30:21'),
	(15, 'SELAMAT DATANG DI KESBANGPOL', 'sasasa', '1621416927.jpg', '2021-05-19 09:35:27', '2021-05-19 09:35:27');
/*!40000 ALTER TABLE `slider_tbl` ENABLE KEYS */;

-- membuang struktur untuk table db_kesbangpol.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_ktp` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_kesbangpol.users: ~5 rows (lebih kurang)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `nik`, `alamat`, `no_hp`, `foto_ktp`, `group`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'administrator', 'administrator@gmail.com', NULL, '$2y$10$.Pi9v0UKQ8NtsYWGT58iI.EohUgC8mR0B9uSn5VNxLOmYK6.y2oqO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-05-03 22:48:34', '2021-05-03 22:48:34'),
	(2, 'adrisaputra', 'adri.saputra.ibrahim@gmail.com', NULL, '$2y$10$80s2NpjvW4JAop5DmLZP1eFeKiwFO6wD1FC5YihNP1y/ALEcYR9Fm', NULL, NULL, NULL, '7471091610910001', 'Jl. Pemuda', '433333', '1621424620.jpg', 7, 1, '2021-05-04 16:27:20', '2021-05-19 12:46:31'),
	(3, 'staff', 'staff@gmail.com', NULL, '$2y$10$HBG1NmPTASZ8bCtoRRGt7.0CEh6Fb/VNJFj8GDLoijhYSCLxT2afC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2021-05-07 08:36:06', '2021-05-07 08:36:06'),
	(4, 'kasubid', 'kasubid@gmail.com', NULL, '$2y$10$rGCt6t7N1Oy1EuUnXbS8c.nPin4IdelP7QbMV6McatpZVk2BCbNlu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, '2021-05-07 08:37:13', '2021-05-07 08:37:13'),
	(5, 'kabid', 'kabid@gmail.com', NULL, '$2y$10$B9eHYezWlYVE2g0pihHheuZeb6E60iwK4T.8nVug40/CTTjWCjntS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, '2021-05-07 08:37:55', '2021-05-07 08:37:55'),
	(6, 'kepala_badan', 'kepala_badan@gmail.com', NULL, '$2y$10$m1S3lNc9/wSH6r1D3CG/ouX3CsW7CT818mx3e66GujfsUqEtgFPnS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1, '2021-05-07 08:51:23', '2021-05-07 08:51:23'),
	(7, 'sekretaris', 'sekretaris@gmail.com', NULL, '$2y$10$t6BdtPqYsf1knQfrH3Cp4.ASENk2KzRGK.PJ6SVxou3XRUdWG22yC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, '2021-05-18 23:12:48', '2021-05-18 23:12:48');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
