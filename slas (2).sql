-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2016 at 04:11 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `slas`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
`book_id` int(10) NOT NULL,
  `subject` char(30) NOT NULL,
  `description` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `username` char(50) NOT NULL,
  `lecturer` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'PENDING'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE IF NOT EXISTS `lecturer` (
`lect_id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` char(50) NOT NULL,
  `dob` date NOT NULL,
  `gender` char(6) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `timetable` text NOT NULL,
  `department` varchar(15) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'lecturer'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`lect_id`, `username`, `password`, `name`, `dob`, `gender`, `phone`, `timetable`, `department`, `type`) VALUES
(10, 'L00', '1234', 'Ahmad', '2016-05-28', 'Male', '0179771219', 'A.jpg', 'Software', 'lecturer'),
(11, 'L66', '1234', 'sanusi', '1982-08-10', 'Male', '0148084692', 'timetable_3.jpg', 'Software', 'lecturer'),
(12, 'L77', '1234', 'Norazlianor', '1981-07-13', 'Female', '0148084692', 'timetable_2.jpg', 'Software', 'lecturer'),
(13, 'L88', '1234', 'nadiah hasbi', '2016-06-16', 'Female', '0148084692', 'timetable_1.jpg', 'Software', 'lecturer');

--
-- Triggers `lecturer`
--
DELIMITER //
CREATE TRIGGER `delete_lecturer` AFTER DELETE ON `lecturer`
 FOR EACH ROW Begin
Delete from login where username = Old.username;
END
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `insert_lecturer` AFTER INSERT ON `lecturer`
 FOR EACH ROW begin
insert into login(username, password, type, name) Values (New.username , New.password , New.type , New.name);
END
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `update_lecturer` AFTER UPDATE ON `lecturer`
 FOR EACH ROW Begin
update login set password = New.password where username = New.username;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
`log_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`log_id`, `username`, `password`, `type`, `name`) VALUES
(1, 'admin', '123456', 'admin', 'siti'),
(17, 'L00', '1234', 'lecturer', 'Ahmad'),
(22, 'b034', '1234', 'student', 'atun'),
(23, 'b044', '1234', 'student', 'alif'),
(24, 'b055', '1234', 'student', 'syafo'),
(25, 'L66', '1234', 'lecturer', 'sanusi'),
(26, 'L77', '1234', 'lecturer', 'Norazlianor'),
(27, 'L88', '1234', 'lecturer', 'nadiah hasbi');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`news_id` int(20) NOT NULL,
  `date` date NOT NULL,
  `news` varchar(100) NOT NULL,
  `subject` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `date`, `news`, `subject`) VALUES
(3, '2016-05-07', 'to all third year students, you will need to come to Bilik Seminar on the stated date , at 2.00PM ', 'psm briefing'),
(5, '2016-05-07', 'on the stated date , ftmk will be having explorace', 'ftmk explorace'),
(6, '2016-05-21', 'pameran psm akan diadakan bersempena psm', 'Pameran PSM'),
(7, '2016-06-02', 'Pada tarikh berikut , FTMK akan mengadakan masjis iftar beramai ramai bertempat di masjid UTeM', 'Iftar FTMK'),
(8, '2016-06-04', 'All Second year students will have to attend seminar bengkel 1 at dewan seminar ftmk', 'Seminar Bengkel 1');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
`stat_id` int(10) NOT NULL,
  `lect_id` int(10) NOT NULL,
  `day` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`stat_id`, `lect_id`, `day`, `status`, `date`) VALUES
(4, 10, 'khamis', 'i will not be in utem for i have a course to attend on that day', '2016-05-03'),
(5, 11, 'all day in a week', 'i will not be in utem for this week', '2016-05-26'),
(6, 0, 'tuesday', 'i will be attending a course on the stated day and date', '2016-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
`stud_id` int(10) NOT NULL,
  `name` char(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `gender` char(6) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `course_sect` varchar(15) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'student'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stud_id`, `name`, `username`, `password`, `dob`, `gender`, `phone`, `course_sect`, `type`) VALUES
(13, 'nurul Hidayatun Hajira Bt Mt Saha', 'b034', '1234', '2016-05-02', 'female', '0148084692', 'BITM S1G1', 'student'),
(14, 'Muhammad Alif Bin Ahmad', 'b044', '1234', '2016-05-03', 'Male', '0179771219', 'BITS/S1G1', 'student'),
(15, 'Syafiqah Bt Sabri', 'b055', '1234', '2016-05-07', 'Female', '0148084692', 'BITS/S1G1', 'student');

--
-- Triggers `student`
--
DELIMITER //
CREATE TRIGGER `delete_student` AFTER DELETE ON `student`
 FOR EACH ROW Begin
Delete from login where username = Old.username;
END
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `insert_student` AFTER INSERT ON `student`
 FOR EACH ROW begin
insert into login(username, password, type, name) Values (New.username , New.password , New.type , New.name);
END
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `update_student` AFTER UPDATE ON `student`
 FOR EACH ROW Begin
update login set password = New.password where username = New.username;
END
//
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
 ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
 ADD PRIMARY KEY (`lect_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
 ADD PRIMARY KEY (`stat_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`stud_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
MODIFY `book_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `lecturer`
--
ALTER TABLE `lecturer`
MODIFY `lect_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
MODIFY `news_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
MODIFY `stat_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
MODIFY `stud_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
