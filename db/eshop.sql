-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2019 at 01:06 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `ans` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user`, `password`, `ans`) VALUES
(1, 'admin', 'adminlogin', 'blue');

-- --------------------------------------------------------

--
-- Table structure for table `aques`
--

CREATE TABLE IF NOT EXISTS `aques` (
  `id` int(11) NOT NULL,
  `ques` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aques`
--

INSERT INTO `aques` (`id`, `ques`) VALUES
(1, 'what is the color for admin');

-- --------------------------------------------------------

--
-- Table structure for table `cques`
--

CREATE TABLE IF NOT EXISTS `cques` (
  `id` int(11) NOT NULL,
  `ques` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cques`
--

INSERT INTO `cques` (`id`, `ques`) VALUES
(1, 'What is your favourite taste');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `delivery` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `ans` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fname`, `email`, `phone`, `delivery`, `address`, `pass`, `ans`) VALUES
(1, 'TOLU AKINOLA', 'tolu@gmail.com', '08087789067', '7 aa street, lagos', '7 aa street, lagos', 'tolu', 'cars'),
(2, 'bola tolulola', 'bola@gmail.com', '07067866556', '20 estherv street', '20 esthervstreet', 'bola', 'flavour');

-- --------------------------------------------------------

--
-- Table structure for table `order_g`
--

CREATE TABLE IF NOT EXISTS `order_g` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `pid` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_g`
--

INSERT INTO `order_g` (`id`, `fname`, `email`, `phone`, `address`, `pname`, `price`, `model`, `size`, `pid`, `time`) VALUES
(2, 'TOLU AKINOLA', 'tolu@yahoo.com', '08087789067', '7 aa street, lagos', 'female cloths', '10000', 'star model', 'medium', 2, '2019-05-29 15:26:33'),
(3, 'TOLU AKINOLA', 'tolu@yahoo.com', '08087789067', '7 aa street, lagos', 'black x10', '40000', 'xy model', '44', 3, '2019-05-29 15:27:45');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `pgroup` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `model` varchar(150) NOT NULL,
  `size` varchar(100) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `photo`, `pname`, `pgroup`, `price`, `model`, `size`, `description`) VALUES
(1, 'photo/s2.jpeg', 'Brown star shoe', 'shoes', '25000', 'star model', '45', 'strong shoes for rough surfaces. can withstand water and useful for outdoors games'),
(2, 'photo/l1.jpeg', 'female cloths', 'clothes', '10000', 'star model', 'medium', 'elastic and shining '),
(3, 'photo/s5.jpeg', 'black x10', 'shoes', '40000', 'xy model', '44', 'strong and ocassion base shoe');

-- --------------------------------------------------------

--
-- Table structure for table `product_g`
--

CREATE TABLE IF NOT EXISTS `product_g` (
  `id` int(11) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_g`
--

INSERT INTO `product_g` (`id`, `photo`, `name`) VALUES
(1, 'photo/s11.jpeg', 'shoes'),
(2, 'photo/l3.jpeg', 'clothes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aques`
--
ALTER TABLE `aques`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cques`
--
ALTER TABLE `cques`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_g`
--
ALTER TABLE `order_g`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_g`
--
ALTER TABLE `product_g`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `aques`
--
ALTER TABLE `aques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cques`
--
ALTER TABLE `cques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `order_g`
--
ALTER TABLE `order_g`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product_g`
--
ALTER TABLE `product_g`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
