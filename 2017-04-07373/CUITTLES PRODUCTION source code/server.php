<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'mydatabase');
if(!$db){
	die("connection failed:".mysqli_connect_error());
}
?>