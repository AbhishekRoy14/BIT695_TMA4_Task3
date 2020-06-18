CREATE TABLE `players` (
  `memberID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Member ID',
  `FirstName` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'First Name',
  `FamilyName` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Family Name',
  `Email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Email',
  `Phone` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Phone Number',
  PRIMARY KEY (`memberID`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8	

CREATE TABLE `boardgames` (
  `BoardgameID` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Boardgame ID',
  `Boardgame` varchar(255) NOT NULL COMMENT 'Boardgame',
  `Position` varchar(255) NOT NULL COMMENT 'Position',
  `Notes` varchar(255) NOT NULL COMMENT 'Notes',
  PRIMARY KEY (`BoardgameID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8	

CREATE TABLE `board_games_assigned` (
  `notes` varchar(1000) NOT NULL COMMENT 'Notes',
  `date` date NOT NULL COMMENT 'Date',
  `memberID_fk` int(11) NOT NULL COMMENT 'Member ID',
  `eventID_fk` int(15) NOT NULL COMMENT 'Event ID',
  KEY `memberID_fk` (`memberID_fk`),
  KEY `eventID_fk` (`eventID_fk`),
  CONSTRAINT `board_games_assigned_ibfk_1` FOREIGN KEY (`eventID_fk`) REFERENCES `schedule` (`eventID`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `board_games_assigned_ibfk_2` FOREIGN KEY (`memberID_fk`) REFERENCES `players` (`memberID`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8	

CREATE TABLE `players_scores` (
  `ID` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `score` int(10) NOT NULL COMMENT 'Player Scores',
  `memberID_fk` int(11) NOT NULL,
  `eventID_fk` int(15) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `memberID_fk` (`memberID_fk`),
  KEY `eventID_fk` (`eventID_fk`),
  CONSTRAINT `players_scores_ibfk_1` FOREIGN KEY (`memberID_fk`) REFERENCES `players` (`memberID`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `players_scores_ibfk_2` FOREIGN KEY (`eventID_fk`) REFERENCES `schedule` (`eventID`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8	

CREATE TABLE `schedule` (
  `eventID` int(15) NOT NULL AUTO_INCREMENT COMMENT 'Event ID',
  `eventName` varchar(255) NOT NULL COMMENT 'Event Name',
  `venue` varchar(255) NOT NULL COMMENT 'Venue',
  `startDate` date NOT NULL COMMENT 'Start Date',
  `endDate` date NOT NULL COMMENT 'End Date ',
  `capacity` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Registration Required',
  `BoardgameID_fk` int(10) NOT NULL COMMENT 'Boardgame ID',
  PRIMARY KEY (`eventID`),
  KEY `BoardgameID_fk` (`BoardgameID_fk`),
  CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`BoardgameID_fk`) REFERENCES `boardgames` (`BoardgameID`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8	


