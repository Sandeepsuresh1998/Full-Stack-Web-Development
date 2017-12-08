<?php
	session_start();
	require 'config.php';

	$results = ["success"=>true];

	$tweet_id = json_encode($results);	

	// 1. Establish DB Connection.
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	//Start of SQL code. 
	if ($mysqli->connect_errno) :
		// Connection Error
		echo $mysqli->connect_error;
	else :	
		// Connection Success
		$sql = "INSERT INTO favorites (tweet, user_email)
				VALUES ('"
				. $tweet_id['tweet'] 
				. "', '"
				. $_SESSION['email']
				. "');";

		$sql_results = $mysqli->query($sql);

		if(!$sql_results) :
			echo "Something went wrong on our end";
		else :
			
		endif;


?>