<?php
// Retrieve form data
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Hash password for security
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert user data into database
$conn = mysqli_connect("localhost", "log", "log", "log");
$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
mysqli_query($conn, $sql);
mysqli_close($conn);

// Redirect user to login page
header("Location: login.php");
?>
