<?php 
    session_start();

    include('includes/config.php');

    if(isset($_POST['change'])) {
        $regno = $_POST['regno'];
        $mobileno = $_POST['mobileno'];
        $email = $_POST['email'];
        $newpassword = $_POST['password'];

        $query = "SELECT regno, email FROM user WHERE regno='$regno' AND email='$email'";

        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if($result) {
            $count = mysqli_num_rows($result);

            if($count == 1) {
                $query = "UPDATE user SET password='$newpassword' WHERE regno='$regno' AND email='$email'";
                $result = mysqli_query($conn, $query);
                echo "<script>alert('password updated successfully!!');</script>";
                header('location: index.php');
            } else {
                echo "<script>alert('Login id or email is invalid');</script>";
            }
        }
    }
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

    <title>Online Library Managament System | Password Recovery</title>
</head>
<body>
    <!-- MENU SECTION START -->
    <?php include('includes/header.php'); ?>
    <!-- MENU SECTION END -->

    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">User Password Recovery</h4>
                </div>
            </div>


             <!-- LOGIN PANEL START -->
             <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            PASSWORD RECOVERY FORM
                        </div>
                        <div class="panel-body">
                            <form name="signup" action="<?php $PHP_SELF ?>" role="form" method="post" onSubmit="return valid();">
                                <div class="form-group">
                                    <label for="regno">Enter login id</label>
                                    <input type="text" class="form-control" name="regno" autocomplete="off" required>
                                </div>

                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <input class="form-control" type="text" name="mobileno" maxlength="10" autocomplete="off" required />
                                </div>
                                            
                                <div class="form-group">
                                    <label>Enter Email</label>
                                    <input class="form-control" type="email" name="email" id="emailid" autocomplete="off" required  />
                                    <span id="user-availability-status" style="font-size:12px;"></span> 
                                </div>

                                <div class="form-group">
                                    <label>Enter New Password</label>
                                    <input class="form-control" type="password" name="password" autocomplete="off" required  />
                                </div>

                                <div class="form-group">
                                    <label>Confirm Password </label>
                                    <input class="form-control"  type="password" name="confirmpassword" autocomplete="off" required  />
                                </div>                        

                                <button type="submit" name="change" class="btn btn-info">CHANGE PASSWORD</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- LOGIN PANEL END -->
        </div>
    </div>
     <!-- CONTENT WRAPPER SECTION END -->
     <?php include('includes/footer.php');?>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPT -->
    <script src="assets/js/bootstrap.js"></script>
    <script>
        function valid() {
            if(document.signup.password.value !== document.signup.confirmpassword.value) {
                alert("password and confirmpassword field do not match !!");
                document.signup.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
