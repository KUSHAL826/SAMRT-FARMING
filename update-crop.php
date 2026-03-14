<?php

include "db-farmer.php";

$crop = $_POST['crop_name'];
$total = $_POST['total_demand'];
$current = $_POST['current_production'];

$sql = "UPDATE crop_market 
SET total_demand='$total',
current_production='$current'
WHERE crop_name='$crop'";

$conn->query($sql);

header("Location: admin-dashboard.php");

?>