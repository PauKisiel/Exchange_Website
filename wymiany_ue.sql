-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 12 Sty 2019, 14:56
-- Wersja serwera: 10.1.30-MariaDB
-- Wersja PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `wymiany_ue`
--
CREATE DATABASE IF NOT EXISTS `wymiany_ue` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `wymiany_ue`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `organizacje`
--

CREATE TABLE `organizacje` (
  `id_organizacji` int(11) NOT NULL,
  `nazwa` varchar(20) CHARACTER SET utf32 COLLATE utf32_polish_ci NOT NULL,
  `kraj` varchar(20) CHARACTER SET utf32 COLLATE utf32_polish_ci NOT NULL,
  `e_mail` varchar(20) CHARACTER SET utf32 COLLATE utf32_polish_ci NOT NULL,
  `telefon` varchar(12) CHARACTER SET utf32 COLLATE utf32_polish_ci NOT NULL,
  `opis` text CHARACTER SET utf32 COLLATE utf32_polish_ci NOT NULL,
  `czy_aktywna` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id_uzytkownika` int(11) NOT NULL,
  `nazwisko` varchar(40) CHARACTER SET utf32 COLLATE utf32_polish_ci NOT NULL,
  `imie` varchar(30) CHARACTER SET utf32 COLLATE utf32_polish_ci NOT NULL,
  `data_ur` date NOT NULL,
  `plec` varchar(1) CHARACTER SET utf32 COLLATE utf32_polish_ci NOT NULL,
  `e_mail` varchar(60) CHARACTER SET utf32 COLLATE utf32_polish_ci NOT NULL,
  `haslo` varchar(20) CHARACTER SET utf32 COLLATE utf32_polish_ci NOT NULL,
  `telefon` varchar(12) CHARACTER SET utf32 COLLATE utf32_polish_ci NOT NULL,
  `czy_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wymiana`
--

CREATE TABLE `wymiana` (
  `id_wymiany` int(11) NOT NULL,
  `tytul` varchar(50) CHARACTER SET utf32 COLLATE utf32_polish_ci NOT NULL,
  `tematyka` varchar(30) CHARACTER SET utf32 COLLATE utf32_polish_ci NOT NULL,
  `opis` text CHARACTER SET utf32 COLLATE utf32_polish_ci NOT NULL,
  `plik` varchar(50) CHARACTER SET utf32 COLLATE utf32_polish_ci NOT NULL,
  `data_roz` date NOT NULL,
  `data_zak` date NOT NULL,
  `kraj` varchar(20) CHARACTER SET utf32 COLLATE utf32_polish_ci NOT NULL,
  `miasto` varchar(20) CHARACTER SET utf32 COLLATE utf32_polish_ci NOT NULL,
  `id_organizacji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zapis`
--

CREATE TABLE `zapis` (
  `id_zapisu` int(11) NOT NULL,
  `id_uzytkownika` int(11) NOT NULL,
  `id_wymiany` int(11) NOT NULL,
  `data_zapisu` date NOT NULL,
  `czy_zatwierdzony` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `organizacje`
--
ALTER TABLE `organizacje`
  ADD PRIMARY KEY (`id_organizacji`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id_uzytkownika`);

--
-- Indeksy dla tabeli `wymiana`
--
ALTER TABLE `wymiana`
  ADD PRIMARY KEY (`id_wymiany`),
  ADD KEY `id_organizacji` (`id_organizacji`);

--
-- Indeksy dla tabeli `zapis`
--
ALTER TABLE `zapis`
  ADD PRIMARY KEY (`id_zapisu`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`),
  ADD KEY `id_wymiany` (`id_wymiany`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `organizacje`
--
ALTER TABLE `organizacje`
  MODIFY `id_organizacji` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id_uzytkownika` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `wymiana`
--
ALTER TABLE `wymiana`
  MODIFY `id_wymiany` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `zapis`
--
ALTER TABLE `zapis`
  MODIFY `id_zapisu` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `wymiana`
--
ALTER TABLE `wymiana`
  ADD CONSTRAINT `wymiana_ibfk_1` FOREIGN KEY (`id_organizacji`) REFERENCES `organizacje` (`id_organizacji`);

--
-- Ograniczenia dla tabeli `zapis`
--
ALTER TABLE `zapis`
  ADD CONSTRAINT `zapis_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownicy` (`id_uzytkownika`),
  ADD CONSTRAINT `zapis_ibfk_2` FOREIGN KEY (`id_wymiany`) REFERENCES `wymiana` (`id_wymiany`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
