<?php
session_start();

include_once('../Professor/db.php');

$roomBuild = "";
$roomFloornum = 0;
$roomNum = "";
$roomStatus = 0;
$roomID = 0;
$room_edit_state = false;

//saving records
if (isset($_POST["room_add_new"])) {
    $roomBuild = $_POST["roomBuild"];
    $roomFloornum = $_POST["roomFloornum"];
    $roomNum = $_POST["roomNum"];
    $roomStatus = $_POST["roomStatus"] ? $_POST["roomStatus"] : 1; // 1 as a default value or whatever suits your logic;

    // Check for duplicate room, excluding the current one
    $stmt = $conn->prepare("SELECT COUNT(*) FROM tb_room WHERE roomBuild=? AND roomFloornum=? AND roomNum=? AND roomID != ?");
    $stmt->bind_param("sisi", $roomBuild, $roomFloornum, $roomNum, $roomID);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        $_SESSION['message'] = "Error: Another room with the same details exists";
        header("Location: room_index.php");
        exit;
    }

    //Add New Room for DATABASE
    $stmt = $conn->prepare("INSERT INTO tb_room (roomBuild, roomFloornum, roomNum, roomStatus) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siss", $roomBuild, $roomFloornum, $roomNum, $roomStatus);
    $stmt->execute();

    if ($stmt) {
        $_SESSION['message'] = "Room Details Saved Successfully";
        header("Location: room_index.php");
    } else {
        echo "Error: ";
    }
    $stmt->close();
}


// For updating records
if (isset($_POST["room_update"])) {
    $roomBuild = $_POST["roomBuild"];
    $roomFloornum = $_POST["roomFloornum"];
    $roomNum = $_POST["roomNum"];
    $roomStatus = $_POST["roomStatus"];
    $roomID = $_POST["roomID"];

    // echo"<pre>";
    // var_dump($_POST);
    // echo"</pre>";
    // die;

    $stmt = $conn->prepare("UPDATE tb_room SET roomBuild=?, roomFloornum=?, roomNum=?, roomStatus=? WHERE roomID=?");
    $stmt->bind_param("sisii", $roomBuild, $roomFloornum, $roomNum, $roomStatus, $roomID);
    $stmt->execute();

    // Retrieve current data
    $currentData = $conn->prepare("SELECT * FROM tb_room WHERE roomID=?");
    $currentData->bind_param("i", $roomID);
    $currentData->execute();
    $result = $currentData->get_result();
    $currentData->close();

    
    if ($stmt) {
        $_SESSION["message"] = "Information Updated Successfully";
        header('Location: /SCHEDULEMATE/Room/room_index.php');
    } else {
        die("Something went wrong");
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
