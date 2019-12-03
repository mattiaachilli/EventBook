-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Dic 03, 2019 alle 17:37
-- Versione del server: 10.4.8-MariaDB
-- Versione PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventbook`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `biglietti`
--

CREATE TABLE `biglietti` (
  `IDbiglietto` varchar(10) NOT NULL,
  `IDevento` varchar(10) NOT NULL,
  `N_posto` int(6) NOT NULL,
  `Username_acquirente` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `categorie`
--

CREATE TABLE `categorie` (
  `Nome` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `categorie`
--

INSERT INTO `categorie` (`Nome`) VALUES
('Calcio'),
('Concerto'),
('Evento culinario'),
('Festival'),
('Musica elettronica'),
('Sport'),
('Workshop');

-- --------------------------------------------------------

--
-- Struttura della tabella `eventi`
--

CREATE TABLE `eventi` (
  `IDevento` varchar(10) NOT NULL,
  `Data` date NOT NULL,
  `Nome_evento` varchar(20) NOT NULL,
  `Nome_location` varchar(20) NOT NULL,
  `Nazione_location` varchar(20) NOT NULL,
  `Città_location` varchar(20) NOT NULL,
  `Biglietti_disponibili` int(6) NOT NULL,
  `Categoria` varchar(20) NOT NULL,
  `Immagine` varchar(50) NOT NULL,
  `Descrizione` varchar(1000) NOT NULL,
  `Prezzo` int(5) NOT NULL,
  `Username_organizzatore` varchar(15) NOT NULL,
  `Active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `location`
--

CREATE TABLE `location` (
  `Nome` varchar(20) NOT NULL,
  `Nazione` varchar(20) NOT NULL,
  `Città` varchar(20) NOT NULL,
  `Capienza` int(6) NOT NULL,
  `Via` varchar(20) NOT NULL,
  `N_civico` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `location`
--

INSERT INTO `location` (`Nome`, `Nazione`, `Città`, `Capienza`, `Via`, `N_civico`) VALUES
('Allianz Stadium', 'Italia', 'Torino', 45000, 'Gaetano Scirea', 50);

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `Username` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `Cognome` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `Organizzatore` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`Username`, `Email`, `Nome`, `Cognome`, `Password`, `Organizzatore`) VALUES
('InnoJack', 'matteo.innocenti2@studio.unibo.it', 'Matteo', 'Innocenti', '67b5bced5ed9e3efbf68094ef8b622cf', 0),
('MattSaber', 'innocentimatteo93@gmail.com', 'Matteo', 'Innocenti', '27b59ebf7181a828c2ce688878305a5b', 0);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `biglietti`
--
ALTER TABLE `biglietti`
  ADD PRIMARY KEY (`IDbiglietto`,`IDevento`);

--
-- Indici per le tabelle `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`Nome`);

--
-- Indici per le tabelle `eventi`
--
ALTER TABLE `eventi`
  ADD PRIMARY KEY (`IDevento`);

--
-- Indici per le tabelle `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`Nome`,`Nazione`,`Città`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
