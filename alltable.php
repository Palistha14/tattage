<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<!DOCTYPE html>
<html>
<head>
	<title>All table</title>
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

<?php include('nav.php'); ?>

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
       $sql="SELECT * FROM books";
    }
        
      $result1=mysqli_query($con,$sql);
echo " <div class=\"new\">";
echo " <div class=\"container\">\n";
echo "  <div class=\"row\">\n";
echo "    <div class=\"col-lg-2\"></div>\n";
echo "    <div class=\"col-lg-8\">\n";
echo "      <div class=\"text-center mt-5\">\n";
echo "      <table class=\"table table-hover table-bordered\" >\n";
echo "      <tr>\n";
echo "        <th>S.N.</th>\n";
echo "        <th>Dates</th>\n";
echo "        <th>Design</th>\n";
echo "        <th>Design Id</th>\n";
echo "        <th>Artist</th>\n";
echo "        <th>Time</th>\n";
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