-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               8.0.24 - MySQL Community Server - GPL
-- Операционная система:         Win64
-- HeidiSQL Версия:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Дамп структуры базы данных laravel_shop
CREATE DATABASE IF NOT EXISTS `laravel_shop` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `laravel_shop`;

-- Дамп структуры для таблица laravel_shop.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravel_shop.categories: ~6 rows (приблизительно)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `code`, `description`, `image`, `created_at`, `updated_at`) VALUES
	(1, 'Компьютеры', 'pc', 'Компьютеры разных мощностей от самых слабых до мега-сильных', NULL, '2022-10-10 17:17:49', '2022-10-10 17:17:50'),
	(2, 'Телефоны', 'telephone', 'Телефоны и айфоны разных моделей', NULL, '2022-10-10 17:17:50', '2022-10-10 17:17:54'),
	(3, 'Наушники', 'naushniki', 'Наушники и блютуз', NULL, '2022-10-10 17:18:49', '2022-10-12 15:10:38'),
	(4, 'Часы', 'watch', 'Электронные и механические часы, умные часы для контроля биоритмов в организме', NULL, '2022-10-12 15:06:58', '2022-10-12 15:06:58'),
	(5, 'Сувениры и декор', 'syveniri', 'Сувениры, декор и изделия для украшения дома', NULL, '2024-10-12 15:08:16', '2022-10-12 15:18:54'),
	(6, 'Прочее', 'other', 'Крема, чистящие средства, духи и одеколоны, лекарственные препараты, сумки, сосуды', NULL, '2022-10-12 15:15:03', '2022-10-12 15:24:03');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Дамп структуры для таблица laravel_shop.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
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

-- Дамп данных таблицы laravel_shop.failed_jobs: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Дамп структуры для таблица laravel_shop.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravel_shop.migrations: ~9 rows (приблизительно)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2022_10_10_100300_create_categories_table', 1),
	(6, '2022_10_10_100754_create_products_table', 1),
	(7, '2022_10_13_071946_create_orders_table', 2),
	(8, '2022_10_13_072528_create_order_product_table', 2),
	(9, '2022_10_14_102240_update_order_product_table', 3),
	(10, '2014_10_12_200000_add_two_factor_columns_to_users_table', 4),
	(11, '2020_05_21_100000_create_teams_table', 4),
	(12, '2020_05_21_200000_create_team_user_table', 4),
	(13, '2020_05_21_300000_create_team_invitations_table', 4),
	(14, '2022_10_17_094516_create_sessions_table', 4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Дамп структуры для таблица laravel_shop.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `status` tinyint NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravel_shop.orders: ~8 rows (приблизительно)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`, `status`, `name`, `phone`, `created_at`, `updated_at`) VALUES
	(1, 0, NULL, NULL, '2022-10-13 09:56:49', '2022-10-13 09:56:49'),
	(2, 0, NULL, NULL, '2022-10-13 10:00:39', '2022-10-13 10:00:39'),
	(3, 0, NULL, NULL, '2022-10-14 09:26:26', '2022-10-14 09:26:26'),
	(4, 0, NULL, NULL, '2022-10-14 09:27:46', '2022-10-14 09:27:46'),
	(5, 0, NULL, NULL, '2022-10-17 05:03:09', '2022-10-17 05:03:09'),
	(6, 1, 'ФИО11111', 'телефон11111', '2022-10-17 05:05:07', '2022-10-17 07:04:54'),
	(7, 1, 'Ларионов Андрей', '8913-134-09-42', '2022-10-17 07:12:28', '2022-10-17 07:17:03'),
	(8, 1, 'ФИО', 'телефон', '2022-10-17 07:17:21', '2022-10-17 07:18:31');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Дамп структуры для таблица laravel_shop.order_product
CREATE TABLE IF NOT EXISTS `order_product` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `count` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravel_shop.order_product: ~8 rows (приблизительно)
/*!40000 ALTER TABLE `order_product` DISABLE KEYS */;
INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `count`, `created_at`, `updated_at`) VALUES
	(1, 2, 1, 1, NULL, NULL),
	(7, 2, 6, 1, '2022-10-13 17:12:55', '2022-10-13 17:12:55'),
	(8, 2, 9, 1, '2022-10-13 17:38:43', '2022-10-13 17:38:43'),
	(16, 4, 3, 1, '2022-10-14 11:08:03', '2022-10-14 11:08:03'),
	(17, 6, 2, 3, '2022-10-17 05:05:47', '2022-10-17 05:06:17'),
	(18, 6, 3, 1, '2022-10-17 05:05:53', '2022-10-17 05:05:53'),
	(19, 6, 6, 1, '2022-10-17 05:06:00', '2022-10-17 05:06:00'),
	(20, 7, 1, 2, '2022-10-17 07:13:03', '2022-10-17 07:16:01');
/*!40000 ALTER TABLE `order_product` ENABLE KEYS */;

-- Дамп структуры для таблица laravel_shop.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravel_shop.password_resets: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Дамп структуры для таблица laravel_shop.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravel_shop.personal_access_tokens: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Дамп структуры для таблица laravel_shop.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `price` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravel_shop.products: ~11 rows (приблизительно)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `category_id`, `name`, `code`, `description`, `image`, `price`, `created_at`, `updated_at`) VALUES
	(1, 4, 'Часы Belt', 'watch1', 'Часы Часы Часы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы ЧасыЧасы Часы', 'product1.png', 550, '2022-10-12 15:12:57', '2022-10-12 15:12:57'),
	(2, 6, 'Women Freshwash', 'WomenFreshwash', 'Крем для лица и тела, омолаживащие свойства, увлажняющие свойства', 'product2.png', 210, '2022-10-12 15:17:55', '2022-10-12 15:17:55'),
	(3, 5, 'Лампа-светильник', 'RoomFlashLight', 'Лампа-светильник декор для помещений', 'product3.png', 1500, '2022-10-12 15:20:30', '2022-10-12 15:20:42'),
	(4, 6, 'Фляжка для вина', 'VineCap', 'Фляжка для различных алкогольных напитков', 'product4.png', 450, '2022-10-12 15:23:10', '2022-10-12 15:23:10'),
	(5, 6, 'Сумка-рюкзак', 'ManOfficeBag', 'Мужская сумка-рюкзак для офиса и учебных заведений', 'product5.png', 1790, '2022-10-12 15:26:23', '2022-10-12 15:26:23'),
	(6, 5, 'Машинка-модель', 'ChargingCar', 'Детская модель-машинка с раскрыващимися дверцами и капотом', 'product6.png', 780, '2022-10-12 15:28:10', '2022-10-12 15:28:10'),
	(7, 3, 'Блутуз-помощник ', 'BlutoothSpreaker', 'Говорящий блутуз-помощник для управления бытовыми приборами, телефонами и компьютерами', 'product7.png', 3200, '2022-10-12 15:31:53', '2022-10-12 15:31:53'),
	(8, 3, 'Наушники-блутуз', 'NaushnikiBlutooth', 'Наушники-блутуз', 'product8.png', 1100, '2022-10-12 15:34:42', '2022-10-12 15:34:42'),
	(9, 1, 'Ноутбук Acer', 'Nootbook1', 'Ноутбук Acer 17дюймов экран, 8 Гб ОЗУ, Intel core i5 310М, NVIDEO GeForce GT 640M', NULL, 31500, '2022-10-12 15:38:37', '2022-10-12 15:38:37'),
	(10, 2, 'Телефон Honor', 'Phone1', 'Сотовый телефон', NULL, 11000, '2022-10-12 15:39:47', '2022-10-12 15:39:47'),
	(11, 4, 'Умные часы ', 'watch2', 'Умные часы с выводом биоритмов человека', 'product1.png', 2700, '2023-10-12 15:40:47', '2022-10-12 15:40:53');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Дамп структуры для таблица laravel_shop.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravel_shop.sessions: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('2cECMCDPEmYEsD2iWeIE2BJ7umbKgSLAVuFta8Q3', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOHFNY29yMTRWVnJlQXd6RmRVNjRCMDQzcFZ0WEt4VHgzMlM2WGltSCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly9sb2NhbGhvc3Qvc2hvcC1sYXJhdmVsIjt9fQ==', 1666362890);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;

-- Дамп структуры для таблица laravel_shop.teams
CREATE TABLE IF NOT EXISTS `teams` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teams_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravel_shop.teams: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;

-- Дамп структуры для таблица laravel_shop.team_invitations
CREATE TABLE IF NOT EXISTS `team_invitations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `team_id` bigint unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`),
  CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravel_shop.team_invitations: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `team_invitations` DISABLE KEYS */;
/*!40000 ALTER TABLE `team_invitations` ENABLE KEYS */;

-- Дамп структуры для таблица laravel_shop.team_user
CREATE TABLE IF NOT EXISTS `team_user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `team_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravel_shop.team_user: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `team_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `team_user` ENABLE KEYS */;

-- Дамп структуры для таблица laravel_shop.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravel_shop.users: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin1', 'integralal@mail.ru', NULL, '$2y$10$U2vOJBtDeJCJw9G4/FwPI.kbYrdrtq/KF5oXKidMfbtG6wMQktx7e', NULL, NULL, NULL, NULL, '2022-10-17 10:51:21', '2022-10-17 10:51:21');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
