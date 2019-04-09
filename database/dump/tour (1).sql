-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 09, 2019 at 05:38 AM
-- Server version: 5.5.60-0+deb8u1
-- PHP Version: 5.6.36-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tour`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departure_date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `price`, `departure_date`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Program Umroh Januari', '22500000', '06 Januari - 25 Februari 2019', 1, '2019-04-08 07:01:18', '2019-04-08 10:36:38', NULL),
(2, 'Program Umroh Maret', '27000000', '06 Maret - 27 April 2019', 1, '2019-04-08 07:01:45', '2019-04-08 10:36:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE IF NOT EXISTS `districts` (
`id` int(10) unsigned NOT NULL,
  `province_id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9472 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `province_id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3309, 33, 'Kab. Boyolali', NULL, NULL, NULL),
(3310, 33, 'Kab. Klaten', NULL, NULL, NULL),
(3311, 33, 'Kab. Sukoharjo', NULL, NULL, NULL),
(3313, 33, 'Kab. Karanganyar', NULL, NULL, NULL),
(3314, 33, 'Kab. Sragen', NULL, NULL, NULL),
(3372, 33, 'Kota Surakarta', NULL, NULL, NULL),
(3401, 34, 'Kab. Kulon Progo', NULL, NULL, NULL),
(3402, 34, 'Kab. Bantul', NULL, NULL, NULL),
(3403, 34, 'Kab. Gunung Kidul', NULL, NULL, NULL),
(3404, 34, 'Kab. Sleman', NULL, NULL, NULL),
(3471, 34, 'Kota Yogyakarta', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
`id` int(10) unsigned NOT NULL,
  `category_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alternative_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_card` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_account_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departure_date` date NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visa_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `province_id` int(10) unsigned NOT NULL,
  `district_id` int(10) unsigned NOT NULL,
  `subdistrict_id` int(10) unsigned NOT NULL,
  `village_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
`id` int(10) unsigned NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_04_07_000000_create_roles_table', 1),
(2, '2019_04_07_000001_create_users_table', 1),
(3, '2019_04_07_000002_create_password_resets_table', 1),
(4, '2019_04_07_000003_create_categories_table', 1),
(5, '2019_04_07_000004_create_provinces_table', 1),
(6, '2019_04_07_000005_create_districts_table', 1),
(7, '2019_04_07_000006_create_subdistricts_table', 1),
(12, '2019_04_08_145121_create_salaries_table', 2),
(13, '2019_04_08_151735_create_invoices_table', 3),
(14, '2019_04_07_000007_create_villages_table', 4),
(15, '2019_04_07_043658_create_members_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE IF NOT EXISTS `provinces` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(33, 'Jawa Tengah', NULL, NULL, NULL),
(34, 'Di Yogyakarta', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', '2018-02-13 00:00:00', NULL, NULL),
(2, 'hrd', '2018-02-13 00:00:00', NULL, NULL),
(3, 'agent', '2018-02-13 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE IF NOT EXISTS `salaries` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subdistricts`
--

CREATE TABLE IF NOT EXISTS `subdistricts` (
`id` int(10) unsigned NOT NULL,
  `district_id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9471041 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subdistricts`
--

INSERT INTO `subdistricts` (`id`, `district_id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3309010, 3309, 'Selo', NULL, NULL, NULL),
(3309020, 3309, 'Ampel', NULL, NULL, NULL),
(3309030, 3309, 'Cepogo', NULL, NULL, NULL),
(3309040, 3309, 'Musuk', NULL, NULL, NULL),
(3309050, 3309, 'Boyolali', NULL, NULL, NULL),
(3309060, 3309, 'Mojosongo', NULL, NULL, NULL),
(3309070, 3309, 'Teras', NULL, NULL, NULL),
(3309080, 3309, 'Sawit', NULL, NULL, NULL),
(3309090, 3309, 'Banyudono', NULL, NULL, NULL),
(3309100, 3309, 'Sambi', NULL, NULL, NULL),
(3309110, 3309, 'Ngemplak', NULL, NULL, NULL),
(3309120, 3309, 'Nogosari', NULL, NULL, NULL),
(3309130, 3309, 'Simo', NULL, NULL, NULL),
(3309140, 3309, 'Karanggede', NULL, NULL, NULL),
(3309150, 3309, 'Klego', NULL, NULL, NULL),
(3309160, 3309, 'Andong', NULL, NULL, NULL),
(3309170, 3309, 'Kemusu', NULL, NULL, NULL),
(3309180, 3309, 'Wonosegoro', NULL, NULL, NULL),
(3309190, 3309, 'Juwangi', NULL, NULL, NULL),
(3310010, 3310, 'Prambanan', NULL, NULL, NULL),
(3310020, 3310, 'Gantiwarno', NULL, NULL, NULL),
(3310030, 3310, 'Wedi', NULL, NULL, NULL),
(3310040, 3310, 'Bayat', NULL, NULL, NULL),
(3310050, 3310, 'Cawas', NULL, NULL, NULL),
(3310060, 3310, 'Trucuk', NULL, NULL, NULL),
(3310070, 3310, 'Kalikotes', NULL, NULL, NULL),
(3310080, 3310, 'Kebonarum', NULL, NULL, NULL),
(3310090, 3310, 'Jogonalan', NULL, NULL, NULL),
(3310100, 3310, 'Manisrenggo', NULL, NULL, NULL),
(3310110, 3310, 'Karangnongko', NULL, NULL, NULL),
(3310120, 3310, 'Ngawen', NULL, NULL, NULL),
(3310130, 3310, 'Ceper', NULL, NULL, NULL),
(3310140, 3310, 'Pedan', NULL, NULL, NULL),
(3310150, 3310, 'Karangdowo', NULL, NULL, NULL),
(3310160, 3310, 'Juwiring', NULL, NULL, NULL),
(3310170, 3310, 'Wonosari', NULL, NULL, NULL),
(3310180, 3310, 'Delanggu', NULL, NULL, NULL),
(3310190, 3310, 'Polanharjo', NULL, NULL, NULL),
(3310200, 3310, 'Karanganom', NULL, NULL, NULL),
(3310210, 3310, 'Tulung', NULL, NULL, NULL),
(3310220, 3310, 'Jatinom', NULL, NULL, NULL),
(3310230, 3310, 'Kemalang', NULL, NULL, NULL),
(3310710, 3310, 'Klaten Selatan', NULL, NULL, NULL),
(3310720, 3310, 'Klaten Tengah', NULL, NULL, NULL),
(3310730, 3310, 'Klaten Utara', NULL, NULL, NULL),
(3311010, 3311, 'Weru', NULL, NULL, NULL),
(3311020, 3311, 'Bulu', NULL, NULL, NULL),
(3311030, 3311, 'Tawangsari', NULL, NULL, NULL),
(3311040, 3311, 'Sukoharjo', NULL, NULL, NULL),
(3311050, 3311, 'Nguter', NULL, NULL, NULL),
(3311060, 3311, 'Bendosari', NULL, NULL, NULL),
(3311070, 3311, 'Polokarto', NULL, NULL, NULL),
(3311080, 3311, 'Mojolaban', NULL, NULL, NULL),
(3311090, 3311, 'Grogol', NULL, NULL, NULL),
(3311100, 3311, 'Baki', NULL, NULL, NULL),
(3311110, 3311, 'Gatak', NULL, NULL, NULL),
(3311120, 3311, 'Kartasura', NULL, NULL, NULL),
(3313010, 3313, 'Jatipuro', NULL, NULL, NULL),
(3313020, 3313, 'Jatiyoso', NULL, NULL, NULL),
(3313030, 3313, 'Jumapolo', NULL, NULL, NULL),
(3313040, 3313, 'Jumantono', NULL, NULL, NULL),
(3313050, 3313, 'Matesih', NULL, NULL, NULL),
(3313060, 3313, 'Tawangmangu', NULL, NULL, NULL),
(3313070, 3313, 'Ngargoyoso', NULL, NULL, NULL),
(3313080, 3313, 'Karangpandan', NULL, NULL, NULL),
(3313090, 3313, 'Karanganyar', NULL, NULL, NULL),
(3313100, 3313, 'Tasikmadu', NULL, NULL, NULL),
(3313110, 3313, 'Jaten', NULL, NULL, NULL),
(3313120, 3313, 'Colomadu', NULL, NULL, NULL),
(3313130, 3313, 'Gondangrejo', NULL, NULL, NULL),
(3313140, 3313, 'Kebakkramat', NULL, NULL, NULL),
(3313150, 3313, 'Mojogedang', NULL, NULL, NULL),
(3313160, 3313, 'Kerjo', NULL, NULL, NULL),
(3313170, 3313, 'Jenawi', NULL, NULL, NULL),
(3314010, 3314, 'Kalijambe', NULL, NULL, NULL),
(3314020, 3314, 'Plupuh', NULL, NULL, NULL),
(3314030, 3314, 'Masaran', NULL, NULL, NULL),
(3314040, 3314, 'Kedawung', NULL, NULL, NULL),
(3314050, 3314, 'Sambirejo', NULL, NULL, NULL),
(3314060, 3314, 'Gondang', NULL, NULL, NULL),
(3314070, 3314, 'Sambung Macan', NULL, NULL, NULL),
(3314080, 3314, 'Ngrampal', NULL, NULL, NULL),
(3314090, 3314, 'Karangmalang', NULL, NULL, NULL),
(3314100, 3314, 'Sragen', NULL, NULL, NULL),
(3314110, 3314, 'Sidoharjo', NULL, NULL, NULL),
(3314120, 3314, 'Tanon', NULL, NULL, NULL),
(3314130, 3314, 'Gemolong', NULL, NULL, NULL),
(3314140, 3314, 'Miri', NULL, NULL, NULL),
(3314150, 3314, 'Sumberlawang', NULL, NULL, NULL),
(3314160, 3314, 'Mondokan', NULL, NULL, NULL),
(3314170, 3314, 'Sukodono', NULL, NULL, NULL),
(3314180, 3314, 'Gesi', NULL, NULL, NULL),
(3314190, 3314, 'Tangen', NULL, NULL, NULL),
(3314200, 3314, 'Jenar', NULL, NULL, NULL),
(3401010, 3401, 'Temon', NULL, NULL, NULL),
(3401020, 3401, 'Wates', NULL, NULL, NULL),
(3401030, 3401, 'Panjatan', NULL, NULL, NULL),
(3401040, 3401, 'Galur', NULL, NULL, NULL),
(3401050, 3401, 'Lendah', NULL, NULL, NULL),
(3401060, 3401, 'Sentolo', NULL, NULL, NULL),
(3401070, 3401, 'Pengasih', NULL, NULL, NULL),
(3401080, 3401, 'Kokap', NULL, NULL, NULL),
(3401090, 3401, 'Girimulyo', NULL, NULL, NULL),
(3401100, 3401, 'Nanggulan', NULL, NULL, NULL),
(3401110, 3401, 'Kalibawang', NULL, NULL, NULL),
(3401120, 3401, 'Samigaluh', NULL, NULL, NULL),
(3402010, 3402, 'Srandakan', NULL, NULL, NULL),
(3402020, 3402, 'Sanden', NULL, NULL, NULL),
(3402030, 3402, 'Kretek', NULL, NULL, NULL),
(3402040, 3402, 'Pundong', NULL, NULL, NULL),
(3402050, 3402, 'Bambang Lipuro', NULL, NULL, NULL),
(3402060, 3402, 'Pandak', NULL, NULL, NULL),
(3402070, 3402, 'Bantul', NULL, NULL, NULL),
(3402080, 3402, 'Jetis', NULL, NULL, NULL),
(3402090, 3402, 'Imogiri', NULL, NULL, NULL),
(3402100, 3402, 'Dlingo', NULL, NULL, NULL),
(3402110, 3402, 'Pleret', NULL, NULL, NULL),
(3402120, 3402, 'Piyungan', NULL, NULL, NULL),
(3402130, 3402, 'Banguntapan', NULL, NULL, NULL),
(3402140, 3402, 'Sewon', NULL, NULL, NULL),
(3402150, 3402, 'Kasihan', NULL, NULL, NULL),
(3402160, 3402, 'Pajangan', NULL, NULL, NULL),
(3402170, 3402, 'Sedayu', NULL, NULL, NULL),
(3403010, 3403, 'Panggang', NULL, NULL, NULL),
(3403011, 3403, 'Purwosari', NULL, NULL, NULL),
(3403020, 3403, 'Paliyan', NULL, NULL, NULL),
(3403030, 3403, 'Sapto Sari', NULL, NULL, NULL),
(3403040, 3403, 'Tepus', NULL, NULL, NULL),
(3403041, 3403, 'Tanjungsari', NULL, NULL, NULL),
(3403050, 3403, 'Rongkop', NULL, NULL, NULL),
(3403051, 3403, 'Girisubo', NULL, NULL, NULL),
(3403060, 3403, 'Semanu', NULL, NULL, NULL),
(3403070, 3403, 'Ponjong', NULL, NULL, NULL),
(3403080, 3403, 'Karangmojo', NULL, NULL, NULL),
(3403090, 3403, 'Wonosari', NULL, NULL, NULL),
(3403100, 3403, 'Playen', NULL, NULL, NULL),
(3403110, 3403, 'Patuk', NULL, NULL, NULL),
(3403120, 3403, 'Gedang Sari', NULL, NULL, NULL),
(3403130, 3403, 'Nglipar', NULL, NULL, NULL),
(3403140, 3403, 'Ngawen', NULL, NULL, NULL),
(3403150, 3403, 'Semin', NULL, NULL, NULL),
(3404010, 3404, 'Moyudan', NULL, NULL, NULL),
(3404020, 3404, 'Minggir', NULL, NULL, NULL),
(3404030, 3404, 'Seyegan', NULL, NULL, NULL),
(3404040, 3404, 'Godean', NULL, NULL, NULL),
(3404050, 3404, 'Gamping', NULL, NULL, NULL),
(3404060, 3404, 'Mlati', NULL, NULL, NULL),
(3404070, 3404, 'Depok', NULL, NULL, NULL),
(3404080, 3404, 'Berbah', NULL, NULL, NULL),
(3404090, 3404, 'Prambanan', NULL, NULL, NULL),
(3404100, 3404, 'Kalasan', NULL, NULL, NULL),
(3404110, 3404, 'Ngemplak', NULL, NULL, NULL),
(3404120, 3404, 'Ngaglik', NULL, NULL, NULL),
(3404130, 3404, 'Sleman', NULL, NULL, NULL),
(3404140, 3404, 'Tempel', NULL, NULL, NULL),
(3404150, 3404, 'Turi', NULL, NULL, NULL),
(3404160, 3404, 'Pakem', NULL, NULL, NULL),
(3404170, 3404, 'Cangkringan', NULL, NULL, NULL),
(3471010, 3471, 'Mantrijeron', NULL, NULL, NULL),
(3471020, 3471, 'Kraton', NULL, NULL, NULL),
(3471030, 3471, 'Mergangsan', NULL, NULL, NULL),
(3471040, 3471, 'Umbulharjo', NULL, NULL, NULL),
(3471050, 3471, 'Kotagede', NULL, NULL, NULL),
(3471060, 3471, 'Gondokusuman', NULL, NULL, NULL),
(3471070, 3471, 'Danurejan', NULL, NULL, NULL),
(3471080, 3471, 'Pakualaman', NULL, NULL, NULL),
(3471090, 3471, 'Gondomanan', NULL, NULL, NULL),
(3471100, 3471, 'Ngampilan', NULL, NULL, NULL),
(3471110, 3471, 'Wirobrajan', NULL, NULL, NULL),
(3471120, 3471, 'Gedong Tengen', NULL, NULL, NULL),
(3471130, 3471, 'Jetis', NULL, NULL, NULL),
(3471140, 3471, 'Tegalrejo', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `password`, `phone`, `gender`, `address`, `photo`, `type`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'admin@gmail.com', '$2y$10$PJQr4NZMSyPh4wbDYMpXsOLyQWJf7yuorJXyieNebDEj1hl0sohFS', '', '', '', '', 'admin', 1, 'FrNa9T6eO3y9JS2lR62qTdrlCgJLyZN4Oh6tJ4FT2XtzNao5YML3j4aUcvym', '2019-04-08 06:59:28', '2019-04-08 06:59:28'),
(5, 3, 'rizal faozi', 'agen@gmail.com', '$2y$10$PJQr4NZMSyPh4wbDYMpXsOLyQWJf7yuorJXyieNebDEj1hl0sohFS', '85726242220', 'pria', 'jalan gejayan ctx 9a', 'files/photo/ida2sh1554739727.jpg', 'agen', 1, 'sAOm15daI1awLtf07QyI8AiozUSkTiRz9vbwSRjROAB2XW4HrowptQnSeONw', '2019-04-08 09:37:23', '2019-04-08 16:12:31');

-- --------------------------------------------------------

--
-- Table structure for table `villages`
--

CREATE TABLE IF NOT EXISTS `villages` (
`id` int(10) unsigned NOT NULL,
  `subdistrict_id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4294967295 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `villages`
--

INSERT INTO `villages` (`id`, `subdistrict_id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3404100001, 3404100, 'Purwo Martani', NULL, NULL, NULL),
(3404100002, 3404100, 'Tirto Martani', NULL, NULL, NULL),
(3404100003, 3404100, 'Taman Martani', NULL, NULL, NULL),
(3404100004, 3404100, 'Selo Martani', NULL, NULL, NULL),
(3404110001, 3404110, 'Wedomartani', NULL, NULL, NULL),
(3404110002, 3404110, 'Umbulmartani', NULL, NULL, NULL),
(3404110003, 3404110, 'Widodo Martani', NULL, NULL, NULL),
(3404110004, 3404110, 'Bimo Martani', NULL, NULL, NULL),
(3404110005, 3404110, 'Sindumartani', NULL, NULL, NULL),
(3404120001, 3404120, 'Sari Harjo', NULL, NULL, NULL),
(3404120002, 3404120, 'Sinduharjo', NULL, NULL, NULL),
(3404120003, 3404120, 'Minomartani', NULL, NULL, NULL),
(3404120004, 3404120, 'Suko Harjo', NULL, NULL, NULL),
(3404120005, 3404120, 'Sardonoharjo', NULL, NULL, NULL),
(3404120006, 3404120, 'Donoharjo', NULL, NULL, NULL),
(3404130001, 3404130, 'Catur Harjo', NULL, NULL, NULL),
(3404130002, 3404130, 'Triharjo', NULL, NULL, NULL),
(3404130003, 3404130, 'Tridadi', NULL, NULL, NULL),
(3404130004, 3404130, 'Pandowo Harjo', NULL, NULL, NULL),
(3404130005, 3404130, 'Tri Mulyo', NULL, NULL, NULL),
(3404140001, 3404140, 'Banyu Rejo', NULL, NULL, NULL),
(3404140002, 3404140, 'Tambak Rejo', NULL, NULL, NULL),
(3404140003, 3404140, 'Sumber Rejo', NULL, NULL, NULL),
(3404140004, 3404140, 'Pondok Rejo', NULL, NULL, NULL),
(3404140005, 3404140, 'Moro Rejo', NULL, NULL, NULL),
(3404140006, 3404140, 'Margo Rejo', NULL, NULL, NULL),
(3404140007, 3404140, 'Lumbung Rejo', NULL, NULL, NULL),
(3404140008, 3404140, 'Merdiko Rejo', NULL, NULL, NULL),
(3404150001, 3404150, 'Bangun Kerto', NULL, NULL, NULL),
(3404150002, 3404150, 'Donokerto', NULL, NULL, NULL),
(3404150003, 3404150, 'Giri Kerto', NULL, NULL, NULL),
(3404150004, 3404150, 'Wono Kerto', NULL, NULL, NULL),
(3404160001, 3404160, 'Purwo Binangun', NULL, NULL, NULL),
(3404160002, 3404160, 'Candi Binangun', NULL, NULL, NULL),
(3404160003, 3404160, 'Harjo Binangun', NULL, NULL, NULL),
(3404160004, 3404160, 'Pakem Binangun', NULL, NULL, NULL),
(3404160005, 3404160, 'Hargo Binangun', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
 ADD PRIMARY KEY (`id`), ADD KEY `districts_province_id_foreign` (`province_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
 ADD PRIMARY KEY (`id`), ADD KEY `members_user_id_foreign` (`user_id`), ADD KEY `members_province_id_foreign` (`province_id`), ADD KEY `members_district_id_foreign` (`district_id`), ADD KEY `members_subdistrict_id_foreign` (`subdistrict_id`), ADD KEY `members_village_id_foreign` (`village_id`);

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
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subdistricts`
--
ALTER TABLE `subdistricts`
 ADD PRIMARY KEY (`id`), ADD KEY `subdistricts_district_id_foreign` (`district_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`), ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `villages`
--
ALTER TABLE `villages`
 ADD PRIMARY KEY (`id`), ADD KEY `villages_subdistrict_id_foreign` (`subdistrict_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9472;
--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subdistricts`
--
ALTER TABLE `subdistricts`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9471041;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `villages`
--
ALTER TABLE `villages`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4294967295;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
ADD CONSTRAINT `districts_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `members`
--
ALTER TABLE `members`
ADD CONSTRAINT `members_village_id_foreign` FOREIGN KEY (`village_id`) REFERENCES `villages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `members_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `members_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `members_subdistrict_id_foreign` FOREIGN KEY (`subdistrict_id`) REFERENCES `subdistricts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `members_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subdistricts`
--
ALTER TABLE `subdistricts`
ADD CONSTRAINT `subdistricts_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `villages`
--
ALTER TABLE `villages`
ADD CONSTRAINT `villages_subdistrict_id_foreign` FOREIGN KEY (`subdistrict_id`) REFERENCES `subdistricts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
