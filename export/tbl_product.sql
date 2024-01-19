-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 11, 2023 at 08:10 PM
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
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `ProductID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ProductName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `CategoryID` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `BranchID` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `Productpic` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Cost` double NOT NULL,
  `Price` float NOT NULL,
  `Quantity` int(10) NOT NULL,
  `DetailProduct` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`ProductID`, `ProductName`, `CategoryID`, `BranchID`, `Productpic`, `Cost`, `Price`, `Quantity`, `DetailProduct`) VALUES
('A001', 'Asus Tuf Gamming F15', 'NB', 'As', 'Asustuff15.jpeg', 20000, 250000, 6, 'Cpu: i5-11400H\r\nGpu: RTX3050\r\nRam: 8GB\r\nStorage: 512GB\r\n'),
('IPA2022', 'Ipad Ari 5 2022 (10.9) ', 'IP', 'IP', 'air5.jpg', 20000, 25000, 6, 'Chip: M1\r\nRam: 8GB\r\nStorage: 256GB\r\nTouch ID ในปุ่มด้านบน\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `CategoryID` (`CategoryID`),
  ADD KEY `BranchID` (`BranchID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `tbl_category` (`CategoryID`),
  ADD CONSTRAINT `tbl_product_ibfk_2` FOREIGN KEY (`BranchID`) REFERENCES `tbl_branch` (`BranchID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
