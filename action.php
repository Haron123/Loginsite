<?php


ini_set('display_errors', 'On');

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


$name = $_POST['name'];
$pass = $_POST['pass'];



@$sql = $connect->prepare("SELECT password FROM logindaten WHERE name = ? ");
@$sql->bind_param("s", $name);
$sql->execute();

$res = $sql->get_result();

$row = $res -> fetch_assoc();

// echo ($row["password"]);


                
$connect->close();

error_reporting(0);

if(password_verify($pass, $row['password'])) {
echo "You Successfully logged in  "   ; 
session_start();
$_SESSION["name"] = $name; 
header( "Refresh:1; url=index.php", true, 303);

   
   
}else {

 echo "<div>wrong pass</div>";

 header( "Refresh:1; url=Login.html", true, 303);
    
}




?>
