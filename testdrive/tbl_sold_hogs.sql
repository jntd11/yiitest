-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 06, 2013 at 11:36 AM
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
  `cust_id` int(11) NOT NULL,
  `hog_ear_notch` varchar(20) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `date_sold` varchar(20) NOT NULL,
  `sold_price` int(10) NOT NULL,
  `sale_type` varchar(1) NOT NULL,
  `invoice_number` int(6) NOT NULL,
  `app_xfer` varchar(1) NOT NULL,
  `comments` text,
  `reason_sold` text,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ear_notch_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`tbl_sold_hogs_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_sold_hogs`
--

INSERT INTO `tbl_sold_hogs` (`tbl_sold_hogs_id`, `cust_id`, `hog_ear_notch`, `customer_name`, `date_sold`, `sold_price`, `sale_type`, `invoice_number`, `app_xfer`, `comments`, `reason_sold`, `date_modified`, `ear_notch_id`) VALUES
(1, 2, '2B C 13 192-2', 'Test Jai', '01-01-2010', 11, 'S', 1212, 'Y', 'asas', 'aasas', '2013-10-25 11:16:03', NULL),
(2, 2, '1A aa 9 1-2', 'jai', '10-16-2013', 1212, '', 0, 'Y', '', '', '2013-10-29 12:48:51', NULL),
(3, 2, '1A aa 13 300-1', 'jai', '10-15-2013', 12121, 'S', 0, 'N', '', 'this is test', '2013-10-29 12:49:35', NULL),
(4, 3, '1A aa 81 300-2', 'Nagarjana', '11-07-2013', 1222, 'S', 0, 'Y', 'as asas', 'This is test by jai', '2013-11-04 08:51:03', 10),
(5, 3, '1A aa 13 300-1', 'Navabrind IT solutions', '11-06-2013', 1222, 'A', 121212, 'Y', 'This is test', 'this is test', '2013-11-06 09:19:08', NULL),
(6, 2, '1A aa 02 104-4', 'jai', '11-04-2013', 999, 'A', 82882, 'Y', 'This is comment', '', '2013-11-06 11:27:19', 4),
(7, 3, '2B ABC 13 100-1', 'Navabrind IT solutions', '01-01-04', 888, '1', 1212, 'Y', 'This is comment', 'Just sold', '2013-11-06 11:31:19', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
