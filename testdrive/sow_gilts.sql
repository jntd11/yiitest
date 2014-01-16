-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 16, 2014 at 12:55 PM
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
  `sow_ear_notch` varchar(20) NOT NULL,
  `date_bred` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `sire_ear_notch` varchar(20) NOT NULL,
  `service_type` varchar(5) NOT NULL,
  `comments` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `passover_date` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `due_date` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `days_between` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `settled` varchar(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `farrowed` varchar(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sow_gilts_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sow_gilts`
--

INSERT INTO `sow_gilts` (`sow_gilts_id`, `sow_ear_notch`, `date_bred`, `sire_ear_notch`, `service_type`, `comments`, `passover_date`, `due_date`, `days_between`, `settled`, `farrowed`, `date_modified`) VALUES
(1, '1DCDO 2012 5-7', '01/08/2013', '1DCDO 1998 202-2', 'A', '', '01/29/2013', '05/23/2013', '366', 'N', 'N', '2014-01-16 09:45:07'),
(2, '1DCDO 1999 2-1', '01/16/2014', '1D CDO ', '', '', '02/06/2014', '05/31/2014', '5493', 'N', 'N', '2014-01-16 09:46:06'),
(3, '1DCDO 1999 3-1', '01/15/2014', '1DCDO 1998 202-2', 'B', '', '02/05/2014', '05/30/2014', '5490', 'N', 'N', '2014-01-16 10:35:24'),
(4, '1DCDO 2000 17-7', '01/16/2014', '1DCDO 2001 221-7', '', '', '02/06/2014', '05/31/2014', '5088', 'N', 'N', '2014-01-16 10:38:18'),
(5, '1DCDO 1999 16-5', '01/16/2014', '1DCDO 2001 238-7', '', '', '02/06/2014', '05/31/2014', '5457', 'N', 'N', '2014-01-16 10:40:12');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
