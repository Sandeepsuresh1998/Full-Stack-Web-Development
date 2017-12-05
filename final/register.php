<?php
require 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Confirmation</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
</head>
<body>

	<div class="container">
		<div class="row">
			<h1 class="col-12 mt-4">User Registration</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->

	<div class="container">

		<div class="row mt-4">
			<div class="col-12">

<?php

if ( !isset($_POST['email']) || empty($_POST['email'])
	|| !isset($_POST['full-name']) || empty($_POST['full-name'])
	|| !isset($_POST['password']) || empty($_POST['password'])
) :

// Error. Required Input Empty.
?>

<div class="text-danger">Please fill out all required fields.</div>

<?php


else :

// All required fields provided.

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, USER_DB_NAME);

	if ($mysqli->connect_errno) :
		echo $mysqli->connect_error;
	else:
		// Connection successful

		// $mysqli->real_escape_string() escapes special characters like apostrophes.

		//Get the person with this unique email
		$sql = "SELECT * FROM users
						WHERE email = '"
						.$mysqli->real_escape_string($_POST['email'])
						."'"
						.";";

		$results = $mysqli->query($sql);
		// TODO: Check for SQL Error.

		if(!$results) : 
			//SQL Error
			echo "Something went wrong on our end! Sorry.";
		else :
			//NO SQL Error

			//The results returned back a user with the given email.
			if ($results->num_rows > 0) :
				// Found email or full-name in the DB.
				echo "This email has already been registered.";
			else :

				//Hashing the password to store in the DB
				$password = hash('sha256', $_POST['password']);

				$sql = "INSERT INTO users (name, email, password, state_id, party_id)
								VALUES ('"
								. $mysqli->real_escape_string($_POST['full-name'])
								. "', '"
								. $mysqli->real_escape_string($_POST['email'])
								. "', '"
								. $mysqli->real_escape_string($password)
								. "', "
								. $_POST['state']
								. ", "
								. $_POST['party']
								. ");";

				echo $sql;

				$results = $mysqli->query($sql);

				if (!$results) :
					echo "Something went wrong when we tried to add you to the database! Are you a virus?";
					echo $mysqli->error;
				else :

					$to = $_POST['email'];
					$subject = "Welcome to Trump Thoughts";
					$msg = "<h1>Hello!</h1>
									<div>You now have an inside scoop to the consciousness of our President! Please share with your friends and family, so we as a nation can be better informed on who we are voting for in 2020!</div>";
					$headers = "Content-Type: text/html"
										."\r\n"
										."From: no-reply@trump.gov";

					mail($to, $subject, $msg, $headers);

	?>
		<div class="text-success">
			User <?php echo $_POST['full-name']; ?> was successfully registered.
		</div>
	<?php
				endif; /* ELSE for inserting user into DB */
			endif; /* ELSE for duplicate email/full-name error. */
			$mysqli->close();
		endif; /* ELSE for DB Connection Error */
	endif;
endif; /* ELSE for empty input validation */
?>

		</div> <!-- .col -->
	</div> <!-- .row -->

	<div class="row mt-4 mb-4">
		<div class="col-12">
			<a href="login.php" role="button" class="btn btn-primary">Login</a>
			<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" role="button" class="btn btn-light">Back</a>
		</div> <!-- .col -->
	</div> <!-- .row -->

</div> <!-- .container -->

</body>
</html>