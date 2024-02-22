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
        $sql = "select * from student where sid=$id ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>

            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Admin panel | Edit student</title>
                <link rel="stylesheet" href="../css/student_add.css">
                <style>
                </style>
            </head>

            <body>
                <div class="container">
                    <div class="heading">
                        <h1>Enter new details.</h1>
                    </div>
                    <div class="signup">
                        <form action="student_update.php" method="post" onclick="return validate();">
                            <h1>Fill the form.</h1>
                            <input name="id" type="hidden" value="<?php echo $row['sid']; ?>">
                            <div class="inputBox">
                                <input type="text" id="fullname" name="fullname" value="<?php echo $row['name'] ?>"
                                    placeholder="Full Name" required>
                            </div>
                            <div class="inputBox">
                                <input type="text" id="" name="father" value="<?php echo $row['father'] ?>"
                                    placeholder="Father's Name" required>
                            </div>
                            <div class="inputBox">
                                <input type="text" id="" name="mother" value="<?php echo $row['mother'] ?>"
                                    placeholder="Mother's Name" required>
                            </div>
                            <div class="inputBox">
                                <input type="number" id="class" name="class" value="<?php echo $row['class'] ?>" placeholder="Class"
                                    min="1" max="10" required>
                            </div>
                            <div class="inputBox">
                                <input type="text" id="address" name="address" value="<?php echo $row['address'] ?>"
                                    placeholder="Address" required>
                            </div>
                            <div class="inputBox">
                                <input type="text" id="contact" name="contact" value="<?php echo $row['contact'] ?>"
                                    placeholder="Contact no." required>
                            </div>
                            <div class="inputBox">
                                <input type="text" id="dob" name="dob" value="<?php echo $row['dob'] ?>" placeholder="Date of birth"
                                    onfocus="(this.type='date')" required>
                            </div>
                            <div class="gender">
                                <label>Gender: </label>
                                <input type="radio" name="gender" value="Male" <?php echo ($row['gender'] == 'Male') ? 'checked' : ''; ?>>
                                Male
                                <input type="radio" name="gender" value="Female" <?php echo ($row['gender'] == 'Female') ? 'checked' : ''; ?>>
                                Female
                                <input type="radio" name="gender" value="Others" <?php echo ($row['gender'] == 'Others') ? 'checked' : ''; ?>>
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
            $conn->close();
        } else {
            header("Location:../admin/admin_dashboard.php");
        }
    }
}
?>