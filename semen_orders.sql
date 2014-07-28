-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 28, 2014 at 12:39 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

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
-- Table structure for table `semen_orders`
--

CREATE TABLE IF NOT EXISTS `semen_orders` (
  `semen_orders_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `sow_boar_id` int(11) NOT NULL,
  `ordered_date` date NOT NULL,
  `ship_date` date NOT NULL,
  `doses` int(11) NOT NULL,
  `price_dose` float NOT NULL,
  `shipping_cost` float NOT NULL,
  `misc` float NOT NULL,
  `comments` varchar(40) NOT NULL,
  `onstandby` varchar(1) NOT NULL,
  `invoice` int(11) NOT NULL,
  `semen_type` varchar(30) NOT NULL,
  `cod_charges` float NOT NULL,
  `payment_type` varchar(3) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`semen_orders_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
