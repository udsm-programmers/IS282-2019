<?php 
	session_start();
	// include connection script
	include("includes/connect.php");

	if(isset($_POST['update'])) {
		$id = $_POST['id'];

		if(isset($_POST['title'])) {
			$title = $_POST['title'];
		}

		if(isset($_POST['author'])) {
			$author = $_POST['author'];
		}

		if(isset($_POST['isbn'])) {
			$isbn = $_POST['isbn'];
		}

		$query = "UPDATE book SET title='$title', author='$author', isbn='$isbn' WHERE id='$id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		if($result) {
			header("Location: dashboard.php");
		}
	}
?>

<?php 
	// get id from the url
	$i = $_GET['id'];
	// retrive data from database
	$bkTitle = $bkAuthor = $bkIsbn = "";
	$result = mysqli_query($conn, "SELECT title, author, isbn FROM book WHERE id='$i'") or die(mysqli_error($conn));
	if($result) {
		$row = mysqli_fetch_assoc($result);

		$bkTitle = $row['title'];
		$bkAuthor = $row['author'];
		$bkIsbn = $row['isbn'];
	}
	mysqli_close($conn);
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
	<title>Edit Form</title>
</head>
<body>
	<div class="container">
		<h2 class="text-center">LIBRARY MANAGEMENT SYSTEM</h2>
		<div class="table-wrapper no-padding">
			<div class="table-title no-margin-bottom">
				<div class="row">
					<div class="col-sm-6">
						<h2>Edit Book Info</h2>
					</div>
					<div class="col-sm-6">
						<a href="./dashboard.php" class="btn btn-success">Dashboard</a>
					</div>
				</div>
			</div>
			<div class="login-form addBook-form">
				<form method="post" role="form" action="<?php echo $PHP_SELF; ?>">
					<div class="form-group">
						<label for="title">Title</label>
						<input type="text" class="form-control" name="title" value="<?php echo $bkTitle; ?>">
					</div>

					<div class="form-group">
						<label for="author">Author</label>
						<input type="text" class="form-control" name="author" value="<?php echo $bkAuthor; ?>">
					</div>

					<div class="form-group">
						<label for="isbn">ISBN</label>
						<input type="text" class="form-control" name="isbn" value="<?php echo $bkIsbn; ?>">	    
					</div>
						
					<div class="form-group">
						<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
						<button type="submit" name="update" class="btn btn-primary btn-block">UPDATE</button>
					</div>
				</form>
			</div>
		</div>
		<div class="no-padding">
			<?php include('includes/footer.php'); ?>
		</div>
	</div>
</body>
</html>
<?php } else {?>
<?php 
	header('location: index.php');	
?>
<?php }?>