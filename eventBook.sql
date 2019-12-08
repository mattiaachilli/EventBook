-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Dic 08, 2019 alle 17:41
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
  `Nazione_location` varchar(20) NOT NULL,
  `Città_location` varchar(20) NOT NULL,
  `Biglietti_disponibili` int(6) NOT NULL,
  `Categoria` varchar(20) NOT NULL,
  `Immagine` varchar(150) NOT NULL,
  `Descrizione` varchar(500) NOT NULL,
  `Prezzo` int(5) NOT NULL,
  `Username_organizzatore` varchar(15) NOT NULL,
  `Active` tinyint(1) NOT NULL,
  `Deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `eventi`
--

INSERT INTO `eventi` (`IDevento`, `Data`, `Nome_evento`, `Nome_location`, `Nazione_location`, `Città_location`, `Biglietti_disponibili`, `Categoria`, `Immagine`, `Descrizione`, `Prezzo`, `Username_organizzatore`, `Active`, `Deleted`) VALUES
(21, '2018-07-08', 'Armin van Buuren ', 'Cocoricò', 'Italia', 'Riccione', 7500, 'Concerto', '../img/events/armin.JPG', 'Evento dell\'anno.', 25, 'Matt', 1, 0),
(22, '2019-12-08', 'Juventus - Inter', 'Allianz Stadium', 'Italia', 'Torino', 40000, 'Calcio', '../img/events/juventus.JPG', 'Derby!', 70, 'Matt', 1, 0),
(23, '2015-07-31', 'Martin Garrix', 'Cocoricò', 'Italia', 'Riccione', 7500, 'Concerto', '../img/events/iTLDxVWC_400x400.jpg', 'Martin @ Cocoricò', 30, 'Matt', 1, 0),
(24, '2019-08-13', 'Alesso', 'Cocoricò', 'Italia', 'Riccione', 7500, 'Concerto', '../img/events/avatars-000638526816-56rgi2-t500x500.jpg', 'La svezia al cocoricò!', 30, 'Matt', 1, 0),
(25, '2019-08-15', 'Swedish House Mafia', 'Cocoricò', 'Italia', 'Riccione', 7999, 'Concerto', '../img/events/swedish-house-mafia-magento_1_-300x300.jpg', 'Il trio!', 35, 'Matt', 1, 0),
(26, '2020-05-22', 'This is Me', 'Amsterdam Arena', 'Paesi Bassi', 'Amsterdam', 40000, 'Concerto', '../img/events/1080x1080-FINAL-300x300.jpg', 'I can\'t wait to tell you my whole story. All of it: all of those different things that made me learn and grow as a person.” In This Is Me, I will bring all sides of myself together for one time only in the relative intimacy of the Ziggo Dome. This Is Me will take you back to each moment as if you were actually there, experiencing and learning for yourself. Mainstage performances, A State of Trance, Armin Only, Radio Hits and more.', 50, 'Matt', 1, 0),
(27, '2019-12-05', 'Avicii Tribute', 'Amsterdam Arena', 'Paesi Bassi', 'Amsterdam', 40000, 'Concerto', '../img/events/avicii-maxw-445.jpg', 'Tributo ad Avicii. \nIn consolle:\n- ......\n-......\n-......\n-......', 55, 'Matt', 1, 0),
(32, '2019-10-17', 'AlmaFest', 'Allianz Stadium', 'Italia', 'Torino', 2500, 'Festival', '../img/events/come-calcolare-le-radici-quadrate.jpg', 'Inaugurazione del nuovo anno accademico!', 0, 'Matt', 1, 0),
(33, '2019-12-07', 'Evento da iPhone', 'Allianz Stadium', 'Italia', 'Torino', 4000, 'Sport', '../img/events/B5568D97-5005-48F9-BFE9-FFC9C57575D7.jpeg', 'Figata!', 55, 'Matt', 1, 0);

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
('Allianz Stadium', 'Italia', 'Torino', 45000, 'Gaetano Scirea', 50),
('Amsterdam Arena', 'Paesi Bassi', 'Amsterdam', 55000, 'ArenA Boulevard', 1),
('Cocoricò', 'Italia', 'Riccione', 8000, 'Chieti', 44);

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
  `Active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`Username`, `Email`, `Nome`, `Cognome`, `Password`, `Organizzatore`, `Active`) VALUES
('Admin', 'matteo.innocenti2@studio.unibo.it', 'Matteo', 'Inno', '85144fbcc3839adb5dc33d99c139869e', 0, 0),
('MattSaber', 'innocentimatteo93@gmail.com', 'Matteo', 'Innocenti', '2521a33ad740a5ea010eac7002169c2e', 1, 0),
('Prova', 'matteoinnocenti93@live.com', 'Matteo', 'Innocenti', '6e6bc4e49dd477ebc98ef4046c067b5f', 0, 0);

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

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `eventi`
--
ALTER TABLE `eventi`
  MODIFY `IDevento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
