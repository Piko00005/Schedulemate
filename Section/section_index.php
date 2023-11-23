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
            </div>

            <div class="row">
                <div class="column">
                    <label for="secName">Section Name</label>
                    <input type="text" id="secName" placeholder="Section Name">
                </div>

                <div class="column">
                    <label for="sessName">Session</label>
                    <select id="profRank" >
                        <option value="" disabled selected>Select Section Session</option>
                        <option value="secSess1">Day</option>
                        <option value="secSess2">Night</option>
                    </select>
                </div>      
            </div>
            
            <button class="add_new">Add New</button>
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