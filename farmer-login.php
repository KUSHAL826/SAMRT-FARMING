<?php

session_start();
include "db-farmer.php";

$email = $_POST['email'];
$password = $_POST['password'];

/* Check farmer login */
$sql = "SELECT * FROM farmers WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if($result->num_rows > 0){

    $row = $result->fetch_assoc();

    /* Store farmer details in session */
    $_SESSION['farmer_id'] = $row['id'];
    $_SESSION['farmer_name'] = $row['name'];
    $_SESSION['phone'] = $row['phone'];
    $_SESSION['address'] = $row['address'];

    /* Redirect to dashboard */
    header("Location: farmer-dashboard.php");
    exit();

}
else{

echo "<p style='color:red; font-weight:bold; text-align:center;'>
Invalid Email or Password
</p>";

echo "<br><div style='text-align:center;'>
<a href='farmer-login.html'>Go Back to Login</a>
</div>";

}

$conn->close();

?>