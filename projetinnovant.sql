-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2016 at 11:54 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `projetinnovant`
--

-- --------------------------------------------------------

--
-- Table structure for table `groupe_projet`
--

CREATE TABLE IF NOT EXISTS `groupe_projet` (
  `id` int(11) NOT NULL,
  `id_coach` int(11) NOT NULL,
  `id_personne` int(11) NOT NULL,
  `id_projet` int(11) DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `delete_at` date NOT NULL,
  PRIMARY KEY (`id_personne`),
  UNIQUE KEY `id_personne` (`id_personne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE IF NOT EXISTS `meeting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `conte_rendu` text NOT NULL,
  `note` int(11) NOT NULL,
  `baromètre` varchar(250) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `deleted_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `personne`
--

CREATE TABLE IF NOT EXISTS `personne` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(10) NOT NULL,
  `password` varchar(15) DEFAULT NULL,
  `mail` varchar(250) NOT NULL,
  `role` int(11) NOT NULL,
  `skype` varchar(50) NOT NULL,
  `promotion` int(11) NOT NULL,
  `id_group` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `personne`
--

INSERT INTO `personne` (`id`, `login`, `password`, `mail`, `role`, `skype`, `promotion`, `id_group`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'alevy', 'test', 'levy_a@etna-alternance.net', 2, 'alevy_etna', 2018, NULL, '2016-01-04 09:00:00', '2016-01-04 09:00:00', '0000-00-00'),
(2, 'marion_t', NULL, 'mariont_t@etna-alternance.net', 0, '', 2020, NULL, '2016-01-08 09:00:00', '2016-01-08 09:00:00', '0000-00-00'),
(3, 'levy_a', 'toto', 'levy_a@etna-alternance.net', 1, 'test', 2018, NULL, '2016-01-08 18:00:00', '2016-01-08 18:00:00', '0000-00-00'),
(4, 'nicola_m', NULL, 'nicola_m@etna-alternance.net', 0, '', 2020, NULL, '2016-01-11 09:00:00', '2016-01-11 09:00:00', '0000-00-00'),
(5, 'meurin_r', NULL, 'meurin_r@etna-alternance.net', 0, '', 2020, NULL, '2016-01-11 00:00:00', '2016-01-11 00:00:00', '0000-00-00'),
(6, 'marzi_n', NULL, 'meurin_r@etna-alternance.net', 0, '', 2020, NULL, '2016-01-11 00:00:00', '2016-01-11 00:00:00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `projet`
--

CREATE TABLE IF NOT EXISTS `projet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_group` int(11) NOT NULL,
  `id_coach` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `descriptif` text,
  `tag` text,
  `status_projet` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `deleted_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
