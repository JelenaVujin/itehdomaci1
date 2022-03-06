-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2022 at 03:28 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblioteka1`
--

-- --------------------------------------------------------

--
-- Table structure for table `clan`
--

CREATE TABLE `clan` (
  `idClana` int(11) NOT NULL,
  `imePrezime` varchar(255) NOT NULL,
  `clanOd` date NOT NULL DEFAULT current_timestamp(),
  `clanDo` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clan`
--

INSERT INTO `clan` (`idClana`, `imePrezime`, `clanOd`, `clanDo`) VALUES
(1, 'Jelena Vujin', '2022-03-02', '2023-03-02'),
(2, 'Pera Peric', '2022-04-15', '2023-04-15'),
(3, 'mmm', '0000-00-00', '0000-00-00'),
(4, 'Pera Peric', '2022-03-18', '0000-00-00'),
(5, 'Marko Markovic', '2022-03-26', '0000-00-00'),
(6, '', '0000-00-00', '0000-00-00'),
(7, '', '0000-00-00', '0000-00-00'),
(8, '', '0000-00-00', '0000-00-00'),
(9, '', '0000-00-00', '0000-00-00'),
(10, 'Mirko Mirkovic', '0000-00-00', '0000-00-00'),
(11, '', '0000-00-00', '0000-00-00'),
(12, '', '0000-00-00', '0000-00-00'),
(13, '', '0000-00-00', '0000-00-00'),
(14, '', '0000-00-00', '0000-00-00'),
(15, '', '0000-00-00', '0000-00-00'),
(16, '', '0000-00-00', '0000-00-00'),
(17, 'Pera Peric', '0000-00-00', '0000-00-00'),
(18, 'Pera Peric', '2022-03-18', '0000-00-00'),
(19, 'Pera Peric', '2022-03-18', '2022-03-23'),
(20, '', '0000-00-00', '0000-00-00'),
(21, '', '0000-00-00', '0000-00-00'),
(22, '', '0000-00-00', '0000-00-00'),
(23, 'Pera Peric', '0000-00-00', '0000-00-00'),
(24, 'Pera Peric', '0000-00-00', '0000-00-00'),
(25, '', '0000-00-00', '0000-00-00'),
(26, '', '0000-00-00', '0000-00-00'),
(27, 'Pera Peric', '2022-03-12', '2022-03-19'),
(28, 'mmmmm', '2022-03-03', '2022-03-08'),
(29, 'dsadsdsad', '2022-03-11', '2022-03-24'),
(30, 'Pera Peric', '2022-03-11', '2022-03-09'),
(31, 'dsdasdsad', '2022-03-18', '2022-04-01'),
(32, 'Pera Peric', '2022-03-15', '2022-03-15'),
(33, 'Pera Peric', '2022-03-16', '2022-03-21');

-- --------------------------------------------------------

--
-- Table structure for table `rezervacija`
--

CREATE TABLE `rezervacija` (
  `idR` int(11) NOT NULL,
  `knjiga` varchar(255) NOT NULL,
  `pisac` varchar(255) NOT NULL,
  `datum` date NOT NULL DEFAULT current_timestamp(),
  `idClan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rezervacija`
--

INSERT INTO `rezervacija` (`idR`, `knjiga`, `pisac`, `datum`, `idClan`) VALUES
(4, 'Norveska suma', 'Haruki Murakami', '2022-03-12', 1),
(5, 'Sofijin svet', 'GOrder', '2022-12-12', 2),
(6, 'Upitaj prah', 'Dzon Fante', '2022-03-05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `zaposleni`
--

CREATE TABLE `zaposleni` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `lozinka` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `zaposleni`
--

INSERT INTO `zaposleni` (`id`, `username`, `lozinka`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clan`
--
ALTER TABLE `clan`
  ADD PRIMARY KEY (`idClana`);

--
-- Indexes for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD PRIMARY KEY (`idR`),
  ADD KEY `idClan` (`idClan`);

--
-- Indexes for table `zaposleni`
--
ALTER TABLE `zaposleni`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clan`
--
ALTER TABLE `clan`
  MODIFY `idClana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `rezervacija`
--
ALTER TABLE `rezervacija`
  MODIFY `idR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `zaposleni`
--
ALTER TABLE `zaposleni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD CONSTRAINT `rezervacija_ibfk_1` FOREIGN KEY (`idClan`) REFERENCES `clan` (`idClana`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
