/*
 Navicat Premium Data Transfer

 Source Server         : myHOSt
 Source Server Type    : MySQL
 Source Server Version : 80019
 Source Host           : localhost:3306
 Source Schema         : laravel_agromy

 Target Server Type    : MySQL
 Target Server Version : 80019
 File Encoding         : 65001

 Date: 15/09/2021 00:49:50
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for actions
-- ----------------------------
DROP TABLE IF EXISTS `actions`;
CREATE TABLE `actions`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `uz` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ru` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of actions
-- ----------------------------
INSERT INTO `actions` VALUES (1, 'Savol berish', 'Задать вопрос', '2021-08-27 10:23:47', '2021-08-29 12:51:31');

-- ----------------------------
-- Table structure for appeal_answers
-- ----------------------------
DROP TABLE IF EXISTS `appeal_answers`;
CREATE TABLE `appeal_answers`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `appeal_id` int NOT NULL,
  `answered_by` int NOT NULL,
  `text` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of appeal_answers
-- ----------------------------
INSERT INTO `appeal_answers` VALUES (1, 1, 1, 'sexdcrfvtgybhunjm', '2021-08-29 14:36:47', '2021-08-29 14:36:47');
INSERT INTO `appeal_answers` VALUES (2, 2, 1, '998', '2021-08-29 14:40:34', '2021-08-29 14:40:34');
INSERT INTO `appeal_answers` VALUES (3, 14, 1, '<p>Asadbek bu</p>', '2021-08-29 14:43:14', '2021-08-29 14:43:14');
INSERT INTO `appeal_answers` VALUES (4, 14, 1, '<p>Salom<br />\r\n&nbsp;</p>', '2021-08-29 15:32:34', '2021-08-29 15:32:34');
INSERT INTO `appeal_answers` VALUES (5, 34, 1, 'Salom', '2021-09-05 06:59:21', '2021-09-05 06:59:21');

-- ----------------------------
-- Table structure for appeals
-- ----------------------------
DROP TABLE IF EXISTS `appeals`;
CREATE TABLE `appeals`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NULL DEFAULT NULL,
  `provider_id` int NULL DEFAULT NULL,
  `region` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `responsible` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '1',
  `answer_text` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `to_expert` tinyint NULL DEFAULT 0,
  `to_user` tinyint NULL DEFAULT 0,
  `title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 54 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of appeals
-- ----------------------------
INSERT INTO `appeals` VALUES (1, 'Salom dunyo', 1, NULL, '9', '10', 1, '2021-08-28 12:48:04', '2021-08-28 12:48:04', NULL, NULL, NULL, NULL, 'This is title message');
INSERT INTO `appeals` VALUES (2, 'Salom bu mening murojatim', 1, NULL, '11', '14', 1, '2021-08-28 13:16:16', '2021-08-28 13:16:16', NULL, NULL, NULL, NULL, 'This is title message');
INSERT INTO `appeals` VALUES (3, 'Salom', 1, NULL, '10', '10', 1, '2021-08-28 13:19:38', '2021-08-28 13:19:38', NULL, NULL, NULL, NULL, 'This is title message');
INSERT INTO `appeals` VALUES (4, '13', 1, NULL, '1', '10', 1, '2021-08-28 13:27:24', '2021-08-28 13:27:24', NULL, NULL, NULL, NULL, 'This is title message');
INSERT INTO `appeals` VALUES (5, 'Ok', 1, NULL, '10', '10', 1, '2021-08-28 13:30:32', '2021-08-28 13:30:32', NULL, NULL, NULL, NULL, 'This is title message');
INSERT INTO `appeals` VALUES (6, 'Savol yoq', 1, NULL, '10', '8', 1, '2021-08-28 13:32:35', '2021-08-28 13:32:35', NULL, NULL, NULL, NULL, 'This is title message');
INSERT INTO `appeals` VALUES (7, 'Salom bu meni murjatim', 1, NULL, '13', '10', 1, '2021-08-28 13:52:11', '2021-08-28 13:52:11', NULL, NULL, NULL, NULL, 'This is title message');
INSERT INTO `appeals` VALUES (8, 'Salom good boy', 1, NULL, '8', '17', 1, '2021-08-28 13:55:04', '2021-09-05 08:10:00', '36', 'lkjn;jkbk;jb;kjbn;j', 1, 1, 'This is title message');
INSERT INTO `appeals` VALUES (9, 'Salom gggggg', 1, NULL, '11', '6', 1, '2021-08-28 13:57:55', '2021-08-28 13:57:55', NULL, NULL, NULL, NULL, 'This is title message');
INSERT INTO `appeals` VALUES (10, 'Salom wwww', 1, NULL, '10', '10', 1, '2021-08-28 14:11:14', '2021-08-28 14:11:14', NULL, NULL, NULL, NULL, 'This is title message');
INSERT INTO `appeals` VALUES (11, '12', 1, NULL, '1', '13', 1, '2021-08-28 14:13:30', '2021-08-28 14:13:30', NULL, NULL, NULL, NULL, 'This is title message');
INSERT INTO `appeals` VALUES (12, 'Salom', 1, NULL, '7', '2', 1, '2021-08-28 14:18:15', '2021-08-28 14:18:15', NULL, NULL, NULL, NULL, 'This is title message');
INSERT INTO `appeals` VALUES (13, 'Salom Savol bor edi', 1, NULL, '12', '8', 1, '2021-08-28 14:27:22', '2021-08-28 14:27:22', NULL, NULL, NULL, NULL, 'This is title message');
INSERT INTO `appeals` VALUES (14, 'Salomrgwv', 11, NULL, '9', '13', 1, '2021-08-28 14:35:44', '2021-08-28 14:35:44', NULL, NULL, NULL, NULL, 'This is title message');
INSERT INTO `appeals` VALUES (15, 'Assalomu alaykum', 19, NULL, '3', '14', 1, '2021-08-29 17:45:56', '2021-08-29 17:45:56', NULL, NULL, NULL, NULL, 'This is title message');
INSERT INTO `appeals` VALUES (16, 'salom', 23, NULL, '12', '8', 1, '2021-08-29 18:39:23', '2021-08-29 18:39:23', NULL, NULL, NULL, NULL, 'This is title message');
INSERT INTO `appeals` VALUES (17, 'Assalomu alaykum', 24, NULL, '9', '10', 1, '2021-08-29 18:46:46', '2021-08-29 18:46:46', NULL, NULL, NULL, NULL, 'This is title message');
INSERT INTO `appeals` VALUES (18, 'fggrterwefd', 25, NULL, '1', '11', 1, '2021-08-29 18:48:56', '2021-08-29 18:48:56', NULL, NULL, NULL, NULL, 'This is title message');
INSERT INTO `appeals` VALUES (19, 'asdfg', 12, NULL, '13', '14', 1, '2021-08-30 07:50:59', '2021-08-30 07:50:59', NULL, NULL, NULL, NULL, 'This is title message');
INSERT INTO `appeals` VALUES (20, 'dal;jdadlk', 30, NULL, '5', '4', 1, '2021-08-30 08:22:11', '2021-08-30 08:22:11', NULL, NULL, NULL, NULL, 'This is title message');
INSERT INTO `appeals` VALUES (21, 'asdfgh', 29, NULL, '11', '13', 1, '2021-08-30 08:26:21', '2021-08-30 08:26:21', NULL, NULL, NULL, NULL, 'This is title message');
INSERT INTO `appeals` VALUES (22, 'ariza', 12, NULL, '11', '13', 1, '2021-08-30 08:30:58', '2021-08-30 08:30:58', NULL, NULL, NULL, NULL, 'This is title message');
INSERT INTO `appeals` VALUES (23, 'osjca\'jc\'a', 12, NULL, '11', '11', 1, '2021-08-30 08:33:54', '2021-08-30 08:33:54', NULL, NULL, NULL, NULL, 'This is title message');
INSERT INTO `appeals` VALUES (24, 'sajaksd', 31, NULL, '10', '9', 1, '2021-08-30 09:41:46', '2021-08-30 09:41:46', NULL, NULL, NULL, NULL, 'This is title message');
INSERT INTO `appeals` VALUES (25, 'aaaaaaaaaaa', 32, NULL, '14', '10', 1, '2021-08-30 09:43:50', '2021-08-30 09:43:50', NULL, NULL, NULL, NULL, 'This is title message');
INSERT INTO `appeals` VALUES (26, 'asdfghjkl', 12, NULL, '14', '16', 1, '2021-08-30 09:47:25', '2021-08-30 09:47:25', NULL, NULL, NULL, NULL, 'This is title message');
INSERT INTO `appeals` VALUES (27, 'asdfghjkl', 12, NULL, '14', '16', 1, '2021-08-30 09:49:29', '2021-08-30 09:49:29', NULL, NULL, NULL, NULL, 'This is title message');
INSERT INTO `appeals` VALUES (28, 'maning birinchi arizam', 29, NULL, '11', '13', 1, '2021-08-30 13:08:00', '2021-09-05 16:56:37', '48', 'Salom bu javob', 1, NULL, 'This is title message');
INSERT INTO `appeals` VALUES (29, 'wakjfdjkd', 25, NULL, '13', '11', 1, '2021-08-30 13:23:13', '2021-09-03 08:07:26', '15', NULL, NULL, NULL, 'This is title message');
INSERT INTO `appeals` VALUES (30, 'a', 12, NULL, '13', '16', 1, '2021-09-02 11:44:00', '2021-09-03 08:07:12', '8', NULL, NULL, NULL, 'This is title message');
INSERT INTO `appeals` VALUES (31, 'safdfihaw', 25, NULL, '6', '7', 1, '2021-09-03 13:17:56', '2021-09-03 13:17:56', '1', NULL, NULL, NULL, 'This is title message');
INSERT INTO `appeals` VALUES (32, 'qe,hfbqejfrbfqe', 25, NULL, '11', '8', 1, '2021-09-03 14:31:29', '2021-09-03 14:31:29', '1', NULL, NULL, NULL, 'This is title message');
INSERT INTO `appeals` VALUES (33, 'aksjfnaklsfnalksf', 34, NULL, '13', '6', 1, '2021-09-03 15:05:00', '2021-09-05 11:20:11', '1', NULL, 1, 1, 'This is title message');
INSERT INTO `appeals` VALUES (34, 'aefawefqwf', 35, NULL, '10', '9', 1, '2021-09-03 18:08:47', '2021-09-05 11:20:08', '1', 'ssdvD', 1, 1, 'This is title message');
INSERT INTO `appeals` VALUES (35, 'mnjnjjnj', 38, NULL, '14', '17', 1, '2021-09-05 12:02:32', '2021-09-05 12:02:32', '1', NULL, 0, 0, 'This is title message');
INSERT INTO `appeals` VALUES (36, 'Assalomu alaykum', 38, NULL, '10', '10', 1, '2021-09-05 12:40:14', '2021-09-05 12:40:14', '1', NULL, 0, 0, 'This is title message');
INSERT INTO `appeals` VALUES (37, 'assalomu alaykum', 38, NULL, '14', '17', 1, '2021-09-05 12:42:21', '2021-09-05 12:42:21', '1', NULL, 0, 0, 'This is title message');
INSERT INTO `appeals` VALUES (38, 'Assalomu alaykum', 38, NULL, '10', '4', 1, '2021-09-05 12:47:42', '2021-09-05 12:47:42', '1', NULL, 0, 0, 'This is title message');
INSERT INTO `appeals` VALUES (39, 'Salom', 40, NULL, '2', '7', 1, '2021-09-05 12:48:53', '2021-09-05 12:48:53', '1', NULL, 0, 0, 'This is title message');
INSERT INTO `appeals` VALUES (40, 'assalomu alaykum', 41, NULL, '10', '4', 1, '2021-09-05 12:51:55', '2021-09-05 12:51:55', '1', NULL, 0, 0, 'This is title message');
INSERT INTO `appeals` VALUES (41, 'Assalomu alaykum', 42, NULL, '10', '4', 1, '2021-09-05 12:55:19', '2021-09-05 12:55:19', '1', NULL, 0, 0, 'This is title message');
INSERT INTO `appeals` VALUES (42, 'Assalomu alaykum', 43, NULL, '10', '4', 1, '2021-09-05 13:01:02', '2021-09-05 13:01:02', '1', NULL, 0, 0, 'This is title message');
INSERT INTO `appeals` VALUES (43, 'cdkcnkcdf', 43, NULL, '14', '17', 1, '2021-09-05 13:06:26', '2021-09-05 13:06:26', '1', NULL, 0, 0, 'This is title message');
INSERT INTO `appeals` VALUES (44, 'dscds', 44, NULL, '14', '17', 1, '2021-09-05 13:07:50', '2021-09-05 13:07:50', '1', NULL, 0, 0, 'This is title message');
INSERT INTO `appeals` VALUES (45, 'assalomu alaykum', 45, NULL, '10', '4', 1, '2021-09-05 13:14:29', '2021-09-05 13:14:29', '1', NULL, 0, 0, 'This is title message');
INSERT INTO `appeals` VALUES (46, 'assalomu alaykum', 45, NULL, '10', '4', 1, '2021-09-05 13:16:25', '2021-09-05 13:16:25', '1', NULL, 0, 0, 'This is title message');
INSERT INTO `appeals` VALUES (47, 'Assalomu alaykum', 46, NULL, '10', '4', 1, '2021-09-05 13:28:05', '2021-09-05 13:28:05', '1', NULL, 0, 0, 'This is title message');
INSERT INTO `appeals` VALUES (48, 'Assalomu alaytkum', 46, NULL, '10', '4', 1, '2021-09-05 13:29:44', '2021-09-05 13:29:44', '1', NULL, 0, 0, 'This is title message');
INSERT INTO `appeals` VALUES (49, 'Salom AGRO ChAT', 47, NULL, '6', '13', 1, '2021-09-05 13:59:06', '2021-09-05 14:03:44', '48', 'Valeykum salom', 1, 0, 'This is title message');
INSERT INTO `appeals` VALUES (50, 'zgtdyfugln', 50, NULL, '12', '9', 1, '2021-09-05 15:26:40', '2021-09-05 15:26:40', '1', NULL, 0, 0, 'This is title message');
INSERT INTO `appeals` VALUES (51, 'fqwfqwfqwfqw', 52, NULL, '12', '8', 1, '2021-09-05 15:31:54', '2021-09-05 15:31:54', '1', NULL, 0, 0, 'This is title message');
INSERT INTO `appeals` VALUES (52, 'wadwawd', 53, NULL, '14', '13', 1, '2021-09-05 15:36:32', '2021-09-05 15:36:32', '1', NULL, 0, 0, 'This is title message');
INSERT INTO `appeals` VALUES (53, 'dawfagagweg', 54, NULL, '13', '7', 1, '2021-09-05 16:51:03', '2021-09-05 16:51:03', '1', NULL, 0, 0, 'This is title message');
INSERT INTO `appeals` VALUES (54, 'adwaEFLIUUERH GIJWE', 47, NULL, '1', '10', 1, '2021-09-14 16:08:19', '2021-09-14 16:08:19', '1', NULL, 0, 0, 'This is title message');

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int UNSIGNED NULL DEFAULT NULL,
  `order` int NOT NULL DEFAULT 1,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `categories_slug_unique`(`slug`) USING BTREE,
  INDEX `categories_parent_id_foreign`(`parent_id`) USING BTREE,
  CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of categories
-- ----------------------------

-- ----------------------------
-- Table structure for conversations
-- ----------------------------
DROP TABLE IF EXISTS `conversations`;
CREATE TABLE `conversations`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `appeal_id` int NOT NULL,
  `user_id` int NOT NULL,
  `is_answer` tinyint NOT NULL,
  `is_closed` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `text` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of conversations
-- ----------------------------
INSERT INTO `conversations` VALUES (1, 54, 1, 1, '0', '2021-09-06 20:10:06', NULL, 'sALOM');
INSERT INTO `conversations` VALUES (2, 54, 2, 0, '0', '2021-09-06 23:10:06', NULL, 'aweg aweg aweg aweg awe gew aweg awega weg awg aweg aweg aweg awg aweg aweg aweewg ewga w');
INSERT INTO `conversations` VALUES (3, 54, 56, 1, '0', '2021-09-14 19:39:03', '2021-09-14 19:39:03', 'adsdsd');
INSERT INTO `conversations` VALUES (4, 54, 56, 1, '0', '2021-09-14 19:40:35', '2021-09-14 19:40:35', 'adsdsd');
INSERT INTO `conversations` VALUES (5, 54, 56, 1, '0', '2021-09-14 19:41:07', '2021-09-14 19:41:07', 'adsdsd');
INSERT INTO `conversations` VALUES (6, 54, 56, 1, '0', '2021-09-14 19:41:19', '2021-09-14 19:41:19', 'Salom');
INSERT INTO `conversations` VALUES (7, 54, 56, 1, '0', '2021-09-14 19:42:26', '2021-09-14 19:42:26', 'Salom');
INSERT INTO `conversations` VALUES (8, 54, 56, 1, '0', '2021-09-14 19:42:49', '2021-09-14 19:42:49', 'Salom');
INSERT INTO `conversations` VALUES (9, 54, 56, 1, '0', '2021-09-14 19:43:06', '2021-09-14 19:43:06', 'awdawdawd');
INSERT INTO `conversations` VALUES (10, 54, 56, 1, '0', '2021-09-14 19:44:05', '2021-09-14 19:44:05', 'awdawdawd');
INSERT INTO `conversations` VALUES (11, 54, 56, 1, '0', '2021-09-14 19:44:32', '2021-09-14 19:44:32', 'awdawdawd');

-- ----------------------------
-- Table structure for data_rows
-- ----------------------------
DROP TABLE IF EXISTS `data_rows`;
CREATE TABLE `data_rows`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `data_type_id` int UNSIGNED NOT NULL,
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
  `order` int NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `data_rows_data_type_id_foreign`(`data_type_id`) USING BTREE,
  CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 114 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of data_rows
-- ----------------------------
INSERT INTO `data_rows` VALUES (1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '{}', 1);
INSERT INTO `data_rows` VALUES (2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 2);
INSERT INTO `data_rows` VALUES (3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, '{}', 3);
INSERT INTO `data_rows` VALUES (4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, '{}', 4);
INSERT INTO `data_rows` VALUES (5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, '{}', 5);
INSERT INTO `data_rows` VALUES (6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 6);
INSERT INTO `data_rows` VALUES (7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7);
INSERT INTO `data_rows` VALUES (8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, '{}', 8);
INSERT INTO `data_rows` VALUES (9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":\"0\",\"taggable\":\"0\"}', 10);
INSERT INTO `data_rows` VALUES (10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11);
INSERT INTO `data_rows` VALUES (11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, '{}', 12);
INSERT INTO `data_rows` VALUES (12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1);
INSERT INTO `data_rows` VALUES (13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2);
INSERT INTO `data_rows` VALUES (14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3);
INSERT INTO `data_rows` VALUES (15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4);
INSERT INTO `data_rows` VALUES (16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1);
INSERT INTO `data_rows` VALUES (17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2);
INSERT INTO `data_rows` VALUES (18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3);
INSERT INTO `data_rows` VALUES (19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4);
INSERT INTO `data_rows` VALUES (20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5);
INSERT INTO `data_rows` VALUES (21, 1, 'role_id', 'text', 'Role', 0, 1, 1, 1, 1, 1, '{}', 9);
INSERT INTO `data_rows` VALUES (25, 6, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1);
INSERT INTO `data_rows` VALUES (26, 6, 'uz', 'text', 'Uz', 1, 1, 1, 1, 1, 1, '{}', 2);
INSERT INTO `data_rows` VALUES (27, 6, 'ru', 'text', 'Ru', 1, 1, 1, 1, 1, 1, '{}', 3);
INSERT INTO `data_rows` VALUES (28, 6, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, '{}', 4);
INSERT INTO `data_rows` VALUES (29, 6, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5);
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
INSERT INTO `data_rows` VALUES (67, 18, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1);
INSERT INTO `data_rows` VALUES (68, 18, 'appeal_id', 'text', 'Appeal Id', 1, 1, 1, 1, 1, 1, '{}', 3);
INSERT INTO `data_rows` VALUES (69, 18, 'answered_by', 'text', 'Answered By', 1, 1, 1, 1, 1, 1, '{}', 4);
INSERT INTO `data_rows` VALUES (70, 18, 'text', 'text', 'Javob matni', 1, 1, 1, 1, 1, 1, '{}', 5);
INSERT INTO `data_rows` VALUES (71, 18, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 7);
INSERT INTO `data_rows` VALUES (72, 18, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 8);
INSERT INTO `data_rows` VALUES (73, 18, 'appeal_answer_belongsto_appeal_relationship', 'relationship', 'Appeal', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Appeal\",\"table\":\"appeals\",\"type\":\"belongsTo\",\"column\":\"appeal_id\",\"key\":\"id\",\"label\":\"text\",\"pivot_table\":\"actions\",\"pivot\":\"0\",\"taggable\":\"0\"}', 2);
INSERT INTO `data_rows` VALUES (74, 18, 'appeal_answer_belongsto_user_relationship', 'relationship', 'Moderator names', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"answered_by\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"actions\",\"pivot\":\"0\",\"taggable\":\"0\"}', 6);
INSERT INTO `data_rows` VALUES (75, 19, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1);
INSERT INTO `data_rows` VALUES (76, 19, 'text', 'text', 'Text', 1, 1, 1, 1, 1, 1, '{}', 2);
INSERT INTO `data_rows` VALUES (77, 19, 'user_id', 'text', 'User Id', 0, 1, 1, 1, 1, 1, '{}', 3);
INSERT INTO `data_rows` VALUES (78, 19, 'provider_id', 'text', 'Provider Id', 0, 0, 0, 0, 0, 0, '{}', 4);
INSERT INTO `data_rows` VALUES (79, 19, 'region', 'text', 'Region', 1, 1, 1, 1, 1, 1, '{}', 5);
INSERT INTO `data_rows` VALUES (80, 19, 'route', 'text', 'Route', 1, 1, 1, 1, 1, 1, '{}', 7);
INSERT INTO `data_rows` VALUES (81, 19, 'type', 'text', 'Type', 1, 1, 1, 1, 1, 1, '{}', 9);
INSERT INTO `data_rows` VALUES (82, 19, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 11);
INSERT INTO `data_rows` VALUES (83, 19, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 13);
INSERT INTO `data_rows` VALUES (84, 19, 'responsible', 'text', 'Responsible', 0, 1, 1, 1, 1, 1, '{}', 14);
INSERT INTO `data_rows` VALUES (85, 19, 'appeal_belongsto_user_relationship', 'relationship', 'Written By', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"actions\",\"pivot\":\"0\",\"taggable\":\"0\"}', 12);
INSERT INTO `data_rows` VALUES (86, 19, 'appeal_belongsto_user_relationship_1', 'relationship', 'Answered By', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"responsible\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"actions\",\"pivot\":\"0\",\"taggable\":\"0\"}', 15);
INSERT INTO `data_rows` VALUES (87, 19, 'appeal_belongsto_region_relationship', 'relationship', 'regions', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Region\",\"table\":\"regions\",\"type\":\"belongsTo\",\"column\":\"region\",\"key\":\"id\",\"label\":\"ru\",\"pivot_table\":\"actions\",\"pivot\":\"0\",\"taggable\":\"0\"}', 6);
INSERT INTO `data_rows` VALUES (88, 19, 'appeal_belongsto_route_relationship', 'relationship', 'routes', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Routes\",\"table\":\"routes\",\"type\":\"belongsTo\",\"column\":\"route\",\"key\":\"id\",\"label\":\"ru\",\"pivot_table\":\"actions\",\"pivot\":\"0\",\"taggable\":\"0\"}', 8);
INSERT INTO `data_rows` VALUES (89, 19, 'appeal_belongsto_action_relationship', 'relationship', 'actions', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Action\",\"table\":\"actions\",\"type\":\"belongsTo\",\"column\":\"type\",\"key\":\"id\",\"label\":\"ru\",\"pivot_table\":\"actions\",\"pivot\":\"0\",\"taggable\":\"0\"}', 10);
INSERT INTO `data_rows` VALUES (95, 25, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1);
INSERT INTO `data_rows` VALUES (96, 25, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 2);
INSERT INTO `data_rows` VALUES (97, 25, 'uz', 'text_area', 'Uzbek', 1, 1, 1, 1, 1, 1, '{}', 3);
INSERT INTO `data_rows` VALUES (98, 25, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 5);
INSERT INTO `data_rows` VALUES (99, 25, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6);
INSERT INTO `data_rows` VALUES (100, 25, 'ru', 'text_area', 'Русский', 1, 1, 1, 1, 1, 1, '{}', 4);
INSERT INTO `data_rows` VALUES (101, 19, 'answer_text', 'text', 'Answer Text', 0, 1, 1, 1, 1, 1, '{}', 16);
INSERT INTO `data_rows` VALUES (102, 19, 'to_expert', 'checkbox', 'To Expert', 0, 1, 1, 1, 1, 1, '{}', 17);
INSERT INTO `data_rows` VALUES (103, 19, 'to_user', 'checkbox', 'To User', 0, 1, 1, 1, 1, 1, '{}', 18);
INSERT INTO `data_rows` VALUES (104, 6, 'route_belongsto_user_relationship', 'relationship', 'Responsible', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"responsible\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"actions\",\"pivot\":\"0\",\"taggable\":\"0\"}', 6);
INSERT INTO `data_rows` VALUES (105, 6, 'responsible', 'text', 'Responsible', 1, 1, 1, 1, 1, 1, '{}', 6);
INSERT INTO `data_rows` VALUES (106, 1, 'phone', 'text', 'Phone', 0, 1, 1, 1, 1, 1, '{}', 4);
INSERT INTO `data_rows` VALUES (107, 1, 'email_verified_at', 'timestamp', 'Email Verified At', 0, 1, 1, 1, 1, 1, '{}', 7);
INSERT INTO `data_rows` VALUES (108, 1, 'individual', 'text', 'Individual', 0, 1, 1, 1, 1, 1, '{}', 13);
INSERT INTO `data_rows` VALUES (109, 1, 'data', 'text', 'Data', 0, 1, 1, 1, 1, 1, '{}', 14);
INSERT INTO `data_rows` VALUES (110, 1, 'position', 'text', 'Должность и род занятия', 0, 1, 1, 1, 1, 1, '{}', 15);
INSERT INTO `data_rows` VALUES (111, 1, 'place_of_work', 'text', 'Место работы и организация', 0, 1, 1, 1, 1, 1, '{}', 16);
INSERT INTO `data_rows` VALUES (112, 1, 'organization', 'text', 'Название организации', 0, 1, 1, 1, 1, 1, '{}', 17);
INSERT INTO `data_rows` VALUES (113, 1, 'activity', 'text', 'Направление деятельности', 0, 1, 1, 1, 1, 1, '{}', 18);

-- ----------------------------
-- Table structure for data_types
-- ----------------------------
DROP TABLE IF EXISTS `data_types`;
CREATE TABLE `data_types`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
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
  `server_side` tinyint NOT NULL DEFAULT 0,
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `data_types_name_unique`(`name`) USING BTREE,
  UNIQUE INDEX `data_types_slug_unique`(`slug`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of data_types
-- ----------------------------
INSERT INTO `data_types` VALUES (1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":\"name\",\"scope\":null}', '2021-08-26 06:40:27', '2021-09-05 15:19:47');
INSERT INTO `data_types` VALUES (2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2021-08-26 06:40:27', '2021-08-26 06:40:27');
INSERT INTO `data_types` VALUES (3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController', '', 1, 0, NULL, '2021-08-26 06:40:27', '2021-08-26 06:40:27');
INSERT INTO `data_types` VALUES (6, 'routes', 'routes', 'Route', 'Routes', NULL, 'App\\Models\\Routes', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2021-08-26 11:57:12', '2021-09-05 07:24:42');
INSERT INTO `data_types` VALUES (8, 'regions', 'regions', 'Region', 'Regions', NULL, 'App\\Models\\Region', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2021-08-27 08:55:19', '2021-08-27 08:55:19');
INSERT INTO `data_types` VALUES (11, 'actions', 'actions', 'Action', 'Actions', NULL, 'App\\Models\\Action', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2021-08-27 10:22:54', '2021-08-27 10:22:54');
INSERT INTO `data_types` VALUES (18, 'appeal_answers', 'appeal-answers', 'Appeal Answer', 'Appeal Answers', NULL, 'App\\Models\\AppealAnswer', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":\"currentUser\"}', '2021-08-29 14:36:13', '2021-08-29 18:27:39');
INSERT INTO `data_types` VALUES (19, 'appeals', 'appeals', 'Appeal', 'Appeals', NULL, 'App\\Models\\Appeal', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":\"text\",\"scope\":\"currentUser\"}', '2021-09-02 15:01:17', '2021-09-05 16:55:45');
INSERT INTO `data_types` VALUES (25, 'question_texts', 'question-texts', 'Question Text', 'Question Texts', NULL, 'App\\Models\\QuestionText', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2021-09-04 13:48:06', '2021-09-05 12:41:54');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for menu_items
-- ----------------------------
DROP TABLE IF EXISTS `menu_items`;
CREATE TABLE `menu_items`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `menu_id` int UNSIGNED NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `parent_id` int NULL DEFAULT NULL,
  `order` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `parameters` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `menu_items_menu_id_foreign`(`menu_id`) USING BTREE,
  CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of menu_items
-- ----------------------------
INSERT INTO `menu_items` VALUES (1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2021-08-26 06:40:27', '2021-08-26 06:40:27', 'voyager.dashboard', NULL);
INSERT INTO `menu_items` VALUES (2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 7, '2021-08-26 06:40:27', '2021-09-05 08:21:27', 'voyager.media.index', NULL);
INSERT INTO `menu_items` VALUES (3, 1, 'Users', '', '_self', 'voyager-person', NULL, NULL, 3, '2021-08-26 06:40:27', '2021-08-26 06:40:27', 'voyager.users.index', NULL);
INSERT INTO `menu_items` VALUES (4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, NULL, 2, '2021-08-26 06:40:27', '2021-08-26 06:40:27', 'voyager.roles.index', NULL);
INSERT INTO `menu_items` VALUES (5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 8, '2021-08-26 06:40:27', '2021-08-29 10:53:08', NULL, NULL);
INSERT INTO `menu_items` VALUES (6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 1, '2021-08-26 06:40:27', '2021-08-26 11:50:07', 'voyager.menus.index', NULL);
INSERT INTO `menu_items` VALUES (7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 2, '2021-08-26 06:40:27', '2021-08-26 11:50:07', 'voyager.database.index', NULL);
INSERT INTO `menu_items` VALUES (8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 3, '2021-08-26 06:40:28', '2021-08-26 11:50:07', 'voyager.compass.index', NULL);
INSERT INTO `menu_items` VALUES (9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 4, '2021-08-26 06:40:28', '2021-08-26 11:50:07', 'voyager.bread.index', NULL);
INSERT INTO `menu_items` VALUES (10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 9, '2021-08-26 06:40:28', '2021-08-29 10:53:10', 'voyager.settings.index', NULL);
INSERT INTO `menu_items` VALUES (12, 1, 'Buttons', '', '_self', 'voyager-edit', '#000000', NULL, 4, '2021-08-26 11:49:46', '2021-08-28 12:58:00', NULL, '');
INSERT INTO `menu_items` VALUES (14, 1, 'Routes', '', '_self', NULL, NULL, 12, 1, '2021-08-26 11:57:12', '2021-08-27 09:01:25', 'voyager.routes.index', NULL);
INSERT INTO `menu_items` VALUES (16, 1, 'Regions', '', '_self', NULL, NULL, 12, 2, '2021-08-27 08:55:19', '2021-08-27 09:01:25', 'voyager.regions.index', NULL);
INSERT INTO `menu_items` VALUES (19, 1, 'Actions', '', '_self', NULL, NULL, 12, 3, '2021-08-27 10:22:54', '2021-08-28 12:55:22', 'voyager.actions.index', NULL);
INSERT INTO `menu_items` VALUES (25, 1, 'Appeals', '', '_self', 'voyager-chat', '#000000', NULL, 6, '2021-09-02 15:01:25', '2021-09-05 08:21:54', 'voyager.appeals.index', 'null');
INSERT INTO `menu_items` VALUES (29, 1, 'Question Texts', '', '_self', 'voyager-pen', '#000000', NULL, 5, '2021-09-04 13:48:07', '2021-09-05 08:22:11', 'voyager.question-texts.index', 'null');

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `menus_name_unique`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES (1, 'admin', '2021-08-26 06:40:27', '2021-08-26 06:40:27');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 61 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

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
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `notifications_notifiable_type_notifiable_id_index`(`notifiable_type`, `notifiable_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of notifications
-- ----------------------------

-- ----------------------------
-- Table structure for pages
-- ----------------------------
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `author_id` int NOT NULL,
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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

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
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permission_role
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `permission_role_permission_id_index`(`permission_id`) USING BTREE,
  INDEX `permission_role_role_id_index`(`role_id`) USING BTREE,
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of permission_role
-- ----------------------------
INSERT INTO `permission_role` VALUES (1, 1);
INSERT INTO `permission_role` VALUES (1, 2);
INSERT INTO `permission_role` VALUES (1, 3);
INSERT INTO `permission_role` VALUES (1, 4);
INSERT INTO `permission_role` VALUES (2, 1);
INSERT INTO `permission_role` VALUES (2, 2);
INSERT INTO `permission_role` VALUES (2, 3);
INSERT INTO `permission_role` VALUES (2, 4);
INSERT INTO `permission_role` VALUES (3, 1);
INSERT INTO `permission_role` VALUES (3, 3);
INSERT INTO `permission_role` VALUES (3, 4);
INSERT INTO `permission_role` VALUES (4, 1);
INSERT INTO `permission_role` VALUES (4, 3);
INSERT INTO `permission_role` VALUES (4, 4);
INSERT INTO `permission_role` VALUES (5, 1);
INSERT INTO `permission_role` VALUES (5, 3);
INSERT INTO `permission_role` VALUES (6, 1);
INSERT INTO `permission_role` VALUES (6, 2);
INSERT INTO `permission_role` VALUES (6, 3);
INSERT INTO `permission_role` VALUES (6, 4);
INSERT INTO `permission_role` VALUES (7, 1);
INSERT INTO `permission_role` VALUES (7, 2);
INSERT INTO `permission_role` VALUES (7, 3);
INSERT INTO `permission_role` VALUES (7, 4);
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
INSERT INTO `permission_role` VALUES (16, 4);
INSERT INTO `permission_role` VALUES (17, 1);
INSERT INTO `permission_role` VALUES (17, 3);
INSERT INTO `permission_role` VALUES (17, 4);
INSERT INTO `permission_role` VALUES (18, 1);
INSERT INTO `permission_role` VALUES (18, 3);
INSERT INTO `permission_role` VALUES (19, 1);
INSERT INTO `permission_role` VALUES (19, 3);
INSERT INTO `permission_role` VALUES (20, 1);
INSERT INTO `permission_role` VALUES (20, 3);
INSERT INTO `permission_role` VALUES (21, 1);
INSERT INTO `permission_role` VALUES (21, 3);
INSERT INTO `permission_role` VALUES (22, 1);
INSERT INTO `permission_role` VALUES (22, 3);
INSERT INTO `permission_role` VALUES (23, 1);
INSERT INTO `permission_role` VALUES (23, 3);
INSERT INTO `permission_role` VALUES (24, 1);
INSERT INTO `permission_role` VALUES (24, 3);
INSERT INTO `permission_role` VALUES (25, 1);
INSERT INTO `permission_role` VALUES (25, 3);
INSERT INTO `permission_role` VALUES (31, 1);
INSERT INTO `permission_role` VALUES (31, 3);
INSERT INTO `permission_role` VALUES (31, 4);
INSERT INTO `permission_role` VALUES (32, 1);
INSERT INTO `permission_role` VALUES (32, 3);
INSERT INTO `permission_role` VALUES (32, 4);
INSERT INTO `permission_role` VALUES (33, 1);
INSERT INTO `permission_role` VALUES (33, 3);
INSERT INTO `permission_role` VALUES (34, 1);
INSERT INTO `permission_role` VALUES (34, 3);
INSERT INTO `permission_role` VALUES (35, 1);
INSERT INTO `permission_role` VALUES (35, 3);
INSERT INTO `permission_role` VALUES (41, 1);
INSERT INTO `permission_role` VALUES (41, 3);
INSERT INTO `permission_role` VALUES (41, 4);
INSERT INTO `permission_role` VALUES (42, 1);
INSERT INTO `permission_role` VALUES (42, 3);
INSERT INTO `permission_role` VALUES (42, 4);
INSERT INTO `permission_role` VALUES (43, 1);
INSERT INTO `permission_role` VALUES (43, 3);
INSERT INTO `permission_role` VALUES (44, 1);
INSERT INTO `permission_role` VALUES (44, 3);
INSERT INTO `permission_role` VALUES (45, 1);
INSERT INTO `permission_role` VALUES (45, 3);
INSERT INTO `permission_role` VALUES (56, 1);
INSERT INTO `permission_role` VALUES (56, 3);
INSERT INTO `permission_role` VALUES (56, 4);
INSERT INTO `permission_role` VALUES (57, 1);
INSERT INTO `permission_role` VALUES (57, 3);
INSERT INTO `permission_role` VALUES (57, 4);
INSERT INTO `permission_role` VALUES (58, 1);
INSERT INTO `permission_role` VALUES (58, 3);
INSERT INTO `permission_role` VALUES (59, 1);
INSERT INTO `permission_role` VALUES (59, 3);
INSERT INTO `permission_role` VALUES (60, 1);
INSERT INTO `permission_role` VALUES (60, 3);
INSERT INTO `permission_role` VALUES (81, 1);
INSERT INTO `permission_role` VALUES (82, 1);
INSERT INTO `permission_role` VALUES (83, 1);
INSERT INTO `permission_role` VALUES (84, 1);
INSERT INTO `permission_role` VALUES (85, 1);
INSERT INTO `permission_role` VALUES (86, 1);
INSERT INTO `permission_role` VALUES (86, 2);
INSERT INTO `permission_role` VALUES (86, 3);
INSERT INTO `permission_role` VALUES (86, 4);
INSERT INTO `permission_role` VALUES (87, 1);
INSERT INTO `permission_role` VALUES (87, 2);
INSERT INTO `permission_role` VALUES (87, 3);
INSERT INTO `permission_role` VALUES (87, 4);
INSERT INTO `permission_role` VALUES (88, 1);
INSERT INTO `permission_role` VALUES (88, 3);
INSERT INTO `permission_role` VALUES (89, 1);
INSERT INTO `permission_role` VALUES (89, 3);
INSERT INTO `permission_role` VALUES (90, 1);
INSERT INTO `permission_role` VALUES (90, 3);
INSERT INTO `permission_role` VALUES (106, 1);
INSERT INTO `permission_role` VALUES (106, 3);
INSERT INTO `permission_role` VALUES (107, 1);
INSERT INTO `permission_role` VALUES (107, 3);
INSERT INTO `permission_role` VALUES (108, 1);
INSERT INTO `permission_role` VALUES (108, 3);
INSERT INTO `permission_role` VALUES (109, 1);
INSERT INTO `permission_role` VALUES (110, 1);

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `permissions_key_index`(`key`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 111 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 'browse_admin', NULL, '2021-08-26 06:40:28', '2021-08-26 06:40:28');
INSERT INTO `permissions` VALUES (2, 'browse_bread', NULL, '2021-08-26 06:40:28', '2021-08-26 06:40:28');
INSERT INTO `permissions` VALUES (3, 'browse_database', NULL, '2021-08-26 06:40:28', '2021-08-26 06:40:28');
INSERT INTO `permissions` VALUES (4, 'browse_media', NULL, '2021-08-26 06:40:28', '2021-08-26 06:40:28');
INSERT INTO `permissions` VALUES (5, 'browse_compass', NULL, '2021-08-26 06:40:28', '2021-08-26 06:40:28');
INSERT INTO `permissions` VALUES (6, 'browse_menus', 'menus', '2021-08-26 06:40:28', '2021-08-26 06:40:28');
INSERT INTO `permissions` VALUES (7, 'read_menus', 'menus', '2021-08-26 06:40:28', '2021-08-26 06:40:28');
INSERT INTO `permissions` VALUES (8, 'edit_menus', 'menus', '2021-08-26 06:40:28', '2021-08-26 06:40:28');
INSERT INTO `permissions` VALUES (9, 'add_menus', 'menus', '2021-08-26 06:40:28', '2021-08-26 06:40:28');
INSERT INTO `permissions` VALUES (10, 'delete_menus', 'menus', '2021-08-26 06:40:28', '2021-08-26 06:40:28');
INSERT INTO `permissions` VALUES (11, 'browse_roles', 'roles', '2021-08-26 06:40:28', '2021-08-26 06:40:28');
INSERT INTO `permissions` VALUES (12, 'read_roles', 'roles', '2021-08-26 06:40:28', '2021-08-26 06:40:28');
INSERT INTO `permissions` VALUES (13, 'edit_roles', 'roles', '2021-08-26 06:40:28', '2021-08-26 06:40:28');
INSERT INTO `permissions` VALUES (14, 'add_roles', 'roles', '2021-08-26 06:40:28', '2021-08-26 06:40:28');
INSERT INTO `permissions` VALUES (15, 'delete_roles', 'roles', '2021-08-26 06:40:28', '2021-08-26 06:40:28');
INSERT INTO `permissions` VALUES (16, 'browse_users', 'users', '2021-08-26 06:40:28', '2021-08-26 06:40:28');
INSERT INTO `permissions` VALUES (17, 'read_users', 'users', '2021-08-26 06:40:28', '2021-08-26 06:40:28');
INSERT INTO `permissions` VALUES (18, 'edit_users', 'users', '2021-08-26 06:40:28', '2021-08-26 06:40:28');
INSERT INTO `permissions` VALUES (19, 'add_users', 'users', '2021-08-26 06:40:28', '2021-08-26 06:40:28');
INSERT INTO `permissions` VALUES (20, 'delete_users', 'users', '2021-08-26 06:40:28', '2021-08-26 06:40:28');
INSERT INTO `permissions` VALUES (21, 'browse_settings', 'settings', '2021-08-26 06:40:28', '2021-08-26 06:40:28');
INSERT INTO `permissions` VALUES (22, 'read_settings', 'settings', '2021-08-26 06:40:28', '2021-08-26 06:40:28');
INSERT INTO `permissions` VALUES (23, 'edit_settings', 'settings', '2021-08-26 06:40:28', '2021-08-26 06:40:28');
INSERT INTO `permissions` VALUES (24, 'add_settings', 'settings', '2021-08-26 06:40:28', '2021-08-26 06:40:28');
INSERT INTO `permissions` VALUES (25, 'delete_settings', 'settings', '2021-08-26 06:40:28', '2021-08-26 06:40:28');
INSERT INTO `permissions` VALUES (31, 'browse_routes', 'routes', '2021-08-26 11:57:12', '2021-08-26 11:57:12');
INSERT INTO `permissions` VALUES (32, 'read_routes', 'routes', '2021-08-26 11:57:12', '2021-08-26 11:57:12');
INSERT INTO `permissions` VALUES (33, 'edit_routes', 'routes', '2021-08-26 11:57:12', '2021-08-26 11:57:12');
INSERT INTO `permissions` VALUES (34, 'add_routes', 'routes', '2021-08-26 11:57:12', '2021-08-26 11:57:12');
INSERT INTO `permissions` VALUES (35, 'delete_routes', 'routes', '2021-08-26 11:57:12', '2021-08-26 11:57:12');
INSERT INTO `permissions` VALUES (41, 'browse_regions', 'regions', '2021-08-27 08:55:19', '2021-08-27 08:55:19');
INSERT INTO `permissions` VALUES (42, 'read_regions', 'regions', '2021-08-27 08:55:19', '2021-08-27 08:55:19');
INSERT INTO `permissions` VALUES (43, 'edit_regions', 'regions', '2021-08-27 08:55:19', '2021-08-27 08:55:19');
INSERT INTO `permissions` VALUES (44, 'add_regions', 'regions', '2021-08-27 08:55:19', '2021-08-27 08:55:19');
INSERT INTO `permissions` VALUES (45, 'delete_regions', 'regions', '2021-08-27 08:55:19', '2021-08-27 08:55:19');
INSERT INTO `permissions` VALUES (56, 'browse_actions', 'actions', '2021-08-27 10:22:54', '2021-08-27 10:22:54');
INSERT INTO `permissions` VALUES (57, 'read_actions', 'actions', '2021-08-27 10:22:54', '2021-08-27 10:22:54');
INSERT INTO `permissions` VALUES (58, 'edit_actions', 'actions', '2021-08-27 10:22:54', '2021-08-27 10:22:54');
INSERT INTO `permissions` VALUES (59, 'add_actions', 'actions', '2021-08-27 10:22:54', '2021-08-27 10:22:54');
INSERT INTO `permissions` VALUES (60, 'delete_actions', 'actions', '2021-08-27 10:22:54', '2021-08-27 10:22:54');
INSERT INTO `permissions` VALUES (81, 'browse_appeal_answers', 'appeal_answers', '2021-08-29 14:36:15', '2021-08-29 14:36:15');
INSERT INTO `permissions` VALUES (82, 'read_appeal_answers', 'appeal_answers', '2021-08-29 14:36:15', '2021-08-29 14:36:15');
INSERT INTO `permissions` VALUES (83, 'edit_appeal_answers', 'appeal_answers', '2021-08-29 14:36:15', '2021-08-29 14:36:15');
INSERT INTO `permissions` VALUES (84, 'add_appeal_answers', 'appeal_answers', '2021-08-29 14:36:16', '2021-08-29 14:36:16');
INSERT INTO `permissions` VALUES (85, 'delete_appeal_answers', 'appeal_answers', '2021-08-29 14:36:16', '2021-08-29 14:36:16');
INSERT INTO `permissions` VALUES (86, 'browse_appeals', 'appeals', '2021-09-02 15:01:23', '2021-09-02 15:01:23');
INSERT INTO `permissions` VALUES (87, 'read_appeals', 'appeals', '2021-09-02 15:01:23', '2021-09-02 15:01:23');
INSERT INTO `permissions` VALUES (88, 'edit_appeals', 'appeals', '2021-09-02 15:01:23', '2021-09-02 15:01:23');
INSERT INTO `permissions` VALUES (89, 'add_appeals', 'appeals', '2021-09-02 15:01:24', '2021-09-02 15:01:24');
INSERT INTO `permissions` VALUES (90, 'delete_appeals', 'appeals', '2021-09-02 15:01:24', '2021-09-02 15:01:24');
INSERT INTO `permissions` VALUES (106, 'browse_question_texts', 'question_texts', '2021-09-04 13:48:06', '2021-09-04 13:48:06');
INSERT INTO `permissions` VALUES (107, 'read_question_texts', 'question_texts', '2021-09-04 13:48:06', '2021-09-04 13:48:06');
INSERT INTO `permissions` VALUES (108, 'edit_question_texts', 'question_texts', '2021-09-04 13:48:06', '2021-09-04 13:48:06');
INSERT INTO `permissions` VALUES (109, 'add_question_texts', 'question_texts', '2021-09-04 13:48:06', '2021-09-04 13:48:06');
INSERT INTO `permissions` VALUES (110, 'delete_question_texts', 'question_texts', '2021-09-04 13:48:06', '2021-09-04 13:48:06');

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `author_id` int NOT NULL,
  `category_id` int NULL DEFAULT NULL,
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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of posts
-- ----------------------------

-- ----------------------------
-- Table structure for question_texts
-- ----------------------------
DROP TABLE IF EXISTS `question_texts`;
CREATE TABLE `question_texts`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `uz` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ru` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of question_texts
-- ----------------------------
INSERT INTO `question_texts` VALUES (1, 'ASK_LANGUAGE', 'Tilni tanlang | Выберите язык', '2021-09-04 13:51:41', '2021-09-04 13:51:41', 'Выберите язык | Выберите язык');
INSERT INTO `question_texts` VALUES (2, 'ASK_INDIVIDUAL', 'Mavzu turini tanlang', '2021-09-04 13:53:17', '2021-09-04 13:53:17', 'Выберите тип субъекта');
INSERT INTO `question_texts` VALUES (3, 'ASK_NAME', 'F.I.O', '2021-09-04 13:56:00', '2021-09-05 13:42:16', 'Ф.И.О');
INSERT INTO `question_texts` VALUES (4, 'ASK_PHONE', 'Telefon raqamingiz', '2021-09-04 13:57:31', '2021-09-04 13:57:31', 'Номер телефона');
INSERT INTO `question_texts` VALUES (5, 'ASK_EMAIL', 'Asosiy elektron poshtangiz', '2021-09-04 13:58:08', '2021-09-04 13:58:08', 'Отправьте оснавную электронную почту');
INSERT INTO `question_texts` VALUES (6, 'ASK_ACTION', 'Bo\\\'limni tanlang!', '2021-09-04 13:58:31', '2021-09-04 13:58:31', 'Выберите действие!');
INSERT INTO `question_texts` VALUES (7, 'ASK_REGION', 'Kerakli viloyatni tanlang!', '2021-09-04 13:59:00', '2021-09-04 13:59:00', 'Выберите регион!');
INSERT INTO `question_texts` VALUES (8, 'ASK_ROUTE', 'Kerakli yo\\\'nalishni tanlang!', '2021-09-04 13:59:22', '2021-09-04 13:59:22', 'Выберите необходимое направление или сферу!');
INSERT INTO `question_texts` VALUES (9, 'ASK_QUESTION', 'Сизда  қандайдир маълумот (видео/аудио/фото/в.х.) бўлса, илова қилган ҳолда бизга юборишингиз мумкин!', '2021-09-04 14:02:00', '2021-09-04 14:24:00', 'Если у вас есть какая-либо информация (видео / аудио / фото / и т. Д.), Вы можете отправить ее нам с приложением!');
INSERT INTO `question_texts` VALUES (10, 'SAY_INCORRECT_FORMAT', 'noto\'g\'ri format', '2021-09-04 14:15:18', '2021-09-04 14:15:18', 'неправильный формат');
INSERT INTO `question_texts` VALUES (11, 'ASK_VERIFY_PHONE', 'Telefonga yuborilgan smsni tasdiqlang', '2021-09-04 14:17:10', '2021-09-04 14:17:10', 'Подтвердите SMS, отправленное на телефон');
INSERT INTO `question_texts` VALUES (12, 'SAY_INCORRECT_CODE', 'Kod noto`gri', '2021-09-04 14:18:47', '2021-09-04 14:18:47', 'Код неверный');
INSERT INTO `question_texts` VALUES (13, 'ASK_REGISTER', 'Ro\\\'yxatdan o\\\'tish', '2021-09-04 14:22:11', '2021-09-04 14:22:11', 'Зарегистрироваться');

-- ----------------------------
-- Table structure for regions
-- ----------------------------
DROP TABLE IF EXISTS `regions`;
CREATE TABLE `regions`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `uz` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ru` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of regions
-- ----------------------------
INSERT INTO `regions` VALUES (1, 'Andijon viloyati', 'Андижанская область', '2021-08-27 09:02:54', '2021-08-29 13:06:22');
INSERT INTO `regions` VALUES (2, 'Buxoro viloyati', 'Бухарская область', '2021-08-27 09:03:30', '2021-08-29 13:06:06');
INSERT INTO `regions` VALUES (3, 'Jizzax viloyati', 'Джизакская область', '2021-08-27 09:03:51', '2021-08-29 13:05:52');
INSERT INTO `regions` VALUES (4, 'Qashqadaryo viloyati', 'Кашкадарьинская область', '2021-08-27 09:04:08', '2021-08-29 13:05:33');
INSERT INTO `regions` VALUES (5, 'Namangan viloyati', 'Наманганская область', '2021-08-27 09:04:27', '2021-08-29 13:06:35');
INSERT INTO `regions` VALUES (6, 'Navoiy viloyati', 'Навоийская область', '2021-08-27 09:04:47', '2021-08-29 13:06:50');
INSERT INTO `regions` VALUES (7, 'Samarqand viloyati', 'Самаркандская область', '2021-08-27 09:05:08', '2021-08-29 13:07:06');
INSERT INTO `regions` VALUES (8, 'Surxondaryo viloyati', 'Сурхандарьинская область', '2021-08-27 09:05:22', '2021-08-29 13:07:26');
INSERT INTO `regions` VALUES (9, 'Sirdaryo viloyati', 'Сырдарьинская область', '2021-08-27 09:05:45', '2021-08-29 13:08:10');
INSERT INTO `regions` VALUES (10, 'Toshkent viloyati', 'Ташкентская область', '2021-08-27 09:06:01', '2021-08-29 13:08:32');
INSERT INTO `regions` VALUES (11, 'Toshkent shaxri', 'Город Ташкент', '2021-08-27 09:06:21', '2021-08-29 13:08:50');
INSERT INTO `regions` VALUES (12, 'Farg\'ona viloyati', 'Ферганская область', '2021-08-27 09:06:41', '2021-08-29 13:09:05');
INSERT INTO `regions` VALUES (13, 'Xorazm viloyati', 'Хорезмская область', '2021-08-27 09:06:57', '2021-08-29 13:09:21');
INSERT INTO `regions` VALUES (14, 'Qoraqalpog\'iston Respublikasi', 'Республика Каракалпакстан', '2021-08-27 09:07:22', '2021-08-29 13:09:43');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `roles_name_unique`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'admin', 'Administrator', '2021-08-26 06:40:28', '2021-08-26 06:40:28');
INSERT INTO `roles` VALUES (2, 'user', 'Normal User', '2021-08-26 06:40:28', '2021-08-26 06:40:28');
INSERT INTO `roles` VALUES (3, 'moderator', 'Moderator 1', '2021-08-26 12:48:04', '2021-08-26 12:48:04');
INSERT INTO `roles` VALUES (4, 'expert', 'Expert', '2021-09-04 18:12:04', '2021-09-04 18:12:04');

-- ----------------------------
-- Table structure for routes
-- ----------------------------
DROP TABLE IF EXISTS `routes`;
CREATE TABLE `routes`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `uz` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ru` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `responsible` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of routes
-- ----------------------------
INSERT INTO `routes` VALUES (2, 'Urug\'chilik', 'Семеноводство', '2021-08-27 09:34:31', '2021-08-29 13:04:51', 0);
INSERT INTO `routes` VALUES (3, 'Kasallik va zararkunandalarga qarshi kurashish', 'Борьба с болезнями и вредителями', '2021-08-27 09:34:56', '2021-08-29 13:04:31', 0);
INSERT INTO `routes` VALUES (4, 'Agromaslahatlar', 'Агросоветы', '2021-08-27 09:35:12', '2021-08-29 13:03:52', 0);
INSERT INTO `routes` VALUES (5, 'Mineral o\'g\'itlar', 'Удобрения', '2021-08-27 09:35:28', '2021-08-29 13:03:33', 0);
INSERT INTO `routes` VALUES (6, 'Produktiv/ratsional sug\'orish', 'Продуктивное/рациональное орошение', '2021-08-27 09:36:00', '2021-08-29 13:03:13', 0);
INSERT INTO `routes` VALUES (7, 'Qishloq xo\'jaligi texnikasi', 'Сельхозтехника', '2021-08-27 09:36:16', '2021-08-29 13:02:26', 0);
INSERT INTO `routes` VALUES (8, 'Mevachilik', 'Выращивание фруктов', '2021-08-27 09:36:32', '2021-08-29 13:02:05', 0);
INSERT INTO `routes` VALUES (9, 'Sabzavotchilik', 'Овощеводство', '2021-08-27 09:36:45', '2021-08-29 13:01:54', 0);
INSERT INTO `routes` VALUES (10, 'Bog\'dorchilik', 'Садоводство', '2021-08-27 09:36:57', '2021-08-29 12:55:09', 0);
INSERT INTO `routes` VALUES (11, 'Issiqxona xo\'jaligi', 'Тепличное хозяйство', '2021-08-27 09:37:17', '2021-08-29 12:54:48', 0);
INSERT INTO `routes` VALUES (12, 'Dorivor va ziravor o\'simliklar', 'Лекарственные растения', '2021-08-27 09:37:34', '2021-08-29 12:54:23', 0);
INSERT INTO `routes` VALUES (13, 'Sertifikatlash', 'Сертификация', '2021-08-27 09:37:46', '2021-09-05 14:02:12', 48);
INSERT INTO `routes` VALUES (14, 'Imtiyozlar va subsidiyalar', 'Льготы и субсидии', '2021-08-27 09:38:21', '2021-08-29 12:53:39', 0);
INSERT INTO `routes` VALUES (16, 'Yerdan foydalanish', 'Землепользование', '2021-08-27 09:38:37', '2021-08-29 12:52:26', 0);
INSERT INTO `routes` VALUES (17, 'Tuproqni baholash', 'Оценка качество почвы', '2021-08-27 09:38:54', '2021-09-05 07:31:29', 36);

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL DEFAULT 1,
  `group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `settings_key_unique`(`key`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

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
INSERT INTO `settings` VALUES (11, 'chatbot.chat_title', 'ChatTitle', 'Agro.uz Chat', NULL, 'text', 6, 'ChatBot');
INSERT INTO `settings` VALUES (12, 'chatbot.chat_intro_message', 'ChatIntro', '⚖️  Qishloq xo\\\'jaligi vazirligi va vazirlikning elektron resurslaridan foydalanuvchi jismoniy va yuridik shaxslar o\\\'rtasida onlayn muloqot tizimiga hush kelibsiz.<br>📝  Iltimos asosiy elektron pochta (E-Mail) manzilingizni kiriting.<br>-----------------------------------------------------------<br>⚖️  Добро пожаловать в систему онлайн взаимодействия между Министерством сельского хозяйства РУз и пользователями электронных ресурсов министерства.<br>📝 Пожалуйста, введите ваш основной адрес электронной почты (E-Mail).', NULL, 'text', 7, 'ChatBot');
INSERT INTO `settings` VALUES (13, 'chatbot.back_image', 'ChatBackImage', '', NULL, 'image', 9, 'ChatBot');
INSERT INTO `settings` VALUES (14, 'chatbot.placeholder_text', 'PlaceholderText', 'send', NULL, 'text', 8, 'ChatBot');
INSERT INTO `settings` VALUES (15, 'chatbot.icon_image', 'Icon', 'settings\\September2021\\3pztHQZIjmG7RCtqqgMu.png', NULL, 'image', 10, 'ChatBot');

-- ----------------------------
-- Table structure for translations
-- ----------------------------
DROP TABLE IF EXISTS `translations`;
CREATE TABLE `translations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `table_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int UNSIGNED NOT NULL,
  `locale` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `translations_table_name_column_name_foreign_key_locale_unique`(`table_name`, `column_name`, `foreign_key`, `locale`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of translations
-- ----------------------------

-- ----------------------------
-- Table structure for user_roles
-- ----------------------------
DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE `user_roles`  (
  `user_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`user_id`, `role_id`) USING BTREE,
  INDEX `user_roles_user_id_index`(`user_id`) USING BTREE,
  INDEX `user_roles_role_id_index`(`role_id`) USING BTREE,
  CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of user_roles
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` bigint UNSIGNED NULL DEFAULT NULL,
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
  `individual` tinyint NULL DEFAULT NULL,
  `data` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `place_of_work` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `organization` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `activity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE,
  INDEX `users_role_id_foreign`(`role_id`) USING BTREE,
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 57 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 1, 'Asadbek', NULL, 'asad@email.com', 'users/default.png', NULL, '$2y$10$B2PgKSVQq7wp/5X6wqv6Le947kkbGs7tzyE0t1vkZSvzaTbgyFake', '5umBTvXmPXJjGtCe4OoJBLyp4qOLc0lTutIfQ7zc7wZ0h5lOzhoRiEglwrPA', NULL, '2021-08-26 06:43:28', '2021-08-26 06:43:29', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (2, 2, 'USer 1', NULL, 'user@gmail.com', 'users/default.png', NULL, '$2y$10$xazL6cmEUIuIlozqifW9UurN9kFMCOZhBSbirjOCERRU3AGTgVoJa', 'zler00SWX51v2VRCoTu3sAloOwri6aly5gabtIecgwMVQogu6vyLx44um4JM', '{\"locale\":\"en\"}', '2021-08-26 12:50:24', '2021-08-26 12:50:24', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (4, 2, 'Asadbek', NULL, 'g2@gmaill.com', 'users/default.png', NULL, '$2y$10$RwHefsSUj8/ndEE75FPSJexqyzd6vwYcxVOEvwRnQjVCjqu/RkUSq', NULL, NULL, '2021-08-28 08:11:40', '2021-08-28 08:11:41', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (7, 2, 'Asadbek', NULL, 'asadbek@gmail.com', 'users/default.png', NULL, '$2y$10$sMCV4Qj2IuVoUFHCVA0flevBSnXtYhD/mmMRtyHq7zrNrGzEcNQBi', NULL, NULL, '2021-08-28 12:42:03', '2021-08-28 12:42:04', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (8, 2, 'SARDOR', NULL, 'sardorchek@gmail.com', 'users/default.png', NULL, '$2y$10$0NJmJtPEtexJuh4ZIGr.eurBidnVTqCmNnT/U6HVYn2/1wtC2R0rG', NULL, NULL, '2021-08-28 12:44:51', '2021-08-28 12:44:52', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (12, 2, ';', NULL, 'sardor@gmail.com', 'users/default.png', NULL, '$2y$10$nWVi1FqbJFOA55TVPR0vT.qcCFWlvfRG6u0DCZIJhZ7kmugNjxgAS', NULL, NULL, '2021-08-28 14:36:46', '2021-08-28 14:36:46', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (13, 2, 'yusuf', NULL, 'adburazzakovusuf@gmail.com', 'users/default.png', NULL, '$2y$10$WGgyLt8KTOM2ENbg4eMJ2u.Ben4SpJu5lXXB81iU.2teyhkZrBZr.', NULL, NULL, '2021-08-29 11:39:11', '2021-08-29 11:39:12', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (14, 2, 'adasd', NULL, 'abdurazzakovusuf@gmail.com', 'users/default.png', NULL, '$2y$10$zeNL1MwzoX8/2Rab8ieHTOOVYrlLpwX6upTTAK/YL5/2BIE05aKw2', NULL, NULL, '2021-08-29 11:43:59', '2021-08-29 11:43:59', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (15, 2, 'My name is Muhammad', NULL, 'admin@admiin.com', 'users/default.png', NULL, '$2y$10$NUR2xN3hVs1e.Xa3YBKbBeaSistHUA8KWiyS7Pr2hptB9JeMeW/5u', NULL, NULL, '2021-08-29 12:08:23', '2021-08-29 12:08:24', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (16, 2, 'yusuf', NULL, 'yusuf@gmail.com', 'users/default.png', NULL, '$2y$10$lKzf09TEddpIZltfX1h2PesHti2xBRgrQ1XhwOey1f7uyQSnmYhdG', NULL, NULL, '2021-08-29 13:35:54', '2021-08-29 13:35:54', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (17, 2, 'yusuf', NULL, 'yusuf@gmaail.com', 'users/default.png', NULL, '$2y$10$JK8SkyGFYLP2wh5fMvI1MuL527.pgVnzMevSjAMxHrONV4RurDvLy', NULL, NULL, '2021-08-29 13:43:44', '2021-08-29 13:43:45', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (18, 2, 'Sardor Yusupov', NULL, 'sardor13@gmail.com', 'users/default.png', NULL, '$2y$10$XWIMclqX1WuOXBmteWIH2OsJCuOcND/.n29ERHmcE83pwgUycAUFO', NULL, NULL, '2021-08-29 14:31:27', '2021-08-29 14:31:27', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (19, 2, 'Tester1', NULL, 'a@b.com', 'users/default.png', NULL, '$2y$10$RTL8LxIZHF6VMdNsutejo.95iR0y4Q.SNQYej8oD3Q7Wz74fVMZ3.', 'IdETpvytNOBQKqy8k6Aj5xfV9HQPkgZkQgoUxzXLMcvJVzozckWFAgv8okKR', '{\"locale\":\"en\"}', '2021-08-29 15:34:30', '2021-08-29 15:34:30', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (20, 2, 'POPPL', NULL, 'asad@asad.com', 'users/default.png', NULL, '$2y$10$GUg/J.mJkDACSMWG2fvfQu.getvGnd30rVzzvoL.1G3U0b0m4G6IC', '3k1eVH8TKUyhmhndM1Lwo54pcBY5AfrGvmlgdwn4mEi3WkurUu1fNfKrLHJIasdasdasd', '{\"locale\":\"en\"}', '2021-08-29 16:03:17', '2021-08-29 16:03:17', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (25, 2, 'Asadbek Fayzulloev', NULL, 'markoletter0@gmail.com', 'users/default.png', NULL, '$2y$10$efid5JysawfLgQRPp99iPe8TAp3O9Bj.Qx9O7NmVrtEIizEV7Ng.S', NULL, NULL, '2021-08-29 18:48:38', '2021-08-29 18:48:39', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (27, 2, 'Yusuf', NULL, 'jasur@gmail.com', 'users/default.png', NULL, '$2y$10$rKFaA.KOCsV/gRjX2/QJZuqktNUenq0RPr8SpM7sahg4BEhgPUNuy', NULL, NULL, '2021-08-30 07:56:15', '2021-08-30 07:56:15', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (28, 2, 'Yuusf', NULL, 'marjon@gmail.com', 'users/default.png', NULL, '$2y$10$aQIbdOFOGrMfe4p5HH1SaOOhV4Zo8wlvvaIjXh/zKDRIgnsLu6iK2', NULL, NULL, '2021-08-30 07:59:25', '2021-08-30 07:59:25', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (29, 2, 'Yusuf', NULL, 'sardoryusupov230@gmail.com', 'users/default.png', NULL, '$2y$10$ql/.baT1KPJC4.RptjBKh.8XS2rpHtpsow6piP1mIyX3s0DOfowYa', NULL, NULL, '2021-08-30 08:03:30', '2021-08-30 08:03:30', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (33, 2, 'Asad', NULL, 't@m.ru', 'users/default.png', NULL, '$2y$10$cZ5l7yUTioH/Z1R0hptoi.xdhWWpBTNyDw7Sj8QlCWWz.h15GCNM.', NULL, NULL, '2021-09-03 14:48:33', '2021-09-03 14:48:33', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (34, 2, 'Asadbek', NULL, 'a@bn.qw', 'users/default.png', NULL, '$2y$10$dCG6HfiwrTGydtGFeCX/VefCCXO1lP6UzCGK.3J8DuT08iBNZ0mqC', NULL, NULL, '2021-09-03 15:05:37', '2021-09-03 15:05:37', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (35, 2, 'asad', NULL, 'a@p.com', 'users/default.png', NULL, '$2y$10$DUEqjWbUwjiC0oTbpbLjEO/GBqFthOvxg7ikBv6UmI51Dr9Rj.Mly', NULL, NULL, '2021-09-03 18:08:35', '2021-09-03 18:08:35', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (36, 4, 'Expert 1', NULL, 'expert@admin.com', 'users/default.png', NULL, '$2y$10$.lNWhxIIhqyR92VEdyjiIemxLWcbjazHBgjyFkLZrkY1FRWhIdrM6', 'KIG364dzQ2CdBou3pD8FosF5NzPJnc05gqFXUqfxPK4nA2rNYVUcXSxFk9at', '{\"locale\":\"en\"}', '2021-09-04 18:13:28', '2021-09-04 18:13:28', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (37, 3, 'Moderator 1', NULL, 'moderator@admin.com', 'users/default.png', NULL, '$2y$10$o2dyY40ZB9wAWR3I8r/tYeLjrDdlzqakFtWlhxaHQtn5fxbKSIRTi', '18TtYyc1cxAduIUL8OIwDhrUgr0mrpmBwuZVwpXJJnMqVyi25wQ9T3JlHeCk', '{\"locale\":\"en\"}', '2021-09-04 18:15:55', '2021-09-04 18:15:55', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (40, 2, 'Asadbek', NULL, 't@email.com', 'users/default.png', NULL, '$2y$10$i2pe9lyFqm.T9SA00x4PaeHSuLja5lZ6aLJxlLMO10ZR6sBhtzNQC', NULL, NULL, '2021-09-05 12:48:44', '2021-09-05 12:48:44', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (46, 2, 'Xolmuhammadov Muhammad', NULL, 'xolmuhammedovm@gmail.com', 'users/default.png', NULL, '$2y$10$f9VG30IJYiIUSERhsmQw7uS8kgHC2V.CPEYRwMLe44gV5LUrjf1cC', 'wXIyFVx9gbxTk0iHD2xMywKEX0M39tVNwBRGWT8sbtF9fNJeZLtLpdADJW3g', NULL, '2021-09-05 13:27:56', '2021-09-05 13:27:56', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (47, 2, 'Asadbek Fayzulloev', NULL, 'fayzulloevasadbek@gmail.com', 'users/default.png', NULL, '$2y$10$pKMd.ifkOk3vYaTpE0KaPuVHUAC0Sp5yqlQHHPb4l85l7ILTKnbHi', 'Nid1LYTI34ws4a1TUeYJx93qp8NeBSbi2rpsBrpn73a7qOxNE9SpJnQF3uKr', NULL, '2021-09-05 13:42:57', '2021-09-05 13:42:57', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (48, 4, 'Expert Sertificatsiya', NULL, 'expert2@admin.com', 'users/default.png', NULL, '$2y$10$SWLBatBziHv7X9G2WAmHU.kdqD9fykI9qg7tR1boMYi0DLWnUX2sG', NULL, '{\"locale\":\"en\"}', '2021-09-05 14:01:48', '2021-09-05 14:01:48', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (49, 2, 'Asad', NULL, 'q@g.com', 'users/default.png', NULL, '$2y$10$Cl6sj/HsFKf209rOPibwseOsfDTyUJn61a1WGhjsq2RiLp9KSn1Ei', NULL, NULL, '2021-09-05 14:22:53', '2021-09-05 14:22:53', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (50, 2, 'Asadbek', NULL, 'qw@ad.com', 'users/default.png', NULL, '$2y$10$oyD.ybPs4k3GOTPFlL9Jlu0sEKUog5M/tGcYU.brqTBr0JXUvkkEy', NULL, NULL, '2021-09-05 15:26:35', '2021-09-05 15:26:35', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (51, 2, 'Qopli', NULL, 'qas@pas.com', 'users/default.png', NULL, '$2y$10$y9nwcuv7xowaBQgJkHLCbupCeb10QhjM53ksezxZiebAerq5HVlp.', NULL, NULL, '2021-09-05 15:29:17', '2021-09-05 15:29:17', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (52, 2, 'Asadbek', NULL, 'qwer@a.co', 'users/default.png', NULL, '$2y$10$2SLljzhHcsHEh0y37QEL/uLm8TTtdt0Hvc8FO5K6qWVTuj4bh1CvW', NULL, NULL, '2021-09-05 15:31:47', '2021-09-05 15:31:47', NULL, NULL, NULL, NULL, 'rabota', 'detelnosti');
INSERT INTO `users` VALUES (53, 2, 'Asdas', NULL, 'lop@lo.com', 'users/default.png', NULL, '$2y$10$.66QZdSkD7RdXfgMUqPGLeZEfMJmxStLwo.NF8JjC4l1H/.7pHguu', NULL, NULL, '2021-09-05 15:36:24', '2021-09-05 15:36:24', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (54, 2, 'Aliwer', '996755576', 'qwert@lol.com', 'users/default.png', NULL, '$2y$10$Cdr8OjmNz89rHUvD3NY8g.fnOzZScCjbJ2vgGGQM.qc9hy4X2/MIK', NULL, NULL, '2021-09-05 16:49:16', '2021-09-05 16:49:16', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (56, 1, 'SuperAdmin', NULL, 'admin@admin.com', 'users/default.png', NULL, '$2y$10$H5cfI91hu/m5Ck/fPmDizuAiLCZrJ8O3DjzSQs1o/opDtf2bNtK3C', NULL, '{\"locale\":\"en\"}', '2021-09-05 17:30:03', '2021-09-05 17:30:03', NULL, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for websockets_statistics_entries
-- ----------------------------
DROP TABLE IF EXISTS `websockets_statistics_entries`;
CREATE TABLE `websockets_statistics_entries`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `app_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `peak_connection_count` int NOT NULL,
  `websocket_message_count` int NOT NULL,
  `api_message_count` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of websockets_statistics_entries
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
