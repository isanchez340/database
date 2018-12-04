<!doctype html>
<?php if (!isset($_COOKIE['loggedin'])){ ?>
	<html>
	<meta http-equiv="refresh" content="0; url=login.html">
	</html>
	
<?php  
exit();
}
?>

<html lang="en" class="no-js">
<?php

#include("config.php"); 
$host = "ilinkserver.cs.utep.edu";
$db = 'f18_team8';
$username = "cs_iasanchez4";
$password = "pkmmaster12";
// connect to the mysql server
$conn = new mysqli($host,$username,$password,$db);
$_POST['username'] = $username;
$_POST['password'] = $password;
if ($conn->connect_error){
    die("fail");
}

else{ 
    $myusername = mysqli_real_escape_string($conn,$_POST['username']);
    $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
	$SID = $_POST['ID'];
	$Fname = $_POST['Fname'];
	$Min = $_POST['Min'];
	$Lname = $_POST['Lname'];
	$Pnum = $_POST['Pnum'];
	$Gdate = $_POST['Gdate'];
	$Email = $_POST['Email'];
	$Pass = $_POST['Pass'];
	$User = $_POST['User'];
	$sql = "call add_student('$SID','$Fname','$Min','$Lname','$Pnum','$Gdate','$Email', '$User', '$Pass')";
	$result = mysqli_query($conn,$sql);
	$Prow = mysqli_fetch_array($result,MYSQLI_ASSOC);
}?>

<!doctype html>

<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <title>Electronic Access - Web Interface</title>
    <meta name="description" content="Main Menu">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>

<body>
	<header>
		<div id="logo"><img src="UTEP.png">Electronic Access - Web Interface</div>
		<nav> 
			<ul>
				<li><a href="home.php">Home</a>
				<li><a href="logout.php">Logout</a>
			</ul>
		</nav>
	</header>
	<section style="background-color:#fe880f">
		<strong><h1>Add Student</h1></strong>

	 <h3>Welcome Admin</h3>
	</section>
	<section id="pageContent">
	<h2>Student Added</h2>
<aside>
<form action="Add.php" method="post">
Student ID: </br>
<input type="text" name ="ID" size="20"/><br/>
<br/>
Student First Name: </br>
<input type="text" name ="Fname" size="20"/><br/>
<br/>
Student Middle Initial: </br>
<input type="text" name ="Min" size="20"/><br/>
<br/>
Student Last Name: </br>
<input type="text" name ="Lname" size="20"/><br/>
<br/>
Student Phone Number: </br>
<input type="text" name ="Pnum" size="20"/><br/>
<br/>
Expected Graduation Date: </br>
<input type="text" name ="Gdate" size="20"/><br/>
<br/>
Student Email: </br>
<input type="text" name ="Email" size="20"/><br/>
<br/>
Student Username: </br>
<input type="text" name ="User" size="20"/><br/>
<br/>
Student Password: </br>
<input type="password" name ="Pass" size="20"/><br/>
<br/>
</br>
<ul>
<li><input type="submit" Value="Send" /><br/>
</ul>
</form>
</body></html>

		
		</aside>
		
	</section>
	<footer>
	</br>
	<img src="banner.bmp">
	</br>
	</footer>


</body>

</html>