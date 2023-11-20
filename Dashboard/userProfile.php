<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings</title>
    <link rel="stylesheet" href="userProfile.css">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="home.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!--FontAwesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    </script>
</head>
<header class="header">
        <img src="images/logo.png" alt="">
        <a href="home.php" class="logo">ScheduleMate</a>

        <input type="checkbox" id="check">

        <label for="check" class="icons">
            <i class='bx bx-menu' id="menu-icon"></i>
            <i class='bx bx-x' id="close-icon"></i>
        </label>

        <nav class="navbar">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="#">Schedule</a></li>
                <li>
                    <a href="#">Entries</a>
                    <ul>
                        <li><a href="#">Section</a></li>
                        <li><a href="#">Professor</a></li>
                        <li><a href="#">Subject</a></li>
                        <li><a href="#">Room</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Reports</a>
                    <ul>
                        <li><a href="#">PBS</a></li>
                        <li><a href="#">PBT</a></li>
                        <li><a href="#">PBRU</a></li>
                    </ul>
                </li>
                <li><a href="#">User Profile</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </nav>
    </header>
<body>
    <div class="container light-style flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-4">
            Account settings
        </h4>
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-change-password">Change password</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <div class="card-body media align-items-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt
                                    class="d-block ui-w-80">
                                <div class="media-body ml-4">
                                    <label class="btn btn-outline-primary">
                                        Upload new photo
                                        <input type="file" class="account-settings-fileinput">
                                    </label> &nbsp;
                                    <button type="button" class="btn btn-default md-btn-flat">Reset</button>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control mb-1" value=" ">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" value=" ">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">E-mail</label>
                                    <input type="text" class="form-control mb-1" value=" ">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Position</label>
                                    <select class="custom-select">
                                        <option>Admin</option>
                                        <option>Chairperson</option>
                                        <option>Dean</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Program</label>
                                    <select class="custom-select">
                                        <option>BSIT</option>
                                        <option>BSIS</option>
                                        <option>BIT-CT</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Department</label>
                                    <select class="custom-select">
                                        <option>CCICT</option>
                                        <option>CAS</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Current password</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">New password</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Repeat new password</label>
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                        </div>
        <div class="text-right mt-3" style="margin-bottom: 30px; margin-right: 30px;">
            <button type="button" class="btn btn-primary">Save changes</button>&nbsp;
            <button type="button" class="btn btn-default">Cancel</button>
        </div>
    </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">

    </script>
</body>

</html>