-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 18, 2024 at 09:40 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `course_registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `Enrollment`
--

CREATE TABLE `Enrollment` (
  `enrollid` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Grade` varchar(2) DEFAULT NULL,
  `CourseID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Enrollment`
--

INSERT INTO `Enrollment` (`enrollid`, `UserID`, `Grade`, `CourseID`) VALUES
(10, 1003, 'B', 'IS 4485'),
(11, 1002, 'A', 'IS 4485'),
(12, 1002, 'C', 'IS 4470'),
(13, 1004, 'C+', 'IS 4460'),
(14, 1004, 'B-', 'IS 4430'),
(15, 1001, 'A', 'IS 4410'),
(16, 1001, 'A', 'IS 4420'),
(17, 1001, NULL, 'IS 4430');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Enrollment`
--
ALTER TABLE `Enrollment`
  ADD PRIMARY KEY (`enrollid`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `fk_courseid` (`CourseID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Enrollment`
--
ALTER TABLE `Enrollment`
  MODIFY `enrollid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Enrollment`
--
ALTER TABLE `Enrollment`
  ADD CONSTRAINT `fk_courseid` FOREIGN KEY (`CourseID`) REFERENCES `Course` (`CourseID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
