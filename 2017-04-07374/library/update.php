   <!DOCTYPE html>   
  <head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<title>update_a_book</title>
</head>

<body> 

   <?php

         include("connect.php");

         if(isset($_POST['update'])) {
          $ID = $_GET['id'];
          $Title = $_POST['title'];
          $Publisher = $_POST['publisher'];
          $Description = $_POST['description'];
          $Category = $_POST['category'];
            
          $sql = "UPDATE book ". "SET title = '$Title',publisher='$Publisher',category='$Category',description='$Description' ". 
               "WHERE id = '$ID'" ;
          $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
          if($result) {
               header('location: books_list.php');
          }               
            mysqli_close($conn); }else {
            ?>

          <?php 
               $id = $_GET['id'];

               $sql1 = "SELECT title, publisher, category, description FROM book WHERE id='$id'";
               $result1 = $conn->query($sql1);

               if($result1) {
                    $row = mysqli_fetch_array($result1);
                    $title = $row['title'];
                    $publisher = $row['publisher'];
                    $category = $row['category'];
                    $description = $row['description'];
               }
          ?>

<nav class="navbar bg-success text-warning"> 
     <marquee> <h1>VETERAN'S LIBRARY</h1></marquee>
</nav>

<div class="container">
		<div class="row h-75 justify-content-center align-items-center">
				<form method="post" action="<?php $PHP_SELF; ?>">
					<h1>Update a Book</h1>
	
                 <div class="form-group">
				    	<label for="Title">Title</label>
				    	<input type="text" class="form-control" id="title" placeholder="Enter book title" name="title" required value="<?php echo $title; ?>">
				  	</div>
                 <div class="form-group">
				    	<label for="Publisher">Publisher</label>
				    	<input type="text" class="form-control" id="publisher" placeholder="Enter book publisher" name="publisher" required value="<?php echo $publisher; ?>">
				  	</div>
                 <div class="form-group">
				    	<label for="Category">Category</label>
				    	<input type="text" class="form-control" id="category" placeholder="Enter book category" name="category" required value="<?php echo $category; ?>">
				  	</div>
                     
					<div class="form-group">
						<label for="Description">Description</label>
						<textarea type="text" class="form-control" id="description" placeholder="Enter book description" name="description"><?php echo $description; ?></textarea>
					  </div>
                         <div class="row h-75 justify-content-center align-items-center" style="padding-bottom: 20px">
					  <button id="update" name = "update" type = "submit" >Update</button>
				    </div>

				</form>
		</div>
	</div>

	<div class="row h-75 justify-content-center align-items-center">

                <a href="http://localhost:/djlungo/home.php" class="btn btn-outline-primary ">
                     ADD NEW BOOK
                </a>
                <a href="http://localhost:/djlungo/books_list.php" class="btn btn-outline-primary " style="margin-left: 20px; margin-right: 20px">
                     VIEW LIST OF BOOKS
                </a>
                <a href="http://localhost:/djlungo/delete.php" class="btn btn-outline-primary " >
                     DELETE BOOK
                </a>
                
</div>


   <?php
         }
      ?>

</body>
</html>

