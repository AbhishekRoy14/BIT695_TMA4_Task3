INSERT INTO `players`(`FirstName`, `FamilyName`, `Email`, `Phone`) 
VALUES 	('Sam','Smith','sam.smith@gmail.com','0210111222'), 
		('Ethan','Han','ethan.han@gmail.com','0210222333'), 
		('John','Key','john.key@hotmail.com','0210333444');
		
INSERT INTO `board_games`(`Boardgame`, `Position`, `Notes`, `Date`, `Event`, `memberID_fk`) 
VALUES 	('Scrabble','2','Should be a Member','2020-11-11','scrabble championship 2020','3'),
		('Scrabble','3','Should be a Member','2020-11-11','scrabble championship 2020','5'), 
		('Scrabble','1','Should be a Member','2020-11-11','scrabble championship 2020','2'), 
		('monopoly','2','Should be a Member','2020-10-10','monopoly championship 2020','1'), 
		('monopoly','3','Should be a Member','2020-10-10','monopoly championship 2020','5'), 
		('monopoly','4','Should be a Member','2020-10-10','monopoly championship 2020','4');