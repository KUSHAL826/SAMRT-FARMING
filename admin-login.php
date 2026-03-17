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

echo "<p style='color:red; font-weight:bold; text-align:center;'>
Invalid Admin Login
</p>";

echo "<br><div style='text-align:center;'>
<a href='admin-login.html'>Go Back to Login</a>
</div>";

}

?>