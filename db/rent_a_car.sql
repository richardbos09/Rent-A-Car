-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 23 mei 2016 om 16:56
-- Serverversie: 5.7.11
-- PHP-versie: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rent_a_car`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(10) NOT NULL,
  `account_user` varchar(25) NOT NULL,
  `account_email` varchar(50) NOT NULL,
  `account_pass` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `accounts`
--

INSERT INTO `accounts` (`account_id`, `account_user`, `account_email`, `account_pass`) VALUES
(1, 'Administrator', 'administrator@rentacar.nl', 'easyphp');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cars`
--

CREATE TABLE `cars` (
  `car_id` int(10) NOT NULL,
  `car_sign` char(8) NOT NULL,
  `car_brand` varchar(20) NOT NULL,
  `car_type` varchar(32) NOT NULL,
  `car_kind` varchar(22) NOT NULL,
  `car_description` varchar(25) NOT NULL,
  `car_gps` enum('ja','nee') NOT NULL,
  `car_price` decimal(10,2) NOT NULL,
  `car_img` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `cars`
--

INSERT INTO `cars` (`car_id`, `car_sign`, `car_brand`, `car_type`, `car_kind`, `car_description`, `car_gps`, `car_price`, `car_img`) VALUES
(1, '11-PO-TT', 'BMW', '730 (diesel v12)', 'Standaard', '5 personen', 'ja', '85.00', 'cars/bmw/BMW_730d.jpg'),
(2, '18-YY-GG', 'BMW', '323 (benzine)', 'Sportwagen', '2 personen', 'nee', '85.00', 'cars/bmw/BMW_323i.jpg');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexen voor tabel `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
