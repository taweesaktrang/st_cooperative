-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2018 at 04:51 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ciproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `book_isbn` int(11) NOT NULL,
  `book_title` varchar(50) NOT NULL,
  `book_author` varchar(50) NOT NULL,
  `book_category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_isbn`, `book_title`, `book_author`, `book_category`) VALUES
(3, 8934, 'Android Programming', 'Farrukh', 'Programming'),
(6, 8902, 'Intro to Psychology', 'Ayesha', 'Psychology'),
(7, 2345, 'Calculus-1', 'John doe', 'Math'),
(8, 8927, 'Chemistry Part-1', 'Aliza Mam', 'Chemistry'),
(9, 6723, 'Math Part-1', 'Sir Sohail Amanat', 'Math'),
(10, 7896, 'Javascript for begginners', 'Shami ', 'Programming'),
(11, 8978, 'iOS App ', 'Ehtesham Mehmood', 'Mobile Programming'),
(12, 8987, 'Physics', 'Sir Waqas', 'Physics'),
(13, 7890, 'HTML for dummies', 'Ehtesham Shami', 'Programming');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `member_id` varchar(13) NOT NULL,
  `member_name` varchar(50) NOT NULL,
  `member_dep` varchar(4) NOT NULL,
  `salary` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`member_id`, `member_name`, `member_dep`, `salary`) VALUES
('3920600658763', 'นายทวีศักดิ์ ศิลวิศาล', 'IT', '20000'),
('44444444444', 'aaa', 'ddd', 'qqq'),
('5555555555', 'kkk', 'aaa', 'kk'),
('8888888888', 'aa', 'asas', 'aa'),
('585555555555', 'aaaa', 'aaa', 'aa4'),
('9999999999', 'wwwww', 'qqqq', 'aaaaa'),
('555555555555', 'aaa', '', ''),
('33333333333', 'aasasasasas', '', ''),
('2222222332', '้้สสสสสสสส', 'ฟฟฟฟ', '500'),
('88888888888', 'aaaa', '5555', '55555'),
('99999999999', 'สสสสสสส', 'llll', '80000'),
('6666666666', 'aaaaa', 'sss', 'aaaa'),
('1111111111111', 'assasa', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_person`
--

CREATE TABLE `tbl_person` (
  `p_cardid` varchar(13) NOT NULL,
  `p_prefix` varchar(15) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_surname` varchar(50) NOT NULL,
  `p_birthdate` date NOT NULL,
  `p_blood` varchar(5) NOT NULL,
  `p_appointdate` date NOT NULL,
  `p_retiredate` date NOT NULL,
  `p_loginname` varchar(15) NOT NULL,
  `p_password` varchar(255) NOT NULL,
  `p_status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_person`
--

INSERT INTO `tbl_person` (`p_cardid`, `p_prefix`, `p_name`, `p_surname`, `p_birthdate`, `p_blood`, `p_appointdate`, `p_retiredate`, `p_loginname`, `p_password`, `p_status`) VALUES
('3920600658763', 'นาย', 'ทวีศักดิ์', 'ศิลวิศาล', '1975-06-14', 'ฺB', '2008-06-20', '2035-09-30', '3920600658763', '52dbdeaeff76219d5f472f6cf6e98e36', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `tbl_person`
--
ALTER TABLE `tbl_person`
  ADD PRIMARY KEY (`p_cardid`),
  ADD KEY `p_cardid` (`p_cardid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
