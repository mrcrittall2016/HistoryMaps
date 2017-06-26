-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: May 01, 2017 at 06:34 AM
-- Server version: 5.6.33-log
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inthev8_historymaps`
--

-- --------------------------------------------------------

--
-- Table structure for table `Badajoz`
--

CREATE TABLE IF NOT EXISTS `Badajoz` (
  `questionid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(150) NOT NULL,
  `choice1` varchar(150) NOT NULL,
  `choice2` varchar(150) NOT NULL,
  `choice3` varchar(150) NOT NULL,
  `answer` varchar(150) NOT NULL,
  `explanation` mediumtext,
  PRIMARY KEY (`questionid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `Badajoz`
--

INSERT INTO `Badajoz` (`questionid`, `name`, `choice1`, `choice2`, `choice3`, `answer`, `explanation`) VALUES
(7, 'Who climbed the wall to raise the flag for the British at the climax of the battle?', 'The Duke of Wellington', 'Robert Crauford ', 'Sir Thomas Picton', 'Sir Thomas Picton', 'Sir Thomas Picton was the first to raise the flag for the Briitsh... both fortunate and brave. In the resulting conflict he suffered a broken rib for his troubles. '),
(8, 'What was Wellington''s reaction at the end of the siege?', 'He laughed ', 'He shook with rage ', 'He wept', 'He wept', 'Wellington indeed wept at the site of such carnage... a rare display of emotion from the great man!'),
(9, 'How many British troops fought at Badajoz?', '5000', '20,000', '15,000', '20,000', 'Approximately 20,000 British troops fought at the siege of Badajoz');

-- --------------------------------------------------------

--
-- Table structure for table `battles`
--

CREATE TABLE IF NOT EXISTS `battles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_code` char(2) NOT NULL,
  `postal_code` varchar(20) NOT NULL,
  `place_name` varchar(180) NOT NULL,
  `admin_name1` varchar(100) NOT NULL,
  `admin_code1` varchar(20) NOT NULL,
  `admin_name2` varchar(100) NOT NULL,
  `admin_code2` varchar(20) NOT NULL,
  `admin_name3` varchar(100) NOT NULL,
  `admin_code3` varchar(20) NOT NULL,
  `latitude` decimal(7,4) NOT NULL,
  `longitude` decimal(7,4) NOT NULL,
  `accuracy` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=228324 ;

--
-- Dumping data for table `battles`
--

INSERT INTO `battles` (`id`, `country_code`, `postal_code`, `place_name`, `admin_name1`, `admin_code1`, `admin_name2`, `admin_code2`, `admin_name3`, `admin_code3`, `latitude`, `longitude`, `accuracy`) VALUES
(2, 'PT', '2540-087', 'Roliça', '', '10', 'Ribeira Grande', '05', 'Atenor', '01', '39.3136', '-9.1836', 4),
(3, 'PT', '2530-847', 'Vimeiro', 'Lisboa', '11', 'Santa Cruz', '08', 'CastelÃƒÂ£os', '08', '39.1750', '-9.3167', 4),
(6, 'PT', '3050-261', 'Bussaco', '', '01', 'Penalva do Castelo', '11', 'Bagueixe', '04', '40.3444', '-8.3375', 4),
(5, 'ES', '45600', 'Talavera ', 'Castilla - La Mancha', 'CM', 'Toledo', 'TO', '', '', '39.9667', '-4.8333', 4),
(1, 'PT', '3080-897', 'Mondego Bay', 'Coimbra', '06', 'Ribeira Grande', '05', 'Edroso', '12', '40.1411', '-8.8871', 0),
(12, 'ES', '01001', 'Vitoria', 'Pais Vasco', 'PV', 'ÃƒÂlava', 'VI', '', '', '42.8500', '-2.6833', 4),
(11, 'ES', '09001', 'Burgos', 'Castilla - Leon', 'CL', 'Burgos', 'BU', '', '', '42.3502', '-3.6753', 4),
(10, 'ES', '37120', 'Salamanca', 'Castilla - Leon', 'CL', 'Salamanca', 'SA', '', '', '40.8935', '-5.6453', 4),
(4, 'PT', '4000-192', 'Oporto', 'Porto', '13', 'Penedono', '12', 'Ferreira', '14', '41.1500', '-8.6167', 4),
(8, 'ES', '37500', 'Ciudad Rodrigo', 'Castilla - Leon', 'CL', 'Salamanca', 'SA', '', '', '40.6000', '-6.5333', 4),
(7, '', '', 'Fuentes de Oñoro', '', '', '', '', '', '', '40.5833', '-6.8167', 0),
(9, 'ES', '06001', 'Badajoz', 'Extremadura', 'EX', 'Badajoz', 'BA', '', '', '38.8789', '-6.9669', 4),
(13, '', '', 'Waterloo', '', '', '', '', '', '', '50.6802', '4.4117', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Burgos`
--

CREATE TABLE IF NOT EXISTS `Burgos` (
  `questionid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(150) NOT NULL,
  `choice1` varchar(150) NOT NULL,
  `choice2` varchar(150) NOT NULL,
  `choice3` varchar(150) NOT NULL,
  `answer` varchar(150) NOT NULL,
  `explanation` mediumtext,
  PRIMARY KEY (`questionid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `Burgos`
--

INSERT INTO `Burgos` (`questionid`, `name`, `choice1`, `choice2`, `choice3`, `answer`, `explanation`) VALUES
(7, 'Which French General thwarted Wellington''s efforts to capture Burgos castle?', ' Jean-Louis Dubreton', 'Napoleon', 'Augustus', ' Jean-Louis Dubreton', ' Jean-Louis Dubreton successfully defended Burgos from Wellington''s attempts to capture the fortress');

-- --------------------------------------------------------

--
-- Table structure for table `Bussaco`
--

CREATE TABLE IF NOT EXISTS `Bussaco` (
  `questionid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(150) NOT NULL,
  `choice1` varchar(150) NOT NULL,
  `choice2` varchar(150) NOT NULL,
  `choice3` varchar(150) NOT NULL,
  `answer` varchar(150) NOT NULL,
  `explanation` mediumtext,
  PRIMARY KEY (`questionid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `Bussaco`
--

INSERT INTO `Bussaco` (`questionid`, `name`, `choice1`, `choice2`, `choice3`, `answer`, `explanation`) VALUES
(7, 'Who was the Duke of Wellington''s opponent at the Battle of Bussaco?', 'Marshal Claude Victor', 'Napoleon', ' Marshal AndrÃ© MassÃ©na', ' Marshal AndrÃ© MassÃ©na', 'Marshal AndrÃ© MassÃ©na was thDuke of Wellington''s opponent at the Battle of Bussaco');

-- --------------------------------------------------------

--
-- Table structure for table `Ciudad Rodrigo`
--

CREATE TABLE IF NOT EXISTS `Ciudad Rodrigo` (
  `questionid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(150) NOT NULL,
  `choice1` varchar(150) NOT NULL,
  `choice2` varchar(150) NOT NULL,
  `choice3` varchar(150) NOT NULL,
  `answer` varchar(150) NOT NULL,
  `explanation` mediumtext,
  PRIMARY KEY (`questionid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `Ciudad Rodrigo`
--

INSERT INTO `Ciudad Rodrigo` (`questionid`, `name`, `choice1`, `choice2`, `choice3`, `answer`, `explanation`) VALUES
(7, 'Which of Wellington''s Generals fell during the siege of Ciudad Rodrigo?', 'General Rowland Hill', 'General Thomas Picton', 'General Robert Crauford', 'General Robert Crauford', 'General Robert Crauford was the unfortunate General to fall. Though unpopular amongst his men "Black Bob" was always a sensitive man to his wife');

-- --------------------------------------------------------

--
-- Table structure for table `Fuentes de Onoro`
--

CREATE TABLE IF NOT EXISTS `Fuentes de Onoro` (
  `questionid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(150) NOT NULL,
  `choice1` varchar(150) NOT NULL,
  `choice2` varchar(150) NOT NULL,
  `choice3` varchar(150) NOT NULL,
  `answer` varchar(150) NOT NULL,
  `explanation` mediumtext,
  PRIMARY KEY (`questionid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `Fuentes de Onoro`
--

INSERT INTO `Fuentes de Onoro` (`questionid`, `name`, `choice1`, `choice2`, `choice3`, `answer`, `explanation`) VALUES
(7, 'Who was the Duke of Wellington''s opponent at the Battle of Fuentes de Onoro?', 'Marshal AndrÃ© MassÃ©na', 'Marshal Victor ', 'Marshal Marmount', 'Marshal AndrÃ© MassÃ©na', 'Marshal AndrÃ© MassÃ©na  was the Duke of Wellington''s opponent at the Battle of Fuentes de Onoro');

-- --------------------------------------------------------

--
-- Table structure for table `Mondego Bay`
--

CREATE TABLE IF NOT EXISTS `Mondego Bay` (
  `questionid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(150) NOT NULL,
  `choice1` varchar(150) NOT NULL,
  `choice2` varchar(150) NOT NULL,
  `choice3` varchar(150) NOT NULL,
  `answer` varchar(150) NOT NULL,
  `explanation` mediumtext,
  PRIMARY KEY (`questionid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Mondego Bay`
--

INSERT INTO `Mondego Bay` (`questionid`, `name`, `choice1`, `choice2`, `choice3`, `answer`, `explanation`) VALUES
(1, 'How many British troops landed at Mondego Bay?', '6000', '50,000', '9000', '9000', 'Only 9000 soldiers were landed in the first instance. The rough seas and high swells made getting ashore difficult indeed and many soldiers drowned as a result.');

-- --------------------------------------------------------

--
-- Table structure for table `Oporto`
--

CREATE TABLE IF NOT EXISTS `Oporto` (
  `questionid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(150) NOT NULL,
  `choice1` varchar(150) NOT NULL,
  `choice2` varchar(150) NOT NULL,
  `choice3` varchar(150) NOT NULL,
  `answer` varchar(150) NOT NULL,
  `explanation` mediumtext,
  PRIMARY KEY (`questionid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `Oporto`
--

INSERT INTO `Oporto` (`questionid`, `name`, `choice1`, `choice2`, `choice3`, `answer`, `explanation`) VALUES
(9, 'Who was Sir Arthur Wellesley''s opponent at the Battle of Oporto?', 'Marshal Nicolas Soult', 'Napoleon', 'Marshal Victor', 'Marshal Nicolas Soult', 'Marshal Nicolas Soult was Sir Arthur Wellesley''s opponent at the Battle of Oporto');

-- --------------------------------------------------------

--
-- Table structure for table `Rolica`
--

CREATE TABLE IF NOT EXISTS `Rolica` (
  `questionid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(150) NOT NULL,
  `choice1` varchar(150) NOT NULL,
  `choice2` varchar(150) NOT NULL,
  `choice3` varchar(150) NOT NULL,
  `answer` varchar(150) NOT NULL,
  `explanation` mediumtext,
  PRIMARY KEY (`questionid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `Rolica`
--

INSERT INTO `Rolica` (`questionid`, `name`, `choice1`, `choice2`, `choice3`, `answer`, `explanation`) VALUES
(7, 'Who was Sir Arthur Wellesley''s opponent at the Battle of Rolica?', 'Marshal Ney', 'Jean-Andoche Junot', 'Henri-Francois Delaborde', 'Henri-Francois Delaborde', 'General Henri-Francois Delaborde was Sir Arthur Wellesley''s opponent at the Battle of Rolica. ');

-- --------------------------------------------------------

--
-- Table structure for table `Salamanca`
--

CREATE TABLE IF NOT EXISTS `Salamanca` (
  `questionid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(150) NOT NULL,
  `choice1` varchar(150) NOT NULL,
  `choice2` varchar(150) NOT NULL,
  `choice3` varchar(150) NOT NULL,
  `answer` varchar(150) NOT NULL,
  `explanation` mediumtext,
  PRIMARY KEY (`questionid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `Salamanca`
--

INSERT INTO `Salamanca` (`questionid`, `name`, `choice1`, `choice2`, `choice3`, `answer`, `explanation`) VALUES
(7, 'Who was the Duke of Wellington''s opponent at the Battle of Salamanca?', 'Marshal Ney', ' Marshal Auguste Marmont', 'Marshal Andre Massena', ' Marshal Auguste Marmont', ' Marshal Auguste Marmont was the Duke of Wellington''s opponent at the Battle of Salamanca');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE IF NOT EXISTS `scores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `Battle` varchar(255) NOT NULL,
  `battle_index` int(10) unsigned NOT NULL,
  `British` int(10) unsigned NOT NULL,
  `French` int(10) unsigned NOT NULL,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `my_unique_key` (`username`,`Battle`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=76 ;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `username`, `Battle`, `battle_index`, `British`, `French`) VALUES
(2, 'Matthew', 'Mondego Bay', 0, 1, 0),
(4, 'Bob', 'Mondego Bay', 0, 0, 0),
(5, 'Henry', 'Mondego Bay', 0, 0, 0),
(41, 'James ', 'Mondego Bay', 0, 1, 0),
(46, 'James ', 'Rolica', 1, 1, 0),
(58, 'David ', 'Mondego Bay', 0, 1, 0),
(59, 'David ', 'Rolica', 1, 1, 0),
(60, 'David ', 'Vimeiro', 2, 0, 1),
(61, 'David ', 'Oporto', 3, 0, 2),
(62, 'David ', 'Talavera', 4, 1, 0),
(63, 'David ', 'Bussaco', 5, 1, 0),
(64, 'AndyC', 'Mondego Bay', 0, 1, 0),
(65, 'AndyC', 'Rolica', 1, 0, 1),
(66, 'AndyC', 'Vimeiro', 2, 1, 0),
(67, 'AndyC', 'Oporto', 3, 0, 0),
(74, 'Matthew', 'Rolica', 1, 0, 1),
(75, 'Crittall', 'Mondego Bay', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Talavera`
--

CREATE TABLE IF NOT EXISTS `Talavera` (
  `questionid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(150) NOT NULL,
  `choice1` varchar(150) NOT NULL,
  `choice2` varchar(150) NOT NULL,
  `choice3` varchar(150) NOT NULL,
  `answer` varchar(150) NOT NULL,
  `explanation` mediumtext,
  PRIMARY KEY (`questionid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `Talavera`
--

INSERT INTO `Talavera` (`questionid`, `name`, `choice1`, `choice2`, `choice3`, `answer`, `explanation`) VALUES
(7, 'Who was Sir Arthur Wellesley''s opponent at the Battle of Talavera?', 'Marshal Nicolos Soalt ', 'Marshal Claude Victor ', 'Horatio Nelson', 'Marshal Claude Victor ', 'Marshal Claude Victor was Sir Arthur Wellesley''s opponent at the Battle of Talavera');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `admin` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email_address`, `hash`, `institution`, `admin`) VALUES
(12, 'Matthew', 'drcrittall@gmail.com', '$2y$10$Xfx7PIdIuJtnN5W8trQdb.g/KsV2Lia7PVi7iOTRhwu9qKA.1KLBe', 'The University of Bath ', 'yes'),
(14, 'Bob', 'bobby', '$2y$10/ikcUw85..4rLGt0K9vO2cA5hOKZ.pU0Nz9fxtQXC', 'The University of Somerville ', ''),
(16, 'Henry', 'henry@gmail.com', '$2y$10/xuXTyb5IDW.oV11MiPbLgxsQaqOMSZUSnzzbxqWmfO', 'The University of Bath', ''),
(17, 'James ', 'drcrittall@gmail.com', '$2y$10$Xfx7PIdIuJtnN5W8trQdb.g/KsV2Lia7PVi7iOTRhwu9qKA.1KLBe', 'UCLA', 'yes'),
(18, 'David ', 'david@harvard.co.uk ', '$2y$10$4o1jDSLqhjwTSVe5iCfbbOodkttr/r/tlJHa1GpkYI.Kum5p9OAqG', 'Harvard', 'yes'),
(19, 'AndyC', 'andy.crittall@btinternet.com', '$2y$10$.7jtRo5XFuiGESozDGmyceEVwGpbG5Hm1tlwDRWHCluFXxBTC836.', 'Bedlam', 'yes'),
(21, 'Crittall', 'drcrittall@gmail.com', '$2y$10$kctjEPBCMRux4nRbfcSyX.DwRsUzpqH.O5ihsj3wxCVk7CBaZNS0m', 'University of Bath', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `Vimeiro`
--

CREATE TABLE IF NOT EXISTS `Vimeiro` (
  `questionid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(150) NOT NULL,
  `choice1` varchar(150) NOT NULL,
  `choice2` varchar(150) NOT NULL,
  `choice3` varchar(150) NOT NULL,
  `answer` varchar(150) NOT NULL,
  `explanation` mediumtext,
  PRIMARY KEY (`questionid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `Vimeiro`
--

INSERT INTO `Vimeiro` (`questionid`, `name`, `choice1`, `choice2`, `choice3`, `answer`, `explanation`) VALUES
(7, 'Who was Sir Arthur Wellesley''s opponent at the Battle of  Vimeiro?', 'Napoleon', 'Major-General Jean-Andoche Junot ', 'Marshal Ney', 'Major-General Jean-Andoche Junot ', 'Major-General Jean-Andoche Junot was Sir Arthur Wellesley''s opponent at the Battle of Vimeiro');

-- --------------------------------------------------------

--
-- Table structure for table `Vitoria`
--

CREATE TABLE IF NOT EXISTS `Vitoria` (
  `questionid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(150) NOT NULL,
  `choice1` varchar(150) NOT NULL,
  `choice2` varchar(150) NOT NULL,
  `choice3` varchar(150) NOT NULL,
  `answer` varchar(150) NOT NULL,
  `explanation` mediumtext,
  PRIMARY KEY (`questionid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `Vitoria`
--

INSERT INTO `Vitoria` (`questionid`, `name`, `choice1`, `choice2`, `choice3`, `answer`, `explanation`) VALUES
(7, 'Which Bonaparte narrowly escaped the battle?', 'Napoleon', 'Julia', 'Joseph', 'Joseph', ' Joseph Bonaparte, erstwhile King of Spain, narrowly escaped');

-- --------------------------------------------------------

--
-- Table structure for table `Waterloo`
--

CREATE TABLE IF NOT EXISTS `Waterloo` (
  `questionid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(150) NOT NULL,
  `choice1` varchar(150) NOT NULL,
  `choice2` varchar(150) NOT NULL,
  `choice3` varchar(150) NOT NULL,
  `answer` varchar(150) NOT NULL,
  `explanation` mediumtext,
  PRIMARY KEY (`questionid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `Waterloo`
--

INSERT INTO `Waterloo` (`questionid`, `name`, `choice1`, `choice2`, `choice3`, `answer`, `explanation`) VALUES
(7, 'Which General came to Wellington''s aid at the climax of the Battle of Waterloo?', 'Horatio Nelson', 'General "Daddy" Hill', 'Gebhard Leberecht von Blucher', 'Gebhard Leberecht von BlÃƒÂ¼cher', 'Gebhard Leberecht von Blucher arrived to apply pressure to Napoleon''s right flank and save the British centre from destruction...');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
