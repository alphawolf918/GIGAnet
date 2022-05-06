-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2015 at 03:34 PM
-- Server version: 5.5.44
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `giganet`
--
DROP DATABASE `giganet`;
CREATE DATABASE IF NOT EXISTS `giganet` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `giganet`;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--
-- Creation: Jul 17, 2015 at 06:34 PM
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_name` varchar(200) NOT NULL,
  `LOGON_USER` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `computer_name` varchar(6) NOT NULL,
  `email` varchar(100) NOT NULL,
  `birthday` varchar(40) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `ip` varchar(25) NOT NULL,
  `online` tinyint(1) NOT NULL,
  `esign` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `employee_name`, `LOGON_USER`, `role_id`, `department_id`, `computer_name`, `email`, `birthday`, `phone`, `ip`, `online`, `esign`) VALUES
(1, 'Administrator', 'administrator', 1, 1, '', '', '', '', '', 1, ''),
(2, 'Paul Shannon', 'pshannon', 0, 0, '1249A', 'paul.shannon@gigainc.com', '1990-09-18', '4782577398', '127.0.0.1', 1, ''),
(3, 'Kevin Enckler', 'kenckler', 0, 0, '', 'kevin.enckler@gigainc.com', '', '', '127.0.0.1', 0, ''),
(4, 'Sue Potts', 'spotts', 0, 0, '', 'sue.potts@gigainc.com', '', '', '127.0.0.1', 0, ''),
(5, 'Walt Miller', 'wmiller', 0, 0, '', 'walt.miller@gigainc.com', '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--
-- Creation: Jul 17, 2015 at 06:22 PM
--

DROP TABLE IF EXISTS `announcements`;
CREATE TABLE IF NOT EXISTS `announcements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `about` text NOT NULL,
  `announce_date` varchar(200) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--
-- Creation: Jul 17, 2015 at 08:40 PM
--

DROP TABLE IF EXISTS `calendar`;
CREATE TABLE IF NOT EXISTS `calendar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `about` text NOT NULL,
  `start_on` date NOT NULL,
  `end_on` date NOT NULL,
  `LOGON_USER` varchar(50) NOT NULL,
  `event_type` enum('event','absence') NOT NULL DEFAULT 'event',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`id`, `name`, `about`, `start_on`, `end_on`, `LOGON_USER`, `event_type`) VALUES
(16, 'Sue Out', 'cbsfhjs ', '2015-07-31', '2015-08-01', 'administrator', 'absence');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--
-- Creation: Jul 27, 2015 at 02:07 PM
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `about` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--
-- Creation: Jul 27, 2015 at 01:56 PM
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `about` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
