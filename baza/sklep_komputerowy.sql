-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 04 Lis 2019, 20:20
-- Wersja serwera: 10.4.6-MariaDB
-- Wersja PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `sklep_komputerowy`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `administrator`
--

CREATE TABLE `administrator` (
  `idAdministrator` int(10) UNSIGNED NOT NULL,
  `Login` varchar(255) COLLATE utf8mb4_polish_ci NOT NULL,
  `Haslo` varchar(255) COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `administrator`
--

INSERT INTO `administrator` (`idAdministrator`, `Login`, `Haslo`) VALUES
(11, 'Admin', 'e3afed0047b08059d0fada10f400c1e5');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dysk`
--

CREATE TABLE `dysk` (
  `idDysk` int(10) UNSIGNED NOT NULL,
  `Zdjecia_idZdjecia` int(10) UNSIGNED NOT NULL,
  `Gwarancja_idGwarancja` int(10) UNSIGNED NOT NULL,
  `Producent_idProducent` int(10) UNSIGNED NOT NULL,
  `Nazwa` varchar(100) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `Opis` text COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `Cena` float DEFAULT NULL,
  `Typ` varchar(20) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `Interfejs` varchar(20) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `Pojemnosc` int(11) DEFAULT NULL,
  `SzybkoscZapisu` int(11) DEFAULT NULL,
  `SzybkoscOdczytu` int(11) DEFAULT NULL,
  `Format` varchar(20) COLLATE utf8mb4_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `dysk`
--

INSERT INTO `dysk` (`idDysk`, `Zdjecia_idZdjecia`, `Gwarancja_idGwarancja`, `Producent_idProducent`, `Nazwa`, `Opis`, `Cena`, `Typ`, `Interfejs`, `Pojemnosc`, `SzybkoscZapisu`, `SzybkoscOdczytu`, `Format`) VALUES
(3, 1, 1, 1, 'SU800', 'Dysk SSD firmy ADATA o pojemności 256 GB.', 199.99, 'SSD', 'SATA III', 256, 520, 560, '2.5 cala');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dysk_has_zamowienia`
--

CREATE TABLE `dysk_has_zamowienia` (
  `Dysk_idDysk` int(10) UNSIGNED NOT NULL,
  `Zamowienia_idZamowienia` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gwarancja`
--

CREATE TABLE `gwarancja` (
  `idGwarancja` int(10) UNSIGNED NOT NULL,
  `DlugoscGwarancji` int(11) DEFAULT NULL,
  `MiejsceGwarancji` enum('Sklep','Serwis producenta') COLLATE utf8mb4_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `gwarancja`
--

INSERT INTO `gwarancja` (`idGwarancja`, `DlugoscGwarancji`, `MiejsceGwarancji`) VALUES
(1, 3, 'Sklep'),
(2, 5, 'Serwis producenta'),
(3, 2, 'Sklep');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kartagraficzna`
--

CREATE TABLE `kartagraficzna` (
  `idKartaGraficzna` int(10) UNSIGNED NOT NULL,
  `Zdjecia_idZdjecia` int(10) UNSIGNED NOT NULL,
  `Gwarancja_idGwarancja` int(10) UNSIGNED NOT NULL,
  `Producent_idProducent` int(10) UNSIGNED NOT NULL,
  `Nazwa` varchar(100) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `Opis` text COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `Cena` float DEFAULT NULL,
  `TaktowanieRdzenia` int(11) DEFAULT NULL,
  `TaktowaniePamieci` int(11) DEFAULT NULL,
  `TypZlacza` varchar(30) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `TypPamieci` varchar(20) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `WielkoscPamieci` int(11) DEFAULT NULL,
  `ZalecanaMoc` int(11) DEFAULT NULL,
  `RodzajeIO` varchar(255) COLLATE utf8mb4_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `kartagraficzna`
--

INSERT INTO `kartagraficzna` (`idKartaGraficzna`, `Zdjecia_idZdjecia`, `Gwarancja_idGwarancja`, `Producent_idProducent`, `Nazwa`, `Opis`, `Cena`, `TaktowanieRdzenia`, `TaktowaniePamieci`, `TypZlacza`, `TypPamieci`, `WielkoscPamieci`, `ZalecanaMoc`, `RodzajeIO`) VALUES
(1, 2, 2, 2, 'GTX 1660 6GB', 'Karta graficzna GTX 1660 firmy GIGABYTE.', 1059.99, 1830, 8000, 'PCI-Express x16', 'GDDR5', 6144, 450, '1 x wyjście HDMI\r\n3 x Display Port');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kartagraficzna_has_zamowienia`
--

CREATE TABLE `kartagraficzna_has_zamowienia` (
  `KartaGraficzna_idKartaGraficzna` int(10) UNSIGNED NOT NULL,
  `Zamowienia_idZamowienia` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `kartagraficzna_has_zamowienia`
--

INSERT INTO `kartagraficzna_has_zamowienia` (`KartaGraficzna_idKartaGraficzna`, `Zamowienia_idZamowienia`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `idKlienci` int(10) UNSIGNED NOT NULL,
  `Imie` varchar(255) COLLATE utf8mb4_polish_ci NOT NULL,
  `Nazwisko` varchar(255) COLLATE utf8mb4_polish_ci NOT NULL,
  `Adres` varchar(255) COLLATE utf8mb4_polish_ci NOT NULL,
  `KodPocztowy` varchar(20) COLLATE utf8mb4_polish_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_polish_ci NOT NULL,
  `Haslo` varchar(255) COLLATE utf8mb4_polish_ci NOT NULL,
  `DataUrodzenia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `klienci`
--

INSERT INTO `klienci` (`idKlienci`, `Imie`, `Nazwisko`, `Adres`, `KodPocztowy`, `Email`, `Haslo`, `DataUrodzenia`) VALUES
(1, 'Jan', 'Kowalski', 'Warszawa, ul. Zielona 2', '12-123', 'jankowalski@email.pl', 'testowehaslo', '2018-11-27');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `komputer`
--

CREATE TABLE `komputer` (
  `idKomputer` int(10) UNSIGNED NOT NULL,
  `Zasilacz_idZasilacz` int(10) UNSIGNED NOT NULL,
  `PlytaGlowna_idPlytaGlowna` int(10) UNSIGNED NOT NULL,
  `KartaGraficzna_idKartaGraficzna` int(10) UNSIGNED NOT NULL,
  `Obudowa_idObudowa` int(10) UNSIGNED NOT NULL,
  `Dysk_idDysk` int(10) UNSIGNED NOT NULL,
  `RAM_idRAM` int(10) UNSIGNED NOT NULL,
  `Procesor_idProcesor` int(10) UNSIGNED NOT NULL,
  `Nazwa` varchar(100) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `Opis` text COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `cena` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `komputer`
--

INSERT INTO `komputer` (`idKomputer`, `Zasilacz_idZasilacz`, `PlytaGlowna_idPlytaGlowna`, `KartaGraficzna_idKartaGraficzna`, `Obudowa_idObudowa`, `Dysk_idDysk`, `RAM_idRAM`, `Procesor_idProcesor`, `Nazwa`, `Opis`, `cena`) VALUES
(1, 1, 1, 1, 1, 3, 1, 1, 'Przykładowy komputer', 'Komputer złożony przez nasz sklep komputerowy', 5999.99);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `komputer_has_zamowienia`
--

CREATE TABLE `komputer_has_zamowienia` (
  `Komputer_idKomputer` int(10) UNSIGNED NOT NULL,
  `Zamowienia_idZamowienia` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `obudowa`
--

CREATE TABLE `obudowa` (
  `idObudowa` int(10) UNSIGNED NOT NULL,
  `Zdjecia_idZdjecia` int(10) UNSIGNED NOT NULL,
  `Gwarancja_idGwarancja` int(10) UNSIGNED NOT NULL,
  `Producent_idProducent` int(10) UNSIGNED NOT NULL,
  `Nazwa` varchar(100) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `Opis` text COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `Cena` float DEFAULT NULL,
  `Typ` varchar(20) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `Standard` varchar(100) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `ZlaczaPaneluPrzedniego` varchar(255) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `Komponenty` varchar(255) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `RGB` enum('Tak','Nie') COLLATE utf8mb4_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `obudowa`
--

INSERT INTO `obudowa` (`idObudowa`, `Zdjecia_idZdjecia`, `Gwarancja_idGwarancja`, `Producent_idProducent`, `Nazwa`, `Opis`, `Cena`, `Typ`, `Standard`, `ZlaczaPaneluPrzedniego`, `Komponenty`, `RGB`) VALUES
(1, 3, 3, 3, 'Regnum RG4T Pure Black', 'Obudowa komputerowa Regnum RG4T Pure Black firmy SilentiumPC', 189.9, 'Midi Tower', 'ATX\r\nmicro-ATX\r\nmini-ITX', '2 x USB 3.0\r\naudio', '3 x 120mm wentylatory w komplecie\r\nczytnik kart pamięci\r\nkontroler obrotów wentylatorów', 'Nie');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `obudowa_has_zamowienia`
--

CREATE TABLE `obudowa_has_zamowienia` (
  `Obudowa_idObudowa` int(10) UNSIGNED NOT NULL,
  `Zamowienia_idZamowienia` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `plytaglowna`
--

CREATE TABLE `plytaglowna` (
  `idPlytaGlowna` int(10) UNSIGNED NOT NULL,
  `Zdjecia_idZdjecia` int(10) UNSIGNED NOT NULL,
  `Gwarancja_idGwarancja` int(10) UNSIGNED NOT NULL,
  `Producent_idProducent` int(10) UNSIGNED NOT NULL,
  `Nazwa` varchar(100) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `Opis` text COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `Cena` float DEFAULT NULL,
  `Przeznaczenie` enum('AMD','INTEL') COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `Chipset` varchar(20) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `GniazdoProcesora` varchar(20) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `ObslugiwanaPamiec` varchar(20) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `IloscGniazdPamieci` int(11) DEFAULT NULL,
  `MaksPojPamieci` int(11) DEFAULT NULL,
  `Zlacza` varchar(255) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `Zasilanie` varchar(20) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `StandardPlyty` varchar(20) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `ZintKartaSiec` enum('Tak','Nie') COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `ZintKartaDzwiek` enum('Tak','Nie') COLLATE utf8mb4_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `plytaglowna`
--

INSERT INTO `plytaglowna` (`idPlytaGlowna`, `Zdjecia_idZdjecia`, `Gwarancja_idGwarancja`, `Producent_idProducent`, `Nazwa`, `Opis`, `Cena`, `Przeznaczenie`, `Chipset`, `GniazdoProcesora`, `ObslugiwanaPamiec`, `IloscGniazdPamieci`, `MaksPojPamieci`, `Zlacza`, `Zasilanie`, `StandardPlyty`, `ZintKartaSiec`, `ZintKartaDzwiek`) VALUES
(1, 4, 1, 2, 'Z370 AORUS Gaming 3', 'Płyta główna Z370 AORUS Gaming 3 firmy GIGABYTE przeznaczona dla procesorów rodziny Intel.', 689.9, 'INTEL', 'Z370', 'Socket 1151', 'DDR4', 4, 64, '2 x PCI-Express x16\r\n4 x PCI-Express x1\r\n1 x HDMI\r\n1 x PS/2\r\n1 x RJ45\r\n1 x USB 3.1 (Gen 2) typ C\r\n1 x USB 3.1 (Gen2)\r\n2 x USB\r\n4 x USB 3.1\r\nAudio', 'Wtyczka ATX 24pin', 'ATX', 'Tak', 'Tak');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `plytaglowna_has_zamowienia`
--

CREATE TABLE `plytaglowna_has_zamowienia` (
  `PlytaGlowna_idPlytaGlowna` int(10) UNSIGNED NOT NULL,
  `Zamowienia_idZamowienia` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `procesor`
--

CREATE TABLE `procesor` (
  `idProcesor` int(10) UNSIGNED NOT NULL,
  `Zdjecia_idZdjecia` int(10) UNSIGNED NOT NULL,
  `Gwarancja_idGwarancja` int(10) UNSIGNED NOT NULL,
  `Producent_idProducent` int(10) UNSIGNED NOT NULL,
  `Nazwa` varchar(100) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `Opis` text COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `Cena` float DEFAULT NULL,
  `IloscRdzeni` int(11) DEFAULT NULL,
  `Socket` varchar(20) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `Taktowanie` int(11) DEFAULT NULL,
  `TaktowanieTurbo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `procesor`
--

INSERT INTO `procesor` (`idProcesor`, `Zdjecia_idZdjecia`, `Gwarancja_idGwarancja`, `Producent_idProducent`, `Nazwa`, `Opis`, `Cena`, `IloscRdzeni`, `Socket`, `Taktowanie`, `TaktowanieTurbo`) VALUES
(1, 5, 1, 4, 'Core i5-8600k', 'Procesor Intel Core i5-8600k.', 1059.99, 6, '1151', 3600, 4300);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `procesor_has_zamowienia`
--

CREATE TABLE `procesor_has_zamowienia` (
  `Procesor_idProcesor` int(10) UNSIGNED NOT NULL,
  `Zamowienia_idZamowienia` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `producent`
--

CREATE TABLE `producent` (
  `idProducent` int(10) UNSIGNED NOT NULL,
  `Nazwa` varchar(30) COLLATE utf8mb4_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `producent`
--

INSERT INTO `producent` (`idProducent`, `Nazwa`) VALUES
(1, 'ADATA'),
(2, 'GIGABYTE'),
(3, 'SilentiumPC'),
(4, 'INTEL'),
(5, 'HyperX');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ram`
--

CREATE TABLE `ram` (
  `idRAM` int(10) UNSIGNED NOT NULL,
  `Zdjecia_idZdjecia` int(10) UNSIGNED NOT NULL,
  `Gwarancja_idGwarancja` int(10) UNSIGNED NOT NULL,
  `Producent_idProducent` int(10) UNSIGNED NOT NULL,
  `Nazwa` varchar(100) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `Opis` text COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `Cena` float DEFAULT NULL,
  `RodzajPamieci` varchar(100) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `Typ` varchar(20) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `Pojemnosc` int(11) DEFAULT NULL,
  `PojemnoscModulu` int(11) DEFAULT NULL,
  `IloscModulow` int(11) DEFAULT NULL,
  `Czestotliwosc` int(11) DEFAULT NULL,
  `Napiecie` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `ram`
--

INSERT INTO `ram` (`idRAM`, `Zdjecia_idZdjecia`, `Gwarancja_idGwarancja`, `Producent_idProducent`, `Nazwa`, `Opis`, `Cena`, `RodzajPamieci`, `Typ`, `Pojemnosc`, `PojemnoscModulu`, `IloscModulow`, `Czestotliwosc`, `Napiecie`) VALUES
(1, 6, 1, 5, 'Predator XMP 16GB 2x8GB 3200MHz DDR4 CL16]', 'Pamięć RAM DDR4 firmy HyperX o pojemności 16GB w dwóch modułach po 8GB.', 389.5, 'DIMM(do PC)', 'DDR4', 16, 8, 2, 3200, 1.35);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ram_has_zamowienia`
--

CREATE TABLE `ram_has_zamowienia` (
  `RAM_idRAM` int(10) UNSIGNED NOT NULL,
  `Zamowienia_idZamowienia` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `ram_has_zamowienia`
--

INSERT INTO `ram_has_zamowienia` (`RAM_idRAM`, `Zamowienia_idZamowienia`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `idZamowienia` int(10) UNSIGNED NOT NULL,
  `Klienci_idKlienci` int(10) UNSIGNED NOT NULL,
  `DataZamowienia` datetime NOT NULL DEFAULT current_timestamp(),
  `PrzewidywanaDataDostawy` date NOT NULL,
  `KwotaZamowienia` float NOT NULL,
  `RodzajPlatnosci` enum('Z góry','Za pobraniem') COLLATE utf8mb4_polish_ci NOT NULL,
  `RodzajDostawy` enum('Odbiór osobisty','Kurier','Paczkomat') COLLATE utf8mb4_polish_ci NOT NULL,
  `StatusZamowienia` enum('W trakcie','Zakończono') COLLATE utf8mb4_polish_ci NOT NULL DEFAULT 'W trakcie'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `zamowienia`
--

INSERT INTO `zamowienia` (`idZamowienia`, `Klienci_idKlienci`, `DataZamowienia`, `PrzewidywanaDataDostawy`, `KwotaZamowienia`, `RodzajPlatnosci`, `RodzajDostawy`, `StatusZamowienia`) VALUES
(1, 1, '2019-11-04 20:09:55', '2019-11-07', 5000, 'Za pobraniem', 'Kurier', 'W trakcie');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zasilacz`
--

CREATE TABLE `zasilacz` (
  `idZasilacz` int(10) UNSIGNED NOT NULL,
  `Zdjecia_idZdjecia` int(10) UNSIGNED NOT NULL,
  `Gwarancja_idGwarancja` int(10) UNSIGNED NOT NULL,
  `Producent_idProducent` int(10) UNSIGNED NOT NULL,
  `Nazwa` varchar(100) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `Opis` text COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `Cena` float DEFAULT NULL,
  `Moc` int(11) DEFAULT NULL,
  `Standard` varchar(20) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `WtyczkiZasilania` varchar(255) COLLATE utf8mb4_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `zasilacz`
--

INSERT INTO `zasilacz` (`idZasilacz`, `Zdjecia_idZdjecia`, `Gwarancja_idGwarancja`, `Producent_idProducent`, `Nazwa`, `Opis`, `Cena`, `Moc`, `Standard`, `WtyczkiZasilania`) VALUES
(1, 7, 1, 3, 'Vero L2 Bronze 600W', 'Zasilacz firmy SilentiumPC o mocy 600W z certyfikatem 80 Plus Bronze', 219.99, 600, 'ATX', '1 x 4/8 EPS 12V\r\n2 x 6/8-pin PEG\r\n3 x 4-pin Molex\r\n7 x SATA\r\nATX 24pin');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zasilacz_has_zamowienia`
--

CREATE TABLE `zasilacz_has_zamowienia` (
  `Zasilacz_idZasilacz` int(10) UNSIGNED NOT NULL,
  `Zamowienia_idZamowienia` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zdjecia`
--

CREATE TABLE `zdjecia` (
  `idZdjecia` int(10) UNSIGNED NOT NULL,
  `SciezkaZdjecia` varchar(255) COLLATE utf8mb4_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `zdjecia`
--

INSERT INTO `zdjecia` (`idZdjecia`, `SciezkaZdjecia`) VALUES
(1, 'images/adataSU800.jpg'),
(2, 'images/gigabyteGtx1660.jpg'),
(3, 'images/silentiumpcRegnumRG4T.jpg'),
(4, 'images/gigabyteZ370AorusGaming3.jpg'),
(5, 'images/intelCorei5-8600k.jpg'),
(6, 'images/hyperxPredator16gb3200mhz.jpg'),
(7, 'images/silentiumpcVeroL2Bronze600W.jpg');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`idAdministrator`);

--
-- Indeksy dla tabeli `dysk`
--
ALTER TABLE `dysk`
  ADD PRIMARY KEY (`idDysk`),
  ADD KEY `Dysk_FKIndex1` (`Producent_idProducent`),
  ADD KEY `Dysk_FKIndex2` (`Gwarancja_idGwarancja`),
  ADD KEY `Dysk_FKIndex3` (`Zdjecia_idZdjecia`);

--
-- Indeksy dla tabeli `dysk_has_zamowienia`
--
ALTER TABLE `dysk_has_zamowienia`
  ADD PRIMARY KEY (`Dysk_idDysk`,`Zamowienia_idZamowienia`),
  ADD KEY `Dysk_has_Zamowienia_FKIndex1` (`Dysk_idDysk`),
  ADD KEY `Dysk_has_Zamowienia_FKIndex2` (`Zamowienia_idZamowienia`);

--
-- Indeksy dla tabeli `gwarancja`
--
ALTER TABLE `gwarancja`
  ADD PRIMARY KEY (`idGwarancja`);

--
-- Indeksy dla tabeli `kartagraficzna`
--
ALTER TABLE `kartagraficzna`
  ADD PRIMARY KEY (`idKartaGraficzna`),
  ADD KEY `KartaGraficzna_FKIndex1` (`Producent_idProducent`),
  ADD KEY `KartaGraficzna_FKIndex2` (`Gwarancja_idGwarancja`),
  ADD KEY `KartaGraficzna_FKIndex3` (`Zdjecia_idZdjecia`);

--
-- Indeksy dla tabeli `kartagraficzna_has_zamowienia`
--
ALTER TABLE `kartagraficzna_has_zamowienia`
  ADD PRIMARY KEY (`KartaGraficzna_idKartaGraficzna`,`Zamowienia_idZamowienia`),
  ADD KEY `KartaGraficzna_has_Zamowienia_FKIndex2` (`Zamowienia_idZamowienia`),
  ADD KEY `KartaGraficzna_idKartaGraficzna` (`KartaGraficzna_idKartaGraficzna`);

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`idKlienci`);

--
-- Indeksy dla tabeli `komputer`
--
ALTER TABLE `komputer`
  ADD PRIMARY KEY (`idKomputer`),
  ADD KEY `Komputer_FKIndex1` (`Procesor_idProcesor`),
  ADD KEY `Komputer_FKIndex2` (`RAM_idRAM`),
  ADD KEY `Komputer_FKIndex3` (`Dysk_idDysk`),
  ADD KEY `Komputer_FKIndex4` (`Obudowa_idObudowa`),
  ADD KEY `Komputer_FKIndex5` (`KartaGraficzna_idKartaGraficzna`),
  ADD KEY `Komputer_FKIndex6` (`PlytaGlowna_idPlytaGlowna`),
  ADD KEY `Komputer_FKIndex7` (`Zasilacz_idZasilacz`);

--
-- Indeksy dla tabeli `komputer_has_zamowienia`
--
ALTER TABLE `komputer_has_zamowienia`
  ADD PRIMARY KEY (`Komputer_idKomputer`,`Zamowienia_idZamowienia`),
  ADD KEY `Komputer_has_Zamowienia_FKIndex1` (`Komputer_idKomputer`),
  ADD KEY `Komputer_has_Zamowienia_FKIndex2` (`Zamowienia_idZamowienia`);

--
-- Indeksy dla tabeli `obudowa`
--
ALTER TABLE `obudowa`
  ADD PRIMARY KEY (`idObudowa`),
  ADD KEY `Obudowa_FKIndex1` (`Producent_idProducent`),
  ADD KEY `Obudowa_FKIndex2` (`Gwarancja_idGwarancja`),
  ADD KEY `Obudowa_FKIndex3` (`Zdjecia_idZdjecia`);

--
-- Indeksy dla tabeli `obudowa_has_zamowienia`
--
ALTER TABLE `obudowa_has_zamowienia`
  ADD PRIMARY KEY (`Obudowa_idObudowa`,`Zamowienia_idZamowienia`),
  ADD KEY `Obudowa_has_Zamowienia_FKIndex1` (`Obudowa_idObudowa`),
  ADD KEY `Obudowa_has_Zamowienia_FKIndex2` (`Zamowienia_idZamowienia`);

--
-- Indeksy dla tabeli `plytaglowna`
--
ALTER TABLE `plytaglowna`
  ADD PRIMARY KEY (`idPlytaGlowna`),
  ADD KEY `PlytaGlowna_FKIndex1` (`Producent_idProducent`),
  ADD KEY `PlytaGlowna_FKIndex2` (`Gwarancja_idGwarancja`),
  ADD KEY `PlytaGlowna_FKIndex3` (`Zdjecia_idZdjecia`);

--
-- Indeksy dla tabeli `plytaglowna_has_zamowienia`
--
ALTER TABLE `plytaglowna_has_zamowienia`
  ADD PRIMARY KEY (`PlytaGlowna_idPlytaGlowna`,`Zamowienia_idZamowienia`),
  ADD KEY `PlytaGlowna_has_Zamowienia_FKIndex1` (`PlytaGlowna_idPlytaGlowna`),
  ADD KEY `PlytaGlowna_has_Zamowienia_FKIndex2` (`Zamowienia_idZamowienia`);

--
-- Indeksy dla tabeli `procesor`
--
ALTER TABLE `procesor`
  ADD PRIMARY KEY (`idProcesor`),
  ADD KEY `Procesor_FKIndex1` (`Producent_idProducent`),
  ADD KEY `Procesor_FKIndex2` (`Gwarancja_idGwarancja`),
  ADD KEY `Procesor_FKIndex3` (`Zdjecia_idZdjecia`);

--
-- Indeksy dla tabeli `procesor_has_zamowienia`
--
ALTER TABLE `procesor_has_zamowienia`
  ADD PRIMARY KEY (`Procesor_idProcesor`,`Zamowienia_idZamowienia`),
  ADD KEY `Procesor_has_Zamowienia_FKIndex1` (`Procesor_idProcesor`),
  ADD KEY `Procesor_has_Zamowienia_FKIndex2` (`Zamowienia_idZamowienia`);

--
-- Indeksy dla tabeli `producent`
--
ALTER TABLE `producent`
  ADD PRIMARY KEY (`idProducent`);

--
-- Indeksy dla tabeli `ram`
--
ALTER TABLE `ram`
  ADD PRIMARY KEY (`idRAM`),
  ADD KEY `RAM_FKIndex1` (`Producent_idProducent`),
  ADD KEY `RAM_FKIndex2` (`Gwarancja_idGwarancja`),
  ADD KEY `RAM_FKIndex3` (`Zdjecia_idZdjecia`);

--
-- Indeksy dla tabeli `ram_has_zamowienia`
--
ALTER TABLE `ram_has_zamowienia`
  ADD PRIMARY KEY (`RAM_idRAM`,`Zamowienia_idZamowienia`),
  ADD KEY `RAM_has_Zamowienia_FKIndex1` (`RAM_idRAM`),
  ADD KEY `RAM_has_Zamowienia_FKIndex2` (`Zamowienia_idZamowienia`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`idZamowienia`),
  ADD KEY `Zamowienia_FKIndex1` (`Klienci_idKlienci`);

--
-- Indeksy dla tabeli `zasilacz`
--
ALTER TABLE `zasilacz`
  ADD PRIMARY KEY (`idZasilacz`),
  ADD KEY `Zasilacz_FKIndex1` (`Producent_idProducent`),
  ADD KEY `Zasilacz_FKIndex2` (`Gwarancja_idGwarancja`),
  ADD KEY `Zasilacz_FKIndex3` (`Zdjecia_idZdjecia`);

--
-- Indeksy dla tabeli `zasilacz_has_zamowienia`
--
ALTER TABLE `zasilacz_has_zamowienia`
  ADD PRIMARY KEY (`Zasilacz_idZasilacz`,`Zamowienia_idZamowienia`),
  ADD KEY `Zasilacz_has_Zamowienia_FKIndex1` (`Zasilacz_idZasilacz`),
  ADD KEY `Zasilacz_has_Zamowienia_FKIndex2` (`Zamowienia_idZamowienia`);

--
-- Indeksy dla tabeli `zdjecia`
--
ALTER TABLE `zdjecia`
  ADD PRIMARY KEY (`idZdjecia`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `administrator`
--
ALTER TABLE `administrator`
  MODIFY `idAdministrator` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `dysk`
--
ALTER TABLE `dysk`
  MODIFY `idDysk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `gwarancja`
--
ALTER TABLE `gwarancja`
  MODIFY `idGwarancja` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `kartagraficzna`
--
ALTER TABLE `kartagraficzna`
  MODIFY `idKartaGraficzna` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `klienci`
--
ALTER TABLE `klienci`
  MODIFY `idKlienci` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `komputer`
--
ALTER TABLE `komputer`
  MODIFY `idKomputer` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `obudowa`
--
ALTER TABLE `obudowa`
  MODIFY `idObudowa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `plytaglowna`
--
ALTER TABLE `plytaglowna`
  MODIFY `idPlytaGlowna` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `procesor`
--
ALTER TABLE `procesor`
  MODIFY `idProcesor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `producent`
--
ALTER TABLE `producent`
  MODIFY `idProducent` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `ram`
--
ALTER TABLE `ram`
  MODIFY `idRAM` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `idZamowienia` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `zasilacz`
--
ALTER TABLE `zasilacz`
  MODIFY `idZasilacz` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `zdjecia`
--
ALTER TABLE `zdjecia`
  MODIFY `idZdjecia` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `dysk`
--
ALTER TABLE `dysk`
  ADD CONSTRAINT `dysk_ibfk_1` FOREIGN KEY (`Gwarancja_idGwarancja`) REFERENCES `gwarancja` (`idGwarancja`),
  ADD CONSTRAINT `dysk_ibfk_2` FOREIGN KEY (`Producent_idProducent`) REFERENCES `producent` (`idProducent`),
  ADD CONSTRAINT `dysk_ibfk_3` FOREIGN KEY (`Zdjecia_idZdjecia`) REFERENCES `zdjecia` (`idZdjecia`);

--
-- Ograniczenia dla tabeli `dysk_has_zamowienia`
--
ALTER TABLE `dysk_has_zamowienia`
  ADD CONSTRAINT `dysk_has_zamowienia_ibfk_1` FOREIGN KEY (`Dysk_idDysk`) REFERENCES `dysk` (`idDysk`),
  ADD CONSTRAINT `dysk_has_zamowienia_ibfk_2` FOREIGN KEY (`Zamowienia_idZamowienia`) REFERENCES `zamowienia` (`idZamowienia`);

--
-- Ograniczenia dla tabeli `kartagraficzna_has_zamowienia`
--
ALTER TABLE `kartagraficzna_has_zamowienia`
  ADD CONSTRAINT `kartagraficzna_has_zamowienia_ibfk_2` FOREIGN KEY (`Zamowienia_idZamowienia`) REFERENCES `zamowienia` (`idZamowienia`),
  ADD CONSTRAINT `kartagraficzna_has_zamowienia_ibfk_3` FOREIGN KEY (`KartaGraficzna_idKartaGraficzna`) REFERENCES `kartagraficzna` (`idKartaGraficzna`);

--
-- Ograniczenia dla tabeli `komputer`
--
ALTER TABLE `komputer`
  ADD CONSTRAINT `komputer_ibfk_1` FOREIGN KEY (`Dysk_idDysk`) REFERENCES `dysk` (`idDysk`),
  ADD CONSTRAINT `komputer_ibfk_3` FOREIGN KEY (`Obudowa_idObudowa`) REFERENCES `obudowa` (`idObudowa`),
  ADD CONSTRAINT `komputer_ibfk_4` FOREIGN KEY (`PlytaGlowna_idPlytaGlowna`) REFERENCES `plytaglowna` (`idPlytaGlowna`),
  ADD CONSTRAINT `komputer_ibfk_5` FOREIGN KEY (`Procesor_idProcesor`) REFERENCES `procesor` (`idProcesor`),
  ADD CONSTRAINT `komputer_ibfk_6` FOREIGN KEY (`RAM_idRAM`) REFERENCES `ram` (`idRAM`),
  ADD CONSTRAINT `komputer_ibfk_7` FOREIGN KEY (`Zasilacz_idZasilacz`) REFERENCES `zasilacz` (`idZasilacz`),
  ADD CONSTRAINT `komputer_ibfk_8` FOREIGN KEY (`KartaGraficzna_idKartaGraficzna`) REFERENCES `kartagraficzna` (`idKartaGraficzna`);

--
-- Ograniczenia dla tabeli `komputer_has_zamowienia`
--
ALTER TABLE `komputer_has_zamowienia`
  ADD CONSTRAINT `komputer_has_zamowienia_ibfk_1` FOREIGN KEY (`Komputer_idKomputer`) REFERENCES `komputer` (`idKomputer`),
  ADD CONSTRAINT `komputer_has_zamowienia_ibfk_2` FOREIGN KEY (`Zamowienia_idZamowienia`) REFERENCES `zamowienia` (`idZamowienia`);

--
-- Ograniczenia dla tabeli `obudowa`
--
ALTER TABLE `obudowa`
  ADD CONSTRAINT `obudowa_ibfk_1` FOREIGN KEY (`Gwarancja_idGwarancja`) REFERENCES `gwarancja` (`idGwarancja`),
  ADD CONSTRAINT `obudowa_ibfk_2` FOREIGN KEY (`Producent_idProducent`) REFERENCES `producent` (`idProducent`),
  ADD CONSTRAINT `obudowa_ibfk_3` FOREIGN KEY (`Zdjecia_idZdjecia`) REFERENCES `zdjecia` (`idZdjecia`);

--
-- Ograniczenia dla tabeli `obudowa_has_zamowienia`
--
ALTER TABLE `obudowa_has_zamowienia`
  ADD CONSTRAINT `obudowa_has_zamowienia_ibfk_1` FOREIGN KEY (`Obudowa_idObudowa`) REFERENCES `obudowa` (`idObudowa`),
  ADD CONSTRAINT `obudowa_has_zamowienia_ibfk_2` FOREIGN KEY (`Zamowienia_idZamowienia`) REFERENCES `zamowienia` (`idZamowienia`);

--
-- Ograniczenia dla tabeli `plytaglowna`
--
ALTER TABLE `plytaglowna`
  ADD CONSTRAINT `plytaglowna_ibfk_1` FOREIGN KEY (`Zdjecia_idZdjecia`) REFERENCES `zdjecia` (`idZdjecia`),
  ADD CONSTRAINT `plytaglowna_ibfk_2` FOREIGN KEY (`Gwarancja_idGwarancja`) REFERENCES `gwarancja` (`idGwarancja`),
  ADD CONSTRAINT `plytaglowna_ibfk_3` FOREIGN KEY (`Producent_idProducent`) REFERENCES `producent` (`idProducent`);

--
-- Ograniczenia dla tabeli `plytaglowna_has_zamowienia`
--
ALTER TABLE `plytaglowna_has_zamowienia`
  ADD CONSTRAINT `plytaglowna_has_zamowienia_ibfk_1` FOREIGN KEY (`PlytaGlowna_idPlytaGlowna`) REFERENCES `plytaglowna` (`idPlytaGlowna`),
  ADD CONSTRAINT `plytaglowna_has_zamowienia_ibfk_2` FOREIGN KEY (`Zamowienia_idZamowienia`) REFERENCES `zamowienia` (`idZamowienia`);

--
-- Ograniczenia dla tabeli `procesor`
--
ALTER TABLE `procesor`
  ADD CONSTRAINT `procesor_ibfk_1` FOREIGN KEY (`Zdjecia_idZdjecia`) REFERENCES `zdjecia` (`idZdjecia`),
  ADD CONSTRAINT `procesor_ibfk_2` FOREIGN KEY (`Gwarancja_idGwarancja`) REFERENCES `gwarancja` (`idGwarancja`),
  ADD CONSTRAINT `procesor_ibfk_3` FOREIGN KEY (`Producent_idProducent`) REFERENCES `producent` (`idProducent`);

--
-- Ograniczenia dla tabeli `procesor_has_zamowienia`
--
ALTER TABLE `procesor_has_zamowienia`
  ADD CONSTRAINT `procesor_has_zamowienia_ibfk_1` FOREIGN KEY (`Procesor_idProcesor`) REFERENCES `procesor` (`idProcesor`),
  ADD CONSTRAINT `procesor_has_zamowienia_ibfk_2` FOREIGN KEY (`Zamowienia_idZamowienia`) REFERENCES `zamowienia` (`idZamowienia`);

--
-- Ograniczenia dla tabeli `ram`
--
ALTER TABLE `ram`
  ADD CONSTRAINT `ram_ibfk_1` FOREIGN KEY (`Gwarancja_idGwarancja`) REFERENCES `gwarancja` (`idGwarancja`),
  ADD CONSTRAINT `ram_ibfk_2` FOREIGN KEY (`Producent_idProducent`) REFERENCES `producent` (`idProducent`),
  ADD CONSTRAINT `ram_ibfk_3` FOREIGN KEY (`Zdjecia_idZdjecia`) REFERENCES `zdjecia` (`idZdjecia`);

--
-- Ograniczenia dla tabeli `ram_has_zamowienia`
--
ALTER TABLE `ram_has_zamowienia`
  ADD CONSTRAINT `ram_has_zamowienia_ibfk_1` FOREIGN KEY (`RAM_idRAM`) REFERENCES `ram` (`idRAM`),
  ADD CONSTRAINT `ram_has_zamowienia_ibfk_2` FOREIGN KEY (`Zamowienia_idZamowienia`) REFERENCES `zamowienia` (`idZamowienia`);

--
-- Ograniczenia dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD CONSTRAINT `zamowienia_ibfk_1` FOREIGN KEY (`Klienci_idKlienci`) REFERENCES `klienci` (`idKlienci`);

--
-- Ograniczenia dla tabeli `zasilacz`
--
ALTER TABLE `zasilacz`
  ADD CONSTRAINT `zasilacz_ibfk_1` FOREIGN KEY (`Gwarancja_idGwarancja`) REFERENCES `gwarancja` (`idGwarancja`),
  ADD CONSTRAINT `zasilacz_ibfk_2` FOREIGN KEY (`Producent_idProducent`) REFERENCES `producent` (`idProducent`),
  ADD CONSTRAINT `zasilacz_ibfk_3` FOREIGN KEY (`Zdjecia_idZdjecia`) REFERENCES `zdjecia` (`idZdjecia`);

--
-- Ograniczenia dla tabeli `zasilacz_has_zamowienia`
--
ALTER TABLE `zasilacz_has_zamowienia`
  ADD CONSTRAINT `zasilacz_has_zamowienia_ibfk_1` FOREIGN KEY (`Zasilacz_idZasilacz`) REFERENCES `zasilacz` (`idZasilacz`),
  ADD CONSTRAINT `zasilacz_has_zamowienia_ibfk_2` FOREIGN KEY (`Zamowienia_idZamowienia`) REFERENCES `zamowienia` (`idZamowienia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
