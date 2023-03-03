<?php

// Get user input from AJAX request
	$username = $_POST["username"];
	$password = $_POST["password"];
	$email = $_POST["email"];

	// Connect to MySQL database
	$conn = mysqli_connect("localhost", "root", "", "profile");
	// Insert user details into MySQL database
	$stmt = mysqli_query($conn, "INSERT INTO `users` (`username`, `password`, `email`) VALUES ('$username', '$password', '$email')");

	if ($stmt->execute() === TRUE) {
		echo "success";
	} else {
		echo "error";
	}

	$conn->close();
?>
