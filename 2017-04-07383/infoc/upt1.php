<!DOCTYPE html>
<html>

<body>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Dry Cleaner | Home </title>
  <meta name="description" content="Affordable and Professional Dry Cleaner"> 
  <meta  name="keywords" content="Laundry System">
  <meta name="author" content="st">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<form name='upt1' method='POST' action=''>
<?php
        require_once("connects.php");
         $idst=$_GET['item_id'];
    $insert= "SELECT * FROM lmsservices WHERE item_id ='$idst'";
    $qr=mysql_query($insert);
    $fe=mysql_fetch_array($qr);
      $fnam=$fe['item_type'];
      $mnam=$fe['item_price'];
      $idstt=$fe['item_id'];
?>
    <center>
<table border="0">
     <tr>
       <td>
<table ><input type="hidden" name="idss" value="<?php echo "$idstt";?>">
<tr><th>cloths</th><td><input type="text" name="fn1" value="<?php echo "$fnam";?>"></td></tr>
<tr><th>price</th><td><input type="number" name="prs" value="<?php echo "$mnam";?>"></td></tr>
<tr><td><input type="submit" value=" save" name="wire" ></td>
</center>
</tr>
</td>
</tr>
</table>
<?php
require_once("connects.php");
if (isset($_POST['wire']))
{
      $ids=$_POST['idss'];
      $fnam=$_POST['fn1'];
      $pr=$_POST['prs'];

$s= " UPDATE lmsservices SET item_type = '$fnam', item_price = '$pr' WHERE item_id = '$ids'";
$qr=mysql_query($s);

  header("refresh:0;url=superv.php");

}
?>
    <footer class="container">
        <p>Dry Cleaner ,All right reserved &copy; 2019 <?php  ?> </p>
    </footer>
</form>
</body>
</html>