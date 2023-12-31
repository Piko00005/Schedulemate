<?php session_start();

if (isset($_POST["submit"])) {
    $fname = $_POST["userFname"];
    $lname = $_POST["userLname"];
    $email = $_POST["userEmail"];
    $school = $_POST["userSchool"];
    $position = $_POST["userPosition"];
    $dept = $_POST["userDept"];
    $prog = $_POST["userProgram"];
    $password = $_POST["userPass"];
    $passwordRepeat = $_POST["userPasscon"];

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $errors = array();

    //detect errors
    if (empty($fname) or empty($lname) or empty($email) or empty($school) or empty($position) or empty($dept) or empty($prog) or empty($school) or empty($password) or empty($passwordRepeat)) {
        array_push($errors, "All fields are required");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email is not valid");
    }
    if (strlen($password) < 8) {
        array_push($errors, "Password must be at least 8 charactes long");
    }
    if ($password !== $passwordRepeat) {
        array_push($errors, "Password does not match");
    }
    require_once dirname(__FILE__)."/database.php";
    
      //restrictations
    $sql = "SELECT * FROM tb_register WHERE userEmail = '$email'";
    $result = mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($result);
    
      
    if ($rowCount > 0) {
        array_push($errors, "Email already exists!");
    }
    if (count($errors) > 0) {
        $_SESSION['errors'] = $errors;
        print_r( $errors);
        header("Location: /SCHEDULEMATE/Registration/register_html.php");
    } else {

        //add user 
        $sql = "INSERT INTO tb_register (userFname, userLname, userEmail, userSchool, userPosition, userDept, userProgram, userPass) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
        if ($prepareStmt) {
            mysqli_stmt_bind_param($stmt, "ssssssss", $fname, $lname, $email, $school, $position, $dept, $prog, $passwordHash);
            mysqli_stmt_execute($stmt);
            $_SESSION["success"] = 1;
            header("Location: /SCHEDULEMATE/Registration/register_html.php");
        } else {
            die("Something went wrong");
        }
    }
}
