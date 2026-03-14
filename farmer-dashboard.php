<?php
include "db-farmer.php";

/* fetch crops */
$crops = [];
$result = $conn->query("SELECT crop_name FROM crop_market");

while($row = $result->fetch_assoc()){
$crops[] = $row['crop_name'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Farmer Dashboard</title>
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
<li><a href="index.html">Home</a></li>
<li><a href="farmer-dashboard.php">Farmer</a></li>
<li><a href="admin-login.html">Admin</a></li>
<li><a href="about.html">About Us</a></li>
</ul>
</nav>

</header>


<div class="container">

<h1>Smart Crop Advisory System</h1>

<form action="save_farmer.php" method="POST" class="farm-form">

<h2>Farmer Details</h2>

<div class="form-grid">

<div class="form-group">
<label>Farmer Name</label>
<input type="text" name="farmer_name" required>
</div>

<div class="form-group">
<label>Phone</label>
<input type="text" name="phone" required>
</div>

<div class="form-group">
<label>Address</label>
<input type="text" name="address" required>
</div>

<div class="form-group">
<label>Land Details</label>
<input type="text" name="land_details" placeholder="Example: 2 acres" required>
</div>

<div class="form-group">
<label>Soil Type</label>
<select name="soil_type">
<option>Loamy</option>
<option>Black</option>
<option>Sandy</option>
<option>Red</option>
</select>
</div>

<div class="form-group">
<label>Water Availability</label>
<select name="water_availability">
<option>Low</option>
<option>Medium</option>
<option>High</option>
</select>
</div>

<div class="form-group">
<label>Season</label>
<select name="season">
<option>Summer</option>
<option>Winter</option>
<option>Monsoon</option>
</select>
</div>

</div>


<h2>Select Crops of Interest</h2>

<div id="cropContainer">

<div class="crop-row">

<select name="crop_name[]">

<?php
foreach($crops as $crop){
echo "<option>$crop</option>";
}
?>

</select>

<input type="number" name="expected_production[]" placeholder="Production (kg)" required>

<button type="button" class="remove-btn" onclick="removeCrop(this)">Remove</button>

</div>

</div>

<button type="button" class="add-btn" onclick="addCrop()">Add Another Crop</button>

<br><br>

<button type="submit" class="submit-btn">Check Suitability</button>

</form>

</div>


<script>

/* crop list from PHP */

let crops = <?php echo json_encode($crops); ?>;

let cropCount = 1;

function addCrop(){

if(cropCount >= 12){
alert("Maximum 12 crops allowed");
return;
}

cropCount++;

let container = document.getElementById("cropContainer");

let options = "";

crops.forEach(function(crop){
options += `<option>${crop}</option>`;
});

let div = document.createElement("div");
div.className="crop-row";

div.innerHTML = `
<select name="crop_name[]">
${options}
</select>

<input type="number" name="expected_production[]" placeholder="Production (kg)" required>

<button type="button" class="remove-btn" onclick="removeCrop(this)">Remove</button>
`;

container.appendChild(div);

}

/* remove crop row */

function removeCrop(button){

let row = button.parentElement;

row.remove();

cropCount--;

}

</script>

</body>
</html>