<?php include('../Dashboard/nav.html'); ?>
<link rel="stylesheet" href="css/tb.css" />


<body>
<head>
    <link rel="stylesheet" href="../Dashboard/nav.css">
    <link rel="stylesheet" href="../Professor/tb.css">
    <link rel="stylesheet" href="home.css">
</head>

    <div class="table">
        <div class="table_header">
            <h1>Program by Section</h1>

            <div id>
                <input type="text" placeholder="Search" />
            </div>

            <div>
                <select id="filter">
                    <option value="" disabled selected>Sort By</option>
                    <option value="sy">School Year</option>
                    <option value="ylvl">Year Level</option>
                    <option value="sem">Semester</option>
                </select>
            </div>
        </div>

        <div class="table_section">
            <table>
                <thead>
                    <tr>
                        <th>School Year</th>
                        <th>Semester</th>
                        <th>Subject</th>
                        <th>Section</th>
                        <th>Room</th>
                        <th>Professor</th>
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
                            <button class="view_btn"><i class='bx bx-window-open'></i></button>
                            <button class="disable_btn"><i class='bx bx-window-close'></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>