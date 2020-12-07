<?php
	$sql = new mysqli("mysql.eecs.ku.edu","yanliu","ieh7Neeb","yanliu");

	if ($sql->connect_errno) {
		printf("Connect failed: %s\n", $sql->connect_error);
		exit();
	}

	$userquery = "SELECT * FROM Users WHERE true";
	echo "<title>View Users</title>";
	echo "<table><thead><tr><th>User ID</th></tr></thead><tbody style='text-align:center;'>";
	if ($result = $sql->query($userquery)) {
		while ($row = $result->fetch_assoc()) {
			echo "<tr><td>" . $row["user_id"] . "</td></tr>";
		}
		$result->free();
	}
	echo "</tbody></table>";
	echo "<a href='https://people.eecs.ku.edu/~y099l203/eecs448_lab10/exercise4/AdminHome.html'>Back Admin Home</a>";
	
	$sql->close();
?>
