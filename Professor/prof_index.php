<?php
session_start();
include('../Dashboard/nav.html');
include 'prof_all_process.php';

if (isset($_GET['prof_edit'])) {
    $profID = $_GET['prof_edit'];
    $prof_edit_state = true;
    $record = mysqli_query($conn, "SELECT * FROM tb_professor WHERE profID=$profID");
    $data = mysqli_fetch_array($record);
    $profFname  = $data['profFname'];
    $profLname = $data['profLname'];
    $profMobile = $data["profMobile"];
    $profAddress = $data["profAddress"];
    $profEduc = $data["profEduc"];
    $profExpert = $data["profExpert"];
    $profRank = $data["profRank"];
    $profUnit = $data["profUnit"];
    $profEmployStatus = $data["profEmployStatus"];
    $profStatus = $data["profStatus"];
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
            <h1>Professor's List</h1>
            <div>
                <input placeholder="Search" />
            </div>
        </div>
    </div>

    <!-- This is to display the notifications or error messages -->
    <div class="message">
        <?php if (isset($_SESSION['message'])) : ?>
            <div class="message">
                <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                ?>
            </div>
        <?php endif ?>
    </div>

    <!--- Input Fields --->
    <div class="container">
        <form method="POST" action="prof_all_process.php">
            <input type="hidden" name="profID" value="<?php echo $profID; ?>">
            <input type="hidden" name="profStatus" value="<?php echo $profStatus; ?>">
            <div class="row">
                <div class="column">
                    <label for="profFname">Firstname</label>
                    <input type="text" name="profFname" placeholder="Firstname" value="<?php echo $profFname; ?>">
                </div>

                <div class="column">
                    <label for="profLname">Lastname</label>
                    <input type="text" name="profLname" placeholder="Lastname" value="<?php echo $profLname; ?>">
                </div>

                <div class="column">
                    <label for="profMobile">Mobile No.</label>
                    <input type="text" name="profMobile" placeholder="Mobile No." value="<?php echo $profMobile; ?>">
                </div>
            </div>

            <div class="row">
                <div class="column">
                    <label for="profAddress">Address</label>
                    <textarea name="profAddress" rows="3" placeholder="Address"><?php echo $profAddress; ?></textarea>
                </div>

                <div class="column">
                    <label for="profEduc">Education Attainment</label>
                    <textarea name="profEduc" rows="3" placeholder="Educational Attainment"><?php echo $profEduc; ?></textarea>
                </div>

                <div class="column">
                    <label for="profExpert">Expertise or Specialization</label>
                    <textarea name="profExpert" rows="3" placeholder="Expertise or Specialization"><?php echo $profExpert; ?></textarea>
                </div>
            </div>

            <div class="row">
                <div class="column">
                    <label for="profRank">Professors Rank</label>
                    <select name="profRank">
                        <option value="" disabled selected>Select Professors Rank</option>
                        <option value="Instructor 1" <?= ($profRank == "Instructor 1") ? "selected" : ""; ?>>Instructor 1</option>
                        <option value="Instructor 2" <?= ($profRank == "Instructor 2") ? "selected" : ""; ?>>Instructor 2</option>
                        <option value="Instructor 3" <?= ($profRank == "Instructor 3") ? "selected" : ""; ?>>Instructor 3</option>
                        <option value="Instructor 4" <?= ($profRank == "Instructor 4") ? "selected" : ""; ?>>Instructor 4</option>
                        <option value="Instructor 5" <?= ($profRank == "Instructor 5") ? "selected" : ""; ?>>Instructor 5</option>
                        <option value="Instructor 6" <?= ($profRank == "Instructor 6") ? "selected" : ""; ?>>Instructor 6</option>
                        <option value="Instructor 7" <?= ($profRank == "Instructor 7") ? "selected" : ""; ?>>Instructor 7</option>
                        <option value="Assistant Prof. 1" <?= ($profRank == "Assistant Prof. 1") ? "selected" : ""; ?>>Assistant Prof. 1</option>
                        <option value="Assistant Prof. 2" <?= ($profRank == "Assistant Prof. 2") ? "selected" : ""; ?>>Assistant Prof. 2</option>
                        <option value="Assistant Prof. 3" <?= ($profRank == "Assistant Prof. 3") ? "selected" : ""; ?>>Assistant Prof. 3</option>
                        <option value="Assistant Prof. 4" <?= ($profRank == "Assistant Prof. 4") ? "selected" : ""; ?>>Assistant Prof. 4</option>
                        <option value="Assistant Prof. 5" <?= ($profRank == "Assistant Prof. 5") ? "selected" : ""; ?>>Assistant Prof. 5</option>
                        <option value="Assistant Prof. 6" <?= ($profRank == "Assistant Prof. 6") ? "selected" : ""; ?>>Assistant Prof. 6</option>
                        <option value="Assistant Prof. 7" <?= ($profRank == "Assistant Prof. 7") ? "selected" : ""; ?>>Assistant Prof. 7</option>
                        <option value="Associate Prof. 1" <?= ($profRank == "Associate Prof. 1") ? "selected" : ""; ?>>Associate Prof. 1</option>
                        <option value="Associate Prof. 2" <?= ($profRank == "Associate Prof. 2") ? "selected" : ""; ?>>Associate Prof. 2</option>
                        <option value="Associate Prof. 3" <?= ($profRank == "Associate Prof. 3") ? "selected" : ""; ?>>Associate Prof. 3</option>
                        <option value="Associate Prof. 4" <?= ($profRank == "Associate Prof. 4") ? "selected" : ""; ?>>Associate Prof. 4</option>
                        <option value="Associate Prof. 5" <?= ($profRank == "Associate Prof. 5") ? "selected" : ""; ?>>Associate Prof. 5</option>
                        <option value="Associate Prof. 6" <?= ($profRank == "Associate Prof. 6") ? "selected" : ""; ?>>Associate Prof. 6</option>
                        <option value="Associate Prof. 7" <?= ($profRank == "Associate Prof. 7") ? "selected" : ""; ?>>Associate Prof. 7</option>
                        <option value="Professor 1" <?= ($profRank == "Professor 1") ? "selected" : ""; ?>>Professor 1</option>
                        <option value="Professor 2" <?= ($profRank == "Professor 2") ? "selected" : ""; ?>>Professor 2</option>
                        <option value="Professor 3" <?= ($profRank == "Professor 3") ? "selected" : ""; ?>>Professor 3</option>
                        <option value="Professor 4" <?= ($profRank == "Professor 4") ? "selected" : ""; ?>>Professor 4</option>
                        <option value="Professor 5" <?= ($profRank == "Professor 5") ? "selected" : ""; ?>>Professor 5</option>
                        <option value="Professor 6" <?= ($profRank == "Professor 6") ? "selected" : ""; ?>>Professor 6</option>
                        <option value="Professor 7" <?= ($profRank == "Professor 7") ? "selected" : ""; ?>>Professor 7</option>
                        <option value="Professor 8" <?= ($profRank == "Professor 8") ? "selected" : ""; ?>>Professor 8</option>
                        <option value="Professor 9" <?= ($profRank == "Professor 9") ? "selected" : ""; ?>>Professor 9</option>
                        <option value="Professor 10" <?= ($profRank == "Professor 10") ? "selected" : ""; ?>>Professor 10</option>
                        <option value="Professor 11" <?= ($profRank == "Professor 11") ? "selected" : ""; ?>>Professor 11</option>
                        <option value="Professor 12" <?= ($profRank == "Professor 12") ? "selected" : ""; ?>>Professor 12</option>
                        <option value="Univ. Professor" <?= ($profRank == "Univ. Professor") ? "selected" : ""; ?>>Univ. Professor</option>
                    </select>
                </div>

                <div class="column">
                    <label for="profUnits">Units</label>
                    <input type="number" name="profUnit" placeholder="Professor's Units" value="<?php echo $profUnit; ?>">
                </div>

                <div class="column">
                    <label for="profEmployStatus">Professor's Employment Status</label>
                    <select name="profEmployStatus">
                        <option value="" disabled selected>Select Professor's Employment Status</option>
                        <option value="Part-Time" <?= ($profEmployStatus == "Part-Time") ? "selected" : ""; ?>>Part-Time</option>
                        <option value="Full-Time" <?= ($profEmployStatus == "Full-Time") ? "selected" : ""; ?>>Full-Time</option>
                    </select>
                </div>
            </div>

            <!-- this is where in the button will switch between "Adding" and Updating for the profs info -->
            <?php if ($prof_edit_state == false) : ?>
                <button class="add_new" type="submit" name="prof_add_new">Add New</button>
            <?php else : ?>
                <button class="add_new" type="submit" name="prof_update">Update</button>
            <?php endif ?>
        </form>
    </div>

    <!-- this is where the data will be displayed -->
    <div class="table_section">
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Ranking</th>
                    <th>Units</th>
                    <th>Employment Status</th>
                    <th>Status</th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM tb_professor");
                $i = 1;
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row["profFname"] ?></td>
                        <td><?php echo $row["profLname"] ?></td>
                        <td><?php echo $row["profRank"] ?></td>
                        <td><?php echo $row["profUnit"] ?></td>
                        <td><?php echo $row["profEmployStatus"] ?></td>
                        <td><?php
                            if ($row['profStatus'] == "1") {
                                echo "Active";
                            } else {
                                echo "Inactive";
                            } ?></td>
                        <td>
                            <div class="button-container">
                                <!-- this is the more information button -->
                                <button class="toggleDetails">+</button>

                                <!-- this is the Edit Information button -->
                                <a href="prof_index.php?prof_edit=<?php echo $row["profID"]; ?>" class="edit_btn"><button class="edit_btn"><i class='bx bx-edit-alt'></i></button></a>

                                <!-- this is for the Active or Inactive status -->
                                <form method="POST" action="prof_all_process.php">
                                    <input type="hidden" name="profID" value="<?php echo $row['profID']; ?>">
                                    <button type="submit" class="edit_btn" name="prof_toggle_status"><i class='bx bx-window-close'></i></button>
                                </form>

                            </div>

                        </td>
                    </tr>

                    <!-- this is the "more" information regarding the profs -->
                    <tr class="details hidden">
                        <td></td>
                        <td colspan="6"> <!-- Adjust the colspan to match the number of columns in your table -->
                            <table class="inner-details">
                                <tr>
                                    <td class="detail-title">Mobile No.</td>
                                    <td class="detail-content" colspan="5"><?php echo $row["profMobile"]; ?></td>
                                </tr>
                                <tr>
                                    <td class="detail-title">Address</td>
                                    <td class="detail-content" colspan="5"><?php echo $row["profAddress"]; ?></td>
                                </tr>
                                <tr>
                                    <td class="detail-title">Education</td>
                                    <td class="detail-content" colspan="5"><?php echo $row["profEduc"]; ?></td>
                                </tr>
                                <tr>
                                    <td class="detail-title">Expertise</td>
                                    <td class="detail-content" colspan="5"><?php echo $row["profExpert"]; ?></td>
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