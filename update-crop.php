<?php

include "db-farmer.php";

if(isset($_POST['crop_name'])){

$crop = $_POST['crop_name'];
$total = $_POST['total_demand'];
$current = $_POST['current_production'];

$sql = "UPDATE crop_market 
SET total_demand='$total',
current_production='$current'
WHERE crop_name='$crop'";

if($conn->query($sql) === TRUE){

echo "<script>
alert('Crop Updated Successfully');
window.location.href='admin-dashboard.php';
</script>";

}else{

echo "SQL Error: ".$conn->error;

}

}

?>