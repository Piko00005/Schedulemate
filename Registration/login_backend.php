<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: register_html.php");
}
?>


<?php 

        //login
        if (isset($_POST["login"])) {
           $email = $_POST["userEmail"];
           $password = $_POST["userPass"];
           $errors = array();
           require_once dirname(__FILE__)."/database.php";
    

            $sql = "SELECT * FROM tb_reg WHERE userEmail = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

           //restrication 
            if ($user) {
                if (password_verify($password, $user["userPass"])) {
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
        