<?php
    include('lungo.php');

    $book = $_GET["id"];
    $sql = "DELETE FROM book WHERE id = $book";

    $result = mysqli_query($lib, $sql) or 
                 die(mysqli_connect_error($lib));
                            header('Location: index.php');
    exit;
?>