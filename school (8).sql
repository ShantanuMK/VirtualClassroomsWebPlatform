-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 29, 2020 at 03:43 AM
-- Server version: 5.7.32-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `cid` bigint(255) NOT NULL,
  `sstd` int(10) NOT NULL,
  `sdiv` varchar(10) NOT NULL,
  `school_id` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`cid`, `sstd`, `sdiv`, `school_id`) VALUES
(1, 3, 'A', 1),
(2, 4, 'A', 1),
(3, 4, 'B', 1),
(4, 10, 'A', 2),
(8, 10, 'A', 3),
(9, 12, 'A', 3);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `eid` bigint(255) NOT NULL,
  `subid` bigint(255) DEFAULT NULL,
  `ename` varchar(1000) DEFAULT NULL,
  `udate` datetime DEFAULT CURRENT_TIMESTAMP,
  `edate` date NOT NULL,
  `etime` time NOT NULL,
  `eetime` time NOT NULL,
  `eduration` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`eid`, `subid`, `ename`, `udate`, `edate`, `etime`, `eetime`, `eduration`) VALUES
(1, 2, 'Exam1', '2020-06-27 15:48:23', '2020-07-01', '00:00:00', '00:00:00', NULL),
(2, 2, 'Exam2', '2020-06-27 15:54:16', '2020-06-28', '00:00:00', '00:00:00', NULL),
(3, 2, 'Exam3', '2020-06-27 15:57:12', '2020-06-30', '00:00:00', '00:00:00', NULL),
(4, 1, 'Exam1', '2020-06-30 12:20:25', '2020-06-30', '16:20:00', '00:00:00', 10),
(5, 2, 'science 123', '2020-07-04 10:04:41', '2020-07-04', '10:06:00', '10:08:00', 12),
(6, 2, 'exam trial1', '2020-07-05 20:22:31', '2020-07-05', '20:24:00', '20:27:00', 10),
(7, 2, '1234', '2020-07-05 20:27:20', '2020-07-05', '08:10:00', '20:32:00', 12),
(8, 2, 'scrol', '2020-07-06 10:10:07', '2020-07-12', '12:12:00', '20:20:00', 5),
(9, 15, 'English quiz', '2020-07-12 15:49:17', '2020-07-12', '09:30:00', '09:40:00', 10),
(10, 15, 'Grammar', '2020-07-12 16:17:07', '2020-07-12', '21:45:00', '22:45:00', 60),
(11, 17, 'science topic 2', '2020-07-19 14:11:23', '2020-07-19', '19:00:00', '20:00:00', 30);

-- --------------------------------------------------------

--
-- Table structure for table `examgiven`
--

CREATE TABLE `examgiven` (
  `eid` bigint(255) DEFAULT NULL,
  `sid` bigint(255) DEFAULT NULL,
  `edate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `emarks` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `examgiven`
--

INSERT INTO `examgiven` (`eid`, `sid`, `edate`, `emarks`) VALUES
(4, 6, '2020-06-30 00:00:00', 0),
(4, 6, '2020-06-30 00:00:00', 0),
(3, 6, '2020-06-30 00:00:00', 2),
(3, 6, '2020-06-30 00:00:00', 2),
(3, 12, '2020-06-30 00:00:00', 4),
(5, 6, '2020-07-04 00:00:00', 2),
(7, 6, '2020-07-05 00:00:00', 2),
(7, 12, '2020-07-05 00:00:00', 0),
(10, 16, '2020-07-12 16:31:29', 4),
(10, 14, '2020-07-12 16:34:00', 4),
(10, 13, '2020-07-12 16:40:47', 4);

-- --------------------------------------------------------

--
-- Table structure for table `examq`
--

CREATE TABLE `examq` (
  `eid` bigint(255) DEFAULT NULL,
  `eqn` int(100) DEFAULT NULL,
  `eq` longtext,
  `ea` varchar(1000) DEFAULT NULL,
  `eb` varchar(1000) DEFAULT NULL,
  `ec` varchar(1000) DEFAULT NULL,
  `ed` varchar(1000) DEFAULT NULL,
  `ecorrect` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `examq`
--

INSERT INTO `examq` (`eid`, `eqn`, `eq`, `ea`, `eb`, `ec`, `ed`, `ecorrect`) VALUES
(3, 1, 'python?', 'macchine lerning', 'rnn', '3', 'programming language', 'd'),
(3, 2, 'linux?', 'language', 'ml', 'lstm', 'os', 'd'),
(4, 1, 'What is server?', 'net provider', 'storage device', 'ram', 'all', 'd'),
(5, 1, 'What is python?', 'pl', 'os', 'hardware', 'software', 'a'),
(6, 1, 'what is linux?', 'os', 'hardware', 'lstm', 'ml', 'a'),
(7, 1, 'what is linux', 'os', 'a', 'v', 'ml', 'a'),
(8, 1, 'what is linux', 'os', 'a', 'v', 'ml', 'a'),
(9, 1, 'what is your name', 'nidhee', 'avani', 'rajas', 'akanksha', 'c'),
(9, 2, 'what is your name?', 'rajas ', 'nidhee', 'avani', 'akanksha', 'd'),
(9, 3, 'what is your name?', 'avani', 'rajas', 'nidhee', 'akanksha', 'a'),
(10, 1, 'What is Nehal', 'proper noun', 'commom noun', 'collective noun', 'none', 'A'),
(10, 2, 'What is animal', 'proper noun', 'common noun', 'collective noun', 'none', 'b'),
(10, 3, 'What is bird', 'proper noun', 'collective noun', 'common noun', 'none', 'c'),
(11, 1, 'Electric bulb filament is made of ', 'copper', 'Aluminium', 'Lead', 'Tungsten', 'd'),
(11, 2, 'Which of the following is a non mental that remains liquid room temperature', 'Phosphorous', 'Bromine', 'Chlorine', 'Helium', 'b'),
(11, 3, 'Chlorophyll is a naturally occuring chelate compound in which central metal is', 'copper', 'magnesium', 'iron', 'calcium', 'b');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `school_id` bigint(255) NOT NULL,
  `school_name` text,
  `school_email` varchar(100) DEFAULT NULL,
  `school_password` varchar(100) DEFAULT NULL,
  `school_number` bigint(10) DEFAULT NULL,
  `approve` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`school_id`, `school_name`, `school_email`, `school_password`, `school_number`, `approve`) VALUES
(1, 'dems', 'dems@gmail.com', 'demsdems', 9090909090, 1),
(2, 'Apte', 'apte@gmail.com', 'apte', 9090909090, 2),
(3, 'Samartha Classes', 'samartheducation99@gmail.com', 'samarth#99#edu', 9763105082, 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `sid` bigint(255) NOT NULL,
  `ssrno` int(10) DEFAULT NULL,
  `sname` text,
  `sstd` tinyint(1) DEFAULT NULL,
  `sdiv` text,
  `spassword` varchar(100) DEFAULT NULL,
  `semail` varchar(1000) DEFAULT NULL,
  `smnum` bigint(10) DEFAULT NULL,
  `school_id` bigint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`sid`, `ssrno`, `sname`, `sstd`, `sdiv`, `spassword`, `semail`, `smnum`, `school_id`) VALUES
(3, 1, 'sam', 3, 'A', 'sam12', 'student@gmail.com', 9999999999, 1),
(4, 2, 'bruce', 3, 'A', 'bruce12', 'student@gmail.com', 8888888888, 1),
(5, 21, 'shantanu', 3, 'A', 'shantanu21', 'student@gmail.com', 9898989898, 1),
(6, 12, 'Tony stark', 4, 'A', 'tony', 'tony@gmail.com', 7898789878, 1),
(8, 14, 'chris', 4, 'B', 'chris', 'student@gmail.com', 1254789865, 1),
(9, 12, 'pepper', 4, 'B', 'pepper', 'student@gmail.com', 1245789865, 1),
(12, 19, 'batman', 4, 'A', 'batman', 'batman@gmail.com', 9090909090, 1),
(13, 101, 'Tony Stark', 10, 'A', 'tonystark', 'tonystark@gmail.com', 9284087422, 2),
(14, 102, 'Bruce Wayne', 10, 'A', 'brucewayne', 'brucewayne@gmail.com', 9090909090, 2),
(15, 101, 'Avani', 10, 'A', 'avani', 'Avani@gmail.com', 987654321, 2),
(16, 102, 'Nidhee', 10, 'A', 'nidhee', 'nidhee@gmail.com', 1234567890, 2);

-- --------------------------------------------------------

--
-- Table structure for table `stufiles`
--

CREATE TABLE `stufiles` (
  `sfid` bigint(255) NOT NULL,
  `sid` bigint(255) DEFAULT NULL,
  `fid` bigint(255) DEFAULT NULL,
  `sfilename` varchar(50) DEFAULT NULL,
  `subdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stufiles`
--

INSERT INTO `stufiles` (`sfid`, `sid`, `fid`, `sfilename`, `subdate`) VALUES
(1, 0, 0, NULL, '2020-06-23 00:00:00'),
(2, 6, 3, 'stu_6file_3.pdf', '2020-06-23 00:00:00'),
(3, 6, 4, 'stu_6_file_4.pdf', '2020-06-25 00:00:00'),
(4, 6, 14, 'stu_6_file_14.pdf', '2020-06-26 00:00:00'),
(5, 6, 16, 'stu_6_file_16.pdf', '2020-06-29 00:00:00'),
(6, 6, 17, 'stu_6_file_17.pdf', '2020-07-04 00:00:00'),
(7, 12, 14, 'stu_12_file_14.pdf', '2020-07-07 00:00:00'),
(8, 6, 15, 'stu_6_file_15.pdf', '2020-07-13 12:08:24'),
(9, 12, 16, 'stu_12_file_16.pdf', '2020-07-14 13:45:51'),
(10, 12, 17, 'stu_12_file_17.pdf', '2020-07-14 13:46:50'),
(11, 13, 24, 'stu_13_file_24.pdf', '2020-08-08 12:00:12'),
(12, 13, 25, 'stu_13_file_25.pdf', '2020-09-22 12:05:27');

-- --------------------------------------------------------

--
-- Table structure for table `subfiles`
--

CREATE TABLE `subfiles` (
  `fid` bigint(255) NOT NULL,
  `subid` bigint(255) DEFAULT NULL,
  `filename` varchar(20) DEFAULT NULL,
  `ftname` varchar(100) DEFAULT NULL,
  `ftype` int(10) DEFAULT NULL,
  `pdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subfiles`
--

INSERT INTO `subfiles` (`fid`, `subid`, `filename`, `ftname`, `ftype`, `pdate`, `sdate`) VALUES
(1, 2, 'file_1.pdf', 'A1', 1, '2020-06-21 00:00:00', '0000-00-00'),
(2, 0, NULL, NULL, 0, '2020-06-21 00:00:00', '0000-00-00'),
(3, 2, 'file_3.pdf', 'a4', 1, '2020-06-21 00:00:00', '2020-06-26'),
(4, 2, 'file_4.pdf', 'a4', 1, '2020-06-21 00:00:00', '2020-06-26'),
(5, 2, 'sm_5.pdf', '1st lesson', 2, '2020-06-21 00:00:00', '0000-00-00'),
(6, 2, 'sm_6.pdf', '1st lesson', 2, '2020-06-21 00:00:00', '0000-00-00'),
(7, 2, 'sm_7.pdf', '1st lesson', 2, '2020-06-21 00:00:00', '0000-00-00'),
(8, 2, 'sm_8.pdf', '1st lesson', 2, '2020-06-21 00:00:00', '0000-00-00'),
(9, 2, 'sm_9.pdf', '1st lesson', 2, '2020-06-21 00:00:00', '0000-00-00'),
(10, 2, 'sm_10.pdf', '1st lesson', 2, '2020-06-21 00:00:00', '0000-00-00'),
(11, 2, 'sm_11.pdf', '2nd', 2, '2020-06-21 00:00:00', '0000-00-00'),
(12, 2, 'sm_12.pdf', '2nd', 2, '2020-06-21 00:00:00', '0000-00-00'),
(13, 2, 'sm_13.pdf', '2nd', 2, '2020-06-21 00:00:00', '0000-00-00'),
(14, 2, 'file_14.pdf', 'Assignment12', 1, '2020-06-26 00:00:00', '2020-06-30'),
(15, 2, 'file_15.pdf', 'Assignment 10', 1, '2020-06-27 00:00:00', '2020-06-28'),
(16, 2, 'file_16.pdf', 'Science', 1, '2020-06-27 00:00:00', '2020-07-04'),
(17, 2, 'file_17.pdf', 'science 12', 1, '2020-07-04 00:00:00', '2020-07-30'),
(18, 17, 'file_18.pdf', 'Science assign 2', 1, '2020-07-19 14:20:21', '2020-07-20'),
(19, 2, 'sm.pdf', 'sm1', 2, '2020-07-20 09:56:58', NULL),
(20, 2, 'sm.pdf', 'sm1', 2, '2020-07-20 09:57:39', NULL),
(21, 16, 'sm_21.pdf', 'Topic 12', 2, '2020-07-20 10:05:23', NULL),
(22, 16, 'sm_22.pdf', 'Topic 13', 2, '2020-07-20 10:05:53', NULL),
(23, 16, 'sm_23.pdf', 'Topic 14', 2, '2020-07-20 10:06:45', NULL),
(24, 16, 'file_24.pdf', 'Topic 12', 1, '2020-08-03 16:18:02', '2020-08-05'),
(25, 16, 'file_25.pdf', 'assign 21', 1, '2020-09-17 03:06:55', '2020-09-23');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subid` bigint(255) NOT NULL,
  `subname` varchar(100) DEFAULT NULL,
  `substd` int(10) DEFAULT NULL,
  `subdiv` text,
  `tid` bigint(255) DEFAULT NULL,
  `school_id` bigint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subid`, `subname`, `substd`, `subdiv`, `tid`, `school_id`) VALUES
(1, 'shan', 4, 'A', 1, 1),
(2, 'Shantanu', 4, 'A', 1, 1),
(6, 'neha', 4, 'A', 4, 1),
(8, 'science', 4, 'A', 1, 1),
(9, 'maths2', 4, 'A', 2, 1),
(12, 'science', 4, 'B', 3, 1),
(13, 'maths', 3, 'A', 9, 1),
(14, 'English', 4, 'B', 1, 1),
(15, 'English', 8, 'A', 12, 1),
(16, 'English', 10, 'A', 5, 2),
(18, 'Maths', 10, 'A', 13, 2);

-- --------------------------------------------------------

--
-- Table structure for table `subvideo`
--

CREATE TABLE `subvideo` (
  `subid` bigint(255) DEFAULT NULL,
  `svid` bigint(255) DEFAULT NULL,
  `svame` varchar(100) DEFAULT NULL,
  `topic` varchar(100) DEFAULT NULL,
  `udate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `tid` bigint(255) NOT NULL,
  `tname` text,
  `temail` varchar(100) DEFAULT NULL,
  `tpassword` varchar(100) DEFAULT NULL,
  `tmobile` bigint(10) DEFAULT NULL,
  `school_id` bigint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`tid`, `tname`, `temail`, `tpassword`, `tmobile`, `school_id`) VALUES
(1, 'varpe', 'varpe', 'varpe', 9090909090, 1),
(2, 'dixit', 'dixit', 'dixit', 9090909090, 1),
(3, 'mahajan', 'mahajan', 'mahajan', 9090909090, 1),
(4, 'karpe', 'karpe', 'karpe', 9090909090, 1),
(5, 'gosh', 'gosh', 'gosh', 9878987098, 2),
(6, 'puja', 'puja', 'puja', 9878987098, 2),
(7, 'sujata', 'sujata', 'sujata', 9878987098, 2),
(8, 'reena', 'reena@gmail.com', 'reena', 9090909090, 1),
(9, 'v', 'v@gmail.com', 'v', 9900990099, 1),
(11, 'a', 'a@gmail.com', 'a', 9879879879, 1),
(12, 'Swati Parkhi', 'swati@gmail.com', 'swati', 1234567890, 1),
(13, 'Sarang ', 'sarang123@gmail.com', 'sarang', 987654321, 2),
(14, 'Nehal Parkhi', 'parkhinehal@gmail.com', 'nehalparkhi', 1234567890, 2);

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `id` int(100) NOT NULL,
  `sstd` int(100) DEFAULT NULL,
  `sdiv` text,
  `iname` varchar(1000) DEFAULT NULL,
  `school_id` bigint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`id`, `sstd`, `sdiv`, `iname`, `school_id`) VALUES
(4, 3, 'A', 'timage_3_A.jpg', 1),
(6, 4, 'B', 'timage_4_B.PNG', 1),
(20, 4, 'A', 'timage_4_A.PNG', 1),
(21, 10, 'A', 'timage_10_A_2.jpg', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `stufiles`
--
ALTER TABLE `stufiles`
  ADD PRIMARY KEY (`sfid`);

--
-- Indexes for table `subfiles`
--
ALTER TABLE `subfiles`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subid`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `cid` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `eid` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `school_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `sid` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `stufiles`
--
ALTER TABLE `stufiles`
  MODIFY `sfid` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subfiles`
--
ALTER TABLE `subfiles`
  MODIFY `fid` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subid` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `tid` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
