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
        <title>Register Teacher</title>
        <link rel="stylesheet" href="../css/teacher_add.css">
    </head>

    <body>
        <div class="container">
            <div class="content">
                <h1>Register new teacher or<br> admin here.</h1>
            </div>
            <div class="signup">
                <form action="../process/teacher_add.php" method="post" onclick="return validate();">
                    <h1>Register Teacher</h1>
                    <div class="inputBox">
                        <input name="fullname" type="text" id="fullname" placeholder="Full Name" required>
                    </div>
                    <div class="inputBox">
                        <input name="email" type="text" id="email" placeholder="Email" required>
                    </div>
                    <div class="inputBox">
                        <input name="address" type="text" id="address" placeholder="Address" required>
                    </div>
                    <div class="inputBox">
                        <input name="contact" type="text" id='contact' placeholder="Contact" required>
                    </div>
                    <div class="role">
                        <label>Role: </label>
                        <input type="radio" name="role" value="0">
                        Admin
                        <input type="radio" name="role" value="1" checked>
                        Teacher
                    </div>

                    <div class="inputBox">
                        <input name="password" type="password" id="password" placeholder="Password" required>
                    </div>
                    <div class="inputBox">
                        <input type="password" name="cpass" id="cpassword" placeholder="Confirm Password" required>
                    </div>


                    <button type="submit">Register</button>

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