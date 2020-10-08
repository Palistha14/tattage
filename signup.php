<?php
  session_start();
?>
<!DOCTYPE html>
<?php
	$fname = $lname = $age= $add = $phone = $gender = $email = $user = $p1 = "";
	$unameErr = $emailErr = $msg = "";
	if(isset($_POST['Submit'])){
		$default = $_POST;
		$fname=$_POST['fname'];
    	$lname=$_POST['lname'];
    	$age=$_POST['age'];
    	$add=$_POST['add'];
    	$phone=$_POST['phone'];
    	$gender=$_POST['gender'];
    	$email=$_POST['email'];
    	$user=$_POST['user'];
    	$p1=$_POST['p1'];

		$con=mysqli_connect("localhost","root","","tattoo_heritage");
		if(!$con)
			die("Can't connect to the database");
		$sql1="SELECT * FROM customer WHERE c_username='$user'";
		$sql2="SELECT * FROM customer WHERE c_email='$email'";
		if(mysqli_num_rows(mysqli_query($con,$sql1))>0){
			$unameErr="Sorry! username already exists";
		}
		else if (mysqli_num_rows(mysqli_query($con,$sql2))>0) {
			$emailErr="Sorry! email already exists";
		}
		else{
			$sql="INSERT INTO customer(c_fname,c_lname,c_age,c_address,c_phone,c_gender,c_email,
			c_username,c_password)VALUES('$fname','$lname','$age','$add','$phone','$gender','$email',
			'$user','$p1')";

			if(mysqli_query($con,$sql)){				
				
				$msg = "Sucessfully created an account";
				header("Location: login.php");
			}
			else{
				$msg = "Error!".mysqli_error($con);
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
		<link rel="stylesheet" type="text/css" href="css/homecss.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<script src="sign.js" type="text/javascript"></script>
		
		<style type="text/css">
			.navbar-toggle{
		        background-color: white;
		      }
		      body{
		      	background-color: #f7f5f5;
		      }

		    .error{
		    	color: red;		    	
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
                  <a class="nav-link" href="signup.php" style="color: yellow">Signup</a>
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

<?php
  if (!isset($_SESSION['user']) && !isset($_SESSION['admin'])){ ?>

		<div class="sign">
		  	<form method ='post' action="<?=$_SERVER['PHP_SELF'];?>" name="theForm" onsubmit="return validateForm(this)">
			    <h3>Sign up</h3>
			  	<div class="form-group input-group">
			      <input value="<?=$fname;?>" name="fname" class="form-control" placeholder="First name" type="text" autofocus>
			      <!-- <label id="fnameErr"></label> -->
			      <div class="error" id="fnameErr"></div>
			    </div> 

			    <div class="form-group input-group">
			        <input value="<?=$lname;?>" name="lname" class="form-control" placeholder="Last name" type="text">
			        <div class="error" id="lnameErr"></div>
			    </div>

			    <div class="form-group input-group">
			        <input value="<?=$age;?>" name="age" class="form-control" placeholder="Age" type="number">
			        <div class="error" id="ageErr"></div>
			    </div> 

			    <div class="form-group input-group">
			        <input value="<?=$add;?>" name="add" class="form-control" placeholder="Address" type="text">
			        <div class="error" id="addErr"></div>
			    </div>

			    <div class="form-group input-group">
			        <input value="<?=$phone;?>" name="phone" class="form-control" placeholder="Phone number" type="number">
			        <div class="error" id="numErr"></div>
			    </div>

			    <div class="form-group input-group">
			        <input type='radio' name='gender' value="Male">Male
			        <input type='radio' name='gender' value="Female" style="margin-left:50px;" checked>Female
			        
			    </div>

			    <div class="form-group input-group">
			        <input value="<?=$email;?>" name="email" class="form-control" placeholder="Email address" type="email"><!-- <?=$emailErr;?> -->
			        <div class="error" id="emailErr"><?=$emailErr;?></div>
			    </div>

			    <div class="form-group input-group">
			        <input value="<?=$user;?>" name="user" class="form-control" placeholder="Username" type="text">
			        <!-- <?=$unameErr;?> -->
			        <div class="error" id="userErr"><?=$unameErr;?></div>
			    </div>    
			    
			    <div class="form-group input-group">
			        <input value="<?=$p1;?>" name="p1" class="form-control" placeholder="Create Password" type="Password">
			        <div class="error" id="passErr"></div>
			    </div>

			    <div class="form-group input-group">
			        <input name="p2" class="form-control" placeholder="Confirm Password" type="Password">
			    </div> 
			                          
			    <div class="form-group">
			        <button type="submit" name="Submit" class="btn btn-primary"> Create Account </button>
			        <button type="reset" name="abort" class="btn btn-primary"> Reset </button>
			    </div>

	
			   <!--  <?=$msg;?>  -->
		  </form>
		</div>
	<?php 
	} 
	else{
	  include('home.php');
	}?>

	</body>
</html>
