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
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<!-- BOOTSTRAP LINKS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="./assets/style.css">
	<link rel="stylesheet" href="./assets/dashboard.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
		
	<title>Library Management System | Admin Login</title>
</head>
<body>
		<div class="container">
			<h2 class="text-center">LIBRARY MANAGEMENT SYSTEM</h2>
				<div class="table-wrapper no-padding admin-login">
					<div class="table-title no-margin-bottom">
						<div class="row">
							<div class="col-sm-12">
								<h2><b>Admin</b> Login</h2>
							</div>
						</div>
					</div>
					<div class="login-form addBook-form">
						<form action="<?php echo $PHP_SELF; ?>" method="post" role="form">
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="text" name="username" class="form-control autocomplete="off" placeholder="Username" required="required">
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock"></i></span>
									<input type="password" name="password" class="form-control autocomplete="off" placeholder="Password" required="required">
								</div>
							</div>
							<div class="form-group">
								<button type="submit" name="login" class="btn btn-primary btn-block">Log in</button>
							</div>
							<div class="clearfix">
								<label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
								<a href="#" class="pull-right">Forgot Password?</a>
							</div>
						</form>
				 	</div>
				</div>	
				<div class="no-padding text-center">
					<?php include('includes/footer.php'); ?>
				</div> 
		</div>
</body>
</html>