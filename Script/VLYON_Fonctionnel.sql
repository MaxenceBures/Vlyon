-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 26 Mai 2014 à 22:01
-- Version du serveur: 5.5.33
-- Version de PHP: 5.4.19

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

CREATE TABLE `BONINTERV` (
  `BI_NUM` int(10) NOT NULL,
  `BI_VELO` char(5) NOT NULL,
  `BI_DATDEBUT` date DEFAULT NULL,
  `BI_DATFIN` date DEFAULT NULL,
  `BI_CPTERENDU` varchar(100) DEFAULT NULL,
  `BI_REPARABLE` char(1) DEFAULT NULL,
  `BI_DEMANDE` char(1) DEFAULT NULL,
  `BI_TECHNICIEN` char(5) NOT NULL,
  `BI_SURPLACE` char(1) DEFAULT NULL,
  `BI_DUREE` int(5) DEFAULT NULL,
  PRIMARY KEY (`BI_NUM`),
  KEY `CONCERNER_FK` (`BI_VELO`),
  KEY `EXECUTER_FK2` (`BI_DEMANDE`),
  KEY `REALISER_FK` (`BI_TECHNICIEN`),
  KEY `BI_TECHNICIEN` (`BI_TECHNICIEN`),
  KEY `BI_VELO` (`BI_VELO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `BONINTERV`
--

INSERT INTO `BONINTERV` (`BI_NUM`, `BI_VELO`, `BI_DATDEBUT`, `BI_DATFIN`, `BI_CPTERENDU`, `BI_REPARABLE`, `BI_DEMANDE`, `BI_TECHNICIEN`, `BI_SURPLACE`, `BI_DUREE`) VALUES
(1, '1', '2013-12-05', '2014-05-24', 'Mise en place d''un guidon', '0', '0', '1', '0', 10),
(2, '2', '2014-05-26', '2014-05-26', 'Reparation du cadre', '0', '0', '1', '0', 1);

-- --------------------------------------------------------

--
-- Structure de la table `COMMANDE`
--

CREATE TABLE `COMMANDE` (
  `COM_CODE` int(5) NOT NULL,
  `COM_DATE` date DEFAULT NULL,
  `COM_QTE` int(2) DEFAULT NULL,
  `COM_VALIDE` tinyint(1) DEFAULT NULL,
  `COM_PRODUIT` char(6) NOT NULL,
  PRIMARY KEY (`COM_CODE`),
  KEY `COM_PRODUIT` (`COM_PRODUIT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `COMMANDE`
--

INSERT INTO `COMMANDE` (`COM_CODE`, `COM_DATE`, `COM_QTE`, `COM_VALIDE`, `COM_PRODUIT`) VALUES
(1, '2013-12-07', 300, 1, '1'),
(2, '2013-12-06', 2, 0, '2'),
(3, '2014-05-26', 50, 0, '2'),
(4, '2014-05-26', 10, 0, '3'),
(5, '2014-05-26', 15, 0, '5'),
(6, '2014-05-26', 50, 0, '4');

-- --------------------------------------------------------

--
-- Structure de la table `DEMANDEINTER`
--

CREATE TABLE `DEMANDEINTER` (
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
  KEY `REDIGER_FK` (`DEMI_TECHNICIEN`),
  KEY `DEMI_STATION` (`DEMI_STATION`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `DEMANDEINTER`
--

INSERT INTO `DEMANDEINTER` (`DEMI_NUM`, `DEMI_VELO`, `DEMI_DATE`, `DEMI_TECHNICIEN`, `DEMI_MOTIF`, `DEMI_TRAITE`, `DEMI_STATION`, `DEMI_ATTACHE`, `DEMI_VALIDE`) VALUES
(1, '1', '2013-12-03', '1', 'Guidon perdu', '1', '1', '', 0),
(2, '2', '2014-05-21', '1', 'Test', '0', '2', '2', 0),
(3, '3', '2014-05-26', '1', 'Chaine cassÃ©e', '1', '1', '10', 0),
(4, '4', '2014-05-26', '1', 'Guidon cassÃ© 0', '0', '1', '6', 1),
(5, '2', '2014-05-26', '1', 'Cadre degradÃ©', '0', '3', '8', 1),
(6, '6', '2014-05-26', '1', 'Pneu crevé', '1', '3', '3', 1),
(7, '5', '2014-05-26', '1', 'Pneu crevÃ©', '0', '2', '5', 1),
(8, '1', '2014-05-26', '1', 'Guidon volÃ©', '0', '2', '2', 1),
(9, '3', '2014-05-26', '1', 'Velo vandalisÃ©', '0', '1', '7', 1);

-- --------------------------------------------------------

--
-- Structure de la table `ETAT`
--

CREATE TABLE `ETAT` (
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

CREATE TABLE `PRODUIT` (
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
('2', 'Guidon', 5, 50.00, 1, 0, 0),
('3', 'Gourde', 1, 10.00, 10, 0, 0),
('4', 'Pneu', 1, 10.00, 10, 0, 0),
('5', 'Sonnette', 1, 10.00, 10, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `QUARTIER`
--

CREATE TABLE `QUARTIER` (
  `QUA_ID` varchar(15) NOT NULL,
  `QUA_LIB` varchar(100) NOT NULL,
  PRIMARY KEY (`QUA_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `QUARTIER`
--

INSERT INTO `QUARTIER` (`QUA_ID`, `QUA_LIB`) VALUES
('1', 'Saint Michel'),
('2', 'Champs de Mars');

-- --------------------------------------------------------

--
-- Structure de la table `STATION`
--

CREATE TABLE `STATION` (
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
('2', 'Belleville', '34 rue de', 10, 5, 5, 10, 1, 1, '2'),
('3', 'Charles de Gaulle', '34 rue de', 10, 5, 5, 10, 1, 1, '2');

-- --------------------------------------------------------

--
-- Structure de la table `TECHNICIEN`
--

CREATE TABLE `TECHNICIEN` (
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
('1', 'Paul', 'Jean', '5548601576d71facb282c1ae80a67fac38387288', 0),
('2', 'Bures', 'Maxence', '356a192b7913b04c54574d18c28d46e6395428ab', 0),
('admin', 'Pierre', 'Eric', '0b234356bd8bb1501f701a31e18dbe19f84aba6a', 1),
('test', 'test', 'test', '098f6bcd4621d373cade4e832627b4f6', 1);

-- --------------------------------------------------------

--
-- Structure de la table `VELO`
--

CREATE TABLE `VELO` (
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
('2', '1', '1', '1', NULL, '0'),
('3', '1', '2', '1', NULL, '0'),
('4', '1', '1', '1', NULL, '0'),
('5', '1', '1', '1', NULL, '0'),
('6', '1', '2', '1', NULL, '0'),
('7', '1', '2', '1', NULL, '0');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `BONINTERV`
--
ALTER TABLE `BONINTERV`
  ADD CONSTRAINT `FK_BI_TECH` FOREIGN KEY (`BI_TECHNICIEN`) REFERENCES `TECHNICIEN` (`TEC_MATRICULE`),
  ADD CONSTRAINT `FK_BI_VELO` FOREIGN KEY (`BI_VELO`) REFERENCES `VELO` (`VEL_NUM`);

--
-- Contraintes pour la table `COMMANDE`
--
ALTER TABLE `COMMANDE`
  ADD CONSTRAINT `FK_COM_PROD` FOREIGN KEY (`COM_PRODUIT`) REFERENCES `PRODUIT` (`PDT_CODE`);

--
-- Contraintes pour la table `DEMANDEINTER`
--
ALTER TABLE `DEMANDEINTER`
  ADD CONSTRAINT `FK_DEMI_STAT` FOREIGN KEY (`DEMI_STATION`) REFERENCES `STATION` (`STA_CODE`),
  ADD CONSTRAINT `FK_DEMI_TECH` FOREIGN KEY (`DEMI_TECHNICIEN`) REFERENCES `TECHNICIEN` (`TEC_MATRICULE`),
  ADD CONSTRAINT `FK_DEMI_VELO` FOREIGN KEY (`DEMI_VELO`) REFERENCES `VELO` (`VEL_NUM`);

--
-- Contraintes pour la table `QUARTIER`
--
ALTER TABLE `QUARTIER`
  ADD CONSTRAINT `FK_STA_QUA` FOREIGN KEY (`QUA_ID`) REFERENCES `STATION` (`STA_QUARTIER`);

--
-- Contraintes pour la table `STATION`
--
ALTER TABLE `STATION`
  ADD CONSTRAINT `FK_QUAR_STAT` FOREIGN KEY (`STA_QUARTIER`) REFERENCES `QUARTIER` (`QUA_ID`);

--
-- Contraintes pour la table `VELO`
--
ALTER TABLE `VELO`
  ADD CONSTRAINT `FK_VELO_ETAT` FOREIGN KEY (`VEL_ETAT`) REFERENCES `ETAT` (`ETA_CODE`),
  ADD CONSTRAINT `FK_VELO_STAT` FOREIGN KEY (`VEL_STATION`) REFERENCES `STATION` (`STA_CODE`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
