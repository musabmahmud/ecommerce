-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2021 at 07:05 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_panel`
--

CREATE TABLE `admin_panel` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_panel`
--

INSERT INTO `admin_panel` (`id`, `name`, `username`, `email`, `pass`, `level`, `status`) VALUES
(1, 'MD MUSAB MAHMUD', 'musab', 'md.musabmahmud100@gmail.com', 'feaee489c34814daaab2acdb2a02941f', 0, 1),
(2, 'MD MUSAB MAHMUD', 'musab', 'md.musabmahmud100@gmail.com', '2fb2e1e5335a84d74ae3ce5de95f0a3d', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1= active , 0 = deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catId`, `catName`, `status`) VALUES
(1, 'Desktop', 1),
(2, 'Computer', 1),
(3, 'Clothing', 1),
(4, 'Fashion', 1),
(5, 'Home Decor &amp; Kitchen', 1),
(6, 'Toys, Kids', 1),
(7, 'Beauty &amp; Healthcare', 1),
(33, 'T-Shirt', 1),
(43, 'Gen\'s', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_login`
--

CREATE TABLE `customer_login` (
  `cusId` int(11) NOT NULL,
  `cusName` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_login`
--

INSERT INTO `customer_login` (`cusId`, `cusName`, `email`, `pass`) VALUES
(5, 'MD Musab Mahmud', 'md.musabmahmud100@gmail.com', 'md.musabmahmud100@gmail.com'),
(6, 'Sadia Islam', 'sadia@gmail.com', 'sadia@gmail.com'),
(7, 'Sinmim Islam', 'sinmimislam@gmail.com', 'sinmimislam@gmail.com'),
(8, 'Sadia Islam', 'sadiaislam9949@gmail.com', 'sadiaislam9949@gmail.com'),
(9, 'Sadia', 'sadiaislam99@gmail.com', 'sadiaislam99@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `customer_table`
--

CREATE TABLE `customer_table` (
  `cusId` int(11) NOT NULL,
  `cusName` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(60) NOT NULL,
  `zip` int(11) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_table`
--

INSERT INTO `customer_table` (`cusId`, `cusName`, `address`, `city`, `zip`, `phone`, `email`, `country`) VALUES
(3, 'MD Musab Mahmud', 'Agamasihlane', 'Dhaka', 1000, '01630858100', 'md.musabmahmud100@gmail.com', 'Bangladesh'),
(14, 'MD Musab Mahmud', '103 agamasilane, Bangshal', 'Dhaka', 1000, '01630858100', 'md.musabmahmud10000@gmail.com', 'Bangladesh'),
(15, 'MD Musab Mahmud', '103 agamasilane, Bangshal', 'Dhaka', 1000, '01630858100', '', 'Bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `product_brand`
--

CREATE TABLE `product_brand` (
  `brandid` int(11) NOT NULL,
  `brandname` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_brand`
--

INSERT INTO `product_brand` (`brandid`, `brandname`, `status`) VALUES
(1, 'samsung', 1),
(2, 'samsung', 1),
(3, 'walton', 1),
(4, 'walton', 1),
(5, 'vivo', 1),
(10, 'blackberry', 1),
(11, 'I-phone', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_cart`
--

CREATE TABLE `product_cart` (
  `cartId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `productCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_cart`
--

INSERT INTO `product_cart` (`cartId`, `sId`, `productId`, `productName`, `price`, `quantity`, `image`, `productCode`) VALUES
(88, '8mbgaf9kr2b7sur6d6inng2oif', 88, 'Bag', 1450, 1, '3084867a9c.jpg', 5145),
(89, '8mbgaf9kr2b7sur6d6inng2oif', 84, 'Bag', 1450, 3, '3084867a9c.jpg', 5145),
(90, '8mbgaf9kr2b7sur6d6inng2oif', 89, 'Shoe', 5468, 3, '2067500d83.jpg', 5465);

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

CREATE TABLE `product_order` (
  `orderid` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `payment` varchar(60) NOT NULL,
  `total` int(11) NOT NULL,
  `ordernote` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_order`
--

INSERT INTO `product_order` (`orderid`, `email`, `payment`, `total`, `ordernote`, `date`, `status`) VALUES
(18, 'md.musabmahmud10000@gmail.com', 'cash', 6015, 'asdf asddfg asdf', '2021-06-28', 1),
(20, 'md.musabmahmud100@gmail.com', 'cash', 13990, 'Cash', '2021-06-28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_purchased`
--

CREATE TABLE `product_purchased` (
  `purchasedId` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `productCode` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_purchased`
--

INSERT INTO `product_purchased` (`purchasedId`, `email`, `productId`, `productName`, `price`, `quantity`, `image`, `productCode`, `date`) VALUES
(18, 'md.musabmahmud10000@gmail.com', 89, 'Shoe', 5468, 1, '2067500d83.jpg', 5465, '2021-06-28'),
(20, 'md.musabmahmud100@gmail.com', 85, 'Shoe', 5468, 1, '2067500d83.jpg', 5465, '2021-06-28'),
(21, 'md.musabmahmud100@gmail.com', 84, 'Bag', 1450, 5, '3084867a9c.jpg', 5145, '2021-06-28'),
(22, 'md.musabmahmud100@gmail.com', 59, 'Shoe', 5789, 5, '28e2a52e91.jpg', 4579, '2021-06-28');

-- --------------------------------------------------------

--
-- Table structure for table `product_table`
--

CREATE TABLE `product_table` (
  `productId` int(11) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandid` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `relatedImage` varchar(255) NOT NULL,
  `productCode` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_table`
--

INSERT INTO `product_table` (`productId`, `productName`, `catId`, `brandid`, `body`, `price`, `image`, `relatedImage`, `productCode`, `type`) VALUES
(56, 'Camera', 1, 2, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old', 560, '4e89579778.jpg', '4e89579779.jpg', 5460, 0),
(57, 'Bag', 4, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis finibus mauris, at ornare odio. Praesent hendrerit erat at ', 1450, '3084867a9c.jpg', '3084867a9d.jpg', 5145, 2),
(58, 'Shoe', 4, 2, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old', 5468, '2067500d83.jpg', '2067500d84.jpg', 5465, 1),
(59, 'Shoe', 4, 11, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old', 5789, '28e2a52e91.jpg', '28e2a52e92.jpg', 4579, 0),
(63, 'Camera', 1, 2, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old', 560, '4e89579778.jpg', '4e89579779.jpg', 5460, 0),
(64, 'Bag', 4, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis finibus mauris, at ornare odio. Praesent hendrerit erat at ', 1450, '3084867a9c.jpg', '3084867a9d.jpg', 5145, 2),
(65, 'Shoe', 4, 2, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old', 5468, '2067500d83.jpg', '2067500d84.jpg', 5465, 1),
(66, 'Shoe', 4, 11, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old', 5789, '28e2a52e91.jpg', '28e2a52e92.jpg', 4579, 0),
(67, 'Camera', 1, 2, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old', 560, '4e89579778.jpg', '4e89579779.jpg', 5460, 0),
(68, 'Bag', 4, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis finibus mauris, at ornare odio. Praesent hendrerit erat at ', 1450, '3084867a9c.jpg', '3084867a9d.jpg', 5145, 2),
(69, 'Shoe', 4, 2, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old', 5468, '2067500d83.jpg', '2067500d84.jpg', 5465, 1),
(70, 'Shoe', 4, 11, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old', 5789, '28e2a52e91.jpg', '28e2a52e92.jpg', 4579, 0),
(71, 'Camera', 1, 2, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old', 560, '4e89579778.jpg', '4e89579779.jpg', 5460, 0),
(72, 'Bag', 4, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis finibus mauris, at ornare odio. Praesent hendrerit erat at ', 1450, '3084867a9c.jpg', '3084867a9d.jpg', 5145, 2),
(73, 'Shoe', 4, 2, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old', 5468, '2067500d83.jpg', '2067500d84.jpg', 5465, 1),
(74, 'Shoe', 4, 11, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old', 5789, '28e2a52e91.jpg', '28e2a52e92.jpg', 4579, 0),
(75, 'Camera', 1, 2, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old', 560, '4e89579778.jpg', '4e89579779.jpg', 5460, 0),
(76, 'Bag', 4, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis finibus mauris, at ornare odio. Praesent hendrerit erat at ', 1450, '3084867a9c.jpg', '3084867a9d.jpg', 5145, 2),
(77, 'Shoe', 4, 2, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old', 5468, '2067500d83.jpg', '2067500d84.jpg', 5465, 1),
(78, 'Shoe', 4, 11, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old', 5789, '28e2a52e91.jpg', '28e2a52e92.jpg', 4579, 0),
(79, 'Camera', 1, 2, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old', 560, '4e89579778.jpg', '4e89579779.jpg', 5460, 0),
(80, 'Bag', 4, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis finibus mauris, at ornare odio. Praesent hendrerit erat at ', 1450, '3084867a9c.jpg', '3084867a9d.jpg', 5145, 2),
(81, 'Shoe', 4, 2, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old', 5468, '2067500d83.jpg', '2067500d84.jpg', 5465, 1),
(82, 'Shoe', 4, 11, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old', 5789, '28e2a52e91.jpg', '28e2a52e92.jpg', 4579, 0),
(83, 'Camera', 1, 2, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old', 560, '4e89579778.jpg', '4e89579779.jpg', 5460, 0),
(84, 'Bag', 4, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis finibus mauris, at ornare odio. Praesent hendrerit erat at ', 1450, '3084867a9c.jpg', '3084867a9d.jpg', 5145, 2),
(85, 'Shoe', 4, 2, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old', 5468, '2067500d83.jpg', '2067500d84.jpg', 5465, 1),
(86, 'Shoe', 4, 11, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old', 5789, '28e2a52e91.jpg', '28e2a52e92.jpg', 4579, 0),
(87, 'Camera', 1, 2, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old', 560, '4e89579778.jpg', '4e89579779.jpg', 5460, 0),
(88, 'Bag', 4, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis finibus mauris, at ornare odio. Praesent hendrerit erat at ', 1450, '3084867a9c.jpg', '3084867a9d.jpg', 5145, 2),
(89, 'Shoe', 4, 2, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old', 5468, '2067500d83.jpg', '2067500d84.jpg', 5465, 1),
(90, 'Shoe', 4, 11, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old', 5789, '28e2a52e91.jpg', '28e2a52e92.jpg', 4579, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_panel`
--
ALTER TABLE `admin_panel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `customer_login`
--
ALTER TABLE `customer_login`
  ADD PRIMARY KEY (`cusId`);

--
-- Indexes for table `customer_table`
--
ALTER TABLE `customer_table`
  ADD PRIMARY KEY (`cusId`);

--
-- Indexes for table `product_brand`
--
ALTER TABLE `product_brand`
  ADD PRIMARY KEY (`brandid`);

--
-- Indexes for table `product_cart`
--
ALTER TABLE `product_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `product_purchased`
--
ALTER TABLE `product_purchased`
  ADD PRIMARY KEY (`purchasedId`);

--
-- Indexes for table `product_table`
--
ALTER TABLE `product_table`
  ADD PRIMARY KEY (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_panel`
--
ALTER TABLE `admin_panel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `customer_login`
--
ALTER TABLE `customer_login`
  MODIFY `cusId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer_table`
--
ALTER TABLE `customer_table`
  MODIFY `cusId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_brand`
--
ALTER TABLE `product_brand`
  MODIFY `brandid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_cart`
--
ALTER TABLE `product_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `product_order`
--
ALTER TABLE `product_order`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product_purchased`
--
ALTER TABLE `product_purchased`
  MODIFY `purchasedId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `product_table`
--
ALTER TABLE `product_table`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
