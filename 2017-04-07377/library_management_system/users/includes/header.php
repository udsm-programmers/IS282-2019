<nav class="navbar navbar-expand-lg navbar-light bg-light">
    
    <a class="navbar-brand" href="#">
      LIBSYS
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
<?php if($_SESSION['login']) {?>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav navbar-right">
            <li class="nav-item">
                <a class="nav-link" href="#">DASHBOARD<span class="sr-only">(current)</span></a>
            </li>      
            <li class="nav-item">
                <a href="logout.php" class="nav-link">LOG ME OUT</a>
            </li>
        </ul>
    </div>
<?php } else {?>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav navbar-right">
            <li class="nav-item">
                <a class="nav-link" href="index.php">USER LOGIN <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="signup.php">USER SIGNUP</a>
            </li>        
        </ul>
  </div>
<?php }?>  
</nav>