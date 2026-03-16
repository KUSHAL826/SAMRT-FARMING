<?php
session_start();

if(!isset($_SESSION['admin'])){
header("Location: admin-login.html");
exit();
}

include "db-farmer.php";

/* Fetch crops for dropdowns */
$crops_update = $conn->query("SELECT crop_name FROM crop_market");
$crops_delete = $conn->query("SELECT crop_name FROM crop_market");

/* Fetch full market table */
$result = $conn->query("SELECT crop_name,total_demand,current_production FROM crop_market");
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
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

<h1>Admin Dashboard</h1>


<!-- FORM 1 : ADD NEW CROP -->

<h2>Add New Crop</h2>

<div class="dashboard-container">

<form action="add-crop.php" method="POST" class="farm-form">

<div class="form-group">
<label>Crop Name</label>
<input type="text" name="crop_name" placeholder="Enter crop name">
</div>

<div class="form-group">
<label>Total Market Demand (kg)</label>
<input type="number" name="total_demand" required>
</div>

<div class="form-group">
<label>Current Production (kg)</label>
<input type="number" name="current_production" required>
</div>

<button type="submit" class="submit-btn">Add Crop</button>

</form>

</div>



<!-- FORM 2 : UPDATE EXISTING CROP -->

<h2>Update Existing Crop</h2>

<div class="dashboard-container">

<form action="update-crop.php" method="POST" class="farm-form">

<div class="form-group">

<label>Select Crop</label>

<select name="crop_name" required>

<option value="">Select Crop</option>

<?php
while($row = $crops_update->fetch_assoc()){
echo "<option>".$row['crop_name']."</option>";
}
?>

</select>

</div>

<div class="form-group">
<label>New Total Demand (kg)</label>
<input type="number" name="total_demand" required>
</div>

<div class="form-group">
<label>New Current Production (kg)</label>
<input type="number" name="current_production" required>
</div>

<button type="submit" class="submit-btn">Update Crop</button>

</form>

</div>



<!-- FORM 3 : DELETE CROP -->

<h2>Delete Crop</h2>

<div class="dashboard-container">

<form action="delete-crop.php" method="POST" class="farm-form">

<div class="form-group">

<label>Select Crop</label>

<select name="crop_name" required>

<option value="">Select Crop</option>

<?php
while($row = $crops_delete->fetch_assoc()){
echo "<option>".$row['crop_name']."</option>";
}
?>

</select>

</div>

<button type="submit" class="submit-btn">Delete Crop</button>

</form>

</div>



<!-- MARKET TABLE -->

<h2 class="market-title">Market Crops</h2>

<table>

<tr>
<th>Crop</th>
<th>Total Demand</th>
<th>Current Production</th>
<th>Remaining Demand</th>
</tr>

<?php

while($row = $result->fetch_assoc()){

$remaining = $row['total_demand'] - $row['current_production'];

echo "<tr>";
echo "<td>".$row['crop_name']."</td>";
echo "<td>".$row['total_demand']."</td>";
echo "<td>".$row['current_production']."</td>";
echo "<td>".$remaining."</td>";
echo "</tr>";

}

?>

</table>

</body>
</html>