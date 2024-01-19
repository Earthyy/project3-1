-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 11, 2023 at 08:09 PM
-- Server version: 5.6.38
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surache1_64r2g2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_Admin`
--

CREATE TABLE `tbl_Admin` (
  `AID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `AUser` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `APass` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `AName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `DataSave` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_Admin`
--

INSERT INTO `tbl_Admin` (`AID`, `AUser`, `APass`, `AName`, `DataSave`) VALUES
('A001', 'Earth', 'Earth1235', 'Supanat noisupa', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_Admin`
--
ALTER TABLE `tbl_Admin`
  ADD PRIMARY KEY (`AID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
