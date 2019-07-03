<?php
    include('config.php');

    if(isset($_POST['submit'])) {
        $title = mysqli_real_escape_string($connection, $_POST['title']);
        $writer = mysqli_real_escape_string($connection, $_POST['writer']);
        $publisher = mysqli_real_escape_string($connection, $_POST['publisher']);
        $description = mysqli_real_escape_string($connection, $_POST['description']);
        $category = mysqli_real_escape_string($connection, $_POST['category']);

        // adding a book;
        $query = "INSERT INTO book(title, publisher, description, category) values ('$title', '$publisher', '$description', '$category')";
        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));

        header('Location: home.php');
        exit;

    }
?>

<!DOCTYPE html>
    <head>
        <title>add Book</title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="css/addbookstyles.css" rel="stylesheet"/>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-end">
    <ul class="nav justify-content-end">
        <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link active" href="addbook.php">Add Book</a>
        </li>
    </ul>
    </nav>

    <div class="container" style="margin: 10px;">
        <form role="form" method="POST" action="addbook.php">
            <div class="form-group">
            <label for="title">Book Title: </label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Enter Book title" required>
                
            <label for="title">Book Author: </label>
            <input type="text" name="writer" class="form-control" id="title" placeholder="Enter writer name" required>

            <label for="publisher">Publisher: </label>
            <input type="text" name="publisher" class="form-control" id="publisher" placeholder="Book publisher" required>

            <label for="description">Description: </label>
            <textarea class="form-control" name="description" id="description" rows="3" placeholder="Describe the book"></textarea>
            <label for="category">Category: </label>
            <input type="text" name="category" class="form-control" id="category" placeholder="Enter a category">
            </div>

            <button class="btn btn-primary" type="submit" name="submit">Add Book</button>
        </form>
    </div>
    </body>
</html>