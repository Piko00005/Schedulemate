<?php
//session_start();

include_once('../Professor/db.php');
include_once ('../Subject/subject_all_process.php');

$plotYear = "";
$plotSem = "";
$plotSubj = "";
$plotSection = "";
$plotRoom= "";
$plotProf ="";
$plotDay = "";
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

    $plotYear = $_POST["plotYear"];
    $plotSem = $_POST["plotSem"];
    $plotSubj = $_POST["plotSubj"];
    $plotSection = $_POST["plotSection"];
    $plotRoom = $_POST["plotRoom"];
    $plotProf = $_POST["plotProf"];



  
    
    $stmt = $conn->prepare("INSERT INTO tb_plotting (plotYear, plotSem, plotSubj, plotSection, plotRoom, plotProf) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $plotYear,$plotSem, $plotSubj, $plotSection, $plotRoom, $plotProf);
    $stmt->execute();

    //sub table
    $plotDay = $_POST["plotMon"];
    $plotTimeStart = $_POST["tsMon"];
    $plotTimeEnd = $_POST["teMon"];

    $stmt = $conn->prepare("INSERT INTO tb_week (plotDay, plotTimeStart, plotTimeEnd) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $plotDay,$plotTimeStart, $plotTimeEnd);
    $stmt->execute();

    $plotDay = $_POST["plotTue"];
    $plotTimeStart = $_POST["tsTue"];
    $plotTimeEnd = $_POST["teTue"];

    $stmt = $conn->prepare("INSERT INTO tb_week (plotDay, plotTimeStart, plotTimeEnd) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $plotDay,$plotTimeStart, $plotTimeEnd);
    $stmt->execute();


    $plotDay = $_POST["plotWed"];
    $plotTimeStart = $_POST["tsWed"];
    $plotTimeEnd = $_POST["teWed"];

    $stmt = $conn->prepare("INSERT INTO tb_week (plotDay, plotTimeStart, plotTimeEnd) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $plotDay,$plotTimeStart, $plotTimeEnd);
    $stmt->execute();

    $plotDay = $_POST["plotThu"];
    $plotTimeStart = $_POST["tsThu"];
    $plotTimeEnd = $_POST["teThu"];

    $stmt = $conn->prepare("INSERT INTO tb_week (plotDay, plotTimeStart, plotTimeEnd) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $plotDay,$plotTimeStart, $plotTimeEnd);
    $stmt->execute();

    $plotDay = $_POST["plotFri"];
    $plotTimeStart = $_POST["tsFri"];
    $plotTimeEnd = $_POST["teFri"];

    $stmt = $conn->prepare("INSERT INTO tb_week (plotDay, plotTimeStart, plotTimeEnd) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $plotDay,$plotTimeStart, $plotTimeEnd);
    $stmt->execute();

    $plotDay = $_POST["plotSat"];
    $plotTimeStart = $_POST["tsSat"];
    $plotTimeEnd = $_POST["teSat"];

    $stmt = $conn->prepare("INSERT INTO tb_week (plotDay, plotTimeStart, plotTimeEnd) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $plotDay,$plotTimeStart, $plotTimeEnd);
    $stmt->execute();

    $plotDay = $_POST["plotSun"];
    $plotTimeStart = $_POST["tsSun"];
    $plotTimeEnd = $_POST["teSun"];

    $stmt = $conn->prepare("INSERT INTO tb_week (plotDay, plotTimeStart, plotTimeEnd) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $plotDay,$plotTimeStart, $plotTimeEnd);
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






