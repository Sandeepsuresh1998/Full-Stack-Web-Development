<?php
	

	// //Requesting Token
	// define('CONSUMER_PUBLIC_KEY', 'cACrabwDZcVdXWaRwG0uRzqLy');
	// define('CONSUMER_PRIVATE_KEY', 'qklULEuqFuIpzbwKORPZIPtSbvwYmQff1ypt0d1xo4B2HajifN');
	// $both = CONSUMER_PUBLIC_KEY . ":" . CONSUMER_PRIVATE_KEY;
	// define('CREDENTIALS', base64_encode($both));
	// define('TWITTER_TOKEN_ENDPOINT', 'https://api.twitter.com/oauth2/token');

	
	
	// //Setting the Header
	// $header = array('Authorization: Basic '.CREDENTIALS, 'Content-Type: application/x-www-form-urlencoded;charset=UTF-8');

	// //Setting up a channel to request a token
	// $ch = curl_init();
	// curl_setopt($ch, CURLOPT_URL, TWITTER_TOKEN_ENDPOINT);
	// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	// curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');
	// curl_setopt($ch, CURLOPT_POST, true);
	
	// //Receiving the token
	// $token_response = curl_exec($ch);
	// $token_response = json_decode($token_response, true);

	// //Now dealing with the text from Trump

	// //Default URL
	// $twitter_search_url = 'https://api.twitter.com/1.1/search/tweets.json?q=';
	// // $tweet_extended = urlencode('&tweet_mode=extended parameter');

	// if (isset($token_response['token_type']) && $token_response['token_type'] == 'bearer') :
	// 	$header = array('Authorization: Bearer '.$token_response['access_token']);

	// 	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	// 	curl_setopt($ch, CURLOPT_POST, false);
	// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


	// 	//Modify the search url based on what the user typed in
	// 	if( isset($_GET['search-bar']) && !empty($_GET['search-bar'])) {
	// 		$raw_text = $_GET['search-bar'];
	// 		$search_query = $raw_text . " " . "from:realDonaldTrump"; 
	// 		$search_term_url = urlencode($search_query);
	// 		$twitter_search_url .= $search_term_url;
	// 	} else {
	// 		//Displaying just his tweets
	// 		$from_trump_url_addition = urlencode('from:realDonaldTrump');
	// 		$twitter_search_url .= $from_trump_url_addition;
	// 	}

	// 	$twitter_search_url .= '&tweet_mode=extended';

	// 	curl_setopt($ch, CURLOPT_URL, $twitter_search_url);

	// 	$info = curl_exec($ch);
	// 	$info = json_decode($info, true);

	// 	for ($i=0; $i < sizeof($info['statuses']); $i++) { 
	// 		echo $info['statuses'][$i]['full_text'];
	// 		echo "<hr>";
	// 	}
	// 	else :
	// 		echo "Something went wrong";
	// 	endif;

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
			width: 100%;
		}

		#search-bar {
			position: absolute;
			top: 50%;
			margin: auto;
			width: 400px;
			margin: auto;
		}
	</style>
</head>
<body>

	<?php include 'nav.php'; ?>


	<div id="main-container" class="container-fluid">

		<div id="search-bar-container" class="container-fluid">
			<h1>Trump Thoughts</h1>
			<form action="index.php" method="GET">					
				<input type="text" name="search" id="search-bar">
			</form>
		</div>		
	</div> <!-- End of Search Bar Container-->
	
</body>
</html>