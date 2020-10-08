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

<?php include('nav.php'); ?>
    <h3>Design</h3>
    <div class="container">
      <form method="post" action="designinsert.php">
        <div class="form-group">
          <input type="name" class="form-control" placeholder="Enter name" name="name">
        </div>
        <div class="form-group">
          <input type="file" class="form-control" placeholder="Enter image" name="image">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="insert">Insert</button>
        </div>
      </form>
    </div>
</body>
</html>