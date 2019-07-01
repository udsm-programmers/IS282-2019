<?php
$sn = "localhost";
$usm = "root";
$pa = "";
$sb = "lmssystem";
mysql_connect($sn,$usm,$pa)or die("cannot connect");
mysql_select_db($sb)or die("cannot select database");
?>