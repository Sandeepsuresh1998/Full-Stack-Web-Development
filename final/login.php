<?php
session_start();
require 'config.php';

// Check whether user is logged in.
if ( !isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false ) {
	// User is not logged in.

	$login_error = false;

	// Check whether form was submitted
	if ( isset($_POST['email']) && isset($_POST['password']) ) {
		// Form was submitted

		if ( empty($_POST['email']) || empty($_POST['password']) ) {
			// Missing email or pass.
			$login_error = 'empty';
		} else {

			$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, USER_DB_NAME);
			// TODO: DB Connection Error Check.

			$password = hash('sha256', $_POST['password']);

			$sql = "SELECT * FROM users
							WHERE email = '"
							. $mysqli->real_escape_string($_POST['email'])
							."'
							AND password = '"
							. $mysqli->real_escape_string($password)
							."';";

			$results = $mysqli->query($sql);
			// TODO: Check for SQL Errors.

			if ( $results->num_rows == 1 ) {
				// Correct Credentials
				$_SESSION['logged_in'] = true;
				$_SESSION['email'] = $_POST['email'];
				header('Location: index.php');
			} else {
				// Invalid credentials
				$login_error = 'invalid';
			}
		}

	}

} else {
	// User is already logged in.
	header('Location: index.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login | Trump Thoughts</title>
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
			<h1 class="col-12 mt-4 mb-4">User Login</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->

	<div class="container">

		<form action="login.php" method="POST">

			<div class="row mb-3">
				<div class="font-italic text-danger col-sm-9 ml-sm-auto">

		<?php if ( $login_error == 'empty' ) : ?>
			Please enter email and password.
		<?php endif; ?>

		<?php if ( $login_error == 'invalid' ) : ?>
			Invalid email or password.
		<?php endif; ?>

				</div>
			</div> <!-- .row -->
			

			<div class="form-group row">
				<label for="email-id" class="col-sm-3 col-form-label text-sm-right">Email:</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="email-id" name="email">
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<label for="password-id" class="col-sm-3 col-form-label text-sm-right">Password:</label>
				<div class="col-sm-9">
					<input type="password" class="form-control" id="password-id" name="password">
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<div class="col-sm-3"></div>
				<div class="col-sm-9 mt-2">
					<button type="submit" class="btn btn-primary">Login</button>
					<a href="../song-db" role="button" class="btn btn-light">Cancel</a>
				</div>
			</div> <!-- .form-group -->

			<div class="row">
				<div class="col-sm-9 ml-sm-auto">
					<a href="registration.php">Create an account</a>
				</div>
			</div> <!-- .row -->
		</form>

	</div> <!-- .container -->
</body>
</html>