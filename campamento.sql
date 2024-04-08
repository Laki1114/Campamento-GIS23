-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2023 at 08:48 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `campamento`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminId` int(11) NOT NULL,
  `FirstName` text NOT NULL,
  `LastName` text NOT NULL,
  `Gender` text NOT NULL,
  `PhoneNo` varchar(15) NOT NULL,
  `NICNo` varchar(15) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Password` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminId`, `FirstName`, `LastName`, `Gender`, `PhoneNo`, `NICNo`, `Email`, `Password`) VALUES
(1, 'Inul', 'Fernando', 'Male', '0776695842', '522614367550', 'bcd@gmail.com', 'aA1@qwertsh');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blogID` int(11) NOT NULL,
  `shortTitle` varchar(20) NOT NULL,
  `postDate` date NOT NULL,
  `subjectShort` text NOT NULL,
  `subjectLong` text NOT NULL,
  `Image1` longblob DEFAULT NULL,
  `Image2` longblob DEFAULT NULL,
  `Image3` longblob NOT NULL,
  `Image4` longblob DEFAULT NULL,
  `Image5` longblob DEFAULT NULL,
  `Image6` longblob DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `veh_des` varchar(500) NOT NULL,
  `vehicle` varchar(200) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `experience` varchar(1000) NOT NULL,
  `expimage` varchar(200) NOT NULL,
  `nic` int(12) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `location` varchar(30) NOT NULL,
  `license` varchar(200) NOT NULL,
  `qualification` varchar(30) NOT NULL,
  `d_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`firstname`, `lastname`, `gender`, `phone`, `address`, `veh_des`, `vehicle`, `picture`, `experience`, `expimage`, `nic`, `email`, `password`, `location`, `license`, `qualification`, `d_id`) VALUES
('', '', 'female', 772803473, '201, Watadeniya, Velamboda', 'ghjkkkkkkkkk', 'veh/', 'pic/', 'skdjkjdskjdsksh', '', 2001299939, 'fah@gmail.com', 'e10adc3949ba59a', 'kandy', 'license/bk.jpg', 'gsjgsdksks', 1),
('', '', 'male', 778912344, '05,York road, Kandy', 'Honda car. a/c or non a/c. 4 passengers', 'veh/', 'pic/', '5 years of experience. Familiar in places', '', 2001299939, 'tomanthony@gmail.com', '892e4a42b4fd1f6', 'kandy', 'license/bg.png', 'Well experienced. License avai', 2);

-- --------------------------------------------------------

--
-- Table structure for table `glamping_manager`
--

CREATE TABLE `glamping_manager` (
 `GM_ID` int(12) NOT NULL,
  `name` varchar(20) NOT NULL,
  `nic` int(12) NOT NULL,
  `phoneNo` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `bName` varchar(20) NOT NULL,
  `brNumber` varchar(30) NOT NULL,
  
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `glamping_manager`
--

INSERT INTO `glamping_manager` (`bname`, `number`, `name`, `nic`, `phone`, `email`, `password`, `gm_id`) VALUES
('UCSC', 'UCSC', 'Frauzdeen Faheeema', 2001299939, 5677889, 'fajj@gmail.com', 'e10adc3949ba59a', 1);

-- --------------------------------------------------------

--
-- Table structure for table `glampmanager`
--

CREATE TABLE `glamping_manager` (
  `GM_ID` int(11) NOT NULL,
  `FirstName` varchar(10) NOT NULL,
  `LastName` varchar(10) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `PhoneNo` varchar(15) NOT NULL,
  `NICNo` varchar(15) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Password` varchar(25) NOT NULL
  `BName` varchar(20) NOT NULL,
  `BRNumber` varchar(30) NOT NULL,
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `glamping_manager` (`GM_ID`, `FirstName`, `LastName`, `Gender`, `PhoneNo`, `NICNo`, `Email`, `Password`, `BName`, `BRNumber`) VALUES
(GM001, 'Amritha', 'Liyanage', 'Male', '0704576895','200154963987', 'abc@gmail.com', 'Abc@2001', 'AmayaGlamping', 'Ed218909');
 --------------------------------------------------------

--
-- Table structure for table `guide`
--

CREATE TABLE `guide` (
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `experience` varchar(1000) NOT NULL,
  `expimage` varchar(200) NOT NULL,
  `nic` int(12) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `location` varchar(30) NOT NULL,
  `license` varchar(200) NOT NULL,
  `qualification` varchar(30) NOT NULL,
  `id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `guide`
--

INSERT INTO `guide` (`firstname`, `lastname`, `gender`, `phone`, `address`, `picture`, `experience`, `expimage`, `nic`, `email`, `password`, `location`, `license`, `qualification`, `id`) VALUES
('jacki', 'jaki', 'female', 776567899, '15, queen Rd, Kandy', 'pic/gui.jpg', 'Experienced for around 5 years. ', '', 200000567, 'jackijack@gmail.com', '40fbe32a8a5789e', 'kandy', 'license/3.jpg', 'certified guide. License avail', 7),
('jack', 'jacki', 'male', 772456789, '19, castle road, Kandy', 'pic/gui.jpg', 'Experienced for around 5 years. ', '', 2001299939, 'jackja@gmail.com', 'fba48513147e453', 'kandy', 'license/g.jpg', 'certified guide. License avail', 8);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `SupplierId` int(11) NOT NULL,
  `FirstName` varchar(10) NOT NULL,
  `LastName` varchar(10) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `PhoneNo` varchar(15) NOT NULL,
  `NICNo` varchar(15) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Password` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminId`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blogID`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `glamping_manager`
--
ALTER TABLE `glamping_manager`
  ADD PRIMARY KEY (`gm_id`);

--
-- Indexes for table `glampmanager`
--
ALTER TABLE `glampmanager`
  ADD PRIMARY KEY (`GlampManagerId`);

--
-- Indexes for table `guide`
--
ALTER TABLE `guide`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blogID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `d_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `glamping_manager`
--
ALTER TABLE `glamping_manager`
  MODIFY `gm_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `glampmanager`
--
ALTER TABLE `glampmanager`
  MODIFY `GlampManagerId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guide`
--
ALTER TABLE `guide`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
