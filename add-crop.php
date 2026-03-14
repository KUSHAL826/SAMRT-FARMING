<?php

include "db-farmer.php";

/* Get form values */

$crop = $_POST['crop_name'];
$new_crop = $_POST['new_crop'];

if(!empty($new_crop)){
$crop = $new_crop;
}

/* Convert to lowercase for checking */
$crop_check = strtolower($crop);

$total = $_POST['total_demand'];
$current = $_POST['current_production'];


/* Check if crop already exists (case insensitive) */

$check = "SELECT * FROM crop_market 
          WHERE LOWER(crop_name)='$crop_check'";

$result = $conn->query($check);

if($result->num_rows > 0){

echo "<script>
alert('Crop already exists. Please use Update Crop option.');
window.location.href='admin-dashboard.php';
</script>";

}
else{

/* Insert new crop */

$sql = "INSERT INTO crop_market(crop_name,total_demand,current_production)
VALUES('$crop','$total','$current')";

if($conn->query($sql)){

echo "<script>
alert('Crop Added Successfully');
window.location.href='admin-dashboard.php';
</script>";

}
else{

echo "Error: ".$conn->error;

}

}

?>