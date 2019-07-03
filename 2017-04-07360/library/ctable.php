<?php  
   // code for creating table 
	include("lungo.php");

	$query = "CREATE TABLE book (
        id INT NOT NULL AUTO_INCREMENT,
        title varchar(40) NOT NULL,
        publisher varchar(75) NOT NULL,
        description TEXT,
        category varchar(45) NOT NULL,
        PRIMARY KEY(id));";

       
	$result = mysqli_query($lib, $query);

	if(!$result) {
		die("failed to create book table " . mysqli_connect_error($result));
	} else {
		echo "table created";
	}

?>
