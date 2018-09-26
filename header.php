<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	
 	<header>
 		<nav>
 			<div class="main-wrapper">
 				<ul>
 					<li><a href="index.php">Home</a></li>
 				</ul>
 				<div class="nav-login">
 					<form action="includes/login.inc.php" method="POST">
						<input type="text" name="email" placeholder="Email">
						<input type="password" name="pwd" placeholder="Password">
						<button type="submit" name="submit">Login</button>
						<a href="signup.php"></a> 
					</form>
					<a href="signup.php">Sign Up</a>
 				</div>
 			</div>
 		</nav>
 	</header>