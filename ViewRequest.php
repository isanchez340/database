<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php if (!isset($_COOKIE['loggedin'])) die("You are not logged in!"); ?>
<html>
<head>
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

