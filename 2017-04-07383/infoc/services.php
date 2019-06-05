
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Dry Cleaner | Services </title>
    <meta name="description" content="Affordable and Professional Dry Cleaner"> 
    <meta  name="keywords" content="Laundry System">
    <meta name="author" content="st">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header class="container">
        <div class="container"></div>
        <div id="branding">
            <a href="index.php"><h1 ><span class="highlight">Dry</span> Cleaner</h1></a>
        </div>
        <nav>
            <ul>
                <li ><a href="index.php">HOME</a></li>
                <li><a href="About.php">About</a></li>
                <li class="current"><a href="Services.php">Services</a></li>
            </ul>
        </nav>
    </header>
    <section id="tabl" >
        <div class="container">
            <div class="tbl">
<table>
    <td colspan="2">
    <h1>Men staffs</h1>
    <tr><td><b>Type</b></td><td><b>Price</b></td></td></tr>
<?php
    require_once("connects.php");
    $imp="SELECT item_type, item_price FROM lmsservices where item_chr_id=1 ";
    $q=mysql_query($imp);
    while($fe=mysql_fetch_array($q))
{
$ty=$fe['item_type'];
$PRm=$fe['item_price'];
echo"<tr><td>$ty</td><td>$PRm</td></tr>";
}

?></td>
</table>
</div>

<div class="tbl">
<table>
    <td colspan="2">
    <h1>Women staffs</h1>
    <tr><td><b>Type</b></td><td><b>Price</b></td></td></tr>
<?php
    require_once("connects.php");
   $imp="SELECT item_type, item_price FROM lmsservices where item_chr_id=2 ";
    $q=mysql_query($imp);
    while($fe=mysql_fetch_array($q))
{
$ty=$fe['item_type'];
$PRwm=$fe['item_price'];
echo"<tr><td>$ty</td><td>$PRwm</td></tr>";
}
?></td>
</table>
</div>
<div class="tbl">
<table>
    <td colspan="2">
    <h1>Baby staffs</h1>
    <tr><td><b>Type</b></td><td><b>Price</b></td></td></tr>
<?php
    require_once("connects.php");
   $imp="SELECT item_type, item_price FROM lmsservices where item_chr_id=3 ";
    $q=mysql_query($imp);
    while($fe=mysql_fetch_array($q))
{
$ty=$fe['item_type'];
$PRwm=$fe['item_price'];
echo"<tr><td>$ty</td><td>$PRwm</td></tr>";
}
?>
</td>
</table>
</div>
<div class="tbl">
<table>
    <td colspan="2">
    <h1>Home+ staffs</h1>
    <tr><td><b>Type</b></td><td><b>Price</b></td></td></tr>
<?php
    require_once("connects.php");
   $imp="SELECT item_type, item_price FROM lmsservices where item_chr_id=4 ";
    $q=mysql_query($imp);
    while($fe=mysql_fetch_array($q))
{
$ty=$fe['item_type'];
$PRwm=$fe['item_price'];
echo"<tr><td>$ty</td><td>$PRwm</td></tr>";
}
?>
</td>
</table>
</div>
</div>
    </section>



     

    <footer class="container">
        <p>Dry Cleaner ,All right reserved &copy; 2019 <?php  ?> </p>
    </footer>