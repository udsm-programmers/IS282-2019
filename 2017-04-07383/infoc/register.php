

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Dry Cleaner | Registerst </title>
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
        		<li><a href="index.php">HOME</a></li>
        		<li><a href="about.php">About</a></li>
                 <li class="current"><a href="register.php">Registration</a></li>
                <li><a href="superv.php">Supervisor</a></li>
        		<li><a href="services.php">Services</a></li>
        	</ul>
        </nav>
    </header>

    <section class="container" id="showcase">
    	<div class="container">
           <form name="register" action="registercode.php" method="POST">
                <input type="hidden" name="id" ><br>
                <input type="text" name="firstname" placeholder="First name" required><br>
                <input type="text" name="lastname"  placeholder="Last name" required><br>
                <input type="text" name="username"  placeholder="User name" required><br>
                <input type="text" name="email"  placeholder="Email" required><br>
                <input type="text" name="password"  placeholder="Password" required><br>
                <input type="text" name="confirmpassword"  placeholder="Confirm password" required><br>
                <input type="text" name="contact"  placeholder="Contact" required><br>

                <input type="submit" value="register" name="register"><br>
                
               
            </form> 
    </section>

    <section class="container" id="newsletter">
    	<div>
    		
    	</div>
        <div class="modal">
           
        </div>
    </section>

    <section id="boxes">
    	<div class="container">
    		<div class="box">
    </section>

    <footer class="container">
        <p>Dry Cleaner ,All right reserved &copy; 2019 <?php  ?> </p>
    </footer>
</body>

</html>

