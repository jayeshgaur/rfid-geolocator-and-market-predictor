-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2018 at 11:47 PM
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
-- Database: `lennyface`
--

-- --------------------------------------------------------

--
-- Table structure for table `activecargo`
--

CREATE TABLE `activecargo` (
  `rfid` varchar(50) NOT NULL,
  `order_no` varchar(30) NOT NULL,
  `cargo_no` int(4) NOT NULL,
  `cargo_type` varchar(100) NOT NULL,
  `weight` int(5) NOT NULL,
  `revenue` int(20) NOT NULL,
  `ship_no` varchar(30) NOT NULL,
  `shipping_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activecargo`
--

INSERT INTO `activecargo` (`rfid`, `order_no`, `cargo_no`, `cargo_type`, `weight`, `revenue`, `ship_no`, `shipping_date`) VALUES
('ABC', '1', 2, 'Hardware', 250, 200000, 'ISRO-001', '2018-10-17 05:00:00'),
('DEF', '1', 3, 'Oil', 250, 50000, 'ISRO-001', '2018-10-17 05:00:00'),
('F32', '2', 1, 'Granary', 400, 20000, 'SHANGHAI002', '2018-10-23 08:00:00'),
('F46', '2', 2, 'Plastic Toys', 400, 40000, 'SHANGHAI002', '2018-10-23 08:00:00'),
('XYZ', '1', 1, 'Hardware', 500, 400000, 'ISRO-001', '2018-10-17 05:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `activeservice`
--

CREATE TABLE `activeservice` (
  `email` varchar(200) NOT NULL,
  `order_no` varchar(30) NOT NULL,
  `order_date` datetime NOT NULL,
  `ship_no` varchar(30) NOT NULL,
  `shipping_date` datetime NOT NULL,
  `source` varchar(50) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `totalweight` int(7) NOT NULL,
  `no_of_containers` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activeservice`
--

INSERT INTO `activeservice` (`email`, `order_no`, `order_date`, `ship_no`, `shipping_date`, `source`, `destination`, `totalweight`, `no_of_containers`) VALUES
('jayeshg.716@gmail.com', '1', '2018-10-10 16:09:34', 'ISRO-001', '2018-10-17 05:00:00', 'MUM', 'NY', 1000, 3),
('saurabh.baj@gmail.com', '2', '2018-10-11 08:14:22', 'SHANGHAI002', '2018-10-23 08:00:00', 'SHGI', 'LA', 800, 2);

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
('aditya05@gmail.com', 'Peticoat', '1C283696E08CF9C3E6A32F81D8152A65'),
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
('Aditya Jawalikar', 'aditya05@gmail.com', 7208801319, 'Sports Accessories'),
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
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `order_no` varchar(30) NOT NULL,
  `cargo_no` int(4) NOT NULL,
  `rfid` varchar(50) NOT NULL,
  `Checkpoint 1` tinyint(1) NOT NULL,
  `c1_datetime` datetime NOT NULL,
  `Checkpoint 2` tinyint(1) NOT NULL,
  `c2_datetime` datetime NOT NULL,
  `Checkpoint 3` tinyint(1) NOT NULL,
  `c3_datetime` datetime NOT NULL,
  `Checkpoint 4` tinyint(1) NOT NULL,
  `c4_datetime` datetime NOT NULL,
  `SUCCESS` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`order_no`, `cargo_no`, `rfid`, `Checkpoint 1`, `c1_datetime`, `Checkpoint 2`, `c2_datetime`, `Checkpoint 3`, `c3_datetime`, `Checkpoint 4`, `c4_datetime`, `SUCCESS`) VALUES
('1', 2, 'ABC', 1, '2018-10-17 18:22:36', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
('1', 3, 'DEF', 1, '2018-10-17 18:27:36', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
('2', 1, 'F32', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
('2', 2, 'F46', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
('1', 1, 'XYZ', 1, '2018-10-17 18:22:36', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activecargo`
--
ALTER TABLE `activecargo`
  ADD PRIMARY KEY (`rfid`);

--
-- Indexes for table `activeservice`
--
ALTER TABLE `activeservice`
  ADD PRIMARY KEY (`order_no`),
  ADD UNIQUE KEY `email` (`email`);

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
  MODIFY `Sr.` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
