<?php
   //Specify the Database server host
   define('DB_SERVER', 'ilink.cs.utep.edu');
   //Specify the Database username
   define('DB_USERNAME', 'cs_jagutierrez2');
   //Specify the Database password
   define('DB_PASSWORD', 'cs4342');
   //Choose the Database (name)
   define('DB_DATABASE', 'f18cs4342team8');
   //We make the connection.
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>