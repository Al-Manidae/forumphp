-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 20 nov. 2023 à 10:13
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `forum`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idCat` int NOT NULL AUTO_INCREMENT,
  `nameCat` varchar(50) NOT NULL,
  PRIMARY KEY (`idCat`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idCat`, `nameCat`) VALUES
(1, 'Fer et Chrome'),
(2, 'Boulots de Merc'),
(3, 'Quotidien');

-- --------------------------------------------------------

--
-- Structure de la table `discution`
--

DROP TABLE IF EXISTS `discution`;
CREATE TABLE IF NOT EXISTS `discution` (
  `idDiscu` int NOT NULL AUTO_INCREMENT,
  `nameDiscu` varchar(50) NOT NULL,
  `timeStartDiscu` datetime NOT NULL,
  `idCat` int NOT NULL,
  `idUser` int NOT NULL,
  PRIMARY KEY (`idDiscu`),
  KEY `idCat` (`idCat`),
  KEY `idUser` (`idUser`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `idMsg` int NOT NULL AUTO_INCREMENT,
  `timeMsg` datetime NOT NULL,
  `contentMsg` varchar(50) NOT NULL,
  `idDiscu` int NOT NULL,
  `idUser` int NOT NULL,
  PRIMARY KEY (`idMsg`),
  KEY `idDiscu` (`idDiscu`),
  KEY `idUser` (`idUser`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUser` int NOT NULL AUTO_INCREMENT,
  `nomUser` varchar(50) NOT NULL,
  `prenomUser` varchar(50) NOT NULL,
  `mailUser` varchar(50) NOT NULL,
  `mdpUser` varchar(50) NOT NULL,
  `profilePictureUser` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
