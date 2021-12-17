-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 26, 2021 at 12:14 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `moduleconnexion`
--

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `prenom`, `nom`, `password`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(13, 'mimi', 'meriem', 'barka', '89898989'),
(14, 'ime', 'imane', 'barka', '87878787'),
(15, 'soso', 'sarah', 'barka', '94949494'),
(16, 'boulette', 'salah', 'barka', '97979797');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
