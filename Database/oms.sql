-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2021 at 01:39 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.1.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_master`
--

CREATE TABLE `admin_master` (
  `admin_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL DEFAULT '1',
  `admin_name` varchar(20) NOT NULL,
  `admin_gender` varchar(6) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_pass` varchar(40) NOT NULL,
  `admin_img` varchar(20) NOT NULL,
  `admin_phn` bigint(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_master`
--

INSERT INTO `admin_master` (`admin_id`, `b_id`, `u_id`, `admin_name`, `admin_gender`, `admin_email`, `admin_pass`, `admin_img`, `admin_phn`) VALUES
(1, 1, 1, 'MEET PATEL', 'male', 'patelmeetmiteshbhai@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'aimg/meet.jpg', 7486991231),
(2, 2, 1, 'MEET DONDA', 'male', 'meetdonda@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', 7486991235);

-- --------------------------------------------------------

--
-- Table structure for table `appointment_master`
--

CREATE TABLE `appointment_master` (
  `app_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `f_id` int(11) NOT NULL,
  `appiontment_details` varchar(100) NOT NULL,
  `app_status` tinyint(4) DEFAULT NULL,
  `msg` text NOT NULL,
  `app_date` date NOT NULL,
  `app_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment_master`
--

INSERT INTO `appointment_master` (`app_id`, `stu_id`, `u_id`, `b_id`, `f_id`, `appiontment_details`, `app_status`, `msg`, `app_date`, `app_time`) VALUES
(1, 14, 1, 1, 1, 'Appointment Appone...', 2, '', '2021-08-09', '12:00:00'),
(2, 14, 1, 1, 1, 'Tesing', 0, 'Busy in watching webseries', '0000-00-00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `branch_master`
--

CREATE TABLE `branch_master` (
  `b_id` int(11) NOT NULL,
  `b_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch_master`
--

INSERT INTO `branch_master` (`b_id`, `b_name`) VALUES
(1, 'INFORMATION TECHNOLOGY'),
(2, 'COMPUTER ENGINEERING'),
(3, 'MECHANICAL ENGINEERING'),
(4, 'CIVIL ENGINEERING');

-- --------------------------------------------------------

--
-- Table structure for table `discussion_forum_master`
--

CREATE TABLE `discussion_forum_master` (
  `diss_id` int(11) NOT NULL,
  `f_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `stu_sem` int(11) NOT NULL,
  `diss_title` text NOT NULL,
  `diss_query` text NOT NULL,
  `diss_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discussion_forum_master`
--

INSERT INTO `discussion_forum_master` (`diss_id`, `f_id`, `b_id`, `stu_sem`, `diss_title`, `diss_query`, `diss_date`) VALUES
(1, 1, 1, 3, 'Website', 'Why we use session', '2021-08-06 20:35:28');

-- --------------------------------------------------------

--
-- Table structure for table `discussion_master`
--

CREATE TABLE `discussion_master` (
  `dis_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `dis_msg` text NOT NULL,
  `diss_id` int(11) NOT NULL,
  `dis_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discussion_master`
--

INSERT INTO `discussion_master` (`dis_id`, `stu_id`, `dis_msg`, `diss_id`, `dis_date`) VALUES
(1, 14, 'to strore data', 1, '2021-08-06 20:36:31'),
(2, 0, 'no', 1, '2021-08-06 20:36:51');

-- --------------------------------------------------------

--
-- Table structure for table `document_master`
--

CREATE TABLE `document_master` (
  `d_id` int(11) NOT NULL,
  `f_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `document_file` varchar(100) NOT NULL,
  `info` text NOT NULL,
  `sem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document_master`
--

INSERT INTO `document_master` (`d_id`, `f_id`, `b_id`, `document_file`, `info`, `sem`) VALUES
(1, 1, 1, 'documents/GSERC 1-.pdf', 'File', 3);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `f_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_event` date NOT NULL,
  `start_event_time` time NOT NULL,
  `end_event_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_master`
--

CREATE TABLE `faculty_master` (
  `f_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL DEFAULT '2',
  `b_id` int(11) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `f_gender` varchar(6) NOT NULL,
  `f_phn` bigint(13) NOT NULL,
  `f_email` varchar(30) NOT NULL,
  `f_pass` varchar(40) NOT NULL,
  `f_img` varchar(20) NOT NULL,
  `staus` tinyint(1) NOT NULL DEFAULT '1',
  `is_active` tinyint(4) NOT NULL DEFAULT '0',
  `is_typing` tinyint(4) NOT NULL,
  `is_busy` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_master`
--

INSERT INTO `faculty_master` (`f_id`, `u_id`, `b_id`, `f_name`, `f_gender`, `f_phn`, `f_email`, `f_pass`, `f_img`, `staus`, `is_active`, `is_typing`, `is_busy`) VALUES
(1, 2, 1, 'MEET PATEL', 'male', 7486991231, 'patelmeetmiteshbhai@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', 1, 0, 0, 1),
(2, 2, 1, 'MEET DONDA', 'male', 7486991235, 'meetdonda@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', 1, 0, 0, 0),
(3, 2, 1, 'MANTHAN BUTANI', 'male', 7486991232, 'manthan@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', 1, 0, 0, 0),
(4, 2, 1, 'AMESHA RAINA', 'female', 7486991236, 'amesha@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', 1, 0, 0, 0),
(5, 2, 2, 'NEH JAIN', 'male', 7486991233, 'neh@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', 1, 0, 0, 0),
(6, 2, 2, 'NIDHI PATEL', 'male', 7486991237, 'nidhi@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', 1, 0, 0, 0),
(7, 2, 2, 'AKSHAY AHALPARA ', 'male', 7486991250, 'akshay@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mark_master`
--

CREATE TABLE `mark_master` (
  `mark_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `mark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news_master`
--

CREATE TABLE `news_master` (
  `news_id` int(11) NOT NULL,
  `from_u_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `news` text NOT NULL,
  `news_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `news_expire_date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_master`
--

INSERT INTO `news_master` (`news_id`, `from_u_id`, `from_id`, `u_id`, `b_id`, `news`, `news_time`, `news_expire_date`, `status`) VALUES
(1, 2, 1, 3, 1, 'Submission Of My Subject on date 28/2/2020', '2020-02-26 06:00:05', '2020-02-28', 0),
(2, 1, 1, 3, 1, 'Meet me in my cabin tomorrow on 10:00', '2020-02-26 06:02:38', '2020-02-28', 0),
(3, 1, 1, 2, 1, 'Meeting in cabin  tomorrow at 11:00 ', '2020-02-26 06:03:24', '2020-02-28', 0),
(4, 2, 1, 3, 1, 'Tomorrow Lecture Cancel ', '2021-08-04 09:53:03', '2021-08-05', 0),
(5, 2, 1, 3, 1, 'NEW', '2021-08-06 15:16:06', '2021-08-07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notification_master`
--

CREATE TABLE `notification_master` (
  `n_id` int(11) NOT NULL,
  `n_from` int(11) NOT NULL,
  `n_to` varchar(20) NOT NULL,
  `b_id` int(11) NOT NULL,
  `id` text NOT NULL,
  `notification` text NOT NULL,
  `n_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification_master`
--

INSERT INTO `notification_master` (`n_id`, `n_from`, `n_to`, `b_id`, `id`, `notification`, `n_time`, `status`) VALUES
(1, 3, 'Admin', 1, '1', 'New Appointment Added', '2021-08-07 08:45:27', 0),
(20, 3, 'Admin', 1, '1', 'New Appointment Added', '2021-08-09 08:29:36', 0),
(21, 1, 'Student', 1, '14', 'Appointment Rejected', '2021-08-09 09:05:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parent_master`
--

CREATE TABLE `parent_master` (
  `par_id` int(11) NOT NULL,
  `u_id` int(1) NOT NULL DEFAULT '4',
  `par_name` varchar(20) NOT NULL,
  `par_phn` int(10) NOT NULL,
  `par_email` varchar(20) NOT NULL,
  `par_pass` varchar(40) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parent_master`
--

INSERT INTO `parent_master` (`par_id`, `u_id`, `par_name`, `par_phn`, `par_email`, `par_pass`, `status`) VALUES
(1, 4, 'MUKESH', 123456789, 'aditya@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1),
(2, 4, 'ADITYA', 5488868, 'manthan@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1),
(3, 4, 'TIRTH', 2147483647, 'tirth@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1);

-- --------------------------------------------------------

--
-- Table structure for table `query_master`
--

CREATE TABLE `query_master` (
  `q_id` int(11) NOT NULL,
  `from_u_id` int(11) NOT NULL,
  `msg_from` int(11) NOT NULL,
  `to_u_id` int(11) NOT NULL,
  `msg_to` int(11) NOT NULL,
  `query` varchar(100) NOT NULL,
  `q_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_seen` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `query_master`
--

INSERT INTO `query_master` (`q_id`, `from_u_id`, `msg_from`, `to_u_id`, `msg_to`, `query`, `q_time`, `is_seen`) VALUES
(1, 3, 14, 2, 1, 'Hii', '2021-08-06 15:11:41', 1),
(2, 3, 14, 2, 1, 'hii', '2021-08-06 15:12:02', 1),
(3, 2, 1, 3, 14, 'Yes', '2021-08-06 15:12:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reply_master`
--

CREATE TABLE `reply_master` (
  `r_id` int(11) NOT NULL,
  `dis_id` int(11) NOT NULL,
  `reply` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sem_master`
--

CREATE TABLE `sem_master` (
  `sem_id` int(11) NOT NULL,
  `sem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sem_master`
--

INSERT INTO `sem_master` (`sem_id`, `sem`) VALUES
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
-- Table structure for table `student_master`
--

CREATE TABLE `student_master` (
  `stu_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL DEFAULT '3',
  `stu_name` varchar(20) NOT NULL,
  `stu_gender` varchar(6) NOT NULL,
  `stu_phn` bigint(13) NOT NULL,
  `stu_email` varchar(30) NOT NULL,
  `stu_pass` varchar(40) NOT NULL,
  `stu_sem` int(1) NOT NULL,
  `stu_enroll` text NOT NULL,
  `stu_img` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_active` tinyint(4) NOT NULL DEFAULT '0',
  `is_typing` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_master`
--

INSERT INTO `student_master` (`stu_id`, `b_id`, `u_id`, `stu_name`, `stu_gender`, `stu_phn`, `stu_email`, `stu_pass`, `stu_sem`, `stu_enroll`, `stu_img`, `status`, `is_active`, `is_typing`) VALUES
(1, 1, 3, 'KSHATRIYA AASTHA DIN', 'female', 446586, 'aastha@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3, '18BEIT30001', '', 1, 0, 0),
(5, 1, 3, 'PRAJAPATI ABHI NIKUL', 'male', 1234, 'abhi@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3, '18BEIT30002', '', 1, 0, 0),
(6, 1, 3, 'SRIVASTAVA ADITI PRA', 'male', 7486991232, 'aditi@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3, '18BEIT30003', '', 1, 0, 0),
(7, 1, 3, 'BRAHMBHATT ADITYA AP', 'male', 7486991233, 'aditya@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3, '18BEIT30004', '', 1, 0, 0),
(8, 1, 3, 'DONDA MEET LALLUBHAI', 'male', 7486991235, 'meetdonda@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3, '18BEIT30038', '', 1, 0, 0),
(9, 1, 3, 'BUTANI MANTHAN KAMLE', 'male', 7486991236, 'manthan@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3, '18BEIT30036', '', 1, 0, 0),
(10, 1, 3, 'JAIN NEH HITESH', 'male', 7486991237, 'neh@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3, '18BEIT30039', '', 1, 0, 0),
(11, 1, 3, 'AHALPARA AKSHAY ASHO', 'male', 7486991238, 'akshay@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3, '219SBEIT30001', '', 1, 0, 0),
(13, 1, 3, 'AMESHA RAINA', 'female', 7486991239, 'amesha@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3, '219SBEIT30002', '', 1, 0, 0),
(14, 1, 3, 'PATEL MEET MITESHBHA', 'male', 7486991231, 'patelmeetmiteshbhai@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3, '219SBEIT30005', '', 1, 0, 0),
(15, 2, 3, 'DANGAR AKASHKUMAR KA', 'male', 7486991240, 'akash@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3, '18BEIT30006', '', 1, 0, 0),
(16, 2, 3, 'CHAUDHARI AKSHATKUMA', 'male', 7486991241, 'akshat@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3, '18BEIT30007', '', 1, 0, 0),
(18, 2, 3, 'RAKHOLIYA AKSHIT SUR', 'female', 7486991242, 'akshit@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3, '18BEIT30008', '', 1, 0, 0),
(19, 2, 3, 'BALAKRISHNAN ANURAG', 'female', 7486991243, 'anurag@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3, '18BEIT30009', '', 1, 0, 0),
(20, 2, 3, 'PATEL KABIR SURESHBH', 'male', 7486991244, 'kabir@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3, '18BEIT30030', '', 1, 0, 0),
(21, 1, 3, 'ACHARYA ADITYA JAY', 'male', 7486991245, 'adityaacharya@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3, '18BEIT30005', '', 1, 0, 0),
(22, 1, 3, 'PATEL ARYAN NARESHKU', 'male', 7486991246, 'aryan@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3, '18BEIT30012', '', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subject_master`
--

CREATE TABLE `subject_master` (
  `sub_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `sub_sem` int(11) NOT NULL,
  `sub_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_master`
--

INSERT INTO `subject_master` (`sub_id`, `b_id`, `sub_sem`, `sub_name`) VALUES
(1, 1, 3, 'DSA'),
(2, 1, 3, 'DE'),
(3, 1, 3, 'DM'),
(4, 1, 3, 'DBMS'),
(5, 1, 3, 'ITW'),
(6, 1, 4, 'JAVA'),
(7, 1, 4, 'POM'),
(8, 1, 4, 'OS');

-- --------------------------------------------------------

--
-- Table structure for table `sub_allocation_master`
--

CREATE TABLE `sub_allocation_master` (
  `s_a_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_allocation_master`
--

INSERT INTO `sub_allocation_master` (`s_a_id`, `u_id`, `id`, `sub_id`, `b_id`) VALUES
(1, 2, 1, 1, 1),
(2, 2, 2, 2, 1),
(3, 2, 3, 3, 1),
(4, 2, 4, 4, 1),
(5, 2, 1, 5, 1),
(6, 2, 2, 7, 1),
(7, 2, 3, 8, 1),
(8, 2, 1, 6, 1),
(0, 2, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `time_table_master`
--

CREATE TABLE `time_table_master` (
  `t_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `lecture_no` int(1) NOT NULL,
  `day` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_type_master`
--

CREATE TABLE `user_type_master` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type_master`
--

INSERT INTO `user_type_master` (`u_id`, `u_name`) VALUES
(1, 'Admin'),
(2, 'Faculty'),
(3, 'Student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_master`
--
ALTER TABLE `admin_master`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `appointment_master`
--
ALTER TABLE `appointment_master`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `branch_master`
--
ALTER TABLE `branch_master`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `discussion_forum_master`
--
ALTER TABLE `discussion_forum_master`
  ADD PRIMARY KEY (`diss_id`);

--
-- Indexes for table `discussion_master`
--
ALTER TABLE `discussion_master`
  ADD PRIMARY KEY (`dis_id`);

--
-- Indexes for table `document_master`
--
ALTER TABLE `document_master`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty_master`
--
ALTER TABLE `faculty_master`
  ADD PRIMARY KEY (`f_id`),
  ADD UNIQUE KEY `f_phn` (`f_phn`),
  ADD UNIQUE KEY `f_email` (`f_email`);

--
-- Indexes for table `mark_master`
--
ALTER TABLE `mark_master`
  ADD PRIMARY KEY (`mark_id`);

--
-- Indexes for table `news_master`
--
ALTER TABLE `news_master`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `notification_master`
--
ALTER TABLE `notification_master`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `parent_master`
--
ALTER TABLE `parent_master`
  ADD PRIMARY KEY (`par_id`),
  ADD UNIQUE KEY `par_email` (`par_email`),
  ADD UNIQUE KEY `par_phn` (`par_phn`);

--
-- Indexes for table `query_master`
--
ALTER TABLE `query_master`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `student_master`
--
ALTER TABLE `student_master`
  ADD PRIMARY KEY (`stu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment_master`
--
ALTER TABLE `appointment_master`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `discussion_forum_master`
--
ALTER TABLE `discussion_forum_master`
  MODIFY `diss_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `discussion_master`
--
ALTER TABLE `discussion_master`
  MODIFY `dis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `document_master`
--
ALTER TABLE `document_master`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faculty_master`
--
ALTER TABLE `faculty_master`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `news_master`
--
ALTER TABLE `news_master`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notification_master`
--
ALTER TABLE `notification_master`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `parent_master`
--
ALTER TABLE `parent_master`
  MODIFY `par_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `query_master`
--
ALTER TABLE `query_master`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_master`
--
ALTER TABLE `student_master`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
