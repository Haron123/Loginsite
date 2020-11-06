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

<title>Register</title>

     <div class="topnav">
      <a onclick="MainPage()">Mainpage</a>
     <?php include 'topnav.php'; ?>
      
  
     </div>
    
      

    </head>

    <body>
    
    

    <div class="body">
     <b style="font-size: 25px;">Register:</b> 
     <br />
     <br />
    
      <form name="Register"  action="entry.php" onsubmit="return validate()" method="POST">
      <label for="name">Name:</label><br>
      <input type="text" id="name" name="name" placeholder="Name"><br><br>
      <label for="pass">Password:</label><br>
      <input type="text" id="pass" name="pass" placeholder="Password"><br><br>
      <div id="textbox" style="color: #FF0000;"></div>
      <?php if($_SESSION["Nametaken"] == true) {
          
             echo "<div style='color : #FF0000'>Name Already Taken</div>";
             $_SESSION["Nametaken"] = false;
           }
           
       ?>
      <input class="submit" type="submit" value="Register" name="submit">    
      </form>
    </div>
     


    

    </body>


    <script>
    function validate() {

    if (document.forms["Register"]["name"].value == "" && document.forms["Register"]["pass"].value == ""){

    document.getElementById("textbox").innerHTML = "No Name or Password is given";
    return false;
    }
    else if (document.forms["Register"]["pass"].value == ""){

    document.getElementById("textbox").innerHTML = "No Password is given";
    return false;
    }
    else if (document.forms["Register"]["name"].value == ""){

    document.getElementById("textbox").innerHTML = "No name is given";
    return false;
    }
    }
    </script>
                                                  


</html>