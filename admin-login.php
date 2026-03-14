<?php

session_start();
include "db-farmer.php";

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM admin_login 
        WHERE email='$email' AND password='$password'";

$result = $conn->query($sql);

if($result->num_rows > 0){

$_SESSION['admin']=$email;

header("Location: admin-dashboard.php");

}
else{

echo "<script>
alert('Invalid Admin Login');
window.location.href='admin-login.html';
</script>";

}

?>