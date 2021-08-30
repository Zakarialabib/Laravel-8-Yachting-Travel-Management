-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 25, 2021 at 10:46 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `yachting`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_menus`
--

CREATE TABLE `admin_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu_items`
--

CREATE TABLE `admin_menu_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0',
  `class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu` bigint(20) UNSIGNED NOT NULL,
  `depth` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agency_profiles`
--

CREATE TABLE `agency_profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `cac_rc_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_contact_person_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_contact_person_phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_contact_person_address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `name`, `icon`, `created_at`, `updated_at`) VALUES
(6, 'Free wifi', '602a4d4ec9bdf_1613385038.png', '2019-11-02 16:02:01', '2021-02-15 10:30:38'),
(7, 'Reservations', '602a4d609a901_1613385056.png', '2019-11-04 14:37:01', '2021-02-15 10:30:56'),
(8, 'Credit cards', '602a4dadcfddd_1613385133.png', '2019-11-04 14:37:19', '2021-02-15 10:32:13'),
(9, 'Non smoking', '602a4dc24fb12_1613385154.png', '2019-11-04 14:40:22', '2021-02-15 10:32:34'),
(20, NULL, '6076d6fba2b80_1618401019.png', '2021-03-03 09:33:51', '2021-04-14 11:50:19');

-- --------------------------------------------------------

--
-- Table structure for table `amenities_translations`
--

CREATE TABLE `amenities_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `amenities_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `amenities_translations`
--

INSERT INTO `amenities_translations` (`id`, `amenities_id`, `locale`, `name`) VALUES
(1, 6, 'en', 'Free wifi'),
(2, 7, 'en', 'Reservations'),
(3, 8, 'en', 'Credit cards'),
(4, 9, 'en', 'Non smoking'),
(13, 8, 'fr', 'Cartes bancaires'),
(14, 9, 'fr', 'Non-fumeur'),
(15, 6, 'fr', 'Wifi Gratuit'),
(16, 7, 'fr', 'Reservations'),
(29, 20, 'en', NULL),
(30, 20, 'fr', 'gfd');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) UNSIGNED NOT NULL,
  `reference` varchar(50) DEFAULT NULL,
  `place_id` int(11) DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `numbber_of_adult` int(11) DEFAULT NULL,
  `numbber_of_children` int(11) DEFAULT NULL,
  `bookable_id` int(10) UNSIGNED DEFAULT NULL,
  `date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `name` varchar(255) DEFAULT '',
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `message` varchar(500) DEFAULT NULL,
  `bookable_type` varchar(50) DEFAULT NULL,
  `type` int(2) DEFAULT NULL,
  `status` int(2) DEFAULT '2' COMMENT 'status default pending: 2',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `reference`, `place_id`, `user_id`, `numbber_of_adult`, `numbber_of_children`, `bookable_id`, `date`, `end_date`, `name`, `email`, `phone_number`, `message`, `bookable_type`, `type`, `status`, `created_at`, `updated_at`) VALUES
(132, '131200521', NULL, 10, 1, 0, 2, '2021-05-20', '2021-05-27', 'zakaria labib', 'zakarialabib@gmail.com', '066666666', NULL, 'App\\Models\\Package', 1, 1, '2021-05-20 10:23:41', '2021-05-28 16:38:14'),
(133, '132210521', NULL, NULL, 10, 0, 1, '2021-05-21', '2021-05-24', 'zakaria', 'zakarialabib@gmail.com', '066666666', NULL, 'App\\Models\\Package', 1, 2, '2021-05-21 11:44:26', '2021-05-21 11:44:26'),
(134, '2105288672689', NULL, 10, 1, 0, 1, '2021-05-28', '2021-05-31', 'super-admin', 'k@gmail.com', '066666666', NULL, 'App\\Models\\Package', 1, 2, '2021-05-28 16:34:19', '2021-05-28 16:34:57'),
(135, '2106214892055', NULL, 1, NULL, NULL, NULL, NULL, NULL, 'zakaria labib', 'zakarialabib@gmail.com', '00000', NULL, NULL, 1, 2, '2021-06-21 15:45:53', '2021-06-21 15:45:53'),
(136, '2106213410389', NULL, 1, NULL, NULL, NULL, NULL, NULL, 'zakaria labib', 'zakarialabib@gmail.com', '00000', NULL, NULL, 1, 2, '2021-06-21 15:46:22', '2021-06-21 15:46:22'),
(137, '2106214654621', NULL, 1, NULL, NULL, NULL, NULL, NULL, 'zakaria labib', 'zakarialabib@gmail.com', '00000', NULL, NULL, 1, 2, '2021-06-21 15:46:55', '2021-06-21 15:46:55'),
(138, '2106212401437', NULL, 1, NULL, NULL, NULL, '2021-06-21', NULL, 'zakaria', 'zakaria', '99999', NULL, NULL, 1, 2, '2021-06-21 15:54:00', '2021-06-21 15:54:00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT '0',
  `is_feature` int(11) DEFAULT '0',
  `feature_title` varchar(255) DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon_map_marker` varchar(255) DEFAULT NULL,
  `color_code` varchar(80) DEFAULT NULL,
  `type` varchar(10) DEFAULT 'place',
  `status` int(11) DEFAULT '1',
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `priority`, `is_feature`, `feature_title`, `image`, `icon_map_marker`, `color_code`, `type`, `status`, `seo_title`, `seo_description`, `created_at`, `updated_at`) VALUES
(11, 'See & Do', 'semi-private', 100, 1, 'Must See & Do', '60cfa1113f85f_1624219921.jpg', '5ddba7be9c049_1574676414.svg', '#DD5454', 'offer', 1, 'Semi Private', NULL, '2019-10-25 11:11:08', '2021-06-22 10:59:33'),
(12, 'Eat & Drink', 'caldera-private-cruises', 20, 1, 'Where to Eat', '60cfa107d2642_1624219911.jpg', '5fedbf56327d4_1609416534.png', '#0ECDC2', 'offer', 1, NULL, NULL, '2019-10-25 11:11:19', '2021-06-22 11:06:57'),
(13, 'Stay', 'tours', 10, 1, 'Place to stay', '60cf964777bea_1624217159.jpg', '5fedc00a907e5_1609416714.png', '#8F38E8', 'offer', 1, 'Tours', NULL, '2019-10-25 11:11:45', '2021-06-22 16:47:41'),
(23, NULL, 'astuces-et-conseils', 0, 0, NULL, NULL, NULL, NULL, 'post', 1, 'Astuces et Conseils', 'Astuces et Conseils', '2021-02-12 15:50:24', '2021-02-12 15:50:24');

-- --------------------------------------------------------

--
-- Table structure for table `category_translations`
--

CREATE TABLE `category_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `feature_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category_translations`
--

INSERT INTO `category_translations` (`id`, `category_id`, `locale`, `name`, `feature_title`) VALUES
(20, 23, 'en', 'Tips & Tricks', NULL),
(21, 23, 'fr', 'Astuces et Conseils', NULL),
(24, 25, 'en', 'Golf Tours', NULL),
(28, 22, 'en', 'Circuits et Séjours organisés', 'Circuits et Séjours organisés'),
(29, 22, 'fr', 'Circuits et Séjours organisés', 'Circuits et Séjours organisés'),
(30, 21, 'en', 'Surf', 'Surf'),
(31, 21, 'fr', 'Surf', 'Surf'),
(32, 20, 'en', 'Bivouacs', 'Bivouacs'),
(33, 20, 'fr', 'Bivouacs', 'Bivouacs'),
(34, 13, 'en', 'Tours', 'Golf Tours'),
(35, 13, 'fr', 'Tours', 'Golf Tours'),
(36, 12, 'en', 'Caldera Private Cruises', 'Motorcycle'),
(37, 12, 'fr', 'Caldera Private Cruises', 'Motorcycle'),
(38, 11, 'en', 'Semi Private', 'Trekking'),
(39, 11, 'fr', 'Semi Private', 'Trekking');

-- --------------------------------------------------------

--
-- Table structure for table `category_types`
--

CREATE TABLE `category_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_types`
--

INSERT INTO `category_types` (`id`, `category_id`, `name`, `description`, `slug`, `image`, `icon`, `color`, `created_at`, `updated_at`) VALUES
(1, 12, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-18 15:27:25', '2021-05-18 15:27:25'),
(2, 12, NULL, NULL, NULL, NULL, '', NULL, '2021-05-18 15:28:06', '2021-05-18 15:33:20'),
(3, 12, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-19 08:06:45', '2021-05-19 08:06:45'),
(4, 13, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-19 08:07:45', '2021-05-19 08:07:45'),
(5, 13, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-19 08:07:58', '2021-05-19 08:07:58'),
(6, 13, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-19 08:08:12', '2021-05-19 08:08:12');

-- --------------------------------------------------------

--
-- Table structure for table `category_type_translations`
--

CREATE TABLE `category_type_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_type_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_type_translations`
--

INSERT INTO `category_type_translations` (`id`, `category_type_id`, `locale`, `name`, `description`) VALUES
(7, 1, 'en', 'LOCATION DE MOTOS', NULL),
(8, 1, 'fr', 'LOCATION DE MOTOS', NULL),
(9, 2, 'en', 'VISITES GUIDÉES EN MOTO', NULL),
(10, 2, 'fr', 'VISITES GUIDÉES EN MOTO', NULL),
(11, 3, 'en', 'CIRCUITS EN MOTO AUTONOMES', NULL),
(12, 3, 'fr', 'CIRCUITS EN MOTO AUTONOMES', NULL),
(13, 4, 'en', 'Golf Courses', NULL),
(14, 4, 'fr', 'Golf Courses', NULL),
(15, 5, 'en', NULL, NULL),
(16, 5, 'fr', 'Golf Packages', NULL),
(17, 6, 'en', NULL, NULL),
(18, 6, 'fr', 'Golf Packages', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) UNSIGNED NOT NULL,
  `country_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `best_time_to_visit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `priority` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `country_id`, `name`, `slug`, `intro`, `description`, `thumb`, `banner`, `best_time_to_visit`, `currency`, `language`, `lat`, `lng`, `priority`, `status`, `seo_title`, `seo_description`, `created_at`, `updated_at`) VALUES
(31, 13, '', 'santorini', NULL, NULL, '5fde981328c4c_1608423443.jpg', '5fde981329a9f_1608423443.jpg', 'Anytime', NULL, 'English', 31.6294723, -7.9810845, 0, 1, NULL, NULL, '2020-12-19 22:31:25', '2021-06-22 09:18:06');

-- --------------------------------------------------------

--
-- Table structure for table `city_translations`
--

CREATE TABLE `city_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `intro` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `city_translations`
--

INSERT INTO `city_translations` (`id`, `city_id`, `locale`, `name`, `intro`, `description`) VALUES
(11, 31, 'en', 'Marrakech', NULL, 'Marrakesh is the fourth largest city in the Kingdom of Morocco. It is the capital of the mid-southwestern region of Marrakesh-Safi. It is west of the foothills of the Atlas Mountains.'),
(12, 31, 'fr', 'Santorini', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cooperate_customer_profiles`
--

CREATE TABLE `cooperate_customer_profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_cac_rc_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_contact_person_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_contact_person_phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_contact_person_address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_cover_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `slug`, `priority`, `status`, `description`, `seo_title`, `seo_description`, `seo_cover_image`, `created_at`, `updated_at`) VALUES
(13, 'Greece', 'greece', 0, 1, 'MAD', NULL, NULL, NULL, '2020-12-19 22:28:47', '2021-06-22 09:13:23');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `status`, `title`, `content`, `type`, `created_at`, `updated_at`) VALUES
(1, '1', 'CONDITIONS GÉNÉRALES', '<p>Les pr&eacute;sentes Conditions G&eacute;n&eacute;rales de Vente r&eacute;gissent les ventes de voyages propos&eacute;es, de s&eacute;jours ou de forfaits propos&eacute;es sur le Site RENTACS TOURS, au sens du Code de tourisme Marocain.</p>', 'faq', '2021-04-16 15:17:40', '2021-06-25 09:02:01'),
(2, '1', '1) Inscription', '<p>Toute inscription doit &ecirc;tre accompagn&eacute;e d&rsquo;un versement de 30% du montant total du voyage choisi pour &ecirc;tre confirm&eacute;e ; Le solde doit &ecirc;tre r&eacute;gl&eacute; au plus tard 30 jours avant le d&eacute;part du voyage. Le client n&rsquo;ayant pas vers&eacute; le solde &agrave; la date convenue est consid&eacute;r&eacute; comme ayant annul&eacute; son voyage et encourt de ce fait, les frais d&rsquo;annulation pr&eacute;vus par les pr&eacute;sentes conditions. En cas d&rsquo;inscription tardive, moins de 30 jours avant la date pr&eacute;vue du voyage, le client devra acquitter la totalit&eacute; du montant de ce voyage.</p>\r\n\r\n<p>Pour toute inscription &agrave; moins de 10 jours de la date de d&eacute;part, nous nous r&eacute;servons le droit de facturer au client tous frais suppl&eacute;mentaires pouvant intervenir tels que t&eacute;l&eacute;phone, fax, etc&hellip;</p>', 'privacy', '2021-04-23 14:01:33', '2021-06-25 09:02:10');

-- --------------------------------------------------------

--
-- Table structure for table `good_to_knows`
--

CREATE TABLE `good_to_knows` (
  `id` int(10) UNSIGNED NOT NULL,
  `package_id` int(11) DEFAULT NULL,
  `check_in` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `check_out` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancellation_prepayment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `children_beds` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `internet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pets` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `groups` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_settings`
--

CREATE TABLE `home_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `short_des` text COLLATE utf8mb4_unicode_ci,
  `section_photo_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_photo_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `headscript` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bodyscript` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_settings`
--

INSERT INTO `home_settings` (`id`, `description`, `short_des`, `section_photo_1`, `section_photo_2`, `headscript`, `bodyscript`, `created_at`, `updated_at`) VALUES
(1, '<p>descri fdsq fdsq fdsq</p>', '<h2>&nbsp;</h2>\r\n\r\n<h2>Providing a large fleet of Boats for a perfect and dreamy experience</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Stunning Cruise Paths You Follow</li>\r\n	<li>Premium Boats &amp; Yachts</li>\r\n	<li>Our Professional Approach</li>\r\n	<li>Quality Service Guaranteed</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"assets/img/sign.jpg\"><img alt=\"\" src=\"assets/img/sign.jpg\" style=\"height:44px; width:213px\" /></a></p>\r\n\r\n<p>CEO, Autlines Boat Rentals</p>', '/photos/1/2356456.png', '/photos/1/_gal009.jpg,/photos/1/_gal001.jpg,/photos/1/_gal008.jpg,/photos/1/_gal003.jpg,/photos/1/_gal005.jpg,/photos/1/_gal006.jpg,/photos/1/_gal007.jpg', 'gfds fdsq', 'gfds fdsq', NULL, '2021-06-24 15:48:24');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_bookings`
--

CREATE TABLE `hotel_bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pnr` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel_city_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel_chain_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel_context_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_booking_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate_plan_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guarantee` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adult_guest` int(11) NOT NULL,
  `child_guest` int(11) NOT NULL,
  `check_in_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_out_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `base_amount` bigint(20) NOT NULL,
  `vat` bigint(20) NOT NULL,
  `markup` bigint(20) NOT NULL,
  `markdown` bigint(20) NOT NULL,
  `voucher_id` bigint(20) NOT NULL,
  `voucher_amount` bigint(20) NOT NULL,
  `total_amount` bigint(20) NOT NULL,
  `expiry_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` int(11) NOT NULL DEFAULT '0',
  `reservation_status` int(11) NOT NULL DEFAULT '0',
  `cancellation_status` int(11) NOT NULL DEFAULT '0',
  `pnr_request_response` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_deals`
--

CREATE TABLE `hotel_deals` (
  `id` int(10) UNSIGNED NOT NULL,
  `package_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `star_rating` int(11) NOT NULL,
  `stay_start_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stay_duration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stay_end_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `information` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `native_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_default` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `native_name`, `code`, `is_default`, `is_active`, `created_at`, `updated_at`) VALUES
(7, 'Arabic', 'العربية', 'ar', 0, 0, '2020-04-02 00:20:54', '2020-04-02 00:20:54'),
(30, 'Chinese', '中文 (Zhōngwén), 汉语, 漢語', 'zh', 0, 0, '2020-04-02 00:20:54', '2020-04-02 00:20:54'),
(40, 'English', 'English', 'en', 1, 1, '2020-04-02 00:20:54', '2021-01-06 14:37:39'),
(47, 'French', 'français, langue française', 'fr', 0, 1, '2020-04-02 00:20:54', '2021-01-06 14:37:39'),
(51, 'German', 'Deutsch', 'de', 0, 0, '2020-04-02 00:20:54', '2020-04-02 00:20:54'),
(52, 'Greek, Modern', 'Ελληνικά', 'el', 0, 0, '2020-04-02 00:20:54', '2020-04-02 00:20:54'),
(72, 'Japanese', '日本語 (にほんご／にっぽんご)', 'ja', 0, 0, '2020-04-02 00:20:54', '2020-04-02 00:20:54'),
(85, 'Korean', '한국어 (韓國語), 조선말 (朝鮮語)', 'ko', 0, 0, '2020-04-02 00:20:54', '2020-04-02 00:20:54'),
(126, 'Polish', 'polski', 'pl', 0, 0, '2020-04-02 00:20:54', '2020-04-02 00:20:54'),
(127, 'Pashto, Pushto', 'پښتو', 'ps', 0, 0, '2020-04-02 00:20:54', '2020-04-02 00:20:54'),
(128, 'Portuguese', 'Português', 'pt', 0, 0, '2020-04-02 00:20:54', '2020-04-02 00:20:54'),
(133, 'Russian', 'русский язык', 'ru', 0, 0, '2020-04-02 00:20:54', '2020-04-02 00:20:54'),
(163, 'Turkish', 'Türkçe', 'tr', 0, 0, '2020-04-02 00:20:54', '2020-04-02 00:20:54'),
(181, 'Yoruba', 'Yorùbá', 'yo', 0, 0, '2020-04-02 00:20:54', '2020-04-02 00:20:54'),
(182, 'Zhuang, Chuang', 'Saɯ cueŋƅ, Saw cuengh', 'za', 0, 0, '2020-04-02 00:20:54', '2020-04-02 00:20:54');

-- --------------------------------------------------------

--
-- Table structure for table `ltm_translations`
--

CREATE TABLE `ltm_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `locale` varchar(191) COLLATE utf8mb4_bin NOT NULL,
  `group` varchar(191) COLLATE utf8mb4_bin NOT NULL,
  `key` text COLLATE utf8mb4_bin NOT NULL,
  `value` text COLLATE utf8mb4_bin,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `ltm_translations`
--

INSERT INTO `ltm_translations` (`id`, `status`, `locale`, `group`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 0, 'en', 'auth', 'failed', 'These credentials do not match our records.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(2, 0, 'en', 'auth', 'throttle', 'Too many login attempts. Please try again in :seconds seconds.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(3, 0, 'en', 'pagination', 'previous', '&laquo; Previous', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(4, 0, 'en', 'pagination', 'next', 'Next &raquo;', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(5, 0, 'en', 'passwords', 'password', 'Passwords must be at least six characters and match the confirmation.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(6, 0, 'en', 'passwords', 'reset', 'Your password has been reset!', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(7, 0, 'en', 'passwords', 'sent', 'We have e-mailed your password reset link!', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(8, 0, 'en', 'passwords', 'token', 'This password reset token is invalid.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(9, 0, 'en', 'passwords', 'user', 'We can\'t find a user with that e-mail address.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(10, 0, 'en', 'validation', 'accepted', 'The :attribute must be accepted.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(11, 0, 'en', 'validation', 'active_url', 'The :attribute is not a valid URL.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(12, 0, 'en', 'validation', 'after', 'The :attribute must be a date after :date.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(13, 0, 'en', 'validation', 'after_or_equal', 'The :attribute must be a date after or equal to :date.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(14, 0, 'en', 'validation', 'alpha', 'The :attribute may only contain letters.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(15, 0, 'en', 'validation', 'alpha_dash', 'The :attribute may only contain letters, numbers, and dashes.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(16, 0, 'en', 'validation', 'alpha_num', 'The :attribute may only contain letters and numbers.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(17, 0, 'en', 'validation', 'array', 'The :attribute must be an array.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(18, 0, 'en', 'validation', 'before', 'The :attribute must be a date before :date.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(19, 0, 'en', 'validation', 'before_or_equal', 'The :attribute must be a date before or equal to :date.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(20, 0, 'en', 'validation', 'between.numeric', 'The :attribute must be between :min and :max.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(21, 0, 'en', 'validation', 'between.file', 'The :attribute must be between :min and :max kilobytes.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(22, 0, 'en', 'validation', 'between.string', 'The :attribute must be between :min and :max characters.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(23, 0, 'en', 'validation', 'between.array', 'The :attribute must have between :min and :max items.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(24, 0, 'en', 'validation', 'boolean', 'The :attribute field must be true or false.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(25, 0, 'en', 'validation', 'confirmed', 'The :attribute confirmation does not match.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(26, 0, 'en', 'validation', 'date', 'The :attribute is not a valid date.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(27, 0, 'en', 'validation', 'date_format', 'The :attribute does not match the format :format.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(28, 0, 'en', 'validation', 'different', 'The :attribute and :other must be different.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(29, 0, 'en', 'validation', 'digits', 'The :attribute must be :digits digits.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(30, 0, 'en', 'validation', 'digits_between', 'The :attribute must be between :min and :max digits.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(31, 0, 'en', 'validation', 'dimensions', 'The :attribute has invalid image dimensions.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(32, 0, 'en', 'validation', 'distinct', 'The :attribute field has a duplicate value.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(33, 0, 'en', 'validation', 'email', 'The :attribute must be a valid email address.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(34, 0, 'en', 'validation', 'exists', 'The selected :attribute is invalid.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(35, 0, 'en', 'validation', 'file', 'The :attribute must be a file.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(36, 0, 'en', 'validation', 'filled', 'The :attribute field must have a value.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(37, 0, 'en', 'validation', 'image', 'The :attribute must be an image.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(38, 0, 'en', 'validation', 'in', 'The selected :attribute is invalid.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(39, 0, 'en', 'validation', 'in_array', 'The :attribute field does not exist in :other.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(40, 0, 'en', 'validation', 'integer', 'The :attribute must be an integer.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(41, 0, 'en', 'validation', 'ip', 'The :attribute must be a valid IP address.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(42, 0, 'en', 'validation', 'ipv4', 'The :attribute must be a valid IPv4 address.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(43, 0, 'en', 'validation', 'ipv6', 'The :attribute must be a valid IPv6 address.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(44, 0, 'en', 'validation', 'json', 'The :attribute must be a valid JSON string.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(45, 0, 'en', 'validation', 'max.numeric', 'The :attribute may not be greater than :max.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(46, 0, 'en', 'validation', 'max.file', 'The :attribute may not be greater than :max kilobytes.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(47, 0, 'en', 'validation', 'max.string', 'The :attribute may not be greater than :max characters.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(48, 0, 'en', 'validation', 'max.array', 'The :attribute may not have more than :max items.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(49, 0, 'en', 'validation', 'mimes', 'The :attribute must be a file of type: :values.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(50, 0, 'en', 'validation', 'mimetypes', 'The :attribute must be a file of type: :values.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(51, 0, 'en', 'validation', 'min.numeric', 'The :attribute must be at least :min.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(52, 0, 'en', 'validation', 'min.file', 'The :attribute must be at least :min kilobytes.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(53, 0, 'en', 'validation', 'min.string', 'The :attribute must be at least :min characters.', '2021-01-28 14:04:43', '2021-01-29 08:50:47'),
(54, 0, 'en', 'validation', 'min.array', 'The :attribute must have at least :min items.', '2021-01-28 14:04:44', '2021-01-29 08:50:47'),
(55, 0, 'en', 'validation', 'not_in', 'The selected :attribute is invalid.', '2021-01-28 14:04:44', '2021-01-29 08:50:47'),
(56, 0, 'en', 'validation', 'not_regex', 'The :attribute format is invalid.', '2021-01-28 14:04:44', '2021-01-29 08:50:47'),
(57, 0, 'en', 'validation', 'numeric', 'The :attribute must be a number.', '2021-01-28 14:04:44', '2021-01-29 08:50:47'),
(58, 0, 'en', 'validation', 'present', 'The :attribute field must be present.', '2021-01-28 14:04:44', '2021-01-29 08:50:47'),
(59, 0, 'en', 'validation', 'regex', 'The :attribute format is invalid.', '2021-01-28 14:04:44', '2021-01-29 08:50:47'),
(60, 0, 'en', 'validation', 'required', 'The :attribute field is required.', '2021-01-28 14:04:44', '2021-01-29 08:50:47'),
(61, 0, 'en', 'validation', 'required_if', 'The :attribute field is required when :other is :value.', '2021-01-28 14:04:44', '2021-01-29 08:50:47'),
(62, 0, 'en', 'validation', 'required_unless', 'The :attribute field is required unless :other is in :values.', '2021-01-28 14:04:44', '2021-01-29 08:50:47'),
(63, 0, 'en', 'validation', 'required_with', 'The :attribute field is required when :values is present.', '2021-01-28 14:04:44', '2021-01-29 08:50:47'),
(64, 0, 'en', 'validation', 'required_with_all', 'The :attribute field is required when :values is present.', '2021-01-28 14:04:44', '2021-01-29 08:50:47'),
(65, 0, 'en', 'validation', 'required_without', 'The :attribute field is required when :values is not present.', '2021-01-28 14:04:44', '2021-01-29 08:50:47'),
(66, 0, 'en', 'validation', 'required_without_all', 'The :attribute field is required when none of :values are present.', '2021-01-28 14:04:44', '2021-01-29 08:50:47'),
(67, 0, 'en', 'validation', 'same', 'The :attribute and :other must match.', '2021-01-28 14:04:44', '2021-01-29 08:50:47'),
(68, 0, 'en', 'validation', 'size.numeric', 'The :attribute must be :size.', '2021-01-28 14:04:44', '2021-01-29 08:50:47'),
(69, 0, 'en', 'validation', 'size.file', 'The :attribute must be :size kilobytes.', '2021-01-28 14:04:44', '2021-01-29 08:50:47'),
(70, 0, 'en', 'validation', 'size.string', 'The :attribute must be :size characters.', '2021-01-28 14:04:44', '2021-01-29 08:50:47'),
(71, 0, 'en', 'validation', 'size.array', 'The :attribute must contain :size items.', '2021-01-28 14:04:44', '2021-01-29 08:50:47'),
(72, 0, 'en', 'validation', 'string', 'The :attribute must be a string.', '2021-01-28 14:04:44', '2021-01-29 08:50:47'),
(73, 0, 'en', 'validation', 'timezone', 'The :attribute must be a valid zone.', '2021-01-28 14:04:44', '2021-01-29 08:50:47'),
(74, 0, 'en', 'validation', 'unique', 'The :attribute has already been taken.', '2021-01-28 14:04:44', '2021-01-29 08:50:47'),
(75, 0, 'en', 'validation', 'uploaded', 'The :attribute failed to upload.', '2021-01-28 14:04:44', '2021-01-29 08:50:47'),
(76, 0, 'en', 'validation', 'url', 'The :attribute format is invalid.', '2021-01-28 14:04:44', '2021-01-29 08:50:47'),
(77, 0, 'en', 'validation', 'custom.attribute-name.rule-name', 'custom-message', '2021-01-28 14:04:44', '2021-01-29 08:50:47'),
(78, 0, 'en', '_json', 'Translations', 'TRANSLATIONS', '2021-01-28 14:18:08', '2021-05-19 09:14:06'),
(79, 0, 'en', '_json', 'Settings', 'SETTINGS', '2021-01-28 14:25:15', '2021-05-19 09:14:06'),
(80, 0, 'en', '_json', 'Vats', 'VATS', '2021-01-28 14:25:15', '2021-05-19 09:14:06'),
(81, 0, 'en', '_json', 'Markups', 'MARKUPS', '2021-01-28 14:25:15', '2021-05-19 09:14:06'),
(82, 0, 'en', '_json', 'Markdowns', 'MARKDOWNS', '2021-01-28 14:25:15', '2021-05-19 09:14:06'),
(83, 0, 'en', '_json', 'Banks', 'BANKS', '2021-01-28 14:25:15', '2021-05-19 09:14:06'),
(84, 0, 'en', '_json', 'Users Management', 'USERS MANAGEMENT', '2021-01-28 14:25:15', '2021-05-19 09:14:06'),
(85, 0, 'en', '_json', 'Email Subscribers', 'EMAIL SUBSCRIBERS', '2021-01-28 14:25:15', '2021-05-19 09:14:06'),
(86, 0, 'en', '_json', 'Visa Applications', 'VISA APPLICATIONS', '2021-01-28 14:25:15', '2021-05-19 09:14:06'),
(87, 0, 'en', '_json', 'Wallets Management', 'WALLETS MANAGEMENT', '2021-01-28 14:25:15', '2021-05-19 09:14:06'),
(88, 0, 'en', '_json', 'New Customer', 'NEW CUSTOMER', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(89, 0, 'en', '_json', 'Create Customer', 'CREATE CUSTOMER', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(90, 0, 'en', '_json', 'Name', 'NAME', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(91, 0, 'en', '_json', 'Company Name', 'COMPANY NAME', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(92, 0, 'en', '_json', 'Email', 'EMAIL', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(93, 0, 'en', '_json', 'Phone Number', 'PHONE NUMBER', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(94, 0, 'en', '_json', 'Tax Number', 'TAX NUMBER', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(95, 0, 'en', '_json', 'Address', 'ADDRESS', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(96, 0, 'en', '_json', 'Postal Code', 'POSTAL CODE', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(97, 0, 'en', '_json', 'City', 'CITY', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(98, 0, 'en', '_json', 'Country', 'COUNTRY', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(99, 0, 'en', '_json', 'Save', 'SAVE', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(100, 0, 'en', '_json', 'Back', 'BACK', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(101, 0, 'en', '_json', 'Edit Customer', 'EDIT CUSTOMER', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(102, 0, 'en', '_json', 'Update', 'UPDATE', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(103, 0, 'en', '_json', 'Customers List', 'CUSTOMERS LIST', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(104, 0, 'en', '_json', 'Customers', 'CUSTOMERS', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(105, 0, 'en', '_json', 'Add New Customer', 'ADD NEW CUSTOMER', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(106, 0, 'en', '_json', 'Company name', 'COMPANY NAME', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(107, 0, 'en', '_json', 'Phone', 'PHONE', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(108, 0, 'en', '_json', 'Created at', 'CREATED AT', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(109, 0, 'en', '_json', 'Edit', 'EDIT', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(110, 0, 'en', '_json', 'Delete', 'DELETE', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(111, 0, 'en', '_json', 'New Purchase', 'NEW PURCHASE', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(112, 0, 'en', '_json', 'Reference no', 'REFERENCE NO', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(113, 0, 'en', '_json', 'Supplier', 'SUPPLIER', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(114, 0, 'en', '_json', 'User', 'USER', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(115, 0, 'en', '_json', 'Select user', 'SELECT USER', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(116, 0, 'en', '_json', 'Product', 'PRODUCT', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(117, 0, 'en', '_json', 'Qty', 'QTY', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(118, 0, 'en', '_json', 'Price', 'PRICE', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(119, 0, 'en', '_json', 'Total', 'TOTAL', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(120, 0, 'en', '_json', 'Enter Product Name', 'ENTER PRODUCT NAME', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(121, 0, 'en', '_json', 'Enter Qty', 'ENTER QTY', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(122, 0, 'en', '_json', 'Enter Unit Price', 'ENTER UNIT PRICE', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(123, 0, 'en', '_json', 'Add Row', 'ADD ROW', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(124, 0, 'en', '_json', 'Delete Row', 'DELETE ROW', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(125, 0, 'en', '_json', 'Sub Total', 'SUB TOTAL', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(126, 0, 'en', '_json', 'Tax', 'TAX', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(127, 0, 'en', '_json', 'Tax Amount', 'TAX AMOUNT', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(128, 0, 'en', '_json', 'Grand Total', 'GRAND TOTAL', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(129, 0, 'en', '_json', 'Sale Status', 'SALE STATUS', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(130, 0, 'en', '_json', 'Completed', 'COMPLETED', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(131, 0, 'en', '_json', 'Pending', 'PENDING', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(132, 0, 'en', '_json', 'Payment Status', 'PAYMENT STATUS', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(133, 0, 'en', '_json', 'Due', 'DUE', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(134, 0, 'en', '_json', 'Partial', 'PARTIAL', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(135, 0, 'en', '_json', 'Paid', 'PAID', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(136, 0, 'en', '_json', 'Paid By', 'PAID BY', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(137, 0, 'en', '_json', 'Cash', 'CASH', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(138, 0, 'en', '_json', 'Cheque', 'CHEQUE', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(139, 0, 'en', '_json', 'Deposit', 'DEPOSIT', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(140, 0, 'en', '_json', 'Attach Document', 'ATTACH DOCUMENT', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(141, 0, 'en', '_json', 'Total Amount', 'TOTAL AMOUNT', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(142, 0, 'en', '_json', 'Paying Amount', 'PAYING AMOUNT', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(143, 0, 'en', '_json', 'Change', 'CHANGE', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(144, 0, 'en', '_json', 'Purchase Note', 'PURCHASE NOTE', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(145, 0, 'en', '_json', 'Edit Purchase', 'EDIT PURCHASE', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(146, 0, 'en', '_json', 'Total amount', 'TOTAL AMOUNT', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(147, 0, 'en', '_json', 'Purchases', 'PURCHASES', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(148, 0, 'en', '_json', 'Add New Purchase', 'ADD NEW PURCHASE', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(149, 0, 'en', '_json', 'Status', 'STATUS', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(150, 0, 'en', '_json', 'Grand total', 'GRAND TOTAL', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(151, 0, 'en', '_json', 'Payment status', 'PAYMENT STATUS', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(152, 0, 'en', '_json', 'Create Sale', 'CREATE SALE', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(153, 0, 'en', '_json', 'Customer', 'CUSTOMER', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(154, 0, 'en', '_json', 'Select Customer', 'SELECT CUSTOMER', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(155, 0, 'en', '_json', 'Select Supplier', 'SELECT SUPPLIER', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(156, 0, 'en', '_json', 'Recieved Amount', 'RECIEVED AMOUNT', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(157, 0, 'en', '_json', 'Payment Note', 'PAYMENT NOTE', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(158, 0, 'en', '_json', 'Sale Note', 'SALE NOTE', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(159, 0, 'en', '_json', 'Staff Note', 'STAFF NOTE', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(160, 0, 'en', '_json', 'Edit Sale', 'EDIT SALE', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(161, 0, 'en', '_json', 'Sales', 'SALES', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(162, 0, 'en', '_json', 'Add New Sale', 'ADD NEW SALE', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(163, 0, 'en', '_json', 'Booking ID', 'BOOKING ID', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(164, 0, 'en', '_json', 'Booking Type', 'BOOKING TYPE', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(165, 0, 'en', '_json', 'Create Supplier', 'CREATE SUPPLIER', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(166, 0, 'en', '_json', 'Edit Supplier', 'EDIT SUPPLIER', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(167, 0, 'en', '_json', 'Suppliers', 'SUPPLIERS', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(168, 0, 'en', '_json', 'Add New Supplier', 'ADD NEW SUPPLIER', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(169, 0, 'en', '_json', 'Supplier Name', 'SUPPLIER NAME', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(170, 0, 'en', '_json', 'Supplier Company', 'SUPPLIER COMPANY', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(171, 0, 'en', '_json', 'Language', 'LANGUAGE', '2021-01-29 10:43:26', '2021-05-19 09:14:06'),
(172, 0, 'en', '_json', 'Create New Purchase', 'CREATE NEW PURCHASE', '2021-01-29 15:41:41', '2021-05-19 09:14:06'),
(173, 0, 'en', '_json', 'Create New Sale', 'CREATE NEW SALE', '2021-01-29 15:41:41', '2021-05-19 09:14:06'),
(174, 0, 'en', '_json', 'Create User', 'CREATE USER', '2021-01-29 15:41:41', '2021-05-19 09:14:06'),
(175, 0, 'en', '_json', 'Close', 'CLOSE', '2021-01-29 15:41:41', '2021-05-19 09:14:06'),
(176, 0, 'en', '_json', 'Create New Supplier', 'CREATE NEW SUPPLIER', '2021-01-29 15:41:41', '2021-05-19 09:14:06'),
(177, 0, 'en', '_json', 'Action', 'ACTION', '2021-01-29 15:41:41', '2021-05-19 09:14:06'),
(178, 0, 'en', '_json', 'Travel Packages', 'TRAVEL PACKAGES', '2021-01-29 15:41:41', '2021-05-19 09:14:06'),
(179, 0, 'en', '_json', 'Continue(Save Package)', 'CONTINUE(SAVE PACKAGE)', '2021-01-29 15:41:41', '2021-05-19 09:14:06'),
(180, 0, 'en', '_json', 'Attraction', 'ATTRACTION', '2021-01-29 15:41:41', '2021-05-19 09:14:06'),
(181, 0, 'en', '_json', 'Attraction Name', 'ATTRACTION NAME', '2021-01-29 15:41:41', '2021-05-19 09:14:06'),
(182, 0, 'en', '_json', 'Attraction City', 'ATTRACTION CITY', '2021-01-29 15:41:41', '2021-05-19 09:14:06'),
(183, 0, 'en', '_json', 'Attraction Date', 'ATTRACTION DATE', '2021-01-29 15:41:41', '2021-05-19 09:14:06'),
(184, 0, 'en', '_json', 'Location Description', 'LOCATION DESCRIPTION', '2021-01-29 15:41:41', '2021-05-19 09:14:06'),
(185, 0, 'en', '_json', 'Attraction Additional Information', 'ATTRACTION ADDITIONAL INFORMATION', '2021-01-29 15:41:41', '2021-05-19 09:14:06'),
(186, 0, 'en', '_json', 'Sight Seeings', 'SIGHT SEEINGS', '2021-01-29 15:41:41', '2021-05-19 09:14:06'),
(187, 0, 'en', '_json', 'Add More Sight Seeing', 'ADD MORE SIGHT SEEING', '2021-01-29 15:41:41', '2021-05-19 09:14:06'),
(188, 0, 'en', '_json', 'Sight Seeing Title', 'SIGHT SEEING TITLE', '2021-01-29 15:41:41', '2021-05-19 09:14:06'),
(189, 0, 'en', '_json', 'Sight Seeing Description', 'SIGHT SEEING DESCRIPTION', '2021-01-29 15:41:41', '2021-05-19 09:14:06'),
(190, 0, 'en', '_json', 'Continue (Save Attraction)', 'CONTINUE (SAVE ATTRACTION)', '2021-01-29 15:41:41', '2021-05-19 09:14:06'),
(191, 0, 'en', '_json', 'Attraction Gallery', 'ATTRACTION GALLERY', '2021-01-29 15:41:41', '2021-05-19 09:14:06'),
(192, 0, 'en', '_json', 'Drag and Drop or Click On Box to Select Multiple Images', 'DRAG AND DROP OR CLICK ON BOX TO SELECT MULTIPLE IMAGES', '2021-01-29 15:41:41', '2021-05-19 09:14:06'),
(193, 0, 'en', '_json', 'Continue', 'CONTINUE', '2021-01-29 15:41:41', '2021-05-19 09:14:06'),
(194, 0, 'en', '_json', 'Create New Package', 'CREATE NEW PACKAGE', '2021-01-29 15:41:41', '2021-05-19 09:14:06'),
(195, 0, 'en', '_json', 'Package type', 'PACKAGE TYPE', '2021-01-29 15:41:42', '2021-05-19 09:14:06'),
(196, 0, 'en', '_json', 'Package category', 'PACKAGE CATEGORY', '2021-01-29 15:41:42', '2021-05-19 09:14:06'),
(197, 0, 'en', '_json', 'Package name', 'PACKAGE NAME', '2021-01-29 15:41:42', '2021-05-19 09:14:06'),
(198, 0, 'en', '_json', 'Phone number', 'PHONE NUMBER', '2021-01-29 15:41:42', '2021-05-19 09:14:06'),
(199, 0, 'en', '_json', 'Adult price', 'ADULT PRICE', '2021-01-29 15:41:42', '2021-05-19 09:14:06'),
(200, 0, 'en', '_json', 'Children price', 'CHILDREN PRICE', '2021-01-29 15:41:42', '2021-05-19 09:14:06'),
(201, 0, 'en', '_json', 'Infants price', 'INFANTS PRICE', '2021-01-29 15:41:42', '2021-05-19 09:14:06'),
(202, 0, 'en', '_json', 'Flight', 'FLIGHT', '2021-01-29 15:41:42', '2021-05-19 09:14:06'),
(203, 0, 'en', '_json', 'Hotel', 'HOTEL', '2021-01-29 15:41:42', '2021-05-19 09:14:06'),
(204, 0, 'en', '_json', 'Deactivated', 'DEACTIVATED', '2021-01-29 15:41:42', '2021-05-19 09:14:06'),
(205, 0, 'en', '_json', 'Activated', 'ACTIVATED', '2021-01-29 15:41:42', '2021-05-19 09:14:06'),
(206, 0, 'en', '_json', 'Add sight seeing', 'ADD SIGHT SEEING', '2021-01-29 15:41:42', '2021-05-19 09:14:06'),
(207, 0, 'en', '_json', 'Confirmation', 'CONFIRMATION', '2021-01-29 15:41:42', '2021-05-19 09:14:06'),
(208, 0, 'en', '_json', 'Flight Information', 'FLIGHT INFORMATION', '2021-01-29 15:41:42', '2021-05-19 09:14:06'),
(209, 0, 'en', '_json', 'Are you sure', 'ARE YOU SURE', '2021-01-29 15:41:42', '2021-05-19 09:14:06'),
(210, 0, 'en', '_json', 'Booking Confirmation', 'BOOKING CONFIRMATION', '2021-01-29 15:41:42', '2021-05-19 09:14:06'),
(211, 0, 'en', '_json', 'Inclusion', 'INCLUSION', '2021-01-29 15:41:42', '2021-05-19 09:14:06'),
(212, 0, 'en', '_json', 'Exclusion', 'EXCLUSION', '2021-01-29 15:41:42', '2021-05-19 09:14:06'),
(213, 0, 'en', '_json', 'KNOW MORE', 'KNOW MORE', '2021-01-29 15:41:42', '2021-05-19 09:14:06'),
(214, 0, 'en', '_json', 'LAST MINUTE DEALS', 'LAST MINUTE DEALS', '2021-01-29 15:41:42', '2021-05-19 09:14:06'),
(215, 0, 'en', '_json', 'SAVE MORE', 'SAVE MORE', '2021-01-29 15:41:42', '2021-05-19 09:14:06'),
(216, 0, 'en', '_json', 'Starting From', 'STARTING FROM', '2021-01-29 15:41:42', '2021-05-19 09:14:06'),
(217, 0, 'en', '_json', 'VIEW DETAIL', 'VIEW DETAIL', '2021-01-29 15:41:42', '2021-05-19 09:14:06'),
(218, 0, 'en', '_json', 'Home Settings', 'HOME SETTINGS', '2021-01-29 15:41:42', '2021-05-19 09:14:06'),
(219, 0, 'en', '_json', 'Login', 'LOGIN', '2021-01-30 08:59:38', '2021-05-19 09:14:06'),
(220, 0, 'en', '_json', 'Oh snap!', 'OH SNAP!', '2021-01-30 08:59:38', '2021-05-19 09:14:06'),
(221, 0, 'en', '_json', 'Login with', 'LOGIN WITH', '2021-01-30 08:59:38', '2021-05-19 09:14:06'),
(222, 0, 'en', '_json', 'Your Email', 'YOUR EMAIL', '2021-01-30 08:59:38', '2021-05-19 09:14:06'),
(223, 0, 'en', '_json', 'Enter Password', 'ENTER PASSWORD', '2021-01-30 08:59:38', '2021-05-19 09:14:06'),
(224, 0, 'en', '_json', 'Remember Me', 'REMEMBER ME', '2021-01-30 08:59:38', '2021-05-19 09:14:06'),
(225, 0, 'en', '_json', 'Forgot Password?', 'FORGOT PASSWORD?', '2021-01-30 08:59:38', '2021-05-19 09:14:06'),
(226, 0, 'en', '_json', 'Recover password', 'RECOVER PASSWORD', '2021-01-30 08:59:38', '2021-05-19 09:14:06'),
(227, 0, 'en', '_json', 'New to', 'NEW TO', '2021-01-30 08:59:39', '2021-05-19 09:14:06'),
(228, 0, 'en', '_json', 'Sign Up', 'SIGN UP', '2021-01-30 08:59:39', '2021-05-19 09:14:06'),
(229, 0, 'en', '_json', 'Recover Password', 'RECOVER PASSWORD', '2021-01-30 08:59:39', '2021-05-19 09:14:06'),
(230, 0, 'en', '_json', 'Great !!!', 'GREAT !!!', '2021-01-30 08:59:39', '2021-05-19 09:14:06'),
(231, 0, 'en', '_json', 'We will send you a link to reset password.', 'WE WILL SEND YOU A LINK TO RESET PASSWORD.', '2021-01-30 08:59:39', '2021-05-19 09:14:06'),
(232, 0, 'en', '_json', 'Your Email Address', 'YOUR EMAIL ADDRESS', '2021-01-30 08:59:39', '2021-05-19 09:14:06'),
(233, 0, 'en', '_json', 'Create Account', 'CREATE ACCOUNT', '2021-01-30 08:59:39', '2021-05-19 09:14:06'),
(234, 0, 'en', '_json', 'Reset your password now', 'RESET YOUR PASSWORD NOW', '2021-01-30 08:59:39', '2021-05-19 09:14:06'),
(235, 0, 'en', '_json', 'Your password', 'YOUR PASSWORD', '2021-01-30 08:59:39', '2021-05-19 09:14:06'),
(236, 0, 'en', '_json', 'Confirm Password', 'CONFIRM PASSWORD', '2021-01-30 08:59:39', '2021-05-19 09:14:06'),
(237, 0, 'en', '_json', 'I Agree', 'I AGREE', '2021-01-30 08:59:39', '2021-05-19 09:14:06'),
(238, 0, 'en', '_json', 'By clicking Register, you agree to the', 'By clicking Register, you agree to the', '2021-01-30 08:59:39', '2021-05-19 09:14:06'),
(239, 0, 'en', '_json', 'Terms and Conditions', 'Terms and Conditions', '2021-01-30 08:59:39', '2021-05-19 09:14:06'),
(240, 0, 'en', '_json', 'set out by this site, including our Cookie Use.', 'set out by this site, including our Cookie Use.', '2021-01-30 08:59:39', '2021-05-19 09:14:06'),
(241, 0, 'en', '_json', 'Register', 'REGISTER', '2021-01-30 08:59:39', '2021-05-19 09:14:06'),
(242, 0, 'en', '_json', 'Dashboard', 'DASHBOARD', '2021-01-30 08:59:39', '2021-05-19 09:14:06'),
(243, 0, 'en', '_json', 'Edit Profile', 'EDIT PROFILE', '2021-01-30 08:59:39', '2021-05-19 09:14:06'),
(244, 0, 'en', '_json', 'Logout', 'LOGOUT', '2021-01-30 08:59:39', '2021-05-19 09:14:06'),
(245, 0, 'en', '_json', 'Book Flight', 'BOOK FLIGHT', '2021-01-30 08:59:39', '2021-05-19 09:14:06'),
(246, 0, 'en', '_json', 'Book Hotel', 'BOOK HOTEL', '2021-01-30 08:59:39', '2021-05-19 09:14:06'),
(247, 0, 'en', '_json', 'Navigation', 'NAVIGATION', '2021-01-30 08:59:39', '2021-05-19 09:14:06'),
(248, 0, 'en', '_json', 'Create New', 'CREATE NEW', '2021-01-30 08:59:39', '2021-05-19 09:14:06'),
(249, 0, 'en', '_json', 'Commercial', 'COMMERCIAL', '2021-01-30 08:59:39', '2021-05-19 09:14:06'),
(250, 0, 'en', '_json', 'Sale List', 'SALE LIST', '2021-01-30 08:59:39', '2021-05-19 09:14:06'),
(251, 0, 'en', '_json', 'Purchase', 'PURCHASE', '2021-01-30 08:59:39', '2021-05-19 09:14:06'),
(252, 0, 'en', '_json', 'Purchase List', 'PURCHASE LIST', '2021-01-30 08:59:39', '2021-05-19 09:14:06'),
(253, 0, 'en', '_json', 'Suppliers List', 'SUPPLIERS LIST', '2021-01-30 08:59:39', '2021-05-19 09:14:06'),
(254, 0, 'en', '_json', 'Manage Bookings', 'MANAGE BOOKINGS', '2021-01-30 08:59:39', '2021-05-19 09:14:06'),
(255, 0, 'en', '_json', 'Manage Packages', 'MANAGE PACKAGES', '2021-01-30 08:59:39', '2021-05-19 09:14:06'),
(256, 0, 'en', '_json', 'Packages List', 'PACKAGES LIST', '2021-01-30 08:59:39', '2021-05-19 09:14:06'),
(257, 0, 'en', '_json', 'Manage Categories', 'MANAGE CATEGORIES', '2021-01-30 08:59:39', '2021-05-19 09:14:06'),
(258, 0, 'en', '_json', 'My Wallet', 'MY WALLET', '2021-01-30 08:59:39', '2021-05-19 09:14:06'),
(259, 0, 'en', '_json', 'Manage Profile', 'MANAGE PROFILE', '2021-01-30 08:59:39', '2021-05-19 09:14:06'),
(260, 0, 'en', '_json', 'Log Out', 'LOG OUT', '2021-01-30 08:59:39', '2021-05-19 09:14:06'),
(261, 0, 'en', '_json', 'Sign in', 'SIGN IN', '2021-01-31 10:34:57', '2021-05-19 09:14:06'),
(262, 0, 'en', '_json', 'Who we are', 'WHO WE ARE', '2021-01-31 10:34:57', '2021-05-19 09:14:06'),
(263, 0, 'en', '_json', 'Read more', 'READ MORE', '2021-01-31 10:34:57', '2021-05-19 09:14:06'),
(264, 0, 'en', '_json', 'Discover amazing things to do everywhere you go.', 'DISCOVER AMAZING THINGS TO DO EVERYWHERE YOU GO.', '2021-01-31 10:34:57', '2021-05-19 09:14:06'),
(265, 0, 'en', '_json', 'Company', 'COMPANY', '2021-01-31 10:34:57', '2021-05-19 09:14:06'),
(266, 0, 'en', '_json', 'About Us', 'ABOUT US', '2021-01-31 10:34:57', '2021-05-19 09:14:06'),
(267, 0, 'en', '_json', 'Blog', 'BLOG', '2021-01-31 10:34:57', '2021-05-19 09:14:06'),
(268, 0, 'en', '_json', 'Contact', 'CONTACT', '2021-01-31 10:34:57', '2021-05-19 09:14:06'),
(269, 0, 'en', '_json', 'Contact Us', 'CONTACT US', '2021-01-31 10:34:57', '2021-05-19 09:14:06'),
(270, 0, 'en', '_json', 'Adresse', 'ADRESSE', '2021-01-31 10:34:57', '2021-05-19 09:14:06'),
(271, 0, 'en', '_json', 'Enter your email', 'ENTER YOUR EMAIL', '2021-01-31 10:34:57', '2021-05-19 09:14:06'),
(272, 0, 'en', '_json', 'Sign-up to receive regular updates from us.', 'SIGN-UP TO RECEIVE REGULAR UPDATES FROM US.', '2021-01-31 10:34:57', '2021-05-19 09:14:06'),
(273, 0, 'en', '_json', 'Rentacs Tours', 'RENTACS TOURS', '2021-01-31 10:34:57', '2021-05-19 09:14:06'),
(274, 0, 'en', '_json', 'All rights reserved.', 'ALL RIGHTS RESERVED.', '2021-01-31 10:34:57', '2021-05-19 09:14:06'),
(275, 0, 'en', '_json', 'Profile', 'PROFILE', '2021-01-31 10:34:57', '2021-05-19 09:14:06'),
(276, 0, 'en', '_json', 'Wishlist', 'WISHLIST', '2021-01-31 10:34:57', '2021-05-19 09:14:06'),
(277, 0, 'en', '_json', 'Flights', 'FLIGHTS', '2021-01-31 10:34:57', '2021-05-19 09:14:06'),
(278, 0, 'en', '_json', 'Hotels', 'HOTELS', '2021-01-31 10:34:57', '2021-05-19 09:14:06'),
(279, 0, 'en', '_json', 'Hot Deals', 'HOT DEALS', '2021-01-31 10:34:57', '2021-05-19 09:14:06'),
(280, 0, 'en', '_json', 'Golf tours', 'GOLF TOURS', '2021-01-31 10:34:57', '2021-05-19 09:14:06'),
(281, 0, 'en', '_json', 'Motorcycle', 'MOTORCYCLE', '2021-01-31 10:34:57', '2021-05-19 09:14:06'),
(282, 0, 'en', '_json', 'Surf', 'SURF', '2021-01-31 10:34:57', '2021-05-19 09:14:06'),
(283, 0, 'en', '_json', 'Trekking', 'TREKKING', '2021-01-31 10:34:57', '2021-05-19 09:14:06'),
(284, 0, 'en', '_json', 'Bivouacs', 'BIVOUACS', '2021-01-31 10:34:57', '2021-05-19 09:14:06'),
(285, 0, 'en', '_json', 'Best offers', 'BEST OFFERS', '2021-01-31 10:34:57', '2021-05-19 09:14:06'),
(286, 0, 'fr', '_json', 'Login', 'S\'identifier', '2021-02-01 09:24:16', '2021-05-19 09:14:06'),
(287, 0, 'fr', '_json', 'Oh snap!', 'Oh snap!', '2021-02-01 09:24:16', '2021-05-19 09:14:06'),
(288, 0, 'fr', '_json', 'Login with', 'Connectez-vous avec', '2021-02-01 09:24:16', '2021-05-19 09:14:06'),
(289, 0, 'fr', '_json', 'Your Email', 'Votre e-mail', '2021-02-01 09:24:16', '2021-05-19 09:14:06'),
(290, 0, 'fr', '_json', 'Enter Password', 'Entrer le mot de passe', '2021-02-01 09:24:16', '2021-05-19 09:14:06'),
(291, 0, 'fr', '_json', 'Remember Me', 'Souviens-toi de moi', '2021-02-01 09:24:16', '2021-05-19 09:14:06'),
(292, 0, 'fr', '_json', 'Forgot Password?', 'Mot de passe oublié?', '2021-02-01 09:24:16', '2021-05-19 09:14:06'),
(293, 0, 'fr', '_json', 'Recover password', 'Récupérer mot de passe', '2021-02-01 09:24:16', '2021-05-19 09:14:06'),
(294, 0, 'fr', '_json', 'New to', 'Nouveau sur', '2021-02-01 09:24:16', '2021-05-19 09:14:06'),
(295, 0, 'fr', '_json', 'Sign Up', 'S\'inscrire', '2021-02-01 09:24:16', '2021-05-19 09:14:06'),
(296, 0, 'fr', '_json', 'Recover Password', 'Récupérer mot de passe', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(297, 0, 'fr', '_json', 'Great !!!', 'Génial !!!', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(298, 0, 'fr', '_json', 'We will send you a link to reset password.', 'Nous vous enverrons un lien pour réinitialiser le mot de passe.', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(299, 0, 'fr', '_json', 'Your Email Address', 'Votre adresse email', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(300, 0, 'fr', '_json', 'Create Account', 'Créer un compte', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(301, 0, 'fr', '_json', 'Reset your password now', 'Réinitialisez votre mot de passe maintenant', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(302, 0, 'fr', '_json', 'Your password', 'Votre mot de passe', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(303, 0, 'fr', '_json', 'Confirm Password', 'Confirmez le mot de passe', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(304, 0, 'fr', '_json', 'I Agree', 'Je suis d\'accord', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(305, 0, 'fr', '_json', 'By clicking Register, you agree to the', 'En cliquant sur S\'inscrire, vous acceptez les', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(306, 0, 'fr', '_json', 'Terms and Conditions', 'CONDITIONS GÉNÉRALES DE VENTE', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(307, 0, 'fr', '_json', 'set out by this site, including our Cookie Use.', 'défini par ce site, y compris notre utilisation des cookies.', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(308, 0, 'fr', '_json', 'Register', 'S\'inscrire', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(309, 0, 'fr', '_json', 'Dashboard', 'Tableau de bord', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(310, 0, 'fr', '_json', 'No places', 'Aucune destination', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(311, 0, 'fr', '_json', 'Category', 'Catégorie', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(312, 0, 'fr', '_json', 'Places', 'Destinations', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(313, 0, 'fr', '_json', 'Back to list', 'Retour à la liste', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(314, 0, 'fr', '_json', 'Show all', 'Afficher tout', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(315, 0, 'fr', '_json', 'Introducing', 'Présentation', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(316, 0, 'fr', '_json', 'Currency', 'Devise', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(317, 0, 'fr', '_json', 'Languages', 'LANGUES', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(318, 0, 'fr', '_json', 'Best time to visit', 'MEILLEUR MOMENT POUR VISITER', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(319, 0, 'fr', '_json', 'Maps view', 'Affichage des cartes', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(320, 0, 'fr', '_json', 'See all', 'Voir tout', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(321, 0, 'fr', '_json', 'results', 'résultats', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(322, 0, 'fr', '_json', 'Clear All', 'Tout effacer', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(323, 0, 'fr', '_json', 'Filter', 'Filtre', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(324, 0, 'fr', '_json', 'Sort By', 'Trier par', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(325, 0, 'fr', '_json', 'Newest', 'Le plus récent', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(326, 0, 'fr', '_json', 'Average rating', 'Note moyenne', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(327, 0, 'fr', '_json', 'Price: Low to high', 'Prix: Plus bas au plus haut', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(328, 0, 'fr', '_json', 'Price: High to low', 'Prix: plus haut au plus bas', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(329, 0, 'fr', '_json', 'Price Filter', 'Filtre de prix', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(330, 0, 'fr', '_json', 'Free', 'Gratuit', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(331, 0, 'fr', '_json', 'Low: $', 'Faible: $', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(332, 0, 'fr', '_json', 'Medium: $$', 'Moyen: $$', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(333, 0, 'fr', '_json', 'High: $$$', 'Élevé: $$$', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(334, 0, 'fr', '_json', 'Types', 'Les types', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(335, 0, 'fr', '_json', 'Amenities', 'Services', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(336, 0, 'fr', '_json', 'Explorer Other Cities', 'Explorer d\'autres villes', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(337, 0, 'fr', '_json', 'places', 'Destinations', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(338, 0, 'fr', '_json', 'No cities', 'Pas de villes', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(339, 0, 'fr', '_json', 'reviews', 'Avis', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(340, 0, 'fr', '_json', 'About Us', 'À propos', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(341, 0, 'fr', '_json', 'Our Offices', 'Horaires d\'ouvertures', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(342, 0, 'fr', '_json', 'Get Direction', 'Obtenir la direction', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(343, 0, 'fr', '_json', 'Get in touch with us', 'Prenez contact avec nous', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(344, 0, 'fr', '_json', 'First name', 'Nom', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(345, 0, 'fr', '_json', 'Last name', 'Nom', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(346, 0, 'fr', '_json', 'Email', 'Email', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(347, 0, 'fr', '_json', 'Phone number', 'Numéro de téléphone', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(348, 0, 'fr', '_json', 'Message', 'Message', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(349, 0, 'fr', '_json', 'Send Message', 'Envoyer le message', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(350, 0, 'fr', '_json', 'Contact Us', 'Nous contacter', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(351, 0, 'fr', '_json', 'We want to hear from you.', 'Nous voulons de vos nouvelles.', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(352, 0, 'fr', '_json', 'Adresse', 'Adresse', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(353, 0, 'fr', '_json', 'Genaral', 'Générale', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(354, 0, 'fr', '_json', 'Location', 'Emplacement', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(355, 0, 'fr', '_json', 'Contact info', 'Informations de contact', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(356, 0, 'fr', '_json', 'Social network', 'Réseau social', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(357, 0, 'fr', '_json', 'Open hours', 'Heures d\'ouverture', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(358, 0, 'fr', '_json', 'Media', 'Médias', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(359, 0, 'fr', '_json', 'Edit my place', 'Modifier ma place', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(360, 0, 'fr', '_json', 'Add new place', 'Ajouter une nouvelle destination', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(361, 0, 'fr', '_json', 'Place Name', 'Nom du lieu', '2021-02-01 09:24:17', '2021-05-19 09:14:06'),
(362, 0, 'fr', '_json', 'What the name of place', 'quel est le nom du lieu', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(363, 0, 'fr', '_json', 'Price Range', 'Intervalle des prix', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(364, 0, 'fr', '_json', 'Description', 'Description', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(365, 0, 'fr', '_json', 'Select Category', 'Choisir une catégorie', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(366, 0, 'fr', '_json', 'Place Type', 'Type de destination', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(367, 0, 'fr', '_json', 'Select Place Type', 'Sélectionnez le type de destination', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(368, 0, 'fr', '_json', 'Place Address', 'Adresse de la destination', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(369, 0, 'fr', '_json', 'Select country', 'Sélection de Pays', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(370, 0, 'fr', '_json', 'Select city', 'Sélection de ville', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(371, 0, 'fr', '_json', 'Full Address', 'Adresse complète', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(372, 0, 'fr', '_json', 'Place Location at Google Map', 'Placer la position sur Google Map', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(373, 0, 'fr', '_json', 'Your email address', 'Votre adresse email', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(374, 0, 'fr', '_json', 'Your phone number', 'Votre numéro de téléphone', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(375, 0, 'fr', '_json', 'Website', 'Site Internet', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(376, 0, 'fr', '_json', 'Your website url', 'L\'adresse URL de votre site', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(377, 0, 'fr', '_json', 'Social Networks', 'Réseau social', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(378, 0, 'fr', '_json', 'Select network', 'Sélectionnez réseau', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(379, 0, 'fr', '_json', 'Enter URL include http or www', 'Entrez l\'URL inclure http ou www', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(380, 0, 'fr', '_json', 'Add more', 'Ajouter plus de', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(382, 0, 'fr', '_json', 'Thumb image', 'Image du pouce', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(383, 0, 'fr', '_json', 'Maximum file size: 1 MB', 'Taille maximale du fichier: 1 Mo', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(384, 0, 'fr', '_json', 'Gallery Images', 'Galerie d\'images', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(385, 0, 'fr', '_json', 'Video', 'Vidéo', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(386, 0, 'fr', '_json', 'Youtube, Vimeo video url', 'Youtube, URL vidéo Vimeo', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(387, 0, 'fr', '_json', 'Login to submit', 'Login to submit', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(388, 0, 'fr', '_json', 'Update', 'Mise à jour', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(389, 0, 'fr', '_json', 'Submit', 'Envoyer', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(390, 0, 'fr', '_json', 'Gallery', 'Galerie', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(391, 0, 'fr', '_json', 'Show more', 'Montrer plus', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(392, 0, 'fr', '_json', 'Book now', 'Réserver maintenant', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(393, 0, 'fr', '_json', 'Location & Maps', 'Emplacement et cartes', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(394, 0, 'fr', '_json', 'Direction', 'Direction', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(395, 0, 'fr', '_json', 'Contact Info', 'Informations de contact', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(396, 0, 'fr', '_json', 'Review', 'Avis', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(397, 0, 'fr', '_json', 'to review', 'réviser', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(398, 0, 'fr', '_json', 'Write a review', 'Partagé votre Avis', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(399, 0, 'fr', '_json', 'Rate This Place', 'Évaluez cette destination', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(400, 0, 'fr', '_json', 'error!', 'erreur!', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(401, 0, 'fr', '_json', 'Booking online', 'Réservation en ligne', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(402, 0, 'fr', '_json', 'Make a reservation', 'Faire une réservation', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(403, 0, 'fr', '_json', 'Send me a message', 'Envoyez-moi un message', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(404, 0, 'fr', '_json', 'Send', 'Envoyer', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(405, 0, 'fr', '_json', 'Banner Ads', 'Bannière publicitaire', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(406, 0, 'fr', '_json', 'View', 'Vue', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(407, 0, 'fr', '_json', 'Person', 'Personne', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(408, 0, 'fr', '_json', 'Adults', 'Adultes', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(409, 0, 'fr', '_json', 'Childrens', 'Enfants', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(410, 0, 'fr', '_json', 'You won\'t be charged yet', 'Vous ne serez pas encore facturé', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(411, 0, 'fr', '_json', 'You successfully created your booking.', 'Vous avez créé votre réservation avec succès.', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(412, 0, 'fr', '_json', 'Your Booking is Pending, We Will Contact You as Soon as Possible.', 'Votre réservation est en attente, nous vous contacterons dès que possible.', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(413, 0, 'fr', '_json', 'An error occurred. Please try again.', 'Une erreur est survenue. Veuillez réessayer.', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(414, 0, 'fr', '_json', 'Similar places', 'Destinations similaires', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(415, 0, 'fr', '_json', 'Overview', 'Aperçu', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(416, 0, 'fr', '_json', 'By Booking.com', 'Par Booking.com', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(417, 0, 'fr', '_json', 'All Country', 'Tous les pays', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(418, 0, 'fr', '_json', 'All City', 'Toutes les villes', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(419, 0, 'fr', '_json', 'Select Categories', 'Sélection catégories', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(420, 0, 'fr', '_json', 'All categories', 'Toutes les catégories', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(421, 0, 'fr', '_json', 'by', 'par', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(422, 0, 'fr', '_json', 'Related Articles', 'Articles similaires', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(423, 0, 'fr', '_json', 'Blog', 'Blog', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(424, 0, 'fr', '_json', 'All', 'Tout', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(425, 0, 'fr', '_json', 'Search results', 'Résultats de recherche', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(426, 0, 'fr', '_json', 'results for', 'résultats pour', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(427, 0, 'fr', '_json', 'Date', 'Date', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(428, 0, 'fr', '_json', 'cities', 'Villes', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(429, 0, 'fr', '_json', 'Activity', 'Activité', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(430, 0, 'fr', '_json', 'More', 'Plus', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(431, 0, 'fr', '_json', 'Apply', 'Appliquer', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(432, 0, 'fr', '_json', 'Maps', 'Plans', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(433, 0, 'fr', '_json', 'Nothing found!', 'Rien n\'a été trouvé!', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(434, 0, 'fr', '_json', 'We\'re sorry but we do not have any listings matching your search, try to change you search settings', 'Nous sommes désolés, mais aucune resultat ne correspond à votre recherche, essayez de modifier les mots vos de recherche', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(435, 0, 'fr', '_json', 'Close', 'Fermer', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(436, 0, 'fr', '_json', 'New Customer', 'Nouveau Client', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(437, 0, 'fr', '_json', 'Create Customer', 'Ajouter un Client', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(438, 0, 'fr', '_json', 'Name', 'Nom', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(439, 0, 'fr', '_json', 'Company Name', 'Nom de Société', '2021-02-01 09:24:18', '2021-05-19 09:14:06'),
(440, 0, 'fr', '_json', 'Phone Number', 'Numéro de téléphone', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(441, 0, 'fr', '_json', 'Tax Number', 'N° ICE', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(442, 0, 'fr', '_json', 'Address', 'Adresse', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(443, 0, 'fr', '_json', 'Postal Code', 'Code Postal', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(444, 0, 'fr', '_json', 'City', 'Ville', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(445, 0, 'fr', '_json', 'Country', 'Pays', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(446, 0, 'fr', '_json', 'Save', 'sauvegarder', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(447, 0, 'fr', '_json', 'Back', 'Retour', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(448, 0, 'fr', '_json', 'Edit Customer', 'Modifier le Client', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(449, 0, 'fr', '_json', 'Customers List', 'Liste des clients', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(450, 0, 'fr', '_json', 'Customers', 'Clients', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(451, 0, 'fr', '_json', 'Add New Customer', 'Ajouter un nouveau client', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(452, 0, 'fr', '_json', 'Company name', 'Nom de l\'entreprise', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(453, 0, 'fr', '_json', 'Phone', 'Téléphone', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(454, 0, 'fr', '_json', 'Created at', 'Créé à', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(455, 0, 'fr', '_json', 'Edit', 'Modifier', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(456, 0, 'fr', '_json', 'Delete', 'Supprimer', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(457, 0, 'fr', '_json', 'Create New Purchase', 'Créer un nouvel achat', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(458, 0, 'fr', '_json', 'New Purchase', 'Nouvel Achat', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(459, 0, 'fr', '_json', 'Reference no', 'Numéro de référence', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(460, 0, 'fr', '_json', 'Supplier', 'Fournisseur', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(461, 0, 'fr', '_json', 'User', 'Utilisateur', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(462, 0, 'fr', '_json', 'Select user', 'Sélection Utilisateur', '2021-02-01 09:24:19', '2021-05-19 09:14:06');
INSERT INTO `ltm_translations` (`id`, `status`, `locale`, `group`, `key`, `value`, `created_at`, `updated_at`) VALUES
(463, 0, 'fr', '_json', 'Product', 'Produit', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(464, 0, 'fr', '_json', 'Qty', 'Qty', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(465, 0, 'fr', '_json', 'Price', 'Prix', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(466, 0, 'fr', '_json', 'Total', 'Total', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(467, 0, 'fr', '_json', 'Enter Product Name', 'Entrez le nom', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(468, 0, 'fr', '_json', 'Enter Qty', 'Entrez la quantité', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(469, 0, 'fr', '_json', 'Enter Unit Price', 'Entrez le prix unitaire', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(470, 0, 'fr', '_json', 'Add Row', 'Ajouter une ligne', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(471, 0, 'fr', '_json', 'Delete Row', 'Supprimer une ligne', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(472, 0, 'fr', '_json', 'Sub Total', 'Sous Total', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(473, 0, 'fr', '_json', 'Tax', 'TVA', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(474, 0, 'fr', '_json', 'Tax Amount', 'Montant TVA', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(475, 0, 'fr', '_json', 'Grand Total', 'Total', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(476, 0, 'fr', '_json', 'Sale Status', 'Status de Vente', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(477, 0, 'fr', '_json', 'Completed', 'Complet', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(478, 0, 'fr', '_json', 'Pending', 'En attente', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(479, 0, 'fr', '_json', 'Payment Status', 'Statut de paiement', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(480, 0, 'fr', '_json', 'Due', 'Impayé', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(481, 0, 'fr', '_json', 'Partial', 'Partiel', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(482, 0, 'fr', '_json', 'Paid', 'Payé', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(483, 0, 'fr', '_json', 'Paid By', 'Payé par', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(484, 0, 'fr', '_json', 'Cash', 'Cash', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(485, 0, 'fr', '_json', 'Cheque', 'Chèque', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(486, 0, 'fr', '_json', 'Deposit', 'Dépôt', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(487, 0, 'fr', '_json', 'Attach Document', 'Joindre un document', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(488, 0, 'fr', '_json', 'Total Amount', 'Montant Total', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(489, 0, 'fr', '_json', 'Paying Amount', 'Montant de paiement', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(490, 0, 'fr', '_json', 'Change', 'Changer', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(491, 0, 'fr', '_json', 'Purchase Note', 'Note d\'Achat', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(492, 0, 'fr', '_json', 'Edit Purchase', 'Modifier l\'Achat', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(493, 0, 'fr', '_json', 'Select Supplier', 'Sélection fournisseur', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(494, 0, 'fr', '_json', 'Total amount', 'Montant total', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(495, 0, 'fr', '_json', 'Purchases', 'Achats', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(496, 0, 'fr', '_json', 'Add New Purchase', 'Ajouter un Achat', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(497, 0, 'fr', '_json', 'Status', 'Statut', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(498, 0, 'fr', '_json', 'Grand total', 'Somme finale', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(499, 0, 'fr', '_json', 'Payment status', 'Statut de paiement', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(500, 0, 'fr', '_json', 'Create New Sale', 'Créer une nouvelle vente', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(501, 0, 'fr', '_json', 'Create Sale', 'Ajouter une Vente', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(502, 0, 'fr', '_json', 'Customer', 'Client', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(503, 0, 'fr', '_json', 'Select Customer', 'Sélectionnez le client', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(504, 0, 'fr', '_json', 'Recieved Amount', 'Montant Reçu', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(505, 0, 'fr', '_json', 'Payment Note', 'Note de paiement', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(506, 0, 'fr', '_json', 'Sale Note', 'Note de Vente', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(507, 0, 'fr', '_json', 'Staff Note', 'Note Staff', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(508, 0, 'fr', '_json', 'Edit Sale', 'Modifier la vente', '2021-02-01 09:24:19', '2021-05-19 09:14:06'),
(509, 0, 'fr', '_json', 'Sales', 'Ventes', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(510, 0, 'fr', '_json', 'Add New Sale', 'Ajouter une vente', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(511, 0, 'fr', '_json', 'Booking ID', 'Réservation ID', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(512, 0, 'fr', '_json', 'Booking Type', 'Type de réservation', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(513, 0, 'fr', '_json', 'Settings', 'Réglage', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(514, 0, 'fr', '_json', 'Users Management', 'Gestion des utilisateurs', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(515, 0, 'fr', '_json', 'Create User', 'Ajouter un utilisateur', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(516, 0, 'fr', '_json', 'Create New Supplier', 'Créer un nouveau fournisseur', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(517, 0, 'fr', '_json', 'Create Supplier', 'Ajouter un fournisseur', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(518, 0, 'fr', '_json', 'Edit Supplier', 'Modifier le fournisseur', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(519, 0, 'fr', '_json', 'Suppliers', 'Fournisseurs', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(520, 0, 'fr', '_json', 'Add New Supplier', 'Ajouter un fournisseur', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(521, 0, 'fr', '_json', 'Supplier Name', 'Nom du fournisseur', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(522, 0, 'fr', '_json', 'Supplier Company', 'Entreprise fournisseur', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(523, 0, 'fr', '_json', 'Action', 'Action', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(524, 0, 'fr', '_json', 'Travel Packages', 'Forfaits de voyage', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(525, 0, 'fr', '_json', 'Continue(Save Package)', 'Continuer (Enregistrer le package)', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(526, 0, 'fr', '_json', 'Attraction', 'Attraction', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(527, 0, 'fr', '_json', 'Attraction Name', 'Nom de l\'attraction', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(528, 0, 'fr', '_json', 'Attraction City', 'Ville d\'attraction', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(529, 0, 'fr', '_json', 'Attraction Date', 'Date de l\'attraction', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(530, 0, 'fr', '_json', 'Location Description', 'Description de l\'emplacement', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(531, 0, 'fr', '_json', 'Attraction Additional Information', 'Informations supplémentaires sur l\'attraction', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(532, 0, 'fr', '_json', 'Sight Seeings', 'Visites touristiques', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(533, 0, 'fr', '_json', 'Add More Sight Seeing', 'Ajouter plus de vue', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(534, 0, 'fr', '_json', 'Sight Seeing Title', 'Titre voyant', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(535, 0, 'fr', '_json', 'Sight Seeing Description', 'Description de la vue', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(536, 0, 'fr', '_json', 'Continue (Save Attraction)', 'Continuer (Enregistrer l\'attraction)', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(537, 0, 'fr', '_json', 'Attraction Gallery', 'Galerie d\'attraction', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(538, 0, 'fr', '_json', 'Drag and Drop or Click On Box to Select Multiple Images', 'Faites glisser et déposez ou cliquez sur la zone pour sélectionner plusieurs images', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(539, 0, 'fr', '_json', 'Continue', 'Continuer', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(540, 0, 'fr', '_json', 'Create New Package', 'Créer un nouveau package', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(541, 0, 'fr', '_json', 'Package type', 'Type d\'emballage', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(542, 0, 'fr', '_json', 'Package category', 'Catégorie de package', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(543, 0, 'fr', '_json', 'Package name', 'Nom du paquet', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(544, 0, 'fr', '_json', 'Adult price', 'Prix ​​adulte', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(545, 0, 'fr', '_json', 'Children price', 'Prix ​​enfants', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(546, 0, 'fr', '_json', 'Infants price', 'Prix ​​nourrissons', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(547, 0, 'fr', '_json', 'Flight', 'Vol', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(548, 0, 'fr', '_json', 'Hotel', 'Hôtel', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(549, 0, 'fr', '_json', 'Deactivated', 'Désactivé', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(550, 0, 'fr', '_json', 'Activated', 'Activé', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(551, 0, 'fr', '_json', 'Add sight seeing', 'Ajouter des visites touristiques', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(552, 0, 'fr', '_json', 'Confirmation', 'Confirmation', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(553, 0, 'fr', '_json', 'Flight Information', 'Information de vol', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(554, 0, 'fr', '_json', 'Are you sure', 'Êtes-vous sûr?', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(555, 0, 'fr', '_json', 'Booking Confirmation', 'Confirmation de réservation', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(556, 0, 'fr', '_json', 'Inclusion', 'Inclusion', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(557, 0, 'fr', '_json', 'Exclusion', 'Exclusion', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(558, 0, 'fr', '_json', 'Sign in', 'Se connecter', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(559, 0, 'fr', '_json', 'KNOW MORE', 'SAVOIR PLUS', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(560, 0, 'fr', '_json', 'Who we are', 'Qui sommes nous', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(561, 0, 'fr', '_json', 'Read more', 'En Savoir plus', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(562, 0, 'fr', '_json', 'Starting From', 'A partir de', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(563, 0, 'fr', '_json', 'Edit Profile', 'Modifcation du profil', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(564, 0, 'fr', '_json', 'Logout', 'Se déconnecter', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(565, 0, 'fr', '_json', 'Book Flight', 'Réserver un vol', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(566, 0, 'fr', '_json', 'Book Hotel', 'Réserver un hôtel', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(567, 0, 'fr', '_json', 'Navigation', 'Navigation', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(568, 0, 'fr', '_json', 'Create New', 'Créer un nouveau', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(569, 0, 'fr', '_json', 'Commercial', 'Commercial', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(570, 0, 'fr', '_json', 'Sale List', 'Liste de vente', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(571, 0, 'fr', '_json', 'Purchase', 'Achat', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(572, 0, 'fr', '_json', 'Purchase List', 'Liste d\'achats', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(573, 0, 'fr', '_json', 'Suppliers List', 'Liste des fournisseurs', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(574, 0, 'fr', '_json', 'Manage Bookings', 'Gérer les réservations', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(575, 0, 'fr', '_json', 'Manage Packages', 'Gérer les packages', '2021-02-01 09:24:20', '2021-05-19 09:14:06'),
(576, 0, 'fr', '_json', 'Packages List', 'Liste des packages', '2021-02-01 09:24:21', '2021-05-19 09:14:06'),
(577, 0, 'fr', '_json', 'Manage Categories', 'Gérer les catégories', '2021-02-01 09:24:21', '2021-05-19 09:14:06'),
(578, 0, 'fr', '_json', 'My Wallet', 'Mon portefeuille', '2021-02-01 09:24:21', '2021-05-19 09:14:06'),
(579, 0, 'fr', '_json', 'Manage Profile', 'Gérer le profil', '2021-02-01 09:24:21', '2021-05-19 09:14:06'),
(580, 0, 'fr', '_json', 'Home Settings', 'Paramètres General', '2021-02-01 09:24:21', '2021-05-19 09:14:06'),
(581, 0, 'fr', '_json', 'Vats', 'TAX', '2021-02-01 09:24:21', '2021-05-19 09:14:06'),
(582, 0, 'fr', '_json', 'Markups', 'Marquages', '2021-02-01 09:24:21', '2021-05-19 09:14:06'),
(583, 0, 'fr', '_json', 'Markdowns', 'Démarques', '2021-02-01 09:24:21', '2021-05-19 09:14:06'),
(584, 0, 'fr', '_json', 'Banks', 'Banques', '2021-02-01 09:24:21', '2021-05-19 09:14:06'),
(585, 0, 'fr', '_json', 'Email Subscribers', 'Abonnés aux courriels', '2021-02-01 09:24:21', '2021-05-19 09:14:06'),
(586, 0, 'fr', '_json', 'Visa Applications', 'Demandes de visa', '2021-02-01 09:24:21', '2021-05-19 09:14:06'),
(587, 0, 'fr', '_json', 'Language', 'Langue', '2021-02-01 09:24:21', '2021-05-19 09:14:06'),
(588, 0, 'fr', '_json', 'Translations', 'Traductions', '2021-02-01 09:24:21', '2021-05-19 09:14:06'),
(589, 0, 'fr', '_json', 'Wallets Management', 'Gestion des portefeuilles', '2021-02-01 09:24:21', '2021-05-19 09:14:06'),
(590, 0, 'fr', '_json', 'Log Out', 'Se déconnecter', '2021-02-01 09:24:21', '2021-05-19 09:14:06'),
(591, 0, 'fr', '_json', 'Discover amazing things to do everywhere you go.', 'Découvrez des choses incroyables à faire partout où vous allez.', '2021-02-01 09:24:21', '2021-05-19 09:14:06'),
(592, 0, 'fr', '_json', 'Company', 'Société', '2021-02-01 09:24:21', '2021-05-19 09:14:06'),
(593, 0, 'fr', '_json', 'Contact', 'Contact', '2021-02-01 09:24:21', '2021-05-19 09:14:06'),
(594, 0, 'fr', '_json', 'Enter your email', 'Entrez votre email', '2021-02-01 09:24:21', '2021-05-19 09:14:06'),
(595, 0, 'fr', '_json', 'Sign-up to receive regular updates from us.', 'Inscrivez-vous pour recevoir des mises à jour régulières de notre part.', '2021-02-01 09:24:21', '2021-05-19 09:14:06'),
(596, 0, 'fr', '_json', 'Rentacs Tours', 'Visites à Rentacs', '2021-02-01 09:24:21', '2021-05-19 09:14:06'),
(597, 0, 'fr', '_json', 'All rights reserved.', 'Tous droits réservés', '2021-02-01 09:24:21', '2021-05-19 09:14:06'),
(598, 0, 'fr', '_json', 'LAST MINUTE DEALS', 'OFFRES DE LA DERNIÈRE MINUTE', '2021-02-01 09:24:21', '2021-05-19 09:14:06'),
(599, 0, 'fr', '_json', 'SAVE MORE', 'ÉCONOMISEZ PLUS', '2021-02-01 09:24:21', '2021-05-19 09:14:06'),
(600, 0, 'fr', '_json', 'VIEW DETAIL', 'VOIR LES DÉTAILS', '2021-02-01 09:24:21', '2021-05-19 09:14:06'),
(601, 0, 'fr', '_json', 'Profile', 'Profil', '2021-02-01 09:24:21', '2021-05-19 09:14:06'),
(602, 0, 'fr', '_json', 'Wishlist', 'Liste de souhaits', '2021-02-01 09:24:21', '2021-05-19 09:14:06'),
(603, 0, 'fr', '_json', 'Flights', 'Vols', '2021-02-01 09:24:21', '2021-05-19 09:14:06'),
(604, 0, 'fr', '_json', 'Hotels', 'Hôtels', '2021-02-01 09:24:21', '2021-05-19 09:14:06'),
(605, 0, 'fr', '_json', 'Hot Deals', 'Bonnes affaires', '2021-02-01 09:24:21', '2021-05-19 09:14:06'),
(606, 0, 'fr', '_json', 'Golf tours', 'Tours de golf', '2021-02-01 09:24:21', '2021-05-19 09:14:06'),
(607, 0, 'fr', '_json', 'Motorcycle', 'Moto', '2021-02-01 09:24:21', '2021-05-19 09:14:06'),
(608, 0, 'fr', '_json', 'Surf', 'Le surf', '2021-02-01 09:24:21', '2021-05-19 09:14:06'),
(609, 0, 'fr', '_json', 'Trekking', 'Trekking', '2021-02-01 09:24:21', '2021-05-19 09:14:06'),
(610, 0, 'fr', '_json', 'Bivouacs', 'Bivouacs', '2021-02-01 09:24:21', '2021-05-19 09:14:06'),
(611, 0, 'fr', '_json', 'Best offers', 'Meilleures offres', '2021-02-01 09:24:21', '2021-05-19 09:14:06'),
(612, 0, 'fr', '_json', 'Log out', 'Se déconnecter', '2021-02-01 09:24:21', '2021-05-19 09:14:06'),
(614, 0, 'en', '_json', 'Amenities', 'AMENITIES', '2021-02-01 15:27:22', '2021-05-19 09:14:06'),
(615, 0, 'en', '_json', 'Add amenities', 'ADD AMENITIES', '2021-02-01 15:27:22', '2021-05-19 09:14:06'),
(616, 0, 'en', '_json', 'Amenities Name', 'AMENITIES NAME', '2021-02-01 15:27:22', '2021-05-19 09:14:06'),
(617, 0, 'en', '_json', 'Add', 'ADD', '2021-02-01 15:27:22', '2021-05-19 09:14:06'),
(618, 0, 'en', '_json', 'Cancel', 'CANCEL', '2021-02-01 15:27:22', '2021-05-19 09:14:06'),
(619, 0, 'en', '_json', 'Create Booking', 'CREATE BOOKING', '2021-02-01 15:27:22', '2021-05-19 09:14:06'),
(620, 0, 'en', '_json', 'New Booking', 'NEW BOOKING', '2021-02-01 15:27:22', '2021-05-19 09:14:06'),
(621, 0, 'en', '_json', 'User Name', 'USER NAME', '2021-02-01 15:27:22', '2021-05-19 09:14:06'),
(622, 0, 'en', '_json', 'Place', 'PLACE', '2021-02-01 15:27:22', '2021-05-19 09:14:06'),
(623, 0, 'en', '_json', 'Number of adult', 'NUMBER OF ADULT', '2021-02-01 15:27:22', '2021-05-19 09:14:06'),
(624, 0, 'en', '_json', 'Number of Children', 'NUMBER OF CHILDREN', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(625, 0, 'en', '_json', 'Date', 'DATE', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(626, 0, 'en', '_json', 'time', 'TIME', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(627, 0, 'en', '_json', 'Time', 'TIME', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(628, 0, 'en', '_json', 'ACTIVE', 'ACTIVE', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(629, 0, 'en', '_json', 'INACTIVE', 'INACTIVE', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(630, 0, 'en', '_json', 'PENDING', 'PENDING', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(631, 0, 'en', '_json', 'Edit Booking', 'EDIT BOOKING', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(632, 0, 'en', '_json', 'Bookings', 'BOOKINGS', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(633, 0, 'en', '_json', 'Add New Booking', 'ADD NEW BOOKING', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(634, 0, 'en', '_json', 'Booking at', 'BOOKING AT', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(635, 0, 'en', '_json', 'Approved', 'APPROVED', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(636, 0, 'en', '_json', 'Detail', 'DETAIL', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(637, 0, 'en', '_json', 'Approve', 'APPROVE', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(638, 0, 'en', '_json', 'Place deleted', 'PLACE DELETED', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(639, 0, 'en', '_json', 'Booking detail', 'BOOKING DETAIL', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(640, 0, 'en', '_json', 'Booking place', 'BOOKING PLACE', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(641, 0, 'en', '_json', 'Booking datetime', 'BOOKING DATETIME', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(642, 0, 'en', '_json', 'Number of Adult', 'NUMBER OF ADULT', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(643, 0, 'en', '_json', 'Booking status', 'BOOKING STATUS', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(644, 0, 'en', '_json', 'Activity', 'ACTIVITY', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(645, 0, 'en', '_json', 'Add Activity', 'ADD ACTIVITY', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(646, 0, 'en', '_json', 'Category Name', 'CATEGORY NAME', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(647, 0, 'en', '_json', 'Priority', 'PRIORITY', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(648, 0, 'en', '_json', 'Is feature', 'IS FEATURE', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(649, 0, 'en', '_json', 'Add category', 'ADD CATEGORY', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(650, 0, 'en', '_json', 'Category name', 'CATEGORY NAME', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(651, 0, 'en', '_json', 'Color', 'COLOR', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(652, 0, 'en', '_json', 'SEO title', 'SEO TITLE', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(653, 0, 'en', '_json', 'Meta Description', 'META DESCRIPTION', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(654, 0, 'en', '_json', 'Add city', 'ADD CITY', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(655, 0, 'en', '_json', 'Select country', 'SELECT COUNTRY', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(656, 0, 'en', '_json', 'City Name', 'CITY NAME', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(657, 0, 'en', '_json', 'Description', 'DESCRIPTION', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(658, 0, 'en', '_json', 'Intro', 'INTRO', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(659, 0, 'en', '_json', 'Thumbnail image', 'THUMBNAIL IMAGE', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(660, 0, 'en', '_json', 'Banner image', 'BANNER IMAGE', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(661, 0, 'en', '_json', 'Time to visit', 'TIME TO VISIT', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(662, 0, 'en', '_json', 'Currency', 'CURRENCY', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(663, 0, 'en', '_json', 'Location', 'LOCATION', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(664, 0, 'en', '_json', 'Search city location...', 'SEARCH CITY LOCATION...', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(665, 0, 'en', '_json', 'Countries', 'COUNTRIES', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(666, 0, 'en', '_json', 'Add country', 'ADD COUNTRY', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(667, 0, 'en', '_json', 'Country name', 'COUNTRY NAME', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(668, 0, 'en', '_json', 'All Places', 'ALL PLACES', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(669, 0, 'en', '_json', 'Activity Type', 'ACTIVITY TYPE', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(670, 0, 'en', '_json', 'Cities', 'Cities', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(671, 0, 'en', '_json', 'All Posts', 'ALL POSTS', '2021-02-01 15:27:23', '2021-05-19 09:14:06'),
(672, 0, 'en', '_json', 'Categories', 'CATEGORIES', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(673, 0, 'en', '_json', 'Pages', 'PAGES', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(674, 0, 'en', '_json', 'Reviews', 'REVIEWS', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(675, 0, 'en', '_json', 'Account Management', 'ACCOUNT MANAGEMENT', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(676, 0, 'en', '_json', 'Users', 'USERS', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(677, 0, 'en', '_json', 'Testimonials', 'TESTIMONIALS', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(678, 0, 'en', '_json', 'General Settings', 'GENERAL SETTINGS', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(679, 0, 'en', '_json', 'Languages', 'LANGUAGES', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(680, 0, 'en', '_json', 'Home Page', 'HOME PAGE', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(681, 0, 'en', '_json', 'Add Page', 'ADD PAGE', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(682, 0, 'en', '_json', 'Title', 'TITLE', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(683, 0, 'en', '_json', 'Content', 'CONTENT', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(684, 0, 'en', '_json', 'SEO', 'SEO', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(685, 0, 'en', '_json', 'Publish', 'PUBLISH', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(686, 0, 'en', '_json', 'Edit Page', 'EDIT PAGE', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(687, 0, 'en', '_json', 'Add new Page', 'ADD NEW PAGE', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(688, 0, 'en', '_json', 'All categories', 'ALL CATEGORIES', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(689, 0, 'en', '_json', 'Genaral', 'GENARAL', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(690, 0, 'en', '_json', 'Place name', 'PLACE NAME', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(691, 0, 'en', '_json', 'What the name of place', 'WHAT THE NAME OF PLACE', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(692, 0, 'en', '_json', 'Price range', 'PRICE RANGE', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(693, 0, 'en', '_json', 'Offre Date', 'OFFRE DATE', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(694, 0, 'en', '_json', 'Category', 'CATEGORY', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(695, 0, 'en', '_json', 'Place type', 'PLACE TYPE', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(696, 0, 'en', '_json', 'Select Country', 'SELECT COUNTRY', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(697, 0, 'en', '_json', 'Please select country first', 'PLEASE SELECT COUNTRY FIRST', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(698, 0, 'en', '_json', 'Place Address', 'PLACE ADDRESS', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(699, 0, 'en', '_json', 'Search address...', 'SEARCH ADDRESS...', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(700, 0, 'en', '_json', 'Contact info', 'CONTACT INFO', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(701, 0, 'en', '_json', 'Website', 'WEBSITE', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(702, 0, 'en', '_json', 'Social Networks', 'SOCIAL NETWORKS', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(703, 0, 'en', '_json', 'Enter URL include http or www', 'ENTER URL INCLUDE HTTP OR WWW', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(704, 0, 'en', '_json', 'Opening hours', 'OPENING HOURS', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(705, 0, 'en', '_json', 'Media', 'MEDIA', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(706, 0, 'en', '_json', 'Gallery images', 'GALLERY IMAGES', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(707, 0, 'en', '_json', 'Video', 'VIDEO', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(708, 0, 'en', '_json', 'Booking type', 'BOOKING TYPE', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(709, 0, 'en', '_json', 'Booking form', 'BOOKING FORM', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(710, 0, 'en', '_json', 'Enquiry Form', 'ENQUIRY FORM', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(711, 0, 'en', '_json', 'Booking Now', 'BOOKING NOW', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(712, 0, 'en', '_json', 'Affiliate Banner Ads', 'AFFILIATE BANNER ADS', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(713, 0, 'en', '_json', 'Submit', 'SUBMIT', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(714, 0, 'en', '_json', 'Add more', 'ADD MORE', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(715, 0, 'en', '_json', 'Contact form', 'CONTACT FORM', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(716, 0, 'en', '_json', 'Banner link', 'BANNER LINK', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(717, 0, 'en', '_json', 'Maps', 'MAPS', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(718, 0, 'en', '_json', 'Add place', 'ADD PLACE', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(719, 0, 'en', '_json', 'Hightlight', 'HIGHTLIGHT', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(720, 0, 'en', '_json', 'Social network', 'SOCIAL NETWORK', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(722, 0, 'en', '_json', 'Booking link', 'BOOKING LINK', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(723, 0, 'en', '_json', 'Places', 'PLACES', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(724, 0, 'en', '_json', 'All Country', 'ALL COUNTRY', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(725, 0, 'en', '_json', 'Select city', 'SELECT CITY', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(726, 0, 'en', '_json', 'All City', 'ALL CITY', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(727, 0, 'en', '_json', 'Select Activity', 'SELECT ACTIVITY', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(728, 0, 'en', '_json', 'All Activities', 'ALL ACTIVITIES', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(729, 0, 'en', '_json', 'Add place type', 'ADD PLACE TYPE', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(730, 0, 'en', '_json', 'Place type name', 'PLACE TYPE NAME', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(731, 0, 'en', '_json', 'Select Category', 'SELECT CATEGORY', '2021-02-01 15:27:24', '2021-05-19 09:14:06'),
(732, 0, 'en', '_json', 'Reviewer', 'REVIEWER', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(733, 0, 'en', '_json', 'Comment', 'COMMENT', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(734, 0, 'en', '_json', 'Star', 'STAR', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(735, 0, 'en', '_json', 'New Sale', 'NEW SALE', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(736, 0, 'en', '_json', 'New Supplier', 'NEW SUPPLIER', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(737, 0, 'en', '_json', 'Edit testimonial', 'EDIT TESTIMONIAL', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(738, 0, 'en', '_json', 'Add testimonial', 'ADD TESTIMONIAL', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(739, 0, 'en', '_json', 'Add new Testimonial', 'ADD NEW TESTIMONIAL', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(740, 0, 'en', '_json', 'Avatar', 'AVATAR', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(741, 0, 'en', '_json', 'Job title', 'JOB TITLE', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(742, 0, 'en', '_json', 'New user', 'NEW USER', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(743, 0, 'en', '_json', 'Password', 'PASSWORD', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(744, 0, 'en', '_json', 'Role', 'ROLE', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(745, 0, 'en', '_json', 'Visitor', 'VISITOR', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(746, 0, 'en', '_json', 'Wholeseller', 'WHOLESELLER', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(747, 0, 'en', '_json', 'Agent', 'AGENT', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(748, 0, 'en', '_json', 'Edit User', 'EDIT USER', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(749, 0, 'en', '_json', 'Add New User', 'ADD NEW USER', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(750, 0, 'en', '_json', 'Is Admin', 'IS ADMIN', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(751, 0, 'en', '_json', 'No places', 'NO PLACES', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(752, 0, 'en', '_json', 'Back to list', 'BACK TO LIST', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(753, 0, 'en', '_json', 'Show all', 'SHOW ALL', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(754, 0, 'en', '_json', 'Introducing', 'INTRODUCING', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(755, 0, 'en', '_json', 'Best time to visit', 'BEST TIME TO VISIT', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(756, 0, 'en', '_json', 'Maps view', 'MAPS VIEW', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(757, 0, 'en', '_json', 'See all', 'SEE ALL', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(758, 0, 'en', '_json', 'results', 'RESULTS', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(759, 0, 'en', '_json', 'Clear All', 'CLEAR ALL', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(760, 0, 'en', '_json', 'Filter', 'FILTER', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(761, 0, 'en', '_json', 'Sort By', 'SORT BY', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(762, 0, 'en', '_json', 'Newest', 'NEWEST', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(763, 0, 'en', '_json', 'Average rating', 'AVERAGE RATING', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(764, 0, 'en', '_json', 'Price: Low to high', 'PRICE: LOW TO HIGH', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(765, 0, 'en', '_json', 'Price: High to low', 'PRICE: HIGH TO LOW', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(766, 0, 'en', '_json', 'Price Filter', 'PRICE FILTER', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(767, 0, 'en', '_json', 'Free', 'FREE', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(768, 0, 'en', '_json', 'Low: $', 'LOW: $', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(769, 0, 'en', '_json', 'Medium: $$', 'MEDIUM: $$', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(770, 0, 'en', '_json', 'High: $$$', 'HIGH: $$$', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(771, 0, 'en', '_json', 'Types', 'TYPES', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(772, 0, 'en', '_json', 'Explorer Other Cities', 'EXPLORER OTHER CITIES', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(773, 0, 'en', '_json', 'places', 'PLACES', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(774, 0, 'en', '_json', 'No cities', 'NO CITIES', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(775, 0, 'en', '_json', 'reviews', 'REVIEWS', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(776, 0, 'en', '_json', 'Our Offices', 'OUR OFFICES', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(777, 0, 'en', '_json', 'Get Direction', 'GET DIRECTION', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(778, 0, 'en', '_json', 'Get in touch with us', 'GET IN TOUCH WITH US', '2021-02-01 15:27:25', '2021-05-19 09:14:06'),
(779, 0, 'en', '_json', 'First name', 'FIRST NAME', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(780, 0, 'en', '_json', 'Last name', 'LAST NAME', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(781, 0, 'en', '_json', 'Message', 'MESSAGE', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(782, 0, 'en', '_json', 'Send Message', 'SEND MESSAGE', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(783, 0, 'en', '_json', 'We want to hear from you.', 'WE WANT TO HEAR FROM YOU.', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(784, 0, 'en', '_json', 'Open hours', 'OPEN HOURS', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(785, 0, 'en', '_json', 'Edit my place', 'EDIT MY PLACE', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(786, 0, 'en', '_json', 'Add new place', 'ADD NEW PLACE', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(787, 0, 'en', '_json', 'Place Name', 'PLACE NAME', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(788, 0, 'en', '_json', 'Price Range', 'PRICE RANGE', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(789, 0, 'en', '_json', 'Place Type', 'PLACE TYPE', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(790, 0, 'en', '_json', 'Select Place Type', 'SELECT PLACE TYPE', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(791, 0, 'en', '_json', 'Full Address', 'FULL ADDRESS', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(792, 0, 'en', '_json', 'Place Location at Google Map', 'PLACE LOCATION AT GOOGLE MAP', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(793, 0, 'en', '_json', 'Your email address', 'YOUR EMAIL ADDRESS', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(794, 0, 'en', '_json', 'Your phone number', 'YOUR PHONE NUMBER', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(795, 0, 'en', '_json', 'Your website url', 'YOUR WEBSITE URL', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(796, 0, 'en', '_json', 'Select network', 'SELECT NETWORK', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(798, 0, 'en', '_json', 'Thumb image', 'THUMB IMAGE', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(799, 0, 'en', '_json', 'Maximum file size: 1 MB', 'MAXIMUM FILE SIZE: 1 MB', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(800, 0, 'en', '_json', 'Gallery Images', 'GALLERY IMAGES', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(801, 0, 'en', '_json', 'Youtube, Vimeo video url', 'Youtube, Vimeo video url', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(802, 0, 'en', '_json', 'Login to submit', 'LOGIN TO SUBMIT', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(803, 0, 'en', '_json', 'Gallery', 'GALLERY', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(804, 0, 'en', '_json', 'Show more', 'SHOW MORE', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(805, 0, 'en', '_json', 'Book now', 'BOOK NOW', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(806, 0, 'en', '_json', 'Location & Maps', 'LOCATION & MAPS', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(807, 0, 'en', '_json', 'Direction', 'DIRECTION', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(808, 0, 'en', '_json', 'Contact Info', 'CONTACT INFO', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(809, 0, 'en', '_json', 'Review', 'REVIEW', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(810, 0, 'en', '_json', 'to review', 'TO REVIEW', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(811, 0, 'en', '_json', 'Write a review', 'WRITE A REVIEW', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(812, 0, 'en', '_json', 'Rate This Place', 'RATE THIS PLACE', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(813, 0, 'en', '_json', 'error!', 'ERROR!', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(814, 0, 'en', '_json', 'Booking online', 'BOOKING ONLINE', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(815, 0, 'en', '_json', 'Make a reservation', 'MAKE A RESERVATION', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(816, 0, 'en', '_json', 'Send me a message', 'SEND ME A MESSAGE', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(817, 0, 'en', '_json', 'Send', 'SEND', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(818, 0, 'en', '_json', 'Banner Ads', 'BANNER ADS', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(819, 0, 'en', '_json', 'View', 'VIEW', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(820, 0, 'en', '_json', 'Person', 'PERSON', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(821, 0, 'en', '_json', 'Adults', 'ADULTS', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(822, 0, 'en', '_json', 'Childrens', 'CHILDRENS', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(823, 0, 'en', '_json', 'You won\'t be charged yet', 'YOU WON\'T BE CHARGED YET', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(824, 0, 'en', '_json', 'You successfully created your booking.', 'YOU SUCCESSFULLY CREATED YOUR BOOKING.', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(825, 0, 'en', '_json', 'Your Booking is Pending, We Will Contact You as Soon as Possible.', 'Your Booking is Pending, We Will Contact You as Soon as Possible.', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(826, 0, 'en', '_json', 'An error occurred. Please try again.', 'AN ERROR OCCURRED. PLEASE TRY AGAIN.', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(827, 0, 'en', '_json', 'Similar places', 'SIMILAR PLACES', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(828, 0, 'en', '_json', 'Overview', 'OVERVIEW', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(829, 0, 'en', '_json', 'By Booking.com', 'BY BOOKING.COM', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(830, 0, 'en', '_json', 'Select Categories', 'SELECT CATEGORIES', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(831, 0, 'en', '_json', 'by', 'BY', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(832, 0, 'en', '_json', 'Related Articles', 'RELATED ARTICLES', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(833, 0, 'en', '_json', 'All', 'ALL', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(834, 0, 'en', '_json', 'Search results', 'SEARCH RESULTS', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(835, 0, 'en', '_json', 'results for', 'RESULTS FOR', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(836, 0, 'en', '_json', 'cities', 'CITIES', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(837, 0, 'en', '_json', 'More', 'MORE', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(838, 0, 'en', '_json', 'Apply', 'APPLY', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(839, 0, 'en', '_json', 'Nothing found!', 'NOTHING FOUND!', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(840, 0, 'en', '_json', 'We\'re sorry but we do not have any listings matching your search, try to change you search settings', 'We\'re sorry but we do not have any listings matching your search, try to change you search settings', '2021-02-01 15:27:26', '2021-05-19 09:14:06'),
(841, 0, 'en', '_json', 'Staticts', 'STATICTS', '2021-02-01 15:27:27', '2021-05-19 09:14:06'),
(842, 0, 'en', '_json', 'Find', 'FIND', '2021-02-01 15:27:27', '2021-05-19 09:14:06'),
(843, 0, 'en', '_json', 'Where are you going?', 'WHERE ARE YOU GOING?', '2021-02-01 15:27:27', '2021-05-19 09:14:06'),
(844, 0, 'en', '_json', 'Where', 'WHERE', '2021-02-01 15:27:27', '2021-05-19 09:14:06'),
(845, 0, 'en', '_json', 'City?', 'CITY?', '2021-02-01 15:27:27', '2021-05-19 09:14:06'),
(846, 0, 'en', '_json', 'Place List', 'PLACE LIST', '2021-02-01 15:27:27', '2021-05-19 09:14:06'),
(847, 0, 'en', '_json', 'Categories List', 'CATEGORIES LIST', '2021-02-01 15:27:27', '2021-05-19 09:14:06'),
(848, 0, 'en', '_json', 'Log out', 'LOG OUT', '2021-02-01 15:27:27', '2021-05-19 09:14:06'),
(849, 0, 'en', '_json', 'Booking', 'BOOKING', '2021-02-03 16:09:36', '2021-05-19 09:14:06'),
(850, 0, 'en', '_json', 'Edit place', 'EDIT PLACE', '2021-02-03 16:09:36', '2021-05-19 09:14:06'),
(851, 0, 'en', '_json', 'Browse Businesses by Category', 'BROWSE BUSINESSES BY CATEGORY', '2021-02-03 16:09:37', '2021-05-19 09:14:06'),
(852, 0, 'en', '_json', 'Activity List', 'ACTIVITY LIST', '2021-02-03 16:09:37', '2021-05-19 09:14:06'),
(853, 0, 'en', '_json', 'Amenities List', 'AMENITIES LIST', '2021-02-03 16:09:37', '2021-05-19 09:14:06'),
(854, 0, 'en', '_json', 'Cities List', 'Cities List', '2021-02-03 16:09:37', '2021-05-19 09:14:06'),
(855, 0, 'en', '_json', 'Countries List', 'COUNTRIES LIST', '2021-02-03 16:09:37', '2021-05-19 09:14:06'),
(856, 0, 'en', '_json', 'My account', 'MY ACCOUNT', '2021-02-05 21:34:43', '2021-05-19 09:14:06'),
(857, 0, 'en', '_json', 'Reset Password', 'RESET PASSWORD', '2021-02-05 21:34:43', '2021-05-19 09:14:06'),
(858, 0, 'en', '_json', 'New password', 'NEW PASSWORD', '2021-02-05 21:34:43', '2021-05-19 09:14:06'),
(859, 0, 'en', '_json', 'Enter new password', 'ENTER NEW PASSWORD', '2021-02-05 21:34:43', '2021-05-19 09:14:06'),
(860, 0, 'en', '_json', 'Re-new password', 'RE-NEW PASSWORD', '2021-02-05 21:34:43', '2021-05-19 09:14:06'),
(861, 0, 'en', '_json', 'All cities', 'ALL CITIES', '2021-02-05 21:34:43', '2021-05-19 09:14:06'),
(862, 0, 'en', '_json', 'Search', 'SEARCH', '2021-02-05 21:34:43', '2021-05-19 09:14:06'),
(863, 0, 'en', '_json', 'ID', 'ID', '2021-02-05 21:34:43', '2021-05-19 09:14:06'),
(864, 0, 'en', '_json', 'Thumb', 'THUMB', '2021-02-05 21:34:43', '2021-05-19 09:14:06'),
(865, 0, 'en', '_json', 'No item found', 'NO ITEM FOUND', '2021-02-05 21:34:43', '2021-05-19 09:14:06'),
(866, 0, 'en', '_json', 'Children', 'CHILDREN', '2021-02-05 21:34:43', '2021-05-19 09:14:06'),
(867, 0, 'en', '_json', 'Infants', 'INFANTS', '2021-02-05 21:34:43', '2021-05-19 09:14:06'),
(868, 0, 'en', '_json', 'Latest Booking', 'LATEST BOOKING', '2021-02-05 21:34:43', '2021-05-19 09:14:06'),
(869, 0, 'en', '_json', 'Find Cheap Flights', 'FIND CHEAP FLIGHTS', '2021-02-05 21:34:44', '2021-05-19 09:14:06'),
(870, 0, 'en', '_json', 'One Way', 'ONE WAY', '2021-02-05 21:34:44', '2021-05-19 09:14:06'),
(871, 0, 'en', '_json', 'Round Trip', 'ROUND TRIP', '2021-02-05 21:34:44', '2021-05-19 09:14:06'),
(872, 0, 'en', '_json', 'Multi Destination', 'MULTI DESTINATION', '2021-02-05 21:34:44', '2021-05-19 09:14:06'),
(873, 0, 'en', '_json', 'Departure City', 'DEPARTURE CITY', '2021-02-05 21:34:44', '2021-05-19 09:14:06'),
(874, 0, 'en', '_json', 'Destination City', 'DESTINATION CITY', '2021-02-05 21:34:44', '2021-05-19 09:14:06'),
(875, 0, 'en', '_json', 'Departure Date', 'DEPARTURE DATE', '2021-02-05 21:34:44', '2021-05-19 09:14:06'),
(876, 0, 'en', '_json', 'Return Date', 'RETURN DATE', '2021-02-05 21:34:44', '2021-05-19 09:14:06'),
(877, 0, 'en', '_json', 'Book Flight Tickets', 'BOOK FLIGHT TICKETS', '2021-02-05 21:34:44', '2021-05-19 09:14:06'),
(878, 0, 'en', '_json', 'Adult', 'ADULT', '2021-02-05 21:34:44', '2021-05-19 09:14:06'),
(879, 0, 'en', '_json', 'Child', 'CHILD', '2021-02-05 21:34:44', '2021-05-19 09:14:06'),
(880, 0, 'en', '_json', 'below 2yrs', 'BELOW 2YRS', '2021-02-05 21:34:44', '2021-05-19 09:14:06'),
(881, 0, 'en', '_json', 'Search Flights', 'SEARCH FLIGHTS', '2021-02-05 21:34:44', '2021-05-19 09:14:06'),
(882, 0, 'en', '_json', 'Book Hotel Rooms', 'BOOK HOTEL ROOMS', '2021-02-05 21:34:44', '2021-05-19 09:14:06'),
(883, 0, 'en', '_json', 'I Want To Go', 'I WANT TO GO', '2021-02-05 21:34:44', '2021-05-19 09:14:06'),
(884, 0, 'en', '_json', 'CheckIn', 'CHECKIN', '2021-02-05 21:34:44', '2021-05-19 09:14:06'),
(885, 0, 'en', '_json', 'CheckOut', 'CHECKOUT', '2021-02-05 21:34:44', '2021-05-19 09:14:06'),
(886, 0, 'en', '_json', 'BEST OFFERS', 'BEST OFFERS', '2021-02-05 21:34:44', '2021-05-19 09:14:06'),
(887, 0, 'en', '_json', 'We are finding the cheapest available flights for you. Hold on for some seconds', 'WE ARE FINDING THE CHEAPEST AVAILABLE FLIGHTS FOR YOU. HOLD ON FOR SOME SECONDS', '2021-02-05 21:34:44', '2021-05-19 09:14:06'),
(888, 0, 'en', '_json', 'Departure Airport', 'DEPARTURE AIRPORT', '2021-02-05 21:34:44', '2021-05-19 09:14:06'),
(889, 0, 'en', '_json', 'Destination Airport', 'DESTINATION AIRPORT', '2021-02-05 21:34:44', '2021-05-19 09:14:06'),
(890, 0, 'en', '_json', 'Cabin', 'CABIN', '2021-02-05 21:34:44', '2021-05-19 09:14:06'),
(891, 0, 'fr', '_json', 'Explore the world', 'Explorer le monde', '2021-02-05 21:37:34', '2021-05-19 09:14:06'),
(892, 0, 'fr', '_json', 'Destinations', 'Les destinations', '2021-02-05 21:37:34', '2021-05-19 09:14:06'),
(893, 0, 'fr', '_json', 'Add place', 'Ajouter une Destination', '2021-02-05 21:37:34', '2021-05-19 09:14:06'),
(894, 0, 'fr', '_json', 'Type a city or location', 'Saisissez une ville ou un emplacement', '2021-02-05 21:37:34', '2021-05-19 09:14:06'),
(895, 0, 'fr', '_json', 'Popular cities', 'Villes populaires', '2021-02-05 21:37:34', '2021-05-19 09:14:06'),
(896, 0, 'fr', '_json', 'Get the App', 'Obtenir l\'application', '2021-02-05 21:37:34', '2021-05-19 09:14:06'),
(897, 0, 'fr', '_json', 'Download the app and go to travel the world.', 'Téléchargez l\'application et partez parcourir le monde.', '2021-02-05 21:37:34', '2021-05-19 09:14:06'),
(898, 0, 'fr', '_json', 'Related stories', 'Histoires en Relation', '2021-02-05 21:37:34', '2021-05-19 09:14:06'),
(899, 0, 'fr', '_json', 'Popular:', 'Populaire', '2021-02-05 21:37:34', '2021-05-19 09:14:06'),
(900, 0, 'fr', '_json', 'View more', 'Voir plus', '2021-02-05 21:37:34', '2021-05-19 09:14:06'),
(901, 0, 'fr', '_json', '404 Error', 'Erreur 404', '2021-02-05 21:37:34', '2021-05-19 09:14:06'),
(902, 0, 'fr', '_json', 'All cities', 'Toutes les villes', '2021-02-05 21:37:34', '2021-05-19 09:14:06'),
(903, 0, 'fr', '_json', 'Avatar', 'Avatar', '2021-02-05 21:37:34', '2021-05-19 09:14:06'),
(904, 0, 'fr', '_json', 'Basic Info', 'Informations de base', '2021-02-05 21:37:34', '2021-05-19 09:14:06'),
(905, 0, 'fr', '_json', 'Change Password', 'Changer le mot de passe', '2021-02-05 21:37:35', '2021-05-19 09:14:06'),
(906, 0, 'fr', '_json', 'Continue with', 'Continuer avec', '2021-02-05 21:37:35', '2021-05-19 09:14:06'),
(907, 0, 'fr', '_json', 'Enter facebook', 'Entrez Facebook', '2021-02-05 21:37:35', '2021-05-19 09:14:06'),
(908, 0, 'fr', '_json', 'Enter instagram', 'Entez Instagram', '2021-02-05 21:37:35', '2021-05-19 09:14:06'),
(909, 0, 'fr', '_json', 'Enter new password', 'Entrez un nouveau mot de passe', '2021-02-05 21:37:35', '2021-05-19 09:14:06'),
(910, 0, 'fr', '_json', 'Enter old password', 'Entrez l\'ancien mot de passe', '2021-02-05 21:37:35', '2021-05-19 09:14:06'),
(911, 0, 'fr', '_json', 'Enter phone number', 'Entrez le numéro de téléphone', '2021-02-05 21:37:35', '2021-05-19 09:14:06'),
(912, 0, 'fr', '_json', 'Enter your name', 'Entrez votre nom', '2021-02-05 21:37:35', '2021-05-19 09:14:06'),
(913, 0, 'fr', '_json', 'Facebook', 'Facebook', '2021-02-05 21:37:35', '2021-05-19 09:14:06'),
(914, 0, 'fr', '_json', 'Faqs', 'FAQS', '2021-02-05 21:37:35', '2021-05-19 09:14:06'),
(915, 0, 'fr', '_json', 'Forgot password', 'Mot de passe oublié', '2021-02-05 21:37:35', '2021-05-19 09:14:06'),
(916, 0, 'fr', '_json', 'Full name', 'Nom complet', '2021-02-05 21:37:35', '2021-05-19 09:14:06'),
(917, 0, 'fr', '_json', 'Homepage', 'Page d\'accueil', '2021-02-05 21:37:35', '2021-05-19 09:14:06'),
(918, 0, 'fr', '_json', 'Make sure you\'ve typed in the URL correctly or try go', 'Assurez-vous que vous avez correctement saisi l\'URL ou essayez d\'aller', '2021-02-05 21:37:35', '2021-05-19 09:14:06'),
(919, 0, 'fr', '_json', 'My account', 'Mon compte', '2021-02-05 21:37:35', '2021-05-19 09:14:06'),
(920, 0, 'fr', '_json', 'My Places', 'Destinations', '2021-02-05 21:37:35', '2021-05-19 09:14:06'),
(921, 0, 'fr', '_json', 'New password', 'Nouveau mot de passe', '2021-02-05 21:37:35', '2021-05-19 09:14:06'),
(922, 0, 'fr', '_json', 'No item found', 'Aucun élément trouvé', '2021-02-05 21:37:35', '2021-05-19 09:14:06'),
(923, 0, 'fr', '_json', 'Old password', 'Ancien mot de passe', '2021-02-05 21:37:35', '2021-05-19 09:14:06'),
(924, 0, 'fr', '_json', 'Place', 'Destination', '2021-02-05 21:37:35', '2021-05-19 09:14:06'),
(925, 0, 'fr', '_json', 'Place name', 'Nom de la destination', '2021-02-05 21:37:35', '2021-05-19 09:14:06'),
(926, 0, 'fr', '_json', 'Profile Setting', 'Réglage du profil', '2021-02-05 21:37:36', '2021-05-19 09:14:06'),
(927, 0, 'fr', '_json', 'Re-new password', 'Nouveau mot de passe', '2021-02-05 21:37:36', '2021-05-19 09:14:06'),
(928, 0, 'fr', '_json', 'Reset Password', 'réinitialiser le mot de passe', '2021-02-05 21:37:36', '2021-05-19 09:14:06'),
(929, 0, 'fr', '_json', 'Search', 'Rechercher', '2021-02-05 21:37:36', '2021-05-19 09:14:06'),
(930, 0, 'fr', '_json', 'Sorry, we couldn\'t find that page.', 'Désolé, nous n\'avons pas pu trouver cette page.', '2021-02-05 21:37:36', '2021-05-19 09:14:06'),
(931, 0, 'fr', '_json', 'Thumb', 'Thumb', '2021-02-05 21:37:36', '2021-05-19 09:14:06'),
(932, 0, 'fr', '_json', 'Upload new', 'Importer un nouveau', '2021-02-05 21:37:36', '2021-05-19 09:14:06'),
(933, 0, 'fr', '_json', 'We can\'t find the page or studio you\'re looking for.', 'Nous ne trouvons pas la page ou le studio que vous recherchez.', '2021-02-05 21:37:36', '2021-05-19 09:14:06'),
(934, 0, 'fr', '_json', 'Browse Businesses by Category', 'Parcourir par catégorie', '2021-02-05 21:37:36', '2021-05-19 09:14:06'),
(935, 0, 'fr', '_json', 'categories', 'Categories', '2021-02-05 21:37:36', '2021-05-19 09:14:06'),
(936, 0, 'fr', '_json', 'Featured Cities', 'Villes en vedette', '2021-02-05 21:37:36', '2021-05-19 09:14:06'),
(937, 0, 'fr', '_json', 'Find', 'Trouver', '2021-02-05 21:37:36', '2021-05-19 09:14:06'),
(938, 0, 'fr', '_json', 'From Our Blog', 'Depuis notre Blog', '2021-02-05 21:37:36', '2021-05-19 09:14:06'),
(939, 0, 'fr', '_json', 'Instagram', 'Instagram', '2021-02-05 21:37:36', '2021-05-19 09:14:06'),
(940, 0, 'fr', '_json', 'Log In', 'Connexion', '2021-02-05 21:37:36', '2021-05-19 09:14:06'),
(941, 0, 'fr', '_json', 'Or', 'Ou', '2021-02-05 21:37:36', '2021-05-19 09:14:06'),
(942, 0, 'fr', '_json', 'Search places ...', 'Recherche Destinations ...', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(943, 0, 'fr', '_json', 'Where', 'Où', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(944, 0, 'fr', '_json', 'Add amenities', 'Ajouter un service', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(945, 0, 'fr', '_json', 'Add Activity', 'Ajouter une activité', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(946, 0, 'fr', '_json', 'SEO title', 'titre SEO', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(947, 0, 'fr', '_json', 'Meta Description', 'Meta Description', '2021-02-05 21:37:37', '2021-05-19 09:14:06');
INSERT INTO `ltm_translations` (`id`, `status`, `locale`, `group`, `key`, `value`, `created_at`, `updated_at`) VALUES
(948, 0, 'fr', '_json', 'All Places', 'Toutes les destinations', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(949, 0, 'fr', '_json', 'Activity Type', 'Type d\'activités', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(950, 0, 'fr', '_json', 'Countries', 'Pays', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(951, 0, 'fr', '_json', 'Pages', 'Pages', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(952, 0, 'fr', '_json', 'Bookings', 'Réservations', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(953, 0, 'fr', '_json', 'SEO', 'SEO', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(954, 0, 'fr', '_json', 'Choose your next destination', 'Choisissez votre prochaine destination', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(956, 0, 'fr', '_json', 'Business Listing', 'Business Listing', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(957, 0, 'fr', '_json', 'Trending Business Places', 'Destinations en tendance', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(958, 0, 'fr', '_json', 'Choose the city you\'ll be living in next', 'Choisissez la prochaine ville dans laquelle vous vivrez', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(959, 0, 'fr', '_json', 'Lost your password? Please enter your email address. You will receive a link to create a new password via email.', 'Mot de passe perdu? Veuillez saisir votre adresse e-mail. Vous recevrez un lien pour créer un nouveau mot de passe par e-mail.', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(960, 0, 'fr', '_json', 'Paris', 'Paris', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(961, 0, 'fr', '_json', 'Amenities Name', 'Nom du service', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(962, 0, 'fr', '_json', 'Add', 'Ajouter', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(963, 0, 'fr', '_json', 'Cancel', 'Annuler', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(964, 0, 'fr', '_json', 'Booking at', 'Réservation au', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(965, 0, 'fr', '_json', 'Booking place', 'Lieu de réservation', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(966, 0, 'fr', '_json', 'Booking datetime', 'Date de réservation', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(967, 0, 'fr', '_json', 'Number of Adult', 'Nombre d\'adultes', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(968, 0, 'fr', '_json', 'Number of Children', 'Nombre d\'enfants', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(969, 0, 'fr', '_json', 'Booking status', 'Statut de réservation', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(970, 0, 'fr', '_json', 'Category Name', 'Nom de la catégorie', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(971, 0, 'fr', '_json', 'Priority', 'Priorité', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(972, 0, 'fr', '_json', 'Add city', 'Ajouter une ville', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(973, 0, 'fr', '_json', 'City Name', 'Nom de la ville', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(974, 0, 'fr', '_json', 'Add country', 'Ajouter un pays', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(975, 0, 'fr', '_json', 'Country name', 'Nom du pays', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(976, 0, 'fr', '_json', 'Users', 'Utilisateurs', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(977, 0, 'fr', '_json', 'Booking Make', 'Faire une réservation', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(978, 0, 'fr', '_json', 'Booking type', 'Type de réservation', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(979, 0, 'fr', '_json', 'Affiliate Book Buttons', 'Boutons d\'affiliation', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(981, 0, 'fr', '_json', 'Booking link', 'Lien de réservation', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(982, 0, 'fr', '_json', 'Add Post', 'Ajouter un Article', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(983, 0, 'fr', '_json', 'Title', 'Titre', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(984, 0, 'fr', '_json', 'Content', 'Contenu', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(985, 0, 'fr', '_json', 'Posts', 'Articles', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(986, 0, 'fr', '_json', 'Booking form', 'Formulaire de réservation', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(987, 0, 'fr', '_json', 'Enquiry Form', 'Formulaire', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(988, 0, 'fr', '_json', 'Welcome to Admin Dashboard.', 'Bienvenue dans le tableau de bord d\'administration.', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(989, 0, 'fr', '_json', 'The Admin Site is an area which only the administrator​ can access. From here you can manage (delete, edit, create) places, categories, cities, country, manage users, review, booking...', 'Le site d\'administration est une zone à laquelle seul l\'administrateur peut accéder. De là, vous pouvez gérer (supprimer, modifier, créer) des lieux, des catégories, des villes, des pays, gérer les utilisateurs, consulter, réserver.', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(990, 0, 'fr', '_json', 'Staticts', 'Statistiques', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(991, 0, 'fr', '_json', 'Booking detail', 'Détails de la réservation', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(992, 0, 'fr', '_json', 'Add category', 'Ajouter une catégorie', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(993, 0, 'fr', '_json', 'Color', 'Couleur', '2021-02-05 21:37:37', '2021-05-19 09:14:06'),
(994, 0, 'fr', '_json', 'Intro', 'Intro', '2021-02-05 21:37:38', '2021-05-19 09:14:06'),
(995, 0, 'fr', '_json', 'All Posts', 'Tous les posts', '2021-02-05 21:37:38', '2021-05-19 09:14:06'),
(996, 0, 'fr', '_json', 'Testimonials', 'Témoignages', '2021-02-05 21:37:38', '2021-05-19 09:14:06'),
(997, 0, 'fr', '_json', 'General Settings', 'Paramètre géréraux', '2021-02-05 21:37:38', '2021-05-19 09:14:06'),
(998, 0, 'fr', '_json', 'Add place type', 'Ajouter un type de lieu', '2021-02-05 21:37:38', '2021-05-19 09:14:06'),
(999, 0, 'fr', '_json', 'Place type name', 'Nom du type de destination', '2021-02-05 21:37:38', '2021-05-19 09:14:06'),
(1000, 0, 'fr', '_json', 'Publish', 'Publier', '2021-02-05 21:37:38', '2021-05-19 09:14:06'),
(1001, 0, 'fr', '_json', 'Learn More', 'Lire plus', '2021-02-05 21:37:38', '2021-05-19 09:14:06'),
(1002, 0, 'fr', '_json', 'Add New', 'Ajouter un nouveau', '2021-02-05 21:37:38', '2021-05-19 09:14:06'),
(1003, 0, 'fr', '_json', 'Offre Date', 'Fin de l\'Offre', '2021-02-05 21:37:38', '2021-05-19 09:14:06'),
(1004, 0, 'fr', '_json', 'New Booking', 'Nouvelle Réservation', '2021-02-05 21:37:38', '2021-05-19 09:14:06'),
(1005, 0, 'fr', '_json', 'User Name', 'Nom Utilisateur', '2021-02-05 21:37:38', '2021-05-19 09:14:06'),
(1006, 0, 'fr', '_json', 'PENDING', 'En cours', '2021-02-05 21:37:38', '2021-05-19 09:14:06'),
(1007, 0, 'fr', '_json', 'Edit Booking', 'Modifier la réservation', '2021-02-05 21:37:38', '2021-05-19 09:14:06'),
(1008, 0, 'fr', '_json', 'Approved', 'Approuvé', '2021-02-05 21:37:38', '2021-05-19 09:14:06'),
(1009, 0, 'fr', '_json', 'Place deleted', 'Destination supprimée', '2021-02-05 21:37:38', '2021-05-19 09:14:06'),
(1010, 0, 'fr', '_json', 'Approve', 'Approuver', '2021-02-05 21:37:38', '2021-05-19 09:14:06'),
(1011, 0, 'fr', '_json', 'Comment', 'Commentaire', '2021-02-05 21:37:38', '2021-05-19 09:14:06'),
(1012, 0, 'fr', '_json', 'Booking', 'Réservation', '2021-02-05 21:37:38', '2021-05-19 09:14:06'),
(1013, 0, 'fr', '_json', 'Please select country first', 'Veuillez d\'abord sélectionner le pays', '2021-02-05 21:37:38', '2021-05-19 09:14:06'),
(1014, 0, 'fr', '_json', 'Star', 'Étoile', '2021-02-05 21:37:38', '2021-05-19 09:14:06'),
(1015, 0, 'fr', '_json', 'Add New Booking', 'Ajouter une nouvelle réservation', '2021-02-05 21:37:38', '2021-05-19 09:14:06'),
(1016, 0, 'fr', '_json', 'Add new Post', 'Ajouter un nouveau post', '2021-02-05 21:37:38', '2021-05-19 09:14:06'),
(1017, 0, 'fr', '_json', 'Add new Testimonial', 'Ajouter un témoignage', '2021-02-05 21:37:38', '2021-05-19 09:14:06'),
(1018, 0, 'fr', '_json', 'New user', 'Nouvelle Utilisateur', '2021-02-05 21:37:38', '2021-05-19 09:14:06'),
(1019, 0, 'fr', '_json', 'Add New User', 'Ajouter un nouvel utilisateur', '2021-02-05 21:37:38', '2021-05-19 09:14:06'),
(1020, 0, 'fr', '_json', 'and', 'et', '2021-02-05 21:37:38', '2021-05-19 09:14:06'),
(1021, 0, 'fr', '_json', 'Account Management', 'Gestion des Comptes', '2021-02-05 21:37:38', '2021-05-19 09:14:06'),
(1022, 0, 'fr', '_json', 'New Sale', 'Nouvelle Vente', '2021-02-05 21:37:38', '2021-05-19 09:14:06'),
(1023, 0, 'fr', '_json', 'New Supplier', 'Nouveau Fournisseur', '2021-02-05 21:37:38', '2021-05-19 09:14:06'),
(1024, 0, 'fr', '_json', 'Create Booking', 'Ajouter une Réservation', '2021-02-05 21:37:38', '2021-05-19 09:14:06'),
(1025, 0, 'fr', '_json', 'Edit Page', 'Modifier la page', '2021-02-05 21:37:38', '2021-05-19 09:14:06'),
(1026, 0, 'fr', '_json', 'Purchase Status', 'Status d\'Achat', '2021-02-05 21:37:38', '2021-05-19 09:14:06'),
(1027, 0, 'fr', '_json', 'Add testimonial', 'Ajouter un témoignage', '2021-02-05 21:37:39', '2021-05-19 09:14:06'),
(1028, 0, 'fr', '_json', 'Password', 'Mot de passe', '2021-02-05 21:37:39', '2021-05-19 09:14:06'),
(1029, 0, 'fr', '_json', 'Edit User', 'Modifier l\'utilisateur', '2021-02-05 21:37:39', '2021-05-19 09:14:06'),
(1030, 0, 'fr', '_json', 'View all', 'Voir tout', '2021-02-05 21:37:39', '2021-05-19 09:14:06'),
(1031, 0, 'fr', '_json', 'Subtotal', 'Sous Total', '2021-02-05 21:37:39', '2021-05-19 09:14:06'),
(1032, 0, 'fr', '_json', 'Continue Shopping', 'Continuer votre achat', '2021-02-05 21:37:39', '2021-05-19 09:14:06'),
(1033, 0, 'fr', '_json', 'Add Page', 'Ajouter une page', '2021-02-05 21:37:39', '2021-05-19 09:14:06'),
(1034, 0, 'fr', '_json', 'City?', 'Ville?', '2021-02-05 21:37:39', '2021-05-19 09:14:06'),
(1035, 0, 'fr', '_json', 'Select Activity', 'Sélection d\'Activité', '2021-02-05 21:37:39', '2021-05-19 09:14:06'),
(1036, 0, 'fr', '_json', 'Role', 'Rôle', '2021-02-05 21:37:39', '2021-05-19 09:14:06'),
(1037, 0, 'fr', '_json', 'Wholeseller', 'Fournisseur', '2021-02-05 21:37:39', '2021-05-19 09:14:06'),
(1038, 0, 'fr', '_json', 'Where are you going?', 'Où allez vous ?', '2021-02-05 21:37:39', '2021-05-19 09:14:06'),
(1039, 0, 'fr', '_json', 'Visitor', 'Visiteur', '2021-02-05 21:37:39', '2021-05-19 09:14:06'),
(1040, 0, 'fr', '_json', 'time', 'temp', '2021-02-05 21:37:39', '2021-05-19 09:14:06'),
(1041, 0, 'fr', '_json', 'Home Page', 'Accueil', '2021-02-05 21:37:39', '2021-05-19 09:14:06'),
(1042, 0, 'fr', '_json', 'Add new Page', 'Ajouter une nouvelle page', '2021-02-05 21:37:39', '2021-05-19 09:14:06'),
(1043, 0, 'fr', '_json', 'Booking Now', 'Réservez maintenant', '2021-02-05 21:37:39', '2021-05-19 09:14:06'),
(1044, 0, 'fr', '_json', 'All Activities', 'Toutes les activités', '2021-02-05 21:37:39', '2021-05-19 09:14:06'),
(1045, 0, 'fr', '_json', 'Is Admin', 'est Admin', '2021-02-05 21:37:39', '2021-05-19 09:14:06'),
(1046, 0, 'fr', '_json', 'Accept the', 'Accepter', '2021-02-05 21:37:39', '2021-05-19 09:14:06'),
(1047, 0, 'fr', '_json', 'Latest Stories', 'Derniers Articles', '2021-02-05 21:37:39', '2021-05-19 09:14:06'),
(1048, 0, 'en', '_json', 'VILLES A VOIR', 'VILLES A VOIR', '2021-02-07 11:36:46', '2021-05-19 09:14:06'),
(1049, 0, 'en', '_json', '404 Error', '404 Error', '2021-02-07 11:37:54', '2021-05-19 09:14:06'),
(1050, 0, 'fr', '_json', 'ACTIVE', 'ACTIF', '2021-02-07 19:24:12', '2021-05-19 09:14:06'),
(1051, 0, 'fr', '_json', 'Activity List', 'Liste d\'activités', '2021-02-07 19:24:12', '2021-05-19 09:14:06'),
(1052, 0, 'fr', '_json', 'Adult', 'Adulte', '2021-02-07 19:24:12', '2021-05-19 09:14:06'),
(1053, 0, 'fr', '_json', 'Affiliate Banner Ads', 'Annonces de bannière d\'affiliation', '2021-02-07 19:24:12', '2021-05-19 09:14:06'),
(1054, 0, 'fr', '_json', 'Agent', 'Agent', '2021-02-07 19:24:12', '2021-05-19 09:14:06'),
(1055, 0, 'fr', '_json', 'Amenities List', 'Liste des Services', '2021-02-07 19:24:12', '2021-05-19 09:14:06'),
(1056, 0, 'fr', '_json', 'BEST OFFERS', 'Meilleures offres', '2021-02-07 19:24:12', '2021-05-19 09:14:06'),
(1057, 0, 'fr', '_json', 'Banner image', 'Image de bannière', '2021-02-07 19:24:12', '2021-05-19 09:14:06'),
(1058, 0, 'fr', '_json', 'Banner link', 'Lien de bannière', '2021-02-07 19:24:13', '2021-05-19 09:14:06'),
(1059, 0, 'fr', '_json', 'Book Flight Tickets', 'Réserver un billet d\'avion', '2021-02-07 19:24:13', '2021-05-19 09:14:06'),
(1060, 0, 'fr', '_json', 'Book Hotel Rooms', 'Réserver des chambres d\'hôtel', '2021-02-07 19:24:13', '2021-05-19 09:14:06'),
(1061, 0, 'fr', '_json', 'Cabin', 'Cabine', '2021-02-07 19:24:13', '2021-05-19 09:14:06'),
(1062, 0, 'fr', '_json', 'Categories', 'Catégories', '2021-02-07 19:24:13', '2021-05-19 09:14:06'),
(1063, 0, 'fr', '_json', 'Categories List', 'Liste des catégories', '2021-02-07 19:24:13', '2021-05-19 09:14:06'),
(1064, 0, 'fr', '_json', 'Category name', 'Nom de l\'activité', '2021-02-07 19:24:13', '2021-05-19 09:14:06'),
(1065, 0, 'fr', '_json', 'CheckIn', 'Enregistrement', '2021-02-07 19:24:13', '2021-05-19 09:14:06'),
(1066, 0, 'fr', '_json', 'CheckOut', 'Check-out', '2021-02-07 19:24:13', '2021-05-19 09:14:06'),
(1067, 0, 'fr', '_json', 'Child', 'Enfant', '2021-02-07 19:24:13', '2021-05-19 09:14:06'),
(1068, 0, 'fr', '_json', 'Children', 'Enfants', '2021-02-07 19:24:13', '2021-05-19 09:14:06'),
(1069, 0, 'fr', '_json', 'Cities', 'Villes', '2021-02-07 19:24:13', '2021-05-19 09:14:06'),
(1070, 0, 'fr', '_json', 'Cities List', 'Liste des villes', '2021-02-07 19:24:13', '2021-05-19 09:14:06'),
(1071, 0, 'fr', '_json', 'Contact form', 'Formulaire de contact', '2021-02-07 19:24:13', '2021-05-19 09:14:06'),
(1072, 0, 'fr', '_json', 'Countries List', 'Liste des pays', '2021-02-07 19:24:13', '2021-05-19 09:14:06'),
(1073, 0, 'fr', '_json', 'Departure Airport', 'Aéroport de départ', '2021-02-07 19:24:14', '2021-05-19 09:14:06'),
(1074, 0, 'fr', '_json', 'Departure City', 'Ville de départ', '2021-02-07 19:24:14', '2021-05-19 09:14:06'),
(1075, 0, 'fr', '_json', 'Departure Date', 'Date de départ', '2021-02-07 19:24:14', '2021-05-19 09:14:06'),
(1076, 0, 'fr', '_json', 'Destination Airport', 'Aéroport de destination', '2021-02-07 19:24:14', '2021-05-19 09:14:06'),
(1077, 0, 'fr', '_json', 'Destination City', 'Destination', '2021-02-07 19:24:14', '2021-05-19 09:14:06'),
(1078, 0, 'fr', '_json', 'Detail', 'Détails', '2021-02-07 19:24:14', '2021-05-19 09:14:06'),
(1079, 0, 'fr', '_json', 'Edit place', 'Modifier le lieu', '2021-02-07 19:24:14', '2021-05-19 09:14:06'),
(1080, 0, 'fr', '_json', 'Edit testimonial', 'Modifier le témoignage', '2021-02-07 19:24:14', '2021-05-19 09:14:06'),
(1081, 0, 'fr', '_json', 'Find Cheap Flights', 'Trouver des vols pas chers', '2021-02-07 19:24:14', '2021-05-19 09:14:06'),
(1082, 0, 'fr', '_json', 'Gallery images', 'Images de la galerie', '2021-02-07 19:24:14', '2021-05-19 09:14:06'),
(1083, 0, 'fr', '_json', 'Hightlight', 'Hightlight', '2021-02-07 19:24:14', '2021-05-19 09:14:06'),
(1084, 0, 'fr', '_json', 'I Want To Go', 'Je veux y aller', '2021-02-07 19:24:14', '2021-05-19 09:14:06'),
(1085, 0, 'fr', '_json', 'ID', 'ID', '2021-02-07 19:24:14', '2021-05-19 09:14:06'),
(1086, 0, 'fr', '_json', 'INACTIVE', 'INACTIF', '2021-02-07 19:24:15', '2021-05-19 09:14:06'),
(1087, 0, 'fr', '_json', 'Infants', 'Les bébés', '2021-02-07 19:24:15', '2021-05-19 09:14:06'),
(1088, 0, 'fr', '_json', 'Is feature', 'Vedette', '2021-02-07 19:24:15', '2021-05-19 09:14:06'),
(1089, 0, 'fr', '_json', 'Job title', 'Profession', '2021-02-07 19:24:15', '2021-05-19 09:14:06'),
(1090, 0, 'fr', '_json', 'Latest Booking', 'Dernière réservation', '2021-02-07 19:24:15', '2021-05-19 09:14:06'),
(1091, 0, 'fr', '_json', 'Multi Destination', 'Multi-Destinations', '2021-02-07 19:24:15', '2021-05-19 09:14:06'),
(1092, 0, 'fr', '_json', 'Number of adult', 'Nombre d\'adultes', '2021-02-07 19:24:15', '2021-05-19 09:14:06'),
(1093, 0, 'fr', '_json', 'One Way', 'Aller simple', '2021-02-07 19:24:15', '2021-05-19 09:14:06'),
(1094, 0, 'fr', '_json', 'Opening hours', 'Horaires d\'ouvertures', '2021-02-07 19:24:15', '2021-05-19 09:14:06'),
(1095, 0, 'fr', '_json', 'Place List', 'Liste des Destinations', '2021-02-07 19:24:16', '2021-05-19 09:14:06'),
(1096, 0, 'fr', '_json', 'Place type', 'Type de lieu', '2021-02-07 19:24:16', '2021-05-19 09:14:06'),
(1097, 0, 'fr', '_json', 'Price range', 'Échelle des prix', '2021-02-07 19:24:16', '2021-05-19 09:14:06'),
(1098, 0, 'fr', '_json', 'Return Date', 'Date de retour', '2021-02-07 19:24:16', '2021-05-19 09:14:06'),
(1099, 0, 'fr', '_json', 'Reviewer', 'Critique', '2021-02-07 19:24:16', '2021-05-19 09:14:06'),
(1100, 0, 'fr', '_json', 'Reviews', 'Avis', '2021-02-07 19:24:16', '2021-05-19 09:14:06'),
(1101, 0, 'fr', '_json', 'Round Trip', 'Aller-retour', '2021-02-07 19:24:16', '2021-05-19 09:14:06'),
(1102, 0, 'fr', '_json', 'Search Flights', 'Recherche de vols', '2021-02-07 19:24:16', '2021-05-19 09:14:06'),
(1103, 0, 'fr', '_json', 'Search address...', 'Rechercher une adresse ...', '2021-02-07 19:24:17', '2021-05-19 09:14:06'),
(1104, 0, 'fr', '_json', 'Search city location...', 'Rechercher un emplacement dans la ville ...', '2021-02-07 19:24:17', '2021-05-19 09:14:06'),
(1105, 0, 'fr', '_json', 'Select Country', 'Choisissez le pays', '2021-02-07 19:24:17', '2021-05-19 09:14:06'),
(1106, 0, 'fr', '_json', 'Thumbnail image', 'Image miniature', '2021-02-07 19:24:17', '2021-05-19 09:14:06'),
(1107, 0, 'fr', '_json', 'Time', 'Temps', '2021-02-07 19:24:17', '2021-05-19 09:14:06'),
(1108, 0, 'fr', '_json', 'Time to visit', 'Temps de visiter', '2021-02-07 19:24:17', '2021-05-19 09:14:06'),
(1109, 0, 'fr', '_json', 'VILLES A VOIR', 'VILLES A VOIR', '2021-02-07 19:24:17', '2021-05-19 09:14:06'),
(1110, 0, 'fr', '_json', 'We are finding the cheapest available flights for you. Hold on for some seconds', 'Nous recherchons pour vous les vols disponibles les moins chers. Attends quelques secondes', '2021-02-07 19:24:18', '2021-05-19 09:14:06'),
(1111, 0, 'fr', '_json', 'below 2yrs', 'en dessous de 2 ans', '2021-02-07 19:24:18', '2021-05-19 09:14:06'),
(1113, 0, 'en', '_json', 'Accept the', 'ACCEPT THE', '2021-02-07 19:33:20', '2021-05-19 09:14:06'),
(1114, 0, 'en', '_json', 'Add New', 'ADD NEW', '2021-02-07 19:33:20', '2021-05-19 09:14:06'),
(1115, 0, 'en', '_json', 'Add Post', 'ADD POST', '2021-02-07 19:33:20', '2021-05-19 09:14:06'),
(1116, 0, 'en', '_json', 'Add new Post', 'ADD NEW POST', '2021-02-07 19:33:20', '2021-05-19 09:14:06'),
(1117, 0, 'en', '_json', 'Affiliate Book Buttons', 'AFFILIATE BOOK BUTTONS', '2021-02-07 19:33:21', '2021-05-19 09:14:06'),
(1118, 0, 'en', '_json', 'Basic Info', 'BASIC INFO', '2021-02-07 19:33:21', '2021-05-19 09:14:06'),
(1119, 0, 'en', '_json', 'Booking Make', 'BOOKING MAKE', '2021-02-07 19:33:21', '2021-05-19 09:14:06'),
(1120, 0, 'en', '_json', 'Business Listing', 'BUSINESS LISTING', '2021-02-07 19:33:21', '2021-05-19 09:14:06'),
(1121, 0, 'en', '_json', 'By clicking Register you agree to the', 'BY CLICKING REGISTER YOU AGREE TO THE', '2021-02-07 19:33:22', '2021-05-19 09:14:06'),
(1122, 0, 'en', '_json', 'Change Password', 'CHANGE PASSWORD', '2021-02-07 19:33:22', '2021-05-19 09:14:06'),
(1123, 0, 'en', '_json', 'Choose the city you\'ll be living in next', 'CHOOSE THE CITY YOU\'LL BE LIVING IN NEXT', '2021-02-07 19:33:22', '2021-05-19 09:14:06'),
(1124, 0, 'en', '_json', 'Choose your next destination', 'Choose your next destination', '2021-02-07 19:33:22', '2021-05-19 09:14:06'),
(1125, 0, 'en', '_json', 'Continue Shopping', 'CONTINUE SHOPPING', '2021-02-07 19:33:22', '2021-05-19 09:14:06'),
(1126, 0, 'en', '_json', 'Continue with', 'CONTINUE WITH', '2021-02-07 19:33:22', '2021-05-19 09:14:06'),
(1127, 0, 'en', '_json', 'Destinations', 'DESTINATIONS', '2021-02-07 19:33:23', '2021-05-19 09:14:06'),
(1128, 0, 'en', '_json', 'Download the app and go to travel the world.', 'DOWNLOAD THE APP AND GO TO TRAVEL THE WORLD.', '2021-02-07 19:33:23', '2021-05-19 09:14:06'),
(1129, 0, 'en', '_json', 'Enter facebook', 'ENTER FACEBOOK', '2021-02-07 19:33:23', '2021-05-19 09:14:06'),
(1130, 0, 'en', '_json', 'Enter instagram', 'ENTER INSTAGRAM', '2021-02-07 19:33:23', '2021-05-19 09:14:06'),
(1131, 0, 'en', '_json', 'Enter old password', 'ENTER OLD PASSWORD', '2021-02-07 19:33:23', '2021-05-19 09:14:06'),
(1132, 0, 'en', '_json', 'Enter phone number', 'ENTER PHONE NUMBER', '2021-02-07 19:33:23', '2021-05-19 09:14:06'),
(1133, 0, 'en', '_json', 'Enter your name', 'ENTER YOUR NAME', '2021-02-07 19:33:23', '2021-05-19 09:14:06'),
(1134, 0, 'en', '_json', 'Explore the world', 'EXPLORE THE WORLD', '2021-02-07 19:33:23', '2021-05-19 09:14:06'),
(1135, 0, 'en', '_json', 'Facebook', 'FACEBOOK', '2021-02-07 19:33:23', '2021-05-19 09:14:06'),
(1136, 0, 'en', '_json', 'Faqs', 'FAQS', '2021-02-07 19:33:23', '2021-05-19 09:14:06'),
(1137, 0, 'en', '_json', 'Featured Cities', 'FEATURED CITIES', '2021-02-07 19:33:23', '2021-05-19 09:14:06'),
(1138, 0, 'en', '_json', 'Forgot password', 'FORGOT PASSWORD', '2021-02-07 19:33:23', '2021-05-19 09:14:06'),
(1139, 0, 'en', '_json', 'From Our Blog', 'FROM OUR BLOG', '2021-02-07 19:33:23', '2021-05-19 09:14:06'),
(1140, 0, 'en', '_json', 'Full name', 'FULL NAME', '2021-02-07 19:33:23', '2021-05-19 09:14:06'),
(1141, 0, 'en', '_json', 'Get the App', 'GET THE APP', '2021-02-07 19:33:24', '2021-05-19 09:14:06'),
(1142, 0, 'en', '_json', 'Homepage', 'HOMEPAGE', '2021-02-07 19:33:24', '2021-05-19 09:14:06'),
(1143, 0, 'en', '_json', 'Instagram', 'INSTAGRAM', '2021-02-07 19:33:24', '2021-05-19 09:14:06'),
(1144, 0, 'en', '_json', 'Latest Stories', 'LATEST STORIES', '2021-02-07 19:33:24', '2021-05-19 09:14:06'),
(1145, 0, 'en', '_json', 'Learn More', 'LEARN MORE', '2021-02-07 19:33:24', '2021-05-19 09:14:06'),
(1146, 0, 'en', '_json', 'Log In', 'LOG IN', '2021-02-07 19:33:24', '2021-05-19 09:14:06'),
(1147, 0, 'en', '_json', 'Lost your password? Please enter your email address. You will receive a link to create a new password via email.', 'LOST YOUR PASSWORD? PLEASE ENTER YOUR EMAIL ADDRESS. YOU WILL RECEIVE A LINK TO CREATE A NEW PASSWORD VIA EMAIL.', '2021-02-07 19:33:24', '2021-05-19 09:14:06'),
(1148, 0, 'en', '_json', 'Make sure you\'ve typed in the URL correctly or try go', 'MAKE SURE YOU\'VE TYPED IN THE URL CORRECTLY OR TRY GO', '2021-02-07 19:33:24', '2021-05-19 09:14:06'),
(1149, 0, 'en', '_json', 'My Places', 'MY PLACES', '2021-02-07 19:33:25', '2021-05-19 09:14:06'),
(1150, 0, 'en', '_json', 'Old password', 'OLD PASSWORD', '2021-02-07 19:33:25', '2021-05-19 09:14:06'),
(1151, 0, 'en', '_json', 'Or', 'OR', '2021-02-07 19:33:25', '2021-05-19 09:14:06'),
(1152, 0, 'en', '_json', 'Paris', 'PARIS', '2021-02-07 19:33:25', '2021-05-19 09:14:06'),
(1153, 0, 'en', '_json', 'Popular cities', 'POPULAR CITIES', '2021-02-07 19:33:26', '2021-05-19 09:14:06'),
(1154, 0, 'en', '_json', 'Popular:', 'POPULAR:', '2021-02-07 19:33:26', '2021-05-19 09:14:06'),
(1155, 0, 'en', '_json', 'Posts', 'POSTS', '2021-02-07 19:33:26', '2021-05-19 09:14:06'),
(1156, 0, 'en', '_json', 'Profile Setting', 'PROFILE SETTING', '2021-02-07 19:33:26', '2021-05-19 09:14:06'),
(1157, 0, 'en', '_json', 'Purchase Status', 'PURCHASE STATUS', '2021-02-07 19:33:26', '2021-05-19 09:14:06'),
(1158, 0, 'en', '_json', 'Related stories', 'RELATED STORIES', '2021-02-07 19:33:26', '2021-05-19 09:14:06'),
(1159, 0, 'en', '_json', 'Search places ...', 'SEARCH PLACES ...', '2021-02-07 19:33:26', '2021-05-19 09:14:06'),
(1160, 0, 'en', '_json', 'Sorry we couldn\'t find that page.', 'SORRY WE COULDN\'T FIND THAT PAGE.', '2021-02-07 19:33:27', '2021-05-19 09:14:06'),
(1161, 0, 'en', '_json', 'Subtotal', 'SUBTOTAL', '2021-02-07 19:33:27', '2021-05-19 09:14:06'),
(1162, 0, 'en', '_json', 'The Admin Site is an area which only the administrator​ can access. From here you can manage (delete edit create) places categories cities country manage users review booking...', 'THE ADMIN SITE IS AN AREA WHICH ONLY THE ADMINISTRATOR​ CAN ACCESS. FROM HERE YOU CAN MANAGE (DELETE EDIT CREATE) PLACES CATEGORIES CITIES COUNTRY MANAGE USERS REVIEW BOOKING...', '2021-02-07 19:33:27', '2021-05-19 09:14:06'),
(1163, 0, 'en', '_json', 'Trending Business Places', 'TRENDING BUSINESS PLACES', '2021-02-07 19:33:27', '2021-05-19 09:14:06'),
(1164, 0, 'en', '_json', 'Type a city or location', 'TYPE A CITY OR LOCATION', '2021-02-07 19:33:27', '2021-05-19 09:14:06'),
(1165, 0, 'en', '_json', 'Upload new', 'UPLOAD NEW', '2021-02-07 19:33:28', '2021-05-19 09:14:06'),
(1166, 0, 'en', '_json', 'View all', 'VIEW ALL', '2021-02-07 19:33:28', '2021-05-19 09:14:06'),
(1167, 0, 'en', '_json', 'View more', 'VIEW MORE', '2021-02-07 19:33:28', '2021-05-19 09:14:06'),
(1168, 0, 'en', '_json', 'We can\'t find the page or studio you\'re looking for.', 'WE CAN\'T FIND THE PAGE OR STUDIO YOU\'RE LOOKING FOR.', '2021-02-07 19:33:28', '2021-05-19 09:14:06'),
(1169, 0, 'en', '_json', 'We\'re sorry but we do not have any listings matching your search try to change you search settings', 'WE\'RE SORRY BUT WE DO NOT HAVE ANY LISTINGS MATCHING YOUR SEARCH TRY TO CHANGE YOU SEARCH SETTINGS', '2021-02-07 19:33:28', '2021-05-19 09:14:06'),
(1170, 0, 'en', '_json', 'Welcome to Admin Dashboard.', 'WELCOME TO ADMIN DASHBOARD.', '2021-02-07 19:33:28', '2021-05-19 09:14:06'),
(1171, 0, 'en', '_json', 'Your Booking is Pending We Will Contact You as Soon as Possible.', 'YOUR BOOKING IS PENDING WE WILL CONTACT YOU AS SOON AS POSSIBLE.', '2021-02-07 19:33:28', '2021-05-19 09:14:06'),
(1172, 0, 'en', '_json', 'Youtube Vimeo video url', 'YOUTUBE VIMEO VIDEO URL', '2021-02-07 19:33:28', '2021-05-19 09:14:06'),
(1173, 0, 'en', '_json', 'and', 'AND', '2021-02-07 19:33:28', '2021-05-19 09:14:06'),
(1174, 0, 'en', '_json', 'categories', 'CATEGORIES', '2021-02-07 19:33:28', '2021-05-19 09:14:06'),
(1175, 0, 'en', '_json', 'set out by this site including our Cookie Use.', 'SET OUT BY THIS SITE INCLUDING OUR COOKIE USE.', '2021-02-07 19:33:28', '2021-05-19 09:14:06'),
(1177, 0, 'en', '_json', 'Sorry, we couldn\'t find that page.', 'Sorry, we couldn\'t find that page.', '2021-02-07 19:34:52', '2021-05-19 09:14:06'),
(1178, 0, 'en', '_json', 'The Admin Site is an area which only the administrator​ can access. From here you can manage (delete, edit, create) places, categories, cities, country, manage users, review, booking...', 'The Admin Site is an area which only the administrator​ can access. From here you can manage (delete, edit, create) places, categories, cities, country, manage users, review, booking...', '2021-02-07 19:35:00', '2021-05-19 09:14:06'),
(1179, 0, 'fr', '_json', 'Youtube Vimeo video url', 'Youtube Vimeo video url', '2021-02-07 19:35:27', '2021-05-19 09:14:06'),
(1180, 0, 'fr', '_json', 'Your Booking is Pending We Will Contact You as Soon as Possible.', 'Votre réservation est en attente Nous vous contacterons dès que possible.', '2021-02-11 19:51:01', '2021-05-19 09:14:06'),
(1181, 0, 'fr', '_json', 'We\'re sorry but we do not have any listings matching your search try to change you search settings', 'Nous sommes désolés, mais nous n\'avons aucune annonce correspondant à votre recherche. Essayez de modifier vos paramètres de recherche', '2021-02-11 19:51:14', '2021-05-19 09:14:06'),
(1182, 0, 'fr', '_json', 'Sorry we couldn\'t find that page.', 'Désolé, nous n\'avons pas pu trouver cette page.', '2021-02-11 19:51:30', '2021-05-19 09:14:06'),
(1185, 0, 'fr', '_json', 'Sur Name', 'Nom', '2021-02-11 19:51:59', '2021-05-19 09:14:06'),
(1187, 0, 'fr', '_json', 'Valid Email', 'Email Valide', '2021-02-11 19:51:59', '2021-05-19 09:14:06'),
(1192, 0, 'fr', '_json', 'Add new', 'Ajouter', '2021-02-11 19:51:59', '2021-05-19 09:14:06'),
(1198, 0, 'fr', '_json', 'Client infos', 'infos client', '2021-02-11 19:51:59', '2021-05-19 09:14:06'),
(1203, 0, 'fr', '_json', 'Itinerary', 'itinéraires', '2021-02-11 19:51:59', '2021-05-19 09:14:06'),
(1204, 0, 'fr', '_json', 'Included', 'Inclus', '2021-02-11 19:51:59', '2021-05-19 09:14:06'),
(1206, 0, 'fr', '_json', 'Guest', 'Nombre de Visiteurs', '2021-02-11 19:51:59', '2021-05-19 09:14:06'),
(1207, 0, 'fr', '_json', 'Enter your phone', 'Entrez votre numéro', '2021-02-11 19:51:59', '2021-05-19 09:14:06'),
(1208, 0, 'fr', '_json', 'Enter your message', 'Entrez votre message', '2021-02-11 19:51:59', '2021-05-19 09:14:06'),
(1211, 0, 'fr', '_json', 'Search Hotels', 'Recherche des Hotels', '2021-02-11 19:51:59', '2021-05-19 09:14:06'),
(1213, 0, 'fr', '_json', 'Obtenir l\'application', 'Obtenir l\'application', '2021-02-11 19:52:00', '2021-05-19 09:14:06'),
(1216, 0, 'fr', '_json', 'Hello', 'Bonjour', '2021-02-11 19:52:00', '2021-05-19 09:14:06'),
(1218, 0, 'fr', '_json', 'Online', 'En ligne', '2021-02-11 19:52:00', '2021-05-19 09:14:06'),
(1220, 0, 'fr', '_json', 'My Transactions', 'Mes Transactions', '2021-02-11 19:52:00', '2021-05-19 09:14:06'),
(1221, 0, 'fr', '_json', 'Hi,', 'Bonjour,', '2021-02-11 19:52:00', '2021-05-19 09:14:06'),
(1222, 0, 'fr', '_json', 'By clicking Register you agree to the', 'En cliquant sur S\'inscrire, vous acceptez les', '2021-02-11 19:52:33', '2021-05-19 09:14:06'),
(1223, 0, 'en', '_json', 'Client infos', 'Client infos', '2021-02-11 19:52:43', '2021-05-19 09:14:06'),
(1224, 0, 'en', '_json', 'Enter your message', 'Enter your message', '2021-02-11 19:53:53', '2021-05-19 09:14:06'),
(1225, 0, 'en', '_json', 'Enter your phone', 'Enter your phone', '2021-02-11 19:53:57', '2021-05-19 09:14:06'),
(1226, 0, 'en', '_json', 'Hello', 'Hello', '2021-02-11 19:54:07', '2021-05-19 09:14:06'),
(1227, 0, 'en', '_json', 'Search Hotels', 'Search Hotels', '2021-02-11 19:57:13', '2021-05-19 09:14:06'),
(1228, 0, 'fr', '_json', 'Cities to visit', 'Villes à visiter', '2021-02-11 20:39:17', '2021-05-19 09:14:06'),
(1230, 0, 'en', '_json', 'Cities to visit', 'Cities to visit', '2021-02-11 20:40:51', '2021-05-19 09:14:06'),
(1231, 0, 'fr', '_json', 'Sign up to receive our best offers.', 'Inscrivez-vous pour recevoir nos meilleures offres.', '2021-02-11 21:13:06', '2021-05-19 09:14:06'),
(1232, 0, 'en', '_json', 'Sign up to receive our best offers.', 'Sign up to receive our best offers.', '2021-02-11 21:13:16', '2021-05-19 09:14:06'),
(1233, 0, 'fr', '_json', 'Vats Management', 'Gestion de la TAX', '2021-02-12 16:03:30', '2021-05-19 09:14:06'),
(1237, 0, 'fr', '_json', 'Vat List', 'List TVA', '2021-02-12 16:03:30', '2021-05-19 09:14:06'),
(1240, 0, 'fr', '_json', 'Contact information', 'Informations de contact', '2021-02-12 16:03:31', '2021-05-19 09:14:06'),
(1241, 0, 'fr', '_json', 'Manage Pages', 'Gérer les pages', '2021-02-12 16:03:31', '2021-05-19 09:14:06'),
(1242, 0, 'fr', '_json', 'Administration', 'Administration', '2021-02-12 16:03:31', '2021-05-19 09:14:06'),
(1243, 0, 'en', '_json', 'Administration', 'Administration', '2021-02-12 16:03:54', '2021-05-19 09:14:06'),
(1244, 0, 'en', '_json', 'Manage Pages', 'Manage Pages', '2021-02-15 15:16:29', '2021-05-19 09:14:06'),
(1245, 0, 'en', '_json', 'Included', 'Included', '2021-02-15 15:33:06', '2021-05-19 09:14:06'),
(1246, 0, 'en', '_json', 'My Transactions', 'My Transactions', '2021-02-15 15:33:53', '2021-05-19 09:14:06'),
(1247, 0, 'en', '_json', 'Obtenir l\'application', 'Get the application', '2021-02-15 15:34:35', '2021-05-19 09:14:06'),
(1248, 0, 'en', '_json', 'Vat List', 'Vat List', '2021-02-15 15:37:07', '2021-05-19 09:14:06'),
(1249, 0, 'en', '_json', 'Vats Management', 'Vats Management', '2021-02-15 15:37:43', '2021-05-19 09:14:06'),
(1250, 0, 'en', '_json', 'Transactions', 'Transactions', '2021-02-15 15:37:50', '2021-05-19 09:14:06'),
(1251, 0, 'en', '_json', 'Terms & Conditions', 'Terms & Conditions', '2021-02-15 15:37:58', '2021-05-19 09:14:06'),
(1252, 0, 'en', '_json', 'Sur Name', 'Name', '2021-02-15 15:38:08', '2021-05-19 09:14:06'),
(1254, 0, 'fr', '_json', 'Enter Day', 'Entez le jour', '2021-02-15 20:08:34', '2021-05-19 09:14:06'),
(1255, 0, 'fr', '_json', 'Save here and book later', 'Enregistrer ici et réservez plus tard', '2021-02-15 20:08:34', '2021-05-19 09:14:06'),
(1256, 0, 'fr', '_json', 'Quick Links', 'Liens Rapides', '2021-02-15 20:08:34', '2021-05-19 09:14:06'),
(1257, 0, 'en', '_json', 'Quick Links', 'Quick Links', '2021-02-15 20:10:23', '2021-05-19 09:14:06'),
(1258, 0, 'fr', '_json', 'account', 'Compte', '2021-02-15 20:18:57', '2021-05-19 09:14:06'),
(1259, 0, 'en', '_json', 'account', 'Account', '2021-02-15 20:19:54', '2021-05-19 09:14:06'),
(1260, 0, 'en', '_json', 'Hi,', 'Hi,', '2021-02-16 16:37:53', '2021-05-19 09:14:06'),
(1261, 0, 'en', '_json', 'Valid Email', 'Valid Email', '2021-02-16 19:43:33', '2021-05-19 09:14:06'),
(1262, 0, 'fr', '_json', 'Lundi - Vendredi', 'Lundi - Vendredi', '2021-02-16 19:51:45', '2021-05-19 09:14:06'),
(1263, 0, 'fr', '_json', 'Booking list', 'Liste des réservations', '2021-02-16 19:51:45', '2021-05-19 09:14:06'),
(1264, 0, 'fr', '_json', 'Clear Cache', 'Vider le cache', '2021-02-16 19:51:46', '2021-05-19 09:14:06'),
(1266, 0, 'en', '_json', 'Itinerary', 'Itinerary', '2021-02-16 19:52:41', '2021-05-19 09:14:06'),
(1267, 0, 'en', '_json', 'Lundi - Vendredi', 'Monday - Friday', '2021-02-16 19:53:21', '2021-05-19 09:14:06'),
(1269, 0, 'fr', '_json', 'Choose between hundred places', 'Choisissez entre une centaine de destinations', '2021-02-17 15:50:22', '2021-05-19 09:14:06'),
(1270, 0, 'fr', '_json', 'Home', 'Accueil', '2021-02-17 15:50:22', '2021-05-19 09:14:06'),
(1273, 0, 'fr', '_json', 'Rentacstours, motocycle rental company and tour operator, located in Casablanca, relies on\n                            the technical know-how and years of experience acquired from EagleRider, a world leader\n                            company since 1992. Rentacstours was created by 2 motorcycle enthusiasts and HOG Harley\n                            Davidson road team certified.', 'Rentacstours, société de location de motos et tour opérateur, située à Casablanca, s\'appuie sur le savoir-faire technique et les années d\'expérience acquises auprès d\'EagleRider, leader mondial depuis 1992. Rentacstours a été créée par 2 passionnés de moto et certifiés HOG Harley Davidson road team.', '2021-02-17 17:02:21', '2021-05-19 09:14:06'),
(1274, 0, 'fr', '_json', 'Rentacstours, motocycle rental company and tour operator, located in Casablanca, relies on\n                            the technical know-how and years of experience acquired from EagleRider, a world leader\n                            company since 1992. Rentacstours was created by 2 motorcycle enthusiasts and HOG Harley\n                            Davidson road team certified', 'Rentacstours, société de location de motos et tour opérateur, située à Casablanca, s\'appuie sur le savoir-faire technique et les années d\'expérience acquises auprès d\'EagleRider, leader mondial depuis 1992. Rentacstours a été créée par 2 passionnés de moto et certifiés HOG Harley Davidson road team.', '2021-02-17 17:02:38', '2021-05-19 09:14:06'),
(1275, 0, 'fr', '_json', 'Rentacstours about info', 'Fondée par deux bikers passionnés certifiés par HOG Harley-Davidson: Nizar CHAWAD et Mohamed Ali ANOUAR, et profitant de l\'expertise managériale de monsieur Ali Amrani, Rentacstours est aujourd’hui une extension de savoir-faire et une multitude de services sur mesure allant des voyages organisés hôtels, hébergement, vol aux activités de divertissement, sports extrêmes et bien-être Motorcycle, Golf tour, Bivouacs, Trekking, Surf, Yoga .. Nous proposons aussi des services à l’international grâce à la participation de différents partenaires qui ont accepté de prendre part à cette aventure.', '2021-02-17 17:04:05', '2021-05-19 09:14:06'),
(1276, 0, 'en', '_json', 'Rentacstours about info', 'Rentacstours, motocycle rental company and tour operator, located in Casablanca, relies on the technical know-how and years of experience acquired from EagleRider, a world leader company since 1992. Rentacstours was created by 2 motorcycle enthusiasts and HOG Harley Davidson road team certified.', '2021-02-17 17:04:40', '2021-05-19 09:14:06'),
(1277, 0, 'en', '_json', 'Guest', 'Guest', '2021-02-19 20:25:38', '2021-05-19 09:14:06'),
(1280, 0, 'fr', '_json', 'Booking For', 'Réservation pour', '2021-03-01 20:59:32', '2021-05-19 09:14:06'),
(1281, 0, 'fr', '_json', '60 characters or less', '60 caractères ou moins', '2021-03-01 20:59:33', '2021-05-19 09:14:06'),
(1282, 0, 'fr', '_json', '160 characters or less', '160 caractères ou moins', '2021-03-01 20:59:33', '2021-05-19 09:14:06'),
(1283, 0, 'fr', '_json', 'Other Name', 'Nom utilisateur', '2021-03-01 20:59:33', '2021-05-19 09:14:06'),
(1284, 0, 'fr', '_json', 'Add VAT', 'Ajouter la TAX', '2021-03-01 20:59:33', '2021-05-19 09:14:06'),
(1285, 0, 'fr', '_json', 'choose vat type', 'choisir le type de TVA', '2021-03-01 20:59:33', '2021-05-19 09:14:06'),
(1286, 0, 'fr', '_json', 'vat value e.g. 12.00', 'valeur de la tva, par exemple 12,00', '2021-03-01 20:59:33', '2021-05-19 09:14:06'),
(1287, 0, 'fr', '_json', 'Value Type', 'Type de valeur', '2021-03-01 20:59:33', '2021-05-19 09:14:06'),
(1288, 0, 'fr', '_json', 'Value', 'Valeur', '2021-03-01 20:59:33', '2021-05-19 09:14:06'),
(1289, 0, 'fr', '_json', 'Email Subscriptions', 'Inscription des Email', '2021-03-01 20:59:33', '2021-05-19 09:14:06'),
(1290, 0, 'fr', '_json', 'Emails', 'Emails', '2021-03-01 20:59:33', '2021-05-19 09:14:06'),
(1291, 0, 'fr', '_json', 'Menu Management', 'Gestion du Menu', '2021-03-01 20:59:33', '2021-05-19 09:14:06'),
(1292, 0, 'fr', '_json', 'Packages Categories', 'Catégories de paquets', '2021-03-01 20:59:33', '2021-05-19 09:14:06'),
(1293, 0, 'fr', '_json', 'Package Categories', 'Pack d\'activité', '2021-03-01 20:59:33', '2021-05-19 09:14:06'),
(1294, 0, 'fr', '_json', 'Package Category', 'Pack d\'activité', '2021-03-01 20:59:33', '2021-05-19 09:14:06'),
(1295, 0, 'fr', '_json', 'Active', 'Actif', '2021-03-01 20:59:33', '2021-05-19 09:14:06'),
(1296, 0, 'fr', '_json', 'Disabled', 'Désactivé', '2021-03-01 20:59:33', '2021-05-19 09:14:06'),
(1297, 0, 'fr', '_json', 'Edit package category', 'Modifier la catégorie de paquet', '2021-03-01 20:59:33', '2021-05-19 09:14:06'),
(1298, 0, 'fr', '_json', 'Open hourses', 'Heures d\'ouverture', '2021-03-01 20:59:33', '2021-05-19 09:14:06'),
(1299, 0, 'fr', '_json', 'BOOKING TYPE', 'Type de Réservation', '2021-03-01 20:59:33', '2021-05-19 09:14:06'),
(1300, 0, 'fr', '_json', 'City name', 'Nom de la ville', '2021-03-01 20:59:33', '2021-05-19 09:14:06'),
(1301, 0, 'fr', '_json', 'Package Itinerary', 'Pack Itineraire', '2021-03-01 20:59:33', '2021-05-19 09:14:06'),
(1302, 0, 'fr', '_json', 'Opening Hours', 'Horaires d\'ouvertures', '2021-03-01 20:59:33', '2021-05-19 09:14:06'),
(1303, 0, 'fr', '_json', 'Airport or City Name', 'Airport ou nom de la Ville', '2021-03-01 20:59:33', '2021-05-19 09:14:06'),
(1304, 0, 'fr', '_json', 'E.g. City, Airport', 'Par exemple, ville, aéroport', '2021-03-01 20:59:33', '2021-05-19 09:14:06'),
(1305, 0, 'fr', '_json', 'Téléchargez l\'application et partez parcourir le monde.', 'Download the application and travel the world.', '2021-03-01 20:59:33', '2021-05-19 09:14:06'),
(1307, 0, 'fr', '_json', 'Offline(Bank)', 'T/T (Banque)', '2021-03-01 20:59:34', '2021-05-19 09:14:06'),
(1308, 0, 'fr', '_json', 'Menu Settings', 'Réglage Menu', '2021-03-01 20:59:34', '2021-05-19 09:14:06'),
(1309, 0, 'fr', '_json', 'Clear translations', 'Nettoyer la traduction', '2021-03-01 20:59:34', '2021-05-19 09:14:06'),
(1310, 0, 'fr', '_json', 'Deleted', 'Supprimé', '2021-03-03 16:08:46', '2021-05-19 09:14:06'),
(1311, 0, 'fr', '_json', 'New Booking(s).', 'Nouvelle Reservation', '2021-03-03 16:08:47', '2021-05-19 09:14:06'),
(1312, 0, 'fr', '_json', 'You Have a new order.', 'Vous avez une nouvelle commande', '2021-03-03 16:08:47', '2021-05-19 09:14:06'),
(1313, 0, 'fr', '_json', 'No New Notifications.', 'Aucune Notifications.', '2021-03-03 16:08:47', '2021-05-19 09:14:06'),
(1314, 0, 'fr', '_json', 'New Notification(s).', 'Nouvelle Notification(s)', '2021-03-03 16:08:47', '2021-05-19 09:14:06'),
(1315, 0, 'fr', '_json', 'A New User Has Registered.', 'Un nouvel utilisateur s\'est inscrit.', '2021-03-03 16:08:47', '2021-05-19 09:14:06'),
(1316, 0, 'fr', '_json', 'Hi', 'Bonjour', '2021-03-03 16:08:47', '2021-05-19 09:14:06'),
(1317, 0, 'fr', '_json', 'Successful Flight Bookings', 'Réservations de vol réussies', '2021-03-08 16:31:18', '2021-05-19 09:14:06'),
(1318, 0, 'fr', '_json', 'Successful Hotel Bookings', 'Réservations hôtel réussies', '2021-03-08 16:31:18', '2021-05-19 09:14:06'),
(1319, 0, 'fr', '_json', 'Successful Package Bookings', 'Réservations de Pack   réussies', '2021-03-08 16:31:18', '2021-05-19 09:14:06'),
(1320, 0, 'fr', '_json', 'Booking Size', 'Taille de la réservation', '2021-03-08 16:31:18', '2021-05-19 09:14:06'),
(1321, 0, 'fr', '_json', 'Packages', 'Pack', '2021-03-08 16:31:18', '2021-05-19 09:14:06'),
(1322, 0, 'fr', '_json', 'Enter Pnr or booking reference', 'Entrer le Pnr ou la reference de reservation', '2021-03-08 16:31:19', '2021-05-19 09:14:06'),
(1323, 0, 'fr', '_json', 'Terms & Conditions', 'CONDITIONS GÉNÉRALES DE VENTE', '2021-03-08 16:45:58', '2021-05-19 09:14:06'),
(1324, 0, 'fr', '_json', 'Menu Structure', 'Structure du Menu', '2021-03-08 16:51:26', '2021-05-19 09:14:06'),
(1325, 0, 'fr', '_json', 'Select the menu you want to edit', 'Sélectionnez le menu que vous souhaitez modifier', '2021-03-08 16:51:26', '2021-05-19 09:14:06'),
(1326, 0, 'fr', '_json', 'or', 'ou', '2021-03-08 16:58:46', '2021-05-19 09:14:06'),
(1327, 0, 'fr', '_json', 'Create new menu', 'Créer un nouveau Menu', '2021-03-08 16:58:46', '2021-05-19 09:14:06'),
(1328, 0, 'fr', '_json', 'Custom Link', 'Lien personnalisé', '2021-03-08 16:58:46', '2021-05-19 09:14:06'),
(1329, 0, 'fr', '_json', 'Press return or enter to expand', 'Appuyez sur retour ou sur entrée pour développer', '2021-03-08 16:58:46', '2021-05-19 09:14:06'),
(1330, 0, 'fr', '_json', 'URL', 'Lien (URL)', '2021-03-08 16:58:46', '2021-05-19 09:14:06'),
(1331, 0, 'fr', '_json', 'Label', 'Nom', '2021-03-08 16:58:46', '2021-05-19 09:14:06'),
(1332, 0, 'fr', '_json', 'Add menu item', 'Ajouter un élément au menu', '2021-03-08 16:58:46', '2021-05-19 09:14:06'),
(1333, 0, 'fr', '_json', 'Create menu', 'Créer un Menu', '2021-03-08 16:58:46', '2021-05-19 09:14:06'),
(1334, 0, 'fr', '_json', 'Enter menu name', 'Entrer le nom du Menu', '2021-03-08 16:58:46', '2021-05-19 09:14:06'),
(1335, 0, 'fr', '_json', 'Save menu', 'Enregistrer le Menu', '2021-03-08 16:58:46', '2021-05-19 09:14:06'),
(1336, 0, 'fr', '_json', 'Place each item in the order you prefer. Click on the arrow to the right of the item to display more configuration options.', 'Placez chaque article dans l\'ordre que vous préférez. Cliquez sur la flèche à droite de l\'élément pour afficher plus d\'options de configuration.', '2021-03-08 16:58:46', '2021-05-19 09:14:06'),
(1337, 0, 'fr', '_json', 'Please enter the name and select \"Create menu\" button', 'Veuillez saisir le nom et sélectionner le bouton \"Créer un menu\"', '2021-03-08 16:58:46', '2021-05-19 09:14:06'),
(1338, 0, 'fr', '_json', 'Link', 'Lien', '2021-03-08 16:58:46', '2021-05-19 09:14:06'),
(1339, 0, 'fr', '_json', 'Class CSS (optional)', 'Class CSS (optionnel)', '2021-03-08 16:58:46', '2021-05-19 09:14:06'),
(1340, 0, 'fr', '_json', 'Update item', 'Mise à jour de l\'element', '2021-03-08 16:58:46', '2021-05-19 09:14:06'),
(1341, 0, 'fr', '_json', 'Move up', 'Déplacer vers le haut', '2021-03-08 16:58:46', '2021-05-19 09:14:06'),
(1343, 0, 'fr', '_json', 'Delete menu', 'Supprimé le Menu', '2021-03-08 16:58:46', '2021-05-19 09:14:06'),
(1344, 0, 'fr', '_json', 'Using Email', 'Utilisation du courrier électronique', '2021-04-20 15:52:54', '2021-05-19 09:14:06'),
(1345, 0, 'fr', '_json', 'Hotel Name', 'Nom de l\'hôtel', '2021-04-20 15:52:54', '2021-05-19 09:14:06'),
(1346, 0, 'fr', '_json', 'Manage Your Information', 'Gerer vos informations', '2021-04-20 15:52:54', '2021-05-19 09:14:06'),
(1347, 0, 'fr', '_json', 'Surname', 'Nom', '2021-04-20 15:52:54', '2021-05-19 09:14:06'),
(1348, 0, 'fr', '_json', 'First Name', 'Nom', '2021-04-20 15:52:55', '2021-05-19 09:14:06'),
(1349, 0, 'fr', '_json', 'Update Customer Information', 'Mise à jour des informations sur les clients', '2021-04-20 15:52:55', '2021-05-19 09:14:06'),
(1350, 0, 'fr', '_json', 'Enter New Password', 'Entrer le nouveau mot de passe', '2021-04-20 15:52:55', '2021-05-19 09:14:06'),
(1351, 0, 'fr', '_json', 'Confirm New Password', 'Confirmer le nouveau mot de passe', '2021-04-20 15:52:55', '2021-05-19 09:14:06'),
(1352, 0, 'fr', '_json', 'You are logged in!', 'Vous êtes connecté !', '2021-04-20 15:52:55', '2021-05-19 09:14:06'),
(1353, 0, 'fr', '_json', 'Bookings List', 'Liste des réservations', '2021-04-20 15:52:55', '2021-05-19 09:14:06'),
(1354, 0, 'fr', '_json', 'Actions', 'Actions', '2021-04-20 15:52:55', '2021-05-19 09:14:06'),
(1355, 0, 'fr', '_json', 'Reference', 'Référence', '2021-04-20 15:52:55', '2021-05-19 09:14:06'),
(1356, 0, 'fr', '_json', 'Reservation Status', 'Statut de la réservation', '2021-04-20 15:52:55', '2021-05-19 09:14:06'),
(1357, 0, 'fr', '_json', 'Customer Name', 'Nom du client', '2021-04-20 15:52:55', '2021-05-19 09:14:06'),
(1358, 0, 'fr', '_json', 'Reservations Attempts', 'Tentatives de réservation', '2021-04-20 15:52:55', '2021-05-19 09:14:06'),
(1359, 0, 'fr', '_json', 'Payed Successful Reservations', 'Réservations réussies payées', '2021-04-20 15:52:55', '2021-05-19 09:14:06'),
(1360, 0, 'fr', '_json', 'Payed Unsuccessful Reservations', 'Réservations infructueuses payées', '2021-04-20 15:52:55', '2021-05-19 09:14:06'),
(1361, 0, 'fr', '_json', 'Failed Reservations', 'Réservations échouées', '2021-04-20 15:52:55', '2021-05-19 09:14:06'),
(1362, 0, 'fr', '_json', 'Cancelled Reservations', 'Réservations annulées', '2021-04-20 15:52:55', '2021-05-19 09:14:06'),
(1364, 0, 'fr', '_json', 'Due Date', 'Date d\'expiration', '2021-04-20 15:52:55', '2021-05-19 09:14:06'),
(1365, 0, 'fr', '_json', 'Cancellation Status', 'Statut d\'annulation', '2021-04-20 15:52:55', '2021-05-19 09:14:06'),
(1366, 0, 'fr', '_json', 'Successful', 'Succès de', '2021-04-20 15:52:55', '2021-05-19 09:14:06'),
(1367, 0, 'fr', '_json', 'Incomplete', 'Incomplète', '2021-04-20 15:52:55', '2021-05-19 09:14:06'),
(1368, 0, 'fr', '_json', 'Feature title', 'Titre en vedette', '2021-04-20 15:52:55', '2021-05-19 09:14:06'),
(1369, 0, 'fr', '_json', 'Icon Marker', 'Marqueur d\'icône', '2021-04-20 15:52:55', '2021-05-19 09:14:06'),
(1370, 0, 'fr', '_json', 'City List', 'Liste des villes', '2021-04-20 15:52:56', '2021-05-19 09:14:06'),
(1371, 0, 'fr', '_json', 'ICE', 'ICE', '2021-04-20 15:52:56', '2021-05-19 09:14:06'),
(1372, 0, 'fr', '_json', 'Code Postal', 'Code postal', '2021-04-20 15:52:56', '2021-05-19 09:14:06'),
(1374, 0, 'fr', '_json', 'Pays', 'Pays', '2021-04-20 15:52:56', '2021-05-19 09:14:06'),
(1375, 0, 'fr', '_json', 'Subscribers', 'Abonnès à la newsletter', '2021-04-20 15:52:56', '2021-05-19 09:14:06'),
(1376, 0, 'fr', '_json', 'Today', 'Aujourd\'hui', '2021-04-20 15:52:56', '2021-05-19 09:14:06'),
(1377, 0, 'fr', '_json', 'Last month', 'Le mois dernier', '2021-04-20 15:52:56', '2021-05-19 09:14:06'),
(1378, 0, 'fr', '_json', 'Last 6 month', '6 derniers mois', '2021-04-20 15:52:56', '2021-05-19 09:14:06'),
(1379, 0, 'fr', '_json', 'Last year', 'L\'année dernière', '2021-04-20 15:52:56', '2021-05-19 09:14:06'),
(1380, 0, 'fr', '_json', 'Total Sales', 'Total des ventes', '2021-04-20 15:52:56', '2021-05-19 09:14:06'),
(1381, 0, 'fr', '_json', 'Total Purchases', 'Total des achats', '2021-04-20 15:52:56', '2021-05-19 09:14:06'),
(1382, 0, 'fr', '_json', 'Total Return', 'Total des avoirs', '2021-04-20 15:52:56', '2021-05-19 09:14:06'),
(1383, 0, 'fr', '_json', 'Wallet Balance', 'Solde du portefeuille', '2021-04-20 15:52:56', '2021-05-19 09:14:06'),
(1384, 0, 'fr', '_json', 'Infos', 'Infos', '2021-04-20 15:52:56', '2021-05-19 09:14:06'),
(1385, 0, 'fr', '_json', 'Add Terms and Conditions', 'Ajouter des conditions générales', '2021-04-20 15:52:56', '2021-05-19 09:14:06'),
(1386, 0, 'fr', '_json', 'Unpublish', 'Dépublier', '2021-04-20 15:52:56', '2021-05-19 09:14:06'),
(1387, 0, 'fr', '_json', 'Edit Terms and Conditions', 'Modifier les conditions générales', '2021-04-20 15:52:56', '2021-05-19 09:14:06'),
(1388, 0, 'fr', '_json', 'Terms and Conditions List', 'Terms and Conditions', '2021-04-20 15:52:56', '2021-05-19 09:14:06'),
(1390, 0, 'fr', '_json', 'title', 'titre', '2021-04-20 15:52:56', '2021-05-19 09:14:06'),
(1391, 0, 'fr', '_json', 'reference', 'référence', '2021-04-20 15:52:56', '2021-05-19 09:14:06'),
(1392, 0, 'fr', '_json', 'Unit Price', 'Prix Unitaire', '2021-04-20 15:52:56', '2021-05-19 09:14:06'),
(1393, 0, 'fr', '_json', 'Order Tax', 'Taxe sur les commandes', '2021-04-20 15:52:56', '2021-05-19 09:14:06'),
(1394, 0, 'fr', '_json', 'CHOOSE A TEMPLATE', 'CHOISIR UN MODÈLE', '2021-04-20 15:52:56', '2021-05-19 09:14:06'),
(1395, 0, 'fr', '_json', 'New message', 'Nouveau Message', '2021-04-20 15:52:56', '2021-05-19 09:14:06'),
(1396, 0, 'fr', '_json', 'Recipient', 'Bénéficiaire', '2021-04-20 15:52:57', '2021-05-19 09:14:06'),
(1397, 0, 'fr', '_json', 'Subject', 'Sujet', '2021-04-20 15:52:57', '2021-05-19 09:14:06'),
(1398, 0, 'fr', '_json', 'close', 'fermer', '2021-04-20 15:52:57', '2021-05-19 09:14:06'),
(1399, 0, 'fr', '_json', 'Send Mail', 'Envoyer un courrier', '2021-04-20 15:52:57', '2021-05-19 09:14:06'),
(1401, 0, 'fr', '_json', 'Add newsletter', 'Ajouter une newsletter', '2021-04-20 15:52:57', '2021-05-19 09:14:06'),
(1402, 0, 'fr', '_json', 'Edit newsletter', 'Modification Newsletter', '2021-04-20 15:52:57', '2021-05-19 09:14:06'),
(1404, 0, 'fr', '_json', 'Email List', 'Liste des Email', '2021-04-20 15:52:57', '2021-05-19 09:14:06'),
(1405, 0, 'fr', '_json', 'Add Email', 'Ajouter un Email', '2021-04-20 15:52:57', '2021-05-19 09:14:06'),
(1406, 0, 'fr', '_json', 'Send Email Promotion', 'Envoyer un courriel de promotion', '2021-04-20 15:52:57', '2021-05-19 09:14:06'),
(1407, 0, 'fr', '_json', 'Send Mail to Subscribers', 'Envoyer un courrier', '2021-04-20 15:52:57', '2021-05-19 09:14:06'),
(1408, 0, 'fr', '_json', 'Enter subject of E-mail', 'Entrez l\'objet de l\'e-mail', '2021-04-20 15:52:57', '2021-05-19 09:14:06'),
(1409, 0, 'fr', '_json', 'itinerary', 'itinéraire', '2021-04-20 15:52:57', '2021-05-19 09:14:06'),
(1410, 0, 'fr', '_json', 'Edit  place', 'Modifier le lieu', '2021-04-20 15:52:57', '2021-05-19 09:14:06'),
(1411, 0, 'fr', '_json', 'Places List', 'Liste des lieux', '2021-04-20 15:52:57', '2021-05-19 09:14:06'),
(1412, 0, 'fr', '_json', 'Activity Type List', 'Liste des types d\'activités', '2021-04-20 15:52:57', '2021-05-19 09:14:06');
INSERT INTO `ltm_translations` (`id`, `status`, `locale`, `group`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1413, 0, 'fr', '_json', 'Posts List', 'Liste des postes', '2021-04-20 15:52:57', '2021-05-19 09:14:06'),
(1414, 0, 'fr', '_json', 'All Categories', 'Toutes catégories', '2021-04-20 15:52:57', '2021-05-19 09:14:06'),
(1415, 0, 'fr', '_json', 'Print', 'Impression', '2021-04-20 15:52:57', '2021-05-19 09:14:06'),
(1416, 0, 'fr', '_json', 'Select supplier', 'Choisir le fournisseur', '2021-04-20 15:52:57', '2021-05-19 09:14:06'),
(1418, 0, 'fr', '_json', 'Wire', 'FIL', '2021-04-20 15:52:57', '2021-05-19 09:14:06'),
(1420, 0, 'fr', '_json', 'Paid Amount', 'Montant payé', '2021-04-20 15:52:58', '2021-05-19 09:14:06'),
(1421, 0, 'fr', '_json', 'Change Amount', 'Changement Montant', '2021-04-20 15:52:58', '2021-05-19 09:14:06'),
(1422, 0, 'fr', '_json', 'Validate', 'Valider', '2021-04-20 15:52:58', '2021-05-19 09:14:06'),
(1423, 0, 'fr', '_json', 'Purchases List', 'Liste des Achats', '2021-04-20 15:52:58', '2021-05-19 09:14:06'),
(1424, 0, 'fr', '_json', 'View details', 'Voir les détails', '2021-04-20 15:52:58', '2021-05-19 09:14:06'),
(1425, 0, 'fr', '_json', 'Complete', 'Compléter', '2021-04-20 15:52:58', '2021-05-19 09:14:06'),
(1426, 0, 'fr', '_json', 'purchase Status', 'statut d\'achat', '2021-04-20 15:52:58', '2021-05-19 09:14:06'),
(1427, 0, 'fr', '_json', 'SubTotal', 'Sous-total', '2021-04-20 15:52:58', '2021-05-19 09:14:06'),
(1428, 0, 'fr', '_json', 'Total Cost', 'Coût total', '2021-04-20 15:52:58', '2021-05-19 09:14:06'),
(1429, 0, 'fr', '_json', 'Total Tax', 'Total des impôts', '2021-04-20 15:52:58', '2021-05-19 09:14:06'),
(1430, 0, 'fr', '_json', 'Document', 'Document', '2021-04-20 15:52:58', '2021-05-19 09:14:06'),
(1431, 0, 'fr', '_json', 'Invoice', 'Facture', '2021-04-20 15:52:58', '2021-05-19 09:14:06'),
(1433, 0, 'fr', '_json', 'Create New Return', 'Créer un avoir', '2021-04-20 15:52:58', '2021-05-19 09:14:06'),
(1434, 0, 'fr', '_json', 'New Return', 'Nouveau avoir', '2021-04-20 15:52:58', '2021-05-19 09:14:06'),
(1435, 0, 'fr', '_json', 'Return Status', 'Status de retour', '2021-04-20 15:52:58', '2021-05-19 09:14:06'),
(1437, 0, 'fr', '_json', 'WIRE', 'FIL', '2021-04-20 15:52:58', '2021-05-19 09:14:06'),
(1438, 0, 'fr', '_json', 'Return Note', 'Note d\'avoir', '2021-04-20 15:52:58', '2021-05-19 09:14:06'),
(1439, 0, 'fr', '_json', 'Returns List', 'Liste des avoirs', '2021-04-20 15:52:58', '2021-05-19 09:14:06'),
(1440, 0, 'fr', '_json', 'Returns', 'Avoir', '2021-04-20 15:52:58', '2021-05-19 09:14:06'),
(1441, 0, 'fr', '_json', 'Add New Return', 'Ajouter un nouveau retour', '2021-04-20 15:52:59', '2021-05-19 09:14:06'),
(1442, 0, 'fr', '_json', 'return Status', 'retourner l\'état', '2021-04-20 15:52:59', '2021-05-19 09:14:06'),
(1443, 0, 'fr', '_json', 'Sales List', 'Liste des ventes', '2021-04-20 15:52:59', '2021-05-19 09:14:06'),
(1444, 0, 'fr', '_json', 'Orders Table', 'Tableau des commandes', '2021-04-20 15:52:59', '2021-05-19 09:14:06'),
(1445, 0, 'fr', '_json', 'Total Price', 'Prix total', '2021-04-20 15:52:59', '2021-05-19 09:14:06'),
(1446, 0, 'fr', '_json', 'Quotation', 'Devis', '2021-04-20 15:52:59', '2021-05-19 09:14:06'),
(1447, 0, 'fr', '_json', 'Return', 'Avoirs', '2021-04-20 15:52:59', '2021-05-19 09:14:06'),
(1448, 0, 'fr', '_json', 'Bank Detail', 'Détail de la Banque', '2021-04-20 15:52:59', '2021-05-19 09:14:06'),
(1449, 0, 'fr', '_json', 'Add Bank Account Details', 'Ajouter les détails du compte bancaire', '2021-04-20 15:52:59', '2021-05-19 09:14:06'),
(1450, 0, 'fr', '_json', 'Account Name', 'Nom du compte', '2021-04-20 15:52:59', '2021-05-19 09:14:06'),
(1451, 0, 'fr', '_json', 'Account Number', 'Numero de compte', '2021-04-20 15:52:59', '2021-05-19 09:14:06'),
(1452, 0, 'fr', '_json', 'Bank', 'Banque', '2021-04-20 15:52:59', '2021-05-19 09:14:06'),
(1453, 0, 'fr', '_json', 'SELECT BANK', 'SELECTIONNER LA BANQUE', '2021-04-20 15:52:59', '2021-05-19 09:14:06'),
(1454, 0, 'fr', '_json', 'Branch', 'Branche', '2021-04-20 15:52:59', '2021-05-19 09:14:06'),
(1455, 0, 'fr', '_json', 'Ifsc Code', 'Code Ifsc', '2021-04-20 15:52:59', '2021-05-19 09:14:06'),
(1456, 0, 'fr', '_json', 'iBAN Code', 'Code IBAN', '2021-04-20 15:52:59', '2021-05-19 09:14:06'),
(1457, 0, 'fr', '_json', 'Bank Details', 'Détails de la banque', '2021-04-20 15:52:59', '2021-05-19 09:14:06'),
(1458, 0, 'fr', '_json', 'Bank Name', 'Nom de la banque', '2021-04-20 15:52:59', '2021-05-19 09:14:06'),
(1459, 0, 'fr', '_json', 'IFSC Code', 'Code IFSC', '2021-04-20 15:52:59', '2021-05-19 09:14:06'),
(1460, 0, 'fr', '_json', 'Airline Markdown', 'Markdown des compagnies aériennes', '2021-04-20 15:52:59', '2021-05-19 09:14:06'),
(1461, 0, 'fr', '_json', 'Add Markdown', 'Ajouter Markdown', '2021-04-20 15:52:59', '2021-05-19 09:14:06'),
(1462, 0, 'fr', '_json', 'Airline', 'Compagnie aérienne', '2021-04-20 15:52:59', '2021-05-19 09:14:06'),
(1464, 0, 'fr', '_json', 'SELECT', 'SÉLECTIONNER', '2021-04-20 15:53:00', '2021-05-19 09:14:06'),
(1465, 0, 'fr', '_json', 'Percentage', 'Pourcentage', '2021-04-20 15:53:00', '2021-05-19 09:14:06'),
(1466, 0, 'fr', '_json', 'Dirham Marocain', 'Dirham Marocain', '2021-04-20 15:53:00', '2021-05-19 09:14:06'),
(1467, 0, 'fr', '_json', 'Airlines Markdown', 'Compagnies aériennes Markdown', '2021-04-20 15:53:00', '2021-05-19 09:14:06'),
(1468, 0, 'fr', '_json', 'Airline Code', 'Code de la compagnie aérienne', '2021-04-20 15:53:00', '2021-05-19 09:14:06'),
(1469, 0, 'fr', '_json', 'Airline Name', 'Nom de la compagnie aérienne', '2021-04-20 15:53:00', '2021-05-19 09:14:06'),
(1470, 0, 'fr', '_json', 'Add Markup', 'Ajouter un balisage', '2021-04-20 15:53:00', '2021-05-19 09:14:06'),
(1471, 0, 'fr', '_json', 'all fields are required', 'tous les champs sont obligatoires', '2021-04-20 15:53:00', '2021-05-19 09:14:06'),
(1472, 0, 'fr', '_json', 'Enter your address to help use serve you better', 'Saisissez votre adresse pour nous aider à mieux vous servir', '2021-04-20 15:53:00', '2021-05-19 09:14:06'),
(1473, 0, 'fr', '_json', 'Edit Your Profile Image', 'Modifier l\'image de votre profil', '2021-04-20 15:53:00', '2021-05-19 09:14:06'),
(1474, 0, 'fr', '_json', 'Enter New Image', 'Entrer une nouvelle image', '2021-04-20 15:53:00', '2021-05-19 09:14:06'),
(1475, 0, 'fr', '_json', 'Gender', 'Sexe', '2021-04-20 15:53:00', '2021-05-19 09:14:06'),
(1476, 0, 'fr', '_json', 'User Type', 'Type d\'utilisateur', '2021-04-20 15:53:00', '2021-05-19 09:14:06'),
(1477, 0, 'fr', '_json', 'Surname (Family name)', 'Nom', '2021-04-20 15:53:00', '2021-05-19 09:14:06'),
(1478, 0, 'fr', '_json', 'First name (Your name)', 'Nom', '2021-04-20 15:53:00', '2021-05-19 09:14:06'),
(1479, 0, 'fr', '_json', 'Other name', 'Nom utilisateur', '2021-04-20 15:53:00', '2021-05-19 09:14:06'),
(1480, 0, 'fr', '_json', 'Other name (Your other name)', 'Username (Votre nom d\'utilisateur)', '2021-04-20 15:53:00', '2021-05-19 09:14:06'),
(1481, 0, 'fr', '_json', 'address', 'adresse', '2021-04-20 15:53:00', '2021-05-19 09:14:06'),
(1482, 0, 'fr', '_json', 'All Users', 'Tous les utilisateurs', '2021-04-20 15:53:00', '2021-05-19 09:14:06'),
(1483, 0, 'fr', '_json', 'Profile Status', 'Statut du profil', '2021-04-20 15:53:00', '2021-05-19 09:14:06'),
(1484, 0, 'fr', '_json', 'Update User', 'Mise à jour de l\'utilisateur', '2021-04-20 15:53:00', '2021-05-19 09:14:06'),
(1485, 0, 'fr', '_json', 'Super Admin', 'Super Administrateur', '2021-04-20 15:53:00', '2021-05-19 09:14:06'),
(1486, 0, 'fr', '_json', 'Create Slider', 'Créez un slider', '2021-04-20 15:53:01', '2021-05-19 09:14:06'),
(1487, 0, 'fr', '_json', 'Edit Slider', 'Modifier le curseur', '2021-04-20 15:53:01', '2021-05-19 09:14:06'),
(1488, 0, 'fr', '_json', 'Sliders List', 'Liste des images Slider', '2021-04-20 15:53:01', '2021-05-19 09:14:06'),
(1489, 0, 'fr', '_json', 'Slider List', 'Liste des images Slider', '2021-04-20 15:53:01', '2021-05-19 09:14:06'),
(1490, 0, 'fr', '_json', 'Add New Slider', 'Ajouter un nouveau curseur', '2021-04-20 15:53:01', '2021-05-19 09:14:06'),
(1491, 0, 'fr', '_json', 'Image', 'Image', '2021-04-20 15:53:01', '2021-05-19 09:14:06'),
(1492, 0, 'fr', '_json', 'Testimonials List', 'Liste de témoignages', '2021-04-20 15:53:01', '2021-05-19 09:14:06'),
(1493, 0, 'fr', '_json', 'Deal booking', 'Réservation de l\'offre', '2021-04-20 15:53:01', '2021-05-19 09:14:06'),
(1494, 0, 'fr', '_json', 'Existing users, please login', 'Utilisateurs existants, veuillez vous connecter', '2021-04-20 15:53:01', '2021-05-19 09:14:06'),
(1495, 0, 'fr', '_json', 'Sign In', 'Connexion', '2021-04-20 15:53:01', '2021-05-19 09:14:06'),
(1496, 0, 'fr', '_json', 'Forget Password', 'Mot de passe oublié', '2021-04-20 15:53:01', '2021-05-19 09:14:06'),
(1497, 0, 'fr', '_json', 'Not a registered customer ? Register here.', 'Vous n\'êtes pas un client enregistré ? Inscrivez-vous ici.', '2021-04-20 15:53:01', '2021-05-19 09:14:06'),
(1498, 0, 'fr', '_json', 'password_confirmation', 'confirmation_du_mot de passe', '2021-04-20 15:53:01', '2021-05-19 09:14:06'),
(1499, 0, 'fr', '_json', 'Booking Details', 'Détails de la réservation', '2021-04-20 15:53:01', '2021-05-19 09:14:06'),
(1501, 0, 'fr', '_json', 'Use logged in customer details', 'Utiliser les détails du client connecté', '2021-04-20 15:53:01', '2021-05-19 09:14:06'),
(1502, 0, 'fr', '_json', 'CONTINUE', 'CONTINUER', '2021-04-20 15:53:01', '2021-05-19 09:14:06'),
(1503, 0, 'fr', '_json', 'Details', 'Détails', '2021-04-20 15:53:01', '2021-05-19 09:14:06'),
(1504, 0, 'fr', '_json', 'DEAL NAME', 'NOM DE L\'AFFAIRE', '2021-04-20 15:53:01', '2021-05-19 09:14:06'),
(1505, 0, 'fr', '_json', 'FLIGHT', 'Vol', '2021-04-20 15:53:01', '2021-05-19 09:14:06'),
(1506, 0, 'fr', '_json', 'HOTEL', 'HÔTEL', '2021-04-20 15:53:01', '2021-05-19 09:14:06'),
(1507, 0, 'fr', '_json', 'ATTRACTION', 'ATTRACTION', '2021-04-20 15:53:01', '2021-05-19 09:14:06'),
(1508, 0, 'fr', '_json', 'ADULT PRICE', 'Prix d\'Adulte', '2021-04-20 15:53:01', '2021-05-19 09:14:06'),
(1509, 0, 'fr', '_json', 'CHILD PRICE', 'PRIX POUR LES ENFANTS', '2021-04-20 15:53:02', '2021-05-19 09:14:06'),
(1510, 0, 'fr', '_json', 'INFANT PRICE', 'PRIX INFANT', '2021-04-20 15:53:02', '2021-05-19 09:14:06'),
(1511, 0, 'fr', '_json', 'CONTACT NUMBER', 'NUMÉRO DE CONTACT', '2021-04-20 15:53:02', '2021-05-19 09:14:06'),
(1512, 0, 'fr', '_json', 'Need Help', 'Besoin d\'aide', '2021-04-20 15:53:02', '2021-05-19 09:14:06'),
(1513, 0, 'fr', '_json', 'Contact us for assistance', 'Contactez-nous pour obtenir de l\'aide', '2021-04-20 15:53:02', '2021-05-19 09:14:06'),
(1514, 0, 'fr', '_json', 'Price Details', 'Détails des prix', '2021-04-20 15:53:02', '2021-05-19 09:14:06'),
(1515, 0, 'fr', '_json', 'SERVICE FEES', 'FRAIS DE SERVICE', '2021-04-20 15:53:02', '2021-05-19 09:14:06'),
(1516, 0, 'fr', '_json', 'TAXES', 'IMPÔTS', '2021-04-20 15:53:02', '2021-05-19 09:14:06'),
(1517, 0, 'fr', '_json', 'DISCOUNT', 'DISCOUNT', '2021-04-20 15:53:02', '2021-05-19 09:14:06'),
(1518, 0, 'fr', '_json', 'TOTAL PRICE', 'PRIX TOTAL', '2021-04-20 15:53:02', '2021-05-19 09:14:06'),
(1519, 0, 'fr', '_json', 'Need Help? Call us or drop a message. Our agents will be in touch shortly', 'Besoin d\'aide ? Appelez-nous ou envoyez-nous un message. Nos agents vous contacteront sous peu.', '2021-04-20 15:53:02', '2021-05-19 09:14:06'),
(1520, 0, 'fr', '_json', 'Result Found Matching Your Search', 'Résultat trouvé correspondant à votre recherche', '2021-04-20 15:53:02', '2021-05-19 09:14:06'),
(1521, 0, 'fr', '_json', 'Any', 'Quelconque', '2021-04-20 15:53:02', '2021-05-19 09:14:06'),
(1523, 0, 'fr', '_json', 'Select', 'Sélectionnez', '2021-04-20 15:53:02', '2021-05-19 09:14:06'),
(1524, 0, 'fr', '_json', 'Email new booking', 'Envoyer une nouvelle réservation par courriel', '2021-04-20 15:53:02', '2021-05-19 09:14:06'),
(1525, 0, 'fr', '_json', 'You have booking from website', 'Vous avez réservé à partir du site web', '2021-04-20 15:53:02', '2021-05-19 09:14:06'),
(1526, 0, 'fr', '_json', 'Datetime', 'Date-heure', '2021-04-20 15:53:02', '2021-05-19 09:14:06'),
(1527, 0, 'fr', '_json', 'Number of children', 'Nombre d\'enfants', '2021-04-20 15:53:02', '2021-05-19 09:14:06'),
(1528, 0, 'fr', '_json', 'Email from system', 'Courriel du système', '2021-04-20 15:53:02', '2021-05-19 09:14:06'),
(1529, 0, 'fr', '_json', 'You Have a reservation.', 'Vous avez une réservation.', '2021-04-20 15:53:03', '2021-05-19 09:14:06'),
(1531, 0, 'fr', '_json', 'My Bookings', 'Mes Reservations', '2021-04-20 15:53:03', '2021-05-19 09:14:06'),
(1532, 0, 'fr', '_json', 'Slides', 'Image du Slider', '2021-04-20 15:53:03', '2021-05-19 09:14:06'),
(1533, 0, 'fr', '_json', 'Users List', 'Liste des utilisateurs', '2021-04-20 15:53:03', '2021-05-19 09:14:06'),
(1534, 0, 'fr', '_json', 'Return List', 'Liste des avoirs', '2021-04-20 15:53:03', '2021-05-19 09:14:06'),
(1535, 0, 'fr', '_json', 'Mail to Subscribers', 'Compagne Emailing', '2021-04-20 15:53:03', '2021-05-19 09:14:06'),
(1536, 0, 'fr', '_json', 'The Admin Site is an area which only the administrator​ can access. From here you can manage (delete edit create) places categories cities country manage users review booking...', 'Le site d\'administration est une zone à laquelle seul l\'administrateur peut accéder. De là, vous pouvez gérer (supprimer, modifier, créer) les lieux, les catégories, les villes, les pays, les utilisateurs, les réservations...', '2021-04-22 16:00:43', '2021-05-19 09:14:06'),
(1537, 0, 'fr', '_json', 'set out by this site including our Cookie Use.', 'définis par ce site, y compris notre utilisation des cookies.', '2021-04-22 16:13:44', '2021-05-19 09:14:06'),
(1538, 0, 'en', '_json', 'Other Name', 'Username', '2021-04-22 17:42:46', '2021-05-19 09:14:06'),
(1539, 0, 'en', '_json', 'Other name', 'Username', '2021-04-22 17:42:51', '2021-05-19 09:14:06'),
(1540, 0, 'fr', 'Loading', '..', NULL, '2021-05-18 08:46:54', '2021-05-18 08:46:54'),
(1541, 0, 'fr', 'E', 'g. City, Airport', NULL, '2021-05-18 08:46:54', '2021-05-18 08:46:54'),
(1542, 0, 'fr', '_json', 'Golf Tours', NULL, '2021-05-18 08:46:54', '2021-05-18 08:46:54'),
(1543, 0, 'fr', '_json', 'Sign up Using Email', NULL, '2021-05-18 08:46:54', '2021-05-18 08:46:54'),
(1544, 0, 'fr', '_json', 'Bad Request', NULL, '2021-05-18 08:46:54', '2021-05-18 08:46:54'),
(1545, 0, 'fr', '_json', 'Unauthorized Access', NULL, '2021-05-18 08:46:54', '2021-05-18 08:46:54'),
(1546, 0, 'fr', '_json', 'Access Denied/Forbidden !', NULL, '2021-05-18 08:46:54', '2021-05-18 08:46:54'),
(1547, 0, 'fr', '_json', 'Not Found', NULL, '2021-05-18 08:46:54', '2021-05-18 08:46:54'),
(1548, 0, 'fr', '_json', 'Page Expired', NULL, '2021-05-18 08:46:54', '2021-05-18 08:46:54'),
(1549, 0, 'fr', '_json', 'Too Many Requests', NULL, '2021-05-18 08:46:54', '2021-05-18 08:46:54'),
(1550, 0, 'fr', '_json', 'Internal Server Error', NULL, '2021-05-18 08:46:54', '2021-05-18 08:46:54'),
(1551, 0, 'fr', '_json', 'Service Unavailable', NULL, '2021-05-18 08:46:54', '2021-05-18 08:46:54'),
(1552, 0, 'fr', '_json', 'Troubleshooting Error, Looks like something is wrong.', NULL, '2021-05-18 08:46:54', '2021-05-18 08:46:54'),
(1553, 0, 'fr', '_json', 'Oh no', NULL, '2021-05-18 08:46:54', '2021-05-18 08:46:54'),
(1554, 0, 'fr', '_json', 'Go Home', 'Retour vers l\'acceuil', '2021-05-18 08:46:54', '2021-05-19 09:14:06'),
(1555, 0, 'fr', '_json', 'Attempted Bookings', NULL, '2021-05-18 08:46:54', '2021-05-18 08:46:54'),
(1556, 0, 'fr', '_json', 'Paid Bookings', NULL, '2021-05-18 08:46:54', '2021-05-18 08:46:54'),
(1557, 0, 'fr', '_json', 'Pending/Failed Bookings', NULL, '2021-05-18 08:46:54', '2021-05-18 08:46:54'),
(1558, 0, 'fr', '_json', 'Deal Bookings', NULL, '2021-05-18 08:46:54', '2021-05-18 08:46:54'),
(1559, 0, 'fr', '_json', '(S/N)', NULL, '2021-05-18 08:46:54', '2021-05-18 08:46:54'),
(1560, 0, 'fr', '_json', 'Deal Name', NULL, '2021-05-18 08:46:54', '2021-05-18 08:46:54'),
(1561, 0, 'fr', '_json', 'Amount Paid', 'Montant à Payer', '2021-05-18 08:46:54', '2021-05-19 09:14:06'),
(1562, 0, 'fr', '_json', 'Date Booked', NULL, '2021-05-18 08:46:54', '2021-05-18 08:46:54'),
(1563, 0, 'fr', '_json', 'Reservations Created', NULL, '2021-05-18 08:46:54', '2021-05-18 08:46:54'),
(1564, 0, 'fr', '_json', 'Issued Ticket', NULL, '2021-05-18 08:46:54', '2021-05-18 08:46:54'),
(1565, 0, 'fr', '_json', 'Cancelled Reservation', NULL, '2021-05-18 08:46:54', '2021-05-18 08:46:54'),
(1566, 0, 'fr', '_json', 'Void Tickets', NULL, '2021-05-18 08:46:55', '2021-05-18 08:46:55'),
(1567, 0, 'fr', '_json', 'Agent Flight Reservations', NULL, '2021-05-18 08:46:55', '2021-05-18 08:46:55'),
(1568, 0, 'fr', '_json', 'PNR', NULL, '2021-05-18 08:46:55', '2021-05-18 08:46:55'),
(1569, 0, 'fr', '_json', 'Agent Name', NULL, '2021-05-18 08:46:55', '2021-05-18 08:46:55'),
(1570, 0, 'fr', '_json', 'Amount', 'Montant', '2021-05-18 08:46:55', '2021-05-19 09:14:06'),
(1571, 0, 'fr', '_json', 'Ticket Time Limit', NULL, '2021-05-18 08:46:55', '2021-05-18 08:46:55'),
(1572, 0, 'fr', '_json', 'Ticket Status', 'Status du Ticket', '2021-05-18 08:46:55', '2021-05-19 09:14:06'),
(1573, 0, 'fr', '_json', 'Created Date<', NULL, '2021-05-18 08:46:55', '2021-05-18 08:46:55'),
(1574, 0, 'fr', '_json', 'Customer Flight Reservations', NULL, '2021-05-18 08:46:55', '2021-05-18 08:46:55'),
(1575, 0, 'fr', '_json', 'Created Date', NULL, '2021-05-18 08:46:55', '2021-05-18 08:46:55'),
(1576, 0, 'fr', '_json', 'Flight Reservations', NULL, '2021-05-18 08:46:55', '2021-05-18 08:46:55'),
(1577, 0, 'fr', '_json', 'My Hotel Reservations', NULL, '2021-05-18 08:46:55', '2021-05-18 08:46:55'),
(1578, 0, 'fr', '_json', 'Category Type List', 'Liste de type d\'activité', '2021-05-18 08:46:55', '2021-05-19 09:14:06'),
(1579, 0, 'fr', '_json', 'Add Category Type', 'Ajoute type d\'activité', '2021-05-18 08:46:55', '2021-05-19 09:14:06'),
(1580, 0, 'fr', '_json', 'Category type Name', 'Nom de type d\'activité', '2021-05-18 08:46:55', '2021-05-19 09:14:06'),
(1581, 0, 'fr', '_json', 'Ville', NULL, '2021-05-18 08:46:55', '2021-05-18 08:46:55'),
(1582, 0, 'fr', '_json', '#', NULL, '2021-05-18 08:46:55', '2021-05-18 08:46:55'),
(1583, 0, 'fr', '_json', 'newsletters', NULL, '2021-05-18 08:46:55', '2021-05-18 08:46:55'),
(1584, 0, 'fr', '_json', 'Newsletters', NULL, '2021-05-18 08:46:55', '2021-05-18 08:46:55'),
(1585, 0, 'fr', '_json', 'Add Offer', 'Ajouter une offre', '2021-05-18 08:46:55', '2021-05-19 09:14:06'),
(1586, 0, 'fr', '_json', 'Offer name', 'Nom de l\'offre', '2021-05-18 08:46:55', '2021-05-19 09:14:06'),
(1587, 0, 'fr', '_json', 'What the name of offer', NULL, '2021-05-18 08:46:55', '2021-05-18 08:46:55'),
(1588, 0, 'fr', '_json', 'Edit Offer', 'Modifier l\'offre', '2021-05-18 08:46:55', '2021-05-19 09:14:06'),
(1589, 0, 'fr', '_json', 'Offer List', 'Liste des offres', '2021-05-18 08:46:55', '2021-05-19 09:14:06'),
(1590, 0, 'fr', '_json', 'Add Package', NULL, '2021-05-18 08:46:55', '2021-05-18 08:46:55'),
(1591, 0, 'fr', '_json', 'Period', 'Durée', '2021-05-18 08:46:55', '2021-05-19 09:14:06'),
(1592, 0, 'fr', '_json', 'Start Date', 'Date d\'arrivée', '2021-05-18 08:46:55', '2021-05-19 09:14:06'),
(1593, 0, 'fr', '_json', 'End Date', 'Date de départ', '2021-05-18 08:46:56', '2021-05-19 09:14:06'),
(1594, 0, 'fr', '_json', 'Features', NULL, '2021-05-18 08:46:56', '2021-05-18 08:46:56'),
(1595, 0, 'fr', '_json', 'Conditions', NULL, '2021-05-18 08:46:56', '2021-05-18 08:46:56'),
(1596, 0, 'fr', '_json', 'Create', 'Creation', '2021-05-18 08:46:56', '2021-05-19 09:14:06'),
(1597, 0, 'fr', '_json', 'Package List', NULL, '2021-05-18 08:46:56', '2021-05-18 08:46:56'),
(1598, 0, 'fr', '_json', 'Min Stay', NULL, '2021-05-18 08:46:56', '2021-05-18 08:46:56'),
(1599, 0, 'fr', '_json', 'Available On', NULL, '2021-05-18 08:46:56', '2021-05-18 08:46:56'),
(1600, 0, 'fr', '_json', 'Prix', NULL, '2021-05-18 08:46:56', '2021-05-18 08:46:56'),
(1601, 0, 'fr', '_json', 'Trait', NULL, '2021-05-18 08:46:56', '2021-05-18 08:46:56'),
(1602, 0, 'fr', '_json', 'Bon de Commande', NULL, '2021-05-18 08:46:56', '2021-05-18 08:46:56'),
(1603, 0, 'fr', '_json', 'TRAIT', NULL, '2021-05-18 08:46:56', '2021-05-18 08:46:56'),
(1604, 0, 'fr', '_json', 'Type', NULL, '2021-05-18 08:46:56', '2021-05-18 08:46:56'),
(1605, 0, 'fr', '_json', 'Category detail', 'Detail d\'activité', '2021-05-18 08:46:56', '2021-05-19 09:14:06'),
(1606, 0, 'fr', '_json', 'Category Type detail', 'Detail de type d\'activité', '2021-05-18 08:46:57', '2021-05-19 09:14:06'),
(1607, 0, 'fr', '_json', 'City detail', 'Detail de la ville', '2021-05-18 08:46:57', '2021-05-19 09:14:06'),
(1608, 0, 'fr', '_json', 'Infant', NULL, '2021-05-18 08:46:57', '2021-05-18 08:46:57'),
(1609, 0, 'fr', '_json', 'Rentacs Tours - Travel Agency', NULL, '2021-05-18 08:46:57', '2021-05-18 08:46:57'),
(1610, 0, 'fr', '_json', 'Best Offers', 'Meilleures offres', '2021-05-18 08:46:57', '2021-05-19 09:14:06'),
(1611, 0, 'fr', '_json', 'Offer', 'Offre', '2021-05-18 08:46:57', '2021-05-19 09:14:06'),
(1612, 0, 'fr', '_json', 'Read More', 'Lire plus', '2021-05-18 08:46:57', '2021-05-19 09:14:06'),
(1613, 0, 'fr', '_json', '(Excluding Tax)', NULL, '2021-05-18 08:46:57', '2021-05-18 08:46:57'),
(1614, 0, 'fr', '_json', 'Package', NULL, '2021-05-18 08:46:57', '2021-05-18 08:46:57'),
(1615, 0, 'fr', '_json', 'Cart', 'Panier', '2021-05-18 08:46:57', '2021-05-19 09:14:06'),
(1616, 0, 'fr', '_json', 'Nuit', NULL, '2021-05-18 08:46:57', '2021-05-18 08:46:57'),
(1617, 0, 'fr', '_json', 'Personne', NULL, '2021-05-18 08:46:57', '2021-05-18 08:46:57'),
(1618, 0, 'fr', '_json', 'Checkout', NULL, '2021-05-18 08:46:57', '2021-05-18 08:46:57'),
(1619, 0, 'fr', '_json', 'Days', 'Jours', '2021-05-18 08:46:57', '2021-05-19 09:14:06'),
(1620, 0, 'fr', '_json', 'Persons', NULL, '2021-05-18 08:46:57', '2021-05-18 08:46:57'),
(1621, 0, 'fr', '_json', 'subtotal', 'Sous Total', '2021-05-18 08:46:57', '2021-05-19 09:14:06'),
(1622, 0, 'fr', '_json', 'Menu', NULL, '2021-05-18 08:46:57', '2021-05-18 08:46:57'),
(1623, 0, 'fr', '_json', 'Special Offers', 'Offre Special', '2021-05-18 08:46:57', '2021-05-19 09:14:06'),
(1624, 0, 'fr', '_json', 'Offers List', 'Liste des offres', '2021-05-18 08:46:57', '2021-05-19 09:14:06'),
(1625, 0, 'fr', '_json', 'Transactions', NULL, '2021-05-18 08:46:57', '2021-05-18 08:46:57'),
(1626, 0, 'fr', '_json', 'Add Offer Type', NULL, '2021-05-19 08:28:40', '2021-05-19 08:28:40'),
(1627, 0, 'fr', '_json', 'Date d’émission', NULL, '2021-05-19 08:28:41', '2021-05-19 08:28:41'),
(1628, 0, 'fr', '_json', 'From', 'Depuis', '2021-05-19 08:28:41', '2021-05-19 09:14:06'),
(1629, 0, 'fr', '_json', 'To', NULL, '2021-05-19 08:28:42', '2021-05-19 08:28:42'),
(1630, 0, 'fr', '_json', 'Service', NULL, '2021-05-19 08:28:42', '2021-05-19 08:28:42'),
(1631, 0, 'fr', '_json', 'Bon pour Accord', NULL, '2021-05-19 08:28:42', '2021-05-19 08:28:42'),
(1632, 0, 'fr', '_json', 'Contact Details', 'Details du Contact', '2021-05-19 08:28:42', '2021-05-19 09:14:06'),
(1633, 0, 'fr', '_json', 'User Profile', 'Profil Utilisateur', '2021-05-19 08:28:45', '2021-05-19 09:14:06'),
(1634, 0, 'en', '_json', 'Prix', 'Price', '2021-05-19 08:48:09', '2021-05-19 09:14:06'),
(1635, 0, 'en', '_json', 'Ville', 'City', '2021-05-19 08:55:37', '2021-05-19 09:14:06'),
(1636, 0, 'en', '_json', 'Nuit', 'Night', '2021-05-19 08:56:39', '2021-05-19 09:14:06'),
(1637, 0, 'fr', '_json', 'Special Offers List', NULL, '2021-05-19 09:09:21', '2021-05-19 09:09:21'),
(1638, 0, 'fr', '_json', 'Special Offers Type', NULL, '2021-05-19 09:09:21', '2021-05-19 09:09:21'),
(1639, 0, 'fr', '_json', 'Offers', 'Offres', '2021-05-19 09:09:21', '2021-05-19 09:14:06'),
(1640, 0, 'fr', '_json', 'Offers Category List', 'Activité des Offres', '2021-05-19 09:09:21', '2021-05-19 09:14:06'),
(1641, 0, 'fr', '_json', 'Offers Category Type List', 'Type d\'activité des Offres', '2021-05-19 09:09:21', '2021-05-19 09:14:06'),
(1642, 0, 'fr', '_json', 'Edit Package', NULL, '2021-05-20 11:29:17', '2021-05-20 11:29:17'),
(1643, 0, 'fr', '_json', 'nights', NULL, '2021-05-20 11:29:18', '2021-05-20 11:29:18');

-- --------------------------------------------------------

--
-- Table structure for table `markdowns`
--

CREATE TABLE `markdowns` (
  `id` int(10) UNSIGNED NOT NULL,
  `airline_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `markdowns`
--

INSERT INTO `markdowns` (`id`, `airline_code`, `type`, `value`, `created_at`, `updated_at`) VALUES
(1, 'AF', 1, 7000, '2021-01-28 09:16:30', '2021-01-28 09:16:30'),
(2, 'BA', 1, 20000, '2021-01-28 09:16:30', '2021-01-28 09:16:30'),
(3, 'BI', 1, 30000, '2021-01-28 09:16:30', '2021-01-28 09:16:30'),
(4, 'EK', 1, 3000, '2021-01-28 09:16:30', '2021-01-28 09:16:30'),
(5, 'TK', 1, 40000, '2021-01-28 09:16:30', '2021-01-28 09:16:30'),
(6, 'LH', 1, 6000, '2021-01-28 09:16:30', '2021-01-28 09:16:30'),
(7, 'Air France', 1, 100, '2021-04-15 13:57:26', '2021-04-15 13:57:26'),
(8, 'Lufthansa', 1, 11, '2021-04-15 13:57:53', '2021-04-15 14:02:01');

-- --------------------------------------------------------

--
-- Table structure for table `markups`
--

CREATE TABLE `markups` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `flight_markup_type` int(11) NOT NULL DEFAULT '1',
  `flight_markup_value` int(11) NOT NULL DEFAULT '0',
  `hotel_markup_type` int(11) NOT NULL DEFAULT '1',
  `hotel_markup_value` int(11) NOT NULL DEFAULT '0',
  `car_markup_type` int(11) NOT NULL DEFAULT '1',
  `car_markup_value` int(11) NOT NULL DEFAULT '0',
  `package_markup_type` int(11) NOT NULL DEFAULT '1',
  `package_markup_value` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `markups`
--

INSERT INTO `markups` (`id`, `role_id`, `flight_markup_type`, `flight_markup_value`, `hotel_markup_type`, `hotel_markup_value`, `car_markup_type`, `car_markup_value`, `package_markup_type`, `package_markup_value`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 10000, 1, 10000, 1, 10000, 1, 10000, '2021-01-28 09:16:30', '2021-01-28 09:16:30'),
(2, 3, 1, 10000, 1, 10000, 1, 10000, 1, 10000, '2021-01-28 09:16:30', '2021-01-28 09:16:30');

-- --------------------------------------------------------

--
-- Table structure for table `markup_types`
--

CREATE TABLE `markup_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `markup_types`
--

INSERT INTO `markup_types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Flight', '2021-01-28 09:16:31', '2021-01-28 09:16:31'),
(2, 'Hotel', '2021-01-28 09:16:31', '2021-01-28 09:16:31'),
(3, 'Car', '2021-01-28 09:16:31', '2021-01-28 09:16:31'),
(4, 'Package', '2021-01-28 09:16:31', '2021-01-28 09:16:31');

-- --------------------------------------------------------

--
-- Table structure for table `markup_value_types`
--

CREATE TABLE `markup_value_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `markup_value_types`
--

INSERT INTO `markup_value_types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Dirham Marocain', '2021-01-28 09:16:31', '2021-01-28 09:16:31'),
(2, 'Percentage', '2021-01-28 09:16:31', '2021-01-28 09:16:31');

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
(51, '2020_02_26_041322_create_post_translations_table', 1),
(52, '2021_04_05_114424_create_admin_menu_items_table', 0),
(53, '2021_04_05_114424_create_admin_menus_table', 0),
(54, '2021_04_05_114424_create_agency_profiles_table', 0),
(55, '2021_04_05_114424_create_airlines_table', 0),
(56, '2021_04_05_114424_create_airports_table', 0),
(57, '2021_04_05_114424_create_amenities_table', 0),
(58, '2021_04_05_114424_create_amenities_translations_table', 0),
(59, '2021_04_05_114424_create_attractions_table', 0),
(60, '2021_04_05_114424_create_bank_details_table', 0),
(61, '2021_04_05_114424_create_bank_payments_table', 0),
(62, '2021_04_05_114424_create_banks_table', 0),
(63, '2021_04_05_114424_create_bookings_table', 0),
(64, '2021_04_05_114424_create_cabin_types_table', 0),
(65, '2021_04_05_114424_create_car_bookings_table', 0),
(66, '2021_04_05_114424_create_categories_table', 0),
(67, '2021_04_05_114424_create_category_translations_table', 0),
(68, '2021_04_05_114424_create_cities_table', 0),
(69, '2021_04_05_114424_create_city_translations_table', 0),
(70, '2021_04_05_114424_create_comments_table', 0),
(71, '2021_04_05_114424_create_cooperate_customer_profiles_table', 0),
(72, '2021_04_05_114424_create_countries_table', 0),
(73, '2021_04_05_114424_create_customers_table', 0),
(74, '2021_04_05_114424_create_email_subscribers_table', 0),
(75, '2021_04_05_114424_create_flight_bookings_table', 0),
(76, '2021_04_05_114424_create_flight_deals_table', 0),
(77, '2021_04_05_114424_create_galleries_table', 0),
(78, '2021_04_05_114424_create_genders_table', 0),
(79, '2021_04_05_114424_create_good_to_knows_table', 0),
(80, '2021_04_05_114424_create_hotel_bookings_table', 0),
(81, '2021_04_05_114424_create_hotel_deals_table', 0),
(82, '2021_04_05_114424_create_hotels_table', 0),
(83, '2021_04_05_114424_create_languages_table', 0),
(84, '2021_04_05_114424_create_ltm_translations_table', 0),
(85, '2021_04_05_114424_create_markdowns_table', 0),
(86, '2021_04_05_114424_create_markup_types_table', 0),
(87, '2021_04_05_114424_create_markup_value_types_table', 0),
(88, '2021_04_05_114424_create_markups_table', 0),
(89, '2021_04_05_114424_create_notifications_table', 0),
(90, '2021_04_05_114424_create_online_payments_table', 0),
(91, '2021_04_05_114424_create_package_attractions_table', 0),
(92, '2021_04_05_114424_create_package_bookings_table', 0),
(93, '2021_04_05_114424_create_package_categories_table', 0),
(94, '2021_04_05_114424_create_package_flights_table', 0),
(95, '2021_04_05_114424_create_package_hotels_table', 0),
(96, '2021_04_05_114424_create_package_types_table', 0),
(98, '2021_04_05_114424_create_page_translations_table', 0),
(99, '2021_04_05_114424_create_password_resets_table', 0),
(100, '2021_04_05_114424_create_pay_laters_table', 0),
(101, '2021_04_05_114424_create_permission_role_table', 0),
(102, '2021_04_05_114424_create_permissions_table', 0),
(103, '2021_04_05_114424_create_place_translations_table', 0),
(104, '2021_04_05_114424_create_place_type_translations_table', 0),
(105, '2021_04_05_114424_create_place_types_table', 0),
(106, '2021_04_05_114424_create_places_table', 0),
(107, '2021_04_05_114424_create_post_translations_table', 0),
(108, '2021_04_05_114424_create_posts_table', 0),
(109, '2021_04_05_114424_create_profiles_table', 0),
(110, '2021_04_05_114424_create_purchase_details_table', 0),
(111, '2021_04_05_114424_create_purchases_table', 0),
(112, '2021_04_05_114424_create_return_details_table', 0),
(113, '2021_04_05_114424_create_returns_table', 0),
(114, '2021_04_05_114424_create_reviews_table', 0),
(115, '2021_04_05_114424_create_role_user_table', 0),
(116, '2021_04_05_114424_create_roles_table', 0),
(117, '2021_04_05_114424_create_sale_details_table', 0),
(118, '2021_04_05_114424_create_sales_table', 0),
(119, '2021_04_05_114424_create_settings_table', 0),
(120, '2021_04_05_114424_create_sight_seeings_table', 0),
(121, '2021_04_05_114424_create_suppliers_table', 0),
(122, '2021_04_05_114424_create_testimonial_translations_table', 0),
(123, '2021_04_05_114424_create_testimonials_table', 0),
(124, '2021_04_05_114424_create_titles_table', 0),
(125, '2021_04_05_114424_create_travel_packages_table', 0),
(126, '2021_04_05_114424_create_users_table', 0),
(127, '2021_04_05_114424_create_vats_table', 0),
(128, '2021_04_05_114424_create_visa_applications_table', 0),
(129, '2021_04_05_114424_create_vouchers_table', 0),
(130, '2021_04_05_114424_create_wallet_log_types_table', 0),
(131, '2021_04_05_114424_create_wallet_logs_table', 0),
(132, '2021_04_05_114424_create_wallets_table', 0),
(133, '2021_04_05_114424_create_wishlists_table', 0),
(134, '2021_04_05_114428_add_foreign_keys_to_amenities_translations_table', 0),
(135, '2021_04_05_114428_add_foreign_keys_to_city_translations_table', 0),
(136, '2021_04_05_114428_add_foreign_keys_to_customers_table', 0),
(137, '2021_04_05_114428_add_foreign_keys_to_page_translations_table', 0),
(138, '2021_04_05_114428_add_foreign_keys_to_permission_role_table', 0),
(139, '2021_04_05_114428_add_foreign_keys_to_place_translations_table', 0),
(140, '2021_04_05_114428_add_foreign_keys_to_place_type_translations_table', 0),
(141, '2021_04_05_114428_add_foreign_keys_to_post_translations_table', 0),
(142, '2021_04_05_114428_add_foreign_keys_to_purchase_details_table', 0),
(143, '2021_04_05_114428_add_foreign_keys_to_purchases_table', 0),
(144, '2021_04_05_114428_add_foreign_keys_to_return_details_table', 0),
(145, '2021_04_05_114428_add_foreign_keys_to_returns_table', 0),
(146, '2021_04_05_114428_add_foreign_keys_to_role_user_table', 0),
(147, '2021_04_05_114428_add_foreign_keys_to_sale_details_table', 0),
(148, '2021_04_05_114428_add_foreign_keys_to_sales_table', 0),
(149, '2021_04_05_114428_add_foreign_keys_to_users_table', 0),
(150, '2021_04_13_094214_create_newsletters_table', 0),
(151, '2021_04_16_025627_create_faqs_table', 0),
(153, '2021_04_20_104131_create_offers_table', 0),
(154, '2021_04_20_114424_create_offer_translations_table', 0),
(155, '2021_04_05_114424_create_category_type_translations_table', 0),
(156, '2021_04_06_114424_create_category_types_table', 0),
(157, '2021_04_06_114424_create_category_translations_table', 0),
(158, '2021_05_06_130604_create_package_features_table', 2),
(159, '2021_05_06_130644_create_package_conditions_table', 2),
(160, '2021_05_06_134208_create_package_rates_table', 2),
(161, '2021_04_05_114424_create_packages_table', 3),
(162, '2021_05_06_293551_add-role-id-to-menu-items-table', 4),
(163, '2021_05_19_095150_create_rate_booking_table', 5),
(164, '2021_06_16_154102_create_permission_tables', 6),
(165, '2021_04_19_104131_create_sliders_table', 7),
(166, '2021_06_21_112151_create_home_settings_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'zakarialabib@gmail.com', '2021-04-13 12:04:03', '2021-04-13 12:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(191) NOT NULL,
  `booking_id` int(191) UNSIGNED DEFAULT NULL,
  `user_id` int(191) DEFAULT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `booking_id`, `user_id`, `is_read`, `created_at`, `updated_at`) VALUES
(2, NULL, 14, 1, '2021-04-08 13:00:51', '2021-04-08 13:01:45'),
(3, 132, NULL, 1, '2021-05-20 09:23:42', '2021-06-17 10:32:43'),
(4, 133, NULL, 1, '2021-05-21 10:44:26', '2021-06-17 10:32:43'),
(5, 134, NULL, 1, '2021-05-28 15:34:19', '2021-06-17 10:32:43'),
(6, 136, NULL, 1, '2021-06-21 14:46:22', '2021-06-23 10:33:03'),
(7, 137, NULL, 1, '2021-06-21 14:46:55', '2021-06-23 10:33:03'),
(8, 138, NULL, 1, '2021-06-21 14:54:00', '2021-06-23 10:33:03'),
(9, NULL, 17, 0, '2021-06-22 18:30:44', '2021-06-22 18:30:44');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `city_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `short_desc` text COLLATE utf8mb4_unicode_ci,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `thumb` text COLLATE utf8mb4_unicode_ci,
  `itinerary` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) DEFAULT '1',
  `seo_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT=' x';

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `user_id`, `category_id`, `city_id`, `name`, `slug`, `description`, `short_desc`, `reference`, `price`, `thumb`, `itinerary`, `status`, `seo_title`, `seo_description`, `is_featured`, `created_at`, `updated_at`) VALUES
(8, 1, 12, 31, NULL, 'lagoon-500-caldera-private-cruise', NULL, '', '0000000001', 0, '/photos/1/053e30d242a197d9734bc1fa5586ca2f.jpg,/photos/1/127826d29bd25ea0f119d2b670225375.JPG,/photos/1/8cecbc0160620b4d56ba97b3323736c5.JPG,/photos/1/9b51327220a5aa46a159fc48637a627e.jpg', '[{\"title\":\"Day 1\",\"description\":\"DAY 1\"}]', 1, NULL, NULL, 0, '2021-05-12 11:33:16', '2021-06-22 10:01:05'),
(9, 1, 11, 31, NULL, 'sunreef-yachts', NULL, '', '2', 0, '/photos/1/Pardo-431.jpg,/photos/1/Yacht-1.jpg', NULL, 1, NULL, NULL, 0, '2021-06-15 11:22:44', '2021-06-21 10:43:26'),
(10, 1, 11, 31, NULL, 'caldera-gold', NULL, '', '3', 0, '/photos/1/280f43e6bc388bc1c150b2a12d069fb9.jpg,/photos/1/d189bf6f1c7ad8e27a9eb078439ed711.jpg,/photos/1/a0ca90493ed2e03c1e6336466f926da4.jpg,/photos/1/a5c97a94b8173630e6a782aeeeafe121.PNG', NULL, 1, NULL, NULL, 0, '2021-06-22 09:56:43', '2021-06-22 09:56:43'),
(11, 1, 11, 31, NULL, 'riva-rivarama-44-caldera-private-cruise', NULL, '', '4', 0, '/photos/1/8e899e98e85e77ec7e96113ff8a54eda.jpg,/photos/1/a1ba3ad6b8be873f0015e00ff688271b.jpg,/photos/1/44c890cc8f75582bd7414df2c7e12ac5.jpg,/photos/1/d7acb88b2507a54c7bfe77517620541f.jpg,/photos/1/6b34681fbe5a251e239a0153c36d4776.jpg,/photos/1/9f19726804590b98f8f0862e47e5b7b5.JPG', '[{\"title\":\"title\",\"description\":\"title\"}]', 1, NULL, NULL, 1, '2021-06-22 10:23:36', '2021-06-23 11:43:49');

-- --------------------------------------------------------

--
-- Table structure for table `offer_translations`
--

CREATE TABLE `offer_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `offer_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `short_desc` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offer_translations`
--

INSERT INTO `offer_translations` (`id`, `offer_id`, `locale`, `name`, `description`, `short_desc`) VALUES
(3, 4, 'en', 'Rotana', '<p><br />\r\nRotana</p>', NULL),
(4, 4, 'fr', 'Rotana', '<p>Rotana</p>', NULL),
(5, 5, 'en', 'Rotana', '<p>Rotana</p>', NULL),
(6, 5, 'fr', 'Rotana', '<p>Rotana</p>', NULL),
(7, 8, 'en', 'Hotel du Golf Rotana / Golf Club Rotana', '<p>With an outstanding location overlooking one of the most sought-after golf courses in Marrakech, <strong>H&ocirc;tel du Golf Rotana</strong> is the place to relax and enjoy 5 star luxury and world-class facilities. Nestled at the heart of the stunning <strong>Palmeraie Rotana Resort </strong>is&nbsp;situated in the north of the Marrakech.&nbsp;This design-led property blends modern Moroccan architecture with art deco style and a warm inviting colour scheme to create a cosy and laid-back ambiance. Magnificent views of the fairways at the <strong>Golf Club Rotana</strong> and the stunning Atlas Mountains backdrop are part of this exceptional lifestyle experience.</p>\r\n\r\n<p><strong>All 315 hotel rooms</strong> and suites are modern, spacious and ideal for both leisure and business stays in Marrakech. Expansive floor-to-ceiling windows are a design highlight, flooding each room with glorious Moroccan sunshine and offering guests breath-taking views of the gardens, pool and/or the golf course.</p>\r\n\r\n<p>Guests can choose from the resort&rsquo;s <strong>12 unique dining experiences</strong>, from specialty restaurants serving authentic Moroccan, Italian, Mediterranean and Asian flavours, to casual pool bars and beach lounges, including Nikki Beach Club where inventive fusion cuisine and a party atmosphere await. For convenience, three of these venues - an international restaurant, poolside snack bar and a bar lounge - are located at the <strong>H&ocirc;tel du Golf Rotana</strong> Palmeraie.</p>\r\n\r\n<p>In addition to the 18-hole championship golf course, a wide range of resort facilities are on the hotel&rsquo;s doorstep, including the purpose-built Conference Centre, which caters to all corporate and social occasions in Marrakech. For some well-deserved me time, work out or relax in the fully equipped <strong>Bodylines Fitness &amp; Wellness Club</strong> with indoor swimming pool, Jacuzzi, sauna and steam rooms, or be pampered at <strong>Zen the spa at Rotana</strong>. For a bit of fun guests can also enjoy the resort&#39;s offers bowling, tennis, basketball and a vast entertainment programme designed for all ages and our kids&rsquo; club keeps young guests busy with activities galore.</p>', NULL),
(8, 8, 'fr', 'LAGOON 500 | CALDERA PRIVATE CRUISE', '<p><strong>The optimal structure combined with great performance!</strong></p>\r\n\r\n<p>Catamaran Lagoon 500 combines the optimal structure, and a great performance under sail guaranteed! Fly bridge with two access points, helm station provides perfect visibility and a bench seat that can accommodate the entire crew, spacious cockpit, ideal for sunbathing, on the same level as the galley.</p>\r\n\r\n<p>Perfect for celebrating special occasions, our Private Yachts, are ideally suited for intimate gatherings for those who wish to have their own exclusive sailing experience. Specialized arrangements can also be made for incentive groups. Arrange your special moment of your wedding on board, overlooking the unique caldera of Santorini, under the magnificent colours of the sunset while our chef prepares your &ldquo;moment in time&rdquo; menu.</p>\r\n\r\n<p><a name=\"_Hlk64128068\"><strong>The cruise package includes complimentary:</strong></a></p>\r\n\r\n<p>&bull; Transportation from/to the hotel with a/c bus</p>\r\n\r\n<p>&bull; Welcome drink, lunch or dinner with seafood, chicken fillet and salads, dessert, open bar with white local wine, beers &amp; beverages (special dietary needs available upon request)</p>\r\n\r\n<p>&bull; Snorkeling gear</p>\r\n\r\n<p>&bull; Maps and information about our island</p>\r\n\r\n<p>&bull; Towels</p>\r\n\r\n<p><strong>Specifications</strong></p>\r\n\r\n<p>5 cabins</p>\r\n\r\n<p>5 heads</p>\r\n\r\n<p>1 saloon inside and 1 deck saloon</p>\r\n\r\n<p>Full equipped kitchen</p>\r\n\r\n<p>Electric generator</p>\r\n\r\n<p>a/c</p>\r\n\r\n<p>Water maker</p>\r\n\r\n<p>TV, DVD, stereo system</p>\r\n\r\n<p><strong>Particulars</strong></p>\r\n\r\n<p>Length: 50ft - Beam: 28ft</p>\r\n\r\n<p>Engine: 2x75 Hp Yanmar Diesel</p>\r\n\r\n<p>Cruising speed: 8 knots</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>*</strong><strong>Please note your hotel stay at the comments section, and any other special request about your reservation</strong></p>\r\n\r\n<p>* The company reserves the right a) to modify the route of the tour or cancel it due to inclement weather b) to carry out the tour with any vessel of the same category depending on the availability</p>\r\n\r\n<p>**The duration and the time schedule of the tour is adjusted during the season depending on the time of sunset</p>', NULL),
(9, 9, 'en', 'Sunreef yachts', 'Sunreef yachts', NULL),
(10, 9, 'fr', 'Sunreef yachts', '<p>Sunreef yachts</p>', NULL),
(11, 10, 'en', 'CALDERA GOLD', 'Caldera Gold Cruise\r\nDay Cruise\r\n\r\nOur Day Cruise begins, with a stop to the Red Beach, for enjoying a refreshing swim, followed by a pleasant sail along the White Beach, Black Mountain and the big Light House, south of the Caldera. Explore unmanned volcanic beaches where the spectacular colors will amaze you or just sunbathing on deck. Whilst heading to the Hot Springs, you will feel the energy of the Volcano and the spirit of the island. Our next stop is in Thirassia island.  A fishermen’s island, only for swim and admire the unique view of Manolas village, just before we enter the old port of Ammoudi. A delicious lunch with wine and dessert is served onboard.\r\nSunset Cruise\r\n\r\nThe Sunset Cruise starts from old port Ammoudi and followed by visiting, Thirassia island, Palea Kameni for swim at the famous Hot Springs, Volcano where you can do snorkeling, swim, or just enjoy the sun, the Black Rock of the Indian, the White and the Red Beach. Sailing along our beautiful coastline, you will be left breathless as you admire the unique Caldera and the spectacular colours of the world’s famous Santorinean sunset before we enter the port of Vlihada. As the night falls, a sumptuous dinner is served complete with wine and dessert. \r\n\r\nFacilities:\r\nThe cruise package includes complimentary:\r\n\r\n• Transportation from/to the hotel with a/c bus\r\n\r\n• Lunch or dinner with seafood, chicken fillet and salads, open bar with white wine, beers & beverages, dessert (Special dietary needs available upon request)\r\n\r\n• Snorkeling gear\r\n\r\n• Towels \r\n\r\n• Maps and information about our island\r\n\r\n\r\n*Please note your hotel stay at the comments section, and any other special request about your reservation\r\n\r\n* The company reserves the right a) to modify the route of the tour or cancel it due to inclement weather b) to carry out the tour with any vessel of the same category depending on the availability \r\n\r\n**The duration and the time schedule of the tour is adjusted during the season depending on the time of sunset.', NULL),
(12, 10, 'fr', 'CALDERA GOLD', '<p><strong>Caldera Gold Cruise</strong></p>\r\n\r\n<p><strong>Day Cruise</strong></p>\r\n\r\n<p>Our Day Cruise begins, with a stop to the Red Beach, for enjoying a refreshing swim, followed by a pleasant sail along the White Beach, Black Mountain and the big Light House, south of the Caldera. Explore unmanned volcanic beaches where the spectacular colors will amaze you or just sunbathing on deck. Whilst heading to the Hot Springs, you will feel the energy of the Volcano and the spirit of the island. Our next stop is in Thirassia island. &nbsp;A fishermen&rsquo;s island, only for swim and admire the unique view of Manolas village, just before we enter the old port of Ammoudi. A delicious lunch with wine and dessert is served onboard.</p>\r\n\r\n<h2><strong>Sunset Cruise</strong></h2>\r\n\r\n<p>The Sunset Cruise starts from old port Ammoudi and followed by visiting, Thirassia island, Palea Kameni for swim at the famous Hot Springs, Volcano where you can do snorkeling, swim, or just enjoy the sun, the Black Rock of the Indian, the White and the Red Beach. Sailing along our beautiful coastline, you will be left breathless as you admire the unique Caldera and the spectacular colours of the world&rsquo;s famous Santorinean sunset before we enter the port of Vlihada. As the night falls, a sumptuous dinner is served complete with wine and dessert.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Facilities</strong><strong><em>:</em></strong></p>\r\n\r\n<p><strong>The cruise package includes complimentary:</strong></p>\r\n\r\n<p>&bull; Transportation from/to the hotel with a/c bus</p>\r\n\r\n<p>&bull; Lunch or dinner with seafood, chicken fillet and salads, open bar with white wine, beers &amp; beverages, dessert (Special dietary needs available upon request)</p>\r\n\r\n<p>&bull; Snorkeling gear</p>\r\n\r\n<p>&bull; Towels&nbsp;</p>\r\n\r\n<p><strong>&bull; Maps and information about our island</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>*</strong><strong>Please note your hotel stay at the comments section, and any other special request about your reservation</strong></p>\r\n\r\n<p>* The company reserves the right a) to modify the route of the tour or cancel it due to inclement weather b) to carry out the tour with any vessel of the same category depending on the availability&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>**The duration and the time schedule of the tour is adjusted during the season depending on the time of sunset.</p>', NULL),
(13, 11, 'en', 'RIVA RIVARAMA 44 | CALDERA PRIVATE CRUISE', '<p>A 5star experience! Get to know and enjoy the unique rime of the Caldera with Riva exceptional, luxury motor yacht that will completely satisfy your needs and fulfil all your secret desires. State of Art technology and tradition, elegance and timeless beauty merge with the waters of the Aegean sea! On board the &ldquo;Andiamo&rdquo; you will feel the essence of the water, and you will experience a unique vibrant vitality! Travel to a different magic world of elegance, unique style and comfort, enchanting yourself in the relaxing lull of the sea. Let the intense colours and scents seduce your senses. Enjoy the sun and sea-breeze aboard or the breath-taking sunset. From the moment you step on board, you are the real captain of this different journey! The cruise package includes complimentary: Transportation from/to the hotel with a/c bus Welcome drink Prosecco, Variety of local Greek appetizers such as olives, biscuit with fava beans and oil, cherry tomato, cheese, apaki, lunch or dinner with salmon with balsamic sauce, honey, mustard and wine or chicken fillet accompanied by sweet and sour sauce and avocado sauce, vegetable rice, salads, fresh summer fruits, dessert, semi-sweet sparkling wine, local wine, beers &amp; beverages (special dietary needs available upon request) Snorkeling gear Maps and information about our island Towels Specifications 1 cabin 1 head deck saloon a/c, stereo system Particulars Length: 44 ft Engine: 2x700 Hp Cruising speed: 30 knots *Please note your hotel stay at the comments section, and any other special request about your reservation * The company reserves the right a) to modify the route of the tour or cancel it due to inclement weather b) to carry out the tour with any vessel of the same category depending on the availability **The duration and the time schedule of the tour is adjusted during the season depending on the time of sunset.</p>', 'Feature 1\r\nFeature 2 \r\nFeature 3'),
(14, 11, 'fr', 'RIVA RIVARAMA 44 | CALDERA PRIVATE CRUISE', '<h2><strong>A 5star experience!</strong></h2>\r\n\r\n<p>Get to know and enjoy the unique rime of the Caldera with Riva exceptional, luxury motor yacht that will completely satisfy your needs and fulfil all your secret desires. State of Art technology and tradition, elegance and timeless beauty merge with the waters of the Aegean sea! On board the &ldquo;Andiamo&rdquo; you will feel the essence of the water, and you will experience a unique vibrant vitality! Travel to a different magic world of elegance, unique style and comfort, enchanting yourself in the relaxing lull of the sea. Let the intense colours and scents seduce your senses. Enjoy the sun and sea-breeze aboard or the breath-taking sunset. From the moment you step on board, you are the real captain of this different journey!</p>\r\n\r\n<p><strong>The cruise package includes complimentary:&nbsp;</strong></p>\r\n\r\n<ul>\r\n	<li>Transportation from/to the hotel with a/c bus</li>\r\n	<li>Welcome drink Prosecco, Variety of local Greek appetizers such as olives, biscuit with fava beans and oil, cherry tomato, cheese, apaki, lunch or dinner with salmon with balsamic sauce, honey, mustard and wine or chicken fillet accompanied by sweet and sour sauce and avocado sauce, vegetable rice, salads, fresh summer fruits, dessert, semi-sweet sparkling wine, local wine, beers &amp; beverages (special dietary needs available upon request)</li>\r\n	<li>Snorkeling gear</li>\r\n	<li>Maps and information about our island</li>\r\n	<li>Towels</li>\r\n</ul>\r\n\r\n<p><strong>Specifications</strong></p>\r\n\r\n<ul>\r\n</ul>\r\n\r\n<p>1 cabin</p>\r\n\r\n<p>1 head</p>\r\n\r\n<p>deck saloon</p>\r\n\r\n<p>a/c, stereo system</p>\r\n\r\n<p><strong>Particulars</strong></p>\r\n\r\n<p>Length: 44 ft</p>\r\n\r\n<p>Engine: 2x700 Hp</p>\r\n\r\n<p>Cruising speed: 30 knots</p>\r\n\r\n<p><strong>*</strong><strong>Please note your hotel stay at the comments section, and any other special request about your reservation</strong></p>\r\n\r\n<p>* The company reserves the right a) to modify the route of the tour or cancel it due to inclement weather b) to carry out the tour with any vessel of the same category depending on the availability&nbsp;</p>\r\n\r\n<p>**The duration and the time schedule of the tour is adjusted during the season depending on the time of sunset.</p>', 'Feature 1\r\nFeature 2 \r\nFeature 3');

-- --------------------------------------------------------

--
-- Table structure for table `online_payments`
--

CREATE TABLE `online_payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `reference` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `booking_reference` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` bigint(20) NOT NULL,
  `gateway_id` int(11) NOT NULL,
  `response_code` text COLLATE utf8mb4_unicode_ci,
  `response_description` longtext COLLATE utf8mb4_unicode_ci,
  `payment_status` int(11) NOT NULL,
  `response_full` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(10) UNSIGNED NOT NULL,
  `offer_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `period` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `offer_id`, `title`, `period`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 8, 'GOLF PACKAGE HOLE IN ONE 3 nights', 3, '2020-11-01', '2021-10-31', '2021-05-12 11:38:01', '2021-05-12 11:38:01'),
(2, 8, 'GOLF PACKAGE HOLE IN ONE 7 nights', 7, '2020-11-01', '2021-10-31', '2021-05-20 09:20:18', '2021-05-20 09:20:18'),
(3, 9, 'semi private cruise', 1, '2021-06-15', '2022-06-15', '2021-06-15 11:29:06', '2021-06-15 11:29:06'),
(5, 9, 'private cruise', 1, '2021-06-15', '2022-06-15', '2021-06-15 12:30:29', '2021-06-15 12:30:29'),
(6, 9, 'private cruise', 1, '2021-06-15', '2021-06-30', '2021-06-15 12:32:36', '2021-06-15 12:32:36');

-- --------------------------------------------------------

--
-- Table structure for table `package_attractions`
--

CREATE TABLE `package_attractions` (
  `id` int(10) UNSIGNED NOT NULL,
  `package_id` int(11) DEFAULT NULL,
  `attraction_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_attractions`
--

INSERT INTO `package_attractions` (`id`, `package_id`, `attraction_name`, `address`, `created_at`, `updated_at`) VALUES
(1, 1, 'rotana', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `package_bookings`
--

CREATE TABLE `package_bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adults` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `infants` int(11) NOT NULL,
  `customer_title_id` int(11) NOT NULL,
  `customer_sur_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_other_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` int(11) NOT NULL,
  `booking_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package_categories`
--

CREATE TABLE `package_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_categories`
--

INSERT INTO `package_categories` (`id`, `category`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Food & Culinary', 1, '2021-01-28 09:16:31', '2021-01-28 09:16:31'),
(2, 'Fashion & Shopping', 1, '2021-01-28 09:16:31', '2021-01-28 09:16:31'),
(3, 'Music & Festival', 1, '2021-01-28 09:16:31', '2021-01-28 09:16:31'),
(4, 'History & Culture', 1, '2021-01-28 09:16:31', '2021-01-28 09:16:31'),
(5, 'Sports & Nature', 1, '2021-01-28 09:16:31', '2021-01-28 09:16:31'),
(6, 'Entertain & Gamble', 1, '2021-01-28 09:16:31', '2021-01-28 09:16:31'),
(7, 'Health & Beauty', 1, '2021-01-28 09:16:31', '2021-01-28 09:16:31');

-- --------------------------------------------------------

--
-- Table structure for table `package_conditions`
--

CREATE TABLE `package_conditions` (
  `id` int(10) UNSIGNED NOT NULL,
  `package_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_conditions`
--

INSERT INTO `package_conditions` (`id`, `package_id`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, 'city taxes not included', '2021-05-12 11:38:01', '2021-05-12 11:38:01'),
(3, 1, 'upon availability', '2021-05-12 11:39:50', '2021-05-12 11:39:50'),
(4, 2, 'ijijiji', '2021-05-20 09:20:18', '2021-05-20 09:20:18'),
(5, 3, 'up to 4 passengers', '2021-06-15 11:29:06', '2021-06-15 11:29:06'),
(7, 5, 'particular : lenght 13m beam 5.2', '2021-06-15 12:30:29', '2021-06-15 12:30:29'),
(8, 6, 'f', '2021-06-15 12:32:36', '2021-06-15 12:32:36');

-- --------------------------------------------------------

--
-- Table structure for table `package_features`
--

CREATE TABLE `package_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_features`
--

INSERT INTO `package_features` (`id`, `package_id`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, 'transfert airoport', '2021-05-12 11:38:01', '2021-05-12 11:38:01'),
(3, 1, 'accommondation', '2021-05-12 11:39:50', '2021-05-12 11:39:50'),
(4, 2, 'okokoko', '2021-05-20 09:20:18', '2021-05-20 09:20:18'),
(5, 3, 'particulars : length 13.1 beam 5.2', '2021-06-15 11:29:06', '2021-06-15 11:29:06'),
(7, 5, 'particular : lenght 13m beam 5.2', '2021-06-15 12:30:29', '2021-06-15 12:30:29'),
(8, 6, 'f', '2021-06-15 12:32:36', '2021-06-15 12:32:36');

-- --------------------------------------------------------

--
-- Table structure for table `package_flights`
--

CREATE TABLE `package_flights` (
  `id` int(10) UNSIGNED NOT NULL,
  `package_id` int(11) DEFAULT NULL,
  `from_location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `airline` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departure_date_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arrival_date_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package_hotels`
--

CREATE TABLE `package_hotels` (
  `id` int(10) UNSIGNED NOT NULL,
  `package_id` int(11) DEFAULT NULL,
  `hotel_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci,
  `hotel_star_rating` int(11) DEFAULT NULL,
  `hotel_location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hotel_info` longtext COLLATE utf8mb4_unicode_ci,
  `gallery_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package_rates`
--

CREATE TABLE `package_rates` (
  `id` int(10) UNSIGNED NOT NULL,
  `package_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `capacity` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_rates`
--

INSERT INTO `package_rates` (`id`, `package_id`, `title`, `start_date`, `end_date`, `price`, `capacity`, `created_at`, `updated_at`) VALUES
(1, 1, 'Single Room', '2021-04-15', '2021-10-31', '4126.00', 4, '2021-05-12 11:38:01', '2021-05-12 11:38:01'),
(2, 1, 'Single Room', '2020-11-01', '2021-04-14', '4616.00', 1, '2021-05-12 11:38:01', '2021-05-12 11:38:01'),
(3, 1, 'Double room', '2021-04-15', '2021-10-31', '5552.00', 2, '2021-05-12 11:39:50', '2021-05-12 11:39:50'),
(4, 2, 'Single Room', '2021-04-15', '2021-10-30', '9538.00', 1, '2021-05-20 09:20:18', '2021-05-20 09:20:18'),
(5, 2, 'Supplement', '2020-11-01', '2021-10-31', '500.00', 1, '2021-05-20 09:21:37', '2021-05-20 09:21:37'),
(6, 3, '1/2 day tour', '2021-06-15', '2022-06-16', '325.00', 1, '2021-06-15 11:29:06', '2021-06-15 11:29:06'),
(8, 5, '1/2 day', '2021-06-15', '2022-06-15', '1600.00', 4, '2021-06-15 12:30:29', '2021-06-15 12:30:29'),
(9, 5, 'person', '2021-06-15', '2021-06-30', '150.00', 1, '2021-06-15 12:30:51', '2021-06-15 12:30:51'),
(10, 6, 'person', '2021-06-15', '2021-06-30', '150.00', 1, '2021-06-15 12:32:36', '2021-06-15 12:32:36'),
(11, 6, '1/2 day', '2021-06-15', '2021-07-07', '1500.00', 4, '2021-06-15 12:32:36', '2021-06-15 12:32:36'),
(12, 6, '150', '2021-06-25', '2021-06-11', '100.00', 1, '2021-06-18 09:41:49', '2021-06-18 09:41:49');

-- --------------------------------------------------------

--
-- Table structure for table `package_types`
--

CREATE TABLE `package_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_types`
--

INSERT INTO `package_types` (`id`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Flight', 1, '2021-01-28 09:16:31', '2021-01-28 09:16:31'),
(2, 'Hotel', 1, '2021-01-28 09:16:31', '2021-01-28 09:16:31');

-- --------------------------------------------------------

--
-- Table structure for table `page_translations`
--

CREATE TABLE `page_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2021-06-17 09:47:11', '2021-06-17 09:47:11'),
(2, 'role-create', 'web', '2021-06-17 09:47:11', '2021-06-17 09:47:11'),
(3, 'role-edit', 'web', '2021-06-17 09:47:11', '2021-06-17 09:47:11'),
(4, 'role-delete', 'web', '2021-06-17 09:47:11', '2021-06-17 09:47:11'),
(5, 'posts-list', 'web', '2021-06-17 09:47:11', '2021-06-17 09:47:11'),
(6, 'posts-create', 'web', '2021-06-17 09:47:11', '2021-06-17 09:47:11'),
(7, 'posts-edit', 'web', '2021-06-17 09:47:11', '2021-06-17 09:47:11'),
(8, 'posts-delete', 'web', '2021-06-17 09:47:11', '2021-06-17 09:47:11'),
(9, 'create post', 'web', '2021-06-17 09:47:11', '2021-06-17 09:47:11'),
(10, 'edit post', 'web', '2021-06-17 09:47:11', '2021-06-17 09:47:11'),
(11, 'delete post', 'web', '2021-06-17 09:47:11', '2021-06-17 09:47:11'),
(12, 'create sale', 'web', '2021-06-17 09:47:11', '2021-06-17 09:47:11'),
(13, 'edit sale', 'web', '2021-06-17 09:47:11', '2021-06-17 09:47:11'),
(14, 'delete posts', 'web', '2021-06-17 09:47:11', '2021-06-17 09:47:11'),
(15, 'create delivery', 'web', '2021-06-17 09:47:11', '2021-06-17 09:47:11'),
(16, 'edit delivery', 'web', '2021-06-17 09:47:11', '2021-06-17 09:47:11'),
(17, 'delete delivery', 'web', '2021-06-17 09:47:11', '2021-06-17 09:47:11');

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `category_id` int(11) UNSIGNED DEFAULT NULL,
  `place_type` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` longtext,
  `price` double DEFAULT NULL,
  `amenities` varchar(255) DEFAULT '',
  `address` varchar(255) DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `gallery` longtext,
  `itinerary` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `booking_type` int(2) DEFAULT NULL,
  `link_bookingcom` varchar(255) DEFAULT NULL,
  `status` int(2) DEFAULT '1',
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `user_id`, `country_id`, `city_id`, `reference`, `category`, `category_id`, `place_type`, `name`, `slug`, `description`, `price`, `amenities`, `address`, `lat`, `lng`, `thumb`, `gallery`, `itinerary`, `booking_type`, `link_bookingcom`, `status`, `seo_title`, `seo_description`, `updated_at`, `created_at`) VALUES
(34, NULL, 13, 31, NULL, '[\"22\"]', NULL, '[\"36\"]', NULL, 'widiane-suites-spa', NULL, 3055, '[\"9\",\"8\"]', 'Chemin Du Lac 44, R306, Bin El-Ouidane، Bin el Ouidane 22200, Maroc', 32.10674, -6.448513, '6023e04dd55b5_1612963917.jpg', '[\"6024f58288980_1613034882.jpg\",\"6024f58504521_1613034885.jpg\",\"6024f588a56d1_1613034888.jpg\"]', '[{\"question\":\"Jour 1\",\"answer\":\"<div class=\\\"daily-schedule-body\\\"><div class=\\\"col-md-8 col-sm-8\\\"><p>Vivez un s&eacute;jour exceptionnel &agrave; Widiane Suites &amp; Spa.. Un endroit tout juste magnifique o&ugrave; vous pouvez faire une balade en bateau, une sortie en montagne, ou tout simplement profiter des paysages &agrave; couper le souffle &hellip;<\\/p><p>Il y a tout pour vous faire plaisir et faire plaisir aux enfants. Un cadre magique mais aussi un personnel &agrave; l\'&eacute;coute, des voituriers toujours pr&ecirc;ts &agrave; assurer les liaisons avec le sourire et un service de nettoyage qui prend toutes les mesures d&rsquo;hygi&egrave;ne et toutes les pr&eacute;cautions anti covid.La restauration est sans d&eacute;faut, vous aurez le choix entre 3 entr&eacute;es, plats et desserts&hellip;.<\\/p><p>Une vraie exp&eacute;rience de d&eacute;paysement dans un cadre incroyable aux normes internationales avec vue totale sur le lac Bin El Ouidane&hellip;<\\/p><\\/div><\\/div>\"},{\"question\":\"Jour 2\",\"answer\":\"<div class=\\\"daily-schedule-body\\\"><div class=\\\"col-md-8 col-sm-8\\\"><p>Passez 3 jours en famille de pure d&eacute;tente, dans une chambre spacieuse et moderne avec une vue splendide sur la piscine et le Lac Bin El Ouidane&hellip;Un site vraiment exceptionnel pour vivre 3 jours inoubliables...<\\/p><p>L&rsquo;H&ocirc;tel est &eacute;quip&eacute; de 2 piscines propres constamment entretenues, avec une tr&egrave;s belle vue sur le Lac&hellip; Les repas sont vari&eacute;s et raffin&eacute;s&hellip;<\\/p><p>Le personnel est &agrave; l\'&eacute;coute et les mesures anti-covid sont compl&egrave;tement respect&eacute;es&hellip; Un endroit paradisiaque ou vous pouvez vous d&eacute;connecter du monde ext&eacute;rieur&hellip; Vous n&rsquo;aurez qu&rsquo;une seule envie.. Y retourner!<\\/p><\\/div><\\/div>\"}]', 1, NULL, 0, 'Hôtel Widiane Suites & Spa gfs', 'Dans les contreforts tranquilles du Moyen Atlas, se niche l\'hôtel Widiane Suites & Spa, un concentré d\'essences et de bien-être pour vous accueillir et enri....', '2021-05-18 11:44:22', '2021-02-10 13:31:57'),
(35, NULL, 13, 34, NULL, '[\"22\",\"21\"]', NULL, '[\"34\"]', NULL, 'sol-house-taghazout-bay-surf', NULL, 999, '[\"9\",\"8\",\"7\",\"6\"]', 'Station Touristique de Taghazout, Avenue Hassan II, Taghazout 80023, Maroc', 30.5402361, -9.7005859, '6023e118a7872_1612964120.jpg', '[\"60240945cdd71_1612974405.jpg\",\"6024094ca18dc_1612974412.jpg\"]', NULL, 1, NULL, 1, 'Voyage à Sol House Taghazout Bay', 'Rentacs Tours vous emmène à Sol House Taghazout Bay Surf, un univers assez spéciale situé au bord de la mer à Taghazout, à 18 km d\'Agadir.', '2021-03-04 14:37:06', '2021-02-10 13:35:20'),
(36, NULL, 13, 23, NULL, '[\"13\",\"22\",\"12\",\"21\",\"20\",\"11\"]', NULL, '[\"32\"]', NULL, 'dakhla-attitude', NULL, 920, '[\"9\",\"8\",\"7\",\"6\"]', 'DAKHLA', NULL, NULL, '602e8ff06c81c_1613664240.jpg', '[\"602e90250f964_1613664293.jpg\"]', '{\"6\":{\"question\":\"S\\u00e9jour en Pension Compl\\u00e9te & Transferts A\\u00e9roport\\/H\\u00f4tel\\/A\\u00e9roport\",\"answer\":\"<p>Bungalow double : 1295 DHS\\/ Nuit<br \\/>Bungalow Single: 920 DHS \\/Nuit<\\/p>\"}}', 1, NULL, 1, 'Voyage à DAKHLA', 'Rentacs Tours vous emmène vers la ville de Dakhla pour découvrir ce merveilleux paradis. Loin de tout bruit, découvrez maintenant notre offre de voyage et d\'activités à Dakhla.', '2021-03-04 14:34:45', '2021-02-18 16:04:00'),
(37, NULL, 13, 31, NULL, '[\"22\",\"11\"]', NULL, '[\"30\"]', NULL, 'douceur-de-vivre-hivernal-by-kenzi', NULL, 870, '[\"9\",\"8\",\"7\",\"6\"]', 'KENZI', NULL, NULL, '602e92d33e60e_1613664979.jpg', '[\"602e93c79fed7_1613665223.jpg\",\"602e93caad1e8_1613665226.jpg\"]', '{\"6\":{\"question\":\"D\\u00e9part Tardif\",\"answer\":\"<p>Navette au centre-ville 717, horaire selon programme affich&eacute;.<\\/p>\"}}', 1, NULL, 1, 'Hôtel Kenzi - Marrakech', 'Rentacs Tours vous emmène à l\'hôtel KENZI. Réservez maintenant votre séjour dans ce lieu privilégié de classe mondiale.', '2021-03-04 14:21:01', '2021-02-18 16:16:19'),
(38, NULL, 13, 31, NULL, '[\"22\"]', NULL, '[\"32\"]', NULL, 'aqua-mirage-marrakech', NULL, 1025, '[\"8\",\"7\",\"6\"]', 'Km 5, Route de Tahanaout، Marrakech 40065, Maroc', 31.5347314, -7.992452, '6046551d0c0ae_1615222045.jpg', '[\"6046332cd4ea1_1615213356.jpg\"]', '{\"6\":{\"question\":\"Destination 1\",\"answer\":\"<p>destination 1<\\/p>\"},\"1\":{\"question\":\"destination 2\",\"answer\":\"destination 2\"},\"2\":{\"question\":null,\"answer\":null}}', 1, NULL, 1, 'Aqua Mirage Club Marrakech - Hôtel à Marrakech', 'Vous êtes à la recherche d\'un hôtel à Marrakech pour passer une expérience singulière ? Rentacs Tours vous propose Aqua Mirage Club.', '2021-05-18 12:14:23', '2021-03-08 16:39:56');

-- --------------------------------------------------------

--
-- Table structure for table `place_translations`
--

CREATE TABLE `place_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `place_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `place_translations`
--

INSERT INTO `place_translations` (`id`, `place_id`, `locale`, `name`, `description`) VALUES
(26, 34, 'en', 'Widiane Suites & Spa', '<p>In the tranquil foothills of the Middle Atlas, there is a hotel Widiane Suites &amp; Spa, a concentration of essences and well-being to welcome you and enrich your senses.</p>\r\n\r\n<p>Combining luxury and refinement, this haven of peace located in Bin El Ouidane, is the dream retreat of nature lovers where time stops to let live the magic of the site in a heavenly and enchanting setting...</p>\r\n\r\n<p>The region of Azilal encompasses a fine variety of mountains and plains. It is connected by highway main road to different cities: Beni Mellal, Marrakesh, Casablanca and Fes.<br />\r\nThe area has a rich cultural and architectural heritage: Zaouias, Kasbahs, fortified villages...It is known for its moussems and weekly souks.</p>'),
(27, 34, 'fr', 'Widiane Suites & Spa', '<p>2 ADULTES &amp; 2 ENFANTS<br />\r\nH&eacute;bergement pour s&eacute;jour de 2 nuits<br />\r\n(Possibilit&eacute; de surclassement &agrave; l&#39;arriv&eacute;e selon disponibilt&eacute;)<br />\r\nH&eacute;bergement gratuit pour Maximum 2 enfants de - 12 ansparatgeant la chambre des parents.<br />\r\nSortie en kayak offerte - 1h</p>\r\n\r\n<p>* Tarifs pour 02 nuits avec petit d&eacute;j<br />\r\n** Hors Taxe de s&eacute;jour 36 MAD par Adulte / nuit</p>\r\n\r\n<p>Dans les contreforts tranquilles du Moyen Atlas, se niche l&#39;h&ocirc;tel Widiane Suites &amp; Spa, un concentr&eacute; d&#39;essences et de bien-&ecirc;tre pour vous accueillir et enrichir vos sens.</p>\r\n\r\n<p>Associant luxe et raffinement, cet havre de paix situ&eacute; &agrave; Bin El Ouidane, est la retraite r&ecirc;v&eacute;e des amoureux de la nature o&ugrave; le temps s&#39;arr&ecirc;te pour laisser vivre la magie du site dans un cadre c&eacute;leste et enchanteur...</p>\r\n\r\n<p>La r&eacute;gion d&#39;Azilal alterne montagnes et plaines. Des axes routiers la relient aux principales villes du pays : Beni Mellal, Marrakech, Casablanca et F&egrave;s.<br />\r\nLa r&eacute;gion dispose en outre d&#39;un riche patrimoine culturel et architectural : Zaouias, Kasbahs, villages fortifi&eacute;es. Elle est connue &agrave; travers ses moussems et ses souks hebdomadaires.</p>'),
(28, 35, 'en', 'Sol House Taghazout Bay Surf', '<p>Offering an outdoor pool and spa centre with massage cabins, hammam and sauna, Sol House Taghazout Bay Surf is set in Taghazout by the beachfront, 18 km from Agadir. The hotel is overlooking the sea. Guests can enjoy a drink at the bar. Free private parking is available on site.</p>\r\n<p>All units are air conditioned and features a 42-inch flat-screen TV with satellite channels and a minibar. The bungalows have a safety deposit box and private balcony with sun beds. Some units include a seating area where you can relax. Private bathrooms are fitted with shower and hairdryer. Sol House Taghazout Bay Surf features free WiFi in all areas.</p>'),
(29, 35, 'fr', 'Sol House Taghazout Bay Surf', '<p>Situ&eacute; en bord de mer &agrave; Taghazout, &agrave; 18 km d\'Agadir, le Sol House Taghazout Bay Surf propose une piscine ext&eacute;rieure, ainsi qu\'un centre de spa avec des cabines de massage, un hammam et un sauna. Vous profiterez d\'une vue sur la mer, d\'un bar et d\'un parking priv&eacute; gratuit sur place.</p>\r\n<p>Les logements disposent de la climatisation, d\'une t&eacute;l&eacute;vision par satellite &agrave; &eacute;cran plat de 107 cm et d\'un minibar. Les bungalows sont dot&eacute;s d\'un coffre-fort et d\'un balcon priv&eacute; avec des chaises longues. Certains logements pr&eacute;sentent un coin salon, id&eacute;al pour vous d&eacute;tendre. Les salles de bains privatives sont pourvues d\'une douche et d\'un s&egrave;che-cheveux. Vous b&eacute;n&eacute;ficierez d\'une connexion Wi-Fi gratuite dans l\'ensemble des locaux.</p>\r\n<p>L\'&eacute;tablissement comporte une r&eacute;ception ouverte 24h/24, des boutiques, un club pour enfants ouvert pendant les vacances et une salle de sport enti&egrave;rement &eacute;quip&eacute;e accessible gratuitement.</p>\r\n<p>L\'h&ocirc;tel poss&egrave;de &eacute;galement des installations de sports nautiques, notamment un kayak et un stand up paddle. Il assure un service de location de voitures. Vous pourrez pratiquer de nombreuses activit&eacute;s dans les environs, telles que le surf, le yoga et la planche &agrave; voile. L\'a&eacute;roport d\'Agadir-Al Massira, le plus proche, est implant&eacute; &agrave; 45 km du Sol House Taghazout Bay Surf.</p>'),
(30, 36, 'en', 'DAKHLA ATTITUDE', '<p>S&eacute;jour en Pension Compl&eacute;te &amp; Transferts A&eacute;roport/H&ocirc;tel/A&eacute;roport<br />Bungalow double : 1295 DHS/ Nuit<br />Bungalow Single: 920 DHS /Nuit<br />&bull; Des Excursions pour Explorer la magnifique Baie de Dakhla sont disponibles &agrave; la demande.<br />&bull; Possibilit&eacute; de louer des Bungalow Triples &amp; Quadruples</p>'),
(31, 36, 'fr', 'DAKHLA ATTITUDE', '<p>S&eacute;jour en Pension Compl&eacute;te &amp; Transferts A&eacute;roport/H&ocirc;tel/A&eacute;roport<br />Bungalow double : 1295 DHS/ Nuit<br />Bungalow Single: 920 DHS /Nuit<br />&bull; Des Excursions pour explorer la magnifique Baie de Dakhla sont disponibles &agrave; la demande.<br />&bull; Possibilit&eacute; de louer des Bungalow Triples &amp; Quadruples</p>'),
(32, 37, 'en', 'Douceur de vivre Hivernal BY KENZI', '<p>Profitez d\'un s&eacute;jour en All Inclusive &agrave; Marrakech:<br />Gratuit&eacute; pour 1 enfant de moins de 5ans<br />Acc&egrave;s &agrave; la piscine chauff&eacute;e<br />Acc&egrave;s &agrave; la salle de sport sous r&eacute;servation &agrave; l\'avance<br /><br />Navette au centre-ville 717, horaire selon programme affich&eacute;.<br />A Partir de 870 DHS par personne en chambre double de luxe<br />en formule ALL INCLUSIVE<br />* Offre Valable jusqu\'au 20 Mars 2021 Hors taxes de s&eacute;jour</p>'),
(33, 37, 'fr', 'Douceur de vivre Hivernal BY KENZI', '<p>Profitez d\'un s&eacute;jour en All Inclusive &agrave; Marrakech:<br />Gratuit&eacute; pour 1 enfant de moins de 5ans<br />Acc&egrave;s &agrave; la piscine chauff&eacute;e<br />Acc&egrave;s &agrave; la salle de sport sous r&eacute;servation &agrave; l\'avance<br /><br />Navette au centre-ville 717, horaire selon programme affich&eacute;.<br />A Partir de 870 DHS par personne en chambre double de luxe<br />en formule ALL INCLUSIVE<br />* Offre Valable jusqu\'au 20 Mars 2021 Hors taxes de s&eacute;jour</p>'),
(34, 38, 'en', NULL, NULL),
(35, 38, 'fr', 'Aqua Mirage Marrakech', '<p>Bienvenue &agrave; Aqua Mirage Club, &eacute;lu Meilleure H&ocirc;tel pour familles &agrave; Marrakech pour 4 ann&eacute;es cons&eacute;cutives. Ce lieu s&#39;&eacute;tend sur 20 hectares de nature au pied des fabuleuses montagnes de l&#39;Atlas. Il pr&eacute;sente aussi un point de d&eacute;part id&eacute;al pour explorer les environs de la ville de Marrakech. Avec son personnel professionnel, sa cuisine Marocaine et son &eacute;quipe d&#39;animation, Aqua Mirage est le choix id&eacute;al pour tous les amoureux du plaisir, du calme et de la haute qualit&eacute; du service. Il dispose de plusieurs piscines, un aqua parc, un sauna, un centre de massage et un centre de fitness. Profitez d&#39;un wifi gratuit, une navette centre ville, un club pour enfants, un centre de conf&eacute;rence et beaucoup plus...</p>');

-- --------------------------------------------------------

--
-- Table structure for table `place_types`
--

CREATE TABLE `place_types` (
  `id` int(11) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `place_types`
--

INSERT INTO `place_types` (`id`, `category_id`, `name`, `created_at`, `updated_at`) VALUES
(25, 12, 'Restaurant', '2019-10-25 11:17:39', '2019-10-25 11:17:39'),
(26, 12, 'Coffee Shop', '2019-10-25 11:17:50', '2019-10-25 11:17:50'),
(30, 11, 'Culture', '2019-11-04 16:40:25', '2019-11-04 16:40:25'),
(31, 11, 'Park', '2019-11-04 16:40:39', '2019-11-04 16:40:39'),
(32, 11, 'Market', '2019-11-04 16:40:54', '2019-11-04 16:40:54'),
(33, 13, 'Hostel', '2019-11-04 16:41:13', '2019-11-04 16:41:13'),
(34, 13, 'Hotel', '2019-11-04 16:41:22', '2019-11-04 16:41:22'),
(35, 13, 'Luxury', '2019-11-04 16:41:33', '2019-11-04 16:41:33'),
(36, 13, 'Apartment', '2019-11-04 16:42:03', '2019-11-04 16:42:03'),
(38, 12, 'Bakeries', '2019-11-04 16:42:39', '2019-11-04 16:42:39');

-- --------------------------------------------------------

--
-- Table structure for table `place_type_translations`
--

CREATE TABLE `place_type_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `place_type_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `place_type_translations`
--

INSERT INTO `place_type_translations` (`id`, `place_type_id`, `locale`, `name`) VALUES
(1, 25, 'en', 'CIRCUITS EN MOTO AUTONOMES'),
(2, 26, 'en', 'GUIDED VISIT WITH MOTO'),
(6, 30, 'en', 'TARAGALT LUXURY DESERT CAMP'),
(7, 31, 'en', 'TOUAREG DREAM CHEGAGA LUXURY CAMP'),
(8, 32, 'en', 'TIZIPLUS LUXURY DESERT CAMP'),
(9, 33, 'en', 'Compétitions'),
(10, 34, 'en', 'Golf Packages'),
(11, 35, 'en', 'RENT'),
(12, 36, 'en', 'Golf Courses'),
(14, 38, 'en', 'MOTO RENT'),
(17, 38, 'fr', 'LOCATION DE MOTOS'),
(18, 36, 'fr', 'Golf Courses'),
(19, 35, 'fr', 'Location'),
(20, 34, 'fr', 'Golf Packages'),
(21, 33, 'fr', 'Compétitions'),
(22, 32, 'fr', 'TIZIPLUS LUXURY DESERT CAMP'),
(23, 31, 'fr', 'TOUAREG DREAM CHEGAGA LUXURY CAMP'),
(24, 30, 'fr', 'TARAGALT LUXURY DESERT CAMP'),
(25, 26, 'fr', 'VISITES GUIDÉES EN MOTO'),
(26, 25, 'fr', 'CIRCUITS EN MOTO AUTONOMES');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category` varchar(500) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `content` longtext,
  `thumb` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `type` varchar(10) NOT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category`, `title`, `slug`, `content`, `thumb`, `status`, `type`, `seo_title`, `seo_description`, `created_at`, `updated_at`) VALUES
(21, 1, NULL, NULL, 'a-propos', NULL, '6025606266e78_1613062242.JPG', 1, 'page', NULL, NULL, '2021-02-10 14:40:49', '2021-02-11 16:51:50'),
(22, 1, '[\"23\"]', NULL, 'les-7-etapes-incontournables-pour-preparer-votre-voyage', NULL, '60250f422116b_1613041474.jpg', 1, 'blog', 'Les 7 étapes incontournables pour préparer votre voyage', 'Préparer son voyage s\'avère une tâche difficile parfois. Découvrez alors les 7 étapes pour préparer efficacement tous vos futurs voyages.', '2021-02-11 10:55:35', '2021-03-04 14:04:56'),
(23, 1, '[\"23\"]', NULL, 'les-meilleurs-destinations-que-vous-devez-visiter-au-maroc', NULL, '602d18ba40bf3_1613568186.jpg', 1, 'blog', 'Les meilleurs destinations que vous devez absolument visiter au Maroc', 'Vous avez envie de savoir les meilleures destinations à visiter au Maroc ? Rentacs Tours vous a choisi une liste des villes les plus merveilleuses à ne pas manquer.', '2021-02-11 10:56:33', '2021-03-04 14:42:13'),
(28, 1, '[\"23\"]', NULL, 'voyage-en-solo-30-astuces-et-conseils-pour-voyager-seul', NULL, '603638b5008f3_1614166197.jpg', 1, 'blog', 'Voyage en Solo: 30 astuces et conseils pour voyager seul', 'Vous aimez voyageur seul et vous voulez avoir des conseils pour profiter au maximum de votre voyage  ? Rentacs Tours vous présente 30 astuces et conseils ...', '2021-02-24 10:54:29', '2021-03-04 14:41:39'),
(30, 1, '[\"23\"]', NULL, 'voyage-a-agadir-les-choses-a-ne-pas-rater-en-2021', NULL, '60363b7e75ed5_1614166910.jpg', 1, 'blog', 'Voyage à Agadir, les choses à ne pas rater en 2021', 'Vous souhaitez visiter la ville d\'Agadir ? Rentacs Tours vous invite à découvrir les principales attractions de cette ville.', '2021-02-24 11:39:18', '2021-04-13 15:32:48');

-- --------------------------------------------------------

--
-- Table structure for table `post_translations`
--

CREATE TABLE `post_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_translations`
--

INSERT INTO `post_translations` (`id`, `post_id`, `locale`, `title`, `content`) VALUES
(6, 21, 'en', 'About us', '<p><span style=\"font-weight: 400;\">Gustave Nadaud a dit \"Rester, c&rsquo;est exister. Voyager, c&rsquo;est vivre\".</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-weight: 400;\">C&rsquo;est pourquoi l&rsquo;&eacute;quipe Rentacs Tours est d&rsquo;autant plus fi&egrave;re de vivre avec vous, cette nouvelle ann&eacute;e 2021 avec des nouveaut&eacute;s dans sa structure.</span></p>\r\n<p><span style=\"font-weight: 400;\">&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Durant toutes ces ann&eacute;es d&rsquo;exp&eacute;riences et de savoir-faire, nous avons pu parcourir ensemble de merveilleux endroits, nous avons s&eacute;journ&eacute; dans des lieux paradisiaques et nous avons pu voir avec les yeux d&rsquo;un passionn&eacute; la beaut&eacute; des plus belles destinations du monde.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Ainsi, nous voulons faire d&eacute;couvrir &agrave; plus de personnes la beaut&eacute; exceptionnelle du monde auquel nous appartenons et qui donne envie de vivre avec passion et de survivre aux probl&egrave;mes et aux difficult&eacute;s que le monde d&rsquo;aujourd&rsquo;hui conna&icirc;t.</span></p>\r\n<p><span style=\"font-weight: 400;\">&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">C&rsquo;est dans cette optique que Rentacs Tours s&rsquo;&eacute;largit et devient une agence de voyage multi-services accessible, disponible et accueillante, qui s&rsquo;efforce de vous offrir le meilleur confort et l&rsquo;exp&eacute;rience de voyage la plus singuli&egrave;re&nbsp; qui, nous l&rsquo;esp&eacute;rons, r&eacute;pondra &agrave; toutes vos attentes.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Fond&eacute;e par deux bikers passionn&eacute;s certifi&eacute;s par HOG Harley-Davidson: Nizar CHAWAD, ancien pr&eacute;sident du HOG Chapter Casablanca, et Mohamed Ali ANOUAR, ancien secr&eacute;taire g&eacute;n&eacute;ral du HOG Chapter Casablanca.&nbsp; La force de Rentacs Tours repose sur la diversit&eacute; des services qu&rsquo;elle propose mais aussi et surtout sur le professionnalisme sans d&eacute;faut de son &eacute;quipe qui b&eacute;n&eacute;ficie des comp&eacute;tences manag&eacute;riales sans faille de monsieur Ali Amrani ayant &agrave; son actif plus de 18 ann&eacute;es d&rsquo;exp&eacute;riences en zones touristiques des USA.</span></p>\r\n<p><span style=\"font-weight: 400;\">&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Rentacstours aujourd&rsquo;hui, est une extension de savoir-faire, une multitude de services sur mesure allant des voyages organis&eacute;s h&ocirc;tels, h&eacute;bergement, vol aux activit&eacute;s de divertissement et de bien-&ecirc;tre motocycle, golf tour, bivouacs, trekking, surf, yoga .. Nous proposons aussi des services &agrave; l&rsquo;international gr&acirc;ce &agrave; la participation de diff&eacute;rents partenaires qui ont accept&eacute; de prendre part &agrave; cette aventure.</span></p>\r\n<p><span style=\"font-weight: 400;\">&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Et pour tous les friands et amateurs de circuits &agrave; moto, vous pouvez profiter des offres exclusives et des meilleurs mod&egrave;les de motos Harley Davidson et Yamaha gr&acirc;ce &agrave; notre partenaire Rentacs Motor, repr&eacute;sentant exclusif de Eaglerider au Maroc. Le tout pour vous faire vivre des voyages exceptionnels et des aventures atypiques.&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-weight: 400;\">D&eacute;couvrez nos meilleures offres ou contactez-nous maintenant pour organiser votre prochain voyage.</span></p>\r\n<p>&nbsp;</p>'),
(7, 21, 'fr', 'À propos', '<p><span style=\"font-weight: 400;\"><img src=\"/uploads/photos/1/IMG-4763.JPG\" alt=\"\" width=\"100%\" height=\"100%\" /></span></p>\r\n<p><span style=\"font-weight: 400;\">Gustave Nadaud a dit \"Rester, c&rsquo;est exister. Voyager, c&rsquo;est vivre\".</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-weight: 400;\">C&rsquo;est pourquoi l&rsquo;&eacute;quipe Rentacs Tours est d&rsquo;autant plus fi&egrave;re de vivre avec vous, cette nouvelle ann&eacute;e 2021 avec des nouveaut&eacute;s dans sa structure.</span></p>\r\n<p><span style=\"font-weight: 400;\">&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Durant toutes ces ann&eacute;es d&rsquo;exp&eacute;riences et de savoir-faire, nous avons pu parcourir ensemble de merveilleux endroits, nous avons s&eacute;journ&eacute; dans des lieux paradisiaques et nous avons pu voir avec les yeux d&rsquo;un passionn&eacute; la beaut&eacute; des plus belles destinations du monde.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Ainsi, nous voulons faire d&eacute;couvrir &agrave; plus de personnes la beaut&eacute; exceptionnelle du monde auquel nous appartenons et qui donne envie de vivre avec passion et de survivre aux probl&egrave;mes et aux difficult&eacute;s que le monde d&rsquo;aujourd&rsquo;hui connaisse.</span></p>\r\n<p><span style=\"font-weight: 400;\">&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">C&rsquo;est dans cette optique que Rentacs Tours s&rsquo;&eacute;largit et devient une agence de voyage multi-services accessible, disponible et accueillante, qui s&rsquo;efforce de vous offrir le meilleur confort et l&rsquo;exp&eacute;rience de voyage la plus singuli&egrave;re&nbsp; qui, nous l&rsquo;esp&eacute;rons, r&eacute;pondra &agrave; toutes vos attentes.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Fond&eacute;e par deux bikers passionn&eacute;s certifi&eacute;s par HOG Harley-Davidson: Nizar CHAWAD, ancien pr&eacute;sident du HOG Chapter Casablanca, et Mohamed Ali ANOUAR, ancien secr&eacute;taire g&eacute;n&eacute;ral du HOG Chapter Casablanca.&nbsp; La force de Rentacs Tours repose sur la diversit&eacute; des services qu&rsquo;elle propose mais aussi et surtout sur le professionnalisme sans d&eacute;faut de son &eacute;quipe qui b&eacute;n&eacute;ficie des comp&eacute;tences manag&eacute;riales sans faille de monsieur Ali Amrani ayant &agrave; son actif plus de 18 ann&eacute;es d&rsquo;exp&eacute;riences en zones touristiques des USA.</span></p>\r\n<p><span style=\"font-weight: 400;\">&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Rentacstours aujourd&rsquo;hui, est une extension de savoir-faire, une multitude de services sur mesure allant des voyages organis&eacute;s h&ocirc;tels, h&eacute;bergement, vol aux activit&eacute;s de divertissement et de bien-&ecirc;tre motocycle, golf tour, bivouacs, trekking, surf, yoga .. Nous proposons aussi des services &agrave; l&rsquo;international gr&acirc;ce &agrave; la participation de diff&eacute;rents partenaires qui ont accept&eacute; de prendre part &agrave; cette aventure.</span></p>\r\n<p><span style=\"font-weight: 400;\">&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Et pour tous les friands et amateurs de circuits &agrave; moto, vous pouvez profiter des offres exclusives et des meilleurs mod&egrave;les de motos Harley Davidson et Yamaha gr&acirc;ce &agrave; notre partenaire Rentacs Motor, repr&eacute;sentant exclusif de Eaglerider au Maroc. Le tout pour vous faire vivre des voyages exceptionnels et des aventures atypiques.&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-weight: 400;\">D&eacute;couvrez nos meilleures offres ou contactez-nous maintenant pour organiser votre prochain voyage.</span></p>\r\n<p>&nbsp;</p>'),
(8, 22, 'en', 'The 7 essential steps to prepare for your trip', '<p><span class=\"VIiyi\" lang=\"en\"><span class=\"JLqJ4b\" data-language-for-alternatives=\"en\" data-language-to-translate-into=\"auto\" data-phrase-index=\"0\">Now that you have decided to go on a trip, you need to follow some essential steps to plan it the best. Because planning a trip isn\'t always easy, especially if it\'s your first time. In the rest of this article, we will provide you with the right tips to make the most of your next trip with peace of mind. </span></span></p>\r\n<p><span class=\"VIiyi\" lang=\"en\"><span class=\"JLqJ4b\" data-language-for-alternatives=\"en\" data-language-to-translate-into=\"auto\" data-phrase-index=\"0\">1- Choose your next destination </span></span></p>\r\n<p><span class=\"VIiyi\" lang=\"en\"><span class=\"JLqJ4b\" data-language-for-alternatives=\"en\" data-language-to-translate-into=\"auto\" data-phrase-index=\"0\">Obviously, isn\'t it? However, the choice still becomes a little difficult, especially when there are several places that one would like to visit. In order to make the best choice, here are some factors to consider when deciding on your next destination: Budget: The money you will have to spend if you choose to go to Norway is certainly not the same if you go to Thailand! Try to calculate all the expected expenses for your trip. Formalities: You must take sufficient time before your planned date of travel to prepare all the entry formalities so that you can organize your trip comfortably without wasting time! </span></span></p>\r\n<p><span class=\"VIiyi\" lang=\"en\"><span class=\"JLqJ4b\" data-language-for-alternatives=\"en\" data-language-to-translate-into=\"auto\" data-phrase-index=\"0\">Travel period: It is important to research some information about your destination in the chosen period such as the weather, local holidays, demonstrations or any event; to know what awaits you especially on the financial plan (because the prices could increase in the festive periods). </span></span></p>\r\n<p><span class=\"VIiyi\" lang=\"en\"><span class=\"JLqJ4b\" data-language-for-alternatives=\"en\" data-language-to-translate-into=\"auto\" data-phrase-index=\"0\">Travel Style: Choosing your next destination depends on your travel style; that is, if you would rather take your backpack and embark on an adventure, or if what you are looking for is relaxation at the beach. If you choose to travel solo or if you prefer to travel as a couple or as a family. Choose a destination well suited to your travel preferences. </span></span></p>\r\n<p><span class=\"VIiyi\" lang=\"en\"><span class=\"JLqJ4b\" data-language-for-alternatives=\"en\" data-language-to-translate-into=\"auto\" data-phrase-index=\"0\">Time available: In order to choose your next destination; you need to take into consideration the travel time you have available. If you don\'t have a lot of time, it doesn\'t make sense to choose a faraway destination or you risk spending a lot of your time on the road! </span></span></p>\r\n<p><span class=\"VIiyi\" lang=\"en\"><span class=\"JLqJ4b\" data-language-for-alternatives=\"en\" data-language-to-translate-into=\"auto\" data-phrase-index=\"0\">Political situation: It is very important to find out about the political situation of the chosen country before leaving. And to do this, consult the Foreign Affairs site of your country. Do not underestimate the importance of this step because it will influence the quality of your trip. </span></span></p>\r\n<p><span class=\"VIiyi\" lang=\"en\"><span class=\"JLqJ4b\" data-language-for-alternatives=\"en\" data-language-to-translate-into=\"auto\" data-phrase-index=\"0\">2- Prepare your itinerary It depends largely on your style of travel (An organized or improvised trip / Visiting one or several countries at the same time). </span></span></p>\r\n<p><span class=\"VIiyi\" lang=\"en\"><span class=\"JLqJ4b\" data-language-for-alternatives=\"en\" data-language-to-translate-into=\"auto\" data-phrase-index=\"0\">So, to identify your itinerary, you need to take these criteria into consideration, and then take a look at the blogs and travel guides available on the internet to get a general idea of ​​the places you could visit. </span></span></p>\r\n<p><span class=\"VIiyi\" lang=\"en\"><span class=\"JLqJ4b\" data-language-for-alternatives=\"en\" data-language-to-translate-into=\"auto\" data-phrase-index=\"0\">You can also consult the websites of the agencies that offer organized tours to your destination. Remember, your itinerary must absolutely be realistic! And so, for this you need to know the travel time between the places you are going to go and also whether there is a possibility of transportation. </span></span></p>\r\n<p><span class=\"VIiyi\" lang=\"en\"><span class=\"JLqJ4b\" data-language-for-alternatives=\"en\" data-language-to-translate-into=\"auto\" data-phrase-index=\"0\">3- Reservation of the plane or train ticket Now that you know the duration and dates of your trip, you need to book your ticket. To book your plane or train ticket, use one of the plane or train comparators available on the internet. There are also bus comparators if you need them! These comparators would be very useful for you to find the price that suits you best. </span></span></p>\r\n<p><span class=\"VIiyi\" lang=\"en\"><span class=\"JLqJ4b\" data-language-for-alternatives=\"en\" data-language-to-translate-into=\"auto\" data-phrase-index=\"0\">4- Take travel insurance It is of great importance to be covered in the event of illnesses and accidents during your trip, because if you ever fall ill or have an accident, you will have to pay a large sum as hospital costs. . To avoid this, check out the travel insurance offers on the internet and book your own. </span></span></p>\r\n<p><span class=\"VIiyi\" lang=\"en\"><span class=\"JLqJ4b\" data-language-for-alternatives=\"en\" data-language-to-translate-into=\"auto\" data-phrase-index=\"0\">5- Accommodation reservation You will not need to follow this step if you wish to make a reservation on site. Alternatively, if you prefer to book your accommodation in advance, you can opt for one of the online booking sites. </span></span></p>\r\n<p><span class=\"VIiyi\" lang=\"en\"><span class=\"JLqJ4b\" data-language-for-alternatives=\"en\" data-language-to-translate-into=\"auto\" data-phrase-index=\"0\">You can see reviews from people who have used it before, not to mention that you can - for most sites - cancel your reservation at any time (unless it is longer than 48 hours). </span></span></p>\r\n<p><span class=\"VIiyi\" lang=\"en\"><span class=\"JLqJ4b\" data-language-for-alternatives=\"en\" data-language-to-translate-into=\"auto\" data-phrase-index=\"0\">6- Car rental If you need a car for your trip, check out a car rental site to get the best deals available with all the car information you\'ll need. 7- Booking of excursions and activities The goal of this step is to help you get the most out of your trip. It also depends on your travel style, your budget and what you plan to do on your trip. </span></span></p>\r\n<p><span class=\"VIiyi\" lang=\"en\"><span class=\"JLqJ4b\" data-language-for-alternatives=\"en\" data-language-to-translate-into=\"auto\" data-phrase-index=\"0\"> So if you want to book online <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"en\" data-language-to-translate-into=\"auto\" data-phrase-index=\"0\">gene;</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"en\" data-language-to-translate-into=\"auto\" data-phrase-index=\"1\">you just have to use an internet reservation site.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"en\" data-language-to-translate-into=\"auto\" data-phrase-index=\"2\">This will not only allow you to choose the best price offers available;</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"en\" data-language-to-translate-into=\"auto\" data-phrase-index=\"3\">but also to avoid the traps that are sometimes made for tourists.</span> </span></span></p>\r\n<p><span class=\"VIiyi\" lang=\"en\"><span class=\"JLqJ4b\" data-language-for-alternatives=\"en\" data-language-to-translate-into=\"auto\" data-phrase-index=\"0\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"en\" data-language-to-translate-into=\"auto\" data-phrase-index=\"5\">However, if you ever find an interesting and affordable activity out there, you should definitely give it a try!</span> </span></span></p>\r\n<p><span class=\"VIiyi\" lang=\"en\"><span class=\"JLqJ4b\" data-language-for-alternatives=\"en\" data-language-to-translate-into=\"auto\" data-phrase-index=\"0\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"en\" data-language-to-translate-into=\"auto\" data-phrase-index=\"7\">Rentacs offers you a multitude of activities you absolutely must try.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"en\" data-language-to-translate-into=\"auto\" data-phrase-index=\"8\">Check out our offers and book the one that suits you the most!</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"en\" data-language-to-translate-into=\"auto\" data-phrase-index=\"10\">And There you go!</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"en\" data-language-to-translate-into=\"auto\" data-phrase-index=\"11\">Now you are ready to pack your things and head to your next destination!</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"en\" data-language-to-translate-into=\"auto\" data-phrase-index=\"13\">Have a nice trip!</span>&nbsp;</span> </span></p>'),
(9, 22, 'fr', 'Les 7 étapes incontournables pour préparer votre voyage', '<p><span style=\"font-weight: 400;\">Maintenant que vous avez d&eacute;cid&eacute; de partir en voyage, vous avez besoin de suivre quelques &eacute;tapes incontournables pour le planifier au mieux. Parce qu&rsquo;organiser un voyage n&rsquo;est pas tout le temps facile, surtout si c&rsquo;est la premi&egrave;re fois.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Dans la suite de cet article, nous allons vous fournir les bonnes astuces pour profiter pleinement de votre prochain voyage en toute tranquillit&eacute;.</span></p>\r\n<p><strong>1- Choisissez votre prochaine destination</strong></p>\r\n<p><span style=\"font-weight: 400;\">C&rsquo;est &eacute;vident, n&rsquo;est ce pas? Pourtant, le choix devient quand m&ecirc;me un peu difficile, surtout lorsqu&rsquo;il y a plusieurs endroits qu&rsquo;on aimerait visiter.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Afin de faire le meilleur choix, voici quelques facteurs &agrave; prendre en consid&eacute;ration pour d&eacute;cider de votre prochaine destination:</span></p>\r\n<ul>\r\n<li aria-level=\"1\"><strong>Budget: </strong><span style=\"font-weight: 400;\">L&rsquo;argent que vous aurez &agrave; d&eacute;penser si vous choisissez de partir en Norv&egrave;ge n&rsquo;est certainement pas le m&ecirc;me si vous partez en Tha&iuml;lande! T&acirc;chez de calculer toutes les d&eacute;penses pr&eacute;vues pour votre voyage.</span></li>\r\n</ul>\r\n<ul>\r\n<li aria-level=\"1\"><strong>Formalit&eacute;s: </strong><span style=\"font-weight: 400;\">Vous devez prendre du temps suffisant avant la date pr&eacute;vue de votre voyage pour pr&eacute;parer toutes les formalit&eacute;s d&rsquo;entr&eacute;e afin de pouvoir organiser votre voyage &agrave; l&rsquo;aise sans perdre du temps!&nbsp;</span></li>\r\n</ul>\r\n<ul>\r\n<li aria-level=\"1\"><strong>P&eacute;riode de voyage: </strong><span style=\"font-weight: 400;\">C&rsquo;est important de chercher quelques informations sur votre destination dans la p&eacute;riode choisie comme la m&eacute;t&eacute;o, les f&ecirc;tes locales, les manifestations ou n&rsquo;importe quel &eacute;v&eacute;nement; pour savoir ce qui vous attend surtout sur le plan financier (parce que les prix pourraient augmenter dans les p&eacute;riodes festives).&nbsp;</span></li>\r\n</ul>\r\n<ul>\r\n<li aria-level=\"1\"><strong>Style de voyage: </strong><span style=\"font-weight: 400;\">Le choix de votre prochaine destination d&eacute;pend de votre style de voyage; c&rsquo;est-&agrave;-dire, si vous pr&eacute;f&eacute;riez prendre votre sac-&agrave;-dos et vous embarquer dans une aventure, ou si ce que vous cherchez plut&ocirc;t est une d&eacute;tente &agrave; la plage.. Si vous choisissez de voyager en solo ou si vous pr&eacute;f&eacute;rez voyager en couple ou en famille.. Optez pour une destination bien adapt&eacute;e &agrave; vos pr&eacute;f&eacute;rences de voyage.</span></li>\r\n</ul>\r\n<ul>\r\n<li aria-level=\"1\"><strong>Temps disponible: </strong><span style=\"font-weight: 400;\">Afin de bien choisir votre prochaine destination; vous devez prendre en consid&eacute;ration le temps de voyage dont vous disposez. Si vous n&rsquo;avez pas beaucoup de temps, cela n&rsquo;a aucun sens de choisir une destination lointaine sinon vous risquez de passer une bonne partie de votre temps en route!</span></li>\r\n</ul>\r\n<ul>\r\n<li aria-level=\"1\"><strong>Situation politique: </strong><span style=\"font-weight: 400;\">C&rsquo;est tr&egrave;s important de vous renseigner sur la situation politique du pays choisi avant d&rsquo;y partir. Et pour ce faire, consultez le site des Affaires &eacute;trang&egrave;res de votre pays.&nbsp;</span></li>\r\n</ul>\r\n<p><span style=\"font-weight: 400;\">Ne sous estimez pas l&rsquo;importance de cette &eacute;tape parce qu&rsquo;elle influencera la qualit&eacute; de votre voyage.</span></p>\r\n<p><img src=\"/uploads/photos/1/tabea-damm-9-xfYKAI6ZI-unsplash.jpg\" alt=\"\" width=\"100%\" height=\"100%\" /></p>\r\n<p><strong>2- Pr&eacute;parez votre itin&eacute;raire</strong></p>\r\n<p><span style=\"font-weight: 400;\">Cela d&eacute;pend largement de votre style de voyage (Un voyage organis&eacute; ou bien improvis&eacute;/ Visiter un seul ou bien plusieurs pays &agrave; la fois). Alors, pour identifier votre itin&eacute;raire, vous devez prendre en consid&eacute;ration ces crit&egrave;res l&agrave;, et puis jetez un coup d\'&oelig;il sur les blogs et les guides de voyage disponibles sur internet pour avoir une id&eacute;e g&eacute;n&eacute;rale sur les endroits que vous pourriez visiter. Vous pouvez aussi consulter les sites des agences qui proposent des tours organis&eacute;s &agrave; votre destination.</span></p>\r\n<p><span style=\"font-weight: 400;\">N&rsquo;oubliez pas que votre itin&eacute;raire doit absolument &ecirc;tre r&eacute;aliste! Et donc, pour cela, vous devez savoir le temps de trajet entre les endroits dont vous allez vous rendre et aussi s&rsquo;il y a une possibilit&eacute; de transport.</span></p>\r\n<p><strong>3- R&eacute;servation du billet d&rsquo;avion ou de train</strong></p>\r\n<p><span style=\"font-weight: 400;\">Maintenant que vous connaissez la dur&eacute;e et les dates de votre voyage, il faut que vous r&eacute;serviez votre billet.</span></p>\r\n<p><span style=\"font-weight: 400;\">Pour r&eacute;server votre billet d&rsquo;avion ou de train, utilisez l&rsquo;un des comparateurs d&rsquo;avion ou de train disponibles sur internet. Il y a aussi des comparateurs de bus si vous en avez besoin!</span></p>\r\n<p><span style=\"font-weight: 400;\">Ces comparateurs vous seraient tr&egrave;s utiles pour trouver le tarif qui vous convient le mieux.&nbsp;</span></p>\r\n<p><strong>4- Prendre une assurance de voyage</strong></p>\r\n<p><span style=\"font-weight: 400;\">Il est d&rsquo;une grande importance d&rsquo;&ecirc;tre couvert en cas de maladies et d&rsquo;accidents pendant votre voyage, parce que si jamais vous tombez malade ou que vous avez un accident, vous serez oblig&eacute; de payer une somme importante comme frais d&rsquo;hospitalisation.</span></p>\r\n<p><span style=\"font-weight: 400;\">Afin d&rsquo;&eacute;viter cela, consultez les offres d&rsquo;assurance voyage sur internet et r&eacute;servez la votre.</span></p>\r\n<p><strong>5- R&eacute;servation d&rsquo;h&eacute;bergement</strong></p>\r\n<p><span style=\"font-weight: 400;\">Vous n&rsquo;aurez pas besoin de suivre cette &eacute;tape si vous souhaitez faire une r&eacute;servation sur place. Sinon, si vous pr&eacute;f&eacute;rez r&eacute;server votre h&eacute;bergement &agrave; l&rsquo;avance, vous pouvez opter pour l&rsquo;un des sites de r&eacute;servation en ligne. Vous pouvez voir les reviews des gens qui l&rsquo;ont d&eacute;j&agrave; utilis&eacute;, sans oublier que vous pouvez -pour la plupart des sites- annuler votre r&eacute;servation &agrave; tout moment (&agrave; moins que cela ne d&eacute;passe 48h).</span></p>\r\n<p><strong>6- Location de voiture</strong></p>\r\n<p><span style=\"font-weight: 400;\">Si vous avez besoin d&rsquo;une voiture pour votre voyage, consultez un site de location de voitures pour obtenir les meilleures offres disponibles avec toutes les informations de voiture dont vous aurez besoin.</span></p>\r\n<p><strong>7- R&eacute;servation des excursions et activit&eacute;s</strong></p>\r\n<p><span style=\"font-weight: 400;\">Le but de cette &eacute;tape est de vous permettre de profiter au mieux de votre voyage. Elle d&eacute;pend aussi de votre style de voyage, de votre budget et de ce que vous pr&eacute;voyez faire dans votre voyage.</span></p>\r\n<p><span style=\"font-weight: 400;\">Alors, si vous souhaitez r&eacute;server en ligne; vous n&rsquo;avez qu&rsquo;&agrave; utiliser un site de r&eacute;servation sur internet. Cela ne va pas seulement vous permettre de choisir les meilleures offres de prix disponibles; mais aussi d&rsquo;&eacute;viter les pi&egrave;ges que l&rsquo;on fait parfois aux touristes.</span></p>\r\n<p><span style=\"font-weight: 400;\">Toutefois, si jamais vous trouvez une activit&eacute; int&eacute;ressante et abordable sur place, vous devriez absolument l&rsquo;essayer!</span></p>\r\n<p><span style=\"font-weight: 400;\">Rentacs vous propose une multitude d&rsquo;activit&eacute;s &agrave; absolument essayer. Consultez nos offres et r&eacute;servez celle qui vous convient le plus!</span></p>\r\n<p><span style=\"font-weight: 400;\">Et voil&agrave;! Maintenant, vous &ecirc;tes pr&ecirc;t pour pr&eacute;parer vos affaires et vous dirigez vers votre prochaine destination!</span></p>\r\n<p><span style=\"font-weight: 400;\">Bon voyage!</span></p>'),
(10, 23, 'en', 'Les meilleurs endroits que vous devez visiter au Maroc', '<p><span style=\"font-weight: 400;\">Juste son nom fait r&ecirc;ver.. Le Maroc! Un pays d&rsquo;Afrique du nord qui allie tradition et modernit&eacute; et se r&eacute;jouit d&rsquo;une richesse naturelle &eacute;poustouflante! Il est aussi tr&egrave;s connu pour </span><strong>l</strong><span style=\"font-weight: 400;\">&rsquo;hospitalit&eacute; et la g&eacute;n&eacute;rosit&eacute; de ses habitants. Plusieurs touristes le consid&egrave;rent comme leur meilleure destination de voyage!&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Pour </span><strong>une exp&eacute;rience de voyage in&eacute;dite notamment &agrave; moto</strong><span style=\"font-weight: 400;\">, le Maroc vous permet de d&eacute;couvrir de tr&egrave;s beaux paysages qui ne se limitent pas aux montagnes qu&rsquo;offrent g&eacute;n&eacute;ralement les circuits &agrave; moto; mais plus encore! Vous y trouverez aussi des </span><strong>paysages naturels extraordinaires</strong><span style=\"font-weight: 400;\">: des plaines, des for&ecirc;ts, des vall&eacute;es, des d&eacute;serts, des oasis, l&rsquo;oc&eacute;an atlantique, la m&eacute;diterran&eacute;e...etc.</span></p>\r\n<p><span style=\"font-weight: 400;\">Voici des destinations auxquelles vous aurez sans doute envie de revenir encore et encore!&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Mais tenez-vous bien, ce serait un peu difficile de vous d&eacute;cider; parce que ces destinations sont toutes aussi stup&eacute;fiantes l&rsquo;une que l&rsquo;autre!</span></p>\r\n<p><span style=\"font-weight: 400;\">Allez, on y va?&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">C&rsquo;est parti!</span></p>\r\n<h3><strong>Marrakech, la ville Ocre</strong></h3>\r\n<p><span style=\"font-weight: 400;\">C&rsquo;est </span><strong>la premi&egrave;re ville touristique du Maroc</strong><span style=\"font-weight: 400;\">. Elle a une grande popularit&eacute; aupr&egrave;s des touristes &eacute;trangers; et ils y sont tr&egrave;s nombreux tout au long de l&rsquo;ann&eacute;e. Ce qui est exceptionnel &agrave; propos de cette ville; c&rsquo;est qu&rsquo;il y en a plusieurs endroits &agrave; visiter, et ils sont tous merveilleux!&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Vous pouvez d&eacute;couvrir ses </span><strong>magnifiques souks populaires</strong><span style=\"font-weight: 400;\">, </span><strong>la fameuse place Jama&acirc; El-Fna</strong><span style=\"font-weight: 400;\"> caract&eacute;ris&eacute;e par son ambiance authentique et chaleureuse, le </span><strong>Jardin Majorelle</strong><span style=\"font-weight: 400;\">, ou encore </span><strong>la palmeraie de la ville rouge</strong><span style=\"font-weight: 400;\">, sans oublier ses b&acirc;timents historiques formidables.</span></p>\r\n<h3><strong>Lac Bin El Ouidane</strong></h3>\r\n<p><span style=\"font-weight: 400;\">Sans m&ecirc;me vous fournir d\'informations sur ce lac, une seule photo sur Google pourrait &eacute;veiller votre int&eacute;r&ecirc;t pour la visiter! Situ&eacute; dans la province d&rsquo;Azilal, le lac Bin El Ouidane est un endroit magnifique que vous allez sans doute adorer.</span></p>\r\n<p><span style=\"font-weight: 400;\">C&rsquo;est un immense lac de 4000 hectares, avec une hauteur de 800 m&egrave;tres; ce qui la rend le plus haut lac dans toute l&rsquo;Afrique! Son immensit&eacute;, la couleur rafra&icirc;chissante de l&rsquo;eau, les terres qui l&rsquo;entourent et les oliviers sont tous des paysages qui font sortir la beaut&eacute; du lac et refl&egrave;tent </span><strong>la splendeur de la nature marocaine</strong><span style=\"font-weight: 400;\">!</span><strong>&nbsp;</strong></p>\r\n<h3><strong>Mazagan</strong></h3>\r\n<p><span style=\"font-weight: 400;\">C&rsquo;est un resort hors pair avec un emplacement id&eacute;al qui donne sur l&rsquo;Oc&eacute;an Atlantique et une for&ecirc;t enchant&eacute;e; o&ugrave; la tradition marocaine et la modernit&eacute; se compl&egrave;tent parfaitement!&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Que vous cherchiez une exp&eacute;rience romantique avec votre partenaire ou bien des moments impeccables avec votre famille ou amis, Mazagan a pour vous un large panel d&rsquo;activit&eacute;s int&eacute;ressantes qui vont surement rendre votre s&eacute;jour dans la r&eacute;gion inoubliable.</span></p>\r\n<h3><strong>Ksar Ait-ben-Haddou</strong></h3>\r\n<p><span style=\"font-weight: 400;\">Situ&eacute; dans la province de Ouarzazate, Ksar Ait-ben-Haddou est un village fortifi&eacute; et &eacute;difi&eacute; sur le c&ocirc;t&eacute; d&rsquo;une colline; avec des murs d&eacute;fensifs en ocre et caramel qui vous transporteront dans les vieux temps! C&rsquo;est un endroit unique; et ce qui le prouve c&rsquo;est qu&rsquo;il est class&eacute; au patrimoine de l&rsquo;UNESCO.</span></p>\r\n<p><span style=\"font-weight: 400;\">Vous l&rsquo;avez peut-&ecirc;tre d&eacute;j&agrave; vu &agrave; la t&eacute;l&eacute;, il &eacute;tait en effet le lieu de plusieurs tournages tels que Game of Thrones et Gladiator.</span></p>\r\n<h3><strong>Les gorges du Dad&egrave;s</strong><span style=\"font-weight: 400;\">&nbsp;</span></h3>\r\n<p><span style=\"font-weight: 400;\">Un autre endroit qui n&rsquo;est pas moins spectaculaire. Situ&eacute;es dans le sud du Maroc, les gorges du Dad&egrave;s constituent l&rsquo;un des paysages magnifiques qui refl&egrave;tent la beaut&eacute; du sud marocain. La vue domin&eacute;e par les roches est d&eacute;cor&eacute;e par des formations g&eacute;ologiques impeccables; avec des couleurs fabuleuses. &Ccedil;a donne du vertige mais &ccedil;a vaut absolument le coup!<br /></span></p>\r\n<p><span style=\"font-weight: 400;\"><img src=\"/uploads/photos/1/road-from-ouarzazate-to-marrakesh.jpg\" alt=\"\" width=\"100%\" height=\"100%\" /></span></p>\r\n<h3><strong>Merzouga&nbsp;</strong></h3>\r\n<p><span style=\"font-weight: 400;\">Si vous visitez le Maroc sans passer par le Sahara, vous risquez de g&acirc;cher un vrai r&eacute;gal pour vos yeux! C&rsquo;est au sud-est que se trouve le village de Merzouga, un endroit parfait pour d&eacute;couvrir </span><strong>les grandes dunes du Sahara</strong><span style=\"font-weight: 400;\"> dans l&rsquo;immense mer de sable!&nbsp;</span></p>\r\n<h3><strong>Chefchaouen</strong></h3>\r\n<p><span style=\"font-weight: 400;\">Parmi les incontournables &agrave; visiter au Maroc; c&rsquo;est la perle bleue du pays: la ville de Chefchaouen. Elle se trouve dans le nord-est et est caract&eacute;ris&eacute;e par la teinture bleue ciel de ses habitations, ruelles et fa&ccedil;ades. Enti&egrave;rement peinte en bleu ciel, la ville est dot&eacute;e d&rsquo;une simplicit&eacute; charmante et agr&eacute;able. Cela rappelle un peu la Gr&egrave;ce, sauf que c&rsquo;est en bleu ciel! En visitant Chefchaouen, assistez au coucher de soleil pour profiter d&rsquo;un instant fascinant!&nbsp;&nbsp;</span></p>\r\n<h3><strong>F&egrave;s</strong></h3>\r\n<p><span style=\"font-weight: 400;\">Dans la ville de F&egrave;s, vous trouverez une partie jeune, une partie demi-vieille et une autre vieille. Il s&rsquo;y trouve des tr&eacute;sors historiques tels que </span><strong>le palais Alaouite</strong><span style=\"font-weight: 400;\">, </span><strong>l&rsquo;ancien quartier juif</strong><span style=\"font-weight: 400;\">, </span><strong>la mosqu&eacute;e Karaouiyine</strong><span style=\"font-weight: 400;\">, </span><strong>la vieille universit&eacute; du monde arabe</strong><span style=\"font-weight: 400;\">...etc. Elle est tr&egrave;s connue pour sa vieille m&eacute;dina qui est class&eacute;e au patrimoine de l&rsquo;UNESCO et qui fait revivre le pass&eacute;.</span></p>\r\n<h3><strong>Essaouira</strong></h3>\r\n<p><span style=\"font-weight: 400;\">Situ&eacute;e au bord de l&rsquo;Atlantique, Essaouira est </span><strong>une ville touristique</strong><span style=\"font-weight: 400;\"> class&eacute;e au patrimoine de l&rsquo;UNESCO. Elle est dot&eacute;e d&rsquo;une authenticit&eacute; ravissante et d\'une fra&icirc;cheur captivante qui vient de son port. Chaude pendant l&rsquo;&eacute;t&eacute;, elle se r&eacute;jouit des superbes plages dont vous pouvez profiter en cette saison. C&rsquo;est aussi la destination des photographes qui veulent profiter des plus beaux couchers de soleil autour du pays.</span></p>\r\n<h3><strong>Dakhla</strong></h3>\r\n<p><span style=\"font-weight: 400;\">C&rsquo;est une ville de l&rsquo;extr&ecirc;me sud marocain qui allie d&eacute;sert et oc&eacute;an! A Dakhla, vous pouvez faire une excursion dans le d&eacute;sert, profiter </span><strong>des beaux plages</strong><span style=\"font-weight: 400;\"> ou de </span><strong>la source d&rsquo;eaux chaudes Asmaa</strong><span style=\"font-weight: 400;\"> ou encore visiter l&rsquo;un de ses captivants paysages tels que </span><strong>la lagune de Dakhla</strong><span style=\"font-weight: 400;\"> et </span><strong>l&rsquo;&icirc;le de Dragon</strong><span style=\"font-weight: 400;\">.</span></p>\r\n<p><span style=\"font-weight: 400;\">Et voil&agrave;! Vous allez certainement trouver dans l\'un de ces endroits votre prochaine destination id&eacute;ale pour profiter au maximum de votre voyage au Maroc! Mais ce n&rsquo;est pas tout, il y en a absolument d&rsquo;autres lieux aussi beaux que ceux-ci!</span></p>\r\n<p><span style=\"font-weight: 400;\">Alors, d&eacute;cidez de votre prochaine destination et </span><strong>planifiez votre prochain voyage avec nous</strong><span style=\"font-weight: 400;\">.</span></p>'),
(11, 23, 'fr', 'Les meilleurs destinations que vous devez visiter au Maroc', '<p><span style=\"font-weight: 400;\">Juste son nom fait r&ecirc;ver.. Le Maroc! Un pays d&rsquo;Afrique du nord qui allie tradition et modernit&eacute; et se r&eacute;jouit d&rsquo;une richesse naturelle &eacute;poustouflante! Il est aussi tr&egrave;s connu pour </span><strong>l</strong><span style=\"font-weight: 400;\">&rsquo;hospitalit&eacute; et la g&eacute;n&eacute;rosit&eacute; de ses habitants. Plusieurs touristes le consid&egrave;rent comme leur meilleure destination de voyage!&nbsp;</span></p>\r\n<p>Pour une exp&eacute;rience de voyage in&eacute;dite notamment &agrave; moto, le Maroc vous permet de d&eacute;couvrir de tr&egrave;s beaux paysages qui ne se limitent pas aux montagnes qu&rsquo;offrent g&eacute;n&eacute;ralement les circuits &agrave; moto; mais plus encore! Vous y trouverez aussi des paysages naturels extraordinaires: des plaines, des for&ecirc;ts, des vall&eacute;es, des d&eacute;serts, des oasis, l&rsquo;oc&eacute;an atlantique, la m&eacute;diterran&eacute;e...etc.</p>\r\n<p><span style=\"font-weight: 400;\">Voici des destinations auxquelles vous aurez sans doute envie de revenir encore et encore!&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Mais tenez-vous bien, ce serait un peu difficile de vous d&eacute;cider; parce que ces destinations sont toutes aussi stup&eacute;fiantes l&rsquo;une que l&rsquo;autre!</span></p>\r\n<p><span style=\"font-weight: 400;\">Allez, on y va?&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">C&rsquo;est parti!</span></p>\r\n<h3><strong>Marrakech, la ville Ocre</strong></h3>\r\n<p>C&rsquo;est la premi&egrave;re ville touristique du Maroc. Elle a une grande popularit&eacute; aupr&egrave;s des touristes &eacute;trangers; et ils y sont tr&egrave;s nombreux tout au long de l&rsquo;ann&eacute;e. Ce qui est exceptionnel &agrave; propos de cette ville; c&rsquo;est qu&rsquo;il y en a plusieurs endroits &agrave; visiter, et ils sont tous merveilleux!&nbsp;</p>\r\n<p>Vous pouvez d&eacute;couvrir ses magnifiques souks populaires, la fameuse place Jama&acirc; El-Fna caract&eacute;ris&eacute;e par son ambiance authentique et chaleureuse, le Jardin Majorelle, ou encore la palmeraie de la ville rouge, sans oublier ses b&acirc;timents historiques formidables.</p>\r\n<h3><strong>Lac Bin El Ouidane</strong></h3>\r\n<p><span style=\"font-weight: 400;\">Sans m&ecirc;me vous fournir d\'informations sur ce lac, une seule photo sur Google pourrait &eacute;veiller votre int&eacute;r&ecirc;t pour la visiter! Situ&eacute; dans la province d&rsquo;Azilal, le lac Bin El Ouidane est un endroit magnifique que vous allez sans doute adorer.</span></p>\r\n<p>C&rsquo;est un immense lac de 4000 hectares, avec une hauteur de 800 m&egrave;tres; ce qui la rend le plus haut lac dans toute l&rsquo;Afrique! Son immensit&eacute;, la couleur rafra&icirc;chissante de l&rsquo;eau, les terres qui l&rsquo;entourent et les oliviers sont tous des paysages qui font sortir la beaut&eacute; du lac et refl&egrave;tent la splendeur de la nature marocaine!&nbsp;</p>\r\n<p><img src=\"/uploads/photos/1/102788779_o.jpg\" alt=\"\" width=\"100%\" height=\"100%\" /></p>\r\n<h3><strong>Mazagan</strong></h3>\r\n<p><span style=\"font-weight: 400;\">C&rsquo;est un resort hors pair avec un emplacement id&eacute;al qui donne sur l&rsquo;Oc&eacute;an Atlantique et une for&ecirc;t enchant&eacute;e; o&ugrave; la tradition marocaine et la modernit&eacute; se compl&egrave;tent parfaitement!&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Que vous cherchiez une exp&eacute;rience romantique avec votre partenaire ou bien des moments impeccables avec votre famille ou amis, Mazagan a pour vous un large panel d&rsquo;activit&eacute;s int&eacute;ressantes qui vont surement rendre votre s&eacute;jour dans la r&eacute;gion inoubliable.</span></p>\r\n<h3><strong>Ksar Ait-ben-Haddou</strong></h3>\r\n<p><span style=\"font-weight: 400;\">Situ&eacute; dans la province de Ouarzazate, Ksar Ait-ben-Haddou est un village fortifi&eacute; et &eacute;difi&eacute; sur le c&ocirc;t&eacute; d&rsquo;une colline; avec des murs d&eacute;fensifs en ocre et caramel qui vous transporteront dans les vieux temps! C&rsquo;est un endroit unique; et ce qui le prouve c&rsquo;est qu&rsquo;il est class&eacute; au patrimoine de l&rsquo;UNESCO.</span></p>\r\n<p><span style=\"font-weight: 400;\">Vous l&rsquo;avez peut-&ecirc;tre d&eacute;j&agrave; vu &agrave; la t&eacute;l&eacute;, il &eacute;tait en effet le lieu de plusieurs tournages tels que Game of Thrones et Gladiator.</span></p>\r\n<p><span style=\"font-weight: 400;\"><img src=\"/uploads/photos/1/ksar+ait-ben-haddou+6.jpg\" alt=\"\" width=\"100%\" height=\"100%\" /></span></p>\r\n<h3><strong>Les gorges du Dad&egrave;s</strong><span style=\"font-weight: 400;\">&nbsp;</span></h3>\r\n<p><span style=\"font-weight: 400;\">Un autre endroit qui n&rsquo;est pas moins spectaculaire. Situ&eacute;es dans le sud du Maroc, les gorges du Dad&egrave;s constituent l&rsquo;un des paysages magnifiques qui refl&egrave;tent la beaut&eacute; du sud marocain. La vue domin&eacute;e par les roches est d&eacute;cor&eacute;e par des formations g&eacute;ologiques impeccables; avec des couleurs fabuleuses. &Ccedil;a donne du vertige mais &ccedil;a vaut absolument le coup!</span></p>\r\n<h3><strong>Merzouga&nbsp;</strong></h3>\r\n<p>Si vous visitez le Maroc sans passer par le Sahara, vous risquez de g&acirc;cher un vrai r&eacute;gal pour vos yeux! C&rsquo;est au sud-est que se trouve le village de Merzouga, un endroit parfait pour d&eacute;couvrir les grandes dunes du Sahara dans l&rsquo;immense mer de sable!&nbsp;</p>\r\n<p><img src=\"/uploads/photos/1/merzouga-water.jpg\" alt=\"\" width=\"100%\" height=\"100%\" /></p>\r\n<h3><strong>Dakhla</strong></h3>\r\n<p>C&rsquo;est une ville de l&rsquo;extr&ecirc;me sud marocain qui allie d&eacute;sert et oc&eacute;an! A Dakhla, vous pouvez faire une excursion dans le d&eacute;sert, profiter des beaux plages ou de la source d&rsquo;eaux chaudes Asmaa ou encore visiter l&rsquo;un de ses captivants paysages tels que la lagune de Dakhla et l&rsquo;&icirc;le de Dragon.</p>\r\n<h3><strong>Chefchaouen</strong></h3>\r\n<p><span style=\"font-weight: 400;\">Parmi les incontournables &agrave; visiter au Maroc; c&rsquo;est la perle bleue du pays: la ville de Chefchaouen. Elle se trouve dans le nord-est et est caract&eacute;ris&eacute;e par la teinture bleue ciel de ses habitations, ruelles et fa&ccedil;ades. Enti&egrave;rement peinte en bleu ciel, la ville est dot&eacute;e d&rsquo;une simplicit&eacute; charmante et agr&eacute;able. Cela rappelle un peu la Gr&egrave;ce, sauf que c&rsquo;est en bleu ciel! En visitant Chefchaouen, assistez au coucher de soleil pour profiter d&rsquo;un instant fascinant!&nbsp;&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\"><img src=\"/uploads/photos/1/chefchaouen-house.jpg\" alt=\"\" width=\"100%\" height=\"100%\" /></span></p>\r\n<h3><strong>Essaouira</strong></h3>\r\n<p><span style=\"font-weight: 400;\">Situ&eacute;e au bord de l&rsquo;Atlantique, Essaouira est </span>une ville touristique class&eacute;e au patrimoine de l&rsquo;UNESCO. Elle est dot&eacute;e d&rsquo;une authenticit&eacute; ravissante et d\'une fra&icirc;cheur captivante qui vient de son port. Chaude pendant l&rsquo;&eacute;t&eacute;, elle se r&eacute;jouit des superbes plages dont vous pouvez profiter en cette saison. C&rsquo;est aussi la destination des photographes qui veulent profiter des plus beaux couchers de soleil autour du pays.</p>\r\n<h3><strong>F&egrave;s</strong></h3>\r\n<p>Dans la ville de F&egrave;s, vous trouverez une partie jeune, une partie demi-vieille et une autre vieille. Il s&rsquo;y trouve des tr&eacute;sors historiques tels que le palais Alaouite, l&rsquo;ancien quartier juif, la mosqu&eacute;e Karaouiyine, la vieille universit&eacute; du monde arabe...etc. Elle est tr&egrave;s connue pour sa vieille m&eacute;dina qui est class&eacute;e au patrimoine de l&rsquo;UNESCO et qui fait revivre le pass&eacute;.</p>\r\n<p><img src=\"/uploads/photos/1/fes.jpg\" alt=\"\" width=\"100%\" height=\"100%\" /></p>\r\n<p>Et voil&agrave;! Vous allez certainement trouver dans l\'un de ces endroits votre prochaine destination id&eacute;ale pour profiter au maximum de votre voyage au Maroc! Mais ce n&rsquo;est pas tout, il y en a absolument d&rsquo;autres lieux aussi beaux que ceux-ci!</p>\r\n<p>Alors, d&eacute;cidez de votre prochaine destination et planifiez votre prochain voyage avec nous.</p>');
INSERT INTO `post_translations` (`id`, `post_id`, `locale`, `title`, `content`) VALUES
(18, 28, 'en', 'Voyage en Solo: 30 astuces et conseils pour voyager seul', '<p><span style=\"font-weight: 400;\">&laquo; Un c&oelig;ur solitaire doit &ecirc;tre un c&oelig;ur plein, il est si plein qu&rsquo;il d&eacute;bordera pour se pr&eacute;cipiter, et il est si impatient que quelqu&rsquo;un lui fasse &eacute;cho, le re&ccedil;oive et le comprenne &raquo; Shi Tiesheng.</span></p>\r\n<p><span style=\"font-weight: 400;\">Voyager et prendre le temps de respirer un air nouveau, quelle puret&eacute;! Parcourir les dunes, les sables, les mers et m&ecirc;me les oc&eacute;ans, quel r&eacute;gal pour l&rsquo;&acirc;me! Savez-vous ce qu&rsquo;est r&eacute;ellement voyager ?</span></p>\r\n<p><span style=\"font-weight: 400;\">Voyager c&rsquo;est vivre chaque jour diff&eacute;remment, c&rsquo;est d&eacute;cider de faire quelque chose qui n&rsquo;a rien &agrave; voir avec notre quotidien, et c&rsquo;est d&eacute;cider de d&eacute;couvrir de nouveaux horizons, une nouvelle culture, un nouveau monde et bien s&ucirc;r, c&rsquo;est se r&eacute;galer autrement.</span></p>\r\n<p><span style=\"font-weight: 400;\">&laquo; Les personnes qui peuvent se parler ne se sentiront jamais seules &raquo; Maxwell Marz</span></p>\r\n<p><span style=\"font-weight: 400;\">C&rsquo;est bien de cela dont il est question : &laquo; savoir vivre sans le m&ecirc;me autrui et sans les m&ecirc;mes actions du quotidien qui remplissent notre vie. &raquo;. Voyager c&rsquo;est conna&icirc;tre et comprendre le monde qui nous entoure un peu plus et c&rsquo;est apprendre chaque jour quelque chose d&rsquo;inconnu. Mais comment faire lorsqu&rsquo;on veut voyager ? Comment r&eacute;ussir &agrave; vivre pleinement son voyage en communiquant sans &ecirc;tre accompagn&eacute; par un proche ou une connaissance ? Que faut-il faire, que faut-il dire et surtout comment faut-il se comporter ?</span></p>\r\n<p><span style=\"font-weight: 400;\">Rentacs Tours conna&icirc;t plusieurs rouages pour aider &agrave; mieux vivre votre voyage en solo. Voyager ne consiste pas seulement &agrave; d&eacute;cider de la destination que vous souhaitez visiter, il faut une bonne planification pour que votre voyage r&eacute;ussisse. Pour pouvez d&eacute;couvrir ici quelques &eacute;tapes incontournables pour bien pr&eacute;parer votre voyage. Dans cet article, Rentacs Tours a s&eacute;lectionn&eacute; pour vous 30 astuces que l&rsquo;on a souvent tendance &agrave; oublier mais qui vous aideront &agrave; mieux vivre votre voyage en solo.</span></p>\r\n<ol>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">Avoir ses papiers</span></li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">Carte d&rsquo;identit&eacute;, passeport, permis de conduire&hellip; Voyager c&rsquo;est d&rsquo;abord pouvoir se pr&eacute;senter, &ecirc;tre identifiable et surtout &ecirc;tre r&eacute;pertori&eacute;. Vous ne pourrez effectuer aucun voyage sans papier. Vous risquerez de ne m&ecirc;me pas traverser le portique de s&eacute;curit&eacute;. Si vous devez faire le trajet en sens inverse &agrave; cause de l&rsquo;oubli d&rsquo;un de vos documents administratifs, vous pourrez rater votre vol et&nbsp; donc perdre en temps et en finance. Ne vous faites pas avoir ! R&eacute;fl&eacute;chissez &agrave; votre destination et pensez TOUJOURS &agrave; prendre d&rsquo;abord vos documents administratifs.</span></p>\r\n<ol>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">Savoir se rep&eacute;rer</span></li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">Lorsque vous voyagez seul, vous avez doublement conscience des risques que vous prenez et vos sens sont bien plus aiguis&eacute;s. Voyager seul est un excellent moyen de faire travailler votre sens du rep&eacute;rage : comment vous retrouver lorsque vous quittez d&rsquo;un point A &agrave; un point B ; comment revenir &agrave; votre h&ocirc;tel ou maison d&rsquo;h&ocirc;te etc. Il est important de savoir o&ugrave; vous marcher et comment vous marcher, conna&icirc;tre les lieux aux alentours, les noms des caf&eacute;s&hellip;</span></p>\r\n<ol>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">Etre ouvert d&rsquo;esprit</span></li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">Sachez faire la diff&eacute;rence entre ce que vous voyez et ce qui vous semble politiquement correcte, rebutant ou choquant car les actions pos&eacute;es ont des significations diff&eacute;rentes selon le pays o&ugrave; elles ont lieu.&nbsp;&nbsp;</span></p>\r\n<ol>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">Conna&icirc;tre le code vestimentaire du pays h&ocirc;te.</span></li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">Il est des pays o&ugrave; le port du short est interdit pour entrer &agrave; l&rsquo;a&eacute;roport, pour se rendre dans certains lieux.&nbsp; Avant de d&eacute;cider de faire votre valise, renseignez vous sur le pays dans lequel vous vous rendez, cela &eacute;vitera des surprises d&eacute;sobligeantes.</span></p>\r\n<ol>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">Conna&icirc;tre les r&egrave;gles du pays h&ocirc;te.</span></li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">Certains pays ont des r&egrave;gles de biens&eacute;ance, de savoir vivre et bien qu&rsquo;ils soient au courant que le tourisme fait partie de leur politique, ils restent bien moins r&eacute;ceptifs &agrave; ceux qui abusent sous pr&eacute;texte qu&rsquo;ils sont touristes. Effectivement, &ecirc;tre touriste c&rsquo;est se comporter comme un touriste mais avant tout respecter le pays hospitalier.&nbsp; Ex : une personne qui se rend dans un lieu saint mal v&ecirc;tu ou qui d&eacute;cide de cracher par terre peut faire face &agrave; des sanctions.</span></p>\r\n<ol>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">Conna&icirc;tre ses droits</span></li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">En tant que touriste &eacute;tranger, il est important de conna&icirc;tre ses droits mais surtout de conna&icirc;tre ceux qui s&rsquo;appliquent au pays que nous d&eacute;cidons de d&eacute;couvrir.</span></p>\r\n<ol>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">Conna&icirc;tre les us et coutumes dudit pays.</span></li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">Visiter un pays c&rsquo;est savoir ce &agrave; quoi l&rsquo;on s&rsquo;expose et c&rsquo;est &eacute;viter d&rsquo;attirer les mauvais regards sur nous. De ce fait, il est important de savoir ce qui est raisonnable ou non aupr&egrave;s des autochtones. Il se pourrait que vous arriviez dans un pays et que vous ne traverserez m&ecirc;me pas la fronti&egrave;re &agrave; cause d&rsquo;un petit d&eacute;tail que vous ignoriez.</span></p>\r\n<ol>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">Conna&icirc;tre la langue parl&eacute;e dans le pays et les d&eacute;riv&eacute;es.</span></li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">De nos jours, nous n&rsquo;avons plus besoin de parler couramment la langue d&rsquo;un pays quelconque car le digital gr&acirc;ce &agrave; son expansion nous aide bien &agrave; ce niveau. Ceci dit, il est important de savoir quelle langue est parl&eacute;e ainsi que ses d&eacute;riv&eacute;es et en retenir quelques mots fondamentaux afin de ne pas se retrouver l&eacute;ser.</span></p>\r\n<ol>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">Avoir un bon GPS et une bonne carte.</span></li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">A l&rsquo;&egrave;re du Digital la connexion est de rigueur. Vous pouvez cependant, vous retrouver &agrave; court de batteries dans des zones o&ugrave; la fibre ne passe pas bien sinon pas du tout, &agrave; ce moment il faudrait que vous ayez sur vous une carte manuscrite afin de bien vous orienter.</span></p>\r\n<ol>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">\r\n<h3><span style=\"font-weight: 400;\">Se renseigner aupr&egrave;s des agences de tourisme sur les endroits &agrave; visiter</span></h3>\r\n</li>\r\n</ol>\r\n<h3><span style=\"font-weight: 400;\">Si vous visitez un pays, apprenez &agrave; vous rendre dans des agences de tourisme car elles poss&egrave;dent des listes v&eacute;rifi&eacute;es et reconnues par l\'&Eacute;tat sur les diff&eacute;rents lieux qu&rsquo;il est possible de visiter en toute s&eacute;curit&eacute;.</span></h3>\r\n<ol>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">\r\n<h3><span style=\"font-weight: 400;\">Conna&icirc;tre o&ugrave; est situ&eacute;e son ambassade.</span></h3>\r\n</li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">Il est tr&egrave;s important de savoir o&ugrave; se situe votre ambassade dans un pays quelle que soit la dur&eacute;e de votre s&eacute;jour car l&rsquo;ambassade repr&eacute;sente pour vous une assurance quant &agrave; votre retour dans votre pays d&rsquo;origine en cas de litige.</span></p>\r\n<ol>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">\r\n<h3><span style=\"font-weight: 400;\">Savoir quels sont les endroits &agrave; &eacute;viter.</span></h3>\r\n</li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">Si vous avez d&eacute;j&agrave; envisag&eacute; d&rsquo;effectuer un voyage, vous vous &ecirc;tes s&ucirc;rement ru&eacute;s sur les avis des internautes et sur les diff&eacute;rents &laquo; on dit &raquo;. Et bien, vous avez raison car quoi de plus naturel que de savoir o&ugrave; nous mettons les pieds ? Si vous avez l&rsquo;habitude de vous laissez guider par le vent, sachez qu&rsquo;il y a des endroits dans chaque pays o&ugrave; il est dangereux de mettre les pieds na&iuml;vement et le fait d&rsquo;&ecirc;tre touriste ne vous exemptera pas.</span></p>\r\n<ol>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">\r\n<h3><span style=\"font-weight: 400;\">Conna&icirc;tre les appartenances du pays (racisme, religion, tol&eacute;rance).</span></h3>\r\n</li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">Il existe des pays o&ugrave; le racisme est pr&eacute;sent mais camoufl&eacute; comme d\'autres o&ugrave; il est clairement perceptible. Il est important d&rsquo;apprendre &agrave; regarder au-del&agrave; de cela mais il est aussi fortement conseill&eacute; de ne pas prendre cela &agrave; la l&eacute;g&egrave;re et de savoir s&rsquo;il est vraiment n&eacute;cessaire de s&rsquo;y rendre. De m&ecirc;me que pour la religion il faut savoir quelles sont leurs croyances et si vous avez le droit de manifester la v&ocirc;tre.</span></p>\r\n<ol>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">Avoir des esp&egrave;ces sur soi</span></li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">Vous ne pouvez voyager et faire confiance &agrave; votre carte bleue. Ayez des billets de monnaie locales sur vous pour ne pas vous retrouver dans un impr&eacute;vu et ne pas pouvoir g&eacute;rer. Ayez une monnaie passe partout &eacute;galement en cas de d&eacute;part pr&eacute;cipit&eacute;.</span></p>\r\n<ol>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">Conna&icirc;tre le commissariat ou l&rsquo;h&ocirc;pital le plus proche.</span></li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">Si vous savez o&ugrave; vous &ecirc;tes (h&ocirc;tel), vous devriez savoir quels sont les services les plus pratiques dont vous aurez besoin en cas d&rsquo;urgence, de plaintes ou de forces majeures.</span></p>\r\n<ol>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">Conna&icirc;tre ses allergies ou intol&eacute;rances.</span></li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">Il est important de faire un test allergologique avant de voyager car le corps humain &eacute;volue et d&eacute;veloppe de nouvelles facettes constamment. Vous pouvez r&eacute;sider dans un pays ou le pollen n&rsquo;existe pas, faire une allergie au pollen en arrivant dans votre pays de visite et ne pas savoir comment r&eacute;agir.</span></p>\r\n<ol>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">Pr&eacute;voir une trousse &agrave; pharmacie.</span></li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">Si vous voyagez, vous devez pr&eacute;voir une trousse &agrave; pharmacie car vous pourrez &ecirc;tre confront&eacute;s &agrave; une situation improbable et ne pas pouvoir obtenir de l&rsquo;aide de suite (quelqu&rsquo;un pour se rendre en pharmacie ou vous obtenir le m&eacute;dicament ad&eacute;quat dans votre h&ocirc;tel ou en zone retir&eacute;e). Il est pr&eacute;f&eacute;rable de conna&icirc;tre son corps, de savoir o&ugrave; on se rend et de se pr&eacute;parer en condition.</span></p>\r\n<ol>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">Avoir des appareils fiables, efficaces et durables en autonomie.</span></li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">Voyager c&rsquo;est se pr&eacute;parer en tout et de nos jours un bon voyage c&rsquo;est aussi de bons appareils avec une bonne autonomie pour capturer des moments inoubliables.</span></p>\r\n<ol>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">Avoir du savoir vivre</span></li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">Lorsque vous voyagez seul, oubliez le &laquo; moi je &raquo; fonctionnez plut&ocirc;t en &laquo; ah oui ? Pourquoi pas ?&raquo; car voyager c&rsquo;est se d&eacute;couvrir et pour le faire, il faut parfois oublier qui nous sommes et comment nous fonctionnons la plupart du temps.</span></p>\r\n<ol>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">Savoir tenir sa langue/ prudence</span></li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">Si vous voyagez en solo, il faut apprendre &agrave; tenir votre langue. L&rsquo;objectif est de vous amuser faire des rencontres, des d&eacute;couvertes et pas vous retrouver dans des conflits ou incompr&eacute;hensions &agrave; cause de vos dires qui j&rsquo;en suis s&ucirc;re ne partaient pas d&rsquo;une mauvaise intention.</span></p>\r\n<ol>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">Savoir respecter l&rsquo;environnement</span></li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">Apprenez &agrave; respecter l&rsquo;environnement et vivre au rythme du lieu que vous visitez. Ceci est tr&egrave;s important, cela montrera votre implication pour un environnement durable.</span></p>\r\n<ol>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">Avoir ses Vaccins &agrave; jour.</span></li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">Renseignez vous sur les maladies qui courent dans le pays o&ugrave; vous allez et mettez &agrave; jour vos vaccins s&rsquo;il y a lieu car ce serait dommage de commencer sinon finir votre s&eacute;jour aux urgences.</span></p>\r\n<ol>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">Ma&icirc;triser le droit international</span></li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">Ma&icirc;triser le droit international et les &eacute;changes qui lient votre pays d&rsquo;origine &agrave; votre pays de visite pourra vous aider durant vos diff&eacute;rents d&eacute;placements ou autres. Il est tr&egrave;s important de savoir ce que le droit international vous autorise ou pas &agrave; faire.</span></p>\r\n<ol>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">Savoir sympathiser</span></li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">R&eacute;ussir son voyage solo c&rsquo;est savoir faire de belles rencontres le temps d&rsquo;une vir&eacute;e, d&rsquo;un &eacute;v&egrave;nement ou d&rsquo;un repas.</span></p>\r\n<ol>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">Savoir donner des nouvelles &agrave; son entourage</span></li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">&Ecirc;tre solitaire ne signifie pas &ecirc;tre imprudent. Lorsque vous faites une activit&eacute;, vous vous d&eacute;placez ou vous quittez la ville source pour des coins plus retir&eacute;s, sachez pr&eacute;venir vos proches, donnez leur de vos nouvelles car on ne sait jamais. &Ecirc;tre joignable c&rsquo;est la base car vous n&rsquo;&ecirc;tes pas seuls.</span></p>\r\n<ol>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">Tracer son itin&eacute;raire.</span></li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">Afin de ne pas vous perdre et au final ne pas pouvoir tout faire, il est mieux de pr&eacute;parer votre itin&eacute;raire. Savoir par exemple quelles sont les activit&eacute;s qui se situent dans un m&ecirc;me p&eacute;rim&egrave;tre, la faisabilit&eacute;&hellip;</span></p>\r\n<ol>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">Savoir s&rsquo;organiser</span></li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">L&rsquo;organisation c&rsquo;est la base. Un temps de repos, un temps pour soi, un temps pour s&rsquo;amuser, un temps pour visiter.&nbsp; Gr&acirc;ce &agrave; une bonne organisation, on passe de meilleurs moments.</span></p>\r\n<ol>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">Pr&eacute;parer une bonne Playlist</span></li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">S&eacute;lectionnez les chansons qui vous font du bien, celles qui vous permettent de dormir et celles qui vous redonnent de l&rsquo;&eacute;nergie. Une bonne playlist c&rsquo;est une meilleure ambiance, une meilleure ouverture et de la bonne humeur.</span></p>\r\n<ol>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">Prendre le temps de bien se reposer</span></li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">N&rsquo;oubliez pas de vous reposer. Il est important de se reposer pour mieux passer ses activit&eacute;s, tenir la journ&eacute;e ou supporter les humeurs des personnes autour ainsi que les difficult&eacute;s.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Soyez vous-m&ecirc;me ! Rentacs vous donne les astuces et les conseils pour ne pas vous retrouver dans des situations d&eacute;sobligeantes mais les bonnes situations les meilleures souvenirs et les rencontres que vous ferez, celles que vous d&eacute;ciderez de faire perdurer, celles en qui vous ferez confiance durant votre p&eacute;riple ne d&eacute;pendra que de vous m&ecirc;me.</span></p>\r\n<p><span style=\"font-weight: 400;\">La meilleure astuce que notre &eacute;quipe puisse vous donner c&rsquo;est de respirer un grand coup, mettre en avant votre personnalit&eacute; et vous laisser guider selon vos aspirations, vos passions et selon ce qui vous fait envie. Soyez vous m&ecirc;me car c&rsquo;est le restant que vous vous d&eacute;couvrirez encore plus, que vous en sortirez grandi et vous pourriez &ecirc;tre &eacute;tonn&eacute; de d&eacute;couvrir en vous des talents, des ma&icirc;trises de soi ou des actions inconnues sinon improbables jusqu\'&agrave; lors.</span></p>\r\n<p><span style=\"font-weight: 400;\">Surtout ne l&rsquo;oubliez pas c&rsquo;est en voyageant seul que l&rsquo;on apprend &agrave; savoir qui nous sommes, ce que nous tol&eacute;rons, ce que nous respectons et jusqu&rsquo;o&ugrave; nous sommes capable de nous d&eacute;passer. Voyagez, voyagez, voyagez car chaque voyage est une nouvelle occasion de se d&eacute;couvrir, de s&rsquo;&eacute;vader et de faire le plein pour l&rsquo;ann&eacute;e en cours, qu&rsquo;il s&rsquo;agisse des cours, du travail ou d&rsquo;une activit&eacute; qui n&eacute;cessite de se d&eacute;penser quotidiennement sans grande possibilit&eacute; d&rsquo;&eacute;panouissement, de d&eacute;couvertes et surtout d&rsquo;a&eacute;ration de l&rsquo;intellect.</span></p>'),
(19, 28, 'fr', 'Voyage en Solo: 30 astuces et conseils pour voyager seul', '<p><span style=\"font-weight: 400;\">&laquo; Un c&oelig;ur solitaire doit &ecirc;tre un c&oelig;ur plein, il est si plein qu&rsquo;il d&eacute;bordera pour se pr&eacute;cipiter, et il est si impatient que quelqu&rsquo;un lui fasse &eacute;cho, le re&ccedil;oive et le comprenne &raquo; Shi Tiesheng.</span></p>\r\n<p><span style=\"font-weight: 400;\">Voyager et prendre le temps de respirer un air nouveau, quelle puret&eacute;! Parcourir les dunes, les sables, les mers et m&ecirc;me les oc&eacute;ans, quel r&eacute;gal pour l&rsquo;&acirc;me! Savez-vous ce qu&rsquo;est r&eacute;ellement voyager ?</span></p>\r\n<p><span style=\"font-weight: 400;\">Voyager c&rsquo;est vivre chaque jour diff&eacute;remment, c&rsquo;est d&eacute;cider de faire quelque chose qui n&rsquo;a rien &agrave; voir avec notre quotidien, et c&rsquo;est d&eacute;cider de d&eacute;couvrir de nouveaux horizons, une nouvelle culture, un nouveau monde et bien s&ucirc;r, c&rsquo;est se r&eacute;galer autrement.</span></p>\r\n<p><span style=\"font-weight: 400;\">&laquo; Les personnes qui peuvent se parler ne se sentiront jamais seules &raquo; Maxwell Marz</span></p>\r\n<p><span style=\"font-weight: 400;\">C&rsquo;est bien de cela dont il est question : &laquo; savoir vivre sans le m&ecirc;me autrui et sans les m&ecirc;mes actions du quotidien qui remplissent notre vie. &raquo;. Voyager c&rsquo;est conna&icirc;tre et comprendre le monde qui nous entoure un peu plus et c&rsquo;est apprendre chaque jour quelque chose d&rsquo;inconnu. Mais comment faire lorsqu&rsquo;on veut voyager ? Comment r&eacute;ussir &agrave; vivre pleinement son voyage en communiquant sans &ecirc;tre accompagn&eacute; par un proche ou une connaissance ? Que faut-il faire, que faut-il dire et surtout comment faut-il se comporter ?</span></p>\r\n<p><span style=\"font-weight: 400;\">Rentacs Tours conna&icirc;t plusieurs rouages pour aider &agrave; mieux vivre votre voyage en solo. Voyager ne consiste pas seulement &agrave; d&eacute;cider de la destination que vous souhaitez visiter, il faut une bonne planification pour que votre voyage r&eacute;ussisse. Pour pouvez d&eacute;couvrir ici quelques &eacute;tapes incontournables pour bien pr&eacute;parer votre voyage. Dans cet article, Rentacs Tours a s&eacute;lectionn&eacute; pour vous 30 astuces que l&rsquo;on a souvent tendance &agrave; oublier mais qui vous aideront &agrave; mieux vivre votre voyage en solo.</span></p>\r\n<h3><strong>1 . Avoir ses papiers</strong></h3>\r\n<p><span style=\"font-weight: 400;\">Carte d&rsquo;identit&eacute;, passeport, permis de conduire&hellip; Voyager c&rsquo;est d&rsquo;abord pouvoir se pr&eacute;senter, &ecirc;tre identifiable et surtout &ecirc;tre r&eacute;pertori&eacute;. Vous ne pourrez effectuer aucun voyage sans papier. Vous risquerez de ne m&ecirc;me pas traverser le portique de s&eacute;curit&eacute;. Si vous devez faire le trajet en sens inverse &agrave; cause de l&rsquo;oubli d&rsquo;un de vos documents administratifs, vous pourrez rater votre vol et&nbsp; donc perdre en temps et en finance. Ne vous faites pas avoir ! R&eacute;fl&eacute;chissez &agrave; votre destination et pensez TOUJOURS &agrave; prendre d&rsquo;abord vos documents administratifs.</span></p>\r\n<h3><strong>2 . Savoir se rep&eacute;rer</strong></h3>\r\n<p><span style=\"font-weight: 400;\">Lorsque vous voyagez seul, vous avez doublement conscience des risques que vous prenez et vos sens sont bien plus aiguis&eacute;s. Voyager seul est un excellent moyen de faire travailler votre sens du rep&eacute;rage : comment vous retrouver lorsque vous quittez d&rsquo;un point A &agrave; un point B ; comment revenir &agrave; votre h&ocirc;tel ou maison d&rsquo;h&ocirc;te etc. Il est important de savoir o&ugrave; vous marcher et comment vous marcher, conna&icirc;tre les lieux aux alentours, les noms des caf&eacute;s&hellip;</span></p>\r\n<h3><strong>3 . Etre ouvert d&rsquo;esprit</strong></h3>\r\n<p><span style=\"font-weight: 400;\">Sachez faire la diff&eacute;rence entre ce que vous voyez et ce qui vous semble politiquement correcte, rebutant ou choquant car les actions pos&eacute;es ont des significations diff&eacute;rentes selon le pays o&ugrave; elles ont lieu.&nbsp;&nbsp;</span></p>\r\n<h3><strong>4 . Conna&icirc;tre le code vestimentaire du pays h&ocirc;te.</strong></h3>\r\n<p><span style=\"font-weight: 400;\">Il est des pays o&ugrave; le port du short est interdit pour entrer &agrave; l&rsquo;a&eacute;roport, pour se rendre dans certains lieux.&nbsp; Avant de d&eacute;cider de faire votre valise, renseignez vous sur le pays dans lequel vous vous rendez, cela &eacute;vitera des surprises d&eacute;sobligeantes.</span></p>\r\n<h3><strong>5 . Conna&icirc;tre les r&egrave;gles du pays h&ocirc;te.</strong></h3>\r\n<p><span style=\"font-weight: 400;\">Certains pays ont des r&egrave;gles de biens&eacute;ance, de savoir vivre et bien qu&rsquo;ils soient au courant que le tourisme fait partie de leur politique, ils restent bien moins r&eacute;ceptifs &agrave; ceux qui abusent sous pr&eacute;texte qu&rsquo;ils sont touristes. Effectivement, &ecirc;tre touriste c&rsquo;est se comporter comme un touriste mais avant tout respecter le pays hospitalier.&nbsp; Ex : une personne qui se rend dans un lieu saint mal v&ecirc;tu ou qui d&eacute;cide de cracher par terre peut faire face &agrave; des sanctions.</span></p>\r\n<h3><strong>6 . Conna&icirc;tre ses droits</strong></h3>\r\n<p><span style=\"font-weight: 400;\">En tant que touriste &eacute;tranger, il est important de conna&icirc;tre ses droits mais surtout de conna&icirc;tre ceux qui s&rsquo;appliquent au pays que nous d&eacute;cidons de d&eacute;couvrir.</span></p>\r\n<h3><strong>7 . Conna&icirc;tre les us et coutumes dudit pays.</strong></h3>\r\n<p><span style=\"font-weight: 400;\">Visiter un pays c&rsquo;est savoir ce &agrave; quoi l&rsquo;on s&rsquo;expose et c&rsquo;est &eacute;viter d&rsquo;attirer les mauvais regards sur nous. De ce fait, il est important de savoir ce qui est raisonnable ou non aupr&egrave;s des autochtones. Il se pourrait que vous arriviez dans un pays et que vous ne traverserez m&ecirc;me pas la fronti&egrave;re &agrave; cause d&rsquo;un petit d&eacute;tail que vous ignoriez.</span></p>\r\n<h3><strong>8 . Conna&icirc;tre la langue parl&eacute;e dans le pays et les d&eacute;riv&eacute;es.</strong></h3>\r\n<p><span style=\"font-weight: 400;\">De nos jours, nous n&rsquo;avons plus besoin de parler couramment la langue d&rsquo;un pays quelconque car le digital gr&acirc;ce &agrave; son expansion nous aide bien &agrave; ce niveau. Ceci dit, il est important de savoir quelle langue est parl&eacute;e ainsi que ses d&eacute;riv&eacute;es et en retenir quelques mots fondamentaux afin de ne pas se retrouver l&eacute;ser.</span></p>\r\n<h3><strong>9 . Avoir un bon GPS et une bonne carte.</strong></h3>\r\n<p><span style=\"font-weight: 400;\">A l&rsquo;&egrave;re du Digital la connexion est de rigueur. Vous pouvez cependant, vous retrouver &agrave; court de batteries dans des zones o&ugrave; la fibre ne passe pas bien sinon pas du tout, &agrave; ce moment il faudrait que vous ayez sur vous une carte manuscrite afin de bien vous orienter.</span></p>\r\n<h3><strong>10 . Se renseigner aupr&egrave;s des agences de tourisme sur les endroits &agrave; visiter</strong></h3>\r\n<p>Si vous visitez un pays, apprenez &agrave; vous rendre dans des agences de tourisme car elles poss&egrave;dent des listes v&eacute;rifi&eacute;es et reconnues par l\'&Eacute;tat sur les diff&eacute;rents lieux qu&rsquo;il est possible de visiter en toute s&eacute;curit&eacute;.</p>\r\n<h3><strong>11 . Conna&icirc;tre o&ugrave; est situ&eacute;e son ambassade.</strong></h3>\r\n<p><span style=\"font-weight: 400;\">Il est tr&egrave;s important de savoir o&ugrave; se situe votre ambassade dans un pays quelle que soit la dur&eacute;e de votre s&eacute;jour car l&rsquo;ambassade repr&eacute;sente pour vous une assurance quant &agrave; votre retour dans votre pays d&rsquo;origine en cas de litige.</span></p>\r\n<h3><strong>12 . Savoir quels sont les endroits &agrave; &eacute;viter.</strong></h3>\r\n<p><span style=\"font-weight: 400;\">Si vous avez d&eacute;j&agrave; envisag&eacute; d&rsquo;effectuer un voyage, vous vous &ecirc;tes s&ucirc;rement ru&eacute;s sur les avis des internautes et sur les diff&eacute;rents &laquo; on dit &raquo;. Et bien, vous avez raison car quoi de plus naturel que de savoir o&ugrave; nous mettons les pieds ? Si vous avez l&rsquo;habitude de vous laissez guider par le vent, sachez qu&rsquo;il y a des endroits dans chaque pays o&ugrave; il est dangereux de mettre les pieds na&iuml;vement et le fait d&rsquo;&ecirc;tre touriste ne vous exemptera pas.</span></p>\r\n<h3><strong>13 . Conna&icirc;tre les appartenances du pays (racisme, religion, tol&eacute;rance).</strong></h3>\r\n<p><span style=\"font-weight: 400;\">Il existe des pays o&ugrave; le racisme est pr&eacute;sent mais camoufl&eacute; comme d\'autres o&ugrave; il est clairement perceptible. Il est important d&rsquo;apprendre &agrave; regarder au-del&agrave; de cela mais il est aussi fortement conseill&eacute; de ne pas prendre cela &agrave; la l&eacute;g&egrave;re et de savoir s&rsquo;il est vraiment n&eacute;cessaire de s&rsquo;y rendre. De m&ecirc;me que pour la religion il faut savoir quelles sont leurs croyances et si vous avez le droit de manifester la v&ocirc;tre.</span></p>\r\n<h3><strong>14 . Avoir des esp&egrave;ces sur soi</strong></h3>\r\n<p><span style=\"font-weight: 400;\">Vous ne pouvez voyager et faire confiance &agrave; votre carte bleue. Ayez des billets de monnaie locales sur vous pour ne pas vous retrouver dans un impr&eacute;vu et ne pas pouvoir g&eacute;rer. Ayez une monnaie passe partout &eacute;galement en cas de d&eacute;part pr&eacute;cipit&eacute;.</span></p>\r\n<h3><strong>15 . Conna&icirc;tre le commissariat ou l&rsquo;h&ocirc;pital le plus proche.</strong></h3>\r\n<p><span style=\"font-weight: 400;\">Si vous savez o&ugrave; vous &ecirc;tes (h&ocirc;tel), vous devriez savoir quels sont les services les plus pratiques dont vous aurez besoin en cas d&rsquo;urgence, de plaintes ou de forces majeures.</span></p>\r\n<h3><strong>16 . Conna&icirc;tre ses allergies ou intol&eacute;rances.</strong></h3>\r\n<p><span style=\"font-weight: 400;\">Il est important de faire un test allergologique avant de voyager car le corps humain &eacute;volue et d&eacute;veloppe de nouvelles facettes constamment. Vous pouvez r&eacute;sider dans un pays ou le pollen n&rsquo;existe pas, faire une allergie au pollen en arrivant dans votre pays de visite et ne pas savoir comment r&eacute;agir.</span></p>\r\n<h3><strong>17 . Pr&eacute;voir une trousse &agrave; pharmacie.</strong></h3>\r\n<p><span style=\"font-weight: 400;\">Si vous voyagez, vous devez pr&eacute;voir une trousse &agrave; pharmacie car vous pourrez &ecirc;tre confront&eacute;s &agrave; une situation improbable et ne pas pouvoir obtenir de l&rsquo;aide de suite (quelqu&rsquo;un pour se rendre en pharmacie ou vous obtenir le m&eacute;dicament ad&eacute;quat dans votre h&ocirc;tel ou en zone retir&eacute;e). Il est pr&eacute;f&eacute;rable de conna&icirc;tre son corps, de savoir o&ugrave; on se rend et de se pr&eacute;parer en condition.</span></p>\r\n<h3><strong>18 . Avoir des appareils fiables, efficaces et durables en autonomie.</strong></h3>\r\n<p><span style=\"font-weight: 400;\">Voyager c&rsquo;est se pr&eacute;parer en tout et de nos jours un bon voyage c&rsquo;est aussi de bons appareils avec une bonne autonomie pour capturer des moments inoubliables.</span></p>\r\n<h3><strong>19 . Avoir du savoir vivre</strong></h3>\r\n<p><span style=\"font-weight: 400;\">Lorsque vous voyagez seul, oubliez le &laquo; moi je &raquo; fonctionnez plut&ocirc;t en &laquo; ah oui ? Pourquoi pas ?&raquo; car voyager c&rsquo;est se d&eacute;couvrir et pour le faire, il faut parfois oublier qui nous sommes et comment nous fonctionnons la plupart du temps.</span></p>\r\n<h3><strong>20 . Savoir tenir sa langue/ prudence</strong></h3>\r\n<p><span style=\"font-weight: 400;\">Si vous voyagez en solo, il faut apprendre &agrave; tenir votre langue. L&rsquo;objectif est de vous amuser faire des rencontres, des d&eacute;couvertes et pas vous retrouver dans des conflits ou incompr&eacute;hensions &agrave; cause de vos dires qui j&rsquo;en suis s&ucirc;re ne partaient pas d&rsquo;une mauvaise intention.</span></p>\r\n<h3><strong>21 . Savoir respecter l&rsquo;environnement</strong></h3>\r\n<p><span style=\"font-weight: 400;\">Apprenez &agrave; respecter l&rsquo;environnement et vivre au rythme du lieu que vous visitez. Ceci est tr&egrave;s important, cela montrera votre implication pour un environnement durable.</span></p>\r\n<h3><strong>22 . Avoir ses Vaccins &agrave; jour.</strong></h3>\r\n<p><span style=\"font-weight: 400;\">Renseignez vous sur les maladies qui courent dans le pays o&ugrave; vous allez et mettez &agrave; jour vos vaccins s&rsquo;il y a lieu car ce serait dommage de commencer sinon finir votre s&eacute;jour aux urgences.</span></p>\r\n<h3><strong>23 . Ma&icirc;triser le droit international</strong></h3>\r\n<p><span style=\"font-weight: 400;\">Ma&icirc;triser le droit international et les &eacute;changes qui lient votre pays d&rsquo;origine &agrave; votre pays de visite pourra vous aider durant vos diff&eacute;rents d&eacute;placements ou autres. Il est tr&egrave;s important de savoir ce que le droit international vous autorise ou pas &agrave; faire.</span></p>\r\n<h3><strong>24 . Savoir sympathiser</strong></h3>\r\n<p><span style=\"font-weight: 400;\">R&eacute;ussir son voyage solo c&rsquo;est savoir faire de belles rencontres le temps d&rsquo;une vir&eacute;e, d&rsquo;un &eacute;v&egrave;nement ou d&rsquo;un repas.</span></p>\r\n<h3><strong>25 . Savoir donner des nouvelles &agrave; son entourage</strong></h3>\r\n<p><span style=\"font-weight: 400;\">&Ecirc;tre solitaire ne signifie pas &ecirc;tre imprudent. Lorsque vous faites une activit&eacute;, vous vous d&eacute;placez ou vous quittez la ville source pour des coins plus retir&eacute;s, sachez pr&eacute;venir vos proches, donnez leur de vos nouvelles car on ne sait jamais. &Ecirc;tre joignable c&rsquo;est la base car vous n&rsquo;&ecirc;tes pas seuls.</span></p>\r\n<h3><strong>26 . Tracer son itin&eacute;raire.</strong></h3>\r\n<p><span style=\"font-weight: 400;\">Afin de ne pas vous perdre et au final ne pas pouvoir tout faire, il est mieux de pr&eacute;parer votre itin&eacute;raire. Savoir par exemple quelles sont les activit&eacute;s qui se situent dans un m&ecirc;me p&eacute;rim&egrave;tre, la faisabilit&eacute;&hellip;</span></p>\r\n<h3><strong>27 . Savoir s&rsquo;organiser</strong></h3>\r\n<p><span style=\"font-weight: 400;\">L&rsquo;organisation c&rsquo;est la base. Un temps de repos, un temps pour soi, un temps pour s&rsquo;amuser, un temps pour visiter.&nbsp; Gr&acirc;ce &agrave; une bonne organisation, on passe de meilleurs moments.</span></p>\r\n<h3><strong>28 . Pr&eacute;parer une bonne Playlist</strong></h3>\r\n<p><span style=\"font-weight: 400;\">S&eacute;lectionnez les chansons qui vous font du bien, celles qui vous permettent de dormir et celles qui vous redonnent de l&rsquo;&eacute;nergie. Une bonne playlist c&rsquo;est une meilleure ambiance, une meilleure ouverture et de la bonne humeur.</span></p>\r\n<h3><strong>29 . Prendre le temps de bien se reposer</strong></h3>\r\n<p><span style=\"font-weight: 400;\">N&rsquo;oubliez pas de vous reposer. Il est important de se reposer pour mieux passer ses activit&eacute;s, tenir la journ&eacute;e ou supporter les humeurs des personnes autour ainsi que les difficult&eacute;s.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Soyez vous-m&ecirc;me ! Rentacs vous donne les astuces et les conseils pour ne pas vous retrouver dans des situations d&eacute;sobligeantes mais les bonnes situations les meilleures souvenirs et les rencontres que vous ferez, celles que vous d&eacute;ciderez de faire perdurer, celles en qui vous ferez confiance durant votre p&eacute;riple ne d&eacute;pendra que de vous m&ecirc;me.</span></p>\r\n<p><span style=\"font-weight: 400;\">La meilleure astuce que notre &eacute;quipe puisse vous donner c&rsquo;est de respirer un grand coup, mettre en avant votre personnalit&eacute; et vous laisser guider selon vos aspirations, vos passions et selon ce qui vous fait envie. Soyez vous m&ecirc;me car c&rsquo;est le restant que vous vous d&eacute;couvrirez encore plus, que vous en sortirez grandi et vous pourriez &ecirc;tre &eacute;tonn&eacute; de d&eacute;couvrir en vous des talents, des ma&icirc;trises de soi ou des actions inconnues sinon improbables jusqu\'&agrave; lors.</span></p>\r\n<p><span style=\"font-weight: 400;\">Surtout ne l&rsquo;oubliez pas c&rsquo;est en voyageant seul que l&rsquo;on apprend &agrave; savoir qui nous sommes, ce que nous tol&eacute;rons, ce que nous respectons et jusqu&rsquo;o&ugrave; nous sommes capable de nous d&eacute;passer. Voyagez, voyagez, voyagez car chaque voyage est une nouvelle occasion de se d&eacute;couvrir, de s&rsquo;&eacute;vader et de faire le plein pour l&rsquo;ann&eacute;e en cours, qu&rsquo;il s&rsquo;agisse des cours, du travail ou d&rsquo;une activit&eacute; qui n&eacute;cessite de se d&eacute;penser quotidiennement sans grande possibilit&eacute; d&rsquo;&eacute;panouissement, de d&eacute;couvertes et surtout d&rsquo;a&eacute;ration de l&rsquo;intellect.</span></p>'),
(20, 30, 'en', 'Voyage à Agadir, les choses à ne pas rater en 2021', '<p><span style=\"font-weight: 400;\">Commun&eacute;ment appel&eacute;e la ville touristique, Agadir fait partie des villes les plus visit&eacute;es au Maroc. Qu&rsquo;il s&rsquo;agisse des touristes, des r&eacute;sidents au Maroc, ou encore des autochtones, elle reste incontournable lorsqu&rsquo;il s&rsquo;agit des lieux &agrave; ne pas rater durant son s&eacute;jour dans le royaume. De ce fait, quelles sont les choses &agrave; ne pas rater une fois dans la ville d&rsquo;Agadir qui s&rsquo;&eacute;tend sur pr&egrave;s de 2297km2 ?&nbsp; Rentacs Tours vous propose 5 endroits incontournables &agrave; visiter.</span></p>\r\n<p>&nbsp;</p>\r\n<p><strong>Agadir, les incontournables</strong></p>\r\n<ol>\r\n<li>\r\n<h3><span style=\"font-weight: 400;\">Crocoparc Agadir, Jardin botanique et parc animalier.</span></h3>\r\n</li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">Crocoparc par son nom nous conduit tout droit dans le monde des crocodiles du Nil avec plus de 325 pensionnaires. Il fut cr&eacute;&eacute; en Mai 2015 afin de pouvoir admirer la beaut&eacute; des crocodiles mais pas qu&rsquo;eux ; il compte aussi en son sein d&rsquo;autres reptiles tels que : des tortues g&eacute;antes, des pythons g&eacute;ants, des iguanes verts, des anacondas et des ouistitis &agrave; pinceaux blancs. Etendu sur une superficie de 4 hectares, vous ne pourrez sortir de ce parc qu&rsquo;avec une connaissance approfondie sur ces reptiles. On n&rsquo;en ressort qu&rsquo;avec des &eacute;toiles plein les yeux et la t&ecirc;te charg&eacute;e de connaissances. Ainsi, Rentacs Tours vous invite &agrave; vous y rendre par curiosit&eacute; ou par fanatisme pour les reptiles, vous ne serez pas d&eacute;&ccedil;u. Il est situ&eacute; en p&eacute;riph&eacute;rie d\'Agadir, sur la commune de Drargua, le long de la route nationale 8 en direction de Marrakech.</span></p>\r\n<ol start=\"2\">\r\n<li>\r\n<h3><span style=\"font-weight: 400;\">Agadir Camel Wide</span><span style=\"font-weight: 400;\"> <br /></span></h3>\r\n</li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">Un incontournable en visitant cette ville est de pouvoir se balader &agrave; dos de chameaux que ce soit sur la plage de sable dor&eacute;e ou en escaladant les collines d&rsquo;Agadir Oufella. Cette balade de deux heures (2) vous permettra d&rsquo;admirer cette ville, de voir de haut ses sites spectaculaires et vous fera d&eacute;couvrir les sentiers anciens vous plongeant ainsi dans les traditions marocaines.</span><span style=\"font-weight: 400;\">&nbsp;</span></p>\r\n<ol start=\"3\">\r\n<li>\r\n<h3><span style=\"font-weight: 400;\">Vall&eacute;e du paradis</span></h3>\r\n</li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">La vall&eacute;e du paradis a &eacute;t&eacute; rendue c&eacute;l&egrave;bre par une l&eacute;gende populaire affirmant que l&rsquo;eau de la source qui la parcourt aurait des vertus th&eacute;rapeutiques. De cette vall&eacute;e vous aurez droit &agrave; un paysage magnifique qui vous mettra en extase. Pour la vall&eacute;e du paradis, il faudrait pr&eacute;voir une demi-journ&eacute;e car c&rsquo;est sur une longueur de 30 km que s&rsquo;&eacute;tendent ses diff&eacute;rents paysages.</span></p>\r\n<ol start=\"4\">\r\n<li>\r\n<h3><span style=\"font-weight: 400;\">Agadir, Sahara Trip</span></h3>\r\n</li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">Gr&acirc;ce &agrave; cette compagnie, le Sahara n&rsquo;aura plus de secret pour vous. Vous commencerez par d&eacute;couvrir Agadir et vous terminerez au beau milieu du d&eacute;sert du Sahara. Une exp&eacute;rience unique que vous n&rsquo;oublierez jamais. Faites-y un tour afin de pouvoir jouir de leur exp&eacute;rience, des meilleurs endroits &agrave; visiter et &agrave; d&eacute;couvrir afin de ne point vous perdre dans vos recherches d&rsquo;activit&eacute;s &agrave; faire durant votre s&eacute;jour &agrave; Agadir.</span></p>\r\n<ol start=\"5\">\r\n<li>\r\n<h3><span style=\"font-weight: 400;\">Inezgane</span></h3>\r\n</li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">Cette petite ville mitoyenne d&rsquo;Agadir, dans la vall&eacute;e du Souss, est un circuit commercial compos&eacute; majoritairement de march&eacute;s. Inezgane est sans aucun doute un excellent endroit pour s&rsquo;acheter des souvenirs, faire de bonnes affaires et d&eacute;couvrir un peu plus la culture marocaine.</span></p>\r\n<p><span style=\"font-weight: 400;\">Vous y trouverez de tout ! Des fruits aux bijoux traditionnels berb&egrave;re en passant par des articles en cuir, nous sommes certains que vous ne pourrez vous y rendre et repartir de l&agrave; sans avoir rempli votre sac d&rsquo;objets souvenirs et fait le plein de babioles qui trouveront une place de choix chez vous, au bureau ou encore dans votre routine quotidienne. En plus de cela, vous pourrez visiter le village d&rsquo;Imouzzer des Ida Outanane qui est principalement habit&eacute; par des Berb&egrave;res.</span></p>\r\n<ol start=\"6\">\r\n<li>\r\n<h3><span style=\"font-weight: 400;\">Douar Imi Ouknari</span></h3>\r\n</li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">Douar Imi Ouknari est une petite zone qui se trouve pr&egrave;s d&rsquo;Agadir. Imi Ouknari est une petite plage tr&egrave;s propre et conviviale o&ugrave; vous verrez de petites vagues s&rsquo;&eacute;craser lentement sur la plage.</span></p>\r\n<p><span style=\"font-weight: 400;\">A imi Ouknari,&nbsp; le sable est fin, dor&eacute; et en m&ecirc;me temps l&eacute;ger, tellement qu&rsquo;on se croirait aux Maldives. Elle se trouve sur la route Nationale N1. Vous pourrez s&eacute;journer &agrave; Taghazout ou &agrave; Tamri &agrave; moindre co&ucirc;t (400 pour un appartement de 6 chambres).</span></p>\r\n<ol start=\"7\">\r\n<li>\r\n<h3><span style=\"font-weight: 400;\"> &nbsp; </span> <span style=\"font-weight: 400;\">Agadir Dolphin World</span></h3>\r\n</li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">Pour les amoureux des animaux marins, vous pourrez trouver votre plaisir au parc des dauphins. Ces c&eacute;tac&eacute;s &agrave; la forme ovale vous feront l&rsquo;honneur de vous accueillir dans leur monde afin de vous proposer l&rsquo;un des spectacles les plus amusants et attrayants que vous aurez &agrave; voir. Ne vous en privez pas, ils vous attendent sur le front de mer Anza pour vous faire voyager dans le monde marin.</span><span style=\"font-weight: 400;\">&nbsp;</span></p>\r\n<ol start=\"8\">\r\n<li>\r\n<h3><span style=\"font-weight: 400;\"> Sol House Taghazout bay- Surf</span></h3>\r\n</li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">Cet h&ocirc;tel situ&eacute; sur la plage de Taghazout au bord de l&rsquo;oc&eacute;an Atlantique avec ses installations luxueuses vous offre le cadre et les modalit&eacute;s pour vous reposer au gr&eacute; du son des vagues mais aussi un espace pour vous amuser en famille et vous adonner &agrave; votre passion de surfeur si vous en&nbsp; &ecirc;tes un bien &eacute;videmment</span></p>\r\n<p><span style=\"font-weight: 400;\">&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">OFFRE &Agrave; NE PAS RATER ! ON VOUS EN DIT PLUS.</span></p>\r\n<p><span style=\"font-weight: 400;\">&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Rentacs Tours, vous donne la possibilit&eacute; de passer des instants inoubliables gr&acirc;ce &agrave; son &laquo; offre Sol&nbsp; House Taghazout Bay- Surf &raquo;.&nbsp; Si vous r&eacute;servez des maintenant vous aurez droit &agrave; des avantages Sol House jusqu&rsquo;au 31/03/20 &agrave; savoir : Un cours de surf Stand Up Paddle o Kayak gratuit par s&eacute;jour ; un acc&egrave;s au Sauna Gratuit, un acc&egrave;s gratuit &agrave; la salle de Gym Tadenga Surf Village &agrave; tout moment de la journ&eacute;e comme de la nuit et bien s&ucirc;re une remise de 20% sur les activit&eacute;s du Tadenga Surf Village.</span></p>\r\n<p><span style=\"font-weight: 400;\">&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Gr&acirc;ce &agrave; Rentacs Tours, vous avez des tarifs sp&eacute;ciaux dans le cadre de l&rsquo;offre Sol House Taghazout Bay- Surf. En effet, vous pouvez r&eacute;sider dans notre house&nbsp; Bungalow Double pour seulement 795 DHS/nuit. L&rsquo;offre est valable pour 2 adultes avec petit d&eacute;jeuner offert. Si vous &ecirc;tes en famille, nous vous proposons plut&ocirc;t notre Big House Bungalow &agrave; seulement 990 Dhs/nuit pour 2 adultes et 2 enfants de moins de 12 ans. Pour cette offre aussi le petit d&eacute;jeuner est offert par l&rsquo;h&ocirc;tel.</span></p>\r\n<p><span style=\"font-weight: 400;\">&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">R&eacute;servez d&egrave;s maintenant votre voyage et rendez-vous &agrave; Agadir !</span></p>');
INSERT INTO `post_translations` (`id`, `post_id`, `locale`, `title`, `content`) VALUES
(21, 30, 'fr', 'Voyage à Agadir, les choses à ne pas rater en 2021', '<p><span style=\"font-weight: 400;\">Commun&eacute;ment appel&eacute;e la ville touristique, Agadir fait partie des villes les plus visit&eacute;es au Maroc. Qu&rsquo;il s&rsquo;agisse des touristes, des r&eacute;sidents au Maroc, ou encore des autochtones, elle reste incontournable lorsqu&rsquo;il s&rsquo;agit des lieux &agrave; ne pas rater durant son s&eacute;jour dans le royaume. De ce fait, quelles sont les choses &agrave; ne pas rater une fois dans la ville d&rsquo;Agadir qui s&rsquo;&eacute;tend sur pr&egrave;s de 2297km2 ?&nbsp; Rentacs Tours vous propose 5 endroits incontournables &agrave; visiter.</span></p>\r\n<h2><strong>Agadir, les incontournables</strong></h2>\r\n<ol>\r\n<li>\r\n<h3><strong>Crocoparc Agadir, Jardin botanique et parc animalier.</strong></h3>\r\n</li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">Crocoparc par son nom nous conduit tout droit dans le monde des crocodiles du Nil avec plus de 325 pensionnaires. Il fut cr&eacute;&eacute; en Mai 2015 afin de pouvoir admirer la beaut&eacute; des crocodiles mais pas qu&rsquo;eux ; il compte aussi en son sein d&rsquo;autres reptiles tels que : des tortues g&eacute;antes, des pythons g&eacute;ants, des iguanes verts, des anacondas et des ouistitis &agrave; pinceaux blancs. Etendu sur une superficie de 4 hectares, vous ne pourrez sortir de ce parc qu&rsquo;avec une connaissance approfondie sur ces reptiles. On n&rsquo;en ressort qu&rsquo;avec des &eacute;toiles plein les yeux et la t&ecirc;te charg&eacute;e de connaissances. Ainsi, Rentacs Tours vous invite &agrave; vous y rendre par curiosit&eacute; ou par fanatisme pour les reptiles, vous ne serez pas d&eacute;&ccedil;u. Il est situ&eacute; en p&eacute;riph&eacute;rie d\'Agadir, sur la commune de Drargua, le long de la route nationale 8 en direction de Marrakech.</span></p>\r\n<ol start=\"2\">\r\n<li>\r\n<h3><strong>Agadir Camel Wide</strong><span style=\"font-weight: 400;\"> <br /></span></h3>\r\n</li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">Un incontournable en visitant cette ville est de pouvoir se balader &agrave; dos de chameaux que ce soit sur la plage de sable dor&eacute;e ou en escaladant les collines d&rsquo;Agadir Oufella. Cette balade de deux heures (2) vous permettra d&rsquo;admirer cette ville, de voir de haut ses sites spectaculaires et vous fera d&eacute;couvrir les sentiers anciens vous plongeant ainsi dans les traditions marocaines.</span><span style=\"font-weight: 400;\">&nbsp;</span></p>\r\n<ol start=\"3\">\r\n<li>\r\n<h3><strong>Vall&eacute;e du paradis</strong></h3>\r\n</li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">La vall&eacute;e du paradis a &eacute;t&eacute; rendue c&eacute;l&egrave;bre par une l&eacute;gende populaire affirmant que l&rsquo;eau de la source qui la parcourt aurait des vertus th&eacute;rapeutiques. De cette vall&eacute;e vous aurez droit &agrave; un paysage magnifique qui vous mettra en extase. Pour la vall&eacute;e du paradis, il faudrait pr&eacute;voir une demi-journ&eacute;e car c&rsquo;est sur une longueur de 30 km que s&rsquo;&eacute;tendent ses diff&eacute;rents paysages.</span></p>\r\n<ol start=\"4\">\r\n<li>\r\n<h3><strong>Agadir, Sahara Trip</strong></h3>\r\n</li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">Gr&acirc;ce &agrave; cette compagnie, le Sahara n&rsquo;aura plus de secret pour vous. Vous commencerez par d&eacute;couvrir Agadir et vous terminerez au beau milieu du d&eacute;sert du Sahara. Une exp&eacute;rience unique que vous n&rsquo;oublierez jamais. Faites-y un tour afin de pouvoir jouir de leur exp&eacute;rience, des meilleurs endroits &agrave; visiter et &agrave; d&eacute;couvrir afin de ne point vous perdre dans vos recherches d&rsquo;activit&eacute;s &agrave; faire durant votre s&eacute;jour &agrave; Agadir.</span></p>\r\n<ol start=\"5\">\r\n<li>\r\n<h3><strong>Inezgane</strong></h3>\r\n</li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">Cette petite ville mitoyenne d&rsquo;Agadir, dans la vall&eacute;e du Souss, est un circuit commercial compos&eacute; majoritairement de march&eacute;s. Inezgane est sans aucun doute un excellent endroit pour s&rsquo;acheter des souvenirs, faire de bonnes affaires et d&eacute;couvrir un peu plus la culture marocaine.</span></p>\r\n<p><span style=\"font-weight: 400;\">Vous y trouverez de tout ! Des fruits aux bijoux traditionnels berb&egrave;re en passant par des articles en cuir, nous sommes certains que vous ne pourrez vous y rendre et repartir de l&agrave; sans avoir rempli votre sac d&rsquo;objets souvenirs et fait le plein de babioles qui trouveront une place de choix chez vous, au bureau ou encore dans votre routine quotidienne. En plus de cela, vous pourrez visiter le village d&rsquo;Imouzzer des Ida Outanane qui est principalement habit&eacute; par des Berb&egrave;res.</span></p>\r\n<ol start=\"6\">\r\n<li>\r\n<h3><strong>Douar Imi Ouknari</strong></h3>\r\n</li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">Douar Imi Ouknari est une petite zone qui se trouve pr&egrave;s d&rsquo;Agadir. Imi Ouknari est une petite plage tr&egrave;s propre et conviviale o&ugrave; vous verrez de petites vagues s&rsquo;&eacute;craser lentement sur la plage.</span></p>\r\n<p><span style=\"font-weight: 400;\">A imi Ouknari,&nbsp; le sable est fin, dor&eacute; et en m&ecirc;me temps l&eacute;ger, tellement qu&rsquo;on se croirait aux Maldives. Elle se trouve sur la route Nationale N1. Vous pourrez s&eacute;journer &agrave; Taghazout ou &agrave; Tamri &agrave; moindre co&ucirc;t (400 pour un appartement de 6 chambres).</span></p>\r\n<ol start=\"7\">\r\n<li>\r\n<h3><strong>Agadir Dolphin World</strong></h3>\r\n</li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">Pour les amoureux des animaux marins, vous pourrez trouver votre plaisir au parc des dauphins. Ces c&eacute;tac&eacute;s &agrave; la forme ovale vous feront l&rsquo;honneur de vous accueillir dans leur monde afin de vous proposer l&rsquo;un des spectacles les plus amusants et attrayants que vous aurez &agrave; voir. Ne vous en privez pas, ils vous attendent sur le front de mer Anza pour vous faire voyager dans le monde marin.</span><span style=\"font-weight: 400;\">&nbsp;</span></p>\r\n<ol start=\"8\">\r\n<li>\r\n<h3><strong> Sol House Taghazout bay- Surf</strong></h3>\r\n</li>\r\n</ol>\r\n<p><span style=\"font-weight: 400;\">Cet h&ocirc;tel situ&eacute; sur la plage de Taghazout au bord de l&rsquo;oc&eacute;an Atlantique avec ses installations luxueuses vous offre le cadre et les modalit&eacute;s pour vous reposer au gr&eacute; du son des vagues mais aussi un espace pour vous amuser en famille et vous adonner &agrave; votre passion de surfeur si vous en&nbsp; &ecirc;tes un bien &eacute;videmment</span></p>\r\n<p><span style=\"font-weight: 400;\">OFFRE &Agrave; NE PAS RATER ! ON VOUS EN DIT PLUS.</span></p>\r\n<p><span style=\"font-weight: 400;\">Rentacs Tours, vous donne la possibilit&eacute; de passer des instants inoubliables gr&acirc;ce &agrave; son &laquo; offre Sol&nbsp; House Taghazout Bay- Surf &raquo;.&nbsp; Si vous r&eacute;servez des maintenant vous aurez droit &agrave; des avantages Sol House jusqu&rsquo;au 31/03/20 &agrave; savoir : Un cours de surf Stand Up Paddle o Kayak gratuit par s&eacute;jour ; un acc&egrave;s au Sauna Gratuit, un acc&egrave;s gratuit &agrave; la salle de Gym Tadenga Surf Village &agrave; tout moment de la journ&eacute;e comme de la nuit et bien s&ucirc;re une remise de 20% sur les activit&eacute;s du Tadenga Surf Village.</span></p>\r\n<p><span style=\"font-weight: 400;\">Gr&acirc;ce &agrave; Rentacs Tours, vous avez des tarifs sp&eacute;ciaux dans le cadre de l&rsquo;offre Sol House Taghazout Bay- Surf. En effet, vous pouvez r&eacute;sider dans notre house&nbsp; Bungalow Double pour seulement 795 DHS/nuit. L&rsquo;offre est valable pour 2 adultes avec petit d&eacute;jeuner offert. Si vous &ecirc;tes en famille, nous vous proposons plut&ocirc;t notre Big House Bungalow &agrave; seulement 990 Dhs/nuit pour 2 adultes et 2 enfants de moins de 12 ans. Pour cette offre aussi le petit d&eacute;jeuner est offert par l&rsquo;h&ocirc;tel.</span></p>\r\n<p><span style=\"font-weight: 400;\">R&eacute;servez d&egrave;s maintenant votre voyage et rendez-vous &agrave; Agadir !</span></p>');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `title_id` int(11) NOT NULL DEFAULT '1',
  `gender_id` int(11) NOT NULL DEFAULT '1',
  `sur_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci,
  `photo` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `title_id`, `gender_id`, `sur_name`, `first_name`, `phone_number`, `address`, `photo`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'Travel', 'Portal', '09090909090', 'Address', '', '2021-01-28 09:14:55', '2021-02-15 16:39:26'),
(2, 2, 1, 1, 'First', 'Portal', '09090111111', 'Travel portal agent shop at that place', '', '2021-01-28 09:14:55', '2021-01-28 09:14:55'),
(3, 3, 1, 1, 'First', 'Test', '09090222222', 'First test customer', '', '2021-01-28 09:14:55', '2021-01-28 09:14:55'),
(4, 4, 1, 1, 'Lb', 'zakaria', '09090444444', 'everywhere', '', '2021-01-28 09:14:55', '2021-02-12 15:50:12'),
(5, 10, 1, 1, 'Kiki', 'zakaria', '66666666', '', NULL, '2021-02-05 10:30:32', '2021-02-05 10:30:32'),
(6, 11, 1, 1, 'Bouhamidi', 'abderrahim', '0623337189', '', NULL, '2021-03-01 04:22:28', '2021-03-01 04:22:28'),
(7, 12, 1, 1, 'Kiki', 'zakaria', '6666', '', NULL, '2021-03-02 21:32:57', '2021-03-02 21:32:57'),
(10, 17, 1, 1, 'zakaria', 'labib', '000000', '', NULL, '2021-06-22 18:30:44', '2021-06-22 18:30:44');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `supplier_id` int(11) UNSIGNED NOT NULL,
  `total_qty` double NOT NULL,
  `tax` double NOT NULL,
  `total_tax` double NOT NULL,
  `total_cost` double NOT NULL,
  `grand_total` double NOT NULL,
  `paid_amount` double NOT NULL,
  `status` int(11) NOT NULL,
  `paid_by` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `document` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `payment_note` text COLLATE utf8mb4_unicode_ci,
  `staff_note` text COLLATE utf8mb4_unicode_ci,
  `is_locked` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `reference_no`, `user_id`, `supplier_id`, `total_qty`, `tax`, `total_tax`, `total_cost`, `grand_total`, `paid_amount`, `status`, `paid_by`, `payment_status`, `document`, `note`, `payment_note`, `staff_note`, `is_locked`, `created_at`, `updated_at`) VALUES
(7, '369', 1, 3, 1, 100, 4995, 10989, 9990, 21978, 1, 1, 1, '369-Absolue_Oleo_Serum_600X600.jpg', NULL, NULL, NULL, 0, '2021-03-09 16:31:44', '2021-04-02 08:55:10');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_details`
--

CREATE TABLE `purchase_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `purchase_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `qty` double NOT NULL DEFAULT '0',
  `price` double NOT NULL DEFAULT '0',
  `total` double NOT NULL DEFAULT '0',
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_details`
--

INSERT INTO `purchase_details` (`id`, `purchase_id`, `name`, `qty`, `price`, `total`, `updated_at`, `created_at`) VALUES
(21, 7, 'merceds', 5, 999, 4995, '2021-03-09', '2021-03-09');

-- --------------------------------------------------------

--
-- Table structure for table `rate_booking`
--

CREATE TABLE `rate_booking` (
  `id` int(10) UNSIGNED NOT NULL,
  `booking_id` int(10) UNSIGNED NOT NULL,
  `rate_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rate_booking`
--

INSERT INTO `rate_booking` (`id`, `booking_id`, `rate_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 132, 4, 0, NULL, NULL),
(2, 132, 5, 0, NULL, NULL),
(3, 133, 3, 5, NULL, NULL),
(4, 134, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE `returns` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(191) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `customer_id` int(11) UNSIGNED DEFAULT NULL,
  `booking_reference` varchar(255) DEFAULT NULL,
  `total_qty` double NOT NULL,
  `tax` double NOT NULL,
  `total_tax` double NOT NULL,
  `total_cost` double NOT NULL,
  `grand_total` double NOT NULL,
  `paid_amount` double NOT NULL,
  `status` int(11) NOT NULL,
  `paid_by` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `document` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text,
  `payment_note` text,
  `staff_note` text,
  `is_locked` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `returns`
--

INSERT INTO `returns` (`id`, `reference_no`, `user_id`, `customer_id`, `booking_reference`, `total_qty`, `tax`, `total_tax`, `total_cost`, `grand_total`, `paid_amount`, `status`, `paid_by`, `payment_status`, `document`, `note`, `payment_note`, `staff_note`, `is_locked`, `created_at`, `updated_at`) VALUES
(2, '25424', 1, 1, NULL, 1, 20, 256, 1280, 1536, 0, 1, 0, 2, '', NULL, NULL, NULL, 0, '2021-04-13 12:40:41', '2021-04-13 12:40:41'),
(3, '000000001', 1, 3, NULL, 1, 0, 0, 999, 999, 999, 1, 1, 3, NULL, NULL, NULL, NULL, 1, '2021-04-14 10:54:49', '2021-04-14 10:54:49');

-- --------------------------------------------------------

--
-- Table structure for table `return_details`
--

CREATE TABLE `return_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `return_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `qty` double NOT NULL DEFAULT '0',
  `price` double NOT NULL DEFAULT '0',
  `total` double NOT NULL DEFAULT '0',
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `return_details`
--

INSERT INTO `return_details` (`id`, `return_id`, `name`, `qty`, `price`, `total`, `updated_at`, `created_at`) VALUES
(4, 2, 'Mazagan Beach & Golf Resort', 1, 1280, 1280, '2021-04-13', '2021-04-13'),
(5, 3, 'Sol House Taghazout Bay Surf', 1, 999, 999, '2021-04-14', '2021-04-14');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `place_id` int(11) DEFAULT NULL,
  `offer_id` int(11) DEFAULT NULL,
  `score` float DEFAULT NULL,
  `comment` varchar(500) DEFAULT NULL,
  `status` int(2) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `place_id`, `offer_id`, `score`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 9, 3, 'avis', 1, '2021-02-15 10:20:56', '2021-02-15 10:20:56');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2021-06-17 09:47:11', '2021-06-17 09:47:11'),
(2, 'agent', 'web', '2021-06-17 09:47:11', '2021-06-17 09:47:11'),
(3, 'customer', 'web', '2021-06-17 09:47:11', '2021-06-17 09:47:11');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2);

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
(3, 3),
(10, 3),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(16, 3),
(17, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `booking_reference` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `customer_id` int(11) UNSIGNED NOT NULL,
  `total_qty` double NOT NULL,
  `tax` double NOT NULL,
  `total_tax` double NOT NULL,
  `total_price` double NOT NULL,
  `grand_total` double NOT NULL,
  `status` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `document` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `paid_by` int(11) NOT NULL,
  `payment_note` text COLLATE utf8mb4_unicode_ci,
  `note` text COLLATE utf8mb4_unicode_ci,
  `staff_note` text COLLATE utf8mb4_unicode_ci,
  `is_locked` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `reference_no`, `booking_reference`, `user_id`, `customer_id`, `total_qty`, `tax`, `total_tax`, `total_price`, `grand_total`, `status`, `payment_status`, `document`, `paid_amount`, `paid_by`, `payment_note`, `note`, `staff_note`, `is_locked`, `created_at`, `updated_at`) VALUES
(2, '000000001', NULL, 1, 3, 1, 10, 299.7, 2997, 3296.7, 1, 3, NULL, 0, 1, NULL, NULL, NULL, 1, '2021-04-14 11:06:07', '2021-04-14 11:47:22'),
(3, '2105287247688', '131200521', 1, 10, 2, 0, 0, 10038, 10038, 1, 3, NULL, 0, 1, NULL, NULL, NULL, 1, '2021-05-28 15:39:00', '2021-05-28 15:39:00');

-- --------------------------------------------------------

--
-- Table structure for table `sale_details`
--

CREATE TABLE `sale_details` (
  `id` int(10) NOT NULL,
  `sale_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `price` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_details`
--

INSERT INTO `sale_details` (`id`, `sale_id`, `name`, `qty`, `price`, `total`, `updated_at`, `created_at`) VALUES
(4, 2, 'Sol House Taghazout Bay Surf', 3, 999, 2997, '2021-04-14', '2021-04-14'),
(5, 3, 'Single Room', 1, 9538, 9538, '2021-05-28', '2021-05-28'),
(6, 3, 'Supplement', 1, 500, 500, '2021-05-28', '2021-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `val` text COLLATE utf8mb4_unicode_ci,
  `type` char(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'string',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `val`, `type`, `created_at`, `updated_at`) VALUES
(11, 'app_name', 'Yachting', 'string', '2019-12-18 06:53:47', '2021-06-21 15:35:16'),
(13, 'logo', '60d1d2285f403_1624363560.png', 'image', '2019-12-18 06:55:23', '2021-06-22 11:06:00'),
(14, 'email_system', 'info@rentacstours.com', 'string', '2019-12-21 09:18:55', '2021-02-11 18:01:36'),
(15, 'ads_sidebar_banner_link', '//www.getyourguide.com', 'string', '2019-12-21 09:18:55', '2021-04-06 13:28:12'),
(16, 'ads_sidebar_banner_image', '5e02cf9f0538b_1577242527.jpg', 'image', '2019-12-21 09:19:03', '2019-12-25 01:55:27'),
(17, 'home_description', '<p>Fond&eacute;e par deux bikers passionn&eacute;s certifi&eacute;s par HOG Harley-Davidson: Nizar CHAWAD, ancien pr&eacute;sident du HOG Chapter Casablanca, et Mohamed Ali ANOUAR, ancien secr&eacute;taire g&eacute;n&eacute;ral du HOG Chapter Casablanca. La force de Rentacs Tours repose sur la diversit&eacute; des services qu&rsquo;elle propose mais aussi et surtout sur le professionnalisme sans d&eacute;faut de son &eacute;quipe qui b&eacute;n&eacute;ficie des comp&eacute;tences manag&eacute;riales sans faille de monsieur Ali Amrani ayant &agrave; son actif plus de 18 ann&eacute;es d&rsquo;exp&eacute;riences en zones touristiques des USA.</p>', 'string', '2020-06-22 15:09:58', '2021-06-21 15:32:11'),
(18, 'mail_driver', 'smtp', 'string', '2020-06-22 15:09:58', '2020-06-22 15:09:58'),
(19, 'mail_host', 'mail.alphaboost.ma', 'string', '2020-06-22 15:09:58', '2021-04-06 13:28:11'),
(20, 'mail_port', '465', 'string', '2020-06-22 15:09:58', '2020-06-22 15:09:58'),
(21, 'mail_username', 'zlabib@alphaboost.ma', 'string', '2020-06-22 15:09:58', '2021-04-06 13:28:11'),
(22, 'mail_password', NULL, 'string', '2020-06-22 15:09:58', '2021-06-21 15:35:16'),
(23, 'mail_encryption', 'ssl', 'string', '2020-06-22 15:09:58', '2020-06-22 15:09:58'),
(24, 'mail_from_address', 'info@Yachting.com', 'string', '2020-06-22 15:09:58', '2021-06-21 15:35:16'),
(25, 'mail_from_name', 'SaintYachting', 'string', '2020-06-22 15:09:58', '2021-06-22 11:10:38'),
(26, 'facebook_app_id', NULL, 'string', '2020-06-22 15:09:58', '2020-06-22 15:09:58'),
(27, 'facebook_app_secret', NULL, 'string', '2020-06-22 15:09:58', '2020-06-22 15:09:58'),
(28, 'google_app_id', NULL, 'string', '2020-06-22 15:09:58', '2020-06-22 15:09:58'),
(29, 'google_app_secret', NULL, 'string', '2020-06-22 15:09:58', '2020-06-22 15:09:58'),
(30, 'goolge_map_api_key', 'AIzaSyCMDKyZu6-_AiLo5cxl4u_BTzu2sz3-Cfw', 'string', '2020-06-22 15:09:58', '2021-02-10 14:56:53'),
(31, 'style_rtl', '0', 'string', '2020-06-22 15:09:58', '2020-06-22 15:09:58'),
(32, 'template', '01', 'string', '2020-06-22 15:09:58', '2020-12-23 07:41:48'),
(33, 'home_banner', '602e3c048e0bd_1613642756.jpg', 'image', '2020-12-18 08:50:26', '2021-02-18 15:05:56'),
(34, 'social_facebook', '//www.facebook.com/', 'string', '2019-12-18 06:53:47', '2021-06-21 15:35:16'),
(35, 'social_youtube', '//www.youtube.com/channel/UCekzMJLctKIYMQfE-9VT3_w', 'string', '2019-12-21 09:18:55', '2021-04-06 13:28:11'),
(36, 'social_instagram', '//www.instagram.com/', 'string', '2019-12-18 06:53:47', '2021-06-21 15:35:16'),
(37, 'social_whatsapp', '#4', 'string', '2019-12-21 09:18:55', '2020-12-19 11:41:33'),
(38, 'home_email', 'info@Yachting.com', 'string', '2021-01-04 12:16:12', '2021-06-21 15:35:16'),
(39, 'home_adresse', 'Santorini, Greece', 'string', '2021-01-04 12:16:12', '2021-06-21 15:35:16'),
(40, 'home_phone', '+212 5 22 000 000', 'string', '2021-01-04 12:16:12', '2021-06-21 15:35:16'),
(41, 'footer_description', '<p>H&ocirc;tels de luxe ou auberges authentiques, Vivez un voyage de r&ecirc;ves dans les plus belles destinations soigneusement s&eacute;lectionn&eacute;es par Rentacs Tours.</p>', 'string', '2021-02-09 08:23:39', '2021-06-21 15:32:11'),
(42, 'social_linkedin', '//www.linkedin.com/company/', 'string', '2021-02-09 08:23:39', '2021-06-21 15:35:16'),
(43, 'top_navigation', NULL, 'string', '2021-02-10 16:15:11', '2021-02-11 18:01:36'),
(44, 'google_analytics_js', NULL, 'string', '2021-02-17 15:05:44', '2021-02-17 15:05:44'),
(45, 'facebook_pixel_js', NULL, 'string', '2021-02-17 15:05:44', '2021-02-17 15:05:44');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slogan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `photo`, `slogan`, `label`, `created_at`, `updated_at`) VALUES
(3, 'Best Sailing Vacations', 'slide-1624363059.jpg', 'Enjoy sailing with spectacular view', 'custom text', '2021-06-18 13:48:06', '2021-06-22 11:00:42');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `company_name`, `tax_number`, `email`, `phone_number`, `address`, `city`, `postal_code`, `country`, `created_at`, `updated_at`) VALUES
(3, 'admin', 'gfsd', '12', 'bebest@mail.com', '0666666666', 'gfsd', 'hgfd', 'hgf', 'hgd', '2021-01-14 13:34:43', '2021-01-19 11:13:53'),
(4, 'gfs', 'gfs', '1', 'z@admin.com', '6', 'casablanca', 'Casablanca', '22222', 'Maroc', '2021-01-15 13:20:31', '2021-01-19 10:48:24'),
(13, 'zakaria labib', 'Alphaboost', '55555', 'zakarialabib@gmail.com', '666', 'gfsd', 'hgfd', 'hgd', 'hgd', '2021-01-19 10:50:00', '2021-01-19 11:39:44'),
(14, 'kkkk', 'gfsd', '6666', 'zakarialabib@g.com', '6666', NULL, NULL, NULL, NULL, '2021-01-29 11:23:33', '2021-01-29 11:37:15'),
(15, 'kkkkk', 'llkk', NULL, NULL, '666666', NULL, NULL, NULL, NULL, '2021-01-29 11:28:45', '2021-01-29 11:37:01');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `content` varchar(500) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `job_title`, `avatar`, `content`, `status`, `created_at`, `updated_at`) VALUES
(10, NULL, NULL, '5ee19cf5de0ab_1591844085.jpg', NULL, 1, '2020-05-28 15:27:45', '2020-06-11 02:54:45'),
(11, NULL, NULL, '5ee19d9a2b42a_1591844250.jpg', NULL, 1, '2020-05-28 15:41:35', '2020-06-11 02:57:30'),
(12, NULL, NULL, '5ee19e4de3586_1591844429.jpg', NULL, 1, '2020-06-11 03:00:29', '2020-06-11 03:00:29');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial_translations`
--

CREATE TABLE `testimonial_translations` (
  `id` int(11) UNSIGNED NOT NULL,
  `testimonial_id` int(11) DEFAULT NULL,
  `locale` varchar(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `content` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testimonial_translations`
--

INSERT INTO `testimonial_translations` (`id`, `testimonial_id`, `locale`, `name`, `job_title`, `content`) VALUES
(3, 10, 'en', 'Kari Granleese', 'CEO Alididi', 'Really useful app to find interesting things to see do, drink and eat in new places. I’ve been using it regularly in my travels over the past few months.'),
(4, 10, 'fr', 'teststs 22222 fr', 'frrr', NULL),
(5, 11, 'en', 'Lorealdonae', 'Travellers', 'I use this app for everything!I’ m a very adventurous person so I love to try new restaurants, hair salons, even nightlife when I’m in different cities!'),
(6, 11, 'fr', 'test 1 fr', NULL, NULL),
(7, 12, 'en', 'Alexkaay', 'Local Guide', 'I adore learning about new as well as old local, especially small independent business\'. And this is just the place for doing so.');

-- --------------------------------------------------------

--
-- Table structure for table `titles`
--

CREATE TABLE `titles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `titles`
--

INSERT INTO `titles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Mr', '2021-01-28 09:16:31', '2021-01-28 09:16:31'),
(2, 'Mlle', '2021-01-28 09:16:31', '2021-01-28 09:16:31'),
(3, 'Madame', '2021-01-28 09:16:31', '2021-01-28 09:16:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_status` int(11) NOT NULL DEFAULT '0',
  `api_token` longtext COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` int(10) UNSIGNED DEFAULT NULL,
  `is_admin` int(11) DEFAULT '0',
  `photo` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `delete_status`, `api_token`, `remember_token`, `customer_id`, `is_admin`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'okofdsq', 'admin@admin.com', '0003', '$2y$10$D897.afXJqCRq5Ij5X/Ba.VXu.TM96CbjkF8CzFGVz5PA05eOV2cW', 0, '', '1LkT9kTHShxxUWN0azetFVQspx9gIsQtvPid7agn8IMsodah3GNnSIiOljxx', NULL, 1, '', '2021-01-28 09:14:55', '2021-06-24 18:41:53'),
(2, '', 'agent@agent.com', '', '$2y$10$1.KCk1DJuYp4ZaPgLgDE0.t9Ob0zGegdWu11uKR8uT3cFJfT/6oRe', 0, '', '0R82vHJuH2EMedA0yZOMPp53Nify6JwM4Xv6N16YNIHkSenT2GcH3kEj2H57', NULL, 0, '', '2021-01-28 09:14:55', '2021-01-28 09:14:55'),
(3, '', 'customer@customer.com', '', '$2y$10$liBmx5acvAXNb3O6e9tFBOU3bmNwwLlMXpRnM8UyutR9IkH1Cqcr2', 0, '', NULL, NULL, 0, '', '2021-01-28 09:14:55', '2021-01-28 09:14:55'),
(4, '', 'first_agency@firstagency.com', '', '$2y$10$eyiO28RvYh.NIpwpmKuHY.V2imHUlRVvN92WY3NYs4zIQuTpDn8Cm', 1, '', NULL, NULL, 0, '', '2021-01-28 09:14:55', '2021-03-02 21:37:57'),
(10, '', 'zakarialabib@gmail.com', '', '$2y$10$SmWHSt2kh.oheEoRsxNzHuR.AN4LjjP1.XlrH1nTOlvScAcVPCB4.', 1, NULL, NULL, NULL, 0, '', '2021-02-05 10:30:32', '2021-03-02 21:38:04'),
(11, '', 'abderrahimybouhamidi@gmail.com', '', '$2y$10$xR.eBd8NcQdyivUrsnPvderNO3Ut08uf.IuXmU5I/h6iszR3Bzoc2', 0, NULL, NULL, NULL, 0, '', '2021-03-01 04:22:28', '2021-03-01 04:22:28'),
(12, '', 'z@admin.com', '', '$2y$10$LcCoHDgDg5mNcrpAZ38MBO..wxFos6Etv8fBXwwH3exOSCWsDVDiK', 1, NULL, NULL, NULL, 0, '', '2021-03-02 21:32:57', '2021-03-02 21:53:46'),
(17, 'zakaria', 'zakaria@yachting.com', '0000000', '$2y$10$IPt1ZF.41zOpZfwFWmRXYOpeiJcTntYIeE0mOqvp8X5EOlFphb9oe', 0, NULL, NULL, NULL, 0, '', '2021-06-22 18:30:44', '2021-06-24 15:32:00');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `place_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `place_id`, `created_at`, `updated_at`) VALUES
(1, 8, 21, '2020-06-22 15:42:16', '2020-06-22 15:42:16'),
(2, 8, 23, '2020-06-22 15:42:34', '2020-06-22 15:42:34'),
(4, 8, 28, '2020-06-22 15:42:37', '2020-06-22 15:42:37'),
(5, 8, 19, '2020-12-18 15:06:37', '2020-12-18 15:06:37'),
(7, 17, 19, '2021-01-14 11:28:51', '2021-01-14 11:28:51'),
(12, 10, 33, '2021-02-05 12:25:43', '2021-02-05 12:25:43'),
(16, 1, 33, '2021-02-15 13:45:34', '2021-02-15 13:45:34'),
(17, 1, 8, '2021-05-17 15:26:21', '2021-05-17 15:26:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agency_profiles`
--
ALTER TABLE `agency_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amenities_translations`
--
ALTER TABLE `amenities_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `amenities_translations_amenities_id_locale_unique` (`amenities_id`,`locale`),
  ADD KEY `amenities_translations_locale_index` (`locale`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_booking_id` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_translations_category_id_locale_unique` (`category_id`,`locale`),
  ADD KEY `category_translations_locale_index` (`locale`);

--
-- Indexes for table `category_types`
--
ALTER TABLE `category_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_category_type_id` (`category_id`);

--
-- Indexes for table `category_type_translations`
--
ALTER TABLE `category_type_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_type_translations_category_type_id_locale_unique` (`category_type_id`,`locale`),
  ADD KEY `category_type_translations_locale_index` (`locale`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city_translations`
--
ALTER TABLE `city_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `city_translations_city_id_locale_unique` (`city_id`,`locale`),
  ADD KEY `city_translations_locale_index` (`locale`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cooperate_customer_profiles`
--
ALTER TABLE `cooperate_customer_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `good_to_knows`
--
ALTER TABLE `good_to_knows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_settings`
--
ALTER TABLE `home_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_bookings`
--
ALTER TABLE `hotel_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_deals`
--
ALTER TABLE `hotel_deals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ltm_translations`
--
ALTER TABLE `ltm_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `markdowns`
--
ALTER TABLE `markdowns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `markups`
--
ALTER TABLE `markups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `markup_types`
--
ALTER TABLE `markup_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `markup_value_types`
--
ALTER TABLE `markup_value_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreing_offer_category_id` (`category_id`),
  ADD KEY `foreign_offer_city_id` (`city_id`);

--
-- Indexes for table `offer_translations`
--
ALTER TABLE `offer_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `offer_translations_offer_id_locale_unique` (`offer_id`,`locale`),
  ADD KEY `offer_translations_locale_index` (`locale`);

--
-- Indexes for table `online_payments`
--
ALTER TABLE `online_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `packages_offer_id_foreign` (`offer_id`);

--
-- Indexes for table `package_attractions`
--
ALTER TABLE `package_attractions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_bookings`
--
ALTER TABLE `package_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_categories`
--
ALTER TABLE `package_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_conditions`
--
ALTER TABLE `package_conditions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_conditions_package_id_foreign` (`package_id`);

--
-- Indexes for table `package_features`
--
ALTER TABLE `package_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_features_package_id_foreign` (`package_id`);

--
-- Indexes for table `package_flights`
--
ALTER TABLE `package_flights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_hotels`
--
ALTER TABLE `package_hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_rates`
--
ALTER TABLE `package_rates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_rates_package_id_foreign` (`package_id`);

--
-- Indexes for table `package_types`
--
ALTER TABLE `package_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_translations`
--
ALTER TABLE `page_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `page_translations_page_id_locale_unique` (`page_id`,`locale`),
  ADD KEY `page_translations_locale_index` (`locale`);

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
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_place_category_id` (`category_id`);

--
-- Indexes for table `place_translations`
--
ALTER TABLE `place_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `place_translations_place_id_locale_unique` (`place_id`,`locale`),
  ADD KEY `place_translations_locale_index` (`locale`);

--
-- Indexes for table `place_types`
--
ALTER TABLE `place_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `place_type_translations`
--
ALTER TABLE `place_type_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `place_type_translations_place_type_id_locale_unique` (`place_type_id`,`locale`),
  ADD KEY `place_type_translations_locale_index` (`locale`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_translations`
--
ALTER TABLE `post_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_translations_post_id_locale_unique` (`post_id`,`locale`),
  ADD KEY `post_translations_locale_index` (`locale`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Foreign_User_Id` (`user_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Purchase Supplier` (`supplier_id`),
  ADD KEY `Purchase User` (`user_id`);

--
-- Indexes for table `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Purchase detail fk` (`purchase_id`);

--
-- Indexes for table `rate_booking`
--
ALTER TABLE `rate_booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rate_booking_booking_id_foreign` (`booking_id`),
  ADD KEY `rate_booking_rate_id_foreign` (`rate_id`);

--
-- Indexes for table `returns`
--
ALTER TABLE `returns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Return_User_ID` (`user_id`);

--
-- Indexes for table `return_details`
--
ALTER TABLE `return_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Return_Details_ID` (`return_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Sale Customer` (`customer_id`),
  ADD KEY `Sale User` (`user_id`);

--
-- Indexes for table `sale_details`
--
ALTER TABLE `sale_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sale_id` (`sale_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial_translations`
--
ALTER TABLE `testimonial_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `customer_id_user_id` (`customer_id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agency_profiles`
--
ALTER TABLE `agency_profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `amenities_translations`
--
ALTER TABLE `amenities_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `category_translations`
--
ALTER TABLE `category_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `category_types`
--
ALTER TABLE `category_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category_type_translations`
--
ALTER TABLE `category_type_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `city_translations`
--
ALTER TABLE `city_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cooperate_customer_profiles`
--
ALTER TABLE `cooperate_customer_profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `good_to_knows`
--
ALTER TABLE `good_to_knows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_settings`
--
ALTER TABLE `home_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotel_bookings`
--
ALTER TABLE `hotel_bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotel_deals`
--
ALTER TABLE `hotel_deals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `ltm_translations`
--
ALTER TABLE `ltm_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1644;

--
-- AUTO_INCREMENT for table `markdowns`
--
ALTER TABLE `markdowns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `markups`
--
ALTER TABLE `markups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `markup_types`
--
ALTER TABLE `markup_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `markup_value_types`
--
ALTER TABLE `markup_value_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `offer_translations`
--
ALTER TABLE `offer_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `online_payments`
--
ALTER TABLE `online_payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `package_attractions`
--
ALTER TABLE `package_attractions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `package_bookings`
--
ALTER TABLE `package_bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package_categories`
--
ALTER TABLE `package_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `package_conditions`
--
ALTER TABLE `package_conditions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `package_features`
--
ALTER TABLE `package_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `package_flights`
--
ALTER TABLE `package_flights`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package_hotels`
--
ALTER TABLE `package_hotels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package_rates`
--
ALTER TABLE `package_rates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `package_types`
--
ALTER TABLE `package_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `page_translations`
--
ALTER TABLE `page_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `place_translations`
--
ALTER TABLE `place_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `place_types`
--
ALTER TABLE `place_types`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `place_type_translations`
--
ALTER TABLE `place_type_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `post_translations`
--
ALTER TABLE `post_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `purchase_details`
--
ALTER TABLE `purchase_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `rate_booking`
--
ALTER TABLE `rate_booking`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `returns`
--
ALTER TABLE `returns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `return_details`
--
ALTER TABLE `return_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sale_details`
--
ALTER TABLE `sale_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `testimonial_translations`
--
ALTER TABLE `testimonial_translations`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `titles`
--
ALTER TABLE `titles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `amenities_translations`
--
ALTER TABLE `amenities_translations`
  ADD CONSTRAINT `amenities_translations_amenities_id_foreign` FOREIGN KEY (`amenities_id`) REFERENCES `amenities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `user_id_booking_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `category_types`
--
ALTER TABLE `category_types`
  ADD CONSTRAINT `foreign_category_type_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `city_translations`
--
ALTER TABLE `city_translations`
  ADD CONSTRAINT `city_translations_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `foreign_offer_city_id` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `foreing_offer_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `packages_offer_id_foreign` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `package_conditions`
--
ALTER TABLE `package_conditions`
  ADD CONSTRAINT `package_conditions_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `package_features`
--
ALTER TABLE `package_features`
  ADD CONSTRAINT `package_features_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `package_rates`
--
ALTER TABLE `package_rates`
  ADD CONSTRAINT `package_rates_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `page_translations`
--
ALTER TABLE `page_translations`
  ADD CONSTRAINT `page_translations_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `foreign_place_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `place_translations`
--
ALTER TABLE `place_translations`
  ADD CONSTRAINT `place_translations_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `place_type_translations`
--
ALTER TABLE `place_type_translations`
  ADD CONSTRAINT `place_type_translations_place_type_id_foreign` FOREIGN KEY (`place_type_id`) REFERENCES `place_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_translations`
--
ALTER TABLE `post_translations`
  ADD CONSTRAINT `post_translations_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `Foreign_User_Id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `Purchase Supplier` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `Purchase User` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD CONSTRAINT `Purchase detail fk` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rate_booking`
--
ALTER TABLE `rate_booking`
  ADD CONSTRAINT `rate_booking_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rate_booking_rate_id_foreign` FOREIGN KEY (`rate_id`) REFERENCES `package_rates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `returns`
--
ALTER TABLE `returns`
  ADD CONSTRAINT `Return_User_ID` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `return_details`
--
ALTER TABLE `return_details`
  ADD CONSTRAINT `Return_Details_ID` FOREIGN KEY (`return_id`) REFERENCES `returns` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `Sale Customer` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `Sale User` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sale_details`
--
ALTER TABLE `sale_details`
  ADD CONSTRAINT `sale_id` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `customer_id_user_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`user_id`) ON DELETE CASCADE;
