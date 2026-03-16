<?php

$host = "sql101.infinityfree.com";
$user = "if0_41398072";
$password = "KUShal136yn"; 
$database = "if0_41398072_smart_farming";


$conn = mysqli_connect($host,$user,$password,$database);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

?>