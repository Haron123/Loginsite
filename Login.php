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
<link rel="stylesheet" href="style.css?v=3.4.1"> 
<title>Login</title>


     <div class="topnav">
     
      <a onclick="MainPage()">Mainpage</a>
      <?php include 'topnav.php'; ?>
      
     
     </div>
     
          
      

    </head>


    <body >
    
    
   
    
    
      <img style="background-repeat: no-repeat; position: absolute; top: 590px;" src="flowerbg.png" width="100%" height="352" alt="" /> 
    <div class="body"  style=" position: absolute; top: 570px; left: 15%; font-family: cursive;">


      <form name="Login"  action="action.php" onsubmit="return validate()" method="POST">
      <b style="font-size: 25px; ">Login: </b>
      <label for="name" style="margin-left: 100px; font-size: 20px; ">Name:</label>
      <input style="margin-right: 100px;" type="text" id="name" name="name" placeholder="Name">
      <label for="pass" style="font-size: 20px;"  >Password:</label>
      <input style="margin-right: 100px;" type="text" id="pass" name="pass" placeholder="Password">
      <input type="submit" value="Login" name="submit">
      <div id="textbox" style="color: #FF0000;"></div>
      
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