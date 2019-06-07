<?php 
    $host = "localhost";
    $user = "gordon";
    $password = "";
    $db = "library";

    // make database connection
    $conn = mysqli_connect($host, $user, $password, $db);

    if(!$conn) {
        die("Failed to connect" . mysqli_error($conn));
    }
?>