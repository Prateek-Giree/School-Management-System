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
        <title>Admin panel | Add student</title>
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
                    <h1 id="admin">Register new student</h1>
                    <form action="../process/student_add.php" method="post" onsubmit="return validateStudentForm()">
                        <div class="inputbox">
                            <label for="">Full Name:</label>
                            <input type="text" name="fullname" id="fullname" placeholder="Full Name"
                                onblur="nameValidation('fullname','nameErr')" required>
                            <span id="nameErr"></span>
                        </div>
                        <div class="inputbox">
                            <label for="">Roll no.:</label>
                            <input type="number" name="roll" id="roll" placeholder="Role number" required min="1">
                            <span></span>
                        </div>
                        <div class="inputbox">
                            <label for="">Father's name:</label>
                            <input name="father" type="text" id="father" placeholder="Father's name"
                                onblur="nameValidation('father','fNameErr')" required>
                            <span id="fNameErr"></span>
                        </div>
                        <div class="inputbox">
                            <label for="">Mother's name:</label>
                            <input name="mother" type="text" id="mother" onblur="nameValidation('mother','mNameErr')"
                                placeholder="Mother's name" required>
                            <span id="mNameErr"></span>
                        </div>
                        <div class="inputbox">
                            <label for="">Class:</label>
                            <input name="class" type="number" id="class" placeholder="Class" required min="1" max="10">
                            <span></span>
                        </div>
                        <div class="inputbox">
                            <label for="">Address:</label>
                            <input name="address" type="text" id="address" onblur="addressValidation('address','addressErr')"
                                placeholder="Address" required>
                            <span id="addressErr"></span>
                        </div>
                        <div class="inputbox">
                            <label for="">Contact no.:</label>
                            <input name="contact" type="text" id="contact" oninput="limitContactLength(this)"   
                                onblur="contactValidation('contact','contactErr')" placeholder="Contact number" required>
                            <span id="contactErr"></span>
                        </div>
                        <div class="inputbox">
                            <label for="">Date of birth:</label>
                            <input name="dob" type="date" id="dob" onblur="dobValidation('dob','dobErr')"
                                placeholder="Date of birth" required>
                            <span id="dobErr"></span>
                        </div>
                        <div class="inputbox">
                            <label for="">Gender:</label>
                            <select name="gender" id="gender" required>
                                <option value="" disabled selected>Select a gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Others">Others</option>
                            </select>
                            <span></span>
                        </div>
                        <div class="inputbox">
                            <input type="submit" value="Add">
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <script src="../js/validation.js"></script>
    </body>

    </html>

    <?php
}
?>