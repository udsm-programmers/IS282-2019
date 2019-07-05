<?php include('server.php')?>
<?php 
if (isset($_POST['register_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $phone_number = mysqli_real_escape_string($db, $_POST['phone_number']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
      array_push($errors, "The two passwords do not match");
  }
  $query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $query);
  $user = mysqli_fetch_assoc($result);
  if ($user) { 

    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }
  if (count($errors) == 0) {
      $password = md5($password_1);
      $query = "INSERT INTO users (username, email,phone_number, password) 
                    VALUES('$username', '$email','$phone_number', '$password')";
      mysqli_query($db, $query);
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: loginfile.php');
  }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>signup</title>
	<link rel="stylesheet" type="text/css" href="signupfile.css">
</head>
<body>
  <ul>
          <li> <img src="mylogo.jpg" style="width:80px;height:55px;padding:2px 0 2px 0;border-radius:15px 15px 15px 15px;"/>  </li> 	
          <li><a href="CUITTLES PRODUCTION.html"><i class="fa fa-fw fa-home"></i> home</a></li>
          <li><a href="productsviews.html"><i class="fa fa-bars"></i> products</a></li>
          <li><a href="contact.html"><i class="fa fa-fw fa-envelope"></i> contant us</a></li>
          <li><a href="loginfile.html"><i class="fa fa-fw fa-user"></i> login</a></li>
          <li class="head"  style="background-color: #687864;margin: 2px"><a href="signupfile.html">sign up</a></li>
          </ul>
    <div class="header">SIGN-UP</div>
  <form action="register.php" method="post" align='center'>
  <?php include('errors.php');?>
    <div class="my-border">
      <label for="fname"><b>fullname</b></label>
      <input type="text" name="fullname"  placeholder="Enter your name" required>
      </div>
      <div class="my-border">
        <label for="uname"><b>username</b></label>
        <input type="text" placeholder="Enter Username" name="username" required>
        </div>
        <div class="my-border">
  <label for="Email"><b>email address</b></label>
        <input type="text"  placeholder="name@domain.com" name="email" required>
        </div>
        <div class="my-border">
        <label for="pnumber"><b>phone_number</b></label>
        <input type="tel"  placeholder="0XXXXXXXXX" name="phone_number" required>
        </div>
        <div class="my-border">
        <label for="psw"><b>password</b></label>
        <input type="password"  placeholder="Enter Password" name="password_1" required>
        <div class="my-border">
        <label for="psw"><b>confirm password</b></label>
        <input type="password" placeholder="confirm password" name="password_2" required>
        </div>
        <div>
        <button type="submit" name="register_user">create an account</button>
    </div>
        <p style="display: inline-block;">Already a member? <a  href="loginfile.html">login</a></p>
  </form>
  <footer>&copy;2019. all right reserved</footer>
</body>
</html>
