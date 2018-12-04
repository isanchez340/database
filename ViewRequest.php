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
	<?php if ($_COOKIE['access']) { ?>
		<strong><h1>View All Request</h1></strong>
	<?php }
	else { ?>
		<strong><h1>View Pending Request</h1></strong>
	<?php } ?>
	 <h3>Welcome <?php include 'name.txt'; echo $text; ?><h3>
	</section>
	<section id="pageContent">
	<aside>
		<?php if ($_COOKIE['access']) { 
			$sql = "SELECT * FROM request";
			$result = mysqli_query($conn,$sql);?>
			<style>
			table, th, td {
			border: 3px solid black; }
			</style>
			<table style="width:100%">
			<tr>
				<th>Request Number</th>
				<th>Student ID</th>
				<th>P_ID</th>
				<th>A_ID</th>
				<th>Request Start Date</th>
				<th>Request End Date</th>
				<th>Request Status</th>
				<th>Brass Key</th>
				<th>Record Number</th>
				<th>Key Returned Status</th>
				<th>Work Order Number</th>
				<th>Electronic Access</th>
				<th>Student Group</th>
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
			$SID = $_COOKIE['ID'];
			$sql = "SELECT * FROM request WHERE S_ID = '$SID'";
			$result = mysqli_query($conn,$sql);
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		?>
			<style>
				table, th, td {
				border: 2px solid black; }
			</style>
			<table style="width:100%">
			<tr>
				<th>Request Number</th>
				<th>Student ID</th>
				<th>P_ID</th>
				<th>A_ID</th>
				<th>Request Start Date</th>
				<th>Request End Date</th>
				<th>Request Status</th>
				<th>Brass Key</th>
				<th>Record Number</th>
				<th>Key Returned Status</th>
				<th>Work Order Number</th>
				<th>Electronic Access</th>
				<th>Student Group</th>
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