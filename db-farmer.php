<?php

$host = "sql102.infinityfree.com";
$user = "if0_41382796";
$password = "KUShal12yn";
$database = "if0_41382796_smart_farming";


$conn = mysqli_connect($host,$user,$password,$database);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

?>