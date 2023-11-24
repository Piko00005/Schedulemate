<?php include('../Dashboard/nav.html'); ?>

<?php
include 'room_all_process.php';
if (isset($_GET['room_edit'])) {
    $roomID = $_GET['room_edit'];
    $room_edit_state = true;
    $record = mysqli_query($conn, "SELECT * FROM tb_room WHERE roomID=$roomID");
    $data = mysqli_fetch_array($record);
    $roomBuild = $data['roomBuild'];
    $roomNum = $data['roomNum'];
    $roomStatus = $data['roomStatus'];
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
            <h1>Room List</h1>
            <div>
                <input placeholder="Search" />

            </div>
        </div>

        <div class="container">
            <form method="POST" action="room_all_process.php">
                <div class="row">
                    <div class="column">
                        <label for="roomBuild">Building Name</label>
                        <input type="text" name="roomBuild" placeholder="Building Name">
                    </div>

                    <div class="column">
                        <label for="subUnits">Room Number</label>
                        <input type="number" name="roomNum" placeholder="Room Number">
                    </div>
                </div>

                <?php if ($room_edit_state == false) : ?>
                    <button class="add_new" type="submit" name="room_add_new">Add New</button>
                <?php else : ?>
                    <button class="add_new" type="submit" name="room_update">Update</button>
                <?php endif ?>
            </form>
        </div>

        <div class="table_section">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Building Name</th>
                        <th>Room Number</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = mysqli_query($conn, "SELECT * FROM tb_room");
                    $i = 1;
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row["roomBuild"] ?></td>
                            <td><?php echo $row["roomNum"] ?></td>
                            <td><?php
                                if ($row['roomStatus'] == "1") {
                                    echo "Active";
                                } else {
                                    echo "Inactive";
                                } ?></td>
                            <td>
                                <a href="room_index.php?room_edit=<?php echo $row["roomID"]; ?>" class="edit_btn"><button class="edit_btn"><i class='bx bx-edit-alt'></i></button></a>
                                <form method="POST" action="room_all_process.php">
                                    <input type="hidden" name="roomID" value="<?php echo $row['roomID']; ?>">
                                    <button type="submit" class="edit_btn" name="room_toggle_status"><i class='bx bx-window-close'></i></button>
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