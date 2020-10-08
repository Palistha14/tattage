<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<?php
	$user=$_POST['username'];
	$pass=$_POST['password'];
	$user_type = $_POST['user_type'];
	$con=mysqli_connect("localhost","root","","tattoo_heritage");
	if(!$con){
		die("Connection failed");
	}
	if($user_type=="user"){
		$query="SELECT * FROM customer WHERE c_username='".$user."' AND c_password='".$pass."' ";
	}
	else{
		$query="SELECT * FROM tattoo_artist WHERE e_username='".$user."' AND e_password='".$pass."' ";
	}
	$result=mysqli_query($con,$query);
	// $result1=mysqli_query($con,$query1);
	if(mysqli_num_rows($result)!=0){
		while($row = $result->fetch_assoc()) {
		}
		if($user_type=="admin"){
			$_SESSION['admin']=$user;
		}
		else{
			$_SESSION['user']=$user;
		}
		if($user_type=="admin"){
			header('location:booking.php');
			exit();
		}
		else if($user_type == "user"){
			header('location:design.php');
			exit();
		}
	}
	else{
		$msg="Username or password are incorrect.";
		header("location:login.php?msg=$msg");
	}
	
	mysqli_close($con);
?>