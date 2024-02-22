<?php
session_start();

// Redirect to index page if session dont exists
if (empty($_SESSION['email'])) {
    header('location:../../public/index.php');
    exit();
} else {
    include "../includes/connection.php";
    if (isset($_REQUEST['id'])) {
        $id = $_REQUEST['id'];
        $sql = "select * from user where uid=$id ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Admin Panel | Edit teacher</title>
                <link rel="stylesheet" href="../css/teacher_add.css">
            </head>

            <body>
                <div class="container">
                    <div class="content">
                        <h1>Enter new details.</h1>
                    </div>
                    <div class="signup">
                        <form action="teacher_update.php" method="post" onclick="return validate();">
                            <h1>Register Teacher</h1>
                            <input name="id" type="hidden" value="<?php echo $row['uid']; ?>">
                            <div class="inputBox">
                                <input name="fullname" type="text" id="fullname" value="<?php echo $row['name']; ?>"
                                    placeholder="Full Name" required>
                            </div>
                            <div class="inputBox">
                                <input name="email" type="text" id="email" value="<?php echo $row['email']; ?>" placeholder="Email"
                                    required>
                            </div>
                            <div class="inputBox">
                                <input name="address" type="text" id="address" value="<?php echo $row['address']; ?>"
                                    placeholder="Address" required>
                            </div>
                            <div class="inputBox">
                                <input name="contact" type="text" id='contact' value="<?php echo $row['contact']; ?>"
                                    placeholder="Contact" required>
                            </div>
                            <!-- <div class="role">
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
                            </div> -->


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
            $conn->close();

        }
    } else {
        header("Location: ../admin/admin_dashboard.php");
        exit();
    }
}
?>