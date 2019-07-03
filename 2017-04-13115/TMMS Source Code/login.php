

<!DOCTYPE html>
<html lang="en">
<head>
	<title>login page</title> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body class="login-body">
	<!-- Model for header item 1  -->
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
					</li>				
				</b>					
				</ul>
			</div>
		</div>
		<hr/>
		<!-- Model for body iitem 1 -->
		<div class="column-01"><br>
			<p id="login-here">Please Login Here.</p>
			<form name="sentMessage" id="contactForm" novalidate="" method="post" action="<?php $PHP_SELF; ?>">
					<div class="form-group-1">
						<input type="text" name ="username" class="form-control-1" placeholder="Your Username *" id="name" required="" data-validation-required-message="Please enter your username.">
						<p class="help-block text-danger"></p>
					</div>
					<div class="form-group-1">
						<input type="email" name="email" class="form-control-1" placeholder="Your Email *" id="email" required="" data-validation-required-message="Please enter your email address.">
						<p class="help-block text-danger"></p>
					</div>
					<div class="form-group-1">
						<input type="password" name="password" class="form-control-1" placeholder="Your Password *" id="password" required=""data-validation-required-message="Please enter your Password.">
					<p class="help-block text-danger"></p>
					<p>
						<input type="checkbox" name="remember" id="remember">
						<label for="remember">Remember me</label>
					</p>
					<P class = "p-container">
						<span>Forgot Password?</span>
						<input type="submit" class="btn-login " name="go" id="go" value="log in">
					</P>
				</div>
				<div id="success"></div>
					<button type="edit" class="form-btn-1">Edit</button>
					<button type="submit" class="form-btn-1" name="submit">Submit</button>
				</div>
		    </form>
		</div>
	</div>
</body>
</html>