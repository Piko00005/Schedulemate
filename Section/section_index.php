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
            <h1>Section List</h1>
            <div>
                <input placeholder="Search" />
                <button class="add_new">Add New</button>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="column">
                    <label for="secProgram">Section Program</label>
                    <input type="text" id="secProgram" placeholder="Section Program">
                </div>

                <div class="column">
                    <label for="secYearlvl">Section Year Level</label>
                    <input type="number" id="secYearlvl" placeholder="Section Year Level">
                </div>

                <div class="column">
                    <label for="secName">Section Name</label>
                    <input type="text" id="secName" placeholder="Section Name">
                </div>
            </div>

            <div class="row">
                <div class="column">
                    <form>
                        <label for="secSess">Section Session</label>

                        <input type="radio" id="secSess" value="Day">
                        <label for="day">Day</label> <br>
                        <input type="radio" id="secSess" value="Night">
                        <label for="night">Night</label> <br>
                    </form>
                </div>
            </div>
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