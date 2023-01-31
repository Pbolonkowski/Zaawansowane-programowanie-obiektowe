-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20221219.e5e070c814
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 25 Sty 2023, 10:01
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `uzytkownicy`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `ID_produktu` int(6) NOT NULL,
  `nazwa` text NOT NULL,
  `opis` text NOT NULL,
  `cena` float NOT NULL,
  `obraz` text NOT NULL,
  `data_dodania` datetime NOT NULL,
  `data_sprzedazy` datetime NOT NULL DEFAULT current_timestamp(),
  `id_sprzedajacego` int(11) NOT NULL,
  `id_kupujacego` int(11) NOT NULL,
  `kategoria` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `produkty`
--

INSERT INTO `produkty` (`ID_produktu`, `nazwa`, `opis`, `cena`, `obraz`, `data_dodania`, `data_sprzedazy`, `id_sprzedajacego`, `id_kupujacego`, `kategoria`) VALUES
(23, 'Przełęcz ocalonych', 'Film wojenny', 15, 'przelecz_ocalonych.jpg', '2023-01-25 01:03:00', '2023-01-25 09:58:34', 2, 1, 'Film'),
(24, 'Labirynt', 'Thriller', 14, 'labirynt.jpg', '2023-01-25 01:03:40', '0000-00-00 00:00:00', 2, -2, 'Film'),
(25, 'Prawo zemsty', 'Thriller', 20, 'prawo_zemsty.jpg', '2023-01-25 01:04:23', '0000-00-00 00:00:00', 2, -2, 'Film'),
(26, 'Wiedźmin 3', 'Gra RP', 20, 'Wiedzmin_3.jpg', '2023-01-25 01:05:11', '0000-00-00 00:00:00', 2, -2, 'Gra'),
(27, 'Avengers', 'Sci-Fi', 23, 'avengers.jpg', '2023-01-25 01:06:03', '0000-00-00 00:00:00', 3, -2, 'Film'),
(28, 'Titanic', 'film romantyczny', 16, 'titanic.png', '2023-01-25 01:06:26', '0000-00-00 00:00:00', 3, -2, 'Film'),
(29, 'avatar', '12312', 12312, '', '2023-01-25 09:24:32', '0000-00-00 00:00:00', 1, -2, 'Film'),
(30, 'Przełęcz ocalonych', 'Film wojenny', 11, 'przelecz_ocalonych.jpg', '2023-01-25 09:59:10', '0000-00-00 00:00:00', 1, -2, 'Film');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `user` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `pass` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `user`, `pass`, `email`) VALUES
(1, 'adam', 'qwerty', 'adam@gmail.com'),
(2, 'marek', 'asdfg', 'marek@gmail.com'),
(3, 'anna', 'zxcvb', 'anna@gmail.com'),
(4, 'andrzej', 'asdfg', 'andrzej@gmail.com'),
(5, 'justyna', 'yuiop', 'justyna@gmail.com'),
(6, 'kasia', 'hjkkl', 'kasia@gmail.com'),
(7, 'beata', 'fgthj', 'beata@gmail.com'),
(8, 'jakub', 'ertyu', 'jakub@gmail.com'),
(9, 'janusz', 'cvbnm', 'janusz@gmail.com'),
(10, 'roman', 'dfghj', 'roman@gmail.com'),
(11, 'piotr', '12345', '12345'),
(12, 'piotr2', 'piotr', 'piot2r@gmail.com'),
(13, '123123', '123123', '123123'),
(14, 'piotr3333', '123123', '12312312'),
(15, 'test1', 'test1', 'test1'),
(16, 'test2', 'test2', 'tst2'),
(17, 'piotr312', '123123', '31231'),
(18, '123', '123123', '123'),
(19, 'piotr111111', '123123', 'piotr'),
(20, 'testttt', '123123', 'test2'),
(21, 'testowo', '123123', 'testowo'),
(22, 'katarzyna2', '123123', 'katarzyna2@gmail.com'),
(23, 'Kamilkosz', 'kamilk', 'kamilkosz@gmail.com');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wiadomosci`
--

CREATE TABLE `wiadomosci` (
  `id_wiadomosci` int(11) NOT NULL,
  `tekst` text NOT NULL,
  `id_wysylajacego` int(6) NOT NULL,
  `id_odbiorcy` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `wiadomosci`
--

INSERT INTO `wiadomosci` (`id_wiadomosci`, `tekst`, `id_wysylajacego`, `id_odbiorcy`) VALUES
(1, 'sadasd', 1, 1),
(2, 'sadasd', 1, 1),
(3, '12312', 1, 1),
(4, '123123', 1, 1),
(5, '123', 1, 1),
(6, 'halo', 3, 1),
(7, 'halo', 1, 3),
(8, 'alo', 1, 3),
(9, '', 1, 1),
(10, 'halohalo', 1, 3),
(11, 'wiadomosc testowa', 1, 7),
(12, 'mam problem z kupnem', 1, 1),
(13, 'prosze o dodatkowe informacje', 1, 7);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`ID_produktu`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeksy dla tabeli `wiadomosci`
--
ALTER TABLE `wiadomosci`
  ADD PRIMARY KEY (`id_wiadomosci`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `produkty`
--
ALTER TABLE `produkty`
  MODIFY `ID_produktu` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT dla tabeli `wiadomosci`
--
ALTER TABLE `wiadomosci`
  MODIFY `id_wiadomosci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
