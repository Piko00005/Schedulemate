<?php include('../Dashboard/nav.html'); ?>

<?php
include 'subject_all_process.php';
if (isset($_GET['sub_edit'])) {
    $subID = $_GET['sub_edit'];
    $sub_edit_state = true;
    $record = mysqli_query($conn, "SELECT * FROM tb_subjects WHERE subID=$subID");
    $data = mysqli_fetch_array($record);
    $subCode = $data['subCode'];
    $subDesc = $data['subDesc'];
    $subUnits = $data['subUnits'];
    $subLabhours = $data['subLabhours'];
    $subLechours = $data['subLechours'];
    $subStatus = $data['subStatus'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../Dashboard/nav.css">
    <link rel="stylesheet" href="../Professor/tb.css">
</head>

<body>
    <?php if (isset($_SESSION['message'])) : ?>
        <div class="message">
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
        </div>
    <?php endif ?>

    <div class="table">
        <div class="table_header">
            <h1>Subject List</h1>
            <div>
                <input placeholder="Search" />
            </div>
        </div>

        <div class="container">
            <form method="POST" action="subject_all_process.php">


                <input type="hidden" name="subjectID" value="<?php echo $subjectID; ?>">
                <input type="hidden" name="subjectStatus" value="<?php echo $subjectStatus; ?>">


                <div class="row">
                    <div class="column">
                        <label for="subCode">Subject Code</label>
                        <input type="text" name="subCode" placeholder="Subject Code" value="<?php echo $subCode ?>">
                    </div>

                    <div class="column">
                        <label for="subDesc">Subject Description</label>
                        <input type="text" name="subDesc" placeholder="Subject Description" value="<?php echo $subDesc ?>">
                    </div>

                    <div class="column">
                        <label for="subUnits">Subject Units</label>
                        <input type="number" name="subUnits" placeholder="Subject Units" value="<?php echo $subUnits ?>">
                    </div>
                </div>

                <div class="row">

                    <div class="column">
                        <label for="subLabhours">Subject Lab Hours</label>
                        <input type="number" name="subLabhours" placeholder="Subject Lab Hours" value="<?php echo $subLabhours ?>">
                    </div>

                    <div class="column">
                        <label for="subLechours">Subject Lec Hours</label>
                        <input type="number" name="subLechours" placeholder="Subject Lec Hours" value="<?php echo $subLechours ?>">
                    </div>
                </div>

                <?php if ($sub_edit_state == false) : ?>
                    <button class="add_new" type="submit" name="sub_add_new">Add New</button>
                <?php else : ?>
                    <button class="add_new" type="submit" name="sub_update">Update</button>
                <?php endif ?>
            </form>
        </div>

        <div class="table_section">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Subject Code</th>
                        <th>Subject Description</th>
                        <th>Units</th>
                        <th>Lab Hours</th>
                        <th>Lec Hours</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = mysqli_query($conn, "SELECT * FROM tb_subjects");
                    $i = 1;
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row["subCode"] ?></td>
                            <td><?php echo $row["subDesc"] ?></td>
                            <td><?php echo $row["subUnits"] ?></td>
                            <td><?php echo $row["subLabhours"] ?></td>
                            <td><?php echo $row["subLechours"] ?></td>
                            <td><?php
                                if ($row['subStatus'] == "1") {
                                    echo "Active";
                                } else {
                                    echo "Inactive";
                                } ?></td>
                            <td>
                                <a href="subject_index.php?sub_edit=<?php echo $row["subID"]; ?>" class="edit_btn"><button class="edit_btn"><i class='bx bx-edit-alt'></i></button></a>
                                <form method="POST" action="subject_all_process.php">
                                    <input type="hidden" name="subID" value="<?php echo $row['subID']; ?>">
                                    <button type="submit" class="edit_btn" name="sub_toggle_status"><i class='bx bx-window-close'></i></button>
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