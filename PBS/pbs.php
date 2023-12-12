<?php include('../Dashboard/nav.html');
include('../Professor/db.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../Dashboard/nav.css">
    <link rel="stylesheet" href="../Professor/tb.css">
    <link rel="stylesheet" href="home.css">
</head>
<body>

    <div class="table">
        <div class="table_header">
            <h1>Program by Section</h1>

            <div id>
                <input type="text" placeholder="Search" />
            </div>

            <div>
                <select id="filter">
                    <option value="" disabled selected>Filter by Semester</option>
                    <option value="1st Semester">1st Semester</option>
                    <option value="2nd Semester">2nd Semester</option>
                </select>

                <select id="filter">
                    <option value="" disabled selected>Filter by Year Level</option>
                    <option value="1st Year">1st Year</option>
                    <option value="2nd Year">2nd Year</option>
                    <option value="3rd Year">3rd Year</option>
                    <option value="4th Year">4th Year</option>
                </select>
            </div>
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
                $result = mysqli_query($conn, "SELECT p.*, w.* FROM tb_plotting p INNER JOIN tb_week w ON p.plotID = w.plotID ORDER BY p.plotYear, p.plotSem, p.plotSection, p.plotSubj, 
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