<?php

// expire cookie
setcookie ("loggedin", "", time() - 3600);
?>

<html>
<meta http-equiv="refresh" content="0; url=login.html">
</html>