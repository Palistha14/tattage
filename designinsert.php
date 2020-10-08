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
        header("Location: designform.php");
        echo "Sorry there was an error uploading your file";
      }
    }
    if(isset($_SESSION['admin'])){
      $sql="INSERT INTO design(d_name,d_photo,e_id) VALUES ('$name','$image','$e_id')";
    }
    if(mysqli_query($con,$sql)){
      mysqli_close($con);
      include('design.php');
    }
?>



