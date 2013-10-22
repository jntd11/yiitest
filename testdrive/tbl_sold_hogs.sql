-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 22, 2013 at 09:19 AM
-- Server version: 5.5.23
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `testdrive`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sold_hogs`
--

CREATE TABLE IF NOT EXISTS `tbl_sold_hogs` (
  `tbl_sold_hogs_id` int(11) NOT NULL AUTO_INCREMENT,
  `hog_ear_notch` varchar(20) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `date_sold` varchar(20) NOT NULL,
  `sold_price` int(10) NOT NULL,
  `sale_type` varchar(1) NOT NULL,
  `invoice_number` int(6) NOT NULL,
  `app_xfer` varchar(1) NOT NULL,
  `comments` text NOT NULL,
  `reason_sold` text NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`tbl_sold_hogs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
