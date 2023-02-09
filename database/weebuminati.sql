-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2023 at 02:51 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weebuminati`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `is_active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `create_by` int(11) NOT NULL,
  `update_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `description`, `image`, `is_deleted`, `is_active`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
(1, 'new fashion collection', 'Simply dummy text of the printing and typesetting industry. simply dummy text of the printing and typesetting industry.', '1675165115_2.jpg', 0, '1', 1, 1, '2023-01-31 04:34:02', '2023-02-07 11:29:52'),
(2, 'Men\'s fashion collection', 'Simply dummy text of the printing and typesetting industry. simply dummy text of the printing and typesetting industry.', '1675769450_2.jpg', 0, '1', 1, NULL, '2023-02-07 11:30:50', '2023-02-07 11:30:50'),
(3, 'Women\'s fashion collection', 'Simply dummy text of the printing and typesetting industry. simply dummy text of the printing and typesetting industry.', '1675769483_3.jpg', 0, '1', 1, NULL, '2023-02-07 11:31:23', '2023-02-07 11:31:23');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_parent` int(11) NOT NULL DEFAULT 1,
  `parent_id` int(11) DEFAULT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `is_active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `create_by` int(11) NOT NULL,
  `update_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `summary`, `image`, `is_parent`, `parent_id`, `is_deleted`, `is_active`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
(1, 'Notebooks', 'notebooks', 'A notebook with the page turning over.', '1675774433_book-1.png', 1, NULL, 0, '1', 1, NULL, '2023-02-07 12:53:53', '2023-02-07 12:53:53'),
(2, 'Posters', 'posters', 'Posters', '1675774660_posters-new.png', 1, NULL, 0, '1', 1, NULL, '2023-02-07 12:57:40', '2023-02-07 12:57:40'),
(3, 'Stickers', 'stickers', 'Stickers', '1675774890_stickers01-new.png', 1, NULL, 0, '1', 1, NULL, '2023-02-07 13:01:30', '2023-02-07 13:01:30'),
(4, 'DC notebooks', 'dc-notebooks', 'DC notebooks', '1675775184_death-note.png', 0, 1, 0, '1', 1, NULL, '2023-02-07 13:06:24', '2023-02-07 13:06:24'),
(5, 'Video Games Notebooks', 'video-games-notebooks', 'Video Games Notebooks', '1675775294_Video-Games-Notebooks.jpg', 0, 1, 0, '1', 1, NULL, '2023-02-07 13:08:14', '2023-02-07 13:08:14'),
(6, 'Anime Posters', 'anime-posters', 'Anime Posters', '1675775385_Anime-Posters.jpg', 0, 2, 0, '1', 1, 1, '2023-02-07 13:09:46', '2023-02-07 13:10:40'),
(7, 'DC Posters', 'dc-posters', 'DC Posters', '1675775426_Anime-Posters.jpg', 0, 2, 0, '1', 1, NULL, '2023-02-07 13:10:26', '2023-02-07 13:10:26'),
(8, 'Anime Stickers', 'anime-stickers', 'Anime Stickers', '1675775511_Anime-Stickers.jpg', 0, 3, 0, '1', 1, NULL, '2023-02-07 13:11:51', '2023-02-07 13:11:51'),
(9, 'DC Stickers', 'dc-stickers', 'DC Stickers', '1675775535_Anime-Stickers.jpg', 0, 3, 0, '1', 1, NULL, '2023-02-07 13:12:15', '2023-02-07 13:12:15');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_31_045407_create_banners_table', 2),
(6, '2023_01_31_124518_create_categories_table', 3),
(7, '2023_02_01_093416_create_products_table', 4),
(8, '2023_02_03_100252_create_product_images_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('parth@test.tk', '$2y$10$2Vb/Oqc95ZeWACl23F5i0e8MG6mdq65QEj3crAUFbXQ.muBSeffIa', '2023-01-30 03:42:21'),
('admin@admin.com', '$2y$10$YbC1S7qdGVtXm.afELuLPetafoE7OxDU40blolsvkp9aKtsHLD90S', '2023-01-30 03:43:34');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `child_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 1,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'a4',
  `condition` enum('default','new','best_selling','out_of_stock') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `price` double(8,2) NOT NULL,
  `discount` double(8,2) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `is_active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `create_by` int(11) NOT NULL,
  `update_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `child_category_id`, `title`, `slug`, `summary`, `description`, `stock`, `size`, `condition`, `price`, `discount`, `is_deleted`, `is_active`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'Red Dead Redemption 2 Notebook', 'red-dead-redemption-2-notebook', 'We provide 16 cover art with every Notebook and 10 different logos on every page', 'We provide 16 cover art with every Notebook and 10 different logos on every page\r\n\r\n4 Main Cover Art (8 sides of cover): 300 gsm Matte paper for Premium Quality\r\n\r\n4 Inside Cover Art (8 sides of cover): 170 gsm Flexible matte paper for Elegant look\r\n\r\n+ Other work on other pages depends upon our innovation and creativity as we always try to improve and innovate: D\r\n\r\nCoating: Extra Matte Lamination Coating on all Art Cover for more Premium Quality\r\n\r\nQuality: 4k Print Quality', 100, 'a4,a5', 'default', 400.00, 10.00, 0, '1', 1, 1, '2023-02-07 13:32:25', '2023-02-07 13:34:51'),
(2, 1, 5, 'Kratos Fearless Diary', 'kratos-fearless-diary', 'We provide 16 cover art with every Notebook and 10 different logos on every page\r\n\r\n4 Main Cover Art (8 sides of cover): 300 gsm Matte paper for Premium Quality\r\n\r\n4 Inside Cover Art (8 sides of cover): 170 gsm Flexible matte paper for Elegant look\r\n\r\n+ Other work on other pages depends upon our innovation and creativity as we always try to improve and innovate: D\r\n\r\nCoating: Extra Matte Lamination Coating on all Art Cover for more Premium Quality\r\n\r\nQuality: 4k Print Quality', 'We provide 16 cover art with every Notebook and 10 different logos on every page\r\n\r\n4 Main Cover Art (8 sides of cover): 300 gsm Matte paper for Premium Quality\r\n\r\n4 Inside Cover Art (8 sides of cover): 170 gsm Flexible matte paper for Elegant look\r\n\r\n+ Other work on other pages depends upon our innovation and creativity as we always try to improve and innovate: D\r\n\r\nCoating: Extra Matte Lamination Coating on all Art Cover for more Premium Quality\r\n\r\nQuality: 4k Print Quality', 100, 'a4,a5', 'default', 400.00, 10.00, 0, '1', 1, NULL, '2023-02-07 13:41:30', '2023-02-07 13:41:30'),
(3, 1, 5, 'Red Dead Redemption 2 Hangover diary', 'red-dead-redemption-2-hangover-diary', 'HARD COVER: There are total 16 covers in this diary in which there are 8 sides of hardcovers which are made from 300 gsm artboard paper & 8 sides of softcovers which are made from 170 gsm artboard paper (NOTE: All These covers will come with matte lamination coating which makes notebook sturdy for long time without wear and tear)\r\n\r\nINSIDE PAGES: Total 120 ruled pages inside this diary (100 gsm off-white papers used)\r\n\r\nSIZE: A5 size\r\n\r\nIn centimeters: (14.732 c.m X 29.718c.m)\r\n\r\nIn Inches:(5.8 X 8.3)', 'HARD COVER: There are total 16 covers in this diary in which there are 8 sides of hardcovers which are made from 300 gsm artboard paper & 8 sides of softcovers which are made from 170 gsm artboard paper (NOTE: All These covers will come with matte lamination coating which makes notebook sturdy for long time without wear and tear)\r\n\r\nINSIDE PAGES: Total 120 ruled pages inside this diary (100 gsm off-white papers used)\r\n\r\nSIZE: A5 size\r\n\r\nIn centimeters: (14.732 c.m X 29.718c.m)\r\n\r\nIn Inches:(5.8 X 8.3)', 100, 'a4,a5', 'default', 500.00, 5.00, 0, '1', 1, NULL, '2023-02-08 07:07:18', '2023-02-08 07:07:18'),
(4, 2, 6, 'Anime Posters Red Dead Redemption', 'anime-posters-red-dead-redemption', 'HARD COVER: There are total 16 covers in this diary in which there are 8 sides of hardcovers which are made from 300 gsm artboard paper & 8 sides of softcovers which are made from 170 gsm artboard paper (NOTE: All These covers will come with matte lamination coating which makes notebook sturdy for long time without wear and tear)\r\n\r\nINSIDE PAGES: Total 120 ruled pages inside this diary (100 gsm off-white papers used)\r\n\r\nSIZE: A5 size\r\n\r\nIn centimeters: (14.732 c.m X 29.718c.m)\r\n\r\nIn Inches:(5.8 X 8.3)', 'HARD COVER: There are total 16 covers in this diary in which there are 8 sides of hardcovers which are made from 300 gsm artboard paper & 8 sides of softcovers which are made from 170 gsm artboard paper (NOTE: All These covers will come with matte lamination coating which makes notebook sturdy for long time without wear and tear)\r\n\r\nINSIDE PAGES: Total 120 ruled pages inside this diary (100 gsm off-white papers used)\r\n\r\nSIZE: A5 size\r\n\r\nIn centimeters: (14.732 c.m X 29.718c.m)\r\n\r\nIn Inches:(5.8 X 8.3)', 100, 'a4,a5', 'default', 500.00, 5.00, 0, '1', 1, NULL, '2023-02-08 07:07:18', '2023-02-08 07:07:18'),
(5, 2, 6, 'Anime Posters Kratos Fearless Diary', 'anime-posters-kratos-fearless-diary', 'HARD COVER: There are total 16 covers in this diary in which there are 8 sides of hardcovers which are made from 300 gsm artboard paper & 8 sides of softcovers which are made from 170 gsm artboard paper (NOTE: All These covers will come with matte lamination coating which makes notebook sturdy for long time without wear and tear)\r\n\r\nINSIDE PAGES: Total 120 ruled pages inside this diary (100 gsm off-white papers used)\r\n\r\nSIZE: A5 size\r\n\r\nIn centimeters: (14.732 c.m X 29.718c.m)\r\n\r\nIn Inches:(5.8 X 8.3)', 'HARD COVER: There are total 16 covers in this diary in which there are 8 sides of hardcovers which are made from 300 gsm artboard paper & 8 sides of softcovers which are made from 170 gsm artboard paper (NOTE: All These covers will come with matte lamination coating which makes notebook sturdy for long time without wear and tear)\r\n\r\nINSIDE PAGES: Total 120 ruled pages inside this diary (100 gsm off-white papers used)\r\n\r\nSIZE: A5 size\r\n\r\nIn centimeters: (14.732 c.m X 29.718c.m)\r\n\r\nIn Inches:(5.8 X 8.3)', 100, 'a4,a5', 'default', 500.00, 5.00, 0, '1', 1, NULL, '2023-02-08 07:07:18', '2023-02-08 07:07:18'),
(6, 3, 8, 'Stickers Red Dead Redemption', 'stickers-red-dead-redemption', 'HARD COVER: There are total 16 covers in this diary in which there are 8 sides of hardcovers which are made from 300 gsm artboard paper & 8 sides of softcovers which are made from 170 gsm artboard paper (NOTE: All These covers will come with matte lamination coating which makes notebook sturdy for long time without wear and tear)\r\n\r\nINSIDE PAGES: Total 120 ruled pages inside this diary (100 gsm off-white papers used)\r\n\r\nSIZE: A5 size\r\n\r\nIn centimeters: (14.732 c.m X 29.718c.m)\r\n\r\nIn Inches:(5.8 X 8.3)', 'HARD COVER: There are total 16 covers in this diary in which there are 8 sides of hardcovers which are made from 300 gsm artboard paper & 8 sides of softcovers which are made from 170 gsm artboard paper (NOTE: All These covers will come with matte lamination coating which makes notebook sturdy for long time without wear and tear)\r\n\r\nINSIDE PAGES: Total 120 ruled pages inside this diary (100 gsm off-white papers used)\r\n\r\nSIZE: A5 size\r\n\r\nIn centimeters: (14.732 c.m X 29.718c.m)\r\n\r\nIn Inches:(5.8 X 8.3)', 100, 'a4,a5', 'default', 500.00, 5.00, 0, '1', 1, NULL, '2023-02-08 07:07:18', '2023-02-08 07:07:18'),
(7, 3, 8, 'Stickers Red Dead Redemption 2 Notebook', 'stickers-red-dead-redemption-2-notebook', 'HARD COVER: There are total 16 covers in this diary in which there are 8 sides of hardcovers which are made from 300 gsm artboard paper & 8 sides of softcovers which are made from 170 gsm artboard paper (NOTE: All These covers will come with matte lamination coating which makes notebook sturdy for long time without wear and tear)\r\n\r\nINSIDE PAGES: Total 120 ruled pages inside this diary (100 gsm off-white papers used)\r\n\r\nSIZE: A5 size\r\n\r\nIn centimeters: (14.732 c.m X 29.718c.m)\r\n\r\nIn Inches:(5.8 X 8.3)', 'HARD COVER: There are total 16 covers in this diary in which there are 8 sides of hardcovers which are made from 300 gsm artboard paper & 8 sides of softcovers which are made from 170 gsm artboard paper (NOTE: All These covers will come with matte lamination coating which makes notebook sturdy for long time without wear and tear)\r\n\r\nINSIDE PAGES: Total 120 ruled pages inside this diary (100 gsm off-white papers used)\r\n\r\nSIZE: A5 size\r\n\r\nIn centimeters: (14.732 c.m X 29.718c.m)\r\n\r\nIn Inches:(5.8 X 8.3)', 100, 'a4,a5', 'default', 500.00, 5.00, 0, '1', 1, NULL, '2023-02-08 07:07:18', '2023-02-08 07:07:18');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `name`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, '1675776745_01.png', 'png', '2023-02-07 13:32:25', '2023-02-07 13:32:25'),
(2, 1, '1675776745_02.png', 'png', '2023-02-07 13:32:25', '2023-02-07 13:32:25'),
(3, 1, '1675776745_03.png', 'png', '2023-02-07 13:32:26', '2023-02-07 13:32:26'),
(4, 1, '1675776746_04.png', 'png', '2023-02-07 13:32:26', '2023-02-07 13:32:26'),
(5, 1, '1675776746_05.png', 'png', '2023-02-07 13:32:26', '2023-02-07 13:32:26'),
(6, 1, '1675776746_06.png', 'png', '2023-02-07 13:32:26', '2023-02-07 13:32:26'),
(7, 2, '1675777290_01.png', 'png', '2023-02-07 13:41:30', '2023-02-07 13:41:30'),
(8, 2, '1675777290_02.png', 'png', '2023-02-07 13:41:30', '2023-02-07 13:41:30'),
(9, 2, '1675777290_03.png', 'png', '2023-02-07 13:41:30', '2023-02-07 13:41:30'),
(10, 2, '1675777290_04.png', 'png', '2023-02-07 13:41:30', '2023-02-07 13:41:30'),
(11, 2, '1675777290_05.png', 'png', '2023-02-07 13:41:30', '2023-02-07 13:41:30'),
(12, 2, '1675777290_06.png', 'png', '2023-02-07 13:41:30', '2023-02-07 13:41:30'),
(13, 3, '1675840038_01.png', 'png', '2023-02-08 07:07:18', '2023-02-08 07:07:18'),
(14, 3, '1675840038_02.png', 'png', '2023-02-08 07:07:18', '2023-02-08 07:07:18'),
(15, 3, '1675840038_03.png', 'png', '2023-02-08 07:07:19', '2023-02-08 07:07:19'),
(16, 3, '1675840039_04.png', 'png', '2023-02-08 07:07:19', '2023-02-08 07:07:19'),
(17, 3, '1675840039_05.png', 'png', '2023-02-08 07:07:19', '2023-02-08 07:07:19'),
(18, 3, '1675840039_06.png', 'png', '2023-02-08 07:07:19', '2023-02-08 07:07:19'),
(19, 4, '1675840038_01.png', 'png', '2023-02-08 07:07:18', '2023-02-08 07:07:18'),
(20, 5, '1675777290_03.png', 'png', '2023-02-07 13:41:30', '2023-02-07 13:41:30'),
(21, 6, '1675777290_04.png', 'png', '2023-02-07 13:41:30', '2023-02-07 13:41:30'),
(22, 7, '1675776746_04.png', 'png', '2023-02-07 13:32:26', '2023-02-07 13:32:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` enum('superadmin','admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `is_active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `mobile_no`, `image`, `password`, `remember_token`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'admin', 'admin@admin.com', NULL, '9638527410', '1675081067_u8---Copy.jpg', '$2y$10$b4Wvxk1W/1l4/fkfesuqoePb6fbOmdXfO6Wsohi8TLsgI5tRU1si6', '46OA43dnNKwbT2J1YBnEyigqaavjIsbqXzlrFGwbbvkIBBudXS4Mv1MJSXNe', 0, '1', '2023-01-28 01:57:30', '2023-02-03 03:14:11'),
(2, 'user', 'parth', 'parth@test.tk', NULL, NULL, NULL, '$2y$10$NBChfHIFBDmfF7I2hZ14s.h795F6Qr9IcbFVe0Z7/DTdIBrp2QUSa', 'C3ELZBLAP192QB8uNyj6Uhv7i8QZB2PCtP5DIrPRYOqZCjoqdRk5QCvo05cP', 0, '1', '2023-01-28 01:57:30', '2023-01-30 00:58:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `banners_title_unique` (`title`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_title_unique` (`title`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_no_unique` (`mobile_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
