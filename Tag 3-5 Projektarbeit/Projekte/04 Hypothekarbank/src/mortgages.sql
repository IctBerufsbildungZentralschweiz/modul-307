-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 04. Feb 2017 um 11:53
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
-- Tabellenstruktur für Tabelle `mortgages`
--

CREATE TABLE `mortgages` (
  `id` int(11) NOT NULL,
  `package` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `mortgages`
--

INSERT INTO `mortgages` (`id`, `package`) VALUES
(20, 'Hypo-Paket: Fest 2  (0,54 %)'),
(21, 'Hypo-Paket: Fest 3  (0,54 %)'),
(22, 'Hypo-Paket: Fest 4  (0,59 %)'),
(23, 'Hypo-Paket: Fest 5  (0,62 %)'),
(24, 'Hypo-Paket: Fest 6  (0,75 %)'),
(25, 'Hypo-Paket: Fest 7  (0,80 %)'),
(26, 'Hypo-Paket: Fest 8  (0,83 %)'),
(27, 'Hypo-Paket: Fest 9  (0,86 %)'),
(28, 'Hypo-Paket: Fest 10  (0,91 %)'),
(29, 'Hypo-Paket: Fest 11  (0,96 %)'),
(30, 'Hypo-Paket: Fest 12  (1,02 %)'),
(31, 'Hypo-Paket: Fest 13  (1,48 %)'),
(32, 'Hypo-Paket: Fest 14  (1,54 %)'),
(33, 'Hypo-Paket: Fest 15  (1,40 %)'),
(34, 'Hypo-Paket: LIBOR 1M (0,72 %)'),
(35, 'Hypo-Paket: LIBOR 3M (0,65 %)'),
(36, 'Hypo-Paket: LIBOR 6M (0,65 %)'),
(37, 'Hypo-Paket: LIBOR 12M (0,71 %)'),
(38, 'Hypo-Paket: Variabel (2,25 %)');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `mortgages`
--
ALTER TABLE `mortgages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `mortgages`
--
ALTER TABLE `mortgages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
