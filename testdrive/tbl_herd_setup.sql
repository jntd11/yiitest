-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 19, 2013 at 11:05 AM
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
  `company_name` varchar(255) COLLATE utf16_bin NOT NULL,
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
  `notes` text COLLATE utf16_bin NOT NULL,
  `cc_brand` varchar(50) COLLATE utf16_bin NOT NULL,
  `cc_number` int(11) NOT NULL,
  `cc_expiration` varchar(6) COLLATE utf16_bin NOT NULL,
  `cc_name` varchar(50) COLLATE utf16_bin NOT NULL,
  `ship_company_name` varchar(50) COLLATE utf16_bin NOT NULL,
  `ship_name` varchar(50) COLLATE utf16_bin NOT NULL,
  `ship_address1` varchar(100) COLLATE utf16_bin NOT NULL,
  `ship_address2` varchar(100) COLLATE utf16_bin NOT NULL,
  `ship_city` varchar(50) COLLATE utf16_bin NOT NULL,
  `ship_state` varchar(10) COLLATE utf16_bin NOT NULL,
  `ship_country` varchar(50) COLLATE utf16_bin NOT NULL,
  `ship_zip` int(11) NOT NULL,
  `ship_contact` varchar(50) COLLATE utf16_bin NOT NULL,
  `ship_area` varchar(50) COLLATE utf16_bin NOT NULL,
  `ship_phone` varchar(20) COLLATE utf16_bin NOT NULL,
  `att_sale` datetime NOT NULL,
  `mailing_code` varchar(50) COLLATE utf16_bin DEFAULT NULL,
  `last_invoice` int(11) NOT NULL,
  `last_letter_sent` datetime NOT NULL,
  `entry_date` datetime NOT NULL,
  `herdmark` varchar(50) COLLATE utf16_bin DEFAULT NULL,
  `total_sows` int(11) NOT NULL,
  `total_boars` int(11) NOT NULL,
  `facility` varchar(50) COLLATE utf16_bin NOT NULL,
  `sows` int(11) NOT NULL,
  `boars` int(11) NOT NULL,
  `frequency` varchar(50) COLLATE utf16_bin NOT NULL,
  `system` varchar(40) COLLATE utf16_bin NOT NULL,
  `feeder` varchar(40) COLLATE utf16_bin NOT NULL,
  `finish` varchar(40) COLLATE utf16_bin NOT NULL,
  `rep_glits` varchar(60) COLLATE utf16_bin NOT NULL,
  `notes1` text COLLATE utf16_bin NOT NULL,
  `notes2` text COLLATE utf16_bin NOT NULL,
  `notes3` text COLLATE utf16_bin NOT NULL,
  `notes4` text COLLATE utf16_bin NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`customer_entry_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf16 COLLATE=utf16_bin COMMENT='aaa' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_customer_entry`
--

INSERT INTO `tbl_customer_entry` (`customer_entry_id`, `company_name`, `first_name`, `last_name`, `address1`, `address2`, `city`, `zip`, `phone_home`, `phone_business`, `phone_cell`, `phone_other1`, `phone_other2`, `state`, `country`, `contact`, `county`, `notes`, `cc_brand`, `cc_number`, `cc_expiration`, `cc_name`, `ship_company_name`, `ship_name`, `ship_address1`, `ship_address2`, `ship_city`, `ship_state`, `ship_country`, `ship_zip`, `ship_contact`, `ship_area`, `ship_phone`, `att_sale`, `mailing_code`, `last_invoice`, `last_letter_sent`, `entry_date`, `herdmark`, `total_sows`, `total_boars`, `facility`, `sows`, `boars`, `frequency`, `system`, `feeder`, `finish`, `rep_glits`, `notes1`, `notes2`, `notes3`, `notes4`, `modified_date`) VALUES
(2, 'Test Jai', 'jai', 'sankar', 'chennai', 'Chrompet', 'chennai', 600044, '828 28292929', '90101039393', '888282828', '9199191919', '3443434', 'TN', 'India', 'jai', 'india', 'dlsfjsdf\r\nsdfl''sdf\r\nsdf;\r\nsdf\r\ndf\r\nds\r\nfsd\r\nf\r\nds\r\nf\r\ndsf', 'MASTER', 2147483647, '1727', 'Jaisankar', 'Jaiw', 'jai', '7B ', 'ldfkld', 'chennai', 'TN', 'India', 522200, 'Jai2', 'India112', '882823828', '2013-06-05 00:00:00', 'a, b, C-Customer, a-a1, ', 11, '2013-06-04 00:00:00', '2013-06-04 00:00:00', 'sasadf', 100, 200, 'fdsf', 500, 300, '1', 'System', 'Feeder', 'Finishe', 'Rep', 'ndfnsda\r\ndsafksd\r\ndsafksdf\r\nksdfk', 'dlfsdf\r\nsdflsdfl\r\n\r\n\r\n\r\ndsfsdf\r\nd\r\nf', 'dfdsf', 'dfdsf', '2013-06-05 09:43:18'),
(3, 'Navabrind IT solutions', 'Venkatest', 'Nagarjana', 'Chennai', 'India', 'Bangaloer', 919191, '111111', '222222', '777777', '999999', '100000', 'karnatka', 'India', 'Venk', 'India', 'aa', 'VISA', 2147483647, '1122', 'kai', 'sads', 'Jai', 'jai', 'j', 'Chennai', 'TN', 'India', 3343434, 'India', 'aaaa', '343434', '2013-06-05 00:00:00', 'S', 43434, '2013-06-05 00:00:00', '2013-06-05 00:00:00', '', 11, 11, 'dfdf', 111, 222, '2323', 'as', 'as', 's', 's', 's', '2', '2', '2', '2013-06-06 11:53:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_herd_setup`
--

CREATE TABLE IF NOT EXISTS `tbl_herd_setup` (
  `herd_id` int(11) NOT NULL AUTO_INCREMENT,
  `farm_herd` varchar(2) NOT NULL,
  `breeder_name` varchar(50) NOT NULL,
  `farm_name` varchar(50) NOT NULL,
  `address1` varchar(100) NOT NULL,
  `address2` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` int(11) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `breeder_number` int(11) NOT NULL,
  `breeder_herd_mark` varchar(10) NOT NULL,
  `home_country` varchar(1) NOT NULL,
  `breed` varchar(1) NOT NULL,
  `is_weight` set('','') NOT NULL,
  `breeder_no` varchar(1) NOT NULL,
  `weighted` set('D','A') NOT NULL,
  `is_hog_tag` set('H','T') NOT NULL,
  `hog_numbering` set('Q','S','N') NOT NULL,
  `passover_days` int(11) NOT NULL,
  `due_days` int(11) NOT NULL,
  `take_boars_gilts` set('','') NOT NULL,
  `take_sow_scores` set('','') NOT NULL,
  `spring_start` int(2) NOT NULL,
  `spring_end` int(2) NOT NULL,
  `spring_letter` varchar(1) NOT NULL,
  `fall_start` int(2) NOT NULL,
  `fall_end` int(2) NOT NULL,
  `fall_letter` char(1) NOT NULL,
  `shift_year` varchar(1) NOT NULL,
  `take_weaned_date` set('T','S') NOT NULL,
  `take_deffects` set('','') NOT NULL,
  `prev_herd_mark` varchar(10) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`herd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mailing_code`
--

CREATE TABLE IF NOT EXISTS `tbl_mailing_code` (
  `mailing_code_id` int(11) NOT NULL AUTO_INCREMENT,
  `mailing_code_label` varchar(10) NOT NULL,
  `mailing_code_desc` varchar(150) NOT NULL,
  PRIMARY KEY (`mailing_code_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 AUTO_INCREMENT=139 ;

--
-- Dumping data for table `tbl_mailing_code`
--

INSERT INTO `tbl_mailing_code` (`mailing_code_id`, `mailing_code_label`, `mailing_code_desc`) VALUES
(108, 'a', 'a1'),
(109, 'b', 'b1'),
(112, 'E', 'E1'),
(113, 'f', 'F1'),
(114, 'g', 'g1'),
(115, 'i', 'i1'),
(116, 'k', 'k1'),
(117, 'P', 'p'),
(118, 'q', 'q1'),
(119, 'r', 'r'),
(120, 'C', 'Customer'),
(121, 'kk', 'ka sks kk'),
(122, 'Z', 'zebra'),
(123, 'X', 'xxxx'),
(124, 'K', 'aaa'),
(125, 'L', 'L'),
(126, 'L', 'L'),
(127, 'M', 'm'),
(128, 'M', 'm'),
(129, 'A', 'aaa'),
(130, 'A', 'a'),
(131, 'L', 'L'),
(132, 'J', 'jj'),
(133, 'A', 'A'),
(134, 'K', 'kkk'),
(135, 'J', 'kkk'),
(136, 'J1', 'kkk'),
(137, 'J1', 'kkk'),
(138, 'U', 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) COLLATE utf8_bin NOT NULL,
  `password` varchar(128) COLLATE utf8_bin NOT NULL,
  `email` varchar(128) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `email`) VALUES
(1, 'test', 'test', 'test'),
(2, 'test1', 'test1', 'test1@test1.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
