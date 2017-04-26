-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2017 at 02:34 AM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `thriftyadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `AdminID` int(10) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `EmailAddress` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Active` int(10) NOT NULL,
  `DateLastLoggedIn` date NOT NULL,
  `TimeLastLoggedIn` time(6) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`AdminID`, `Username`, `FirstName`, `LastName`, `EmailAddress`, `Password`, `Active`, `DateLastLoggedIn`, `TimeLastLoggedIn`) VALUES
(1, 'andyyy', 'Andrea Mae', 'Lorenzo', 'andreamae_lorenzo@yahoo.com', '12345', 1, '2017-03-20', '16:25:48.000000'),
(2, 'Aquamarren', 'Marren', 'Matias', 'marrenmatias@yahoo.com', '12345', 1, '2017-02-22', '09:57:32.000000'),
(3, 'neamontecer', 'Nea Joanne', 'Montecer', 'neamontecer@yahoo.com', '12345', 1, '2017-04-22', '20:55:15.000000'),
(5, 'giupepe', 'Giu', 'macatangay', 'giu@yahoo.com', '12345', 1, '2017-04-12', '16:17:15.000000'),
(6, 'leideganda', 'Leide', 'Remo', 'leideremo@yahoo.com', '12345', 1, '2017-04-23', '18:02:27.000000'),
(7, 'kimjongin', 'Jongin', 'Kim', 'kimjongin@yahoo.com', '12345', 1, '2017-04-12', '16:15:53.000000');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `question1` varchar(100) NOT NULL,
  `question2` varchar(100) NOT NULL,
  `question3` varchar(100) NOT NULL,
  `question4` varchar(100) NOT NULL,
  `question5` varchar(100) NOT NULL,
  `apprate` varchar(100) NOT NULL,
  `feedback` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `username`, `question1`, `question2`, `question3`, `question4`, `question5`, `apprate`, `feedback`) VALUES
(1, 'hellophp', '1', '1', '1', '1', '', '0', ''),
(2, 'hellophp', '1', '1', '1', '1', '', '0', ''),
(3, 'hellophp', '1', '2', '3', '4', '4', '0', ''),
(4, 'hellophp', '2', '3', '3', '1', '1', '0', ''),
(5, 'hellophp', '1', '1', '1', '1', '1', '0', ''),
(6, 'hellophp', '1', '2', '3', '4', '4', '0', ''),
(7, 'hellophp', '1', '2', '3', '4', '5', '0', ''),
(8, 'annecurtis', '5', '4', '3', '2', '1', '5', 'Good Job!'),
(9, 'annecurtis', '5', '5', '5', '5', '5', '5', ''),
(10, 'annecurtis', '5', '5', '5', '5', '5', '5', 'daebak'),
(11, 'Marren', '5', '5', '5', '5', '5', '5', '');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `ID` bigint(250) NOT NULL,
  `UserID` bigint(250) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `ExpenseID` int(11) NOT NULL,
  `CategoryName` text NOT NULL,
  `ExpenseAmount` float NOT NULL,
  `ExpenseDate` date NOT NULL,
  `PercentIncrease` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=198 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `savings`
--

CREATE TABLE IF NOT EXISTS `savings` (
  `ID` bigint(250) NOT NULL,
  `UserID` bigint(250) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `SavingsID` int(11) NOT NULL,
  `SavingsDate` date NOT NULL,
  `SavingsAmount` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `question` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dp` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10203133370532028 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `savings`
--
ALTER TABLE `savings`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `AdminID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `ID` bigint(250) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=198;
--
-- AUTO_INCREMENT for table `savings`
--
ALTER TABLE `savings`
  MODIFY `ID` bigint(250) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10203133370532028;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
