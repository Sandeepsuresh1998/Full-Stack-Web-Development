<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DVD Search Form | Assignment 8</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">

	<style>
	.form-check-label {
		padding-top: calc(.5rem - 1px * 2);
		padding-bottom: calc(.5rem - 1px * 2);
		margin-bottom: 0;
	}
</style>
</head>
<body>

	<div class="container">
		<div class="row">
			<h1 class="col-12 mt-4 mb-4">DVD Search Form</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->

	<div class="container">
		<?php

			$host = "303.itpwebdev.com";
			$user = "sureshsa_db_user";
			$pass = "Suresh98?";
			$db = "sureshsa_dvd_db";

			// 1. Establish DB Connection.
			$mysqli = new mysqli($host, $user, $pass, $db);

			if ($mysqli->connect_errno) {
				// Connection Error
				echo $mysqli->connect_error;
			} else {
				//Successful connection

				//All SQL statements for the different categories.
				$sql_genres = "SELECT * FROM genres;";
				$sql_ratings = "SELECT * FROM ratings;";
				$sql_labels = "SELECT * FROM labels;";
				$sql_formats = "SELECT * FROM formats;";
				$sql_sounds = "SELECT * FROM sounds;";

				//All the php to get results for each option bar.
				$results_genres = $mysqli->query($sql_genres);
				$results_ratings = $mysqli->query($sql_ratings);
				$results_labels = $mysqli->query($sql_labels);
				$results_formats = $mysqli->query($sql_formats);
				$results_sounds = $mysqli->query($sql_sounds);

				//Making sure there is no error with the queries
				if(!$results_genres || !$results_ratings || !$results_labels || !$results_formats || !$results_sounds) {
					echo "SQL Error";
					exit();
				} 					
			}
		?>
		
				<form action="search.php" method="GET">

					<div class="form-group row">
						<label for="title-id" class="col-sm-3 col-form-label text-sm-right">DVD Title:</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="title-id" name="dvd_title">
						</div>
					</div> <!-- .form-group -->

					<div class="form-group row">
						<label for="genre-id" class="col-sm-3 col-form-label text-sm-right">Genre:</label>
						<div class="col-sm-9">
							<select name="genre" id="genre-id" class="form-control">
								<option value="" selected>-- All --</option>
								<!-- Dynamically Allocating the options -->	
								<?php 
									while ($row = $results_genres->fetch_assoc()) :
								?>
									<option value="<?php echo $row['genre_id']; ?>" id="<?php echo $row['genre_id']; ?>">
										<?php echo $row['genre'] ?>
									</option>

								<?php
									endwhile;
								?>

							</select>
						</div>
					</div> <!-- .form-group -->

					<div class="form-group row">
						<label for="rating-id" class="col-sm-3 col-form-label text-sm-right">Rating:</label>
						<div class="col-sm-9">
							<select name="rating" id="rating-id" class="form-control">
								<option value="" selected>-- All --</option>
								<!-- Dynamically Allocating the options -->
								<?php 
									while ($row = $results_ratings->fetch_assoc()) :
								?>
									<option value="<?php echo $row['rating_id']; ?>" id="<?php echo $row['rating_id']; ?>">
										<?php echo $row['rating'] ?>
									</option>

								<?php
									endwhile;
								?>	
							</select>
						</div>
					</div> <!-- .form-group -->

					<div class="form-group row">
						<label for="label-id" class="col-sm-3 col-form-label text-sm-right">Label:</label>
						<div class="col-sm-9">
							<select name="label" id="label-id" class="form-control">
								<option value="" selected>-- All --</option>
								<!-- Dynamically Allocating the options -->
								<?php 
									while ($row = $results_labels->fetch_assoc()) :
								?>
									<option value="<?php echo $row['label_id']; ?>" id="<?php echo $row['label_id']; ?>">
										<?php echo $row['label'] ?>
									</option>

								<?php
									endwhile;
								?>
							</select>
						</div>
					</div> <!-- .form-group -->

					<div class="form-group row">
						<label for="format-id" class="col-sm-3 col-form-label text-sm-right">Format:</label>
						<div class="col-sm-9">
							<select name="format" id="format-id" class="form-control">
								<option value="" selected>-- All --</option>
								<!-- Dynamically Allocating the options -->
								<?php 
									while ($row = $results_formats->fetch_assoc()) :
								?>
									<option value="<?php echo $row['format_id']; ?>" id="<?php echo $row['format_id']; ?>">
										<?php echo $row['format'] ?>
									</option>

								<?php
									endwhile;
								?>
							</select>
						</div>
					</div> <!-- .form-group -->

					<div class="form-group row">
						<label for="sound-id" class="col-sm-3 col-form-label text-sm-right">Sound:</label>
						<div class="col-sm-9">
							<select name="sound" id="sound-id" class="form-control">
								<option value="" selected>-- All --</option>
								<!-- Dynamically Allocating the options -->
								<?php 
									while ($row = $results_sounds->fetch_assoc()) :
								?>
									<option value="<?php echo $row['sound_id']; ?>" id="<?php echo $row['sound_id']; ?>">
										<?php echo $row['sound'] ?>
									</option>

								<?php
									endwhile;
								?>
							</select>
						</div>
					</div> <!-- .form-group -->

					<div class="form-group row">
						<label for="award-id" class="col-sm-3 col-form-label text-sm-right">Award:</label>
						<div class="col-sm-9">
							<div class="form-check form-check-inline">
								<label class="form-check-label">
									<input class="form-check-input mr-2" type="radio" name="award" id="inlineCheckbox3" value="any" checked>Any
								</label>
							</div>
							<div class="form-check form-check-inline">
								<label class="form-check-label">
									<input class="form-check-input mr-2" type="radio" name="award" id="inlineCheckbox1" value="yes">Yes
								</label>
							</div>
							<div class="form-check form-check-inline">
								<label class="form-check-label">
									<input class="form-check-input mr-2" type="radio" name="award" id="inlineCheckbox2" value="no">No
								</label>
							</div>
						</div>
					</div> <!-- .form-group -->

					<div class="form-group row">
						<label for="date-id" class="col-sm-3 col-form-label text-sm-right">Release Date:</label>
						<div class="col-sm-9">
							<div class="row">
								<div class="col">
									<label class="form-check-label">
										From: 
										<input type="date" class="form-control mt-2" name="release_date_from">
									</label>
								</div> <!-- .col -->
								<div class="col">
									<label class="form-check-label">
										to: 
										<input type="date" class="form-control mt-2" name="release_date_to">
									</label>
								</div> <!-- .col -->
							</div> <!-- .row -->
						</div> <!-- .col -->
					</div> <!-- .form-group -->

					<div class="form-group row">
						<div class="col-sm-3"></div>
						<div class="col-sm-9 mt-2">
							<button type="submit" class="btn btn-primary">Search</button>
							<button type="reset" class="btn btn-light">Reset</button>
						</div>
					</div> <!-- .form-group -->

				</form>

				
	</div> <!-- .container -->
</body>
</html>