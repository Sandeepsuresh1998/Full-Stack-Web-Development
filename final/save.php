<?php
	session_start();
	require 'config.php';

	// $results = ["success"=>true];

	// 1. Establish DB Connection.
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	//Start of SQL code. 
	if ($mysqli->connect_errno) :
		// Connection Error
		echo $mysqli->connect_error;
	else :	
		// Connection Success
		$sql = "INSERT INTO starred_tweets (tweet, user_email)
				VALUES ('"
				. $_POST['tweet'] 
				. "', '"
				. $_SESSION['email']
				. "');";

		$sql_results = $mysqli->query($sql);

		if(!$sql_results) :
			echo json_encode([
				"success" => false,
			]);
		else :
			echo json_encode([
				"success" => true,
			]);

		endif;
		$mysqli->close();
	endif;
?>