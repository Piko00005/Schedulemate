<?php
session_start();

include_once ('../Professor/db.php');

$subCode = "";
$subDesc = "";
$subUnits = 0;
$subLabhours = 0;
$subLechours = 0;
$subStatus = 0;
$subID = 0;
$sub_edit_state = false;

//saving records
if (isset($_POST['sub_add_new'])) {
    $subCode = $_POST['subCode'];
    $subDesc = $_POST['subDesc'];
    $subUnits = $_POST['subUnits'];
    $subLabhours = $_POST['subLabhours'];
    $subLechours = $_POST['subLechours'];
    $subStatus = $_POST['subStatus'] ? $_POST["subStatus"] : 1; // 1 as a default value or whatever suits your logic;

    $stmt = $conn->prepare("INSERT INTO tb_subjects (subCode, subDesc, subUnits, subLabhours, subLechours, subStatus) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $subCode, $subDesc, $subUnits, $subLabhours, $subLechours, $subStatus);
    $stmt->execute();

    if ($stmt) {
        $_SESSION['message'] = "Subject Information Saved Successfully";
        header("Location: subject_index.php");
    } else {
        echo "Error: ";
    }
    $stmt->close();
}

if (isset($_POST["sub_update"])) {
    $subCode = $_POST['subCode'];
    $subDesc = $_POST['subDesc'];
    $subUnits = $_POST['subUnits'];
    $subLabhours = $_POST['subLabhours'];
    $subLechours = $_POST['subLechours'];
    $subStatus = $_POST['subStatus'];
    $subID = $_POST['subID'];

    $stmt = $conn->prepare("UPDATE tb_subjects SET subCode=?, subDesc=?, subUnits=?, subLabhours=?, subLechours=?, subStatus=? WHERE subID=?");
    $stmt->bind_param("ssssssi", $subCode, $subDesc, $subUnits, $subLabhours, $subLechours, $subStatus, $subID);
    $stmt->execute();

    if ($stmt) {
        $_SESSION["message"] = "Information Updated Successfully";
        header('Location: subject_index.php');
    } else {
        echo "Error: ";
    }
    $stmt->close();
}

// Toggle Active and Inactive
if (isset($_POST['sub_toggle_status'])) {
    $subID = $_POST['subID'];

    $stmt = $conn->prepare("SELECT subStatus FROM tb_subjects WHERE subID=?");
    $stmt->bind_param("i", $subID);
    $stmt->execute();
    $stmt->bind_result($currentStatus);
    $stmt->fetch();
    $stmt->close();

    $newStatus = ($currentStatus == 1) ? 0 : 1;

    $stmt = $conn->prepare("UPDATE tb_subjects SET subStatus=? WHERE subID=?");
    $stmt->bind_param("ii", $newStatus, $subID);
    $stmt->execute();

    if ($stmt) {
        $_SESSION["message"] = "Status Updated Successfully";
        header('Location: subject_index.php');
    } else {
        echo "Error: ";
    }
    $stmt->close();
}
?>
