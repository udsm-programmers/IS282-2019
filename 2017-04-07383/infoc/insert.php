<?php
$username=$_POST['username'];//username
$password=$_POST['password'];//password 
//session_start();

$con=mysqli_connect("localhost","root","fanuu6767","info");//mysqli("localhost","username of database","password of database","database name")
$result=mysqli_query($con,"SELECT * FROM `register` WHERE `username`='$username' && `password`='$password'");
$count=mysqli_num_rows($result);
if($count==1)
{
	//echo "Login success";
	header("refresh:1;url=order.php");
	//$_SESSION['log']=1;
	//header("refresh:2;url=welcome.php");

}
else
{
	echo "please fill proper details";
	//header("refresh:2;url=index.php");// it takes 2 sec to go index page
}

 

?>
