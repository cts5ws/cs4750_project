-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 26, 2017 at 09:56 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `cs4750`
--

-- --------------------------------------------------------

--
-- Table structure for table `Coach`
--

CREATE TABLE `Coach` (
  `Coach_ID` int(10) NOT NULL,
  `Name` varchar(64) DEFAULT NULL,
  `Title` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Coach`
--

INSERT INTO `Coach` (`Coach_ID`, `Name`, `Title`) VALUES
(1, 'Tony Bennet', 'Head Coach'),
(2, 'Mike Krzyzewski', 'Head Coach');

-- --------------------------------------------------------

--
-- Table structure for table `Coaches`
--

CREATE TABLE `Coaches` (
  `Coach_ID` int(10) DEFAULT NULL,
  `Team_ID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Coaches`
--

INSERT INTO `Coaches` (`Coach_ID`, `Team_ID`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Creates`
--

CREATE TABLE `Creates` (
  `Fan_ID` int(10) DEFAULT NULL,
  `Watchlist_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Creates`
--

INSERT INTO `Creates` (`Fan_ID`, `Watchlist_ID`) VALUES
(19, 16),
(2, 17),
(1, 18),
(2, 19),
(3, 20),
(4, 21),
(21, 22),
(21, 23),
(21, 24);

--
-- Triggers `Creates`
--
DELIMITER $$
CREATE TRIGGER `Update Watchlist2` AFTER INSERT ON `Creates` FOR EACH ROW INSERT INTO Watchlist(Watchlist_Name) VALUES ('New Watchlist')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `defensive stats`
-- (See below for the actual view)
--
CREATE TABLE `Defensive Stats` (
`Player_ID` int(10)
,`Rebounds` int(5)
,`Steals` int(5)
,`Blocks` int(5)
,`Turnovers` int(5)
);

-- --------------------------------------------------------

--
-- Table structure for table `EnteredIn`
--

CREATE TABLE `EnteredIn` (
  `League_ID` int(10) DEFAULT NULL,
  `Watchlist_ID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Fan`
--

CREATE TABLE `Fan` (
  `Fan_ID` int(10) NOT NULL,
  `Username` varchar(32) NOT NULL,
  `Password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Fan`
--

INSERT INTO `Fan` (`Fan_ID`, `Username`, `Password`) VALUES
(15, 'Chase', 'dc647eb65e6711e155375218212b3964'),
(16, 'Cole', 'dc647eb65e6711e155375218212b3964'),
(17, 'Jacob', 'dc647eb65e6711e155375218212b3964'),
(18, 'Zach', 'dc647eb65e6711e155375218212b3964'),
(19, 'Jeff', 'dc647eb65e6711e155375218212b3964'),
(21, 'zachh', '6f749bf4e5bb6903f28c6f030daa5a1a');

--
-- Triggers `Fan`
--
DELIMITER $$
CREATE TRIGGER `Update Fan ID in Favorites` BEFORE INSERT ON `Fan` FOR EACH ROW INSERT INTO Favorites (Team_ID) VALUES (NEW.Fan_ID)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `Favorites` (
  `Fan_ID` int(10) DEFAULT NULL,
  `Team_ID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favorites`
--

INSERT INTO `Favorites` (`Fan_ID`, `Team_ID`) VALUES
(19, 3),
(21, 1),
(21, 2),
(21, 3);

--
-- Triggers `favorites`
--
DELIMITER $$
CREATE TRIGGER `Update Creates` BEFORE INSERT ON `Favorites` FOR EACH ROW INSERT INTO Creates (Fan_ID) SELECT NEW.Fan_ID
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Update Watchlist` AFTER INSERT ON `Favorites` FOR EACH ROW INSERT INTO Watchlist (Watchlist_Name) SELECT Team.Name FROM Team WHERE Team.Team_ID = NEW.Team_ID
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `League`
--

CREATE TABLE `League` (
  `League_ID` int(10) NOT NULL,
  `League_Admin` int(10) NOT NULL,
  `League_Name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `League`
--

INSERT INTO `League` (`League_ID`, `League_Admin`, `League_Name`) VALUES
(1, 15, 'League1');

-- --------------------------------------------------------

--
-- Table structure for table `Match`
--

CREATE TABLE `Match` (
  `Match_ID` int(10) NOT NULL,
  `Team1_ID` int(10) DEFAULT NULL,
  `Team2_ID` int(10) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Location` varchar(64) DEFAULT NULL,
  `Team1_Score` int(10) DEFAULT NULL,
  `Team2_Score` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Match`
--

INSERT INTO `Match` (`Match_ID`, `Team1_ID`, `Team2_ID`, `Date`, `Location`, `Team1_Score`, `Team2_Score`) VALUES
(1, 1, 2, '2017-04-20', 'Charlottesville, VA', 56, 49),
(2, 2, 3, '2017-03-04', 'Chapel Hill, NC', 83, 90),
(3, 1, 3, '2017-02-27', 'Charlottesville, VA', 53, 43);

-- --------------------------------------------------------

--
-- Stand-in structure for view `offensive stats`
-- (See below for the actual view)
--
CREATE TABLE `Offensive Stats` (
`Player_ID` int(10)
,`FGP` decimal(5,0)
,`3PP` decimal(5,0)
,`Assists` int(5)
,`PTS` int(5)
);

-- --------------------------------------------------------

--
-- Table structure for table `Player`
--

CREATE TABLE `Player` (
  `Player_ID` int(10) NOT NULL,
  `Name` varchar(64) NOT NULL,
  `Number` int(2) NOT NULL,
  `Position` varchar(10) NOT NULL,
  `Year` int(2) NOT NULL,
  `Rating` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Player`
--

INSERT INTO `Player` (`Player_ID`, `Name`, `Number`, `Position`, `Year`, `Rating`) VALUES
(1, 'London Perrantes', 32, 'G', 4, 92),
(2, 'Kyle Guy', 5, 'G', 2, 87),
(3, 'Isaiah Wilkins', 21, 'F', 4, 85),
(4, 'Devon Hall', 0, 'G', 4, 88),
(5, 'Jayson Tatum', 0, 'F', 1, 92),
(6, 'Harry Giles', 1, 'F', 1, 79),
(7, 'Chase Jeter', 2, 'F/C', 2, 71),
(8, 'Matt Jones', 13, 'G', 4, 68),
(9, 'Javin DeLaurier', 12, 'F', 1, 73),
(10, 'Nate Britt', 0, 'G', 4, 82),
(11, 'Isaiah Hicks', 4, 'F', 4, 94),
(12, 'Stilman White', 30, 'G', 4, 86),
(13, 'Brandon Robinson', 14, 'G', 1, 77);

-- --------------------------------------------------------

--
-- Table structure for table `PlaysFor`
--

CREATE TABLE `PlaysFor` (
  `Player_ID` int(10) DEFAULT NULL,
  `Team_ID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PlaysFor`
--

INSERT INTO `PlaysFor` (`Player_ID`, `Team_ID`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(5, 2),
(10, 3),
(11, 3),
(12, 3),
(13, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Plays_In`
--

CREATE TABLE `Plays_In` (
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

--
-- Dumping data for table `Plays_In`
--

INSERT INTO `Plays_In` (`Player_ID`, `Match_ID`, `FGP`, `3PP`, `Rebounds`, `Assists`, `Steals`, `Blocks`, `Turnovers`, `PTS`) VALUES
(1, 3, '1', '0', 4, 6, 33, 2, 1, 17),
(5, 2, '1', '0', 2, 3, 1, 0, 3, 18),
(10, 3, '55', '45', 3, 2, 0, 5, 2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `SelectedFor`
--

CREATE TABLE `SelectedFor` (
  `Watchlist_ID` int(10) DEFAULT NULL,
  `Player_ID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `SelectedFor`
--

INSERT INTO `SelectedFor` (`Watchlist_ID`, `Player_ID`) VALUES
(19, 9),
(20, 13);

-- --------------------------------------------------------

--
-- Table structure for table `Team`
--

CREATE TABLE `Team` (
  `Name` varchar(64) DEFAULT NULL,
  `Mascot` varchar(20) DEFAULT NULL,
  `Team_ID` int(10) NOT NULL,
  `Rival` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Team attributes for each ACC BBall Team';

--
-- Dumping data for table `Team`
--

INSERT INTO `Team` (`Name`, `Mascot`, `Team_ID`, `Rival`) VALUES
('University of Virginia', 'Cavaliers', 1, 2),
('Duke University', 'Blue Devils', 2, 1),
('University of North Carolina', 'Tarheels', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Watchlist`
--

CREATE TABLE `Watchlist` (
  `Watchlist_ID` int(10) NOT NULL,
  `Watchlist_Name` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Watchlist`
--

INSERT INTO `Watchlist` (`Watchlist_ID`, `Watchlist_Name`) VALUES
(23, 'University of Virginia'),
(25, 'Duke University'),
(26, 'New Watchlist'),
(27, 'University of North Carolina');

--
-- Triggers `Watchlist`
--
DELIMITER $$
CREATE TRIGGER `Delete SelectedFor` BEFORE DELETE ON `Watchlist` FOR EACH ROW DELETE FROM SelectedFor WHERE OLD.Watchlist_ID = SelectedFor.Watchlist_ID
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure for view `defensive stats`
-- --
-- DROP TABLE IF EXISTS `Defensive Stats`;

-- CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `Defensive Stats`  AS  select `Plays_In`.`Player_ID` AS `Player_ID`,`Plays_In`.`Rebounds` AS `Rebounds`,`Plays_In`.`Steals` AS `Steals`,`Plays_In`.`Blocks` AS `Blocks`,`Plays_In`.`Turnovers` AS `Turnovers` from `Plays_In` ;

-- --------------------------------------------------------

--
-- Structure for view `offensive stats`
-- --
-- DROP TABLE IF EXISTS `Offensive Stats`;

-- CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `Offensive Stats`  AS  select `Plays_In`.`Player_ID` AS `Player_ID`,`Plays_In`.`FGP` AS `FGP`,`Plays_In`.`3PP` AS `3PP`,`Plays_In`.`Assists` AS `Assists`,`Plays_In`.`PTS` AS `PTS` from `Plays_In` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Coach`
--
ALTER TABLE `Coach`
  ADD PRIMARY KEY (`Coach_ID`),
  ADD UNIQUE KEY `Coach_ID` (`Coach_ID`);

--
-- Indexes for table `Coaches`
--
ALTER TABLE `Coaches`
  ADD KEY `Coach_ID` (`Coach_ID`),
  ADD KEY `Team_ID` (`Team_ID`);

--
-- Indexes for table `Creates`
--
ALTER TABLE `Creates`
  ADD KEY `Fan_ID` (`Fan_ID`),
  ADD KEY `Watchlist_ID` (`Watchlist_ID`);

--
-- Indexes for table `EnteredIn`
--
ALTER TABLE `EnteredIn`
  ADD KEY `League_ID` (`League_ID`),
  ADD KEY `Watchlist_ID` (`Watchlist_ID`);

--
-- Indexes for table `Fan`
--
ALTER TABLE `Fan`
  ADD PRIMARY KEY (`Fan_ID`),
  ADD KEY `Fan_ID` (`Fan_ID`),
  ADD KEY `Fan_ID_2` (`Fan_ID`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `Favorites`
  ADD KEY `Fan_ID` (`Fan_ID`),
  ADD KEY `Team_ID` (`Team_ID`);

--
-- Indexes for table `League`
--
ALTER TABLE `League`
  ADD PRIMARY KEY (`League_ID`),
  ADD KEY `League_ID` (`League_ID`),
  ADD KEY `League_Admin` (`League_Admin`);

--
-- Indexes for table `Match`
--
ALTER TABLE `Match`
  ADD PRIMARY KEY (`Match_ID`),
  ADD KEY `Team1_ID` (`Team1_ID`),
  ADD KEY `Team2_ID` (`Team2_ID`);

--
-- Indexes for table `Player`
--
ALTER TABLE `Player`
  ADD PRIMARY KEY (`Player_ID`),
  ADD KEY `Player_ID` (`Player_ID`);

--
-- Indexes for table `PlaysFor`
--
ALTER TABLE `PlaysFor`
  ADD KEY `Player_ID` (`Player_ID`),
  ADD KEY `Team_ID` (`Team_ID`);

--
-- Indexes for table `Plays_In`
--
ALTER TABLE `Plays_In`
  ADD KEY `Player_ID` (`Player_ID`),
  ADD KEY `Match_ID` (`Match_ID`);

--
-- Indexes for table `SelectedFor`
--
ALTER TABLE `SelectedFor`
  ADD KEY `Watchlist_ID` (`Watchlist_ID`),
  ADD KEY `Player_ID` (`Player_ID`);

--
-- Indexes for table `Team`
--
ALTER TABLE `Team`
  ADD PRIMARY KEY (`Team_ID`),
  ADD KEY `Team_ID` (`Team_ID`);

--
-- Indexes for table `Watchlist`
--
ALTER TABLE `Watchlist`
  ADD PRIMARY KEY (`Watchlist_ID`),
  ADD KEY `Watchlist_ID` (`Watchlist_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Coach`
--
ALTER TABLE `Coach`
  MODIFY `Coach_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Creates`
--
ALTER TABLE `Creates`
  MODIFY `Watchlist_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `Fan`
--
ALTER TABLE `Fan`
  MODIFY `Fan_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `League`
--
ALTER TABLE `League`
  MODIFY `League_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Match`
--
ALTER TABLE `Match`
  MODIFY `Match_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Player`
--
ALTER TABLE `Player`
  MODIFY `Player_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `Team`
--
ALTER TABLE `Team`
  MODIFY `Team_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Watchlist`
--
ALTER TABLE `Watchlist`
  MODIFY `Watchlist_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Coaches`
--
ALTER TABLE `Coaches`
  ADD CONSTRAINT `Coaches_ibfk_1` FOREIGN KEY (`Coach_ID`) REFERENCES `Coach` (`Coach_ID`),
  ADD CONSTRAINT `Coaches_ibfk_2` FOREIGN KEY (`Team_ID`) REFERENCES `Team` (`Team_ID`);

--
-- Constraints for table `EnteredIn`
--
ALTER TABLE `EnteredIn`
  ADD CONSTRAINT `EnteredIn_ibfk_1` FOREIGN KEY (`League_ID`) REFERENCES `League` (`League_ID`),
  ADD CONSTRAINT `EnteredIn_ibfk_2` FOREIGN KEY (`Watchlist_ID`) REFERENCES `Watchlist` (`Watchlist_ID`);

--
-- Constraints for table `favorites`
--
ALTER TABLE `Favorites`
  ADD CONSTRAINT `Favorties_ibfk_1` FOREIGN KEY (`Fan_ID`) REFERENCES `Fan` (`Fan_ID`),
  ADD CONSTRAINT `Favorties_ibfk_2` FOREIGN KEY (`Team_ID`) REFERENCES `Team` (`Team_ID`);

--
-- Constraints for table `League`
--
ALTER TABLE `League`
  ADD CONSTRAINT `League_ibfk_1` FOREIGN KEY (`League_Admin`) REFERENCES `Fan` (`Fan_ID`);

--
-- Constraints for table `Match`
--
ALTER TABLE `Match`
  ADD CONSTRAINT `Match_ibfk_1` FOREIGN KEY (`Team1_ID`) REFERENCES `Team` (`Team_ID`),
  ADD CONSTRAINT `Match_ibfk_2` FOREIGN KEY (`Team2_ID`) REFERENCES `Team` (`Team_ID`);

--
-- Constraints for table `PlaysFor`
--
ALTER TABLE `PlaysFor`
  ADD CONSTRAINT `PlaysFor_ibfk_1` FOREIGN KEY (`Player_ID`) REFERENCES `Player` (`Player_ID`),
  ADD CONSTRAINT `PlaysFor_ibfk_2` FOREIGN KEY (`Team_ID`) REFERENCES `Team` (`Team_ID`);

--
-- Constraints for table `Plays_In`
--
ALTER TABLE `Plays_In`
  ADD CONSTRAINT `Plays_In_ibfk_1` FOREIGN KEY (`Player_ID`) REFERENCES `Player` (`Player_ID`),
  ADD CONSTRAINT `Plays_In_ibfk_2` FOREIGN KEY (`Match_ID`) REFERENCES `Match` (`Match_ID`);

--
-- Constraints for table `SelectedFor`
--
ALTER TABLE `SelectedFor`
  ADD CONSTRAINT `SelectedFor_ibfk_1` FOREIGN KEY (`Watchlist_ID`) REFERENCES `Watchlist` (`Watchlist_ID`),
  ADD CONSTRAINT `SelectedFor_ibfk_2` FOREIGN KEY (`Player_ID`) REFERENCES `Player` (`Player_ID`);
