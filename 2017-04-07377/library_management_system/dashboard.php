<?php 
    session_start();
	// include connect script
	include("includes/connect.php");

	// query the database
	$query = "SELECT * FROM book ORDER BY id";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

?>

<?php 
    if(isset($_SESSION['login'])) {
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- BOOTSTRAP CORE STYLE -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- <link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
	<!-- CUSTOM STYLE -->
	<link rel="stylesheet" href="assets/css/style.css">
	<title>Homepage</title>
</head>
<body>
	<div class="content-wrapper">
		<div class="container">
			<h1 class="header-line">LIBRARY MANAGEMENT SYSTEM</h1>
            <div class="right-div">
                <a href="addBook.php">Add more books</a>
                <a href="logout.php" class="btn btn-danger btn-sm">Log out</a>
            </div>

			<div class="row pad-botm">
				<div class="col-md-12">
						ADMIN PANEL / <small>Dashboard</small>
						<small><p class="lead">List of all books provided by LIBSYS</p></small>	
				</div>
			</div>

			<div class="row">
				<div class="col-md-12 col-sm-12">
					<table class="table">
						<thead class="thead-dark">
							<tr class="text-uppercase">
								<th>Title</th>
								<th>author</th>
								<th>ISBN</th>
								<th>status</th>
								<th>Date added</th>
								<th>update</th>
							</tr>
						</thead>
						<tbody>
							<?php 							
								while($res = mysqli_fetch_array($result)) {
									if($res['status'] == 1) {
										$avlb = "<span class=\"badge badge-primary\">available</span>";
									} else {
										$avlb = "<span class=\"badge badge-danger\">issued</span>";
									}
									echo "<tr>";
									echo "<td>".$res['title']."</td>";
									echo "<td>".$res['author']."</td>";
									echo "<td>".$res['isbn']."</td>";
									echo "<td>".$avlb."</td>";
									echo "<td>".$res['date']."</td>";
									echo "<td><a href=\"edit.php?id=$res[id]\" class=\"btn btn-sm btn-primary\">Edit</a> | <a href=\"delete_record.php?id=$res[id]\" class=\"btn btn-sm btn-danger\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<?php 
		include("includes/footer.php");
	?>

	<!-- BOOTSTRAP SCRIPT -->
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/jquery-1.10.2.js"></script>
</body>
</html>
<?php } else {?>
<?php 
    header('location: index.php');
?>
<?php }?>