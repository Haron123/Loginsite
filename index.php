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

<body onload="overlayindex()">
     <div class="topnav">
      <a onclick="MainPage()">Mainpage</a>
      <?php 
      include 'topnav.php';
       ?>

      </div>  
      
      <header style="text-align: center;">
      <b style="font-size: 30px;">Main Page</b>
      </header>

      <?php
     echo " <br /> Hello " . htmlspecialchars($_SESSION["name"]) . "!";
      ?>
                               
     <div class="owo"></div>

    <style>
    .owo {
    width: 50px;
    height: 50px;  
    }
    
    .owo:hover {
    background-color: #FF0000; 
  
  transform: rotate(60deg);
  transition: background-color 2s,  transform 2s;
    }
   
    



    
    
    </style>

 </body>

</html>