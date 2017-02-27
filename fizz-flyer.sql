-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 27, 2017 at 07:24 PM
-- Server version: 5.5.52-0ubuntu0.14.04.1
-- PHP Version: 5.6.23-1+deprecated+dontuse+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fizzflyer`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `contactDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE IF NOT EXISTS `details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `imageName` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `startPlace` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `startDate` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `endPlace` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `endDate` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `peopleRegistered` int(11) NOT NULL,
  `postDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `title`, `imageName`, `description`, `startPlace`, `startDate`, `endPlace`, `endDate`, `price`, `peopleRegistered`, `postDate`) VALUES
(3, 'Pondi Trips', 'vespaImage.png', 'We are planing to give 3 day 4 night plan with Air Tranfer and Free WIFI zone that can help you to fuck yourself in your fucking asshole... you sucker', 'Chennai', '2016-08-18 ', 'Pondi', '', '999', 500, '2016-09-14 02:04:55'),
(6, 'Indore Trip', 'h1474719194288041650.jpg', '&lt;p&gt;That''s gonna be so awesome.&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;day 1 night out&lt;/li&gt;\r\n&lt;/ul&gt;', 'Chennai', '2016-09-25', 'Indore', '2016-09-29', '2813', 23, '2016-09-24 12:13:14'),
(7, 'Test ', 'h1486399326418508831.png', '&lt;p&gt;Test&amp;nbsp;&lt;/p&gt;', 'test', '2017-02-16', 'chennai', '2017-02-23', '3000', 500, '2017-02-06 16:44:34');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `message` text NOT NULL,
  `feedbackDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `message`, `feedbackDate`) VALUES
(13, 'Sugam Malviya', 'sugam0030@gmail.com', 'Awesome Website', '2016-09-24 12:55:12'),
(14, 'Sugam Malviya', 'sugam@retailspace.io', 'Test 5/2/17', '2017-02-06 16:40:52');

-- --------------------------------------------------------

--
-- Table structure for table `registerdTrips`
--

CREATE TABLE IF NOT EXISTS `registerdTrips` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tripName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `registerdTrips`
--

INSERT INTO `registerdTrips` (`id`, `tripName`, `phone`, `userId`) VALUES
(2, 'pondi trips', '09003753661', 36),
(3, 'GB ROAD DELHI', '100', 39),
(4, 'pondi trip', '5795599558', 0),
(5, 'ooty trip', '9559673451', 0),
(6, 'Retail ', '9003753661', 41),
(7, 'Ooty trip ', '9003753661', 41),
(8, 'test', '9003753661', 41);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPass` varchar(100) NOT NULL,
  `userStatus` enum('Y','N') NOT NULL DEFAULT 'N',
  `tokenCode` varchar(100) NOT NULL,
  `profilePicture` tinytext NOT NULL,
  `UserSignUpDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `userEmail` (`userEmail`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userID`, `userName`, `userEmail`, `userPass`, `userStatus`, `tokenCode`, `profilePicture`, `UserSignUpDate`) VALUES
(37, 'Pratap', 'pratapraj056@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Y', '7ffafb7ec0fd0b4eb099e0f02aa70300', '', '2016-09-14 02:06:28'),
(36, 'Sugam', 'myselfsugam@gmail.com', '6c2fdd3c2d6cafebad6675c52e54b8a7', 'Y', '63db714dada9232dc5644781fe6156d1', '', '2016-09-14 01:58:13'),
(38, 'Nishant', 'ns71996@gmail.com', '4597f63b80e87d11f05353e6acd4f8f1', 'Y', 'e6bd83a106661567af5afa35c65dd51f', '', '2016-09-14 08:31:17'),
(39, 'akshat', 'akshat.akshat6@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Y', 'd7c122b1a99b559e683c4a50d15dcb2a', '', '2016-09-14 09:27:12'),
(40, 'dipanshu', 'dipanshugupta15@gmail.com', '38db32233fb682a1531370bc069c67a6', 'Y', '5282265af77aa9464ff8e8a820b598e8', '', '2016-09-14 10:02:49'),
(41, 'Sugam', 'sugam@retailspace.io', '6c2fdd3c2d6cafebad6675c52e54b8a7', 'Y', 'd24f78151fdf7c85a52eff148b848436', '', '2017-02-06 16:30:02');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
