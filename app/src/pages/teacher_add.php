<?php
session_start();

// Redirect to index page if session dont exists
if (empty($_SESSION['email'])|| $_SESSION['role'] != 0) {
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
                    <form action="../process/teacher_add.php" method="post">
                        <input type="hidden" name="urladmin" value="-1">
                        <div class="inputbox">
                            <label for="">Full Name:</label>
                            <input type="text" name="fullname" id="fullname" placeholder="Full Name" required>
                            <span></span>
                        </div>
                        <div class="inputbox">
                            <label for="">Email:</label>
                            <input name="email" type="text" id="email" placeholder="Email" required>
                            <span></span>
                        </div>
                        <div class="inputbox">
                            <label for="">Address:</label>
                            <input name="address" type="text" id="address" placeholder="Address" required>
                            <span></span>
                        </div>
                        <div class="inputbox">
                            <label for="">Contact:</label>
                            <input name="contact" type="text" id="contact" placeholder="Contact" required>
                            <span></span>
                        </div>
                        <div class="inputbox">
                            <label for="">Role:</label>
                            <input name="role" type="text" id="role" value="Teacher" readonly>
                            <span></span>
                        </div>
                        <div class="inputbox">
                            <label for="">Password:</label>
                            <input name="password" type="password" id="password" placeholder="Password" required>
                            <span></span>
                        </div>
                        <div class="inputbox">
                            <label for="">Confirm Password:</label>
                            <input name="cpass" type="password" id="cpassword" placeholder="Confirm Password" required>
                            <span></span>
                        </div>
                        <div class="inputbox">
                            <input type="submit" value="Register">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </body>

    </html>

    <?php
}
?>