-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2022 at 07:22 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petagoniadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CustomerID` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `passcode` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `M_Number` varchar(20) NOT NULL,
  `Address` varchar(150) NOT NULL,
  `CustomID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustomerID`, `username`, `passcode`, `email`, `First_Name`, `Last_Name`, `M_Number`, `Address`, `CustomID`) VALUES
(11, 'redvelvet', '931f548329e0d3d776a88770971fa66b', 'redvelvetsm@gmail.com', 'Bonifacio', 'Garzon Jr.', '+6309438355088', 'Blk 66 Lot 02 Brgy.Ipil 2, Silang, Cavite, Philippines.4118', 0),
(12, '', '', '', '', '', '', '', 0),
(14, 'GOT', '61621ac0b689d893f27b84b4b7446141', 'GOTThebeat@gmail.com', 'Bonifacio', 'Garzon Jr.', '+6309438355088', 'Blk 66 Lot 02 Brgy.Ipil 2, Silang, Cavite, Cavite, Philippines.4118', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `PetsID` int(11) NOT NULL,
  `CustomerID` varchar(30) NOT NULL,
  `PetName` varchar(40) NOT NULL,
  `PetBreed` varchar(40) NOT NULL,
  `PetGender` varchar(25) NOT NULL,
  `PetBirthdate` varchar(30) NOT NULL,
  `PetConcern` text NOT NULL,
  `DistemperDate` varchar(25) NOT NULL,
  `RabiesDate` varchar(25) NOT NULL,
  `BordatellaDate` varchar(25) NOT NULL,
  `VetName` varchar(25) NOT NULL,
  `VetContact` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`),
  ADD UNIQUE KEY `username` (`username`,`email`);

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`PetsID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `PetsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
