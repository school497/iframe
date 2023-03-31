<!DOCTYPE html>
<html>
<head>
	<title>Message Board</title>
	<script src="js/script.js"></script>
	<nav><button onclick="ref()">Logout</button></nav>
</head>
<body>
	<h1>Message Board</h1>

	<?php
		// Display all messages from the database
		$db = mysqli_connect('localhost', 'log', 'log', 'log');
		$query = "SELECT * FROM messages ORDER BY id DESC";
		$result = mysqli_query($db, $query);

		while ($row = mysqli_fetch_assoc($result)) {
			echo "<p><strong>{$row['username']}</strong>: {$row['message']}</p>";
		}

		mysqli_close($db);
	?>

	<hr>

	<h2>Post a Message</h2>

	<form action="post_message.php" method="post">
		<label for="message">Message:</label><br>
		<textarea name="message" id="message" rows="5" cols="30"></textarea><br><br>
		<input type="submit" value="Post">
	</form>
</body>
</html>
