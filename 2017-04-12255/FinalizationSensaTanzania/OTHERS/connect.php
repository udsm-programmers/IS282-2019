<?php


$severname="Localhost";
$dbusername="root";
$dbspassword="";
$dbname="Sensa_Tanzania_Db";
$conn=mysqli_connect($severname,$dbusername,$dbspassword,$dbname);
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}


?>