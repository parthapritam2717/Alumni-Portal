-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2014 at 08:07 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `alumini`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pass` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `pass`) VALUES
(1, 'sudo', 'sudo');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `blog` varchar(10000) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `name`, `branch`, `blog`) VALUES
(22, 'Guest', 'CSE', 'hi'),
(23, 'Guest', 'CSE', 'hello'),
(24, 'Guest', 'CSE', 'hiya'),
(25, 'Guest', 'CSE', 'yup\n');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comment`
--

CREATE TABLE IF NOT EXISTS `blog_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `comment` varchar(10000) NOT NULL,
  `name` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `blog_comment`
--

INSERT INTO `blog_comment` (`id`, `parent_id`, `comment`, `name`, `branch`) VALUES
(4, 25, 'hhhhhiiiiiii', 'User', 'Cse'),
(5, 24, 'sooooooooooooooooo', 'User', 'Cse'),
(6, 25, 'so', 'User', 'Cse'),
(7, 25, 'yeah', 'User', 'Cse');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `year of passing` text NOT NULL,
  `current status` text NOT NULL,
  `Sub status` text NOT NULL COMMENT 'describe job / institute /business',
  `branch` text NOT NULL,
  `rights` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `year of passing`, `current status`, `Sub status`, `branch`, `rights`) VALUES
(7, 'avinash', '7d8f4b4b4613dc7e15333e6449692ad4af502d1d', 'partha@g.com', '', '', '', '', 'registered'),
(8, 'partha pritam mahanta', '00d9423680f5210d770957bdaf6f15f96f2f1a8e', 'parthapritam272@gmail.com', '', '', '', '', 'registered'),
(9, 'parthapritam', '7c222fb2927d828af22f592134e8932480637c0d', 'ppp@gmail.com', '', '', '', '', 'block'),
(10, 'partha pritam mahanta', '7c222fb2927d828af22f592134e8932480637c0d', 'parthapritam2717@hotmail.com', '', '', '', '', 'block'),
(11, 'avinash', '7c222fb2927d828af22f592134e8932480637c0d', 'avin@gmail.com', '', '', '', '', 'registered');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
