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
    $b_id=$_GET['b_id'];
    $b_date=$_GET['d'];
    $b_design=$_GET['e'];
    $d_id=$_GET['d_id'];
    $e_id=$_GET['e_id'];
    $b_time=$_GET['t'];

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
       	$sql = "DELETE FROM books WHERE c_id='".$c_id."' AND b_id='".$b_id."' AND b_date='".$b_date."' AND b_design='".$b_design."' AND d_id='".$d_id."' AND e_id='".$e_id."' AND b_time='".$b_time."'";
    }
    //$conn=mysqli_connect("localhost","root","","tattoo_heritage");
    if(mysqli_query($con,$sql)){
        //echo "<script type='text/javascript'>confirm('Sucessfully cancled');</script>";
        $_SESSION['success']="Booking cancelled.";
        //mysqli_close($conn);
        include('booktable.php');
    }
          else
          echo "".mysqli_error($con);
      