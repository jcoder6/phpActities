-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2022 at 01:19 PM
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
-- Database: `chatapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `convo`
--

CREATE TABLE `convo` (
  `id` int(11) NOT NULL,
  `userId_1` int(11) NOT NULL,
  `userId_2` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `convo`
--

INSERT INTO `convo` (`id`, `userId_1`, `userId_2`, `created_at`) VALUES
(1, 1, 2, '2022-11-20 10:50:59'),
(3, 1, 4, '2022-11-20 10:51:44'),
(4, 1, 3, '2022-11-20 10:50:59'),
(83, 7, 1, '2022-11-23 13:38:11'),
(84, 2, 10, '2022-11-23 16:34:23');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `convo_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `convo_id`, `sender_id`, `message`, `created_at`) VALUES
(3, 1, 1, 'Hoy! HAHAHAHA', '2022-11-21 13:18:07'),
(4, 1, 2, 'Oh? Bakit?', '2022-11-21 13:18:08'),
(5, 4, 4, 'Hello, Mushi. Mushi?', '2022-11-21 14:45:24'),
(6, 3, 4, 'I want to tell you something.', '2022-11-21 14:45:24'),
(7, 1, 1, 'Wala langs.', '2022-11-21 15:42:11'),
(8, 3, 1, 'What it is?', '2022-11-21 15:46:29'),
(10, 1, 1, 'Ano kase...', '2022-11-21 15:48:49'),
(11, 1, 1, 'Bakit Danyasor ka?', '2022-11-21 15:49:39'),
(12, 1, 2, 'HAHAHAHA! Tangina mo.', '2022-11-21 15:50:19'),
(21, 83, 1, 'Hi sana maayos na ahahahha', '2022-11-23 13:38:11'),
(22, 3, 4, 'What the hell it is?', '2022-11-23 16:19:21'),
(23, 84, 10, 'Yo!', '2022-11-23 16:34:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `pass`, `created_at`) VALUES
(1, 'Jomer', 'Dorego', 'jmer', '329b516e87e76b34f78465fd88202fcb', '2022-11-19'),
(2, 'Danya', 'Sor', 'dsor', 'fe1c0c77aa04047d7b3a2431e08882d3', '2022-11-19'),
(3, 'Ban', 'Ban', 'ban', '34fa588790b0e4c1e2b54408f84eed90', '2022-11-19'),
(4, 'Lester', 'Taguiam', 'lest', 'ffe0f249611a3c00601a94cd0097143a', '2022-11-19'),
(7, 'Mark Lester', 'Taguiam', 'mlest', 'ad2458348b053383a0fd30fd6571eb0c', '2022-11-23'),
(10, 'Mark Vincent', 'Tamayo', 'mv', 'dfee9412e5d1721cbae45189e0a7346a', '2022-11-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `convo`
--
ALTER TABLE `convo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
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
-- AUTO_INCREMENT for table `convo`
--
ALTER TABLE `convo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
