-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: mysql51-015.wc2:3306
-- Generation Time: Mar 03, 2014 at 02:39 AM
-- Server version: 5.1.61
-- PHP Version: 5.2.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `512368_pigs`
--

-- --------------------------------------------------------

--
-- Table structure for table `defects_code`
--

CREATE TABLE IF NOT EXISTS `defects_code` (
  `defects_code_id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(3) DEFAULT NULL,
  `description` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`defects_code_id`),
  KEY `code` (`code`,`description`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `defects_code`
--

INSERT INTO `defects_code` (`defects_code_id`, `code`, `description`) VALUES
(1, 'A', 'asasas'),
(4, 'C', 'ccc'),
(3, 'Q', 'qqq');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
