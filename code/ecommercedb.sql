-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 10, 2014 at 08:24 AM
-- Server version: 5.5.36-cll-lve
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

USE `ecommerce`
DROP TABLE IF EXISTS `shopping_cart`;
DROP TABLE IF EXISTS `store_inventory`;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE IF NOT EXISTS `shopping_cart` (
  `key` int(11) NOT NULL AUTO_INCREMENT,
  `cartid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `category` varchar(25) NOT NULL,
  `title` varchar(80) NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`key`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `store_inventory`
--

CREATE TABLE IF NOT EXISTS `store_inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(25) NOT NULL,
  `title` varchar(80) DEFAULT NULL,
  `price` float(8,2) DEFAULT NULL,
  `description` text,
  `qty` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `store_inventory`
--

INSERT INTO `store_inventory` (`id`, `category`, `title`, `price`, `description`, `qty`) VALUES
(3, 'Video', 'Getting Started with the iPad', 100.00, 'Introduction for recent adopters', 3),
(4, 'Video', 'Math Enrichment', 100.00, 'Apps for enhancing Math instruction', 4),
(5, 'Video', 'Language Arts Enrichment', 100.00, 'Apps for enhancing Language Arts instruction', 3),
(6, 'Document', 'Getting Started with the iPad', 50.00, 'Introduction for recent adopters', 0),
(7, 'Document', 'Math Enrichment', 50.00, 'Apps for enhancing Math instruction', 0),
(8, 'Document', 'Language Arts Enrichment', 50.00, 'Apps for enhancing Language Arts instruction', 3),
(9, 'Class', 'Getting Started with the iPad', 250.00, 'Introduction for recent adopters', 4),
(10, 'Class', 'Math Enrichment', 250.00, 'Apps for enhancing Math instruction', 0),
(11, 'Class', 'Language Arts Enrichment', 250.00, 'Apps for enhancing Language Arts instruction', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
