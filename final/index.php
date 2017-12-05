<?php
	

	//Creating token
	define('CONSUMER_PUBLIC_KEY', 'cACrabwDZcVdXWaRwG0uRzqLy');
	define('CONSUMER_PRIVATE_KEY', 'qklULEuqFuIpzbwKORPZIPtSbvwYmQff1ypt0d1xo4B2HajifN');
	$both = CONSUMER_PUBLIC_KEY . ":" . CONSUMER_PRIVATE_KEY;
	define('CREDENTIALS', base64_encode($both));
	$from_trump_url_addition = "?q=" . urlencode('from:realDonaldTrump');

	define('TWITTER_SEARCH_URL', 'https://api.twitter.com/1.1/search/tweets.json'.$from_trump_url_addition);

	//Sending the POST Request
	define('TWITTER_TOKEN_ENDPOINT', 'https://api.twitter.com/oauth2/token');

	//Setting the Header
	$header = array('Authorization: Basic '.CREDENTIALS, 'Content-Type: application/x-www-form-urlencoded;charset=UTF-8');

	//Setting up a channel to request a token
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, TWITTER_TOKEN_ENDPOINT);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');
	curl_setopt($ch, CURLOPT_POST, true);
	

	$token_response = curl_exec($ch);
	$token_response = json_decode($token_response, true);

	var_dump($token_response);

	if (isset($token_response['token_type']) && $token_response['token_type'] == 'bearer') {
		$header = array('Authorization: Bearer '.$token_response['access_token']);

		curl_setopt($ch, CURLOPT_URL, TWITTER_SEARCH_URL);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$info = curl_exec($ch);

		var_dump($info);
	} else {
		echo "Uh oh!";
	}

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
	</style>
</head>
<body>

	<?php include 'nav.php'; ?>


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
		</div> <!-- End of Search Bar -->


		<?php 
			$from_trump_url_addition = "?q=" . urlencode('from:realDonaldTrump');


			echo TWITTER_SEARCH_URL . $from_trump_url_addition;
		?>
	
</body>
</html>