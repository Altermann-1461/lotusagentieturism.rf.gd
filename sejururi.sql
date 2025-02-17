-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gazdă: sql108.infinityfree.com
-- Timp de generare: feb. 17, 2025 la 01:37 AM
-- Versiune server: 10.6.19-MariaDB
-- Versiune PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `if0_38327574_lotus`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `sejururi`
--

CREATE TABLE `sejururi` (
  `id_sejur` int(100) NOT NULL,
  `tara` varchar(20) NOT NULL,
  `zile` int(100) NOT NULL,
  `pret_euro` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Eliminarea datelor din tabel `sejururi`
--

INSERT INTO `sejururi` (`id_sejur`, `tara`, `zile`, `pret_euro`) VALUES
(1, 'Spania', 10, 300),
(2, 'Maroc', 5, 150),
(4, 'Romania', 13, 500);

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `sejururi`
--
ALTER TABLE `sejururi`
  ADD PRIMARY KEY (`id_sejur`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `sejururi`
--
ALTER TABLE `sejururi`
  MODIFY `id_sejur` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
