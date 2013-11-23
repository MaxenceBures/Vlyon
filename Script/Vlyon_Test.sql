-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 23 Novembre 2013 à 22:04
-- Version du serveur: 5.5.33
-- Version de PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `Vlyon`
--
CREATE DATABASE IF NOT EXISTS `Vlyon` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `Vlyon`;

-- --------------------------------------------------------

--
-- Structure de la table `BONINTERV`
--

CREATE TABLE `BONINTERV` (
  `BI_Num` char(10) NOT NULL,
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
-- Structure de la table `DEMANDEINTER`
--

CREATE TABLE `DEMANDEINTER` (
  `DemI_Num` char(5) NOT NULL,
  `DemI_Velo` char(5) NOT NULL,
  `DemI_Date` date DEFAULT NULL,
  `DemI_Technicien` char(5) NOT NULL,
  `DemI_Motif` varchar(50) DEFAULT NULL,
  `DemI_Traite` char(1) DEFAULT NULL,
  PRIMARY KEY (`DemI_Num`),
  KEY `CORRESPONDRE_FK` (`DemI_Velo`),
  KEY `REDIGER_FK` (`DemI_Technicien`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ETAT`
--

CREATE TABLE `ETAT` (
  `Eta_Code` char(10) NOT NULL,
  `Eta_Libelle` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`Eta_Code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ETAT`
--

INSERT INTO `ETAT` (`Eta_Code`, `Eta_Libelle`) VALUES
('1', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `PRODUIT`
--

CREATE TABLE `PRODUIT` (
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
-- Structure de la table `STATION`
--

CREATE TABLE `STATION` (
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

-- --------------------------------------------------------

--
-- Structure de la table `TECHNICIEN`
--

CREATE TABLE `TECHNICIEN` (
  `Tec_Matricule` char(5) NOT NULL,
  `Tec_Nom` varchar(35) DEFAULT NULL,
  `Tec_Prenom` varchar(35) DEFAULT NULL,
  `Tec_Pwd` varchar(40) NOT NULL,
  PRIMARY KEY (`Tec_Matricule`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `TECHNICIEN`
--

INSERT INTO `TECHNICIEN` (`Tec_Matricule`, `Tec_Nom`, `Tec_Prenom`, `Tec_Pwd`) VALUES
('1', 'test', 'test', '356a192b7913b04c54574d18c28d46e6395428ab');

-- --------------------------------------------------------

--
-- Structure de la table `VELO`
--

CREATE TABLE `VELO` (
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


create table COMMANDE
(
    Com_Code          CHAR(5)        not null,
    Com_Date          DATE           null    ,
	Com_Qte			  INTEGER(2)	 null    ,
    Com_Valide        BOOLEAN        null    ,
	Com_Produit		  CHAR(6) 		 not null,
    constraint PK_COMMANDE primary key (Com_Code)
);
--
-- Contraintes pour les tables exportées
--

--
