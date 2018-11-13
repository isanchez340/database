<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php if (!isset($_COOKIE['loggedin'])) die("You are not logged in!"); ?>
<html>
  
  <head>
  </head>
  
  <body>
	<h1>Electronic Access - Web Interface</h1>
	 <br/>
	 <h2>Main Menu</h2>
	<?php if ($_SESSION['admin'] == 'false') { ?>
	<ul>
	  <li><a href="ViewRequest.php?username=<?php $_SESSION['login_user']?>">View Request</a></li>
	  <li><a href="ViewPets.php">View All Pets - Text</a></li>
	  <li><a href="AddPet.php">Add Pet</a></li>
	  <li><a href="logout.php">Logout</a></li>
	</ul>
	<?php } 
	else { ?>
	<ul>
	  <li><a href="ViewRequest.php?username=<?php $_SESSION['login_user']?>">View Request</a></li>
	  <li><a href="ViewPets.php">View All Pets - Text</a></li>
	  <li><a href="AddPet.php">Add Pet</a></li>
	  <li><a href="logout.php">Logout</a></li>
	</ul>
	<?php } ?>
	
  </body>
  
</html>
