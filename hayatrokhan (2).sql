-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2023 at 07:21 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hayatrokhan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `photo`, `token`, `created_at`, `updated_at`) VALUES
(1, 'Khan', 'admin@gmail.com', '$2y$10$JLOG1zFax38uvkOxwff0bu4rXboDAEQOuviydMLuqkmL1J/SlVeDe', 'a.png', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `show_on_menu` varchar(255) NOT NULL,
  `category_order` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `show_on_menu`, `category_order`, `created_at`, `updated_at`) VALUES
(2, 'PRODUCTS', 'Show', '2', '2023-10-26 23:07:55', '2023-10-26 23:07:55');

-- --------------------------------------------------------

--
-- Table structure for table `category_distributors`
--

CREATE TABLE `category_distributors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `distributor_category_name` varchar(255) NOT NULL,
  `show_on_menu` varchar(255) NOT NULL,
  `show_on_home` varchar(255) NOT NULL,
  `post_photo` varchar(255) NOT NULL,
  `sub_category_order` varchar(255) NOT NULL,
  `pdf_file` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_distributors`
--

INSERT INTO `category_distributors` (`id`, `distributor_category_name`, `show_on_menu`, `show_on_home`, `post_photo`, `sub_category_order`, `pdf_file`, `category_id`, `created_at`, `updated_at`) VALUES
(9, 'Nutri-Vet', 'Show', 'Show', 'post_photo1698644709.jpg', '2', '1698644709_Inventory _ Sale View dr hayatullah 86.pdf', 3, '2023-10-30 12:45:10', '2023-10-30 12:45:10');

-- --------------------------------------------------------

--
-- Table structure for table `cate__dists`
--

CREATE TABLE `cate__dists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cate_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `child_cates`
--

CREATE TABLE `child_cates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `show_on_menu` varchar(255) NOT NULL DEFAULT 'Show',
  `category_order` int(11) NOT NULL DEFAULT 0,
  `post_photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `child_cates`
--

INSERT INTO `child_cates` (`id`, `category_name`, `show_on_menu`, `category_order`, `post_photo`, `created_at`, `updated_at`) VALUES
(3, 'Technology', 'Show', 1, 'post_photo1698400256.jpg', '2023-10-27 16:50:56', '2023-10-27 16:50:56');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `distributors`
--

CREATE TABLE `distributors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `distributor_category_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `pdf_file` varchar(255) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `distributors`
--

INSERT INTO `distributors` (`id`, `distributor_category_id`, `post_title`, `pdf_file`, `admin_id`, `created_at`, `updated_at`) VALUES
(4, 3, 'dfjsh', '1698390575_Inventory _ Sale View 87.pdf', 1, '2023-10-27 14:09:35', '2023-10-27 14:09:35'),
(5, 3, 'post title', '1698390640_Inventory _ Sale View dr hayatullah 86.pdf', 1, '2023-10-27 14:10:40', '2023-10-27 14:10:40'),
(6, 5, 'technology', '1698515402_Inventory _ Sale View 88.pdf', 1, '2023-10-29 00:50:03', '2023-10-29 00:50:03'),
(7, 5, 'تازه خبرونه دنن ورځی', '1698517052_Inventory _ Sale View 88.pdf', 1, '2023-10-29 01:17:32', '2023-10-29 01:17:32');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `live__channels`
--

CREATE TABLE `live__channels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` text NOT NULL,
  `video_id` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(69, '2023_08_06_103909_create_home_advertisements_table', 1),
(70, '2023_08_07_113813_create_top_advertisements_table', 1),
(71, '2023_08_08_134129_create_sidebar_advertisements_table', 1),
(74, '2023_08_13_104651_create_tags_table', 1),
(87, '2023_10_05_060818_create_news_table', 3),
(107, '2014_10_12_000000_create_users_table', 4),
(108, '2014_10_12_100000_create_password_resets_table', 4),
(109, '2019_08_19_000000_create_failed_jobs_table', 4),
(110, '2019_12_14_000001_create_personal_access_tokens_table', 4),
(111, '2022_02_18_035205_create_admins_table', 4),
(112, '2023_08_09_112918_create_categories_table', 4),
(113, '2023_08_13_100253_create_sub_categories_table', 4),
(114, '2023_08_14_055126_create_posts_table', 4),
(115, '2023_08_17_090007_create_settings_table', 4),
(116, '2023_08_20_130805_create_photos_table', 4),
(117, '2023_08_20_171540_create_videos_table', 4),
(118, '2023_08_22_113023_create_pages_table', 4),
(119, '2023_08_23_134450_create_live__channels_table', 4),
(120, '2023_08_25_055300_create_online__polls_table', 4),
(121, '2023_08_26_070739_create_social__items_table', 4),
(122, '2023_08_26_125547_create_authors_table', 4),
(123, '2023_08_28_185215_create_contacts_table', 4),
(124, '2023_09_14_105207_create_sliders_table', 4),
(125, '2023_10_05_061002_create_news_table', 4),
(126, '2023_10_05_061044_create_news_categories_table', 4),
(127, '2023_10_10_094841_create_teams_table', 4),
(128, '2023_10_15_062158_create_distributors_table', 4),
(129, '2023_10_15_062415_create_category_distributors_table', 4),
(130, '2023_10_16_170316_create_sessions_table', 4),
(131, '2023_10_21_155352_create_cate__dists_table', 4),
(137, '2023_10_26_165905_create_child_cates_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `news_category_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_detail` text NOT NULL,
  `post_photo` varchar(255) DEFAULT NULL,
  `visitors` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `news_category_id`, `post_title`, `post_detail`, `post_photo`, `visitors`, `author_id`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'post title', 'sadasd', 'post_photo1698212374.jpg', 5, 0, 1, '2023-10-25 12:39:34', '2023-10-30 12:57:50');

-- --------------------------------------------------------

--
-- Table structure for table `news_categories`
--

CREATE TABLE `news_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `news_category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_categories`
--

INSERT INTO `news_categories` (`id`, `news_category_name`, `created_at`, `updated_at`) VALUES
(1, 'Mistav Inj', '2023-10-23 14:49:33', '2023-10-26 23:43:41'),
(2, 'Nutri-Vet', '2023-10-26 23:39:48', '2023-10-26 23:39:48');

-- --------------------------------------------------------

--
-- Table structure for table `online__polls`
--

CREATE TABLE `online__polls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `yes_vote` text NOT NULL,
  `no_vote` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `online__polls`
--

INSERT INTO `online__polls` (`id`, `question`, `yes_vote`, `no_vote`, `created_at`, `updated_at`) VALUES
(1, 'You are wish ?', '1', '0', NULL, '2023-10-25 12:53:59');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about_title` text NOT NULL,
  `about_detail` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `about_title`, `about_detail`, `created_at`, `updated_at`) VALUES
(1, 'Hayat Rokhan Ltd:', '<p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\njustify;line-height:150%\"><b>Welcome to Hayat Rokhan Ltd</b>, unparalleled\r\npartner in introducing globally acclaimed products to Afghanistan. We are your\r\ngateway to the finest offerings, driven by a professional team that sets the\r\nstandard for excellence and provides comprehensive market coverage throughout\r\nAfghanistan.<br></p><p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\njustify;line-height:150%\"><o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\njustify;line-height:150%\"><b>Hayat Rokhan Ltd Animal Health Care</b> is a\r\npioneer in the realm of veterinary, poultry, and agriculture medicines. Our\r\nextensive presence is marked by state-of-the-art development, importing, sales,\r\nand marketing facilities across the country. Since our inception in 2012, our\r\nteam of certified professionals has been unwavering in its dedication to\r\nenhancing the efficiency and productivity of the livestock and agriculture\r\nsectors.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\njustify;line-height:150%\">At <b>Hayat Rokhan Animal Health Care</b>, we are\r\nardent supporters of initiatives that aim to elevate the health and wellness of\r\nanimals. Our mission revolves around the responsible and compassionate use of\r\nanimal health products, which ensures the continued health, comfort, and care\r\nof animals by preventing and treating diseases.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\njustify;line-height:150%\">Transparency is our guiding principle, as we are\r\nsteadfast in providing consumers with precise information regarding active\r\ningredients, dosage, administration, safety measures, and production practices.\r\nOur mission is to redefine the standard of animal health care by delivering\r\nproducts of unparalleled quality, prioritizing customer satisfaction, and\r\noffering innovative services.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\njustify;line-height:150%\">In this journey, we wholeheartedly recognize our\r\ncustomers as our most cherished asset and our dedicated team as our greatest\r\nresource. Our commitment extends to forging enduring, mutually beneficial\r\nrelationships with our customers and colleagues.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\njustify;line-height:150%\">Join us at <b>Hayat Rokhan Ltd</b> and experience the\r\nrevolution in animal health care. Discover our world-class products and witness\r\nthe transformative difference we bring to the world of animal well-being,\r\nshaping a better future for all. Together, we can elevate the quality of life\r\nfor animals, advance agriculture, and ensure the prosperity of our nation<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\njustify;line-height:150%\"><o:p>&nbsp;</o:p></p>', NULL, '2023-10-26 22:58:09');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` text NOT NULL,
  `caption` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `photo`, `caption`, `created_at`, `updated_at`) VALUES
(2, 'photo1698336244.jpg', '1', '2023-10-26 23:04:04', '2023-10-26 23:04:04'),
(3, 'photo1698336260.jpg', '2', '2023-10-26 23:04:20', '2023-10-26 23:04:20'),
(4, 'photo1698336275.jpg', '3', '2023-10-26 23:04:35', '2023-10-26 23:04:35'),
(5, 'photo1698336293.jpg', '4', '2023-10-26 23:04:53', '2023-10-26 23:04:53'),
(6, 'photo1698336307.jpg', '5', '2023-10-26 23:05:07', '2023-10-26 23:05:07'),
(7, 'photo1698336326.jpg', '6', '2023-10-26 23:05:26', '2023-10-26 23:05:26'),
(8, 'photo1698336342.jpg', '7', '2023-10-26 23:05:42', '2023-10-26 23:05:42'),
(9, 'photo1698336359.jpg', '8', '2023-10-26 23:05:59', '2023-10-26 23:05:59'),
(10, 'photo1698336373.jpg', '9', '2023-10-26 23:06:13', '2023-10-26 23:06:13'),
(11, 'photo1698336387.jpg', '10', '2023-10-26 23:06:27', '2023-10-26 23:06:27'),
(12, 'photo1698336403.jpg', '11', '2023-10-26 23:06:43', '2023-10-26 23:06:43');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_detail` text NOT NULL,
  `post_photo` varchar(255) DEFAULT NULL,
  `visitors` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `sub_category_id`, `post_title`, `post_detail`, `post_photo`, `visitors`, `author_id`, `admin_id`, `created_at`, `updated_at`) VALUES
(3, 7, 'post title', '', 'post_photo_1698562905.jpg', 2, 0, 1, '2023-10-29 14:01:45', '2023-10-30 20:35:49');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `news_ticker_total` text NOT NULL,
  `news_ticker_status` text NOT NULL,
  `video_total` text NOT NULL,
  `video_status` text NOT NULL,
  `logo` text NOT NULL,
  `favicon` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `news_ticker_total`, `news_ticker_status`, `video_total`, `video_status`, `logo`, `favicon`, `created_at`, `updated_at`) VALUES
(1, '2', 'Show', '2', 'Show', 'logo.jpg', 'favicon.jpg', NULL, '2023-10-26 13:32:45');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` text NOT NULL,
  `caption` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `photo`, `caption`, `created_at`, `updated_at`) VALUES
(1, 'photo1698048664.jpg', 'Hayat Rokhan Ltd', '2023-10-23 15:11:04', '2023-10-23 15:11:04'),
(2, 'photo1698048687.jpg', 'Poultry Products', '2023-10-23 15:11:27', '2023-10-23 15:11:27'),
(3, 'photo1698048713.jpg', 'Veterinary Products', '2023-10-23 15:11:53', '2023-10-23 15:11:53'),
(4, 'photo1698048737.jpg', 'Agricultural Products', '2023-10-23 15:12:17', '2023-10-23 15:12:17');

-- --------------------------------------------------------

--
-- Table structure for table `social__items`
--

CREATE TABLE `social__items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` text NOT NULL,
  `url` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_name` varchar(255) NOT NULL,
  `show_on_menu` varchar(255) NOT NULL,
  `show_on_home` varchar(255) NOT NULL,
  `post_photo` varchar(255) DEFAULT NULL,
  `sub_category_order` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `sub_category_name`, `show_on_menu`, `show_on_home`, `post_photo`, `sub_category_order`, `category_id`, `created_at`, `updated_at`) VALUES
(7, 'cricket', 'Show', 'Show', 'post_photo1698562870.jpg', '1', 2, '2023-10-29 14:01:10', '2023-10-29 14:01:10');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_detail` text NOT NULL,
  `post_photo` varchar(255) DEFAULT NULL,
  `visitors` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `post_title`, `post_detail`, `post_photo`, `visitors`, `author_id`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 'post title', '<p>dsda</p>', 'post_photo1698212431.jpg', 1, 0, 1, '2023-10-25 12:40:31', '2023-10-25 12:40:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video_id` text NOT NULL,
  `caption` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_distributors`
--
ALTER TABLE `category_distributors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cate__dists`
--
ALTER TABLE `cate__dists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child_cates`
--
ALTER TABLE `child_cates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distributors`
--
ALTER TABLE `distributors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `live__channels`
--
ALTER TABLE `live__channels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_categories`
--
ALTER TABLE `news_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online__polls`
--
ALTER TABLE `online__polls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
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
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- Indexes for table `social__items`
--
ALTER TABLE `social__items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category_distributors`
--
ALTER TABLE `category_distributors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cate__dists`
--
ALTER TABLE `cate__dists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `child_cates`
--
ALTER TABLE `child_cates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `distributors`
--
ALTER TABLE `distributors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `live__channels`
--
ALTER TABLE `live__channels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news_categories`
--
ALTER TABLE `news_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `online__polls`
--
ALTER TABLE `online__polls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `social__items`
--
ALTER TABLE `social__items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
