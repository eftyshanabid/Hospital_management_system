-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2023 at 07:34 PM
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
-- Database: `patient_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`username`, `password`) VALUES
('a', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `package_ID` varchar(30) NOT NULL,
  `bill_ID` int(11) NOT NULL,
  `bill_name` varchar(30) NOT NULL,
  `patient_ID` varchar(20) NOT NULL,
  `patient_name` varchar(20) DEFAULT NULL,
  `hospital_name` varchar(20) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `cost` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`package_ID`, `bill_ID`, `bill_name`, `patient_ID`, `patient_name`, `hospital_name`, `date`, `cost`) VALUES
('011', 11001, 'physician', 'efty2f', 'efty', NULL, '01 Jan 2023', '500'),
('011', 11002, 'pharmacy', 'efty2f', 'efty', NULL, '01 Jan 2023', '200'),
('011', 11003, 'over night', 'efty2f', 'efty', NULL, '01 Jan 2023', '700'),
('011', 11004, 'others', 'efty2f', 'efty', NULL, '01 Jan 2023', '400');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_ID` varchar(20) NOT NULL,
  `doctor_name` varchar(20) DEFAULT NULL,
  `specialization` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` varchar(30) NOT NULL,
  `schedule` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_ID`, `doctor_name`, `specialization`, `email`, `phone`, `schedule`) VALUES
('abid123', 'Abid', 'Otolaryngology', 'abid@gmail.com', '1724080441', '8am-10am'),
('arefin123', 'Arefin', 'Pediatrics', 'arefin@gmail.com', '1743794723', '10am-12am'),
('arefin222', 'Sabbir', 'Pediatrics', 'eftysss@gmail.com', '01780803873', '10am-12am'),
('efty123', 'Efty', 'Dermatology', 'efty@gmail.com', '1724080441', '11am-1pm'),
('efty222', 'Raju', 'Dermatology', 'eftys@gmail.com', '01724080441', '11am-1pm'),
('emon123', 'Emon', 'Otolaryngology', 'emon@gmail.com', '1780803873', '03pm-5pm'),
('galib123', 'Galib', 'Pediatrics', 'galib@gmail.com', '01724080441', '03pm-5pm'),
('leo123', 'Leo', 'Psychiatry', 'leo@gmail.com', '1724080441', '4pm-6pm'),
('sajid123', 'Sajid', 'Psychiatry', 'sajid@gmail.com', '01724080441', '4pm-6pm'),
('shipon123', 'Shipon', 'Psychiatry', 'eftysda@gmail.com', '01780803873', '11am-1pm'),
('sourav123', 'Sourav', 'Otolaryngology', 'sourav@gmail.com', '1743794723', '7pm-10pm'),
('van123', 'Van Dijk', 'Dermatology', 'evan@gmail.com', '01780803873', '9pm-10pm');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_ID` varchar(20) NOT NULL,
  `patient_name` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `prescription` varchar(500) DEFAULT NULL,
  `doctor_ID` int(11) DEFAULT NULL,
  `doctor_name` varchar(20) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` enum('male','female') NOT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_ID`, `patient_name`, `phone`, `email`, `address`, `prescription`, `doctor_ID`, `doctor_name`, `age`, `gender`, `password`) VALUES
('efty2f', 'eee', '12232', 'eeeddd@re', '', NULL, NULL, NULL, 22, 'male', '12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`package_ID`,`bill_ID`,`patient_ID`),
  ADD KEY `fk_bill_pat_name` (`patient_ID`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_ID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_ID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_doctor_ID` (`doctor_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `fk_bill_hos_name` FOREIGN KEY (`hospital_name`) REFERENCES `hospital` (`hospital_name`),
  ADD CONSTRAINT `fk_bill_pat_name` FOREIGN KEY (`patient_ID`) REFERENCES `patient` (`patient_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
