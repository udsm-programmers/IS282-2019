<?php
include("server.php");
session_start();
if(!empty($_POST["login_file"])) {
	$conn = mysqli_connect("localhost", "root", "", "mydatabase");
	$sql = "Select * from users where username = '" . $_POST["username"] . "'";
        if(!isset($_COOKIE["member_login"])) {
            $sql .= " AND password = '" . md5($_POST["password"]) . "'";
	}
        $result = mysqli_query($conn,$sql);
	$user = mysqli_fetch_array($result);
	if($user) {
			$_SESSION["id"] = $user["id"];
			
			if(!empty($_POST["remember"])) {
				setcookie ("member_login",$_POST["username"],time()+ (10 * 365 * 24 * 60 * 60));
			} else {
				if(isset($_COOKIE["member_login"])) {
					setcookie ("member_login","");
				}
			}
	} else {
		$message = "Invalid Login";
	}
}
?>