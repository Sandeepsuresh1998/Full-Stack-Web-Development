-- Creating a view for the football schedule
CREATE VIEW football_schedule AS
SELECT days.day_name, date, table1.team_name AS home_teams, table2.team_name AS away_teams, venues.venue_name
FROM football_schedule_usc
JOIN days
	ON football_schedule_usc.day_id = days.day_id
JOIN teams AS table1
	ON football_schedule_usc.home_team_id = table1.team_id
JOIN teams AS table2
	ON football_schedule_usc.home_team_id = table2.team_id
JOIN venues
	ON football_schedule_usc.venue_id = venues.venue_id;
    
-- Adding the two games below
-- First we have to  add Folsom Field to the foreign keys
INSERT INTO sureshsa_football_schedule_db.venues (venue_id, venue_name) 
VALUES ('10', 'Folsom Field');

-- First Game
INSERT INTO football_schedule_usc (game_id, day_id, date, home_team_id, away_team_id, venue_id)
VALUES (20, 6,'2017-11-18', 7, 4,10);

-- Second Game
INSERT INTO football_schedule_usc (game_id, day_id, date, home_team_id, away_team_id, venue_id)
VALUES(21, 6, '2017-11-18', 9, 6, 8);

-- Updating a game
UPDATE football_schedule_usc
SET date = '2017-11-11', away_team_id = 1
WHERE game_id = 20;

-- Deleting a Game
DELETE FROM football_schedule_usc
WHERE game_id = 21;

-- Displaying Venues and # of times each Venue is used
SELECT football_schedule_usc.venue_id, venues.venue_name, COUNT(*) AS game_count
FROM football_schedule_usc
	JOIN venues
		ON football_schedule_usc.venue_id = venues.venue_id
GROUP BY venues.venue_id;

-- Part 2

-- Creating the view for the dramas
CREATE VIEW dramas AS
	SELECT *
	FROM dvd_titles
	WHERE release_date IS NOT NULL AND dvd_titles.genre_id = 9;

-- Adding The Godfather to the database
INSERT INTO dvd_titles (title, release_date, award, label_id, sound_id, genre_id, rating_id, format_id)
VALUES ('The Godfather', '1972-03-24', 1973, 92, 4, 9, 7, 2);

-- Zero Effect DVD
UPDATE dvd_titles
SET label_id = 24, genre_id = 7, format_id = 4
WHERE dvd_title_id = 5131; -- Id for Zero Effect

-- Deleting Major Leage 3: Back to the Minors
DELETE FROM dvd_titles
WHERE dvd_title_id = 5932;

-- Displaying longest title and shortest title
SELECT MAX(CHAR_LENGTH(title)) AS longest_title, MIN(CHAR_LENGTH(title)) AS shortest_tile
FROM dvd_titles;

-- Display ​all ​genres ​and ​number ​of ​DVDs ​belonging ​to ​each ​genre ​as dvd_count column.
SELECT dvd_titles.genre_id, genres.genre, COUNT(*)
FROM dvd_titles
JOIN genres
	ON dvd_titles.genre_id = genres.genre_id
GROUP BY genre_id;





 


