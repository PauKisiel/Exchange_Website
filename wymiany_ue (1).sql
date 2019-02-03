-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 03 Lut 2019, 20:42
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

--
-- Zrzut danych tabeli `organizacje`
--

INSERT INTO `organizacje` (`id_organizacji`, `nazwa`, `kraj`, `e_mail`, `telefon`, `opis`, `czy_aktywna`) VALUES
(1, 'For Youth ', 'Cypr ', 'for.youth@gmail.com', '+3572685917', 'Nulla at quam ut velit feugiat imperdiet in sit amet quam. Mauris tempor sed erat sit amet suscipit. Vivamus vehicula ultricies turpis at scelerisque. Donec et mi sed enim eleifend egestas. Aenean porttitor magna ut turpis tristique ultricies. Morbi et nunc sit amet elit fermentum lobortis. Sed sagittis eget erat quis pretium. Nulla rhoncus egestas ante vitae pharetra. Nunc venenatis fermentum justo non cursus.', 1),
(2, 'Smart ', 'Estonia', 'smart@gmail.com', '+3721685294', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur odio arcu, vulputate ac condimentum in, interdum at ante. Nam eget metus interdum, tincidunt arcu a, tincidunt mauris. Praesent fermentum, mauris sit amet consectetur sodales, lectus tortor blandit risus, a tincidunt dolor orci auctor mauris. Integer lacinia urna a egestas lobortis.', 1),
(3, 'Think Earth ', 'Norway ', 't.e@post.com', '+479568526', 'Nullam vitae justo at enim mattis maximus eu quis sapien. Vivamus a pellentesque felis, in bibendum tortor. Mauris congue tortor nec rhoncus congue. Curabitur risus orci, sodales sit amet libero at, interdum finibus mi. Suspendisse mi enim, viverra vitae massa non, porttitor fringilla neque.', 1);

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

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id_uzytkownika`, `nazwisko`, `imie`, `data_ur`, `plec`, `e_mail`, `haslo`, `telefon`, `czy_admin`) VALUES
(1, 'Kowalski', 'Jan', '1995-08-01', 'M', 'jan@poczta.com', 'user', '526984159', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wymiana`
--

CREATE TABLE `wymiana` (
  `id_wymiany` int(11) NOT NULL,
  `tytul` varchar(50) CHARACTER SET utf32 COLLATE utf32_polish_ci NOT NULL,
  `tematyka` varchar(30) CHARACTER SET utf32 COLLATE utf32_polish_ci NOT NULL,
  `opis` text CHARACTER SET utf32 COLLATE utf32_polish_ci NOT NULL,
  `plik` text CHARACTER SET utf32 COLLATE utf32_polish_ci NOT NULL,
  `data_roz` date NOT NULL,
  `data_zak` date NOT NULL,
  `data_zgloszenia` date NOT NULL,
  `kraj` varchar(20) CHARACTER SET utf32 COLLATE utf32_polish_ci NOT NULL,
  `miasto` varchar(20) CHARACTER SET utf32 COLLATE utf32_polish_ci NOT NULL,
  `id_organizacji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `wymiana`
--

INSERT INTO `wymiana` (`id_wymiany`, `tytul`, `tematyka`, `opis`, `plik`, `data_roz`, `data_zak`, `data_zgloszenia`, `kraj`, `miasto`, `id_organizacji`) VALUES
(3, 'Do Something Against Wasting', 'Ecology', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec auctor gravida turpis, id porttitor lectus fermentum ac. Vivamus scelerisque massa vitae euismod scelerisque. Etiam porttitor, est in congue viverra, massa tellus mattis magna, fringilla ornare massa erat nec nunc. Nunc ex eros, luctus non tempus vel, suscipit vel lacus.', 'https://scontent-frx5-1.xx.fbcdn.net/v/t1.0-9/50917014_2035509423192979_3530236231369621504_o.jpg?_nc_cat=101&_nc_ht=scontent-frx5-1.xx&oh=166014f98df86667b07ab6b42086157d&oe=5CE6F18F', '2019-02-20', '2019-02-28', '2019-02-08', 'Cypr ', 'Larnaka', 1),
(4, 'Be responsible', 'Society ', 'Phasellus euismod ultrices nibh sit amet malesuada. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam viverra mi sed libero ultricies, at varius libero convallis. Maecenas mollis, ante aliquet consectetur facilisis, tortor magna iaculis nibh, non bibendum sem dui ut libero. ', 'https://cdn.pixabay.com/photo/2017/08/08/11/50/lighthouse-2611199_1280.jpg', '2019-04-08', '2019-04-16', '2019-03-28', 'Norway ', 'Stavanger', 3),
(5, 'Look around you ', 'General', 'Maecenas pharetra turpis ut consequat convallis. Vestibulum ac nibh sodales, vestibulum lectus mattis, condimentum velit. Suspendisse non interdum leo, eu porta eros. Fusce lectus ligula, porta sed sagittis cursus, malesuada a risus. Quisque quis justo fermentum, pretium massa interdum, pharetra arcu. Ut sit amet ipsum at libero posuere egestas eget vitae augue. Nam ex sem, volutpat vel enim mattis, sollicitudin tincidunt enim.', 'https://cdn.pixabay.com/photo/2019/01/31/13/28/markers-3966894_1280.jpg', '2019-06-11', '2019-06-26', '2019-05-20', 'Estonia', 'Narva', 2);

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
  MODIFY `id_organizacji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id_uzytkownika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `wymiana`
--
ALTER TABLE `wymiana`
  MODIFY `id_wymiany` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
