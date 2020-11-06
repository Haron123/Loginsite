<?php
 session_start(); 
 error_reporting(0);
 session_unset();
 $_SESSION = array();
 session_destroy(); 
 
 header( "Refresh:0.5; url=index.php", true, 303);?>

