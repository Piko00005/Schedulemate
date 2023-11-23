<?php include('../Dashboard/nav.html'); ?>

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
            <form>
                <div class="row">
                    <div class="column">
                        <label for="roomBuild">Building Name</label>
                        <input type="text" id="roomBuild" placeholder="Building Name">
                    </div>

                    <div class="column">
                        <label for="subUnits">Room Number</label>
                        <input type="number" id="roomNum" placeholder="Room Number">
                    </div>
                </div>

                <button class="add_new">Add New</button>
            </form>
        </div>

        <div class="table_section">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Building Name</th>
                        <th>Room Number</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <button class="edit_btn"><i class='bx bx-edit-alt'></i></button>
                            <button class="disable_btn"><i class='bx bx-window-close'></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>