<?php 
session_start();

if (isset($_POST['submit'])) {
	include 'dbh.php';

	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$pwd = mysqli_real_escape_string($connection, $_POST['pwd']);

	//Error handlers
	//Check if inputs are empty

	if (empty($email) || empty($pwd)) {
		header("Location: ../signup.php?login=empty");
		exit();
	}else{
		$sql = "SELECT * FROM users WHERE email = '$email'";
		$result = mysqli_query($connection, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: ../index.php?login=error");
			exit();
		}else{
			if ($row = mysqli_fetch_assoc($result)) {
				//De-hashing the password
				$hashedPwdCheck = password_veryfy($pwd, $row['email']);
				if ($hashedPwdCheck == false) {
					header("Location: ../index.php?login=error");
					exit();
				}elseif($hashedPwdCheck == true){
					//Log in the user
					$_SESSION['u_id'] = $row['id'];
					$_SESSION['u_email'] = $row['email'];
					header("Location: ../index.php?login=success");
					exit();
				}

			}
		}
	}
}else{
	header("Location: ../index.php?login=error");
	exit();
}