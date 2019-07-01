<html>
<body>
	<head>
<?php
require_once("connects.php");
$idz=$_GET['item_id'];
$del="DELETE FROM lmsservices WHERE item_id='$idz'";
$rn=mysql_query($del);
if ($rn){
	echo"<br><br>";
echo"<center><h1>record deleted</h1></center>";
	header("refresh:0;url=superv.php");
}
?>
</head>
</body>
</html>