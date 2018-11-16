<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php if (!isset($_COOKIE['loggedin'])){ ?>
	<html>
	<meta http-equiv="refresh" content="0; url=login.html">
	</html>
	
<?php } 
	exit();
?>
<html>
<head>
<?php 
$host = "ilinkserver.cs.utep.edu";
$db = 'f18_team8';
$username = "cs_iasanchez4";
$password = "pkmmaster12";
// connect to the mysql server
$conn = new mysqli($host,$username,$password,$db);
$sql = "SELECT * FROM REQUEST";
$result = mysqli_query($conn,$sql);
?>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
</style>
</head>
<body>
	<h1>Electronic Access - Web Interface</h1>
	 <br/>
	 <h2>Request for <?php echo "user1" ?></h2>
	 <br/>
	 	  <li><a href="home.php">Home</a> <?php echo "    " ?><a href="logout.php">Logout</a></li>
	 <br/>

<table style="width:100%">
  <tr>
    <th>Professor Name</th>
    <th>Lab#</th> 
    <th>Status</th>
  </tr>
  <tr>
    <td>Dr. Villanueva</td>
    <td>CCSB 0.00000001</td>
    <td>Denied</td>
  </tr>
  <tr>
    <td>Dr. Ceberio</td>
    <td>CCSB 0.00000002</td>
    <td>Pending</td>
  </tr>
</table>

</body>
</html>

