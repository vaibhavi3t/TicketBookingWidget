-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 22, 2015 at 02:18 PM
-- Server version: 5.0.41
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tktbooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE IF NOT EXISTS `seats` (
  `rowId` varchar(1) NOT NULL,
  `columnId` int(11) NOT NULL,
  `isbooked` int(11) default NULL,
  PRIMARY KEY  (`rowId`,`columnId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`rowId`, `columnId`, `isbooked`) VALUES
('A', 1, 0),
('A', 2, 0),
('A', 3, 0),
('A', 4, 0),
('A', 5, 0),
('A', 6, 0),
('A', 7, 0),
('A', 8, 0),
('A', 9, 0),
('A', 10, 0),
('A', 11, 0),
('A', 12, 0),
('B', 1, 0),
('B', 2, 0),
('B', 3, 0),
('B', 4, 0),
('B', 5, 0),
('B', 6, 0),
('B', 7, 0),
('B', 8, 0),
('B', 9, 0),
('B', 10, 0),
('B', 11, 0),
('B', 12, 0),
('C', 1, 0),
('C', 2, 0),
('C', 3, 0),
('C', 4, 0),
('C', 5, 0),
('C', 6, 0),
('C', 7, 0),
('C', 8, 0),
('C', 9, 0),
('C', 10, 0),
('C', 11, 0),
('C', 12, 0),
('D', 1, 0),
('D', 2, 0),
('D', 3, 0),
('D', 4, 0),
('D', 5, 0),
('D', 6, 0),
('D', 7, 0),
('D', 8, 0),
('D', 9, 0),
('D', 10, 0),
('D', 11, 0),
('D', 12, 0),
('E', 1, 0),
('E', 2, 0),
('E', 3, 0),
('E', 4, 0),
('E', 5, 0),
('E', 6, 0),
('E', 7, 0),
('E', 8, 0),
('E', 9, 0),
('E', 10, 0),
('E', 11, 0),
('E', 12, 0),
('F', 1, 0),
('F', 2, 0),
('F', 3, 0),
('F', 4, 0),
('F', 5, 0),
('F', 6, 0),
('F', 7, 0),
('F', 8, 0),
('F', 9, 0),
('F', 10, 0),
('F', 11, 0),
('F', 12, 0),
('G', 1, 0),
('G', 2, 0),
('G', 3, 0),
('G', 4, 0),
('G', 5, 0),
('G', 6, 0),
('G', 7, 0),
('G', 8, 0),
('G', 9, 0),
('G', 10, 0),
('G', 11, 0),
('G', 12, 0),
('H', 1, 0),
('H', 2, 0),
('H', 3, 0),
('H', 4, 0),
('H', 5, 0),
('H', 6, 0),
('H', 7, 0),
('H', 8, 0),
('H', 9, 0),
('H', 10, 0),
('H', 11, 0),
('H', 12, 0),
('I', 1, 0),
('I', 2, 0),
('I', 3, 0),
('I', 4, 0),
('I', 5, 0),
('I', 6, 0),
('I', 7, 0),
('I', 8, 0),
('I', 9, 0),
('I', 10, 0),
('I', 11, 0),
('I', 12, 0),
('J', 1, 0),
('J', 2, 0),
('J', 3, 0),
('J', 4, 0),
('J', 5, 0),
('J', 6, 0),
('J', 7, 0),
('J', 8, 0),
('J', 9, 0),
('J', 10, 0),
('J', 11, 0),
('J', 12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(10) unsigned NOT NULL auto_increment,
  `userName` varchar(255) default NULL,
  `ptickets` varchar(255) default NULL,
  PRIMARY KEY  (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
