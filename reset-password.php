<!DOCTYPE html>
<html>
<head>
<title>Smart Farming</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
session_start();

if(!isset($_SESSION['reset_email'])){
    echo "<h3 style='color:red; text-align:center;'>Unauthorized access</h3>";
    exit();
}
?>

<form action="update-password.php" method="POST" style="text-align:center; margin-top:50px;">
    <h2>Reset Password</h2>

    <input type="password" name="new_password" placeholder="Enter New Password" required>
    <br><br>

    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
    <br><br>

    <button type="submit">Update Password</button>
</form>
</body>
</html>