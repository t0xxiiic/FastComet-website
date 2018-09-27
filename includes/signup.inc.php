<?php

if (isset($_POST['submit'])) {
	
	include_once 'dbh.php';

	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$password = mysqli_real_escape_string($connection, $_POST['pwd']);

	//Error handlers
	//Check for empty fields
	if (empty($email) || empty($password)) {
		header("Location: ../signup.php?signup=empty");
		exit();
	}else{
		//Check if input email is valid
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			header("Location: ../signup.php?signup=invalid");
			exit();
		}else{
			$sql = "SELECT * FROM users WHERE email = '$email'";
			$result = mysqli_query($connection, $sql);
			$resultCheck = mysqli_num_rows($result);
			
			if($resultCheck > 0){
				header("Location: ../signup.php?signup=usertaken");
				exit();
			}else{
				//Hashing the password
				$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
				//Insert the user into the database
				$sql = "INSERT INTO users (email,password) VALUES ('$email','$password');";
				mysqli_query($connection, $sql);
				header("Location: ../signup.php?signup=success");
				exit();
			} 
		}
	}

}else{
	header("Location: ../signup.php");
	exit();
}