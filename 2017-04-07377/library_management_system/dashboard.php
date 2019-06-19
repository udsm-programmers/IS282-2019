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
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="./assets/dashboard.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>Homepage</title>
	<script>
		$(document).ready(function() {
			var checkbox = $('table tbody input[type="checkbox"]');
				$('#selectAll').click(function() {
				if(this.checked) {
					checkbox.each(function() {
					this.checked = true;
				});
				}else {
					checkbox.each(function() {
						this.checked = false;
				});
				}
			});
				checkbox.click(function() {
				if(!this.checked) {
				$('#selectAll').prop("checked", false);
				}
			});
		});
	</script>
</head>
<body>
	<div class="container">
		<h2 class="text-center">LIBRARY MANAGEMENT SYSTEM</h2>
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage <b>Books</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="./logout.php" class="btn btn-danger"><span>Log out</a>
						<a href="./addBook.php" class="btn btn-success"><i class="material-icons">&#xE147;</i><span>Add New Book</span></a>
						<a href="#deleteBooks" class="btn btn-danger"><i class="material-icons">&#xE15C;</i><span>Delete</span></a>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
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
								$avlb = "available";
							} else {
								$avlb = "issued";
							}
								echo "<tr>";
								echo "<td>
									  <span class=\"custom-checkbox\">
									  <input type=\"checkbox\" name=\"options[]\" value=\"1\">
									  <label for=\"\"></label>
									  </span>
									  </td>";
								echo "<td>".$res['title']."</td>";
								echo "<td>".$res['author']."</td>";
								echo "<td>".$res['isbn']."</td>";
								echo "<td>".$avlb."</td>";
								echo "<td>".$res['date']."</td>";
								echo "<td><a href=\"edit.php?id=$res[id]\" class=\"edit\" data-toggle=\"modal\"><i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Edit\">&#xE254;</i></a>
								<a href=\"delete_record.php?id=$res[id]\" class=\"delete\" onClick=\"return confirm('Are you sure you want to delete?')\" data-toggle=\"modal\"><i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Delete\">&#xE872;</i></a></td>";
								echo "</tr>";
								}
					?>
				</tbody>
			</table>
			<div class="clearfix">
				<div class="hint-text">Showing <b>1</b> out of <b>25</b> entries</div>
				<ul class="pagination">
					<li class="page-item disabled"><a href="#">Previous</a></li>
					<li class="page-item"><a href="#" class="page-link">1</a></li>
					<li class="page-item"><a href="#" class="page-link">2</a></li>
					<li class="page-item"><a href="#" class="page-link">3</a></li>
					<li class="page-item"><a href="#" class="page-link">4</a></li>
					<li class="page-item"><a href="#" class="page-link">5</a></li>
					<li class="page-item"><a href="#" class="page-link">Next</a></li>
				</ul>
			</div>
		</div>
		<?php 
		include("includes/footer.php");
	?>
	</div>
</body>
</html>
<?php } else {?>
<?php 
    header('location: index.php');
?>
<?php }?>