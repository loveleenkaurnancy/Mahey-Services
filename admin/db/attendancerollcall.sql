-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2018 at 08:38 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `attendancerollcall`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `email`, `password`) VALUES
('Admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
`id` int(11) NOT NULL,
  `block` varchar(50) NOT NULL,
  `class_id` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `teacher_id` varchar(50) NOT NULL,
  `attendance` varchar(2000) NOT NULL,
  `a_date` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `block`, `class_id`, `subject`, `topic`, `teacher_id`, `attendance`, `a_date`) VALUES
(72, 'IT', 'MCA SEM 5', 'WEB TECHNOLOGIES', 'PHP', 'gurpreet@gmail.com', '{"101":"Present"}', '2018-07-25'),
(73, 'IT', 'MCA SEM 1', 'ARTIFICIAL INTELLIGENCE', 'Cloud', 'pranav@gmail.com', '}', '2018-07-25'),
(74, 'IT', 'MCA SEM 5', 'UML', 'UML', 'amandeep@gmail.com', '{"101":"Present","102":"Present"}', '2018-08-03');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_record`
--

CREATE TABLE IF NOT EXISTS `attendance_record` (
`id` int(11) NOT NULL,
  `stu_class` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `rollno` varchar(50) NOT NULL,
  `attend` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance_record`
--

INSERT INTO `attendance_record` (`id`, `stu_class`, `subject`, `rollno`, `attend`, `total`) VALUES
(36, 'MCA SEM 5', 'WEB TECHNOLOGIES', '101', '1', '1'),
(37, 'MCA SEM 5', 'UML', '101', '1', '1'),
(38, 'MCA SEM 5', 'UML', '102', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `block`
--

CREATE TABLE IF NOT EXISTS `block` (
`id` int(11) NOT NULL,
  `block` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `block`
--

INSERT INTO `block` (`id`, `block`) VALUES
(1, 'IT'),
(2, 'MANAGEMENT'),
(3, 'HOTEL MANAGEMENT'),
(4, 'FINE ARTS');

-- --------------------------------------------------------

--
-- Table structure for table `block_class`
--

CREATE TABLE IF NOT EXISTS `block_class` (
`id` int(11) NOT NULL,
  `block` varchar(50) NOT NULL,
  `class_name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `block_class`
--

INSERT INTO `block_class` (`id`, `block`, `class_name`) VALUES
(3, 'IT', 'BCA SEM 1'),
(4, 'IT', 'BCA SEM 3'),
(5, 'IT', 'BCA SEM 5'),
(6, 'IT', 'MCA SEM 1'),
(7, 'IT', 'MCA SEM 3'),
(8, 'IT', 'MCA SEM 5'),
(9, 'MANAGEMENT', 'MBA SEM 1'),
(10, 'MANAGEMENT', 'MBA SEM 3'),
(11, 'HOTEL MANAGEMENT', 'B.SC. SEM 1'),
(12, 'HOTEL MANAGEMENT', 'B.SC. SEM 3'),
(13, 'HOTEL MANAGEMENT', 'B.SC. SEM 5'),
(14, 'FINE ARTS', 'BA SEM 1');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
`id` int(11) NOT NULL,
  `rollno` varchar(50) NOT NULL,
  `name` varchar(20) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `rollno`, `name`, `subject`, `message`) VALUES
(1, '101', 'Kajal', 'UML', 'Practicals are good');

-- --------------------------------------------------------

--
-- Table structure for table `mst_marks`
--

CREATE TABLE IF NOT EXISTS `mst_marks` (
`id` int(11) NOT NULL,
  `block` varchar(50) NOT NULL,
  `block_class` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `t_id` varchar(20) NOT NULL,
  `s_id` varchar(20) NOT NULL,
  `title` varchar(20) NOT NULL,
  `marks` varchar(20) NOT NULL,
  `max_marks` varchar(20) NOT NULL,
  `mst_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE IF NOT EXISTS `notices` (
`id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `title`, `description`) VALUES
(2, 'PPT', 'PPT Presentation will be on Monday (01-08-2018)'),
(3, 'Database', 'Ppt'),
(4, 'Ppt', '06-08-18'),
(5, 'Workshop on Web Designing', 'Seminar Hall (11 AM)'),
(6, 'Test', 'Unit-1');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `block` varchar(50) NOT NULL,
  `class_name` varchar(50) NOT NULL,
  `rollno` varchar(50) NOT NULL,
  `phno` bigint(20) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `block`, `class_name`, `rollno`, `phno`, `gender`, `dob`, `password`) VALUES
(4, 'Kajal', 'IT', 'MCA SEM 5', '101', 9876345678, 'Female', '1995-08-29', 'kajal'),
(5, 'Neetu', 'IT', 'MCA SEM 5', '102', 9876543267, 'Female', '1993-12-31', 'neetu');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
`id` int(11) NOT NULL,
  `block` varchar(50) NOT NULL,
  `class_id` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `block`, `class_id`, `subject`) VALUES
(5, 'IT', 'MCA SEM 1', 'ARTIFICIAL INTELLIGENCE'),
(6, 'IT', 'MCA SEM 5', 'WEB TECHNOLOGIES'),
(7, 'MANAGEMENT', 'MBA SEM 1', 'ACCOUNTS'),
(8, 'MANAGEMENT', 'MBA SEM 1', 'ECONOMICS'),
(9, 'FINE ARTS', 'BA SEM 1', 'COLOR COMPOSITION'),
(10, 'IT', 'MCA SEM 5', 'UML');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `email`, `contact`, `address`, `password`) VALUES
(1, 'Loveleen', 'loveleen@gmail.com', 9876523102, 'Jalandhar', 'loveleen'),
(2, 'Amit', 'amit@gmail.com', 9876743567, 'Ludhiana', 'amit'),
(3, 'Gurpreet', 'gurpreet@gmail.com', 9876743567, 'Jalandhar', 'gurpreet'),
(4, 'Pranav', 'pranav@gmail.com', 8765237899, 'Ludhiana', 'pranav'),
(5, 'Dharminder', 'dharminder@gmail.com', 7537390276, 'Jalandhar', 'dharminder'),
(6, 'Gurjeet', 'gurjeet@gmail.com', 8758908689, 'Jalandhar', 'gurjeet'),
(7, 'Gagandeep cheema', 'gagandeep@gmail.com', 9568152671, 'jalandhar', '123456'),
(8, 'Amandeep', 'amandeep@gmail.com', 9867845678, 'Jalandhar', 'amandeep');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE IF NOT EXISTS `timetable` (
`id` int(11) NOT NULL,
  `block` varchar(50) NOT NULL,
  `class_id` varchar(50) NOT NULL,
  `subject_id` varchar(50) NOT NULL,
  `teacher_id` varchar(50) NOT NULL,
  `timing` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`id`, `block`, `class_id`, `subject_id`, `teacher_id`, `timing`) VALUES
(3, 'IT', 'MCA SEM 5', 'WEB TECHNOLOGIES', 'gurpreet@gmail.com', ''),
(4, 'IT', 'MCA SEM 1', 'ARTIFICIAL INTELLIGENCE', 'pranav@gmail.com', ''),
(5, 'IT', 'MCA SEM 5', 'UML', 'amandeep@gmail.com', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`email`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_record`
--
ALTER TABLE `attendance_record`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `block`
--
ALTER TABLE `block`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `block_class`
--
ALTER TABLE `block_class`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_marks`
--
ALTER TABLE `mst_marks`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `attendance_record`
--
ALTER TABLE `attendance_record`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `block`
--
ALTER TABLE `block`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `block_class`
--
ALTER TABLE `block_class`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mst_marks`
--
ALTER TABLE `mst_marks`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
