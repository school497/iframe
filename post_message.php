<?php
session_start();

if(isset($_SESSION['username'])) {
  $message = $_POST['message'];
  $username = $_SESSION['username'];

  // Establish database connection
  $conn = mysqli_connect("localhost", "log", "log", "log");

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Insert message into database
  $sql = "INSERT INTO messages (username, message) VALUES ('$username', '$message')";
  if (mysqli_query($conn, $sql)) {
    // Redirect to message board page
    header("Location: index.php");
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
} else {
  header("Location: login.php");
  exit();
}
?>
