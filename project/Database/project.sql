-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2023 at 05:12 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `athlete`
--

CREATE TABLE `athlete` (
  `ath_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `dob` date NOT NULL,
  `caste` enum('General','OBC','SC','ST','SEBC') NOT NULL DEFAULT 'General',
  `religion` enum('Hindu','Budhhist','Sikh','Jain','Other') NOT NULL,
  `addr` text NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(320) NOT NULL,
  `ath_img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `athlete`
--

INSERT INTO `athlete` (`ath_id`, `name`, `gender`, `dob`, `caste`, `religion`, `addr`, `phone`, `email`, `ath_img`) VALUES
(1, 'Sachin Tendulkar', 'Male', '1973-04-24', 'OBC', 'Hindu', 'sachintendulkar@gmail.com', 'Near Borivall', '07253026595', '295898516-846984-833139-sachin-tendulkar.jpg'),
(3, 'Rohit Sharma', 'Male', '1982-06-15', 'General', 'Hindu', 'rohitsharma@gmail.com', 'Near Borivall', '07253026595', '9381088620.jpg'),
(6, 'hjn', 'Male', '2004-12-29', 'General', 'Hindu', 'hd@gh', 'Near Borivall', '07253026595', '75Model.png'),
(10, 'Lovely', 'Female', '2004-11-04', 'ST', 'Jain', 'wdsfvdvewcd', '+918709901694', 'WDscvrfdc@efc', '918'),
(20, 'Hari', 'Male', '2004-12-15', 'OBC', '', 'Near Borivalli, Mumbai', '07253026595', 'harishkumar@gmail.com', '201');

-- --------------------------------------------------------

--
-- Table structure for table `athlete_sport`
--

CREATE TABLE `athlete_sport` (
  `ath_sport_id` int(11) NOT NULL,
  `ath_id` int(11) NOT NULL,
  `sport_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `athlete_sport`
--

INSERT INTO `athlete_sport` (`ath_sport_id`, `ath_id`, `sport_id`) VALUES
(5, 1, 1),
(8, 10, 5),
(9, 10, 6),
(10, 10, 7),
(22, 20, 1),
(23, 20, 5),
(24, 20, 7);

-- --------------------------------------------------------

--
-- Table structure for table `athlete_team`
--

CREATE TABLE `athlete_team` (
  `ath_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coach`
--

CREATE TABLE `coach` (
  `coach_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `dob` date NOT NULL,
  `caste` enum('General','OBC','SC','ST','SEBC') NOT NULL DEFAULT 'General',
  `religion` enum('Hindu','Budhhist','Sikh','Jain','Other') NOT NULL,
  `addr` text NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(320) NOT NULL,
  `sport_id` int(11) NOT NULL,
  `coach_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `coach`
--

INSERT INTO `coach` (`coach_id`, `name`, `gender`, `dob`, `caste`, `religion`, `addr`, `phone`, `email`, `sport_id`, `coach_image`) VALUES
(1, 'Harish Kumar', 'Male', '1971-06-21', 'OBC', 'Hindu', 'Near Borivalli, Mumbai', '07253026595', 'harishkumar@gmail.com', 2, '3455-550111_nba-player-png.png'),
(3, 'Sohit Mehta', 'Male', '1971-01-21', 'General', '', 'ww,dmck', '279864', 'asjkn@hjhsj', 9, '414Coach-scaled.jpg'),
(4, 'Harpreet Singh', 'Female', '1974-08-21', 'General', 'Sikh', 'Near Borivalli, Mumbai', '07253026595', 'harpreet@gmail.com', 4, '438abstract-tennis-player-with-racket-from-splash-watercolors_291138-362.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `venue_id` int(11) NOT NULL,
  `sport_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_sponsor`
--

CREATE TABLE `event_sponsor` (
  `event_id` int(11) NOT NULL,
  `sponsor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sponsor`
--

CREATE TABLE `sponsor` (
  `sponsor_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sport`
--

CREATE TABLE `sport` (
  `sport_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sport`
--

INSERT INTO `sport` (`sport_id`, `name`) VALUES
(1, 'Cricket'),
(2, 'Basketball'),
(3, 'Football'),
(4, 'Badminton'),
(5, 'Long jump'),
(6, 'Sprint'),
(7, 'Discus throw'),
(8, 'Marathon'),
(9, 'Swimming');

-- --------------------------------------------------------

--
-- Table structure for table `sport_master`
--

CREATE TABLE `sport_master` (
  `sport_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sport_master`
--

INSERT INTO `sport_master` (`sport_id`, `name`) VALUES
(1, 'cricket'),
(2, 'basketball'),
(3, 'badminton'),
(4, 'football'),
(5, 'swimming'),
(6, 'field_and_track');

-- --------------------------------------------------------

--
-- Table structure for table `sport_sub`
--

CREATE TABLE `sport_sub` (
  `sport_sub_id` int(11) NOT NULL,
  `sport_name` varchar(100) NOT NULL,
  `sport_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sport_sub`
--

INSERT INTO `sport_sub` (`sport_sub_id`, `sport_name`, `sport_id`) VALUES
(1, 'butterfly_stroke', 5),
(2, 'backstroke', 5),
(3, 'long jump', 6),
(4, 'marathon', 6),
(5, 'sprint', 6);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `team_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sport_id` int(11) NOT NULL,
  `coach_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(320) NOT NULL,
  `phone` bigint(11) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `gender`, `dob`, `email`, `phone`, `pass`) VALUES
('', 'IJ\'VV', '', '0000-00-00', 'jnn@vhbl', 4568, 'nbk'),
('ayusa', 'T Ayusa ', 'Female', '2004-10-12', 'ayusa@gmail.com', 279864, 'mypass'),
('gullu', 'Gulnaaz Ahmed', 'Female', '2003-09-03', 'gullu@ullu', 5465985502, 'mypass'),
('hera', 'Hera Dubey%%^^&*\":\'', 'Female', '2002-07-24', 'hera@gmail', 4666668892, 'mypass'),
('mohit', 'Mohit Barnwal', 'Male', '1999-01-02', 'mohitbarn@gmail.com', 3435864434, 'hello'),
('niharika', 'Niharika Barnwal', 'Female', '2004-12-12', 'nbniharika24@gmail.com', 6206552709, 'mypass'),
('suchi', 'Suchismita Panda', 'Female', '2004-05-25', 'suchi@gmail.com', 5465985502, 'mypass');

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `venue_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `location` text NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `athlete`
--
ALTER TABLE `athlete`
  ADD PRIMARY KEY (`ath_id`);

--
-- Indexes for table `athlete_sport`
--
ALTER TABLE `athlete_sport`
  ADD PRIMARY KEY (`ath_sport_id`),
  ADD KEY `fk_sport` (`sport_id`),
  ADD KEY `fk_athlete` (`ath_id`);

--
-- Indexes for table `coach`
--
ALTER TABLE `coach`
  ADD PRIMARY KEY (`coach_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`sponsor_id`);

--
-- Indexes for table `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`sport_id`);

--
-- Indexes for table `sport_master`
--
ALTER TABLE `sport_master`
  ADD PRIMARY KEY (`sport_id`);

--
-- Indexes for table `sport_sub`
--
ALTER TABLE `sport_sub`
  ADD PRIMARY KEY (`sport_sub_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`venue_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `athlete`
--
ALTER TABLE `athlete`
  MODIFY `ath_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `athlete_sport`
--
ALTER TABLE `athlete_sport`
  MODIFY `ath_sport_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `coach`
--
ALTER TABLE `coach`
  MODIFY `coach_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sponsor`
--
ALTER TABLE `sponsor`
  MODIFY `sponsor_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sport`
--
ALTER TABLE `sport`
  MODIFY `sport_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `sport_master`
--
ALTER TABLE `sport_master`
  MODIFY `sport_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sport_sub`
--
ALTER TABLE `sport_sub`
  MODIFY `sport_sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `venue_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `athlete_sport`
--
ALTER TABLE `athlete_sport`
  ADD CONSTRAINT `fk_athlete` FOREIGN KEY (`ath_id`) REFERENCES `athlete` (`ath_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_sport` FOREIGN KEY (`sport_id`) REFERENCES `sport` (`sport_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
