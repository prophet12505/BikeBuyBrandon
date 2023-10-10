-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2023 at 08:12 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bikebuy`
--
CREATE DATABASE IF NOT EXISTS `bikebuy` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bikebuy`;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `first_name`, `last_name`, `email`, `subject`, `comment`, `comment_date`) VALUES
(1, 'John', 'Doe', 'johndoe@gmail.com', 'Product feedback', 'I really love the mountain bike I purchased!', '2023-04-05 00:20:02'),
(2, 'Oliver', 'Rodger', 'OliverRodger@example.com', 'Customer service', 'I had a question about my order, please contact me', '2023-04-05 00:20:02'),
(3, 'Sophia', 'Williams', 'sophiawilliams@example.com', 'Product inquiry', 'I would like to know more about the bike specifications.', '2023-04-05 02:40:14'),
(4, 'Ethan', 'Johnson', 'ethanjohnson@gmail.com', 'Order issue', 'I received the wrong color bike in my order.', '2023-04-05 02:40:14'),
(5, 'Emma', 'Brown', 'emmabrown@example.com', 'Shipping delay', 'My order has not arrived yet. Can you provide an update?', '2023-04-05 02:40:14'),
(6, 'Ava', 'Taylor', 'avataylor@gmail.com', 'Product review', 'The bike is of excellent quality and rides smoothly.', '2023-04-05 02:40:14'),
(7, 'Liam', 'Jones', 'liamjones@example.com', 'Payment issue', 'I am having trouble making a payment for my order.', '2023-04-05 02:40:14'),
(8, 'Olivia', 'Davis', 'oliviadavis@gmail.com', 'Order cancellation', 'I need to cancel my order as my plans have changed.', '2023-04-05 02:40:14'),
(9, 'Noah', 'Smith', 'noahsmith@example.com', 'Product inquiry', 'Is the bike suitable for off-road trails?', '2023-04-05 02:40:14'),
(10, 'Mia', 'Clark', 'miaclark@gmail.com', 'Order modification', 'I need to add an additional item to my order.', '2023-04-05 02:40:14'),
(11, 'James', 'Hall', 'jameshall@example.com', 'Product feedback', 'The bike exceeded my expectations in terms of performance.', '2023-04-05 02:40:14'),
(12, 'Harper', 'Young', 'harperyoung@gmail.com', 'Order tracking', 'Can I track my order to know when it will be delivered?', '2023-04-05 02:40:14');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `ordernum` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `orderdate` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`ordernum`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`ordernum`, `user_id`, `total`, `orderdate`) VALUES
(2, 14, 700, '2023-10-09 14:59:18'),
(3, 14, 700, '2023-10-09 14:59:48'),
(4, 14, 268, '2023-10-09 15:02:31'),
(8, 14, 2908, '2023-10-09 15:42:55'),
(9, 14, 4516, '2023-10-09 15:59:14'),
(10, 14, 268, '2023-10-09 16:02:39'),
(11, 14, 268, '2023-10-09 16:03:32'),
(12, 14, 268, '2023-10-09 16:04:06'),
(13, 14, 2718, '2023-10-09 16:06:39'),
(14, 14, 660, '2023-10-09 16:10:31'),
(15, 14, 350, '2023-10-09 16:13:40'),
(16, 14, 268, '2023-10-09 16:14:12'),
(17, 14, 2220, '2023-10-09 19:41:37');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

DROP TABLE IF EXISTS `order_item`;
CREATE TABLE IF NOT EXISTS `order_item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `ordernum` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`item_id`),
  KEY `ordernum` (`ordernum`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`item_id`, `ordernum`, `product_id`, `quantity`, `price`) VALUES
(1, 8, 3, 4, 659.99),
(2, 8, 2, 1, 268),
(3, 9, 2, 7, 268),
(4, 9, 3, 4, 659.99),
(5, 10, 2, 1, 268),
(6, 11, 2, 1, 268),
(7, 12, 2, 1, 268),
(8, 13, 4, 7, 349.99),
(9, 13, 2, 1, 268),
(10, 14, 3, 1, 659.99),
(11, 15, 4, 1, 349.99),
(12, 16, 2, 1, 268),
(13, 17, 3, 2, 659.99),
(14, 17, 5, 1, 899.99);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` enum('Men''s bikes','Women''s bikes','Kids'' bikes','') DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image_url` varchar(255) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `price`, `category`, `description`, `image_url`) VALUES
(1, 'Movelo Algonquin 24 inches Steel Mountain Bike', '168.00', 'Men\'s bikes', 'A high-performance mountain bike with full suspension', './img/goods/Mountain Bike 1.jpg'),
(2, '27.5 inches Hyper Bear Mountain Bike, Aluminum', '268.00', 'Men\'s bikes', 'A lightweight and fast road bike with drop handlebars', './img/goods/Mountain Bike 2.jpg'),
(3, 'Hyper Electric 700c Unisex Aluminum Electric bikes', '659.99', 'Men\'s bikes', 'A versatile and durable mountain bike with hydraulic disc brakes', './img/goods/Mountain Bike 3.jpg'),
(4, '24 inches Hyper Bear Mountain Bike, Aluminum GRN', '349.99', 'Men\'s bikes', 'A comfortable and stylish hybrid bike for city commuting', './img/goods/Mountain Bike 4.jpg'),
(5, 'Hyper Bear 26-inchs Ladies Aluminum Mountain Bike', '899.99', 'Women\'s bikes', 'A high-quality mountain bike with 29-inch wheels and Shimano drivetrain', './img/goods/Women Bike 1.jpg'),
(6, 'Huffy 26-inch Capitol Women’s Beach Cruiser', '399.99', 'Women\'s bikes', 'A lightweight and agile hybrid bike for fitness and commuting', './img/goods/Women Bike 2.jpg'),
(7, '26-inch Hyper Easy Rider', '1099.99', 'Women\'s bikes', 'A fat tire bike for all-season adventures on snow, sand, or dirt', './img/goods/Women Bike 3.jpg'),
(8, 'Movelo Rush 12-inch Boys’ Steel Bike', '329.99', 'Kids\' bikes', 'A high-performance gravel bike with Lefty Oliver suspension fork', './img/goods/Kid Bike 1.jpg'),
(9, 'Movelo Algonquin 20in Boys’ Steel', '749.99', 'Kids\' bikes', 'A reliable and versatile mountain bike with front suspension', './img/goods/Kid Bike 2.jpg'),
(10, 'Disney Frozen 12in Girls’ Bike, Blue', '299.99', 'Kids\' bikes', 'A classic BMX bike with a retro design for cruising and freestyle riding', './img/goods/Kid Bike 3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `password`) VALUES
(1, 'John Doe', 'johndoe@gmail.com', 'password1231'),
(2, 'Oliver Rodger', 'OliverRodger@gmail.com', 'password1232'),
(3, 'Emma Johnson', 'emmajohnson@gmail.com', 'password1233'),
(4, 'William Smith', 'williamsmith@example.com', 'password1234'),
(5, 'Sophia Brown', 'sophiabrown@gmail.com', 'password1235'),
(6, 'James Davis', 'jamesdavis@example.com', 'password1236'),
(7, 'Olivia Taylor', 'oliviataylor@gmail.com', 'password1237'),
(8, 'Ethan Clark', 'ethanclark@example.com', 'password1238'),
(9, 'Ava Wilson', 'avawilson@gmail.com', 'password1239'),
(10, 'Benjamin Turner', 'benjaminturner@example.com', 'password1240'),
(13, 'Oliver Rodger', '1233@qq.com', '123'),
(14, 'Oliver Rodger', '123@qq.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_ibfk_1` FOREIGN KEY (`ordernum`) REFERENCES `order` (`ordernum`),
  ADD CONSTRAINT `order_item_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
