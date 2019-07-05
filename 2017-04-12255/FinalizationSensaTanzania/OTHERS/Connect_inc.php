<?php


$severname="Localhost";
$dbusername="root";
$dbspassword="";

$conn=mysqli_connect($severname,$dbusername,$dbspassword);
if(!$conn){
    die("connection failed:".mysqli_connect_error());
} 
else{
	echo "asdfgh";
}


?>