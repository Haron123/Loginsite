<?php

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

$onthispage = true;
$name = $_POST['name'];
$pass = $_POST['pass'];

$sql = $connect->prepare("SELECT ID FROM logindaten WHERE name = ?");
$sql->bind_param("s", $name);

$sql->execute();

$res = $sql->get_result();

$row = $res -> fetch_assoc();

    
  

 if($name != "" && $row["ID"] == null || $pass != "" && $row["ID"] == null) {
     
 

@$sql = $connect->prepare("INSERT INTO logindaten (name, password) VALUES(?, ?)");
@$sql->bind_param("ss", $name, $finalpass);

$finalpass = password_hash($pass, PASSWORD_DEFAULT);
$sql->execute();

echo "Succesfully Registered";

$sql->close();
$connect->close();
if (preg_match("/^[A-Za-z]{1}[A-Za-z0-9]{3,12}$/", $name)) {

}
                                
}if($name == ""){
    
  //  echo "Please dont leave the Name Field empty";
 
}if($pass == ""){
  //  echo "<br />" ;
  //  echo "Please dont leave the Password Field empty";
   
}if($row["ID"] != ""){
    
 
   $_SESSION["Nametaken"] = true; 
    
 }


header("Location: Login.php", true, 301);  
  

 

// $row = $res -> fetch_assoc();

// echo ($row["password"]);












?>
