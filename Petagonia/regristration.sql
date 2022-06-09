-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2022 at 05:40 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `regristration`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'nina', 'f599c58f684c33fd93036c0b3', 'nina@example.com'),
(2, 'naevis', '31140908fbdfd52510ea74c73', ' aespa@example.com'),
(3, ' bon', '5f9ac24c1a47333317bec6053', 'bon@example.com'),
(5, 'bon', '5f9ac24c1a47333317bec6053', 'bonbon@example.com'),
(6, 'sample', '5e8ff9bf55ba3508199d22e98', 'sample@example.com'),
(7, 'sample', 'ac46374a846d97e22f917b686', 'sample@example.com'),
(8, 'hoy', 'd6a7c8bcd71293f85ea6ae3ad', 'hoy@example.com'),
(9, 'try', '080f651e3fcca17df3a47c2ce', 'try@example.com'),
(10, 'klarisse', 'c92684e80088c3647c51ee89f', 'klarisse@example.com'),
(11, 'qwe', '76d80224611fc919a5d54f0ff', 'qwe'),
(12, 'zxc', '5fa72358f0b4fb4f2c5d7de8c', 'zxc'),
(13, 'popo', 'popo', 'popo'),
(14, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
