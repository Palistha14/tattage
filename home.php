<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tattoo Heritage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/homecss.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style type="text/css">
    .navbar-toggle{
      background-color: white;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-fixed-top ">
      <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>                                                                              
            <a class="navbar-brand" href="#"><img src="image/logo.jpg" ></a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="home.php" style="color: yellow">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php" style="color: white">About us</a>
              </li>
              

              <?php
              if (!isset($_SESSION['user']) && !isset($_SESSION['admin'])){ ?>
                <li class="nav-item">
                <a class="nav-link" href="artist.php" style="color: white">Meet our artist</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="activity.php" style="color: white">Our activties</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contactph.php" style="color: white">Contact</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="login.php" style="color: white">Login</a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link" href="signup.php" style="color: white">Signup</a>
                </li>  
              <?php } else{?>
                <li class="nav-item">
                  <a class="nav-link" href="design.php" style="color: white">Design</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="activity.php" style="color: white">Our activties</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contactph.php" style="color: white">Contact</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="booking.php" style="color: white">Booking</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="" style="color: white">
                    <?php
                      if(isset($_SESSION['user'])){
                        echo $_SESSION["user"];
                      }
                      elseif(isset($_SESSION['admin'])){
                        echo $_SESSION["admin"];
                      }
                    ?>
                  </a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link" href="logout.php" style="color: white; float: right;">Logout</a>
                </li>  
              <?php }?>
      
          </ul>     
        </div>
      </div>
    </nav>

    <div class="section">
        <img class="mySlides" src="image/first.jpg " >
        <img class="mySlides" src="image/second.jpg" >
        <img class="mySlides" src="image/third.jpg" >
        <img class="mySlides" src="image/fourth1.jpg " >
    </div>

  <script>
  var myIndex = 0;
  carousel();

  function carousel() {
      var i;
      var x = document.getElementsByClassName("mySlides");
      for (i = 0; i < x.length; i++) {
         x[i].style.display = "none";  
      }
      myIndex++;
      if (myIndex > x.length) {myIndex = 1}    
      x[myIndex-1].style.display = "block";  
      setTimeout(carousel, 2000); // Change image every 5 seconds
  }
  </script>

</body>
</html>
