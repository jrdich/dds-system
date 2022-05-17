-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2022 at 04:19 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dds-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `actions_history`
--

CREATE TABLE `actions_history` (
  `email` varchar(20) NOT NULL,
  `actions_taken` varchar(500) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bmi_tracker`
--

CREATE TABLE `bmi_tracker` (
  `trackerID` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `height` double NOT NULL,
  `weight` double NOT NULL,
  `scaleDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `bmiResult` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bmi_tracker`
--

INSERT INTO `bmi_tracker` (`trackerID`, `username`, `height`, `weight`, `scaleDate`, `bmiResult`) VALUES
(1, 'huends20', 1.67, 70, '2022-05-08 06:52:01', 25.1);

-- --------------------------------------------------------

--
-- Table structure for table `bodybuilders`
--

CREATE TABLE `bodybuilders` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `bday` date NOT NULL,
  `gender` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `last_seen` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bodybuilders`
--

INSERT INTO `bodybuilders` (`username`, `password`, `fullname`, `bday`, `gender`, `email`, `last_seen`) VALUES
('admin', 'admin12345', 'Admin', '0000-00-00', '', '', '2022-05-08 06:57:08'),
('huends20', 'lake20', 'Jhoebert Huenda', '1999-06-06', 'Male', 'huendahuenda20@gmail.com', '2022-05-03 09:24:59');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `programs_id` int(22) NOT NULL,
  `category` varchar(50) NOT NULL,
  `p_select` varchar(20) NOT NULL,
  `bmi_range` varchar(20) NOT NULL,
  `content_image` varchar(200) NOT NULL,
  `content_video_link` varchar(500) NOT NULL,
  `days` int(3) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`programs_id`, `category`, `p_select`, `bmi_range`, `content_image`, `content_video_link`, `days`, `gender`) VALUES
(25, 'Dietary', 'Gain Weight', 'Below 18.5', '../dist/programImages/0kjPy6uZ/woman-measuring-stomach-1296x728.jpg', 'https://www.youtube.com/watch?v=CeRiFjYlPIw', 5, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `program_steps`
--

CREATE TABLE `program_steps` (
  `program_steps_id` int(10) NOT NULL,
  `program_steps` varchar(10000) NOT NULL,
  `program_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program_steps`
--

INSERT INTO `program_steps` (`program_steps_id`, `program_steps`, `program_id`) VALUES
(12, 'step 1', 25),
(13, 'step 2', 25),
(14, 'step 3', 25),
(15, 'step 4', 25),
(16, 'step 5', 25),
(17, 'step 6', 25);

-- --------------------------------------------------------

--
-- Table structure for table `user_steps`
--

CREATE TABLE `user_steps` (
  `user_steps` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `program_id` int(10) NOT NULL,
  `completed` varchar(1000) NOT NULL,
  `steps_to_complete` int(5) NOT NULL,
  `completed_steps` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_steps`
--

INSERT INTO `user_steps` (`user_steps`, `username`, `program_id`, `completed`, `steps_to_complete`, `completed_steps`) VALUES
(176, 'huends20', 25, '0', 6, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bmi_tracker`
--
ALTER TABLE `bmi_tracker`
  ADD PRIMARY KEY (`trackerID`);

--
-- Indexes for table `bodybuilders`
--
ALTER TABLE `bodybuilders`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`programs_id`);

--
-- Indexes for table `program_steps`
--
ALTER TABLE `program_steps`
  ADD PRIMARY KEY (`program_steps_id`);

--
-- Indexes for table `user_steps`
--
ALTER TABLE `user_steps`
  ADD PRIMARY KEY (`user_steps`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bmi_tracker`
--
ALTER TABLE `bmi_tracker`
  MODIFY `trackerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `programs_id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `program_steps`
--
ALTER TABLE `program_steps`
  MODIFY `program_steps_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_steps`
--
ALTER TABLE `user_steps`
  MODIFY `user_steps` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
