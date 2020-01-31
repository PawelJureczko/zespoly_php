-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 31 Sty 2020, 23:42
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
(12, 'Metalica', 'metal', 'nie'),
(13, 'Linkin Park', 'metal', 'nie'),
(14, 'Beata Kozidrak', 'country', 'tak');

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

--
-- Zrzut danych tabeli `calendary`
--

INSERT INTO `calendary` (`idcalendary`, `idband`, `idclient`, `date`) VALUES
(16, 13, 64, '2020-01-09'),
(17, 14, 63, '2020-01-10');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `clients`
--

CREATE TABLE `clients` (
  `idclient` int(11) NOT NULL,
  `login` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `password` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `name` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `surname` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `phone` varchar(9) COLLATE utf8_polish_ci DEFAULT NULL,
  `role` varchar(5) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `clients`
--

INSERT INTO `clients` (`idclient`, `login`, `password`, `name`, `surname`, `email`, `phone`, `role`) VALUES
(63, 'admin', 'admin123', 'administratorra', 'administratorski', '123@123.pl', '123456789', 'admin'),
(64, 'user', 'user1234', 'uzytkownik', 'uzytkowniski', 'uzyt@o2.pl', '123456789', 'user'),
(65, 'asd', 'asdasd', 'asd', 'asd', 'asd@12.pl', '123123123', 'user'),
(66, 'palobo', 'a', 'Pawel', 'pawellski', 'pawel@o2.pl', '123456789', 'user');

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
  MODIFY `idband` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT dla tabeli `calendary`
--
ALTER TABLE `calendary`
  MODIFY `idcalendary` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT dla tabeli `clients`
--
ALTER TABLE `clients`
  MODIFY `idclient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

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
