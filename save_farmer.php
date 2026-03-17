<?php

session_start();
include "db-farmer.php";

if(isset($_POST['farmer_name'])){

$_SESSION['farmer_name'] = $_POST['farmer_name'];
$_SESSION['phone'] = $_POST['phone'];
$_SESSION['address'] = $_POST['address'];
$_SESSION['land_details'] = $_POST['land_details'];
$_SESSION['soil_type'] = $_POST['soil_type'];
$_SESSION['water_availability'] = $_POST['water_availability'];
$_SESSION['season'] = $_POST['season'];

$_SESSION['crop_name'] = $_POST['crop_name'];
$_SESSION['expected_production'] = $_POST['expected_production'];

header("Location: crop-suggestion.php");
exit();


}
else{

echo "<script>
alert('Form submission error');
window.location.href='farmer-dashboard.php';
</script>";

}

?>