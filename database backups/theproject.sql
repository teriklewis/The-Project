-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2017 at 08:27 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `theproject`
--
CREATE DATABASE IF NOT EXISTS `theproject` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `theproject`;

-- --------------------------------------------------------

--
-- Table structure for table `logininfo`
--

CREATE TABLE `logininfo` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `id` int(11) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logininfo`
--

INSERT INTO `logininfo` (`username`, `password`, `id`, `level`) VALUES
('peter', 'heheheheh', 1, 3),
('natash', 'brown', 2, 1),
('johhnyboi', 'hello', 3, 3),
('hop3', '1324', 4, 1),
('Nostic', '13245', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `status` text NOT NULL,
  `mail` text,
  `email` text,
  `homeno` text,
  `cellno` text NOT NULL,
  `employment` text NOT NULL,
  `position` text NOT NULL,
  `dob` date NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `firstname`, `lastname`, `status`, `mail`, `email`, `homeno`, `cellno`, `employment`, `position`, `dob`, `timestamp`) VALUES
(1, 'Peter', 'Griffin', 'Censored', NULL, NULL, NULL, '', 'Hehehehhee - Work', 'Pastor', '1969-06-09', '2017-08-13 15:48:32'),
(2, 'Natasha', 'Brown', 'Regular Standing', NULL, NULL, NULL, '', 'Manager - The Knocks', 'Head Deacon', '1990-11-12', '2017-08-13 15:50:36'),
(3, 'John', 'Howard', 'Regular Standing', NULL, NULL, NULL, '', 'Lifeguard - Indian Bay', 'Pastor', '1996-10-14', '2017-08-13 16:03:30'),
(4, 'Hope', 'Dickson', 'Censored', NULL, NULL, NULL, '', 'Financial Aid - Generic Bank ', 'Elder', '1986-08-16', '2017-08-13 16:05:25'),
(5, 'Nostagic', 'Bach', 'Regular Standing', NULL, NULL, NULL, '', 'Historian - Library', 'Member', '1962-02-25', '2017-08-13 16:06:59');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `skillid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `skill` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skillid`, `id`, `skill`) VALUES
(1, 1, 'hehehehehhe'),
(2, 1, 'Eating'),
(3, 2, 'Eating'),
(4, 2, 'Keeping Church Board Short'),
(5, 3, 'Helping the needy/poor'),
(6, 4, 'Resourceful'),
(7, 5, 'Record Keeping');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logininfo`
--
ALTER TABLE `logininfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`skillid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
