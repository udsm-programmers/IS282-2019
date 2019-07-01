
<!DOCTYPE html>
<html>
<body>
<form name="supsper" method="POST" action=""> 
    <head>
      <title>Dry Cleaner | Supervisor </title>  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    </head>
    <meta name="description" content="Affordable and Professional Dry Cleaner"> 
    <meta  name="keywords" content="Laundry System">
    <meta name="author" content="st">
    <link rel="stylesheet" type="text/css" href="stylesp.css">

<header class="container">
    
        <div class="container">
            
        </div>
        <div id="branding">
          <a href="index.php">
            <a href="index.php"><h1 ><span class="highlight">Dry</span> Cleaner</h1></a>
        </div>
        <br><br>
       
    	<div class="container"></div>
        <div id="branding">
        </div>
        <nav>
        	<ul>
        		<li ><a href="index.php">HOME</a></li>
        		<li><a href="About.php">About</a></li>
                <li class="current"><a href="superv.php">Supervisor</a></li>
                <li><a href="register.php">Registration</a></li>
                <li><a href="order.php">ORDER</a></li>
        		<li><a href="Services.php">Services</a></li>
        	</ul>
        </nav>
     
    </header>
   
    <section id="tabl" >
        <div class="container">
             <h1>ADDING CLOTHS</h1>
        <label class="lbl">Type</label><input type="text" name="ngu"><br><br>
        <label class="lbl">Price </label><input type="number" name="pesa"><br><br>
       <select type='text' name="sele">
<?php
     require_once("connects.php");
    $imp="SELECT * FROM charf where '1'";
    $q=mysql_query($imp);
    while($fe=mysql_fetch_array($q))
{
$ty=$fe['char_id'];
$chm=$fe['char_name'];

   echo "<option>$ty $chm</option>";  
}

 ?> 

 </select>  
              <input type="submit" value="SAVE" name="reg">
          </div>
<?php

    if(isset($_POST['reg']))
    {
    require_once ("connects.php");
        $aina=$_POST['ngu'];
        $mbesa=$_POST['pesa'];
        $sel=$_POST['sele'];
        if ($sel=='men'){
        $iy="INSERT INTO lmsservices (item_chr_id,item_type,item_price) VALUES ('$sel','$aina','$mbesa')";
        $qr=mysql_query($iy);
       header("refresh:3;url=superv.php");
}

}
?>

<div class="container">
            <div class="tbl">
    <table>    
    <td colspan="4">
        <h1>Men staffs</h1></td>
    <tr><td><b>Type</b></td><td><b>Price</b></td><td colspan="2" ><b>Change</b></td></tr>
<?php
    require_once("connects.php");
    $imp="SELECT *FROM lmsservices where item_chr_id=1 ";
    $q=mysql_query($imp);
    while($fe=mysql_fetch_array($q))
{
    $i=$fe['item_id'];
$ty=$fe['item_type'];
$PRm=$fe['item_price'];
echo"<tr><td>$ty</td><td>$PRm</td>";
 echo "<td style='border-collapse:collapse;'><a href='upt1.php?item_id=$i'>EDIT</a></td>";
 echo "<td style='border-collapse:collapse;'><a href='remove1.php?item_id=$i'>DELET</a></td></tr>";
}

?></td>
</table>
</div>

<div class="tbl">
<table>
    <td colspan="4">
    <h1>Women staffs</h1>
    <tr><td><b>Type</b></td><td><b>Price</b></td><td colspan="2" ><b>Change</b></td></tr>
<?php
    require_once("connects.php");
   $imp="SELECT * FROM lmsservices where item_chr_id=2 ";
    $q=mysql_query($imp);
    while($fe=mysql_fetch_array($q))
{
    $i=$fe['item_id'];
$ty=$fe['item_type'];
$PRwm=$fe['item_price'];
echo"<tr><td>$ty</td><td>$PRm</td>";
 echo "<td style='border-collapse:collapse;'><a href='upt1.php?item_id=$i'>EDIT</a></td>";
 echo "<td style='border-collapse:collapse;'><a href='remove1.php?item_id=$i'>DELET</a></td></tr>";
}
?></td>
</table>
</div>
<div class="tbl">
<table>
    <td colspan="4">
    <h1>Baby staffs</h1>
    <tr><td><b>Type</b></td><td><b>Price</b></td><td colspan="2" ><b>Change</b></td></tr>
<?php
    require_once("connects.php");
   $imp="SELECT item_type, item_price FROM lmsservices where item_chr_id=3 ";
    $q=mysql_query($imp);
    while($fe=mysql_fetch_array($q))
{
$ty=$fe['item_type'];
$PRwm=$fe['item_price'];
echo"<tr><td>$ty</td><td>$PRm</td>";
echo "<td style='border-collapse:collapse;'><a href='upt1.php?item_id=$i'>EDIT</a></td>";
 echo "<td style='border-collapse:collapse;'><a href='remove1.php?item_id=$i'>DELET</a></td></tr>";
}
?>
</td>
</table>
</div>
<div class="tbl">
<table>
    <td colspan="4">
    <h1>Home+ staffs</h1>
    <tr><td><b>Type</b></td><td><b>Price</b></td><td colspan="2" ><b>Change</b></td></tr>
<?php
    require_once("connects.php");
   $imp="SELECT item_type, item_price FROM lmsservices where item_chr_id=4 ";
    $q=mysql_query($imp);
    while($fe=mysql_fetch_array($q))
{
$ty=$fe['item_type'];
$PRwm=$fe['item_price'];
echo"<tr><td>$ty</td><td>$PRm</td>";
echo "<td style='border-collapse:collapse;'><a href='upt1.php?item_id=$i'>EDIT</a></td>";
 echo "<td style='border-collapse:collapse;'><a href='remove1.php?item_id=$i'>DELET</a></td></tr>";
}
?>
</td>
</table>
</div>
</div>
</form >
    
    </section>
             </section>  

    <footer class="container">
        <p>Dry Cleaner ,All right reserved &copy; 2019 <?php  ?> </p>
    </footer>
    </body>
</html>
