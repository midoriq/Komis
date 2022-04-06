-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 06 Kwi 2022, 08:37
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 7.4.28

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
-- Struktura tabeli dla tabeli `kategoria`
--

CREATE TABLE `kategoria` (
  `id` int(11) NOT NULL,
  `kategoria` varchar(100) COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `kategoria`
--

INSERT INTO `kategoria` (`id`, `kategoria`) VALUES
(1, 'Samochody osobowe'),
(2, 'Motocykle i skutery'),
(3, 'Dostawcze i ciezarowe');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kolor`
--

CREATE TABLE `kolor` (
  `id` int(11) NOT NULL,
  `kolor` varchar(200) COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `kolor`
--

INSERT INTO `kolor` (`id`, `kolor`) VALUES
(1, 'czarny'),
(2, 'bialy'),
(3, 'czerwony'),
(4, 'granatowy'),
(5, 'szary');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kraj_pochodzenia`
--

CREATE TABLE `kraj_pochodzenia` (
  `id` int(11) NOT NULL,
  `kraj_pochodzenia` varchar(150) COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `kraj_pochodzenia`
--

INSERT INTO `kraj_pochodzenia` (`id`, `kraj_pochodzenia`) VALUES
(1, 'Polska'),
(2, 'Niemcy'),
(3, 'Wielka Brytania'),
(4, 'Wlochy'),
(5, 'Stany Zjednoczone');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `marka`
--

CREATE TABLE `marka` (
  `id` int(11) NOT NULL,
  `marka` varchar(100) COLLATE utf8mb4_polish_ci NOT NULL,
  `opis` varchar(500) COLLATE utf8mb4_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `marka`
--

INSERT INTO `marka` (`id`, `marka`, `opis`) VALUES
(1, 'Alfa Romeo', NULL),
(2, 'Audi', NULL),
(3, 'BMW', NULL),
(4, 'Volvo', NULL),
(5, 'Toyota', NULL);

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

--
-- Zrzut danych tabeli `model`
--

INSERT INTO `model` (`id`, `model`, `id_marki`, `opis`) VALUES
(1, 'Spider', 1, NULL),
(2, 'Sportwagon', 1, NULL),
(3, 'Seria 2', 3, NULL),
(4, 'Tacoma', 5, NULL),
(5, 'Sienna', 5, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `nadwozie`
--

CREATE TABLE `nadwozie` (
  `id` int(11) NOT NULL,
  `nadwozie` varchar(100) COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `nadwozie`
--

INSERT INTO `nadwozie` (`id`, `nadwozie`) VALUES
(1, 'Kabriolet'),
(2, 'Sedan'),
(3, 'Coupe'),
(4, 'Pickup'),
(5, 'SUV');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `paliwo`
--

CREATE TABLE `paliwo` (
  `id` int(11) NOT NULL,
  `paliwo` varchar(150) COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `paliwo`
--

INSERT INTO `paliwo` (`id`, `paliwo`) VALUES
(1, 'Benzyna'),
(2, 'Diesel'),
(3, 'LPG');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `samochod`
--

CREATE TABLE `samochod` (
  `id` int(11) NOT NULL,
  `id_marka` int(11) NOT NULL,
  `id_model` int(11) NOT NULL,
  `cena` double NOT NULL,
  `rok_produkcji` year(4) NOT NULL,
  `przebieg` int(11) NOT NULL,
  `moc_silnika` int(11) NOT NULL,
  `id_paliwo` int(11) NOT NULL,
  `skrzynia_biegow` varchar(50) COLLATE utf8mb4_polish_ci NOT NULL,
  `id_kraj_pochodzenia` int(11) NOT NULL,
  `id_kolor` int(11) NOT NULL,
  `stan_techniczny` varchar(50) COLLATE utf8mb4_polish_ci NOT NULL,
  `wypadkowy` tinyint(1) NOT NULL,
  `id_kategoria` int(11) NOT NULL,
  `id_nadwozie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `samochod`
--

INSERT INTO `samochod` (`id`, `id_marka`, `id_model`, `cena`, `rok_produkcji`, `przebieg`, `moc_silnika`, `id_paliwo`, `skrzynia_biegow`, `id_kraj_pochodzenia`, `id_kolor`, `stan_techniczny`, `wypadkowy`, `id_kategoria`, `id_nadwozie`) VALUES
(1, 5, 5, 23000, 2100, 1000, 120, 2, 'Automatyczna', 3, 1, 'nieuszkodzony', 0, 1, 2);

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
-- Indeksy dla tabeli `kategoria`
--
ALTER TABLE `kategoria`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `kolor`
--
ALTER TABLE `kolor`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `kraj_pochodzenia`
--
ALTER TABLE `kraj_pochodzenia`
  ADD PRIMARY KEY (`id`);

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
-- Indeksy dla tabeli `nadwozie`
--
ALTER TABLE `nadwozie`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `paliwo`
--
ALTER TABLE `paliwo`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `samochod`
--
ALTER TABLE `samochod`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategoria` (`id_kategoria`),
  ADD KEY `id_kolor` (`id_kolor`),
  ADD KEY `id_kraj_pochodzenia` (`id_kraj_pochodzenia`),
  ADD KEY `id_marka` (`id_marka`),
  ADD KEY `id_model` (`id_model`),
  ADD KEY `id_nadwozie` (`id_nadwozie`),
  ADD KEY `id_paliwo` (`id_paliwo`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `kategoria`
--
ALTER TABLE `kategoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `kolor`
--
ALTER TABLE `kolor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `kraj_pochodzenia`
--
ALTER TABLE `kraj_pochodzenia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `marka`
--
ALTER TABLE `marka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `model`
--
ALTER TABLE `model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `nadwozie`
--
ALTER TABLE `nadwozie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `paliwo`
--
ALTER TABLE `paliwo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `samochod`
--
ALTER TABLE `samochod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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

--
-- Ograniczenia dla tabeli `samochod`
--
ALTER TABLE `samochod`
  ADD CONSTRAINT `samochod_ibfk_1` FOREIGN KEY (`id_kategoria`) REFERENCES `kategoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `samochod_ibfk_2` FOREIGN KEY (`id_kolor`) REFERENCES `kolor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `samochod_ibfk_3` FOREIGN KEY (`id_kraj_pochodzenia`) REFERENCES `kraj_pochodzenia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `samochod_ibfk_4` FOREIGN KEY (`id_marka`) REFERENCES `marka` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `samochod_ibfk_5` FOREIGN KEY (`id_model`) REFERENCES `model` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `samochod_ibfk_6` FOREIGN KEY (`id_nadwozie`) REFERENCES `nadwozie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `samochod_ibfk_7` FOREIGN KEY (`id_paliwo`) REFERENCES `paliwo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
