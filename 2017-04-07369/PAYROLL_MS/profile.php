<?php 
    session_start();
    include('./includes/connect.php');
    if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- style link -->
    <link rel="stylesheet" href="./assets/style.css">
    <!-- js link -->
    <link rel="stylesheet" href="payroll.js">
    <title>Employee Profile</title>
</head>
<body>
    <div class="container">
        <div class="content">
            <header>
                <div class="nav-brand">
                    <img src="./img/logo.png">
                </div>
                <ul class="nav">
                    <li class="nav-top"><a href="logout.php" class="nav-link">Log out</a></li>
                </ul>
                    <h3>Welcome <?php echo $username; ?></h3>
                <div class="clear"></div> 
            </header>
        </div>
        <div class="tab">
          <div class="cta">
          <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">List of Employee per job</button><br>
          <button class="tablinks" onclick="openCity(event, 'Paris')">Employee Information</button><br>
          <button class="tablinks" onclick="openCity(event, 'Tokyo')">Employee Progress</button>
          </div>
           <button name = "Update" type = "update" id = "Update" 
           value = "Update"><a href="http://localhost:82/PAYROLL_MS/update.php">Update</a></button>
           <button name = "delete" type = "delete" id = "delete" 
           value = "Delete"><a href="http://localhost:82/PAYROLL_MS/delete.php">Delete</a></button>
        </div>

<div id="London" class="tabcontent" >
<?php
include('./includes/connect.php');
$sql="select * from employee";
$result = $conn->query($sql);
?>
<div class="table-container">
  <table style="width:100%;" border="">
      <tr>
        <th>id</th>
        <th>first_name</th>
        <th>last_name</th>
        <th>email</th>
        <th>job</th>
      </tr>
  <?php
  while($rows=mysqli_fetch_assoc($result))
  {
  ?> 
    <tr>
      <td><?php echo $rows['id']; ?></td>
      <td><?php echo $rows['firstName']; ?></td>
      <td><?php echo $rows['lastName']; ?></td>
      <td><?php echo $rows['email']; ?></td>
      <td><?php echo $rows['job']; ?></td>
    </tr>
    <?php
  }
  ?>
  </table>
</div>
<!--<div id="Paris" class="tabcontent">
</div>-->
<!--<div id="Tokyo" class="tabcontent">
</div>-->
</div>
<script src="../payroll.js"></script>
</body>
</html>
    <?php } else {?>
    <?php header('location: index.php'); }?>