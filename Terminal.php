<!doctype html>
<?php if (!isset($_COOKIE['loggedin'])){ ?>
	<html>
	<meta http-equiv="refresh" content="0; url=login.html">
	</html>
	
<?php  
exit();
}
?>

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
		<strong><h1>Add User</h1></strong>

	 <h3>Welcome Admin<h3>
	</section>
	<section id="pageContent">
<aside>
<form action="Terminal.php" method="post">
Input: </br>
<input type="text" name ="Ter" size="20"/><br/>
</br>
<ul>
<li><input type="submit" Value="Send" /><br/>
</ul>
</form>
</body></html>

		
</aside>
<section>
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
	$sql = $_POST['Ter'];
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	
	
?>
			<h2><?php echo $sql ?></h2>
			<style>
			table, th, td {
			border: 3px solid black; }
			</style>
			<table style="width:100%">

			<?php while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) { ?>
			<tr>
				<?php foreach($row as $data) { ?>
					<th><?php echo "$data"; ?> </th>
				<?php } ?>
			</tr>
			<?php } ?>
			</table>
			</br>
<?php } ?>

</section>
		
	</section>
	<footer>
	</br>
	<img src="banner.bmp">
	</br>
	</footer>


</body>


</html>