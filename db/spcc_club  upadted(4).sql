-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2022 at 03:18 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spcc_club`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `picture` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `email`, `password`, `picture`) VALUES
(14, 'Charlotte Mateo', 'Mateo_Charlotte@spcc.edu.ph', '0192023a7bbd73250516f069df18b500', '1653304350cha.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `club`
--

CREATE TABLE `club` (
  `id` int(11) NOT NULL,
  `clubname` varchar(45) DEFAULT NULL,
  `gmeetlink` varchar(250) DEFAULT NULL,
  `banner` varchar(250) DEFAULT NULL,
  `teacherid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `club`
--

INSERT INTO `club` (`id`, `clubname`, `gmeetlink`, `banner`, `teacherid`) VALUES
(19, 'Programming Club', 'https://meet.google.com/bem-wxqj-wrz', '1653365081278786254_499111441665798_5038019153379424598_n.png', 10),
(20, 'Art Club', 'https://meet.google.com/exa-eahc-ucr', '1653389932281389814_1437461593367569_8590471554875462746_n.png', 11);

-- --------------------------------------------------------

--
-- Table structure for table `clubfile`
--

CREATE TABLE `clubfile` (
  `id` int(11) NOT NULL,
  `filename` varchar(250) DEFAULT NULL,
  `clubworksid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clubfile`
--

INSERT INTO `clubfile` (`id`, `filename`, `clubworksid`) VALUES
(1, 'video.mp4', 10),
(11, '16536642652022-04-21-13-04-37.mp4', NULL),
(12, '16536647262022-04-21-13-04-37.mp4', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clubworks`
--

CREATE TABLE `clubworks` (
  `id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `detail` varchar(250) DEFAULT NULL,
  `filename` varchar(45) DEFAULT NULL,
  `dateposted` date DEFAULT NULL,
  `teacherid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clubworks`
--

INSERT INTO `clubworks` (`id`, `title`, `detail`, `filename`, `dateposted`, `teacherid`) VALUES
(21, 'erer', ' erer', '16536997152022-04-21-13-04-37.mp4', '2022-05-28', 10);

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `id` int(11) NOT NULL,
  `studentNo` int(11) NOT NULL,
  `fullname` varchar(45) NOT NULL,
  `picture` varchar(250) DEFAULT NULL,
  `password` varchar(250) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `teacherid` int(11) DEFAULT NULL,
  `clubid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`id`, `studentNo`, `fullname`, `picture`, `password`, `gender`, `age`, `email`, `teacherid`, `clubid`) VALUES
(123, 41930956, 'Student1', '1653298267user3.jpg', '0192023a7bbd73250516f069df18b500', 'Female', 19, 'Student1@gmail.com', 10, 19),
(124, 47584748, 'Student2', '1653451214279448343_527330439108268_108705336394898276_n.jpg', '0192023a7bbd73250516f069df18b500', 'Male', 21, 'Student2@gmail.com', 11, 20);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_info`
--

CREATE TABLE `teacher_info` (
  `id` int(11) NOT NULL,
  `teacherNo` int(11) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `picture` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_info`
--

INSERT INTO `teacher_info` (`id`, `teacherNo`, `fullname`, `email`, `password`, `picture`) VALUES
(10, 47284628, 'teacher1', 'teacher1@gmail.com', '0192023a7bbd73250516f069df18b500', '1653364945user2.jpg'),
(11, 44675889, 'teacher2', 'teacher2@gmail.com', '0192023a7bbd73250516f069df18b500', '165345068656862243_310111776335514_7799183949770522624_n.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clubfile`
--
ALTER TABLE `clubfile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clubworks`
--
ALTER TABLE `clubworks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`id`,`studentNo`);

--
-- Indexes for table `teacher_info`
--
ALTER TABLE `teacher_info`
  ADD PRIMARY KEY (`id`,`teacherNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `club`
--
ALTER TABLE `club`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `clubfile`
--
ALTER TABLE `clubfile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `clubworks`
--
ALTER TABLE `clubworks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `teacher_info`
--
ALTER TABLE `teacher_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
