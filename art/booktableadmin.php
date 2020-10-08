<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Booking table</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="contact.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="css/homecss.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <style type="text/css">
    .new{
      float: right;
      margin-top: 20px;
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
                <a class="nav-link" href="home.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">About us</a>
              </li>
              

              <?php
              if (!isset($_SESSION['user'])){ ?>
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
              <?php } else{?>
                <li class="nav-item">
                  <a class="nav-link" href="design.php">Design</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="activity.php">Our activties</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contactph.php">Contact</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="booking.php">Booking</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href=""><?=$_SESSION["user"]?></a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link" href="logout.php">Logout</a>
                </li>  
              <?php }?>
      
          </ul>     
        </div>
      </div>
    </nav>


  	<div id="container">
  		<!-- <?php
      // if(!isset($_SESSION['user']) && !isset($_SESSION['admin'])){
      //   $page='nav';
      //     header('Location: index.php');
      // }
      // else{
      //   include('includes/nav.php');
      // }
      // if(isset($_SESSION['success'])){
      //     $success_msg = $_SESSION['success'];
      //   }

     ?> -->
     <?php
  $con=mysqli_connect("localhost","root","","tattoo_heritage");
    if(!$con)
      die("Can't connect to the database");
    if(isset($_SESSION['user'])){
      $query="SELECT c_id FROM customer WHERE c_username='".$_SESSION['user']."'";
      }

    
    $result=mysqli_query($con,$query);
     if(mysqli_num_rows($result)!=0){
        while($row=mysqli_fetch_assoc($result)){
            $c_id=$row["c_id"];
          }
        }       
      
       if(isset($_SESSION['user'])){
       
           $sql="SELECT * FROM books WHERE c_id='".$c_id."'";

          }
        
      $result1=mysqli_query($con,$sql);
echo " <div class=\"new\">";
echo " <div class=\"container\">\n";
echo "  <div class=\"row\">\n";
echo "    <div class=\"col-lg-2\"></div>\n";
echo "    <div class=\"col-lg-8\">\n";
echo "      <div class=\"text-center mt-5\">\n";
if(isset($_SESSION['success'])){
echo "<h3 class=\" mt-5\">".$_SESSION['success']."</h3>";
}
unset($_SESSION["success"]);
// echo "      <h1  class=\"font  ml-5\">My Bookings</h1>\n";
echo "      <table class=\"table table-hover table-bordered\">\n";
echo "      <tr>\n";
echo "        <th>Table No</th>\n";
echo "        <th>Dates</th>\n";
echo "        <th>Design</th>\n";
echo "        <th>Design Id</th>\n";
echo "        <th>Artist</th>\n";
echo "        <th>Time</th>\n";
echo "        <th></th>\n";
echo "      </tr>\n";
     if(mysqli_num_rows($result1)!=0){
        while($row=mysqli_fetch_assoc($result1)){
          echo "      <tr>\n";
          echo "      <td> ". $row["b_id"]. "</td>\n";
          $b_id1 = $row["b_id"];
          echo "      <td> ". $row["b_date"]. "</td>\n";
          echo "      <td> ". $row["b_design"]. "</td>\n";
          echo "      <td> ". $row["d_id"]. "</td>\n";
          echo "      <td> ". $row["e_id"]. "</td>\n";
          echo "      <td> ". $row["b_time"]. "</td>\n";
          echo "  <td><a href=\"cancelbooking.php?b_id=".$row["b_id"]."&d=".$row["b_date"]."&e=".$row["b_design"]."&d_id=".$row["d_id"]."&e_id=".$row["e_id"]."&t=".$row["b_time"]."&t=".$row["b_time"]."\"".$b_id1."><button class=\"btn btn-danger btn-sm\">Cancel Now</button></a></td>";
          echo "      </tr>\n";
        
        }
      }
       else
        echo "".mysqli_error($con);
    echo "</table>\n";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
   mysqli_close($con);
    
    ?>
</div>    
</body>
</html>