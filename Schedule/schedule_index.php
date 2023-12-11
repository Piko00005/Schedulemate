<?php
session_start();
include('../Dashboard/nav.html');
?>

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

// display data for dropdown
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
        $academicYear = "SY " . $i . " - " . $nextYear;
        $plotYear = "SY " . $i . " - " . $nextYear;
        $options .= "<option value=\"$plotYear\">$academicYear</option>";
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
                        <label for="plotYear">Academic Year</label>
                        <select name="plotYear" id="plotYear">
                            <option value="" disabled selected>Select Academic Year</option>
                            <!-- the function to generate academic year options -->
                            <?php echo generateAcademicYears(); ?>
                        </select>
                    </div>

                    <div class="column">
                        <label for="plotSem">Semester</label>
                        <select name="plotSem" id="plotSem">
                            <option value="" disabled selected>Select Semester</option>
                            <option value="1st Semester">1st Semester</option>
                            <?php
                            // Check if the 1st Semester is selected, and hide the 2nd Semester option
                            if ($_POST['plotSem'] !== "1st Semester") {
                            ?>
                                <option value="2nd Semester">2nd Semester</option>
                            <?php
                            }
                            ?>
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
                            }
                            ?>
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
                            }
                            ?>
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
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <h3>MONDAY</h3>
                        <input type="hidden" name="plotMon" value="Monday">
                        <label for="timeStartMon">Time Starts</label>
                        <input name="tsMon" type="time" id="timeStartMon">
                        <label for="timeEndMon">Time Ends</label>
                        <input name="teMon" type="time" id="timeEndMon">
                    </div>
                    <div class="column">
                        <h3>TUESDAY</h3>
                        <input type="hidden" name="plotTue" value="Tuesday">
                        <label for="timeStartTue">Time Starts</label>
                        <input name="tsTue" type="time" id="timeStartTue">
                        <label for="timeEndTue">Time Ends</label>
                        <input name="teTue" type="time" id="timeEndTue">
                    </div>
                    <div class="column">
                        <h3>WEDNESDAY</h3>
                        <input type="hidden" name="plotWed" value="Wednesday">
                        <label for="timeStartWed">Time Starts</label>
                        <input name="tsWed" type="time" id="timeStartWed">
                        <label for="timeEndWed">Time Ends</label>
                        <input name="teWed" type="time" id="timeEndWed">
                    </div>
                    <div class="column">
                        <h3>THURSDAY</h3>
                        <input type="hidden" name="plotThu" value="Thursday">
                        <label for="timeStartThu">Time Starts</label>
                        <input name="tsThu" type="time" id="timeStartThu">
                        <label for="timeEndThu">Time Ends</label>
                        <input name="teThu" type="time" id="timeEndThu">
                    </div>
                    <div class="column">
                        <h3>FRIDAY</h3>
                        <input type="hidden" name="plotFri" value="Friday">
                        <label for="timeStartFri">Time Starts</label>
                        <input name="tsFri" type="time" id="timeStartFri">
                        <label for="timeEndFri">Time Ends</label>
                        <input name="teFri" type="time" id="timeEndFri">
                    </div>
                    <div class="column">
                        <h3>SATURDAY</h3>
                        <input type="hidden" name="plotSat" value="Saturday">
                        <label for="timeStartSat">Time Starts</label>
                        <input name="tsSat" type="time" id="timeStartSat">
                        <label for="timeEndSat">Time Ends</label>
                        <input name="teSat" type="time" id="timeEndSat">
                    </div>

                    <div class="column">
                        <h3>SUNDAY</h3>
                        <input type="hidden" name="plotSun" value="Sunday">
                        <label for="timeStartSun">Time Starts</label>
                        <input name="tsSun" type="time" id="timeStartSun">
                        <label for="timeEndSun">Time Ends</label>
                        <input name="teSun" type="time" id="timeEndSun">
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
                        <th>Section</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- display data grid -->
                    <?php
                    $result = mysqli_query($conn, "SELECT * FROM tb_plotting, tb_week");
                    $i = 1;
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row["plotID"] ?></td>
                            <td><?php echo $row["plotYear"] ?></td>
                            <td><?php echo $row["plotSem"] ?></td>
                            <td><?php echo $row["plotSection"] ?></td>
                            <td>
                                <div class="button-container">
                                    <!-- this is the more information button -->
                                    <button class="toggleDetails">+</button>

                                    <!-- this is the Edit Information button -->
                                    <a href="schedule_index.php?schedule_edit=<?php echo $row["plotID"]; ?>" class="edit_btn"><button class="edit_btn"><i class='bx bx-edit-alt'></i></button></a>
                                </div>
                            </td>
                        </tr>

                        <!-- this is the "more" information regarding the profs -->
                        <tr class="details hidden">
                            
                            <td colspan="4"> <!-- Adjust the colspan to match the number of columns in your table -->
                                <table class="inner-details">
                                    <tr colspan="">
                                        <td class="detail-title">Subject</td>
                                        <td class="detail-title">Room</td>
                                        <td class="detail-title">Day & Time</td>
                                        <td class="detail-title">Professor</td>
                                    </tr>
                                    <tr>
                                        <td class="detail-content"><?php echo $row["plotSubj"] ?></td>
                                        <td class="detail-content"><?php echo $row["plotRoom"] ?></td>
                                        <td class="detail-content"><?php echo $row["plotDay"] . " - " . date("h:i A", strtotime($row["plotTimeStart"])) . " - " . date("h:i A", strtotime($row["plotTimeEnd"])); ?></td>
                                        <td class="detail-content"><?php echo $row["plotProf"] ?></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    <?php
                        $i++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.querySelectorAll('.toggleDetails').forEach(function(button) {
            button.addEventListener('click', function() {
                var detailRow = this.closest('tr').nextElementSibling;
                detailRow.classList.toggle('hidden');
                this.textContent = detailRow.classList.contains('hidden') ? '+' : '-';
            });
        });
    </script>
</body>

</html>


