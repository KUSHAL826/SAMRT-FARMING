<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


$host = "sql100.infinityfree.com";
$user = "if0_41467967";   
$pass = "KUShal12yn";    
$db   = "if0_41467967_smart_farming"; 


$conn = mysqli_connect($host, $user, $pass, $db);


if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}


date_default_timezone_set("Asia/Kolkata");
?>