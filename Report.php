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

?>

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
	<strong><h1>Reports</h1></strong>
	 <h3>Welcome Admin</h3>
	</section>
	<section id="pageContent">
	<aside>
		<?php if ($_POST['report'] == 0) { 
			$sql = "SELECT u_id Sid, u_f_name First,u_l_name Last, s_grad_date 'Grad Date' FROM Student WHERE s_grad_date >= CURDATE() AND s_grad_date <= CURDATE() + INTERVAL 3 MONTH";
			$result = mysqli_query($conn,$sql);?>
			<h2>Graduating Students</h2>
			<style>
			table, th, td {
			border: 3px solid black; }
			</style>
			<table style="width:100%">
			<tr>
				<th>ID Number</th>
				<th>Student Fist Name</th>
				<th>Student Last Name</th>
				<th>Graduation Date</th>

			</tr>
			<?php while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) { ?>
			<tr>
				<?php foreach($row as $data) { ?>
					<th><?php echo "$data"; ?> </th>
				<?php } ?>
			</tr>
			<?php } ?>
			</table>
			</br>
		<?php } 
		elseif($_POST['report'] == 1) {
			$sql = "select * from key_requests";
			$result = mysqli_query($conn,$sql);	?>
			<h2>Request Student Status</h2>
			<style>
			table, th, td {
			border: 3px solid black; }
			</style>
			<table style="width:100%">
			<tr>
				<th>Request Number</th>
				<th>Student ID</th>
				<th>Professor ID</th>
				<th>Request Start Date</th>
				<th>Request End Date</th>
				<th>Request Status</th>
			</tr>
			<?php while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) { ?>
			<tr>
				<?php foreach($row as $data) { ?>
					<th><?php echo "$data"; ?> </th>
				<?php } ?>
			</tr>
			<?php } ?>
			</table>
			</br>
				<?php } 
				else {
					$sql = "select * from key_requests";
					$result = mysqli_query($conn,$sql);?>
			<h2>Requests Per Room</h2>
			<style>
			table, th, td {
			border: 3px solid black; }
			</style>
			<table style="width:100%">
			<tr>
				<th>Request Number</th>
				<th>Student ID</th>
				<th>Professor ID</th>
				<th>Request Start Date</th>
				<th>Request End Date</th>
				<th>Request Status</th>
			</tr>
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
	</aside>
	</section>
</body>


<?php } ?>



</html>
	<footer>
		
		</br>
		<img src="banner.bmp">
		</br>
	</footer>