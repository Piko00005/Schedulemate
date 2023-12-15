<?php 
session_start();

        //login
        if (isset($_POST["login"])) {
           $email = $_POST["userEmail"];
           $password = $_POST["userPass"];
           $errors = array();
           require_once dirname(__FILE__)."/database.php";
    

            $sql = "SELECT * FROM tb_register WHERE userEmail = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

           //restriction 
            if ($user) {
                if (password_verify($password, $user["userPass"])) {
                    $_SESSION["user"] = "yes";
                    $_SESSION["success"] = 2;
                    if($_SESSION['userPosition'] === 'Dean')
                    {
                        header("Location: /Schedulemate/PBS/pbs.php");
                    }
                    else{
                        
                        header("Location: /Schedulemate/Dashboard/home.php");
                    }
                    
                    die();
                }else{
                    array_push($errors, "Password does not match");
                    $_SESSION["errors"] = $errors;
                    header("Location: /Schedulemate/Registration/register_html.php");
                }
            }else{
                array_push($errors, "Invalid email");
                $_SESSION["errors"] = $errors;
                header("Location: /Schedulemate/Registration/register_html.php");
            }
        }
?>
