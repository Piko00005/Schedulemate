<?php include('../Dashboard/nav.html');
include('../Professor/db.php');

?>


<link rel="stylesheet" href="css/tb.css" />


<body>

    <head>
        <link rel="stylesheet" href="../Dashboard/nav.css">
        <link rel="stylesheet" href="../Professor/tb.css">
        <link rel="stylesheet" href="home.css">
    </head>

    <div class="table">
        <div class="table_header">
            <h1>Program by Section</h1>

            <div id>
                <input type="text" placeholder="Search" />
            </div>

            <div>
                <select id="filter">
                    <option value="" disabled selected>Sort By</option>
                    <option value="sy">School Year</option>
                    <option value="ylvl">Year Level</option>
                    <option value="sem">Semester</option>
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
                        <th>Day</th>
                        <th>Time</th>
                        <th>Room</th>
                        <th>Professor</th>
                        <th></th>
                    </tr>
                </thead>
                <?php
                $result = mysqli_query($conn, "SELECT plotYear, plotSem, plotSection, plotSubj, plotDay, plotTimeStart, plotTimeEnd, plotRoom, plotProf FROM tb_week, tb_plotting ORDER BY plotYear, plotSem, plotSection, plotSubj, plotRoom, plotProf");
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
                        <td><?php echo $row["plotDay"] ?></td>
                        <td><?php echo $row["plotTimeStart"] ?> AM - <?php echo $row["plotTimeEnd"] ?> PM</td>
                        <td><?php
                            if ($prevRoom != $row["plotRoom"]) {
                                echo $row["plotRoom"];
                            }
                            $prevRoom = $row["plotRoom"];
                            ?>
                        </td>
                        <td><?php
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