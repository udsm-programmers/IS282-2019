<?php 
	session_start();
	// include connect script
	include("includes/connect.php");
	// declare variable and initialize to empty string
	$status = true;
	$title = $author = $isbn = "";

	// check if values are set
	if(isset($_POST['submit'])) {
		$title = $_POST['title'];
		$author = $_POST['author'];
		$isbn = $_POST['isbn'];
		
		$query = "INSERT INTO book(title, author, isbn, status) VALUES ('$title', '$author', '$isbn' , '$status')";

		$result = mysqli_query($conn, $query);

		if(!$result) {
			die("Failed to add record " . mysqli_error($conn));
		} else {
			echo "record added successfully";
			header("Location: dashboard.php");
		}
	}
?>
<?php 
	if(isset($_SESSION['login'])) {
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/style.css">

	<title>LIBSYS | Add Book</title>
</head>
<body>
	<div class="content-wrapper">
		<div class="container">
			<h1 class="header-line">Library management system</h1>
			<div class="right-div">
				<a href="dashboard.php">dashboard</a>
			</div>
			<div class="row pad-botm">
				<div class="col-md-12">
					<h4>Add new Book </h4>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
					<div class="panel panel-info">
						<div class="panel-heading">
							NEW BOOK INFORMATION
						</div>
						<div class="panel-body">
							<form action="<?php echo $PHP_SELF;?>" method="post" role="form">
									<div class="form-group">
										<label for="title">Title</label>
										<input type="text" class="form-control" name="title" placeholder="Enter Book Title" autocomplete="off" required>
									</div>

									<div class="form-group">
										<label for="author">Author</label>
										<input type="text" class="form-control" name="author" placeholder="Enter Book Author" autocomplete="off"  required>
									</div>

									<div class="form-group">
										<label for="isbn">ISBN</label>
										<input type="text" class="form-control" name="isbn" placeholder="978-1-888983-30-2" autocomplete="off" required>			    
									</div>
									<button type="submit" class="btn btn-info btn-lg" name="submit">Submit</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--  -->
	<?php 
		include("includes/footer.php");
	?>
</body>
</html>
<?php } else {?>
<?php
	header('location: index.php');
?>
<?php }?>