
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Form | DVD Database</title>
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
		<li class="breadcrumb-item active">Add</li>
	</ol>

	<div class="container">
		<div class="row">
			<h1 class="col-12 mt-4 mb-4">Add a DVD</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->

	<!-- Connect to Database -->
	<?php 
		$host = "303.itpwebdev.com";
		$user = "sureshsa_db_user";
		$pass = "Suresh98?";
		$db = "sureshsa_dvd_db";

				// 1. Establish DB Connection
		$mysqli = new mysqli($host, $user, $pass, $db);

		if ( $mysqli->connect_errno ) :

	?>
			<div>
				MySQL Connection Error:
				<?php echo $mysqli->connect_error; ?>
			</div>
	<?php else : ?>

		<?php  

			$mysqli->set_charset('utf8'); //Setting encoding

			$sql_label = "SELECT * FROM labels;";
			$sql_sound = "SELECT * FROM sounds;";
			$sql_genre = "SELECT * FROM genres;";
			$sql_rating = "SELECT * FROM ratings;";
			$sql_format = "SELECT * FROM formats;";


			//Submit the queries.
			$results_label = $mysqli->query($sql_label);
			$results_sound = $mysqli->query($sql_sound);
			$results_genre = $mysqli->query($sql_genre);
			$results_rating = $mysqli->query($sql_rating);
			$results_format = $mysqli->query($sql_format);

			//Check for errors in the queries
			if( !$results_label || !$results_sound || !$results_genre || !$results_rating || !$results_rating || !$results_format) :

		?>

				<div class="text-danger">
					SQL Error:
					<?php echo $mysqli->error; ?>
				</div>
		<?php 
			else :
		?>

	<div class="container">

				<form action="add_confirmation.php" method="POST">

					<div class="form-group row">
						<label for="title-id" class="col-sm-3 col-form-label text-sm-right">Title: <span class="text-danger">*</span></label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="title-id" name="title">
						</div>
					</div> <!-- End of Title -->

					<div class="form-group row">
						<label for="release-date-id" class="col-sm-3 col-form-label text-sm-right">Release Date:</label>
						<div class="col-sm-9">
							<input type="date" class="form-control" id="release-date-id" name="release_date">
						</div>
					</div> <!-- End of Release Date -->


					<div class="form-group row">
						<label for="label-id" class="col-sm-3 col-form-label text-sm-right">Label:</label>
						<div class="col-sm-9">
							<select name="label" id="label-id" class="form-control">
								<option value="" selected disabled>-- Select One --</option>

								<?php while($row = $results_label->fetch_assoc() ) : ?>

									<option value="<php echo $row['label_id']; ?>">
										<?php echo $row['label'] ?>	
									</option>

								<?php endwhile; ?>

							</select>
						</div>
					</div> <!-- End of Labels-->

					<div class="form-group row">
						<label for="sound-id" class="col-sm-3 col-form-label text-sm-right">Sound:</label>
						<div class="col-sm-9">
							<select name="sound" id="sound-id" class="form-control">
								<option value="" selected disabled>-- Select One --</option>
								<?php while($row = $results_sound->fetch_assoc() ) : ?>

									<option value="<php echo $row['sound_id']; ?>">
										<?php echo $row['sound'] ?>	
									</option>

								<?php endwhile; ?>
							</select>
						</div>
					</div> <!-- End of Sound -->

					<div class="form-group row">
						<label for="genre-id" class="col-sm-3 col-form-label text-sm-right">Genre:</label>
						<div class="col-sm-9">
							<select name="genre" id="genre-id" class="form-control">
								<option value="" selected disabled>-- Select One --</option>
								<?php while($row = $results_genre->fetch_assoc() ) : ?>

									<option value="<php echo $row['genre_id']; ?>">
										<?php echo $row['genre'] ?>	
									</option>

								<?php endwhile; ?>
							</select>
						</div>
					</div> <!-- End of Genre -->

					<div class="form-group row">
						<label for="rating-id" class="col-sm-3 col-form-label text-sm-right">Rating:</label>
						<div class="col-sm-9">
							<select name="rating" id="rating-id" class="form-control">
								<option value="" selected disabled>-- Select One --</option>
								<?php while($row = $results_rating->fetch_assoc() ) : ?>

									<option value="<php echo $row['rating_id']; ?>">
										<?php echo $row['rating'] ?>	
									</option>

								<?php endwhile; ?>
							</select>
						</div>
					</div> <!-- End of Ratings -->

					<div class="form-group row">
						<label for="format-id" class="col-sm-3 col-form-label text-sm-right">Format:</label>
						<div class="col-sm-9">
							<select name="format" id="format-id" class="form-control">
								<option value="" selected disabled>-- Select One --</option>
								<?php while($row = $results_format->fetch_assoc() ) : ?>

									<option value="<php echo $row['format_id']; ?>">
										<?php echo $row['format'] ?>	
									</option>

								<?php endwhile; ?>
							</select>
						</div>
					</div> <!-- End of Formats -->

					<div class="form-group row">
						<label for="award-id" class="col-sm-3 col-form-label text-sm-right">Award:</label>
						<div class="col-sm-9">
							<textarea name="award" id="award-id" class="form-control"></textarea>
						</div>
					</div> <!-- End of Award -->

					<div class="form-group row">
						<div class="ml-auto col-sm-9">
							<span class="text-danger font-italic">* Required</span>
						</div>
					</div> <!-- .form-group -->
					
					<div class="form-group row">
						<div class="col-sm-3"></div>
						<div class="col-sm-9 mt-2">
							<button type="submit" class="btn btn-primary">Submit</button>
							<button type="reset" class="btn btn-light">Reset</button>
						</div>
					</div> <!-- .form-group -->

				</form>

			<?php 
					endif; //End of Query Error 
					$mysqli->close();
				endif; //End of connection error
			?>
				
	</div> <!-- .container -->
</body>
</html>