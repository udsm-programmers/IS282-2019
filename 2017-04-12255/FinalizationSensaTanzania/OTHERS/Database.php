<?php

include("Connect_inc.php");


$sql = "CREATE DATABASE Sensa_Tanzania_Db";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
}
$conn->close();

?>