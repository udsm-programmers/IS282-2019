<?php 
	// include connection script
	include("includes/connect.php");

	$id = $_GET['id'];
	$result = mysqli_query($conn, "DELETE FROM book WHERE id='$id'") or die(mysqli_error($conn));

	if($result) {
		header("Location: index.php");
	}
?>