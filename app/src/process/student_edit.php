<?php
session_start();

// Redirect to index page if session dont exists
if (empty($_SESSION['email'])|| $_SESSION['role'] != 0) {
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
                            <h1>Update student records</h1>
                            <form action="../process/student_update.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['sid']; ?>">
                                <!-- If student data id edited via class page -->
                                <input type="hidden" name="class_id" value="<?php if (isset($_REQUEST['class_id'])) {
                                    echo $_REQUEST['class_id'];  } 
                                    ?>">
                               
                                <div class="inputbox">
                                    <label for="">Full Name:</label>
                                    <input type="text" name="fullname" id="fullname" placeholder="Full Name"
                                        value="<?php echo $row['name'] ?>" required>
                                    <span></span>
                                </div>
                                <div class="inputbox">
                                    <label for="">Roll no.:</label>
                                    <input type="number" name="roll" id="roll" placeholder="Role number"
                                        value="<?php echo $row['roll'] ?>" required min="1">
                                    <span></span>
                                </div>
                                <div class="inputbox">
                                    <label for="">Father's name:</label>
                                    <input name="father" type="text" id="father" placeholder="Father's name"
                                        value="<?php echo $row['father'] ?>" required>
                                    <span></span>
                                </div>
                                <div class="inputbox">
                                    <label for="">Mother's name:</label>
                                    <input name="mother" type="text" id="mother" placeholder="Mother's name"
                                        value="<?php echo $row['mother'] ?>" required>
                                    <span></span>
                                </div>
                                <div class="inputbox">
                                    <label for="">Class:</label>
                                    <input name="class" type="number" id="class" placeholder="Class"
                                        value="<?php echo $row['class'] ?>" required min="1" max="10">
                                    <span></span>
                                </div>
                                <div class="inputbox">
                                    <label for="">Address:</label>
                                    <input name="address" type="text" id="address" placeholder="Address"
                                        value="<?php echo $row['address'] ?>" required>
                                    <span></span>
                                </div>
                                <div class="inputbox">
                                    <label for="">Contact no.:</label>
                                    <input name="contact" type="text" id="contact" placeholder="Contact number"
                                        value="<?php echo $row['contact'] ?>" required>
                                    <span></span>
                                </div>
                                <div class="inputbox">
                                    <label for="">Date of birth:</label>
                                    <input name="dob" type="date" id="dob" placeholder="Date of birth"
                                        value="<?php echo $row['dob'] ?>" required>
                                    <span></span>
                                </div>
                                <div class="inputbox">
                                    <label for="">Gender:</label>
                                    <select name="gender" id="gender" required>
                                        <option value="" disabled selected>Select a gender</option>
                                        <option value="Male" <?php echo (strtolower($row['gender']) == "male") ? 'selected' : ""; ?>>
                                            Male
                                        </option>
                                        <option value="Female" <?php echo (strtolower($row['gender']) == "female") ? 'selected' : ""; ?>>
                                            Female</option>
                                        <option value="Others" <?php echo (strtolower($row['gender'])=="others")? 'selected':"";?>>Others</option>
                                    </select>
                                    <span></span>
                                </div>
                                <div class="inputbox">
                                    <input type="submit" value="Update">
                                </div>
                            </form>
                        </div>

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