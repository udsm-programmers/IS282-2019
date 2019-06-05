<?php 
	// include connect script
	include("connect.php");

	// query to create database table
	$query = "CREATE TABLE book (";
	$query = $query . "id INT NOT NULL AUTO_INCREMENT,";
	$query = $query . "title varchar(100),";
	$query = $query . "author varchar(40),";
	$query = $query . "isbn INT,";
	$query = $query . "status BOOLEAN,";
	$query = $query . "PRIMARY KEY(id));";

	$result = mysqli_query($conn, $query);

	if(!$result) {
		die("Failed to create database table " . mysqli_error($conn));
	} else {
		echo "database updated";
	}

?>