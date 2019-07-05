<?php
    include('config.php');

    $book = $_GET['id'];
    $sql = "DELETE FROM book WHERE id = $book";

    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
    header('Location: index.php');
    exit;
?>