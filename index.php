<?php
	include_once 'header.php';
	include_once 'includes/dbh.php';

?>
 	<section class="main-container">
 		<div class="main-wrapper">
 			<h2>Home</h2>
 			
 			<?php 
 				if (isset($_SESSION['u_id'])) {
 					echo '<form class="signup-form" action="includes/uploadPost.inc.php" method="POST">
 							<ul>
 								<li>
 									<textarea rows="5" cols="50" name = "postText"></textarea>
 								</li>
 								<li>
 									<button type = "submit" name = "submit">Submit</button>
 								</li>
 							</ul>
 						</form>';
 					$sql = "SELECT users.email, posts.date, posts.post FROM posts INNER JOIN users ON posts.userID = users.id ORDER BY posts.date DESC;";
					$result = mysqli_query($connection, $sql);
					if (mysqli_num_rows($result) > 0) {
    				// output data of each row
						echo "<br><br>";
    					while($row = mysqli_fetch_assoc($result)) {
        					echo "User: " . $row["email"]. " -  " . $row["date"]. " - " . $row["post"]. "<br>";
    					}
					} else {
    					echo "0 results";
					}

					mysqli_close($connection);
 				}
 			?>
 		</div>
 	</section>
<?php
	include_once 'footer.php';
?>
