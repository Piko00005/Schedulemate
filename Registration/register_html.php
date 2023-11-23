<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=">
    <link rel="stylesheet" href="register.css">

    <!--- Bootstrap 5 --->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Responsive Login and Registration Form</title>
</head>

<body>

    <section>
        <div class="container">
            <div class="user signinBox">

                <div class="imgBox">
                    <img src="../images/login.png" alt="">
                </div>
                <div class="formBox">
                    <form action="login_backend.php" method="post">

                        <h2>Sign In</h2>
                        <input type="text" name="userEmail" placeholder="Email" required>
                        <input type="password" name="userPass" placeholder="Password" required>
                        <button type="submit" name="login">Login</button>
                        <p class="signup">Don't have an account? <a href="#">Register.</a></p>
                    </form>

                </div>
            </div>


            <div class="user signupBox">
                <div class="formBox">
                    <form action="register_backend.php" method="post">
                        <h2>Create an account</h2>
                        <input type="text" name="userFname" placeholder="First Name" required>
                        <input type="text" name="userLname" placeholder="Last Name" required>
                        <input type="email" name="userEmail" placeholder="Email" required>
                        <select class="input-field" name="userSchool" required>
                            <option value="" disabled selected>Select School</option>
                            <option value="main">CTU Main-Campus</option>
                            <option value="danao">CTU Danao Campus</option>
                            <option value="argao">CTU Argao</option>
                        </select>
                        <select name="userPosition" required>
                            <option value="" disabled selected>Select School Position</option>
                            <option value="admin">School Admin</option>
                            <option value="dean">Dean</option>
                            <option value="chairperson">Chairperson</option>
                        </select>
                        <select name="userDept" required>
                            <option value="" disabled selected>Select Department</option>
                            <option value="ccict">CCICT</option>
                            <option value="cas">CAS</option>
                        </select>
                        <select name="userProgram" required>
                            <option value="" disabled selected>Select Program</option>
                            <option value="bsit">BSIT</option>
                            <option value="bsis">BSIS</option>
                            <option value="bit-ct">BIT-CT</option>
                            <option value="cas">CAS</option>
                        </select>

                        <input type="password" name="userPass" placeholder="Create Password" required>
                        <input type="password" name="userPasscon" placeholder="Confirm Password" required>
                        <button type="submit" name="submit">Register</button>
                        <p class="signup">Already have an account? <a href="#">Sign In.</a></p>
                    </form>
                </div>

                <div class="imgBox">
                    <img src="../images/register.png" alt="">
                </div>
            </div>
        </div>
    </section>

    <script>
        const toggleForm = () => {
            const container = document.querySelector(".container");
            const section = document.querySelector("section");

            if (container.classList.contains("active")) {
                container.classList.remove("active");
                section.setAttribute("style", "background-color: #00224E")
                return;
            }
            container.classList.add("active");
            section.setAttribute("style", "background-color: #e59426");
        }

        const toggleLinks = Array.from(document.querySelectorAll(".signup a"));

        toggleLinks.forEach(toggleLink => {
            toggleLink.addEventListener("click", toggleForm)
        })
    </script>

    <?php 
    
    //session
    
    if (isset($_SESSION["success"])) {
        if ($_SESSION["success"] == 1) {
            echo '<script>alert("Registered successfully!");</script>';
            $_SESSION["success"] = null;
        } else {
            echo '<script>alert("Login successfully!");</script>';
            $_SESSION["success"] = null;
        }
    }

    if (isset($_SESSION["errors"])) {
        foreach ($_SESSION["errors"] as $error) {
            echo "<script>alert('" . $error . "');</script>";
        }
        $_SESSION["errors"] = null;
    }
    ?>
</body>

</html>