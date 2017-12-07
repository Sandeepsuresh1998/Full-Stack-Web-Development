<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thoughts of Trump</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	
	<style>

		body {
			min-height: 100vh;
			position: relative;
		}
	
		#header-container {
			width: auto;
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
			width: auto;
			padding: 20px;
			height: auto;
			background-image: url('imgs/search_icon.png');
			background-size: 30px auto;
			padding-left: 50px;
    		background-position: 10px 10px;
    		background-repeat: no-repeat;
    		font-size: 20px;
    		box-sizing: border-box;
		    border: 2px solid #ccc;
		    border-radius: 4px;
		    box-shadow: 2px 2px 2px 2px lightgrey;
		}

		/* Small devices (tablets, 768px and up) */
		@media (min-width: 768px) {
			input[type=text] {
				width: 400px;
				height: 50px;
				background-size: 25px;
			}
			#main-container {
				position: absolute;
				top: 45%;
				left: 50%;
				transform: translate(-50%, -50%);
			}

		}

		/* Medium devices (desktops, 992px and up) */
		@media (min-width: 992px) {
			input[type=text] {
				width: 600px;
			}
		}

		/* Large devices (large desktops, 1200px and up) */
		@media (min-width: 1200px;) {
			input[type=text] {
				width: 700px;
			}
		}

	</style>
</head>
<body>

	<?php include 'nav.php'; ?>

	<div id="main-container">
		<div id="header-container" class="container-fluid">
			<h1>Trump's Tweets</h1>	

		</div> <!-- End of Search Bar Container-->
		<form action="results.php" method="GET" id="form-container">					
			<input type="text" name="search-bar" id="search-bar" placeholder="Search...">
		</form>
	</div>

	<script>
		var d = document.getElementById('home');
		d.className += " active";
	</script>
	
	
</body>
</html>