<?php 
    include('includes/connect.php');
    $firstName = $lastName = $email = $password = $job = "";
    if(isset($_POST['submit'])) {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $job = $_POST['job'];

        $query = "INSERT INTO employee (first_name, last_name, email, password, job) VALUES ('$firstName', '$lastName', '$email', '$password', '$job')";

        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        if($result) {
            echo "<script>alert('information added successfully!');</script>";
            header('location:localhost:82/PAYROLL_MS/index.php');
        } else {
            echo "<script>alert('Something went wrong! please try again...');</script>";
        }
    }
?>