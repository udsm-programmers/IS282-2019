<?php 
    session_start();
    // include config script
    include('includes/config.php');
    if($_SESSION['login'] != '') {
        $_SESSION['login'] = '';
        $_SESSION['regno'] = '';
    }

    if(isset($_POST['login'])) {
        $regno = $_POST['regno'];
        $password = $_POST['password'];

        $query = "SELECT regno, name, password FROM user WHERE regno='$regno' AND password='$password'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        if($result) {
            $count = mysqli_num_rows($result);
            $row = mysqli_fetch_assoc($result);

            if($count == 1) {
                $_SESSION['login'] = $row['name'];
                $_SESSION['regno'] = $row['regno'];
                header('location: dashboard.php');
            } else {
                echo "<script>alert('Invalid login credentials');</script>";
            }
        }
    }
    mysqli_close($conn);
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

    <title>Online Library Management System | Student Login</title>
</head>
<body>
    <!-- MENU SECTION START -->
    <!-- <h1 class="text-center">LIBSYS</h1> -->
    <?php include('includes/header.php');   ?>
    <!-- MENU SECTION END -->

    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">USER LOGIN FORM</h4>
                </div>
            </div>


            <!-- LOGIN PANEL START -->
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            LOGIN FORM
                        </div>
                        <div class="panel-body">
                            <form action="<?php $PHP_SELF ?>" role="form" method="post">
                                <div class="form-group">
                                    <label for="regno">Enter login id</label>
                                    <input type="text" class="form-control" name="regno" autocomplete="off" required>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" autocomplete="off" required>
                                    <p class="help-block"><a href="user_forget_password.php">Forgot Password</a></p>
                                </div>

                                <button type="submit" name="login" class="btn btn-info">LOGIN</button> | <a href="signup.php">Not Register Yet</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- LOGIN PANEL END -->
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END -->
    <?php include('includes/footer.php');?>
    <!-- FOOTER SECTION END -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPT -->
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>