<?php
    $server = "localhost";
    $user = "chingalo";
    $pass = "chingalo97";
    $db = "library";

    $connection = mysqli_connect($server, $user, $pass, $db);
    if(!$connection) {
        die("Connection failed: ".mysqli_connect_error($connection));
    }
?>