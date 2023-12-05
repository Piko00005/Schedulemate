<?php
   session_start();
   if(isset($_SESSION['user'])){
    session_destroy();
    echo '<script>alert("You have been successfully logged out.");</script>';
    header("Location: /SCHEDULEMATE/Registration/register_html.php");
    exit(); 
   }
   else{
    echo '<script>alert("You have been successfully logged out.");</script>';
    header("Location: /SCHEDULEMATE/Dashboard/home.php");
   }

?>





