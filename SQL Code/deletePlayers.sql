DELETE FROM `players` WHERE `memberID` = '5'

MySQL said:  
#1451 - Cannot delete or update a parent row: a foreign key constraint fails 
(`bit695`.`board_games`, CONSTRAINT `board_games_ibfk_1` FOREIGN KEY (`memberID_fk`) 
REFERENCES `players` (`memberID`) O
N DELETE RESTRICT ON UPDATE CASCADE)