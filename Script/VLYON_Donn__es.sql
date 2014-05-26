-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 26 Mai 2014 à 22:02
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

-- --------------------------------------------------------

--
-- Structure de la table `ETAT`
--

CREATE TABLE `ETAT` (
  `ETA_CODE` char(10) NOT NULL,
  `ETA_LIBELLE` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ETA_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Structure de la table `QUARTIER`
--

CREATE TABLE `QUARTIER` (
  `QUA_ID` varchar(15) NOT NULL,
  `QUA_LIB` varchar(100) NOT NULL,
  PRIMARY KEY (`QUA_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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