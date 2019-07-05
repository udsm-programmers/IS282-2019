<?php
include "connect.php";
include "session.php";
$id=$_GET['n'];
$sel="SELECT * FROM users WHERE id='$id'";
        $rn = mysqli_query($sel);
        $rw = mysqli_fetch_array($rn);
          $fullname=$rw['fullname'];
          $user=$rw['userid'];
          $email=$rw['email'];
          $phoneno=$rw['phonenumber'];
          $ty=$rw['type'];
//updating information to the database
if(isset($_POST['edit']))
{
$userid=$_POST['userid'];
$password=md5($_POST['password']);
$fl=$_POST['fullname'];
$ph=$_POST['phoneno'];
$email=$_POST['email'];
$type=$_POST['type'];
$id=$_POST['id'];
$sql="UPDATE users SET userid='$userid',password='$password',fullname='$fl', phonenumber='$ph', email='$email',type='$type' WHERE id='$id'";
$query=mysqli_query($sql);
if($query)
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

  <title>Edit user</title>
  <style>
	
</style>
  
</head>
<body>
<form name="editform" method="POST" action="edituser.php">
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
					<center><p class="navbar-text navbar-auto" ><h4>Edit User Information</h4></p></center>
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
  				<a href="createusers.php" class="list-group-item ">Create users</a>
 				<a href="#" class="list-group-item disabled">Edit User Info</a>
  				<a href="addbook.php" class="list-group-item">Add Book </a>
          <a href="viewbooks.php" class="list-group-item">View Books</a>
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
      							<td ><input type="text" name="fullname"class="form-control" type="text" value="<?php echo("$fullname")?>" >
                          <input type="hidden" name="id" value="<?php echo $id; ?>">
                    </td>
   				 			</div>
  					</div>
  				</tr>
  				<tr >
 	 				<div class="form-group">
    					<td><label  class="col-sm-2 control-label">Username</label></td>
    						<div class="col-sm-10">
      							<td ><input type="text" name="userid"class="form-control"  value="<?php echo("$user")?>" ></td>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
    						</div>
  					</div>
				</tr>
				<tr>
          <tr >
          <div class="form-group">
              <td><label  class="col-sm-2 control-label">Password</label></td>
                <div class="col-sm-10">
                    <td ><input type="password" name="password"class="form-control"  value="" placeholder="Change User Password" ></td>
                </div>
            </div>
        </tr>
        <tr>
					<div class="form-group">
    					<td><label class="col-sm-2 control-label">Email</label></td>
    						<div class="col-sm-10">
      							<td ><input type="email" name="email"class="form-control" type="text" value="<?php echo("$email")?>" ></td>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
   				 			</div>
  					</div>
  				</tr>
  				<tr >
 	 				<div class="form-group">
    					<td><label  class="col-sm-2 control-label">Phone No:</label></td>
    						<div class="col-sm-10">
      							<td ><input type="number" name="phoneno"class="form-control"  value="<?php echo("$phoneno")?>"  ></td>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
    						</div>
  					</div>
				</tr>
         <tr >
          <div class="form-group">
              <td><label  class="col-sm-2 control-label">Permission type</label></td>  
              <td><select name="type" class="form-control" required="required">
                                <option value=""disabled selected >-- select type --</option>
                                <option >user</option>
                                <option>admin</option>
                                  </select></td>
                </div>
            </div>
        </tr>
				<tr >
 	 				<div class="form-group">
    					<td></td>
    						<div class="col-sm-10">
      							<td ><input type="submit" name="edit" class="btn btn-default" value="Edit"></td>
    						</div>
  					</div>
        </tr>
            <div class="form-group">
       
  
			</table>
		</td>
	</tr>
  </div>
</nav>
</table>
</form>
</body>
</html>