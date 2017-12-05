q<!DOCTYPE html>
<html>
<head>
	<title>About</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
<style>
	
	#picture-container {
		margin: auto;
		position: relative;
		width: 100%;
	}
	#main-header {
		left: 0;
		position: absolute;
		text-align: center;
		width: 100%;
		top: 10px;
	}
	#picture-container h2 {
		left: 0;
		position: absolute;
		text-align: center;
		width: 100%;
		top: 100px;
	}
	#picture-container img {
		width: 100%;
		margin: 0;
	}
</style>
</head>
<body>
	<?php include 'nav.php'; ?>

	<div id="picture-container">
		<img src="imgs/white_house.jpg">
		<h1 id="main-header">About Us</h1>
		<h2>Our Mission: To be well informed on the opinioins of our president.</h2>
	</div>
</body>
</html>