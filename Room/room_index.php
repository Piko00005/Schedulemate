<?php include('../Dashboard/nav.html'); ?>

<?php
include 'room_all_process.php';
if (isset($_GET['room_edit'])) {
    $roomID = $_GET['room_edit'];
    $room_edit_state = true;
    $record = mysqli_query($conn, "SELECT * FROM tb_room WHERE roomID=$roomID");
    $data = mysqli_fetch_array($record);
    $roomBuild = $data['roomBuild'];
    $roomFloornum = $data['roomFloornum'];
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

        <div class="container">
            <form method="POST" action="room_all_process.php">
                <input type="hidden" name="roomID" value="<?php echo $roomID; ?>">
                <input type="hidden" name="roomStatus" value="<?php echo $roomStatus; ?>">
                <div class="row">
                    <div class="column">
                        <label for="roomBuild">Building Name</label>
                        <input type="text" name="roomBuild" placeholder="Building Name" value="<?php echo $roomBuild; ?>">
                    </div>

                    <div class="column">
                        <label for="roomFloornum">Floor Number</label>
                        <input type="number" name="roomFloornum" placeholder="Floor Number" value="<?php echo $roomFloornum; ?>">
                    </div>

                    <div class="column">
                        <label for="roomNum">Room Number</label>
                        <input type="number" name="roomNum" placeholder="Room Number" value="<?php echo $roomNum; ?>">
                    </div>
                </div>

                <?php if ($room_edit_state == false) : ?>
                    <button class="add_new" type="submit" name="room_add_new">Add New</button>
                <?php else : ?>
                    <button class="add_new" type="submit" name="room_update">Update</button>
                <?php endif ?>
            </form>
        </div>

        <!-- Grid View -->
        <div class="table_section">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Building Name</th>
                        <th>Floor Number</th>
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
                            <td><?php echo $row["roomFloornum"] ?>th Floor</td>
                            <td><?php echo $row["roomNum"] ?></td>
                            <td><?php
                                if ($row['roomStatus'] == "1") {
                                    echo "Active";
                                } else {
                                    echo "Inactive";
                                } ?></td>


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