<?php
    include("connect.php");

    $sql = "CREATE TABLE book(
        id INT NOT NULL AUTO_INCREMENT,
        title VARCHAR(50),
        publisher VARCHAR(75),
        description TEXT,
        category VARCHAR(50),
        PRIMARY KEY(id)
    );";
    $result = mysqli_query($connection, $sql);

    header('Location: index.php');
    exit;
?>