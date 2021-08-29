/*
 Navicat Premium Data Transfer

 Source Server         : smartdevelop.uz
 Source Server Type    : MySQL
 Source Server Version : 50727
 Source Host           : smartdevelop.uz:3306
 Source Schema         : u1417549_chatbot

 Target Server Type    : MySQL
 Target Server Version : 50727
 File Encoding         : 65001

 Date: 29/08/2021 10:58:52
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for actions
-- ----------------------------
DROP TABLE IF EXISTS `actions`;
CREATE TABLE `actions`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uz` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ru` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of actions
-- ----------------------------
INSERT INTO `actions` VALUES (1, 'Задать вопрос', 'Задать вопрос', '2021-08-27 08:23:47', '2021-08-27 08:23:47');

-- ----------------------------
-- Table structure for appeals
-- ----------------------------
DROP TABLE IF EXISTS `appeals`;
CREATE TABLE `appeals`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `provider_id` int(11) NULL DEFAULT NULL,
  `region` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of appeals
-- ----------------------------
INSERT INTO `appeals` VALUES (1, 'Salom dunyo', 1, NULL, '9', '10', 1, '2021-08-28 10:48:04', '2021-08-28 10:48:04');
INSERT INTO `appeals` VALUES (2, 'Salom bu mening murojatim', 1, NULL, '11', '14', 1, '2021-08-28 11:16:16', '2021-08-28 11:16:16');
INSERT INTO `appeals` VALUES (3, 'Salom', 1, NULL, '10', '10', 1, '2021-08-28 11:19:38', '2021-08-28 11:19:38');
INSERT INTO `appeals` VALUES (4, '13', 1, NULL, '1', '10', 1, '2021-08-28 11:27:24', '2021-08-28 11:27:24');
INSERT INTO `appeals` VALUES (5, 'Ok', 1, NULL, '10', '10', 1, '2021-08-28 11:30:32', '2021-08-28 11:30:32');
INSERT INTO `appeals` VALUES (6, 'Savol yoq', 1, NULL, '10', '8', 1, '2021-08-28 11:32:35', '2021-08-28 11:32:35');
INSERT INTO `appeals` VALUES (7, 'Salom bu meni murjatim', 1, NULL, '13', '10', 1, '2021-08-28 11:52:11', '2021-08-28 11:52:11');
INSERT INTO `appeals` VALUES (8, 'Salom good boy', 1, NULL, '8', '17', 1, '2021-08-28 11:55:04', '2021-08-28 11:55:04');
INSERT INTO `appeals` VALUES (9, 'Salom gggggg', 1, NULL, '11', '6', 1, '2021-08-28 11:57:55', '2021-08-28 11:57:55');
INSERT INTO `appeals` VALUES (10, 'Salom wwww', 1, NULL, '10', '10', 1, '2021-08-28 12:11:14', '2021-08-28 12:11:14');
INSERT INTO `appeals` VALUES (11, '12', 1, NULL, '1', '13', 1, '2021-08-28 12:13:30', '2021-08-28 12:13:30');
INSERT INTO `appeals` VALUES (12, 'Salom', 1, NULL, '7', '2', 1, '2021-08-28 12:18:15', '2021-08-28 12:18:15');
INSERT INTO `appeals` VALUES (13, 'Salom Savol bor edi', 1, NULL, '12', '8', 1, '2021-08-28 12:27:22', '2021-08-28 12:27:22');
INSERT INTO `appeals` VALUES (14, 'Salomrgwv', 11, NULL, '9', '13', 1, '2021-08-28 12:35:44', '2021-08-28 12:35:44');

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `categories_slug_unique`(`slug`) USING BTREE,
  INDEX `categories_parent_id_foreign`(`parent_id`) USING BTREE,
  CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------

-- ----------------------------
-- Table structure for data_rows
-- ----------------------------
DROP TABLE IF EXISTS `data_rows`;
CREATE TABLE `data_rows`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `browse` tinyint(1) NOT NULL DEFAULT 1,
  `read` tinyint(1) NOT NULL DEFAULT 1,
  `edit` tinyint(1) NOT NULL DEFAULT 1,
  `add` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 1,
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `data_rows_data_type_id_foreign`(`data_type_id`) USING BTREE,
  CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 53 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_rows
-- ----------------------------
INSERT INTO `data_rows` VALUES (1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1);
INSERT INTO `data_rows` VALUES (2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2);
INSERT INTO `data_rows` VALUES (3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, NULL, 3);
INSERT INTO `data_rows` VALUES (4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, NULL, 4);
INSERT INTO `data_rows` VALUES (5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, NULL, 5);
INSERT INTO `data_rows` VALUES (6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 6);
INSERT INTO `data_rows` VALUES (7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7);
INSERT INTO `data_rows` VALUES (8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, NULL, 8);
INSERT INTO `data_rows` VALUES (9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":0}', 10);
INSERT INTO `data_rows` VALUES (10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11);
INSERT INTO `data_rows` VALUES (11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, NULL, 12);
INSERT INTO `data_rows` VALUES (12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1);
INSERT INTO `data_rows` VALUES (13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2);
INSERT INTO `data_rows` VALUES (14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3);
INSERT INTO `data_rows` VALUES (15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4);
INSERT INTO `data_rows` VALUES (16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1);
INSERT INTO `data_rows` VALUES (17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2);
INSERT INTO `data_rows` VALUES (18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3);
INSERT INTO `data_rows` VALUES (19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4);
INSERT INTO `data_rows` VALUES (20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5);
INSERT INTO `data_rows` VALUES (21, 1, 'role_id', 'text', 'Role', 1, 1, 1, 1, 1, 1, NULL, 9);
INSERT INTO `data_rows` VALUES (25, 6, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1);
INSERT INTO `data_rows` VALUES (26, 6, 'uz', 'text', 'Uz', 1, 1, 1, 1, 1, 1, '{}', 2);
INSERT INTO `data_rows` VALUES (27, 6, 'ru', 'text', 'Ru', 1, 1, 1, 1, 1, 1, '{}', 3);
INSERT INTO `data_rows` VALUES (28, 6, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, '{}', 4);
INSERT INTO `data_rows` VALUES (29, 6, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5);
INSERT INTO `data_rows` VALUES (30, 7, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1);
INSERT INTO `data_rows` VALUES (31, 7, 'text', 'rich_text_box', 'Text', 1, 1, 1, 0, 0, 0, '{}', 2);
INSERT INTO `data_rows` VALUES (32, 7, 'user_id', 'checkbox', 'User Id', 0, 0, 0, 0, 0, 0, '{}', 3);
INSERT INTO `data_rows` VALUES (33, 7, 'provider_id', 'text', 'Provider Id', 0, 1, 1, 0, 0, 0, '{}', 5);
INSERT INTO `data_rows` VALUES (34, 7, 'region', 'checkbox', 'Region', 1, 0, 0, 0, 0, 0, '{}', 6);
INSERT INTO `data_rows` VALUES (35, 7, 'route', 'text', 'Route', 1, 0, 0, 0, 0, 0, '{}', 8);
INSERT INTO `data_rows` VALUES (36, 7, 'type', 'text', 'Type', 1, 1, 1, 0, 0, 0, '{}', 10);
INSERT INTO `data_rows` VALUES (37, 7, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 12);
INSERT INTO `data_rows` VALUES (38, 7, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 13);
INSERT INTO `data_rows` VALUES (39, 7, 'appeal_belongsto_user_relationship', 'relationship', 'users', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"appeals\",\"pivot\":\"0\",\"taggable\":\"0\"}', 4);
INSERT INTO `data_rows` VALUES (40, 7, 'appeal_belongsto_region_relationship', 'relationship', 'regions', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Region\",\"table\":\"regions\",\"type\":\"belongsTo\",\"column\":\"id\",\"key\":\"id\",\"label\":\"uz\",\"pivot_table\":\"appeals\",\"pivot\":\"0\",\"taggable\":\"0\"}', 7);
INSERT INTO `data_rows` VALUES (41, 8, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1);
INSERT INTO `data_rows` VALUES (42, 8, 'uz', 'text', 'Uz', 1, 1, 1, 1, 1, 1, '{}', 2);
INSERT INTO `data_rows` VALUES (43, 8, 'ru', 'text', 'Ru', 0, 1, 1, 1, 1, 1, '{}', 3);
INSERT INTO `data_rows` VALUES (44, 8, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 4);
INSERT INTO `data_rows` VALUES (45, 8, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5);
INSERT INTO `data_rows` VALUES (46, 11, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1);
INSERT INTO `data_rows` VALUES (47, 11, 'uz', 'text', 'Uz', 1, 1, 1, 1, 1, 1, '{}', 2);
INSERT INTO `data_rows` VALUES (48, 11, 'ru', 'text', 'Ru', 1, 1, 1, 1, 1, 1, '{}', 3);
INSERT INTO `data_rows` VALUES (49, 11, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 4);
INSERT INTO `data_rows` VALUES (50, 11, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5);
INSERT INTO `data_rows` VALUES (51, 7, 'appeal_belongsto_action_relationship', 'relationship', 'actions', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Action\",\"table\":\"actions\",\"type\":\"belongsTo\",\"column\":\"type\",\"key\":\"id\",\"label\":\"uz\",\"pivot_table\":\"actions\",\"pivot\":\"0\",\"taggable\":\"0\"}', 11);
INSERT INTO `data_rows` VALUES (52, 7, 'appeal_belongsto_route_relationship', 'relationship', 'routes', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Routes\",\"table\":\"routes\",\"type\":\"belongsTo\",\"column\":\"route\",\"key\":\"id\",\"label\":\"uz\",\"pivot_table\":\"actions\",\"pivot\":\"0\",\"taggable\":\"0\"}', 9);

-- ----------------------------
-- Table structure for data_types
-- ----------------------------
DROP TABLE IF EXISTS `data_types`;
CREATE TABLE `data_types`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `model_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `policy_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `controller` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT 0,
  `server_side` tinyint(4) NOT NULL DEFAULT 0,
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `data_types_name_unique`(`name`) USING BTREE,
  UNIQUE INDEX `data_types_slug_unique`(`slug`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_types
-- ----------------------------
INSERT INTO `data_types` VALUES (1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', '', 1, 0, NULL, '2021-08-26 04:40:27', '2021-08-26 04:40:27');
INSERT INTO `data_types` VALUES (2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2021-08-26 04:40:27', '2021-08-26 04:40:27');
INSERT INTO `data_types` VALUES (3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController', '', 1, 0, NULL, '2021-08-26 04:40:27', '2021-08-26 04:40:27');
INSERT INTO `data_types` VALUES (6, 'routes', 'routes', 'Route', 'Routes', NULL, 'App\\Models\\Routes', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2021-08-26 09:57:12', '2021-08-26 09:57:12');
INSERT INTO `data_types` VALUES (7, 'appeals', 'appeals', 'Appeal', 'Appeals', NULL, 'App\\Models\\Appeal', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2021-08-26 10:37:44', '2021-08-28 10:53:42');
INSERT INTO `data_types` VALUES (8, 'regions', 'regions', 'Region', 'Regions', NULL, 'App\\Models\\Region', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2021-08-27 06:55:19', '2021-08-27 06:55:19');
INSERT INTO `data_types` VALUES (11, 'actions', 'actions', 'Action', 'Actions', NULL, 'App\\Models\\Action', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2021-08-27 08:22:54', '2021-08-27 08:22:54');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for menu_items
-- ----------------------------
DROP TABLE IF EXISTS `menu_items`;
CREATE TABLE `menu_items`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `parent_id` int(11) NULL DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `parameters` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `menu_items_menu_id_foreign`(`menu_id`) USING BTREE,
  CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menu_items
-- ----------------------------
INSERT INTO `menu_items` VALUES (1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2021-08-26 04:40:27', '2021-08-26 04:40:27', 'voyager.dashboard', NULL);
INSERT INTO `menu_items` VALUES (2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 6, '2021-08-26 04:40:27', '2021-08-28 10:55:25', 'voyager.media.index', NULL);
INSERT INTO `menu_items` VALUES (3, 1, 'Users', '', '_self', 'voyager-person', NULL, NULL, 3, '2021-08-26 04:40:27', '2021-08-26 04:40:27', 'voyager.users.index', NULL);
INSERT INTO `menu_items` VALUES (4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, NULL, 2, '2021-08-26 04:40:27', '2021-08-26 04:40:27', 'voyager.roles.index', NULL);
INSERT INTO `menu_items` VALUES (5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 7, '2021-08-26 04:40:27', '2021-08-28 10:55:25', NULL, NULL);
INSERT INTO `menu_items` VALUES (6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 1, '2021-08-26 04:40:27', '2021-08-26 09:50:07', 'voyager.menus.index', NULL);
INSERT INTO `menu_items` VALUES (7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 2, '2021-08-26 04:40:27', '2021-08-26 09:50:07', 'voyager.database.index', NULL);
INSERT INTO `menu_items` VALUES (8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 3, '2021-08-26 04:40:28', '2021-08-26 09:50:07', 'voyager.compass.index', NULL);
INSERT INTO `menu_items` VALUES (9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 4, '2021-08-26 04:40:28', '2021-08-26 09:50:07', 'voyager.bread.index', NULL);
INSERT INTO `menu_items` VALUES (10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 8, '2021-08-26 04:40:28', '2021-08-28 10:55:27', 'voyager.settings.index', NULL);
INSERT INTO `menu_items` VALUES (12, 1, 'Buttons', '', '_self', 'voyager-edit', '#000000', NULL, 4, '2021-08-26 09:49:46', '2021-08-28 10:58:00', NULL, '');
INSERT INTO `menu_items` VALUES (14, 1, 'Routes', '', '_self', NULL, NULL, 12, 1, '2021-08-26 09:57:12', '2021-08-27 07:01:25', 'voyager.routes.index', NULL);
INSERT INTO `menu_items` VALUES (15, 1, 'Appeals', '', '_self', 'voyager-mail', '#000000', NULL, 5, '2021-08-26 10:37:44', '2021-08-28 10:56:50', 'voyager.appeals.index', 'null');
INSERT INTO `menu_items` VALUES (16, 1, 'Regions', '', '_self', NULL, NULL, 12, 2, '2021-08-27 06:55:19', '2021-08-27 07:01:25', 'voyager.regions.index', NULL);
INSERT INTO `menu_items` VALUES (19, 1, 'Actions', '', '_self', NULL, NULL, 12, 3, '2021-08-27 08:22:54', '2021-08-28 10:55:22', 'voyager.actions.index', NULL);

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `menus_name_unique`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES (1, 'admin', '2021-08-26 04:40:27', '2021-08-26 04:40:27');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 61 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (31, '0000_00_00_000000_create_websockets_statistics_entries_table', 1);
INSERT INTO `migrations` VALUES (32, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (33, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (34, '2016_01_01_000000_add_voyager_user_fields', 1);
INSERT INTO `migrations` VALUES (35, '2016_01_01_000000_create_data_types_table', 1);
INSERT INTO `migrations` VALUES (36, '2016_01_01_000000_create_pages_table', 1);
INSERT INTO `migrations` VALUES (37, '2016_01_01_000000_create_posts_table', 1);
INSERT INTO `migrations` VALUES (38, '2016_02_15_204651_create_categories_table', 1);
INSERT INTO `migrations` VALUES (39, '2016_05_19_173453_create_menu_table', 1);
INSERT INTO `migrations` VALUES (40, '2016_10_21_190000_create_roles_table', 1);
INSERT INTO `migrations` VALUES (41, '2016_10_21_190000_create_settings_table', 1);
INSERT INTO `migrations` VALUES (42, '2016_11_30_135954_create_permission_table', 1);
INSERT INTO `migrations` VALUES (43, '2016_11_30_141208_create_permission_role_table', 1);
INSERT INTO `migrations` VALUES (44, '2016_12_26_201236_data_types__add__server_side', 1);
INSERT INTO `migrations` VALUES (45, '2017_01_13_000000_add_route_to_menu_items_table', 1);
INSERT INTO `migrations` VALUES (46, '2017_01_14_005015_create_translations_table', 1);
INSERT INTO `migrations` VALUES (47, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1);
INSERT INTO `migrations` VALUES (48, '2017_03_06_000000_add_controller_to_data_types_table', 1);
INSERT INTO `migrations` VALUES (49, '2017_04_11_000000_alter_post_nullable_fields_table', 1);
INSERT INTO `migrations` VALUES (50, '2017_04_21_000000_add_order_to_data_rows_table', 1);
INSERT INTO `migrations` VALUES (51, '2017_07_05_210000_add_policyname_to_data_types_table', 1);
INSERT INTO `migrations` VALUES (52, '2017_08_05_000000_add_group_to_settings_table', 1);
INSERT INTO `migrations` VALUES (53, '2017_11_26_013050_add_user_role_relationship', 1);
INSERT INTO `migrations` VALUES (54, '2017_11_26_015000_create_user_roles_table', 1);
INSERT INTO `migrations` VALUES (55, '2018_03_11_000000_add_user_settings', 1);
INSERT INTO `migrations` VALUES (56, '2018_03_14_000000_add_details_to_data_types_table', 1);
INSERT INTO `migrations` VALUES (57, '2018_03_16_000000_make_settings_value_nullable', 1);
INSERT INTO `migrations` VALUES (58, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (59, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (60, '2021_08_25_105829_create_notifications_table', 1);

-- ----------------------------
-- Table structure for notifications
-- ----------------------------
DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `notifications_notifiable_type_notifiable_id_index`(`notifiable_type`, `notifiable_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of notifications
-- ----------------------------

-- ----------------------------
-- Table structure for pages
-- ----------------------------
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `meta_keywords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `status` enum('ACTIVE','INACTIVE') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `pages_slug_unique`(`slug`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pages
-- ----------------------------

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permission_role
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role`  (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `permission_role_permission_id_index`(`permission_id`) USING BTREE,
  INDEX `permission_role_role_id_index`(`role_id`) USING BTREE,
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permission_role
-- ----------------------------
INSERT INTO `permission_role` VALUES (1, 1);
INSERT INTO `permission_role` VALUES (2, 1);
INSERT INTO `permission_role` VALUES (2, 2);
INSERT INTO `permission_role` VALUES (3, 1);
INSERT INTO `permission_role` VALUES (4, 1);
INSERT INTO `permission_role` VALUES (5, 1);
INSERT INTO `permission_role` VALUES (6, 1);
INSERT INTO `permission_role` VALUES (6, 2);
INSERT INTO `permission_role` VALUES (6, 3);
INSERT INTO `permission_role` VALUES (7, 1);
INSERT INTO `permission_role` VALUES (7, 2);
INSERT INTO `permission_role` VALUES (7, 3);
INSERT INTO `permission_role` VALUES (8, 1);
INSERT INTO `permission_role` VALUES (9, 1);
INSERT INTO `permission_role` VALUES (10, 1);
INSERT INTO `permission_role` VALUES (11, 1);
INSERT INTO `permission_role` VALUES (11, 3);
INSERT INTO `permission_role` VALUES (12, 1);
INSERT INTO `permission_role` VALUES (12, 3);
INSERT INTO `permission_role` VALUES (13, 1);
INSERT INTO `permission_role` VALUES (14, 1);
INSERT INTO `permission_role` VALUES (15, 1);
INSERT INTO `permission_role` VALUES (16, 1);
INSERT INTO `permission_role` VALUES (16, 3);
INSERT INTO `permission_role` VALUES (17, 1);
INSERT INTO `permission_role` VALUES (17, 3);
INSERT INTO `permission_role` VALUES (18, 1);
INSERT INTO `permission_role` VALUES (19, 1);
INSERT INTO `permission_role` VALUES (20, 1);
INSERT INTO `permission_role` VALUES (21, 1);
INSERT INTO `permission_role` VALUES (21, 3);
INSERT INTO `permission_role` VALUES (22, 1);
INSERT INTO `permission_role` VALUES (22, 3);
INSERT INTO `permission_role` VALUES (23, 1);
INSERT INTO `permission_role` VALUES (24, 1);
INSERT INTO `permission_role` VALUES (25, 1);
INSERT INTO `permission_role` VALUES (31, 1);
INSERT INTO `permission_role` VALUES (31, 2);
INSERT INTO `permission_role` VALUES (31, 3);
INSERT INTO `permission_role` VALUES (32, 1);
INSERT INTO `permission_role` VALUES (32, 2);
INSERT INTO `permission_role` VALUES (32, 3);
INSERT INTO `permission_role` VALUES (33, 1);
INSERT INTO `permission_role` VALUES (33, 3);
INSERT INTO `permission_role` VALUES (34, 1);
INSERT INTO `permission_role` VALUES (34, 3);
INSERT INTO `permission_role` VALUES (35, 1);
INSERT INTO `permission_role` VALUES (35, 3);
INSERT INTO `permission_role` VALUES (36, 1);
INSERT INTO `permission_role` VALUES (36, 2);
INSERT INTO `permission_role` VALUES (36, 3);
INSERT INTO `permission_role` VALUES (37, 1);
INSERT INTO `permission_role` VALUES (37, 2);
INSERT INTO `permission_role` VALUES (37, 3);
INSERT INTO `permission_role` VALUES (38, 1);
INSERT INTO `permission_role` VALUES (38, 2);
INSERT INTO `permission_role` VALUES (39, 1);
INSERT INTO `permission_role` VALUES (39, 2);
INSERT INTO `permission_role` VALUES (40, 1);
INSERT INTO `permission_role` VALUES (40, 2);
INSERT INTO `permission_role` VALUES (41, 1);
INSERT INTO `permission_role` VALUES (42, 1);
INSERT INTO `permission_role` VALUES (43, 1);
INSERT INTO `permission_role` VALUES (44, 1);
INSERT INTO `permission_role` VALUES (45, 1);
INSERT INTO `permission_role` VALUES (56, 1);
INSERT INTO `permission_role` VALUES (57, 1);
INSERT INTO `permission_role` VALUES (58, 1);
INSERT INTO `permission_role` VALUES (59, 1);
INSERT INTO `permission_role` VALUES (60, 1);

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `permissions_key_index`(`key`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 61 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 'browse_admin', NULL, '2021-08-26 04:40:28', '2021-08-26 04:40:28');
INSERT INTO `permissions` VALUES (2, 'browse_bread', NULL, '2021-08-26 04:40:28', '2021-08-26 04:40:28');
INSERT INTO `permissions` VALUES (3, 'browse_database', NULL, '2021-08-26 04:40:28', '2021-08-26 04:40:28');
INSERT INTO `permissions` VALUES (4, 'browse_media', NULL, '2021-08-26 04:40:28', '2021-08-26 04:40:28');
INSERT INTO `permissions` VALUES (5, 'browse_compass', NULL, '2021-08-26 04:40:28', '2021-08-26 04:40:28');
INSERT INTO `permissions` VALUES (6, 'browse_menus', 'menus', '2021-08-26 04:40:28', '2021-08-26 04:40:28');
INSERT INTO `permissions` VALUES (7, 'read_menus', 'menus', '2021-08-26 04:40:28', '2021-08-26 04:40:28');
INSERT INTO `permissions` VALUES (8, 'edit_menus', 'menus', '2021-08-26 04:40:28', '2021-08-26 04:40:28');
INSERT INTO `permissions` VALUES (9, 'add_menus', 'menus', '2021-08-26 04:40:28', '2021-08-26 04:40:28');
INSERT INTO `permissions` VALUES (10, 'delete_menus', 'menus', '2021-08-26 04:40:28', '2021-08-26 04:40:28');
INSERT INTO `permissions` VALUES (11, 'browse_roles', 'roles', '2021-08-26 04:40:28', '2021-08-26 04:40:28');
INSERT INTO `permissions` VALUES (12, 'read_roles', 'roles', '2021-08-26 04:40:28', '2021-08-26 04:40:28');
INSERT INTO `permissions` VALUES (13, 'edit_roles', 'roles', '2021-08-26 04:40:28', '2021-08-26 04:40:28');
INSERT INTO `permissions` VALUES (14, 'add_roles', 'roles', '2021-08-26 04:40:28', '2021-08-26 04:40:28');
INSERT INTO `permissions` VALUES (15, 'delete_roles', 'roles', '2021-08-26 04:40:28', '2021-08-26 04:40:28');
INSERT INTO `permissions` VALUES (16, 'browse_users', 'users', '2021-08-26 04:40:28', '2021-08-26 04:40:28');
INSERT INTO `permissions` VALUES (17, 'read_users', 'users', '2021-08-26 04:40:28', '2021-08-26 04:40:28');
INSERT INTO `permissions` VALUES (18, 'edit_users', 'users', '2021-08-26 04:40:28', '2021-08-26 04:40:28');
INSERT INTO `permissions` VALUES (19, 'add_users', 'users', '2021-08-26 04:40:28', '2021-08-26 04:40:28');
INSERT INTO `permissions` VALUES (20, 'delete_users', 'users', '2021-08-26 04:40:28', '2021-08-26 04:40:28');
INSERT INTO `permissions` VALUES (21, 'browse_settings', 'settings', '2021-08-26 04:40:28', '2021-08-26 04:40:28');
INSERT INTO `permissions` VALUES (22, 'read_settings', 'settings', '2021-08-26 04:40:28', '2021-08-26 04:40:28');
INSERT INTO `permissions` VALUES (23, 'edit_settings', 'settings', '2021-08-26 04:40:28', '2021-08-26 04:40:28');
INSERT INTO `permissions` VALUES (24, 'add_settings', 'settings', '2021-08-26 04:40:28', '2021-08-26 04:40:28');
INSERT INTO `permissions` VALUES (25, 'delete_settings', 'settings', '2021-08-26 04:40:28', '2021-08-26 04:40:28');
INSERT INTO `permissions` VALUES (31, 'browse_routes', 'routes', '2021-08-26 09:57:12', '2021-08-26 09:57:12');
INSERT INTO `permissions` VALUES (32, 'read_routes', 'routes', '2021-08-26 09:57:12', '2021-08-26 09:57:12');
INSERT INTO `permissions` VALUES (33, 'edit_routes', 'routes', '2021-08-26 09:57:12', '2021-08-26 09:57:12');
INSERT INTO `permissions` VALUES (34, 'add_routes', 'routes', '2021-08-26 09:57:12', '2021-08-26 09:57:12');
INSERT INTO `permissions` VALUES (35, 'delete_routes', 'routes', '2021-08-26 09:57:12', '2021-08-26 09:57:12');
INSERT INTO `permissions` VALUES (36, 'browse_appeals', 'appeals', '2021-08-26 10:37:44', '2021-08-26 10:37:44');
INSERT INTO `permissions` VALUES (37, 'read_appeals', 'appeals', '2021-08-26 10:37:44', '2021-08-26 10:37:44');
INSERT INTO `permissions` VALUES (38, 'edit_appeals', 'appeals', '2021-08-26 10:37:44', '2021-08-26 10:37:44');
INSERT INTO `permissions` VALUES (39, 'add_appeals', 'appeals', '2021-08-26 10:37:44', '2021-08-26 10:37:44');
INSERT INTO `permissions` VALUES (40, 'delete_appeals', 'appeals', '2021-08-26 10:37:44', '2021-08-26 10:37:44');
INSERT INTO `permissions` VALUES (41, 'browse_regions', 'regions', '2021-08-27 06:55:19', '2021-08-27 06:55:19');
INSERT INTO `permissions` VALUES (42, 'read_regions', 'regions', '2021-08-27 06:55:19', '2021-08-27 06:55:19');
INSERT INTO `permissions` VALUES (43, 'edit_regions', 'regions', '2021-08-27 06:55:19', '2021-08-27 06:55:19');
INSERT INTO `permissions` VALUES (44, 'add_regions', 'regions', '2021-08-27 06:55:19', '2021-08-27 06:55:19');
INSERT INTO `permissions` VALUES (45, 'delete_regions', 'regions', '2021-08-27 06:55:19', '2021-08-27 06:55:19');
INSERT INTO `permissions` VALUES (56, 'browse_actions', 'actions', '2021-08-27 08:22:54', '2021-08-27 08:22:54');
INSERT INTO `permissions` VALUES (57, 'read_actions', 'actions', '2021-08-27 08:22:54', '2021-08-27 08:22:54');
INSERT INTO `permissions` VALUES (58, 'edit_actions', 'actions', '2021-08-27 08:22:54', '2021-08-27 08:22:54');
INSERT INTO `permissions` VALUES (59, 'add_actions', 'actions', '2021-08-27 08:22:54', '2021-08-27 08:22:54');
INSERT INTO `permissions` VALUES (60, 'delete_actions', 'actions', '2021-08-27 08:22:54', '2021-08-27 08:22:54');

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `excerpt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `meta_keywords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `status` enum('PUBLISHED','DRAFT','PENDING') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `posts_slug_unique`(`slug`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of posts
-- ----------------------------

-- ----------------------------
-- Table structure for regions
-- ----------------------------
DROP TABLE IF EXISTS `regions`;
CREATE TABLE `regions`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uz` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ru` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of regions
-- ----------------------------
INSERT INTO `regions` VALUES (1, 'Андижон вилояти', 'Андижанская область', '2021-08-27 07:02:54', '2021-08-27 08:15:58');
INSERT INTO `regions` VALUES (2, 'Бухоро вилояти', 'Бухарская область', '2021-08-27 07:03:30', '2021-08-27 08:15:40');
INSERT INTO `regions` VALUES (3, 'Жиззах вилояти', 'Джизакская область', '2021-08-27 07:03:51', '2021-08-27 08:15:23');
INSERT INTO `regions` VALUES (4, 'Қашқадарё вилояти', 'Кашкадарьинская область', '2021-08-27 07:04:08', '2021-08-27 08:15:04');
INSERT INTO `regions` VALUES (5, 'Наманган вилояти', 'Наманганская область', '2021-08-27 07:04:27', '2021-08-27 08:14:42');
INSERT INTO `regions` VALUES (6, 'Навоий вилояти', 'Навоийская область', '2021-08-27 07:04:47', '2021-08-27 08:14:02');
INSERT INTO `regions` VALUES (7, 'Самарқанд вилояти', 'Самаркандская область', '2021-08-27 07:05:08', '2021-08-27 08:13:38');
INSERT INTO `regions` VALUES (8, 'Сурхондарё вилояти', 'Сурхандарьинская область', '2021-08-27 07:05:22', '2021-08-27 08:13:21');
INSERT INTO `regions` VALUES (9, 'Сирдарё вилояти', 'Сырдарьинская область', '2021-08-27 07:05:45', '2021-08-27 08:13:03');
INSERT INTO `regions` VALUES (10, 'Тошкент вилояти', 'Ташкентская область', '2021-08-27 07:06:01', '2021-08-27 08:12:42');
INSERT INTO `regions` VALUES (11, 'Тошкент шаҳри', 'Город Ташкент', '2021-08-27 07:06:21', '2021-08-27 08:12:25');
INSERT INTO `regions` VALUES (12, 'Фарғона вилояти', 'Ферганская область', '2021-08-27 07:06:41', '2021-08-27 08:11:50');
INSERT INTO `regions` VALUES (13, 'Хоразм вилояти', 'Хорезмская область', '2021-08-27 07:06:57', '2021-08-27 08:11:34');
INSERT INTO `regions` VALUES (14, 'Қорақалпоғистон Республикаси', 'Республика Каракалпакстан', '2021-08-27 07:07:22', '2021-08-27 08:11:13');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `roles_name_unique`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'admin', 'Administrator', '2021-08-26 04:40:28', '2021-08-26 04:40:28');
INSERT INTO `roles` VALUES (2, 'user', 'Normal User', '2021-08-26 04:40:28', '2021-08-26 04:40:28');
INSERT INTO `roles` VALUES (3, 'moderator', 'Moderator 1', '2021-08-26 10:48:04', '2021-08-26 10:48:04');

-- ----------------------------
-- Table structure for routes
-- ----------------------------
DROP TABLE IF EXISTS `routes`;
CREATE TABLE `routes`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uz` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ru` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of routes
-- ----------------------------
INSERT INTO `routes` VALUES (2, 'Уруғчилик', 'семеноводство', '2021-08-27 07:34:31', '2021-08-27 07:34:31');
INSERT INTO `routes` VALUES (3, 'Касаллик ва зараркунандаларга қарши кураш', 'Борьба с болезнями и вредителями', '2021-08-27 07:34:56', '2021-08-27 07:34:56');
INSERT INTO `routes` VALUES (4, 'Агромаслаҳатлар', 'Агросоветы', '2021-08-27 07:35:12', '2021-08-27 07:35:12');
INSERT INTO `routes` VALUES (5, 'Минерал ўғитлар', 'удобрения', '2021-08-27 07:35:28', '2021-08-27 07:35:28');
INSERT INTO `routes` VALUES (6, 'Продуктив/рационал суғориш', 'продуктивное/рациональное орошение', '2021-08-27 07:36:00', '2021-08-27 07:36:00');
INSERT INTO `routes` VALUES (7, 'Қишлоқ хўжалиги техникаси', 'сельхозтехника', '2021-08-27 07:36:16', '2021-08-27 07:36:16');
INSERT INTO `routes` VALUES (8, 'Мевачилик', 'выращивание фруктов', '2021-08-27 07:36:32', '2021-08-27 07:36:32');
INSERT INTO `routes` VALUES (9, 'Сабзавотчилик', 'Овощеводство', '2021-08-27 07:36:45', '2021-08-27 07:36:45');
INSERT INTO `routes` VALUES (10, 'Боғдорчилик', 'садоводство', '2021-08-27 07:36:57', '2021-08-27 07:36:57');
INSERT INTO `routes` VALUES (11, 'Иссиқхона хўжалиги', 'тепличное хозяйство', '2021-08-27 07:37:17', '2021-08-27 07:37:17');
INSERT INTO `routes` VALUES (12, 'Доривор ва зиравор ўсимликлар', 'лекарственные растения', '2021-08-27 07:37:34', '2021-08-27 07:37:34');
INSERT INTO `routes` VALUES (13, 'Сертификатлаш', 'сертификация', '2021-08-27 07:37:46', '2021-08-27 07:37:46');
INSERT INTO `routes` VALUES (14, 'Имтиёзлар ва субсидиялар', 'льготы и субсидии', '2021-08-27 07:38:21', '2021-08-27 07:38:21');
INSERT INTO `routes` VALUES (16, 'Ердан фойдаланиш', 'землепользование', '2021-08-27 07:38:37', '2021-08-27 07:38:37');
INSERT INTO `routes` VALUES (17, 'Тупроқни баҳолаш', 'оценка качество почвы', '2021-08-27 07:38:54', '2021-08-27 07:38:54');

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `settings_key_unique`(`key`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES (1, 'site.title', 'Site Title', 'Site Title', '', 'text', 1, 'Site');
INSERT INTO `settings` VALUES (2, 'site.description', 'Site Description', 'Site Description', '', 'text', 2, 'Site');
INSERT INTO `settings` VALUES (3, 'site.logo', 'Site Logo', '', '', 'image', 3, 'Site');
INSERT INTO `settings` VALUES (4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', NULL, '', 'text', 4, 'Site');
INSERT INTO `settings` VALUES (5, 'admin.bg_image', 'Admin Background Image', '', '', 'image', 5, 'Admin');
INSERT INTO `settings` VALUES (6, 'admin.title', 'Admin Title', 'AgroChat', '', 'text', 1, 'Admin');
INSERT INTO `settings` VALUES (7, 'admin.description', 'Admin Description', 'AgroChat shahsiy Cabinet', '', 'text', 2, 'Admin');
INSERT INTO `settings` VALUES (9, 'admin.icon_image', 'Admin Icon Image', 'settings\\August2021\\TcVzTBjN7cIxQQyPvn97.jpg', '', 'image', 4, 'Admin');
INSERT INTO `settings` VALUES (10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', NULL, '', 'text', 1, 'Admin');

-- ----------------------------
-- Table structure for translations
-- ----------------------------
DROP TABLE IF EXISTS `translations`;
CREATE TABLE `translations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `table_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `translations_table_name_column_name_foreign_key_locale_unique`(`table_name`, `column_name`, `foreign_key`, `locale`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of translations
-- ----------------------------

-- ----------------------------
-- Table structure for user_roles
-- ----------------------------
DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE `user_roles`  (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`user_id`, `role_id`) USING BTREE,
  INDEX `user_roles_user_id_index`(`user_id`) USING BTREE,
  INDEX `user_roles_role_id_index`(`role_id`) USING BTREE,
  CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_roles
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `settings` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `individual` tinyint(10) NULL DEFAULT NULL,
  `data` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE,
  INDEX `users_role_id_foreign`(`role_id`) USING BTREE,
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 1, 'Asadbek', NULL, 'asad@email.com', 'users/default.png', NULL, '$2y$10$B2PgKSVQq7wp/5X6wqv6Le947kkbGs7tzyE0t1vkZSvzaTbgyFake', 'kibzfp7V41A2z43XekRnHfsiyaas1mGOtmjZbrX3sQxRwrSnEKJZ5ifmPReG', NULL, '2021-08-26 04:43:28', '2021-08-26 04:43:29', NULL, NULL);
INSERT INTO `users` VALUES (2, 2, 'USer 1', NULL, 'user@gmail.com', 'users/default.png', NULL, '$2y$10$xazL6cmEUIuIlozqifW9UurN9kFMCOZhBSbirjOCERRU3AGTgVoJa', '4DsQDpH7HwDtudEKcMjupyPi4j1aHAbZR0lSGseclF7KT23ODQBlWZbtBqi8', '{\"locale\":\"en\"}', '2021-08-26 10:50:24', '2021-08-26 10:50:24', NULL, NULL);
INSERT INTO `users` VALUES (3, 2, 'Asadbek', NULL, 'markollet0@gmail.com', 'users/default.png', NULL, '$2y$10$O08cBID2pgrX0o30QhvrsOxlXENaArwHkJikbXItdUcQqo07ElG5G', NULL, NULL, '2021-08-27 12:59:28', '2021-08-27 12:59:28', NULL, NULL);
INSERT INTO `users` VALUES (4, 2, 'Asadbek', NULL, 'g2@gmaill.com', 'users/default.png', NULL, '$2y$10$RwHefsSUj8/ndEE75FPSJexqyzd6vwYcxVOEvwRnQjVCjqu/RkUSq', NULL, NULL, '2021-08-28 06:11:40', '2021-08-28 06:11:41', NULL, NULL);
INSERT INTO `users` VALUES (7, 2, 'Asadbek', NULL, 'asadbek@gmail.com', 'users/default.png', NULL, '$2y$10$sMCV4Qj2IuVoUFHCVA0flevBSnXtYhD/mmMRtyHq7zrNrGzEcNQBi', NULL, NULL, '2021-08-28 10:42:03', '2021-08-28 10:42:04', NULL, NULL);
INSERT INTO `users` VALUES (8, 2, 'SARDOR', NULL, 'sardorchek@gmail.com', 'users/default.png', NULL, '$2y$10$0NJmJtPEtexJuh4ZIGr.eurBidnVTqCmNnT/U6HVYn2/1wtC2R0rG', NULL, NULL, '2021-08-28 10:44:51', '2021-08-28 10:44:52', NULL, NULL);
INSERT INTO `users` VALUES (11, 2, 'Asadbek', NULL, 'markoletter0@gmail.com', 'users/default.png', NULL, '$2y$10$6pLh0Uo8/XWyti1huWVDl.oK0W1wXV.RPBFbjfgt.qYfuX9qi7Hz6', NULL, NULL, '2021-08-28 12:27:12', '2021-08-28 12:27:12', NULL, NULL);
INSERT INTO `users` VALUES (12, 2, ';', NULL, 'sardor@gmail.com', 'users/default.png', NULL, '$2y$10$nWVi1FqbJFOA55TVPR0vT.qcCFWlvfRG6u0DCZIJhZ7kmugNjxgAS', NULL, NULL, '2021-08-28 12:36:46', '2021-08-28 12:36:46', NULL, NULL);

-- ----------------------------
-- Table structure for websockets_statistics_entries
-- ----------------------------
DROP TABLE IF EXISTS `websockets_statistics_entries`;
CREATE TABLE `websockets_statistics_entries`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `app_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `peak_connection_count` int(11) NOT NULL,
  `websocket_message_count` int(11) NOT NULL,
  `api_message_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of websockets_statistics_entries
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
