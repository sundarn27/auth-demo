<?php
 	session_start();
	// Get user input from AJAX request
	$email = $_POST["email"];
	$password = $_POST["password"];

	// Connect to MySQL database
	$conn = mysqli_connect("localhost", "root", "", "profile");

	// Check if user details are valid
	$stmt = mysqli_query($conn, "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");
	$num = mysqli_num_rows($stmt);

	if ($num > 0) {
		// Create session for user
		$row = $stmt->fetch_assoc();
		$user_id = $row["id"];
		$_SESSION['user_id'] = $user_id;
		// $session_id = md5(uniqid(rand(), true));
		// $redis = new Redis();
		// $redis->connect('127.0.0.1', 6379);
		// $redis->set($session_id, $user_id);
		// setcookie("session_id", $session_id, time()+3600);
		echo "success";
	} else {
		echo "error";
	}

	$conn->close();
?>
