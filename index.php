<?php
 error_reporting(0);
 session_start();
 ?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script language="javascript" type="text/javascript" src="scripts.js"></script>
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="style.css?v=3.4.1">                              

</head>                

<body onload="overlayindex()">
     <div style="margin-bottom: 0px;" class="topnav">
      <a onclick="MainPage()">Mainpage</a>
      <?php 
      include 'topnav.php';
       ?>



      </div> 
      
      <div style="top: 500px; position: relative;">
      
        
        
      <header style="text-align: center;">
      <b style="font-size: 30px; position: absolute; top: 50px; left: 46%;  font-family: cursive;">Welcome !</b>
      </header>

     
       <div style="top: 20px; position: absolute; font-size: 60px; left: 30px; ">          
      <?php
  //   echo " <br /> Hello " . htmlspecialchars($_SESSION["name"]) . "!";
      ?>
      </div> 
      </div>
                               
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