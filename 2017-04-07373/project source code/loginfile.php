  <?php include('server.php');
  // LOGIN USER
  if (isset($_POST['login_file'])) { 
    if (isset($_POST['username'])) { 
  $username = mysqli_real_escape_string($db,$_POST['username']); 
    }
    if (isset($_POST['password'])) { 
  $password= mysqli_real_escape_string($db,$_POST['password']);
    }
  if(empty($username)){
    array_push($errors,"username is required");
  }
  if(empty($password)){
    array_push($errors,"password is required");
  }
  if(count($errors)==0){
    $password=md5($password);
$query = "SELECT id FROM users WHERE username='$username' AND password='$password'";
  $result = mysqli_query($db, $query);
    if(mysqli_num_rows($result)==1){
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: dashboardorder.php');
      }else {
        array_push($errors,"Wrong username/password combination");
      }
    }
    }
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <title>login</title>
    <link rel="stylesheet" type="text/css" href="loginfile.css">
  </head>
  <body background-color:#b5dcb3;>
<ul>
				<li> <img src="mylogo.jpg" style="width:80px;height:55px;padding:2px 0 2px 0;border-radius:15px 15px 15px 15px;"/>  </li> 	
				<li><a href="CUITTLES PRODUCTION.html"><i class="fa fa-fw fa-home"></i> home</a></li>
				<li><a href="productsviews.html"><i class="fa fa-bars"></i> products</a></li>
				<li><a href="contact.html"><i class="fa fa-fw fa-envelope"></i> contant us</a></li>
				<li style="background-color: #687864;margin: 2px"><a href="loginfile.html"><i class="fa fa-fw fa-user"></i> login</a></li>
				<li class="head"><a href="signupfile.html">sign up</a></li>
				</ul>
  <div class="container">
    <div class="imgcontainer">
      <img src="avatar6.png" class="avatar">
    </div>
      <form action="loginfile.php" method="post">
      <?php include('errors.php');?>
        <label for="uname"><b>Username</b></label><br>
        <input type="text" placeholder="Enter Username" name="username" 
        value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>" required>
        <label for="psw"><b>Password</b></label><br>
        <input type="password" placeholder="Enter Password" name="password" required>
          
        <button type="submit" name="login_file">Login</button>
        <label>
          <input type="checkbox" checked="checked" name="remember" 
          <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?>> Remember me
        </label>
      </form>
      <p style="display: inline-block;">not yet a member? <a href="signupfile.htm">signup</a></p>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </div>
   <footer>&copy;2019. all right reserved</footer>
  </body>
  </html>
