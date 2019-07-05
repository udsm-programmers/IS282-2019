<?php
    include('config.php');
    $bookid = $_GET['id'];

    $query = "SELECT * FROM book WHERE id='$bookid'";
    $result =  mysqli_query($connection, $query) or die(mysqli_error($connection));

    while($row = $result->fetch_assoc()){
        $title = $row['title'];
        $writer = $row['writer'];
        $publisher = $row['publisher'];
        $description = $row['description'];
        $category = $row['category'];
    }


    if($_POST){
        $bookid = $_GET['id'];

        $title = mysqli_real_escape_string($connection, $_POST['title']);
        $writer = mysqli_real_escape_string($connection, $_POST['writer']);
        $publisher = mysqli_real_escape_string($connection, $_POST['publisher']);
        $description = mysqli_real_escape_string($connection, $_POST['description']);
        $category = mysqli_real_escape_string($connection, $_POST['category']);

        $sql = "
            UPDATE book
            SET 
              title = '$title',
              writer = '$writer',
              publisher = '$publisher',
              description = '$description',
              category = '$category'
            WHERE id = '$bookid';
        ";
        $result =  mysqli_query($connection, $sql) or die(mysqli_error($connection));
        header('Location: home.php');
        exit;
    }
?>



<!DOCTYPE html>
    <head>
        <title>edit book</title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-end">
    <ul class="nav justify-content-end">
        <li class="nav-item">
            <a class="nav-link active" href="home.php">Home</a>
        </li>
    </ul>
    </nav>

    <div class="container" style="margin: 10px;">
        <form role="form" method="POST" action="editbook.php?id=<?php echo $bookid ?>">
            <div class="form-group">
            <label for="title">Book Title: </label>
            <input type="text" name="title" class="form-control" id="title" value="<?php echo $title ?>">
                
            <label for="title">Book Author: </label>
            <input type="text" name="writer" class="form-control" id="writer" value="<?php echo $writer ?>">

            <label for="publisher">Publisher: </label>
            <input type="text" name="publisher" class="form-control" id="publisher" value="<?php echo $publisher ?>">

            <label for="description">Description: </label>
            <textarea class="form-control" name="description" id="description" rows="3"><?php echo $description ?></textarea>
            <label for="category">Category: </label>
            <input type="text" name="category" class="form-control" id="category" value="<?php echo $category ?>">
            </div>

            <button class="btn btn-primary" type="submit" name="submit">Update Book</button>
        </form>
    </div>
    </body>
</html>