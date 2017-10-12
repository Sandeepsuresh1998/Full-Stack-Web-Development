<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lab 8</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<h1 class="col-12 mt-4">Lab 8: PHP Page</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->

	<div class="container">

		<div class="row">
			<h2 class="col-12 mt-4">Form</h2>
		</div> <!-- .row -->

		<form action="" method="GET" class="mt-3">

			<div class="form-group row">
				<label for="name-id" class="col-sm-2 col-form-label text-sm-right">Name:</label>
				<div class="col-sm-10">
					<input type="name" class="form-control" id="name-id" name="name" placeholder="Tommy Trojan">
				</div>
			</div> <!-- .form-group -->			

			<div class="form-group row">
				<label for="greeting-id" class="col-sm-2 col-form-label text-sm-right">Greeting:</label>
				<div class="col-sm-10">
					<select name="greeting" id="greeting-id" class="form-control">
						<option value="" disabled selected>-- Select One --</option>
						<option value="What's up">What's up ... !</option>
						<option value="Hi">Hi ... !</option>
						<option value="Hello">Hello ... !</option>
					</select>
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div> <!-- .form-group -->

		</form>
		
	</div> <!-- .container -->

	<div class="container">

		<div class="row">
			<h2 class="col-12 mt-4">Output</h2>

			<div class="col-12">

				<!-- Show PHP Output Here -->
				<?php if(isset($_GET['greeting']) && !empty($_GET['name'])) : ?>
					<?php echo $_GET['greeting'] . " " . $_GET['name'] . "!"; ?>
				<?php else : ?>
					<?php echo "Please fill out all form data"; ?>
				<?php endif; ?>
			</div>
		</div> <!-- .row -->

	</div> <!-- .container -->

</body>
</html>