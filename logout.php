<!-- <?php
	// session_start();
	// session_destroy();
	// header('location:home.php');

?> -->
<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<?php
	session_destroy();
	header('location:home.php');
?>