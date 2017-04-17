-- phpMyAdmin SQL Dump
-- version 4.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 13, 2017 at 11:29 PM
-- Server version: 5.5.54-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cs4750s17chd5hq`
--

-- --------------------------------------------------------

--
-- Table structure for table `Coach`
--

CREATE TABLE IF NOT EXISTS `Coach` (
  `Coach_ID` int(10) NOT NULL,
  `Name` varchar(64) DEFAULT NULL,
  `Title` varchar(64) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Coach`
--

INSERT INTO `Coach` (`Coach_ID`, `Name`, `Title`) VALUES
(1, 'Tony Bennet', 'Head Coach');

-- --------------------------------------------------------

--
-- Table structure for table `Coaches`
--

CREATE TABLE IF NOT EXISTS `Coaches` (
  `Coach_ID` int(10) DEFAULT NULL,
  `Team_ID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Coaches`
--

INSERT INTO `Coaches` (`Coach_ID`, `Team_ID`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Creates`
--

CREATE TABLE IF NOT EXISTS `Creates` (
  `Fan_ID` int(10) DEFAULT NULL,
  `Watchlist_ID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `EnteredIn`
--

CREATE TABLE IF NOT EXISTS `EnteredIn` (
  `League_ID` int(10) DEFAULT NULL,
  `Watchlist_ID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `EnteredIn`
--

INSERT INTO `EnteredIn` (`League_ID`, `Watchlist_ID`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Fan`
--

CREATE TABLE IF NOT EXISTS `Fan` (
  `Fan_ID` int(10) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Fan`
--

INSERT INTO `Fan` (`Fan_ID`, `Username`, `Password`) VALUES
(15, 'Chase', 'Password'),
(16, 'Cole', 'Password'),
(17, 'Jacob', 'Password'),
(18, 'Zach', 'Password'),
(19, 'Jeff', 'Password');

-- --------------------------------------------------------

--
-- Table structure for table `Favorites`
--

CREATE TABLE IF NOT EXISTS `Favorites` (
  `Fan_ID` int(10) DEFAULT NULL,
  `Team_ID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Favorites`
--

INSERT INTO `Favorites` (`Fan_ID`, `Team_ID`) VALUES
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `League`
--

CREATE TABLE IF NOT EXISTS `League` (
  `League_ID` int(10) NOT NULL,
  `League_Admin` int(10) NOT NULL,
  `League_Name` varchar(64) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `League`
--

INSERT INTO `League` (`League_ID`, `League_Admin`, `League_Name`) VALUES
(1, 15, 'League1');

-- --------------------------------------------------------

--
-- Table structure for table `Match`
--

CREATE TABLE IF NOT EXISTS `Match` (
  `Match_ID` int(10) NOT NULL DEFAULT '0',
  `Team1_ID` int(10) DEFAULT NULL,
  `Team2_ID` int(10) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Location` varchar(64) DEFAULT NULL,
  `Team1_Score` int(10) DEFAULT NULL,
  `Team2_Score` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Player`
--

CREATE TABLE IF NOT EXISTS `Player` (
  `Player_ID` int(10) NOT NULL,
  `Name` varchar(64) NOT NULL,
  `Number` int(2) NOT NULL,
  `Position` varchar(10) NOT NULL,
  `Year` int(2) NOT NULL,
  `Rating` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Player`
--

INSERT INTO `Player` (`Player_ID`, `Name`, `Number`, `Position`, `Year`, `Rating`) VALUES
(1, 'London Perrantes', 32, 'G', 4, 92);

-- --------------------------------------------------------

--
-- Table structure for table `PlaysFor`
--

CREATE TABLE IF NOT EXISTS `PlaysFor` (
  `Player_ID` int(10) DEFAULT NULL,
  `Team_ID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PlaysFor`
--

INSERT INTO `PlaysFor` (`Player_ID`, `Team_ID`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Plays_In`
--

CREATE TABLE IF NOT EXISTS `Plays_In` (
  `Player_ID` int(10) DEFAULT NULL,
  `Match_ID` int(10) DEFAULT NULL,
  `FGP` decimal(5,0) DEFAULT NULL,
  `3PP` decimal(5,0) DEFAULT NULL,
  `Rebounds` int(5) DEFAULT NULL,
  `Assists` int(5) DEFAULT NULL,
  `Steals` int(5) DEFAULT NULL,
  `Blocks` int(5) DEFAULT NULL,
  `Turnovers` int(5) DEFAULT NULL,
  `PTS` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `SelectedFor`
--

CREATE TABLE IF NOT EXISTS `SelectedFor` (
  `Watchlist_ID` int(10) DEFAULT NULL,
  `Player_ID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `SelectedFor`
--

INSERT INTO `SelectedFor` (`Watchlist_ID`, `Player_ID`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Team`
--

CREATE TABLE IF NOT EXISTS `Team` (
  `Name` varchar(64) DEFAULT NULL,
  `Mascot` varchar(20) DEFAULT NULL,
  `Team_ID` int(10) NOT NULL,
  `Rival` int(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='Team attributes for each ACC BBall Team';

--
-- Dumping data for table `Team`
--

INSERT INTO `Team` (`Name`, `Mascot`, `Team_ID`, `Rival`) VALUES
('University of Virginia', 'Cavaliers', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Watchlist`
--

CREATE TABLE IF NOT EXISTS `Watchlist` (
  `Watchlist_ID` int(10) NOT NULL,
  `Watchlist_Name` varchar(64) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Watchlist`
--

INSERT INTO `Watchlist` (`Watchlist_ID`, `Watchlist_Name`) VALUES
(1, 'ChaseWatchList');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Coach`
--
ALTER TABLE `Coach`
  ADD PRIMARY KEY (`Coach_ID`), ADD UNIQUE KEY `Coach_ID` (`Coach_ID`);

--
-- Indexes for table `Coaches`
--
ALTER TABLE `Coaches`
  ADD KEY `Coach_ID` (`Coach_ID`), ADD KEY `Team_ID` (`Team_ID`);

--
-- Indexes for table `Creates`
--
ALTER TABLE `Creates`
  ADD KEY `Fan_ID` (`Fan_ID`), ADD KEY `Watchlist_ID` (`Watchlist_ID`);

--
-- Indexes for table `EnteredIn`
--
ALTER TABLE `EnteredIn`
  ADD KEY `League_ID` (`League_ID`), ADD KEY `Watchlist_ID` (`Watchlist_ID`);

--
-- Indexes for table `Fan`
--
ALTER TABLE `Fan`
  ADD PRIMARY KEY (`Fan_ID`), ADD KEY `Fan_ID` (`Fan_ID`), ADD KEY `Fan_ID_2` (`Fan_ID`);

--
-- Indexes for table `Favorites`
--
ALTER TABLE `Favorites`
  ADD KEY `Fan_ID` (`Fan_ID`), ADD KEY `Team_ID` (`Team_ID`);

--
-- Indexes for table `League`
--
ALTER TABLE `League`
  ADD PRIMARY KEY (`League_ID`), ADD KEY `League_ID` (`League_ID`), ADD KEY `League_Admin` (`League_Admin`);

--
-- Indexes for table `Match`
--
ALTER TABLE `Match`
  ADD PRIMARY KEY (`Match_ID`);

--
-- Indexes for table `Player`
--
ALTER TABLE `Player`
  ADD PRIMARY KEY (`Player_ID`), ADD KEY `Player_ID` (`Player_ID`);

--
-- Indexes for table `PlaysFor`
--
ALTER TABLE `PlaysFor`
  ADD KEY `Player_ID` (`Player_ID`), ADD KEY `Team_ID` (`Team_ID`);

--
-- Indexes for table `SelectedFor`
--
ALTER TABLE `SelectedFor`
  ADD KEY `Watchlist_ID` (`Watchlist_ID`), ADD KEY `Player_ID` (`Player_ID`);

--
-- Indexes for table `Team`
--
ALTER TABLE `Team`
  ADD PRIMARY KEY (`Team_ID`), ADD KEY `Team_ID` (`Team_ID`);

--
-- Indexes for table `Watchlist`
--
ALTER TABLE `Watchlist`
  ADD PRIMARY KEY (`Watchlist_ID`), ADD KEY `Watchlist_ID` (`Watchlist_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Coach`
--
ALTER TABLE `Coach`
  MODIFY `Coach_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Fan`
--
ALTER TABLE `Fan`
  MODIFY `Fan_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `League`
--
ALTER TABLE `League`
  MODIFY `League_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Player`
--
ALTER TABLE `Player`
  MODIFY `Player_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Team`
--
ALTER TABLE `Team`
  MODIFY `Team_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Watchlist`
--
ALTER TABLE `Watchlist`
  MODIFY `Watchlist_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Coaches`
--
ALTER TABLE `Coaches`
ADD CONSTRAINT `Coaches_ibfk_2` FOREIGN KEY (`Team_ID`) REFERENCES `Team` (`Team_ID`),
ADD CONSTRAINT `Coaches_ibfk_1` FOREIGN KEY (`Coach_ID`) REFERENCES `Coach` (`Coach_ID`);

--
-- Constraints for table `Creates`
--
ALTER TABLE `Creates`
ADD CONSTRAINT `Creates_ibfk_2` FOREIGN KEY (`Watchlist_ID`) REFERENCES `Watchlist` (`Watchlist_ID`),
ADD CONSTRAINT `Creates_ibfk_1` FOREIGN KEY (`Fan_ID`) REFERENCES `Fan` (`Fan_ID`);

--
-- Constraints for table `EnteredIn`
--
ALTER TABLE `EnteredIn`
ADD CONSTRAINT `EnteredIn_ibfk_2` FOREIGN KEY (`Watchlist_ID`) REFERENCES `Watchlist` (`Watchlist_ID`),
ADD CONSTRAINT `EnteredIn_ibfk_1` FOREIGN KEY (`League_ID`) REFERENCES `League` (`League_ID`);

--
-- Constraints for table `Favorites`
--
ALTER TABLE `Favorites`
ADD CONSTRAINT `Favorites_ibfk_2` FOREIGN KEY (`Team_ID`) REFERENCES `Team` (`Team_ID`),
ADD CONSTRAINT `Favorites_ibfk_1` FOREIGN KEY (`Fan_ID`) REFERENCES `Fan` (`Fan_ID`);

--
-- Constraints for table `League`
--
ALTER TABLE `League`
ADD CONSTRAINT `League_ibfk_1` FOREIGN KEY (`League_Admin`) REFERENCES `Fan` (`Fan_ID`);

--
-- Constraints for table `PlaysFor`
--
ALTER TABLE `PlaysFor`
ADD CONSTRAINT `PlaysFor_ibfk_2` FOREIGN KEY (`Team_ID`) REFERENCES `Team` (`Team_ID`),
ADD CONSTRAINT `PlaysFor_ibfk_1` FOREIGN KEY (`Player_ID`) REFERENCES `Player` (`Player_ID`);

--
-- Constraints for table `SelectedFor`
--
ALTER TABLE `SelectedFor`
ADD CONSTRAINT `SelectedFor_ibfk_2` FOREIGN KEY (`Player_ID`) REFERENCES `Player` (`Player_ID`),
ADD CONSTRAINT `SelectedFor_ibfk_1` FOREIGN KEY (`Watchlist_ID`) REFERENCES `Watchlist` (`Watchlist_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
