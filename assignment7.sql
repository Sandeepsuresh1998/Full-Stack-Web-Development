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





 


