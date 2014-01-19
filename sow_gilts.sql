-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 06, 2014 at 10:45 AM
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
-- Table structure for table `sow_gilts`
--

CREATE TABLE IF NOT EXISTS `sow_gilts` (
  `sow_gilts_id` int(11) NOT NULL AUTO_INCREMENT,
  `date_bred` varchar(10) COLLATE utf8_bin NOT NULL,
  `sire_ear_notch` varchar(20) COLLATE utf8_bin NOT NULL,
  `service_type` varchar(5) COLLATE utf8_bin NOT NULL,
  `comments` text COLLATE utf8_bin NOT NULL,
  `passover_date` varchar(10) COLLATE utf8_bin NOT NULL,
  `due_date` varchar(10) COLLATE utf8_bin NOT NULL,
  `days_between` varchar(10) COLLATE utf8_bin NOT NULL,
  `settled` varchar(1) COLLATE utf8_bin NOT NULL,
  `farrowed` varchar(1) COLLATE utf8_bin NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sow_gilts_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
