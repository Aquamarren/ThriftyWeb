-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2017 at 11:04 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

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
  `TimeLastLoggedIn` time DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`AdminID`, `Username`, `FirstName`, `LastName`, `EmailAddress`, `Password`, `Active`, `DateLastLoggedIn`, `TimeLastLoggedIn`) VALUES
(1, 'andyyy', 'Andrea Mae', 'Lorenzo', 'andreamae_lorenzo@yahoo.com', '12345', 1, '2017-04-23', '18:02:33'),
(2, 'Aquamarren', 'Marren', 'Matias', 'marrenmatias@yahoo.com', '12345', 1, '2017-02-22', '09:57:32'),
(3, 'neamontecer', 'Nea Joanne', 'Montecer', 'neamontecer@yahoo.com', '12345', 1, '2017-03-20', '16:40:29'),
(5, 'giupepe', 'Giu', 'macatangay', 'giu@yahoo.com', '12345', 1, '2017-04-12', '16:17:15'),
(6, 'leideganda', 'Leide', 'Remo', 'leideremo@yahoo.com', '12345', 1, '2017-04-12', '16:04:42'),
(7, 'kimjongin', 'Jongin', 'Kim', 'kimjongin@yahoo.com', '12345', 1, '2017-04-12', '16:15:53');

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
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `ExpenseID` int(11) NOT NULL,
  `CategoryName` text NOT NULL,
  `ExpenseAmount` float NOT NULL,
  `ExpenseDate` date NOT NULL,
  `PercentIncrease` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`ID`, `UserID`, `UserName`, `ExpenseID`, `CategoryName`, `ExpenseAmount`, `ExpenseDate`, `PercentIncrease`) VALUES
(12, 12, 'jhjhgj', 12, 'makeup', 2503, '2017-04-24', 12),
(78, 4545, 'sdfxvcxbfhgjh', 23, 'commute', 8000, '2017-04-24', 89),
(87, 29, 'Kim Chu', 4, 'Cosmoholic', 3, '2017-04-21', 0),
(88, 29, 'Kim Chu', 5, 'Food', 23, '2017-04-21', 0),
(89, 22, 'dxdfdf', 12, 'food', 250, '2017-04-04', 25),
(90, 12, 'Asss', 23, 'Food', 2500, '2017-04-24', 25),
(91, 45, 'dfsdfsf', 65, 'Shoes', 500, '2017-04-24', 45);

-- --------------------------------------------------------

--
-- Table structure for table `savings`
--

CREATE TABLE IF NOT EXISTS `savings` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `SavingsID` int(11) NOT NULL,
  `SavingsDate` date NOT NULL,
  `SavingsAmount` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `savings`
--

INSERT INTO `savings` (`ID`, `UserID`, `UserName`, `SavingsID`, `SavingsDate`, `SavingsAmount`) VALUES
(22, 28, 'Lee Minho', 1, '2017-04-11', 230),
(23, 29, 'Kim Chu', 2, '2017-04-11', 500),
(24, 33, 'Mark Zuckerberg', 1, '2017-04-12', 500),
(25, 39, 'marren matias', 1, '2017-04-20', 3000),
(26, 40, 'andrea mae lorenzo', 1, '2017-04-21', 10000),
(27, 42, 'ed sheeran', 1, '2017-04-21', 2000),
(28, 43, 'Sir Bruce jokelangpo', 1, '2017-04-21', 2000),
(29, 44, 'Andrea mae lorenzo', 1, '2017-04-23', 1230),
(30, 48, 'jomel neri aliswag', 2, '2017-04-22', 5000),
(31, 49, 'jungkook jeon', 1, '2017-04-22', 5000),
(32, 39, 'marren matias', 2, '2017-04-22', 50000),
(33, 44, 'Andrea mae lorenzo', 1, '2017-04-23', 1230);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `question` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dp` varchar(100) NOT NULL,
  `dateSignedUp` date NOT NULL,
  `timeSignedUp` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `question`, `answer`, `username`, `password`, `dp`, `dateSignedUp`, `timeSignedUp`) VALUES
(23, 'John', 'Smith', 'What is your favorite movie?', 'Zorro', 'helloyou', '12345678', '', '0000-00-00', '00:00:00'),
(28, 'Lee', 'Minho', 'What is your favorite movie?', 'helloworld', 'leemin', '12345678', '0', '0000-00-00', '00:00:00'),
(29, 'Kim', 'Chu', 'What is your petâ€™s name?', 'geraldanderson', 'kimchu', '12345678', '', '0000-00-00', '00:00:00'),
(30, 'Bea', 'Alonzo', 'What was your childhood nickname?', 'Basha', 'beaalonzo', '12345678', '1', '0000-00-00', '00:00:00'),
(33, 'Mark', 'Zuckerberg', 'What is the name of your childhood friend?', 'Apple', 'markky', '12345678', '2', '0000-00-00', '00:00:00'),
(34, 'hello', 'bsbbss', 'What was your childhood nickname?', 'ysyw', 'aa', '12345', '4', '0000-00-00', '00:00:00'),
(35, 'gdhdhdhx', 'cyfydud', 'What is your petâ€™s name?', 'fff', 'ss', '123456', '4', '0000-00-00', '00:00:00'),
(36, 'ydhsys', 'gzgs', 'What was your childhood nickname?', 'stsgs', 'aaaaa', '123456', '4', '0000-00-00', '00:00:00'),
(37, 'txtsts', 'ggz', 'What was your childhood nickname?', 'fttd', 'tttttt', '999999', '4', '0000-00-00', '00:00:00'),
(38, 'buejec', 'ubfii', 'What was your childhood nickname?', '55', 'gggggg', '555555', '4', '0000-00-00', '00:00:00'),
(39, 'marren', 'matias', 'What was your childhood nickname?', 'marimar', 'aquamars', '123456', '4', '0000-00-00', '00:00:00'),
(41, 'marren', 'matias', 'What is the name of your childhood friend?', 'idk', 'snowww', 'aaaaaa', '7', '0000-00-00', '00:00:00'),
(42, 'ed', 'sheeran', 'What is the name of your childhood friend?', 'jdjdjdjd', 'abcdefgh', 'ababab', '3', '0000-00-00', '00:00:00'),
(43, 'Sir Bruce', 'jokelangpo', 'What is the name of your childhood friend?', 'iforgotna', 'brucealmighty', 'aaaaaa', '2', '0000-00-00', '00:00:00'),
(44, 'Andrea mae', 'lorenzo', 'What is your petâ€™s name?', 'Vivi', 'andiilorenzo', '123456789', '5', '0000-00-00', '00:00:00'),
(45, 'Bokjoo', 'kim', 'What is your petâ€™s name?', 'hanadulset', 'kimbokjoo', '123456789', '4', '0000-00-00', '00:00:00'),
(46, 'joonyoung', 'shin', 'What was your childhood nickname?', 'bebe', 'namjoohyuk', '123456', '0', '0000-00-00', '00:00:00'),
(47, 'hangyeol', 'kang', 'What was your childhood nickname?', 'bebe', 'kanghangyeol', '123456', '0', '0000-00-00', '00:00:00'),
(48, 'jomel neri', 'aliswag', 'What was your childhood nickname?', 'jom', 'jomelneri', '123456789', '2', '0000-00-00', '00:00:00'),
(49, 'jungkook', 'jeon', 'What is your petâ€™s name?', 'Vivo', 'goldEnmaknae', '123456', '3', '0000-00-00', '00:00:00'),
(51, 'Samsoon', 'kim', 'What is your petâ€™s name?', 'vivi', 'kimsamsoon', '123456', '4', '0000-00-00', '00:00:00'),
(52, 'ywudhsb', 'jsjsjdbd', 'What was your childhood nickname?', 'ushshsd', 'hsjsjdbbd', '123456', '4', '2017-04-24', '04:55:00');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `savings`
--
ALTER TABLE `savings`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
