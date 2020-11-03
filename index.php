<?php 
 error_reporting(0);
     session_start();
 ?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script language="javascript" type="text/javascript" src="scripts.js"></script>
<link rel="stylesheet" href="style.css" type="text/css" />


</head>

<body>
     <div class="topnav">
      <a onclick="Login()">Login</a>
      <a onclick="Register()">Register</a>
      <?php if ($_SESSION['name'] !== null){ ?>
        <a class="profile" onclick="Profile()" >owo</a>
      <?php } ?> 
      
      </div>

      <header style="text-align: center;">
      <b style="font-size: 30px;">Main Page</b>
      </header>

      <?php
    
     echo " <br /> Hello " . $_SESSION["name"] . "!";


      ?>
      
       



 </body>

</html>