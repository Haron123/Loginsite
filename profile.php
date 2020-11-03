<?php
 error_reporting(0);
     session_start();
 ?>
<html>
<head>
<script language="javascript" type="text/javascript" src="scripts.js"></script>
<link rel="stylesheet" href="style.css" type="text/css" />

<title>Register</title>

     <div class="topnav">
     <a onclick="MainPage()">Mainpage</a>
      <a onclick="Login()">Login</a>

     </div>
     
<body>
       <?php 

     echo " <br /> Hello " . $_SESSION["name"] . "!";


      ?>
       
     <button onclick="<?php
// remove all session variables
session_unset();

// destroy the session
session_destroy();
 ?>">Log out</button>  
       

</body>     
     
     
</head>     
</html>