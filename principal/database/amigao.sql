-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2016 at 07:30 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amigao`
--

-- --------------------------------------------------------

--
-- Table structure for table `artilheiros`
--

CREATE TABLE `artilheiros` (
  `id` int(11) NOT NULL,
  `peladeiro` text COLLATE latin1_general_ci NOT NULL,
  `gols` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `artilheiros`
--

INSERT INTO `artilheiros` (`id`, `peladeiro`, `gols`) VALUES
(1, 'Bertonni', 6),
(2, 'Cello', 0),
(3, 'Beethoven', 2),
(4, 'Agulha', 4),
(5, 'Trigo', 0),
(6, 'Emilio', 4),
(7, 'Pikeno', 0),
(8, 'GaÃºcho', 1),
(9, 'Daniel', 0),
(10, 'Rodolfo', 0),
(11, 'Andinho', 6),
(12, 'Dubu', 2),
(13, 'Fledson', 2),
(14, 'AndrÃ© (BilÃ©)', 1),
(15, 'AndrÃ© (Emilio)', 1),
(16, 'AlemÃ£o', 2),
(17, 'Rafael', 1),
(18, 'Elvyz', 2),
(19, 'Doninho', 3);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `funcao` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `nome` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `idade` int(2) NOT NULL,
  `usuario` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `senha` varchar(256) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `funcao`, `nome`, `idade`, `usuario`, `senha`) VALUES
(1, 'adm', 'Bertonni', 29, 'ibrakadabra', '39f790aa4d770ca04d37a8076887aa4d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artilheiros`
--
ALTER TABLE `artilheiros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artilheiros`
--
ALTER TABLE `artilheiros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
