-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 04, 2015 at 09:18 AM
-- Server version: 5.5.42-37.1
-- PHP Version: 5.4.23
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
--
-- Database: `thejamun_management`
--
-- --------------------------------------------------------
--
-- Table structure for table `ci_sessions`
--
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- --------------------------------------------------------
--
-- Table structure for table `login_attempts`
--
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- --------------------------------------------------------
--
-- Table structure for table `pub_books`
--
CREATE TABLE IF NOT EXISTS `pub_books` (
  `book_ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `catagory` varchar(20) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
--
-- Dumping data for table `pub_books`
--
INSERT INTO `pub_books` (`book_ID`, `name`, `catagory`, `price`) VALUES
(1, 'Bangla 2nd Paper', 'Bangla', 120),
(2, 'English 2nd Paper', 'English', 140),
(3, 'ICT', 'ICT', 150),
(4, 'Bangla 2nd paper', 'Bangla', 120);
-- --------------------------------------------------------
--
-- Table structure for table `pub_contacts`
--
CREATE TABLE IF NOT EXISTS `pub_contacts` (
  `contact_ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `district` varchar(20) NOT NULL,
  `contact_type` varchar(20) NOT NULL COMMENT '1 = Printing Press , 2 = Binding Store , 3 = Sales Store',
  `address` text NOT NULL,
  `phone` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
--
-- Dumping data for table `pub_contacts`
--
INSERT INTO `pub_contacts` (`contact_ID`, `name`, `district`, `contact_type`, `address`, `phone`) VALUES
(1, 'AB Printes', 'Dhaka', 'Printing Press', '<p>\r\n	119/34 BanglaBazer</p>\r\n', '01712122323'),
(2, 'Book paradise', '', 'Sales Store', '', '01134567889'),
(3, 'Haq''s Library', 'Savar', 'Buyer', '', '');
-- --------------------------------------------------------
--
-- Table structure for table `pub_memos`
--
CREATE TABLE IF NOT EXISTS `pub_memos` (
  `memo_ID` int(11) NOT NULL COMMENT 'Memo ID',
  `memo_serial` varchar(50) NOT NULL COMMENT 'unique id auto genetated',
  `contact_ID` int(11) NOT NULL COMMENT 'Memo Issued to',
  `issue_date` datetime NOT NULL COMMENT 'Memo auto generated timestamp',
  `sub_total` int(11) NOT NULL COMMENT 'Total book Price',
  `discount` int(11) NOT NULL COMMENT 'Discount made',
  `dues_unpaid` int(11) NOT NULL COMMENT 'Prevous Due',
  `total` int(11) NOT NULL,
  `cash` int(11) NOT NULL COMMENT 'Paid by cash',
  `bank_pay` int(11) NOT NULL COMMENT 'Paid by band check',
  `due` int(11) NOT NULL COMMENT 'Due'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
--
-- Dumping data for table `pub_memos`
--
INSERT INTO `pub_memos` (`memo_ID`, `memo_serial`, `contact_ID`, `issue_date`, `sub_total`, `discount`, `dues_unpaid`, `total`, `cash`, `bank_pay`, `due`) VALUES
(1, '56112b7d15f34', 3, '2015-10-04 00:00:00', 6600, 600, 0, 6000, 4000, 1000, 1000);
-- --------------------------------------------------------
--
-- Table structure for table `pub_memos_selected_books`
--
CREATE TABLE IF NOT EXISTS `pub_memos_selected_books` (
  `selection_ID` int(11) NOT NULL,
  `memo_ID` int(11) NOT NULL,
  `book_ID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price_per_book` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
--
-- Dumping data for table `pub_memos_selected_books`
--
INSERT INTO `pub_memos_selected_books` (`selection_ID`, `memo_ID`, `book_ID`, `quantity`, `price_per_book`, `total`) VALUES
(1, 1, 1, 20, 120, 2400),
(2, 1, 2, 30, 140, 4200),
(3, 1, 3, 0, 150, 0),
(4, 1, 4, 0, 120, 0);
-- --------------------------------------------------------
--
-- Table structure for table `pub_stock`
--
CREATE TABLE IF NOT EXISTS `pub_stock` (
  `stock_id` int(10) NOT NULL,
  `book_ID` varchar(100) NOT NULL,
  `printing_press_ID` int(11) NOT NULL,
  `printing_press_Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- --------------------------------------------------------
--
-- Table structure for table `pub_stock_m`
--
CREATE TABLE IF NOT EXISTS `pub_stock_m` (
  `id` int(11) NOT NULL,
  `stock_ID` int(10) NOT NULL,
  `book_ID` int(10) NOT NULL,
  `contact_ID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- --------------------------------------------------------
--
-- Table structure for table `users`
--
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
--
-- Dumping data for table `users`
--
INSERT INTO `users` (`id`, `username`, `password`, `email`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`) VALUES
(1, 'admin', '$2a$08$NmXFqDOBe/c2E.xj8gMnvOwj8TRvUswb0NZUDdan1alvYsTlgGUHa', 'mashfiqnahid@gmail.com', 1, 0, NULL, NULL, NULL, NULL, 'ee715b40d32a11e440be813a06f4be13', '103.62.140.2', '2015-10-04 09:14:14', '2015-08-14 17:35:42', '2015-10-04 14:14:14');
-- --------------------------------------------------------
--
-- Table structure for table `user_autologin`
--
CREATE TABLE IF NOT EXISTS `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
--
-- Dumping data for table `user_autologin`
--
INSERT INTO `user_autologin` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`) VALUES
('0c4a62def3836eda17fb78ad7747109f', 1, 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', '::1', '2015-10-01 09:09:36'),
('34c6d5a1beb4003137abe89d23605324', 1, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '::1', '2015-09-04 16:22:51'),
('858e146d6f4b192e93d9ca220b05c7a4', 1, 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', '103.62.140.2', '2015-10-01 18:09:55'),
('9f5cd72351f7461035e249fd7d1afcef', 1, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36', '103.62.140.2', '2015-10-01 18:08:13'),
('b9ab15faccf44f729ab59b260783f1fa', 1, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36', '::1', '2015-09-30 10:32:29'),
('c2618c055763c049cfe782d6c79b1601', 1, 'Mozilla/5.0 (Linux; Android 4.4.2; Primo_X3 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.94 Mobile Safari/537.36', '103.25.248.235', '2015-10-04 06:21:18'),
('c63fe11f54c6f79bdc99b26a4d57e608', 1, 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:41.0) Gecko/20100101 Firefox/41.0', '103.62.140.2', '2015-10-04 05:05:20');
-- --------------------------------------------------------
--
-- Table structure for table `user_profiles`
--
CREATE TABLE IF NOT EXISTS `user_profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `country` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
--
-- Indexes for dumped tables
--
--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`);
--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `pub_books`
--
ALTER TABLE `pub_books`
  ADD PRIMARY KEY (`book_ID`);
--
-- Indexes for table `pub_contacts`
--
ALTER TABLE `pub_contacts`
  ADD PRIMARY KEY (`contact_ID`);
--
-- Indexes for table `pub_memos`
--
ALTER TABLE `pub_memos`
  ADD PRIMARY KEY (`memo_ID`);
--
-- Indexes for table `pub_memos_selected_books`
--
ALTER TABLE `pub_memos_selected_books`
  ADD PRIMARY KEY (`selection_ID`);
--
-- Indexes for table `pub_stock`
--
ALTER TABLE `pub_stock`
  ADD PRIMARY KEY (`stock_id`);
--
-- Indexes for table `pub_stock_m`
--
ALTER TABLE `pub_stock_m`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `user_autologin`
--
ALTER TABLE `user_autologin`
  ADD PRIMARY KEY (`key_id`,`user_id`);
--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`);
--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pub_books`
--
ALTER TABLE `pub_books`
  MODIFY `book_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pub_contacts`
--
ALTER TABLE `pub_contacts`
  MODIFY `contact_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pub_memos`
--
ALTER TABLE `pub_memos`
  MODIFY `memo_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Memo ID',AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pub_memos_selected_books`
--
ALTER TABLE `pub_memos_selected_books`
  MODIFY `selection_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pub_stock`
--
ALTER TABLE `pub_stock`
  MODIFY `stock_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pub_stock_m`
--
ALTER TABLE `pub_stock_m`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
