-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2020 at 07:17 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid_tracing`
--

-- --------------------------------------------------------

--
-- Table structure for table `patient_record`
--

CREATE TABLE `patient_record` (
  `id` int(5) NOT NULL,
  `urn` varchar(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contact_no` bigint(15) NOT NULL,
  `house_no` varchar(5) NOT NULL,
  `street` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `post_code` varchar(10) NOT NULL,
  `travel_history` varchar(300) NOT NULL,
  `close_contact` varchar(500) NOT NULL,
  `hypertension` varchar(5) NOT NULL,
  `diabetes` varchar(5) NOT NULL,
  `hiv` varchar(5) NOT NULL,
  `heart_disease` varchar(5) NOT NULL,
  `fever` varchar(5) NOT NULL,
  `diarrhea` varchar(5) NOT NULL,
  `breathing_problem` varchar(5) NOT NULL,
  `cough` varchar(5) NOT NULL,
  `quarantine_type` varchar(15) NOT NULL,
  `risk_type` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Not cured'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_record`
--

INSERT INTO `patient_record` (`id`, `urn`, `name`, `dob`, `gender`, `contact_no`, `house_no`, `street`, `city`, `post_code`, `travel_history`, `close_contact`, `hypertension`, `diabetes`, `hiv`, `heart_disease`, `fever`, `diarrhea`, `breathing_problem`, `cough`, `quarantine_type`, `risk_type`, `status`) VALUES
(1, 'URN1', 'Patient_1', '2005-01-05', 'Male', 123456789, '1A', 'Street', 'Cit', 'Postal Cod', 'No Places', 'NA', 'Yes', 'No', 'No', 'No', 'Yes', 'Yes', 'No', 'Yes', 'Home', 'Moderate', 'Cured');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(500) NOT NULL,
  `designation` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `designation`) VALUES
(1, 'Doctor', 'doctor', '1234', 'Doctor'),
(2, 'Lab Techinician', 'technician', '1234', 'Lab Technician');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patient_record`
--
ALTER TABLE `patient_record`
  ADD PRIMARY KEY (`urn`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patient_record`
--
ALTER TABLE `patient_record`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
