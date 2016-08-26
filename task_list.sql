-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Oct 28, 2014 at 04:39 PM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;


--
-- Insert Into table `tasks`
--


INSERT INTO `todolistdb`.`tasks` (
`id`, 
`task`, 
`date`, 
`time`, 
`comment`
) 
VALUES (
'1', 
'Script by', 
'2016-01-22', 
'09:00:00', 
'Gianluca'), 
('2', 
'Wo sind die', 
'2016-01-22', 
'12:00:00', 
'FEHLER!?!');