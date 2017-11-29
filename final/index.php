<?php
	

	// //Creating token
	// define('CONSUMER_PUBLIC_KEY', 'cACrabwDZcVdXWaRwG0uRzqLy');
	// define('CONSUMER_PRIVATE_KEY', 'qklULEuqFuIpzbwKORPZIPtSbvwYmQff1ypt0d1xo4B2HajifN');
	// $both = CONSUMER_PUBLIC_KEY . ":" . CONSUMER_PRIVATE_KEY;
	// define('BASE64_ENCODED_TOKEN', base64_encode($both));

	// //Sending the POST Request
	// define('TWITTER_TOKEN_ENDPOINT', 'https://api.twitter.com/oauth2/token');

	// //Setting the Header
	// $header = ['token_type ' . ': ' . 'Bearer' . 'access_token' ': ' BASE64_ENCODED_TOKEN];

	// //Setting up a channel
	// $ch = curl_init();

	// curl_setopt($ch, CURLOPT_URL, TWITTER_TOKEN_ENDPOINT);
	// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	// curl_setopt($ch, CURLOPT_POST, true);
	
?>



<!DOCTYPE html>
<html>
<head>
	<title>Thoughts of Trump</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	
	<style>
		#search-bar-container {
			text-align: center;
			background-color: #00aced;
		}
		#results-container {
			width: 100%;
		}
		#results-container img {
			width: 100%;
		}
	</style>
</head>
<body>

	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="index.php">Trump Tweets</a>
	    </div>
	    <ul class="nav navbar-nav">
	      <li><a href="about.php">About Us</a></li>
	    </ul>
	    <ul class="nav navbar-nav navbar-right">
	      <li><a href="registration.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
	      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
	    </ul>
	  </div>
	</nav> <!-- End of Navbar -->


	<div id="main-contianer" class="container-fluid">

		<div id="search-bar-container" class="container-fluid">
			<h1>Trump Thoughts</h1>
			<form>
				<div class="form-group row">
					<div class="col-sm-12">
						<h3>Search for something in Trump's Tweets</h3>
						<input type="text" class="form-control" id="search-bar" name="search-bar">
					</div>
				</div>
			</form>
		</div>

		<div id="results-container">
			<div>
				<img src="imgs/trump_pointing.jpg" alt="trump_pointing">
			</div>
		</div>
	</div>
	
</body>
</html>