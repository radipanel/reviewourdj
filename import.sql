-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 13, 2010 at 09:19 PM
-- Server version: 5.0.90
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(255) NOT NULL auto_increment,
  `habbo` varchar(255) collate latin1_general_ci NOT NULL,
  `dj` int(12) NOT NULL,
  `review` text collate latin1_general_ci NOT NULL,
  `ip` varchar(15) collate latin1_general_ci NOT NULL,
  `time` int(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;
