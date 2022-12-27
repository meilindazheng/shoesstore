/*
SQLyog Ultimate v12.4.1 (64 bit)
MySQL - 10.4.27-MariaDB : Database - shoes_store
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`shoes_store` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `shoes_store`;

/*Table structure for table `brands` */

DROP TABLE IF EXISTS `brands`;

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_title` varchar(255) NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `brands` */

insert  into `brands`(`brand_id`,`brand_title`) values 
(1,'Adidas'),
(2,'Puma'),
(3,'Nike'),
(4,'Hush Puppies'),
(5,'Converse');

/*Table structure for table `cart_details` */

DROP TABLE IF EXISTS `cart_details`;

CREATE TABLE `cart_details` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(100) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `product_id` (`product_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `cart_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cart_details_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `cart_details` */

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_title` varchar(255) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `categories` */

insert  into `categories`(`category_id`,`category_title`) values 
(1,'Running'),
(2,'Walking'),
(3,'Sporty'),
(4,'Classic'),
(5,'Retro');

/*Table structure for table `orders_pending` */

DROP TABLE IF EXISTS `orders_pending`;

CREATE TABLE `orders_pending` (
  `user_id` int(11) DEFAULT NULL,
  `invoice_number` int(255) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(255) DEFAULT NULL,
  `order_status` varchar(255) DEFAULT NULL,
  KEY `product_id` (`product_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `orders_pending_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `orders_pending` */

insert  into `orders_pending`(`user_id`,`invoice_number`,`product_id`,`quantity`,`order_status`) values 
(1,1665319319,9,1,'completed'),
(1,1665319319,4,2,'completed'),
(1,1147838438,9,1,'completed'),
(1,841427558,11,1,'completed'),
(1,596202242,6,4,'completed');

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) DEFAULT NULL,
  `product_image2` varchar(255) DEFAULT NULL,
  `product_image3` varchar(255) DEFAULT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `category_id` (`category_id`),
  KEY `brand_id` (`brand_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `products_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `products` */

insert  into `products`(`product_id`,`product_title`,`product_description`,`product_keywords`,`category_id`,`brand_id`,`product_image1`,`product_image2`,`product_image3`,`product_price`,`date`,`status`) values 
(1,'Puma Sporty Rainbow J-4812','Cools Looks','Puma, Cools, Sporty',1,2,'puma_1.jpg','puma_6.jpg','puma_2.jpg','1750000','2022-12-23 17:40:40','true'),
(2,'Puma Classic Woman X-935','Designed in Casual Ways , Suitable for daily Casual Usage','Puma, Woman, Classic',3,2,'puma_6.jpg','puma_1.jpg','puma_2.jpg','1650000','2022-12-10 17:38:19','true'),
(3,'Puma BnW Special Edition S-294','Bringing Out 90s Style, Absolutely will Complement Your Outfit','Puma, Black and White',4,2,'puma_3.jpg','puma_4.jpg','puma_5.jpg','2400000','2022-12-10 17:42:31','true'),
(4,'Puma All White W-470','With a Clean White Looks, Match You on Any Occasions','Puma , White',1,2,'puma_4.jpg','puma_5.jpg','puma_6.jpg','1850000','2022-12-10 17:40:16','true'),
(5,'Puma Special Black B-773','Comes in Deep Black Leather to Spice Up Your Outfit','Puma, Black',5,2,'puma_5.jpg','puma_6.jpg','puma_1.jpg','2700000','2022-12-10 17:40:58','true'),
(6,'Puma Rainbow Unisex P-676','Designed In A Girly Style to Accompany You on Morning Run','Puma, Unisex, Run',1,2,'puma_2.jpg','puma_3.jpg','puma_4.jpg','1750000','2022-12-10 17:42:11','true'),
(7,'Nike Dark Blue x Black N-086','Get the Feels to Wear A Cotton Shoes Fast on Your Feet','Nike, Dark Blue',1,3,'nike_6.jpeg','nike_1.jpeg','nike_2.jpeg','3150000','2022-12-10 17:43:55','true'),
(8,'Nike Air Force Retro R-846','The Retro Series Lets You Feed Your Need and Boost Your Confidence','Nike, Air Force, Retro',2,3,'nike_1.jpeg','nike_2.jpeg','nike_3.jpeg','2300000','2022-12-10 17:47:07','true'),
(9,'Nike Air Max Excee E-992','Earthy Neutrals Pair With Subtle Pops of Fresh Color to Style You','Nike, Air Max, Excee',3,3,'nike_2.jpeg','nike_3.jpeg','nike_4.jpeg','2275000','2022-12-10 17:49:30','true'),
(10,'Nike Air Max 90 G NRG','Step Into The 1st Pair of Shoes With The Timeless Flair and Functionality','Nike, Air Max',4,3,'nike_3.jpeg','nike_6.jpeg','nike_5.jpeg','2150000','2022-12-10 17:54:11','true'),
(11,'Nike Air Jordan 1 AJ-837','Just Wait Until You Feel The Ultra-Comfortable Air Cushioning Underfoot','Nike, Air Jordan',5,3,'nike_5.jpeg','nike_3.jpeg','nike_6.jpeg','2375000','2022-12-10 17:54:57','true'),
(12,'Nike Dunk Retro LR-637','From Backboards to Skateboards, the Dunk Low is Your Emblem of Tried and Tested.','Nike, Dunk, Retro',5,3,'nike_4.jpeg','nike_1.jpeg','nike_2.jpeg','1950000','2022-12-10 17:55:47','true');

/*Table structure for table `user_order` */

DROP TABLE IF EXISTS `user_order`;

CREATE TABLE `user_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `amount_due` int(255) DEFAULT NULL,
  `invoice_number` int(255) DEFAULT NULL,
  `total_products` int(255) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `user_order` */

insert  into `user_order`(`order_id`,`user_id`,`amount_due`,`invoice_number`,`total_products`,`order_date`,`order_status`) values 
(1,1,5975000,1665319319,3,'2022-12-24 11:59:10','completed'),
(2,1,2275000,1147838438,1,'2022-12-24 12:31:41','completed'),
(3,1,2375000,841427558,1,'2022-12-25 15:09:45','completed'),
(4,1,7000000,596202242,4,'2022-12-25 15:10:12','completed');

/*Table structure for table `user_payments` */

DROP TABLE IF EXISTS `user_payments`;

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `invoice_number` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `payment_mode` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`payment_id`),
  KEY `order_id` (`order_id`),
  CONSTRAINT `user_payments_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `user_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `user_payments` */

insert  into `user_payments`(`payment_id`,`order_id`,`invoice_number`,`amount`,`payment_mode`,`date`) values 
(1,1,1665319319,5975000,'VA Bank Central Asia','2022-12-24 11:59:10'),
(2,2,1147838438,2275000,'VA Bank Rakyat Indonesia','2022-12-24 12:31:41');

/*Table structure for table `user_table` */

DROP TABLE IF EXISTS `user_table`;

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `user_mobile` varchar(20) DEFAULT NULL,
  `user_role` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `user_table` */

insert  into `user_table`(`user_id`,`user_name`,`user_email`,`user_password`,`user_address`,`user_mobile`,`user_role`) values 
(1,'Meilinda Zheng','2073013@maranatha.ac.id','1234 ','Bandung','08126488963','User'),
(2,'Keyko','2073016@maranatha.ac.id','1234','Bandung','08128428112','User'),
(5,'admin','admin@maranatha.ac.id','1234 ','Bandung','0812319328','Admin'),
(6,'John','John@maranatha.ac.id','1234 ','Bandung','093127321738','User');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
