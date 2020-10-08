<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
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
		    .btn.btn-primary {     
		      padding: 14px 20px;
		      margin: 8px 0;
		      border: none;
		      cursor: pointer;
		      width: 30%;
		      margin-left: 10%;
		    }
		</style>

</head>
<body>	   
		<?php
				$b_id=$_GET['id'];
				
  if (!isset($_SESSION['user'])){ ?>
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
                <a class="nav-link" href="home.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">About us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="artist.php">Meet our artist</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="activity.php">Our activties</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contactph.php">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="signup.php">Signup</a>
              </li>  
              
      
          </ul>     
        </div>
      </div>
    </nav>


  <?php }
   else /*if (isset($_SESSION['user']))*/{?>

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
                <a class="nav-link" href="home.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">About us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="artist.php">Meet our artist</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="activity.php">Our activties</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contactph.php">Contact</a>
              </li>   
              <li class="nav-item">
                <a class="nav-link" href="booking.php" style="background-color: yellow">Booking</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
              </li>       
          </ul>     
        </div>
      </div>
    </nav>
  <?php } ?>

  <?php {
    if(isset($_SESSION['error'])){
    $err_msg = $_SESSION['error'];
  }

  if(!isset($_SESSION['user'])){
    echo "<div class=\"mt-3\"><h3 class='text-danger'>You will need to login to continue</h3></div>";
  }
  else{?>
    <