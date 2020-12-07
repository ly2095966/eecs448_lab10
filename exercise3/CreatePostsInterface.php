<?php
	$mysqli = new mysqli("mysql.eecs.ku.edu","yanliu","ieh7Neeb","yanliu");
	$user_id = $_POST["user"];
	$content = $_POST["content"];

	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}

	$userquery = "SELECT * FROM Users WHERE user_id='$user_id'";

	if ($mysqli->query($userquery)->num_rows) {
		$postquery = "INSERT INTO Posts (content,author_id) VALUES ('$content','$user_id')";
		if ($mysqli->query($postquery)) {
			echo "<p>Txt was posted successfully</p><br />";
			echo "<a href='../index.html'>Back home</a>";
		} 
		else {
			echo "<p>Error: " . $mysqli->error . "";
			echo "<a href='../index.html'>Back home</a>";
		}
	} 
	else {
		echo "<p>User does not exist</p><br />";
		echo "<a href='CreatePostsInterface.html'>Let's try again</a><br />";
		echo "<a href='../index.html'>Back home</a>";
	}

	$mysqli->close();
?>
