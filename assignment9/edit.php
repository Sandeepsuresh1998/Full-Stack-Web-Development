<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Form | DVD Database</title>
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

	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php">Home</a></li>
		<li class="breadcrumb-item"><a href="form.php">Search</a></li>
		<li class="breadcrumb-item"><a href="search.php">Results</a></li>
		<li class="breadcrumb-item active">Edit</li>
	</ol>

	<div class="container">
		<div class="row">
			<h1 class="col-12 mt-4 mb-4">Edit a DVD</h1>
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

			if ($mysqli->connect_errno) :
				//Connection error
				echo "Something went wrong";
				echo $mysqli->error;
			else :
				// Connection success
				$mysqli->set_charset('utf8');

				//Get all the information on the current DVD
				$sql_dvd = "SELECT *
							FROM dvd_titles
							WHERE dvd_title_id = " . $_GET['dvd_title_id'] . ";";

				//Get all the other fields
				$sql_genres = "SELECT * FROM genres;";
				$sql_ratings = "SELECT * FROM ratings;";
				$sql_labels = "SELECT * FROM labels;";
				$sql_formats = "SELECT * FROM formats;";
				$sql_sounds = "SELECT * FROM sounds;";

				$results_genres = $mysqli->query($sql_genres);
				$results_ratings = $mysqli->query($sql_ratings);
				$results_labels = $mysqli->query($sql_labels);
				$results_formats = $mysqli->query($sql_formats);
				$results_sounds = $mysqli->query($sql_sounds);

				$results_dvd = $mysqli->query($sql_dvd);

				// TODO Check if any of the query failed

				if (!$results_genres || !$results_ratings || !$results_labels || !$results_formats || !$results_sounds) :

					?> 

					<div>
						SQL Error: 
						<?php echo $mysqli->error; ?>
					</div>

				<?php
					else : 
						$row_dvd = $results_dvd->fetch_assoc();
		?>
			
				<form action="update.php" method="POST">

					<div class="form-group row">
						<label for="title-id" class="col-sm-3 col-form-label text-sm-right">DVD Title: <span class="text-danger">*</span></label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="title-id" name="title" 
							value="<?php echo $row_dvd['title']; ?>">
						</div>
					</div> <!-- .form-group -->

					<div class="form-group row">
						<label for="release-date-id" class="col-sm-3 col-form-label text-sm-right">Release Date:</label>
						<div class="col-sm-9">
							<input type="date" class="form-control" id="release-date-id" name="release_date" value="<?php echo $row_dvd['release_date']; ?>">
						</div>
					</div> <!-- .form-group -->

					<div class="form-group row">
						<label for="label-id" class="col-sm-3 col-form-label text-sm-right">Label:</label>
						<div class="col-sm-9">
							<select name="label" id="label-id" class="form-control">
								<option value="label" selected disabled>-- Select One --</option>

								<?php while( $row = $results_labels->fetch_assoc() ) : ?>

									<?php 
										// If we found the dvd's album
										if (!empty($row['label_id']) && $row['label_id'] == $row_dvd['label_id']) :
									?>
											<option value="<?php echo $row['label_id']; ?>" selected>
												<?php echo $row['label'] ?>
											</option>
									<?php else : ?>

											<option value="<?php echo $row['label_id']; ?>">
												<?php echo $row['label'] ?>
											</option>

									<?php endif;?>

								<?php endwhile; ?>

							</select>
						</div>
					</div> <!-- .form-group -->

					<div class="form-group row">
						<label for="sound-id" class="col-sm-3 col-form-label text-sm-right">Sound:</label>
						<div class="col-sm-9">
							<select name="sound" id="sound-id" class="form-control">
								<option value="sound" selected disabled>-- Select One --</option>
								<?php while( $row = $results_sounds->fetch_assoc() ) : ?>

									<?php 
										// If we found the dvd's album
										if (!empty($row['sound_id']) && $row['sound_id'] == $row_dvd['sound_id']) :
									?>
											<option value="<?php echo $row['sound_id']; ?>" selected>
												<?php echo $row['sound'] ?>
											</option>
									<?php else : ?>

											<option value="<?php echo $row['sound_id']; ?>">
												<?php echo $row['sound'] ?>
											</option>

									<?php endif;?>

								<?php endwhile; ?>
							</select>
						</div>
					</div> <!-- .form-group -->

					<div class="form-group row">
						<label for="genre-id" class="col-sm-3 col-form-label text-sm-right">Genre:</label>
						<div class="col-sm-9">
							<select name="genre" id="genre-id" class="form-control">
								<option value="genre" selected disabled>-- Select One --</option>
								<?php while( $row = $results_genres->fetch_assoc() ) : ?>

									<?php 
										// If we found the dvd's album
										if (!empty($row['genre_id']) && $row['genre_id'] == $row_dvd['genre_id']) :
									?>
											<option value="<?php echo $row['genre_id']; ?>" selected>
												<?php echo $row['genre'] ?>
											</option>
									<?php else : ?>

											<option value="<?php echo $row['genre_id']; ?>">
												<?php echo $row['genre'] ?>
											</option>

									<?php endif;?>

								<?php endwhile; ?>
							</select>
						</div>
					</div> <!-- .form-group -->

					<div class="form-group row">
						<label for="rating-id" class="col-sm-3 col-form-label text-sm-right">Rating:</label>
						<div class="col-sm-9">
							<select name="rating" id="rating-id" class="form-control">
								<option value="rating" selected disabled>-- Select One --</option>
								<?php while( $row = $results_ratings->fetch_assoc() ) : ?>

									<?php 
										// If we found the dvd's album
										if (!empty($row['rating_id']) && $row['rating_id'] == $row_dvd['rating_id']) :
									?>
											<option value="<?php echo $row['rating_id']; ?>" selected>
												<?php echo $row['rating'] ?>
											</option>
									<?php else : ?>

											<option value="<?php echo $row['rating_id']; ?>">
												<?php echo $row['rating'] ?>
											</option>

									<?php endif;?>

								<?php endwhile; ?>
							</select>
						</div>
					</div> <!-- .form-group -->

					<div class="form-group row">
						<label for="format-id" class="col-sm-3 col-form-label text-sm-right">Format:</label>
						<div class="col-sm-9">
							<select name="format" id="format-id" class="form-control">
								<option value="format" selected disabled>-- Select One --</option>
								<?php while( $row = $results_formats->fetch_assoc() ) : ?>

									<?php 
										// If we found the dvd's album
										if (!empty($row['format_id']) && $row['format_id'] == $row_dvd['format_id']) :
									?>
											<option value="<?php echo $row['format_id']; ?>" selected>
												<?php echo $row['format'] ?>
											</option>
									<?php else : ?>

											<option value="<?php echo $row['sound_id']; ?>">
												<?php echo $row['format'] ?>
											</option>

									<?php endif;?>

								<?php endwhile; ?>
							</select>
						</div>
					</div> <!-- .form-group -->

					<div class="form-group row">
						<label for="award-id" class="col-sm-3 col-form-label text-sm-right">Award:</label>
						<div class="col-sm-9">
							<textarea name="award" id="award-id" class="form-control"><?php echo $row_dvd['award']; ?></textarea>
						</div>
					</div> <!-- .form-group -->

					<div class="form-group row">
						<div class="ml-auto col-sm-9">
							<span class="text-danger font-italic">* Required</span>
						</div>
					</div> <!-- .form-group -->

					<!-- <input type="hidden" name="dvd_title_id" value="839"> -->
					
					<div class="form-group row">
						<div class="col-sm-3"></div>
						<div class="col-sm-9 mt-2">
							<button type="submit" class="btn btn-primary">Submit</button>
							<button type="reset" class="btn btn-light">Reset</button>
						</div>
					</div> <!-- .form-group -->

				</form>

		<?php 
			endif;
			$mysqli->close(); 
		endif;
		?>

				
	</div> <!-- .container -->
</body>
</html>