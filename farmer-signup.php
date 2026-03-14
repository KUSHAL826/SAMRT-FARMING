<?php

include "db-farmer.php";

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$address = $_POST['address'];
$phone = $_POST['phone'];

// Check if email already exists
$check = "SELECT * FROM farmers WHERE email='$email'";
$result = $conn->query($check);

if($result->num_rows > 0){

echo "<script>
alert('Email already registered');
window.location.href='farmer-signup.html';
</script>";

}
else{

$sql = "INSERT INTO farmers (name,email,password,address)
VALUES ('$name','$email','$password','$address')";

if($conn->query($sql) === TRUE){

echo "<script>
alert('Registration Successful');
window.location.href='farmer-login.html';
</script>";

}
else{

echo "Error: " . $conn->error;

}

}

$conn->close();

?>