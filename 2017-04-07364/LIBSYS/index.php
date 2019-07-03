<?php 
	session_start();
	include('includes/connect.php');

	if(isset($_SESSION['login'])) {
		$_SESSION['login'] = '';
	}

	if(isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$query = "SELECT username, password FROM admin WHERE username='$username' AND password='$password'";

		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		if($result) {
			$count = mysqli_num_rows($result);
			$row = mysqli_fetch_array($result);

			if($count > 0) {
				$_SESSION['login'] = $row['username'];
				header('location: dashboard.php');
			} else {
				echo "<script>alert('invalid login credentials');</script>";
			}
		}

	}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="description" content="">
	<meta name="author" content="Gordon Nchy">
	<!-- BOOTSTRAP STYLE -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<!-- CUSTOM STYLE -->
	<link rel="stylesheet" href="assets/css/style.css">

	<title>Library Management System | Admin Login</title>
</head>
<body>
	<div class="content-wrapper">
		<div class="container">
			<h1 class="header-line text-uppercase">LIBRARY MANAGEMENT SYSTEM</h1>

			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
					<div class="panel panel-secondary">
						<div class="panel-heading">
							ADMIN LOGIN
						</div>

						<div class="panel-body">
							<form action="<?php echo $PHP_SELF; ?>" method="post" role="form">
								<div class="form-group">
									<label for="username">username</label>
									<input type="text" name="username" class="form-control" autocomplete="off" required>
								</div>

								<div class="form-group">
									<label for="password">password</label>
									<input type="password" name="password" class="form-control" autocomplete="off" required>
								</div>

								<button type="submit" name="login" class="btn btn-secondary">LOGIN</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>