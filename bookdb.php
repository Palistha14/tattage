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
      $query="SELECT c_id FROM customer WHERE c_username='".$_SESSION['user']."'";
    }

    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)!=0){
        while($row=mysqli_fetch_assoc($result)){
          $c_id=$row["c_id"];
        }
    }

    // $id = $up = null;
    // $bid=$b_id;
    // $date=$_POST['date'];
    // $design=$_POST['design'];
    // $artist=$_POST['artist'];
    // $time=$_POST['time'];

    if($id!=null){
        $sql="INSERT INTO books(b_date,d_id,b_time,c_id,e_id) VALUES ('$date','$id','$time','$c_id','$artist')";
    }
    else if($up!=null){
      $sql="INSERT INTO books(b_date,b_design,b_time,c_id,e_id) VALUES ('$date','$up','$time','$c_id','$artist')";
    }
    if(mysqli_query($con,$sql)){
        echo "Insert created successfully";
    }
    else{
        echo "Error inserting data".mysqli_error($con);
    }
    mysqli_close($con);
?>