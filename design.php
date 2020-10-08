<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<?php
      $con=mysqli_connect("localhost","root","","tattoo_heritage");
      if(!$con)
      	die("Can't connect to the database");
    else
      $sql="SELECT d_name, d_photo, d_id FROM design";
      
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
	    .navbar-toggle{
	      background-color: white;
	    }
	    .thumbnail img{
	    	max-height: 300px;
	    	/*max-width: 600px;*/
	    }
      .insadm{
        margin-bottom: 100px;
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
                <a class="nav-link" href="design.php" style="color: yellow">Design</a>
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
      if(isset($_SESSION['admin'])){?>
        <div class="insadm">
        <a href='designform.php'>
          <!-- <div class="form-group"> -->
            <button class='btn btn-primary' name='buinsert' style='width: 100px; float:right; background-color:green;'>Insert</button>
          <!-- </div> -->
        </a>
      </div>
      <?php }?>
		<?php
			if ($result=mysqli_query($con,$sql)){ 
				while ($row=mysqli_fetch_row($result)){?>
					<div class="col-md-6 col-lg-4 col-sm-6">
						<div class="thumbnail">
              <?php
              if (!isset($_SESSION['user'])){ ?>
							     <a href="">
	          					<img src="<?=$row[1]?>">
	          					<div class="caption">
		            				<h4 align="center"><?= $row[0] ?></h4>		            				
	          					</div>
	        				 </a>
                <?php } else {?>
                    <a href="booking.php?id=<?=$row[2]?>">
                      <img src="<?=$row[1]?>">
                      <div class="caption">
                        <h4><?= $row[0] ?></h4>                       
                      </div>
                    </a>
              <?php }?>
						</div>
					</div>
				<?php }
	    		}?>


		</div>
	</div>

</body>
</html>