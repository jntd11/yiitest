-- phpMyAdmin SQL Dump
-- version 3.5.0
-- http://www.phpmyadmin.net
--
-- Host: localhost:3307
-- Generation Time: Sep 08, 2013 at 10:12 PM
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
  `born` datetime NOT NULL,
  `no_pigs` int(11) NOT NULL,
  `weight_21` int(11) NOT NULL,
  `sire_notch` varchar(20) NOT NULL,
  `dam_notch` varchar(20) NOT NULL,
  `bred_date` varchar(20) NOT NULL,
  `last_parity` int(11) NOT NULL,
  `sold_mmddyy` varchar(20) NOT NULL,
  `reason_sold` varchar(20) NOT NULL,
  `offspring_name` varchar(20) NOT NULL,
  `back_fat` float NOT NULL,
  `loinneye` float NOT NULL,
  `days` int(11) NOT NULL,
  `EBV` float NOT NULL,
  `sire_initials` varchar(2) NOT NULL,
  `comments` text NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sow_boar_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
