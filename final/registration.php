<?php
	require 'config.php'; 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register | Trump Tweets</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<style>
	.form-check-label {
		padding-top: calc(.5rem - 1px * 2);
		padding-bottom: calc(.5rem - 1px * 2);
		margin-bottom: 0;
	}

	.text-sm-right {
		text-align: right;
	}
</style>
</head>
<body>

	<?php include 'nav.php'; ?>

	<div class="container">
		<div class="row">
			<h1 class="col-12">User Registration</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->


	<?php
		// 1. Establish DB Connection.
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		//Start of SQL code. 
		if ($mysqli->connect_errno) :
			// Connection Error
			echo $mysqli->connect_error;
		else :	
			// Connection Success

			//SQL Code needed to get political parties and states as options
			$sql_parties = "SELECT * FROM political_parties";
			$sql_states	= "SELECT * FROM states";

			$results_parties = $mysqli->query($sql_parties);
			$results_states = $mysqli->query($sql_states);

			if (!$results_parties || !$results_states) :
				// Some kind of SQL Error
				echo "Something went wrong on our end! Sorry.";
			else :
	?>	

	<div class="container">

		<form action="register.php" method="POST">		

			<div class="row mb-3">
				<div id="form-error" class="col-sm-9 ml-sm-auto font-italic text-danger">
				</div>
			</div> <!-- .row -->

			<div class="form-group row">
				<label for="full-name-id" class="col-sm-3 col-form-label text-sm-right">Full Name: <span class="text-danger">*</span></label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="full-name-id" name="full-name">
				</div>
			</div> <!-- Full Name -->

			<div class="form-group row">
				<label for="email-id" class="col-sm-3 col-form-label text-sm-right">Email: <span class="text-danger">*</span></label>
				<div class="col-sm-9">
					<input type="email" class="form-control" id="email-id" name="email">
				</div>
			</div> <!-- Email -->	

			<div class="form-group row">
				<label for="party-id" class="col-sm-3 col-form-label text-sm-right">Political Party: <span class="text-danger">*</span></label>
				<div class="col-sm-9">
					<select name="party" id="party-id" class="form-control">
						<option value="">-- Please Select A Party --</option>
						<?php 
							while ($row_party = $results_parties->fetch_assoc()) :
						?>
								<option value="<?php echo $row_party['party_id']; ?>">
									<?php echo $row_party['name']; ?> <!-- Get the name of the party -->
								</option>

						<?php
							endwhile;
						?>

					</select>
				</div>
			</div>


			<div class="form-group row">
				<label for="state-id" class="col-sm-3 col-form-label text-sm-right">State: <span class="text-danger">*</span></label>
				<div class="col-sm-9">
					<select name="state" id="state-id" class="form-control">
						<option value="">-- Please Select A State --</option>
						<?php 
							while ($row_state = $results_states->fetch_assoc()) :
						?>
								<option value="<?php echo $row_state['state_id']; ?>">
									<?php echo $row_state['name']; ?> <!-- Get the name of the state -->
								</option>

						<?php
							endwhile;
						?>

					</select>
				</div>
			</div>


			<div class="form-group row">
				<label for="password-id" class="col-sm-3 col-form-label text-sm-right">Password: <span class="text-danger">*</span></label>
				<div class="col-sm-9">
					<input type="password" class="form-control" id="password-id" name="password">
				</div>
			</div> <!-- Password -->

			<div class="form-group row">
				<label for="confirm-password-id" class="col-sm-3 col-form-label text-sm-right">Confirm Password: <span class="text-danger">*</span></label>
				<div class="col-sm-9">
					<input type="password" class="form-control" id="confirm-password-id" name="confirm-password">
				</div>
			</div> <!-- Confirm Password -->



			<div class="row">
				<div class="ml-auto col-sm-9">
					<span class="text-danger font-italic">* Required</span>
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<div class="col-sm-3"></div>
				<div class="col-sm-9 mt-3">
					<button type="submit" class="btn btn-primary">Register</button>
					<a href="index.php" role="button" class="btn btn-light">Cancel</a>
				</div>
			</div> <!-- .form-group -->

			<div class="row">
				<div class="col-sm-9 ml-sm-auto">
					<a href="login.php">I already have an account!</a>
				</div>
			</div> <!-- .row -->

		</form>

	</div> <!-- .container -->

	<?php 
		endif;
		$mysqli->close();
	endif;

	?>

	<script>

		document.querySelector('form').onsubmit = function(){

			//Some fields are not filled in
			if ( document.querySelector('#email-id').value.trim().length == 0
				|| document.querySelector('#full-name-id').value.trim().length == 0
				|| document.querySelector('#password-id').value.trim().length == 0 
				|| document.querySelector('#confirm-password-id').value.trim().length == 0) {

				document.querySelector('#form-error').innerHTML = 'Please fill out all required fields.';

				return false;
				
			}
			else if (document.querySelector('#password-id').value != document.querySelector('#confirm-password-id').value) {
				//The passwords don't match
				document.querySelector('#form-error').innerHTML = 'Passwords do not match';

				return false;
			}
		}

		var d = document.getElementById('registration');
		d.className += " active";

	</script>

</body>
</html>