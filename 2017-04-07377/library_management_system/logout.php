<?php 
    session_start();
    session_unset();
    session_destroy();

    // direct to login page
    header('location: index.php');
?>