-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 11, 2017 at 09:40 PM
-- Server version: 5.5.54-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `JQwarsztaty`
--

-- --------------------------------------------------------

--
-- Table structure for table `Book`
--

CREATE TABLE IF NOT EXISTS `Book` (
  `id` int(144) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `Book`
--

INSERT INTO `Book` (`id`, `name`, `autor`, `description`) VALUES
(1, 'Potop', 'Sienkiewicz', 'interesujÄ…ca'),
(2, 'zemsta', 'Fredro', 'dramat'),
(5, 'o krasnoludkach i sierotce Marysi', 'Maria Konopnicka', 'nowela'),
(9, 'ChÅ‚opi', 'WÅ‚adysÅ‚aw Reymont', 'epopeja chÅ‚opska'),
(10, 'Wojna i PokÃ³j', 'Lew ToÅ‚stoj', 'powieÅ›Ä‡'),
(11, 'Kamizelka', 'BolesÅ‚aw Prus', 'nowela'),
(13, 'jerzy urban', 'jerzy urban', 'nowela');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
