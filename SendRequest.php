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
	$SID = $_COOKIE['ID'];
	$Pname = $_POST['ProfessorName'];
	$prof = "select U_ID from professor where U_f_name = '$Pname'";
	$result = mysqli_query($conn,$prof);
	$Prow = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$Sdate = $_POST['StartDate'];
	$Edate = $_POST['EndDate'];
	$Bkey = $_POST['brass'];
	$Sgroup = $_POST['group'];
	$Ahours = $_POST['Hours'];
	$record = rand(1, 99999999);
	$order = rand(1, 999999);
	$request_no = rand(1, 999999);
	$sql = "call E_request('$request_no','$SID','$Prow[U_ID]','80000146','$Sdate','$Edate', '$Bkey','$record','$order', '$Sgroup', '$Ahours')";
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
		<strong><h1>Send Access Request</h1></strong>

	 <h3>Welcome <?php include 'name.txt'; echo $text; ?><h3>
	 <h2>Request Sent</h2>
	</section>
	<section id="pageContent">
<aside>
<form action="SendRequest.php" method="post">
Hours of Access: </br>
<br/>
Start Date: </br>
<input type="text" name ="StartDate" size="20"/><br/>
<br/>
End Date: </br>
<input type="text" name ="EndDate" size="20"/><br/>
<br/>
Professor Name: </br>
<input type="text" name ="ProfessorName" size="20"/><br/>
<br/>
Project Group: </br>
<input type="text" name ="group" size="20"/><br/>
<br/>
Expected Graduation Date: </br>
<input type="text" name ="GraduationDate" size="20"/><br/>
<br/>
Brass Key: </br>
  <select name="brass">
    <option value="1">Yes</option>
    <option value="0">No</option>
  </select>
  </br>
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

</html>