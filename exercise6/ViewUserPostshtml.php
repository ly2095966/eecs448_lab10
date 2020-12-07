<!DOCTYPE html>
<html>
	<body>
		<form action="ViewUserPosts.php" method="POST">
			<label for="user">Select User:</label>
			<select name="user" id="user">
			<?php 
				$mysqli = new mysqli("mysql.eecs.ku.edu","yanliu","ieh7Neeb","yanliu"); 
				if ($mysqli->connect_errno) {
					printf("Connect failed: %s\n", $mysqli->connect_error);
					exit();
				}

				$query = "SELECT * FROM Users";
				
				if ($result = $mysqli->query($query)) {
					while ($row = $result->fetch_assoc()) {
						echo '<option value="' . $row["user_id"] . '">' . $row["user_id"] . "</option>"; 
					}
					$result->free();
				}

				$mysqli->close();
			?>
			</select><br>
			<input type="submit">
		</form>
	</body>
</html>