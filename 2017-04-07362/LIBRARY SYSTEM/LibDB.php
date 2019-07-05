<?php 
  // file for connecting to your  database


	$host = "localhost";
	$user = "EMMAN";
	$pass = "1995EMMAN";
	$db = "Library";

	$conn = mysqli_connect($host, $user, $pass, $db);

	if(!$conn) {
		die("failed to connect to database " . mysqli_connect_error($conn));
	}
?>
