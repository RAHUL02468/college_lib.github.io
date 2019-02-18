-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2019 at 03:06 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_db1`
--

-- --------------------------------------------------------

--
-- Table structure for table `data1`
--

CREATE TABLE `data1` (
  `book_id` int(32) NOT NULL,
  `book_name` varchar(64) NOT NULL,
  `del_flg` int(11) NOT NULL DEFAULT '0',
  `book_author` varchar(32) NOT NULL,
  `return_date` varchar(32) NOT NULL DEFAULT '-----------',
  `libdel_flg` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data1`
--

INSERT INTO `data1` (`book_id`, `book_name`, `del_flg`, `book_author`, `return_date`, `libdel_flg`) VALUES
(5, ' Da Vinci Code', 0, ' Brown', '-----------', 0),
(6, 'Angels and Demons', 0, 'Dan Brown', '-----------', 0),
(7, 'The Subtle Art Of Not Giving A F*ck', 0, 'Mark Manson', '-----------', 0),
(8, 'Harry Potter-The prisoner of Azkaban', 0, 'JK Rowling', '-----------', 0),
(9, 'Organizer', 0, 'MAKAUT', '-----------', 0),
(10, 'Code Complete', 0, ' Steve McConnell ', '-----------', 0),
(11, 'JavaScript: The Good Parts ', 0, ' Douglas Crockford', '-----------', 0),
(12, 'Introduction to Algorithms', 0, ' Thomas H. Cormen', '-----------', 0),
(13, 'Effective Java Programming Language Guide', 0, ' Joshua Bloch', '-----------', 0),
(14, 'The Algorithm Design Manual', 0, ' Steven S. Skiena ', '-----------', 0),
(32, 'ds', 0, 'ds', '-----------', 0),
(33, 'dsa', 0, 'dsa', '-----------', 0);

-- --------------------------------------------------------

--
-- Table structure for table `data2`
--

CREATE TABLE `data2` (
  `semister` int(2) NOT NULL,
  `del_flg` int(2) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `book_id` int(2) NOT NULL,
  `user_name` varchar(32) NOT NULL,
  `issue_date` date NOT NULL,
  `return_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data2`
--

INSERT INTO `data2` (`semister`, `del_flg`, `subject_id`, `book_id`, `user_name`, `issue_date`, `return_date`) VALUES
(4, 1, 1, 7, 'bishal2', '2019-01-05', '2019-02-05'),
(4, 1, 2, 7, 'bishal2', '2019-01-09', '2019-02-09'),
(6, 1, 3, 32, 'bishal2', '2019-01-09', '2019-02-09');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `user_id` int(2) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `pwd` varchar(20) DEFAULT NULL,
  `name` varchar(32) NOT NULL,
  `stream` varchar(3) NOT NULL,
  `librarian` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`user_id`, `username`, `pwd`, `name`, `stream`, `librarian`) VALUES
(22, 'rahul', '12345', 'Rahul Gupta', 'cse', 1),
(23, 'bishal2', '123456', 'bishal sarkar', 'cse', 0),
(25, 'mayankshah', '123456789', 'mayank shah', 'com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data1`
--
ALTER TABLE `data1`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `data2`
--
ALTER TABLE `data2`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data1`
--
ALTER TABLE `data1`
  MODIFY `book_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `data2`
--
ALTER TABLE `data2`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `user_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
