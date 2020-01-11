-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 12 Sty 2020, 00:15
-- Wersja serwera: 10.4.8-MariaDB
-- Wersja PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `bandsdb`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `bands`
--

CREATE TABLE `bands` (
  `idband` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `musictype` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `ishired` varchar(3) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `bands`
--

INSERT INTO `bands` (`idband`, `name`, `musictype`, `ishired`) VALUES
(8, 'asd', 'asda', 'tak'),
(9, 'dsa', 'dsad', 'tak');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `calendary`
--

CREATE TABLE `calendary` (
  `idcalendary` int(11) NOT NULL,
  `idband` int(11) DEFAULT NULL,
  `idclient` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `clients`
--

CREATE TABLE `clients` (
  `idclient` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `surname` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `phone` varchar(9) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `bands`
--
ALTER TABLE `bands`
  ADD PRIMARY KEY (`idband`);

--
-- Indeksy dla tabeli `calendary`
--
ALTER TABLE `calendary`
  ADD PRIMARY KEY (`idcalendary`),
  ADD KEY `idband` (`idband`),
  ADD KEY `idclient` (`idclient`);

--
-- Indeksy dla tabeli `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`idclient`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `bands`
--
ALTER TABLE `bands`
  MODIFY `idband` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `calendary`
--
ALTER TABLE `calendary`
  MODIFY `idcalendary` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `clients`
--
ALTER TABLE `clients`
  MODIFY `idclient` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `calendary`
--
ALTER TABLE `calendary`
  ADD CONSTRAINT `calendary_ibfk_1` FOREIGN KEY (`idband`) REFERENCES `bands` (`idband`),
  ADD CONSTRAINT `calendary_ibfk_2` FOREIGN KEY (`idclient`) REFERENCES `clients` (`idclient`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
