-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 29, 2013 at 01:08 PM
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
-- Table structure for table `authassignment`
--

CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) COLLATE utf8_bin NOT NULL,
  `userid` varchar(64) COLLATE utf8_bin NOT NULL,
  `bizrule` text COLLATE utf8_bin,
  `data` text COLLATE utf8_bin,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('Admin', '1', NULL, 'N;'),
('Authenticated', '2', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitem`
--

CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) COLLATE utf8_bin NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_bin,
  `bizrule` text COLLATE utf8_bin,
  `data` text COLLATE utf8_bin,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Admin', 2, NULL, NULL, 'N;'),
('Authenticated', 2, NULL, NULL, 'N;'),
('Guest', 2, NULL, NULL, 'N;'),
('HerdSetupController.*', 1, NULL, NULL, 'N;'),
('HerdSetupController.Index', 0, NULL, NULL, 'N;'),
('MailingCode.*', 1, NULL, NULL, 'N;'),
('MailingCode.Index', 0, NULL, NULL, 'N;'),
('Site.*', 1, NULL, NULL, 'N;'),
('Site.Contact', 0, NULL, NULL, 'N;'),
('Site.Error', 0, NULL, NULL, 'N;'),
('Site.Index', 0, NULL, NULL, 'N;'),
('Site.Login', 0, NULL, NULL, 'N;'),
('Site.Logout', 0, NULL, NULL, 'N;'),
('SoldHogs.*', 1, NULL, NULL, 'N;'),
('SoldHogs.Index', 0, NULL, NULL, 'N;'),
('SowBoar.*', 1, NULL, NULL, 'N;'),
('SowBoar.Admin', 0, NULL, NULL, 'N;'),
('SowBoar.AutocompleteBorn', 0, NULL, NULL, 'N;'),
('SowBoar.AutocompleteEarNotch', 0, NULL, NULL, 'N;'),
('SowBoar.AutocompleteName', 0, NULL, NULL, 'N;'),
('SowBoar.AutocompletePigs', 0, NULL, NULL, 'N;'),
('SowBoar.AutocompleteRegister', 0, NULL, NULL, 'N;'),
('SowBoar.Create', 0, NULL, NULL, 'N;'),
('SowBoar.Delete', 0, NULL, NULL, 'N;'),
('SowBoar.Index', 0, NULL, NULL, 'N;'),
('SowBoar.Pedigree', 0, NULL, NULL, 'N;'),
('SowBoar.Search', 0, NULL, NULL, 'N;'),
('SowBoar.Siredam', 0, NULL, NULL, 'N;'),
('SowBoar.Update', 0, NULL, NULL, 'N;'),
('SowBoar.View', 0, NULL, NULL, 'N;'),
('TblCustomerEntry.*', 1, NULL, NULL, 'N;'),
('TblCustomerEntry.Admin', 0, NULL, NULL, 'N;'),
('TblCustomerEntry.AutocompleteCompanyName', 0, NULL, NULL, 'N;'),
('TblCustomerEntry.AutocompleteFirstName', 0, NULL, NULL, 'N;'),
('TblCustomerEntry.AutocompleteLastName', 0, NULL, NULL, 'N;'),
('TblCustomerEntry.AutocompleteMailingCode', 0, NULL, NULL, 'N;'),
('TblCustomerEntry.AutocompletePhoneBusiness', 0, NULL, NULL, 'N;'),
('TblCustomerEntry.AutocompletePhoneCell', 0, NULL, NULL, 'N;'),
('TblCustomerEntry.AutocompletePhoneHome', 0, NULL, NULL, 'N;'),
('TblCustomerEntry.AutocompletePhoneOther1', 0, NULL, NULL, 'N;'),
('TblCustomerEntry.AutocompletePhoneOther2', 0, NULL, NULL, 'N;'),
('TblCustomerEntry.Create', 0, NULL, NULL, 'N;'),
('TblCustomerEntry.Delete', 0, NULL, NULL, 'N;'),
('TblCustomerEntry.Index', 0, NULL, NULL, 'N;'),
('TblCustomerEntry.Update', 0, NULL, NULL, 'N;'),
('TblCustomerEntry.View', 0, NULL, NULL, 'N;'),
('TblHerdSetup.*', 1, NULL, NULL, 'N;'),
('TblHerdSetup.Admin', 0, NULL, NULL, 'N;'),
('TblHerdSetup.Create', 0, NULL, NULL, 'N;'),
('TblHerdSetup.Delete', 0, NULL, NULL, 'N;'),
('TblHerdSetup.Index', 0, NULL, NULL, 'N;'),
('TblHerdSetup.Update', 0, NULL, NULL, 'N;'),
('TblHerdSetup.View', 0, NULL, NULL, 'N;'),
('TblMailingCode.*', 1, NULL, NULL, 'N;'),
('TblMailingCode.Admin', 0, NULL, NULL, 'N;'),
('TblMailingCode.Create', 0, NULL, NULL, 'N;'),
('TblMailingCode.Delete', 0, NULL, NULL, 'N;'),
('TblMailingCode.Index', 0, NULL, NULL, 'N;'),
('TblMailingCode.Update', 0, NULL, NULL, 'N;'),
('TblMailingCode.View', 0, NULL, NULL, 'N;'),
('TblSoldHogs.*', 1, NULL, NULL, 'N;'),
('TblSoldHogs.Admin', 0, NULL, NULL, 'N;'),
('TblSoldHogs.AutocompleteDateSold', 0, NULL, NULL, 'N;'),
('TblSoldHogs.AutocompleteEarNotch', 0, NULL, NULL, 'N;'),
('TblSoldHogs.AutocompleteFirstName', 0, NULL, NULL, 'N;'),
('TblSoldHogs.AutocompleteId', 0, NULL, NULL, 'N;'),
('TblSoldHogs.AutocompleteInvoice', 0, NULL, NULL, 'N;'),
('TblSoldHogs.AutocompleteName', 0, NULL, NULL, 'N;'),
('TblSoldHogs.Create', 0, NULL, NULL, 'N;'),
('TblSoldHogs.Delete', 0, NULL, NULL, 'N;'),
('TblSoldHogs.Index', 0, NULL, NULL, 'N;'),
('TblSoldHogs.Rebuild', 0, NULL, NULL, 'N;'),
('TblSoldHogs.Soldlist', 0, NULL, NULL, 'N;'),
('TblSoldHogs.Update', 0, NULL, NULL, 'N;'),
('TblSoldHogs.UpdateAjax', 0, NULL, NULL, 'N;'),
('TblSoldHogs.View', 0, NULL, NULL, 'N;'),
('User.*', 1, NULL, NULL, 'N;'),
('User.Activation.*', 1, NULL, NULL, 'N;'),
('User.Activation.Activation', 0, NULL, NULL, 'N;'),
('User.ActivityDate', 0, NULL, NULL, 'N;'),
('User.Admin', 0, NULL, NULL, 'N;'),
('User.Admin.*', 1, NULL, NULL, 'N;'),
('User.Admin.Admin', 0, NULL, NULL, 'N;'),
('User.Admin.Create', 0, NULL, NULL, 'N;'),
('User.Admin.Delete', 0, NULL, NULL, 'N;'),
('User.Admin.Update', 0, NULL, NULL, 'N;'),
('User.Admin.View', 0, NULL, NULL, 'N;'),
('User.Create', 0, NULL, NULL, 'N;'),
('User.Default.*', 1, NULL, NULL, 'N;'),
('User.Default.Index', 0, NULL, NULL, 'N;'),
('User.Delete', 0, NULL, NULL, 'N;'),
('User.Index', 0, NULL, NULL, 'N;'),
('User.Login.*', 1, NULL, NULL, 'N;'),
('User.Login.Login', 0, NULL, NULL, 'N;'),
('User.Logout.*', 1, NULL, NULL, 'N;'),
('User.Logout.Logout', 0, NULL, NULL, 'N;'),
('User.Profile.*', 1, NULL, NULL, 'N;'),
('User.Profile.Changepassword', 0, NULL, NULL, 'N;'),
('User.Profile.Edit', 0, NULL, NULL, 'N;'),
('User.Profile.Profile', 0, NULL, NULL, 'N;'),
('User.ProfileField.*', 1, NULL, NULL, 'N;'),
('User.ProfileField.Admin', 0, NULL, NULL, 'N;'),
('User.ProfileField.Create', 0, NULL, NULL, 'N;'),
('User.ProfileField.Delete', 0, NULL, NULL, 'N;'),
('User.ProfileField.Update', 0, NULL, NULL, 'N;'),
('User.ProfileField.View', 0, NULL, NULL, 'N;'),
('User.Recovery.*', 1, NULL, NULL, 'N;'),
('User.Recovery.Recovery', 0, NULL, NULL, 'N;'),
('User.Registration.*', 1, NULL, NULL, 'N;'),
('User.Registration.Registration', 0, NULL, NULL, 'N;'),
('User.Test', 0, NULL, NULL, 'N;'),
('User.Update', 0, NULL, NULL, 'N;'),
('User.User.*', 1, NULL, NULL, 'N;'),
('User.User.Index', 0, NULL, NULL, 'N;'),
('User.User.View', 0, NULL, NULL, 'N;'),
('User.View', 0, NULL, NULL, 'N;'),
('UserCont.*', 1, NULL, NULL, 'N;'),
('UserCont.Admin', 0, NULL, NULL, 'N;'),
('UserCont.Create', 0, NULL, NULL, 'N;'),
('UserCont.Delete', 0, NULL, NULL, 'N;'),
('UserCont.Index', 0, NULL, NULL, 'N;'),
('UserCont.Update', 0, NULL, NULL, 'N;'),
('UserCont.View', 0, NULL, NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitemchild`
--

CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) COLLATE utf8_bin NOT NULL,
  `child` varchar(64) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `authitemchild`
--

INSERT INTO `authitemchild` (`parent`, `child`) VALUES
('Authenticated', 'HerdSetupController.Index'),
('Authenticated', 'MailingCode.*'),
('Authenticated', 'MailingCode.Index'),
('Authenticated', 'Site.Contact'),
('Authenticated', 'Site.Error'),
('Authenticated', 'Site.Index'),
('Authenticated', 'Site.Login'),
('Authenticated', 'Site.Logout'),
('Authenticated', 'SoldHogs.*'),
('Authenticated', 'SoldHogs.Index'),
('Authenticated', 'SowBoar.*'),
('Authenticated', 'SowBoar.Admin'),
('Guest', 'SowBoar.Admin'),
('Authenticated', 'SowBoar.AutocompleteBorn'),
('Authenticated', 'SowBoar.AutocompleteEarNotch'),
('Authenticated', 'SowBoar.AutocompleteName'),
('Authenticated', 'SowBoar.AutocompletePigs'),
('Authenticated', 'SowBoar.AutocompleteRegister'),
('Authenticated', 'SowBoar.Create'),
('Authenticated', 'SowBoar.Delete'),
('Authenticated', 'SowBoar.Index'),
('Authenticated', 'SowBoar.Pedigree'),
('Authenticated', 'SowBoar.Search'),
('Authenticated', 'SowBoar.Siredam'),
('Authenticated', 'SowBoar.Update'),
('Authenticated', 'SowBoar.View'),
('Authenticated', 'TblCustomerEntry.*'),
('Authenticated', 'TblCustomerEntry.Admin'),
('Authenticated', 'TblCustomerEntry.AutocompleteCompanyName'),
('Authenticated', 'TblCustomerEntry.AutocompleteFirstName'),
('Authenticated', 'TblCustomerEntry.AutocompleteLastName'),
('Authenticated', 'TblCustomerEntry.AutocompleteMailingCode'),
('Authenticated', 'TblCustomerEntry.AutocompletePhoneBusiness'),
('Authenticated', 'TblCustomerEntry.AutocompletePhoneCell'),
('Authenticated', 'TblCustomerEntry.AutocompletePhoneHome'),
('Authenticated', 'TblCustomerEntry.AutocompletePhoneOther1'),
('Authenticated', 'TblCustomerEntry.AutocompletePhoneOther2'),
('Authenticated', 'TblCustomerEntry.Create'),
('Authenticated', 'TblCustomerEntry.Delete'),
('Authenticated', 'TblCustomerEntry.Index'),
('Authenticated', 'TblCustomerEntry.Update'),
('Authenticated', 'TblCustomerEntry.View'),
('Authenticated', 'TblHerdSetup.Admin'),
('Authenticated', 'TblHerdSetup.Create'),
('Authenticated', 'TblHerdSetup.Delete'),
('Authenticated', 'TblHerdSetup.Index'),
('Authenticated', 'TblHerdSetup.Update'),
('Authenticated', 'TblHerdSetup.View'),
('Authenticated', 'TblMailingCode.*'),
('Authenticated', 'TblMailingCode.Admin'),
('Authenticated', 'TblMailingCode.Create'),
('Authenticated', 'TblMailingCode.Index'),
('Authenticated', 'TblMailingCode.Update'),
('Authenticated', 'TblMailingCode.View'),
('Authenticated', 'TblSoldHogs.Admin'),
('Authenticated', 'TblSoldHogs.AutocompleteDateSold'),
('Authenticated', 'TblSoldHogs.AutocompleteEarNotch'),
('Authenticated', 'TblSoldHogs.AutocompleteFirstName'),
('Authenticated', 'TblSoldHogs.AutocompleteId'),
('Authenticated', 'TblSoldHogs.AutocompleteInvoice'),
('Authenticated', 'TblSoldHogs.AutocompleteName'),
('Authenticated', 'TblSoldHogs.Create'),
('Authenticated', 'TblSoldHogs.Delete'),
('Authenticated', 'TblSoldHogs.Index'),
('Authenticated', 'TblSoldHogs.Rebuild'),
('Authenticated', 'TblSoldHogs.Soldlist'),
('Authenticated', 'TblSoldHogs.Update'),
('Authenticated', 'TblSoldHogs.UpdateAjax'),
('Authenticated', 'TblSoldHogs.View'),
('Authenticated', 'User.Activation.*'),
('Authenticated', 'User.Admin'),
('Authenticated', 'User.Admin.*'),
('Authenticated', 'User.Admin.View'),
('Authenticated', 'User.Create'),
('Authenticated', 'User.Default.*'),
('Authenticated', 'User.Login.*'),
('Authenticated', 'User.Login.Login'),
('Authenticated', 'User.Logout.Logout'),
('Authenticated', 'User.Profile.Changepassword'),
('Authenticated', 'User.Profile.Edit'),
('Authenticated', 'User.Profile.Profile'),
('Authenticated', 'User.ProfileField.Update'),
('Authenticated', 'User.ProfileField.View'),
('Authenticated', 'User.Update'),
('Authenticated', 'User.User.Index'),
('Authenticated', 'User.User.View'),
('Authenticated', 'User.View'),
('Authenticated', 'UserCont.*'),
('Authenticated', 'UserCont.Admin');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`user_id`, `lastname`, `firstname`) VALUES
(1, 'Admin', 'Administrator'),
(2, 'Demos', 'Demos'),
(3, 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `profiles_fields`
--

CREATE TABLE IF NOT EXISTS `profiles_fields` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` varchar(15) NOT NULL DEFAULT '0',
  `field_size_min` varchar(15) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(5000) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`widget`,`visible`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `profiles_fields`
--

INSERT INTO `profiles_fields` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`) VALUES
(1, 'lastname', 'Last Name', 'VARCHAR', '50', '3', 1, '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', 1, 3),
(2, 'firstname', 'First Name', 'VARCHAR', '50', '3', 1, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `rights`
--

CREATE TABLE IF NOT EXISTS `rights` (
  `itemname` varchar(64) COLLATE utf8_bin NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `sow_boar`
--

INSERT INTO `sow_boar` (`ear_notch`, `sow_boar_name`, `sow_boar_id`, `registeration_no`, `born`, `no_pigs`, `weight_21`, `sire_notch`, `dam_notch`, `bred_date`, `last_parity`, `sold_mmddyy`, `reason_sold`, `offspring_name`, `back_fat`, `loinneye`, `days`, `EBV`, `sire_initials`, `comments`, `date_modified`) VALUES
('3D AAA 2009 100-1', 'Jai First', 10, '', '11-06-2013', 0, 0, '1A aa 2009 1-1', '1A aa 2009 1-2', '', 0, '', '', '', NULL, NULL, 0, NULL, NULL, 'comments 1\r\ncomments 2\r\ncomments 3\r\n', '2013-09-14 09:30:40'),
('1A aa 2009 1-1', 'TEST JAIs', 11, '', '11-06-2013', 0, 0, '1A aa 2013 1-2', '1A aa 2009 1-2', '', 0, '123199', '', '', NULL, NULL, 0, NULL, NULL, 'comments', '2013-09-14 09:37:28'),
('1A aa 2009 1-2', 'TEST SKANDAN', 12, 'l', NULL, 1, 1, '1A aa 2009 1-1', '1A aa 2007 7-7', 'l', 1, 'l', 'l', 'l', 1, 1, 1, 1, NULL, NULL, '2013-09-14 09:37:49'),
('1A aa 2009 1-3', 'ldh 9 1-3', 13, '', '11-14-2013', 0, 0, '', '', '', 0, '', '', '', NULL, NULL, 0, NULL, NULL, '', '2013-09-14 13:22:51'),
('1A aa 2013 1-2', 'ldh 03 1-2', 15, '', NULL, 0, 0, '1A aa 1999 103-2', '1A aa 2002 2-2', '', 0, '', '', '', NULL, NULL, 0, NULL, NULL, NULL, '2013-09-14 13:37:29'),
('1A aa 1998 1-2', 'ldh 98 1-2', 16, '', NULL, 0, 0, '', '', '', 0, '', '', '', NULL, NULL, 0, NULL, NULL, NULL, '2013-09-14 13:38:33'),
('1A aa 1999 103-2', 'Jai 98 103-1 JAIS', 17, '', NULL, 0, 0, '1A aa 2007 7-8', '1A aa 2005 5-5', '', 0, '', '', '', NULL, NULL, 0, NULL, NULL, NULL, '2013-09-14 15:40:51'),
('1A aa 2003 2-2', 'ldh 03 2-2', 18, '', NULL, 0, 0, '1A aa ', '1A aa ', '', 0, '', '', '', NULL, NULL, 0, NULL, NULL, NULL, '2013-09-15 14:07:38'),
('1A aa 2002 2-2', 'ldh 02 2-2', 19, '', NULL, 0, 0, '', '', '', 0, '', '', '', NULL, NULL, 0, NULL, NULL, NULL, '2013-09-15 14:11:56'),
('1A aa 1995 5-5', 'ldh 95 5-5', 20, '', NULL, 0, 0, '', '', '', 0, '', '', '', NULL, NULL, 0, NULL, NULL, NULL, '2013-09-15 14:14:22'),
('1A aa 1985 5-5', 'ldh 85 5-5', 21, '', NULL, 0, 0, '', '', '', 0, '', '', '', NULL, NULL, 0, NULL, NULL, NULL, '2013-09-15 14:15:26'),
('1A aa 2012 2-2', 'ldh 2 2-2', 22, '', NULL, 0, 0, '1A aa 95 5-5', '1A aa ', '', 0, '2013-11-15', '', '', NULL, NULL, 0, NULL, NULL, NULL, '2013-09-15 14:16:31'),
('1A aa 2013 3-3', 'ldh 3 3-3', 23, '', NULL, 0, 0, '', '', '', 0, '2184-10-01', '', '', NULL, NULL, 0, NULL, NULL, NULL, '2013-09-15 14:20:04'),
('1A aa 2001 711-1', 'jai 15 Sep 1A aa 01 711-1', 24, '', NULL, 0, 0, '', '', '', 0, '', '', '', NULL, NULL, 0, NULL, NULL, NULL, '2013-09-15 16:05:38'),
('1A aa 2007 7-7', 'ldh 7 7-7', 25, '', NULL, 0, 0, '1A aa 2005 5-5', '3D AAA 2009 100-1', '', 0, '', '', '', NULL, NULL, 0, NULL, NULL, NULL, '2013-09-16 13:02:42'),
('1A aa 2007 7-8', 'ldh 7 7-8', 26, '', NULL, 0, 0, '', '', '', 0, '', '', '', NULL, NULL, 0, NULL, NULL, NULL, '2013-09-16 13:04:11'),
('1A aa 2006 6-6', 'ldh 6 6-6', 27, '', NULL, 0, 0, '', '', '', 0, '', '', '', NULL, NULL, 0, NULL, NULL, NULL, '2013-09-16 16:54:15'),
('1A aa 2005 5-5', '5 5-5', 28, '', NULL, 0, 0, '', '', '', 0, '2013-11-27', '', '', NULL, NULL, 0, NULL, NULL, NULL, '2013-09-16 16:55:57'),
('1A aa 1991 201-3', 'aaa', 29, '', NULL, 0, 0, '', '', '', 0, '', '', '', NULL, NULL, 0, NULL, NULL, '', '2013-11-29 13:00:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_content`
--

CREATE TABLE IF NOT EXISTS `tbl_content` (
  `content_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8_bin NOT NULL,
  `page` varchar(255) COLLATE utf8_bin NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=25 ;

--
-- Dumping data for table `tbl_content`
--

INSERT INTO `tbl_content` (`content_id`, `content`, `page`, `date_modified`) VALUES
(24, '<div class="header" style="margin: 0px; padding: 0px; border: 0px; font-family: Helvetica, Arial, sans-serif; font-size: 14px; line-height: 18px; vertical-align: baseline; background-color: #edf2f2;">\r\n<div class="container" style="margin: 0px auto; padding: 0px; border: 0px; font-family: inherit; font-size: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; line-height: inherit; vertical-align: baseline; width: 950px;">\r\n<div class="header-content" style="margin: 0px; padding: 48px 0px 24px; border-width: 0px 0px 1px; border-bottom-style: solid; border-bottom-color: #000000; font-family: inherit; font-size: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; line-height: inherit; vertical-align: baseline; position: relative; background-image: url(''http://easymedmobile.com/wp-content/uploads/2012/07/Phones.png''); background-position: 480px 10px; background-repeat: no-repeat no-repeat;">\r\n<h1 style="margin: 0px 0px 9px; padding: 0px; border: 0px; font-family: inherit; font-size: 24px; font-style: inherit; font-variant: inherit; font-weight: normal; line-height: 30px; vertical-align: baseline; color: #ed1d24; max-width: 450px;">Hospitals, clinics, private practices</h1>\r\n<h2 style="margin: 0px 0px 7px; padding: 0px; border: 0px; font-family: inherit; font-size: 40px; font-style: inherit; font-variant: inherit; font-weight: inherit; line-height: 47px; vertical-align: baseline; max-width: 450px;">Dramatically improve patient care</h2>\r\n<p style="margin: 0px 0px 12px; padding: 0px; border: 0px; font-family: inherit; font-size: 17px; font-style: inherit; font-variant: inherit; font-weight: inherit; line-height: 26px; vertical-align: baseline; max-width: 450px;">Reduce your costs starting in the first month.</p>\r\n<p style="margin: 0px 0px 12px; padding: 0px; border: 0px; font-family: inherit; font-size: 17px; font-style: inherit; font-variant: inherit; font-weight: inherit; line-height: 26px; vertical-align: baseline; max-width: 450px;">EasyMed answers today&rsquo;s most pressing needs in healthcare: better service with lower costs. Easy to implement &ndash; we&rsquo;ll do it for you.</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="container" style="margin: 0px auto; padding: 0px; border: 0px; font-family: Helvetica, Arial, sans-serif; font-size: 14px; line-height: 18px; vertical-align: baseline; width: 950px;">&nbsp;</div>', 'index', '2013-11-26 12:10:22');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='aaa' AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_customer_entry`
--

INSERT INTO `tbl_customer_entry` (`customer_entry_id`, `company_name`, `first_name`, `last_name`, `address1`, `address2`, `city`, `zip`, `phone_home`, `phone_business`, `phone_cell`, `phone_other1`, `phone_other2`, `state`, `country`, `contact`, `county`, `notes`, `cc_brand`, `cc_number`, `cc_expiration`, `cc_name`, `ship_company_name`, `ship_name`, `ship_address1`, `ship_address2`, `ship_city`, `ship_state`, `ship_country`, `ship_zip`, `ship_contact`, `ship_area`, `ship_phone`, `att_sale`, `mailing_code`, `last_invoice`, `last_letter_sent`, `entry_date`, `herdmark`, `total_sows`, `total_boars`, `facility`, `sows`, `boars`, `frequency`, `system`, `feeder`, `finish`, `rep_glits`, `notes1`, `notes2`, `notes3`, `notes4`, `modified_date`) VALUES
(2, 'Test Jai', 'jai ..', 'sankar', 'chennai', 'Chrompet', 'chennai', 600044, '828 28292929', '90101039393', '888282828', '9199191919', '9999999999 fax', 'TN', 'India', 'jai', 'india', 'dlsfjsdf\r\nsdfl''sdf\r\nsdf;\r\nsdf\r\ndf\r\nds\r\nfsd\r\nf\r\nds\r\nf\r\ndsf', 'MASTER', 2147483647, '1727', 'Jaisankar', 'Test Jai', 'jai sankar', 'chennai', 'Chrompet', 'chennai', 'TN', 'India', 600044, 'jai', 'india', '828 28292929', '2013-06-26 00:00:00', 'b,', 11, '2013-06-26 00:00:00', '2013-06-26 00:00:00', 'sasadf', 100, 200, 'fdsf', 500, 300, '1', 'System', 'Feeder', 'Finishe', 'Rep222222222222222222222222222222222222222222222222222222222', 'ndfnsda\r\ndsafksd\r\ndsafksdf\r\nksdfk', 'dlfsdf\r\nsdflsdfl\r\n\r\n\r\n\r\ndsfsdf\r\nd\r\nf', 'dfdsf', 'dfdsf', '2013-06-05 09:43:18'),
(3, 'Lloyd''s on Portage                                                ', 'Lloyd', 'Harless', '12099 Far Portage Dr.', 'test', 'Park Rapids', 56470, '218-732-6929', '218.732.1962', '218.555.1212', 'x', 'xsx', 'MN', 'USA', 'Lloyd', 'Hubbard', 'notesx\r\naaaaaaaaaaaaaaaa\r\nbbbbbbbbbbbb\r\ncccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc', 'MC', 2147483647, '11.22', 'Test', 'x', 'xx', 'x', 'x', 'x', 'x', 'x', 12345, 'x', 'x', 'x', '2007-06-08 00:00:00', 'H1XJM', 1234567, '2013-06-06 00:00:00', '2013-06-06 00:00:00', 'xxx', 5, 5, 'y', 5, 5, 'x', 'x', 'x', 'y', 'x', 'nx', 'n', 'n', 'n', '2013-06-07 01:10:16'),
(4, 'Test Jai', 'jai', 'sankar(4)', 'chennai', 'Chrompet', 'chennai', 600044, '828 28292929', '90101039393', '888282828', '9199191919', '9999999999', 'TN', 'India', 'jai', 'india', 'dlsfjsdf\nsdfl''sdf\nsdf;\nsdf\ndf\nds\nfsd\nf\nds\nf\ndsf', 'MASTER', 2147483647, '1727', 'Jaisankar', 'Jai', 'jai', '7B ', 'ldfkld', 'chennai', 'TN', 'India', 522200, 'Jai', 'India', '882823828', '2013-06-04 00:00:00', 'C', 11, '2013-06-04 00:00:00', '2013-06-04 00:00:00', 'sasadf', 100, 200, 'fdsf', 500, 300, '1', 'System', 'Feeder', 'Finishe', 'Rep', 'ndfnsda\ndsafksd\ndsafksdf\nksdfk', 'dlfsdf\nsdflsdfl\n\n\n\ndsfsdf\nd\nf', 'dfdsf', 'dfdsf', '2013-06-05 20:13:18'),
(5, 'Navabrind IT solutions', 'Venkatest', 'Nagarjana', 'Chennai', 'India', 'Bangaloer', 919191, '111111', '222222', '777777', '999999', '100000', 'karnatka', 'India', 'Venk', 'India', 'Jai', 'VISA', 2147483647, '1122', 'kai', 'sads', 'Jai', 'jai', 'j', 'Chennai', 'TN', 'India', 3343434, 'India', 'aaaa', '343434', '2013-06-05 00:00:00', '1212', 43434, '2013-06-05 00:00:00', '2013-06-04 00:00:00', '', 11, 11, 'dfdf', 111, 222, '2323', 'as', 'as', 's', 's', 'sankar dssds', '2', '2', '2', '2013-06-06 22:23:10'),
(6, 'test', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, '', '', '', '0000-00-00 00:00:00', '', 0, '2013-11-30 00:00:00', '0000-00-00 00:00:00', '', 0, 0, '', 0, 0, '', '', '', '', '', '', '', '', '', '2013-11-29 12:34:16'),
(7, 'test2', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, '', '', '', '0000-00-00 00:00:00', '', 0, '2013-11-21 00:00:00', '0000-00-00 00:00:00', '', 0, 0, '', 0, 0, '', '', '', '', '', '', '', '', '', '2013-11-29 12:34:30');

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
(3, '1A', 'Jai', 'Jai''s York Farm', 'Chennai 1', 'Chennai 2', 'Chennai', 'TN', 600044, '9841798875', 1111111, 'aa', 'M', 'D', 'N', '#', '#', 'T', 'N', 21, 114, 'N', 'N', 11, 22, 'S', 11, 33, 'A', 'S', 'S', 'N', 'x', '9841798875', '2013-08-23 10:55:24'),
(4, '3D', 'Breed 1', 'Farm 1', 'Address 1x', '', 'Delhi', 'QA', 2232, '20202002020', 99, 'A', 'C', 'A', 'N', '#', '#', 'T', 'N', 11, 33, 'Y', 'N', 11, 22, '', 22, 11, '', 'L', 'S', 'N', '', '', '2013-08-24 17:23:29'),
(5, '4E', 'TblHerdSetup[breeder_name]', 'TblHerdSetup[farm_name]', 'TblHerdSetup[address1]', 'TblHerdSetup[address2]', 'TblHerdSetup[city]', 'TblHerdSetup[state]', 90210, 'TblHerdSetup[phone]', 1111, 'TblHe', 'C', 'T', 'Y', 'N', 'N', 'H', 'Q', 11, 33, 'Y', 'Y', 99, 66, 'T', 87, 98, 'T', 'S', 'T', 'Y', 'TblHerdSet', 'TblHerdSetup[fax]', '2013-08-25 03:52:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mailing_code`
--

CREATE TABLE IF NOT EXISTS `tbl_mailing_code` (
  `mailing_code_id` int(11) NOT NULL AUTO_INCREMENT,
  `mailing_code_label` varchar(10) NOT NULL,
  `mailing_code_desc` varchar(150) NOT NULL,
  PRIMARY KEY (`mailing_code_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `tbl_mailing_code`
--

INSERT INTO `tbl_mailing_code` (`mailing_code_id`, `mailing_code_label`, `mailing_code_desc`) VALUES
(20, 'H', 'Hampshire breeder'),
(32, 'Y', 'Yorkshire breeder');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sold_hogs`
--

CREATE TABLE IF NOT EXISTS `tbl_sold_hogs` (
  `tbl_sold_hogs_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_id` int(11) NOT NULL,
  `hog_ear_notch` varchar(20) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `date_sold` date NOT NULL,
  `sold_price` int(10) NOT NULL,
  `sale_type` varchar(1) NOT NULL,
  `invoice_number` int(6) NOT NULL,
  `app_xfer` varchar(1) NOT NULL,
  `comments` text,
  `reason_sold` text,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ear_notch_id` int(11) DEFAULT NULL,
  `is_rebuild` tinyint(4) NOT NULL,
  PRIMARY KEY (`tbl_sold_hogs_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_sold_hogs`
--

INSERT INTO `tbl_sold_hogs` (`tbl_sold_hogs_id`, `cust_id`, `hog_ear_notch`, `customer_name`, `date_sold`, `sold_price`, `sale_type`, `invoice_number`, `app_xfer`, `comments`, `reason_sold`, `date_modified`, `ear_notch_id`, `is_rebuild`) VALUES
(1, 3, '1A cdo 9f12-1', 'Lloyd Harless', '2013-11-05', 123, 'S', 1234, 'N', 'test of line 1\r\nthis is a test of line 2\r\nline 3 is even longer to see what happens\r\nthis is line 4 which is medium length\r\nline 5 will be medium length as well', 'now we take the lines for reason sold to longer so this is line 1\r\nline 2 is short\r\nthis is line 3\r\nline 4 is a lot longer than line 3 but not as long as line 1 \r\nline 5', '2013-11-07 02:22:28', NULL, 1),
(2, 2, '1A cdo 6 1.2', 'jai sankar', '2013-09-11', 333, 'f', 0, 'Y', '', '', '2013-11-07 02:25:44', NULL, 1),
(3, 5, '1A cdo 5 1-2', 'Venkatest Nagarjana', '2013-11-19', 444, 'f', 0, 'Y', '', '', '2013-11-07 02:27:14', NULL, 1),
(4, 2, '1A aa 5 6-7', 'jai sankar', '2013-11-13', 123, '', 0, 'Y', '', '', '2013-11-07 14:12:29', NULL, 1),
(5, 2, '1A aa 1 2-3', 'jai sankar', '2013-09-11', 555, '', 0, 'Y', '', '', '2013-11-07 15:46:13', NULL, 1),
(6, 3, '1A aa 1 1-1', 'Lloyd Harless', '2013-09-10', 123, '', 0, 'Y', '', '', '2013-11-08 14:27:48', NULL, 1),
(7, 3, '1A aa 2 2-2', 'Lloyd Harless', '2013-09-11', 123, '', 0, 'Y', '', '', '2013-11-08 14:30:53', 22, 1),
(8, 3, '1A aa 2 2-2', 'Lloyd Harless', '2013-09-11', 12345, '', 0, 'Y', '', '', '2013-11-08 21:43:08', 22, 1),
(9, 2, '1A aa 3 3-3', 'jai sankar', '2013-09-12', 555, '', 0, 'Y', '', '', '2013-11-11 13:53:10', 23, 1),
(10, 3, '1A aa 4 4-4', 'Lloyd Harless', '2013-11-16', 4444, 'p', 0, 'Y', '', '', '2013-11-11 22:05:01', NULL, 1),
(11, 3, '1A aa 5 5-5', 'Lloyd Harless', '2013-09-11', 555, '', 0, 'Y', '', '', '2013-11-12 14:45:11', 28, 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastvisit_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activkey`, `create_at`, `lastvisit_at`, `superuser`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'webmaster@example.com', '9a24eff8c15a6a141ece27eb6947da0f', '2013-11-25 11:23:07', '2013-11-29 02:54:15', 1, 1),
(2, 'demo', 'e368b9938746fa090d6afd3628355133', 'demo@example.com', 'ad18eafdf2638cc39495d806f302ce57', '2013-11-25 11:23:07', '2013-11-29 02:57:38', 0, 1),
(3, 'test', '098f6bcd4621d373cade4e832627b4f6', 'jaisankarn@gmail.com', 'ddf5854d9e74a8053a9b11f1ba53a15a', '2013-11-27 07:16:57', '2013-11-27 07:17:45', 0, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authassignment`
--
ALTER TABLE `authassignment`
  ADD CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `user_profile_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rights`
--
ALTER TABLE `rights`
  ADD CONSTRAINT `rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
