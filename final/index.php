<?php
	

	//Creating token
	define(CONSUMER_PUBLIC_KEY, 'cACrabwDZcVdXWaRwG0uRzqLy');
	define(CONSUMER_PRIVATE_KEY, 'qklULEuqFuIpzbwKORPZIPtSbvwYmQff1ypt0d1xo4B2HajifN');
	$both = CONSUMER_PUBLIC_KEY + ":" + CONSUMER_PRIVATE_KEY;
	define(BASE64_ENCODED_TOKEN, base64_encode($both));

	//Sending the POST Request
	define(TWITTER_TOKEN_ENDPOINT, 'https://api.twitter.com/oauth2/token');
	
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