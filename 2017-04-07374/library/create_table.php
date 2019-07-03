<?php

include ("connect.php");

// Creating database table
$SQL = " CREATE TABLE book (";
$SQL = $SQL . " id INT NOT NULL AUTO_INCREMENT, ";
$SQL = $SQL . " title VARCHAR(50), ";
$SQL = $SQL . " publisher VARCHAR(75), ";
$SQL = $SQL . " description TEXT, ";
$SQL = $SQL . " category VARCHAR(50), ";
$SQL = $SQL . " PRIMARY KEY(id) );";


//execute SQL statement
if ($conn->query($SQL) === TRUE) {

    echo "Table book created successfully";
} 
$conn->close();

?>