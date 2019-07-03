<!DOCTYPE html>   
  <head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<title>home</title>
</head>
   

   <body>
      <?php

       include ("connect.php");

         if(isset($_POST['add'])) {
           
  
            if(! get_magic_quotes_gpc() ) {
               $Title = addslashes ($_POST['title']);
               $Publisher = addslashes ($_POST['publisher']);
               $Category = addslashes ($_POST['category']);
               $Description = addslashes ($_POST['description']);

            }else {
               $Title = $_POST['title'];
               $Publisher = $_POST['publisher'];
               $Category = $_POST['category'];
               $Description = $_POST['description'];

            }
                        
            $sql = "INSERT INTO book ". "(title,publisher,description,category) ". "VALUES('$Title','$Publisher','$Description','$Category')";
               
            
if ($conn->multi_query($sql) === TRUE) {
   //  echo "New records created successfully";
    header('location: books_list.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
         }else {
            ?>
            <nav class="navbar bg-success text-warning"> 
     <marquee> <h1>VETERAN'S LIBRARY</h1></marquee>
</nav>

            <div class="container">
		<div class="row h-75 justify-content-center align-items-center">
				<form method="post" action="<?php $PHP_SELF; ?>">
					<h1>Add New Book</h1>
					

                 <div class="form-group">
				    	<label for="Title">Title</label>
				    	<input type="text" class="form-control" id="title" placeholder="Enter book title" name="title" required>
				  	</div>
                 <div class="form-group">
				    	<label for="Publisher">Publisher</label>
				    	<input type="text" class="form-control" id="publisher" placeholder="Enter book publisher" name="publisher" required>
				  	</div>
                 <div class="form-group">
				    	<label for="Category">Category</label>
				    	<input type="text" class="form-control" id="category" placeholder="Enter book category" name="category" required>
				  	</div>
                     
					<div class="form-group">
						<label for="Description">Description</label>
						<textarea type="text" class="form-control" id="description" placeholder="Enter book description" name="description"></textarea>
					  </div>

                 <div class="row h-75 justify-content-center align-items-center " style="padding-bottom: 20px">          
					  <button id="add" name = "add" type = "submit" >Submit</button>
				    </div>
				</form>
		</div>
	</div>


   <div class="row h-75 justify-content-center align-items-center">

                <a href="http://localhost:/djlungo/books_list.php" class="btn btn-outline-primary " style="margin-left: 20px; margin-right: 20px">
                     VIEW LIST OF BOOKS
                </a>

                
</div>

            
            <?php
         }
      ?>
                     </div> 
                      </div>
   
   </body>
</html>