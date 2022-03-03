-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2022 at 02:17 PM
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
-- Database: `biblioteka`
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
(0, 'Maja Majic', '2022-03-25', '2023-03-25'),
(1, 'Jelena Vujin', '2022-02-25', '2023-02-25'),
(2, 'Maja Majic', '2022-03-25', '2023-03-25');

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
(4, 'Upitaj prah', 'Dzon Fante', '2022-02-28', 2),
(6, 'Norveska suma', 'Haruki Murakami', '2022-02-28', 1);

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
  ADD UNIQUE KEY `id` (`idR`),
  ADD KEY `idClan` (`idClan`),
  ADD KEY `knjiga` (`knjiga`);

--
-- Indexes for table `zaposleni`
--
ALTER TABLE `zaposleni`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rezervacija`
--
ALTER TABLE `rezervacija`
  MODIFY `idR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `zaposleni`
--
ALTER TABLE `zaposleni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
