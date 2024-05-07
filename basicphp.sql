-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 05:27 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `basicphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nim` char(9) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nim`, `email`, `jurusan`, `gambar`) VALUES
(1, 'Danny Himawan', '041632438', 'dannyhimawan089@gmail.com', 'Sistem Informasi', 'Toki.png'),
(2, 'Muhammad Dziki Andrian', '041632439', 'dzikiandrian22@gmail.com', 'Sistem Informasi', 'Haruna.png'),
(9, 'adada', '041632435', 'dadada@gmail.com', 'adadada', '65bbaebd1a3eb.png'),
(10, 'adadad', '041632437', 'dadada@gmail.com', 'adadadad', '65bbaed3f3136.png'),
(11, 'daddedac', '5454545', 'dadadda@gmail.com', 'adadadad3', '65bbaee6e3887.png'),
(12, 'edea', '0909009', 'ccccs@gmail.com', 'daaa', '65bbaf053ce45.png'),
(13, 'edea', '0909009', 'ccccs@gmail.com', 'daaa', '65bbaf73ccd57.png'),
(14, 'da', '3e1', 'ccccdas@gmail.com', 'daaa', '65bbaf8b2f90a.png'),
(15, 'da3', '5454545', 'ccccdads@gmail.com', 'da3aa', '65bbaf9d31ca5.png'),
(16, 'da3', '5454545', 'ccccdads@gmail.com', 'da3aa', '65bbafce0f167.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(2, 'danny', '$2y$10$UTcnQ6tfxppk2N3HFb.ki.affy5Q/ALP5EaiLHI0HWsHHm1kgMkh6'),
(3, 'admin', '$2y$10$IZzxHKY.aTmTb0l/rIjZ5ONaIE61mnndFdxwone5GZFiMAE1.VboC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
