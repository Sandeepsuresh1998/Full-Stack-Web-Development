<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Confirmation | Song Database</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
</head>
<body>

	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php">Home</a></li>
		<li class="breadcrumb-item"><a href="add_form.php">Add</a></li>
		<li class="breadcrumb-item active">Confirmation</li>
	</ol>

	<div class="container">
		<div class="row">
			<h1 class="col-12 mt-4">Add a Song</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->

	<div class="container">

		<div class="row mt-4">
			<div class="col-12">

	<?php
		// var_dump($_POST);

		if ( !isset($_POST['title']) ) :
			// Required field is missing.
		?>

			<div class="text-danger">Please fill out title.</div>

		<?php

		else :
			// All required fields present.

			$host = "303.itpwebdev.com";
			$user = "sureshsa_db_user";
			$pass = "Suresh98?";
			$db = "sureshsa_dvd_db";

			$mysqli = new mysqli($host, $user, $pass, $db);

			if ($mysqli->connect_errno) :
				// DB Error
				echo $mysqli->connect_error;
			else :
				// Connection Succuess

				//Setting all the not required fields to null in case user does not fill it out
				$release_date = "null";
				$label_id = "null";
				$sound_id = "null";
				$genre_id = "null";
				$rating_id = "null";
				$format_id = "null";
				$award = "null"

				//Release Date
				if ( isset($_POST['release_date']) && !empty($_POST['release_date']) ) {
					$release_date = $_POST['release_date'];
				}

				//Label
				if ( isset($_POST['label']) && !empty($_POST['label']) ) {
					$label_id = $_POST['label'];
				}

				//Sound
				if ( isset($_POST['sound']) && !empty($_POST['sound']) ) {
					$sound_id = $_POST['sound'];
				}

				//Genre
				if ( isset($_POST['genre']) && !empty($_POST['genre']) ) {
					$genre_id = $_POST['genre'];
				}

				//Rating
				if ( isset($_POST['rating']) && !empty($_POST['rating']) ) {
					$rating_id = $_POST['rating'];
				}

				//Format
				if ( isset($_POST['format']) && !empty($_POST['format']) ) {
					$format_id = $_POST['format'];
				}

				//Award
				if ( isset($_POST['award']) && !empty($_POST['award']) ) {
					$award = $_POST['award'];
				}

				
				$sql = "INSERT INTO dvd_titles (title, release_date, label_id, sound_id, genre_id, rating_id, format_id, award)
								VALUES ('"
					. $_POST['title']
					. "', " 
					. $release_date
					. ", "
					. $label_id
					. ", "
					. $sound_id
					. ", "
					. $genre_id
					. ", "
					. $rating_id
					. ", "
					. $format_id
					. ", " 
					. $award
					. ");";

				// echo $sql . "<hr>";

				$results = $mysqli->query($sql);

				if (!$results) :
					// SQL Error
					echo $mysqli->error;
				else :
					// SQL Success
	?>
				<div class="text-success"><span class="font-italic"><?php echo $_POST['title']; ?></span> was successfully added.</div>

	<?php
				endif; /* SQL Error */
				$mysqli->close();
			endif; /* DB Connection Connection Error */
		endif; /* Required input validtion */
	?>

			</div> <!-- .col -->
		</div> <!-- .row -->

		<div class="row mt-4 mb-4">
			<div class="col-12">
				<a href="add_form.php" role="button" class="btn btn-primary">Back to Add Form</a>
			</div> <!-- .col -->
		</div> <!-- .row -->

	</div> <!-- .container -->

</body>
</html>