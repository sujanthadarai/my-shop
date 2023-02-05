-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2021 at 07:57 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_email`, `admin_pass`) VALUES
(1, 'sujanthadarai710@gmail.com', 'sujan'),
(2, 'sujanthadarai@gmail.com', 'sujan710');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(10) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'HP'),
(2, 'Dell'),
(3, 'Nokia'),
(4, 'Samsung'),
(6, 'Sony'),
(7, 'Motorola'),
(8, 'LG');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` int(10) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`) VALUES
(9, 0, 1),
(17, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Laptops'),
(2, 'Computers'),
(4, 'Cameras'),
(5, 'Mobiles'),
(6, 'Tables'),
(7, 'TVs');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` int(100) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES
(17, 'united', 'united@gmail.com', 'united', 'Nepal', 'pokhara', 0, 'House no:23, behind gadeshman chowk', '2018-03-09-16-30-12-298.jpg', 0),
(21, 'sujan', 'sujanthadarai7@gmail.com', 'sujan', 'Nepal', 'Damauli', 2147483647, 'vyas 8', '0IQEfcizEx9aIcpyATj3NvUY44E-1.jpg', 0),
(24, 'sujan thadarai', 'sujanmanoj710@gmail.com', 'sujanmanoj', 'Nepal', 'sotipasal', 2147483647, 'House no:23, behind amarshing chowk ', '0FoAo5bpLrZwyloctxI9jFRDDU4-1-1.jpg', 0),
(25, 'sujan', 'sujan@gmail.com', 'sujan', 'Nepal', 'pokhara', 2147483647, 'House no:23, behind amarshing chowk ', '0cy8kwzw5aa4GPxFo3qidPkxT1j-1.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `total_products` int(100) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `total_products`, `order_date`, `order_status`) VALUES
(105, 17, 300, 92056040, 2, '2021-04-15 12:58:31', 'Complete'),
(106, 17, 200, 1293970348, 2, '2021-04-16 07:53:52', 'pending'),
(107, 17, 200, 1338472329, 2, '2021-04-16 14:07:34', 'pending'),
(108, 17, 200, 1662882955, 2, '2021-04-17 05:28:37', 'pending'),
(109, 17, 1100, 27997341, 4, '2021-04-20 22:51:58', 'pending'),
(110, 17, 1600, 1388424981, 5, '2021-04-27 15:21:12', 'pending'),
(111, 17, 0, 1909208278, 1, '2021-05-03 05:25:33', 'pending'),
(112, 17, 0, 175805557, 1, '2021-05-19 13:46:29', 'pending'),
(113, 17, 800, 1634175418, 3, '2021-07-10 07:30:40', 'pending'),
(114, 17, 800, 841906204, 3, '2021-07-10 07:55:35', 'pending'),
(115, 17, 800, 1932873819, 3, '2021-07-11 13:22:03', 'pending'),
(116, 17, 500, 1586452352, 2, '2021-07-11 13:22:50', 'pending'),
(117, 17, 500, 418076917, 2, '2021-07-11 13:23:52', 'pending'),
(118, 17, 500, 832976413, 2, '2021-07-11 17:45:12', 'pending'),
(119, 17, 500, 1723187657, 2, '2021-07-11 17:45:32', 'pending'),
(120, 17, 0, 422506429, 1, '2021-07-17 09:42:54', 'pending'),
(121, 17, 0, 679403867, 1, '2021-07-17 09:53:37', 'pending'),
(122, 17, 0, 1000445090, 1, '2021-07-17 09:54:43', 'pending'),
(123, 17, 200, 8801681, 2, '2021-07-17 09:55:23', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(10) NOT NULL,
  `code` int(10) NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_no`, `amount`, `payment_mode`, `ref_no`, `code`, `payment_date`) VALUES
(18, 772008448, 400, 'Bank Transfer', 13433154, 245245, '04-13-2031'),
(19, 1734202671, 500, 'Bank Transfer', 13433154, 245245, '04-07-2031');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `order_status`) VALUES
(103, 17, 92056040, 14, 1, 'complete'),
(113, 17, 1932873819, 13, 1, 'pending'),
(114, 17, 1586452352, 13, 1, 'pending'),
(115, 17, 418076917, 13, 1, 'pending'),
(116, 17, 832976413, 13, 1, 'pending'),
(117, 17, 1723187657, 13, 1, 'pending'),
(118, 17, 422506429, 9, 1, 'pending'),
(119, 17, 679403867, 9, 1, 'pending'),
(120, 17, 1000445090, 9, 1, 'pending'),
(121, 17, 8801681, 17, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_desc` text NOT NULL,
  `product_keywords` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `brand_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `product_keywords`, `status`) VALUES
(13, 1, 1, '2021-04-18 12:25:02', 'Hp Nice Laptop ', 'd1.jpg', 'd3.jpg', 'hp3.jpg', 500, 'HP with high quality  windows and latest processor', 'Hp,laptops', 'on'),
(16, 2, 2, '2021-04-13 05:03:45', 'Dell computers', 'cd1.jpg', 'cd2.jpg', 'cd3.jpg', 500, 'This is very nice brand of computer for  you', '', 'on'),
(17, 4, 6, '2021-04-13 04:31:22', 'Digital camera ', 'ca1.jpg', 'ca2.jpg', 'ca3.jpg', 200, 'Full frame mirrorless digital cameras', '', 'on'),
(18, 0, 0, '2021-04-13 04:39:40', 'video camera by sony', 'vcamera1.jpg', 'vc2.jpg', '6.jpg', 400, 'very good  features  you may like the most \r\n', '', 'on'),
(19, 5, 4, '2021-04-13 04:46:42', 'samsung Galaxy ', 'm1.webp', 's2.png', 's3.jpg', 300, 'Samsung Galaxy s series with good quality', '', 'on'),
(20, 7, 6, '2021-04-13 04:52:36', 'Sony TV', 's33.jpg', 's1.jpg', 's22.jpg', 500, 'Be smart and buy smart sony tv ', '', 'on'),
(21, 5, 3, '2021-04-13 04:58:21', 'Nokia latest mobiles', 'n1.jpg', 'n2.jpg', 'n3.webp', 400, 'Nokia new brand with good features', '', 'on'),
(22, 5, 0, '2021-04-16 05:26:56', 'samsung  s10', 's10.jpg', 's10.1.webp', 's10.2.jpg', 400, 'This is very nice  brand with good quality\r\n', '', 'on');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
