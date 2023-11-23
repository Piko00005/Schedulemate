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
            <h1>Schedule</h1>
            <div>
                <input placeholder="Search" />
                
            </div>
        </div>

        <div class="container">
            <form>
                
                <div class="row">
                    <div class="column">
                        <label for="plotSub">Subject</label>
                        <select id="plotSub" >
                            <option value="" disabled selected>Select Subject</option>
                            <option value="sub1">Subject 1</option>
                        </select>
                    </div>

                    <div class="column">
                        <label for="plotSection">Section</label>
                        <select id="plotSection" >
                            <option value="" disabled selected>Select Section</option>
                            <option value="section1">Section 1</option>
                        </select>
                    </div>

                    <div class="column">
                        <label for="plotRoom">Room</label>
                        <select id="plotRoom" >
                            <option value="" disabled selected>Select Room</option>
                            <option value="room1">Room 1</option>
                        </select>
                    </div>

                </div>

                <div class="row">

                    <div class="column">
                        <label for="timeStart">Time Starts</label>
                        <input type="time" id="timeStart">
                    </div>

                    <div class="column">
                        <label for="timeEnd">Time Ends</label>
                        <input type="time" id="timeEnd">
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