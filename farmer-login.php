<?php

include "db-farmer.php";

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM farmers WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if($result->num_rows > 0){

header("Location:farmer-dashboard.html");
exit();

}
else{

echo "<script>
alert('Invalid Email or Password');
window.location.href='farmer-login.html';
</script>";

}

$conn->close();

?>