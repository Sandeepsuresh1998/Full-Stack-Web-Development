<?php 
	session_start();
?>
<!DOCTYPE html>
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
		margin: 0;
	}
	#main-header {
		left: 0;
		position: absolute;
		text-align: center;
		width: 100%;
		top: 10px;
		color: #E8E8E8;
	}
	#picture-container h2 {
		margin: auto;
		position: absolute;
		text-align: center;
		left: 25%;
		top: 100px;
		color: #E8E8E8;
	}
	#picture-container img {
		width: 100%;
		margin: 0;
	}
	.navbar {
		margin: 0;
	}
</style>
</head>
<body>
	<?php include 'nav.php'; ?>

	<div id="picture-container">
		<img src="imgs/white_house.jpg">
		<h1 id="main-header">About Us</h1>
		<h2>Our Mission: to be well informed on the opinions of our president.</h2>
	</div>

	<script>
		var d = document.getElementById('about');
		d.className += " active";
	</script>
</body>
</html>