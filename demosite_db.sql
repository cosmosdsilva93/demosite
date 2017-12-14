-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2017 at 09:20 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `demosite_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE IF NOT EXISTS `subscriptions` (
  `id` int(11) NOT NULL,
  `event_date` date NOT NULL,
  `app_name` varchar(255) NOT NULL,
  `app_apple_id` int(11) NOT NULL,
  `subscription_name` varchar(255) NOT NULL,
  `subscription_apple_id` int(11) NOT NULL,
  `subscription_group_id` int(11) NOT NULL,
  `subscription_duration` varchar(255) NOT NULL,
  `trial_duration` varchar(255) DEFAULT NULL,
  `marketing_opt-in_duration` varchar(255) DEFAULT NULL,
  `customer_price` double NOT NULL DEFAULT '0',
  `customer_currency` varchar(20) NOT NULL,
  `developer_proceeds` double NOT NULL DEFAULT '0',
  `proceeds_currency` varchar(20) NOT NULL,
  `preserved_pricing` varchar(10) DEFAULT NULL,
  `proceeds_reason` text,
  `client` varchar(100) DEFAULT NULL,
  `device` varchar(100) NOT NULL,
  `country` varchar(150) NOT NULL,
  `subscriber_id` bigint(20) NOT NULL,
  `subscriber_id_reset` bigint(20) DEFAULT NULL,
  `refund` varchar(10) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `units` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
