<?php
session_start();

// Redirect to index page if session dont exists
if (empty($_SESSION['email'])) {
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
        <link rel="stylesheet" href="../css/student_add.css">
        <style>
        </style>
    </head>

    <body>
        <div class="container">
            <div class="heading">
                <h1>Add students here..</h1>
            </div>
            <div class="signup">
                <form action="../process/student_add.php" method="post" onclick="return validate();">
                    <h1>Fill the form.</h1>
                    <div class="inputBox">
                        <input type="text" id="fullname" name="fullname" placeholder="Full Name" required>
                    </div>
                    <div class="inputBox">
                        <input type="text" id="" name="father" placeholder="Father's Name" required>
                    </div>
                    <div class="inputBox">
                        <input type="text" id="" name="mother" placeholder="Mother's Name" required>
                    </div>
                    <div class="inputBox">
                        <input type="number" id="class" name="class" placeholder="Class" min="1" max="10" required>
                    </div>
                    <div class="inputBox">
                        <input type="text" id="address" name="address" placeholder="Address" required>
                    </div>
                    <div class="inputBox">
                        <input type="text" id="contact" name="contact" placeholder="Contact no." required>
                    </div>
                    <div class="inputBox">
                        <input type="text" id="dob" name="dob" placeholder="Date of birth" onfocus="(this.type='date')"
                            required>
                    </div>
                    <div class="gender">
                        <label>Gender: </label>
                        <input type="radio" name="gender" value="Male" checked>
                        Male
                        <input type="radio" name="gender" value="Female">
                        Female
                        <input type="radio" name="gender" value="Others">
                        Others
                    </div>
                    <button type=" submit">Register</button>
                    <br>
                    <div class="btn">
                        <a href="../admin/admin_dashboard.php">Back to dashboard</a>
                    </div>
                </form>
            </div>
        </div>
    </body>

    </html>

    <?php
}
?>