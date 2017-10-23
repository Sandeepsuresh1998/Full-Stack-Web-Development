<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Song Search Results | Lecture 08 TH</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<h1 class="col-12 mt-4">Song Search Results</h1>
		</div> <!-- .row -->
	</div> <!-- .container-fluid -->

	<div class="container-fluid">

		<div class="row mb-4 mt-4">
			<div class="col-12">
				<a href="form.php" role="button" class="btn btn-primary">Back to Form</a>
			</div> <!-- .col -->
		</div> <!-- .row -->

		<div class="row">
			<div class="col-12">
				<?php 
					$host = "303.itpwebdev.com";
					$user = "sureshsa_db_user";
					$pass = "Suresh98?";
					$db = "sureshsa_dvd_db";

					// 1. Establish DB Connection.
					$mysqli = new mysqli($host, $user, $pass, $db);

					if ($mysqli->connect_errno) :
						//Connection error
						echo "Something went wrong";
						echo $mysqli->error;

					else :
						//Connection success
						$sql = "SELECT title AS dvd_title, release_date AS release_date, award AS Award, genres.genre AS dvd_genre, ratings.rating AS rating, labels.label AS label, formats.format AS format, sounds.sound AS sound
								FROM dvd_titles
								JOIN genres
									ON dvd_titles.genre_id = genres.genre_id
								JOIN ratings
									ON dvd_titles.rating_id = ratings.rating_id
								JOIN labels
									ON dvd_titles.label_id = labels.label_id
								JOIN formats
									ON dvd_titles.format_id = formats.format_id
								JOIN sounds
									ON dvd_titles.sound_id = sounds.sound_id
								WHERE 1=1";

						//Dvd Title
						if( isset($_GET['dvd_title']) && !empty($_GET['dvd_title'])) {
							$sql .= " AND title LIKE % " . $_GET['dvd_title'] . "%";
						}

						//Genre
						if( isset($_GET['genre']) && !empty($_GET['genre'])) {
							$sql = " AND genres.genre = " . $_GET['genre'];
						}

						//Rating
						if( isset($_GET['rating']) && !empty($_GET['rating'])) {
							$sql = " AND ratings.rating = " . $_GET['rating'];
						}

						//Label
						if( isset($_GET['label']) && !empty($_GET['label'])) {
							$sql = " AND labels.label = " . $_GET['label'];
						}

						//Format
						if( isset($_GET['format']) && !empty($_GET['format'])) {
							$sql = " AND formats.format = " . $_GET['format'];
						}

						//Sound
						if( isset($_GET['sound']) && !empty($_GET['sound'])) {
							$sql = " AND sounds.sound = " . $_GET['sound'];
						}

						if( isset($_GET['award']) && !empty($_GET['award'])) {
							if($_GET['award'] == 'yes') {
								$sql = " AND award IS NOT NULL";
							} else if($_GET['award'] == 'no') {
								$sql = " AND award IS NULL";
							} else {
								//Do nothing
							}
						}

						$sql .= ";";


						// Send off the query
						$results = $mysqli->query($sql);

						

				?>

		

		<table class="table table-hover table-responsive mt-4">
			<thead>
				<tr>
					<th>DVD Title</th>
					<th>Release Date</th>
					<th>Award</th>
					<th>Genre</th>
					<th>Rating</th>
					<th>Label</th>
					<th>Format</th>
					<th>Sound</th>
				</tr>
			</thead>

		</table>

			</div> <!-- .col -->
		</div> <!-- .row -->

		<div class="row mt-4 mb-4">
			<div class="col-12">
				<a href="form.php" role="button" class="btn btn-primary">Back to Form</a>
			</div> <!-- .col -->
		</div> <!-- .row -->

	</div> <!-- .container-fluid -->

	<?php 
		endif;
	?>

</body>
</html>