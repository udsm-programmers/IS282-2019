

<?php
  
include("connect.php");


   $sql = 'SELECT id,title, publisher,description,category FROM book';
   $result = $conn->query($sql);

   $conn->close();
?>
<!DOCTYPE html>   
  <head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<title>list_of_books</title>
</head>
 
<nav class="navbar bg-success text-warning"> 
     <marquee> <h1>VETERAN'S LIBRARY</h1></marquee>
</nav>

<body>
   
<div class="container">
		<div class="row h-75 justify-content-center align-items-center" style="padding-top:30px">
				<form method="post" action="<?php $PHP_SELF; ?>">
					
         <div class="row">
                 <div class="card">
                     <div class="card-header " >
                     <h3>List Of All Books</h3>
                     </div>
                     <?php 
                        $count = mysqli_num_rows($result);
                        if($count > 0) {
                     ?>
                     <table class="table table-striped">
                         <thead class="thead-dark">
                             <tr>
                                 <th>ID</th>
                                 <th>Title</th>
                                 <th>Publisher</th>
                                 <th>Category</th>
                                 <th>Description</th>
                                 <th></th>
                             </tr>
                         </thead>
                         <tbody>

                             <?php 
                                
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>{$row["id"]}</td>";
                                        echo "<td>{$row["title"]}</td>";
                                        echo "<td>{$row["publisher"]}</td>";
                                        echo "<td>{$row["category"]}</td>";
                                        echo "<td>{$row["description"]}</td>";
                                        echo "<td><a href=\"update.php?id={$row['id']}\" class=\"btn btn-outline-primary\">Update</a> | <a href=\"delete.php?id={$row['id']}\" class=\"btn btn-outline-danger\" onclick=\"return confirm('Are you sure you want to delete?');\">Delete</a></td>";
                                        echo "</tr>";
                                        }   
                                } else {
                                    echo "<p class=\"lead\">No books yet</p>";
                                }
                             ?>
                             
                         </tbody>
                     </table>
                 </div>
             </div>
          </div>	
	</form>
	</div>
</div>

    

<div class="row h-75 justify-content-center align-items-center" style="padding-top: 20px">

<a href="http://localhost:/djlungo/home.php" class="btn btn-outline-primary " style="margin-left: 20px; margin-right: 20px">
ADD NEW BOOK
</a>


</div>

</body>
</html>