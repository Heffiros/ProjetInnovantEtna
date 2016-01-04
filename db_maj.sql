
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 09, 2015 at 02:49 PM
-- Server version: 10.0.22-MariaDB
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u679361987_esti`
--

-- --------------------------------------------------------

--
-- Table structure for table `esti_beacon`
--

CREATE TABLE IF NOT EXISTS `esti_beacon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `beacon_ref` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `type` int(11) NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `esti_beacon`
--

INSERT INTO `esti_beacon` (`id`, `beacon_ref`, `name`, `user_id`, `content`, `type`, `created`) VALUES
(1, '3331_6661', 'Bleu foncé', 3, '<!DOCTYPE html>\r\n<html lang="fr">\r\n\r\n<head>\r\n\r\n    <meta charset="utf-8">\r\n    <meta http-equiv="X-UA-Compatible" content="IE=edge">\r\n    <meta name="viewport" content="width=device-width, initial-scale=1">\r\n    <meta name="description" content="">\r\n    <meta name="author" content="">\r\n\r\n    <title>Accueil</title>\r\n\r\n   <!--  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">\r\n    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css"> -->\r\n\r\n</head>\r\n\r\n<body>\r\n\r\n<div class="calque">\r\n\r\n</div>\r\n\r\n<div class="content">\r\n    <h1 style="font-size: 250%;color: #A6E4CF;">ESTITRACKER Yollooo</h1>\r\n    <h2 style="color: #9AD9FC;">La nouvelle interface B2C</h2>\r\n</div>\r\n\r\n<style type="text/css">\r\n    .calque {\r\n    width: 100%;\r\n    height: 100%;\r\n    background-color: rgba(0, 0, 0, 1);\r\n    position: absolute;\r\n}\r\nbody {\r\n    width: 100%;\r\n    height: 100%;\r\n    position: fixed;\r\n    margin: 0;\r\n}\r\n.content {\r\n    width: 100%;\r\n    height: 100%;\r\n    color: white;\r\n    position: relative;\r\n    text-align: center;\r\n    margin-top: 60%;\r\n}\r\n</style>\r\n\r\n</body>\r\n</html>', 3, '2015-11-26'),
(10, '3333_6663', 'Bleu clair', 3, '', 1, '2015-11-30'),
(11, '3332_6662', 'Vert', 3, '', 2, '2015-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `esti_client`
--

CREATE TABLE IF NOT EXISTS `esti_client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_created` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `esti_client`
--

INSERT INTO `esti_client` (`id`, `mail`, `password`, `date_created`) VALUES
(6, 'toto@gmail.com', 'alex1994', '2015-11-26'),
(7, 'tg@pd.com', 'azertyuiop', '2015-11-30'),
(8, 'soutenance@gmail.com', 'wwwwwwww', '2015-11-30'),
(9, 'a@b.c', 'xxxxxxxx', '2015-12-09');

-- --------------------------------------------------------

--
-- Table structure for table `esti_stat`
--

CREATE TABLE IF NOT EXISTS `esti_stat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `beacon_ref` varchar(255) NOT NULL,
  `date_pass` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `esti_stat`
--

INSERT INTO `esti_stat` (`id`, `client_id`, `beacon_ref`, `date_pass`) VALUES
(12, 6, '3332_6662', '2015-11-28'),
(11, 6, '3332_6662', '2015-11-30'),
(10, 6, '3332_6662', '2015-11-30'),
(9, 7, '3332_6662', '2015-11-29'),
(13, 6, '3332_6662', '2015-11-30'),
(14, 6, '3332_6662', '2015-11-30'),
(15, 6, '3332_6662', '2015-11-30'),
(16, 6, '3332_6662', '2015-11-30'),
(17, 6, '3332_6662', '2015-11-30'),
(18, 6, '3332_6662', '2015-11-30'),
(19, 6, '3332_6662', '2015-11-29'),
(20, 6, '3332_6662', '2015-11-28'),
(21, 6, '3332_6662', '2015-11-28'),
(22, 6, '3332_6662', '2015-11-29'),
(23, 6, '3332_6662', '2015-11-30'),
(24, 6, '3332_6662', '2015-11-28'),
(25, 6, '3332_6662', '2015-11-30'),
(26, 7, '3333_6663', '2015-11-30'),
(27, 8, '3333_6663', '2015-11-30'),
(28, 8, '3333_6663', '2015-11-30'),
(29, 9, '3333_6663', '2015-12-09'),
(30, 9, '3333_6663', '2015-12-09'),
(31, 9, '3333_6663', '2015-12-09'),
(32, 9, '3333_6663', '2015-12-09'),
(33, 9, '3333_6663', '2015-12-09'),
(34, 9, '3333_6663', '2015-12-09'),
(35, 9, '3333_6663', '2015-12-09'),
(36, 9, '3333_6663', '2015-12-09'),
(37, 9, '3333_6663', '2015-12-09');

-- --------------------------------------------------------

--
-- Table structure for table `esti_time`
--

CREATE TABLE IF NOT EXISTS `esti_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `beacon_ref` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `date_pass` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `esti_time`
--

INSERT INTO `esti_time` (`id`, `client_id`, `beacon_ref`, `time`, `date_pass`) VALUES
(1, 7, '3332_6662', 20319, '2015-11-30'),
(2, 7, '3332_6662', 40575, '2015-11-30'),
(4, 6, '3332_6662', 20334, '2015-11-30'),
(5, 5, '3332_6662', 1400, '2015-11-28'),
(6, 5, '3332_6662', 5000, '2015-11-28'),
(7, 7, '3332_6662', 20255, '2015-11-30'),
(8, 7, '3332_6662', 34189, '2015-11-30'),
(9, 7, '3332_6662', 20134, '2015-11-30'),
(10, 8, '3332_6662', 20122, '2015-11-30'),
(11, 9, '3332_6662', 22571, '2015-12-09'),
(12, 9, '3332_6662', 22514, '2015-12-09'),
(13, 9, '3332_6662', 25928, '2015-12-09');

-- --------------------------------------------------------

--
-- Table structure for table `esti_user`
--

CREATE TABLE IF NOT EXISTS `esti_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `esti_user`
--

INSERT INTO `esti_user` (`id`, `mail`, `password`) VALUES
(2, 'vasax.levy@gmail.com', 'alex1994'),
(3, 'soutenance@etna.com', 'xxxxxxxx'),
(4, 'toto@gmail.com', 'alex1994');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
