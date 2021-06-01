-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 01, 2021 at 05:01 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `gacti`
--

-- --------------------------------------------------------

--
-- Table structure for table `activite`
--

CREATE TABLE `activite` (
  `NOACT` int(4) NOT NULL,
  `CODEANIM` char(8) NOT NULL,
  `CODEETATACT` char(2) NOT NULL,
  `DATEACT` date NOT NULL,
  `HRRDVACT` time DEFAULT NULL,
  `PRIXACT` decimal(7,2) DEFAULT NULL,
  `HRDEBUTACT` time DEFAULT NULL,
  `HRFINACT` time DEFAULT NULL,
  `DATEANNULEACT` date DEFAULT NULL,
  `NOMRESP` char(40) DEFAULT NULL,
  `PRENOMRESP` char(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activite`
--

INSERT INTO `activite` (`NOACT`, `CODEANIM`, `CODEETATACT`, `DATEACT`, `HRRDVACT`, `PRIXACT`, `HRDEBUTACT`, `HRFINACT`, `DATEANNULEACT`, `NOMRESP`, `PRENOMRESP`) VALUES
(5, 'RAND', '1', '2021-05-17', '10:00:00', '15.00', '10:15:00', '12:00:00', '2021-05-25', 'Thierry', 'Boyaux'),
(4, 'RAND', '1', '2021-04-17', '10:00:00', '15.00', '10:15:00', '12:00:00', '2021-05-25', 'Thierry', 'Boyaux'),
(3, 'RAND', '1', '2021-03-17', '10:00:00', '15.00', '10:15:00', '12:00:00', '2021-05-25', 'Thierry', 'Boyaux'),
(2, 'RAND', '1', '2021-02-16', '10:00:00', '15.00', '10:15:00', '12:00:00', '2021-02-27', 'Thierry', 'Boyaux'),
(1, 'RAND', '1', '2021-01-12', '09:00:00', '15.00', '09:15:00', '12:00:00', '2021-05-31', 'Thierry', 'Boyaux'),
(6, 'RAND', '1', '2021-06-17', '10:00:00', '15.00', '10:15:00', '12:00:00', '2021-05-25', 'Thierry', 'Boyaux'),
(7, 'RAND', '1', '2021-07-17', '10:00:00', '15.00', '10:15:00', '12:00:00', '2021-05-25', 'Thierry', 'Boyaux'),
(9, 'RAND', '1', '2021-09-17', '10:00:00', '15.00', '10:15:00', '12:00:00', '2021-05-25', 'Thierry', 'Boyaux'),
(10, 'RAND', '1', '2021-10-17', '10:00:00', '15.00', '10:15:00', '12:00:00', '2021-05-25', 'Thierry', 'Boyaux'),
(11, 'RAND', '1', '2021-11-17', '10:00:00', '15.00', '10:15:00', '12:00:00', '2021-05-25', 'Thierry', 'Boyaux'),
(12, 'RAND', '1', '2021-12-17', '10:00:00', '15.00', '10:15:00', '12:00:00', '2021-05-25', 'Thierry', 'Boyaux'),
(100, 'test', '1', '2021-06-02', '21:54:16', '10.00', '14:54:16', '13:54:16', '2021-05-25', 'test', 'test'),
(101, 'test', '1', '2021-06-02', '21:54:16', '10.00', '14:54:16', '13:54:16', '2021-05-25', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `animation`
--

CREATE TABLE `animation` (
  `CODEANIM` char(8) NOT NULL,
  `CODETYPEANIM` char(5) NOT NULL,
  `NOMANIM` char(40) DEFAULT NULL,
  `DATECREATIONANIM` date DEFAULT NULL,
  `DATEVALIDITEANIM` date DEFAULT NULL,
  `DUREEANIM` double(5,0) DEFAULT NULL,
  `LIMITEAGE` int(2) DEFAULT NULL,
  `TARIFANIM` decimal(7,2) DEFAULT NULL,
  `NBREPLACEANIM` int(2) DEFAULT NULL,
  `DESCRIPTANIM` char(250) DEFAULT NULL,
  `COMMENTANIM` char(250) DEFAULT NULL,
  `DIFFICULTEANIM` char(40) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `animation`
--

INSERT INTO `animation` (`CODEANIM`, `CODETYPEANIM`, `NOMANIM`, `DATECREATIONANIM`, `DATEVALIDITEANIM`, `DUREEANIM`, `LIMITEAGE`, `TARIFANIM`, `NBREPLACEANIM`, `DESCRIPTANIM`, `COMMENTANIM`, `DIFFICULTEANIM`) VALUES
('test', '1', 'test', '2021-05-02', '2021-05-10', 10, 10, '10.00', 10, '10', '10', '10'),
('RAND', 'RDN', 'Randonnée des 12 mois', '2020-05-20', '2022-11-30', 2, 18, '20.00', 4, 'Randonnée pour chaque mois', 'Permet de compléter son épreuve E4', 'Facile');

-- --------------------------------------------------------

--
-- Table structure for table `compte`
--

CREATE TABLE `compte` (
  `USER` char(8) NOT NULL,
  `MDP` char(10) DEFAULT NULL,
  `NOMCOMPTE` char(40) DEFAULT NULL,
  `PRENOMCOMPTE` char(30) DEFAULT NULL,
  `DATEINSCRIP` date DEFAULT NULL,
  `DATEFERME` date DEFAULT NULL,
  `TYPEPROFIL` char(2) DEFAULT NULL,
  `DATEDEBSEJOUR` date DEFAULT NULL,
  `DATEFINSEJOUR` date DEFAULT NULL,
  `DATENAISCOMPTE` date DEFAULT NULL,
  `ADRMAILCOMPTE` char(70) DEFAULT NULL,
  `NOTELCOMPTE` char(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compte`
--

INSERT INTO `compte` (`USER`, `MDP`, `NOMCOMPTE`, `PRENOMCOMPTE`, `DATEINSCRIP`, `DATEFERME`, `TYPEPROFIL`, `DATEDEBSEJOUR`, `DATEFINSEJOUR`, `DATENAISCOMPTE`, `ADRMAILCOMPTE`, `NOTELCOMPTE`) VALUES
('vc1', 'vc1', 'Latruie', 'Robert', '2021-05-22', '2021-06-30', 'US', '2021-05-23', '2021-06-13', '1980-07-23', 'robertLatruie@gmail.com', '0665487595'),
('bypass', 'bypass', 'Bypass', 'Bypass', '2021-04-20', '2021-09-01', 'AD', '2021-05-01', '2021-08-29', '1980-07-23', 'bypass@gmail.com', '00000000'),
('vc2', 'vc2', 'vc2', 'vc2', '2020-01-03', '2023-05-31', 'US', '2020-02-28', '2023-02-28', '2020-01-05', 'vc2', 'vc2'),
('vc3', 'vc3', 'vc2', 'vc2', '2020-01-03', '2023-05-31', 'US', '2020-02-28', '2023-02-28', '2020-01-05', 'vc2', 'vc2'),
('vc4', 'vc4', 'vc2', 'vc2', '2020-01-03', '2023-05-31', 'US', '2020-02-28', '2023-02-28', '2020-01-05', 'vc2', 'vc2');

-- --------------------------------------------------------

--
-- Table structure for table `etat_act`
--

CREATE TABLE `etat_act` (
  `CODEETATACT` char(2) NOT NULL,
  `NOMETATACT` char(25) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `etat_act`
--

INSERT INTO `etat_act` (`CODEETATACT`, `NOMETATACT`) VALUES
('1', 'Disponible'),
('2', 'Indisponible');

-- --------------------------------------------------------

--
-- Table structure for table `inscription`
--

CREATE TABLE `inscription` (
  `NOINSCRIP` bigint(6) NOT NULL,
  `USER` char(8) NOT NULL,
  `NOACT` int(4) NOT NULL,
  `DATEINSCRIP` date DEFAULT NULL,
  `DATEANNULE` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inscription`
--

INSERT INTO `inscription` (`NOINSCRIP`, `USER`, `NOACT`, `DATEINSCRIP`, `DATEANNULE`) VALUES
(59, 'vc1', 2, '2021-01-01', '2021-02-01'),
(56, 'vc1', 1, '2021-02-01', '2021-03-01'),
(58, 'vc2', 5, '2021-05-10', '2021-05-24'),
(80, 'vc2', 2, '2021-01-01', '2021-02-01'),
(57, 'vc1', 5, '2021-05-10', '2021-05-24'),
(79, 'vc2', 1, '2021-02-01', '2021-03-01'),
(61, 'vc1', 3, '2021-01-01', '2021-02-01'),
(62, 'vc2', 3, '2021-01-01', '2021-02-01'),
(63, 'vc1', 4, '2021-01-01', '2021-02-01'),
(64, 'vc2', 4, '2021-01-01', '2021-02-01'),
(65, 'vc1', 6, '2021-05-10', '2021-05-24'),
(66, 'vc2', 6, '2021-05-10', '2021-05-24'),
(67, 'vc1', 7, '2021-05-10', '2021-05-24'),
(68, 'vc1', 8, '2021-05-10', '2021-05-24'),
(69, 'vc1', 9, '2021-05-10', '2021-05-24'),
(70, 'vc2', 9, '2021-05-10', '2021-05-24'),
(71, 'vc1', 10, '2021-05-10', '2021-05-24'),
(72, 'vc2', 10, '2021-05-10', '2021-05-24'),
(73, 'vc1', 11, '2021-05-10', '2021-05-24'),
(74, 'vc2', 11, '2021-05-10', '2021-05-24'),
(75, 'vc1', 12, '2021-05-10', '2021-05-24'),
(76, 'vc2', 12, '2021-05-10', '2021-05-24'),
(77, 'vc2', 7, '2021-05-10', '2021-05-24'),
(78, 'vc2', 8, '2021-05-10', '2021-05-24'),
(82, 'vc3', 1, '2021-02-01', '2021-03-01'),
(83, 'vc4', 1, '2021-02-01', '2021-03-01'),
(84, 'vc3', 2, '2021-01-01', '2021-02-01'),
(85, 'vc4', 2, '2021-01-01', '2021-02-01');

-- --------------------------------------------------------

--
-- Table structure for table `type_anim`
--

CREATE TABLE `type_anim` (
  `CODETYPEANIM` char(5) NOT NULL,
  `NOMTYPEANIM` char(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_anim`
--

INSERT INTO `type_anim` (`CODETYPEANIM`, `NOMTYPEANIM`) VALUES
('DDR', 'Descente de rivière'),
('BEC', 'Balade en cheval'),
('RDN', 'Randonnée');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activite`
--
ALTER TABLE `activite`
  ADD PRIMARY KEY (`NOACT`),
  ADD KEY `I_FK_ACTIVITE_ANIMATION` (`CODEANIM`),
  ADD KEY `I_FK_ACTIVITE_ETAT_ACT` (`CODEETATACT`);

--
-- Indexes for table `animation`
--
ALTER TABLE `animation`
  ADD PRIMARY KEY (`CODEANIM`),
  ADD KEY `I_FK_ANIMATION_TYPE_ANIM` (`CODETYPEANIM`);

--
-- Indexes for table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`USER`);

--
-- Indexes for table `etat_act`
--
ALTER TABLE `etat_act`
  ADD PRIMARY KEY (`CODEETATACT`);

--
-- Indexes for table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`NOINSCRIP`),
  ADD KEY `I_FK_INSCRIPTION_COMPTE` (`USER`),
  ADD KEY `I_FK_INSCRIPTION_ACTIVITE` (`NOACT`);

--
-- Indexes for table `type_anim`
--
ALTER TABLE `type_anim`
  ADD PRIMARY KEY (`CODETYPEANIM`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `NOINSCRIP` bigint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
