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
						$sql = "SELECT title AS dvd_title, release_date AS release_date, award AS Award, genres.genre AS dvd_genre, ratings.rating AS rating, labels.label AS label, formats.format AS format, sounds.sound AS sound, dvd_title_id
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
							$sql .= " AND title LIKE '%" . $_GET['dvd_title'] . "%'";
						}

						//Genre
						if( isset($_GET['genre']) && !empty($_GET['genre'])) {
							$sql .= " AND dvd_titles.genre_id = " . $_GET['genre'];
						}

						//Rating
						if( isset($_GET['rating']) && !empty($_GET['rating'])) {
							$sql .= " AND dvd_titles.rating_id = " . $_GET['rating'];
						}

						//Label
						if( isset($_GET['label']) && !empty($_GET['label'])) {
							$sql .= " AND dvd_titles.label_id = " . $_GET['label'];
						}

						//Format
						if( isset($_GET['format']) && !empty($_GET['format'])) {
							$sql .= " AND dvd_titles.format_id = " . $_GET['format'];
						}

						//Sound
						if( isset($_GET['sound']) && !empty($_GET['sound'])) {
							$sql .= " AND dvd_titles.sound_id = " . $_GET['sound'];
						}

						if( isset($_GET['award']) && !empty($_GET['award'])) {
							if($_GET['award'] == 'yes') {
								$sql .= " AND award IS NOT NULL";
							} else if($_GET['award'] == 'no') {
								$sql .= " AND award IS NULL";
							} else {
								//Do nothing
							}
						}

						if( isset($_GET['release_date_from']) && !empty($_GET['release_date_from'])) {
							$sql .= " AND release_date >= " .$_GET['release_date_from'];
						}

						if( isset($_GET['release_date_to']) && !empty($_GET['release_date_to'])) {
							$sql .= " AND release_date <= " .$_GET['release_date_to'];
						}

						$sql .= ";";


						// Send off the query
						$results = $mysqli->query($sql);

						if (!$results) :
						// SQL Error.
							echo $mysqli->error;
						else :
							// Results Received.

				?>

				<div>
					Your search returned <?php echo $results->num_rows; ?> result(s).
				</div>

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

					<tbody>
						<?php 
							while ( $row = $results->fetch_assoc() ) :
						?>
							<tr>
								<td> <!-- In this row link the title and add edit/delete buttons -->
									<a href="details.php?dvd_title_id=<?php echo $row['dvd_title_id']; ?>"">
										<?php echo $row['dvd_title']; ?>
									</a>

									<div> <!-- Edit and Delete Buttons -->
										<a href="edit.php?dvd_title_id=<?php echo $row['dvd_title_id']; ?>" class="btn btn-dark mt-2">EDIT</a>
										<a href="delete.php?dvd_title_id=<?php echo $row['dvd_title_id']; ?>" class="btn btn-dark mt-2" onclick="return confirm('Are you sure you want to delete <?php echo $row['dvd_titled']; ?>?');">DELETE</a>
									</div>
									
								</td>
								<td><?php echo $row['release_date']; ?></td>
								<td><?php echo $row['Award']; ?></td>
								<td><?php echo $row['dvd_genre']; ?></td>
								<td><?php echo $row['rating']; ?></td>
								<td><?php echo $row['label']; ?></td>
								<td><?php echo $row['format']; ?></td>
								<td><?php echo $row['sound']; ?></td>
							</tr>
							

						<?php
							endwhile;
						?>
					</tbody>

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
			endif; //Results received
			$mysqli->close();
		endif;
	?>

</body>
</html>