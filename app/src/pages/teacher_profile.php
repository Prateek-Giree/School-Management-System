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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
            integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                            <form action="../process/teacher_update.php" method="post"
                                onsubmit="return validateUserUpdateForm()">
                                <input type="hidden" name="id" value="<?php echo $data['uid']; ?>">
                                <div class="inputbox">
                                    <label for="">Full Name:</label>
                                    <input name="fullname" type="text"
                                        onblur=" nameValidation('updateName', 'nameUpdateErr')" id="updateName"
                                        value="<?php echo $data['name']; ?>">
                                    <span id="nameUpdateErr"></span>
                                </div>
                                <div class="inputbox">
                                    <label for="">Email:</label>
                                    <input name="email" type="text" id="updateEmail"
                                        onblur="emailValidation('updateEmail', 'emailUpdateErr')"
                                        value="<?php echo $data['email']; ?>">
                                    <span id="emailUpdateErr"></span>
                                </div>
                                <div class="inputbox">
                                    <label for="">Address:</label>
                                    <input name="address" type="text" id="updateAddress"
                                        onblur="addressValidation('updateAddress', 'addressUpdateErr')"
                                        value="<?php echo $data['address']; ?>">
                                    <span id="addressUpdateErr"></span>
                                </div>
                                <div class="inputbox">
                                    <label for="">Contact no.:</label>
                                    <input name="contact" type="text" id="updateContact" oninput="limitContactLength(this)"
                                        onblur="contactValidation('updateContact', 'contactUpdateErr')"
                                        value="<?php echo $data['contact']; ?>">
                                    <span id="contactUpdateErr"></span>
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
                    <form action="../process/change_password.php" method="post"
                        onsubmit="return passwordValidation('newpass','newPassErr') && checkPass('cnewpass','newpass','cnewPassErr')">
                        <div class="inputbox">
                            <div class="password-input">
                                <label for="">Old Password:</label>
                                <input type="password" name="oldpass" id="oldpass">
                                <i class="fa-solid fa-eye" onclick="togglePasswordVisibility('oldpass')"></i>
                            </div>
                            <span></span>
                        </div>
                        <div class="inputbox">
                            <div class="password-input">
                                <label for="">New Password:</label>
                                <input type="password" name="newpass" onblur="passwordValidation('newpass','newPassErr')"
                                    id="newpass">
                                <i class="fa-solid fa-eye" onclick="togglePasswordVisibility('newpass')"></i>
                            </div>
                            <span id="newPassErr"></span>
                        </div>
                        <div class="inputbox">
                            <div class="password-input">
                                <label for="">Confirm Password:</label>
                                <input type="password" name="cpass" onblur="checkPass('cnewpass','newpass','cnewPassErr')"
                                    id="cnewpass">
                                <i class="fa-solid fa-eye" onclick="togglePasswordVisibility('cnewpass')"></i>
                            </div>
                            <span id="cnewPassErr"></span>
                        </div>
                        <div class="inputbox">
                            <input type="submit" value="Change">
                        </div>
                    </form>
                </div>
                <script src='../js/validation.js'></script>
                <script src='../js/script.js'></script>

    </body>
    <?php
}
?>