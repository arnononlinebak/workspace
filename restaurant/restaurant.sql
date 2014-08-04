-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 08, 2012 at 02:23 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `post_ID` int(11) NOT NULL,
  `owner` int(11) NOT NULL,
  `detail` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=359 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`ID`, `post_ID`, `owner`, `detail`) VALUES
(348, 32, 0, 'à¸£à¸±à¸ à¸§à¸´'),
(349, 32, 0, 'à¸ˆà¸¸à¹Šà¸Ÿà¹†'),
(350, 32, 0, 'à¸¡à¹Šà¸§à¸Ÿà¹†'),
(351, 33, 0, 'à¹„à¸¡à¹ˆ à¸£à¸¹à¹‰ à¸ˆà¸° à¹‚à¸žà¸ª à¹„à¸£'),
(352, 33, 0, 'à¸„à¸´ à¹„à¸¡à¹ˆ à¸­à¸­à¸ à¸¡à¸° à¸£à¸¹à¹‰ à¸ˆà¸° à¹‚à¸žà¸ª à¸£à¸±à¸¢'),
(353, 35, 0, 'à¹à¸¥à¹‰à¸§ à¹„à¸› à¹„à¸«à¸™ à¸­à¸°'),
(354, 35, 0, 'à¸­à¸°à¹„à¸£ à¸­à¸°'),
(355, 35, 0, 'à¹„à¸£ à¸‚à¸­à¸‡ à¸¡à¸´à¸‡ à¸§à¸°'),
(356, 36, 0, 'à¸šà¸­à¸ à¸à¸£à¸¸ à¹„à¸¡'),
(357, 36, 1, 'dfdkfl;dkf;l'),
(358, 37, 1, 'à¹€à¸Šà¸µà¸¢à¸‡à¹ƒà¸«à¸¡à¹ˆà¸«à¸™à¸²à¸§à¸à¸§à¹ˆà¸²');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(30) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`ID`, `username`, `password`, `email`, `image`) VALUES
(1, 'siamdream', 'e10adc3949ba59abbe56e057f20f883e', 'siamdream@gmail.com', ''),
(2, '', 'd41d8cd98f00b204e9800998ecf8427e', '', ''),
(3, 'ss', '47bce5c74f589f4867dbd57e9ca9f808', 'aaa', ''),
(4, 'aa', '4124bc0a9335c27f086f24ba207a4912', 'aa', ''),
(5, 'aa', '4124bc0a9335c27f086f24ba207a4912', 'aa', ''),
(6, 'aa', '4124bc0a9335c27f086f24ba207a4912', 'aa', ''),
(7, 'siamdream@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'siamdream@gmail.com', ''),
(8, '', 'd41d8cd98f00b204e9800998ecf8427e', '', ''),
(9, 'niwat', '81dc9bdb52d04dc20036dbd8313ed055', 'siamdream@gmail.com', ''),
(10, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `owner` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `detail` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`ID`, `owner`, `subject`, `detail`) VALUES
(32, 0, '', 'Love Vi'),
(33, 0, '', 'aaaa'),
(34, 0, '', 'dddddd'),
(35, 0, '', 'aadfefef'),
(36, 0, '', '@Chonburi'),
(37, 1, '', 'aefefsef');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
