-- phpMyAdmin SQL Dump
-- version 3.5.0
-- http://www.phpmyadmin.net
--
-- Host: localhost:3307
-- Generation Time: Sep 30, 2013 at 09:56 AM
-- Server version: 5.5.20
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
-- Table structure for table `sow_boar`
--

CREATE TABLE IF NOT EXISTS `sow_boar` (
  `ear_notch` varchar(20) NOT NULL,
  `sow_boar_name` varchar(30) NOT NULL,
  `sow_boar_id` int(11) NOT NULL AUTO_INCREMENT,
  `registeration_no` varchar(20) NOT NULL,
  `born` varchar(20) DEFAULT NULL,
  `no_pigs` int(11) NOT NULL,
  `weight_21` int(11) NOT NULL,
  `sire_notch` varchar(20) NOT NULL,
  `dam_notch` varchar(20) NOT NULL,
  `bred_date` varchar(20) NOT NULL,
  `last_parity` int(11) NOT NULL,
  `sold_mmddyy` varchar(20) NOT NULL,
  `reason_sold` varchar(20) NOT NULL,
  `offspring_name` varchar(20) NOT NULL,
  `back_fat` float DEFAULT NULL,
  `loinneye` float DEFAULT NULL,
  `days` int(11) NOT NULL,
  `EBV` float DEFAULT NULL,
  `sire_initials` varchar(2) DEFAULT NULL,
  `comments` text,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sow_boar_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `sow_boar`
--

INSERT INTO `sow_boar` (`ear_notch`, `sow_boar_name`, `sow_boar_id`, `registeration_no`, `born`, `no_pigs`, `weight_21`, `sire_notch`, `dam_notch`, `bred_date`, `last_parity`, `sold_mmddyy`, `reason_sold`, `offspring_name`, `back_fat`, `loinneye`, `days`, `EBV`, `sire_initials`, `comments`, `date_modified`) VALUES
('2B ABC 2013 100-1', 'Jai ', 2, '100', '2001-01-01 00:00:00', 10, 100, '1A aa 02 1-1', '2B aa 9 1-1', '010103', 11, '010104', 'Just ', 'Skandan', 100, 33, 200, 10, NULL, 'This is test', '2013-09-09 15:25:35'),
('2B C 2013 192-2', 'Skandan', 4, '', NULL, 0, 0, '2B ABC 2013 100-1', '2B aa 2009 1-1', '', 0, '', '', '', NULL, NULL, 0, NULL, NULL, NULL, '2013-09-14 08:13:27'),
('1A aa 2002 1-1', '1A Sow', 5, '', NULL, 0, 0, '', '', '', 0, '', '', '', NULL, NULL, 0, NULL, NULL, NULL, '2013-09-14 08:18:47'),
('2B C 1998 192-2', 'Lloyd 1409', 6, '', NULL, 0, 0, '2B C 96 192-2', '2B C 97 192-1', '', 0, '', '', '', NULL, NULL, 0, NULL, NULL, NULL, '2013-09-14 15:32:13'),
('2B aa 1999 1.2', 'Lindas', 7, '', NULL, 0, 0, '2B C 98 192-1', '2B C 97 192-1', '', 0, '', '', '', NULL, NULL, 0, NULL, NULL, NULL, '2013-09-14 15:34:40'),
('1A M 2001 100-1', 'First', 8, '', NULL, 0, 0, '1A M 2002 200-1', '1A M 2003 300-1', '', 0, '', '', '', NULL, NULL, 0, NULL, NULL, NULL, '2013-09-29 16:41:18'),
('1A M 2002 200-1', 'Second Sire', 9, '', NULL, 0, 0, '1A M 2006 600-1', '1A M 2005 500-1', '', 0, '', '', '', NULL, NULL, 0, NULL, NULL, NULL, '2013-09-29 16:41:53'),
('1A M 2003 300-1', 'Second Dam', 10, '', NULL, 0, 0, '1A M 2001 100-4', '1A M 2004 400-1', '', 0, '', '', '', NULL, NULL, 0, NULL, NULL, NULL, '2013-09-29 16:42:17'),
('1A M 2004 400-1', 'Third Dam Dam', 11, '', NULL, 0, 0, '1A M 1990 600-7', '1A M 1990 600-8', '', 0, '', '', '', NULL, NULL, 0, NULL, NULL, NULL, '2013-09-29 16:42:40'),
('1A M 2005 500-1', 'Third Sire Dam', 12, '', NULL, 0, 0, '1A M 1990 600-3', '1A M 1990 600-4', '', 0, '', '', '', NULL, NULL, 0, NULL, NULL, NULL, '2013-09-29 16:43:04'),
('1A M 2006 600-1', 'Third Sire Sire', 13, '', NULL, 0, 0, '1A M 1990 600-1', '1A M 1990 600-2', '', 0, '', '', '', NULL, NULL, 0, NULL, NULL, NULL, '2013-09-29 16:43:34'),
('1A M 2001 100-4', 'Sire Dam Sire', 14, '', NULL, 0, 0, '1A M 1990 600-5', '1A M 1990 600-6', '', 0, '', '', '', NULL, NULL, 0, NULL, NULL, NULL, '2013-09-29 16:46:01'),
('1A M 1990 600-1', '1st', 15, '', NULL, 0, 0, '1A M 1981 700-1', '1A M 1981 700-2', '', 0, '', '', '', NULL, NULL, 0, NULL, NULL, NULL, '2013-09-29 16:53:10'),
('1A M 1990 600-2', 'Sire ', 16, '', NULL, 0, 0, '1A M 1981 700-3', '1A M 1981 700-4', '', 0, '', '', '', NULL, NULL, 0, NULL, NULL, NULL, '2013-09-29 16:53:47'),
('1A M 1990 600-3', 'Sire 3', 17, '', NULL, 0, 0, '', '', '', 0, '', '', '', NULL, NULL, 0, NULL, NULL, NULL, '2013-09-29 16:54:00'),
('1A M 1990 600-4', 'Sire 4', 18, '', NULL, 0, 0, '', '', '', 0, '', '', '', NULL, NULL, 0, NULL, NULL, NULL, '2013-09-29 16:54:15'),
('1A M 1990 600-5', '5th Dam', 20, '', NULL, 0, 0, '', '', '', 0, '', '', '', NULL, NULL, 0, NULL, NULL, NULL, '2013-09-29 18:26:55'),
('1A M 1990 600-6', '6th Dam', 21, '', NULL, 0, 0, '', '', '', 0, '', '', '', NULL, NULL, 0, NULL, NULL, NULL, '2013-09-29 18:27:10'),
('1A M 1990 600-7', '7th Dam', 22, '', NULL, 0, 0, '', '', '', 0, '', '', '', NULL, NULL, 0, NULL, NULL, NULL, '2013-09-29 18:27:19'),
('1A M 1990 600-8', '8th Dam', 23, '', NULL, 0, 0, '', '', '', 0, '', '', '', NULL, NULL, 0, NULL, NULL, NULL, '2013-09-29 18:27:28'),
('1A M 1981 700-1', '1st', 24, '', NULL, 0, 0, '', '', '', 0, '', '', '', NULL, NULL, 0, NULL, NULL, NULL, '2013-09-29 18:30:13'),
('1A M 1981 700-2', '2nd', 25, '', NULL, 0, 0, '', '', '', 0, '', '', '', NULL, NULL, 0, NULL, NULL, NULL, '2013-09-29 18:30:28'),
('1A M 1981 700-3', '3rd', 26, '', NULL, 0, 0, '', '', '', 0, '', '', '', NULL, NULL, 0, NULL, NULL, NULL, '2013-09-29 18:30:35'),
('1A M 1981 700-4', '4th', 27, '', NULL, 0, 0, '', '', '', 0, '', '', '', NULL, NULL, 0, NULL, NULL, NULL, '2013-09-29 18:30:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_entry`
--

CREATE TABLE IF NOT EXISTS `tbl_customer_entry` (
  `customer_entry_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip` int(10) NOT NULL,
  `phone_home` varchar(50) NOT NULL,
  `phone_business` varchar(50) NOT NULL,
  `phone_cell` varchar(50) NOT NULL,
  `phone_other1` varchar(50) NOT NULL,
  `phone_other2` varchar(50) NOT NULL,
  `state` varchar(30) NOT NULL,
  `country` varchar(20) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `county` varchar(50) NOT NULL,
  `notes` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cc_brand` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cc_number` int(11) NOT NULL,
  `cc_expiration` varchar(6) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cc_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ship_company_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ship_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ship_address1` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ship_address2` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ship_city` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ship_state` varchar(10) NOT NULL,
  `ship_country` varchar(50) NOT NULL,
  `ship_zip` int(11) NOT NULL,
  `ship_contact` varchar(50) NOT NULL,
  `ship_area` varchar(50) NOT NULL,
  `ship_phone` varchar(20) NOT NULL,
  `att_sale` datetime NOT NULL,
  `mailing_code` varchar(50) DEFAULT NULL,
  `last_invoice` int(11) NOT NULL,
  `last_letter_sent` datetime NOT NULL,
  `entry_date` datetime NOT NULL,
  `herdmark` varchar(50) DEFAULT NULL,
  `total_sows` int(11) NOT NULL,
  `total_boars` int(11) NOT NULL,
  `facility` varchar(50) NOT NULL,
  `sows` int(11) NOT NULL,
  `boars` int(11) NOT NULL,
  `frequency` varchar(50) NOT NULL,
  `system` varchar(40) NOT NULL,
  `feeder` varchar(40) NOT NULL,
  `finish` varchar(40) NOT NULL,
  `rep_glits` varchar(60) NOT NULL,
  `notes1` text NOT NULL,
  `notes2` text NOT NULL,
  `notes3` text NOT NULL,
  `notes4` text NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`customer_entry_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='aaa' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_customer_entry`
--

INSERT INTO `tbl_customer_entry` (`customer_entry_id`, `company_name`, `first_name`, `last_name`, `address1`, `address2`, `city`, `zip`, `phone_home`, `phone_business`, `phone_cell`, `phone_other1`, `phone_other2`, `state`, `country`, `contact`, `county`, `notes`, `cc_brand`, `cc_number`, `cc_expiration`, `cc_name`, `ship_company_name`, `ship_name`, `ship_address1`, `ship_address2`, `ship_city`, `ship_state`, `ship_country`, `ship_zip`, `ship_contact`, `ship_area`, `ship_phone`, `att_sale`, `mailing_code`, `last_invoice`, `last_letter_sent`, `entry_date`, `herdmark`, `total_sows`, `total_boars`, `facility`, `sows`, `boars`, `frequency`, `system`, `feeder`, `finish`, `rep_glits`, `notes1`, `notes2`, `notes3`, `notes4`, `modified_date`) VALUES
(2, 'Test Jai', 'jai', 'sankar', 'chennai', 'Chrompet', 'chennai', 600044, '828 28292929', '90101039393', '888282828', '9199191919', '9999999999 fax', 'TN', 'India', 'jai', 'india', 'dlsfjsdf\r\nsdfl''sdf\r\nsdf;\r\nsdf\r\ndf\r\nds\r\nfsd\r\nf\r\nds\r\nf\r\ndsf', 'MASTER', 2147483647, '1727', 'Jaisankar', 'Test Jai', 'jai sankar', 'chennai', 'Chrompet', 'chennai', 'TN', 'India', 600044, 'jai', 'india', '828 28292929', '2013-06-26 00:00:00', 'sdsd', 11, '2013-06-26 00:00:00', '2013-06-26 00:00:00', 'sasadf', 100, 200, 'fdsf', 500, 300, '1', 'System', 'Feeder', 'Finishe', 'Rep222222222222222222222222222222222222222222222222222222222', 'ndfnsda\r\ndsafksd\r\ndsafksdf\r\nksdfk', 'dlfsdf\r\nsdflsdfl\r\n\r\n\r\n\r\ndsfsdf\r\nd\r\nf', 'dfdsf', 'dfdsf', '2013-06-05 09:43:18'),
(3, 'Lloyd''s on Portage                                                    ', 'Lloyd', 'Harless', '12099 Far Portage Dr.', 'test', 'Park Rapids', 56470, '218-732-6929', '218.732.1962', '218.555.1212', 'x', 'xsx', 'MN', 'USA', 'Lloyd', 'Hubbard', 'notes', 'MC', 1111, '11.222', 'Test', 'x', 'xx', 'x', 'x', 'x', 'x', 'x', 12345, 'x', 'x', 'x', '2013-06-06 00:00:00', 'xsxxa', 1234, '2013-06-06 00:00:00', '2013-06-06 00:00:00', 'xxx', 5, 5, 'y', 5, 5, 'x', 'x', 'x', 'y', 'x', 'n', 'n', 'n', 'n', '2013-06-07 01:10:16'),
(4, 'Test Jai', 'jai', 'sankar', 'chennai', 'Chrompet', 'chennai', 600044, '828 28292929', '90101039393', '888282828', '9199191919', '9999999999', 'TN', 'India', 'jai', 'india', 'dlsfjsdf\nsdfl''sdf\nsdf;\nsdf\ndf\nds\nfsd\nf\nds\nf\ndsf', 'MASTER', 2147483647, '1727', 'Jaisankar', 'Jai', 'jai', '7B ', 'ldfkld', 'chennai', 'TN', 'India', 522200, 'Jai', 'India', '882823828', '2013-06-04 00:00:00', 'C', 11, '2013-06-04 00:00:00', '2013-06-04 00:00:00', 'sasadf', 100, 200, 'fdsf', 500, 300, '1', 'System', 'Feeder', 'Finishe', 'Rep', 'ndfnsda\ndsafksd\ndsafksdf\nksdfk', 'dlfsdf\nsdflsdfl\n\n\n\ndsfsdf\nd\nf', 'dfdsf', 'dfdsf', '2013-06-05 20:13:18'),
(5, 'Navabrind IT solutions', 'Venkatest', 'Nagarjana', 'Chennai', 'India', 'Jaisankar', 919191, '111111', '222222', '777777', '999999', '100000', 'karnatka', 'India', 'Venk', 'India', 'Hai', 'VISA', 2147483647, '1122', 'kai', 'sads', 'Jai', 'jai', 'j', 'Chennai', 'TN', 'India', 3343434, 'India', 'aaaa', '343434', '2013-06-05 00:00:00', '1212', 43434, '2013-06-05 00:00:00', '2013-06-04 00:00:00', '', 11, 11, 'dfdf', 111, 222, '2323', 'as', 'as', 's', 's', 'Jaisankar', '2', '2', '2', '2013-06-06 22:23:10');

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
  `is_weight` varchar(1) NOT NULL,
  `breeder_no` varchar(1) NOT NULL,
  `weighted` varchar(1) NOT NULL,
  `is_hog_tag` varchar(1) NOT NULL,
  `hog_numbering` set('Q','S','N') NOT NULL,
  `passover_days` int(11) NOT NULL,
  `due_days` int(11) NOT NULL,
  `take_boars_gilts` varchar(1) NOT NULL,
  `take_sow_scores` varchar(1) NOT NULL,
  `spring_start` int(2) NOT NULL,
  `spring_end` int(2) NOT NULL,
  `spring_letter` varchar(1) NOT NULL,
  `fall_start` int(2) NOT NULL,
  `fall_end` int(2) NOT NULL,
  `fall_letter` char(1) NOT NULL,
  `shift_year` varchar(1) NOT NULL,
  `take_weaned_date` set('T','S') NOT NULL,
  `take_deffects` varchar(1) NOT NULL,
  `prev_herd_mark` varchar(10) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`herd_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=ucs2 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_herd_setup`
--

INSERT INTO `tbl_herd_setup` (`herd_id`, `farm_herd`, `breeder_name`, `farm_name`, `address1`, `address2`, `city`, `state`, `zip`, `phone`, `breeder_number`, `breeder_herd_mark`, `home_country`, `breed`, `is_weight`, `breeder_no`, `weighted`, `is_hog_tag`, `hog_numbering`, `passover_days`, `due_days`, `take_boars_gilts`, `take_sow_scores`, `spring_start`, `spring_end`, `spring_letter`, `fall_start`, `fall_end`, `fall_letter`, `shift_year`, `take_weaned_date`, `take_deffects`, `prev_herd_mark`, `fax`, `date_modified`) VALUES
(4, '2B', 'breeder', 'Farms', 'Address 1', 'Address 2', 'City', 'AZ', 88888, '9919191', 11, 'C', 'M', 'A', 'N', '#', '#', 'T', 'N', 11, 33, 'Y', 'Y', 11, 44, 'L', 11, 33, 'F', 'S', 'T', 'Y', 'A', '919219291', '2013-08-24 17:03:26'),
(5, '1A', 'Jaisankar 1A', 'jai', 'a', 'a', 'chennai', 'TN', 3999999, '2222', 11, 'M', 'C', 'H', 'Y', 'N', 'N', 'H', 'Q', 11, 22, 'Y', 'Y', 1, 2, 'S', 11, 22, '1', 'S', 'T', 'Y', '', '', '2013-09-14 08:18:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mailing_code`
--

CREATE TABLE IF NOT EXISTS `tbl_mailing_code` (
  `mailing_code_id` int(11) NOT NULL AUTO_INCREMENT,
  `mailing_code_label` varchar(10) NOT NULL,
  `mailing_code_desc` varchar(150) NOT NULL,
  PRIMARY KEY (`mailing_code_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_mailing_code`
--

INSERT INTO `tbl_mailing_code` (`mailing_code_id`, `mailing_code_label`, `mailing_code_desc`) VALUES
(9, 'C', 'Commercial Breeder'),
(10, 'D', 'DAAA'),
(11, 'A', 'AAAA'),
(12, 'T', 'TES'),
(13, 'Z', 'Zend'),
(14, 'Y', 'Yest');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `email`) VALUES
(1, 'test', 'test', 'test'),
(2, 'test1', 'test1', 'test1@test1.com'),
(3, 'mathangi ', '123456Q~', 'mathangijai.c@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
