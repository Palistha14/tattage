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


    $id = $up = null;
    $date=$_POST['date'];
    $design=$_POST['design'];
    $artist=$_POST['artist'];
    $time=$_POST['time'];
   

    if($design=="Existing design"){
      $id=$_POST['id'];
    }
    else if($design=="Upload design"){
      $image = $_POST['image'];
      $target_dir="uploads/";
      $target_file=$target_dir.basename($_FILES["image"]["name"]);
      $uploadOk=1;
      $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
      if(file_exists($target_file)){
        echo "Sorry file already exists";
        $uploadOk=0;
      }
      if($_FILES["image"]["size"]>1050000){
        echo "Sorry your file is too large";
        $uploadOk=0;
      }
      if($imageFileType!="jpg"&&$imageFileType!="png"&&$imageFileType!="jpeg"&&$imageFileType!="gif"){
        echo "Sorry only JPG,JPEG,PNG and GIF files are allowed";
        $uploadOk=0;
      }
      if($uploadOk==0){
        echo "Sorry your file was not uploaded";
      }
      else{
        if(move_uploaded_file($_FILES["image"]["tmp_name"],$target_file)){
          $image = basename($_FILES["image"]["name"]);
        }
        else{
          header("Location: booking.php");
          echo "Sorry there was an error uploading your file";
        }
      }
    }
    $valid=1;
    date_default_timezone_set("asia/kathmandu");
    $d=date('Y-m-d');

    $checkquery = "SELECT * FROM books WHERE b_date='".$date."' AND b_time='".$time."'";
    $checkresult=mysqli_query($con,$checkquery);
     if(mysqli_num_rows($checkresult)!=0){
      while($row=mysqli_fetch_assoc($checkresult)){
        if($time == $row["b_time"] AND $date == $row["b_date"]){      
          $_SESSION['error']="Booking failed. Already booked on same day and time.";
          include('booking.php');
          $valid=0;
          break;
      }
      else if($d>$date){
          $_SESSION['error']="Booking failed. Can't book on passed date.";
          include('booking.php');
          $valid=0;
          break;
        }
      }
    }

      if($valid==1){
          if(isset($_SESSION['user'])){

        if($id!=null){
            $sql="INSERT INTO books(b_date,d_id,b_time,c_id,e_id) VALUES ('$date','$id','$time','$c_id','$artist')";
          }
          else if($image!=null){
            $sql="INSERT INTO books(b_date,b_design,b_time,c_id,e_id) VALUES ('$date','$image','$time','$c_id','$artist')";
          }
          if(mysqli_query($con,$sql)){
            $_SESSION['success']="Booking Successful";
            mysqli_close($con);
            include('booktable.php');
          }           
        }
      }
?>