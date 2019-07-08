<?php 
    session_start();
    include('./includes/connect.php');

    if(isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "SELECT first_name, email, password FROM employee WHERE email='$email' AND password='$password'";

        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        if($result) {
            $count = mysqli_num_rows($result);
            $row = mysqli_fetch_assoc($result);

            $_SESSION['username'] = $row['first_name'];
            header('location: profile.php');
        } else {
            echo "<script>alert('something went wrong!... Try again!');</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./assets/style.css">
    <title>payroll | Login</title>
</head>
<body>
<div class="container">
        <header>
            <h1>Payroll Login form</h1>
            <!-- <hr style="width: 30%; position: relative; top: 10rem; margin: auto;"> -->
        </header>
        <form method="post">        
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" placeholder="" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" placeholder="" autocomplete="off" required>
            </div>

            <div class="form-group">
                <input type="submit" value="login" class="btn btn-primary" name="login">
            </div>
        </form> 
    </div>
</body>
</html>