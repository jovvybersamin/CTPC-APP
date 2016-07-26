/*
MySQL Data Transfer
Source Host: localhost
Source Database: ctpctv
Target Host: localhost
Target Database: ctpctv
Date: 7/24/2016 4:30:02 AM
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for asset_containers
-- ----------------------------
DROP TABLE IF EXISTS `asset_containers`;
CREATE TABLE `asset_containers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `disk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `owner_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for assets
-- ----------------------------
DROP TABLE IF EXISTS `assets`;
CREATE TABLE `assets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `container_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for user_roles
-- ----------------------------
DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE `user_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_roles_user_id_foreign` (`user_id`),
  KEY `user_roles_role_id_foreign` (`role_id`),
  CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8_unicode_ci,
  `profile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deletable` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for video_categories
-- ----------------------------
DROP TABLE IF EXISTS `video_categories`;
CREATE TABLE `video_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for videos
-- ----------------------------
DROP TABLE IF EXISTS `videos`;
CREATE TABLE `videos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `duration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `source` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `poster` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `featured` tinyint(4) NOT NULL DEFAULT '0',
  `hits` bigint(20) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `uploaded_by` int(10) unsigned NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `published_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `videos_category_id_foreign` (`category_id`),
  KEY `videos_uploaded_by_foreign` (`uploaded_by`),
  CONSTRAINT `videos_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `video_categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `videos_uploaded_by_foreign` FOREIGN KEY (`uploaded_by`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2016_05_22_063026_create_setup_users_table', '1');
INSERT INTO `migrations` VALUES ('2016_06_12_072556_create_video_categories_table', '1');
INSERT INTO `migrations` VALUES ('2016_06_12_075535_create_videos_table', '1');
INSERT INTO `migrations` VALUES ('2016_06_26_062206_create_setup_assets_table', '1');
INSERT INTO `migrations` VALUES ('2016_07_23_122337_add_published_date_column_in_videos', '2');
INSERT INTO `migrations` VALUES ('2016_07_23_154033_add_new_columns_in_video_categories_table', '3');
INSERT INTO `roles` VALUES ('1', 'Administrator', '2016-07-18 15:23:48', '2016-07-18 15:23:48');
INSERT INTO `user_roles` VALUES ('1', '2', '1');
INSERT INTO `user_roles` VALUES ('2', '1', '1');
INSERT INTO `users` VALUES ('1', 'Administrator', 'jovvybersamin99@gmail.com', 'admin', '$2y$10$RaLP/6zUZ1SGCrT1dynZW.kvtMeFFjyjBcFby/0QWry2UMdFlepn.', '1', null, '1', null, null, null, '2016-07-18 15:23:47', '2016-07-18 15:23:47', '1', null);
INSERT INTO `users` VALUES ('2', 'Super User', 'jovvy.bersamin@gmail.com', 'superuser2016', '$2y$10$8MTAM3rcfCj6dCIVQbSYPO74lgnFq3krkji7sAnUfXLcLYgYawa6O', '1', null, '1', null, null, null, '2016-07-18 15:23:47', '2016-07-18 15:23:47', '0', null);
INSERT INTO `video_categories` VALUES ('1', 'Uncategorized', 'uncategorized', '2016-07-18 15:23:48', '2016-07-18 15:23:48', null);
INSERT INTO `video_categories` VALUES ('2', 'Sports', 'sports', '2016-07-23 15:44:56', '2016-07-23 16:36:40', 'Action-packed Sports');
INSERT INTO `video_categories` VALUES ('3', 'Animation', 'animation', '2016-07-23 18:16:03', '2016-07-23 18:16:03', 'Animation');
INSERT INTO `video_categories` VALUES ('4', 'Education', 'education', '2016-07-23 18:16:17', '2016-07-23 18:16:17', 'Education');
INSERT INTO `video_categories` VALUES ('6', 'Comedy', 'comedy', '2016-07-23 18:16:54', '2016-07-23 18:16:54', 'Comedy');
INSERT INTO `video_categories` VALUES ('7', 'Technology', 'technology', '2016-07-23 18:17:17', '2016-07-23 18:17:17', 'Technology');
INSERT INTO `videos` VALUES ('1', 'Sample Videos', 'sample-videos', 'Test Video', 'Test Video', '03:00', 'http://ctpc.dev/assets/videos/video1.mp4', 'http://ctpc.dev/assets/images/YMYMWIm.jpg', '1', '1', '34', '2', '1', '1', '2016-07-18 15:26:05', '2016-07-23 18:23:33', null, '2016-07-23 18:23:33');
INSERT INTO `videos` VALUES ('2', 'Sample Test Video 22', 'sample-test-video-22', 'Sample Test Video 22', 'Sample Test Video 2', '03:00', 'http://ctpc.dev/assets/videos/video1.mp4', 'http://ctpc.dev/assets/images/YMYMWIm.jpg', '1', '0', '100124', '2', '1', '1', '2016-07-23 08:15:30', '2016-07-23 18:23:22', null, '2016-07-23 18:23:22');
INSERT INTO `videos` VALUES ('3', 'big-buck-bunny-medium', 'big-buck-bunny-medium', 'big-buck-bunny-medium', 'big-buck-bunny-mediumbig-buck-bunny-mediumbig-buck-bunny-mediumbig-buck-bunny-mediumbig-buck-bunny-mediumbig-buck-bunny-mediumbig-buck-bunny-mediumbig-buck-bunny-mediumbig-buck-bunny-mediumbig-buck-bunny-mediumbig-buck-bunny-mediumbig-buck-bunny-mediumbig-buck-bunny-medium', '3:00', 'http://ctpc.dev/assets/videos/video.mp4', 'http://ctpc.dev/assets/images/big-buck-bunny-medium.jpg', '1', '0', '13', '1', '1', '1', '2016-07-23 09:52:47', '2016-07-23 12:40:51', null, '2016-07-23 12:40:51');
INSERT INTO `videos` VALUES ('4', 'borders-medium', 'borders-medium', 'borders-medium', 'borders-mediumborders-mediumborders-mediumborders-mediumborders-mediumborders-mediumborders-mediumborders-mediumborders-mediumborders-mediumborders-mediumborders-mediumborders-medium', '3:00', 'http://ctpc.dev/assets/videos/video.mp4', 'http://ctpc.dev/assets/images/borders-medium.jpg', '1', '0', '8', '1', '1', '1', '2016-07-23 09:53:46', '2016-07-23 12:40:55', null, '2016-07-23 12:40:55');
INSERT INTO `videos` VALUES ('6', 'harvard-sailing-team-medium', 'harvard-sailing-team-medium', 'harvard-sailing-team-medium', 'harvard-sailing-team-mediumharvard-sailing-team-mediumharvard-sailing-team-mediumharvard-sailing-team-medium', '3:00', 'http://ctpc.dev/assets/videos/video.mp4', 'http://ctpc.dev/assets/images/harvard-sailing-team-medium.jpg', '1', '0', '0', '1', '1', '1', '2016-07-23 09:55:14', '2016-07-23 12:41:05', null, '2016-07-23 12:41:05');
INSERT INTO `videos` VALUES ('7', 'inside-out-medium', 'inside-out-medium', 'inside-out-medium', 'inside-out-mediuminside-out-mediuminside-out-mediuminside-out-mediuminside-out-mediuminside-out-mediuminside-out-mediuminside-out-mediuminside-out-mediuminside-out-mediuminside-out-mediuminside-out-mediuminside-out-mediuminside-out-mediuminside-out-medium', '3:00', 'http://ctpc.dev/assets/videos/video.mp4', 'http://ctpc.dev/assets/images/inside-out-medium.jpg', '1', '0', '0', '1', '1', '1', '2016-07-23 09:56:05', '2016-07-23 12:41:59', null, '2016-07-23 12:41:59');
INSERT INTO `videos` VALUES ('8', 'kylo-ren-medium', 'kylo-ren-medium', 'kylo-ren-mediumkylo-ren-medium', 'kylo-ren-mediumkylo-ren-mediumkylo-ren-mediumkylo-ren-mediumkylo-ren-mediumkylo-ren-mediumkylo-ren-mediumkylo-ren-mediumkylo-ren-mediumkylo-ren-mediumkylo-ren-mediumkylo-ren-mediumkylo-ren-mediumkylo-ren-mediumkylo-ren-mediumkylo-ren-mediumkylo-ren-mediumkylo-ren-mediumkylo-ren-medium', '3:00', 'http://ctpc.dev/assets/videos/video.mp4', 'http://ctpc.dev/assets/images/kylo-ren-medium.jpg', '1', '0', '0', '1', '1', '1', '2016-07-23 09:56:54', '2016-07-23 12:42:24', null, '2016-07-23 12:42:24');
INSERT INTO `videos` VALUES ('9', 'minions-medium', 'minions-medium', 'minions-medium', 'minions-mediumminions-mediumminions-mediumminions-mediumminions-mediumminions-mediumminions-mediumminions-medium', '4:00', 'http://ctpc.dev/assets/videos/video.mp4', 'http://ctpc.dev/assets/images/minions-medium.jpg', '1', '0', '0', '1', '1', '1', '2016-07-23 09:59:25', '2016-07-23 12:42:29', null, '2016-07-23 12:42:29');
INSERT INTO `videos` VALUES ('10', 'supply-and-demand-medium', 'supply-and-demand-medium', 'supply-and-demand-medium', 'supply-and-demand-mediumsupply-and-demand-mediumsupply-and-demand-mediumsupply-and-demand-mediumsupply-and-demand-medium', '3:67', 'http://ctpc.dev/assets/videos/video.mp4', 'http://ctpc.dev/assets/images/supply-and-demand-medium.jpg', '1', '0', '4', '4', '1', '1', '2016-07-23 10:00:10', '2016-07-23 18:24:07', null, '2016-07-23 18:24:07');
INSERT INTO `videos` VALUES ('11', 'wetness-video-medium', 'wetness-video-medium', 'wetness-video-medium', 'wetness-video-mediumwetness-video-mediumwetness-video-mediumwetness-video-mediumwetness-video-mediumwetness-video-mediumwetness-video-mediumwetness-video-mediumwetness-video-mediumwetness-video-mediumwetness-video-mediumwetness-video-mediumwetness-video-mediumwetness-video-mediumwetness-video-mediumwetness-video-mediumwetness-video-mediumwetness-video-medium', '5:00', 'http://ctpc.dev/assets/videos/video.mp4', 'http://ctpc.dev/assets/images/wetness-video-medium.jpg', '1', '0', '94', '1', '1', '1', '2016-07-23 10:01:50', '2016-07-23 12:42:52', null, '2016-07-23 12:42:52');
INSERT INTO `videos` VALUES ('12', 'avengers-medium', 'avengers-medium', 'avengers-medium', 'avengers-mediumavengers-mediumavengers-mediumavengers-mediumavengers-mediumavengers-mediumavengers-mediumavengers-mediumavengers-mediumavengers-mediumavengers-mediumavengers-mediumavengers-mediumavengers-mediumavengers-mediumavengers-mediumavengers-mediumavengers-mediumavengers-mediumavengers-mediumavengers-mediumavengers-mediumavengers-mediumavengers-mediumavengers-mediumavengers-mediumavengers-mediumavengers-mediumavengers-medium', '3:45', 'http://ctpc.dev/assets/videos/video.mp4', 'http://ctpc.dev/assets/images/avengers-medium.jpg', '1', '0', '2', '2', '1', '1', '2016-07-23 10:02:46', '2016-07-23 18:23:10', null, '2016-07-23 18:23:10');
INSERT INTO `videos` VALUES ('13', 'best-android-tables-2014-medium', 'best-android-tables-2014-medium', 'best-android-tables-2014-medium', 'best-android-tables-2014-mediumbest-android-tables-2014-mediumbest-android-tables-2014-mediumbest-android-tables-2014-mediumbest-android-tables-2014-mediumbest-android-tables-2014-mediumbest-android-tables-2014-mediumbest-android-tables-2014-medium', '3:09', 'http://ctpc.dev/assets/videos/video.mp4', 'http://ctpc.dev/assets/images/best-android-tables-2014-medium.jpg', '1', '0', '147', '1', '1', '1', '2016-07-23 10:19:05', '2016-07-23 12:40:45', null, '2016-07-23 12:40:45');
INSERT INTO `videos` VALUES ('14', 'hug-it-out-medium', 'hug-it-out-medium', 'hug-it-out-medium', 'hug-it-out-mediumhug-it-out-mediumhug-it-out-mediumhug-it-out-mediumhug-it-out-mediumhug-it-out-mediumhug-it-out-mediumhug-it-out-mediumhug-it-out-mediumhug-it-out-mediumhug-it-out-mediumhug-it-out-mediumhug-it-out-mediumhug-it-out-mediumhug-it-out-mediumhug-it-out-mediumhug-it-out-mediumhug-it-out-mediumhug-it-out-mediumhug-it-out-mediumhug-it-out-mediumhug-it-out-mediumhug-it-out-mediumhug-it-out-mediumhug-it-out-medium', '2:08', 'http://ctpc.dev/assets/videos/video.mp4', 'http://ctpc.dev/assets/images/hug-it-out-medium.jpg', '1', '0', '0', '1', '1', '1', '2016-07-23 10:19:46', '2016-07-23 12:41:22', null, '2016-07-23 12:41:22');
INSERT INTO `videos` VALUES ('15', 'the-hobbit-medium', 'the-hobbit-medium', 'the-hobbit-medium', 'the-hobbit-mediumthe-hobbit-mediumthe-hobbit-mediumthe-hobbit-mediumthe-hobbit-mediumthe-hobbit-mediumthe-hobbit-mediumthe-hobbit-mediumthe-hobbit-mediumthe-hobbit-mediumthe-hobbit-mediumthe-hobbit-medium', '5:00', 'http://ctpc.dev/assets/videos/video.mp4', 'http://ctpc.dev/assets/images/the-hobbit-medium.jpg', '1', '0', '2', '4', '1', '1', '2016-07-23 10:27:49', '2016-07-23 18:23:58', null, '2016-07-23 18:23:58');
INSERT INTO `videos` VALUES ('16', 'treehouse-show-medium', 'treehouse-show-medium', 'treehouse-show-medium', 'treehouse-show-mediumtreehouse-show-mediumtreehouse-show-mediumtreehouse-show-mediumtreehouse-show-mediumtreehouse-show-mediumtreehouse-show-mediumtreehouse-show-mediumtreehouse-show-mediumtreehouse-show-mediumtreehouse-show-mediumtreehouse-show-mediumtreehouse-show-mediumtreehouse-show-mediumtreehouse-show-medium', '2:38', 'http://ctpc.dev/assets/videos/video.mp4', 'http://ctpc.dev/assets/images/treehouse-show-medium.jpg', '1', '0', '10', '1', '1', '1', '2016-07-23 10:28:30', '2016-07-23 12:42:45', null, '2016-07-23 12:42:45');
INSERT INTO `videos` VALUES ('17', 'what-most-schools-dont-teach-you-medium', 'what-most-schools-dont-teach-you-medium', 'what-most-schools-dont-teach-you-medium', 'what-most-schools-dont-teach-you-mediumwhat-most-schools-dont-teach-you-mediumwhat-most-schools-dont-teach-you-mediumwhat-most-schools-dont-teach-you-mediumwhat-most-schools-dont-teach-you-mediumwhat-most-schools-dont-teach-you-mediumwhat-most-schools-dont-teach-you-mediumwhat-most-schools-dont-teach-you-mediumwhat-most-schools-dont-teach-you-medium', '2:09', 'http://ctpc.dev/assets/videos/video.mp4', 'http://ctpc.dev/assets/images/what-most-schools-dont-teach-you-medium.jpg', '1', '0', '9', '3', '1', '1', '2016-07-23 10:29:08', '2016-07-23 18:23:45', null, '2016-07-23 18:23:45');
