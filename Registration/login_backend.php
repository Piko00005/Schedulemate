<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>


<?php 

        //login
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
           $errors = array();
           require_once dirname(__FILE__)."/database.php";
    

            $sql = "SELECT * FROM tb_register WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

           //restrication 
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    $_SESSION["user"] = "yes";
                    $_SESSION["success"] = 2;
                    header("Location: /Schedulemate/Dashboard/home.php");
                    
                    die();
                }else{
                    array_push($errors, "Password does not match");
                    $_SESSION["errors"] = $errors;
                    header("Location: /Schedulemate/Registration/register_html.php");
                }
            }else{
                array_push($errors, "Invalid email");
                $_SESSION["errors"] = $errors;
                header("Location: /SCHEDULEMATE/Registration/register_html.php");
            }
        }
        ?>
        