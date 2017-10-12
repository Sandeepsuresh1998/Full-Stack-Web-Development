SELECT date, venues.venue_name
FROM football_schedule_usc
JOIN venues
	ON football_schedule_usc.venue_id = venues.venue_id;
    
SELECT date, days.day_name, venues.venue_name
FROM football_schedule_usc
JOIN venues
	ON football_schedule_usc.venue_id = venues.venue_id
JOIN days
	ON football_schedule_usc.day_id = days.day_id
ORDER BY football_schedule_usc.date DESC;

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