-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Nov 17. 15:41
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `web2`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `id` int(10) UNSIGNED NOT NULL,
  `csaladi_nev` varchar(45) NOT NULL DEFAULT '',
  `utonev` varchar(45) NOT NULL DEFAULT '',
  `bejelentkezes` varchar(12) NOT NULL DEFAULT '',
  `jelszo` varchar(256) NOT NULL DEFAULT '',
  `jogosultsag` varchar(3) NOT NULL DEFAULT '_1_'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`id`, `csaladi_nev`, `utonev`, `bejelentkezes`, `jelszo`, `jogosultsag`) VALUES
(2, 'valaki', 'valami', 'teszt1', '$2y$10$D48ZWwp17xnBUPrLxC2rEOPmAZ8mn3NIYhnFkgwY6EInnwX83K2ta', '1__'),
(3, 'Kis', 'István', 'Isti10', '$2y$10$8o4w2g3n2JQMF6Csp0BPduSutUEoi3jyJAZNN.NnqPFH9ylPM4SF6', '1__');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kapcsolat`
--

CREATE TABLE `kapcsolat` (
  `id` int(20) NOT NULL,
  `submitdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `number` varchar(20) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `kapcsolat`
--

INSERT INTO `kapcsolat` (`id`, `submitdate`, `name`, `email`, `number`, `message`) VALUES
(2, '2024-11-16 12:25:08', 'fdgdsfg', 'sdfsfesdf@asdawd.com', '345345345', 'safdsfsdf');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `menu`
--

CREATE TABLE `menu` (
  `url` varchar(30) NOT NULL,
  `nev` varchar(30) NOT NULL,
  `szulo` varchar(30) NOT NULL,
  `jogosultsag` varchar(3) NOT NULL,
  `sorrend` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- A tábla adatainak kiíratása `menu`
--

INSERT INTO `menu` (`url`, `nev`, `szulo`, `jogosultsag`, `sorrend`) VALUES
('admin', 'Admin', '', '001', 70),
('belepes', 'Belépés', '', '100', 50),
('kapcsolat', 'Kapcsolat', '', '111', 80),
('kapcsolatadmin', 'Kapcsolat - Admin', '', '111', 90),
('kilepes', 'Kilépés', '', '011', 60),
('nyitolap', 'Nyitólap', '', '111', 10),
('regisztracio', 'Regisztráció', '', '101', 70),
('uzenetek', 'Üzenetek', '', '111', 90);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `uzenetek`
--

CREATE TABLE `uzenetek` (
  `id` int(10) NOT NULL,
  `nev` varchar(30) NOT NULL,
  `uzenet` text NOT NULL,
  `datum` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `uzenetek`
--

INSERT INTO `uzenetek` (`id`, `nev`, `uzenet`, `datum`) VALUES
(1, 'valaki valami', 'asd', '2024-11-16 13:32:38'),
(2, 'valaki valami', 'sziasztok', '2024-11-17 10:47:46'),
(3, 'valaki valami', 'sziasztok', '2024-11-17 10:48:15'),
(4, 'valaki valami', 'sziasztok', '2024-11-17 10:48:19'),
(5, 'valaki valami', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2024-11-17 10:49:15');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `kapcsolat`
--
ALTER TABLE `kapcsolat`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`url`);

--
-- A tábla indexei `uzenetek`
--
ALTER TABLE `uzenetek`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `kapcsolat`
--
ALTER TABLE `kapcsolat`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `uzenetek`
--
ALTER TABLE `uzenetek`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
