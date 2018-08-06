-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2018 at 11:28 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `confirm` varchar(1000) NOT NULL,
  `tm_password` varchar(1000) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `admin_cookie` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `confirm`, `tm_password`, `username`, `admin_cookie`) VALUES
(1, 'akpufranklin2@gmail.com', '$2y$10$sdRtmCLJkC/cdOwdiET8Kuz6F6YeX6ysZQcfaNQPw3kXULYShFw.q', '$2y$10$nH8cVuGC1AIAFypAiDgPqeUbd0P52r6qzy30LYmd76.nc.sVyfZBu', 'frank1520004807me', 'frank102', '5d57b6c4edd6816000837bba35226f2fdre45354e'),
(3, 'nnamdi@gmail.com', '$2y$10$LKwXWFJoFoMwpiaFodgl2ODC8t8wE1hFoMflYatcSb50iDMSyoWZe', '$2y$10$7nyHlSL380u2VgGNwP1H6OkgQ0mTTVHkO6v8SiPzatbJMo7n/XITu', 'fc6bd5a60bde69718c760c21a247bd7ajesusislord', 'nnamdi', '3d84e202fcbbc13200507084b11858cbdre45354e'),
(6, 'nnamdi101@gmail.com', '$2y$10$/noLSNKP/1ndL7DwiQ6VP.PMpMUtIFObWsycTJ5ExXt6aJNupIuri', '$2y$10$O/JxipRWQ2rH0P7d4tZyfuQ0ok/HldnglCAjmNeIcrmXCjC.eTDja', 'fc6bd5a60bde69718c760c21a247bd7ajesusislord', 'nnamdi', 'a0bd7cc0c9468b80947cf32dea83394edre45354e');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(255) NOT NULL,
  `cat_name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`) VALUES
(23, 'Women'),
(24, 'men'),
(25, 'Boys'),
(26, 'Shoes'),
(27, 'Clothes'),
(28, 'Cars'),
(29, 'Houses'),
(30, 'Horses'),
(31, 'Cakes');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `prod_name` varchar(1000) NOT NULL,
  `category` varchar(1000) NOT NULL,
  `price` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `currency` varchar(1000) NOT NULL,
  `seller_name` varchar(1000) NOT NULL,
  `seller_location` varchar(1000) NOT NULL,
  `seller_number` varchar(1000) NOT NULL,
  `file_name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `prod_name`, `category`, `price`, `description`, `currency`, `seller_name`, `seller_location`, `seller_number`, `file_name`) VALUES
(30, '	Esprit Ruffle Shirt', 'men', '33', 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat. Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat. Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat. Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat. Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat. Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat. ', '$', 'nnamdi', 'awka road 32 street nnemeka street', '3445533456', '1533014286.jpg'),
(31, '	Esprit Ruffle Shirt', 'men', '33', 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat. Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat. Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat. Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat. Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat. Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat. ', '$', 'nnamdi', 'awka road 32 street nnemeka street', '3445533456', '1533014373.jpg'),
(32, '	Esprit Ruffle Shirt', 'men', '33', 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat. Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat. Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat. Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat. Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat. Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat. ', '$', 'nnamdi', 'awka road 32 street nnemeka street', '3445533456', '1533014519.jpg'),
(33, '	Esprit Ruffle Shirt', 'men', '33', 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat. Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat. Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat. Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat. Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat. Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat. ', '$', 'nnamdi', 'awka road 32 street nnemeka street', '3445533456', '1533014553.jpg'),
(34, '	Esprit Ruffle Shirt', 'men', '33', 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat. Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat. Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat. Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat. Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat. Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat. ', '$', 'nnamdi', 'awka road 32 street nnemeka street', '3445533456', '1533016550.jpg'),
(35, '	Esprit Ruffle Shirt', 'men', '33', 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat. Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat. Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat. Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat. Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat. Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat. ', '$', 'nnamdi', 'awka road 32 street nnemeka street', '3445533456', '1533016558.jpg'),
(36, 'boys product', 'Boys', '45', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed culpa numquam quibusdam deserunt commodi ex corrupti, quod facere minus, quidem praesentium, aspernatur harum. Ab accusantium dicta maiores commodi sint temporibus.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed culpa numquam quibusdam deserunt commodi ex corrupti, quod facere minus, quidem praesentium, aspernatur harum. Ab accusantium dicta maiores commodi sint temporibus.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed culpa numquam quibusdam deserunt commodi ex corrupti, quod facere minus, quidem praesentium, aspernatur harum. Ab accusantium dicta maiores commodi sint temporibus.', '$', 'emeka', 'uli locality', '345554443', '1533017455.jpg'),
(37, 'gifti cakes', 'Cakes', '30', 'ggggggggggggggggggggndnsd bd ub usdjvy ugyusgx ugdvuyfgdv yvd ytv tydvdty sfygtysvd cv yuv ytv dty vytfdvtykfv tyefygef yuwgf efyt ggggggggggggggggggggndnsd bd ub usdjvy ugyusgx ugdvuyfgdv yvd ytv tydvdty sfygtysvd cv yuv ytv dty vytfdvtykfv tyefygef yuwgf efyt ggggggggggggggggggggndnsd bd ub usdjvy ugyusgx ugdvuyfgdv yvd ytv tydvdty sfygtysvd cv yuv ytv dty vytfdvtykfv tyefygef yuwgf efytggggggggggggggggggggndnsd bd ub usdjvy ugyusgx ugdvuyfgdv yvd ytv tydvdty sfygtysvd cv yuv ytv dty vytfdvtykfv tyefygef yuwgf efytggggggggggggggggggggndnsd bd ub usdjvy ugyusgx ugdvuyfgdv yvd ytv tydvdty sfygtysvd cv yuv ytv dty vytfdvtykfv tyefygef yuwgf efytggggggggggggggggggggndnsd bd ub usdjvy ugyusgx ugdvuyfgdv yvd ytv tydvdty sfygtysvd cv yuv ytv dty vytfdvtykfv tyefygef yuwgf efytggggggggggggggggggggndnsd bd ub usdjvy ugyusgx ugdvuyfgdv yvd ytv tydvdty sfygtysvd cv yuv ytv dty vytfdvtykfv tyefygef yuwgf efytggggggggggggggggggggndnsd bd ub usdjvy ugyusgx ugdvuyfgdv yvd ytv tydvdty sfygtysvd cv y', '$', 'gifti international', 'banana island', '08148457178', '1533392759.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_details`
--

CREATE TABLE `purchase_details` (
  `id` int(255) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `seller_number` varchar(1000) NOT NULL,
  `seller_location` varchar(1000) NOT NULL,
  `location` varchar(1000) NOT NULL,
  `phone` varchar(1000) NOT NULL,
  `seen` varchar(255) NOT NULL,
  `price` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_details`
--

INSERT INTO `purchase_details` (`id`, `name`, `email`, `seller_number`, `seller_location`, `location`, `phone`, `seen`, `price`) VALUES
(4, 'wwww', 'd@gmail.com', '345554443', 'uli locality', 'ddddffffffffffffff', '22222222222222222', '0', '$45'),
(5, 'sdfghgfds', 'ssss@fmail.com', '345554443', 'uli locality', 'ddddffffffffffffff', '234445', '1', '$45');

-- --------------------------------------------------------

--
-- Table structure for table `slide_show`
--

CREATE TABLE `slide_show` (
  `id` int(255) NOT NULL,
  `header_one` varchar(1000) NOT NULL,
  `header_two` varchar(1000) NOT NULL,
  `link` varchar(1000) NOT NULL,
  `time_sent` varchar(1000) NOT NULL,
  `file_name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slide_show`
--

INSERT INTO `slide_show` (`id`, `header_one`, `header_two`, `link`, `time_sent`, `file_name`) VALUES
(3, 'THIS IS THE FIRST HEADER', 'WELCOME TO THE SECOND HEADER', 'http://localhost/schoolshop/admin/slideshow', '1533239517', '1533239517.jpg'),
(4, 'THIS IS THE SECOND HEADER', 'ARE YOU READY FOR MENS WEARS', 'http://localhost/schoolshop/admin/slideshow', '1533239558', '1533239558.jpg'),
(5, 'THIRD CONTENT', 'THIS IS FOR ALL WOMEN OOOH NOTE', 'http://localhost/schoolshop/admin/slideshow', '1533239613', '1533239613.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(255) NOT NULL,
  `cat_id` varchar(1000) NOT NULL,
  `sub_cat_value` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `id` int(255) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `confirm` varchar(1000) NOT NULL,
  `tm_password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slide_show`
--
ALTER TABLE `slide_show`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `purchase_details`
--
ALTER TABLE `purchase_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slide_show`
--
ALTER TABLE `slide_show`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
