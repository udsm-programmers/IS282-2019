<?php 
  session_start(); 


  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: loginfile.php");
  }
?>
  <!DOCTYPE html>
  <html>
    <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>dashfordorder</title>
  <link rel="stylesheet" href="dashboardorder.css">
    </head>
  <body>
  <ul>
    <li> <img src="mylogo.jpg" style="width:80px;height:55px;padding:2px 0 2px 0;border-radius:15px 15px 15px 15px;"/>  </li> 	
    <li><a href="CUITTLES PRODUCTION.html" style="background-color: #687864;margin: 2px"><i class="fa fa-fw fa-home"></i> home</a></li>
    <li><a href="productsviews.html"><i class="fa fa-bars"></i> products</a></li>
      <li><a href="contact.html"><i class="fa fa-fw fa-envelope"></i> contant us</a></li>
      <li class="header"><a href="loginfile.html"><i class="fa fa-fw fa-user"></i> login</a></li>
      <li class="head"><a href="signupfile.html">sign up</a></li>
    </ul><br><br><br>
    <div class="marquee"><h3><marquee>welcome <?php echo $_SESSION['username']?></marquee></h3>
    <h2 id="smallheader">PRODUCTS</h2>
    </div>
    <div class="tab">
    <button onclick="window.location.href = 'CUITTLES PRODUCTION.html';">
    <i class="fa fa-fw fa-home"></i>Home</button>
    <button class="tablinks" onclick="openDashford(event, 'ev1')" id="defaultOpen">products</button>
    <button class="tablinks" onclick="openDashford(event, 'ev2')">change password</button>
      <button onclick="window.location.href = 'loginfile.html';">logout</button>
    </div>

      <div id="ev1" class="tabcontent">
      <!DOCTYPE html>
  <html>
    <head>
  <link rel="stylesheet" href="order.css">
  </head>
  <body>
  <h1 id="header">Order Products</h1>
  <div class="row">
  <div class="container">
    <a href="orderproducts.html">
    <img src="pc1.png" alt="cuittles" style="width:100%;height: 80%;"> <br />
  </a>
  <h4 id="header1"> <b> Kind: Beech-Wood <br />
    Price: 100000/= Tshs </b> </h4>
  </div>
  <div class="container">
    <a href="orderproducts.html" >
    <img src="pc17.png" alt="cuittles" style="width:100%;height: 80%;"> <br />
  </a>
  <h4 id="header1"> <b> Kind: Cedar-Wood <br />
    Price: 50000/= Tshs </b> </h4>
  </div>
  <div class="container">
    <a href="orderproducts.html" >
    <img src="pc9.png" alt="cuittles" style="width:100%;height: 80%;"> <br />
  </a>
    <h4 id="header1"> <b> Kind: Soft-Wood <br />
    Price: 50000/= Tshs </b> </h4>
  </div>
  </div>
  <div class="row">
  <div class="container">
    <a href="orderproducts.html" >
    <img src="pc10.png" alt="cuittles" style="width:100%;height: 80%;"> <br />
  </a>
    <h4 id="header1"> <b> Kind: Hard-Wood <br />
    Price: 70000/= Tshs </b> </h4>
  </div>
  <div class="container">
  <a href="orderproducts.html" >
    <img src="pc11.png" alt="cuittles" style="width:100%;height: 80%;"> <br />
  </a>
  <h4> <b> Kind: Pine-Wood <br />
    Price: 50000/= Tshs </b> </h4>
  </div>
  <div class="container">
    <a href="orderproducts.html" >
    <img src="pc12.png" alt="cuittles" style="width:100%;height: 80%;"> <br />
  </a>
  <h4 id="header1"> <b> Kind: Ash-Wood <br />
    Price: 200000/= Tshs </b> </h4>
  </div>
  </div>
  <div class="row">
  <div class="container">
    <a href="orderproducts.html">
    <img src="pc14.png" alt="cuittles" style="width:100%;height: 80%;"> <br />
  </a>
  <h4 id="header1"> <b> Kind: Maple-Wood <br />
    Price: 200000/= Tshs </b> </h4>
  </div>
  <div class="container">
    <a href="orderproducts.html" >
    <img src="pc13.png" alt="cuittles" style="width:100%;height: 80%;"> <br />
  </a>
  <h4 id="header1"> <b> Kind: Ply-Wood <br />
    Price: 150000/= Tshs </b> </h4>
  </div>
  <div class="container">
    <a href="orderproducts.html" >
    <img src="pc15.png" alt="cuittles" style="width:100%;height: 80%;"> <br />
  </a>
  <h4 id="header1"> <b> Kind: Oak-Wood <br />
    Price: 35000/= Tshs </b></h4>
  </div>
  </div>
  </body>
  </html>
      </div>
  <div id="ev2" class="tabcontent">
    <h3>are you want to change a password?</h3>
    <p></p> 
  </div>
    <div id="ev4" class="tabcontent">
      <h3>logout</h3>
      <p></p>
    </div>


    <script>
  function openDashford(evt, moduleName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
                                          }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
    document.getElementById(moduleName).style.display = "block";
    evt.currentTarget.className += " active";
      }

  // Get the element with id="defaultOpen" and click on it
  document.getElementById("defaultOpen").click();
      </script>
      
  </body>
  </html> 
