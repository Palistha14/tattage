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
      </style>

    </head>
    <body>


<?php
    $con=mysqli_connect("localhost","root","","tattoo_heritage");
    if(!$con)
      die("Can't connect to the database");
    if(isset($_SESSION['admin'])){
      $query="SELECT e_id FROM tattoo_artist WHERE e_username='".$_SESSION['admin']."'";
      }
      $result=mysqli_query($con,$query);
     if(mysqli_num_rows($result)!=0){
        while($row=mysqli_fetch_assoc($result)){
            $e_id=$row["e_id"];
          }
        }       
      
       if(isset($_SESSION['admin'])){
       
           $sql="SELECT * FROM design WHERE e_id='".$e_id."'";

          }
          $result1=mysqli_query($con,$sql);
echo " <div class=\"new\">";
echo " <div class=\"container\">\n";
echo "  <div class=\"row\">\n";
echo "    <div class=\"col-lg-2\"></div>\n";
echo "    <div class=\"col-lg-8\">\n";
echo "      <table class=\"table table-hover table-bordered\">\n";
echo "      <tr>\n";
echo "        <th>S.N.</th>\n";
echo "        <th>Name</th>\n";
echo "        <th>Photo</th>\n";
echo "        <th></th>\n";
echo "      </tr>\n";
     if(mysqli_num_rows($result1)!=0){
        while($row=mysqli_fetch_assoc($result1)){
          echo "      <tr>\n";
          echo "      <td> ". $row["d_id"]. "</td>\n";
          // $b_id1 = $row["b_id"];
          echo "      <td> ". $row["d_name"]. "</td>\n";
          echo "      <td> ". $row["d_photo"]. "</td>\n";
          echo "  <td align='center'><a href=\"designdelete.php?d_id=".$row["d_id"]."&n=".$row["d_name"]."&p=".$row["d_photo"]."\"><button class=\"btn btn-danger btn-sm\">Delete</button></a></td>";
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
</body>
</html>