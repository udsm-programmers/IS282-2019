<?php 
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "payroll";

    $conn = mysqli_connect($host, $user, $password, $db);

    if(!$conn) {
        die(mysqli_error($conn));
    }
?>