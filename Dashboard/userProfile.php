<?php include('../Dashboard/nav.html'); 
session_start();

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
            <h1>User Profile</h1>
        </div>
        
        <div class="container">
            <div class="row">
                <div class="column">
                    <label for="userFname">First Name</label>
                    <input type="text" name="" placeholder="First Name" value="">
                </div>

                <div class="column">
                <label for="userLname">Last Name</label>
                    <input type="text" name="" placeholder="Last Name" value="">
                </div>

                <div class="column">
                    <label for="secName">Email</label>
                    <input type="text" name="" placeholder="Email" value="">
                </div>
            </div>

            <div class="row">
                <div class="column">
                    <label class="form-label">School</label>
                        <select name="" class="custom-select">
                            <option>Main Campus</option>
                        </select>
                </div> 
                
                <div class="column">
                    <label class="form-label">Position</label>
                        <select class="custom-select">
                            <option>Admin</option>
                            <option>Chairperson</option>
                            <option>Dean</option>
                        </select>
                </div>  
                
                <div class="column">
                    <label class="form-label">Department</label>
                        <select class="custom-select">
                            <option>CCICT</option>
                            <option>CAS</option>
                        </select>
                </div>   
            </div>

            <div class="row">
                <div class="column">
                    <label class="form-label">Program</label>
                        <select class="custom-select">
                            <option>BSIT</option>
                            <option>BSIS</option>
                            <option>BIT-CT</option>
                        </select>
                </div> 

                <div class="column">
                        <label for="currPass">Current Password</label>
                        <input type="password" name="" value="">
                </div> 

                <div class="column">
                        <label for="userPass">New Password</label>
                        <input type="password" name="" value="">
                </div> 
            </div>
            
            <button class="add_new">Edit Profile</button>
        </div>
        </form>
    </div>
</body>
</html>