<?php include('../Dashboard/nav.html'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../Dashboard/nav.css">
    <link rel="stylesheet" href="../Professor/tb.css">

</head>
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

    <!--- Input Fields --->
    <div class="container">
        <form>
            <div class="row">
                <div class="column">
                    <label for="profFname">Firstname</label>
                    <input type="text" id="profFname" placeholder="Firstname">
                </div>

                <div class="column">
                    <label for="profLname">Lastname</label>
                    <input type="text" id="profLname" placeholder="Firstname">
                </div>

                <div class="column">
                    <label for="profMobile">Mobile No.</label>
                    <input type="text" id="profMobile" placeholder="Mobile No.">
                </div>
            </div>

            <div class="row">
                <div class="column">
                    <label for="profAddress">Address</label>
                    <textarea id="profAddress" rows="3" placeholder="Address"></textarea>
                </div>

                <div class="column">
                    <label for="profEduc">Education Attainment</label>
                    <textarea id="profEduc" rows="3" placeholder="Educational Attainment"></textarea>
                </div>

                <div class="column">
                    <label for="profExpert">Expertise or Specialization</label>
                    <textarea id="profExpert" rows="3" placeholder="Expertise or Specialization"></textarea>
                </div>
            </div>

            <div class="row">
                <div class="column">
                    <label for="profRank">Professors Rank</label>
                    <select id="profRank" >
                        <option value="" disabled selected>Select Professors Rank</option>
                        <option value="instruc1">Instructor 1</option>
                        <option value="instruc2">Instructor 2</option>
                        <option value="instruc3">Instructor 3</option>
                        <option value="instruc4">Instructor 4</option>
                        <option value="instruc5">Instructor 5</option>
                        <option value="instruc6">Instructor 6</option>
                        <option value="instruc7">Instructor 7</option>
                        <option value="assprof1">Assistant Prof. 1</option>
                        <option value="assprof2">Assistant Prof. 2</option>
                        <option value="assprof3">Assistant Prof. 3</option>
                        <option value="assprof4">Assistant Prof. 4</option>
                        <option value="assprof5">Assistant Prof. 5</option>
                        <option value="assprof6">Assistant Prof. 6</option>
                        <option value="assprof7">Assistant Prof. 7</option>
                        <option value="assoprof1">Associate Prof. 1</option>
                        <option value="assoprof2">Associate Prof. 2</option>
                        <option value="assoprof3">Associate Prof. 3</option>
                        <option value="assoprof4">Associate Prof. 4</option>
                        <option value="assoprof5">Associate Prof. 5</option>
                        <option value="assoprof6">Associate Prof. 6</option>
                        <option value="assoprof7">Associate Prof. 7</option>
                        <option value="prof1">Professor 1</option>
                        <option value="prof1">Professor 2</option>
                        <option value="prof1">Professor 3</option>
                        <option value="prof1">Professor 4</option>
                        <option value="prof1">Professor 5</option>
                        <option value="prof1">Professor 6</option>
                        <option value="prof1">Professor 7</option>
                        <option value="prof1">Professor 8</option>
                        <option value="prof1">Professor 9</option>
                        <option value="prof1">Professor 10</option>
                        <option value="prof1">Professor 11</option>
                        <option value="prof1">Professor 12</option>
                        <option value="univprof">Univ. Professor</option>
                    </select>
                </div>

                <div class="column">
                    <label for="profUnits">Units</label>
                    <input type="number" id="profMobile" placeholder="Professor's Units">
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
                    <th></th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Mobile No.</th>
                    <th>Address</th>
                    <th>Expertise</th>
                    <th>Education</th>
                    <th>Ranking</th>
                    <th>Units</th>
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