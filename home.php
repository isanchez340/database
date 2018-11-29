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
				<li><a href="logout.php">Logout</a>
			</ul>
		</nav>
	</header>
	<section>
		<strong><h1>Main Menu</h1></strong>
	 <h3>Welcome <?php echo $_COOKIE['name'] ?><h3>
	</section>
	<section id="pageContent">
		<?php if ($_COOKIE['access']) { ?>
		<aside>
			<div><h2><a href="ViewRequest.php"">View All Pending Request</a></h2></br></div>
			<div><h2><a href="SendRequest.php"style="text-decoloration:none">Report</a></h2></br></div>
			<div>Sidebar 3</div>
			</br>
		</aside>
		<?php }
		else { ?>
		
		<aside>
			<div><h2><a href="ViewRequest.php?username=<?php $_SESSION['login_user']?> "">View Pending Request</a></h2></br></div>
			<div><h2><a href="SendRequest.php"style="text-decoloration:none">Report</a></h2></br></div>
			<div>Sidebar 3</div>
			</br>
		</aside>
		
		<?php } ?>
	</section>
	<footer>
	</br>
	<img src="banner.bmp">
	</br>
	</footer>


</body>

</html>