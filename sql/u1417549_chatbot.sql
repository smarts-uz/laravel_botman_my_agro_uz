-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 29, 2021 at 07:51 PM
-- Server version: 5.7.27-30
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u1417549_chatbot`
--

-- --------------------------------------------------------

--
-- Table structure for table `actions`
--

CREATE TABLE `actions` (
  `id` int(10) UNSIGNED NOT NULL,
  `uz` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `actions`
--

INSERT INTO `actions` (`id`, `uz`, `ru`, `created_at`, `updated_at`) VALUES
(1, 'Savol berish', 'Задать вопрос', '2021-08-27 05:23:47', '2021-08-29 07:51:31');

-- --------------------------------------------------------

--
-- Table structure for table `appeals`
--

CREATE TABLE `appeals` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider_id` int(11) DEFAULT NULL,
  `region` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appeals`
--

INSERT INTO `appeals` (`id`, `text`, `user_id`, `provider_id`, `region`, `route`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Salom dunyo', 1, NULL, '9', '10', 1, '2021-08-28 07:48:04', '2021-08-28 07:48:04'),
(2, 'Salom bu mening murojatim', 1, NULL, '11', '14', 1, '2021-08-28 08:16:16', '2021-08-28 08:16:16'),
(3, 'Salom', 1, NULL, '10', '10', 1, '2021-08-28 08:19:38', '2021-08-28 08:19:38'),
(4, '13', 1, NULL, '1', '10', 1, '2021-08-28 08:27:24', '2021-08-28 08:27:24'),
(5, 'Ok', 1, NULL, '10', '10', 1, '2021-08-28 08:30:32', '2021-08-28 08:30:32'),
(6, 'Savol yoq', 1, NULL, '10', '8', 1, '2021-08-28 08:32:35', '2021-08-28 08:32:35'),
(7, 'Salom bu meni murjatim', 1, NULL, '13', '10', 1, '2021-08-28 08:52:11', '2021-08-28 08:52:11'),
(8, 'Salom good boy', 1, NULL, '8', '17', 1, '2021-08-28 08:55:04', '2021-08-28 08:55:04'),
(9, 'Salom gggggg', 1, NULL, '11', '6', 1, '2021-08-28 08:57:55', '2021-08-28 08:57:55'),
(10, 'Salom wwww', 1, NULL, '10', '10', 1, '2021-08-28 09:11:14', '2021-08-28 09:11:14'),
(11, '12', 1, NULL, '1', '13', 1, '2021-08-28 09:13:30', '2021-08-28 09:13:30'),
(12, 'Salom', 1, NULL, '7', '2', 1, '2021-08-28 09:18:15', '2021-08-28 09:18:15'),
(13, 'Salom Savol bor edi', 1, NULL, '12', '8', 1, '2021-08-28 09:27:22', '2021-08-28 09:27:22'),
(14, 'Salomrgwv', 11, NULL, '9', '13', 1, '2021-08-28 09:35:44', '2021-08-28 09:35:44'),
(15, 'Assalomu alaykum', 19, NULL, '3', '14', 1, '2021-08-29 12:45:56', '2021-08-29 12:45:56'),
(16, 'salom', 23, NULL, '12', '8', 1, '2021-08-29 13:39:23', '2021-08-29 13:39:23'),
(17, 'Assalomu alaykum', 24, NULL, '9', '10', 1, '2021-08-29 13:46:46', '2021-08-29 13:46:46'),
(18, 'fggrterwefd', 25, NULL, '1', '11', 1, '2021-08-29 13:48:56', '2021-08-29 13:48:56');

-- --------------------------------------------------------

--
-- Table structure for table `appeal_answers`
--

CREATE TABLE `appeal_answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `appeal_id` int(11) NOT NULL,
  `answered_by` int(11) NOT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appeal_answers`
--

INSERT INTO `appeal_answers` (`id`, `appeal_id`, `answered_by`, `text`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'sexdcrfvtgybhunjm', '2021-08-29 09:36:47', '2021-08-29 09:36:47'),
(2, 2, 1, '998', '2021-08-29 09:40:34', '2021-08-29 09:40:34'),
(3, 14, 1, '<p>Asadbek bu</p>', '2021-08-29 09:43:14', '2021-08-29 09:43:14'),
(4, 14, 1, '<p>Salom<br />\r\n&nbsp;</p>', '2021-08-29 10:32:34', '2021-08-29 10:32:34');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, NULL, 3),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, NULL, 4),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, NULL, 5),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 6),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, NULL, 8),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":0}', 10),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, NULL, 12),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
(21, 1, 'role_id', 'text', 'Role', 1, 1, 1, 1, 1, 1, NULL, 9),
(25, 6, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(26, 6, 'uz', 'text', 'Uz', 1, 1, 1, 1, 1, 1, '{}', 2),
(27, 6, 'ru', 'text', 'Ru', 1, 1, 1, 1, 1, 1, '{}', 3),
(28, 6, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, '{}', 4),
(29, 6, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5),
(30, 7, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(31, 7, 'text', 'rich_text_box', 'Text', 1, 1, 1, 0, 0, 0, '{}', 2),
(32, 7, 'user_id', 'checkbox', 'User Id', 0, 0, 0, 0, 0, 0, '{}', 3),
(33, 7, 'provider_id', 'text', 'Provider Id', 0, 1, 1, 0, 0, 0, '{}', 5),
(34, 7, 'region', 'checkbox', 'Region', 1, 0, 0, 0, 0, 0, '{}', 6),
(35, 7, 'route', 'text', 'Route', 1, 0, 0, 0, 0, 0, '{}', 8),
(36, 7, 'type', 'text', 'Type', 1, 1, 1, 0, 0, 0, '{}', 10),
(37, 7, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 12),
(38, 7, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 13),
(39, 7, 'appeal_belongsto_user_relationship', 'relationship', 'users', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"appeals\",\"pivot\":\"0\",\"taggable\":\"0\"}', 4),
(40, 7, 'appeal_belongsto_region_relationship', 'relationship', 'regions', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Region\",\"table\":\"regions\",\"type\":\"belongsTo\",\"column\":\"id\",\"key\":\"id\",\"label\":\"uz\",\"pivot_table\":\"appeals\",\"pivot\":\"0\",\"taggable\":\"0\"}', 7),
(41, 8, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(42, 8, 'uz', 'text', 'Uz', 1, 1, 1, 1, 1, 1, '{}', 2),
(43, 8, 'ru', 'text', 'Ru', 0, 1, 1, 1, 1, 1, '{}', 3),
(44, 8, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 4),
(45, 8, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5),
(46, 11, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(47, 11, 'uz', 'text', 'Uz', 1, 1, 1, 1, 1, 1, '{}', 2),
(48, 11, 'ru', 'text', 'Ru', 1, 1, 1, 1, 1, 1, '{}', 3),
(49, 11, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 4),
(50, 11, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5),
(51, 7, 'appeal_belongsto_action_relationship', 'relationship', 'actions', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Action\",\"table\":\"actions\",\"type\":\"belongsTo\",\"column\":\"type\",\"key\":\"id\",\"label\":\"uz\",\"pivot_table\":\"actions\",\"pivot\":\"0\",\"taggable\":\"0\"}', 11),
(52, 7, 'appeal_belongsto_route_relationship', 'relationship', 'routes', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Routes\",\"table\":\"routes\",\"type\":\"belongsTo\",\"column\":\"route\",\"key\":\"id\",\"label\":\"uz\",\"pivot_table\":\"actions\",\"pivot\":\"0\",\"taggable\":\"0\"}', 9),
(67, 18, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(68, 18, 'appeal_id', 'text', 'Appeal Id', 1, 1, 1, 1, 1, 1, '{}', 3),
(69, 18, 'answered_by', 'text', 'Answered By', 1, 1, 1, 1, 1, 1, '{}', 4),
(70, 18, 'text', 'text', 'Javob matni', 1, 1, 1, 1, 1, 1, '{}', 5),
(71, 18, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 7),
(72, 18, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 8),
(73, 18, 'appeal_answer_belongsto_appeal_relationship', 'relationship', 'Appeal', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Appeal\",\"table\":\"appeals\",\"type\":\"belongsTo\",\"column\":\"appeal_id\",\"key\":\"id\",\"label\":\"text\",\"pivot_table\":\"actions\",\"pivot\":\"0\",\"taggable\":\"0\"}', 2),
(74, 18, 'appeal_answer_belongsto_user_relationship', 'relationship', 'Moderator names', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"answered_by\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"actions\",\"pivot\":\"0\",\"taggable\":\"0\"}', 6);

-- --------------------------------------------------------

--
-- Table structure for table `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint(4) NOT NULL DEFAULT '0',
  `details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', '', 1, 0, NULL, '2021-08-26 01:40:27', '2021-08-26 01:40:27'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2021-08-26 01:40:27', '2021-08-26 01:40:27'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController', '', 1, 0, NULL, '2021-08-26 01:40:27', '2021-08-26 01:40:27'),
(6, 'routes', 'routes', 'Route', 'Routes', NULL, 'App\\Models\\Routes', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2021-08-26 06:57:12', '2021-08-26 06:57:12'),
(7, 'appeals', 'appeals', 'Appeal', 'Appeals', NULL, 'App\\Models\\Appeal', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":\"currentUser\"}', '2021-08-26 07:37:44', '2021-08-29 13:22:08'),
(8, 'regions', 'regions', 'Region', 'Regions', NULL, 'App\\Models\\Region', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2021-08-27 03:55:19', '2021-08-27 03:55:19'),
(11, 'actions', 'actions', 'Action', 'Actions', NULL, 'App\\Models\\Action', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2021-08-27 05:22:54', '2021-08-27 05:22:54'),
(18, 'appeal_answers', 'appeal-answers', 'Appeal Answer', 'Appeal Answers', NULL, 'App\\Models\\AppealAnswer', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":\"currentUser\"}', '2021-08-29 09:36:13', '2021-08-29 13:27:39');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2021-08-26 01:40:27', '2021-08-26 01:40:27');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2021-08-26 01:40:27', '2021-08-26 01:40:27', 'voyager.dashboard', NULL),
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 7, '2021-08-26 01:40:27', '2021-08-29 10:22:12', 'voyager.media.index', NULL),
(3, 1, 'Users', '', '_self', 'voyager-person', NULL, NULL, 3, '2021-08-26 01:40:27', '2021-08-26 01:40:27', 'voyager.users.index', NULL),
(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, NULL, 2, '2021-08-26 01:40:27', '2021-08-26 01:40:27', 'voyager.roles.index', NULL),
(5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 8, '2021-08-26 01:40:27', '2021-08-29 05:53:08', NULL, NULL),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 1, '2021-08-26 01:40:27', '2021-08-26 06:50:07', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 2, '2021-08-26 01:40:27', '2021-08-26 06:50:07', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 3, '2021-08-26 01:40:28', '2021-08-26 06:50:07', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 4, '2021-08-26 01:40:28', '2021-08-26 06:50:07', 'voyager.bread.index', NULL),
(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 9, '2021-08-26 01:40:28', '2021-08-29 05:53:10', 'voyager.settings.index', NULL),
(12, 1, 'Buttons', '', '_self', 'voyager-edit', '#000000', NULL, 4, '2021-08-26 06:49:46', '2021-08-28 07:58:00', NULL, ''),
(14, 1, 'Routes', '', '_self', NULL, NULL, 12, 1, '2021-08-26 06:57:12', '2021-08-27 04:01:25', 'voyager.routes.index', NULL),
(15, 1, 'Appeals', '', '_self', 'voyager-mail', '#000000', NULL, 5, '2021-08-26 07:37:44', '2021-08-29 10:22:15', 'voyager.appeals.index', 'null'),
(16, 1, 'Regions', '', '_self', NULL, NULL, 12, 2, '2021-08-27 03:55:19', '2021-08-27 04:01:25', 'voyager.regions.index', NULL),
(19, 1, 'Actions', '', '_self', NULL, NULL, 12, 3, '2021-08-27 05:22:54', '2021-08-28 07:55:22', 'voyager.actions.index', NULL),
(24, 1, 'Appeal Answers', '', '_self', 'voyager-pen', '#000000', NULL, 6, '2021-08-29 09:36:16', '2021-08-29 10:22:56', 'voyager.appeal-answers.index', 'null');

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
(31, '0000_00_00_000000_create_websockets_statistics_entries_table', 1),
(32, '2014_10_12_000000_create_users_table', 1),
(33, '2014_10_12_100000_create_password_resets_table', 1),
(34, '2016_01_01_000000_add_voyager_user_fields', 1),
(35, '2016_01_01_000000_create_data_types_table', 1),
(36, '2016_01_01_000000_create_pages_table', 1),
(37, '2016_01_01_000000_create_posts_table', 1),
(38, '2016_02_15_204651_create_categories_table', 1),
(39, '2016_05_19_173453_create_menu_table', 1),
(40, '2016_10_21_190000_create_roles_table', 1),
(41, '2016_10_21_190000_create_settings_table', 1),
(42, '2016_11_30_135954_create_permission_table', 1),
(43, '2016_11_30_141208_create_permission_role_table', 1),
(44, '2016_12_26_201236_data_types__add__server_side', 1),
(45, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(46, '2017_01_14_005015_create_translations_table', 1),
(47, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(48, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(49, '2017_04_11_000000_alter_post_nullable_fields_table', 1),
(50, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(51, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(52, '2017_08_05_000000_add_group_to_settings_table', 1),
(53, '2017_11_26_013050_add_user_role_relationship', 1),
(54, '2017_11_26_015000_create_user_roles_table', 1),
(55, '2018_03_11_000000_add_user_settings', 1),
(56, '2018_03_14_000000_add_details_to_data_types_table', 1),
(57, '2018_03_16_000000_make_settings_value_nullable', 1),
(58, '2019_08_19_000000_create_failed_jobs_table', 1),
(59, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(60, '2021_08_25_105829_create_notifications_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2021-08-26 01:40:28', '2021-08-26 01:40:28'),
(2, 'browse_bread', NULL, '2021-08-26 01:40:28', '2021-08-26 01:40:28'),
(3, 'browse_database', NULL, '2021-08-26 01:40:28', '2021-08-26 01:40:28'),
(4, 'browse_media', NULL, '2021-08-26 01:40:28', '2021-08-26 01:40:28'),
(5, 'browse_compass', NULL, '2021-08-26 01:40:28', '2021-08-26 01:40:28'),
(6, 'browse_menus', 'menus', '2021-08-26 01:40:28', '2021-08-26 01:40:28'),
(7, 'read_menus', 'menus', '2021-08-26 01:40:28', '2021-08-26 01:40:28'),
(8, 'edit_menus', 'menus', '2021-08-26 01:40:28', '2021-08-26 01:40:28'),
(9, 'add_menus', 'menus', '2021-08-26 01:40:28', '2021-08-26 01:40:28'),
(10, 'delete_menus', 'menus', '2021-08-26 01:40:28', '2021-08-26 01:40:28'),
(11, 'browse_roles', 'roles', '2021-08-26 01:40:28', '2021-08-26 01:40:28'),
(12, 'read_roles', 'roles', '2021-08-26 01:40:28', '2021-08-26 01:40:28'),
(13, 'edit_roles', 'roles', '2021-08-26 01:40:28', '2021-08-26 01:40:28'),
(14, 'add_roles', 'roles', '2021-08-26 01:40:28', '2021-08-26 01:40:28'),
(15, 'delete_roles', 'roles', '2021-08-26 01:40:28', '2021-08-26 01:40:28'),
(16, 'browse_users', 'users', '2021-08-26 01:40:28', '2021-08-26 01:40:28'),
(17, 'read_users', 'users', '2021-08-26 01:40:28', '2021-08-26 01:40:28'),
(18, 'edit_users', 'users', '2021-08-26 01:40:28', '2021-08-26 01:40:28'),
(19, 'add_users', 'users', '2021-08-26 01:40:28', '2021-08-26 01:40:28'),
(20, 'delete_users', 'users', '2021-08-26 01:40:28', '2021-08-26 01:40:28'),
(21, 'browse_settings', 'settings', '2021-08-26 01:40:28', '2021-08-26 01:40:28'),
(22, 'read_settings', 'settings', '2021-08-26 01:40:28', '2021-08-26 01:40:28'),
(23, 'edit_settings', 'settings', '2021-08-26 01:40:28', '2021-08-26 01:40:28'),
(24, 'add_settings', 'settings', '2021-08-26 01:40:28', '2021-08-26 01:40:28'),
(25, 'delete_settings', 'settings', '2021-08-26 01:40:28', '2021-08-26 01:40:28'),
(31, 'browse_routes', 'routes', '2021-08-26 06:57:12', '2021-08-26 06:57:12'),
(32, 'read_routes', 'routes', '2021-08-26 06:57:12', '2021-08-26 06:57:12'),
(33, 'edit_routes', 'routes', '2021-08-26 06:57:12', '2021-08-26 06:57:12'),
(34, 'add_routes', 'routes', '2021-08-26 06:57:12', '2021-08-26 06:57:12'),
(35, 'delete_routes', 'routes', '2021-08-26 06:57:12', '2021-08-26 06:57:12'),
(36, 'browse_appeals', 'appeals', '2021-08-26 07:37:44', '2021-08-26 07:37:44'),
(37, 'read_appeals', 'appeals', '2021-08-26 07:37:44', '2021-08-26 07:37:44'),
(38, 'edit_appeals', 'appeals', '2021-08-26 07:37:44', '2021-08-26 07:37:44'),
(39, 'add_appeals', 'appeals', '2021-08-26 07:37:44', '2021-08-26 07:37:44'),
(40, 'delete_appeals', 'appeals', '2021-08-26 07:37:44', '2021-08-26 07:37:44'),
(41, 'browse_regions', 'regions', '2021-08-27 03:55:19', '2021-08-27 03:55:19'),
(42, 'read_regions', 'regions', '2021-08-27 03:55:19', '2021-08-27 03:55:19'),
(43, 'edit_regions', 'regions', '2021-08-27 03:55:19', '2021-08-27 03:55:19'),
(44, 'add_regions', 'regions', '2021-08-27 03:55:19', '2021-08-27 03:55:19'),
(45, 'delete_regions', 'regions', '2021-08-27 03:55:19', '2021-08-27 03:55:19'),
(56, 'browse_actions', 'actions', '2021-08-27 05:22:54', '2021-08-27 05:22:54'),
(57, 'read_actions', 'actions', '2021-08-27 05:22:54', '2021-08-27 05:22:54'),
(58, 'edit_actions', 'actions', '2021-08-27 05:22:54', '2021-08-27 05:22:54'),
(59, 'add_actions', 'actions', '2021-08-27 05:22:54', '2021-08-27 05:22:54'),
(60, 'delete_actions', 'actions', '2021-08-27 05:22:54', '2021-08-27 05:22:54'),
(81, 'browse_appeal_answers', 'appeal_answers', '2021-08-29 09:36:15', '2021-08-29 09:36:15'),
(82, 'read_appeal_answers', 'appeal_answers', '2021-08-29 09:36:15', '2021-08-29 09:36:15'),
(83, 'edit_appeal_answers', 'appeal_answers', '2021-08-29 09:36:15', '2021-08-29 09:36:15'),
(84, 'add_appeal_answers', 'appeal_answers', '2021-08-29 09:36:16', '2021-08-29 09:36:16'),
(85, 'delete_appeal_answers', 'appeal_answers', '2021-08-29 09:36:16', '2021-08-29 09:36:16');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(6, 2),
(6, 3),
(7, 1),
(7, 2),
(7, 3),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(11, 3),
(12, 1),
(12, 3),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(16, 3),
(17, 1),
(17, 3),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(21, 3),
(22, 1),
(22, 3),
(23, 1),
(24, 1),
(25, 1),
(31, 1),
(31, 3),
(32, 1),
(32, 3),
(33, 1),
(33, 3),
(34, 1),
(34, 3),
(35, 1),
(35, 3),
(36, 1),
(36, 2),
(36, 3),
(37, 1),
(37, 2),
(37, 3),
(38, 1),
(39, 1),
(39, 2),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(81, 1),
(81, 2),
(82, 1),
(82, 2),
(83, 1),
(84, 1),
(85, 1);

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(10) UNSIGNED NOT NULL,
  `uz` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `uz`, `ru`, `created_at`, `updated_at`) VALUES
(1, 'Andijon viloyati', 'Андижанская область', '2021-08-27 04:02:54', '2021-08-29 08:06:22'),
(2, 'Buxoro viloyati', 'Бухарская область', '2021-08-27 04:03:30', '2021-08-29 08:06:06'),
(3, 'Jizzax viloyati', 'Джизакская область', '2021-08-27 04:03:51', '2021-08-29 08:05:52'),
(4, 'Qashqadaryo viloyati', 'Кашкадарьинская область', '2021-08-27 04:04:08', '2021-08-29 08:05:33'),
(5, 'Namangan viloyati', 'Наманганская область', '2021-08-27 04:04:27', '2021-08-29 08:06:35'),
(6, 'Navoiy viloyati', 'Навоийская область', '2021-08-27 04:04:47', '2021-08-29 08:06:50'),
(7, 'Samarqand viloyati', 'Самаркандская область', '2021-08-27 04:05:08', '2021-08-29 08:07:06'),
(8, 'Surxondaryo viloyati', 'Сурхандарьинская область', '2021-08-27 04:05:22', '2021-08-29 08:07:26'),
(9, 'Sirdaryo viloyati', 'Сырдарьинская область', '2021-08-27 04:05:45', '2021-08-29 08:08:10'),
(10, 'Toshkent viloyati', 'Ташкентская область', '2021-08-27 04:06:01', '2021-08-29 08:08:32'),
(11, 'Toshkent shaxri', 'Город Ташкент', '2021-08-27 04:06:21', '2021-08-29 08:08:50'),
(12, 'Farg\'ona viloyati', 'Ферганская область', '2021-08-27 04:06:41', '2021-08-29 08:09:05'),
(13, 'Xorazm viloyati', 'Хорезмская область', '2021-08-27 04:06:57', '2021-08-29 08:09:21'),
(14, 'Qoraqalpog\'iston Respublikasi', 'Республика Каракалпакстан', '2021-08-27 04:07:22', '2021-08-29 08:09:43');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2021-08-26 01:40:28', '2021-08-26 01:40:28'),
(2, 'user', 'Normal User', '2021-08-26 01:40:28', '2021-08-26 01:40:28'),
(3, 'moderator', 'Moderator 1', '2021-08-26 07:48:04', '2021-08-26 07:48:04');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int(10) UNSIGNED NOT NULL,
  `uz` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `uz`, `ru`, `created_at`, `updated_at`) VALUES
(2, 'Urug\'chilik', 'Семеноводство', '2021-08-27 04:34:31', '2021-08-29 08:04:51'),
(3, 'Kasallik va zararkunandalarga qarshi kurashish', 'Борьба с болезнями и вредителями', '2021-08-27 04:34:56', '2021-08-29 08:04:31'),
(4, 'Agromaslahatlar', 'Агросоветы', '2021-08-27 04:35:12', '2021-08-29 08:03:52'),
(5, 'Mineral o\'g\'itlar', 'Удобрения', '2021-08-27 04:35:28', '2021-08-29 08:03:33'),
(6, 'Produktiv/ratsional sug\'orish', 'Продуктивное/рациональное орошение', '2021-08-27 04:36:00', '2021-08-29 08:03:13'),
(7, 'Qishloq xo\'jaligi texnikasi', 'Сельхозтехника', '2021-08-27 04:36:16', '2021-08-29 08:02:26'),
(8, 'Mevachilik', 'Выращивание фруктов', '2021-08-27 04:36:32', '2021-08-29 08:02:05'),
(9, 'Sabzavotchilik', 'Овощеводство', '2021-08-27 04:36:45', '2021-08-29 08:01:54'),
(10, 'Bog\'dorchilik', 'Садоводство', '2021-08-27 04:36:57', '2021-08-29 07:55:09'),
(11, 'Issiqxona xo\'jaligi', 'Тепличное хозяйство', '2021-08-27 04:37:17', '2021-08-29 07:54:48'),
(12, 'Dorivor va ziravor o\'simliklar', 'Лекарственные растения', '2021-08-27 04:37:34', '2021-08-29 07:54:23'),
(13, 'Sertifikatlash', 'Сертификация', '2021-08-27 04:37:46', '2021-08-29 07:53:59'),
(14, 'Imtiyozlar va subsidiyalar', 'Льготы и субсидии', '2021-08-27 04:38:21', '2021-08-29 07:53:39'),
(16, 'Yerdan foydalanish', 'Землепользование', '2021-08-27 04:38:37', '2021-08-29 07:52:26'),
(17, 'Tuproqni baholash', 'Оценка качество почвы', '2021-08-27 04:38:54', '2021-08-29 07:52:10');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'Site Title', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'Site Description', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', '', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', NULL, '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', '', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'AgroChat', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'AgroChat shahsiy Cabinet', '', 'text', 2, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', 'settings\\August2021\\TcVzTBjN7cIxQQyPvn97.jpg', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', NULL, '', 'text', 1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `individual` tinyint(10) DEFAULT NULL,
  `data` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `phone`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`, `individual`, `data`) VALUES
(1, 1, 'Asadbek', NULL, 'asad@email.com', 'users/default.png', NULL, '$2y$10$B2PgKSVQq7wp/5X6wqv6Le947kkbGs7tzyE0t1vkZSvzaTbgyFake', 'UZFXlOdmAfPQ3XZrVEplMMfU5mB0DoBG1HOl0qVbyE4VeCtVDvUdftoVuafy', NULL, '2021-08-26 01:43:28', '2021-08-26 01:43:29', NULL, NULL),
(2, 2, 'USer 1', NULL, 'user@gmail.com', 'users/default.png', NULL, '$2y$10$xazL6cmEUIuIlozqifW9UurN9kFMCOZhBSbirjOCERRU3AGTgVoJa', '4DsQDpH7HwDtudEKcMjupyPi4j1aHAbZR0lSGseclF7KT23ODQBlWZbtBqi8', '{\"locale\":\"en\"}', '2021-08-26 07:50:24', '2021-08-26 07:50:24', NULL, NULL),
(4, 2, 'Asadbek', NULL, 'g2@gmaill.com', 'users/default.png', NULL, '$2y$10$RwHefsSUj8/ndEE75FPSJexqyzd6vwYcxVOEvwRnQjVCjqu/RkUSq', NULL, NULL, '2021-08-28 03:11:40', '2021-08-28 03:11:41', NULL, NULL),
(7, 2, 'Asadbek', NULL, 'asadbek@gmail.com', 'users/default.png', NULL, '$2y$10$sMCV4Qj2IuVoUFHCVA0flevBSnXtYhD/mmMRtyHq7zrNrGzEcNQBi', NULL, NULL, '2021-08-28 07:42:03', '2021-08-28 07:42:04', NULL, NULL),
(8, 2, 'SARDOR', NULL, 'sardorchek@gmail.com', 'users/default.png', NULL, '$2y$10$0NJmJtPEtexJuh4ZIGr.eurBidnVTqCmNnT/U6HVYn2/1wtC2R0rG', NULL, NULL, '2021-08-28 07:44:51', '2021-08-28 07:44:52', NULL, NULL),
(12, 2, ';', NULL, 'sardor@gmail.com', 'users/default.png', NULL, '$2y$10$nWVi1FqbJFOA55TVPR0vT.qcCFWlvfRG6u0DCZIJhZ7kmugNjxgAS', NULL, NULL, '2021-08-28 09:36:46', '2021-08-28 09:36:46', NULL, NULL),
(13, 2, 'yusuf', NULL, 'adburazzakovusuf@gmail.com', 'users/default.png', NULL, '$2y$10$WGgyLt8KTOM2ENbg4eMJ2u.Ben4SpJu5lXXB81iU.2teyhkZrBZr.', NULL, NULL, '2021-08-29 06:39:11', '2021-08-29 06:39:12', NULL, NULL),
(14, 2, 'adasd', NULL, 'abdurazzakovusuf@gmail.com', 'users/default.png', NULL, '$2y$10$zeNL1MwzoX8/2Rab8ieHTOOVYrlLpwX6upTTAK/YL5/2BIE05aKw2', NULL, NULL, '2021-08-29 06:43:59', '2021-08-29 06:43:59', NULL, NULL),
(15, 2, 'My name is Muhammad', NULL, 'admin@admiin.com', 'users/default.png', NULL, '$2y$10$NUR2xN3hVs1e.Xa3YBKbBeaSistHUA8KWiyS7Pr2hptB9JeMeW/5u', NULL, NULL, '2021-08-29 07:08:23', '2021-08-29 07:08:24', NULL, NULL),
(16, 2, 'yusuf', NULL, 'yusuf@gmail.com', 'users/default.png', NULL, '$2y$10$lKzf09TEddpIZltfX1h2PesHti2xBRgrQ1XhwOey1f7uyQSnmYhdG', NULL, NULL, '2021-08-29 08:35:54', '2021-08-29 08:35:54', NULL, NULL),
(17, 2, 'yusuf', NULL, 'yusuf@gmaail.com', 'users/default.png', NULL, '$2y$10$JK8SkyGFYLP2wh5fMvI1MuL527.pgVnzMevSjAMxHrONV4RurDvLy', NULL, NULL, '2021-08-29 08:43:44', '2021-08-29 08:43:45', NULL, NULL),
(18, 2, 'Sardor Yusupov', NULL, 'sardor13@gmail.com', 'users/default.png', NULL, '$2y$10$XWIMclqX1WuOXBmteWIH2OsJCuOcND/.n29ERHmcE83pwgUycAUFO', NULL, NULL, '2021-08-29 09:31:27', '2021-08-29 09:31:27', NULL, NULL),
(19, 2, 'Tester1', NULL, 'a@b.com', 'users/default.png', NULL, '$2y$10$RTL8LxIZHF6VMdNsutejo.95iR0y4Q.SNQYej8oD3Q7Wz74fVMZ3.', 'IdETpvytNOBQKqy8k6Aj5xfV9HQPkgZkQgoUxzXLMcvJVzozckWFAgv8okKR', '{\"locale\":\"en\"}', '2021-08-29 10:34:30', '2021-08-29 10:34:30', NULL, NULL),
(20, 2, 'POPPL', NULL, 'asad@asad.com', 'users/default.png', NULL, '$2y$10$GUg/J.mJkDACSMWG2fvfQu.getvGnd30rVzzvoL.1G3U0b0m4G6IC', '3k1eVH8TKUyhmhndM1Lwo54pcBY5AfrGvmlgdwn4mEi3WkurUu1fNfKrLHJIasdasdasd', '{\"locale\":\"en\"}', '2021-08-29 11:03:17', '2021-08-29 11:03:17', NULL, NULL),
(25, 2, 'Asadbek Fayzulloev', NULL, 'markoletter0@gmail.com', 'users/default.png', NULL, '$2y$10$efid5JysawfLgQRPp99iPe8TAp3O9Bj.Qx9O7NmVrtEIizEV7Ng.S', NULL, NULL, '2021-08-29 13:48:38', '2021-08-29 13:48:39', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `websockets_statistics_entries`
--

CREATE TABLE `websockets_statistics_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `app_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peak_connection_count` int(11) NOT NULL,
  `websocket_message_count` int(11) NOT NULL,
  `api_message_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appeals`
--
ALTER TABLE `appeals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appeal_answers`
--
ALTER TABLE `appeal_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Indexes for table `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

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
  ADD KEY `permissions_key_index` (`key`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- Indexes for table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actions`
--
ALTER TABLE `actions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appeals`
--
ALTER TABLE `appeals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `appeal_answers`
--
ALTER TABLE `appeal_answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
