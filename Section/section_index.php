<?php include('../Dashboard/nav.html'); ?>

<?php
include 'section_all_process.php';
if (isset($_GET['sec_edit'])) {
    $secID = $_GET['sec_edit'];
    $sec_edit_state = true;
    $record = mysqli_query($conn, "SELECT * FROM tb_section WHERE secID=$secID");
    $data = mysqli_fetch_array($record);
    $secProgram = $data['secProgram'];
    $secYearlvl = $data['secYearlvl'];
    $secName = $data['secName'];
    $secSession = $data['secSession'];
    $secStatus = $data['secStatus'];
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
            <h1>Section List</h1>
            <div>
                <input placeholder="Search" />
            </div>
        </div>

        <div class="container">

            <form method="POST" action="section_all_process.php">
                <input type="hidden" name="sectionID" value="<?php echo $sectionID; ?>">
                <input type="hidden" name="sectionStatus" value="<?php echo $sectionStatus; ?>">

                <div class="row">
                    <div class="column">
                        <label for="secProgram">Section Program</label>
                        <input type="text" name="secProgram" placeholder="Section Program" value="<?php echo $secProgram ?>">
                    </div>

                    <div class="column">
                        <label for="secYearlvl">Section Year Level</label>
                        <input type="number" name="secYearlvl" placeholder="Section Year Level" value="<?php echo $secYearlvl ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <label for="secName">Section Name</label>
                        <input type="text" name="secName" placeholder="Section Name" value="<?php echo $secName ?>">
                    </div>

                    <div class="column">
                        <label for="secSession">Session</label>
                        <select name="secSession">
                            <option value="" disabled selected>Select Section Session</option>
                            <option value="Day" <?= ($secSession == "Day") ? "selected" : ""; ?>>Day</option>
                            <option value="Night" <?= ($secSession == "Night") ? "selected" : ""; ?>>Night</option>
                        </select>
                    </div>
                </div>

                <!-- switch to editable -->
                <?php if ($sec_edit_state == false) : ?>
                    <button class="add_new" type="submit" name="sec_add_new">Add New</button>
                <?php else : ?>
                    <button class="add_new" type="submit" name="sec_update">Update</button>
                <?php endif ?>
            </form>
        </div>

        <div class="table_section">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Program</th>
                        <th>Year Level</th>
                        <th>Section Name</th>
                        <th>Session</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = mysqli_query($conn, "SELECT * FROM tb_section");
                    $i = 1;
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row["secProgram"] ?></td>
                            <td><?php echo $row["secYearlvl"] ?></td>
                            <td><?php echo $row["secName"] ?></td>
                            <td><?php echo $row["secSession"] ?></td>
                            <td><?php
                                if ($row['secStatus'] == "1") {
                                    echo "Active";
                                } else {
                                    echo "Inactive";
                                } ?></td>
                            <td>
                                <a href="section_index.php?sec_edit=<?php echo $row["secID"]; ?>" class="edit_btn"><button class="edit_btn"><i class='bx bx-edit-alt'></i></button></a>
                                <form method="POST" action="section_all_process.php">
                                    <input type="hidden" name="secID" value="<?php echo $row['secID']; ?>">
                                    <button type="submit" class="edit_btn" name="sec_toggle_status"><i class='bx bx-window-close'></i></button>
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