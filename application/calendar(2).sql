-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 02, 2013 at 02:50 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `calendar`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `clients` int(11) NOT NULL AUTO_INCREMENT,
  `directions` longtext NOT NULL,
  `clientname` varchar(45) NOT NULL,
  `phone_one` varchar(45) DEFAULT NULL,
  `phone_two` varchar(45) DEFAULT NULL,
  `phone_three` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `contact_person` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`clients`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`clients`, `directions`, `clientname`, `phone_one`, `phone_two`, `phone_three`, `email`, `contact_person`) VALUES
(1, '<p>\r\n	Msasani</p>\r\n', 'Daniel Manji', NULL, NULL, NULL, NULL, NULL),
(2, '<p>\r\n	meeting pendo @ubungo plaza</p>\r\n', 'Pendo', NULL, NULL, NULL, NULL, NULL),
(3, 'Tanesco regional office kinondoni', 'HR Tanesco', NULL, NULL, NULL, NULL, NULL),
(4, 'South beach kigamboni', 'Easter', NULL, NULL, NULL, NULL, NULL),
(5, 'Ubalozi', 'Zantel ', NULL, NULL, NULL, NULL, NULL),
(6, 'jhgkj iytf tf yitf yg uuyg iuy giuyg ', 'testing client', NULL, NULL, NULL, NULL, NULL),
(7, 'Derm House,Makumbusho', 'Millicom Tanzania', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `schedule_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `client_id` int(11) NOT NULL,
  `exceptional_directions` text NOT NULL,
  PRIMARY KEY (`schedule_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `date`, `client_id`, `exceptional_directions`) VALUES
(3, '2013-03-15', 1, ''),
(5, '2013-05-08', 2, ''),
(6, '2013-06-20', 1, ''),
(8, '2013-06-02', 2, ''),
(9, '2013-03-15', 2, ''),
(10, '2013-03-25', 3, ''),
(11, '2013-03-31', 4, ''),
(12, '2013-04-01', 5, ''),
(13, '2013-04-04', 6, 'nlj  0i uhouhouu houh oiiuh ouh oyh '),
(14, '2013-04-04', 6, 'hgouiuyn  yg ouygh oiiuh oiuh oiuh oiyh'),
(15, '2013-04-04', 4, 'fFfvafssv'),
(16, '2013-04-16', 4, ''),
(17, '2013-04-02', 7, 'collecting cheque for Postpaid calls'),
(18, '2013-04-02', 7, 'Tender board');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '\0\0', 'administrator', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', '9462e8eee0', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1364886063, 1, 'Administrator', 'administrator', '', '--'),
(2, '\0\0', 'vincent david', '8effe2064046e995bec898cf8ad954a37f386341', NULL, 'daudivincent@yahoo.com', NULL, '08e767324916a4eb388ee856af5df49e6a6ee751', 1364886325, NULL, 1364199108, 1364894795, 1, 'Vincent', 'David', 'Zoom Tanzania', '071-842-3004'),
(3, '\0\0', 'grace daniel', 'a68089976ca1a1cc103000c28f3589fb68a5f3a5', NULL, 'grace@yahoo.com', NULL, NULL, NULL, NULL, 1364461337, 1364911033, 1, 'grace', 'daniel', 'zoom', '071-842-3004'),
(4, '\0\0', 'manji daniel', 'aa173c2a1b96fb8398bf6ce7c316afa02bcfc1b5', NULL, 'danielmanji@gmail.com', NULL, NULL, NULL, NULL, 1364886730, 1364892366, 1, 'Manji Chikaka', 'Daniel', 'zoom', '071-008-0082'),
(5, '\0\0', 'kirk gillis', '5f8e053c421b39c5f11d0402aea6f1a2cf91023f', NULL, 'kirk@zoomtanzania.com', NULL, NULL, NULL, NULL, 1364891605, 1364894812, 1, 'Kirk', 'Gillis', 'zoom', '--');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(15, 3, 2),
(16, 2, 1),
(19, 5, 2),
(22, 1, 1),
(24, 4, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
