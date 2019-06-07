<?php 
    session_start();

    // unset all session variable
    session_unset();

    // destroy session
    session_destroy();

    // direct to login page
    header('location: index.php');
?>