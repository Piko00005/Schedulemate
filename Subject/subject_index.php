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
            <h1>Subject List</h1>
            <div>
                <input placeholder="Search" />
                
            </div>
        </div>

        <div class="container">
            <form>
                <div class="row">
                    <div class="column">
                        <label for="subCode">Subject Code</label>
                        <input type="text" id="subCode" placeholder="Subject Code">
                    </div>

                    <div class="column">
                        <label for="subDesc">Subject Description</label>
                        <input type="text" id="subDesc" placeholder="Subject Description">
                    </div>

                    <div class="column">
                        <label for="subUnits">Subject Units</label>
                        <input type="number" id="subUnits" placeholder="Subject Units">
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <label for="subUnits">Subject Units</label>
                        <input type="number" id="subUnits" placeholder="Subject Units">
                    </div>

                    <div class="column">
                        <label for="subLabhours">Subject Lab Hours</label>
                        <input type="number" id="subLabhours" placeholder="Subject Lab Hours">
                    </div>

                    <div class="column">
                        <label for="subLechours">Subject Lec Hours</label>
                        <input type="number" id="subLechours" placeholder="Subject Lec Hours">
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
                        <th>Subject Code</th>
                        <th>Subject Description</th>
                        <th>Units</th>
                        <th>Lab Hours</th>
                        <th>Lec Hours</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
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