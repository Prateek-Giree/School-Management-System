<?php
session_start();

// Redirect to index page if session dont exists
if (empty ($_SESSION['email']) || $_SESSION['role'] != 1) {
    header('location:../../public/index.php');
    exit();
} else {
    include_once "../includes/connection.php";

    //for currently logged in admin
    $query = "SELECT * FROM user WHERE email=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $_SESSION['email']);
    $stmt->execute();
    $result_set = $stmt->get_result();
    $data = $result_set->fetch_assoc();
    $stmt->close();

    //for deleting other admin
    $query1 = "SELECT * FROM user where role=0";
    $result_set = $conn->query($query1);
    $conn->close();
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/admin_pages.css">
        <link rel="stylesheet" href="../css/admin_profile.css">
        <link rel="stylesheet" href="../css/view_table.css">
        <title>Teacher Panel | Teacher profile</title>
    </head>

    <body>
        <div class="container">
            <div class="left">
                <?php
                include_once "../includes/teacher_sidebar.php";
                ?>
            </div>
            <div class="right">
                <div class="include">
                    <?php include_once "../includes/teacher_header.php"; ?>
                </div>
                <div class="info">
                    <h1>My information</h1>
                    <div class="details">
                        <div class="show">
                            <h3>Personal details</h3>
                            <span>Name:
                                <?php echo $data['name']; ?>
                            </span>
                            <span>Email:
                                <?php echo $data['email']; ?>
                            </span>
                            <span>Address:
                                <?php echo $data['address']; ?>
                            </span>
                            <span>Contact:
                                <?php echo $data['contact']; ?>
                            </span>
                        </div>
                        <div class="line"></div>

                        <div class="update">
                            <h3>Update details</h3>
                            <form action="../process/teacher_update.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $data['uid']; ?>">
                                <div class="inputbox">
                                    <label for="">Full Name:</label>
                                    <input name="fullname" type="text" value="<?php echo $data['name']; ?>">
                                    <span id="nameErr"></span>
                                </div>
                                <div class="inputbox">
                                    <label for="">Email:</label>
                                    <input name="email" type="text" value="<?php echo $data['email']; ?>">
                                    <span id="emailErr"></span>
                                </div>
                                <div class="inputbox">
                                    <label for="">Address:</label>
                                    <input name="address" type="text" value="<?php echo $data['address']; ?>">
                                    <span id="addressErr"></span>
                                </div>
                                <div class="inputbox">
                                    <label for="">Contact no.:</label>
                                    <input name="contact" type="text" value="<?php echo $data['contact']; ?>">
                                    <span id="contactErr"></span>
                                </div>
                                <div class="inputbox">
                                    <input type="submit" value="Update">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="password" id="password">
                    <h1>Change Password</h1>
                    <form action="../process/change_password.php" method="post">
                        <div class="inputbox">
                            <label for="">Old Password:</label>
                            <input type="text" name="oldpass" id="oldpass">
                            <span></span>
                        </div>
                        <div class="inputbox">
                            <label for="">New Password:</label>
                            <input type="text" name="newpass" id="newpass">
                            <span></span>
                        </div>
                        <div class="inputbox">
                            <label for="">Confirm Password:</label>
                            <input type="text" name="cpass" id="cpass">
                            <span></span>
                        </div>
                        <div class="inputbox">
                            <input type="submit" value="Change">
                        </div>
                    </form>
                </div>
    </body>
    <?php
}
?>