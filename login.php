<html>
<?php

#include("config.php"); 
$host = "ilinkserver.cs.utep.edu";
$db = 'f18_team8';
$username = "cs_iasanchez4";
$password = "pkmmaster12";
// connect to the mysql server
$conn = new mysqli($host,$username,$password,$db);
if ($conn->connect_error){
    die("fail");
}
else{
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
      //Building the query
      $sql = "SELECT * FROM login WHERE Username = '$myusername' and Password = '$mypassword'";
      //Performs a query on the database
      $result = mysqli_query($conn,$sql);
      //Fetch a result row as an associative, a numeric array, or both
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['Username'];
	  $admin = $row['is_admin'];
      
      //Gets the number of rows in a result
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
	     $_SESSION['priv'] = $admin;
		
		 
         header("location: home.php");
      }
	  else {
         $error = "Your Login Name or Password is invalid";
      }


setcookie("loggedin", "TRUE", time()+(3600 * 24));
setcookie("mysite_username", "$username");
setcookie("name", "$active");
setcookie("access", "$admin");
echo "You are now logged in!"; 
echo "<a href=\"home.php\">Main Menu</a>";
}
?>
</html>