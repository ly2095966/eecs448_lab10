<?php
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	$mysqli = new mysqli("mysql.eecs.ku.edu","yanliu","ieh7Neeb","yanliu");
	$user = $_POST["user"];

	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}

	$query = "SELECT * FROM Posts 
			WHERE  author_id = '" . $mysqli->real_escape_string($user) . "'";

	if ($result = $mysqli->query($query)) {
		echo "<table>";
		echo "<tr><th>Post ID</th><th>Content</th>";
		while ($row = $result->fetch_assoc()) {
			echo "<tr><td>" . $row["post_id"] . "</td><td>" . $row['content'] . "</td></tr>"; 
		}
		echo "</table>";
		$result->free();
		echo "<a href='https://people.eecs.ku.edu/~y099l203/eecs448_lab10/exercise4/AdminHome.html'>Back Admin Home</a>";
	} else {
		echo "Error: " . $result . "<br>" . $mysqli->error;
		echo "<a href='https://people.eecs.ku.edu/~y099l203/eecs448_lab10/exercise4/AdminHome.html'>Back Admin Home</a>";
	}

	$mysqli->close();
?>