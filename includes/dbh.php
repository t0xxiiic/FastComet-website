<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "fastcomet";

$connection = new mysqli($dbServername,$dbUsername,$dbPassword,$dbName);

if ($connection->connect_error) {
	die("Connection failed: " . $connection->connect_error);
}
?>