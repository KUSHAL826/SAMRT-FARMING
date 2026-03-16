<?php

session_start();
if(!isset($_SESSION['crop_name'])){
echo "No crop data received.";
exit();
}

/* Database Connection */
include "db-farmer.php";

/* Get Farmer Details From Session */
$farmer_name = $_SESSION['farmer_name'];
$phone = $_SESSION['phone'];
$address = $_SESSION['address'];
$soil_type = $_SESSION['soil_type'];
$water_availability = $_SESSION['water_availability'];
$season = $_SESSION['season'];
$land_details = $_SESSION['land_details'];

/* Get Crops From Form */
$crops = $_POST['crop_name'];
$productions = $_POST['production'];

/* Loop Through Crops */
for ($i = 0; $i < count($crops); $i++) {

    $crop = $conn->real_escape_string($crops[$i]);
    $production = intval($productions[$i]);

    /* Insert Into Confirmation Table */
    $insert = "INSERT INTO farmer_crop_confirmations
    (farmer_name, phone, address, soil_type, water_availability, season, land_details, crop_name, expected_production)
    VALUES
    ('$farmer_name','$phone','$address','$soil_type','$water_availability','$season','$land_details','$crop','$production')";

    $conn->query($insert);

    /* Update Market Production */
    $update = "UPDATE crop_market
               SET current_production = current_production + $production
               WHERE crop_name = '$crop'";

    $conn->query($update);
}

/* Redirect to Thank You Page */
header("Location: thankyou.html");
exit();

?>