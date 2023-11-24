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
    $plotWeek = $data['plotWeek'];
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
            <h1>Schedule</h1>
            <div>
                <input placeholder="Search" />
            </div>
        </div>

        <div class="container">
            <form method="POST" action="schedule_all_process.php">

                <div class="row">
                    <div class="column">
                        <label for="plotSubj">Subject</label>
                        <select name="plotSubj">
                            <option value="" disabled selected>Select Subject</option>
                            <?php

                            if (mysqli_num_rows($result_subject) > 0) {
                                while ($row = mysqli_fetch_assoc($result_subject)) {
                            ?>
                                    <option value="<?= $row['subID'] ?> "><?= $row['subCode'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="column">
                        <label for="plotSection">Section</label>
                        <select name="plotSection">
                            <option value="" disabled selected>Select Section</option>
                            <?php

                            if (mysqli_num_rows($result_section) > 0) {
                                while ($row = mysqli_fetch_assoc($result_section)) {
                            ?>
                                    <option value="<?= $row['secID'] ?> "><?= $row['secProgram'] ?> <?= $row['secYearlvl'] ?> <?= $row['secName'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="column">
                        <label for="plotRoom">Room</label>
                        <select name="plotRoom">
                            <option value="" disabled selected>Select Room</option>
                            <?php

                            if (mysqli_num_rows($result_room) > 0) {
                                while ($row = mysqli_fetch_assoc($result_room)) {
                            ?>
                                    <option value="<?= $row['roomID'] ?> "><?= $row['roomBuild'] ?> <?= $row['roomNum'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="column">
                        <label for="plotProf">Professor</label>
                        <select name="plotProf">
                            <option value="" disabled selected>Select Professor</option>
                            <option value="profTBA">TBA</option>
                            <?php

                            if (mysqli_num_rows($result_professor) > 0) {
                                while ($row = mysqli_fetch_assoc($result_professor)) {
                            ?>
                                    <option value="<?= $row['profID'] ?> "><?= $row['profFname'] ?> <?= $row['profLname'] ?> </option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                </div>

                <p>Weekday</p><br>
                <div class="row">
                    <input name="plotMon" type="checkbox" value="<?php echo $plotWeek?>">
                    <label for="plotMon">MONDAY</label>
                            
                    <input name="plotTues" type="checkbox" value="<?php echo $plotWeek ?>">
                    <label for="plotTues">TUESDAY</label>

                    <input name="plotWed" type="checkbox" value="<?php echo $plotWeek ?>">
                    <label for="plotWed">WEDNESDAY</label>

                    <input name="plotThurs" type="checkbox" value="<?php echo $plotWeek ?>">
                    <label for="plotThurs">THURSDAY</label>

                    <input name="plotFri" type="checkbox" value="<?php echo $plotWeek ?>">
                    <label for="plotFri">FRIDAY</label>

                    <input name="plotSat" type="checkbox" value="<?php echo $plotWeek ?>">
                    <label for="plotSat">SATURDAY</label>
                </div>

                <div class="row">
                    <div class=" column">
                        <label for="timeStart">Time Starts</label>
                        <input type="time" name="plotTimeStart" value="<?php echo $plotTimeStart ?>"> 
                    </div>

                    <div class=" column">
                        <label for="timeEnd">Time Ends</label>
                        <input type="time" name="plotTimeEnd" value="<?php echo $plotTimeEnd ?>">
                    </div>
                </div>

                <?php if ($sched_edit_state == false) : ?>
                    <button class=" add_new" type="submit" name="sched_add_new">Add New</button>
                    <?php else : ?>
                        <button class="add_new" type="submit" name="sched_update">Update</button>
                    <?php endif ?>
            </form>
        </div>



        <div class="table_section">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Subject Code</th>
                        <th>Section</th>
                        <th>Room</th>
                        <th>Professor</th>
                        <th>Weekday</th>
                        <th>Time Starts</th>
                        <th>Time Ends</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = mysqli_query($conn, "SELECT * FROM tb_plotting");
                    $i = 1;
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row["plotSubj"] ?></td>
                            <td><?php echo $row["plotSection"] ?></td>
                            <td><?php echo $row["plotRoom"] ?></td>
                            <td><?php echo $row["plotProf"] ?></td>
                            <td><?php echo $row["plotWeek"] ?></td>
                            <td><?php echo $row["plotTimeStart"] ?></td>
                            <td><?php echo $row["plotTimeEnd"] ?></td>

                            <a href="schedule_index.php?sched_edit=<?php echo $row["plotID"]; ?>" class="edit_btn"><button class="edit_btn"><i class='bx bx-edit-alt'></i></button></a>
                            <form method="POST" action="schedule_all_process.php">
                                <input type="hidden" name="plotID" value="<?php echo $row['plotID']; ?>">
                                <button type="submit" class="edit_btn"><i class='bx bx-window-close'></i></button>
                            </form>
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