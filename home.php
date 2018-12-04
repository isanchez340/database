<!doctype html>
<?php if (!isset($_COOKIE['loggedin'])){ ?>
	<html>
	<meta http-equiv="refresh" content="0; url=login.html">
	</html>
	
<?php  
exit();
}
?>
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
	$sql = "SELECT U_f_name FROM student where U_ID = '$SID'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	setcookie("Sname", "$row[U_f_name]");
	$text = $row['U_f_name'];
	$var_str = var_export($text, true);
	$var = "<?php\n\n\$text = $var_str;\n\n?>";
	file_put_contents('name.txt', $var);
	
?>
<html lang="en" class="no-js">
<head >
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
				<li><a href="logout.php">Logout</a>
			</ul>
		</nav>
	</header>
	<section style="background-color:#fe880f">
		
		<strong><h1>Main Menu</h1></strong>
	<?php if(!$_COOKIE['access']) { ?>
	 <h3>Welcome <?php echo "$row[U_f_name]"; ?><h3>
	<?php } else { ?>
		<h3>Welcome Admin<h3>
	<?php } ?>
		
	</section>
	<section id="pageContent">
		<aside>
		<?php if ($_COOKIE['access']) { ?>
			<div><h2><a href="ViewRequest.php">View All Pending Request</a></h2></br></div>
			<div><h2><a href="Report.html"style="text-decoloration:none">Report</a></h2></br></div>
			<div><h2><a href="Add.html"style="text-decoloration:none">Add User</a></h2></br></div>
			<div><h2><a href="Terminal.html"style="text-decoloration:none">Terminal</a></h2></br></div>
		<?php }
		else { ?>
			<div><h2><a href="ViewRequest.php">View Pending Request</a></h2></br></div>
			<div><h2><a href="SendRequest.html"style="text-decoloration:none">Send Access Request</a></h2></br></div>
			</br>
		<?php } ?>
		</aside>
	</section>
	<footer>
	</br>
	<center>
	<img src="banner.bmp">
	</center>
	</br>
	</footer>


</body>
<?php } ?>
</html>