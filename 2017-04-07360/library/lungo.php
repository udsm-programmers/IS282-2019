<?php
$server="localhost";
$user="danny";
$pwd="danny1997";
$dbname="library";
 
 

 //connection php and library databases
 $lib=mysqli_connect($server,$user,$pwd,$dbname);

 //check for connection 

 if(!$lib){
     die("connection failed" .mysqli_connect_error() );
 }
 
 
    
 




?>