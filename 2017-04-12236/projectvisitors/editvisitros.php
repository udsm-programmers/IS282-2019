<?php
include "connect.php";
include "session.php";
$id=$_GET['n'];
$sel="SELECT * FROM users WHERE id='$id'";
        $rn = mysqli_query($sel);
        $rw = mysqli_fetch_array($rn);
          $fname=$rw['fname'];
          $lname=$rw['lname'];
          $gender=$rw['gender'];
          $address=$rw['address'];
          $phoneno=$rw['phonenumber'];
          $visit=$rw['place'];
          $purpose=$rw['purpose'];
//updating information to the database
if(isset($_POST['edit']))
{
$fname=$_POST['fname'];
$lname=$_POST['lname'];
 $gender=$rw['gender'];
          $address=$rw['address'];
          $phoneno=$rw['phonenumber'];
          $visit=$rw['place'];
          $purpose=$rw['purpose'];
$id=$_POST['id'];
$sql="UPDATE users SET fistname='$fname',lastname='$lname',gender='$gender',Address='$address', phonenumber='$number', visitedplace='$place',purpose='$purpose' WHERE id='$id'";
$query=mysqli_query($sql);
if($query)
{
  header("location:viewv.php");
  die();
}
}
 ?>
 <?php
include "session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">

  <title>Register Visitors</title>
  <style>
	
</style>
  
</head>
<body>

	
<form name="editvisitors" method="POST" action="editvisitros.php">

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
					<center><p class="navbar-text navbar-auto" ><h4>Visitors Registration Form</h4></p></center>
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
  				<a href="#" class="list-group-item disabled">Register Visitors </a>
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
    					<td><label class="col-sm-2 control-label">Date</label></td>
    						<div class="col-sm-10">
      							<td ><input type="name" name="date" class="form-control" value=<?php echo $date; ?>></td>
   				 			</div>
  					</div>
  				</tr>
  				<tr >
          <div class="form-group">
              <td><label  class="col-sm-2 control-label">Time In</label></td>
                <div class="col-sm-10">
                    <td ><input type="name" name="timein" class="form-control" value=<?php echo $time; ?>></td>
                </div>
            </div>
        </tr>
  				<tr >
         
  				<tr>
					<div class="form-group">
    					<td><label class="col-sm-2 control-label">First Name</label></td>
    						<div class="col-sm-10">
      							<td ><input type="name" name="fname"class="form-control" placeholder="First Name"  value="<?php  echo ("$fname")?>" >	</td>
<input type="hidden" name="id" value="<?php echo $id; ?>">
      						
   				 			</div>
  					</div>
  				</tr>
				<tr>
					<div class="form-group">
    					<td><label class="col-sm-2 control-label">Last Name</label></td>
    						<div class="col-sm-10">
      							<td ><input type="name" name="lname" class="form-control" placeholder="Last Name" value="<?php  echo ("$lname")?>" ></td>
<input type="hidden" name="id" value="<?php echo $id; ?>">
      							
   				 			</div>
  					</div>
  				</tr>
  				<tr >
 	 				<div class="form-group">
    					<td><label  class="col-sm-2 control-label">Gender</label></td>
    						<div class="col-sm-10">
      							<td >
      								<select name="gender" class="form-control">
		                            <option>Select Gender</option>
		                            <option>Male</option>
		                            <option>Female</option>
	                                </select>
      							</td>
    						</div>
  					</div>
				</tr>
        <tr >
          <div class="form-group">
              <td><label  class="col-sm-2 control-label">Address</label></td>
                <div class="col-sm-10">
                    <td ><input type="name" name="address" class="form-control"  placeholder="Visitors Address" value="<?php  echo ("$address")?>" >

                    </td>
                     <input type="hidden" name="id" value="<?php echo $id; ?>">
                </div>
            </div>
        </tr>
        <tr >
          <div class="form-group">
              <td><label  class="col-sm-2 control-label">Phone Number</label></td>
                <div class="col-sm-10">
                    <td ><input type="number" name="number" class="form-control"value="<?php  echo ("$number")?>" >

                    </td>
                     <input type="hidden" name="id" value="<?php echo $id; ?>">
                </div>
            </div>
        </tr>
        <tr >
          <div class="form-group">
              <td><label  class="col-sm-2 control-label">Visited Place</label></td>
                <div class="col-sm-10">
                    <td ><input type="name" name="place" class="form-control" value="<?php  echo ("$place")?>" >
                    </td>
                     <input type="hidden" name="id" value="<?php echo $id; ?>">
                </div>
            </div>
        </tr>
        <tr >
          <div class="form-group">
              <td><label  class="col-sm-2 control-label">Visited Purpose</label></td>
                <div class="col-sm-10">
                    <td >
                      <select name="purpose" class="form-control">
                                <option>Select</option>
                                <option>Personal</option>
                                <option>Official</option>
                                  </select>
                    </td>
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
  
			</table>
		</td>
	</tr>
  </div>
</nav>
</table>
</form>
</body>
</html>