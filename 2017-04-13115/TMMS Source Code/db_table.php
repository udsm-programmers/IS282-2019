<?php 
	include("connect.php");
	
		$query = "CREATE TABLE customer(";
		$query = $query . "id INT NOT NULL AUTO_INCREMENT,";
		$query = $query . "Firstname varchar(100),";
		$query = $query . "Lastname varchar(100),";
		$query = $query . "Username varchar(100),";
		$query = $query . "Email varchar(100),";
		$query = $query . "Password varchar(100),";
		$query = $query . "Comf_Password varchar(100),";
		$query = $query . "Mobile INT(20),";
		$query = $query . "state varchar(100),";
		$query = $query . "city varchar(100),";
		$query = $query . "District varchar(100),";
		$query = $query . "PRIMARY KEY(id));";

		$result = mysqli_query($conn, $query);

		if(!$result) {
			die("failed to create user table " . mysqli_error());
		} else {
			echo "user table successfully created!";
		}
	

	mysqli_close($conn);
?>