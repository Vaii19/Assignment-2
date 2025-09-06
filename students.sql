-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2025 at 10:22 AM
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
-- Database: `student_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `department` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `mobile`, `email`, `gender`, `department`, `address`) VALUES
(14, 'Cung Mang', '09795362175', 'thacungmang19@gmail.com', 'Male', '', 'Sangte street\r\nMyo houng'),
(15, 'Za Iang kkkk', '09795362175', 'thacungmang19@gmail.com', 'Male', 'Computer', 'Myo Haung street'),
(16, 'Cung Mang', '09795362175', 'thacungmang19@gmail.com', 'Male', '', 'Sangte street\r\nMyo houng'),
(17, 'Cung Mang', '09795362175', 'thacungmang19@gmail.com', 'Male', '', 'Sangte street\r\nMyo houng'),
(18, 'Cung Mang', '09795362175', 'thacungmang19@gmail.com', 'Male', 'English', 'Sangte street\r\nMyo houng'),
(19, 'Cung Mang hhhhh', '09795362175', 'thacungmang19@gmail.com', 'Female', 'English,Computer', 'Sangte street\r\nMyo houng'),
(20, 'Cung Mang', '09795362175', 'thacungmang19@gmail.com', 'Male', 'English', 'Sangte street\r\nMyo houng'),
(21, 'Cung Mang', '09795362175', 'thacungmang19@gmail.com', 'Female', '', 'Sangte street\r\nMyo houng'),
(22, 'Cung Mang', '09795362175', 'thacungmang19@gmail.com', 'Male', '', 'Sangte street\r\nMyo houng'),
(23, 'Za Iang', '09795362175', 'thacungmang19@gmail.com', 'Male', 'English', 'Myo Haung street'),
(24, 'Hniang Bawi Lain', '3176725821', 'Hniangbawilain@gmail.com', 'Male', 'English', '2017 Fox Hill Dr # 4\r\n2017 Fox Hill Dr # 4'),
(25, 'Za Iang', '3176725821', 'Hniangbawilain@gmail.com', 'Male', '', 'Myo Haung street'),
(26, 'Cung Mang', '3176725821', 'thacungmang19@gmail.com', 'Female', 'English', 'Sangte street\r\nMyo houng'),
(27, 'Cung Mang', '3176725821', 'thacungmang19@gmail.com', 'Female', 'English', 'Sangte street\r\nMyo houng');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
