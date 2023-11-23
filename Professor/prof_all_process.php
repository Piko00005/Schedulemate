<?php
session_start();

// Include the database connection file
include_once 'db.php';  // Please check the filename, it might be 'db.php'?

$profFname = "";
$profLname = "";
$profMobile = "";
$profAddress = "";
$profEduc = "";
$profExpert = "";
$profRank = "";
$profUnit = "";
$profEmployStatus = "";
$profStatus = 0;
$profID = 0;
$prof_edit_state = false;

// Saving records
if (isset($_POST["prof_add_new"])) {
    $profFname = $_POST["profFname"];
    $profLname = $_POST["profLname"];
    $profMobile = $_POST["profMobile"];
    $profAddress = $_POST["profAddress"];
    $profEduc = $_POST["profEduc"];
    $profExpert = $_POST["profExpert"];
    $profRank = $_POST["profRank"];
    $profUnit = $_POST["profUnit"];
    $profEmployStatus = $_POST["profEmployStatus"];
    $profStatus = $_POST["profStatus"]? $_POST["profStatus"] : 1; // 1 as a default value or whatever suits your logic

    $stmt = $conn->prepare("INSERT INTO tb_professor (profFname, profLname, profMobile, profAddress, profEduc, profExpert, profRank, profUnit, profEmployStatus, profStatus) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssss", $profFname, $profLname, $profMobile, $profAddress, $profEduc, $profExpert, $profRank, $profUnit, $profEmployStatus, $profStatus);
    $stmt->execute();

    if ($stmt) {
        $_SESSION['message'] = "Information Saved Successfully";
        header("Location:prof_index.php");
    } else {
        echo "Error: ";
    }
    $stmt->close();
}

// For updating records
if (isset($_POST["prof_update"])) {
    $profFname = $_POST["profFname"];
    $profLname = $_POST["profLname"];
    $profMobile = $_POST["profMobile"];
    $profAddress = $_POST["profAddress"];
    $profEduc = $_POST["profEduc"];
    $profExpert = $_POST["profExpert"];
    $profRank = $_POST["profRank"];
    $profUnit = $_POST["profUnit"];
    $profEmployStatus = $_POST["profEmployStatus"];
    $profStatus = $_POST["profStatus"];
    $profID = $_POST["profID"];
    $stmt = $conn->prepare("UPDATE tb_professor SET profFname=?, profLname=?, profMobile=?, profAddress=?, profEduc=?, profExpert=?, profRank=?, profUnit=?, profEmployStatus=?, profStatus=? WHERE profID=?");
    $stmt->bind_param("ssssssssssi", $profFname, $profLname, $profMobile, $profAddress, $profEduc, $profExpert, $profRank, $profUnit, $profEmployStatus, $profStatus, $profID);
    $stmt->execute();

    if ($stmt) {
        $_SESSION["message"] = "Information Updated Successfully";
        header('Location: prof_index.php');
    } else {
        echo "Error: ";
    }
    $stmt->close();
}

// Toggle Active and Inactive
if (isset($_POST['prof_toggle_status'])) {
    $profID = $_POST['profID'];

    $stmt = $conn->prepare("SELECT profStatus FROM tb_professor WHERE profID=?");
    $stmt->bind_param("i", $profID);
    $stmt->execute();
    $stmt->bind_result($currentStatus);
    $stmt->fetch();
    $stmt->close();

    $newStatus = ($currentStatus == 1) ? 0 : 1;

    $stmt = $conn->prepare("UPDATE tb_professor SET profStatus=? WHERE profID=?");
    $stmt->bind_param("ii", $newStatus, $profID);
    $stmt->execute();

    if ($stmt) {
        $_SESSION["message"] = "Status Updated Successfully";
        header('Location: prof_index.php');
    } else {
        echo "Error: ";
    }
    $stmt->close();
}
?>