<?php
$link = mysqli_connect("localhost", "root", "", "library2");
error_reporting(0);
// Check connection
if($link == false){
   die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>
