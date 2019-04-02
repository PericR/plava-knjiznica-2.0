-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2019 at 12:13 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knjiznica`
--

-- --------------------------------------------------------

--
-- Table structure for table `autor`
--

CREATE TABLE `autor` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `autor`
--

INSERT INTO `autor` (`id`, `ime`, `prezime`) VALUES
(1, 'August', 'šenoa'),
(2, 'Ivo', 'Andrić'),
(10, 'Jules', 'Verne'),
(11, 'J.R.', 'Tolkien'),
(12, 'Mark', 'Twain'),
(13, 'Ernest', 'Hemingway');

-- --------------------------------------------------------

--
-- Table structure for table `bankovna_kartica`
--

CREATE TABLE `bankovna_kartica` (
  `id_korisnika` int(11) NOT NULL,
  `broj_kartice` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `tip_kartice` enum('visa','mastercard','maestro','american express') COLLATE utf8_unicode_ci NOT NULL,
  `expire_date` date NOT NULL,
  `cvv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bankovna_kartica`
--

INSERT INTO `bankovna_kartica` (`id_korisnika`, `broj_kartice`, `tip_kartice`, `expire_date`, `cvv`) VALUES
(1, '1234567890123456', 'visa', '0001-11-11', 333),
(13, '123456789012345632', 'visa', '0001-11-11', 333);

-- --------------------------------------------------------

--
-- Table structure for table `knjiga`
--

CREATE TABLE `knjiga` (
  `id` int(11) NOT NULL,
  `autor_id` int(11) NOT NULL,
  `naziv` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `ime_autora` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `cijena` double NOT NULL,
  `dostupnost` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `knjiga`
--

INSERT INTO `knjiga` (`id`, `autor_id`, `naziv`, `ime_autora`, `cijena`, `dostupnost`) VALUES
(7, 2, 'Na drini ćuprija', 'Ivo Andrić', 40, 0),
(8, 10, '20 000 milja pod morem', 'Jules Verne', 50, 1),
(9, 11, 'Lord of the Rings', 'J.R. Tolkien', 30, 1),
(10, 11, 'Harry Potter', 'J.R. Tolkien', 40, 0),
(11, 12, 'Adventures of Huckleberry Finn', 'Mark Twain', 30, 1),
(12, 13, 'Ribar i more', 'Ernest Hemingway', 40, 1);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `korisnicko_ime` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `lozinka` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `uloga_korisnika` enum('korisnik','admin','super_admin') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'korisnik'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `uloga_korisnika`) VALUES
(1, 'Robert', 'Perić', 'RobertP', 'qwerty', 'super_admin'),
(13, 'robi', 'peric', 'Rob', '11111111', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `narudzba`
--

CREATE TABLE `narudzba` (
  `id` int(11) NOT NULL,
  `kupac_id` int(11) NOT NULL,
  `broj_kartice` varchar(32) CHARACTER SET ucs2 COLLATE ucs2_unicode_ci NOT NULL,
  `knjiga_id` int(11) NOT NULL,
  `datum_narudzbe` date NOT NULL,
  `ime_knjige` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `ime_kupca` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bankovna_kartica`
--
ALTER TABLE `bankovna_kartica`
  ADD UNIQUE KEY `broj_kartice` (`broj_kartice`),
  ADD KEY `id_korisnika` (`id_korisnika`);

--
-- Indexes for table `knjiga`
--
ALTER TABLE `knjiga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `autor_id` (`autor_id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- Indexes for table `narudzba`
--
ALTER TABLE `narudzba`
  ADD PRIMARY KEY (`id`),
  ADD KEY `knjiga_id` (`knjiga_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autor`
--
ALTER TABLE `autor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `knjiga`
--
ALTER TABLE `knjiga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `narudzba`
--
ALTER TABLE `narudzba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bankovna_kartica`
--
ALTER TABLE `bankovna_kartica`
  ADD CONSTRAINT `bankovna_kartica_ibfk_1` FOREIGN KEY (`id_korisnika`) REFERENCES `korisnik` (`id`);

--
-- Constraints for table `knjiga`
--
ALTER TABLE `knjiga`
  ADD CONSTRAINT `knjiga_ibfk_1` FOREIGN KEY (`autor_id`) REFERENCES `autor` (`id`);

--
-- Constraints for table `narudzba`
--
ALTER TABLE `narudzba`
  ADD CONSTRAINT `narudzba_ibfk_1` FOREIGN KEY (`knjiga_id`) REFERENCES `knjiga` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
