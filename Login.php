<?php
 error_reporting(0);
 session_start();

if(empty($_SESSION['name'])) {
    
}else {
    echo "You are already Logged in";
    header('Location: index.php');
    die();
}
 ?>

<html>
<head>
<script language="javascript" type="text/javascript" src="scripts.js"></script>
<link rel="stylesheet" href="style.css" type="text/css" /> 
<title>Login</title>


     <div class="topnav">
     
      <a onclick="MainPage()">Mainpage</a>
      <?php include 'topnav.php'; ?>
      
     
     </div>
     
          
      

    </head>


    <body>
    
    
   
    
    
    
    <div class="body">
     <b style="font-size: 25px;">Login: </b> 
      <br />
      <br />
      <form name="Login"  action="action.php" onsubmit="return validate()" method="POST">
      <label for="name">Name:</label><br>
      <input type="text" id="name" name="name" placeholder="Name"><br><br>
      <label for="pass">Password:</label><br>
      <input type="text" id="pass" name="pass" placeholder="Password"><br><br>  
      <div id="textbox" style="color: #FF0000;"></div>
      <input type="submit" value="Login" name="submit">
      </form>
    </div>
    </body>

    <script>
    function validate() {


    if (document.forms["Login"]["name"].value == "" && document.forms["Login"]["pass"].value == ""){


    document.getElementById("textbox").innerHTML = "No Name or Password is given";
    return false;
    }
    else if (document.forms["Login"]["pass"].value == ""){


    document.getElementById("textbox").innerHTML = "No Password is given";
    return false;
    }
    else if (document.forms["Login"]["name"].value == ""){

    document.getElementById("textbox").innerHTML = "No name is given";
    return false;
    }
    }
    </script>



</html>