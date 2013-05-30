-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 30, 2013 at 12:26 PM
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
-- Table structure for table `tbl_customer_entry`
--

CREATE TABLE IF NOT EXISTS `tbl_customer_entry` (
  `customer_entry_id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf16_bin NOT NULL,
  `first_name` varchar(255) COLLATE utf16_bin NOT NULL,
  `last_name` varchar(255) COLLATE utf16_bin NOT NULL,
  `address1` varchar(255) COLLATE utf16_bin NOT NULL,
  `address2` varchar(255) COLLATE utf16_bin NOT NULL,
  `city` varchar(50) COLLATE utf16_bin NOT NULL,
  `zip` int(10) NOT NULL,
  `phone_home` varchar(50) COLLATE utf16_bin NOT NULL,
  `phone_business` varchar(50) COLLATE utf16_bin NOT NULL,
  `phone_cell` varchar(50) COLLATE utf16_bin NOT NULL,
  `phone_other1` varchar(50) COLLATE utf16_bin NOT NULL,
  `phone_other2` varchar(50) COLLATE utf16_bin NOT NULL,
  `state` varchar(30) COLLATE utf16_bin NOT NULL,
  `country` varchar(20) COLLATE utf16_bin NOT NULL,
  `contact` varchar(50) COLLATE utf16_bin NOT NULL,
  `county` varchar(50) COLLATE utf16_bin NOT NULL,
  `company_name` varchar(50) COLLATE utf16_bin NOT NULL,
  `total_sows` int(11) NOT NULL,
  `total_boars` int(11) NOT NULL,
  `facility` varchar(50) COLLATE utf16_bin NOT NULL,
  `sows` int(11) NOT NULL,
  `boars` int(11) NOT NULL,
  `frequency` varchar(50) COLLATE utf16_bin NOT NULL,
  `system` varchar(40) COLLATE utf16_bin NOT NULL,
  `feeder` varchar(40) COLLATE utf16_bin NOT NULL,
  `finish` varchar(40) COLLATE utf16_bin NOT NULL,
  `rep_glits` varchar(50) COLLATE utf16_bin NOT NULL,
  `notes1` text COLLATE utf16_bin NOT NULL,
  `notes2` text COLLATE utf16_bin NOT NULL,
  `notes3` text COLLATE utf16_bin NOT NULL,
  `notes4` text COLLATE utf16_bin NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`customer_entry_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_bin COMMENT='aaa' AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
