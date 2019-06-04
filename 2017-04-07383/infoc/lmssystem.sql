-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2019 at 05:19 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lmssystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_l`
--

CREATE TABLE `access_l` (
  `id` int(3) NOT NULL,
  `level` varchar(3) NOT NULL,
  `name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `camp_staff`
--

CREATE TABLE `camp_staff` (
  `staff_id` int(4) NOT NULL,
  `st_fname` varchar(10) NOT NULL,
  `st_midname` varchar(10) NOT NULL,
  `st_lastname` varchar(10) NOT NULL,
  `email` varchar(25) NOT NULL,
  `st_dt_birth` date NOT NULL,
  `st_dt_stwork` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `camp_staff`
--

INSERT INTO `camp_staff` (`staff_id`, `st_fname`, `st_midname`, `st_lastname`, `email`, `st_dt_birth`, `st_dt_stwork`) VALUES
(1, 'jo', 'ni', 'jo', '', '2005-10-19', '2015-10-07'),
(2, 'br', 'nd', 'bro', '', '2019-05-14', '2019-05-29');

-- --------------------------------------------------------

--
-- Table structure for table `camp_st_address`
--

CREATE TABLE `camp_st_address` (
  `staff_id` int(4) NOT NULL,
  `county` varchar(15) NOT NULL,
  `region` varchar(15) NOT NULL,
  `ward` varchar(15) NOT NULL,
  `city/town` varchar(20) NOT NULL,
  `poboxN01` int(7) NOT NULL,
  `poboxN02` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `camp_st_phoneno`
--

CREATE TABLE `camp_st_phoneno` (
  `staff_id` int(11) NOT NULL,
  `phone_1` int(12) NOT NULL,
  `phone_2` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `charf`
--

CREATE TABLE `charf` (
  `char_id` int(4) NOT NULL,
  `char_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `charf`
--

INSERT INTO `charf` (`char_id`, `char_name`) VALUES
(1, 'men'),
(2, 'women'),
(3, 'baby'),
(4, 'home+');

-- --------------------------------------------------------

--
-- Table structure for table `customa`
--

CREATE TABLE `customa` (
  `cus_id` int(200) NOT NULL,
  `cust_name` varchar(20) NOT NULL,
  `cust_phonNo` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lmsservices`
--

CREATE TABLE `lmsservices` (
  `item_id` int(200) NOT NULL,
  `item_chr_id` int(4) NOT NULL,
  `item_type` varchar(15) NOT NULL,
  `item_price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lmsservices`
--

INSERT INTO `lmsservices` (`item_id`, `item_chr_id`, `item_type`, `item_price`) VALUES
(5, 3, 'socks', 45),
(6, 4, 'yoo', 89),
(9, 1, 'Yur', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `occup`
--

CREATE TABLE `occup` (
  `occ_id` int(4) NOT NULL,
  `title` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `occup`
--

INSERT INTO `occup` (`occ_id`, `title`) VALUES
(1, 'manager'),
(2, 'frontoffie');

-- --------------------------------------------------------

--
-- Table structure for table `orderlist`
--

CREATE TABLE `orderlist` (
  `item_id` int(4) NOT NULL,
  `cust_id` int(4) NOT NULL,
  `item_totaNO` int(3) NOT NULL,
  `item_er_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `item_dv_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orderreceipt`
--

CREATE TABLE `orderreceipt` (
  `receipN0` varchar(12) NOT NULL,
  `cust_id_fr_orderl` int(4) NOT NULL,
  `items_totNO` int(5) NOT NULL,
  `items_totprice` int(5) NOT NULL,
  `exit_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `system_users`
--

CREATE TABLE `system_users` (
  `cus_id` int(3) NOT NULL,
  `sta_fulname` varchar(30) NOT NULL,
  `staf_occup` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_users`
--

INSERT INTO `system_users` (`cus_id`, `sta_fulname`, `staf_occup`) VALUES
(1, 'jonijo', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_l`
--
ALTER TABLE `access_l`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `camp_staff`
--
ALTER TABLE `camp_staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `camp_st_address`
--
ALTER TABLE `camp_st_address`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `cus_id` (`staff_id`);

--
-- Indexes for table `camp_st_phoneno`
--
ALTER TABLE `camp_st_phoneno`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `cus_id` (`staff_id`);

--
-- Indexes for table `charf`
--
ALTER TABLE `charf`
  ADD PRIMARY KEY (`char_id`);

--
-- Indexes for table `customa`
--
ALTER TABLE `customa`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `lmsservices`
--
ALTER TABLE `lmsservices`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `item_chr_id` (`item_chr_id`);

--
-- Indexes for table `occup`
--
ALTER TABLE `occup`
  ADD PRIMARY KEY (`occ_id`);

--
-- Indexes for table `orderlist`
--
ALTER TABLE `orderlist`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `orderreceipt`
--
ALTER TABLE `orderreceipt`
  ADD PRIMARY KEY (`receipN0`),
  ADD KEY `cust_id_fr_orderl` (`cust_id_fr_orderl`);

--
-- Indexes for table `system_users`
--
ALTER TABLE `system_users`
  ADD PRIMARY KEY (`cus_id`),
  ADD KEY `cus_id` (`cus_id`),
  ADD KEY `staf_occup` (`staf_occup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_l`
--
ALTER TABLE `access_l`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `camp_staff`
--
ALTER TABLE `camp_staff`
  MODIFY `staff_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `charf`
--
ALTER TABLE `charf`
  MODIFY `char_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customa`
--
ALTER TABLE `customa`
  MODIFY `cus_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lmsservices`
--
ALTER TABLE `lmsservices`
  MODIFY `item_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `occup`
--
ALTER TABLE `occup`
  MODIFY `occ_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `camp_st_address`
--
ALTER TABLE `camp_st_address`
  ADD CONSTRAINT `camp_st_address_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `camp_st_address` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `camp_st_phoneno`
--
ALTER TABLE `camp_st_phoneno`
  ADD CONSTRAINT `camp_st_phoneno_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `camp_staff` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lmsservices`
--
ALTER TABLE `lmsservices`
  ADD CONSTRAINT `lmsservices_ibfk_1` FOREIGN KEY (`item_chr_id`) REFERENCES `charf` (`char_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderlist`
--
ALTER TABLE `orderlist`
  ADD CONSTRAINT `orderlist_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `lmsservices` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderlist_ibfk_2` FOREIGN KEY (`cust_id`) REFERENCES `customa` (`cus_id`);

--
-- Constraints for table `orderreceipt`
--
ALTER TABLE `orderreceipt`
  ADD CONSTRAINT `orderreceipt_ibfk_1` FOREIGN KEY (`cust_id_fr_orderl`) REFERENCES `orderlist` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `system_users`
--
ALTER TABLE `system_users`
  ADD CONSTRAINT `system_users_ibfk_2` FOREIGN KEY (`staf_occup`) REFERENCES `occup` (`occ_id`),
  ADD CONSTRAINT `system_users_ibfk_3` FOREIGN KEY (`cus_id`) REFERENCES `camp_staff` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
