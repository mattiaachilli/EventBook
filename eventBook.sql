-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Gen 08, 2020 alle 22:41
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
('Fiera generica'),
('Serata in discoteca'),
('Sport');

-- --------------------------------------------------------

--
-- Struttura della tabella `eventi`
--

CREATE TABLE `eventi` (
  `IDevento` int(10) NOT NULL,
  `Data` date NOT NULL,
  `Nome_evento` varchar(20) NOT NULL,
  `Nome_location` varchar(20) NOT NULL,
  `Nazione_location` varchar(20) NOT NULL,
  `Città_location` varchar(20) NOT NULL,
  `Biglietti_disponibili` int(6) NOT NULL,
  `Categoria` varchar(20) NOT NULL,
  `Immagine` varchar(150) NOT NULL,
  `Descrizione` varchar(1000) NOT NULL,
  `Prezzo` int(5) NOT NULL,
  `Username_organizzatore` varchar(15) NOT NULL,
  `Active` tinyint(1) NOT NULL,
  `Deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `eventi`
--

INSERT INTO `eventi` (`IDevento`, `Data`, `Nome_evento`, `Nome_location`, `Nazione_location`, `Città_location`, `Biglietti_disponibili`, `Categoria`, `Immagine`, `Descrizione`, `Prezzo`, `Username_organizzatore`, `Active`, `Deleted`) VALUES
(68, '2020-03-04', 'Juventus - Inter', 'Allianz Stadium', 'Italia', 'Torino', 40000, 'Calcio', '../img/events/stadium.jpg', 'Derby d\'Italia.', 50, 'Matt', 1, 0),
(69, '2020-01-22', 'Sigep', 'Fiera di Rimini', 'Italia', 'Rimini', 5000, 'Evento culinario', '../img/events/Ice-Cream-Cone-Cupcakes-Recipe-1-of-1-6.jpg', 'Fiera del gelato migliore d\'Italia!', 15, 'Matt', 1, 0),
(70, '2020-12-25', 'Tombola di Natale', 'Casina', 'Italia', 'Riccione', 25, 'Fiera generica', '../img/events/tombolina.jpg', 'Tombola con dei gran premi per tutti!', 5, 'Matt', 1, 0),
(71, '2020-12-31', 'Capodanno 2021 a NYC', 'Time Square', 'USA', 'New York', 80000, 'Evento culinario', '../img/events/NYE-in-Times-Square-NYC.jpg', 'Capodanno a New York City!', 30, 'Matt', 1, 0),
(73, '2020-02-12', 'Lakers - Miami Heat', 'Staples Center', 'USA', 'Los Angeles', 20000, 'Sport', '../img/events/61ZNcGHF4xL._SY355_.jpg', 'Partita di NBA.', 50, 'Matt', 1, 0),
(74, '2020-02-14', 'Zucchero in Concert', 'Allianz Stadium', 'Italia', 'Torino', 20000, 'Concerto', '../img/events/download.jfif', 'Zucchero in concert', 40, 'Matt', 1, 0),
(75, '2020-08-15', 'Martin Garrix ', 'Cocoricò', 'Italia', 'Riccione', 7000, 'Serata in discoteca', '../img/events/martin.jpg', 'Martin Garrix torna al Cocoricò dopo 5 anni!', 45, 'Matt', 1, 0),
(76, '2020-07-20', 'Armin van Buuren', 'Cocoricò', 'Italia', 'Riccione', 7000, 'Serata in discoteca', '../img/events/A-9070-1528964521-4162.jpg', 'Il ritorno del re della trance in piramide!', 45, 'Matt', 1, 0),
(77, '2020-07-07', 'AC/DC in concert', 'San Siro', 'Italia', 'Milano', 75000, 'Concerto', '../img/events/acdc.jpg', 'AC/DC in concerto a Milano!', 70, 'Matt', 1, 0);

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
('Allianz Stadium', 'Torino', 'Italia', 45000, 'Boh', 1),
('Casina', 'Riccione', 'Italia', 25, 'Boh', 1),
('Cocoricò', 'Riccione', 'Italia', 7500, 'Chieti', 44),
('Fiera di Rimini', 'Rimini', 'Italia', 30000, 'Della Fiera ', 1),
('San Siro', 'Milano', 'Italia', 80000, 'Dello Stadio', 1),
('Staples Center', 'Los Angeles', 'USA', 30000, 'Staples', 1),
('Time Square', 'New York', 'USA', 100000, 'Square', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `Username` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `Cognome` varchar(45) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Organizzatore` tinyint(1) NOT NULL,
  `Active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`Username`, `Email`, `Nome`, `Cognome`, `Password`, `Organizzatore`, `Active`) VALUES
('Admin', 'innocentimatteo93@gmail.com', 'Matteo', 'Innocenti', '2521a33ad740a5ea010eac7002169c2e', 0, 0),
('Inno', 'matteoinnocenti93@live.com', 'm', 'i', '2521a33ad740a5ea010eac7002169c2e', 0, 1),
('Matt', 'matteo.innocenti2@studio.unibo.it', 'Matteo', 'Innocenti', '2521a33ad740a5ea010eac7002169c2e', 1, 1);

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
  MODIFY `IDevento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

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
