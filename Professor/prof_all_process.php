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

    // Validate required fields
    if (empty($profFname) || empty($profLname) || empty($profMobile)) {
        $_SESSION['message'] = "Error: Missing required fields";
        header("Location: /SCHEDULEMATE/Professor/prof_index.php");
        die();
    }

    // Check for duplicate entry 
    $stmt = $conn->prepare("SELECT COUNT(*) FROM tb_professor WHERE profFname=? AND profLname=? AND profMobile=?");
    $stmt->bind_param("sss", $profFname, $profLname, $profMobile);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        $_SESSION['message'] = "Error: Duplicate entry";
        header("Location: /SCHEDULEMATE/Professor/prof_index.php");
        die();
    }

     // Validate the mobile number format
    if (!preg_match('/^(?:\+639|09)\d{9}$/', $profMobile)) {
        $_SESSION['message'] = "Error: Invalid mobile number format. Use either '+639xxxxxxxxx' or '09xxxxxxxxx'.";
        header("Location: /SCHEDULEMATE/Professor/prof_index.php");
        die();
    }

    //Add the information to the Database
    $stmt = $conn->prepare("INSERT INTO tb_professor (profFname, profLname, profMobile, profAddress, profEduc, profExpert, profRank, profUnit, profEmployStatus, profStatus) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssss", $profFname, $profLname, $profMobile, $profAddress, $profEduc, $profExpert, $profRank, $profUnit, $profEmployStatus, $profStatus);
    $stmt->execute();

    if ($stmt) {
        $_SESSION['message'] = "Information Saved Successfully";
        header("Location: /SCHEDULEMATE/Professor/prof_index.php");
    } else {
        die("Something went wrong");
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

    // Fetch the current data from the database
    $currentDataQuery = "SELECT * FROM tb_professor WHERE profID = ?";
    $currentDataStmt = $conn->prepare($currentDataQuery);
    $currentDataStmt->bind_param("i", $profID);
    $currentDataStmt->execute();
    $currentDataResult = $currentDataStmt->get_result();
    $currentDataRow = $currentDataResult->fetch_assoc();

    // Compare each field to check for changes
    $fieldsToCheck = ["profFname", "profLname", "profMobile", "profAddress", "profEduc", "profExpert", "profRank", "profUnit", "profEmployStatus"];
    $changesDetected = false;

    foreach ($fieldsToCheck as $field) {
        if ($currentDataRow[$field] != $_POST[$field]) {
            $changesDetected = true;
            break;
        }
    }

    if (!$changesDetected) {
        // No changes detected
        $_SESSION["message"] = "No changes detected in the information.";
        header('Location: /SCHEDULEMATE/Professor/prof_index.php');
        exit;
    }

    // Proceed with the update
    $stmt = $conn->prepare("UPDATE tb_professor SET profFname=?, profLname=?, profMobile=?, profAddress=?, profEduc=?, profExpert=?, profRank=?, profUnit=?, profEmployStatus=?, profStatus=? WHERE profID=?");
    $stmt->bind_param("ssssssssssi", $profFname, $profLname, $profMobile, $profAddress, $profEduc, $profExpert, $profRank, $profUnit, $profEmployStatus, $profStatus, $profID);
    $stmt->execute();

    if ($stmt) {
        $_SESSION["message"] = "Information Updated Successfully";
        header('Location: /SCHEDULEMATE/Professor/prof_index.php');
    } else {
        // Handle the update error
        $_SESSION['error'] = "An error occurred while updating professor details.";
        header("Location: /SCHEDULEMATE/Professor/prof_index.php");
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
        header('Location: /SCHEDULEMATE/Professor/prof_index.php');
    } else {
        die("Something went wrong");
    }
    $stmt->close();
}
?>