-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2013 at 05:30 PM
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
-- Table structure for table `commission`
--

CREATE TABLE IF NOT EXISTS `commission` (
  `trans_id` int(11) unsigned zerofill NOT NULL,
  `del_track_no` int(12) unsigned zerofill NOT NULL,
  `com_amount` int(11) NOT NULL,
  PRIMARY KEY (`trans_id`),
  KEY `del_track_no` (`del_track_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `cust_id` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `cust_email` varchar(40) NOT NULL,
  `cust_password` varchar(20) NOT NULL,
  `cust_name` varchar(32) NOT NULL,
  `cust_address` varchar(60) NOT NULL,
  `cust_contact_no` int(11) NOT NULL,
  PRIMARY KEY (`cust_id`),
  KEY `cust_id` (`cust_id`),
  KEY `cust_id_2` (`cust_id`),
  KEY `cust_id_3` (`cust_id`),
  KEY `cust_id_4` (`cust_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_assignment`
--

CREATE TABLE IF NOT EXISTS `delivery_assignment` (
  `del_track_no` int(12) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `req_id` int(10) unsigned zerofill NOT NULL,
  `emp_id` int(3) unsigned zerofill NOT NULL,
  PRIMARY KEY (`del_track_no`),
  KEY `req_id` (`req_id`),
  KEY `emp_id` (`emp_id`)
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
-- Table structure for table `driver`
--

CREATE TABLE IF NOT EXISTS `driver` (
  `emp_id` int(3) unsigned zerofill NOT NULL,
  `truck_id` int(3) unsigned zerofill NOT NULL,
  `license_no` int(16) NOT NULL,
  PRIMARY KEY (`emp_id`,`truck_id`),
  KEY `truck_id` (`truck_id`),
  KEY `emp_id` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `emp_password` varchar(24) NOT NULL,
  `emp_name` varchar(32) NOT NULL,
  `emp_birthday` date NOT NULL,
  `emp_time_in` time NOT NULL,
  `emp_time_out` time NOT NULL,
  `emp_type` enum('d') CHARACTER SET utf32 COLLATE utf32_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `payment_transaction`
--

CREATE TABLE IF NOT EXISTS `payment_transaction` (
  `trans_id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `trans_date` datetime NOT NULL,
  `trans_type` enum('Salary','Commision') NOT NULL,
  `emp_id` int(3) unsigned zerofill NOT NULL,
  PRIMARY KEY (`trans_id`),
  KEY `emp_id` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE IF NOT EXISTS `request` (
  `req_id` int(10) unsigned zerofill NOT NULL,
  `req_pick_up` varchar(60) NOT NULL,
  `req_drop_off` varchar(60) NOT NULL,
  `req_distance` int(11) NOT NULL,
  `req_price` int(11) NOT NULL,
  `req_total_weight` int(11) NOT NULL,
  `cust_id` int(5) unsigned zerofill NOT NULL,
  PRIMARY KEY (`req_id`),
  KEY `cust_id` (`cust_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE IF NOT EXISTS `salary` (
  `trans_id` int(11) unsigned zerofill NOT NULL,
  `sal_amount` int(11) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commission`
--
ALTER TABLE `commission`
  ADD CONSTRAINT `commission_ibfk_2` FOREIGN KEY (`trans_id`) REFERENCES `payment_transaction` (`trans_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `commission_ibfk_1` FOREIGN KEY (`del_track_no`) REFERENCES `delivery_assignment` (`del_track_no`) ON UPDATE CASCADE;

--
-- Constraints for table `delivery_assignment`
--
ALTER TABLE `delivery_assignment`
  ADD CONSTRAINT `delivery_assignment_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `delivery_assignment_ibfk_1` FOREIGN KEY (`req_id`) REFERENCES `request` (`req_id`) ON UPDATE CASCADE;

--
-- Constraints for table `delivery_items`
--
ALTER TABLE `delivery_items`
  ADD CONSTRAINT `delivery_items_ibfk_1` FOREIGN KEY (`req_id`) REFERENCES `request` (`req_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `driver`
--
ALTER TABLE `driver`
  ADD CONSTRAINT `driver_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `driver_ibfk_2` FOREIGN KEY (`truck_id`) REFERENCES `truck` (`truck_id`) ON UPDATE CASCADE;

--
-- Constraints for table `payment_transaction`
--
ALTER TABLE `payment_transaction`
  ADD CONSTRAINT `payment_transaction_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON UPDATE CASCADE;

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON UPDATE CASCADE;

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `salary_ibfk_1` FOREIGN KEY (`trans_id`) REFERENCES `payment_transaction` (`trans_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
