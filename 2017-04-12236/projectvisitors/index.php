<?php
include "connect.php";
//error_reporting(0);
if(isset($_POST['submit']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sqli = "SELECT * FROM users WHERE userid='$username' AND password='$password'";
		$query=mysqli_query($conn, $sqli);
		//$check=mysql_num_rows($query);

    $sql = mysqli_fetch_array($query);

	if ($sql>0){
    $uname=$sql['userid'];
    $pass=$sql['password'];
    $id=$sql['id'];
    $type =$sql['type'];


  if($username==$uname && $pass==$password){
    session_start();
    $_SESSION['userid'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['type'] = $type;

    if($type =='user'){
      header("location:user.php");
    } else{
      header("location:viewv.php");
      }
    }
  } else{
      echo "user invalid";
    }
  }

?>
<html lang="en">

<head>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">

  <title>Index</title>
  
</head>
<body style="background-color: #dce9ed;">
	
	<nav class="navbar navbar-form" >
  <div class="container-fluid">
    <div class="navbar-header">
     <p class="navbar-header navbar-left" style="width: 100%;"><h1>Visitors Registration System</h1></p>
    </div>
  </div>
</nav>
<div class="jumbotron" >
<form class="form-horizontal" name="login" method="post" action="index.php" >
	<div class="form-group">
	<label class="col-sm-2 control-label"></label>
    <p class="navbar-text navbar-auto">Welcome, Please login</p>
    <div class="col-sm-10">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Username</label>
    <div class="col-sm-10">
      <input type="text" name="username"class="form-control"  placeholder="Username" style="width: 250px" >
    </div>
  </div>
  <div class="form-group">
    <label  class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" name="password"class="form-control"  placeholder="Password"  style="width: 250px">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="submit" class="btn btn-primary">Sign in</button>
    </div>
  </div>

</form>

</div>

</body>
</html> 