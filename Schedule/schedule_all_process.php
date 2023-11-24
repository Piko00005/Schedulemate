<?php
//session_start();

include_once('../Professor/db.php');
include_once ('../Subject/subject_all_process.php');

$plotSubj = "";
$plotSection = "";
$plotRoom= "";
$plotProf ="";
$plotWeek = "";
$plotTimeStart = 0;
$plotTimeEnd = 0;
$plotID = 0;
$sched_edit_state = false;

//saving records
if (isset($_POST['sched_add_new'])) {

    // echo"<pre>";
    // var_dump($_POST);
    // echo"</pre>";
    // die;
    $plotSubj = $_POST["plotSubj"];
    $plotSection = $_POST["plotSection"];
    $plotRoom = $_POST["plotRoom"];
    $plotProf = $_POST["plotProf"];
    $plotWeek  = $_POST["plotWeek"];
    $plotTimeStart  = $_POST["plotTimeStart"];
    $plotTimeEnd = $_POST["plotTimeEnd"];
    
    $stmt = $conn->prepare("INSERT INTO tb_plotting (plotSubj, plotSection, plotRoom, plotProf, plotWeek, plotTimeStart, plotTimeEnd) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $plotSubj, $plotSection, $plotRoom, $plotProf, $plotWeek, $plotTimeStart , $plotTimeEnd);
    $stmt->execute();

    if ($stmt) {
        $_SESSION['message'] = "Schedule Details Saved Successfully";
        header("Location: schedule_index.php");
    } else {
        echo "Error: ";
    }
    $stmt->close();
}

//For updating records
if (isset($_POST['sched_update'])) {
    $plotSubj = $_POST["plotSubj"];
    $plotSection = $_POST["plotSection"];
    $plotRoom = $_POST["plotRoom"];
    $plotProf = $_POST["plotProf"];
    $plotWeek  = $_POST["plotWeek"];
    $plotTimeStart  = $_POST["plotTimeStart"];
    $plotTimeEnd = $_POST["plotTimeEnd"];
    $plotID = $_POST['plotID'];
    
    $stmt = $conn->prepare("UPDATE tb_plotting SET plotSubj=?, plotSection=?, plotRoom=?, plotProf=?, plotWeek=? , plotTimeStart=?, plotTimeEnd=? WHERE plotID=?");
    $stmt->bind_param("sssssssi", $plotSubj, $plotSection, $plotRoom,$plotProf,  $plotWeek, $plotTimeStart , $plotTimeEnd, $plotID);
    $stmt->execute();

    if ($stmt) {
        $_SESSION["message"] = "Schedule Details Updated Successfully";
        header('Location:   schedule_index.php');
    } else {
        echo "Error: ";
    }
    $stmt->close();
}
?>






