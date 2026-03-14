```php
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
    $_SESSION['farmer_name'] = $row['farmer_name'];
    $_SESSION['phone'] = $row['phone'];
    $_SESSION['address'] = $row['address'];
    $_SESSION['soil_type'] = $row['soil_type'];
    $_SESSION['water_availability'] = $row['water_availability'];
    $_SESSION['season'] = $row['season'];
    $_SESSION['land_details'] = $row['land_details'];

    /* Redirect to dashboard */
    header("Location: farmer-dashboard.php");
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
```
