-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2014 at 11:19 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `banan`
--
CREATE DATABASE IF NOT EXISTS `banan` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `banan`;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_assignment`
--

CREATE TABLE IF NOT EXISTS `delivery_assignment` (
  `del_track_no` int(12) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `req_id` int(10) unsigned zerofill NOT NULL,
  `emp_id` int(3) unsigned zerofill NOT NULL,
  `truck_id` int(3) unsigned zerofill NOT NULL,
  `progress` enum('done','activate') NOT NULL,
  PRIMARY KEY (`del_track_no`),
  KEY `req_id` (`req_id`),
  KEY `emp_id` (`emp_id`),
  KEY `truck_id` (`truck_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_items`
--

CREATE TABLE IF NOT EXISTS `delivery_items` (
  `del_items_id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `del_item_name` varchar(32) NOT NULL,
  `del_item_type` varchar(16) NOT NULL,
  `del_item_wieght` int(11) NOT NULL,
  `req_id` int(10) unsigned zerofill NOT NULL,
  PRIMARY KEY (`del_items_id`),
  KEY `req_id` (`req_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE IF NOT EXISTS `request` (
  `req_id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `req_item` varchar(32) NOT NULL,
  `req_pick_up` varchar(60) NOT NULL,
  `req_drop_off` varchar(60) NOT NULL,
  `req_total_weight` int(11) NOT NULL,
  `cust_id` int(4) unsigned zerofill NOT NULL,
  `progress` enum('Done','In Progress','Order') NOT NULL,
  PRIMARY KEY (`req_id`),
  KEY `cust_id` (`cust_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`req_id`, `req_item`, `req_pick_up`, `req_drop_off`, `req_total_weight`, `cust_id`, `progress`) VALUES
(0000000001, 'test', 'test', 'test', 123, 0003, 'Order');

-- --------------------------------------------------------

--
-- Table structure for table `truck`
--

CREATE TABLE IF NOT EXISTS `truck` (
  `truck_id` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `truck_type` enum('4_wheeler','6_wheeler','8_wheeler','10_wheeler') NOT NULL,
  `truck_capacity` int(11) NOT NULL,
  `truck_status` enum('ok','repair') NOT NULL,
  `truck_plate_no` varchar(6) NOT NULL,
  PRIMARY KEY (`truck_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET latin1 NOT NULL,
  `password` varchar(20) CHARACTER SET latin1 NOT NULL,
  `fname` varchar(24) CHARACTER SET latin1 NOT NULL,
  `mname` varchar(16) CHARACTER SET latin1 NOT NULL,
  `lname` varchar(24) CHARACTER SET latin1 NOT NULL,
  `user_email` varchar(32) CHARACTER SET latin1 NOT NULL,
  `user_address` varchar(20) CHARACTER SET latin1 NOT NULL,
  `contact_no` varchar(17) CHARACTER SET latin1 NOT NULL,
  `user_type` enum('cust','emp','system_admin') CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `fname`, `mname`, `lname`, `user_email`, `user_address`, `contact_no`, `user_type`) VALUES
(0001, 'admin', '1234', 'admin', '', '', '', '', '0', 'system_admin'),
(0002, 'emp1', 'emp1', 'employee', '', '', '', '', '0', 'emp'),
(0003, 'cust1', 'cust1', 'BONITO', 'S', 'T', 'a@a.com', 'cebu city', '0', 'cust'),
(0010, 'ca', 'ca', 'ca', 'ca', 'ca', 'ca', 'ca', '12345678910', 'cust');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `delivery_assignment`
--
ALTER TABLE `delivery_assignment`
  ADD CONSTRAINT `delivery_assignment_ibfk_3` FOREIGN KEY (`req_id`) REFERENCES `request` (`req_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `delivery_assignment_ibfk_4` FOREIGN KEY (`emp_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `delivery_assignment_ibfk_5` FOREIGN KEY (`truck_id`) REFERENCES `truck` (`truck_id`);

--
-- Constraints for table `delivery_items`
--
ALTER TABLE `delivery_items`
  ADD CONSTRAINT `delivery_items_ibfk_1` FOREIGN KEY (`req_id`) REFERENCES `request` (`req_id`) ON UPDATE CASCADE;

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
