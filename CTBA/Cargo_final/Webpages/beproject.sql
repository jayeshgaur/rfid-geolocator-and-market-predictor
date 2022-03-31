-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2019 at 08:54 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE `authentication` (
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `hash` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`email`, `password`, `hash`) VALUES
('a@b.c', '12345', '827ccb0eea8a706c4c34a16891f84e7b'),
('aditya05@gmail.com', 'Peticoat', '1C283696E08CF9C3E6A32F81D8152A65'),
('g@aa.c', 'abc', '900150983cd24fb0d6963f7d28e17f72'),
('jayeshg.716@gmail.com', 'sprrrrrr', 'C3C2BCE2765AE11858B4F63967F45AB2'),
('niyati.d@gmail.com', 'iAmCancer', 'B4E24BC489F53BACB1B73DB05193550A'),
('saurabh.baj@gmail.com', 'CoolAadmi', '172544F9C68EB3FB779BBBAEB2E8F809');

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE `customer_info` (
  `Name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact_no` bigint(10) NOT NULL,
  `business_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`Name`, `email`, `contact_no`, `business_type`) VALUES
('Anjana', 'a@b.c', 1234567890, 'MMM'),
('Aditya Jawalikar', 'aditya05@gmail.com', 7208801319, 'Sports Accessories'),
('Gerr', 'g@aa.c', 9167843133, 'Cargo'),
('Jayesh Gaur', 'jayeshg.716@gmail.com', 9167857773, 'Technology hardware'),
('Niyati Daftary', 'niyati.d@gmail.com', 9833345097, 'Medicinal Items'),
('Saurabh Baj', 'saurabh.baj@gmail.com', 9845619234, 'Sealed edible items');

-- --------------------------------------------------------

--
-- Table structure for table `distance`
--

CREATE TABLE `distance` (
  `Sr.` int(11) NOT NULL,
  `source` varchar(50) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `distance` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distance`
--

INSERT INTO `distance` (`Sr.`, `source`, `destination`, `distance`) VALUES
(1, 'MUM', 'NY', 6000);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `email` varchar(200) NOT NULL,
  `order_no` int(30) NOT NULL,
  `order_date` varchar(100) NOT NULL,
  `source` varchar(10) NOT NULL,
  `destination` varchar(10) NOT NULL,
  `weight` int(5) NOT NULL,
  `cargo_type` varchar(50) NOT NULL,
  `rfid` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `past`
--

CREATE TABLE `past` (
  `business_type` varchar(100) NOT NULL,
  `totalweight` int(5) NOT NULL,
  `type` varchar(100) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `regiontype` varchar(50) NOT NULL,
  `datetime` datetime NOT NULL,
  `season` varchar(10) NOT NULL,
  `profit` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `cargo_type` varchar(100) NOT NULL,
  `price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`cargo_type`, `price`) VALUES
('Medicine', 5000),
('Hardware', 10000),
('Granary', 200),
('Oil', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `tbllogs`
--

CREATE TABLE `tbllogs` (
  `logid` int(50) NOT NULL,
  `rfid` int(14) NOT NULL,
  `logdate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `order_no` int(30) NOT NULL,
  `rfid` varchar(50) NOT NULL,
  `Checkpoint 1` tinyint(1) NOT NULL,
  `c1_datetime` varchar(50) NOT NULL,
  `Checkpoint 2` tinyint(1) NOT NULL,
  `c2_datetime` varchar(50) NOT NULL,
  `SUCCESS` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authentication`
--
ALTER TABLE `authentication`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `distance`
--
ALTER TABLE `distance`
  ADD PRIMARY KEY (`Sr.`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_no`);

--
-- Indexes for table `tbllogs`
--
ALTER TABLE `tbllogs`
  ADD PRIMARY KEY (`logid`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`rfid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `distance`
--
ALTER TABLE `distance`
  MODIFY `Sr.` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_no` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tbllogs`
--
ALTER TABLE `tbllogs`
  MODIFY `logid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
