SELECT title, award, genres.genre, labels.label, ratings.rating
FROM dvd_titles
JOIN genres
	ON dvd_titles.genre_id = genres.genre_id
JOIN labels
	ON dvd_titles.label_id = labels.label_id
JOIN ratings
	ON dvd_titles.rating_id = ratings.rating_id
ORDER BY award DESC;

SELECT title, sounds.sound, labels.label, genres.genre, ratings.rating
FROM dvd_titles
JOIN sounds
	ON dvd_titles.sound_id = sounds.sound_id
JOIN labels
	ON dvd_titles.label_id = labels.label_id
JOIN genres
	ON dvd_titles.genre_id = genres.genre_id
JOIN ratings
	ON dvd_titles.rating_id = ratings.rating_id
WHERE dvd_titles.label_id = 127 AND dvd_titles.sound_id = 4;

SELECT title, release_date, ratings.rating, genres.genre, sounds.sound, labels.label
FROM dvd_titles
JOIN ratings
	ON dvd_titles.rating_id = ratings.rating_id
JOIN genres
	ON dvd_titles.genre_id = genres.genre_id
JOIN sounds
	ON dvd_titles.sound_id = sounds.sound_id
JOIN labels
	ON dvd_titles.label_id = labels.label_id
WHERE dvd_titles.genre_id = 19 AND dvd_titles.rating_id = 7
ORDER BY dvd_titles.release_date DESC;






