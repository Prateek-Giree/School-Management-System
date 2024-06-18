-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2024 at 03:20 AM
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
-- Database: `smstest`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `grade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`grade`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(10);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `time` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `fullname`, `email`, `message`, `time`) VALUES
(1, 'Pratik', 'prateekgiree7@gmail.com', 'This is message', '2024-03-06');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sid` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `address` varchar(55) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `father` varchar(55) NOT NULL,
  `mother` varchar(55) NOT NULL,
  `admission` date DEFAULT current_timestamp(),
  `class` int(11) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `roll` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `name`, `address`, `contact`, `father`, `mother`, `admission`, `class`, `gender`, `dob`, `roll`) VALUES
(1, 'Hari Prasad Sharma', 'Rapti 1', '9841234555', 'Ram Sharma', 'Sita Sharma', '2024-03-01', 5, 'Male', '2010-05-15', 1),
(2, 'Gita Tamang', 'Rapti 2', '9812345677', 'Hari Tamang', 'Mina Tamang', '2024-02-28', 4, 'female', '2011-08-20', 2),
(3, 'Surendra Adhikari', 'Rapti 3', '9803456700', 'Ramesh Adhikari', 'Sita Adhikari', '2024-03-03', 3, 'Male', '2012-04-25', 3),
(4, 'Mina Joshi', 'Rapti 4', '9854567890', 'Hari Joshi', 'Sita Joshi', '2024-03-02', 3, 'Female', '2013-09-10', 4),
(5, 'Rajendra Shrestha', 'Rapti 5', '9845678901', 'Suresh Shrestha', 'Gita Shrestha', '2024-03-05', 1, 'Male', '2014-06-30', 5),
(6, 'Nabin Rai', 'Rapti 6', '9876543210', 'Gopal Rai', 'Sita Rai', '2024-03-01', 5, 'male', '2010-02-25', 6),
(7, 'Sunita Gurung', 'Rapti 7', '9812345678', 'Kumar Gurung', 'Maya Gurung', '2024-02-28', 4, 'female', '2011-07-20', 7),
(8, 'Bibek Adhikari', 'Rapti 8', '9801234567', 'Rajesh Adhikari', 'Sarita Adhikari', '2024-03-03', 3, 'male', '2012-03-25', 8),
(9, 'Anita Thapa', 'Rapti 9', '9853456789', 'Binod Thapa', 'Rita Thapa', '2024-03-02', 2, 'female', '2013-11-10', 9),
(10, 'Suman Ghimire', 'Khairahani 1', '9843210987', 'Gopal Ghimire', 'Sita Ghimire', '2024-03-01', 5, 'male', '2010-08-15', 10),
(11, 'Puja Shrestha', 'Khairahani 2', '9814321098', 'Ram Shrestha', 'Mina Shrestha', '2024-02-28', 4, 'female', '2011-09-20', 11),
(12, 'Rajan Sharma', 'Khairahani 3', '9805432109', 'Hari Sharma', 'Sita Sharma', '2024-03-03', 3, 'male', '2012-06-25', 12),
(13, 'Anita Khadka', 'Khairahani 4', '9856543210', 'Ramesh Khadka', 'Sarita Khadka', '2024-03-02', 2, 'female', '2013-10-10', 13),
(14, 'Bishal Thapa', 'Khairahani 5', '9847654321', 'Suresh Thapa', 'Gita Thapa', '2024-03-05', 1, 'male', '2014-07-30', 14),
(15, 'Pratima Gurung', 'Khairahani 6', '9818765432', 'Kumar Gurung', 'Maya Gurung', '2024-03-01', 5, 'female', '2010-03-25', 15),
(17, 'Sunita Rai', 'Khairahani 8', '9870987654', 'Rajesh Rai', 'Sarita Rai', '2024-03-03', 3, 'female', '2012-08-15', 17),
(18, 'Binita Lama', 'Khairahani 9', '9861098765', 'Binod Lama', 'Rita Lama', '2024-03-02', 2, 'female', '2013-04-10', 18),
(19, 'Anil Magar', 'Rapti 1', '9852109876', 'Ram Magar', 'Sita Magar', '2024-03-05', 1, 'male', '2014-09-30', 19),
(21, 'Pratik Giri', 'rapti-09', '9826272047', 'Prakash Giri', 'Seeta Giri', '2024-03-13', 1, 'Male', '2013-01-05', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` tinyint(1) DEFAULT 1,
  `contact` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `name`, `email`, `address`, `password`, `role`, `contact`) VALUES
(2, 'Pratik Giri', 'prateekgiree7@gmail.com', 'Rapti-09', '316e82ab49fbbff2a8eaf302d8d76a32', 0, '9848944960'),
(9, 'Sabin bhandari', 'sabin12@gmail.com', 'Khairahani-11', '316e82ab49fbbff2a8eaf302d8d76a32', 1, '9826272047'),
(10, 'Ram Kandel', 'ram1@example.com', 'Rapti-01', '316e82ab49fbbff2a8eaf302d8d76a32', 1, '9812365498'),
(11, 'shyam Thaoa', 'sam12@gmail.com', 'Khairahani -06', '316e82ab49fbbff2a8eaf302d8d76a32', 1, '9822334155');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`grade`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `contact` (`contact`),
  ADD UNIQUE KEY `class_2` (`class`,`roll`),
  ADD KEY `class` (`class`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `contact` (`contact`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`class`) REFERENCES `class` (`grade`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
