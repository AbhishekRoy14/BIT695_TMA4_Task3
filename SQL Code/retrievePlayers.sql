SELECT players.* , board_games.* 
FROM players JOIN board_games 
ON players.memberID=board_games.memberID_fk 
WHERE players.Email LIKE '%@gmail.co%'