-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 04. Feb 2017 um 12:50
-- Server-Version: 10.1.10-MariaDB
-- PHP-Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `test`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fruits`
--

CREATE TABLE `fruits` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `fruits`
--

INSERT INTO `fruits` (`id`, `name`) VALUES
(1, 'Ananas'),
(2, 'Äpfel'),
(3, 'Aprikosen'),
(4, 'Avocado'),
(5, 'Bananen'),
(6, 'Birnen'),
(7, 'Blondorangen'),
(8, 'Blutorangen'),
(9, 'Brombeeren'),
(10, 'Clementinen'),
(11, 'Erdbeeren'),
(12, 'Feigen frisch'),
(13, 'Grapefruits'),
(14, 'Heidelbeeren'),
(15, 'Himbeeren'),
(16, 'Johannisbeeren'),
(17, 'Kaki'),
(18, 'Kirschen'),
(19, 'Kiwi'),
(20, 'Kiwi Bio Schweiz'),
(21, 'Limetten'),
(22, 'Litschis'),
(23, 'Mango'),
(24, 'Melonen'),
(25, 'Mirabellen'),
(26, 'Nektarinen'),
(27, 'Papaya'),
(28, 'Pfirsiche'),
(29, 'Pflaumen'),
(30, 'Preiselbeeren'),
(31, 'Quitten'),
(32, 'Stachelbeeren'),
(33, 'Trauben'),
(34, 'Kirschen'),
(35, 'Zwetschgen');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `fruits`
--
ALTER TABLE `fruits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `fruits`
--
ALTER TABLE `fruits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
