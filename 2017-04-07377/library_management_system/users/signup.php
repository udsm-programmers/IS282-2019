<?php 
    session_start();
    // include config script
    include('includes/config.php');

    if(isset($_POST['signup'])) {
        $regno = $_POST['regno'];
        $name = validate($_POST['fullname']);
        $mobileno = validate($_POST['mobileno']);
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $query = "INSERT INTO user (regno, name, mobileNo, email, password) VALUES ('$regno', '$name', '$mobileno', '$email', '$password')";

        $result = mysqli_query($conn, $query);

        if($result) {
            echo "<script>alert('Your successfully registered and your login id is '+'" .$regno. "');</script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again');</script>";
        }
    }

    function validate($data) {
        $data = trim($data);
        $data = stripcslashes($data);
        return $data;
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

    <title>Online Library Management System | Student Signup</title>
</head>
<body>
    <!-- MENU SECTION START -->
    <?php include('includes/header.php');?>
    <!-- MENU SECTION END -->

    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">User Signup Form</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-9 col-md-offset-1">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            SIGNUP FORM
                        </div>
                        <div class="panel-body">
                            <form name="signup" method="post" onSubmit="return valid();">
                                <div class="form-group">
                                    <label>Enter Registration Number</label>
                                    <input class="form-control" type="text" name="regno" autocomplete="off" required />
                                </div>

                                <div class="form-group">
                                    <label>Enter Full Name</label>
                                    <input class="form-control" type="text" name="fullname" autocomplete="off" required />
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
                                    <label>Enter Password</label>
                                    <input class="form-control" type="password" name="password" autocomplete="off" required  />
                                </div>

                                <div class="form-group">
                                    <label>Confirm Password </label>
                                    <input class="form-control"  type="password" name="confirmpassword" autocomplete="off" required  />
                                </div>                        

                                <button type="submit" name="signup" class="btn btn-danger" id="submit">Register Now </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
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