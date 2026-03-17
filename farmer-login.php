<?php
session_start();
include "db-farmer.php";

if(!isset($_POST['email']) || !isset($_POST['password'])){
    header("Location: farmer-login.html");
    exit();
}

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = $_POST['password'];

/* Get user by email */
$sql = "SELECT * FROM farmers WHERE email='$email'";
$result = $conn->query($sql);

$login_success = false;

if($result->num_rows > 0){

    $row = $result->fetch_assoc();
    $db_password = $row['password'];

    // Support both plain + hashed
    if($password === $db_password || password_verify($password, $db_password)){
        $login_success = true;
    }
}

/* SUCCESS LOGIN */
if($login_success){

    $_SESSION['farmer_id'] = $row['id'];
    $_SESSION['farmer_name'] = $row['name'];
    $_SESSION['phone'] = $row['phone'];
    $_SESSION['address'] = $row['address'];

    header("Location: farmer-dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login Failed</title>
</head>
<body style="background-color:white; text-align:center; margin-top:100px;">

<p style="color:red; font-weight:bold; font-size:20px;">
Invalid Email or Password
</p>

<br>

<a href="farmer-login.html" style="font-size:18px;">
Go Back to Login
</a>

</body>
</html>

<?php
$conn->close();
?>