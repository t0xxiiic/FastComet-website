<?php 
session_start();
if (isset($_POST['submit'])) {
	
	include_once 'dbh.php';

	$uid = $_SESSION['u_id'];
	$postText = mysqli_real_escape_string($connection, $_POST['postText']);
	$date = date("Y-m-d");

	$stmt = $connection->prepare("INSERT INTO posts (posts.userID, posts.date, posts.post) VALUES (?,?,?)");
	$stmt->bind_param("sss", $uid, $date, $postText);
	$stmt->execute();
	/*$sql = "INSERT INTO posts (posts.userID, posts.date, posts.post) VALUES ('$uid','$date', '$postText');";
	mysqli_query($connection, $sql);*/
	header("Location: ../index.php?uploaded");
	exit();

}else{
	header("Location: ../signup.php");
	exit();
}
?>