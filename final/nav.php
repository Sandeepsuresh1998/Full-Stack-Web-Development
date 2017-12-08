<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <ul class="nav navbar-nav">
	      <li id="home"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Trump's Tweets</a></li>
	    </ul>
	    <ul class="nav navbar-nav">
	      <li id="about"><a href="about.php"><span class="glyphicon glyphicon-book"></span> About Us</a></li>
	    </ul>
	    <ul class="nav navbar-nav navbar-right">
	    	<?php if ( !isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false ) : ?>
	    	  
		      <li id="registration"><a href="registration.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
		      <li id="login"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>

		    <?php else : ?>
		    	<div class="navbar-header">
		    		<div class="navbar-brand" href="index.php">Hello, <?php echo $_SESSION['full-name']; ?>!</div>
		    	</div>
		    	<li id="starred"><a href="favorite_search.php"><span class="glyphicon glyphicon-star"></span> Starred</a></li>
				<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

		    <?php endif; ?>  
	    </ul>
	  </div>
</nav> <!-- End of Navbar -->