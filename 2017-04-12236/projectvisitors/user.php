<?php
include "session.php";
include "connect.php";
?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="bootstrap.min.css">

  <title>Welcome</title>
  <style>
  
</style>
  
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid" >
    <div class="navbar-header" style="width: 100%">
<p class="navbar-text navbar-auto"><h1><p>Welcome : <?php echo $_SESSION['userid'];?></p></h1></p>
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
          <center><p class="navbar-text navbar-auto" ><h3>Here is the list of all visitors</h3></p></center>
        </tr>
  
      </table>
    </td>
  </tr>
  <tr>
    <td width="20%" height="500px">
      <div class="list-group" style="width: 80%">
          <center><a href="#" class="list-group-item disabled" ">
          <b> Menus 
          </a> </center>
          <center><a href="logout.php" class="list-group-item " " style="background-color:#d6b09a;">
          <b> Logout 
          </a>
          </b>
          <a href="" class="list-group-item disabled">View Visitors</a>
          </center>
      </div>
    </td>
    <td>
      <table class="table table-hover">
        <tr>
          <td><b>sno</b></td>
          <td><b>Date</b></td>
          <td><b>First Name</b></td>
          <td><b>Last Name</b></td>
          <td><b>Gender</b></td>
          <td><b>Address</b></td>
          <td><b>Phone No</b></td>
          <td><b>Visited Places</b></td>
          <td><b>Purpose</b></td>
          <td><b>Time In</b></td>
        </tr>
        </tr>
          <?php
          $sela="SELECT id,datepr,firstname,lastname,gender,address,phonenumber,visitedplace,purpose,timein,timeout FROM register";
          //echo $sela;
          $rna=mysqli_query($sela);
          $n=1;
          while ($rwa=mysqli_fetch_array($rna))
          {
          $date=$rwa['datepr'];
          $firstname=$rwa['firstname'];
          $lastname=$rwa['lastname'];
          $gender=$rwa['gender'];
          $address=$rwa['address'];
          $phoneno=$rwa['phonenumber'];
          $visitedplace=$rwa['visitedplace'];
          $purpose=$rwa['purpose'];
          $timein=$rwa['timein'];

          ?>
          <tr>
    <td><?php echo $n ?></td>
    <td><?php echo $date ?></td>
    <td><?php echo $firstname ?></td>
    <td><?php echo $lastname ?></td>
    <td><?php echo $gender ?></td>
    <td><?php echo $address ?></td>
    <td><?php echo $phoneno ?></td>
    <td><?php echo $visitedplace ?></td>
    <td><?php echo $purpose ?></td>
    <td><?php echo $timein ?></td>
   
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