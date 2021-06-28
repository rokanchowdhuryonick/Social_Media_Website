-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2021 at 12:01 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dot_connect`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_data`
--

CREATE TABLE `company_data` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `company_tagline` varchar(220) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `company_website` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `company_logo` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `company_address` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `country_id` int(11) NOT NULL COMMENT 'country_id will come from country table'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `password` int(225) NOT NULL,
  `registration_datetime` datetime NOT NULL,
  `active` int(2) NOT NULL DEFAULT 0,
  `user_type` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'individual, company, admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `user_data_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL COMMENT 'login id will come from login table',
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Male, Female',
  `address` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `country_id` int(11) NOT NULL COMMENT 'country_id will come from country table',
  `phone` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `about_me` varchar(500) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `profile_photo` varchar(220) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `cover_photo` varchar(220) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `user_cv` varchar(220) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_data`
--
ALTER TABLE `company_data`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`user_data_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_data`
--
ALTER TABLE `company_data`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `user_data_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
