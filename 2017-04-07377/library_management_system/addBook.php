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
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<!-- BOOTSTRAP STYLES -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="./assets/style.css">
	<link rel="stylesheet" href="./assets/dashboard.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

	<title>LIBSYS | Add Book</title>
</head>
<body>
	<div class="container">
		<h2 class="text-center">LIBRARY MANAGEMENT SYSTEM</h2>
		<div class="table-wrapper no-padding">
			<div class="table-title no-margin-bottom">
				<div class="row">
					<div class="col-sm-6">
						<h2>New Book Info</h2>
					</div>
					<div class="col-sm-6">
						<a href="./dashboard.php" class="btn btn-success"><span>Dashboard</span></a>
					</div>
				</div>
			</div>
			<div class="login-form addBook-form">
				<form action="<?php echo $PHP_SELF;?>" method="post" role="form">
					<!-- <h2 class="text-center">Add Book</h2> -->
					<div class="form-group">					
							<label for="title">TITLE</label>
							<!-- <span class="input-group-addon"><i class="fas fa-heading"></i></span> -->
							<input type="text" class="form-control" name="title" placeholder="Enter Book Title" autocomplete="off" required>
					</div>

					<div class="form-group">
							<label for="author">AUTHOR</label>
							<!-- <span class="input-group-addon"><i class="fa fa-at"></i></span> -->
							<input type="text" class="form-control" name="author" placeholder="Enter Book Author" autocomplete="off"  required>
					</div>

					<div class="form-group">
						<label for="isbn">ISBN</label>
						<input type="text" class="form-control" name="isbn" placeholder="978-1-888983-30-2" autocomplete="off" required>			    
					</div>
					
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
					</div>
				</form>
			</div>
		</div>	
		<div class="no-padding">
			<?php include("includes/footer.php");?>
		</div>
	</div>
</body>
</html>
<?php } else {?>
<?php
	header('location: index.php');
?>
<?php }?>