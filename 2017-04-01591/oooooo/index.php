<?php
    include("connect.php");
    $sql = "SELECT * FROM book ORDER BY title;";
    $result = mysqli_query($connection, $sql);
?>
<!DOCTYPE html>
    <head>
        <title>library</title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="css/indexstyles.css" rel="stylesheet"/>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-end">
    <ul class="nav justify-content-end">
        <li class="nav-item">
            <a class="nav-link active" href="index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="addbook.php">Add Book</a>
        </li>
    </ul>
    </nav>
    <div class="container">
        <?php
            if($result->num_rows > 0){
                echo "<h2>List of Books</h2>";
                while($row = $result->fetch_assoc()){
                    $output = '<div class="card" style="width: 100%; margin: 20px;">';
                    $output = $output.'<div class="card-header">';
                    $output = $output.'<span>Title: </span>'.$row['title'].'</div>';
                    $output = $output.' <ul class="list-group list-group-flush">';
                    $output = $output.'<li class="list-group-item"><span>Publisher: </span>'.$row['publisher'].'</li>';
                    $output = $output.'<li class="list-group-item"><span>Category: </span>'.$row['category'].'</li>';
                    $output = $output.'<li class="list-group-item"><span>Description: </span>'.$row['description'].'</li>';
                    $output = $output.'<li class="list-group-item"><a href="deletebook.php?id='.$row['id'].'" class="btn btn-danger">Delete</a>';
                    $output = $output.'<a href="editbook.php?id='.$row['id'].'" class="btn btn-primary">Edit</a></li></ul></div>';

                    echo $output;
                }
            }else{
                echo '<div class="alert alert-danger" role="alert">No books found</div>';
            }
        ?>
    </div>
    </body>
</html>