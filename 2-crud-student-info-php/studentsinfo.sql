-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2022 at 05:25 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpactivity-ws`
--

-- --------------------------------------------------------

--
-- Table structure for table `studentsinfo`
--

CREATE TABLE `studentsinfo` (
  `id` int(11) NOT NULL,
  `idNumber` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentsinfo`
--

INSERT INTO `studentsinfo` (`id`, `idNumber`, `name`, `address`, `email`) VALUES
(3, 'STU-ID-009175', 'Jomer Tamayo Dorego', 'Aliaga, Malasiqui, Pangasinan', 'Jomermer@gmail.com'),
(8, 'STU-ID-002733', 'Jonny  Malalim Dept', 'Lepa, Malasiqui, Pangasinan', 'jmd@gmail.com'),
(9, 'STU-ID-007102', 'Danya Sor Rawr', 'Sanlibu, Bayambang, Pangasinan', 'danyasor@yern.waaw');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `studentsinfo`
--
ALTER TABLE `studentsinfo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `studentsinfo`
--
ALTER TABLE `studentsinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
