<?php 
	// include connect script
	include("includes/connect.php");

	// query to create database table
	$query = "CREATE TABLE book (";
	$query = $query . "id INT NOT NULL AUTO_INCREMENT,";
	$query = $query . "title varchar(100),";
	$query = $query . "publisher varchar(40),";
	$query = $query . "author varchar(20),";
    $query = $query . "category varchar(30),";
    $query = $query . "description varchar(200),";
	$query = $query . "date DATETIME DEFAULT CURRENT_TIMESTAMP,";
	$query = $query . "PRIMARY KEY(id));";

	$result = mysqli_query($link, $query);

	if(!$result) {
		die("Failed to create database table " . mysqli_error($link));
	} else {
		echo "database updated";
	}

?>