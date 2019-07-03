

<?php

include("connect.php");

$sql = "CREATE DATABASE library";
if ($conn->query($sql) === TRUE) {
    
    echo "Database created successfully";
}
$conn->close();

?>