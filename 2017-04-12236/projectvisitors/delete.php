<?php
include "connect.php";
  $id=$_GET['n'];
  $sql="DELETE FROM users WHERE id='$id'";
  $run=mysqli_query($sql);
if($run) {
      header('location:viewusers.php');
      die();
    }
?>