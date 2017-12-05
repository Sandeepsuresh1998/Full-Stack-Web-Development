<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="index.php">Trump Tweets</a>
	    </div>
	    <ul class="nav navbar-nav">
	      <li><a href="about.php">About Us</a></li>
	    </ul>
	    <ul class="nav navbar-nav navbar-right">
	    	<?php if ( !isset($_SESSION['logged-in']) || $_SESSION['logged-in'] == false ) : ?>

		      <li><a href="registration.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
		      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>

		    <?php else : ?>

		     	<div class="text-center p-2 ml-auto">Hello <?php echo $_SESSION['full-name']; ?>!</div>
		     	<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

		    <?php endif; ?>
	    </ul>
	  </div>
	</nav> <!-- End of Navbar -->