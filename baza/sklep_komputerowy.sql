-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 04 Gru 2019, 19:47
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
(3, 1, 1, 1, 'SU800', 'Dysk SSD firmy ADATA o pojemności 256 GB.', 199.99, 'SSD', 'SATA III', 256, 520, 560, '2.5 cala'),
(4, 23, 1, 14, '860 EVO', 'Dysk SSD firmy Samsung.', 599.99, 'SSD', 'SATA III', 1000, 520, 550, '2.5 cala'),
(5, 22, 1, 15, 'BarraCuda', 'Dysk HDD firmy Seagate.', 199.9, 'HDD', 'SATA III', 1000, 2, 156, '3.5 cala'),
(6, 25, 1, 5, 'Savage EXO ', 'Dysk SSD firmy HyperX.', 459.99, 'SSD', 'USB 3.1 - typ C', 480, 480, 500, 'Przenośny');

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `dyski`
-- (Zobacz poniżej rzeczywisty widok)
--
CREATE TABLE `dyski` (
`ID` int(10) unsigned
,`Producent` varchar(30)
,`Nazwa` varchar(145)
,`Opis` text
,`Cena` float
,`Typ` varchar(20)
,`Interfejs` varchar(20)
,`Pojemnosc` varchar(13)
,`SzybkoscZapisu` varchar(15)
,`SzybkoscOdczytu` varchar(15)
,`Format` varchar(20)
,`DlugoscGwarancji` varchar(8)
,`MiejsceGwarancji` enum('Sklep','Serwis producenta')
,`Zdjecie` varchar(255)
);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dysk_has_zamowienia`
--

CREATE TABLE `dysk_has_zamowienia` (
  `Dysk_idDysk` int(10) UNSIGNED NOT NULL,
  `Zamowienia_idZamowienia` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `dysk_has_zamowienia`
--

INSERT INTO `dysk_has_zamowienia` (`Dysk_idDysk`, `Zamowienia_idZamowienia`) VALUES
(4, 3),
(5, 1);

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
(3, 2, 'Sklep'),
(4, 5, 'Sklep'),
(16, 3, 'Serwis producenta');

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
(1, 2, 2, 2, 'GeForce GTX 1660 6GB', 'Karta graficzna GTX 1660 firmy GIGABYTE.', 1059.99, 1830, 8000, 'PCI-Express x16', 'GDDR5', 6144, 450, '1 x wyjście HDMI,\r\n3 x Display Port'),
(4, 20, 2, 9, 'GeForce GTX 1050ti Gaming X 4GB', 'Karta graficzna GTX 1050ti firmy MSI.', 619, 1354, 7008, 'PCI-Express x16', 'GDDR5', 4096, 300, '1 x Display Port,\r\n1 x wyjście DVI-D,\r\n1 x wyjście HDMI'),
(5, 21, 1, 13, 'Titan RTX', 'Karta Graficzna NVIDIA Titan RTX.', 12290, 1365, 14000, 'PCI-Express x16', 'GDDR6', 24576, 650, '1 x USB Type-C,\r\n1 x wyjście HDMI,\r\n3 x Display Port');

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
(1, 1),
(4, 2);

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `kartygraficzne`
-- (Zobacz poniżej rzeczywisty widok)
--
CREATE TABLE `kartygraficzne` (
`ID` int(10) unsigned
,`Producent` varchar(30)
,`Nazwa` varchar(131)
,`Opis` text
,`Cena` float
,`TaktowanieRdzenia` varchar(14)
,`TaktowaniePamieci` varchar(14)
,`TypZlacza` varchar(30)
,`TypPamieci` varchar(20)
,`WielkoscPamieci` varchar(13)
,`ZalecanaMoc` varchar(12)
,`RodzajeIO` varchar(255)
,`DlugoscGwarancji` varchar(8)
,`MiejsceGwarancji` enum('Sklep','Serwis producenta')
,`Zdjecie` varchar(255)
);

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
(1, 'Jan', 'Kowalski', 'Warszawa, ul. Zielona 2', '12-123', 'test@test.com', '098f6bcd4621d373cade4e832627b4f6', '2018-11-27'),
(2, 'Witold', 'Nie-Kowalski', 'Gdańsk, ul. Czekoladowa 3', '12-123', 'witkowalski@test.pl', '098f6bcd4621d373cade4e832627b4f6', '1997-07-15'),
(3, 'Testowe', 'Dane', 'Miasto, ulica i numer lokalu', '12-123', 'testowyemail@email.com', '098f6bcd4621d373cade4e832627b4f6', '1999-07-10');

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
  `Cena` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `komputer`
--

INSERT INTO `komputer` (`idKomputer`, `Zasilacz_idZasilacz`, `PlytaGlowna_idPlytaGlowna`, `KartaGraficzna_idKartaGraficzna`, `Obudowa_idObudowa`, `Dysk_idDysk`, `RAM_idRAM`, `Procesor_idProcesor`, `Nazwa`, `Opis`, `Cena`) VALUES
(2, 1, 1, 1, 1, 3, 1, 1, 'Przykladowy komputer', 'Komputer złożony przez nasz sklep.', 3999.99),
(3, 2, 3, 5, 3, 4, 3, 3, 'Nie stać Cię :D', 'Bardzo mocny komputer.', 20000);

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `komputery`
-- (Zobacz poniżej rzeczywisty widok)
--
CREATE TABLE `komputery` (
`ID` int(10) unsigned
,`PlytaGlowna` varchar(131)
,`Procesor` varchar(131)
,`RAM` varchar(184)
,`Dysk` varchar(145)
,`KartaGraficzna` varchar(131)
,`Zasilacz` varchar(143)
,`Obudowa` varchar(131)
,`Cena` float
,`Nazwa` varchar(100)
,`Opis` text
,`Zdjecie` varchar(255)
);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `komputer_has_zamowienia`
--

CREATE TABLE `komputer_has_zamowienia` (
  `Komputer_idKomputer` int(10) UNSIGNED NOT NULL,
  `Zamowienia_idZamowienia` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `komputer_has_zamowienia`
--

INSERT INTO `komputer_has_zamowienia` (`Komputer_idKomputer`, `Zamowienia_idZamowienia`) VALUES
(3, 3);

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
(1, 3, 3, 3, 'Regnum RG4T Pure Black', 'Obudowa komputerowa Regnum RG4T Pure Black firmy SilentiumPC', 189.9, 'Midi Tower', 'ATX,\r\nmicro-ATX,\r\nmini-ITX', '2 x USB 3.0,\r\naudio', '3 x 120mm wentylatory w komplecie,\r\nczytnik kart pamięci,\r\nkontroler obrotów wentylatorów', 'Nie'),
(2, 19, 3, 12, 'Meshify C', 'Obudowa komputerowa firmy Fractal Design.', 389.99, 'Midi Tower', 'ATX,\r\nmicro-ATX,\r\nmini-ITX', '2 x USB 3.0,\r\naudio', '2 x 120mm wentylatory w komplecie', 'Nie'),
(3, 18, 3, 6, 'Crystal 570X RGB', 'Obudowa komputerowa firmy Corsair.', 799.99, 'Midi Tower', 'ATX,\r\nmicro-ATX,\r\nmini-ITX', '2 x USB 3.0,\r\naudio', '3 x 120mm wentylator RGB w komplecie', 'Tak');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `obudowa_has_zamowienia`
--

CREATE TABLE `obudowa_has_zamowienia` (
  `Obudowa_idObudowa` int(10) UNSIGNED NOT NULL,
  `Zamowienia_idZamowienia` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `obudowa_has_zamowienia`
--

INSERT INTO `obudowa_has_zamowienia` (`Obudowa_idObudowa`, `Zamowienia_idZamowienia`) VALUES
(3, 2);

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `obudowy`
-- (Zobacz poniżej rzeczywisty widok)
--
CREATE TABLE `obudowy` (
`ID` int(10) unsigned
,`Producent` varchar(30)
,`Nazwa` varchar(131)
,`Opis` text
,`Cena` float
,`Typ` varchar(20)
,`Standard` varchar(100)
,`ZlaczaPaneluPrzedniego` varchar(255)
,`Komponenty` varchar(255)
,`RGB` enum('Tak','Nie')
,`DlugoscGwarancji` varchar(8)
,`MiejsceGwarancji` enum('Sklep','Serwis producenta')
,`Zdjecie` varchar(255)
);

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
(1, 4, 1, 2, 'Z370 AORUS Gaming 3', 'Płyta główna Z370 AORUS Gaming 3 firmy GIGABYTE przeznaczona dla procesorów rodziny Intel.', 689.9, 'INTEL', 'Z370', 'Socket 1151', 'DDR4', 4, 64, '2 x PCI-Express x16,\r\n4 x PCI-Express x1,\r\n1 x HDMI,\r\n1 x PS/2,\r\n1 x RJ45,\r\n1 x USB 3.1 (Gen 2) typ C,\r\n1 x USB 3.1 (Gen2),\r\n2 x USB,\r\n4 x USB 3.1,\r\nAudio', 'Wtyczka ATX 24pin', 'ATX', 'Tak', 'Tak'),
(2, 11, 2, 8, 'ROG STRIX Z390-E Gaming', 'Płyta główna ROG STRIX Z390-E Gaming firmy ASUS przeznaczona dla procesorów rodziny INTEL.', 1149.99, 'INTEL', 'Z390', 'Socket 1151', 'DDR4', 4, 64, '3 x PCI-Express x1,\r\n3 x PCI-Express x16,\r\n1 x Display Port,\r\n1 x HDMI,\r\n1 x RJ45,\r\n1 x USB 3.1 (Gen 2) typ C,\r\n2 x USB,\r\n2 x USB 3.1,\r\n3 x USB 3.1 (Gen2),\r\nAudio,\r\ngniazdo anteny Wi-Fi,\r\nSPDIF out', 'Wtyczka ATX 24pin', 'ATX', 'Tak', 'Tak'),
(3, 12, 2, 2, 'X570 Aorus Elite', 'Płyta główna X570 Aorus Elite firmy GIGABYTE przeznaczona dla procesorów rodziny AMD Ryzen.', 899.99, 'AMD', 'X570', 'Socket AM4', 'DDR4', 4, 128, '2 x PCI-Express x1,\r\n2 x PCI-Express x16,\r\n1 x HDMI,\r\n1 x RJ45,\r\n2 x USB 3.2 (Gen2),\r\n4 x USB,\r\n4 x USB 3.2 (Gen1),\r\nAudio,\r\nSPDIF out', 'Wtyczka ATX 24pin', 'ATX', 'Tak', 'Tak'),
(4, 13, 2, 9, 'B450-A Pro Max', 'Płyta główna B450-A Pro Max firmy MSI przeznaczona do procesorów rodziny AMD Ryzen.', 419.99, 'AMD', 'B450', 'Socket AM4', 'DDR4', 4, 64, '2 x PCI-Express x16,\r\n4 x PCI-Express x1,\r\n1 x DVI-D,\r\n1 x HDMI,\r\n1 x PS/2,\r\n1 x RJ45,\r\n1 x VGA,\r\n2 x USB,\r\n2 x USB 3.2 (Gen1),\r\n2 x USB 3.2 (Gen2),\r\nAudio', 'Wtyczka ATX 24pin', 'ATX', 'Tak', 'Tak');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `plytaglowna_has_zamowienia`
--

CREATE TABLE `plytaglowna_has_zamowienia` (
  `PlytaGlowna_idPlytaGlowna` int(10) UNSIGNED NOT NULL,
  `Zamowienia_idZamowienia` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `plytaglowna_has_zamowienia`
--

INSERT INTO `plytaglowna_has_zamowienia` (`PlytaGlowna_idPlytaGlowna`, `Zamowienia_idZamowienia`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `plytyglowne`
-- (Zobacz poniżej rzeczywisty widok)
--
CREATE TABLE `plytyglowne` (
`ID` int(10) unsigned
,`Producent` varchar(30)
,`Nazwa` varchar(131)
,`Opis` text
,`Cena` float
,`Przeznaczenie` enum('AMD','INTEL')
,`Chipset` varchar(20)
,`StandardPlyty` varchar(20)
,`GniazdoProcesora` varchar(20)
,`ObslugiwanaPamiec` varchar(20)
,`IloscGniazdPamieci` int(11)
,`MaksPojPamieci` varchar(13)
,`Zlacza` varchar(255)
,`Zasilanie` varchar(20)
,`ZintKartaSiec` enum('Tak','Nie')
,`ZintKartaDzwiek` enum('Tak','Nie')
,`DlugoscGwarancji` varchar(8)
,`MiejsceGwarancji` enum('Sklep','Serwis producenta')
,`Zdjecie` varchar(255)
);

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
(1, 5, 1, 4, 'Core i5-8600k', 'Procesor Intel Core i5-8600k.', 999.99, 6, '1151', 3600, 4300),
(2, 8, 1, 7, 'Ryzen 5-2600', 'Procesor AMD Ryzen 5-2600.', 599.99, 6, 'AM4', 3400, 3900),
(3, 9, 1, 7, 'Ryzen 7-3700X', 'Procesor AMD Ryzen 7-3700X.', 1519.99, 8, 'AM4', 3600, 4400),
(4, 10, 1, 4, 'Core i7-9700k', 'Procesor Intel Core i7-9700k.', 1799, 8, '1151', 3600, 4900);

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `procesory`
-- (Zobacz poniżej rzeczywisty widok)
--
CREATE TABLE `procesory` (
`ID` int(10) unsigned
,`Producent` varchar(30)
,`Nazwa` varchar(131)
,`Opis` text
,`Cena` float
,`Socket` varchar(20)
,`IloscRdzeni` int(11)
,`Taktowanie` varchar(14)
,`TaktowanieTurbo` varchar(14)
,`DlugoscGwarancji` varchar(8)
,`MiejsceGwarancji` enum('Sklep','Serwis producenta')
,`Zdjecie` varchar(255)
);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `procesor_has_zamowienia`
--

CREATE TABLE `procesor_has_zamowienia` (
  `Procesor_idProcesor` int(10) UNSIGNED NOT NULL,
  `Zamowienia_idZamowienia` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `procesor_has_zamowienia`
--

INSERT INTO `procesor_has_zamowienia` (`Procesor_idProcesor`, `Zamowienia_idZamowienia`) VALUES
(1, 2);

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
(5, 'HyperX'),
(6, 'Corsair'),
(7, 'AMD'),
(8, 'ASUS'),
(9, 'MSI'),
(10, 'G.Skill'),
(11, 'be quiet!'),
(12, 'Fractal Design'),
(13, 'NVIDIA'),
(14, 'Samsung'),
(15, 'Seagate'),
(16, 'ASRock');

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
(1, 6, 1, 5, 'Predator XMP', 'Pamięć RAM DDR4 firmy HyperX o pojemności 16GB w dwóch modułach po 8GB.', 389.5, 'DIMM(do PC)', 'DDR4', 16, 8, 2, 3200, 1.35),
(2, 15, 3, 6, 'Vengeance LPX', 'Pamięć RAM DDR4 firmy Corsair o pojemności 16GB w dwóch modułach po 8GB.', 399.99, 'DIMM(do PC)', 'DDR4', 16, 8, 2, 3000, 1.35),
(3, 14, 3, 10, 'Trident Z', 'Pamięć RAM firmy G.Skill o pojemności 16GB w dwóch modułach po 8GB.', 620, 'DIMM(do PC)', 'DDR4', 16, 8, 2, 3000, 1.35);

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `ramy`
-- (Zobacz poniżej rzeczywisty widok)
--
CREATE TABLE `ramy` (
`ID` int(10) unsigned
,`Producent` varchar(30)
,`Nazwa` varchar(184)
,`Opis` text
,`Cena` float
,`Rodzaj_Pamieci` varchar(100)
,`Typ` varchar(20)
,`Pojemnosc` varchar(13)
,`PojemnoscModulu` varchar(13)
,`IloscModulow` int(11)
,`Czestotliwosc` varchar(14)
,`Napiecie` varchar(11)
,`DlugoscGwarancji` varchar(8)
,`MiejsceGwarancji` enum('Sklep','Serwis producenta')
,`Zdjecie` varchar(255)
);

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
(1, 1, '2019-11-04 20:09:55', '2019-11-07', 5000, 'Za pobraniem', 'Kurier', 'Zakończono'),
(2, 2, '2019-11-14 19:56:31', '2019-11-18', 1799.99, 'Z góry', 'Kurier', 'W trakcie'),
(3, 2, '2019-11-14 20:07:38', '2019-11-18', 25000, 'Za pobraniem', 'Odbiór osobisty', 'W trakcie');

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `zamowienie`
-- (Zobacz poniżej rzeczywisty widok)
--
CREATE TABLE `zamowienie` (
`ID` int(10) unsigned
,`Imie_Nazwisko` varchar(511)
,`Adres_Dostawy` varchar(255)
,`Kod_Pocztowy` varchar(20)
,`Data_Zamowienia` datetime
,`Przewidywana_Data_Dostawy` date
,`Kwota_Zamowienia` float
,`Rodzaj_Platnosci` enum('Z góry','Za pobraniem')
,`Rodzaj_Dostawy` enum('Odbiór osobisty','Kurier','Paczkomat')
,`Status_Zamowienia` enum('W trakcie','Zakończono')
);

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
(1, 7, 1, 3, 'Vero L2 Bronze', 'Zasilacz firmy SilentiumPC o mocy 600W z certyfikatem 80 Plus Bronze', 219.99, 600, 'ATX', '1 x 4/8 EPS 12V,\r\n2 x 6/8-pin PEG,\r\n3 x 4-pin Molex,\r\n7 x SATA,\r\nATX 24pin'),
(2, 16, 4, 11, 'Dark Power Pro', 'Zasilacz firmy be quiet! o mocy 1200W z certyfikatem 80 Plus Platinum.', 1159, 1200, 'ATX', '1 x 4/8 EPS 12V,\r\n1 x 6-pin PEG,\r\n1 x 8-pin PEG,\r\n10 x SATA,\r\n2 x Floppy,\r\n7 x 4-pin Molex,\r\n8 x 6/8-pin PEG,\r\nATX 24pin'),
(3, 17, 3, 6, 'VS', 'Zasilacz firmy Corsair o mocy 550W.', 219.99, 550, 'ATX', '1 x 4/8 EPS 12V,\r\n1 x Floppy,\r\n2 x 4-pin Molex,\r\n2 x 6/8-pin PEG,\r\n7 x SATA');

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `zasilacze`
-- (Zobacz poniżej rzeczywisty widok)
--
CREATE TABLE `zasilacze` (
`ID` int(10) unsigned
,`Producent` varchar(30)
,`Nazwa` varchar(143)
,`Opis` text
,`Cena` float
,`Moc` varchar(11)
,`Standard` varchar(20)
,`WtyczkiZasilania` varchar(255)
,`DlugoscGwarancji` varchar(8)
,`MiejsceGwarancji` enum('Sklep','Serwis producenta')
,`Zdjecie` varchar(255)
);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zasilacz_has_zamowienia`
--

CREATE TABLE `zasilacz_has_zamowienia` (
  `Zasilacz_idZasilacz` int(10) UNSIGNED NOT NULL,
  `Zamowienia_idZamowienia` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `zasilacz_has_zamowienia`
--

INSERT INTO `zasilacz_has_zamowienia` (`Zasilacz_idZasilacz`, `Zamowienia_idZamowienia`) VALUES
(3, 2);

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
(1, 'images/dyski/adataSU800.jpg'),
(2, 'images/kartygraficzne/gigabyteGtx1660.jpg'),
(3, 'images/obudowa/silentiumpcRegnumRG4T.jpg'),
(4, 'images/plytyglowne/gigabyteZ370AorusGaming3.jpg'),
(5, 'images/procesor/intelCorei5-8600k.jpg'),
(6, 'images/ram/hyperxPredator16gb3200mhz.jpg'),
(7, 'images/zasilacz/silentiumpcVeroL2Bronze600W.jpg'),
(8, 'images/procesor/amdRyzen5-2600.jpg'),
(9, 'images/procesor/amdRyzen7-3700x.jpg'),
(10, 'images/procesor/intelCorei7-9700k.jpg'),
(11, 'images/plytyglowne/asusROGStrixZ390-EGaming.jpg'),
(12, 'images/plytyglowne/gigabyteX570AorusElite.jpg'),
(13, 'images/plytyglowne/msiB450-AProMax.jpg'),
(14, 'images/ram/gskillTridentZ16gb3000mhz.jpg'),
(15, 'images/ram/corsairVengeaneLPX16gb3000mhz.jpg'),
(16, 'images/zasilacz/BeQuiet!DarkPowerPro11Platinum1200W.jpg'),
(17, 'images/zasilacz/corsairVS550W.jpg'),
(18, 'images/obudowa/corsairCrystal570XRGB.jpg'),
(19, 'images/obudowa/FractalDesignMeshifyC.jpg'),
(20, 'images/kartygraficzne/msiGtx1050ti.jpg'),
(21, 'images/kartygraficzne/nvidiaTitanRTX.jpg'),
(22, 'images/dyski/seagateBarraCuda1TB.jpg'),
(23, 'images/dyski/samsung860EVO1TB.jpg'),
(25, 'images/dyski/HyperXSavageEXO480GB.jpg');

-- --------------------------------------------------------

--
-- Struktura widoku `dyski`
--
DROP TABLE IF EXISTS `dyski`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dyski`  AS  select `d`.`idDysk` AS `ID`,`p`.`Nazwa` AS `Producent`,concat(`p`.`Nazwa`,' ',`d`.`Nazwa`,' ',cast(`d`.`Pojemnosc` as char(10) charset utf8mb4),' GB') AS `Nazwa`,`d`.`Opis` AS `Opis`,`d`.`Cena` AS `Cena`,`d`.`Typ` AS `Typ`,`d`.`Interfejs` AS `Interfejs`,concat(cast(`d`.`Pojemnosc` as char(10) charset utf8mb4),' GB') AS `Pojemnosc`,concat(cast(`d`.`SzybkoscZapisu` as char(10) charset utf8mb4),' MB/s') AS `SzybkoscZapisu`,concat(cast(`d`.`SzybkoscOdczytu` as char(10) charset utf8mb4),' MB/s') AS `SzybkoscOdczytu`,`d`.`Format` AS `Format`,concat(cast(`g`.`DlugoscGwarancji` as char(2) charset utf8mb4),' Lat/a') AS `DlugoscGwarancji`,`g`.`MiejsceGwarancji` AS `MiejsceGwarancji`,`z`.`SciezkaZdjecia` AS `Zdjecie` from (((`dysk` `d` join `producent` `p` on(`d`.`Producent_idProducent` = `p`.`idProducent`)) join `gwarancja` `g` on(`d`.`Gwarancja_idGwarancja` = `g`.`idGwarancja`)) join `zdjecia` `z` on(`d`.`Zdjecia_idZdjecia` = `z`.`idZdjecia`)) ;

-- --------------------------------------------------------

--
-- Struktura widoku `kartygraficzne`
--
DROP TABLE IF EXISTS `kartygraficzne`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kartygraficzne`  AS  select `g`.`idKartaGraficzna` AS `ID`,`p`.`Nazwa` AS `Producent`,concat(`p`.`Nazwa`,' ',`g`.`Nazwa`) AS `Nazwa`,`g`.`Opis` AS `Opis`,`g`.`Cena` AS `Cena`,concat(cast(`g`.`TaktowanieRdzenia` as char(10) charset utf8mb4),' MHz') AS `TaktowanieRdzenia`,concat(cast(`g`.`TaktowaniePamieci` as char(10) charset utf8mb4),' MHz') AS `TaktowaniePamieci`,`g`.`TypZlacza` AS `TypZlacza`,`g`.`TypPamieci` AS `TypPamieci`,concat(cast(`g`.`WielkoscPamieci` as char(10) charset utf8mb4),' MB') AS `WielkoscPamieci`,concat(cast(`g`.`ZalecanaMoc` as char(10) charset utf8mb4),' W') AS `ZalecanaMoc`,`g`.`RodzajeIO` AS `RodzajeIO`,concat(cast(`k`.`DlugoscGwarancji` as char(2) charset utf8mb4),' Lat/a') AS `DlugoscGwarancji`,`k`.`MiejsceGwarancji` AS `MiejsceGwarancji`,`z`.`SciezkaZdjecia` AS `Zdjecie` from (((`kartagraficzna` `g` join `producent` `p` on(`g`.`Producent_idProducent` = `p`.`idProducent`)) join `gwarancja` `k` on(`g`.`Gwarancja_idGwarancja` = `k`.`idGwarancja`)) join `zdjecia` `z` on(`g`.`Zdjecia_idZdjecia` = `z`.`idZdjecia`)) order by `g`.`idKartaGraficzna` ;

-- --------------------------------------------------------

--
-- Struktura widoku `komputery`
--
DROP TABLE IF EXISTS `komputery`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `komputery`  AS  select `k`.`idKomputer` AS `ID`,`pg`.`Nazwa` AS `PlytaGlowna`,`p`.`Nazwa` AS `Procesor`,`r`.`Nazwa` AS `RAM`,`d`.`Nazwa` AS `Dysk`,`kg`.`Nazwa` AS `KartaGraficzna`,`z`.`Nazwa` AS `Zasilacz`,`o`.`Nazwa` AS `Obudowa`,`k`.`Cena` AS `Cena`,`k`.`Nazwa` AS `Nazwa`,`k`.`Opis` AS `Opis`,`zd`.`SciezkaZdjecia` AS `Zdjecie` from ((((((((`komputer` `k` join `plytyglowne` `pg` on(`pg`.`ID` = `k`.`PlytaGlowna_idPlytaGlowna`)) join `procesory` `p` on(`p`.`ID` = `k`.`Procesor_idProcesor`)) join `ramy` `r` on(`r`.`ID` = `k`.`RAM_idRAM`)) join `kartygraficzne` `kg` on(`kg`.`ID` = `k`.`KartaGraficzna_idKartaGraficzna`)) join `dyski` `d` on(`d`.`ID` = `k`.`Dysk_idDysk`)) join `zasilacze` `z` on(`z`.`ID` = `k`.`Zasilacz_idZasilacz`)) join `obudowy` `o` on(`o`.`ID` = `k`.`Obudowa_idObudowa`)) join `zdjecia` `zd` on(`zd`.`SciezkaZdjecia` = `o`.`Zdjecie`)) ;

-- --------------------------------------------------------

--
-- Struktura widoku `obudowy`
--
DROP TABLE IF EXISTS `obudowy`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `obudowy`  AS  select `o`.`idObudowa` AS `ID`,`p`.`Nazwa` AS `Producent`,concat(`p`.`Nazwa`,' ',`o`.`Nazwa`) AS `Nazwa`,`o`.`Opis` AS `Opis`,`o`.`Cena` AS `Cena`,`o`.`Typ` AS `Typ`,`o`.`Standard` AS `Standard`,`o`.`ZlaczaPaneluPrzedniego` AS `ZlaczaPaneluPrzedniego`,`o`.`Komponenty` AS `Komponenty`,`o`.`RGB` AS `RGB`,concat(cast(`g`.`DlugoscGwarancji` as char(2) charset utf8mb4),' Lat/a') AS `DlugoscGwarancji`,`g`.`MiejsceGwarancji` AS `MiejsceGwarancji`,`z`.`SciezkaZdjecia` AS `Zdjecie` from (((`obudowa` `o` join `producent` `p` on(`o`.`Producent_idProducent` = `p`.`idProducent`)) join `gwarancja` `g` on(`o`.`Gwarancja_idGwarancja` = `g`.`idGwarancja`)) join `zdjecia` `z` on(`o`.`Zdjecia_idZdjecia` = `z`.`idZdjecia`)) ;

-- --------------------------------------------------------

--
-- Struktura widoku `plytyglowne`
--
DROP TABLE IF EXISTS `plytyglowne`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `plytyglowne`  AS  select `pg`.`idPlytaGlowna` AS `ID`,`p`.`Nazwa` AS `Producent`,concat(`p`.`Nazwa`,' ',`pg`.`Nazwa`) AS `Nazwa`,`pg`.`Opis` AS `Opis`,`pg`.`Cena` AS `Cena`,`pg`.`Przeznaczenie` AS `Przeznaczenie`,`pg`.`Chipset` AS `Chipset`,`pg`.`StandardPlyty` AS `StandardPlyty`,`pg`.`GniazdoProcesora` AS `GniazdoProcesora`,`pg`.`ObslugiwanaPamiec` AS `ObslugiwanaPamiec`,`pg`.`IloscGniazdPamieci` AS `IloscGniazdPamieci`,concat(cast(`pg`.`MaksPojPamieci` as char(10) charset utf8mb4),' GB') AS `MaksPojPamieci`,`pg`.`Zlacza` AS `Zlacza`,`pg`.`Zasilanie` AS `Zasilanie`,`pg`.`ZintKartaSiec` AS `ZintKartaSiec`,`pg`.`ZintKartaDzwiek` AS `ZintKartaDzwiek`,concat(cast(`g`.`DlugoscGwarancji` as char(2) charset utf8mb4),' Lat/a') AS `DlugoscGwarancji`,`g`.`MiejsceGwarancji` AS `MiejsceGwarancji`,`z`.`SciezkaZdjecia` AS `Zdjecie` from (((`plytaglowna` `pg` join `producent` `p` on(`pg`.`Producent_idProducent` = `p`.`idProducent`)) join `gwarancja` `g` on(`pg`.`Gwarancja_idGwarancja` = `g`.`idGwarancja`)) join `zdjecia` `z` on(`pg`.`Zdjecia_idZdjecia` = `z`.`idZdjecia`)) ;

-- --------------------------------------------------------

--
-- Struktura widoku `procesory`
--
DROP TABLE IF EXISTS `procesory`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `procesory`  AS  select `p`.`idProcesor` AS `ID`,`pr`.`Nazwa` AS `Producent`,concat(`pr`.`Nazwa`,' ',`p`.`Nazwa`) AS `Nazwa`,`p`.`Opis` AS `Opis`,`p`.`Cena` AS `Cena`,`p`.`Socket` AS `Socket`,`p`.`IloscRdzeni` AS `IloscRdzeni`,concat(cast(`p`.`Taktowanie` as char(10) charset utf8mb4),' MHz') AS `Taktowanie`,concat(cast(`p`.`TaktowanieTurbo` as char(10) charset utf8mb4),' MHz') AS `TaktowanieTurbo`,concat(cast(`g`.`DlugoscGwarancji` as char(2) charset utf8mb4),' Lat/a') AS `DlugoscGwarancji`,`g`.`MiejsceGwarancji` AS `MiejsceGwarancji`,`z`.`SciezkaZdjecia` AS `Zdjecie` from (((`procesor` `p` join `producent` `pr` on(`p`.`Producent_idProducent` = `pr`.`idProducent`)) join `gwarancja` `g` on(`p`.`Gwarancja_idGwarancja` = `g`.`idGwarancja`)) join `zdjecia` `z` on(`p`.`Zdjecia_idZdjecia` = `z`.`idZdjecia`)) ;

-- --------------------------------------------------------

--
-- Struktura widoku `ramy`
--
DROP TABLE IF EXISTS `ramy`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ramy`  AS  select `p`.`idRAM` AS `ID`,`pr`.`Nazwa` AS `Producent`,concat(`pr`.`Nazwa`,' ',`p`.`Nazwa`,' ',cast(`p`.`Pojemnosc` as char(10) charset utf8mb4),'GB',' [',cast(`p`.`IloscModulow` as char(10) charset utf8mb4),'x',cast(`p`.`PojemnoscModulu` as char(10) charset utf8mb4),'GB ',cast(`p`.`Czestotliwosc` as char(10) charset utf8mb4),'MHz]') AS `Nazwa`,`p`.`Opis` AS `Opis`,`p`.`Cena` AS `Cena`,`p`.`RodzajPamieci` AS `Rodzaj_Pamieci`,`p`.`Typ` AS `Typ`,concat(cast(`p`.`Pojemnosc` as char(10) charset utf8mb4),' GB') AS `Pojemnosc`,concat(cast(`p`.`PojemnoscModulu` as char(10) charset utf8mb4),' GB') AS `PojemnoscModulu`,`p`.`IloscModulow` AS `IloscModulow`,concat(cast(`p`.`Czestotliwosc` as char(10) charset utf8mb4),' MHz') AS `Czestotliwosc`,concat(cast(`p`.`Napiecie` as char(10) charset utf8mb4),'V') AS `Napiecie`,concat(cast(`g`.`DlugoscGwarancji` as char(2) charset utf8mb4),' Lat/a') AS `DlugoscGwarancji`,`g`.`MiejsceGwarancji` AS `MiejsceGwarancji`,`z`.`SciezkaZdjecia` AS `Zdjecie` from (((`ram` `p` join `producent` `pr` on(`p`.`Producent_idProducent` = `pr`.`idProducent`)) join `gwarancja` `g` on(`p`.`Gwarancja_idGwarancja` = `g`.`idGwarancja`)) join `zdjecia` `z` on(`p`.`Zdjecia_idZdjecia` = `z`.`idZdjecia`)) ;

-- --------------------------------------------------------

--
-- Struktura widoku `zamowienie`
--
DROP TABLE IF EXISTS `zamowienie`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `zamowienie`  AS  select `z`.`idZamowienia` AS `ID`,concat(`k`.`Imie`,' ',`k`.`Nazwisko`) AS `Imie_Nazwisko`,`k`.`Adres` AS `Adres_Dostawy`,`k`.`KodPocztowy` AS `Kod_Pocztowy`,`z`.`DataZamowienia` AS `Data_Zamowienia`,`z`.`PrzewidywanaDataDostawy` AS `Przewidywana_Data_Dostawy`,`z`.`KwotaZamowienia` AS `Kwota_Zamowienia`,`z`.`RodzajPlatnosci` AS `Rodzaj_Platnosci`,`z`.`RodzajDostawy` AS `Rodzaj_Dostawy`,`z`.`StatusZamowienia` AS `Status_Zamowienia` from (`klienci` `k` join `zamowienia` `z` on(`k`.`idKlienci` = `z`.`Klienci_idKlienci`)) ;

-- --------------------------------------------------------

--
-- Struktura widoku `zasilacze`
--
DROP TABLE IF EXISTS `zasilacze`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `zasilacze`  AS  select `p`.`idZasilacz` AS `ID`,`pr`.`Nazwa` AS `Producent`,concat(`pr`.`Nazwa`,' ',`p`.`Nazwa`,' ',cast(`p`.`Moc` as char(10) charset utf8mb4),'W') AS `Nazwa`,`p`.`Opis` AS `Opis`,`p`.`Cena` AS `Cena`,concat(cast(`p`.`Moc` as char(10) charset utf8mb4),'W') AS `Moc`,`p`.`Standard` AS `Standard`,`p`.`WtyczkiZasilania` AS `WtyczkiZasilania`,concat(cast(`g`.`DlugoscGwarancji` as char(2) charset utf8mb4),' Lat/a') AS `DlugoscGwarancji`,`g`.`MiejsceGwarancji` AS `MiejsceGwarancji`,`z`.`SciezkaZdjecia` AS `Zdjecie` from (((`zasilacz` `p` join `producent` `pr` on(`p`.`Producent_idProducent` = `pr`.`idProducent`)) join `gwarancja` `g` on(`p`.`Gwarancja_idGwarancja` = `g`.`idGwarancja`)) join `zdjecia` `z` on(`p`.`Zdjecia_idZdjecia` = `z`.`idZdjecia`)) ;

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
  MODIFY `idAdministrator` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `dysk`
--
ALTER TABLE `dysk`
  MODIFY `idDysk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `gwarancja`
--
ALTER TABLE `gwarancja`
  MODIFY `idGwarancja` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT dla tabeli `kartagraficzna`
--
ALTER TABLE `kartagraficzna`
  MODIFY `idKartaGraficzna` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `klienci`
--
ALTER TABLE `klienci`
  MODIFY `idKlienci` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `komputer`
--
ALTER TABLE `komputer`
  MODIFY `idKomputer` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `obudowa`
--
ALTER TABLE `obudowa`
  MODIFY `idObudowa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `plytaglowna`
--
ALTER TABLE `plytaglowna`
  MODIFY `idPlytaGlowna` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `procesor`
--
ALTER TABLE `procesor`
  MODIFY `idProcesor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `producent`
--
ALTER TABLE `producent`
  MODIFY `idProducent` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT dla tabeli `ram`
--
ALTER TABLE `ram`
  MODIFY `idRAM` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `idZamowienia` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `zasilacz`
--
ALTER TABLE `zasilacz`
  MODIFY `idZasilacz` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `zdjecia`
--
ALTER TABLE `zdjecia`
  MODIFY `idZdjecia` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
-- Ograniczenia dla tabeli `kartagraficzna`
--
ALTER TABLE `kartagraficzna`
  ADD CONSTRAINT `kartagraficzna_ibfk_1` FOREIGN KEY (`Gwarancja_idGwarancja`) REFERENCES `gwarancja` (`idGwarancja`),
  ADD CONSTRAINT `kartagraficzna_ibfk_2` FOREIGN KEY (`Producent_idProducent`) REFERENCES `producent` (`idProducent`),
  ADD CONSTRAINT `kartagraficzna_ibfk_3` FOREIGN KEY (`Zdjecia_idZdjecia`) REFERENCES `zdjecia` (`idZdjecia`);

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
