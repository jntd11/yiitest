-- phpMyAdmin SQL Dump
-- version 3.5.0
-- http://www.phpmyadmin.net
--
-- Host: localhost:3307
-- Generation Time: Sep 10, 2013 at 12:03 PM
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
  `sire_initials` varchar(2) DEFAULT NULL,
  `comments` text NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sow_boar_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sow_boar`
--

INSERT INTO `sow_boar` (`ear_notch`, `sow_boar_name`, `sow_boar_id`, `registeration_no`, `born`, `no_pigs`, `weight_21`, `sire_notch`, `dam_notch`, `bred_date`, `last_parity`, `sold_mmddyy`, `reason_sold`, `offspring_name`, `back_fat`, `loinneye`, `days`, `EBV`, `sire_initials`, `comments`, `date_modified`) VALUES
('2B C 3 192-2', 'TEST', 1, '11', '2012-09-12 00:00:00', 11, 21, '44', '33', '210313', 11, '010110', 'ksadlalsd', 'TEST', 11, 33, 333, 11, NULL, 'SowBoar[comments]', '2013-09-08 18:07:39'),
('2B ABC 2013 100-1', 'Jai ', 2, '100', '2001-01-01 00:00:00', 10, 100, '2B ABC 3 1-1', '2B ABC 3 2-2', '010103', 11, '010104', 'Just ', 'Skandan', 100, 33, 200, 10, NULL, 'This is test', '2013-09-09 15:25:35');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
