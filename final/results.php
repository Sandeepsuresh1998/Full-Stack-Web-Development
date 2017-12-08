<?php
	session_start();
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


	<h1 id='header'>Results</h1>


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
		// $tweet_extended = urlencode('&tweet_mode=extended parameter');

		if (isset($token_response['token_type']) && $token_response['token_type'] == 'bearer') :
			$header = array('Authorization: Bearer '.$token_response['access_token']);

			curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
			curl_setopt($ch, CURLOPT_POST, false);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


			//Modify the search url based on what the user typed in
			if( isset($_GET['search-bar']) && !empty($_GET['search-bar'])) {
				$raw_text = $_GET['search-bar'];
				$search_query = $raw_text . " " . "from:realDonaldTrump"; 
				$search_term_url = urlencode($search_query);
				$twitter_search_url .= $search_term_url;
			} else {
				//Displaying just his tweets
				$from_trump_url_addition = urlencode('from:realDonaldTrump');
				$twitter_search_url .= $from_trump_url_addition;
			}

			$twitter_search_url .= '&tweet_mode=extended';

			curl_setopt($ch, CURLOPT_URL, $twitter_search_url);

			$info = curl_exec($ch);
			$info = json_decode($info, true);
			if(sizeof($info['statuses']) == 0) :
	?>
				<div class="text-danger error">
					No results for <?php echo $_GET['search-bar']; ?>
				</div>
	<?php
			else :
				$i = 0;
				while ( $i < sizeof($info['statuses'])) :
	?>
					<div class="boxed">
						<?php echo $info['statuses'][$i]['full_text']; ?> 
						<?php if ( isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true ) : ?>	
							<!-- This will be for registered users trying to save something -->
							<button type="submit" class="btn-info starred-button" tweet-id="<?php echo $info['statuses'][$i]['id_str']; ?>" ><span class="glyphicon glyphicon-star-empty"></span></button>	
						<?php endif; ?> 
					</div>
	<?php 
					$i++;
				endwhile;
			endif;
		else :
			echo "Something went wrong";
		endif;
	?>

	<script>

		//Creating the AJAX call for the button
		var buttons = document.querySelectorAll('.starred-button');
		for(var i = 0; i < buttons.length; i++ ) {
			buttons[i].onclick = function() {
				var tweet_id = this.getAttribute('tweet-id').trim();
				ajaxPost('save.php', 'tweet='+tweet_id, function(results){
					console.log(results);
				});
			}
		}


		//AJAX POST
		function ajaxPost(endpointUrl, postData, returnFunction){
			var xhr = new XMLHttpRequest();
			xhr.open('POST', endpointUrl, true);
			xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xhr.onreadystatechange = function(){
				if (xhr.readyState == XMLHttpRequest.DONE) {
					if (xhr.status == 200) {

						// returnFunction( xhr.responseText );
						returnFunction( JSON.parse(xhr.responseText) );

					} else {
						alert('AJAX Error.');
						console.log(xhr.status);
					}
				}
			}
			xhr.send(postData);
		};
	</script>

</body>
</html>