<!DOCTYPE html>
<html>
	<body>
		<form action="DeletePost.php" method="POST">
			<table>
				<tr><th>Post ID</th><th>Content</th><th>Author</th><th>Delete?</th>
				<?php 
					$mysqli = new mysqli("mysql.eecs.ku.edu","yanliu","ieh7Neeb","yanliu"); 

					if ($mysqli->connect_errno) {
						printf("Connect failed: %s\n", $mysqli->connect_error);
						exit();
					}

					$query = "SELECT * FROM Posts";

					if ($result = $mysqli->query($query)) {
						
						while ($row = $result->fetch_assoc()) {
							echo "<tr><td>" . $row["post_id"] . "</td><td>" . $row['content'] . "</td><td>" . $row['author_id'] . '</td><td> <input type="checkbox" id="posts" name="posts[]" value="' . $row['post_id'] . '"></td></tr>'; 
						}
						
						$result->free();
					}

					$mysqli->close();
				?>
			</table><br>
			<input type="submit">
		</form>
	</body>
</html>