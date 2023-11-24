<?php
session_start();

include_once('../Professor/db.php');

$roomBuild = "";
$roomNum = "";
$roomStatus = 0;
$roomID = 0;
$room_edit_state = false;

//saving records
if (isset($_POST['room_add_new'])) {
    $roomBuild = $_POST["roomBuild"];
    $roomNum = $_POST["roomNum"];
    $roomStatus = $_POST["roomStatus"] ? $_POST["roomStatus"] : 1; // 1 as a default value or whatever suits your logic;

    $stmt = $conn->prepare("INSERT INTO tb_room (roomBuild, roomNum, roomStatus) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $roomBuild, $roomNum, $roomStatus);
    $stmt->execute();

    if ($stmt) {
        $_SESSION['message'] = "Room Details Saved Successfully";
        header("Location: room_index.php");
    } else {
        echo "Error: ";
    }
    $stmt->close();
}


//For updating records
if (isset($_POST['room_update'])) {
    $roomBuild = $_POST["roomBuild"];
    $roomNum = $_POST["roomNum"];
    $roomStatus = $_POST["roomStatus"];
    $roomID = $_POST['roomID'];
    
    $stmt = $conn->prepare("UPDATE tb_room SET roomBuild=?, roomNum=?, roomStatus=? WHERE roomID=?");
    $stmt->bind_param("sssi", $roomBuild, $roomNum, $roomStatus, $roomID);
    $stmt->execute();

    if ($stmt) {
        $_SESSION["message"] = "Room Details Updated Successfully";
        header('Location: room_index.php');
    } else {
        echo "Error: ";
    }
    $stmt->close();
}

// Toggle Active and Inactive
if (isset($_POST['room_toggle_status'])) {
    $roomID = $_POST['roomID'];

    $stmt = $conn->prepare("SELECT roomStatus FROM tb_room WHERE roomID=?");
    $stmt->bind_param("i", $roomID);
    $stmt->execute();
    $stmt->bind_result($currentStatus);
    $stmt->fetch();
    $stmt->close();

    $newStatus = ($currentStatus == 1) ? 0 : 1;

    $stmt = $conn->prepare("UPDATE tb_room SET roomStatus=? WHERE roomID=?");
    $stmt->bind_param("ii", $newStatus, $roomID);
    $stmt->execute();

    if ($stmt) {
        $_SESSION["message"] = "Status Updated Successfully";
        header('Location: room_index.php');
    } else {
        echo "Error: ";
    }
    $stmt->close();
}
?>
