<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php if (!isset($_COOKIE['loggedin'])) die("You are not logged in!"); ?>
<html>
  
  <head>
  </head>
  
  <body>
	<h1>Electronic Access - Web Interface</h1>
	 <br/>
	 <h2>Main Menu</h2>
	 <h3>Welcome <?php echo $_COOKIE['mysite_username'] ?><h3>
	<?php if ($_SESSION['admin'] == 'true') { ?>
	<ul>
	  <li><a href="ViewRequest.php?username=<?php $_SESSION['login_user']?>">View Pending Request</a></li>
	  <li><a href="SendRequest.php">Fill Request Form</a></li>
	  <li><a href="logout.php">Logout</a></li>
	</ul>
	<?php } 
	else { ?>
	<ul>
	  <li><a href="ViewRequest.php">View All Request</a></li>
	  <li><a href="SendRequest.php">Fill Request Form</a></li>
	  <li><a href="logout.php">Logout</a></li>
	</ul>
	<?php } ?>
	
  </body>
  
</html>
