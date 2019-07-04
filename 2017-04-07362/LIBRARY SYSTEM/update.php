<?php
    include('LibDBs.php');
    $id = $_GET['id'];

    $query = "SELECT * FROM book WHERE id='$id'";
    $result =  mysqli_query($lib, $query) or die(mysqli_error($lib));

    while($row = $result->fetch_assoc()){
        $title = $row['title'];
        $publisher = $row['publisher'];
        $description = $row['description'];
        $category = $row['category'];
    }


    if($_POST){
        $id = $_GET['id'];

        $title = mysqli_real_escape_string($lib, $_POST['title']);
        $publisher = mysqli_real_escape_string($lib, $_POST['publisher']);
        $description = mysqli_real_escape_string($lib, $_POST['description']);
        $category = mysqli_real_escape_string($lib, $_POST['category']);

        $sql = "
            UPDATE book
            SET 
              title = '$title',
              publisher = '$publisher',
              description = '$description',
              category = '$category'
            WHERE id = '$id';
        ";
        $result =  mysqli_query($lib, $sql) or die(mysqli_error($lib));
        header('Location: index.php');
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
            <a class="nav-link active" href="index.php">Home</a>
        </li>
    </ul>
    </nav>

    <div class="container">
        <form role="form" method="POST" action="update.php?id=<?php echo $id ?>">
            <div class="form-group">
            <label for="title">Title: </label>
            <input type="text" name="title" class="form-control" id="title" value="<?php echo $title ?>">

            <label for="publisher">Publisher: </label>
            <input type="text" name="publisher" class="form-control" id="publisher" value="<?php echo $publisher ?>">

            <label for="description">Description: </label>
            <textarea class="form-control" name="description" id="description" rows="3"><?php echo $description ?></textarea>
            <label for="category">Category: </label>
            <input type="text" name="category" class="form-control" id="" value="<?php echo $category ?>">
            </div>

            <button class="btn btn-primary" type="submit" name="submit">Update </button>
        </form>
    </div>
    </body>
</html>