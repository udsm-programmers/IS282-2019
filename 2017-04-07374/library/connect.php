

<?php 

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "library";

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if(!$conn) {
    die("failed to connect to database " . mysqli_connect_error($conn));
}
?>
