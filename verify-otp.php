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
    echo "<h3 style='color:red; text-align:center;'>Session expired. Try again.</h3>";
    exit();
}

$email = $_SESSION['reset_email'];

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $otp = trim($_POST['otp']);

    // ✅ CORRECT SQL QUERY
    $sql = "SELECT * FROM farmers 
            WHERE email='$email' 
            AND otp_code='$otp'";

    $result = $conn->query($sql);

    if($result->num_rows > 0){

        $row = $result->fetch_assoc();

        // ✅ CHECK EXPIRY SEPARATELY
        if($row['otp_expiry'] > date("Y-m-d H:i:s")){

            // clear OTP
            $conn->query("UPDATE farmers SET otp_code=NULL, otp_expiry=NULL WHERE email='$email'");

            header("Location: reset-password.php");
            exit();

        } else {
            echo "<h3 style='color:red; text-align:center;'>OTP Expired</h3>";
        }

    } else {

        echo "<h3 style='color:red; text-align:center;'>Invalid OTP</h3>";
    }
}
?>

<div class="auth-container">
  <div class="auth-box">
    <h2>Enter OTP</h2>

    <form method="POST">
      <input type="number" name="otp" required>
      <button class="auth-btn">Verify OTP</button>
    </form>

    <a href="forgot-password.html">Resend OTP</a>
  </div>
</div>
</body>
</html>