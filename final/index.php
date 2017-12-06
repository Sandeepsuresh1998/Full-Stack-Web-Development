<!DOCTYPE html>
<html>
<head>
	<title>Thoughts of Trump</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	
	<style>

		#main-container {
			position: absolute;
			width: 100%;
			height: 100px;
		}

		#header-container {
			width: 400px;
			height: 100px;
			text-align: center;
			margin: auto;
		}
		#header-container h1 {
			color: #0084b4;
		}
		#form-container {
			margin: auto;
			text-align: center;
		}
		input[type=text] {
			width: 500px;
			background-image: url('imgs/search_icon.png');
    		background-position: 10px 10px;
    		background-color: white;
    		background-repeat: no-repeat;
    		font-size: 20px;
    		box-sizing: border-box;
		    border: 2px solid #ccc;
		    border-radius: 4px;
		    padding: 12px 20px 12px 40px;
		    box-shadow: 2px 2px 2px 2px lightgrey;
		}

	</style>
</head>
<body>

	<?php include 'nav.php'; ?>

	<div id="main-container">
		<div id="header-container" class="container-fluid">
			<h1>Trump Thoughts</h1>	
		</div> <!-- End of Search Bar Container-->
		<form action="results.php" method="GET" id="form-container">					
			<input type="text" name="search-bar" id="search-bar" placeholder="Search...">
		</form>
	</div>

			
	
</body>
</html>