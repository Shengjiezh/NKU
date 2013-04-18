-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 02, 2013 at 08:20 PM
-- Server version: 5.5.29
-- PHP Version: 5.3.10-1ubuntu3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nk_stl`
--

DELIMITER $$
--
-- Procedures
--
$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `salt` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `info_id` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '0社团1依托单位2社团联3校团委',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `activity_benbu`
--

CREATE TABLE IF NOT EXISTS `activity_benbu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `host_high` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `host_low` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `chief` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `chief_phone` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `money_from` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `scale` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `needs` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `intro` text COLLATE utf8_unicode_ci NOT NULL,
  `hengfu` text COLLATE utf8_unicode_ci NOT NULL,
  `haibao` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `activity_large`
--

CREATE TABLE IF NOT EXISTS `activity_large` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `host_high` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `host_low` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `chief` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `chief_phone` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `money_from` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `scale` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `needs` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `intro` text COLLATE utf8_unicode_ci NOT NULL,
  `hengfu` text COLLATE utf8_unicode_ci NOT NULL,
  `haibao` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `activity_xiaoqu`
--

CREATE TABLE IF NOT EXISTS `activity_xiaoqu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `host_high` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `host_low` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `chief` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `chief_phone` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `money_from` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `scale` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `needs` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `intro` text COLLATE utf8_unicode_ci NOT NULL,
  `hengfu` text COLLATE utf8_unicode_ci NOT NULL,
  `haibao` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `salt` char(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE IF NOT EXISTS `apply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `opinion_college` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `opinion_xtw` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `opinion_stl` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `college_info`
--

CREATE TABLE IF NOT EXISTS `college_info` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `league_info`
--

CREATE TABLE IF NOT EXISTS `league_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `college_id` int(11) NOT NULL,
  `creatime` date NOT NULL,
  `register_time` date NOT NULL,
  `register_man` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `summary` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `plan` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `introduction` text COLLATE utf8_unicode_ci NOT NULL,
  `purpose` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `json_boss` text COLLATE utf8_unicode_ci NOT NULL,
  `json_tongxunyuan` text COLLATE utf8_unicode_ci NOT NULL,
  `json_tuanzhibu` text COLLATE utf8_unicode_ci NOT NULL,
  `json_teacher` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `ctime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `img` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `plus1` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
