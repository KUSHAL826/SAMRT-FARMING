
<?php
session_start();

include "db-farmer.php";

/* Convert values to lowercase for safe comparison */
$soil = strtolower($_SESSION['soil_type']);
$water = strtolower($_SESSION['water_availability']);
$season = strtolower($_SESSION['season']);

$sql = "SELECT * FROM crop_market ORDER BY (total_demand-current_production) DESC";
$result = $conn->query($sql);

if(!$result){
    die("Query Error: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Smart Crop Suggestions</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<header class="navbar">

<div class="logo">
<img src="logo.png">
<span>GNA SMART FARMING</span>
</div>
 <nav>

<ul class="nav-links">

<li><a href="./index.html">Home</a></li>
<li><a href="farmer-login.html">Farmer</a></li>
<li><a href="admin-login.html">Admin</a></li>
<li><a href="about.html">About Us</a></li>

</ul>

</nav>
</header>
<h1 style="text-align:center;">Smart Crop Suggestions</h1>

<div class="suggestion-container">

<?php

while($row = $result->fetch_assoc()){

$crop = $row['crop_name'];
$total = $row['total_demand'];
$current = $row['current_production'];
$remaining = $total - $current;

$recommended = false;
$reason = "";
$score = 0;

/* Only analyze if market demand exists */
if($remaining > 0){

    /* Soil Matching */
    if(
        ($soil == "loamy") ||
        ($soil == "sandy" && ($crop == "Groundnut" || $crop == "Maize" || $crop == "Tomato")) ||
        ($soil == "black" && ($crop == "Cotton" || $crop == "Maize")) ||
        ($soil == "red" && ($crop == "Potato" || $crop == "Onion"))
    ){
        $score++;
    }

    /* Water Matching */
    if(
        ($water == "high" && $crop == "Rice") ||
        ($water == "medium") ||
        ($water == "low" && $crop == "Groundnut")
    ){
        $score++;
    }

    /* Season Matching */
    if(
        ($season == "monsoon" && ($crop == "Rice" || $crop == "Cotton" || $crop == "Maize")) ||
        ($season == "winter" && ($crop == "Wheat" || $crop == "Onion" || $crop == "Potato" || $crop == "Cabbage" || $crop == "Cauliflower")) ||
        ($season == "summer" && ($crop == "Tomato" || $crop == "Brinjal" || $crop == "Chilli"))
    ){
        $score++;
    }

    /* Final Decision */
    if($score >= 1){
        $recommended = true;
        $reason = "Crop matches land conditions and market demand exists.";
    }
    else{
        $reason = "Market demand exists but crop suitability is low.";
    }

}
else{
    $reason = "Market demand already satisfied.";
}

echo "<div class='crop-card'>";

echo "<h2>$crop</h2>";
echo "<p>Total Market Demand : $total kg</p>";
echo "<p>Current Production : $current kg</p>";
echo "<p>Remaining Demand : $remaining kg</p>";

if($recommended){
    echo "<p style='color:green;font-weight:bold'>Recommended Crop</p>";
}
else{
    echo "<p style='color:red;font-weight:bold'>Not Recommended</p>";
}

echo "<p>Reason: $reason</p>";

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
```
