-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2020 at 06:36 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `castro`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` int(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `phone`, `address`, `status`, `created`, `modified`) VALUES
(1, 'Susan', 'Imali', 'imali.lungaho@strathmore.edu', 724920456, '8003-00300 Ronald Ng', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Susan', 'Imali', 'imali.lungaho@strathmore.edu', 724920456, '8003-00300 Ronald Ng', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Susan', 'Imali', 'imali.lungaho@strathmore.edu', 724920456, '8003-00300 Ronald Ng', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Susan', 'Imali', 'imali.lungaho@strathmore.edu', 724920456, '8003-00300 Ronald Ng', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Susan', 'Imali', 'imali.lungaho@strathmore.edu', 724920456, '8003-00300 Ronald Ng', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Susan', 'Imali', 'imali.lungaho@strathmore.edu', 724920456, '8003-00300 Ronald Ng', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Susan', 'Imali', 'imali.lungaho@strathmore.edu', 724920456, '8003-00300 Ronald Ng', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Susan', 'Imali', 'imali.lungaho@strathmore.edu', 724920456, '8003-00300 Ronald Ng', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fooditems`
--

CREATE TABLE `fooditems` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `ProductName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Price` int(20) NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fooditems`
--

INSERT INTO `fooditems` (`id`, `file_name`, `description`, `uploaded_on`, `ProductName`, `Price`, `status`) VALUES
(11, 'food7.jpg', '', '2020-07-16 13:43:36', 'Tacos', 500, ''),
(12, 'food6.png', '', '2020-07-16 13:41:31', 'Pizza', 1500, ''),
(13, 'food5.jpg', '', '2020-07-16 13:47:58', 'Dessert', 700, ''),
(25, 'food8.jpg', '', '2020-07-17 09:30:12', 'Chicken', 900, ''),
(27, 'food2.jpeg', '', '2020-07-31 20:32:45', 'food1', 100, ''),
(28, 'food1.jpg', '', '2020-07-31 20:33:06', 'food2', 1000, ''),
(29, 'rest3.jpeg', '', '2020-07-31 20:33:24', 'food3', 300, '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `grand_total` float(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `grand_total`, `created`, `status`) VALUES
(1, 1, 12.00, '2020-07-28 11:23:35', 'Pending'),
(2, 2, 9.00, '2020-07-31 11:44:43', 'Pending'),
(3, 3, 1.00, '2020-07-31 15:33:56', 'Pending'),
(4, 4, 1.00, '2020-07-31 15:35:26', 'Pending'),
(5, 5, 2.00, '2020-07-31 15:39:50', 'Pending'),
(6, 6, 1.00, '2020-07-31 15:40:10', 'Pending'),
(7, 7, 1.00, '2020-07-31 15:41:49', 'Pending'),
(8, 8, 4.00, '2020-07-31 20:40:34', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(3, 3, 25, 1),
(4, 4, 25, 1),
(5, 5, 13, 1),
(6, 5, 25, 1),
(7, 6, 12, 1),
(8, 7, 13, 1),
(9, 8, 27, 1),
(10, 8, 28, 1),
(11, 8, 29, 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` int(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `status`, `created`, `modified`) VALUES
(1, 'Chicken', 'An exquisite meal', 3920, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `CustomerID` int(10) NOT NULL,
  `EmailAddress` varchar(100) NOT NULL,
  `PhoneNumber` int(100) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `User_Type` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`CustomerID`, `EmailAddress`, `PhoneNumber`, `Password`, `User_Type`) VALUES
(2, 'susanimali52@gmail.com', 345678, 'pass', 'admin'),
(3, 'fundamentor@gmail.com', 725860527, 'password', 'user'),
(4, 'susanimali@gmail.com', 728367181, 'euwebd', 'user'),
(5, 'lungahosusan@gmail.com', 83767126, 'styudn37dq', 'user'),
(6, 'janedoe@gmail.com', 274284894, '1234pass', 'user'),
(10, 'imalisusan@gmail.com', 932752, 'password', 'user'),
(11, 'pauladean@gmail.com', 345678987, 'osndsds', 'user'),
(12, 'deanpaula@gmail.com', 523723621, '1dfgbasu', 'user'),
(13, 'barryallen@gmail.com', 4125678, 'ghsjhudwd', 'user'),
(14, 'iriswest@gmail.com', 1234223, 'cdsghxjbai', 'user'),
(15, 'ciscoramon@gmail.com', 7521456, 'asdfghj\\xh', 'user'),
(16, 'killerfrost@gmail.com', 75322345, 'desaryejj\'', 'user'),
(17, 'nashwells@gmail.com', 7325523, '134526sd', 'user'),
(18, 'joewest@gmail.com', 7252551, 'jahdh34', 'user'),
(23, 'client1@gmail.com', 724920456, 'pass', 'user'),
(24, 'client2@gmail.com', 724920456, 'pass', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fooditems`
--
ALTER TABLE `fooditems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`CustomerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fooditems`
--
ALTER TABLE `fooditems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `CustomerID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
