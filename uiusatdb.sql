-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2022 at 06:50 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uiusatdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `a_id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `keywords` varchar(200) NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `external_links` varchar(200) NOT NULL,
  `s_id` varchar(20) NOT NULL,
  `v_id` varchar(20) NOT NULL,
  `file_link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `e_id` int(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `post_date` date NOT NULL,
  `event_date` date NOT NULL,
  `event_time` varchar(20) NOT NULL,
  `location` varchar(200) NOT NULL,
  `summary` varchar(2000) NOT NULL,
  `keywords` varchar(200) NOT NULL,
  `guests` varchar(500) NOT NULL,
  `special_members` varchar(500) NOT NULL,
  `v_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `n_id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `post_date` date NOT NULL,
  `keywords` varchar(200) NOT NULL,
  `v_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `participates`
--

CREATE TABLE `participates` (
  `p_id` int(11) NOT NULL,
  `s_id` varchar(20) NOT NULL,
  `e_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `department` varchar(50) NOT NULL,
  `image_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `name`, `phone`, `email`, `password`, `gender`, `dob`, `department`, `image_id`) VALUES
('', 'AAA', '000', 'a@b.c', '0000', 'Female', '2023-01-01', 'CSE', ''),
('123456789', 'ABCD', '0123', 'a@a.a', '4444', 'Male', '2022-09-20', 'EEE', '');

-- --------------------------------------------------------

--
-- Table structure for table `verifier`
--

CREATE TABLE `verifier` (
  `v_id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `department` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `image_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `verifier`
--

INSERT INTO `verifier` (`v_id`, `name`, `phone`, `email`, `password`, `gender`, `dob`, `department`, `designation`, `image_id`) VALUES
('', 'vvv', '000', 'v@v.v', '1111', 'Female', '2023-09-01', 'CSE', 'vvv', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `s_id` (`s_id`),
  ADD KEY `v_id` (`v_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`e_id`),
  ADD KEY `v_id` (`v_id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`n_id`),
  ADD KEY `v_id` (`v_id`);

--
-- Indexes for table `participates`
--
ALTER TABLE `participates`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `s_id` (`s_id`),
  ADD KEY `e_id` (`e_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `verifier`
--
ALTER TABLE `verifier`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `e_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `n_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `participates`
--
ALTER TABLE `participates`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `achievements`
--
ALTER TABLE `achievements`
  ADD CONSTRAINT `achievements_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`),
  ADD CONSTRAINT `achievements_ibfk_2` FOREIGN KEY (`v_id`) REFERENCES `verifier` (`v_id`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`v_id`) REFERENCES `verifier` (`v_id`);

--
-- Constraints for table `notices`
--
ALTER TABLE `notices`
  ADD CONSTRAINT `notices_ibfk_1` FOREIGN KEY (`v_id`) REFERENCES `verifier` (`v_id`);

--
-- Constraints for table `participates`
--
ALTER TABLE `participates`
  ADD CONSTRAINT `participates_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`),
  ADD CONSTRAINT `participates_ibfk_2` FOREIGN KEY (`e_id`) REFERENCES `events` (`e_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
