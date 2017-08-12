-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2016 at 01:56 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fypsolnew`
--

-- --------------------------------------------------------

--
-- Table structure for table `current_stock`
--

CREATE TABLE IF NOT EXISTS `current_stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_code_price_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `current_stock`
--

INSERT INTO `current_stock` (`id`, `product_id`, `quantity`, `product_code_price_id`) VALUES
(1, 5, 38, 6),
(2, 7, 9, 7),
(3, 5, 10, 8),
(4, 5, 4434324, 9),
(5, 6, 10, 10),
(6, 5, 20, 11),
(7, 6, 20, 12),
(8, 8, 500, 13);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `minimum_stock_level` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `minimum_stock_level`) VALUES
(5, 'Table', 60),
(6, 'Sofa', 0),
(7, 'Drawer', 20),
(8, 'Bench', 0),
(9, 'Long Sofa', 0),
(10, 'Chair', 20),
(12, 'Bed', 22);

-- --------------------------------------------------------

--
-- Table structure for table `product_code_price`
--

CREATE TABLE IF NOT EXISTS `product_code_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(10) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `product_code_price`
--

INSERT INTO `product_code_price` (`id`, `product_id`, `product_code`, `price`) VALUES
(6, 5, 'PR1', 400),
(7, 7, 'PR2', 300),
(8, 5, 'PR3', 500),
(9, 5, 'PR4', 2000),
(10, 6, 'PR5', 200),
(11, 5, 'PR6', 388),
(12, 6, 'PR7', 300),
(13, 8, 'PR8', 400);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_record`
--

CREATE TABLE IF NOT EXISTS `purchase_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `bought_price` float NOT NULL,
  `selling_price` float NOT NULL,
  `purchase_date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `purchase_record`
--

INSERT INTO `purchase_record` (`id`, `product_id`, `supplier_id`, `bought_price`, `selling_price`, `purchase_date`, `quantity`) VALUES
(9, 5, 1, 222, 333, '2015-11-28', 10),
(10, 5, 1, 323, 333, '2015-11-28', 100),
(11, 7, 3, 200, 300, '2015-11-28', 30),
(12, 5, 5, 200, 500, '2015-12-01', 10),
(14, 6, 2, 100, 200, '2015-12-26', 10),
(15, 5, 1, 100, 388, '2015-12-26', 20),
(16, 6, 2, 200, 300, '2016-01-02', 10),
(17, 8, 2, 300, 400, '2016-01-02', 500),
(18, 6, 1, 210, 300, '2016-01-02', 10);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_no` varchar(10) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_mobile_no` varchar(10) NOT NULL,
  `customer_address` varchar(60) NOT NULL,
  `total_items` int(11) NOT NULL,
  `total_amount` float NOT NULL,
  `date_time` datetime NOT NULL,
  `due_amount` float DEFAULT NULL,
  `due_amount_paid_date` date DEFAULT NULL,
  `tax` int(11) NOT NULL,
  `discount` float DEFAULT NULL,
  `grand_total` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `bill_no`, `customer_name`, `customer_mobile_no`, `customer_address`, `total_items`, `total_amount`, `date_time`, `due_amount`, `due_amount_paid_date`, `tax`, `discount`, `grand_total`) VALUES
(1, 'B1', 'Solendra', '986033233', 'Gaurighat', 21, 8300, '2015-12-08 13:35:34', 100, '2015-12-17', 20, NULL, 0),
(4, 'B2', 'Nijan', '986033233', 'Suryabinayak', 10, 4000, '2015-12-17 20:26:11', 200, '2015-12-17', 15, 400, 4140),
(5, 'B3', 'Suman', '9899869677', 'Suryabinayak', 2, 800, '2015-12-27 22:52:33', 100, '2015-12-27', 15, 16, 901.6);

-- --------------------------------------------------------

--
-- Table structure for table `sales_products`
--

CREATE TABLE IF NOT EXISTS `sales_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_code_price_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sales_products`
--

INSERT INTO `sales_products` (`id`, `sales_id`, `product_id`, `product_code_price_id`, `quantity`, `price`, `date_time`) VALUES
(1, 1, 5, 6, 20, 400, '2015-12-08 13:35:34'),
(2, 1, 7, 7, 1, 300, '2015-12-08 13:35:34'),
(3, 2, 5, 6, 10, 400, '2015-12-17 20:21:32'),
(4, 3, 5, 6, 10, 400, '2015-12-17 20:24:27'),
(5, 4, 5, 6, 10, 400, '2015-12-17 20:26:11'),
(6, 5, 5, 6, 2, 400, '2015-12-27 22:52:33');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tax` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `tax`) VALUES
(1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE IF NOT EXISTS `staffs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `joined_date` date DEFAULT NULL,
  `salary` int(11) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `first_name`, `last_name`, `position`, `contact`, `address`, `joined_date`, `salary`, `status`) VALUES
(1, 'Mandip', 'Dahal', 'General Employee', '9811089601', 'Kathmandu', '2015-12-01', 5000, 'active'),
(2, 'Mukesh', 'Gupta', 'General Employee', '9845178901', 'Kathmandu', '2015-12-15', 5000, 'active'),
(3, 'Raju', 'Mishra', 'General Employee', '9810921476', 'Kathmandu', '2015-12-15', 5000, 'active'),
(4, 'Renu', 'Karki', 'General Employee', '9814312890', 'Kathmandu', '2015-12-20', 5000, 'active'),
(6, 'Rakesh', 'Sharma', 'General Employee', '9815178960', 'Kathmandu', '2015-12-01', 5000, 'active'),
(7, 'Manish', 'KC', 'General Employee', '9815098110', 'Kathmandu', '2015-12-02', 2000, 'active'),
(8, 'Suman', 'Lama', 'CEO', '9823883838', 'Kathmandu', '2015-11-26', 50000, 'active'),
(9, 'New 1', 'New ', 'General Manager', '987329847', 'Kathmandu', '2015-11-26', 15000, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `staff_salary_paid`
--

CREATE TABLE IF NOT EXISTS `staff_salary_paid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `month` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `staff_salary_paid`
--

INSERT INTO `staff_salary_paid` (`id`, `staff_id`, `month`, `amount`, `date`) VALUES
(5, 1, '2015-12', 5000, '2015-12-20'),
(6, 8, '2015-11', 50000, '2015-12-20'),
(7, 8, '2015-12', 50000, '2015-12-20'),
(8, 2, '2015-12', 5000, '2015-12-20'),
(9, 4, '2015-12', 5000, '2015-12-20'),
(10, 3, '2015-12', 5000, '2015-12-20'),
(11, 6, '2015-12', 5000, '2015-12-20'),
(12, 1, '2016-01', 5000, '2016-01-02'),
(13, 2, '2016-01', 5000, '2016-01-02');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(100) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `reg_no` varchar(20) DEFAULT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_name`, `contact`, `address`, `reg_no`, `created_on`) VALUES
(1, 'Regan Furniture', '9811019801', 'Boudha, kathmandu', 'PAN34221', '2015-11-04'),
(2, 'Shrestha Furnishing Store', '9845098746', 'Chabhil Kathmandu', 'PAN56482', '2015-11-11'),
(3, 'Nanda Furnishing Trade', '9803814560', 'New Road kathamandu', 'PAN3451', '2015-11-09'),
(4, 'Durge Shree Furniture', '9845145678', 'KamalPokhari Kathmandu', 'PAN24111', '2015-11-15'),
(5, 'Mahankal Furnishing Centre', '9855012345', 'Chabhil kathmandu', 'PAN34532', '2015-11-15'),
(6, 'Furniture Point', '9801189017', 'Min Bhawan Kathmandu', 'PAN8972', '2015-11-15'),
(7, 'Suman Enterprises', '016610525', 'Suryabinayak, Bhaktapur', 'REG93289', '2015-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `forgot_password_code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created_on`, `forgot_password_code`) VALUES
(1, 'admin@admin.com', '098f6bcd4621d373cade4e832627b4f6', '2015-11-02 00:00:00', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
