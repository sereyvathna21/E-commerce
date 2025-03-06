-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 08, 2024 at 12:48 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;


--
-- Database: `final_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(244) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
);

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `username`, `password`, `image`) VALUES
(1, 'Heng Visal', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', '375x375bb.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `cart` int NOT NULL,
  `total` int NOT NULL,
  PRIMARY KEY (`cart_id`)
) ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
);

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`) VALUES
(8, 'Clothing'),
(9, 'Food'),
(10, 'Vegetable'),
(17, 'Fruit');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
);

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `first_name`, `last_name`, `phone`, `city`, `username`, `password`) VALUES
(7, 'Heng ', 'Panharanith', '09876541', 'Phnom Penh', 'nith@gmail.com', '202cb962ac59075b964b07152d234b70'),
(5, 'Heng', 'Visal', '098765431', 'Phnom Penh', 'hengvisal@gmail.com', '202cb962ac59075b964b07152d234b70'),
(6, 'Kao', 'vichet', '098765431', 'Battambang', 'vichet@gmail.com', 'c6f057b86584942e415435ffb1fa93d4'),
(8, 'Mann', 'Vannda', '098765431', 'Phnom Penh', 'vannda@gmail.com', '698d51a19d8a121ce581499d7b701668');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `feedback_id` int NOT NULL AUTO_INCREMENT,
  `by_rate` int DEFAULT NULL,
  `by_cmt` varchar(255) DEFAULT NULL,
  `from_where` varchar(255)  NOT NULL,
  PRIMARY KEY (`feedback_id`)
) ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `by_rate`, `by_cmt`, `from_where`) VALUES
(18, 5, 'ងោោដ', 'Customers'),
(17, NULL, 'Goood', 'Staff'),
(16, NULL, 'Goood', 'Staff'),
(15, 1, 'Goood', 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `image_id` int NOT NULL AUTO_INCREMENT,
  `image_product` varchar(255) DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  PRIMARY KEY (`image_id`),
  KEY `product_id` (`product_id`)
) ;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`image_id`, `image_product`, `product_id`) VALUES
(86, 'OIP (5).jpg', 86),
(87, '--242237169820444159978164-c.webp', 87),
(88, 'R (1).jpg', 88),
(83, 'pda34c339615e4281a583f3a6815dde70.jpg', 83),
(84, 'OIP (1).jpg', 84),
(85, '369846237_772243181579160_9005196934919515295_n.jpg', 85),
(81, 'OIP (4).jpg', 81),
(82, 'R (1).jpg', 82),
(79, 'OIP (3).jpg', 79),
(80, 'OIP (4).jpg', 80),
(78, 'OIP (3).jpg', 78),
(77, 'R (4).jpg', 77),
(76, 'duren.jpg', 76),
(75, 'R.png', 75),
(74, '', 74),
(66, 'https://t4.ftcdn.net/jpg/02/52/93/81/360_F_252938192_JQQL8VoqyQVwVB98oRnZl83epseTVaHe.jpg', 66),
(67, 'OIP (5).jpg', 67),
(68, 'bcfaa6b0e37fd1bed8ca5a8521355d60.jpg', 68),
(69, 'OIP.jpg', 69),
(70, '61iVe8CaA5L._AC_UX569_.jpg', 70),
(71, 'R (2).jpg', 71),
(72, 'R (3).jpg', 72),
(73, 'sokhakrom472.jpg', 73);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE IF NOT EXISTS `order_detail` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `quantity` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`)
) ;

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

DROP TABLE IF EXISTS `order_history`;
CREATE TABLE IF NOT EXISTS `order_history` (
  `oh_id` int NOT NULL AUTO_INCREMENT,
  `oh_quantity` int DEFAULT NULL,
  `oh_purchasedate` date DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `image_oh` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`oh_id`),
  KEY `product_id` (`product_id`)
) ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `image_id` int DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `discount` int NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `category_id` (`category_id`),
  KEY `image_id` (`image_id`)
) ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `price`, `category_id`, `image_id`, `description`, `discount`) VALUES
(81, 'ពោត', 1.45, 10, 81, '1kg/', 5),
(78, 'សាឡាដ', 0.75, 10, 78, '1kg/', 5),
(77, 'ស្ពៃក្តោប', 2.5, 10, 77, '1kg/', 5),
(75, 'ផ្លែស្រកានាគ', 1, 17, 75, '1kg/', 0),
(76, 'ផ្លែធុរេន', 1, 17, 76, '1kg/', 0),
(73, 'ផ្លែទាប ', 1, 17, 73, '1kg/', 0),
(72, 'ផ្លែត្របែក', 1, 17, 72, '1kg/', 0),
(71, 'ផ្លែមាន', 2, 17, 71, '1kg/', 0),
(70, 'អាវដៃខ្លី', 10, 8, 70, 'Good', 5),
(69, 'Orange', 1, 9, 69, 'Good', 5),
(68, 'ខោទ្រនាប់', 10, 8, 68, 'Good', 5),
(82, 'ផ្លែផាសិន', 0.85, 17, 82, '1kg/', 5),
(83, 'ឆៃថាវ', 0.45, 10, 83, '1kg/', 5),
(84, 'ស្ពៃតឿ', 0.25, 10, 84, '1kg/', 2),
(88, 'ផ្លែទាប ', 0, 17, 88, '1kg/', 0),
(86, 'ខោBen10​', 18, 4, 86, 'For boy', 10),
(87, 'ខោគុនខ្មែរ', 45, 8, 87, 'Rare', 10);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `staff_id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `gender` varchar(255) NOT NULL,
  `hire_date` date DEFAULT NULL,
  `date_of_birth` date NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `staff_image` varchar(255) NOT NULL,
  PRIMARY KEY (`staff_id`)
);

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `firstname`, `lastname`, `phone_number`, `gender`, `hire_date`, `date_of_birth`, `city`, `username`, `password`, `staff_image`) VALUES
(53, 'Panha', 'Ranith', '017398902', 'Female', '2024-01-01', '2004-09-03', 'Phnom Penh', 'nith@gmail.com', '698d51a19d8a121ce581499d7b701668', '375x375bb.jpg'),
(55, 'Mann', 'Vannda', '098765431', 'Male', '1999-12-10', '2000-11-11', 'Preah Vihear', 'vannda@gmail.com', 'd3d9446802a44259755d38e6d163e820', '63ed32475daae944bd3ddc49_tena-khimphun-xPHrh.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `product_id`, `quantity`) VALUES
(61, 87, 0),
(60, 86, 10),
(59, 85, 12),
(58, 84, 10),
(57, 83, 0),
(56, 82, 0),
(55, 81, 90),
(54, 80, 100),
(53, 79, 100),
(52, 78, 89),
(51, 77, 100),
(50, 76, 0),
(49, 75, 100),
(48, 74, 100),
(47, 73, 0),
(46, 72, 0),
(45, 71, 0),
(44, 70, 0),
(43, 69, 0),
(42, 68, 0),
(41, 67, 10),
(40, 66, 10),
(39, 65, 10),
(62, 88, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `usertype` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `usertype`) VALUES
(34, 'tena@gmail.com', 'b6d767d2f8ed5d21a44b0e5886680cb9', 'staff'),
(33, 'vith@gmail.com', '6512bd43d9caa6e02c990b0a82652dca', 'staff'),
(32, 'vannda@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', 'staff'),
(31, 'vath@gmail.com', '202cb962ac59075b964b07152d234b70', 'staff'),
(30, 'kaovichet@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', 'staff'),
(29, 'roth@gmail.com', '6512bd43d9caa6e02c990b0a82652dca', 'staff'),
(28, 'nith@gmail.com', '202cb962ac59075b964b07152d234b70', 'staff'),
(27, 'visal@gmail.com', '202cb962ac59075b964b07152d234b70', 'staff'),
(26, 'visal@gmail.com', '202cb962ac59075b964b07152d234b70', 'staff'),
(25, 'visal@gmail.com', '202cb962ac59075b964b07152d234b70', 'staff'),
(24, 'visal@gmail.com', '202cb962ac59075b964b07152d234b70', 'staff'),
(23, 'visal@gmail.com', '202cb962ac59075b964b07152d234b70', 'staff'),
(22, 'visal@gmail.com', '202cb962ac59075b964b07152d234b70', 'staff'),
(18, 'you@gmail.com', '6512bd43d9caa6e02c990b0a82652dca', 'staff'),
(19, 'hengvisal@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', 'staff'),
(20, 'hengvisal@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', 'staff'),
(21, 'hengvisal@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', 'staff'),
(35, 'sophal@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'staff'),
(36, 'nith@gmail.com', '202cb962ac59075b964b07152d234b70', 'staff'),
(37, 'vichet@gmail.com', '6512bd43d9caa6e02c990b0a82652dca', 'staff'),
(38, 'khom@gmail.com', '202cb962ac59075b964b07152d234b70', 'staff'),
(39, 'nith@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', 'staff'),
(40, 'nith@gmail.com', '202cb962ac59075b964b07152d234b70', 'staff'),
(41, 'nith@gmail.com', '202cb962ac59075b964b07152d234b70', 'staff'),
(42, 'nith@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', 'staff'),
(43, 'nith@gmail.com', '202cb962ac59075b964b07152d234b70', 'staff'),
(44, 'imhengvisal168@gmail.com', '202cb962ac59075b964b07152d234b70', 'staff'),
(45, 'ranith@gmail.com', '202cb962ac59075b964b07152d234b70', 'staff'),
(46, 'ranith@gmail.com', '202cb962ac59075b964b07152d234b70', 'staff'),
(47, 'chet@gmail.com', '202cb962ac59075b964b07152d234b70', 'staff'),
(48, 'chet@gmail.com', '202cb962ac59075b964b07152d234b70', 'staff'),
(49, 'chet@gmail.com', '202cb962ac59075b964b07152d234b70', 'staff'),
(50, 'chet@gmail.com', '202cb962ac59075b964b07152d234b70', 'staff'),
(51, 'bunna@gmail.com', '202cb962ac59075b964b07152d234b70', 'staff'),
(52, 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', 'admin'),
(53, 'nith@gmail.com', '202cb962ac59075b964b07152d234b70', 'staff'),
(54, 'nith@gmail.com', '202cb962ac59075b964b07152d234b70', 'staff'),
(55, 'nith@gmail.com', '6512bd43d9caa6e02c990b0a82652dca', 'staff'),
(56, 'vannda@gmail.com', '202cb962ac59075b964b07152d234b70', 'staff'),
(57, 'nith@gmail.com', '202cb962ac59075b964b07152d234b70', 'staff'),
(58, 'vannda@gmail.com', 'd3d9446802a44259755d38e6d163e820', 'staff'),
(59, 'vannda@gmail.com', 'd3d9446802a44259755d38e6d163e820', 'staff');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
