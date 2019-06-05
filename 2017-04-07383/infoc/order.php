
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Dry Cleaner | Order </title>
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
                <li><a href="About.php">ABOUT</a></li>
                <li><a href="Services.php">SERVICES</a></li>
                <li class="current"><a href="order.php">ORDER</a></li>
                <li><a href="register.php">Registration</a></li>
                <li><a href="Services.php">Services</a></li>
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
    <section id="select">
                <div class="container">

<script>
    function calcSum() {
        let num1 = document.getElementsByName("num1")[0].value;
        let num2 = document.getElementsByName("num2")[0].value;
        let num1a = document.getElementsByName("num3")[0].value;
        let num2a = document.getElementsByName("num4")[0].value;
       
let sum = Number(num1) + Number(num2) + Number(num3) + Number(num4);
let sum2 = (Number(num1)*$PRm )+ (Number(num2)*$PRwm)+ (Number(num3)*$PRb)+ (Number(num2a)*$PRh);
        document.getElementsByName("sum")[0].value = sum;
         document.getElementsByName("sum2")[0].value = sum2;
    }
</script>
        
           <form id="f1">
            <p></p><br>
        <label class="lbl">Total Clothes</label> <input type="text" name="sum" id="f1" disabled><br><br>
             <label class="lbl">Total Price </label> <input type="text" name="sum2" id="f1" disabled><br><br>   
              <input type="button" value="check" onclick="calcSum()">
              <input type="button" value="Resete" onclick="calcSum()">
          </form>
                <br>
             </section>
    
    <footer class="container">
        <p>Dry Cleaner ,All right reserved &copy; 2019 <?php  ?> </p>
    </footer>