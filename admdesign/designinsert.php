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

    
    if(isset($_SESSION['user'])){
      $query="SELECT e_id FROM tattoo_artist WHERE e_username='".$_SESSION['admin']."'";
    }

    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)!=0){
        while($row=mysqli_fetch_assoc($result)){
          $e_id=$row["e_id"];
        }
    }
    $name=$_POST['name'];
    $image=$_POST['image'];
    if(isset($_SESSION['admin'])){
      $sql="INSERT INTO design(d_name,d_photo,e_id) VALUES ('$name','$image','$e_id')";
    }
      if(mysqli_query($con,$sql)){
        mysqli_close($con);
        include('design.php');
      }
?>

