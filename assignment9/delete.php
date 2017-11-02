
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Delete | DVD Database</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
</head>
<body>

	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php">Home</a></li>
		<li class="breadcrumb-item"><a href="search.php">Search</a></li>
		<li class="breadcrumb-item"><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Results</a></li>
		<li class="breadcrumb-item active">Delete</li>
	</ol>

	<div class="container">
		<div class="row">
			<h1 class="col-12 mt-4">Delete a DVD</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->

	<div class="container">

		<div class="row mt-4">
			<div class="col-12">
				<!-- Check if the dvd id is there --> 
				<?php 
					if( !isset($_GET['dvd_title_id']) || empty($_GET['dvd_title_id'])) :

				?>
						<!-- Invalid title id -->
						<div class="text-danger">
							Invalid title ID
						</div> 
				<?php else : ?>
					<?php 
						$host = "303.itpwebdev.com";
						$user = "sureshsa_db_user";
						$pass = "Suresh98?";
						$db = "sureshsa_dvd_db";

						// 1. Establish DB Connection.
						$mysqli = new mysqli($host, $user, $pass, $db);

						if($mysqli->connect_errno) :
							//Some kind of connection error 
							echo "Connection error";
							echo $mysqli->error;
						else :

							$sql_delete = "DELETE FROM dvd_titles
												WHERE dvd_title_id = " . $_GET['dvd_title_id'] . ";";

							$results = $mysqli->query($sql_delete);

							if(!$results) :
								echo "SQL Error";
							else : 
								//Deleting Success
					?>
						<div class="text-success"><span class="font-italic"><?php echo $_POST['title']; ?></div>
					<?php 
								endif;
								$mysqli->close();
							endif;
						endif; ?>

						
		</div> <!-- .col -->
	</div> <!-- .row -->

	<div class="row mt-4 mb-4">
		<div class="col-12">
			<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Back to Search Results</a>
		</div> <!-- .col -->
	</div> <!-- .row -->

</div> <!-- .container -->

</body>
</html>