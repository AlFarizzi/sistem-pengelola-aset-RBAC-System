-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `asset__types`;
CREATE TABLE `asset__types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `asset__types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1,	'Divisi A',	'2020-09-14 23:58:02',	'2020-09-14 23:58:02'),
(2,	'Divisi B',	'2020-09-14 23:58:02',	'2020-09-14 23:58:02'),
(3,	'Divisi C',	'2020-09-14 23:58:02',	'2020-09-14 23:58:02');

DROP TABLE IF EXISTS `assets`;
CREATE TABLE `assets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_tipe` int NOT NULL,
  `id_user` int NOT NULL,
  `plat_nomor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_asset` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_perolehan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_pajak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `assets_plat_nomor_unique` (`plat_nomor`),
  KEY `assets_id_tipe_index` (`id_tipe`),
  KEY `assets_id_user_index` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `assets` (`id`, `id_tipe`, `id_user`, `plat_nomor`, `nama_asset`, `tgl_perolehan`, `tgl_service`, `tgl_pajak`, `created_at`, `updated_at`) VALUES
(1,	2,	1,	'Vel voluptatem quis',	'Commodo sed necessit',	'1985-04-22',	'1970-06-17',	'1984-02-07',	'2020-09-15 02:00:09',	'2020-09-15 02:00:09'),
(4,	2,	2,	'Est quia rerum minus',	'Adipisicing sit qui',	'1998-10-06',	'1982-08-15',	'1995-12-20',	'2020-09-15 04:21:27',	'2020-09-15 04:21:27'),
(5,	6,	3,	'BA 720 P',	'Dolores occaecat cul',	'2019-11-27',	'2019-07-16',	'2005-11-08',	'2020-09-17 03:07:26',	'2020-09-17 03:07:26'),
(6,	1,	6,	'BA 480 P',	'Dolorem et eos enim',	'2008-10-04',	'2014-07-02',	'1972-07-23',	'2020-09-17 03:12:10',	'2020-09-17 03:12:10'),
(7,	3,	2,	'Cum itaque magni dol',	'Modi quis debitis ve',	'1972-12-17',	'1988-01-18',	'2007-06-10',	'2020-09-19 03:46:36',	'2020-09-19 03:46:36');

DROP TABLE IF EXISTS `demages`;
CREATE TABLE `demages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `demage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `demages` (`id`, `demage`, `created_at`, `updated_at`) VALUES
(1,	'ringan',	'2020-09-14 23:58:02',	'2020-09-14 23:58:02'),
(2,	'berat',	'2020-09-14 23:58:02',	'2020-09-14 23:58:02');

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2019_08_19_000000_create_failed_jobs_table',	1),
(4,	'2020_09_10_045307_create_assets_table',	1),
(5,	'2020_09_10_045327_create_asset__types_table',	1),
(6,	'2020_09_10_045344_create_services_table',	1),
(7,	'2020_09_10_045400_create_spareparts_table',	1),
(8,	'2020_09_13_040128_create_permission_tables',	1),
(9,	'2020_09_15_062138_create_statuses_table',	1),
(10,	'2020_09_15_062230_create_demages_table',	1),
(11,	'2020_09_15_111405_add_level_to_users_table',	2),
(12,	'2020_09_17_102901_add_uuid_to_services_table',	3);

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1,	'App\\Models\\User',	1),
(2,	'App\\Models\\User',	2),
(4,	'App\\Models\\User',	3),
(3,	'App\\Models\\User',	4),
(2,	'App\\Models\\User',	6);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1,	'CRUD User',	'web',	'2020-09-14 23:51:02',	'2020-09-14 23:51:02'),
(2,	'CRUD Asset',	'web',	'2020-09-14 23:51:11',	'2020-09-14 23:51:11'),
(3,	'CRUD Sparepart',	'web',	'2020-09-14 23:51:19',	'2020-09-14 23:51:19'),
(4,	'CRUD Service',	'web',	'2020-09-14 23:51:24',	'2020-09-14 23:51:24'),
(5,	'Report Download',	'web',	'2020-09-14 23:51:41',	'2020-09-14 23:51:41'),
(6,	'Confirm & Reject Sparepart Request',	'web',	'2020-09-14 23:52:02',	'2020-09-14 23:52:02'),
(7,	'Confirm & Reject Service Request',	'web',	'2020-09-14 23:52:12',	'2020-09-14 23:52:12'),
(8,	'Request Service',	'web',	'2020-09-14 23:54:36',	'2020-09-14 23:54:36'),
(9,	'Request Sparepart',	'web',	'2020-09-14 23:54:41',	'2020-09-14 23:54:41');

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1,	1),
(2,	1),
(3,	1),
(4,	1),
(5,	1),
(6,	1),
(7,	1),
(8,	2),
(9,	2),
(5,	3),
(6,	3),
(7,	3),
(5,	4);

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1,	'admin',	'web',	'2020-09-14 23:50:24',	'2020-09-14 23:50:24'),
(2,	'karyawan',	'web',	'2020-09-14 23:50:30',	'2020-09-14 23:50:30'),
(3,	'keuangan',	'web',	'2020-09-14 23:50:35',	'2020-09-14 23:50:35'),
(4,	'pimpinan',	'web',	'2020-09-14 23:50:40',	'2020-09-14 23:50:40');

DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_asset` int NOT NULL,
  `id_user` int NOT NULL,
  `id_jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `services_id_asset_index` (`id_asset`),
  KEY `services_id_user_index` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `services` (`id`, `id_asset`, `id_user`, `id_jenis`, `id_status`, `harga`, `detail`, `created_at`, `updated_at`, `uuid`) VALUES
(10,	6,	6,	'2',	'1',	90000,	'Aut id ea quidem vol',	'2020-09-17 03:12:33',	'2020-09-17 03:13:37',	''),
(11,	4,	2,	'1',	'1',	92997,	'Vitae quod porro sol',	'2020-09-17 03:13:01',	'2020-09-17 03:13:29',	''),
(12,	6,	6,	'2',	'1',	55998,	'Aspernatur laborum',	'2020-09-17 03:17:23',	'2020-09-17 03:27:17',	''),
(13,	6,	6,	'1',	'1',	50995,	'Tempor harum hic pla',	'2020-09-17 03:17:29',	'2020-09-17 03:34:53',	''),
(14,	4,	2,	'1',	'1',	47000,	'Consequat Hic amet',	'2020-09-17 03:33:00',	'2020-09-17 03:35:01',	'SRV-TS9Rf'),
(15,	6,	6,	'1',	'1',	82000,	'Id deserunt cupidat',	'2020-09-17 03:33:21',	'2020-09-18 02:02:19',	'SRV-5Fi3n'),
(16,	6,	6,	'1',	'1',	2000,	'A Nam id tempor fug',	'2020-09-17 03:33:27',	'2020-09-17 03:35:05',	'SRV-kGvJ3'),
(18,	4,	2,	'1',	'1',	6100,	'Nostrud enim quaerat',	'2020-09-18 02:03:33',	'2020-09-18 02:04:03',	'SRV-LKsoi');

DROP TABLE IF EXISTS `spareparts`;
CREATE TABLE `spareparts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int NOT NULL,
  `jumlah` int NOT NULL,
  `total` int NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `spareparts` (`id`, `id_user`, `nama`, `harga`, `jumlah`, `total`, `status`, `created_at`, `updated_at`) VALUES
(1,	1,	'Lorem culpa et atque',	41000,	19,	779000,	'1',	'2020-09-15 03:18:42',	'2020-09-15 07:01:41'),
(2,	2,	'Excepteur sunt et ne',	3000,	38,	114000,	'1',	'2020-09-15 04:09:22',	'2020-09-15 07:01:38'),
(3,	1,	'Enim possimus beata',	860000,	89,	76540000,	'1',	'2020-09-15 04:54:03',	'2020-09-15 07:47:27'),
(4,	2,	'Dolores molestias vo',	27000,	26,	702000,	'1',	'2020-09-15 04:57:45',	'2020-09-15 07:01:34'),
(6,	1,	'Laborum voluptas asp',	57000,	73,	4161000,	'1',	'2020-09-15 07:01:21',	'2020-09-17 02:49:06'),
(7,	1,	'Magni ducimus sint',	70000,	42,	2940000,	'1',	'2020-09-15 07:01:29',	'2020-09-18 02:20:47'),
(9,	1,	'Accusantium dolor qu',	94000,	83,	7802000,	'1',	'2020-09-19 03:15:40',	'2020-09-19 03:15:52'),
(10,	1,	'Cumque cupidatat con',	42000,	17,	714000,	'1',	'2020-09-19 03:47:12',	'2020-09-19 03:47:16');

DROP TABLE IF EXISTS `statuses`;
CREATE TABLE `statuses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `statuses` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1,	'Konfirmasi',	'2020-09-14 23:58:03',	'2020-09-14 23:58:03'),
(2,	'Belum Konfirmasi',	'2020-09-14 23:58:03',	'2020-09-14 23:58:03');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_no_hp_unique` (`no_hp`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_nik_unique` (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `level`, `username`, `password`, `nama`, `no_hp`, `alamat`, `email`, `nik`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'admin',	'admin',	'$2y$10$4U/F2.7wZHGdn3ndYs6cw.bxlNNacBHOcBXVknKali6d6n9xOlvcq',	'fariz-admin',	'081256785546',	'Bumi',	'admin@gmail.com',	'0090',	NULL,	'2020-09-14 23:58:00',	'2020-09-14 23:58:00'),
(2,	'karyawan',	'karyawan',	'$2y$10$T6xtHboywLVk/327qmsZXeoMCmEVRxa5hmBzZzqoZ3DKI3zkTyZna',	'fariz-karyawan',	'081256785547',	'Bumi',	'karyawan@gmail.com',	'0091',	NULL,	'2020-09-14 23:58:00',	'2020-09-14 23:58:00'),
(3,	'pimpinan',	'pimpinan',	'$2y$10$e5Q/144DQH81eUtfHKYZeuH/QAZG8MXIcmTPuxLTaV320LIG1b8u.',	'fariz-pimpinan',	'081256785548',	'Bumi',	'pimpinan@gmail.com',	'0092',	NULL,	'2020-09-14 23:58:01',	'2020-09-14 23:58:01'),
(4,	'keuangan',	'keuangan',	'$2y$10$EeLqwJFXB8ak7BVKv69wXu2LBdaMBfNFrbVEyu0kIuI0Deo4eqnb6',	'fariz-keuangan',	'081256785549',	'Bumi',	'keuangan@gmail.com',	'0093',	NULL,	'2020-09-14 23:58:01',	'2020-09-14 23:58:01'),
(5,	'karyawan',	'bidedumod',	'$2y$10$K.ISYqnR/NqcTekAcqc1oOLSDIMdS4TygrDpDIkvr8.Zqa4sgTlv2',	'karyawan2',	'Deserunt asperiores',	'Fuga Sint sunt ess',	'hikofuja@mailinator.com',	'Quidem rem eum dolor',	NULL,	'2020-09-17 03:02:22',	'2020-09-17 03:02:22'),
(6,	'karyawan',	'karyawan3',	'$2y$10$2cPnljkSxCyy2klekdHW1umHNAvK.inBl8He7eSjWyEloMGKKAWcW',	'Eum commodi culpa ex',	'Nam est hic fugiat s',	'Sunt quas minus expl',	'tytyqyveny@mailinator.com',	'Esse deserunt velit',	NULL,	'2020-09-17 03:06:25',	'2020-09-17 03:06:25');

-- 2020-09-25 01:46:12
