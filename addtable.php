<?php
 session_start();
if(empty($_SESSION['name'])) {
    echo "Please log in first to see this page.";
    header('Location: Login.php');
    die();
}

error_reporting(0);

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

$user = $_SESSION["name"];
$artist = $_POST['artist'];
$buyer = $_POST['buyer'];
$deadline = $_POST['deadline'];

$sql = $connect->prepare("INSERT INTO orders (user, buyer, artist, deadline) VALUES(?, ?, ?, ?)");
$sql->bind_param("ssss", $user, $buyer, $artist, $deadline);



$sql->execute();



$sql->close();
$connect->close();


if($buyer == ""){

  //  echo "Please dont leave the Name Field empty";
  header("Location: Profile.php", true, 301);

}if($artist == ""){
  //  echo "<br />" ;
  //  echo "Please dont leave the Password Field empty";
  header("Location: Profile.php", true, 301);

}if($deadline == ""){
  //  echo "<br />" ;
  //  echo "Please dont leave the Password Field empty";
  header("Location: Profile.php", true, 301);

}

header("Location: Profile.php", true, 301);




// $row = $res -> fetch_assoc();

// echo ($row["password"]);












?>
