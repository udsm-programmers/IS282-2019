<?php 
    session_start();
    include('includes/config.php');
    if($_SESSION['login']) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="GordonNchy">
    <!-- BOOTSTRAP CORE STYLE -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <!-- CUSTOM STYLE -->
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Online Library Management System | Dashboard</title>
</head>
<body>
    <!-- MENU SECTION START -->
        
    <!-- MENU SECTION END -->
    <!-- <h1 class="text-center">LIBSYS</h1> -->
    <?php include('includes/header.php');?>
    <!-- DASHBOARD SECTION -->


    <!-- CONTENT-WRAPPER SECTION END -->
    <?php include('includes/footer.php');?>
    <!-- FOOTER SECTION END -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPT -->
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>
    <?php } else {?>
        <?php 
            header('location: index.php');
        ?>
    <?php }?>
    
    