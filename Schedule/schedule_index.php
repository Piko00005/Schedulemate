<?php //session_start(); 
include('../Dashboard/nav.html'); ?>

<?php
include('../Professor/db.php');
include 'schedule_all_process.php';
if (isset($_GET['sched_edit'])) {
    $plotID = $_GET['sched_edit'];
    $sched_edit_state = true;
    $record = mysqli_query($conn, "SELECT * FROM tb_plotting WHERE plotID=$plotID");
    $data = mysqli_fetch_array($record);
    $plotSubj = $data['plotSubj'];
    $plotSection = $data['plotSection'];
    $plotRoom = $data['plotRoom'];
    $plotProf = $data['plotProf'];
    $plotDay = $data['plotDay'];
    $plotTimeStart = $data['plotTimeStart'];
    $plotTimeEnd = $data['plotTimeEnd'];
}

$stmnt = "SELECT subID, subCode  FROM tb_subjects ";
$result_subject = mysqli_query($conn, $stmnt);

$stmnt = "SELECT secID, secProgram, secYearlvl, secName  FROM tb_section ";
$result_section = mysqli_query($conn, $stmnt);

$stmnt = "SELECT roomID, roomBuild, roomNum  FROM tb_room ";
$result_room = mysqli_query($conn, $stmnt);

$stmnt = "SELECT profID, profFname, profLname  FROM tb_professor ";
$result_professor = mysqli_query($conn, $stmnt);


// Function to generate academic year options dynamically
function generateAcademicYears()
{
    $currentYear = date("Y");
    $options = "";

    for ($i = $currentYear; $i <= $currentYear + 10; $i++) {
        $nextYear = $i + 1;
        $academicYear = "SY " . $i . "-" . $nextYear;
        $value = "sy" . $i . $nextYear;
        $options .= "<option value=\"$value\">$academicYear</option>";
    }

    return $options;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../Dashboard/nav.css">
    <link rel="stylesheet" href="../Professor/tb.css">
</head>

<body>
    <div class="table">
        <div class="table_header">
            <h1>Plot Schedule</h1>
        </div>
        <div class="container">
            <form method="POST" action="schedule_all_process.php">
            <input type="hidden" name="plotID" value="<?php echo $plotID; ?>">

                <div class="row">
                    <div class="column">
                        <label for="plotSub">Academic Year</label>
                        <select name="plotYear" id="plotSub">
                            <option value="" disabled selected>Select Academic Year</option>
                            <!-- the function to generate academic year options -->
                            <?php echo generateAcademicYears(); ?>
                        </select>
                    </div>

                    <div class="column">
                        <label for="plotSub">Semester</label>
                        <select name="plotSem" id="plotSub">
                            <option value="" disabled selected>Select Semester</option>
                            <option value="sem1">1st Semester</option>
                            <option value="sem2">2nd Semester</option>
                        </select>
                    </div>

                    <div class="column">
                        <label for="plotSubj">Subject</label>
                        <select name="plotSubj" id="plotSub">
                            <option value="" disabled selected>Select Subject</option>
                            <?php

                            if (mysqli_num_rows($result_subject) > 0) {
                                while ($row = mysqli_fetch_assoc($result_subject)) {
                            ?>
                                    <option value="<?= $row['subCode'] ?> "><?= $row['subCode'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="column">
                        <label for="plotSection">Section</label>
                        <select name="plotSection" id="plotSection">
                            <option value="" disabled selected>Select Section</option>
                            <?php
                            if (mysqli_num_rows($result_section) > 0) {
                                while ($row = mysqli_fetch_assoc($result_section)) {
                            ?>
                                    <option value="<?= $row['secProgram'] ?><?= $row['secYearlvl'] ?><?= $row['secName'] ?> "><?= $row['secProgram'] ?> <?= $row['secYearlvl'] ?> <?= $row['secName'] ?></option>
                            <?php
                                }
                            } ?>
                            
                        </select>
                    </div>

                    <div class="column">
                        <label for="plotRoom">Room</label>
                        <select name="plotRoom" id="plotRoom">
                            <option value="" disabled selected>Select Room</option>
                            <?php
                            if (mysqli_num_rows($result_room) > 0) {
                                while ($row = mysqli_fetch_assoc($result_room)) {
                            ?>
                                    <option value="<?= $row['roomBuild'] ?> <?= $row['roomNum'] ?>"><?= $row['roomBuild'] ?> <?= $row['roomNum'] ?></option>
                            <?php
                                }
                            } ?>
                        </select>
                    </div>

                    <div class="column">
                        <label for="plotProf">Professor</label>
                        <select name="plotProf" id="plotProf">
                            <option value="" disabled selected>Select Professor</option>
                            <?php
                            if (mysqli_num_rows($result_professor) > 0) {
                                while ($row = mysqli_fetch_assoc($result_professor)) {
                            ?>
                                    <option value="<?= $row['profFname'] ?><?= $row['profLname'] ?> "><?= $row['profFname'] ?> <?= $row['profLname'] ?></option>
                            <?php
                                }
                            } ?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <h3>MONDAY</h3>
                        <input type="hidden" name="plotMon" value="Monday">
                        <label for="timeStart">Time Starts</label>
                        <input name="tsMon" type="time" id="timeStart">
                        <label for="timeEnd">Time Ends</label>
                        <input name="teMon" type="time" id="timeEnd">
                    </div>
                    <div class="column">
                        <h3>TUESDAY</h3>
                        <input type="hidden" name="plotTue" value="Tuesday">
                        <label for="timeStart">Time Starts</label>
                        <input name="tsTue" type="time" id="timeStart">
                        <label for="timeEnd">Time Ends</label>
                        <input name="teTue" type="time" id="timeEnd">
                    </div>
                    <div class="column">
                        <h3>WEDNESDAY</h3>
                        <input type="hidden" name="plotWed" value="Wednesday">
                        <label for="timeStart">Time Starts</label>
                        <input name="tsWed" type="time" id="timeStart">
                        <label for="timeEnd">Time Ends</label>
                        <input name="teWed" type="time" id="timeEnd">
                    </div>
                    <div class="column">
                        <h3>THURSDAY</h3>
                        <input type="hidden" name="plotThu" value="Thursday">
                        <label for="timeStart">Time Starts</label>
                        <input name="tsThu" type="time" id="timeStart">
                        <label for="timeEnd">Time Ends</label>
                        <input name="teThu" type="time" id="timeEnd">
                    </div>
                    <div class="column">
                        <h3>FRIDAY</h3>
                        <input type="hidden" name="plotFri" value="Friday">
                        <label for="timeStart">Time Starts</label>
                        <input name="tsFri" type="time" id="timeStart">
                        <label for="timeEnd">Time Ends</label>
                        <input name="teFri" type="time" id="timeEnd">
                    </div>
                    <div class="column">
                        <h3>SATURDAY</h3>
                        <input type="hidden" name="plotSat" value="Saturday">
                        <label for="timeStart">Time Starts</label>
                        <input name="tsSat" type="time" id="timeStart">
                        <label for="timeEnd">Time Ends</label>
                        <input name="teSat" type="time" id="timeEnd">
                    </div>

                    <div class="column">
                        <h3>SUNDAY</h3>
                        <input type="hidden" name="plotSun" value="Sunday">
                        <label for="timeStart">Time Starts</label>
                        <input name="tsSun" type="time" id="timeStart">
                        <label for="timeEnd">Time Ends</label>
                        <input name="teSun" type="time" id="timeEnd">
                    </div>
                </div>
                <button class="add_new" type="submit" name="sched_add_new">Add New</button>
            </form>
        </div>

        <div class="table_section">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Academic Year</th>
                        <th>Semester</th>
                        <th>Subject</th>
                        <th>Section</th>
                        <th>Room</th>
                        <th>Professor</th>
                        <th>Time</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = mysqli_query($conn, "SELECT * FROM tb_plotting, tb_week");
                    $i = 1;
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row["plotYear"] ?></td>
                            <td><?php echo $row["plotSem"] ?></td>
                            <td><?php echo $row["plotSubj"] ?></td>
                            <td><?php echo $row["plotSection"] ?></td>
                            <td><?php echo $row["plotRoom"] ?></td>
                            <td><?php echo $row["plotProf"] ?></td>



                            <td>
                                <div class="button-container">

                                    <!-- this is the Edit Information button -->
                                    <a href="room_index.php?room_edit=<?php echo $row["roomID"]; ?>" class="edit_btn"><button class="edit_btn"><i class='bx bx-edit-alt'></i></button></a>

                                    <form method="POST" action="room_all_process.php">
                                        <input type="hidden" name="roomID" value="<?php echo $row['roomID']; ?>">
                                        <button type="submit" class="edit_btn" name="room_toggle_status"><i class='bx bx-window-close'></i></button>
                                    </form>

                                </div>
                            </td>


                        </tr>


                    <?php
                        $i++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>

</html>