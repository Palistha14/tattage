<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
        // if (!isset($_SESSION['user']))
        //   include('home.php');
    } 
?>
<?php
      $con=mysqli_connect("localhost","root","","tattoo_heritage");
      if(!$con)
      	die("Can't connect to the database");
    else
      $sql="SELECT e_name, e_email, e_photo FROM tattoo_artist";
      
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tattoo heritage</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/homecss.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<style type="text/css">
		.artist{
			margin: 0 auto;
			width: 50%;
		}
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
                <a class="nav-link" href="about.php" style="color: white">About us</a>
              </li>
              

              <?php
              if (!isset($_SESSION['user']) && !isset($_SESSION['admin'])){ ?>
                <li class="nav-item">
                <a class="nav-link" href="artist.php" style="color: yellow">Meet our artist</a>
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

	<div class="container">
	  	<div class="row">
			<?php
			if ($result=mysqli_query($con,$sql)){ 
				while ($row=mysqli_fetch_row($result)){?>
	    		<div class="col-md-4">
	      			<div class="thumbnail">
	        			<a href="design.php">
	          				<img src="<?=$row[2]?>" style="width:100%">
	          				<div class="caption">
	            				<p><h4><?= $row[0] ?></h4>
	            					<h4><?= $row[1] ?></h4>
	            				</p>
	          				</div>
	        			</a>
	      			</div>
	    		</div>
	    	<?php }
	    	}?>
		</div>
	</div>
</body>
</html>