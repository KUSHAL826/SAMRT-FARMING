<?php
session_start();
if(!isset($_SESSION['crop_name'])){
echo "No crop data received.";
exit();
}
$conn = new mysqli("localhost","root","","smart_farming");

$sql = "SELECT * FROM crop_market ORDER BY (total_demand-current_production) DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>Crop Suggestions</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<h1 style="text-align:center;">Market Based Crop Suggestions</h1>

<div class="suggestion-container">

<?php

while($row = $result->fetch_assoc()){

$crop = $row['crop_name'];
$total = $row['total_demand'];
$current = $row['current_production'];
$remaining = $total - $current;

echo "<div class='crop-card'>";

echo "<h2>$crop</h2>";

echo "<p>Total Market Demand : $total kg</p>";
echo "<p>Current Production : $current kg</p>";
echo "<p>Remaining Demand : $remaining kg</p>";

if($remaining > 0){

echo "<p style='color:green;font-weight:bold'>Recommended Crop</p>";
echo "<p>Reason: Market demand is still available.</p>";

}
else{

echo "<p style='color:red;font-weight:bold'>Not Recommended</p>";
echo "<p>Reason: Demand already satisfied.</p>";

}

echo "</div>";

}

?>

</div>

<br>

<div style="text-align:center;">
<a href="confirm-crops.html">
<button class="submit-btn">Proceed to Confirm Crops</button>
</a>
</div>

</body>
</html>