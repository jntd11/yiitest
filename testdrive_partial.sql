-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 29, 2013 at 01:07 PM
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
