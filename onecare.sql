-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2024 at 03:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onecare`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `ActivityID` int(11) NOT NULL,
  `date` date NOT NULL,
  `receiver_ID` int(11) DEFAULT NULL,
  `donor_ID` int(11) DEFAULT NULL,
  `vol_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(8) NOT NULL,
  `report_ID` int(11) DEFAULT NULL,
  `receiver_ID` int(11) DEFAULT NULL,
  `donor_ID` int(11) DEFAULT NULL,
  `feedback_ID` int(11) DEFAULT NULL,
  `vol_ID` int(11) DEFAULT NULL,
  `Act_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `DonorID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `item_type` varchar(50) NOT NULL,
  `district` varchar(20) NOT NULL,
  `vol_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `FeedbackID` int(11) NOT NULL,
  `vol_ID` int(11) DEFAULT NULL,
  `receiver_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `newsID` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receiver`
--

CREATE TABLE `receiver` (
  `ReceiverID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `occupation` varchar(20) NOT NULL,
  `age` tinyint(4) NOT NULL,
  `district` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `salary` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receiver`
--

INSERT INTO `receiver` (`ReceiverID`, `name`, `password`, `address`, `occupation`, `age`, `district`, `phone`, `salary`) VALUES
(3, 'Dan242', '123', 'Enstek', 'work', 20, 'Durian Tunggal', '0127917276', 3564.00),
(4, 'D Imran', '123', 'Enstek', 'work', 20, 'Bukit Katil', '0127917276', 1234.00),
(5, 'Danish Imran', '123', 'Enstek', 'work', 20, 'Rembia', '0127917276', 3564.00);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `ReportID` int(11) NOT NULL,
  `time` date NOT NULL,
  `description` varchar(100) NOT NULL,
  `receiver_ID` int(11) DEFAULT NULL,
  `vol_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

CREATE TABLE `volunteer` (
  `VolunteerID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `age` varchar(2) NOT NULL,
  `work` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `volunteer`
--

INSERT INTO `volunteer` (`VolunteerID`, `name`, `address`, `phone`, `password`, `age`, `work`, `district`) VALUES
(20, 'Danish Imran', '', '0127917276', '123', '20', '', ''),
(21, 'Danish Irwan', '', '0127917276', '123', '20', '', ''),
(22, 'Fudhail Afwan', '', '0127917276', '123', '20', '', ''),
(23, 'Ahmad Danish', '', '0127917276', '123', '20', '', ''),
(24, 'Nazhan Shah', '', '0127917276', '123', '20', '', ''),
(25, 'Faris', '', '0127917276', '123', '20', '', ''),
(26, 'Aqil', '', '0127917276', '123', '20', '', ''),
(27, 'Azuar', '', '0127917276', '123', '20', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`ActivityID`),
  ADD KEY `vol_ID` (`vol_ID`),
  ADD KEY `receiver_ID` (`receiver_ID`),
  ADD KEY `donor_ID` (`donor_ID`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`),
  ADD KEY `vol_ID` (`vol_ID`),
  ADD KEY `receiver_ID` (`receiver_ID`),
  ADD KEY `report_ID` (`report_ID`),
  ADD KEY `donor_ID` (`donor_ID`),
  ADD KEY `feedback_ID` (`feedback_ID`),
  ADD KEY `Act_ID` (`Act_ID`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`DonorID`),
  ADD KEY `vol_ID` (`vol_ID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`FeedbackID`),
  ADD KEY `vol_ID` (`vol_ID`),
  ADD KEY `receiver_ID` (`receiver_ID`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`newsID`);

--
-- Indexes for table `receiver`
--
ALTER TABLE `receiver`
  ADD PRIMARY KEY (`ReceiverID`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`ReportID`),
  ADD KEY `receiver_ID` (`receiver_ID`),
  ADD KEY `vol_ID` (`vol_ID`);

--
-- Indexes for table `volunteer`
--
ALTER TABLE `volunteer`
  ADD PRIMARY KEY (`VolunteerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `ActivityID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `DonorID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FeedbackID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `newsID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receiver`
--
ALTER TABLE `receiver`
  MODIFY `ReceiverID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `ReportID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `volunteer`
--
ALTER TABLE `volunteer`
  MODIFY `VolunteerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `activity_ibfk_1` FOREIGN KEY (`vol_ID`) REFERENCES `volunteer` (`VolunteerID`),
  ADD CONSTRAINT `activity_ibfk_2` FOREIGN KEY (`receiver_ID`) REFERENCES `receiver` (`ReceiverID`),
  ADD CONSTRAINT `activity_ibfk_3` FOREIGN KEY (`donor_ID`) REFERENCES `donor` (`DonorID`);

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`vol_ID`) REFERENCES `volunteer` (`VolunteerID`),
  ADD CONSTRAINT `admin_ibfk_2` FOREIGN KEY (`receiver_ID`) REFERENCES `receiver` (`ReceiverID`),
  ADD CONSTRAINT `admin_ibfk_3` FOREIGN KEY (`report_ID`) REFERENCES `report` (`ReportID`),
  ADD CONSTRAINT `admin_ibfk_4` FOREIGN KEY (`donor_ID`) REFERENCES `donor` (`DonorID`),
  ADD CONSTRAINT `admin_ibfk_5` FOREIGN KEY (`feedback_ID`) REFERENCES `feedback` (`FeedbackID`),
  ADD CONSTRAINT `admin_ibfk_6` FOREIGN KEY (`Act_ID`) REFERENCES `activity` (`ActivityID`);

--
-- Constraints for table `donor`
--
ALTER TABLE `donor`
  ADD CONSTRAINT `donor_ibfk_1` FOREIGN KEY (`vol_ID`) REFERENCES `volunteer` (`VolunteerID`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`vol_ID`) REFERENCES `volunteer` (`VolunteerID`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`receiver_ID`) REFERENCES `receiver` (`ReceiverID`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`receiver_ID`) REFERENCES `receiver` (`ReceiverID`),
  ADD CONSTRAINT `report_ibfk_2` FOREIGN KEY (`vol_ID`) REFERENCES `volunteer` (`VolunteerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
