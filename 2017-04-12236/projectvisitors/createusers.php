<?php
include "connect.php";
include "session.php";
if(isset($_POST['submit']))
{
	$fl=$_POST['fullname'];
	$userid=$_POST['userid'];
	$password=($_POST['password']);
	$em=$_POST['email'];
	$ph=$_POST['phoneno'];
	$ty=$_POST['type'];
	$sql="INSERT INTO users(userid,password,fullname,phonenumber,email,type) VALUES('$userid','$password','$fl','$ph','$em','$ty')";
	$rn=mysqli_query($conn, $sql);
	if($rn)
	{
		header("location:viewusers.php");
		die();
	}

}
?>
 <!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">

  <title>create users</title>
  <style>
	
</style>
  
</head>
<body>
<form name="createusers" method="POST" action="createusers.php">
<nav class="navbar navbar-default">
  <div class="container-fluid" >
    <div class="navbar-header" style="width: 100%">
<p class="navbar-text navbar-auto"><h1>Administrator panel</h1></p>
    </div>
    <table class="table table-hover">
    	<tr>
		<td width="20%">
			<div class="list-group" style="width: 80%">
  				
			</div>
		</td>
		<td>
			<table class="table table-hover">
				<tr>
					<center><p class="navbar-text navbar-auto" ><h4>Create User Account</h4></p></center>
				</tr>
  
			</table>
		</td>
	</tr>
	<tr>
		<td width="20%" height="500px">
      <div class="list-group" style="width: 80%">
          <center><a href="#" class="list-group-item disabled" ">
          <b> Menus 
          </a>
          <a href="viewusers.php" class="list-group-item">View users</a>
          <a href="createusers.php" class="list-group-item disabled">Create users</a>
          <a href="register.php" class="list-group-item">Register Visitors </a>
              <a href="viewv.php" class="list-group-item">View Visitors</a>

          <center><a href="logout.php" class="list-group-item " " style="background-color:#d6b09a;">
          <b> Logout 
          </a>
          </b></center>
      </div>
    </td>
		<td align="center">
				<table class="table table-hover" style="width: 50%" >
				<tr>
					<div class="form-group">
    					<td><label class="col-sm-2 control-label">Full Name</label></td>
    						<div class="col-sm-10">
      							<td ><input type="text" name="fullname"class="form-control" type="text" placeholder="Full Name Here" ></td>
   				 			</div>
  					</div>
  				</tr>
  				<tr >
 	 				<div class="form-group">
    					<td><label  class="col-sm-2 control-label">Username</label></td>
    						<div class="col-sm-10">
      							<td ><input type="text" name="userid"class="form-control"  placeholder="Username"  ></td>
    						</div>
  					</div>
				</tr>
				<tr >
 	 				<div class="form-group">
    					<td><label  class="col-sm-2 control-label">Password</label></td>
    						<div class="col-sm-10">
      							<td ><input type="text" name="password"class="form-control"  placeholder="Create Password"  ></td>
    						</div>
  					</div>
				</tr>
				<tr>
					<div class="form-group">
    					<td><label class="col-sm-2 control-label">Email</label></td>
    						<div class="col-sm-10">
      							<td ><input type="email" name="email"class="form-control" placeholder="Email" ></td>
   				 			</div>
  					</div>
  				</tr>
  				<tr >
 	 				<div class="form-group">
    					<td><label  class="col-sm-2 control-label">Phone No:</label></td>
    						<div class="col-sm-10">
      							<td ><input type="number" name="phoneno"class="form-control"  placeholder="Phone Number"  ></td>
    						</div>
  					</div>
				</tr>
        <tr >
          <div class="form-group">
              <td><label  class="col-sm-2 control-label">Permission type</label></td>  
              <td><select name="type" class="form-control">
                                <option selected="selected">user</option>
                                <option>admin</option>
                                  </select></td>
                </div>
            </div>
        </tr>
				<tr >
 	 				<div class="form-group">
    					<td></td>
    						<div class="col-sm-10">
      							<td ><input type="submit" name="submit" class="btn btn-default" value="Create"></td>
    						</div>
  					</div>
				</tr>
  
			</table>
		</td>
	</tr>
  </div>
</nav>
</table>
</form>
</body>
</html>