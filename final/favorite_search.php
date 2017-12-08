<?php
	session_start();
	require 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Search Results</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<style>
		.boxed {
			border: 1px solid #C4C4C4;
			padding: 10px;
			margin: 30px;
			box-shadow: 5px 5px #C4C4C4;
			font-family: 'Roboto', sans-serif;
		}
		#header {
			text-align: center;
			font: 18px;
		}

		.boxed img {
			width: 100px;
		}


	</style>
</head>
<body>
	<?php include 'nav.php'; ?>

	<h1 id='header'>Starred Tweets</h1>

	<?php

		//Requesting Token
		define('CONSUMER_PUBLIC_KEY', 'cACrabwDZcVdXWaRwG0uRzqLy');
		define('CONSUMER_PRIVATE_KEY', 'qklULEuqFuIpzbwKORPZIPtSbvwYmQff1ypt0d1xo4B2HajifN');
		$both = CONSUMER_PUBLIC_KEY . ":" . CONSUMER_PRIVATE_KEY;
		define('CREDENTIALS', base64_encode($both));
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

		//Receiving the token
		$token_response = curl_exec($ch);
		$token_response = json_decode($token_response, true);

		//Now dealing with the text from Trump

		//Default URL
		$twitter_search_url = 'https://api.twitter.com/1.1/search/tweets.json?q=';

		if (isset($token_response['token_type']) && $token_response['token_type'] == 'bearer') {
			$header = array('Authorization: Bearer '.$token_response['access_token']);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
			curl_setopt($ch, CURLOPT_POST, false);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		}

		else {
			exit();
		}
		
		//Default URL
		$twitter_lookup_url = 'https://api.twitter.com/1.1/statuses/lookup.json?id=';

		//Now we transition into getting the tweet id's
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, USER_DB_NAME);

		if ($mysqli->connect_errno) :
			echo $mysqli->connect_error;
		else:
			// Connection successful

			$sql = "SELECT * 
					FROM starred_tweets 
					WHERE user_email = '"
					.$_SESSION['email']
					."';";

			$sql_results = $mysqli->query($sql);

			if(!$sql_results) :
				echo "Something went wrong on our end!";
			else :
				//Print all the tweets for the user
				while ($row = $sql_results->fetch_assoc()) :
					$twitter_lookup_url .= $row['tweet'];
					$twitter_lookup_url .= '&tweet_mode=extended';
					curl_setopt($ch, CURLOPT_URL, $twitter_lookup_url);


					$info = curl_exec($ch);
					$info = json_decode($info, true);

					//Revert the lookup_url back to the original
					$twitter_lookup_url = 'https://api.twitter.com/1.1/statuses/lookup.json?id=';

				?>
					<div class="boxed">
						<?php echo $info[0]['full_text']; ?> 
					</div> 
	<?php
				endwhile;
			endif;
			$mysqli->close();
		endif;

	?>
</body>