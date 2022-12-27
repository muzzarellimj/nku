-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2022 at 03:20 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foober`
--
CREATE DATABASE IF NOT EXISTS `foober` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `foober`;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

DROP TABLE IF EXISTS `cars`;
CREATE TABLE `cars` (
  `ID` mediumint(8) UNSIGNED NOT NULL,
  `driverid` mediumint(8) UNSIGNED NOT NULL,
  `year` varchar(4) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `make` varchar(32) NOT NULL,
  `model` varchar(32) NOT NULL,
  `licenseplate` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`ID`, `driverid`, `year`, `make`, `model`, `licenseplate`) VALUES
(5, 11, '2016', 'Ford', 'Fiesta', 'G23 92D'),
(6, 12, '2017', 'Ford', 'Escape', '98G 89D');

-- --------------------------------------------------------

--
-- Table structure for table `creditcards`
--

DROP TABLE IF EXISTS `creditcards`;
CREATE TABLE `creditcards` (
  `ID` mediumint(8) UNSIGNED NOT NULL,
  `riderid` mediumint(8) UNSIGNED NOT NULL,
  `cardnumber` varchar(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `cardexpiration` varchar(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `cardcvv` varchar(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `cardholdername` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `creditcards`
--

INSERT INTO `creditcards` (`ID`, `riderid`, `cardnumber`, `cardexpiration`, `cardcvv`, `cardholdername`) VALUES
(8, 18, '0000 2222 4444 8888', '1224', '340', 'Rider J. Foober'),
(9, 19, '8888 6666 4444 2222', '1026', '102', 'Driver F. Foober');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

DROP TABLE IF EXISTS `drivers`;
CREATE TABLE `drivers` (
  `ID` mediumint(8) UNSIGNED NOT NULL,
  `riderid` mediumint(8) UNSIGNED NOT NULL,
  `licensenumber` varchar(32) NOT NULL,
  `licenseexpiration` varchar(4) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `bankaccountnumber` varchar(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `bankroutingnumber` varchar(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `rating` varchar(3) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`ID`, `riderid`, `licensenumber`, `licenseexpiration`, `bankaccountnumber`, `bankroutingnumber`, `rating`) VALUES
(11, 19, 'M100 0001 2900', '1124', '0000400', '100400200800', '0'),
(12, 20, 'M100 2000 2800', '1225', '001990200', '14400298', '0');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE `locations` (
  `ID` mediumint(8) UNSIGNED NOT NULL,
  `streetaddress1` varchar(64) NOT NULL,
  `streetaddress2` varchar(64) NOT NULL,
  `city` varchar(32) NOT NULL,
  `state` varchar(32) NOT NULL,
  `zipcode` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`ID`, `streetaddress1`, `streetaddress2`, `city`, `state`, `zipcode`) VALUES
(11, '1 Nunn Dr', '', 'Highland Heights', 'KY', '41001'),
(12, '107 E 9th St', '', 'Newport', 'KY', '41071');

-- --------------------------------------------------------

--
-- Table structure for table `riders`
--

DROP TABLE IF EXISTS `riders`;
CREATE TABLE `riders` (
  `ID` mediumint(8) UNSIGNED NOT NULL,
  `password` varchar(256) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `emailaddress` varchar(128) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `phonenumber` varchar(16) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `role` tinyint(3) UNSIGNED NOT NULL DEFAULT 20,
  `rating` varchar(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riders`
--

INSERT INTO `riders` (`ID`, `password`, `emailaddress`, `phonenumber`, `firstname`, `lastname`, `birthdate`, `role`, `rating`) VALUES
(18, '$2y$10$codYPrRWEX39RHeRQCTznuja.B5N7VZr3j.B.2SE.3LVdR1HXeEIi', 'rider@foober.com', NULL, 'Rider', 'Foober', NULL, 20, '0'),
(19, '$2y$10$rHIGZrvKs4DNb3Hrmx5/l.9oGU9kGwbcwkbqyroulge/WaN6AlrmK', 'driver@foober.com', NULL, 'Driver', 'Foober', NULL, 50, '0'),
(20, '$2y$10$gt3rBa53XcRE8slZig.dK.PnWWtb5Ofn4MizkfG1KZhVYeRL65nAK', 'admin@foober.com', NULL, 'Administrator', 'Foober', NULL, 80, '0');

-- --------------------------------------------------------

--
-- Table structure for table `rides`
--

DROP TABLE IF EXISTS `rides`;
CREATE TABLE `rides` (
  `ID` mediumint(8) UNSIGNED NOT NULL,
  `originid` mediumint(8) UNSIGNED NOT NULL,
  `destinationid` mediumint(8) UNSIGNED NOT NULL,
  `riderid` mediumint(8) UNSIGNED NOT NULL,
  `driverid` mediumint(8) UNSIGNED DEFAULT NULL,
  `mileage` varchar(8) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `cost` varchar(16) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rides`
--

INSERT INTO `rides` (`ID`, `originid`, `destinationid`, `riderid`, `driverid`, `mileage`, `cost`) VALUES
(6, 11, 12, 18, NULL, '163', '1953');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `driverid` (`driverid`);

--
-- Indexes for table `creditcards`
--
ALTER TABLE `creditcards`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `riderid` (`riderid`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `riderid` (`riderid`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `riders`
--
ALTER TABLE `riders`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rides`
--
ALTER TABLE `rides`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `originid` (`originid`),
  ADD KEY `destinationid` (`destinationid`),
  ADD KEY `riderid` (`riderid`),
  ADD KEY `driverid` (`driverid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `ID` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `creditcards`
--
ALTER TABLE `creditcards`
  MODIFY `ID` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `ID` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `ID` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `riders`
--
ALTER TABLE `riders`
  MODIFY `ID` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `rides`
--
ALTER TABLE `rides`
  MODIFY `ID` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars driverid to drivers ID` FOREIGN KEY (`driverid`) REFERENCES `drivers` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `creditcards`
--
ALTER TABLE `creditcards`
  ADD CONSTRAINT `creditcards riderid to riders ID` FOREIGN KEY (`riderid`) REFERENCES `riders` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `drivers`
--
ALTER TABLE `drivers`
  ADD CONSTRAINT `drivers riderid to riders ID` FOREIGN KEY (`riderid`) REFERENCES `riders` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rides`
--
ALTER TABLE `rides`
  ADD CONSTRAINT `rides destinationid to locations ID` FOREIGN KEY (`destinationid`) REFERENCES `locations` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rides driverid to drivers ID` FOREIGN KEY (`driverid`) REFERENCES `drivers` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rides originid to locations ID` FOREIGN KEY (`originid`) REFERENCES `locations` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rides riderid to riders ID` FOREIGN KEY (`riderid`) REFERENCES `riders` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
