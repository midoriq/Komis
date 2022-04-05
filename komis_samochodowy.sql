-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 05 Kwi 2022, 23:02
-- Wersja serwera: 10.4.17-MariaDB
-- Wersja PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `komis_samochodowy`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `marka`
--

CREATE TABLE `marka` (
  `id` int(11) NOT NULL,
  `marka` varchar(100) COLLATE utf8mb4_polish_ci NOT NULL,
  `opis` varchar(500) COLLATE utf8mb4_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `model`
--

CREATE TABLE `model` (
  `id` int(11) NOT NULL,
  `model` varchar(100) COLLATE utf8mb4_polish_ci NOT NULL,
  `id_marki` int(11) NOT NULL,
  `opis` varchar(500) COLLATE utf8mb4_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `imie` varchar(100) COLLATE utf8mb4_polish_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_polish_ci NOT NULL,
  `haslo` varchar(100) COLLATE utf8mb4_polish_ci NOT NULL,
  `czy_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `imie`, `email`, `haslo`, `czy_admin`) VALUES
(1, 'Ola', 'ola.kowalska@wp.pl', '12345', 1),
(2, 'Zuzia', 'zuzu2504@gmail.com', 'superduper', 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `marka`
--
ALTER TABLE `marka`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_marki` (`id_marki`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `marka`
--
ALTER TABLE `marka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `model`
--
ALTER TABLE `model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `model_ibfk_1` FOREIGN KEY (`id_marki`) REFERENCES `marka` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
