<?php 
    include('connect.php');
    $id = $_GET['id'];

    $sql = "DELETE FROM book WHERE id='$id'";
    $result = $conn->query($sql);
    if($result) {
        header('location: books_list.php');
    } else {
        echo "<script>alert('Something went wrong');</script>";
    }
?>