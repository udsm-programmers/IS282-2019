<?php
//error_reporting(0);
$host = "localhost";
$user = "root";
$password = "";
$database = "projectvisitors";

$conn = mysqli_connect($host, $user, $password, $database);

if(!$conn) {
    echo "failed to connect " . mysqli_connect_error();
}

?>


