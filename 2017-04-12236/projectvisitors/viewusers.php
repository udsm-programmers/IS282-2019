 <?php
include "connect.php";
include "session.php"; 
?>
 <!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">

  <title>View users</title>
  <style>
	
</style>
  
</head>
<body>
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
					<center><p class="navbar-text navbar-auto" ><h4>System Users</h4></p></center>
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
          <a href="viewusers.php" class="list-group-item disabled">View users</a>
          <a href="createusers.php" class="list-group-item">Create users</a>
          <a href="register.php" class="list-group-item">Register Visitors </a>
              <a href="viewv.php" class="list-group-item">View Visitors</a>

          <center><a href="logout.php" class="list-group-item " " style="background-color:#d6b09a;">
          <b> Logout 
          </a>
          </b></center>
      </div>
    </td>
		<td>
			<table class="table table-hover" >
				<tr>
					<td><b>sno</b></td>
					<td><b>Full Name</b></td>
					<td><b>Username</b></td>
					<td><b>Email</b></td>
					<td><b>Phone No</b></td>
					<td><b>Type</b></td>
					<td><b>Edit</b></td>
					<td><b>Delete</b></td>
				</tr>
					<?php
					$sel="SELECT id,userid,password,fullname,phonenumber,email,type FROM users";
					//echo $sel;
					$rn=mysqli_query($sel);
					$n=1;
					while ($rw=mysqli_fetch_array($rn))
					{
					$fullname=$rw['fullname'];
					$name=$rw['userid'];
					$email=$rw['email'];
					$phoneno=$rw['phonenumber'];
					$type=$rw['type'];
					$id=$rw['id'];
					?>
					<tr>
		<td><?php echo $n ?></td>
		<td><?php echo $fullname ?></td>
		<td><?php echo $name ?></td>
		<td><?php echo $email ?></td>
		<td><?php echo $phoneno ?></td>
		<td><?php echo $type ?></td>
		<td><a href='edituser.php ?n=<?php echo $id; ?>' class="btn btn-default role="button"> Edit</a></td>
		<td>
		<a href='delete.php ?n=<?php echo $id; ?>' class="btn btn-danger" role="button" > Delete</a></td>
	</tr>
	<?php
	$n++;
}
?>		

  
			</table>
		</td>
	</tr>
  </div>
</nav>


</table>
</body>
</html>