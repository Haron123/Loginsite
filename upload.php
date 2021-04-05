<?php

  
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
    
     function generateRandomString($length = 10) {
     $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
     $charactersLength = strlen($characters); $randomString = '';
     for ($i = 0; $i < $length; $i++) { $randomString .= $characters[rand(0, $charactersLength - 1)]; }
     return $randomString; }

    $folder = generateRandomString();
    $newname = $folder;

    mkdir("uploads/".$folder);

    $currentDirectory = getcwd();
    $uploadDirectory = "/uploads/".$folder."/";

    $errors = []; // Store errors here

    $fileExtensionsAllowed = ['jpeg','jpg','png']; // These will be the only file extensions allowed

    $fileName = $_FILES['the_file']['name'];
    $fileSize = $_FILES['the_file']['size'];
    $fileTmpName  = $_FILES['the_file']['tmp_name'];
    $fileType = $_FILES['the_file']['type'];
    @$fileExtension = strtolower(end(explode('.',$fileName)));

    $uploadPath = $currentDirectory . $uploadDirectory . basename($fileName);

    if (isset($_POST['submit'])) {


      if ($fileSize > 4000000000) {
        $errors[] = "File exceeds maximum size (4GB)";
      }

      if (empty($errors)) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

        if ($didUpload) {
          echo "The file " . basename($fileName) . " has been uploaded";
        } else {
          echo "An error occurred. Please contact the administrator.";
        }
      } else {
        foreach ($errors as $error) {
          echo $error . " These are the errors" . "\n";
        }
      }

    }
    
     
    
    
     
     
     
     $link =  "https://localhost/";

     @$sql = $connect->prepare("INSERT INTO uploads (ininame, newname, link) VALUES(?, ?, ?)");
     @$sql->bind_param("sss", $fileName, $newname, $link);

    
    $sql->execute();

    $sql->close();
    $connect->close();
    
    
    
    $_SESSION["uploaded"] = true;
    $_SESSION["link"] = "localhost".$uploadDirectory.$fileName;
    header("Location: profile.php", true, 301);

?>