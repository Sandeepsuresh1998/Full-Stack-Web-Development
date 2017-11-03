
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update | DVD Database</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
</head>
<body>

	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php">Home</a></li>
		<li class="breadcrumb-item"><a href="form.php">Search</a></li>
		<li class="breadcrumb-item"><a href="search.php">Results</a></li>
		<li class="breadcrumb-item"><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Edit</a></li>
		<li class="breadcrumb-item active">Update</li>
	</ol>

	<div class="container">
		<div class="row">
			<h1 class="col-12 mt-4">Update a DVD</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->

	<div class="container">

		<div class="row mt-4">
			<div class="col-12">
				<?php 

				if ( !isset($_POST['title']) || empty($_POST['title'])) :
							echo "We are missing some information";
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

						$release_date = "null";
						$label_id = "null";
						$sound_id = "null";
						$genre_id = "null";
						$rating_id = "null";
						$format_id = "null";
						$award = "null";

						//Check if the optional fields have been given
						if ( isset($_POST['release_date']) && !empty($_POST['release_date']) ) {
							$release_date = "'" . $_POST['release_date'] . "'";
						}

						if ( isset($_POST['label']) && !empty($_POST['label']) ) {
							$label_id = $_POST['label'];
						}

						if ( isset($_POST['sound']) && !empty($_POST['sound']) ) {
							$sound_id = $_POST['sound'];
						}

						if ( isset($_POST['genre']) && !empty($_POST['genre']) ) {
							$genre_id = $_POST['genre'];
						}

						if ( isset($_POST['rating']) && !empty($_POST['rating']) ) {
							$rating_id = $_POST['rating'];
						}

						if ( isset($_POST['format']) && !empty($_POST['format']) ) {
							$format_id = $_POST['format'];
						}

						if ( isset($_POST['award']) && !empty($_POST['award']) ) {
							$award = "'" . $_POST['award'] .  "'";
						}





						$sql = "UPDATE dvd_titles
									SET title = '" . $_POST['title'] ."',
									release_date = ". $release_date .",
									label_id = ".$label_id. ",
									sound_id = ". $sound_id .",
									genre_id = ". $genre_id .",
									rating_id = ". $rating_id .",
									format_id = ". $format_id .",
									award = ". $award ."
									WHERE dvd_title_id = ".$_POST['dvd_title_id'].";";
									
						$results = $mysqli->query($sql);

						if( !$results ) :
							//SQL error
							echo "SQL Error";
							echo $mysqli->error;
						else :
							//SQL Success
				?>
				
						<div class="text-success"><span class="font-italic"><?php echo $_POST['title']; ?></span> was successfully updated.</div>

				<?php 
						endif;
						$mysqli->close();
					endif;
				endif;
				?>
		</div> <!-- .col -->
	</div> <!-- .row -->

	<div class="row mt-4 mb-4">
		<div class="col-12">
			<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Back to Edit Form</a>
		</div> <!-- .col -->
	</div> <!-- .row -->

</div> <!-- .container -->

</body>
</html>