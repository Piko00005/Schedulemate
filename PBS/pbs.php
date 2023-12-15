<?php
session_start();
// if(userPosition != Chairperson) 
// {
//     header("Location: register_html.php");
//     exit();
// }

include('../Dashboard/nav.html');
include('../Professor/db.php');
include('../PBS/pbs_all_process.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../Dashboard/nav.css">
    <link rel="stylesheet" href="../PBS/reports.css">
    <link rel="stylesheet" href="home.css">
</head>

<body>
    <form method="POST" action="">
        <div class="table">
            <div class="table_header">

                <h1>Program by Section</h1>


                <div>
                    <input type="hidden" name="plotID" value="<?php echo $plotID; ?>">
                    <input name="searchBox" type="text" placeholder="Search" />
                    <input type="reset" name="resetSearch" id="resetSearch">

                </div>
                <!-- <button class="add_new" type="submit" name="search_add_new">Reset Search</button> -->

                <div>
                    <select name="semester" id="filter">
                        <option value="" disabled selected>Filter by Semester</option>
                        <option value="1st Semester">1st Semester</option>
                        <option value="2nd Semester">2nd Semester</option>
                    </select>

                    <select name="filterYear" id="filter">
                        <option value="" disabled selected>Filter by Year Level</option>
                        <option value="1" >1st Year</option>
                        <option value="2" >2nd Year</option>
                        <option value="3" >3rd Year</option>
                        <option value="4" >4th Year</option>
                    </select>
                    <input type="submit" name="filter" id="filter">
                </div>
    </form>
    </div>

    <div class="table_section">
        <table>
            <thead>
                <tr>
                    <th>SY</th>
                    <th>Semester</th>
                    <th>Section</th>
                    <th>Subject</th>
                    <th>Day & Time </th>
                    <th>Room</th>
                    <th>Professor</th>
                    <th></th>
                </tr>
            </thead>

            <?php
            if (!isset($searchBox)) {
                $result = mysqli_query($conn, "SELECT p.*, w.* FROM tb_plotting p INNER JOIN tb_week w ON p.plotID = w.plotID  ORDER BY p.plotYear, p.plotSem, p.plotSection, p.plotSubj, 
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

            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php
                        if ($prevYear != $row["plotYear"]) {
                            echo $row["plotYear"];
                        }
                        $prevYear = $row["plotYear"];
                        ?>
                    </td>
                    <td><?php
                        if ($prevSem != $row["plotSem"]) {
                            echo $row["plotSem"];
                        }
                        $prevSem = $row["plotSem"];
                        ?>
                    </td>
                    <td><?php
                        if ($prevSection != $row["plotSection"]) {
                            echo $row["plotSection"];
                        }
                        $prevSection = $row["plotSection"];
                        ?>
                    </td>
                    <td><?php
                        if ($prevSubject != $row["plotSubj"]) {
                            echo $row["plotSubj"];
                        }
                        $prevSubject = $row["plotSubj"];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $row["plotDay"] . " - " . date("h:i A", strtotime($row["plotTimeStart"])) . " - " . date("h:i A", strtotime($row["plotTimeEnd"]));
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($prevRoom != $row["plotRoom"]) {
                            echo $row["plotRoom"];
                        }
                        $prevRoom = $row["plotRoom"];
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($prevProf != $row["plotProf"]) {
                            echo $row["plotProf"];
                        }
                        $prevProf = $row["plotProf"];
                        ?>
                    </td>
                </tr>

            <?php
            } ?>

        </table>
    </div>
    </div>
</body>

</html>