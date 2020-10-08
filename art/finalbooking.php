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
    // else{
    //   $query="SELECT e_id FROM tattoo_artist WHERE e_username='".$_SESSION['user']."'";
    // }
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)!=0){
      // if(isset($_SESSION['user'])){
        while($row=mysqli_fetch_assoc($result)){
          $c_id=$row["c_id"];
        }
      // }
      // else {
      //   while($row=mysqli_fetch_assoc($result)){
      //     $e_id=$row["e_id"];
      //   }
      // }
    }


    
      
    
    // https://www.youtube.com/watch?v=-tldcpFO6ds
    $id = $up = null;
    // $bid=$b_id;
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
          // echo "The file".basename($_FILES["image"]["name"])."has been uploaded";
          $image1 = basename($_FILES["image"]["name"]);
        }
        else{
          header("Location: booking.php");
          echo "Sorry there was an error uploading your file";
        }
      }
    }
    $valid=1;
    //echo "<script type='text/javascript'>confirm('".$date."');</script>";
    date_default_timezone_set("asia/kathmandu");
    $d=date('Y-m-d');

    // $checkquery = "SELECT * FROM books WHERE b_id='".$bid."'";

    $checkquery = "SELECT * FROM books WHERE b_date='".$date."' AND b_time='".$time."'";
    // $checkresult=mysqli_query($con,$checkquery);

    $checkresult=mysqli_query($con,$checkquery);
     if(mysqli_num_rows($checkresult)!=0){
      if(isset($_SESSION['user']))
    
        // $_SESSION['error']="Booking failed. Already booked on same day and time.";
         echo "Error";
        else
          echo "Successful";
     //        // $sql="INSERT INTO books(b_id,b_date,b_design,b_time,c_id,e_id) VALUES ('$b_id','$date','$design','$time','$c_id','$artist')";$sql="INSERT INTO books(b_id,b_date,b_design,b_time,c_id,e_id) VALUES ('$b_id','$date','$design','$time','$c_id','$artist')";
     //        // $conn=mysqli_connect("localhost","root","","tattoo_heritage");
     //        // if(mysqli_query($conn,$sql)){
     //        //   //echo "<script type='text/javascript'>confirm('Sucessfully Booked');</script>";
     //        //   $_SESSION['success']="Booking Successful";
     //        //   mysqli_close($conn);
              
            }
            



    // if(is_null($checkresult=mysqli_query($con,$checkquery))){
    //   while($row=mysqli_fetch_assoc($checkresult)){
    //    //echo "<script type='text/javascript'>confirm('".$date."".$row["book_date"]."');</script>";
    //     if($time == $row["b_time"] AND $date == $row["b_date"]){
    //       //echo "<script type='text/javascript'>confirm('already Booked');</script>";
    //       $_SESSION['error']="Booking failed. Already booked on same day and time.";
    //       include('booking.php');
    //       $valid= 0;
    //       break;
    //     }
    //     else if($d>$date){
    //       //echo "<script type='text/javascript'>confirm('cant Book on passed date');</script>";
    //       $_SESSION['error']="Booking failed. Can't book on passed date.";
    //       include('booking.php');
    //       $valid= 0;
    //       break;
    //     }

    //     else if($end<=$start){
    //       //echo "<script type='text/javascript'>confirm('ending time cant be less than start');</script>";
    //          $_SESSION['error']="Booking failed. Ending time cannot be less than starting time";
    //          include('booking.php');
    //          $valid= 0;
    //          break;
    //     // }
    //   }
    // }
    //   if($valid==1){
    //     mysqli_close($con);
    //       if(isset($_SESSION['user'])){

        if($id!=null){
            $sql="INSERT INTO books(b_date,d_id,b_time,c_id,e_id) VALUES ('$date','$id','$time','$c_id','$artist')";
          }
          else if($up!=null){
            echo "Insert";
            $sql="INSERT INTO books(b_date,b_design,b_time,c_id,e_id) VALUES ('$date','$up','$time','$c_id','$artist')";
          }
          if(mysqli_query($con,$sql)){
            echo "Insert created successfully";
          }
          else{
            echo "Error inserting data".mysqli_error($con);
          }
          mysqli_close($con);

    //       }'$b_id',
    //       // else{
    //       //   $sql="INSERT INTO book(a_id,t_id,book_date,start,end) VALUES ('$a_id','$t_id','$date','$start','$end')";
    //       // }
    //     $conn=mysqli_connect("localhost","root","","tattoo_heritage");
    //       if(mysqli_query($conn,$sql)){
    //         //echo "<script type='text/javascript'>confirm('Sucessfully Booked');</script>";
    //         $_SESSION['success']="Booking Successful";
    //         mysqli_close($conn);
    //         include('booktable.php');
    //       }
    //   }
      
?>