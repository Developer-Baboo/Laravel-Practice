/*
SQLyog Ultimate v12.5.0 (64 bit)
MySQL - 10.4.28-MariaDB : Database - ecommerce
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ecommerce` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `ecommerce`;

/*Table structure for table `carts` */

DROP TABLE IF EXISTS `carts`;

CREATE TABLE `carts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `prod_id` varchar(255) NOT NULL,
  `prod_qty` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `carts` */

insert  into `carts`(`id`,`user_id`,`prod_id`,`prod_qty`,`created_at`,`updated_at`) values 
(1,'2','1','7','2023-09-23 18:30:32','2023-09-23 18:30:32'),
(2,'2','5','1','2023-09-23 18:38:24','2023-09-23 18:38:24'),
(3,'2','4','1','2023-09-24 04:42:07','2023-09-24 04:42:07'),
(4,'2','8','1','2023-09-24 08:03:37','2023-09-24 08:03:37');

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `popular` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(500) DEFAULT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_descrip` varchar(255) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `categories` */

insert  into `categories`(`id`,`name`,`slug`,`description`,`status`,`popular`,`image`,`meta_title`,`meta_descrip`,`meta_keywords`,`created_at`,`updated_at`) values 
(3,'Electronics','electronics','You can find the best quality products on our ecommerce plateform',0,1,'1695279361.png','sdf','sdfsd','sfsd','2023-09-21 01:56:01','2023-09-21 01:56:01'),
(4,'Dress','dress','You can find the best quality and branded clothes on our ecommerce plateform',0,1,'1695360425.png','meta_title','Meta KeyWordsMeta KeyWordsMeta KeyWords','Meta KeyWordsMeta KeyWords','2023-09-22 00:27:05','2023-09-22 00:27:05'),
(5,'Groceries','groceries','You can find the best quality grocery products on our ecommerce plateform',0,1,'1695366349.png','meta_title','Description','Description','2023-09-22 02:05:49','2023-09-22 02:05:49'),
(6,'Stationary','stationaries','Here You can find the best quality products on our ecommerce platform',0,0,'1695366391.png','meta_title','DescriptionDescriptionDescription','DescriptionDescription','2023-09-22 02:06:31','2023-09-22 02:06:31');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_reset_tokens_table',1),
(3,'2014_10_12_100000_create_password_resets_table',1);

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL,
  `cate_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `small_description` mediumtext NOT NULL,
  `description` longtext NOT NULL,
  `original_price` varchar(255) NOT NULL,
  `selling_price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `tax` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `trending` tinyint(4) NOT NULL,
  `meta_title` mediumtext NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products` */

insert  into `products`(`id`,`cate_id`,`name`,`slug`,`small_description`,`description`,`original_price`,`selling_price`,`image`,`qty`,`tax`,`status`,`trending`,`meta_title`,`meta_keywords`,`meta_description`,`created_at`,`updated_at`) values 
(1,3,'Samsung Tablet','samsung-tablet','It is one of the high quality samsung table in pakistan','sdfsd','90000','80000','1695295827.png','33','33',1,1,'sdf','sfsdf','sfsd','2023-09-21 06:30:27','2023-09-21 06:30:27'),
(2,3,'Iphone Keypad','iphone-keypad','It is one of the high quality samsung table in pakistan','sdfsd','35000','33000','1695295869.png','3','3',0,1,'sdfsd','sdfsd','sdfsd','2023-09-21 06:31:09','2023-09-21 06:31:09'),
(3,4,'Baby Dress','baby-dress','It is one of the high quality baby dress in pakistan','Small DescriptionSmall DescriptionSmall Description','1400','1300','1695360527.png','5','60',1,1,'meta_title','Meta KeyWordsMeta KeyWords','Meta DescriptionMeta Description','2023-09-22 00:28:47','2023-09-22 00:28:47'),
(4,4,'3-Piece','3-piece','It is one of the high quality 3 Piece in pakistan','DescriptionDescription','1400','1300','1695360640.png','30','10',1,1,'meta_title','Meta KeyWordsMeta KeyWords','Meta KeyWordsMeta KeyWords','2023-09-22 00:30:40','2023-09-22 00:30:40'),
(5,4,'Formal Shirt','formal-shirt','It is one of the high quality samsung table in pakistan','Meta KeyWordsMeta KeyWordsMeta KeyWords','800','700','1695360746.png','4','50',1,1,'Meta KeyWords','Meta KeyWordsMeta KeyWords','Meta KeyWordsMeta KeyWordsMeta KeyWords','2023-09-22 00:32:26','2023-09-22 00:32:26'),
(6,3,'Head Set','Slug','Small DescriptionSmall Description','DescriptionDescription','4000','3000','1695360848.jpg','30','200',0,0,'meta_title','Meta KeyWordMeta KeyWord','Meta KeyWordMeta KeyWordMeta KeyWord','2023-09-22 00:34:08','2023-09-22 00:34:08'),
(7,3,'Dell Laptop','dell-laptop','Meta KeyWordMeta KeyWord','Meta KeyWordMeta KeyWord','40000','48000','1695360920.jpg','5','30',1,1,'Meta KeyWord','Meta KeyWordMeta KeyWord','Meta KeyWordMeta KeyWord','2023-09-22 00:35:20','2023-09-22 00:35:20'),
(8,3,'Lenvo Laptop','lenovo-laptop','Meta KeyWordMeta KeyWord','Meta KeyWordMeta KeyWord','88000','80000','1695360981.jpg','4','20',1,1,'Meta KeyWord','Meta KeyWordMeta KeyWord','Meta KeyWordMeta KeyWord','2023-09-22 00:36:21','2023-09-22 00:36:21');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`role_as`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Baboo','baboo@gmail.com',NULL,'$2y$10$LMLt325bycj6R7QYVWKLauq4BXjKDpb26cbMh9eotyVPxqS2plz1m',1,'i0G8khrijikVfHyAMNX68qB5zEZdBaIrckMDnfytgfaPqz4kBdMZ6ej5v4Tj','2023-09-20 00:41:56','2023-09-20 00:41:56'),
(2,'Mohan','mohan@gmail.com',NULL,'$2y$10$usZH6T3cRQV7awI/iuH6nOm5oW7RyhlPJNmmuNts81rba5FcZ3Ntq',0,'qAaun3IQprcAG0hU3Moeb69Oj5SlBFquRRSvsqApMzArQrRGk1chxhQvx2Em','2023-09-20 01:26:04','2023-09-20 01:26:04');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
