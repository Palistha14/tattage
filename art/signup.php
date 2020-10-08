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
		elseif (mysqli_num_rows(mysqli_query($con,$sql2))>0) {
			$emailErr="Sorry! email already exists";
		}
		else{
			$sql="INSERT INTO customer(c_fname,c_lname,c_age,c_address,c_phone,c_gender,c_email,
			c_username,c_password)VALUES('$fname','$lname','$age','$add','$phone','$gender','$email',
			'$user','$p1')";

			if(mysqli_query($con,$sql)){
				echo "Sucessfully created an account";
			}
			else{
				echo "Error!".mysqli_error($con);
			}
			mysqli_close($con);
		}
	}
?>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/homecss.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<script src="sign.js" type="text/javascript"></script>
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
			        </ul>     
		      	</div>
	    	</div>
  		</nav>

		<div class="log">
		<table >	                        
			<form method ='post' action="<?=$_SERVER['PHP_SELF'];?>" name="theForm" onsubmit="return validateForm(this)">
				<h3>Sign up</h3>

				<tr>				
					<td>First Name:</td>
					<td><input type='text' name='fname' placeholder="First name" value="<?=$fname;?>"></td>
					<td class="error" id="fnameErr"></td>
				</tr>								
				<tr>
					<td>Last Name:</td>
					<td><input type='text' name='lname' placeholder="Last name"value="<?=$lname;?>"></td>
					<td class="error" id="lnameErr"></td>
				</tr>
				<tr>					
					<td>Age:</td>
					<td><input type='number' name='age' placeholder="Age" value="<?=$age;?>"></td>
					<td class="error" id="ageErr"></td>
				</tr>									
				<tr>					
					<td>Address:</td>
					<td><input type='text' name='add' placeholder="Address" value="<?=$add;?>"></td>
					<td class="error" id="addErr"></td>
				</tr>
				<tr>
					<td>Phone:</td>
					<td><input type='number' name='phone'placeholder="Phone" value="<?=$phone;?>"></td>
					<td class="error" id="numErr"></td>
				</tr>
				<tr>			
					<td>Gender:</td>
					<td><input type='radio' name='gender' value="male" checked>Male
					<input type='radio' name='gender' value="female">Female</td>					
				</tr>
				<tr>									
					<td>Email:</td>
					<td><input type='text' name='email'  placeholder="Email" value="<?=$email;?>"></td>
					<td class="error" id="emailErr"><?=$emailErr;?></td>
				</tr>
				<tr>	
					<td>Username:</td>
					<td><input type='text' name='user' placeholder="Username" value="<?=$user;?>"></td>
					<td class="error" id="userErr"><?=$unameErr;?></td>
				</tr>
				<tr>
										
					<td>Password:</td>
					<td><input type='Password' name='p1' placeholder="Enter Password"  value="<?=$p1;?>"></td>
					<td class="error" id="passErr"></td>
				</tr>
				<tr>
					<td>Confirm Password:</td>
					<td><input type='Password' name='p2' placeholder="Confirm Password" ></td>
				</tr>
				<tr>
					<td colspan="2"><p><br/>By creating an account<br/> you agree to our <a href="#" style="font-size: 17px">Terms & Policy</a>.</p></td>
				</tr>
				<tr>
					<td><input type="reset" value="Clear"></td>
					<td><input type="submit" value="SignUp"></td>
				</tr>
		 	</form>
		</table>
		<?=$msg;?>
		</div>
	</body>
</html>
