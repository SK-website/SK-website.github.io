-- -- Adminer 4.5.0 MySQL dump

-- SET NAMES utf8;
-- SET time_zone = '+00:00';
-- SET foreign_key_checks = 0;
-- SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

-- SET NAMES utf8mb4;

-- DROP TABLE IF EXISTS `brands`;
-- CREATE TABLE `brands` (
--   `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
--   `name` varchar(20) NOT NULL,
--   `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
--   `description` text NOT NULL,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- INSERT INTO `brands` (`id`, `name`, `status`, `description`) VALUES
-- (1,	'All Cats',	1,	'all cats'),
-- (2,	'All Dods',	1,	'all dogs');

-- DROP TABLE IF EXISTS `categories`;
-- CREATE TABLE `categories` (
--   `id` int(11) NOT NULL AUTO_INCREMENT,
--   `name` varchar(50) NOT NULL,
--   `status` int(1) NOT NULL,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- INSERT INTO `categories` (`id`, `name`, `status`) VALUES
-- (9,	'Clothes',	1),
-- (10,	'Shoes',	1),
-- (11,	'watches',	1);

-- DROP TABLE IF EXISTS `guestbook`;
-- CREATE TABLE `guestbook` (
--   `id` int(11) NOT NULL AUTO_INCREMENT,
--   `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `email` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
--   `subject` int(9) DEFAULT NULL,
--   `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- INSERT INTO `guestbook` (`id`, `name`, `email`, `message`, `subject`, `created_at`) VALUES
-- (1,	'John',	'john@example.com',	'Hi, It is John Doe',	1,	'2020-09-30 09:04:45'),
-- (2,	'John',	'john@example.com',	'Hi, It is John Doe',	1,	'2020-09-30 09:05:13'),
-- (3,	'Jaine',	'jaine@example.com',	'Hi, It is Jain Aire',	1,	'2020-09-30 09:05:13'),
-- (4,	'Joker',	'jk@my.cat',	'Hello cats!',	2,	'2020-09-30 09:14:44');

-- DROP TABLE IF EXISTS `orders`;
-- CREATE TABLE `orders` (
--   `id` int(11) NOT NULL AUTO_INCREMENT,
--   `user_id` int(11) DEFAULT NULL,
--   `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
--   `products` text COLLATE utf8mb4_unicode_ci NOT NULL,
--   `status` int(11) NOT NULL DEFAULT '1',
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- INSERT INTO `orders` (`id`, `user_id`, `order_date`, `products`, `status`) VALUES
-- (1,	2,	'2020-10-26 07:56:55',	'[{\"id\":1,\"amount\":1}]',	1),
-- (2,	2,	'2020-10-26 13:04:06',	'[{\"id\":1,\"amount\":1},{\"id\":3,\"amount\":1}]',	1);

-- DROP TABLE IF EXISTS `pictures`;
-- CREATE TABLE `pictures` (
--   `id` int(10) NOT NULL AUTO_INCREMENT,
--   `filename` varchar(50) NOT NULL,
--   `resource` varchar(50) NOT NULL,
--   `resource_id` int(10) NOT NULL,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- INSERT INTO `pictures` (`id`, `filename`, `resource`, `resource_id`) VALUES
-- (1,	'2492afd6abba3114f84f25fbcee2131af90040fc1603096419',	'products',	1),
-- (2,	'74fb26db4f3242f91383c29998f20930f76d9bf01603279971',	'categories',	8),
-- (3,	'3aea7da61f2a1f71f64d617566d5c160b6364a701603280018',	'categories',	9),
-- (4,	'86b9ad43c63dbae38f9c3e3452deb85dfaa004a91603283284',	'products',	2),
-- (5,	'c70caa2c16d845b82fedb0b721e0b6bb076e6a001603284316',	'categories',	10),
-- (6,	'f36c7fdbc0dddffe8812a718e8b2319e3de339c71603649604',	'products',	3),
-- (7,	'05d2e57a2c380aec548b37df15418a9c51ccd80b1603700772',	'categories',	11),
-- (8,	'83065e4a5894391de61616f466bd551959c0d2b31603700832',	'products',	4);

-- DROP TABLE IF EXISTS `products`;
-- CREATE TABLE `products` (
--   `id` int(11) NOT NULL AUTO_INCREMENT,
--   `name` varchar(255) NOT NULL,
--   `status` tinyint(1) NOT NULL,
--   `category_id` int(11) unsigned DEFAULT NULL,
--   `price` float unsigned NOT NULL,
--   `brand_id` int(11) unsigned NOT NULL,
--   `description` text NOT NULL,
--   `is_new` tinyint(1) NOT NULL DEFAULT '1',
--   `is_recommended` tinyint(1) NOT NULL DEFAULT '0',
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- INSERT INTO `products` (`id`, `name`, `status`, `category_id`, `price`, `brand_id`, `description`, `is_new`, `is_recommended`) VALUES
-- (1,	'Red shoes',	1,	10,	222,	1,	'red sjoes',	1,	0),
-- (2,	'Men&#039;s T-Shirt',	1,	9,	123,	2,	'Men&#039;s T-Shirt test 2',	1,	0),
-- (3,	'Black shoes',	1,	10,	111,	2,	'Men&#039;s shoes',	1,	0),
-- (4,	'Kui Ye watch',	1,	11,	22,	2,	'Kui Ye watch',	1,	0);

-- DROP TABLE IF EXISTS `roles`;
-- CREATE TABLE `roles` (
--   `id` int(11) NOT NULL AUTO_INCREMENT,
--   `name` varchar(25) NOT NULL,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- INSERT INTO `roles` (`id`, `name`) VALUES
-- (1,	'admin');

-- DROP TABLE IF EXISTS `users`;
-- CREATE TABLE `users` (
--   `id` int(11) NOT NULL AUTO_INCREMENT,
--   `name` varchar(255) NOT NULL,
--   `email` varchar(255) NOT NULL,
--   `password` varchar(255) NOT NULL,
--   `role_id` int(11) unsigned NOT NULL DEFAULT '3',
--   `status` tinyint(1) NOT NULL DEFAULT '1',
--   `first_name` varchar(20) DEFAULT NULL,
--   `last_name` varchar(20) DEFAULT NULL,
--   `phone_number` varchar(13) DEFAULT NULL,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`, `status`, `first_name`, `last_name`, `phone_number`) VALUES
-- (1,	'admin',	'admin@my.cat',	'$2y$12$.tV2QqbjXV1T4a.gKC5D/e/WUVo6qpaHe08C.z2h08djmCdl.Li9W',	1,	1,	NULL,	NULL,	NULL),
-- (2,	'cat',	'cat@my.cat',	'$2y$12$0kXkzN3zYPd7bosw9.UVXelhDp/YO2LtP57DR8Pq.Iq58rGgnGVWu',	3,	1,	NULL,	NULL,	NULL),
-- (3,	'dog',	'dog@my.cat',	'$2y$12$QcFSrkMeWJIt16G6udpKHORVpI4YY/YoL4ohPf/IA0zMFFhFaTsjO',	3,	1,	NULL,	NULL,	NULL),
-- (4,	'Tom',	'tom@my.cat',	'$2y$12$EgSQLQUg9QMe.apZUR.bleScMRJ/J/mYSuiSxQvdkvjxHM.mT/Lra',	1,	1,	NULL,	NULL,	NULL),
-- (5,	'mary',	'mary@my.cat',	'$2y$12$W/yYxhMtl0vXRWGPiv0EnODbcbbmYyjRGJW0e.PJePxBNMnbwjb6u',	3,	1,	'Mary',	'Ann',	'1234567');

-- -- 2020-11-14 15:15:20