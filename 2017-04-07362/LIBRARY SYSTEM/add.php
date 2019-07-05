<?php
include("LibDB.php");



if(isset($_POST['submit'])){ 
        
    $title=mysqli_real_escape_string($lib ,$_POST['title']);
    $publisher=mysqli_real_escape_string($lib, $_POST['publisher']);
    $description=mysqli_real_escape_string($lib, $_POST['description']);
    $category=mysqli_real_escape_string($lib, $_POST['category']);

    $query="INSERT INTO book(title,publisher,description,category) 
    VALUES ('$title','$publisher','$description','$category')";

$result=mysqli_query($lib, $query) or die(mysqli_error($lib));
    header('location:index.php');
    exit;

}

?>

<form role="form" action="add.php" method="POST">

<div class="navbar">
<h1>BOOK CREDENTIALS</h1>
</div>

<div class="form-group" style="font-size:25px">
      <label for="">book title</label><br>
      <input type="text" name="title" placehorder="enter title" class="form-control"  style="height:40; width:350">

</div>
<div class="form-group" style="font-size:25px">
<label for="">publisher</label><br>
<input type="text" name="publisher" id="publisher" placehorder="publisher" class="form-control" style="height:40; width:350">

</div>

<div class="form-group" style="font-size:25px" >
<label for="">description</label><br>
<textarea name="description" cols="46" rows="3"></textarea>

</div>

<div class="form-group"  style="font-size:25px">
<label for="">category</label><br>

<input type="text" name="category" class="form-group" placehorder="book category"  style="height:40; width:350">

</div>
<button class="btn btn-primary" type="submit" name="submit"   >add book</button>


</form>