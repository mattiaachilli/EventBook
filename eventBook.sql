-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Dic 09, 2019 alle 22:02
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
  `IDbiglietto` int(10) NOT NULL,
  `IDevento` int(10) NOT NULL,
  `N_posto` int(6) NOT NULL,
  `Username_acquirente` varchar(15) NOT NULL
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
('Convegno'),
('Evento culinario'),
('Festival'),
('Musica elettronica'),
('Serata in discoteca'),
('Sport'),
('Workshop');

-- --------------------------------------------------------

--
-- Struttura della tabella `eventi`
--

CREATE TABLE `eventi` (
  `IDevento` int(10) NOT NULL,
  `Data` date NOT NULL,
  `Nome_evento` varchar(20) NOT NULL,
  `Nome_location` varchar(20) NOT NULL,
  `Città_location` varchar(20) NOT NULL,
  `Nazione_location` varchar(20) NOT NULL,
  `Biglietti_disponibili` int(6) NOT NULL,
  `Categoria` varchar(20) NOT NULL,
  `Immagine` varchar(150) NOT NULL,
  `Descrizione` varchar(500) NOT NULL,
  `Prezzo` int(5) NOT NULL,
  `Username_organizzatore` varchar(15) NOT NULL,
  `Active` tinyint(1) NOT NULL,
  `Deleted` tinyint(1) NOT NULL,
  `User_is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `eventi`
--

INSERT INTO `eventi` (`IDevento`, `Data`, `Nome_evento`, `Nome_location`, `Città_location`, `Nazione_location`, `Biglietti_disponibili`, `Categoria`, `Immagine`, `Descrizione`, `Prezzo`, `Username_organizzatore`, `Active`, `Deleted`, `User_is_active`) VALUES
(35, '2020-01-25', 'Juventus - Inter', 'Allianz Stadium', 'Torino', 'Italia', 44000, 'Calcio', '../img/events/02_Juventus.com_.jpg', 'Derby d\'Italia', 100, 'MattSaber', 1, 0, 0),
(36, '2019-10-18', 'MartinGarrix@ADE2019', 'RAI', 'Amsterdam', 'Paesi Bassi', 28001, 'Concerto', '../img/events/tn34063.jpg', 'Grande ritorno di Martin Garrix all RAI Convention Center durante l\'Amsterdam Dance Event.', 46, 'MattSaber', 1, 0, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `location`
--

CREATE TABLE `location` (
  `Nome` varchar(20) NOT NULL,
  `Città` varchar(20) NOT NULL,
  `Nazione` varchar(20) NOT NULL,
  `Capienza` int(6) NOT NULL,
  `Via` varchar(20) NOT NULL,
  `N_civico` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `location`
--

INSERT INTO `location` (`Nome`, `Città`, `Nazione`, `Capienza`, `Via`, `N_civico`) VALUES
('Allianz Stadium', 'Torino', 'Italia', 45000, 'Dello Stadio ', 1),
('Cocoricò', 'Rimini', 'Italia', 8000, 'Chieti', 44),
('RAI', 'Amsterdam', 'Paesi Bassi', 30000, 'Europaplein', 24);

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
  `Organizzatore` tinyint(1) NOT NULL,
  `Active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`Username`, `Email`, `Nome`, `Cognome`, `Password`, `Organizzatore`, `Active`) VALUES
('Admin', 'matteo.innocenti2@studio.unibo.it', 'Matteo', 'Inno', '2521a33ad740a5ea010eac7002169c2e', 0, 0),
('MattSaber', 'innocentimatteo93@gmail.com', 'Matteo', 'Innocenti', '2521a33ad740a5ea010eac7002169c2e', 1, 0),
('Prova', 'matteoinnocenti93@live.com', 'Matteo', 'Innocenti', '6e6bc4e49dd477ebc98ef4046c067b5f', 0, 0);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `biglietti`
--
ALTER TABLE `biglietti`
  ADD PRIMARY KEY (`IDbiglietto`,`IDevento`),
  ADD KEY `IDevento` (`IDevento`),
  ADD KEY `Username_acquirente` (`Username_acquirente`);

--
-- Indici per le tabelle `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`Nome`);

--
-- Indici per le tabelle `eventi`
--
ALTER TABLE `eventi`
  ADD PRIMARY KEY (`IDevento`),
  ADD KEY `Username_organizzatore` (`Username_organizzatore`),
  ADD KEY `Nome_location` (`Nome_location`);

--
-- Indici per le tabelle `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`Nome`,`Città`,`Nazione`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`Username`) USING BTREE;

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `eventi`
--
ALTER TABLE `eventi`
  MODIFY `IDevento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `biglietti`
--
ALTER TABLE `biglietti`
  ADD CONSTRAINT `biglietti_ibfk_1` FOREIGN KEY (`IDevento`) REFERENCES `eventi` (`IDevento`) ON UPDATE CASCADE,
  ADD CONSTRAINT `biglietti_ibfk_2` FOREIGN KEY (`Username_acquirente`) REFERENCES `utenti` (`Username`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `eventi`
--
ALTER TABLE `eventi`
  ADD CONSTRAINT `eventi_ibfk_3` FOREIGN KEY (`Username_organizzatore`) REFERENCES `utenti` (`Username`) ON UPDATE CASCADE,
  ADD CONSTRAINT `eventi_ibfk_4` FOREIGN KEY (`Nome_location`) REFERENCES `location` (`Nome`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
