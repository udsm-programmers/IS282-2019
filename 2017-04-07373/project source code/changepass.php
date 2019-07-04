<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>changepassword</title>
<link rel="stylesheet" href="orderproducts.css">
</head>
<body>
<?php
include('server.php');
$user = $_SESSION ['username'];
if ($user)
{
//user is logged in
if(isset($_POST['submit']))
{
       $oldpassword = md5($_POST['oldpassword']);
	   	$newpassword= md5($_POST['newpassword']);
		$repeatnewpassword = md5($_POST['repeatnewpassword']);
   $query = mysql_query("SELECT password FROM users WHERE username ='$username'") or die("query didnt work");
   $row=mysql_fetch_assoc($query);
   $oldpassworddb=$row['password'];
   	
	   if ($oldpassword==md5($oldpassworddb))
   {
	if ($newpassword==$repeatnewpassword)
	   {
	   $querychange = mysql_query("UPDATE users SET password=md5('$newpassword') WHERE username='$username'");
	    session_destroy();
	   die("Your password has been changed.<a href='/webdesigning1/index.php'>Return</a>");
	  }
	    else
	  die ("new passwords don't match!");
	   
   }
   else
   die ("old password dosent match!");
	}
	else
    echo "
	<form action='changepass.php'  method='POST'>
	old password:<input type='text' name='oldpassword'><p>
	new password:<input type='password' name='newpassword'><br>
	repeat new password:<input type='password' name='repeatnewpassword'><br>
	<input type='submit' name='submit' value='change password'> <p>
    </form>
	";
}
else
	die
	     ("You must be logged in to change the password")
?>
</body>
</html>