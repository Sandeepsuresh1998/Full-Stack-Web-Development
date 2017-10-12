SELECT track_id, name
FROM tracks;

SELECT *
FROM genres; /* You cannot use asteriks for the FROM command */ 

/* Semi-colons only go after the end of the statements. */

SELECT *
FROM artists;

SELECT *
FROM tracks
/* WHERE track_id <>15 /*Skips track number 15*/
WHERE composer IS NOT NULL
ORDER BY name DESC, composer; /* Sorting */

-- Display tracks that cost more than$0.99. Sort them from shortest to longest.
SELECT *
FROM tracks
WHERE unit_price > 0.99
ORDER BY milliseconds; 

SELECT *
from artists
WHERE name LIKE 'Frank%'; -- This will only search for frank: WHERE name = 'Frank'

SELECT *
FROM tracks
WHERE genre_id = 1
AND media_type_id = 2;

SELECT *
FROM tracks
WHERE (name LIKE '%you%' OR name LIKE '%day%')
AND composer LIKE '%U2%';


SELECT tracks.name AS track_name, genres.name AS genres_name, albums.title AS album_name, artists.name AS artists_name
FROM tracks
JOIN genres
	ON genres.genre_id = tracks.genre_id
JOIN albums
	ON albums.album_id = tracks.album_id
JOIN artists
	ON artists.artist_id = albums.artist_id
WHERE tracks.genre_id = 2;