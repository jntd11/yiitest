-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 08, 2013 at 01:00 PM
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
-- Table structure for table `tbl_mailing_code`
--

CREATE TABLE IF NOT EXISTS `tbl_mailing_code` (
  `mailing_code_id` int(11) NOT NULL AUTO_INCREMENT,
  `mailing_code_label` varchar(50) NOT NULL,
  `mailing_code_desc` text NOT NULL,
  PRIMARY KEY (`mailing_code_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_mailing_code`
--

INSERT INTO `tbl_mailing_code` (`mailing_code_id`, `mailing_code_label`, `mailing_code_desc`) VALUES
(1, 'jai', 'jai ');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
