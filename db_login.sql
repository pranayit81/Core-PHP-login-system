-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2017 at 11:59 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_home_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `logout_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ip_address` varchar(50) DEFAULT NULL,
  `login_counter` int(10) DEFAULT '0',
  `browser_name` varchar(60) NOT NULL,
  `user_type_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_password`, `login_time`, `logout_time`, `ip_address`, `login_counter`, `browser_name`, `user_type_id`) VALUES
(1, 'admin', 'admin', '2017-08-19 08:33:29', '2017-08-19 08:33:24', '::1', 17, 'AppleWebKit/537.36', 1),
(2, 'vrushabh', 'vrushabh', '2017-07-25 08:04:11', '2017-07-25 08:04:11', '127.0.0.1', 0, 'AppleWebKit/537.36', 2),
(3, 'sumit', 'sumit', '2017-07-25 08:12:49', '2017-07-25 08:12:49', '127.0.0.1', 4, 'Gecko/20100101', 2),
(4, 'bhushan', 'bhushan', '2017-07-25 08:06:34', '2017-07-25 08:06:34', '127.0.0.1', 1, 'AppleWebKit/537.36', 2),
(5, 'mukul', 'mukul', '2017-07-25 08:07:17', '2017-07-25 08:07:17', '127.0.0.1', 2, 'AppleWebKit/537.36', 2),
(12, 'abc', 'abc', '2017-07-25 08:07:40', '2017-07-25 08:07:40', '127.0.0.1', 2, 'AppleWebKit/537.36', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_type`
--

CREATE TABLE `tbl_user_type` (
  `user_type_id` int(11) NOT NULL,
  `user_type_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_type`
--

INSERT INTO `tbl_user_type` (`user_type_id`, `user_type_name`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_user_type` (`user_type_id`);

--
-- Indexes for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  ADD PRIMARY KEY (`user_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  MODIFY `user_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `fk_user_type` FOREIGN KEY (`user_type_id`) REFERENCES `tbl_user_type` (`user_type_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
