-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 02 Décembre 2013 à 15:47
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `vlyon`
--
CREATE DATABASE IF NOT EXISTS `vlyon` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `vlyon`;

-- --------------------------------------------------------

--
-- Structure de la table `boninterv`
--

DROP TABLE IF EXISTS `boninterv`;
CREATE TABLE IF NOT EXISTS `boninterv` (
  `BI_Num` int(10) NOT NULL,
  `BI_Velo` char(5) NOT NULL,
  `BI_DatDebut` date DEFAULT NULL,
  `BI_DatFin` date DEFAULT NULL,
  `BI_CpteRendu` varchar(100) DEFAULT NULL,
  `BI_Reparable` char(1) DEFAULT NULL,
  `BI_Demande` char(5) DEFAULT NULL,
  `BI_Technicien` char(5) NOT NULL,
  `BI_SurPlace` char(1) DEFAULT NULL,
  `BI_Duree` int(5) DEFAULT NULL,
  PRIMARY KEY (`BI_Num`),
  KEY `CONCERNER_FK` (`BI_Velo`),
  KEY `EXECUTER_FK2` (`BI_Demande`),
  KEY `REALISER_FK` (`BI_Technicien`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `Com_Code` char(5) NOT NULL,
  `Com_Date` date DEFAULT NULL,
  `Com_Qte` int(2) DEFAULT NULL,
  `Com_Valide` tinyint(1) DEFAULT NULL,
  `Com_Produit` char(6) NOT NULL,
  PRIMARY KEY (`Com_Code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `demandeinter`
--

DROP TABLE IF EXISTS `demandeinter`;
CREATE TABLE IF NOT EXISTS `demandeinter` (
  `DemI_Num` int(5) NOT NULL,
  `DemI_Velo` char(5) NOT NULL,
  `DemI_Date` date DEFAULT NULL,
  `DemI_Technicien` char(5) NOT NULL,
  `DemI_Motif` varchar(50) DEFAULT NULL,
  `DemI_Traite` char(1) DEFAULT NULL,
  `DemI_Station` varchar(10) NOT NULL,
  `DemI_Attache` varchar(3) NOT NULL,
  `DemI_Valide` tinyint(1) NOT NULL,
  PRIMARY KEY (`DemI_Num`),
  KEY `CORRESPONDRE_FK` (`DemI_Velo`),
  KEY `REDIGER_FK` (`DemI_Technicien`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `demandeinter`
--

INSERT INTO `demandeinter` (`DemI_Num`, `DemI_Velo`, `DemI_Date`, `DemI_Technicien`, `DemI_Motif`, `DemI_Traite`, `DemI_Station`, `DemI_Attache`, `DemI_Valide`) VALUES
(1, '1', '2013-12-03', '1', 'test', '0', 'Test', '5', 0),
(2, '1', '2013-12-03', '1', 'test', '0', 'Test2', '5', 1);

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

DROP TABLE IF EXISTS `etat`;
CREATE TABLE IF NOT EXISTS `etat` (
  `Eta_Code` char(10) NOT NULL,
  `Eta_Libelle` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`Eta_Code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etat`
--

INSERT INTO `etat` (`Eta_Code`, `Eta_Libelle`) VALUES
('1', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `Pdt_Code` char(6) NOT NULL,
  `Pdt_Libelle` varchar(30) DEFAULT NULL,
  `Pdt_Poids` int(10) DEFAULT NULL,
  `Pdt_PxCMUP` float(6,2) DEFAULT NULL,
  `Pdt_QteStk` int(10) DEFAULT NULL,
  `Pdt_NbVols` int(5) DEFAULT NULL,
  `Pdt_NbCasses` int(5) DEFAULT NULL,
  PRIMARY KEY (`Pdt_Code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `station`
--

DROP TABLE IF EXISTS `station`;
CREATE TABLE IF NOT EXISTS `station` (
  `Sta_Code` char(5) NOT NULL,
  `Sta_Nom` varchar(30) DEFAULT NULL,
  `Sta_Rue` varchar(50) DEFAULT NULL,
  `Sta_NbAttaches` int(2) DEFAULT NULL,
  `Sta_NbVelos` int(2) DEFAULT NULL,
  `Sta_NbAttacDispo` int(2) DEFAULT NULL,
  `Sta_NbTotLoc` int(10) DEFAULT NULL,
  `Sta_NbVols` int(5) DEFAULT NULL,
  `Sta_NbDegrad` int(5) DEFAULT NULL,
  PRIMARY KEY (`Sta_Code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `station`
--

INSERT INTO `station` (`Sta_Code`, `Sta_Nom`, `Sta_Rue`, `Sta_NbAttaches`, `Sta_NbVelos`, `Sta_NbAttacDispo`, `Sta_NbTotLoc`, `Sta_NbVols`, `Sta_NbDegrad`) VALUES
('1', 'Paradis', '34 rue de', 10, 5, 5, 10, 1, 1),
('2', 'Test', '34 rue de', 10, 5, 5, 10, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `technicien`
--

DROP TABLE IF EXISTS `technicien`;
CREATE TABLE IF NOT EXISTS `technicien` (
  `Tec_Matricule` char(5) NOT NULL,
  `Tec_Nom` varchar(35) DEFAULT NULL,
  `Tec_Prenom` varchar(35) DEFAULT NULL,
  `Tec_Pwd` varchar(40) NOT NULL,
  PRIMARY KEY (`Tec_Matricule`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `technicien`
--

INSERT INTO `technicien` (`Tec_Matricule`, `Tec_Nom`, `Tec_Prenom`, `Tec_Pwd`) VALUES
('1', 'test', 'test', '356a192b7913b04c54574d18c28d46e6395428ab');

-- --------------------------------------------------------

--
-- Structure de la table `velo`
--

DROP TABLE IF EXISTS `velo`;
CREATE TABLE IF NOT EXISTS `velo` (
  `Vel_Num` char(5) NOT NULL,
  `Vel_Station` char(5) DEFAULT NULL,
  `Vel_Etat` char(10) NOT NULL,
  `Vel_Type` char(6) NOT NULL,
  `Vel_Accessoire` varchar(20) DEFAULT NULL,
  `Vel_Casse` char(1) DEFAULT NULL,
  PRIMARY KEY (`Vel_Num`),
  KEY `POSITIONNER_FK` (`Vel_Station`),
  KEY `AVOIR_FK` (`Vel_Etat`),
  KEY `APPARTENIR_FK` (`Vel_Type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
