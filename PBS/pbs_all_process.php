<?php
include_once('../Professor/db.php');
include_once('../Schedule/schedule_all_process.php');



//searchBox
if (isset($_POST['searchBox'])) {

    $searchBox = true;

    $searchBox = $_POST['searchBox'];
    $result = mysqli_query($conn, "SELECT p.*, w.* FROM tb_plotting p INNER JOIN tb_week w ON p.plotID = w.plotID  
    WHERE CONCAT(p.plotID, p.plotYear, p.plotSem, p.plotSubj, p.plotSection, p.plotRoom, p.plotProf) LIKE '%" . $searchBox . "%' 

    ORDER BY p.plotYear, p.plotSem, p.plotSection, p.plotSubj, 
    CASE WHEN w.plotDay = 'Monday' THEN 1
    WHEN w.plotDay = 'Tuesday' THEN 2
    WHEN w.plotDay = 'Wednesday' THEN 3
    WHEN w.plotDay = 'Thursday' THEN 4
    WHEN w.plotDay = 'Friday' THEN 5
    WHEN w.plotDay = 'Saturday' THEN 6
    WHEN w.plotDay = 'Sunday' THEN 7 END ASC,  p.plotRoom, p.plotProf");

    //   echo"<pre>";
    // var_dump(mysqli_fetch_array($result));
    // echo"</pre>";
    // die;

    $prevSem = "";
    $prevYear = "";
    $prevSection = "";
    $prevSubject = "";
    $prevRoom = "";
    $prevProf = "";
}

//filtering YEAR LEVEL
if (isset($_POST['filter'])) {
    // echo "<pre>";
    // var_dump($filter);
    // echo "</pre>";
    // die;
    $filterYearlvl = $_POST['filterYear'];

    $filter = "1";
    if ($filterYearlvl != "") {
        $filter = $filter . " AND plotSection LIKE '%" . $filterYearlvl . "%'";
    }

    // echo "<pre>";
    // var_dump($filter);
    // echo "</pre>";
    // die;

    $result = mysqli_query($conn, "SELECT p.*, w.* FROM tb_plotting p INNER JOIN tb_week w ON p.plotID = w.plotID  
    WHERE $filter
    ORDER BY p.plotYear, p.plotSem, p.plotSection, p.plotSubj, 
    CASE WHEN w.plotDay = 'Monday' THEN 1
    WHEN w.plotDay = 'Tuesday' THEN 2
    WHEN w.plotDay = 'Wednesday' THEN 3
    WHEN w.plotDay = 'Thursday' THEN 4
    WHEN w.plotDay = 'Friday' THEN 5
    WHEN w.plotDay = 'Saturday' THEN 6
    WHEN w.plotDay = 'Sunday' THEN 7 END ASC,  p.plotRoom, p.plotProf");



    $prevSem = "";
    $prevYear = "";
    $prevSection = "";
    $prevSubject = "";
    $prevRoom = "";
    $prevProf = "";
}
