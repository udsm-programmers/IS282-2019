<?php          
require_once("connection.php");

if (isset($_POST["register"])){
$fname=$_POST['firstname'];
$id=$_POST['id'];
$lname=$_POST['lastname'];
$username=$_POST['username'];
$email=$_POST['email'];
$pass=$_POST['password'];
$confpass=$_POST['confirmpassword'];
$contact=$_POST['contact'];




 $sql ="INSERT INTO `register` ( `id`,`firstname`, `lastname`, `username`, `email`, `password`, `confirmpassword`, `contact`) VALUES (NULL,'$fname', '$lname', '$username', '$email', '$pass', 'confpass', '$contact')";
 

 if ($conn->query($sql)==TRUE) {
   header("refresh:1;url=home.php");
 }
 else{

echo "Error" . $sql . "</br>" . $conn->error;
}
}




?>