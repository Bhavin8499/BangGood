-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2019 at 03:00 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bh_banggood`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `add_line1` varchar(1000) NOT NULL,
  `add_line2` varchar(1000) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cate_id` int(6) NOT NULL,
  `name` varchar(50) NOT NULL,
  `parent` int(6) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cate_id`, `name`, `parent`, `description`) VALUES
(1, 'MOBILE', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `cid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_no` bigint(20) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ord_id` int(11) NOT NULL,
  `status_list` text NOT NULL,
  `is_delivered` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `contact_num` bigint(20) NOT NULL,
  `order_status` varchar(100) NOT NULL,
  `deli_id` int(11) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `order_note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` int(11) NOT NULL,
  `ord_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ord_id` int(11) NOT NULL,
  `pay_using` varchar(100) NOT NULL,
  `payment_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `mrp` bigint(20) NOT NULL,
  `discount` int(11) NOT NULL,
  `description` text NOT NULL,
  `images` varchar(1000) NOT NULL,
  `qty` int(11) NOT NULL,
  `can_buy` tinyint(1) NOT NULL,
  `tags` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `name`, `cat_id`, `mrp`, `discount`, `description`, `images`, `qty`, `can_buy`, `tags`) VALUES
(1, 'Samsung Galaxy J7', 1, 13000, 0, '<I>3500mah Bettery</I><BR><B>Android 9</B>', './images/sgJ2.jpg', 3, 1, 'SAMSUNG,Mobile'),
(2, 'Nokia 6.1Pluse', 1, 10000, 4, '<h3>&nbsp;</h3> <ul> <li>Cash on Delivery Eligible.</li> <li>Shipping Speed to Delivery.</li> <li>EMIs from emi_worth/month.</li> <li>Bank OfferExtra 5% off* with Axis Bank Buzz Credit CardT&amp;C</li> </ul> <hr /> <p>1 YearManufacturer Warranty</p> <ul> <li>8GB RAM | 64GB ROM | Expandable Upto 128GB</li> <li>display_inch inch Full HD Display</li> <li>8MP Rear Camera | 12MP Front Camera</li> <li>3400mAh Battery</li> <li>Snapdragan Octa Core 636GHz Processor</li> </ul> <p>Net banking &amp; Credit/ Debit/ ATM card</p> ', 'a:1:{i:0;s:18:\"./images/n6_1p.jpg\";}', 5, 1, 'Nokia,MOBILE'),
(3, 'Redmi Note 7', 1, 14500, 0, '<p><em>6.5&#39; Display</em><strong>Android 9</strong></p> ', 'a:1:{i:0;s:17:\"./images/min7.jpg\";}', 2, 1, 'Redmi,MI,MOBILE'),
(4, 'Redmi Go', 1, 4500, 10, '<p><em>Loud Speaker</em><strong>Android 8</strong></p> ', 'a:1:{i:0;s:17:\"./images/migo.jpg\";}', 1, 1, 'Redmi,MI,MOBILE'),
(5, 'Samsung  Galaxy S10', 1, 30000, 0, '<h3>&nbsp;</h3> <ul> <li>Cash on Delivery Eligible.</li> <li>Shipping Speed to Delivery.</li> <li>EMIs from emi_worth/month.</li> <li>Bank OfferExtra 5% off* with Axis Bank Buzz Credit CardT&amp;C</li> </ul> <hr /> <p>1 YearManufacturer Warranty</p> <ul> <li>8GB RAM | 64GB ROM | Expandable Upto 128GB</li> <li>display_inch inch Full HD Display</li> <li>8MP Rear Camera | 12MP Front Camera</li> <li>3400mAh Battery</li> <li>Snapdragan Octa Core 636GHz Processor</li> </ul> <p>Net banking &amp; Credit/ Debit/ ATM card</p> ', 'a:1:{i:0;s:18:\"./images/sgs10.jpg\";}', 10, 0, 'Samsung,Mobile'),
(6, 'OnePluse 7 Pro', 1, 34000, 0, '<h3>&nbsp;</h3> <ul> <li>Cash on Delivery Eligible.</li> <li>Shipping Speed to Delivery.</li> <li>EMIs from emi_worth/month.</li> <li>Bank OfferExtra 5% off* with Axis Bank Buzz Credit CardT&amp;C</li> </ul> <hr /> <p>1 YearManufacturer Warranty</p> <ul> <li>8GB RAM | 64GB ROM | Expandable Upto 128GB</li> <li>display_inch inch Full HD Display</li> <li>8MP Rear Camera | 12MP Front Camera</li> <li>3400mAh Battery</li> <li>Snapdragan Octa Core 636GHz Processor</li> </ul> <p>Net banking &amp; Credit/ Debit/ ATM card</p> ', 'a:1:{i:0;s:16:\"./images/op7.jpg\";}', 1, 1, 'Oneplus,Mobile'),
(7, 'Redmi 8', 1, 7999, 0, '<h3>&nbsp;</h3> <ul> <li>Cash on Delivery Eligible.</li> <li>Shipping Speed to Delivery.</li> <li>EMIs from emi_worth/month.</li> <li>Bank OfferExtra 5% off* with Axis Bank Buzz Credit CardT&amp;C</li> </ul> <hr /> <p>1 YearManufacturer Warranty</p> <ul> <li>8GB RAM | 64GB ROM | Expandable Upto 128GB</li> <li>display_inch inch Full HD Display</li> <li>8MP Rear Camera | 12MP Front Camera</li> <li>3400mAh Battery</li> <li>Snapdragan Octa Core 636GHz Processor</li> </ul> <p>Net banking &amp; Credit/ Debit/ ATM card</p> ', 'a:1:{i:0;s:16:\"./images/mi8.jpg\";}', 10, 1, 'mi,MI,Mobile'),
(8, 'Google Pixel 4', 1, 36000, 10, '<h3>&nbsp;</h3> <ul> <li>Cash on Delivery Eligible.</li> <li>Shipping Speed to Delivery.</li> <li>EMIs from emi_worth/month.</li> <li>Bank OfferExtra 5% off* with Axis Bank Buzz Credit CardT&amp;C</li> </ul> <hr /> <p>1 YearManufacturer Warranty</p> <ul> <li>8GB RAM | 64GB ROM | Expandable Upto 128GB</li> <li>display_inch inch Full HD Display</li> <li>8MP Rear Camera | 12MP Front Camera</li> <li>3400mAh Battery</li> <li>Snapdragan Octa Core 636GHz Processor</li> </ul> <p>Net banking &amp; Credit/ Debit/ ATM card</p> ', 'a:1:{i:0;s:16:\"./images/gp4.jpg\";}', 1, 1, 'Google,Mobile'),
(9, 'Motorola One Macro (Space Blue, 64 GB)  (4 GB RAM)', 1, 9999, 0, '<ul> <li> <p>Cash on Delivery Eligible. &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p> </li> <li> <p>Shipping Speed to Delivery.</p> </li> <li> <p>EMIs from emi_worth/month.</p> </li> <li> <p>Bank OfferExtra 5% off* with Axis Bank Buzz Credit CardT&amp;C &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;</p> </li> </ul> <hr /> <h3>1 YearManufacturer Warranty</h3> <ul> <li> <p>8 GB RAM | 128 GB ROM | Expandable Upto 256GB &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;</p> </li> <li> <p>5.0inch Full HD Display</p> </li> <li> <p>6MP Rear Camera | 12 MP Front Camera &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;</p> </li> <li> <p>5000mAh Battery &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;</p> </li> <li> <p>Octa Core 855GHz Processor&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p> </li> </ul> <h3>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Net banking &amp; Credit/ Debit/ ATM card &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;</h3> <h3>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;</h3> ', 'a:1:{i:0;s:16:\"./images/m1m.jpg\";}', 1, 1, 'MOTOROLA,Mobile'),
(16, 'Redmi Y2 (Blue, 4GB RAM, 64GB Storage)', 1, 4999, 0, '.<h3>&nbsp;</h3> <ul> <li>Cash on Delivery Eligible.</li> <li>Shipping Speed to Delivery.</li> <li>EMIs from emi_worth/month.</li> <li>Bank OfferExtra 5% off* with Axis Bank Buzz Credit CardT&amp;C</li> </ul> <hr /> <p>1 YearManufacturer Warranty</p> <ul> <li>4GB RAM | 64GB ROM | Expandable Upto 128GB</li> <li>4.0inch Full HD Display</li> <li>8MP Rear Camera | 12MP Front Camera</li> <li>3100mAh Battery</li> <li>Snapdragan Octa Core 225GHz Processor</li> </ul> <p>Net banking &amp; Credit/ Debit/ ATM card</p> ', 'a:3:{i:0;s:17:\"./images/y2_2.jpg\";i:1;s:17:\"./images/y2_3.jpg\";i:2;s:17:\"./images/y2_1.jpg\";}', 5, 1, 'Redmi y2,Y2,Mobile');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_no` bigint(20) NOT NULL,
  `creation_date` date NOT NULL,
  `role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `mobile_no`, `creation_date`, `role`) VALUES
(1, 'harsh_chhatbar', '12345', 'hchhatbar86@gmail.com', 9018090180, '2019-10-22', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `usermeta`
--

CREATE TABLE `usermeta` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `value` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `usermeta`
--
ALTER TABLE `usermeta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cate_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usermeta`
--
ALTER TABLE `usermeta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
