<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
        // if (!isset($_SESSION['user']))
        //   header('Location: home.php');
    } 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tattoo heritage</title>
	<link rel="stylesheet" type="text/css" href="css/homecss.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/about.css"> -->
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
                <a class="nav-link" href="home.php" style="color: white">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php" style="color: yellow">About us</a>
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
                  <a class="nav-link" href="logout.php" style="color: white">Logout</a>
                </li>  
              <?php }?>
      
          </ul>     
        </div>
      </div>
    </nav>


    <img src="image/logo.jpg" class="img-rounded" alt="Cinque Terre">
  
  	<div class="main">
  	
  	Tattoo Heritage is a place where people come from various places to make tattoo and piercing their body. It is located at Thamel, Kathmandu. It was established on 6th Octobor, 2018.<br/>
  	There are 3 tattoo artist who make the tattoo. All the designs are drawn first before the tattoo is made. The design can be cultural, religious, creatures, flowers and much more which is selected by the customers.<br/>
  </div>
</body>
</html>