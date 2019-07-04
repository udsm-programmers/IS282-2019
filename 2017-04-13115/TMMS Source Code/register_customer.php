<?php 
	include("connect.php");

	$username = $email = $password = "";
	$usernameErr = $emailErr = $passwordErr = "";

	if(isset($_POST['submit'])) {

		if(empty($_POST['firstname'])) {
			$firstnameErr = "firstname is empty";
		} else {
			$firstname = $_POST['firstname'];
		}

		if(empty($_POST['lastname'])) {
			$lastnameErr = "lastname is empty";
		} else {
			$lastname = $_POST['lastname'];
		}

		if(empty($_POST['username'])) {
			$usernameErr = "username is empty";
		} else {
			$username = $_POST['username'];
		}

		if(empty($_POST['email'])) {
			$emailErr = "email is empty";
		} else {
			$email = $_POST['email'];
		}

		if(empty($_POST['password'])) {
			$passwordErr = "password is empty";
		} else {
			$password = $_POST['password'];
		}


		if(empty($_POST['comf_password'])) {
			$comf_passwordErr = "comfirm password is empty";
		} else {
			$comf_password = $_POST['comf_password'];
		}


		if(empty($_POST['mobile'])) {
			$mobileErr = "mobile is empty";
		} else {
			$mobile = $_POST['mobile'];
		}

         $username=$_POST['username'];
		$query = "SELECT * FROM customer WHERE username='$username'   "; 
		$result = mysqli_query($conn,$query) or die("query failed " . mysqli_error($result)); 
		

		
		if(mysqli_num_rows($result)>0) {
			$usr = "username already exist, try something else!";
		} else {
			$query = "INSERT INTO customer (firstname, lastname,username,email, mobile, password, comf_password, email, mobile,state, city, district) VALUES ('$firstname', '$lastname','$username', '$password', '$comf_password', '$email', '$mobile','$state', '$city', '$district')";

			$result = mysqli_query($conn, $query);

			if(!$result) {
			die("failed to add record " . mysqli_error($result));
			} else {
			$smsg = "database updated";
			}
		}
	}
	mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>register page</title> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
	<!-- Model for header item 1 -->
	<div class="page">
		<div class="header"><b>
			<span class="span-left">
					<span id="kifupi">TMMS</span><br>
				    <span id="kirefu">Tailoring Match Management System</span>
			    </span>
			<div class="nav">				
				<ul>
					<li>
						<a href="index.html">Home</a>
					</li>
					<li>
						<a href="about.html">About Us</a>
					</li>
					<li>
						<a href="register.html">Register</a>
					</li>
					<li>
						<a href="login.html">Login</a>
					</li>
					<li>
						<a href="contact.html">Contact Us</a>
					</li></b>					
				</ul>
			</div>
		</div>
		<hr/>
		<!-- Model for Registration form item 1 -->
		<div class="container">
			<div class="section-content">
				<div class="section-title">
					<h2>Customer Registration Form.</h2>
				</div>
			</div>
			<div class="form-group-line">
				<form name="sentMessage" id="contactForm" novalidate="" method="post" action="<?php $PHP_SELF; ?>">

                      <?php if(isset($usr)) {?>
						<div class="alert alert-danger text-center" role="alert" id="smsg">
  							<?php echo $usr; ?>
						</div>
					<?php }?>

					<?php if(isset($smsg)) {?>
						<div class="alert alert-success text-center" role="alert" id="smsg">
  							<?php echo $smsg; ?>
						</div>
					<?php }
					?>

					<div class="column-1">
						<div class="form-group-1">
							<p id="login-here">Please Register Here.</p>
							<input type="text" name ="firstname" class="form-control-1" placeholder="Firstname *" id="name" required="" data-validation-required-message="Please enter your firstname.">
							<p class="help-block text-danger"></p>
						</div>
						<div class="form-group-1">
							<input type="text" name ="lastname" class="form-control-1" placeholder="Lastname *" id="name" required="" data-validation-required-message="Please enter your lastname.">
							<p class="help-block text-danger"></p>
						</div>
						<div class="form-group-1">
							<input type="username" name="username" class="form-control-1" placeholder="Your Username *" id="username" required="" data-validation-required-message="Please enter your username.">
							<p class="help-block text-danger"></p>
						</div>
						<div class="form-group-1">
							<input type="password" name="password" class="form-control-1" placeholder="Your Password *" id="password" required=""data-validation-required-message="Please enter your Password.">
							<p class="help-block text-danger"></p>
						</div>
						<div class="form-group-1">
							<input type="password" name="comf_password" class="form-control-1" placeholder="Comfirm password *" id="password" required=""data-validation-required-message="Please comfirm your Password.">
							<p class="help-block text-danger"></p>
						</div>
					</div>
					<div class="column-2">
						<div class="form-group-1">
							<p id="login-here">Please Register Here.</p>
							<input type="email" name ="email" class="form-control-1" placeholder="Your Email *" id="name" required="" data-validation-required-message="Please enter your email.">
							<p class="help-block text-danger"></p>
						</div>
						<div class="form-group-1">
							<input type="number" name ="mobile" class="form-control-1" placeholder="Your Mobile *" id="mobile" required="" data-validation-required-message="Please enter your mobile.">
							<p class="help-block text-danger"></p>
						</div>
						<div class="form-group-1">
							<label for="country">State</label><br>
							<select name="state" class="form-control-10">
    							<option value="Tanzania">Tanzania</option>
   								<option value="Kenya">Kenya</option>
   								<option value="Uganda">Uganda</option>
   							</select>
						</div><br>
						<div class="form-group-1">
							<label for="city">City/Region</label><br>
							<select name="name" id="mama" class="form-control-10">
    							<option value="dar es salaam">Dar es salaam</option>
   								<option value="Mwanza">Mwanza</option>
   								<option value="Mbeya">Mbeya</option>
   							</select>
						</div><br>
						<div class="form-group-1">
							<label for="district">District</label><br>
							<select name="district" class="form-control-10">
    							<option value="Kinondoni">Kinondoni</option>
   								<option value="Ilala">Ilala</option>
   								<option value="Temeke">Temeke</option>
   							</select>
						</div>
						<div class="column-3">
							<div id="success">
								<button type="edit" class="form-btn-1" name="edit">Edit</button>
								<button type="submit" class="form-btn-1" name="submit">Submit</button>
							</div>
						</div>
					</div>
		  		</form>
			</div>
		</div>		
	</div>
</body>
</html>