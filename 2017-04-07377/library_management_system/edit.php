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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<title>Edit Form</title>
</head>
<body>
	<div class="content-wrapper">
		<div class="container">
			<h1 class="header-line">Library Management System</h1>
			<div class="row pad-botm">
				<div class="col-md-12">
					<a href="./index.php" class="btn btn-info btn-sm">&larr; Go back</a>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
					<div class="panel panel-info">
						<div class="panel-heading">
							UPDATE FORM
						</div>
						<div class="panel-body">
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
								<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
								<button type="submit" name="update" class="btn btn-info btn-lg">UPDATE</button>
							</form>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
	<?php include('includes/footer.php'); ?>
</body>
</html>
<?php } else {?>
<?php 
	header('location: index.php');	
?>
<?php }?>