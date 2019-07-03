<!DOCTYPE html>

<html>
<head>
    <title>library system</title>
    <link rel="stylesheet" href="libray.css">
</head>
<body>
    <div id="head">
        <h1>welcome to online library management system</h1>  
    </div>  
        
    <h3> library 2019 </h3>
    <div class="container">

        <?php
             
             $done = $fail = '';
            include('connect.php');
            $id = $_REQUEST['update'];

            if(isset($_POST['submit'])){

                $title = $_POST['title'];
                $publisher = $_POST['publisher'];
                $author = $_POST['author'];
                $category = $_POST['category'];
                $description = $_POST['description'];
                $date = $_POST['date'];

                $update = "UPDATE book2 SET title = '$title' , publisher = '$publisher' , author = '$author' , category = '$category' , description = '$description' , date = '$date' WHERE id = '$id' ";

                $query = mysqli_query($link , $update);
                
                if($query == 1){

                    $done = 'data updated';
                }
                else{
                    $fail = 'data not updated';
                }
            }
        ?>
        <?php

        error_reporting(0);

        $query = "SELECT * FROM book2 WHERE id ='$id' ";
        $result =  mysqli_query($link , $query) or die(mysqli_error($link));
        
        while($row = mysqli_fetch_assoc($result)){
            
        ?>
            <form action="" method="POST">
            
            <ul style="list-style: none;">
                 <li>
                    <?php echo $done  ?>
                 </li>
                 <li>
                    <h2>add the book </h2>
                 </li>
            </ul>
            
            <label>title:</label><br>
            <input type="text" name="title"id="title" value="<?php echo $row['title'] ?>"><br>
            <label>publisher:</label><br>
            <input type="publisher" name="publisher"id="publisher" value="<?php echo $row['publisher'] ?>"><br>
            <label>author:</label><br>
            <input type="author" name="author"id="author"value="<?php echo $row['author'] ?>"><br>
            <label>category:</label><br>
            <input type="category" name="category"id="category" value="<?php echo $row['category'] ?>" ><br>
            <label>description:</label><br>
            <input type="description" name="description"id="description" value="<?php echo $row['description'] ?>"><br>
            <label>date:</label><br>
            <input type="text"name="date"id="date" value="<?php echo $row['date'] ?>"><br>
            <br>
            <button type="submit" name="submit" value="submit">update</button>

            </form>

        <?php        
                 }
        ?>
        
    </div>
    </body>
</html> 