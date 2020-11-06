<?php

 session_start();
if(empty($_SESSION['name'])) {
    echo "Please log in first to see this page.";
    header('Location: Login.php');
    die();
}

error_reporting(0);


ini_set('display_errors', 'On');
session_start();
require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$hostname = $_ENV['DB_HOST'];
$username =  $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];
$databse = $_ENV['DB_DATABASE'];

$connect = mysqli_connect($hostname, $username, $password, $databse);

if (!$connect) {
    die('Error while connection: ' . mysqli_connect_error());
}

$user = htmlspecialchars($_SESSION["name"]);


@$sql = $connect->prepare("SELECT * FROM orders WHERE user = ?");
@$sql->bind_param("s", $user);


$sql->execute();                        

$res = $sql->get_result();



$sql->close();
$connect->close();


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
    
<body >
<div class="marginbody">  
     

    <?php     
    echo " <p style=' font-family: inherit; font-size: 40px; color: #443834; font-variant: small-caps;'>Welcome ". $_SESSION['name']. "!</p>"; 
    ?>                                                                                                          
     <p style=" font-family: inherit; font-size: 40px; color: #443834; font-variant: small-caps;">Your panel</p>
     
     <table>
     <tr>
     <th>OrderID :</th>
     <th>Buyer</th>
     <th>Artist</th>
     <th>Deadline</th>
     </tr> 
    
     
    

     <?php 
     while ($row = $res->fetch_assoc()) {
     $date = new Datetime($row["deadline"]); 
     
              
              
     echo"
     <tr>
     <td>".htmlspecialchars($row["OrderID"])."</td>
     <td>". htmlspecialchars($row["buyer"]) ."</td>
     <td>". htmlspecialchars($row["artist"]);."</td>
     <td>".$date->format('M d H:i:s, Y')."</td> 
     </tr> 
     "; 
     
    } ?>
    
    
     
     </table>
     
     <button id="addtablebtn" style="margin-top: 40px;" class="Newbutton" onclick=" 
     var visible = 1;
     console.log(document.getElementById('addtable').style.visibility);

     if(document.getElementById('addtable').style.display == 'none'){    
     document.getElementById('addtable').style.display = 'block';
     document.getElementById('removetable').style.display = 'none';
     document.getElementById('addtablebtn').innerHTML = 'Close -';
     visible = 1;
     }
     else if(document.getElementById('addtable').style.display == 'block') {
     document.getElementById('addtable').style.display = 'none';
      document.getElementById('addtablebtn').innerHTML = 'New +';
     visible = 0;
     }
     
     "> New + </button>
   
     <button id="removetablebtn" style="margin-top: 40px;" class="Newbutton" onclick="
     var visible = 1;
     if(document.getElementById('removetable').style.display == 'none'){
     document.getElementById('removetable').style.display = 'block';
     document.getElementById('addtable').style.display = 'none';
     document.getElementById('removetablebtn').innerHTML = ' Remove Entry - ';
     visible = 1;
     }
     else if(document.getElementById('removetable').style.display == 'block') {
     document.getElementById('removetable').style.display = 'none';
     document.getElementById('removetablebtn').innerHTML = ' Remove Entry + ';
     visible = 0;
     }

     "> Remove Entry + </button>
     
    <div id="addtable" style="display: none;" > 
     <form  class="addtable" name="addtable"  action="addtable.php" onsubmit="return validate()" method="POST" style=" margin-top: 50px;">
      <label for="buyer">Buyer:</label>
      <input type="text" id="buyer" name="buyer" placeholder="Buyer">
      <label for="artist">Artist:</label>
      <input type="text" id="artist" name="artist" placeholder="Artist">
      <label for="deadline">Deadline:</label>
      <input type="datetime-local" id="deadline" name="deadline" placeholder="Deadline">
      <div id="textbox" style="color: #FF0000;"></div>      
      <input type="submit" value="Add to Table" name="submit" style="text-align: center;"> 
      </form>
      </div>
                         
      <div id="removetable" style="display: none;">        
      <form  class="removetable" name="removetable"  action="deletetable.php" onsubmit="return validate()" method="POST" style=" margin-top: 50px;">
      <label for="OrderID">OrderID:</label>
      <input type="text" id="OrderID" name="OrderID" placeholder="OrderID">
      <div id="textbox" style="color: #FF0000;"></div>
      <input type="submit" value="Remove from Table" name="submit" style="text-align: center;">
      </form>
      </div> 
      
  </div>          
     

</body>     
     
     
</head>     
</html>