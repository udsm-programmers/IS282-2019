-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 13, 2019 at 12:27 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `projectvisitors`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datepr` varchar(25) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(20) NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `visitedplace` varchar(20) NOT NULL,
  `purpose` varchar(50) NOT NULL,
  `timein` varchar(20) NOT NULL,
  `timeout` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `datepr`, `firstname`, `lastname`, `gender`, `address`, `phonenumber`, `visitedplace`, `purpose`, `timein`, `timeout`) VALUES
(2, '09/Nov/2017', 'kelvin', 'Mlay', 'Male', 'p.o.box 7171Arusha', '0767657905', 'lab', 'official', '02:16', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `fullname` varchar(20) NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `type` enum('user','admin') NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `password`, `fullname`, `phonenumber`, `email`, `type`) VALUES
(1, 'cathbet', 'cathbet', 'cathbet', '076545465', 'cathbet@gmail.com', 'admin');
