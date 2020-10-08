<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<!DOCTYPE html>
<html>
<head>
  <!-- <link rel="stylesheet" type="text/css" href="css\login.css"> -->
  <title>Tattoo heritage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/homecss.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->
  <style type="text/css">
    .navbar-toggle{
        background-color: white;
      }
       body{
            background-color: #f7f5f5;
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
              if (!isset($_SESSION['user']) || !isset($_SESSION['admin'])){ ?>
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
                  <a class="nav-link" href="login.php" style="color: yellow">Login</a>
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


  <div class= "log">
    <?php 
      if(!isset($_SESSION['user'])  && !isset($_SESSION['admin'])){?> 
      <h3>Login</h3>

      <form method="post" action="logindb.php">
        <div class="text-danger">
            <?php if(isset($_GET['msg']))
                 echo "<p class='error'>".$_GET['msg']."</p>";
                 echo "      \n";
            ?>
      </div>
          <div class="form-group">
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username" name="username" autofocus>
          </div>
          <div class="form-group">
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
          </div>
          <div class="form-group">
              <input type='radio' name='user_type' value="user" checked>User
              <input type='radio' name='user_type' value="admin" style="margin-left:50px;">Admin             
          </div>
          <div class="form-group">
              <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          
      </form>
      

    <?php 
    }else{
      header('Location: home.php');
      }
        ?> 
  </div>


</body>
</html>