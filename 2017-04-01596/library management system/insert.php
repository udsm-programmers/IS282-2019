<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
include("connect.php");
error_reporting(0);

#check for submit 
if(isset($_POST['submit'])){
 
    // Escape user inputs for security
    $title= mysqli_real_escape_string($link, $_POST['title']);
    $publisher= mysqli_real_escape_string($link, $_POST['publisher']);
    $author = mysqli_real_escape_string($link, $_POST['author']);
    $category = mysqli_real_escape_string($link, $_POST['category']);
    $description= mysqli_real_escape_string($link, $_POST['description']);
    $date = mysqli_real_escape_string($link, $_POST['date']);
   
    // attempt insert query execution
    $sql = "INSERT INTO book2 (title, publisher, author,category,description, date) VALUES ('$title', '$publisher', '$author', '$category', '$description', '$date')";
    if(mysqli_query($link, $sql)){
        header('location:display.php');
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
?> 
