<?php
session_start();

// Retrieve form data
$username = $_POST['username'];
$password = $_POST['password'];

// Check if username and password match database records
$conn = mysqli_connect("localhost", "log", "log", "log");
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	$row = mysqli_fetch_assoc($result);
	if (password_verify($password, $row['password'])) {
		$_SESSION['username'] = $username;
		header("Location: index.php");
		exit();
	} else {
		echo "Invalid password.";
	}
} else {
	echo "Invalid username.";
}

mysqli_close($conn);
?>
