<?php 
    session_start();
    session_unset();
    session_destroy(); // destroy session
    header('location: index.php');
?>