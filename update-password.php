<!DOCTYPE html>
<html>
<head>
<title>Smart Farming</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
session_start();
include "db-farmer.php";

if(!isset($_SESSION['reset_email'])){
    echo "<h3 style='color:red; text-align:center;'>Session expired</h3>";
    exit();
}

$email = $_SESSION['reset_email'];

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if($new_password !== $confirm_password){

        echo "<h3 style='color:red; text-align:center;'>Passwords do not match</h3>";
        echo "<div style='text-align:center;'>
                <a href='reset-password.php'>Try Again</a>
              </div>";
        exit();
    }

    // 🔐 SECURE PASSWORD
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    $sql = "UPDATE farmers SET password='$hashed_password' WHERE email='$email'";

    if($conn->query($sql) === TRUE){

        session_destroy();

        echo "<h3 style='color:green; text-align:center;'>Password updated successfully</h3>";
        echo "<div style='text-align:center;'>
                <a href='farmer-login.html'>Login Now</a>
              </div>";
    }
    else{
        echo "<h3 style='color:red; text-align:center;'>Error updating password</h3>";
    }
}

$conn->close();
?>
</body>
</html>