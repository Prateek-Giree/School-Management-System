<?php
session_start();

// Redirect to index page if session dont exists
if (empty ($_SESSION['email']) || $_SESSION['role'] != 0) {
    header('location:../../public/index.php');
    exit();
} else {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin panel | Add teacher</title>
        <link rel="stylesheet" href="../css/admin_pages.css">
        <link rel="stylesheet" href="../css/admin_profile.css">
        <style>
        </style>
    </head>

    <body>
        <div class="container">
            <div class="left">
                <?php
                include_once "../includes/admin_sidebar.php";
                ?>
            </div>
            <div class="right">
                <div class="include">
                    <?php include_once "../includes/header.php"; ?>
                </div>

                <div class="newAdmin">
                    <h1 id="admin">Register new teacher</h1>
                    <form action="../process/teacher_add.php" method="post" onsubmit="return validateForm()">
                        <input type="hidden" name="urladmin" value="-1">
                        <div class="inputbox">
                            <label for="">Full Name:</label>
                            <input type="text" name="fullname" id="fullname" placeholder="Full Name"
                                onblur="nameValidation()" required>
                            <span id="nameErr"></span>
                        </div>
                        <div class="inputbox">
                            <label for="">Email:</label>
                            <input name="email" type="text" id="email" placeholder="Email" onblur="emailValidation()"
                                required>
                            <span id="emailErr"></span>
                        </div>
                        <div class="inputbox">
                            <label for="">Address:</label>
                            <input name="address" type="text" id="address" placeholder="Address"
                                onblur="addressValidation()" required>
                            <span id="addressErr"></span>
                        </div>
                        <div class="inputbox">
                            <label for="">Contact:</label>
                            <input name="contact" type="text" id="contact" placeholder="Contact"
                                onblur="contactValidation()" required>
                            <span id="contactErr"></span>
                        </div>
                        <div class="inputbox">
                            <label for="">Role:</label>
                            <input name="role" type="text" id="role" value="Teacher" readonly>
                            <span></span>
                        </div>
                        <div class="inputbox">
                            <div class="password-input">
                                <label for="">Password:</label>
                                <input name="password" type="password" id="pass" placeholder="Password"
                                    onblur="passwordValidation()" required>
                                <i class="fa-solid fa-eye" id="togglePassword"></i>
                            </div>
                            <span id="passwordErr"></span>
                        </div>
                        <div class="inputbox">
                            <div class="password-input">
                                <label for="">Confirm Password:</label>
                                <input name="cpass" type="password" id="cpass" placeholder="Confirm Password"
                                    onb="checkPass()" required>
                                <i class="fa-solid fa-eye" id="ctogglePassword"></i>
                            </div>
                            <span id="cpassErr"></span>
                        </div>
                        <div class="inputbox">
                            <input type="submit" value="Register">
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <script src="../js/script.js"></script>
        <script src="../js/validation.js"></script>
    </body>

    </html>

    <?php
}
?>