<?php

include "db-farmer.php";

$crop = $_POST['crop_name'];

$sql = "DELETE FROM crop_market WHERE crop_name='$crop'";

if($conn->query($sql)){

echo "<script>
alert('Crop Deleted Successfully');
window.location.href='admin-dashboard.php';
</script>";

}
else{

echo "Error: ".$conn->error;

}

?>