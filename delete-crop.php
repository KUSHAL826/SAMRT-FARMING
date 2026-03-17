<?php

include "db-farmer.php";

if(isset($_POST['crop_name'])){

$crop = $_POST['crop_name'];

$sql = "DELETE FROM crop_market WHERE crop_name='$crop'";

if($conn->query($sql) === TRUE){

echo "<script>
alert('Crop Deleted Successfully');
window.location.href='admin-dashboard.php';
</script>";

}else{

echo "SQL Error: ".$conn->error;

}

}
?>