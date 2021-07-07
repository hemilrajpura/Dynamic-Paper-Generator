-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2021 at 10:31 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pgen`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `sysId` int(11) NOT NULL,
  `createdDate` date DEFAULT NULL,
  `createdUserId` int(11) DEFAULT NULL,
  `modifiedDate` date DEFAULT NULL,
  `modifiedUserId` int(11) DEFAULT NULL,
  `sysStatus` varchar(1) NOT NULL DEFAULT 'A',
  `adminFname` varchar(30) NOT NULL,
  `adminLname` varchar(30) NOT NULL,
  `adminEmail` varchar(30) NOT NULL,
  `adminPassword` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`sysId`, `createdDate`, `createdUserId`, `modifiedDate`, `modifiedUserId`, `sysStatus`, `adminFname`, `adminLname`, `adminEmail`, `adminPassword`) VALUES
(1, NULL, NULL, NULL, NULL, 'A', 'sagar', 'chhatbar', 'sagar@gmail.com', 'Sagar123');

-- --------------------------------------------------------

--
-- Table structure for table `tblchapter`
--

CREATE TABLE `tblchapter` (
  `sysId` int(11) NOT NULL,
  `createdDate` date DEFAULT NULL,
  `createdUserId` int(11) DEFAULT NULL,
  `modifiedDate` date DEFAULT NULL,
  `modifiedUserId` int(11) DEFAULT NULL,
  `sysStatus` varchar(1) NOT NULL DEFAULT 'A',
  `chapterNumber` int(11) NOT NULL,
  `chapterName` varchar(100) NOT NULL,
  `degreeCode` varchar(11) NOT NULL,
  `subjectCode` varchar(11) NOT NULL,
  `sem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblchapter`
--

INSERT INTO `tblchapter` (`sysId`, `createdDate`, `createdUserId`, `modifiedDate`, `modifiedUserId`, `sysStatus`, `chapterNumber`, `chapterName`, `degreeCode`, `subjectCode`, `sem`) VALUES
(1, '2021-03-24', NULL, NULL, NULL, 'A', 1, 'Introduction to the Kernel', '07', 'CE347', 6),
(2, '2021-03-24', NULL, NULL, NULL, 'A', 2, 'Kernel Memory Allocation', '07', 'CE347', 6),
(3, '2021-03-24', NULL, NULL, NULL, 'A', 3, 'Internal Representation of Files', '07', 'CE347', 6),
(4, '2021-03-24', NULL, NULL, NULL, 'A', 4, 'The Structure of Processes', '07', 'CE347', 6),
(5, '2021-03-24', NULL, NULL, NULL, 'A', 5, 'Process Control', '07', 'CE347', 6),
(6, '2021-03-24', NULL, NULL, NULL, 'A', 6, 'Memory Management Policies', '07', 'CE347', 6),
(7, '2021-03-24', NULL, NULL, NULL, 'A', 7, 'Interprocess Communication', '07', 'CE347', 6),
(8, '2021-03-24', NULL, NULL, NULL, 'A', 8, 'Distributed File Systems', '07', 'CE347', 6),
(9, '2021-03-24', NULL, NULL, NULL, 'A', 9, 'Introduction to System Administration', '07', 'CE347', 6),
(10, '2021-03-24', NULL, NULL, NULL, 'A', 10, 'Case Study: RTOS, Network Operating System', '07', 'CE347', 6),
(11, '2021-04-06', NULL, NULL, NULL, 'D', 11, 'Test chapter11', '07', 'CE347', 6),
(12, '2021-04-07', NULL, NULL, NULL, 'D', 12, 'test chapter 2', '07', 'CE347', 6),
(13, '2021-04-07', NULL, NULL, NULL, 'D', 13, 'test chapter 3', '07', 'CE347', 6),
(14, '2021-04-07', NULL, NULL, NULL, 'D', 14, 'test chapter 14', '07', 'CE347', 6),
(15, '2021-04-07', NULL, NULL, NULL, 'D', 15, 'test chapter 15', '07', 'CE347', 6),
(16, '2021-04-07', NULL, NULL, NULL, 'D', 16, 'test chapter 16', '07', 'CE347', 6),
(17, '2021-04-07', NULL, NULL, NULL, 'D', 17, 'test chapter 17', '07', 'CE347', 6),
(19, '2021-04-08', NULL, NULL, NULL, 'D', 18, 'test chapter 18', '07', 'CE347', 6),
(20, '2021-04-08', NULL, NULL, NULL, 'A', 11, 'test chapter 11 sorted', '07', 'CE347', 6),
(21, '2021-04-08', NULL, NULL, NULL, 'D', 12, 'test chapter 12 sorted', '07', 'CE347', 6),
(22, '2021-04-15', NULL, NULL, NULL, 'D', 15, 'test data', '07', 'CE347', 6),
(23, '2021-04-15', NULL, NULL, NULL, 'A', 1, 'Introduction to Software and Software Engineering', '07', 'CE343', 5),
(24, '2021-04-15', NULL, NULL, NULL, 'A', 2, 'Agile Development', '07', 'CE343', 5),
(25, '2021-04-15', NULL, NULL, NULL, 'A', 3, 'Managing Software Project', '07', 'CE343', 5),
(26, '2021-04-15', NULL, NULL, NULL, 'A', 4, 'Requirement Analysis and Specification', '07', 'CE343', 5),
(27, '2021-04-15', NULL, NULL, NULL, 'A', 5, 'Software Design', '07', 'CE343', 5),
(28, '2021-04-25', NULL, NULL, NULL, 'A', 6, 'Software Coding &Testing', '07', 'CE343', 5),
(29, '2021-04-25', NULL, NULL, NULL, 'A', 7, 'Quality Assurance and Management', '07', 'CE343', 5),
(30, '2021-04-25', NULL, NULL, NULL, 'A', 8, 'Software Maintenance and  Configuration Management', '07', 'CE343', 5),
(31, '2021-04-25', NULL, NULL, NULL, 'A', 9, 'Introduction to SaaS', '07', 'CE343', 5),
(32, '2021-04-25', NULL, NULL, NULL, 'A', 10, 'Advanced Topics in Software Engineering', '07', 'CE343', 5),
(33, '2021-04-26', NULL, NULL, NULL, 'A', 12, 'Chap 12', '07', 'CE347', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbldegree`
--

CREATE TABLE `tbldegree` (
  `sysId` int(11) NOT NULL,
  `createdDate` date DEFAULT NULL,
  `createdUserId` int(11) DEFAULT NULL,
  `modifiedDate` date DEFAULT NULL,
  `modifiedUserId` int(11) DEFAULT NULL,
  `sysStatus` varchar(1) NOT NULL DEFAULT 'A',
  `degreeCode` varchar(11) NOT NULL,
  `degreeName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldegree`
--

INSERT INTO `tbldegree` (`sysId`, `createdDate`, `createdUserId`, `modifiedDate`, `modifiedUserId`, `sysStatus`, `degreeCode`, `degreeName`) VALUES
(1, '2021-03-24', NULL, NULL, NULL, 'A', '07', 'Computer Engineering'),
(2, '2021-03-24', NULL, NULL, NULL, 'A', '06', 'Information Technology'),
(3, '2021-03-24', NULL, NULL, NULL, 'A', '05', 'Mechanical Engineering'),
(4, '2021-03-24', NULL, NULL, NULL, 'D', '01', 'Automobile Engineering'),
(5, '2021-04-02', NULL, NULL, NULL, 'A', '02', 'Electrical Engineering ');

-- --------------------------------------------------------

--
-- Table structure for table `tblfaculty`
--

CREATE TABLE `tblfaculty` (
  `sysId` int(11) NOT NULL,
  `createdDate` date DEFAULT NULL,
  `createdUserId` int(11) DEFAULT NULL,
  `modifiedDate` date DEFAULT NULL,
  `modifiedUserId` int(11) DEFAULT NULL,
  `sysStatus` varchar(1) NOT NULL DEFAULT 'A',
  `facultyFname` varchar(30) NOT NULL,
  `facultyLname` varchar(30) NOT NULL,
  `facultyMob` varchar(15) NOT NULL,
  `facultyGender` varchar(10) NOT NULL,
  `facultyEmail` varchar(30) NOT NULL,
  `facultyPssword` varchar(50) NOT NULL,
  `facultyValid` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblfaculty`
--

INSERT INTO `tblfaculty` (`sysId`, `createdDate`, `createdUserId`, `modifiedDate`, `modifiedUserId`, `sysStatus`, `facultyFname`, `facultyLname`, `facultyMob`, `facultyGender`, `facultyEmail`, `facultyPssword`, `facultyValid`) VALUES
(15, '2021-04-10', NULL, NULL, NULL, 'A', 'sagar', 'chhatbar', '8460936501', 'male', 'sagar@gmail.com', 'ae6a3e6fc65a3e55b73cb19f4964a8c9', ''),
(23, '2021-04-20', NULL, NULL, NULL, 'A', 'sagar', 'chhatbar', '8765432345', 'male', 'sagar12345@gmail.com', '825f9e987933c2e093590348c615aa61', ''),
(24, '2021-04-25', NULL, NULL, NULL, 'A', 'hemil', 'eajpura', '9876543212', 'male', 'hem@gmail.com', 'ae6a3e6fc65a3e55b73cb19f4964a8c9', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblpaperstyle`
--

CREATE TABLE `tblpaperstyle` (
  `sysId` int(11) NOT NULL,
  `sysStatus` varchar(11) NOT NULL DEFAULT 'A',
  `subjectCode` varchar(11) NOT NULL,
  `1a` int(11) NOT NULL,
  `1b` int(11) NOT NULL,
  `1c` int(11) NOT NULL,
  `2a` int(11) NOT NULL,
  `2b` int(11) NOT NULL,
  `2c` int(11) NOT NULL,
  `2d` int(11) NOT NULL,
  `3a` int(11) NOT NULL,
  `3b` int(11) NOT NULL,
  `3c` int(11) NOT NULL,
  `4a` int(11) NOT NULL,
  `4b` int(11) NOT NULL,
  `4c` int(11) NOT NULL,
  `5a` int(11) NOT NULL,
  `5b` int(11) NOT NULL,
  `5c` int(11) NOT NULL,
  `5d` int(11) NOT NULL,
  `6a` int(11) NOT NULL,
  `6b` int(11) NOT NULL,
  `6c` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpaperstyle`
--

INSERT INTO `tblpaperstyle` (`sysId`, `sysStatus`, `subjectCode`, `1a`, `1b`, `1c`, `2a`, `2b`, `2c`, `2d`, `3a`, `3b`, `3c`, `4a`, `4b`, `4c`, `5a`, `5b`, `5c`, `5d`, `6a`, `6b`, `6c`) VALUES
(1, 'A', 'CE343', 1, 2, 4, 1, 2, 3, 4, 3, 5, 5, 9, 10, 9, 6, 7, 8, 10, 6, 7, 8),
(2, 'A', 'CE347', 1, 2, 4, 1, 2, 3, 4, 3, 5, 5, 9, 10, 9, 6, 7, 8, 10, 6, 7, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tblpoints`
--

CREATE TABLE `tblpoints` (
  `sysId` int(11) NOT NULL,
  `createdDate` date NOT NULL,
  `sysStatus` varchar(1) NOT NULL,
  `questionNumber` int(11) NOT NULL,
  `pointDesc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblquestion`
--

CREATE TABLE `tblquestion` (
  `sysId` int(11) NOT NULL,
  `createdDate` date DEFAULT NULL,
  `createdUserId` int(11) DEFAULT NULL,
  `modifiedDate` date DEFAULT NULL,
  `modifiedUserId` int(11) DEFAULT NULL,
  `sysStatus` varchar(1) NOT NULL DEFAULT 'A',
  `degreeCode` varchar(11) NOT NULL,
  `subjectCode` varchar(11) NOT NULL,
  `chapterNumber` int(11) NOT NULL,
  `questionNumber` int(11) DEFAULT NULL,
  `questionMarks` int(10) NOT NULL,
  `questionDesc` varchar(1000) NOT NULL,
  `questionImage` blob DEFAULT NULL,
  `sem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblquestion`
--

INSERT INTO `tblquestion` (`sysId`, `createdDate`, `createdUserId`, `modifiedDate`, `modifiedUserId`, `sysStatus`, `degreeCode`, `subjectCode`, `chapterNumber`, `questionNumber`, `questionMarks`, `questionDesc`, `questionImage`, `sem`) VALUES
(32, '2021-04-22', NULL, NULL, NULL, 'A', '07', 'CE343', 1, NULL, 1, 'Which one of the following is not an Evolutionary Process Model? \r\na) WINWIN Spiral Model \r\nb) Incremental Model \r\nc) Concurrent Development Model \r\nd) Spiral Model \r\ne) All are Evolutionary Software Models', NULL, 5),
(33, '2021-04-22', NULL, NULL, NULL, 'A', '07', 'CE343', 1, NULL, 1, 'Which one of the following is not an Evolutionary Process Model? \r\na) WINWIN Spiral Model \r\nb) Incremental Model \r\nc) Concurrent Development Model \r\nd) Spiral Model \r\ne) All are Evolutionary Software Models', NULL, 5),
(34, '2021-04-22', NULL, NULL, NULL, 'A', '07', 'CE343', 1, NULL, 1, 'Which one of the following is not an Evolutionary Process Model? \r\na) WINWIN Spiral Model \r\nb) Incremental Model \r\nc) Concurrent Development Model \r\nd) Spiral Model \r\ne) All are Evolutionary Software Models', NULL, 5),
(35, '2021-04-22', NULL, NULL, NULL, 'A', '07', 'CE343', 1, NULL, 1, 'How is Incremental Model different from Spiral Model? \r\na) Progress can be measured for Incremental Model. \r\nb) Changing requirements can be accommodated in Incremental Model. \r\nc) Users can see the system early in Incremental Model.\r\n', NULL, 5),
(36, '2021-04-22', NULL, NULL, NULL, 'A', '07', 'CE343', 1, NULL, 5, 'Give scenario base explanation of Spiral model and explain its architecture with\r\nadvantages and disadvantages.', NULL, 5),
(37, '2021-04-22', NULL, NULL, NULL, 'A', '07', 'CE343', 1, NULL, 5, 'Why software engineering is a layered Technology?', NULL, 5),
(38, '2021-04-22', NULL, NULL, NULL, 'A', '07', 'CE343', 1, NULL, 5, 'Define different types of software Myths.', NULL, 5),
(39, '2021-04-22', NULL, NULL, NULL, 'A', '07', 'CE343', 1, NULL, 7, 'In what situations will you use waterfall model? Justify your answer. Name the risk-based software development process model? What are its advantages and disadvantages?', NULL, 5),
(40, '2021-04-22', NULL, NULL, NULL, 'A', '07', 'CE343', 1, NULL, 5, 'What do you mean by software process models? Why we need it? Distinguish between software product and software process. Name four process models that are used to develop large software systems.', NULL, 5),
(41, '2021-04-22', NULL, NULL, NULL, 'A', '07', 'CE343', 1, NULL, 2, 'Why does the waterfall model sometimes fail?', NULL, 5),
(42, '2021-04-22', NULL, NULL, NULL, 'A', '07', 'CE343', 1, NULL, 7, 'What are the major phases of the entire life of the software? specify the percentage of efforts required on each phase. Which phase requires the maximum efforts? Which phase is/are more creative?', NULL, 5),
(43, '2021-04-22', NULL, NULL, NULL, 'A', '07', 'CE343', 1, NULL, 2, 'If formal methods can demonstrate software correctness, why is it they are not widely used?', NULL, 5),
(44, '2021-04-22', NULL, NULL, NULL, 'A', '07', 'CE343', 1, NULL, 7, 'Compare the relative advantage of using the iterative waterfall model and the spiral model of software development. Explain with the help of examples, the type of problems for which you would adopt the waterfall model of software development, and the type of problems for which you would adapt the spiral model.', NULL, 5),
(45, '2021-04-22', NULL, NULL, NULL, 'A', '07', 'CE343', 1, NULL, 3, 'What do you mean by software lifecycle model(s)? is it compulsory to follow it while \r\ndeveloping a project? Explain in brief.', NULL, 5),
(46, '2021-04-22', NULL, NULL, NULL, 'A', '07', 'CE343', 1, NULL, 2, 'What formal techniques are available for assessing the software process?', NULL, 5),
(47, '2021-04-22', NULL, NULL, NULL, 'A', '07', 'CE343', 1, NULL, 5, 'Define software and software engineering. What are the characteristics of software?', NULL, 5),
(48, '2021-04-22', NULL, NULL, NULL, 'A', '07', 'CE343', 1, NULL, 5, 'Show how the failure curve of software differs from that of hardware. Software doesnâ€™t wear out but it deteriorates due to change. Justify. How do software myths affect a software project?', NULL, 5),
(49, '2021-04-22', NULL, NULL, NULL, 'A', '07', 'CE343', 1, NULL, 2, 'If you are a lead developer of a software company and you are asked to submit a project/product within a stipulated time-frame with no cost barriers, which model will you select?\r\na) Waterfall\r\nb) Incremental\r\nc) Spiral\r\nd) RAD', NULL, 5),
(50, '2021-04-22', NULL, NULL, NULL, 'A', '07', 'CE343', 1, NULL, 2, 'Explain which process model is most suitable for the following definition and justify it:\r\na) A compiler for new language\r\nb) Event management system\r\nc) Chess', NULL, 5),
(51, '2021-04-22', NULL, NULL, NULL, 'A', '07', 'CE343', 1, NULL, 5, 'Draw neat sketch of spiral model and justify why it is considered as meta model.', NULL, 5),
(52, '2021-04-22', NULL, NULL, NULL, 'A', '07', 'CE343', 1, NULL, 2, 'Differentiate throw-away v/s evolutionary model.', NULL, 5),
(53, '2021-04-22', NULL, NULL, NULL, 'A', '07', 'CE343', 1, NULL, 4, 'Explain with a neat sketch â€œA software process frameworkâ€.', NULL, 5),
(54, '2021-04-22', NULL, NULL, NULL, 'A', '07', 'CE343', 1, NULL, 5, 'How does a framework activity change as the nature of the project changes?', NULL, 5),
(55, '2021-04-22', NULL, NULL, NULL, 'A', '07', 'CE343', 1, NULL, 2, 'What is a process pattern?', NULL, 5),
(56, '2021-04-22', NULL, NULL, NULL, 'A', '07', 'CE343', 2, NULL, 3, 'Define Agile Software Engineering. Who does it and what are steps involved in it?', NULL, 5),
(57, '2021-04-22', NULL, NULL, NULL, 'A', '07', 'CE343', 2, NULL, 5, 'Define the roles in Scrum? Explain Agile software development process in detail. Differentiate between Scrum and Sprint. ', NULL, 5),
(58, '2021-04-22', NULL, NULL, NULL, 'A', '07', 'CE343', 2, NULL, 7, 'With a neat sketch, describe agility and the cost of change. ', NULL, 5),
(59, '2021-04-22', NULL, NULL, NULL, 'A', '07', 'CE343', 2, NULL, 5, 'What are the key assumptions that are addressed for any agile software process?', NULL, 5),
(60, '2021-04-22', NULL, NULL, NULL, 'A', '07', 'CE343', 2, NULL, 3, 'To achieve agility, a set of agility principles needs to be followed. If yes, mention the\r\nagility principles. If no, justify the answer.', NULL, 5),
(61, '2021-04-22', NULL, NULL, NULL, 'A', '07', 'CE343', 2, NULL, 7, 'If members of the software team are to drive the characteristics of the process that is applied to build software, mention the key traits that must exist among the people on an agile team and the team itself.', NULL, 5),
(62, '2021-04-22', NULL, NULL, NULL, 'A', '07', 'CE343', 2, NULL, 5, 'With a neat sketch, explain the extreme programming process.', NULL, 5),
(63, '2021-04-22', NULL, NULL, NULL, 'A', '07', 'CE343', 2, NULL, 7, 'Define the following terms:\r\na) Pair-programming\r\nb) Refactoring\r\nc) Industrial XP\r\nd) Toolset for agile process\r\ne) Agile Team\r\nf) XP story', NULL, 5),
(64, '2021-04-22', NULL, NULL, NULL, 'A', '07', 'CE343', 2, NULL, 5, 'Enlist the other Agile Process models and explain any two in detail.', NULL, 5),
(65, '2021-04-22', NULL, NULL, NULL, 'A', '07', 'CE343', 3, NULL, 5, 'Explain risk management process with suitable diagram in brief. List types of risk \r\nwith example.', NULL, 5),
(66, '2021-04-22', NULL, NULL, NULL, 'A', '07', 'CE343', 3, NULL, 2, 'What is management spectrum? Describe the four Pâ€™s briefly.', NULL, 5),
(67, '2021-04-22', NULL, NULL, NULL, 'A', '07', 'CE343', 3, NULL, 3, 'Define the following terms:\r\na. Milestone\r\nb. Fan-in\r\nc. Fan-out', NULL, 5),
(68, '2021-04-22', NULL, NULL, NULL, 'A', '07', 'CE343', 3, NULL, 2, 'What is verification and Validation? How they are different from each other?', NULL, 5),
(69, '2021-04-22', NULL, NULL, NULL, 'A', '07', 'CE343', 3, NULL, 2, 'Explain Boehmâ€™s W5HH Principle.', NULL, 5),
(70, '2021-04-22', NULL, NULL, NULL, 'A', '07', 'CE343', 3, NULL, 2, 'What are the activities of risk assessment?', NULL, 5),
(71, NULL, NULL, NULL, NULL, 'A', '07', 'CE343', 9, NULL, 2, 'Image Test', 0x66696c65, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tblsem`
--

CREATE TABLE `tblsem` (
  `sysId` int(2) NOT NULL,
  `semNum` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsem`
--

INSERT INTO `tblsem` (`sysId`, `semNum`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE `tblstudent` (
  `sysId` int(11) NOT NULL,
  `createdDate` date NOT NULL,
  `stsStatus` varchar(1) NOT NULL DEFAULT 'A',
  `studentFname` varchar(30) NOT NULL,
  `studentLname` varchar(30) NOT NULL,
  `studentEmail` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`sysId`, `createdDate`, `stsStatus`, `studentFname`, `studentLname`, `studentEmail`) VALUES
(1, '2021-04-23', 'A', 'sagar', 'chhatbar', 'sagar.chhatbar25@gmail.com'),
(2, '2021-04-23', 'A', 'd19ce157', 'SAGAR CHHATBAR', 'd19ce157@charusat.edu.in'),
(4, '2021-04-23', 'A', 'sagar', 'chhatbar', 'sagar.chhatbar57@gmail.com'),
(9, '2021-04-23', 'A', 'LensArt', 'Studio', 'lensartstudio1@gmail.com'),
(12, '2021-04-24', 'A', 'Dynamic Paper', 'Generator', 'dynamicpapergenerator@gmail.co');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubject`
--

CREATE TABLE `tblsubject` (
  `sysID` int(11) NOT NULL,
  `createdDate` date DEFAULT NULL,
  `createdUserId` int(11) DEFAULT NULL,
  `modifiedDate` date DEFAULT NULL,
  `modifiedUserId` int(11) DEFAULT NULL,
  `sysStatus` varchar(1) NOT NULL DEFAULT 'A',
  `subjectCode` varchar(11) NOT NULL,
  `subjectName` varchar(100) NOT NULL,
  `degreeCode` varchar(11) NOT NULL,
  `sem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubject`
--

INSERT INTO `tblsubject` (`sysID`, `createdDate`, `createdUserId`, `modifiedDate`, `modifiedUserId`, `sysStatus`, `subjectCode`, `subjectName`, `degreeCode`, `sem`) VALUES
(1, '2021-03-24', NULL, NULL, NULL, 'A', 'CE347', 'Internal of Operating System (IOS)', '07', 6),
(2, '2021-03-24', NULL, NULL, NULL, 'A', 'CE350', 'Data Warehouse and Data Mining (DWDM)', '07', 6),
(3, '2021-03-24', NULL, NULL, NULL, 'A', 'CE349', 'Theory of Computation (TOC)', '07', 6),
(4, '2021-03-24', NULL, NULL, NULL, 'A', 'CE348', 'Information Security (INS)', '07', 6),
(5, '2021-03-24', NULL, NULL, NULL, 'A', 'CE376', 'Programming in Python (PIP)', '07', 6),
(6, '2021-04-09', NULL, NULL, NULL, 'A', 'CE111', 'Test sunject1', '07', 6),
(7, '2021-04-09', NULL, NULL, NULL, 'D', 'CE111', 'Test sunject1', '07', 6),
(8, '2021-04-09', NULL, NULL, NULL, 'D', 'CE111', 'Test sunject1', '07', 6),
(9, '2021-04-15', NULL, NULL, NULL, 'A', 'CE343', 'SOFTWARE ENGINEERING', '07', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`sysId`),
  ADD UNIQUE KEY `adminEmail` (`adminEmail`);

--
-- Indexes for table `tblchapter`
--
ALTER TABLE `tblchapter`
  ADD PRIMARY KEY (`sysId`);

--
-- Indexes for table `tbldegree`
--
ALTER TABLE `tbldegree`
  ADD PRIMARY KEY (`sysId`),
  ADD UNIQUE KEY `degreeCode` (`degreeCode`);

--
-- Indexes for table `tblfaculty`
--
ALTER TABLE `tblfaculty`
  ADD PRIMARY KEY (`sysId`),
  ADD UNIQUE KEY `facultyEmail` (`facultyEmail`);

--
-- Indexes for table `tblpaperstyle`
--
ALTER TABLE `tblpaperstyle`
  ADD PRIMARY KEY (`sysId`);

--
-- Indexes for table `tblpoints`
--
ALTER TABLE `tblpoints`
  ADD PRIMARY KEY (`sysId`);

--
-- Indexes for table `tblquestion`
--
ALTER TABLE `tblquestion`
  ADD PRIMARY KEY (`sysId`);

--
-- Indexes for table `tblsem`
--
ALTER TABLE `tblsem`
  ADD PRIMARY KEY (`sysId`),
  ADD UNIQUE KEY `semNum` (`semNum`);

--
-- Indexes for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD PRIMARY KEY (`sysId`),
  ADD UNIQUE KEY `studentEmail` (`studentEmail`);

--
-- Indexes for table `tblsubject`
--
ALTER TABLE `tblsubject`
  ADD PRIMARY KEY (`sysID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `sysId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblchapter`
--
ALTER TABLE `tblchapter`
  MODIFY `sysId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbldegree`
--
ALTER TABLE `tbldegree`
  MODIFY `sysId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblfaculty`
--
ALTER TABLE `tblfaculty`
  MODIFY `sysId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tblpaperstyle`
--
ALTER TABLE `tblpaperstyle`
  MODIFY `sysId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpoints`
--
ALTER TABLE `tblpoints`
  MODIFY `sysId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblquestion`
--
ALTER TABLE `tblquestion`
  MODIFY `sysId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `tblsem`
--
ALTER TABLE `tblsem`
  MODIFY `sysId` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblstudent`
--
ALTER TABLE `tblstudent`
  MODIFY `sysId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblsubject`
--
ALTER TABLE `tblsubject`
  MODIFY `sysID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
