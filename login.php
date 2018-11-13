<?php include('header.php');?>
<?php
   require("server.php");
   $error = "";
   session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      //Building the query
      $sql = "SELECT * FROM login WHERE username = '$myusername' and password = '$mypassword'";
      //Performs a query on the database
      $result = mysqli_query($db,$sql);
      //Fetch a result row as an associative, a numeric array, or both
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['user_id'];
      
      //Gets the number of rows in a result
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Electronic Access Login</title>
        <link rel = "stylesheet" href = "main.css" type = "text/css">
    </head>
    <body>
        <div id= "buffer"><?php echo $error; ?></div>
        <center>
            <div id ="login">
                <div id= "banner">
                    <h3>Login</h3>
                </div>

                <form action = "" method = "post">
                    <input type = "text" name = "username" placeholder = "Username" size ="40" class = "input"></br>
                    <input type = "password" name = "password" placeholder = "Password" size = "40" class = "input"></br>
                    <input type = "submit" value = "Log In" class = "input">
                </form>

            </div>
        </center>

    </body>

</html>

<?php include('footer.php');?>