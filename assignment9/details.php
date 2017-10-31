<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Song Details | Song Database</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
</head>
<body>

	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php">Home</a></li>
		<li class="breadcrumb-item"><a href="search_form.php">Search</a></li>
		<li class="breadcrumb-item"><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Results</a></li>
		<li class="breadcrumb-item active">Details</li>
	</ol>

	<div class="container">
		<div class="row">
			<h1 class="col-12 mt-4">DVD Details</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->

	<div class="container">

		<div class="row mt-4">
			<div class="col-12">
	<?php
	if (!isset($_GET['dvd_title_id']) || empty($_GET['dvd_title_id'])) :
		echo "Invalid Track ID";
	else :

	$host = "303.itpwebdev.com";
	$user = "sureshsa_db_user";
	$pass = "Suresh98?";
	$db = "sureshsa_dvd_db";

	$mysqli = new mysqli($host, $user, $pass, $db);

	if ($mysqli->connect_errno) :
		echo $mysqli->connect_error;
	else :
		// Connection success
		$mysqli->set_charset('utf8');

		$sql = "SELECT title AS dvd_title, release_date AS release_date, award AS Award, genres.genre AS dvd_genre, ratings.rating AS rating, labels.label AS label, formats.format AS format, sounds.sound AS sound
						FROM dvd_titles
						LEFT JOIN genres
							ON dvd_titles.genre_id = genres.genre_id
						LEFT JOIN ratings
							ON dvd_titles.rating_id = ratings.rating_id
						LEFT JOIN labels
							ON dvd_titles.label_id = labels.label_id
						LEFT JOIN formats
							ON dvd_titles.format_id = formats.format_id
						LEFT JOIN sounds
							ON dvd_titles.sound_id = sounds.sound_id
						WHERE dvd_title_id = "
						. $_GET['dvd_title_id']
						.";";

				$results = $mysqli->query($sql);

				if (!$results) :
					echo $mysqli->error;
				else :

					$row = $results->fetch_assoc();

	?>

				<table class="table table-responsive">

					<tr>
						<th class="text-right">DVD Title:</th>
						<td><?php echo $row['dvd_title']; ?></td>
					</tr>

					<tr>
						<th class="text-right">Release Date:</th>
						<td><?php echo $row['release_date']; ?></td>
					</tr>

					<tr>
						<th class="text-right">Award:</th>
						<td><?php echo $row['Award']; ?></td>
					</tr>

					<tr>
						<th class="text-right">Genre:</th>
						<td><?php echo $row['dvd_genre']; ?></td>
					</tr>

					<tr>
						<th class="text-right">Rating:</th>
						<td><?php echo $row['rating']; ?></td>
					</tr>

					<tr>
						<th class="text-right">Label:</th>
						<td><?php echo $row['label']; ?></td>
					</tr>

					<tr>
						<th class="text-right">Format:</th>
						<td><?php echo $row['format']; ?></td>
					</tr>

					<tr>
						<th class="text-right">Sound:</th>
						<td><?php echo $row['sound']; ?></td>
					</tr>

				</table>

<?php
			endif; /* SQL Error */
		$mysqli->close();
	endif; /* DB Connection Error */
endif; /* Missing Track ID */
?>

			</div> <!-- .col -->
		</div> <!-- .row -->

		<div class="row mt-4 mb-4">
			<div class="col-12">
				<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" role="button" class="btn btn-primary">Back to Search Results</a>
			</div> <!-- .col -->
		</div> <!-- .row -->

	</div> <!-- .container -->

</body>
</html>