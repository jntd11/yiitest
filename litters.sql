-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 10, 2014 at 02:00 AM
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
-- Table structure for table `litters`
--

CREATE TABLE IF NOT EXISTS `litters` (
  `litters_id` int(11) NOT NULL AUTO_INCREMENT,
  `sire_ear_notch` varchar(50) NOT NULL,
  `sow_parity` int(2) NOT NULL,
  `times_settle` int(1) NOT NULL,
  `herd_litter` int(5) NOT NULL,
  `no_pigs` int(2) NOT NULL,
  `no_born_alive` int(2) NOT NULL,
  `no_boars_alive` int(2) NOT NULL,
  `gilts_alive` int(2) NOT NULL,
  `birth_wgt` int(3) NOT NULL,
  `comments` text NOT NULL,
  `born_date` varchar(20) NOT NULL,
  `21_wgt` int(3) NOT NULL,
  `asscn_ebv` float NOT NULL,
  `nsif_ebv` float NOT NULL,
  `nsif_spi` float NOT NULL,
  `weighing_age` int(2) NOT NULL,
  `weaned_males` int(2) NOT NULL,
  `weaned_females` int(2) NOT NULL,
  `no_pigs_weighted` int(2) NOT NULL,
  `actual_weight` int(3) NOT NULL,
  `pigs_transfer` int(2) NOT NULL,
  `males_born` int(2) NOT NULL,
  `females_born` int(2) NOT NULL,
  `birth_weight` int(3) NOT NULL,
  `weighted_date` varchar(20) NOT NULL,
  `males_born_alive` int(2) NOT NULL,
  `females_born_alive` int(2) NOT NULL,
  `weaned_date` varchar(20) NOT NULL,
  `first_pig_number` int(5) NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`litters_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
