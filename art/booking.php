<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
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
		    .btn.btn-primary {     
		      padding: 14px 20px;
		      margin: 8px 0;
		      border: none;
		      cursor: pointer;
		      width: 10%;
		      margin-left: 3%;
		    }
        
		</style>
    <script type="text/javascript">
      

      function yesCheck() {
    if (document.getElementById('yesCh').checked) {
        document.getElementById('ifYes').style.display = 'block';
        document.getElementById('ifNo').style.display = 'none';
    }
    // else
    //   document.getElementById('ifYes').style.visibility = 'hidden';

    
  }
 
    function noCheck(){
      if (document.getElementById('noCh').checked) {
        document.getElementById('ifNo').style.display = 'block';
        document.getElementById('ifYes').style.display = 'none';
    }
    // else document.getElementById('ifNo').style.visibility = 'hidden';

    }
  
    

    </script>

</head>
<body>	
<?php 
$b_id=-1;
  if(isset($_GET['id'])){ 
    $b_id=$_GET['id']; 
  }
  ?>   			
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
                <a class="nav-link" href="booking.php"  style="color: yellow">Booking</a>
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

<div class='bg'>
  <?php 
	if(isset($_SESSION['error'])){
		$err_msg = $_SESSION['error'];
	}
	
	if(!isset($_SESSION['user'])){
		echo "<div class=\"mt-3\"><h3 class='text-danger'>You will need to login to continue</h3></div>";
		// include('includes/book1.php');
	}
	else{
echo "<div class=\"container\">\n";
if(isset($_SESSION['error'])){
echo "<h3 class=\" mt-5\">".$err_msg."</h3>";
}
if(isset($_SESSION['success'])){
//echo "<h3 class=\" mt-5\">".$success_msg."</h3>";
}
unset($_SESSION["error"]);
//echo "	<img style=\"width:500px;\" src=\"assets/img/table1.jpg\">\n";


/*echo "    		<div class=\"col-lg-3\"></div>\n";*/
echo "<a href='booktable.php'><button class='btn btn-primary' name='book table' style='float:right; background-color:green;'>Book table</button></a>";
echo "  <form action=\"finalbooking.php\" method=\"post\" enctype=\"multipart/form-data\">\n";
echo "    <div class=\"form-group input-group\">\n";
echo "        <span class=\"form-label\">Date</span>\n";
echo "        <input class=\"form-control\" type=\"date\" name=\"date\" required>\n";
echo "    </div>\n";
echo "\n";
echo "    <div class=\"form-group input-group\">\n";
echo "      <span class=\"form-label\">Design</span><br>\n";
echo "      <input type='radio' onclick=\"javascript:yesCheck();\" checked name='design' id=\"yesCh\" value=\"Existing design\">Existing design\n";
echo "      <input type='radio' onclick=\"javascript:noCheck();\"  name='design' id=\"noCh\" value=\"Upload design\">Upload design   \n";
        // 
echo "      <div id=\"ifYes\" style=\"display:block\">\n";
echo "        Design name: <input type='text' value='"; 
        if($b_id!=-1)
            echo ($b_id); 
echo "' id='yes' name='id'>\n";
echo "    </div> \n";
        // }
echo "    <div id=\"ifNo\" style=\"display:none\">\n";           
echo "        <input type='file' id='image' name='image'>\n";
echo "    </div>          \n";
echo "    </div>\n";

echo "    <div class=\"form-group input-group\">\n";
echo "      <span class=\"form-label\">Tattoo artist</span><br>\n";
echo "      <select class=\"form-control\" name=\"artist\">\n";
echo "        <option value=\"1\">Aviseq Shakya</option>\n";
echo "        <option value=\"2\">Bikki Deshar</option>\n";
echo "        <option value=\"3\">Rujen Shakya</option>\n";
echo "      </select>\n";
echo "                   \n";
echo "    </div>\n";
echo "        <div class=\"form-group\">\n";
echo "                      <span class=\"form-label\">Time</span>\n";
echo "                      <select class=\"form-control\" name=\"time\">\n";
echo "                        <option value=\"9\">9 AM</option>\n";                        
echo "                        <option value=\"10\">10 AM</option>\n";
echo "                        <option value=\"11\">11 AM</option>\n";
echo "                        <option value=\"12\">12 AM</option>\n";
echo "                        <option value=\"13\">1 PM</option>\n";
echo "                        <option value=\"14\">2 PM</option>\n";
echo "                        <option value=\"15\">3 PM</option>\n";
echo "                        <option value=\"16\">4 PM</option>\n";
echo "                        <option value=\"17\">5 PM</option>\n";
echo "                        <option value=\"18\">6 PM</option>\n";
echo "                        <option value=\"19\">7 PM</option>\n";
echo "                        <option value=\"20\">8 PM</option>\n";
echo "                      </select>\n";
echo "                      <span class=\"select-arrow\"></span>\n";
echo "                    </div>\n";   
echo " <div class=\"form-btn\">\n";
echo "   <button type=\"submit\" class=\"btn btn-primary \" name=\"Submit\" value=\"Book Now\" >Book Now</button>\n";
 echo " </div>\n";
 echo"  </form>\n";

echo "						</div>\n";
echo "            \n";
// include("booktable.php");

 }?>  
</div>
  </body>
  </html>




    <!-- // <div class="form-group input-group">
    //     <span class="form-label">Date</span>
    //     <input class="form-control" type="date" name="date" required>
    // </div>

    // <div class="form-group input-group">
    //   <span class="form-label">Design</span><br>
    //   <input type='radio' onclick="javascript:yesCheck();" name='design' id="yesCh" value="Existing design">Existing design
    //   <input type='radio' onclick="javascript:noCheck();" name='design' id="noCh" value="Upload design">Upload design   
    //   <div id="ifYes" style="visibility:hidden">
    //     Design name: <input type='text' id='yes' name='yes'>
    // </div> 
    // <div id="ifNo" style="visibility:hidden">
    //     Upload design: <input type='file' id='no' name='no'>
    // </div>          
    // </div>
    // <div class="form-group input-group">
    //   <span class="form-label">Tattoo artist</span><br>
    //   <select class="form-control" name="artist">
    //     <option value="1">Aviseq Shakya</option>
    //     <option value="2">Bikki Deshar</option>
    //     <option value="3">Rujen Shakya</option>
    //   </select>
                   
    // </div>  -->

    <!-- //  echo "              <form action=\"finalbooking.php?id=".$b_id."\" method=\"post\">\n";
// echo "                   <div class=\"form-group\">\n";
// echo "                     <span class=\"form-label\">Date</span>\n";
// echo "                     <input class=\"form-control\" type=\"date\" name=\"date\" required>\n";
// echo "                   </div>\n";
// echo "                   <div class=\"form-group\">\n";
// echo "                      <span class=\"form-label\">Design</span>\n";
// echo "                     <input type=\"radio\" name=\"design\">Existing design";
// echo "                      <input  type=\"radio\" name=\"design\" Checked>Upload design";
// echo "                  </div>\n";
              
// echo "               <div class=\"form-btn\">\n";
// echo "                 <button type=\"submit\" class=\"btn btn-primary \" name=\"Submit\" value=\"Book Now\" >Book Now</button>\n";
// echo "               </div>\n";
// echo "             </form>\n";
 -->