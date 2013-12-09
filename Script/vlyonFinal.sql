-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 06 Décembre 2013 à 23:21
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `VLYON`
--
CREATE DATABASE IF NOT EXISTS `VLYON` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `VLYON`;

-- --------------------------------------------------------

--
-- Structure de la table `BONINTERV`
--

CREATE TABLE IF NOT EXISTS `BONINTERV` (
  `BI_NUM` int(10) NOT NULL,
  `BI_VELO` char(5) NOT NULL,
  `BI_DATDEBUT` date DEFAULT NULL,
  `BI_DATFIN` date DEFAULT NULL,
  `BI_CPTERENDU` varchar(100) DEFAULT NULL,
  `BI_REPARABLE` char(1) DEFAULT NULL,
  `BI_DEMANDE` char(5) DEFAULT NULL,
  `BI_TECHNICIEN` char(5) NOT NULL,
  `BI_SURPLACE` char(1) DEFAULT NULL,
  `BI_DUREE` int(5) DEFAULT NULL,
  PRIMARY KEY (`BI_NUM`),
  KEY `CONCERNER_FK` (`BI_VELO`),
  KEY `EXECUTER_FK2` (`BI_DEMANDE`),
  KEY `REALISER_FK` (`BI_TECHNICIEN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `BONINTERV`
--

INSERT INTO `BONINTERV` (`BI_NUM`, `BI_VELO`, `BI_DATDEBUT`, `BI_DATFIN`, `BI_CPTERENDU`, `BI_REPARABLE`, `BI_DEMANDE`, `BI_TECHNICIEN`, `BI_SURPLACE`, `BI_DUREE`) VALUES
(1, '1', '2013-12-05', '2013-12-13', 'test2', '0', '0', '1', '0', 11),
(2, '3', '2013-12-05', '2013-12-19', '4', '0', '1', '1', '0', 1);

-- --------------------------------------------------------

--
-- Structure de la table `COMMANDE`
--

CREATE TABLE IF NOT EXISTS `COMMANDE` (
  `COM_CODE` char(5) NOT NULL,
  `COM_DATE` date DEFAULT NULL,
  `COM_QTE` int(2) DEFAULT NULL,
  `COM_VALIDE` tinyint(1) DEFAULT NULL,
  `COM_PRODUIT` char(6) NOT NULL,
  PRIMARY KEY (`COM_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `COMMANDE`
--

INSERT INTO `COMMANDE` (`COM_CODE`, `COM_DATE`, `COM_QTE`, `COM_VALIDE`, `COM_PRODUIT`) VALUES
('1', '2013-12-07', 3, 1, '1'),
('2', '2013-12-06', 2, 0, '2'),
('3', '2013-12-06', 3, 0, '2');

-- --------------------------------------------------------

--
-- Structure de la table `DEMANDEINTER`
--

CREATE TABLE IF NOT EXISTS `DEMANDEINTER` (
  `DEMI_NUM` int(5) NOT NULL,
  `DEMI_VELO` char(5) NOT NULL,
  `DEMI_DATE` date DEFAULT NULL,
  `DEMI_TECHNICIEN` char(5) NOT NULL,
  `DEMI_MOTIF` varchar(50) DEFAULT NULL,
  `DEMI_TRAITE` char(1) DEFAULT NULL,
  `DEMI_STATION` varchar(10) NOT NULL,
  `DEMI_ATTACHE` varchar(3) NOT NULL,
  `DEMI_VALIDE` tinyint(1) NOT NULL,
  PRIMARY KEY (`DEMI_NUM`),
  KEY `CORRESPONDRE_FK` (`DEMI_VELO`),
  KEY `REDIGER_FK` (`DEMI_TECHNICIEN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `DEMANDEINTER`
--

INSERT INTO `DEMANDEINTER` (`DEMI_NUM`, `DEMI_VELO`, `DEMI_DATE`, `DEMI_TECHNICIEN`, `DEMI_MOTIF`, `DEMI_TRAITE`, `DEMI_STATION`, `DEMI_ATTACHE`, `DEMI_VALIDE`) VALUES
(1, '1', '2013-12-03', '1', '', '0', '', '', 0),
(2, '1', '2013-12-03', '1', 'test', '0', '1', '6', 0),
(3, '1', '2013-12-03', '1', 'test2\r\n', '0', '1', '5', 1),
(4, '5', '2013-12-04', '1', 'test', '0', '1', '9', 0);

-- --------------------------------------------------------

--
-- Structure de la table `ETAT`
--

CREATE TABLE IF NOT EXISTS `ETAT` (
  `ETA_CODE` char(10) NOT NULL,
  `ETA_LIBELLE` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ETA_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ETAT`
--

INSERT INTO `ETAT` (`ETA_CODE`, `ETA_LIBELLE`) VALUES
('1', 'Hs'),
('2', 'Fonctionnel');

-- --------------------------------------------------------

--
-- Structure de la table `PRODUIT`
--

CREATE TABLE IF NOT EXISTS `PRODUIT` (
  `PDT_CODE` char(6) NOT NULL,
  `PDT_LIBELLE` varchar(30) DEFAULT NULL,
  `PDT_POIDS` int(10) DEFAULT NULL,
  `PDT_PXCMUP` float(6,2) DEFAULT NULL,
  `PDT_QTESTK` int(10) DEFAULT NULL,
  `PDT_NBVOLS` int(5) DEFAULT NULL,
  `PDT_NBCASSES` int(5) DEFAULT NULL,
  PRIMARY KEY (`PDT_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `PRODUIT`
--

INSERT INTO `PRODUIT` (`PDT_CODE`, `PDT_LIBELLE`, `PDT_POIDS`, `PDT_PXCMUP`, `PDT_QTESTK`, `PDT_NBVOLS`, `PDT_NBCASSES`) VALUES
('1', 'Selle', 2, 10.00, 2, 0, 0),
('2', 'Guidon', 5, 50.00, 1, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `QUARTIER`
--

CREATE TABLE IF NOT EXISTS `QUARTIER` (
  `QUA_ID` varchar(15) NOT NULL,
  `QUA_LIB` varchar(100) NOT NULL,
  PRIMARY KEY (`QUA_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `QUARTIER`
--

INSERT INTO `QUARTIER` (`QUA_ID`, `QUA_LIB`) VALUES
('1', 'Test'),
('2', 'Champs de Mars');

-- --------------------------------------------------------

--
-- Structure de la table `STATION`
--

CREATE TABLE IF NOT EXISTS `STATION` (
  `STA_CODE` char(5) NOT NULL,
  `STA_NOM` varchar(30) DEFAULT NULL,
  `STA_RUE` varchar(50) DEFAULT NULL,
  `STA_NBATTACHES` int(2) DEFAULT NULL,
  `STA_NBVELOS` int(2) DEFAULT NULL,
  `STA_NBATTACDISPO` int(2) DEFAULT NULL,
  `STA_NBTOTLOC` int(10) DEFAULT NULL,
  `STA_NBVOLS` int(5) DEFAULT NULL,
  `STA_NBDEGRAD` int(5) DEFAULT NULL,
  `STA_QUARTIER` varchar(15) NOT NULL,
  PRIMARY KEY (`STA_CODE`),
  KEY `STA_QUARTIER` (`STA_QUARTIER`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `STATION`
--

INSERT INTO `STATION` (`STA_CODE`, `STA_NOM`, `STA_RUE`, `STA_NBATTACHES`, `STA_NBVELOS`, `STA_NBATTACDISPO`, `STA_NBTOTLOC`, `STA_NBVOLS`, `STA_NBDEGRAD`, `STA_QUARTIER`) VALUES
('1', 'Paradis', '34 rue de', 10, 5, 5, 10, 1, 1, '1'),
('2', 'Test', '34 rue de', 10, 5, 5, 10, 1, 1, '2');

-- --------------------------------------------------------

--
-- Structure de la table `TECHNICIEN`
--

CREATE TABLE IF NOT EXISTS `TECHNICIEN` (
  `TEC_MATRICULE` char(5) NOT NULL,
  `TEC_NOM` varchar(35) DEFAULT NULL,
  `TEC_PRENOM` varchar(35) DEFAULT NULL,
  `TEC_PWD` varchar(40) NOT NULL,
  `TEC_RESPONSABLE` tinyint(1) NOT NULL,
  PRIMARY KEY (`TEC_MATRICULE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `TECHNICIEN`
--

INSERT INTO `TECHNICIEN` (`TEC_MATRICULE`, `TEC_NOM`, `TEC_PRENOM`, `TEC_PWD`, `TEC_RESPONSABLE`) VALUES
('1', 'test', 'test', '356a192b7913b04c54574d18c28d46e6395428ab', 0),
('2', 'test', 'test', '356a192b7913b04c54574d18c28d46e6395428ab', 1),
('test', 'test', 'test', '098f6bcd4621d373cade4e832627b4f6', 1);

-- --------------------------------------------------------

--
-- Structure de la table `VELO`
--

CREATE TABLE IF NOT EXISTS `VELO` (
  `VEL_NUM` char(5) NOT NULL,
  `VEL_STATION` char(5) DEFAULT NULL,
  `VEL_ETAT` char(10) NOT NULL,
  `VEL_TYPE` char(6) NOT NULL,
  `VEL_ACCESSOIRE` varchar(20) DEFAULT NULL,
  `VEL_CASSE` char(1) DEFAULT NULL,
  PRIMARY KEY (`VEL_NUM`),
  KEY `POSITIONNER_FK` (`VEL_STATION`),
  KEY `AVOIR_FK` (`VEL_ETAT`),
  KEY `APPARTENIR_FK` (`VEL_TYPE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `VELO`
--

INSERT INTO `VELO` (`VEL_NUM`, `VEL_STATION`, `VEL_ETAT`, `VEL_TYPE`, `VEL_ACCESSOIRE`, `VEL_CASSE`) VALUES
('1', '1', '1', '1', NULL, '0'),
('2', '1', '2', '1', NULL, '0');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `QUARTIER`
--
ALTER TABLE `QUARTIER`
  ADD CONSTRAINT `FK_STA_QUA` FOREIGN KEY (`QUA_ID`) REFERENCES `STATION` (`STA_QUARTIER`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
