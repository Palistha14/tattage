<?php
	session_start();
?>
<!DOCTYPE html>
<?php
	$email= $textar= "";
	$msg = "";
	if(isset($_POST['Submit'])){
		$default = $_POST;
    	$email=$_POST['email'];
    	$textar=$_POST['textar'];

		$con=mysqli_connect("localhost","root","","tattoo_heritage");
		if(!$con)
			die("Can't connect to the database");
		else{
			$sql="INSERT INTO feedback(f_email,f_message) VALUES('$email','$textar')";
			if(mysqli_query($con,$sql)){
				$msg = "Sucessful";
			}
			else{
				$msg =  "Error!".mysqli_error($con);
			}
			mysqli_close($con);
		}
	}
?>


<html>
<head>
	<title>Tattoo heritage</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="contact.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="css/homecss.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		.navbar-toggle{
	      background-color: white;
	    }
	    #map{
	    	margin-left: 40%;
	    	margin-top: -23%;
	    }
	    .fa {
		  padding: 20px;
		  font-size: 30px;
		  width: 70px;
		  text-align: center;
		  text-decoration: none;
		  border-radius: 50%;
		}
		.fa:hover {
		    opacity: 0.7;
		}
		.fa-facebook {
		  background: #3B5998;
		  color: white;
		}
		.fa-instagram {
		  background: #125688;
		  color: white;
		}
		.fa-youtube {
		  background: #bb0000;
		  color: white;
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
                <a class="nav-link" href="artist.php" style="color: white">Meet our artist</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="activity.php" style="color: white">Our activties</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contactph.php" style="color: yellow">Contact</a>
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
                  <a class="nav-link" href="contactph.php" style="color: yellow">Contact</a>
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

<div class="container contact">
	<form method="post" action="<?=$_SERVER['PHP_SELF'];?>" name="theForm1" onsubmit="return validateForm(this)">
		<div class="form-group">
			<label for="exampleInputEmail1">Email address</label>
			<input type="email" class="form-control" value="<?=$email;?>" placeholder="Enter email" name="email">
			<div class="error" id="emailErr"></div>
		</div>
		<div class="md-form">
			<label for="form7" style="margin-left: 35px;">Message</label>
			<textarea id="form7" class="md-textarea form-control" rows="3" name="textar" placeholder="Message"></textarea>
			<div class="error" id="msgErr"></div>		
		</div>
		<div class="form-group">
              <button type="submit" class="btn btn-primary" name="Submit">Submit</button>
        </div>
	</form>
	<?=$msg?>

	
	<!-- </div> -->

	<div id="map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14128.502640650671!2d85.311155!3d27.7134062!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x567fd473e0015a00!2sTattoo+Heritage!5e0!3m2!1sen!2snp!4v1562481109013!5m2!1sen!2snp" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
</div>
	<!-- <div id="map"></div>
	<script type="text/javascript">
		function initMap(){
			var location = {lat: 27.712020, lng: 85.312950};
			var map = new google.maps.Map(document.getElementById("map"),{
				zoom: 4,
				center: location
			});
		}
	</script> -->
	<?php include('footer.php'); ?>
</body>
</html>