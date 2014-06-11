-- phpMyAdmin SQL Dump
-- version 4.1.9
-- http://www.phpmyadmin.net
--
-- Client :  mysql51-121.perso
-- Généré le :  Mer 11 Juin 2014 à 14:35
-- Version du serveur :  5.1.73-1.1+squeeze+build0+1-log
-- Version de PHP :  5.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `sarahbrersport`
--

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE IF NOT EXISTS `evenement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_membres` int(11) NOT NULL,
  `sport` varchar(100) NOT NULL,
  `dates` date NOT NULL,
  `heure` time NOT NULL,
  `difficulte` varchar(100) NOT NULL,
  `nombre` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `confidentialite` varchar(100) NOT NULL,
  `commentaire` varchar(600) NOT NULL,
  `adresse` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=74 ;

--
-- Contenu de la table `evenement`
--

INSERT INTO `evenement` (`id`, `id_membres`, `sport`, `dates`, `heure`, `difficulte`, `nombre`, `type`, `confidentialite`, `commentaire`, `adresse`) VALUES
(48, 19, 'rugby', '2014-05-11', '13:20:00', 'Amateur', 22, 'Amical', 'Prive', 'Attention, les équipements ne sont pas fourni.', 'Rue du grand pr&eacute; 32'),
(49, 8, 'hockey', '2014-05-25', '20:00:00', 'Professionel', 20, 'Match', 'Public', 'Niveau requis : R2', 'Avenue Charles Schaller 127'),
(51, 19, 'foot', '2014-05-14', '20:30:00', 'Amateur', 20, 'Amical', 'Prive', '', 'Boulevard Général Jacques 238'),
(53, 8, 'tennis', '2014-05-07', '18:00:00', 'Amateur', 4, 'Amical', 'Prive', '', ''),
(54, 3, 'basket', '2014-06-19', '10:00:00', 'Amateur', 10, 'Amical', 'Prive', 'Match amical contre USH3', 'Avenue Jan Van Ruusbroeck 38'),
(55, 3, 'hockey', '2014-05-15', '23:00:00', 'Amateur', 0, 'Amical', 'Prive', 'Parc - RWST', 'Avenue des anciens combattant 35'),
(58, 19, 'tennis', '2014-05-29', '13:20:00', 'Professionel', 2, 'Amical', 'Prive', 'Juste envie de taper la balle...', 'Centre sportif Woluwe '),
(73, 17, 'rugby', '2014-06-27', '15:30:00', 'Amateur', 16, 'Amical', 'Prive', '', 'Royal White Star Woluwe FC, Chemin du Struykbeken, Woluwe-Saint-Lambert, Belgique');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(80) NOT NULL,
  `prenom` varchar(80) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `actif` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`id`, `nom`, `prenom`, `email`, `password`, `hash`, `actif`) VALUES
(2, 'Maes', 'St&eacute;phanie', 'stephanie.maes60@gmail.com', '2475e8ed52933fe4c0960ab46cfb6b82', 'a28c1a5bef293e73d36649706fea7455', 1),
(3, 'Breemans', 'Arnaud', 'arnaud_breemans@hotmail.com', 'e81f00fcf2966d518dcf4a38d0ff246c', '5c79b9720a96663b70c35a419d2245cd', 1),
(6, 'Piron', 'Steve', 'piron.steve@gmail.com', '2d4d651bf4588936f6fb881a46373dc9', 'eb17b83a177410e8c839fbfe5ab00e37', 1),
(8, 'Dwm', 'Professeur', 'dwm', 'c3445c594d3983b8c4db28a559111854', '242e152169333533aeda06e5262dfe46', 1),
(12, 'Thomas', 'DM', 'thomas.dimartino@gmail.com', 'fc5e038d38a57032085441e7fe7010b0', '4c8c6f5fb754e2facc8ab6bb1474dbde', 1),
(14, 'pixou', 'linou', 'alexandre@pixeline.be', 'd0bafb7185f2acfd371c566cbae25af9', '83809c99d15314f4cbb10fffb9dd76c4', 1),
(17, 'Dwm', 'Jury', 'tfedwm14', '631f3b1d21d3adcef7ef78fce1737fb8', '3c96b3f377b356680490abd235652501', 1),
(19, 'Breemans', 'Sarah', 'sarah.breemans@gmail.com', 'f02368945726d5fc2a14eb576f7276c0', '45e2671cd1aaf5dbc03b05ecb37d7b70', 1);

-- --------------------------------------------------------

--
-- Structure de la table `participation`
--

CREATE TABLE IF NOT EXISTS `participation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `id_membres` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `participation`
--

INSERT INTO `participation` (`id`, `event_id`, `id_membres`) VALUES
(1, 59, 8),
(2, 73, 7);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
